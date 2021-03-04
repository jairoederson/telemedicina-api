<?php

namespace App\Http\Controllers\Admin;

use App\AffiliatePatient;
use App\Company;
use App\Patient;
use App\PaymentCompany;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Doctor;
use App\User;
use App\AcademincTraining;
use App\WorkExperience;
use App\UserPhone;
use App\Query;
use App\Note;
use App\Log;
use App\PaymentDoctor;
use Date;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Sentinel;

class PagoController extends Controller {

    public function index() {
        return view('admin/pagos_medico');
    }

    public function listarPagosMedicosHistorial(Request $request) {
        $items = PaymentDoctor::join("doctors", "payment_doctors.doctor_id", "=", "doctors.id")
                ->select('payment_doctors.*', 'doctors.qualification', DB::raw("(select concat(name,' ',last_name) from users where users.id = doctors.users_id) as doctor"))
                ->where("payment_doctors.estado", "1")
                ->get();
        
        for ($i = 0, $size = count($items); $i < $size; ++$i) {
            $fecha = Date::createFromFormat('!m', $items[$i]['month']);
            $mesTexto = strftime("%B", $fecha->getTimestamp());
            $items[$i]['monthName'] = $mesTexto;
        }


        return response()->json($items);
    }

    public function pagoEmpresa(){
        return view('admin/pagoempresacreate');
    }

    public function registropagoEmpresa(Request $request){

        /*$payment 						= new PaymentCompany;
        $payment->company_id 			= $request->company_id;
        $payment->payment_description	= $request->payment_description;
        $payment->amount				= $request->amount;
        $payment->month				= $request->month;
        $payment->year				= $request->year;*/

        $payment = PaymentCompany::updateOrCreate(['month' => $request->month, 'year' => $request->year, 'company_id' => $request->company_id], $request->all());

        //Guardamos la informacion de pago
        //$payment->save();

        if ($request->file('voucher')) {
            $patch = Storage::disk('images')->putFileAs('voucher', $request->file('voucher'), $payment->id.".jpg");
            $payment->fill(['voucher' => $patch, 'estado' => 1])->save();
        }

        return redirect()->route('admin.liquidaciones.index');
    }


    public function generatePaymentToCompany(Request $request)
    {
        //Se calcula la informacion de monto total a pagar de la empresa

        $afiliados = AffiliatePatient::where('company_id', $request->get('company_id'))->get();
        $total_mes = 0;
        foreach ($afiliados as $afiliado){
            $monto = Query::where('patient_id', $afiliado->affiliate_id)->
            whereMonth('queries.created_at', $request['mes'])->
            whereYear('queries.created_at', $request['anio'])->sum('price');
            $total_mes = $total_mes + $monto;
        }
        $respuesta['monto'] = $total_mes;
        return response()->json($respuesta);

    }

