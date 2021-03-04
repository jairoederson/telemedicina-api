<?php

namespace App\Http\Controllers\Laboratory;

use App\Doctor;
use App\ExamenAnalysis;
use App\OrderAnalysis;
use App\Patient;
use App\TomaMuestra;
use App\TypeAnalysis;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TomaMuestraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order_analysis = OrderAnalysis::findOrFail($id);
        if ($order_analysis){
            $toma_muestras = TomaMuestra::where('id_solicitud', $order_analysis->id)->get();
            $patient = Patient::findOrFail($order_analysis->patient_id);
            $user_patient = User::find($patient->users_id);
            $paciente = $user_patient->name . " " . $user_patient->last_name;
            $date = new \DateTime($user_patient->birth_date);
            $now = new \DateTime();
            $interval = $now->diff($date);


            $data = [];
            foreach ($toma_muestras as $tomaMuestra){
                $tomaMuestra->laboratorio = 'Interno';
                $data[] = $tomaMuestra;
            }

            $result = [
                'id_solicitud' =>  $order_analysis->id,
                'fecha_solicitud'=> $order_analysis->created_at,
                'paciente'=> $paciente,
                'sexo'=> $user_patient->gender,
                'edad'=> $interval->y,
                'examen' => $data
            ];
            return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$result]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TomaMuestra  $tomaMuestra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TomaMuestra $tomaMuestra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->get('toma_muestra_id');
        $comentario = $request->get('comentario');
        $motivo = $request->get('motivo');
        $data = TomaMuestra::find($id);
        if ($data){
            $data->eliminado = 1;
            $data->motivo = $motivo;
            $data->comentario = $comentario;
            $data->save();
            return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$data]);
        }else{
            echo "Error";
        }
    }

    public function createbysolicitud(Request $request){
        $id = $request->get('order_id');
        $solicitud = OrderAnalysis::findOrFail($id);
        if ($solicitud){

            $orders = json_decode($solicitud->details, true);
            foreach ($orders['data'] as $key => $value){
                $data = TomaMuestra::updateOrCreate(['code' =>  $value['code'], 'id_solicitud'=> $id],[
                    'code' =>  $value['code'],
                    'patient_id' => $solicitud->patient_id,
                    'id_solicitud' => $id,
                    'material' => 'Frasco',
                    'examen' => $value['analysis'],
                    'priority' => 'Normal',
                    'state' => 'Nueva',
                    'eliminado' => 0,
                ]);

            }
            $result[] = [
                'toma_muestra_id' => $data->id,
                'solicitud_id' => intval($id)
            ];
            return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$result]);
        }
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
        $order_analysis->details = '';

        return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$order_analysis]);
    }

    public function updateCodigobarra(Request $request){
        $id = $request->get('toma_muestra_id');
        $codigo_barra = $request->get('codigo_barra');
        $data = TomaMuestra::find($id);
        $data->codigo_barra = $codigo_barra;
        if($data->save()){
            $result[] = [
                'toma_muestra_id' => $data->id,
                'codigo_barra' => $codigo_barra
            ];
            return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$result]);
        }else{
            return response()->json(['estado'=>false, 'code'=>'401', 'message'=>"Peticion Error"]);
        }
    }

    public function vexGetOrderAnalysis()
    {
        $order_analysis = OrderAnalysis::all();
        foreach ($order_analysis as $key => $value) {
            $value->code = $value->id + 11000000;
            $value->details = '';
            if ($value->type_analysis){
                $type_analysis = TypeAnalysis::findOrFail($value->type_analysis);
                $value->type_analysis = $type_analysis->name;
            }
            $patient = Patient::findOrFail($value->patient_id);

            $user = User::find($patient->users_id);
            $date = new \DateTime($user->birth_date);
            $now = new \DateTime();
            $interval = $now->diff($date);
            $value->patient_name = $user->name . " " . $user->last_name;
            $value->priority = 'Normal';
            $value->status = 'Nueva';
            $value->telefono = $user->tel;
            $value->edad = $interval->y;
            $value->numdoc = $user->numdoc;
        }
        return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$order_analysis]);
    }

    public function eliminarorden(Request $request)
    {
        $id = $request->get('id_solicitud');
        $comentario = $request->get('comentario');
        $motivo = $request->get('motivo');
        $solicitud = OrderAnalysis::findOrFail($id);
        if ($solicitud){
            $orders = json_decode($solicitud->details, true);
            foreach ($orders['data'] as $key => $value){
                $data = TomaMuestra::updateOrCreate(['code' =>  $value['code'], 'id_solicitud'=> $id],[
                    'code' =>  $value['code'],
                    'patient_id' => $solicitud->patient_id,
                    'id_solicitud' => $id,
                    'material' => 'Frasco',
                    'examen' => $value['analysis'],
                    'priority' => 'Normal',
                    'state' => 'Eliminado',
                    'motivo' => $motivo,
                    'comentario' => $comentario,
                ]);
            }
            $result[] = [
                'toma_muestra_id' => $data->id,
                'solicitud_id' => intval($id)
            ];
            return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$result]);
        }
    }

    public function listamotivos(){
        $result = [
            /*'ANULACIÓN DE SOLICITUD',
            'SOLCITUD DE PRUEBA RAPIDA',
            'TOMA DE MUESTRA NO REALIZADA',*/
            'Muestra coagulada',
            'Muestra insuficiente',
            'Muestra contaminada',
            'OTRO'
        ];
        return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$result]);
    }

    public function listarechazo(){
        $result = [
            "Conservacion inadecuada de la cadena de frio",
            "Muestra coagulada",
            "Muestra con resultado incongruente",
            "Muestra hemolizada",
            "Muestra insuficiente",
            "Recipiente inadecuado/contaminado",
            "Rotulacion inadecuada",
            "Solicitud de analisis sin muestra"
        ];
        return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$result]);
    }

    public function sendUTM(Request $request){
        $order_id = $request->get('order_id');
        $query = OrderAnalysis::find($order_id);

        if ($query){
            $query->status = 1;
            $query->save();
            return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$query]);
        }else{
            return response()->json(['estado'=>false, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$query]);
        }
    }

    public function getOrderAnalysisUTM()
    {
        $order_analysis = OrderAnalysis::where('status', 1)->get();
        foreach ($order_analysis as $key => $value) {
            $value->code = $value->id + 11000000;
            $value->details = '';
            if ($value->type_analysis){
                $type_analysis = TypeAnalysis::findOrFail($value->type_analysis);
                $value->type_analysis = $type_analysis->name;
            }
            $patient = Patient::findOrFail($value->patient_id);

            $user = User::find($patient->users_id);
            $date = new \DateTime($user->birth_date);
            $now = new \DateTime();
            $interval = $now->diff($date);
            $value->patient_name = $user->name . " " . $user->last_name;
            $value->priority = 'Normal';
            $value->status = 'Nueva';
            $value->telefono = $user->tel;
            $value->edad = $interval->y;
            $value->numdoc = $user->numdoc;
        }
        return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$order_analysis]);
    }

    public function getFechasFilter(Request $request)
    {
        $status = $request->get('status');
        if (empty($status)){
            $order_analysis = OrderAnalysis::where("created_at", ">=", $request->get('fecha1'))->where("created_at", "<=", $request->get('fecha2'))->get();
        }else{
            $order_analysis = OrderAnalysis::where("created_at", ">=", $request->get('fecha1'))->where("created_at", "<=", $request->get('fecha2'))->where('status', $status)->get();
        }

        //$order_analysis = OrderAnalysis::where('status', 1)->get();
        foreach ($order_analysis as $key => $value) {
            $value->code = $value->id + 11000000;
            $value->details = '';
            if ($value->type_analysis){
                $type_analysis = TypeAnalysis::findOrFail($value->type_analysis);
                $value->type_analysis = $type_analysis->name;
            }
            $patient = Patient::findOrFail($value->patient_id);

            $user = User::find($patient->users_id);
            $date = new \DateTime($user->birth_date);
            $now = new \DateTime();
            $interval = $now->diff($date);
            $value->patient_name = $user->name . " " . $user->last_name;
            $value->priority = 'Normal';
            $value->status = 'Nueva';
            $value->telefono = $user->tel;
            $value->edad = $interval->y;
            $value->numdoc = $user->numdoc;
        }
        return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$order_analysis]);
    }

}
