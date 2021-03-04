<?php

namespace App\Http\Controllers\OrderAnalysis;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\OrderAnalysis;
use App\TypeAnalysis;
use App\Doctor;
use App\User;
use App\Patient;
use App\Result;

class OrderAnalysisController extends Controller
{
    public function vexSaveOrderAnalysis(Request $request)
    {
      $patient = Patient::where("users_id", $request->get('patient_id'))->get();
      $doctor = Doctor::where("users_id", $request->get('doctor_id'))->get();

      if(count($patient) == 0){
        return response()->json(["message"=>"Usuario paciente no encontrado", "code"=>404, "status"=>false]);
      }
      
      if(count($doctor) == 0){
        return response()->json(["message"=>"Usuario doctor no encontrado", "code"=>404, "status"=>false]);
      }
      
      $data = $request->get('data');
      $jsonData = array(
        "data" => $data
      );
      $fields = array(
        "patient_id" => $patient[0]->id,
        "doctor_id" => $doctor[0]->id,
        "state" => $request->get('state'),
        "state_notification" => $request->get('state_notification'),
        "details" => json_encode($jsonData),
        "price" => $request->get('totalPrice'),
      );
      $order_analysis = OrderAnalysis::create($fields);
      
      return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$data]);
    }

    public function vexUpdateOrderAnalysis(Request $request)
    {
      $state = $request->get('state');
      $order_id = $request->get('order_id');
      $order_analysis = OrderAnalysis::findOrFail($order_id);
      $order_analysis->state = $state;
      $order_updated = $order_analysis->save();

      return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$order_updated]);
    }

    public function vexGetOrderAnalysis()
    {
      $order_analysis = OrderAnalysis::all();
      foreach ($order_analysis as $key => $value) {
        $value->code = $value->id + 11000000;

        $type_analysis = TypeAnalysis::find($value->type_analysis);
        if ($type_analysis) {
            $value->type_analysis = $type_analysis->name;
        }


        $patient = Patient::findOrFail($value->patient_id);

        $user = \DB::table('users')->where('users.id', $patient->users_id)->get();
        $value->patient_name = $user[0]->name . " " . $user[0]->last_name;
      }
      return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$order_analysis]);
    }

    public function vexGetOrderAnalysisDoctor(Request $request)
    {
      $user_id = $request->get('doctor_id');

      $doctor = Doctor::where("users_id", "=", $user_id)->get();

      $order_analysis = OrderAnalysis::where('doctor_id', '=', $doctor[0]->id)->get();
      if(count($order_analysis) == 0){
        return response()->json(['message'=>'Ordenes de analisis no encontradas', 'code'=>404, 'status'=>false]);
      }

      $result = [];

      foreach ($order_analysis as $key => $value) {
        $patient = Patient::findOrFail($value->patient_id);
        $user = \DB::table('users')->where('id', $patient->users_id)->get();
        $patient_name = $user[0]->name . " " . $user[0]->last_name;
        
        $order = array(
          "id" => $value->id,
          "patient" => $patient_name,
          "state" => $value->state,
          "date" => date_format($value->created_at,"d/m/Y"),
          "price" => $value->price,
        );
        
        array_push($result, $order);
      }
      return response()->json(['status'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$result]);
    }

    public function vexGetOrderAnalysisPaciente(Request $request)
    {
      $user_id = $request->get('patient_id');

      $patient = Patient::where("users_id", "=", $user_id)->get();

      if(count($patient) == 0){
        return response()->json(['code'=>404, 'status'=>false, 'message'=>'Usuario no encontrado']);
      }

      $order_analysis = OrderAnalysis::where('patient_id', $patient[0]->id)->get();

      if(count($order_analysis) == 0){
        return response()->json(['code'=>404, 'status'=>false, 'message'=>'Ordenes de analisis no encontradas']);
      }
      
      $result = [];

      foreach ($order_analysis as $key => $value) {
        $doctor = Doctor::findOrFail($value->doctor_id);
        $user = \DB::table('users')->where('id', $doctor->users_id)->get();
        $doctor_name = $user[0]->name . " " . $user[0]->last_name;
        
        $order = array(
          "id" => $value->id,
          "doctor" => $doctor_name,
          "state" => $value->state,
          "date" => date_format($value->created_at,"d/m/Y"),
          "price" => $value->price,
        );

        array_push($result, $order);

      }

      return response()->json(['status'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$result]);
    }

    public function vexGetOrdersAnalysisPendingPaciente($patient_id)
    {
      $paciente = Patient::where("users_id", $patient_id)->get();

      if(count($paciente) == 0){
        return response()->json(['message'=>'Usuario no encontrado', 'code'=>404, 'status'=>false]);
      }

      $orders = OrderAnalysis::where('patient_id', $paciente[0]->id)
                              ->orwhere('state_notification', '0')->get();

      if(count($orders) == 0){
        return response()->json(['message'=>'Ordenes no encontradas', 'code'=>200, 'status'=>false]);
      }

      // Obtener datos generales
      $doctor = Doctor::findOrFail($orders[0]->doctor_id);
      $userDoctor = User::findOrFail($doctor->users_id);

      // Obtener detalle de las ordenes
      $ordersResponse = [];
      $totalPrice = 0;

      foreach ($orders as $key => $order) {
        $order['doctor_name'] = $userDoctor->name . ' ' . $userDoctor->last_name;
        $order['details'] = json_decode($order['details'])->data;
        $order['date'] = date_format($order->created_at, 'd-m-Y');
      }
      
      return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$orders]);
    }

    public function vexGetOneOrderAnalysis($id)
    {
      $order_analysis = OrderAnalysis::findOrFail($id);
      $patient = Patient::findOrFail($order_analysis->patient_id);
      $user_patient = \DB::table('users')->where('users.id', $patient->users_id)->get();
      
      $doctor = Doctor::findOrFail($order_analysis->doctor_id);
      $user_doctor = \DB::table('users')->where('users.id', $doctor->users_id)->get();

      $date = new \DateTime($user_patient[0]->birth_date);
      $now = new \DateTime();
      $interval = $now->diff($date);

      $order_analysis->paciente = $user_patient[0]->name . " " . $user_patient[0]->last_name;
      $order_analysis->doctor = $user_doctor[0]->name . " " . $user_doctor[0]->last_name;
      $order_analysis->especialidad =$doctor->specialty;
      $order_analysis->years_old =$interval->y;
      $order_analysis->orden_analisis = route('print.orden.analysis', $order_analysis->id);

      return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$order_analysis]);
    }

    public function vexExistAnalisisMakedPaciente($id)
    {
      $patient = Patient::where("users_id", "=", $id)->get();
      $order_analysis = OrderAnalysis::where("patient_id", "=", $patient[0]->id)->get();
      $count_notification = 0;
      $state_notification = false;
      foreach ($order_analysis as $key => $order) {
        if($order->state == 'realizado'){
          $count_notification++;
          $state_notification = true;
        }
      }
      return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'cant_notification'=> $count_notification, 'state_notification' => $state_notification, 'data'=>$order_analysis]);
    }

    public function vexExistAnalisisMakedDoctor($id)
    {
      $doctor = Doctor::where("users_id", "=", $id)->get();
      $order_analysis = OrderAnalysis::where("doctor_id", "=", $doctor[0]->id)->get();
      $count_notification = 0;
      $state_notification = 0;
      foreach ($order_analysis as $key => $order) {
        if($order->state == 'realizado'){
          $count_notification++;
          $state_notification = true;
        }
      }
      return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'cant_notification'=> $count_notification, 'state_notification' => $state_notification, 'data'=>$order_analysis]);
    }

    public function getAge($date)
    {
        return intval(date('Y', time() - strtotime($date))) - 1970;
    }

    public function printOrderAnalysis($id)
    {
        $order_analysis = OrderAnalysis::findOrFail($id);
        $patient = Patient::findOrFail($order_analysis->patient_id);
        $user_patient = \DB::table('users')->where('users.id', $patient->users_id)->get();
        $edad = $this->getAge($user_patient[0]->birth_date);

        $doctor = Doctor::findOrFail($order_analysis->doctor_id);
        $user_doctor = \DB::table('users')->where('users.id', $doctor->users_id)->get();

        $date = new \DateTime($user_patient[0]->birth_date);
        $now = new \DateTime();
        $interval = $now->diff($date);

        $order_analysis->paciente = $user_patient[0]->name . " " . $user_patient[0]->last_name;
        $order_analysis->doctor = $user_doctor[0]->name . " " . $user_doctor[0]->last_name;
        $order_analysis->especialidad =$doctor->specialty;
        $order_analysis->years_old =$interval->y;

        $data = array(
            "patient" => array(
                "hc" => "C7001584",
                "name" => $order_analysis->paciente,
                "date" => Carbon::parse($order_analysis->created_at)->format('d/m/Y'),
                "validity" => Carbon::parse($order_analysis->created_at)->addDays(7)->format('d/m/Y'),
                "years_old" => $edad
            ),
            "doctor" => array(
                "cmp" => $doctor->id_cmp,
                "specialty" => $doctor->specialty,
                "name" => $order_analysis->doctor,
                "firma_digital" => 'https://telemedicina.today/images/' . $doctor->firma_digital
            ),
            "analysis" => json_decode($order_analysis->details, true),
            "query_id" => $order_analysis->id,
        );

        //return view('print.receta', compact('data'));
        //$today = Carbon::now()->format('H:i');
        $pdf = \PDF::loadView('print.ordenanalysis', compact('data'));
        //return $pdf->download('ejemplo.pdf');
        return $pdf->stream();
    }

    public function vexSolucionesGetAnalysis() {
      $analisis = array(
        array(
          'id' => 1,
          'analitico' => 'GLUCOSA',
          'unidades' => 'mg/dL',
          'valor_referencia' => '70 – 110',
          'metodo' => 'enzimatico'
        ),

        array(
          'id' => 2,
          'analitico' => 'GLUCOSA POST-PRANDIAL',
          'unidades' => 'mg/dL',
          'valor_referencia' => '< 140',
          'metodo' => 'enzimatico'
        ),

        array(
          'id' => 3,
          'analitico' => 'GLUCOSA BASAL',
          'unidades' => 'mg/dL',
          'valor_referencia' => '70 – 110',
          'metodo' => 'enzimatico'
        ),

        array(
          'id' => 4,
          'analitico' => 'GLUCOSA 60 MINUTOS',
          'unidades' => 'mg/dL',
          'valor_referencia' => '140 – 199',
          'metodo' => 'enzimatico'
        ),

        array(
          'id' => 5,
          'analitico' => 'GLUCOSA 120 MINUTOS',
          'unidades' => 'mg/dL',
          'valor_referencia' => '< 140',
          'metodo' => 'enzimatico'
        ),

        array(
          'id' => 6,
          'analitico' => 'COLESTEROL TOTAL',
          'unidades' => 'mg/dL',
          'valor_referencia' => ['Deseable: < 200', 'Moderadamente alto: 200 – 240', 'Elevado: > 240'],
          'metodo' => 'enzimatico'
        ),

        array(
          'id' => 7,
          'analitico' => 'COLESTEROL HDL',
          'unidades' => 'mg/dL',
          'valor_referencia' => ['Varones: 30 – 70', 'Mujeres: 30 – 85'],
          'metodo' => 'Colorimetría'
        ),

        array(
          'id' => 8,
          'analitico' => 'COLESTEROL LDL',
          'unidades' => 'mg/dL',
          'valor_referencia' => ['Riesgo bajo o nulo: < 129', 'Riesgo moderado a elevado: 130 – 189', 'Riesgo muy elevado: > 190'],
          'metodo' => 'Colorimetría'
        ),

        array(
          'id' => 9,
          'analitico' => 'TRIGLICÉRIDOS',
          'unidades' => 'mg/dL',
          'valor_referencia' => ['Deseable: < 150', 'Moderadamente alto: 150 – 199', 'Elevado: 200 – 499', 'Muy elevado: > 500'],
          'metodo' => 'Enzimático'
        ),

        

        array(
          'id' => 10,
          'analitico' => 'CREATINÍNA SÉRICA',
          'unidades' => 'mg/dL',
          'valor_referencia' => ['Varones: 0.7 – 1.3', 'Mujeres: 0.6 – 1.1'],
          'metodo' => 'Cinética '
        ),

        array(
          'id' => 11,
          'analitico' => 'CREATINÍNA EN ORINA',
          'unidades' => 'mg/dL',
          'valor_referencia' => 'PENDIENTE',
          'metodo' => 'Cinética '
        ),

        array(
          'id' => 12,
          'analitico' => 'UREA',
          'unidades' => 'mg/dL',
          'valor_referencia' => '10 – 50',
          'metodo' => 'Cinética '
        ),

        array(
          'id' => 13,
          'analitico' => 'ÁCIDO ÚRICO',
          'unidades' => 'mg/dL',
          'valor_referencia' => ['Varones: 2.5 – 6.0', 'Mujeres: 2.0 – 5.0'],
          'metodo' => 'enzimatico'
        ),

        array(
          'id' => 14,
          'analitico' => 'TGO (AST)',
          'unidades' => 'U/I',
          'valor_referencia' => 'Adultos: < 38',
          'metodo' => 'UV optimizado'
        ),

        array(
          'id' => 15,
          'analitico' => 'TGP (ALT)',
          'unidades' => 'U/I',
          'valor_referencia' => 'Adultos: < 41',
          'metodo' => 'UV optimizado'
        ),

        array(
          'id' => 16,
          'analitico' => 'BILIRRUBINA TOTAL',
          'unidades' => 'mg/dL',
          'valor_referencia' => 'Adultos: < 1.0',
          'metodo' => 'DPD'
        ),

        array(
          'id' => 17,
          'analitico' => 'BILIRRUBINA DIRECTA',
          'unidades' => 'mg/dL',
          'valor_referencia' => 'Adultos: < 0.25',
          'metodo' => 'DPD'
        ),

        array(
          'id' => 18,
          'analitico' => 'BILIRRUBÍNA INDIRECTA',
          'unidades' => 'mg/dL',
          'valor_referencia' => 'Adultos: < 0.75',
          'metodo' => ''
        ),

        array(
          'id' => 19,
          'analitico' => 'PROTEÍNAS TOTALES',
          'unidades' => 'mg/dL',
          'valor_referencia' => '6.1 – 7.9',
          'metodo' => 'Colorimetría'
        ),

        array(
          'id' => 20,
          'analitico' => 'ALBUMINA',
          'unidades' => 'mg/dL',
          'valor_referencia' => '3.5 – 4.8',
          'metodo' => 'Colorimetría'
        ),

        array(
          'id' => 21,
          'analitico' => 'GLOBULINA',
          'unidades' => 'mg/dL',
          'valor_referencia' => '2.3 – 3.4',
          'metodo' => ''
        ),

        array(
          'id' => 22,
          'analitico' => 'RELACIÓN A/G',
          'unidades' => '',
          'valor_referencia' => '1.2 – 2.2',
          'metodo' => ''
        ),

        array(
          'id' => 23,
          'analitico' => 'FOSFATASA ALCALINA',
          'unidades' => 'U/I',
          'valor_referencia' => ['Adultos: 65 – 300', 'Niños y adolescentes: < 645'],
          'metodo' => 'cinético optimizado'
        ),

        
       
      );

      return response()->json(['message' => 'Listado de analisis', 'code'=>201, 'status' => true, 'data' => $analisis]);
    }
}
