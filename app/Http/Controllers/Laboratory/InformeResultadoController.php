<?php

namespace App\Http\Controllers\Laboratory;

use App\ExamenResultado;
use App\InformeResultado;
use App\OrderAnalysis;
use App\Patient;
use App\Relationship;
use App\TomaMuestra;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;

class InformeResultadoController extends Controller
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
     * @param  \App\InformeResultado  $informeResultado
     * @return \Illuminate\Http\Response
     */
    public function show(InformeResultado $informeResultado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InformeResultado  $informeResultado
     * @return \Illuminate\Http\Response
     */
    public function edit(InformeResultado $informeResultado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InformeResultado  $informeResultado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InformeResultado $informeResultado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InformeResultado  $informeResultado
     * @return \Illuminate\Http\Response
     */
    public function destroy(InformeResultado $informeResultado)
    {
        //
    }

    public function buscadorSolicitud(Request $request){

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

            $resultados = ExamenResultado::where('id_solicitud', $order_analysis->id)->get();
            $informes = InformeResultado::where('id_solicitud', $order_analysis->id)->first();
            if (count($resultados)>0){
                $result[] = [
                    'id_solicitud' =>  $order_analysis->id,
                    'id_informe' =>  $informes->id,
                    'tipo_informe' =>  'Microbilogia(pendiente)',
                    'prioridad'=> 'Normal',
                    'paciente'=> $paciente,
                    'identificacion'=> $user_patient->numdoc,
                    'sexo'=> $user_patient->gender,
                    'edad'=> $interval->y,
                    //'details' => $data,
                    'fecha_solicitud'=> $order_analysis->created_at,
                    //'completitud' => 'Pendiente: HICRO 07'
                ];
            }

        }
        return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$result]);
    }

    public function buscadorFechas(Request $request){
        $query = OrderAnalysis::where("created_at", ">=", $request->get('fecha1'))->where("created_at", "<=", $request->get('fecha2'))->get();
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

            $resultados = ExamenResultado::where('id_solicitud', $order_analysis->id)->get();
            $informes = InformeResultado::where('id_solicitud', $order_analysis->id)->first();
            if (count($resultados)>0){
                $result[] = [
                    'id_solicitud' =>  $order_analysis->id,
                    'id_informe' =>  $informes->id,
                    'tipo_informe' =>  'Microbilogia(pendiente)',
                    'prioridad'=> 'Normal',
                    'paciente'=> $paciente,
                    'identificacion'=> $user_patient->numdoc,
                    'sexo'=> $user_patient->gender,
                    'edad'=> $interval->y,
                    //'details' => $data,
                    'fecha_solicitud'=> $order_analysis->created_at,
                    //'completitud' => 'Pendiente: HICRO 07'
                ];
            }

        }
        return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$result]);
    }

    public function buscadorPaciente(Request $request){

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

            $resultados = ExamenResultado::where('id_solicitud', $order_analysis->id)->get();
            $informes = InformeResultado::where('id_solicitud', $order_analysis->id)->first();
            if (count($resultados)>0){
                $result[] = [
                    'id_solicitud' =>  $order_analysis->id,
                    'id_informe' =>  $informes->id,
                    'tipo_informe' =>  'Microbilogia(pendiente)',
                    'prioridad'=> 'Normal',
                    'paciente'=> $paciente,
                    'identificacion'=> $user_patient->numdoc,
                    'sexo'=> $user_patient->gender,
                    'edad'=> $interval->y,
                    //'details' => $data,
                    'fecha_solicitud'=> $order_analysis->created_at,
                    //'completitud' => 'Pendiente: HICRO 07'
                ];
            }

        }
        return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$result]);
    }

    public function buscadorNumerodoc(Request $request) {
        $users = User::where("numdoc", "LIKE", "%{$request->get('busqueda')}%")->get();
        $ids = [];
        foreach ($users as $user){
            array_push($ids,$user->id);
        }
        $pacientes = Patient::whereIn('users_id', $ids)->get();

        return 
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

            $resultados = ExamenResultado::where('id_solicitud', $order_analysis->id)->get();

            $informes = InformeResultado::where('id_solicitud', $order_analysis->id)->first();
            
            $status_informe = 0;
            
            if ($informes){
                if (count($resultados)>0){

                    if ($informes->status == 1){
                        $status_informe = 'Aprobado';
                    }elseif ($informes->status == 0){
                        $status_informe = 'Pendiente';
                    }elseif ($informes->status == 2){
                        $status_informe = 'Rechazado';
                    }

                    $result[] = [
                        'id_solicitud' =>  $order_analysis->id,
                        'id_informe' =>  $informes->id,
                        'tipo_informe' =>  'Microbilogia(pendiente)',
                        'prioridad'=> 'Normal',
                        'paciente'=> $paciente,
                        'identificacion'=> $user_patient->numdoc,
                        'sexo'=> $user_patient->gender,
                        'edad'=> $interval->y,
                        //'details' => $data,
                        'fecha_solicitud'=> $order_analysis->created_at,
                        //'completitud' => 'Pendiente: HICRO 07'
                        'status' => $status_informe
                    ];
                }
            }

        }

        $relationships = Relationship::where('tutor', $pacientes[0]->id)->get();
        if(count($relationships) > 0){
            $familiar = [];
            foreach ($relationships as $key => $relationship) {

                $pacientes_id = [];
                
                foreach ($relationships as $paciente){
                    array_push($pacientes_id,$paciente->tutored);
                }
                
                $query = OrderAnalysis::whereIn("patient_id", $pacientes_id)->get();
                $resultFamiliar = [];

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

                    $resultados = ExamenResultado::where('id_solicitud', $order_analysis->id)->get();

                    $informes = InformeResultado::where('id_solicitud', $order_analysis->id)->first();
                    $status_informe = 0;
                    if ($informes){
                        if (count($resultados)>0){

                            if ($informes->status == 1){
                                $status_informe = 'Aprobado';
                            }elseif ($informes->status == 0){
                                $status_informe = 'Pendiente';
                            }elseif ($informes->status == 2){
                                $status_informe = 'Rechazado';
                            }

                            $resultFamiliar[] = [
                                'id_solicitud' =>  $order_analysis->id,
                                'id_informe' =>  $informes->id,
                                'tipo_informe' =>  'Microbilogia(pendiente)',
                                'prioridad'=> 'Normal',
                                'paciente'=> $paciente,
                                'identificacion'=> $user_patient->numdoc,
                                'sexo'=> $user_patient->gender,
                                'edad'=> $interval->y,
                                'fecha_solicitud'=> $order_analysis->created_at,
                                'status' => $status_informe
                            ];
                        }
                    }

                    array_push($familiar, $resultFamiliar);
                }
            }

            return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$result, 'familiar'=>$familiar]);

        }
        
        return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$result, 'familiar'=>[]]);
    }

    public function buscadorNumerodocPaginated(Request $request) {
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

            $resultados = ExamenResultado::where('id_solicitud', $order_analysis->id)->get();

            $informes = InformeResultado::where('id_solicitud', $order_analysis->id)->first();
            $status_informe = 0;
            if ($informes){
                if (count($resultados)>0){

                    if ($informes->status == 1){
                        $status_informe = 'Aprobado';
                    }elseif ($informes->status == 0){
                        $status_informe = 'Pendiente';
                    }elseif ($informes->status == 2){
                        $status_informe = 'Rechazado';
                    }

                    $result[] = [
                        'id_solicitud' =>  $order_analysis->id,
                        'id_informe' =>  $informes->id,
                        'tipo_informe' =>  'Microbilogia(pendiente)',
                        'prioridad'=> 'Normal',
                        'paciente'=> $paciente,
                        'identificacion'=> $user_patient->numdoc,
                        'sexo'=> $user_patient->gender,
                        'edad'=> $interval->y,
                        //'details' => $data,
                        'fecha_solicitud'=> $order_analysis->created_at,
                        //'completitud' => 'Pendiente: HICRO 07'
                        'status' => $status_informe
                    ];
                }
            }


        }

        $resultados = new LengthAwarePaginator($result, count($result), 10);

        return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$resultados]);
    }

    public function getFechasFilter(Request $request){

        $status = $request->get('status');
        if (empty($status)){
            $query = OrderAnalysis::where("created_at", ">=", $request->get('fecha1'))->where("created_at", "<=", $request->get('fecha2'))->get();
        }else{
            $query = OrderAnalysis::where("created_at", ">=", $request->get('fecha1'))->where("created_at", "<=", $request->get('fecha2'))->where('status', $status)->get();
        }

        /*$query = OrderAnalysis::where("created_at", ">=", $request->get('fecha1'))->where("created_at", "<=", $request->get('fecha2'))->get();*/
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

            $resultados = ExamenResultado::where('id_solicitud', $order_analysis->id)->get();
            $informes = InformeResultado::where('id_solicitud', $order_analysis->id)->first();
            if (count($resultados)>0){
                $result[] = [
                    'id_solicitud' =>  $order_analysis->id,
                    'id_informe' =>  $informes->id,
                    'tipo_informe' =>  'Microbilogia(pendiente)',
                    'prioridad'=> 'Normal',
                    'paciente'=> $paciente,
                    'identificacion'=> $user_patient->numdoc,
                    'sexo'=> $user_patient->gender,
                    'edad'=> $interval->y,
                    //'details' => $data,
                    'fecha_solicitud'=> Carbon::parse($order_analysis->created_at)->format('d/m/Y'),
                    //'completitud' => 'Pendiente: HICRO 07'
                ];
            }

        }
        return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$result]);
    }
}
