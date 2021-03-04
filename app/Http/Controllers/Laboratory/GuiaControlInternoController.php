<?php

namespace App\Http\Controllers\Laboratory;

use App\GuiaControlInterno;
use App\OrderAnalysis;
use App\Patient;
use App\TomaMuestra;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GuiaControlInternoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = TomaMuestra::all();

        foreach ($datos as $dato){
            $patient = Patient::findOrFail($dato->patient_id);
            $user = User::find($patient->users_id);
            $paciente = $user->name . " " . $user->last_name;
            $date = new \DateTime($user->birth_date);
            $hora = new \DateTime($dato->created_at);
            $now = new \DateTime();
            $fecha= $now->diff($date);

            if ($dato->status == 0){
                $status = 'En proceso';
            }elseif($dato->status == 1){
                $status = 'Aprobado';
            }elseif($dato->status == 2){
                $status = 'Rechazado';
            }elseif($dato->status == 2){
                $status = 'Procesado';
            }else{
                $status = 'En proceso';
            }

            if ($user->gender == 1){
                $sexo = 'F';
            }else{
                $sexo = 'M';
            }


            $result[] = [
                'id_solicitud' => $dato->id_solicitud,
                'cod_muestra' => $dato->codigo_barra,
                'material'=> $dato->material,
                'fecha'=> Carbon::parse($dato->created_at)->format('d/m/Y'),
                'paciente'=> $paciente,
                'sexo'=> $sexo,
                'edad'=> $fecha->y,
                'diagnostico'=> 'Pendiente de diagnostico',
                'examen'=> $dato->examen,
                'htm'=> $hora->format('H:i'),
                'lab'=> '1',
                'criterio_rechazo'=> $dato->motivo,
                'comentario'=> $dato->comentario,
                'status' => $status
            ];
        }

        return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$result]);
    }


    public function filterTomaMuestras(Request $request) 
    {
        $datos = TomaMuestra::whereBetween('created_at', [$request->get('from'), $request->get('to')])->get();

        if(count($datos) == 0) {
            return response()->json(['message' => 'Muestras no encontradas', 'status' => false, 'code' => 404]);
        }

        // return response()->json(['fsdaf' => $datos]);
       
        foreach ($datos as $dato){
            $patient = Patient::findOrFail($dato->patient_id);
            $user = User::find($patient->users_id);
            $paciente = $user->name . " " . $user->last_name;
            $date = new \DateTime($user->birth_date);
            $hora = new \DateTime($dato->created_at);
            $now = new \DateTime();
            $fecha= $now->diff($date);

            if ($dato->status == 0){
                $status = 'En proceso';
            }elseif($dato->status == 1){
                $status = 'Aprobado';
            }elseif($dato->status == 2){
                $status = 'Rechazado';
            }elseif($dato->status == 2){
                $status = 'Procesado';
            }else{
                $status = 'En proceso';
            }

            if ($user->gender == 1){
                $sexo = 'F';
            }else{
                $sexo = 'M';
            }


            $result[] = [
                'id_solicitud' => $dato->id_solicitud,
                'cod_muestra' => $dato->codigo_barra,
                'material'=> $dato->material,
                'fecha'=> Carbon::parse($dato->created_at)->format('d/m/Y'),
                'paciente'=> $paciente,
                'sexo'=> $sexo,
                'edad'=> $fecha->y,
                'diagnostico'=> 'Pendiente de diagnostico',
                'examen'=> $dato->examen,
                'htm'=> $hora->format('H:i'),
                'lab'=> '1',
                'criterio_rechazo'=> $dato->motivo,
                'comentario'=> $dato->comentario,
                'status' => $status
            ];
        }

        return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$result]);
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
        $id_solicitud = $request->get('id_solicitud');
        $query = GuiaControlInterno::updateOrCreate(['id_solicitud' => $id_solicitud ],$request->all());
        if ($query){
            return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$query]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GuiaControlInterno  $guiaControlInterno
     * @return \Illuminate\Http\Response
     */
    public function show(GuiaControlInterno $guiaControlInterno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GuiaControlInterno  $guiaControlInterno
     * @return \Illuminate\Http\Response
     */
    public function edit(GuiaControlInterno $guiaControlInterno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GuiaControlInterno  $guiaControlInterno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GuiaControlInterno $guiaControlInterno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GuiaControlInterno  $guiaControlInterno
     * @return \Illuminate\Http\Response
     */
    public function destroy(GuiaControlInterno $guiaControlInterno)
    {
        //
    }

    public function imprimir($id)
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
                $hora = new \DateTime($tomaMuestra->created_at);
                $tomaMuestra->diagnostico = 'Pendiente de diagnostico';
                $tomaMuestra->htm = $hora->format('H:i');
                $tomaMuestra->laboratorio = 'Interno';
                $data[] = $tomaMuestra;

            }

            $result = [
                'id_solicitud' =>  $order_analysis->id,
                'fecha_solicitud'=> $order_analysis->created_at,
                'paciente'=> $paciente,
                'sexo'=> $user_patient->gender,
                'edad'=> $interval->y,
                'detalle' => $data
            ];
            return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$result]);
        }
    }

    public function getGuiacontrol($id)
    {
        $query = GuiaControlInterno::find($id);
        $order_analysis = OrderAnalysis::findOrFail($query->id_solicitud);
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
                $hora = new \DateTime($tomaMuestra->created_at);
                $tomaMuestra->diagnostico = 'Pendiente de diagnostico';
                $tomaMuestra->htm = $hora->format('H:i');
                $tomaMuestra->laboratorio = 'Interno';
                $data[] = $tomaMuestra;

            }

            $result = [
                'id_solicitud' =>  $order_analysis->id,
                'fecha_solicitud'=> $order_analysis->created_at,
                'paciente'=> $paciente,
                'sexo'=> $user_patient->gender,
                'edad'=> $interval->y,
                'detalle' => $data
            ];
            return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$result]);
        }
    }

    public function saveRecepcionmuestra(Request $request)
    {
        $id_solicitud = $request->get('id_solicitud');
        $query = GuiaControlInterno::updateOrCreate(['id_solicitud' => $id_solicitud ],[
            'hora_recepcion' => $request->get('hora_recepcion'),
            'comentario' => $request->get('comentario')
        ]);
        if ($query){
            return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$query]);
        }
    }

    public function listarechazo()
    {
        $result = [
            "Conservacion inadecuada de la cadena de frio",
            "Muestra coagulada",
            "Muestra con resultado incongruente",
            "Muestra hemolizada",
            "Muestra insuficiente",
            "Recipiente inadecuado/contaminado",
            "Rotulacion inadecuada",
            "Solicitud de analisis sin muestra",
            "Otro"
        ];
        return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$result]);
    }

    public function GetRecepcionMuestra()
    {
        $query = OrderAnalysis::all();
        $result = [];
        foreach ($query as $order_analysis){
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
                $data[] = [
                    'codigo_muestra' => $tomaMuestra->id,
                    'examenes' => $tomaMuestra->examen
                ];
            }
            if (count($toma_muestras)>0){
                $result[] = [
                    'id_solicitud' =>  $order_analysis->id,
                    'prioridad'=> 'Normal',
                    'paciente'=> $paciente,
                    'sexo'=> $user_patient->gender,
                    'edad'=> $interval->y,
                    'details' => $data,
                    'fecha_solicitud'=> $order_analysis->created_at,
                    'completitud' => 'Pendiente: HICRO 07'
                ];
            }

        }
        return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$result]);
    }

    public function FilterRecepcionMuestra(Request $request)
    {
        // $query = OrderAnalysis::all();
        $query = OrderAnalysis::whereBetween('created_at', [$request->get('from'), $request->get('to')])->get();
        $result = [];
        foreach ($query as $order_analysis){
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
                $data[] = [
                    'codigo_muestra' => $tomaMuestra->id,
                    'examenes' => $tomaMuestra->examen
                ];
            }
            if (count($toma_muestras)>0){
                $result[] = [
                    'id_solicitud' =>  $order_analysis->id,
                    'prioridad'=> 'Normal',
                    'paciente'=> $paciente,
                    'sexo'=> $user_patient->gender,
                    'edad'=> $interval->y,
                    'details' => $data,
                    'fecha_solicitud'=> $order_analysis->created_at,
                    'completitud' => 'Pendiente: HICRO 07'
                ];
            }

        }
        return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$result]);
    }

    public function GetRecepcionSolicitud($id){
        $order_analysis = OrderAnalysis::find($id);
        $toma_muestras = TomaMuestra::where('id_solicitud', $id)->get();
        $patient = Patient::findOrFail($order_analysis->patient_id);
        $user_patient = User::find($patient->users_id);
        $paciente = $user_patient->name . " " . $user_patient->last_name;
        $date = new \DateTime($user_patient->birth_date);
        $now = new \DateTime();
        $interval = $now->diff($date);

        $data = [];
        foreach ($toma_muestras as $tomaMuestra){
            $tomaMuestra->laboratorio = 'Interno';
            if ($tomaMuestra==1){
                $codigo_muestra = "No existen muestras";
            }else{
                $codigo_muestra = $tomaMuestra->id;
            }
            $data[] = [
                'tipo_muestra' => $tomaMuestra->material,
                'codigo_muestra' => $codigo_muestra,
                'examenes' => $tomaMuestra->examen,
                'EESS' => $tomaMuestra->destino,
                'fecha_muestra' => $tomaMuestra->created_at,
                'motivo' => $tomaMuestra->motivo,
                'comentario' => $tomaMuestra->comentario,
            ];
        }

        $result = [
            'id_solicitud' =>  $order_analysis->id,
            'prioridad'=> 'Normal',
            'paciente'=> $paciente,
            'sexo'=> $user_patient->gender,
            'edad'=> $interval->y,
            'details' => $data,
            'fecha_solicitud'=> $order_analysis->created_at,
            'completitud' => 'Pendiente: HICRO 07'
        ];
        return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$result]);
    }

    public function eliminarBySolicitud(Request $request)
    {
        $id = $request->get('id_solicitud');
        //$comentario = $request->get('comentario');
        //$motivo = $request->get('motivo');
        $datos = TomaMuestra::where('id_solicitud',$id)->get();
        if ($datos){
            foreach ($datos as $data){
                $data->eliminado = 1;
                $data->save();
            }
            return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$data]);
        }else{
            echo "Error";
        }
    }

    public function GetRechazoSolicitud($id){
        $order_analysis = OrderAnalysis::find($id);
        $toma_muestras = TomaMuestra::where('id_solicitud', $id)->get();
        $patient = Patient::findOrFail($order_analysis->patient_id);
        $user_patient = User::find($patient->users_id);
        $paciente = $user_patient->name . " " . $user_patient->last_name;
        $date = new \DateTime($user_patient->birth_date);
        $now = new \DateTime();
        $interval = $now->diff($date);

        $data = [];
        foreach ($toma_muestras as $tomaMuestra){
            $tomaMuestra->laboratorio = 'Interno';
            if ($tomaMuestra->eliminado==1){
                $codigo_muestra = "No existen muestras";
            }else{
                $codigo_muestra = $tomaMuestra->id;
            }
            $data[] = [
                'tipo_muestra' => $tomaMuestra->material,
                'codigo_muestra' => $codigo_muestra,
                'examenes' => $tomaMuestra->examen,
                'EESS' => $tomaMuestra->destino,
                'fecha_muestra' => $tomaMuestra->created_at,
                'motivo' => $tomaMuestra->motivo,
                'comentario' => $tomaMuestra->comentario,
            ];
        }

        $result = [
            'id_solicitud' =>  $order_analysis->id,
            'prioridad'=> 'Normal',
            'paciente'=> $paciente,
            'numdoc'=> $user_patient->numdoc,
            'sexo'=> $user_patient->gender,
            'edad'=> $interval->y,
            'details' => $data,
            'fecha_solicitud'=> $order_analysis->created_at,
            'completitud' => 'Pendiente: HICRO 07'
        ];
        return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$result]);
    }

    public function buscadorSolicitud(Request $request)
    {
        $query = OrderAnalysis::where("id", "LIKE", "%{$request->get('busqueda')}%")->get();
        $result = [];
        foreach ($query as $order_analysis){
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
                $data[] = [
                    'codigo_muestra' => $tomaMuestra->id,
                    'examenes' => $tomaMuestra->examen
                ];
            }
            if (count($toma_muestras)>0){
                $result[] = [
                    'id_solicitud' =>  $order_analysis->id,
                    'prioridad'=> 'Normal',
                    'paciente'=> $paciente,
                    'sexo'=> $user_patient->gender,
                    'edad'=> $interval->y,
                    'details' => $data,
                    'fecha_solicitud'=> $order_analysis->created_at,
                    'completitud' => 'Pendiente: HICRO 07'
                ];
            }

        }
        return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$result]);
    }

    public function buscadorPaciente(Request $request)
    {
        $users = User::where("name", "LIKE", "%{$request->get('busqueda')}%")->orWhere("last_name", "LIKE", "%{$request->get('busqueda')}%")->get();
        $ids = [];
        foreach ($users as $user){
            array_push($ids,$user->id);
        }
        $pacientes = Patient::whereIn('users_id', $ids)->get();
        $pacientes_id = [];
        foreach ($pacientes as $paciente){
            array_push($pacientes_id,$paciente->id);
        }
        //$query = OrderAnalysis::where("id", "LIKE", "%{$request->get('busqueda')}%")->get();
        $query = OrderAnalysis::whereIn("patient_id", $pacientes_id)->get();
        $result = [];
        foreach ($query as $order_analysis){
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
                $data[] = [
                    'codigo_muestra' => $tomaMuestra->id,
                    'examenes' => $tomaMuestra->examen
                ];
            }
            if (count($toma_muestras)>0){
                $result[] = [
                    'id_solicitud' =>  $order_analysis->id,
                    'prioridad'=> 'Normal',
                    'paciente'=> $paciente,
                    'sexo'=> $user_patient->gender,
                    'edad'=> $interval->y,
                    'details' => $data,
                    'fecha_solicitud'=> $order_analysis->created_at,
                    'completitud' => 'Pendiente: HICRO 07'
                ];
            }

        }
        return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$result]);
    }

    public function buscadorNumerodoc(Request $request){
        $users = User::where("numdoc", "LIKE", "%{$request->get('busqueda')}%")->get();
        $ids = [];
        foreach ($users as $user){
            array_push($ids,$user->id);
        }
        $pacientes = Patient::whereIn('users_id', $ids)->get();
        $pacientes_id = [];
        foreach ($pacientes as $paciente){
            array_push($pacientes_id,$paciente->id);
        }
        //$query = OrderAnalysis::where("id", "LIKE", "%{$request->get('busqueda')}%")->get();
        $query = OrderAnalysis::whereIn("patient_id", $pacientes_id)->get();
        $result = [];
        foreach ($query as $order_analysis){
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
                $data[] = [
                    'codigo_muestra' => $tomaMuestra->id,
                    'examenes' => $tomaMuestra->examen
                ];
            }
            if (count($toma_muestras)>0){
                $result[] = [
                    'id_solicitud' =>  $order_analysis->id,
                    'prioridad'=> 'Normal',
                    'paciente'=> $paciente,
                    'sexo'=> $user_patient->gender,
                    'edad'=> $interval->y,
                    'details' => $data,
                    'fecha_solicitud'=> $order_analysis->created_at,
                    'completitud' => 'Pendiente: HICRO 07'
                ];
            }

        }
        return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$result]);
    }

    public function buscadorCodigobarra(Request $request){

        $tomamuestras = TomaMuestra::where("codigo_barra", "LIKE", "%{$request->get('busqueda')}%")->get();
        $ids = [];
        foreach ($tomamuestras as $tomamuestra){
            array_push($ids,$tomamuestra->id);
        }
        //$query = OrderAnalysis::where("id", "LIKE", "%{$request->get('busqueda')}%")->get();
        $query = OrderAnalysis::whereIn("id", $ids)->get();
        $result = [];
        foreach ($query as $order_analysis){
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
                $data[] = [
                    'codigo_muestra' => $tomaMuestra->id,
                    'examenes' => $tomaMuestra->examen
                ];
            }
            if (count($toma_muestras)>0){
                $result[] = [
                    'id_solicitud' =>  $order_analysis->id,
                    'prioridad'=> 'Normal',
                    'paciente'=> $paciente,
                    'sexo'=> $user_patient->gender,
                    'edad'=> $interval->y,
                    'details' => $data,
                    'fecha_solicitud'=> $order_analysis->created_at,
                    'completitud' => 'Pendiente: HICRO 07'
                ];
            }

        }
        return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$result]);
    }

    public function getFechasFilter(Request $request)
    {
        //$datos = TomaMuestra::where('eliminado', 0)->get();
        $status = $request->get('status');
        if (empty($status)){
            $datos = TomaMuestra::where("created_at", ">=", $request->get('fecha1'))->where("created_at", "<=", $request->get('fecha2'))->get();
        }else{
            $datos = TomaMuestra::where("created_at", ">=", $request->get('fecha1'))->where("created_at", "<=", $request->get('fecha2'))->where('status', $status)->get();
        }
        //$datos = TomaMuestra::all();
        $result =[];
        foreach ($datos as $dato){
            $patient = Patient::findOrFail($dato->patient_id);
            $user = User::find($patient->users_id);
            $paciente = $user->name . " " . $user->last_name;
            $date = new \DateTime($user->birth_date);
            $hora = new \DateTime($dato->created_at);
            $now = new \DateTime();
            $fecha= $now->diff($date);

            if ($dato->status == 0){
                $status = 'En proceso';
            }elseif($dato->status == 1){
                $status = 'Aprobado';
            }elseif($dato->status == 2){
                $status = 'Rechazado';
            }elseif($dato->status == 3){
                $status = 'Procesando';
            }else{
                $status = 'En proceso';
            }

            if ($user->gender == 1){
                $sexo = 'F';
            }else{
                $sexo = 'M';
            }


            $result[] = [
                'id_solicitud' => $dato->id_solicitud,
                'cod_muestra' => $dato->codigo_barra,
                'material'=> $dato->material,
                'fecha'=> Carbon::parse($dato->created_at)->format('d/m/Y'),
                'paciente'=> $paciente,
                'sexo'=> $sexo,
                'edad'=> $fecha->y,
                'diagnostico'=> 'Pendiente de diagnostico',
                'examen'=> $dato->examen,
                'htm'=> $hora->format('H:i'),
                'lab'=> '1',
                'criterio_rechazo'=> $dato->motivo,
                'comentario'=> $dato->comentario,
                'status' => $status
            ];
        }

        return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$result]);
    }
}
