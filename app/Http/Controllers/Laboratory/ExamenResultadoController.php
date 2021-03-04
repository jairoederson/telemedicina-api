<?php

namespace App\Http\Controllers\Laboratory;

use App\Doctor;
use App\ExamenAnalysis;
use App\ExamenResultado;
use App\InformeResultado;
use App\OrderAnalysis;
use App\Patient;
use App\TomaMuestra;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamenResultadoController extends Controller
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
        $query = ExamenResultado::updateOrCreate(['examen_id' =>  $request->get('examen_id'), 'id_solicitud'=> $request->get('id_solicitud')], $request->all());
        if ($query){
            return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$query]);
        }else{
            return response()->json(['estado'=>false, 'code'=>'401', 'message'=>"Peticion exitosa", 'data'=>$query]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ExamenResultado  $examenResultado
     * @return \Illuminate\Http\Response
     */
    public function show(ExamenResultado $examenResultado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ExamenResultado  $examenResultado
     * @return \Illuminate\Http\Response
     */
    public function edit(ExamenResultado $examenResultado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ExamenResultado  $examenResultado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExamenResultado $examenResultado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ExamenResultado  $examenResultado
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExamenResultado $examenResultado)
    {
        //
    }

    public function getInformebyid($id){
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
                $examenes = ExamenAnalysis::where('code', $tomaMuestra->code)->get();
                foreach ($examenes as $examen){
                    $data[] = $examen;
                }
                //$tomaMuestra->laboratorio = 'Interno';
                //$data[] = $tomaMuestra;
            }

            $result = [
                'id_solicitud' =>  $order_analysis->id,
                'fecha_solicitud'=> $order_analysis->created_at,
                'paciente'=> $paciente,
                'numdoc'=> $user_patient->numdoc,
                'sexo'=> $user_patient->gender,
                'edad'=> $interval->y,
                'muestras' => $data
            ];
            return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$result]);
        }
    }
    public function avanceinforme($id){
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
                $examenes = ExamenAnalysis::where('code', $tomaMuestra->code)->get();
                foreach ($examenes as $examen){
                    $data[] = $examen;
                }

                //$tomaMuestra->laboratorio = 'Interno';
                //$data[] = $tomaMuestra;
            }
            $total = count($data);
            $resultados = ExamenResultado::where('id_solicitud',$order_analysis->id)->get();

            $parcial = count($resultados);

            $porcentaje = ($parcial/$total)*100;
            $result = [
                'id_solicitud' =>  $order_analysis->id,
                'fecha_solicitud'=> $order_analysis->created_at,
                'paciente'=> $paciente,
                'description'=> 'MICROBIOLOGIA',
                //'sexo'=> $user_patient->gender,
                //'edad'=> $interval->y,
                'avance_porcentaje' => $porcentaje
            ];
            return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$result]);
        }
    }


    public function listarResultados(){
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

            $resultados = ExamenResultado::where('id_solicitud', $order_analysis->id)->get();

            if (count($resultados)>0){
                $result[] = [
                    'id_solicitud' =>  $order_analysis->id,
                    'id_informe' =>  $resultados[0]->id,
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

    public function getResultadoSolicitud($id){
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
                $examenes = ExamenAnalysis::where('code', $tomaMuestra->code)->get();
                foreach ($examenes as $examen){
                    $resultados = ExamenResultado::where('examen_id', $examen->id)->where('id_solicitud', $order_analysis->id)->first();
                   if ($resultados){
                       $examen->valor = $resultados->valor;
                       $examen->comentario = $resultados->comentario;
                       $examen->status = $resultados->status;
                       $examen->aprobado = $resultados->aprobado;
                   }
                    $data[] = $examen;
                }
                //$tomaMuestra->laboratorio = 'Interno';
                //$data[] = $tomaMuestra;
            }

            $result = [
                'id_solicitud' =>  $order_analysis->id,
                'fecha_solicitud'=> $order_analysis->created_at,
                'paciente'=> $paciente,
                'sexo'=> $user_patient->gender,
                'edad'=> $interval->y,
                'muestras' => $data
            ];
            return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$result]);
        }
    }

    public function getCorreccionResultados(){
        $result = [
            "Error aleatorio",
            "Error de interfaz",
            "Error por descalibracion del equipo",
            "Error por identificacion del paciente",
            "Error por robotica del equipo",
            "Error por transcripcion de resultados",
            "Otros"
        ];
        return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$result]);
    }

    public function AprobarInformeSolicitud(Request $request){
        $id_solicitud = $request->get('id_solicitud');
        $resultados = ExamenResultado::where('id_solicitud', $id_solicitud)->get();
        $result = [];
        $informe = InformeResultado::updateOrCreate(['id_solicitud'=> $request->get('id_solicitud')], $request->all());
        $result[] = [
            'informer_id'=> $informe->id
        ];
        foreach ($resultados as $resultado){
            $query = ExamenResultado::find($resultado->id);
            $query->aprobado = 'Si';
            $query->save();
        }
        return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'data'=>$result]);
    }

    public function printResultadoAnalisis($id){
        $order_analysis = OrderAnalysis::findOrFail($id);
        if ($order_analysis){
            $doctor = Doctor::find($order_analysis->doctor_id);
            $user_doctor = User::find($doctor->users_id);
            $doctor_nombre = $user_doctor->name . " " . $user_doctor->last_name;

            $toma_muestras = TomaMuestra::where('id_solicitud', $order_analysis->id)->get();
            $patient = Patient::findOrFail($order_analysis->patient_id);
            $user_patient = User::find($patient->users_id);
            $paciente = $user_patient->name . " " . $user_patient->last_name;
            $date = new \DateTime($user_patient->birth_date);
            $now = new \DateTime();
            $interval = $now->diff($date);

            $datos = [];
            $resultados = '';
            foreach ($toma_muestras as $tomaMuestra){
                $examenes = ExamenAnalysis::where('code', $tomaMuestra->code)->get();
                foreach ($examenes as $examen){
                    $resultados = ExamenResultado::where('examen_id', $examen->id)->where('id_solicitud', $order_analysis->id)->first();
                    if ($resultados){
                        $examen->valor = $resultados->valor;
                        $examen->comentario = $resultados->comentario;
                        $examen->status = $resultados->status;
                        $examen->aprobado = $resultados->aprobado;
                    }
                    $datos[] = $examen;
                }
                //$tomaMuestra->laboratorio = 'Interno';
                //$data[] = $tomaMuestra;
            }
            if ($user_patient->gender==1){
                $sexo = 'Masculino';
            }else{
                $sexo = 'Femenino';
            }
            $data= [
                'id_informe' =>   $order_analysis->id,
                'id_solicitud' =>  $order_analysis->id,
                'fecha_solicitud'=> $order_analysis->created_at,
                'paciente'=> $paciente,
                'doctor'=> $doctor_nombre,
                'sexo'=> $sexo,
                'edad'=> $interval->y,
                //'muestras' => $data
            ];
        }
        $today = Carbon::now()->format('H:i');
        $pdf = \PDF::loadView('imprimirResultadoAnalisis', compact('today', 'datos', 'data'));
        //return $pdf->download('ejemplo.pdf');
        return $pdf->stream();
    }
}