    public function ServicioregistropagoEmpresa(Request $request){

        $payment = PaymentCompany::updateOrCreate(['month' => $request->month, 'year' => $request->year, 'company_id' => $request->company_id], ['month' => $request->month, 'year' => $request->year, 'amount' => $request->amount, 'payment_description' => $request->payment_description, 'company_id' => $request->company_id, 'voucher' => $request->voucher ]);

        if ($request->file('images')) {
            $data = [];
            if (empty($payment->voucher)){
                $contador = 1;
            }else{
                $images = json_decode($payment->voucher, true);
                $contador = count($images) + 1;
                $data = $images;
            }

            foreach($request->file('images') as $image)
            {
                //dd($image);

                $patch = Storage::disk('images')->putFileAs('voucher', $image, $payment->id."-".$contador.".jpg");
                //$data[] = $patch;
                $data[] = URL::to('/images/')."/".$patch;
                $contador++;
            }

            /*$patch = Storage::disk('public')->put('voucher', $request->file('voucher'));*/

            //dd($patch);

            $payment->fill(['voucher' => json_encode($data), 'estado' => 3])->save();
            $payment->voucher = $data;
            //$payment->voucher = URL::to('/images/')."/".$payment->voucher;
            //$payment->voucher = Storage::url($payment->voucher);
        }else{
            $payment->fill(['estado' => 0])->save();
        }
        $payment->payment_date = $payment->created_at;

        return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$payment]);

    }

    public function getHistorialPagosUser($id){
        $patient = Patient::where("users_id", $id)->get();

        if(count($patient)==0){
            return response()->json(["message"=>"El usuario no se un paciente", "code"=>404]);
        }

        $affiliatePatient = AffiliatePatient::where('affiliate_id', $patient[0]->id)->first();

        if(empty($affiliatePatient)){
            return response()->json(["message"=>"El usuario no es un afiliado", "code"=>404, "isAffiliated"=>false]);
        }

        $user = User::find($id);
        $company = Company::find($affiliatePatient->company_id);


        if($affiliatePatient->isResponsible == 1){

            $start_periodo = Carbon::parse($user->created_at);
            $end_periodo = Carbon::now();

            $period = CarbonPeriod::create($start_periodo, '1 month', $end_periodo);
            $result = [];
            foreach ($period as $key => $date) {
                //$result[] = $date->format('Y-m-d');
                $fecha = Date::createFromFormat('!m', $date->month);
                $mesTexto = strftime("%B", $fecha->getTimestamp());
                $monto = $this->getMontoMensual($company->id,$date->month,$date->year);
                if ($monto > 0){
                    $result[] = [
                        'empresa' => $company->name,
                        'company_id' => $company->id,
                        'amount' => $this->getMontoMensual($company->id,$date->month,$date->year),
                        'year' => $date->year,
                        'month' =>  $date->month,
                        'voucher' =>  $this->getVoucherPagoMensual($company->id,$date->month,$date->year),
                        'status' => $this->getStatusPagoMensual($company->id,$date->month,$date->year),
                    ];
                }

            }


            return response()->json(["message"=>"El usuario es un afiliado que esta a cargo de la empresa", "code"=>200, "data"=>$result]);
        }else{
            return response()->json(["message"=>"El usuario es un afiliado, pero no esta a cargo de la empresa", "code"=>200, "data"=>false]);
        }
    }

    public function getMontoMensual($company_id, $month,$year){
        $afiliados = AffiliatePatient::where('company_id',$company_id)->get();
        $total_mes = 0;
        foreach ($afiliados as $afiliado){
            $monto = Query::where('patient_id', $afiliado->affiliate_id)->
            whereMonth('queries.created_at', $month)->
            whereYear('queries.created_at', $year)->sum('price');
            $total_mes = $total_mes + $monto;
        }
        //$respuesta['monto'] = $total_mes;
        return $total_mes;
    }

    public function getStatusPagoMensual($company_id, $month, $year){
        $affiliatePatient = PaymentCompany::where('company_id', $company_id)->where('year', $year)->where('month', $month)->first();
        if ($affiliatePatient){
            if ($affiliatePatient->estado == 1){
                $mensaje = "Pagado";
            }elseif ($affiliatePatient->estado == 3){
                $mensaje = "Evaluando";
            }else{
                $mensaje = "Pendiente";
            }

        }else{
            $mensaje = "Pendiente";
        }
        return $mensaje;
    }

    public function getVoucherPagoMensual($company_id, $month, $year){
        $affiliatePatient = PaymentCompany::where('company_id', $company_id)->where('year', $year)->where('month', $month)->first();
        if ($affiliatePatient){
            if (!empty($affiliatePatient->voucher) && $affiliatePatient->estado == 1 || $affiliatePatient->estado == 3){
                $mensaje = json_decode($affiliatePatient->voucher, true);
            }else{
                $mensaje = [];
            }

        }else{
            $mensaje = [];
        }
        return $mensaje;
    }

    public function cancelarPagoCompany(Request $request){

        //$status = $request->status;

        $payment = PaymentCompany::updateOrCreate(['month' => $request->month, 'year' => $request->year, 'company_id' => $request->company_id], $request->all());
        $payment->fill(['estado' => 0])->save();

        $payment->voucher = "Sin voucher";

        return response()->json(["message"=>"Se actualizo estado", "code"=>200, "data"=>$payment]);

    }

    public function cancelarPagoCompanyAdmin(Request $request){
        $id = $request->get('idcompania');

        $payment = PaymentCompany::find($id);
        $payment->fill(['estado' => 0])->save();

        return response()->json(["message"=>"Se actualizo estado", "code"=>200, "data"=>$payment]);

    }
}
