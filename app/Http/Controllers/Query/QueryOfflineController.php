<?php

namespace App\Http\Controllers\Query;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TypeDiagnostic;
use App\Auxiliary_exams;
use App\Patient;
use App\Doctor;
use App\User;
use App\Ubigeo;
use App\TutorPatient;
use App\QueryOffline;
use App\GeneralRecordPatient;
use App\GinecologicalRecordPatient;
use App\RecordPathologicalPatient;
use App\RecordPathologicalFamilyPatient;
use App\Physical_exams;
use App\Current_diseases;
use App\Diagnostic;
use App\Treatment;
use App\Medicament;
use App\OrderAnalysis;
use App\Procedures;
use Illuminate\Support\Facades\DB;
use App\Voucher;
use App\NoteOther;


class QueryOfflineController extends Controller {

    public function vexSolucionesGetQueries($user_id) 
    {
        $doctor = Doctor::where('users_id', $user_id)->get();

        if(count($doctor) == 0) {
            return response()->json(['message' => 'Usuario no encontrado', 'state' => false, 'code' => 404]);
        }

        $queries = QueryOffline::Where('state', 'atendido')
        ->where('doctor_id', $doctor[0]->id)->get();
        
        $result = [];


        foreach ($queries as $key => $query) {
            $patient = Patient::where('id', $query['patient_id'])->get();
            $patientUser = User::where('id', $patient[0]->users_id)->get();
            
            $doctor = Doctor::where('id', $query['doctor_id'])->get();
            $doctorUser = User::where('id', $doctor[0]->users_id)->get();

            $res = array(
                'id' => $query['id'],
                'state' => $query['state'],
                'doctor_id' => $query['doctor_id'],
                'doctor' => $doctorUser[0]->name . ' ' . $doctorUser[0]->last_name ,
                'patient_id' => $query['patient_id'],
                'patient' => $patientUser[0]->name . ' ' . $patientUser[0]->last_name,
                'years_old' => $this->getAge($patientUser[0]->birth_date),
                'numdoc' => $patientUser[0]->numdoc,
                'date' => $query['created_at']->format('d-m-Y'),
                'hour' => $query['created_at']->format('H:i:s')
            );

            array_push($result, $res);
        }
    
        return response()->json(['message' => 'Consultas atendidas del doctor', 'state' => true, 'data' => $result]);
    }

    public function vexSolucionesSearchQueryDniOrName(Request $request) 
    {

        $doctor = Doctor::where('users_id', $request->get('user_id'))->get();

        if(count($doctor) == 0) {
            return response()->json(['message' => 'Usuario no encontrado', 'state' => false, 'code' => 404]);            
        }
        
        if($request->get('dni')){
            $usuario = User::where('numdoc', $request->get('dni'))->get();
            $paciente = Patient::where('users_id', $usuario[0]->id)->get();

            $queries = QueryOffline::Where('state', 'atendido')
            ->where('patient_id', $paciente[0]->id)->get();

            $antecedente_general = GeneralRecordPatient::where('patient_id', $paciente[0]->id)->get();
            $antecedente_ginecologico = GinecologicalRecordPatient::where('patient_id', $paciente[0]->id)->get();
            $antecedente_patologico = RecordPathologicalPatient::where('patient_id', $paciente[0]->id)->get();
            $antecedente_patologico_familiar = RecordPathologicalFamilyPatient::where('patient_id', $paciente[0]->id)->get();
            
            $antecedentes = array(
                "usuario" => $usuario[0],
                "antecedente_general" => $antecedente_general,
                "antecedente_ginecologico" => $antecedente_ginecologico,
                "antecedente_patologico" => $antecedente_patologico,
                "antecedente_patologico_familiar" => $antecedente_patologico_familiar,
            );
        } else if($request->get('lastname') || $request->get('name')){

            $usuario = User::Where('last_name', $request->get('lastname'))
            ->orWhere('name', $request->get('name'))
            ->get();

            
            $paciente = Patient::where('users_id', $usuario[0]->id)->get();
            
            $queries = QueryOffline::Where('state', 'atendido')
            ->where('patient_id', $paciente[0]->id)->get();
            
            $antecedente_general = GeneralRecordPatient::where('patient_id', $paciente[0]->id)->get();
            $antecedente_ginecologico = GinecologicalRecordPatient::where('patient_id', $paciente[0]->id)->get();
            $antecedente_patologico = RecordPathologicalPatient::where('patient_id', $paciente[0]->id)->get();
            $antecedente_patologico_familiar = RecordPathologicalFamilyPatient::where('patient_id', $paciente[0]->id)->get();

            $antecedentes = array(
                "usuario" => $usuario[0],
                "antecedente_general" => $antecedente_general,
                "antecedente_ginecologico" => $antecedente_ginecologico,
                "antecedente_patologico" => $antecedente_patologico,
                "antecedente_patologico_familiar" => $antecedente_patologico_familiar,
            );
        } else {
            $queries = QueryOffline::Where('state', 'atendido')
            ->get();

            $antecedentes = array(
                "usuario" => [],
                "antecedente_general" => [],
                "antecedente_ginecologico" => [],
                "antecedente_patologico" => [],
                "antecedente_patologico_familiar" => [],
            );
        }
        
        $result = [];

        foreach ($queries as $key => $query) {
            $patient = Patient::where('id', $query['patient_id'])->get();
            $patientUser = User::where('id', $patient[0]->users_id)->get();
            
            $doctor = Doctor::where('id', $query['doctor_id'])->get();
            $doctorUser = User::where('id', $doctor[0]->users_id)->get();

            $res = array(
                'id' => $query['id'],
                'state' => $query['state'],
                'doctor_id' => $query['doctor_id'],
                'doctor' => $doctorUser[0]->name . ' ' . $doctorUser[0]->last_name ,
                'patient_id' => $query['patient_id'],
                'patient' => $patientUser[0]->name . ' ' . $patientUser[0]->last_name,
                'years_old' => $this->getAge($patientUser[0]->birth_date),
                'numdoc' => $patientUser[0]->numdoc,
                'date' => $query['created_at']->format('d-m-Y'),
                'updated_at' => $query['updated_at']->format('d-m-Y'),
                'hour' => $query['created_at']->format('H:i:s')
            );

            array_push($result, $res);
        }
    
        $data = array(
            "consultas" => $result,
            "antecedentes" => $antecedentes
        );
        return response()->json(['message' => 'Busqueda de consulta exitosa', 'state' => true, 'data' => $data]);
    }

    public function vexSolucionesGetQueriesOfflinePendingToQuery($user_id) 
    {
        
        $doctor = Doctor::where('users_id', $user_id)->get();

        $queries = QueryOffline::Where('state', 'pendiente consulta')
        ->where('doctor_id', $doctor[0]->id)->get();
        
        $result = [];


        foreach ($queries as $key => $query) {
            $patient = Patient::where('id', $query['patient_id'])->get();
            $patientUser = User::where('id', $patient[0]->users_id)->get();
            
            $doctor = Doctor::where('id', $query['doctor_id'])->get();
            $doctorUser = User::where('id', $doctor[0]->users_id)->get();

            $res = array(
                'id' => $query['id'],
                'state' => $query['state'],
                'doctor_id' => $query['doctor_id'],
                'doctor' => $doctorUser[0]->name . ' ' . $doctorUser[0]->last_name ,
                'patient_id' => $query['patient_id'],
                'patient' => $patientUser[0]->name . ' ' . $patientUser[0]->last_name,
                'years_old' => $this->getAge($patientUser[0]->birth_date),
                'numdoc' => $patientUser[0]->numdoc,
                'date' => $query['created_at']->format('d-m-Y'),
                'hour' => $query['created_at']->format('H:i:s')
            );

            array_push($result, $res);
        }
    
        return response()->json(['message' => 'Consultas pendientes de atencion encontradas', 'state' => true, 'data' => $result]);
    }

    public function vexSolucionesGetQueriesOfflinePendingToAtention() 
    {
        

        $queries = QueryOffline::Where('state', 'pendiente atencion')->get();
        
        $result = [];


        foreach ($queries as $key => $query) {
            $patient = Patient::where('id', $query['patient_id'])->get();
            $patientUser = User::where('id', $patient[0]->users_id)->get();
            

            $res = array(
                'id' => $query['id'],
                'state' => $query['state'],
                'doctor_id' => $query['doctor_id'],
                'patient_id' => $query['patient_id'],
                'patient' => $patientUser[0]->name . ' ' . $patientUser[0]->last_name,
                'years_old' => $this->getAge($patientUser[0]->birth_date),
                'numdoc' => $patientUser[0]->numdoc,
                'date' => $query['created_at']->format('d-m-Y'),
                'hour' => $query['created_at']->format('H:i:s')
            );

            array_push($result, $res);
        }
    
        return response()->json(['message' => 'Consultas pendientes de atencion encontradas', 'state' => true, 'data' => $result]);
    }

    public function vexSolucionesSendPatientToAtention(Request $request) 
    {
        $query = QueryOffline::Where('id', $request->get('query_offline_id'))->get();
        $doctor = Doctor::Where('users_id', $request->get('doctor_id'))->get();

        if(count($query) == 0) {
            return response()->json(['message' => 'Consulta medica no encontrada', 'state' => false, 'code' => 404]);
        }

        if(count($doctor) == 0) {
            return response()->json(['message' => 'Médico no encontrado', 'state' => false, 'code' => 404]);
        }

        $query_to_atention = QueryOffline::findOrFail($request->get('query_offline_id'));
        $query_to_atention->state = 'pendiente consulta';

        
        $query_to_atention->doctor_id = $doctor[0]->id;
        
        $query_to_atention->save();

        return response()->json(['message' => 'Envio de paciente a consulta medica', 'state' => true, 'code' => 201]);

    }

    public function vexSolucionesGetQueriesOfflineAtention($user_id) 
    {

        $doctor = Doctor::where('users_id', $user_id)->get();

        $queries = QueryOffline::Where('state', 'atendido')
        ->where('doctor_id', $doctor[0]->id)->get();
        
        $result = [];

        foreach ($queries as $key => $query) {
            $patient = Patient::where('id', $query['patient_id'])->get();
            $patientUser = User::where('id', $patient[0]->users_id)->get();
            
            $doctor = Doctor::where('id', $query['doctor_id'])->get();
            $doctorUser = User::where('id', $doctor[0]->users_id)->get();

            $res = array(
                'id' => $query['id'],
                'state' => $query['state'],
                'doctor_id' => $query['doctor_id'],
                'doctor' => $doctorUser[0]->name . ' ' . $doctorUser[0]->last_name ,
                'patient_id' => $query['patient_id'],
                'patient' => $patientUser[0]->name . ' ' . $patientUser[0]->last_name,
                'years_old' => $this->getAge($patientUser[0]->birth_date), 
                'numdoc' => $patientUser[0]->numdoc,               
                'date' => $query['created_at']->format('d-m-Y'),
                'hour' => $query['created_at']->format('H:i:s')
            );

            array_push($result, $res);
        }
    
        return response()->json(['message' => 'Consultas atendidas encontradas', 'state' => true, 'data' => $result]);
    }
    
    public function vexSolucionesSearchTrazabilidad(Request $request) 
    {
        $doctor = Doctor::where('users_id', $request->get('user_id'))->get();
        
        $from = $request->get('from');
        $to = $request->get('to');
        $queries = QueryOffline::whereBetween('created_at', [$from, $to])
        ->where('doctor_id', $doctor[0]->id)
        ->where('state', 'atendido')->get();
        
        $result = [];

        foreach ($queries as $key => $query) {
            $patient = Patient::where('id', $query['patient_id'])->get();
            $patientUser = User::where('id', $patient[0]->users_id)->get();
            
            $doctor = Doctor::where('id', $query['doctor_id'])->get();
            $doctorUser = User::where('id', $doctor[0]->users_id)->get();

            $res = array(
                'id' => $query['id'],
                'state' => $query['state'],
                'doctor_id' => $query['doctor_id'],
                'doctor' => $doctorUser[0]->name . ' ' . $doctorUser[0]->last_name ,
                'patient_id' => $query['patient_id'],
                'patient' => $patientUser[0]->name . ' ' . $patientUser[0]->last_name,
                'numdoc' => $patientUser[0]->numdoc,
                'years_old' => $this->getAge($patientUser[0]->birth_date),
                'numdoc' => $patientUser[0]->numdoc,
                'date' => $query['created_at']->format('d-m-Y'),
                'hour' => $query['created_at']->format('H:i:s')
            );

            array_push($result, $res);
        }
    
        return response()->json(['message' => 'Búsqueda de consultas realizadas', 'state' => true, 'data' => $result]);
    }

    public function getAge($date)
    {
        return intval(date('Y', time() - strtotime($date))) - 1970;
    }

    public function vexSolucionesObtenerDatosPaciente($user_id) 
    {
        $user = User::where('id', $user_id)->get();
        if( count($user) > 0 ) {
            
            $patient = Patient::where('users_id', $user_id)->get();
            
            $tutor = TutorPatient::where('user_id', $user_id)->get();
            
            $ubigeo = Ubigeo::where('id', $user[0]->ubigeo_id)->get();
            $ubigeoBirth = Ubigeo::where('id', $user[0]->ubigeo_birth)->get();
            
            
            if(count($tutor) == 0) {
                $tutor = [
                    array(
                        'vinculo' => "",
                        'ocupation' => "",
                        'type_document_id' => "",
                        'name' => "",
                        'lastname' => "",
                        'numdoc' => "",
                        'id' => ""
                        )
                ];    
            }

            if(count($ubigeo) == 0) {
                $ubigeo = [
                    array(
                        'departamento' => "",
                        'provincia' => "",
                        'distrito' => "",
                        )
                ];    
            }

            if(count($ubigeoBirth) == 0) {
                $ubigeoBirth = [
                    array(
                        'departamento' => "",
                        'provincia' => "",
                        'distrito' => "",
                        )
                ];    
            }
                
            
            $result = array(
                'type_document' => $user[0]->type_document_id,
                'numdoc' => $user[0]->numdoc,
                'last_name' => $user[0]->last_name,
                'name' => $user[0]->name,
                'gender' => $user[0]->gender,
                'birth_date' => $user[0]->birth_date,
                'civil_status' => $patient[0]->civil_status_id,
                'email' => $user[0]->email,
                'tel' => $user[0]->tel,
                'ubigeo_id' => array(
                    "departamento" => $ubigeo[0]['departamento'],
                    "provincia" => $ubigeo[0]['provincia'],
                    "distrito" => $ubigeo[0]['distrito']
                ),
                'address' => $user[0]->address,
                'ubigeo_birth' => array(
                    "departamento" => $ubigeoBirth[0]['departamento'],
                    "provincia" => $ubigeoBirth[0]['provincia'],
                    "distrito" => $ubigeoBirth[0]['distrito'],
                ),
                'ubigeo_proc' => $user[0]->address,
                'degree_instruction' => $patient[0]->degree_instruction_id,
                'ocupation' => $patient[0]->ocupation,
                'vinculo' => $tutor[0]['vinculo'],
                'ocupacion_tutor' => $tutor[0]['ocupation'],
                'type_document_tutor' => $tutor[0]['type_document_id'],
                'name_lastname' => $tutor[0]['name'] . ' ' . $tutor[0]['lastname'],
                'numdoc_tutor' => $tutor[0]['numdoc'],
                'idtutor' => $tutor[0]['id']
            );

            return response()->json(['message' => 'Datos del paciente', 'state' => true, 'code' => 201, 'data' => $result]);

        }else {
            return response()->json(['message' => 'Usuario no encontrado', 'state' => false, 'code' => 404]);
        }
    }

    public function vexSolucionesActualizarDatosPaciente(Request $request) 
    {
        $user_id = $request->get('user_id');

        $user_to_update = User::findOrFail($user_id);

        $patient = Patient::where('users_id', $user_id)->get();

        $patient_to_update = Patient::findOrFail($patient[0]->id);

        $ubigeo = Ubigeo::where('departamento', $request->get('ubigeo')['departamento'])
        ->where('provincia', $request->get('ubigeo')['provincia'])
        ->where('distrito', $request->get('ubigeo')['distrito'])
        ->get();


        $ubigeo_birth = Ubigeo::where('departamento', $request->get('ubigeo_birth')['departamento'])
        ->where('provincia', $request->get('ubigeo_birth')['provincia'])
        ->where('distrito', $request->get('ubigeo_birth')['distrito'])
        ->get();

        
        $user_to_update->type_document_id = $request->get('type_document_id');
        $user_to_update->numdoc = $request->get('numdoc');
        $user_to_update->last_name = $request->get('last_name');
        $user_to_update->name = $request->get('name');
        $user_to_update->gender = $request->get('gender');
        $user_to_update->birth_date = $request->get('birth_date');
        $user_to_update->tel = $request->get('tel');
        $user_to_update->ubigeo_id = $ubigeo[0]->id;
        $user_to_update->address = $request->get('address');
        $user_to_update->ubigeo_birth = $ubigeo_birth[0]->id;
        
        $user_to_update->save();

        $patient_to_update->civil_status_id = $request->get('civil_status_id');
        $patient_to_update->degree_instruction_id = $request->get('degree_instruction_id');
        $patient_to_update->ocupation = $request->get('ocupation');
        
        $patient_to_update->save();
        
        $tutor_patient = TutorPatient::where('user_id', $request->get('idtutor'))->get();
        if(count($tutor_patient) > 0) {
            $tutor_to_update = TutorPatient::firstOrFail($tutor_patient[0]->id);
            $tutor_to_update->vinculo = $request->get('vinculo');
            $tutor_to_update->ocupation = $request->get('ocupation_tutor');
            $tutor_to_update->type_document_id = $request->get('type_document_id_tutor');
            $tutor_to_update->numdoc = $request->get('numdoc_tutor');

            $tutor_to_update->save();
        }

        return response()->json(['message' => 'Actualizacion de datos del paciente', 'state' => true, 'code' => 201]);

    }

    public Function vexSolucionesActualizarEstadoConsulta(Request $request) 
    {
        $query = QueryOffline::where('id', $request->get('query_offline_id'))->get();

        if(count($query) == 0) {
            return response()->json(['message' => 'No se encontro la consulta', 'state' => false, 'code' => 404]);
        }
        
        if(
            $request->get('state') != 'pendiente triaje' &&
            $request->get('state') != 'pendiente atencion' &&
            $request->get('state') != 'en consulta' &&
            $request->get('state') != 'atendido'
        ) {
            return response()->json(['message' => 'Estado de consulta no valido', 'state' => false, 'code' => 404]);
        }

        $query_to_update = QueryOffline::findOrFail($query[0]->id);

        $query_to_update->state = $request->get('state');

        $query_to_update->save();

        return response()->json(['message' => 'Actualizacion de estado', 'state' => true, 'code' => 201]);
    }

    public function vexSolucionesObtenerConsulta($id) 
    {
        $query = QueryOffline::where('id', $id)->get();
        if(count($query) == 0){
            return response()->json(['message' => 'No se encontro la consulta', 'state' => false, 'code' => 404]);
        }

        $patient = Patient::where('id', $query[0]->id)->get();
        $user = User::where('id', $patient[0]->users_id)->get();


        $generalRecord = GeneralRecordPatient::where('patient_id', $query[0]->patient_id)->get();
        
        if($user[0]->gender == 2) {
            $ginecologicalRecord = GinecologicalRecordPatient::where('patient_id', $query[0]->patient_id)->get();
        }else {
            $ginecologicalRecord = [];
        }

        $pathologicalRecord = RecordPathologicalPatient::where('patient_id', $query[0]->patient_id)->get();
        $pathologicalRecordFamiliar = RecordPathologicalFamilyPatient::where('patient_id', $query[0]->patient_id)->get();
        
        $physical = Physical_exams::where('query_offline_id', $query[0]->id)->get();
        $current = Current_diseases::where('query_offline_id', $query[0]->id)->get();
        $diagnostic = Diagnostic::where('query_offline_id', $query[0]->id)->get();
        $treatment = Treatment::where('query_offline_id', $query[0]->id)->get();

        foreach ($treatment as $key => $treat) {
            $medicament = Medicament::where('treatment_id', $treatment[0]->id)->get();
            $treat['medicamentos'] = $medicament;
        }

        
        $order = OrderAnalysis::where('query_offline_id', $query[0]->id)->get();
        $procedure = Procedures::where('query_offline_id', $query[0]->id)->get();

        $result = array(
            'antecedentes_generales' => $generalRecord,
            'antecedentes_ginecologicos' => $ginecologicalRecord,
            'antecedentes_patologico' => $pathologicalRecord,
            'antecedentes_patologico_familiar' => $pathologicalRecordFamiliar,
            'examen_fisico' => $physical,
            'enfermedad_actual' => $current,
            'diagnostico' => $diagnostic,
            'tratamiento' => $treatment,
            'order_analisis' => $order,
            'procedimientos' => $procedure,
        );

        return response()->json(['message' => 'consulta medica offline', 'state' => true, 'code' => 201, 'data' => $result]);
    }

    public function vexSolucionesRegistrarConsulta(Request $request) 
    {
        $patient = Patient::where('users_id', $request->get('patient_id'))->get();

        if(count($patient) == 0){
            return response()->json(['message' => 'Usuario paciente no encontrado', 'state' => false, 'code' => 404]);
        }

        $query_offline = array(
            "state" => 'pendiente triaje',
            "patient_id" => $patient[0]->id,
        );

        $queryOffline = QueryOffline::create($query_offline);

        return response()->json(['message' => 'Consulta medica registrada', 'state' => true, 'code' => 201]);
    }

    public function vexSolucionesActualizarConsulta(Request $request) 
    {
        $query_offline = QueryOffline::where('id', $request->get('query_offline_id'))->get();

        if(count($query_offline) == 0) {
            return response()->json(['message' => 'Consulta medica no encontrada', 'state' => false, 'code' => 404]);
        }

        $query_to_update = QueryOffline::findOrFail($query_offline[0]->id);

        if($query_offline[0]->state == 'atendido') {
            $doctor = Doctor::where('users_id', $request->get('doctor_update_id'))->get();
            
            $antecedente_general = GeneralRecordPatient::where('id', $request->get('antecedente_general')['id'])->get();
            if(count($antecedente_general) == 0) {
                return response()->json(['message' => 'Antecedente general no encontrado', 'state' => false, 'code' => 404]);
            }
            
            $antecedente_general = GeneralRecordPatient::findOrFail($request->get('antecedente_general')['id']);
            
            $antecedente_general->medicaments = $request->get('antecedente_general')['medicaments'];
            $antecedente_general->RAM = $request->get('antecedente_general')['RAM'];
            $antecedente_general->occupational = $request->get('antecedente_general')['occupational'];
            $antecedente_general->general_prenatal_id = $request->get('antecedente_general')['general_prenatal_id'];
            $antecedente_general->general_birth_id = $request->get('antecedente_general')['general_birth_id'];
            $antecedente_general->general_immunization_id = $request->get('antecedente_general')['general_immunization_id'];
            $antecedente_general->harmful_habits_id = $request->get('antecedente_general')['harmful_habits_id'];
            $antecedente_general->save();
            
            if($request->get('antecedente_ginecologico')) {
                
                $antecedente_ginecologico = GinecologicalRecordPatient::where('id', $request->get('antecedente_ginecologico')['id'])->get();
                if(count($antecedente_ginecologico) == 0) {
                    return response()->json(['message' => 'Antecedente ginecologico no encontrado', 'state' => false, 'code' => 404]);
                }
                
                $antecedente_ginecologico = GinecologicalRecordPatient::findOrFail($request->get('antecedente_ginecologico')['id']);
                
                $antecedente_ginecologico->menarquia = $request->get('antecedente_ginecologico')['menarquia'];
                $antecedente_ginecologico->regular_rule = $request->get('antecedente_ginecologico')['regular_rule'];
                $antecedente_ginecologico->r_caternial = $request->get('antecedente_ginecologico')['r_caternial'];
                $antecedente_ginecologico->rs = $request->get('antecedente_ginecologico')['rs'];
                $antecedente_ginecologico->fur = $request->get('antecedente_ginecologico')['fur'];
                $antecedente_ginecologico->fpp = $request->get('antecedente_ginecologico')['fpp'];
                $antecedente_ginecologico->disminorrea = $request->get('antecedente_ginecologico')['disminorrea'];
                $antecedente_ginecologico->nro_gestaciones = $request->get('antecedente_ginecologico')['nro_gestaciones'];
                $antecedente_ginecologico->fup = $request->get('antecedente_ginecologico')['fup'];
                $antecedente_ginecologico->pariedad = $request->get('antecedente_ginecologico')['pariedad'];
                $antecedente_ginecologico->cesareas = $request->get('antecedente_ginecologico')['cesareas'];
                $antecedente_ginecologico->pap = $request->get('antecedente_ginecologico')['pap'];
                $antecedente_ginecologico->mamografia = $request->get('antecedente_ginecologico')['mamografia'];
                $antecedente_ginecologico->mac = $request->get('antecedente_ginecologico')['mac'];
                $antecedente_ginecologico->otros = $request->get('antecedente_ginecologico')['otros'];
                
                $antecedente_ginecologico->save();
                
            }
            
            $rows = $request->get('antecedente_patologico')['patologico_to_delete'];
            
            foreach ($rows as $key => $id) {
                $pt = RecordPathologicalPatient::where('id', $id)->get();
                if(count($pt) == 0){
                    return response()->json(['message' => 'Patologico a eliminar no encontrado', 'state' => false, 'code' => 404]);
                }
                $patologico = RecordPathologicalPatient::findOrFail($id);
                $patologico->delete();
            }
            
            $recordPathological = $request->get('antecedente_patologico')['patologico_data'];
            
            foreach ($recordPathological as $key => $record) {
                $recordP = array(
                    'CIE' => $record['CIE'],
                    'description' => $record['description'],
                    'patient_id' => $query_to_update->patient_id,
                );
                RecordPathologicalPatient::create($recordP);
            }

            
            $rows = $request->get('antecedente_patologico_familiar')['patologico_to_delete'];
            
            foreach ($rows as $key => $id) {
                $pt = RecordPathologicalFamilyPatient::where('id', $id)->get();
                if(count($pt) == 0){
                    return response()->json(['message' => 'Patologico familiar a eliminar no encontrado', 'state' => false, 'code' => 404]);
                }
                $patologico =  RecordPathologicalFamilyPatient::findOrFail($id);
                $patologico->delete();
            }
            
            $recordPathologicalFamiliar = $request->get('antecedente_patologico_familiar')['patologico_familiar_data'];
            
            foreach ($recordPathologicalFamiliar as $key => $record) {
                $recordPF = array(
                    'CIE' => $record['CIE'],
                    'description' => $record['description'],
                    'familiar' => $record['familiar'],
                    'patient_id' => $query_to_update->patient_id,
                    
                );
                RecordPathologicalFamilyPatient::create($recordPF);
                
            }
            
            $examen_fisico = Physical_exams::where('id', $request->get('examen_fisico')['id'])->get();
            
            if(count($examen_fisico) == 0) {
                return response()->json(['message' => 'Examen fisico no encontrado', 'state' => false, 'code' => 404]);
            }
            
            $examen_fisico = Physical_exams::findOrFail($request->get('examen_fisico')['id']);
            
            $examen_fisico->consciousness_state = $request->get('examen_fisico')['consciousness_state'];
            $examen_fisico->physical_examination = $request->get('examen_fisico')['physical_examination'];
            $examen_fisico->general_status_id = $request->get('examen_fisico')['general_status_id'];
            
            $examen_fisico->save();
            
            $enfermedad_actual = Current_diseases::where('id', $request->get('enfermedad_actual')['id'])->get();
            
            if(count($enfermedad_actual) == 0) {
                return response()->json(['message' => 'Enfermedad actual no encontrado', 'state' => false, 'code' => 404]);
            }
            
            $enfermedad_actual = Current_diseases::findOrFail($request->get('enfermedad_actual')['id']);
            
            $enfermedad_actual->reason_consultation = $request->get('enfermedad_actual')['reason_consultation'];
            $enfermedad_actual->sign_sympthoms = $request->get('enfermedad_actual')['sign_sympthoms'];
            $enfermedad_actual->start_form = $request->get('enfermedad_actual')['start_form'];
            $enfermedad_actual->sickness_time = $request->get('enfermedad_actual')['sickness_time'];
            $enfermedad_actual->type_informant = $request->get('enfermedad_actual')['type_informant'];
            $enfermedad_actual->chronological_story = $request->get('enfermedad_actual')['chronological_story'];
            $enfermedad_actual->type_informant_id = $request->get('enfermedad_actual')['type_informant_id'];
            $enfermedad_actual->appetite_id = $request->get('enfermedad_actual')['appetite_id'];
            $enfermedad_actual->dream_id = $request->get('enfermedad_actual')['dream_id'];
            $enfermedad_actual->deposition_id = $request->get('enfermedad_actual')['deposition_id'];
            $enfermedad_actual->thirst_id = $request->get('enfermedad_actual')['thirst_id'];
            $enfermedad_actual->urine_id = $request->get('enfermedad_actual')['urine_id'];
            
            $enfermedad_actual->save();
            
            $rows = $request->get('diagnostico')['diagnostico_delete'];
            
            foreach ($rows as $key => $id) {
                $dia = Diagnostic::where('id', $id)->get();
                if(count($dia) == 0){
                    return response()->json(['message' => 'Diagnostico a eliminar no encontrado', 'state' => false, 'code' => 404]);
                }
                $diagnostico =  Diagnostic::findOrFail($id);
                $diagnostico->delete();
            }
            
            $diagnostico = $request->get('diagnostico')['diagnostico_data'];
            
            foreach ($diagnostico as $key => $diag) {
                $d = array(
                    'code' => $diag['code'],
                    'description' => $diag['description'],
                    'type_diagnostic_id' => $diag['type_diagnostic_id'],
                    'query_offline_id' => $query_to_update->id,
                );
                
                Diagnostic::create($d);
                
            }
            
            
            $tratamiento = Treatment::where('id', $request->get('tratamiento')['id'])->get();
            
            if(count($tratamiento) == 0) {
                return response()->json(['message' => 'Tratamiento no encontrado', 'state' => false, 'code' => 404]);
            }
            
            $tratamiento = Treatment::findOrFail($request->get('tratamiento')['id']);
            
            $tratamiento->validity = $request->get('tratamiento')['validity'];
            $tratamiento->date = $request->get('tratamiento')['date'];
            $tratamiento->general_recomendation = $request->get('tratamiento')['general_recomendation'];
            $tratamiento->state_notification = 0;
            
            $tratamiento->save();
            
            $rows = $request->get('tratamiento')['medicamentos_delete'];
            
            foreach ($rows as $key => $id) {
                $med = Medicament::where('id', $id)->get();
                if(count($med) == 0){
                    return response()->json(['message' => 'Medicamento a eliminar no encontrado', 'state' => false, 'code' => 404]);
                }
                $medicament =  Medicament::findOrFail($id);
                $medicament->delete();
            }
            
            $medicaments = $request->get('tratamiento')['medicamentos'];
            
            foreach ($medicaments as $key => $medicament) {
                $medi = array(
                    'medicine' => $medicament['medicine'],                
                    'treatment' => $medicament['treatment'],                
                    'way_administration' => $medicament['way_administration'],                
                    'presentation' => $medicament['presentation'],                
                    'dose' => $medicament['dose'],                
                    'price' => $medicament['price'],                
                    'sku' => $medicament['sku'],                
                    'um' => $medicament['um'],                
                    'treatment_id' => $tratamiento->id,                
                );
                Medicament::create($medi);
            }
            
            $rows = $request->get('ordenes_analisis')['ordenes_delete'];
            
            foreach ($rows as $key => $id) {
                $ord = OrderAnalysis::where('id', $id)->get();
                if(count($ord) == 0){
                    return response()->json(['message' => 'Orden de analisis a eliminar no encontrado', 'state' => false, 'code' => 404]);
                }
                $orden =  OrderAnalysis::findOrFail($id);
                $orden->delete();
            }
            
            $ordenes = $request->get('ordenes_analisis')['ordenes_data'];
            
            foreach ($ordenes as $key => $ord) {
                $orden = array(
                    'patient_id' => $query_to_update->patient_id,                
                    'doctor_id' => $query_to_update->doctor_id,                
                    'state' => 'pendiente',                
                    'state_notification' => 'pendiente',                
                    'details' => $ord['details'],                
                    'price' => $ord['price'],                
                    'status' => 0,                
                    'consideration' => $ord['consideration'],                
                    'query_offline_id' => $query_to_update->id,   
                );
                OrderAnalysis::create($orden);
            }
            
            $procedimiento = Procedures::where('id', $request->get('procedimientos')['id'])->get();
            
            if(count($procedimiento) == 0) {
                return response()->json(['message' => 'Procedimiento no encontrado', 'state' => false, 'code' => 404]);
            }
            
            $procedimiento = Procedures::findOrFail($request->get('procedimientos')['id']);
            
            $procedimiento->procedure = $request->get('procedimientos')['procedure'];
            $procedimiento->interconsultation = $request->get('procedimientos')['interconsultation'];
            $procedimiento->transfer = $request->get('procedimientos')['transfer'];
            $procedimiento->medical_rest_start = $request->get('procedimientos')['medical_rest_start'];
            $procedimiento->medical_rest_end = $request->get('procedimientos')['medical_rest_end'];
            $procedimiento->next_date = $request->get('procedimientos')['next_date'];
            
            $procedimiento->save();

            return response()->json(['message' => 'Consulta médica actualizada', 'state' => true, 'code' => 201]);

        }else {
            return response()->json(['message' => 'La consulta médica debe ser atendida', 'state' => false, 'code' => 404]);
        }

    }

    public function vexSolucionesActualizarConsultaPrimeraVez(Request $request) 
    {
        $query_offline = QueryOffline::where('id', $request->get('query_offline_id'))->get();

        if(count($query_offline) == 0) {
            return response()->json(['message' => 'Consulta medica no encontrada', 'state' => false, 'code' => 404]);
        }

        $query_to_update = QueryOffline::findOrFail($query_offline[0]->id);

        if($query_offline[0]->state == 'pendiente consulta'){
            $generalRecord = array(
                'medicaments' => $request->get('antecedente_general')['medicaments'],
                'RAM' => $request->get('antecedente_general')['RAM'],
                'occupational' => $request->get('antecedente_general')['occupational'],
                'general_prenatal_id' => $request->get('antecedente_general')['general_prenatal_id'],
                'general_birth_id' => $request->get('antecedente_general')['general_birth_id'],
                'general_immunization_id' => $request->get('antecedente_general')['general_immunization_id'],
                'harmful_habits_id' => $request->get('antecedente_general')['harmful_habits_id'],
                'patient_id' => $query_to_update->patient_id
            );
            GeneralRecordPatient::create($generalRecord);
    
            if($request->get('antecedente_ginecologico')) {
                $ginecologicalRecord = array(
                    'menarquia' => $request->get('antecedente_ginecologico')['menarquia'],
                    'regular_rule' => $request->get('antecedente_ginecologico')['regular_rule'],
                    'r_caternial' => $request->get('antecedente_ginecologico')['r_caternial'],
                    'rs' => $request->get('antecedente_ginecologico')['rs'],
                    'fur' => $request->get('antecedente_ginecologico')['fur'],
                    'fpp' => $request->get('antecedente_ginecologico')['fpp'],
                    'disminorrea' => $request->get('antecedente_ginecologico')['disminorrea'],
                    'nro_gestaciones' => $request->get('antecedente_ginecologico')['nro_gestaciones'],
                    'fup' => $request->get('antecedente_ginecologico')['fup'],
                    'pariedad' => $request->get('antecedente_ginecologico')['pariedad'],
                    'cesareas' => $request->get('antecedente_ginecologico')['cesareas'],
                    'pap' => $request->get('antecedente_ginecologico')['pap'],
                    'mamografia' => $request->get('antecedente_ginecologico')['mamografia'],
                    'mac' => $request->get('antecedente_ginecologico')['mac'],
                    'otros' => $request->get('antecedente_ginecologico')['otros'],
                    'patient_id' => $query_to_update->patient_id,
                );
    
                GinecologicalRecordPatient::create($ginecologicalRecord);
            }
    
            $recordPathological = $request->get('antecedente_patologico')['patologico_data'];
    
            foreach ($recordPathological as $key => $record) {
                $recordP = array(
                    'CIE' => $record['CIE'],
                    'description' => $record['description'],
                    'patient_id' => $query_to_update->patient_id,
                );
                RecordPathologicalPatient::create($recordP);
            }
    
            $recordPathologicalFamiliar = $request->get('antecedente_patologico_familiar')['patologico_familiar_data'];
    
            foreach ($recordPathologicalFamiliar as $key => $record) {
                $recordPF = array(
                    'CIE' => $record['CIE'],
                    'description' => $record['description'],
                    'familiar' => $record['familiar'],
                    'patient_id' => $query_to_update->patient_id,
    
                );
                RecordPathologicalFamilyPatient::create($recordPF);
            }
    
            $physical_exam = array(
                'consciousness_state' => $request->get('examen_fisico')['consciousness_state'],
                'physical_examination' => $request->get('examen_fisico')['physical_examination'],
                'query_offline_id' => $query_to_update->id,
                'general_status_id' => $request->get('examen_fisico')['general_status_id'],
            );

            
            Physical_exams::create($physical_exam);
    
            $current_disease = array(
                'reason_consultation' => $request->get('enfermedad_actual')['reason_consultation'],
                'sign_sympthoms' => $request->get('enfermedad_actual')['sign_sympthoms'],
                'start_form' => $request->get('enfermedad_actual')['start_form'],
                'sickness_time' => $request->get('enfermedad_actual')['sickness_time'],
                'type_informant' => $request->get('enfermedad_actual')['type_informant'],
                'chronological_story' => $request->get('enfermedad_actual')['chronological_story'],
                'type_informant_id' => $request->get('enfermedad_actual')['type_informant_id'],
                'appetite_id' => $request->get('enfermedad_actual')['appetite_id'],
                'dream_id' => $request->get('enfermedad_actual')['dream_id'],
                'deposition_id' => $request->get('enfermedad_actual')['deposition_id'],
                'thirst_id' => $request->get('enfermedad_actual')['thirst_id'],
                'urine_id' => $request->get('enfermedad_actual')['urine_id'],
                'thirst_id' => $request->get('enfermedad_actual')['thirst_id'],
                'query_offline_id' => $query_to_update->id,
            );
            
            Current_diseases::create($current_disease);
    
            $diagnostic = $request->get('diagnostico')['diagnostico_data'];
            
            foreach ($diagnostic as $key => $diagnos) {
                $d = array(
                    'code' => $diagnos['code'],
                    'description' => $diagnos['description'],
                    'type_diagnostic_id' => $diagnos['type_diagnostic_id'],
                    'query_offline_id' => $query_to_update->id,
                );
    
                Diagnostic::create($d);
            };
    
            $treatment = array(
                'validity' => $request->get('tratamiento')['validity'],                
                'date' => $request->get('tratamiento')['validity'],                
                'general_recomendation' => $request->get('tratamiento')['general_recomendation'],                
                'indicacion_general' => $request->get('tratamiento')['indicacion_general'],                
                'state_notification' => 0,                
                'query_offline_id' => $query_to_update->id,                
            );
    
            $treat = Treatment::create($treatment);
            $medicaments = $request->get('tratamiento')['medicamentos'];
    
            foreach ($medicaments as $key => $medicament) {
                $medi = array(
                    'medicine' => $medicament['medicine'],                
                    'treatment' => $medicament['treatment'],                
                    'way_administration' => $medicament['way_administration'],                
                    'presentation' => $medicament['presentation'],                
                    'dose' => $medicament['dose'],                
                    'price' => $medicament['price'],                
                    'sku' => $medicament['sku'],                
                    'um' => $medicament['um'],                
                    'treatment_id' => $treat->id,                
                );
                Medicament::create($medi);
            }
    
            $orders = $request->get('ordenes_analisis')['ordenes_data'];
    
            foreach ($orders as $key => $order) {
            
                $ord = array(
                    'patient_id' => $query_to_update->patient_id,                
                    'doctor_id' => $query_to_update->doctor_id,                
                    'state' => 'pendiente',                
                    'state_notification' => 'pendiente',                
                    'details' => $order['details'],                
                    'price' => $order['price'],                
                    'status' => 0,                
                    'consideration' => $order['consideration'],                
                    'query_offline_id' => $query_to_update->id,                
                );
    
                OrderAnalysis::create($ord);
            }
    
            $procedure = array(
                'procedure' => $request->get('procedimientos')['procedure'],                
                'interconsultation' => $request->get('procedimientos')['interconsultation'],                
                'transfer' => $request->get('procedimientos')['transfer'],                
                'medical_rest_start' => $request->get('procedimientos')['medical_rest_start'],                
                'medical_rest_end' => $request->get('procedimientos')['medical_rest_end'],                
                'next_date' => $request->get('procedimientos')['next_date'],                
                'query_offline_id' => $query_to_update->id,                
            );
    
            Procedures::create($procedure);
    
            $query_to_update->state = 'atendido';
            $query_to_update->save();

            return response()->json(['message' => 'Consulta medica registrada', 'state' => true, 'code' => 201]);
        }else {
            return response()->json(['message' => 'La consulta medica debe de asignarse a un doctor', 'state' => false, 'code' => 404]);

        }
    }

    public function vexSolucionesObtenerAntecedenteGeneral($id) 
    {
        $antecedente_general = GeneralRecordPatient::where('id', $id)->get();
        if(count($antecedente_general) == 0) {
            return response()->json(['message' => 'Antecedente general no encontrado', 'code' => 404, 'state' => false]);
        }

        $antecedente_general = GeneralRecordPatient::findOrFail($id);

        return response()->json(['message' => 'Antecedente general encontrado', 'code' => 201, 'state' => true, 'data' => $antecedente_general]);
    }
    
    public function vexSolucionesObtenerAntecedenteGinecologico($id) 
    {
        
        $antecedente_ginecologico = GinecologicalRecordPatient::where('id', $id)->get();
        if(count($antecedente_ginecologico) == 0) {
            return response()->json(['message' => 'Antecedente ginecologico no encontrado', 'code' => 404, 'state' => false]);
        }

        $antecedente_ginecologico = GinecologicalRecordPatient::findOrFail($id);

        return response()->json(['message' => 'Antecedente ginecologico encontrado', 'code' => 201, 'state' => true, 'data' => $antecedente_ginecologico]);
        
    }
    
    public function vexSolucionesObtenerAntecedentePatologico($id) 
    {
        ;
        $antecedente_patologico = RecordPathologicalPatient::where('id', $id)->get();
        if(count($antecedente_patologico) == 0) {
            return response()->json(['message' => 'Antecedente patologico no encontrado', 'code' => 404, 'state' => false]);
        }

        $antecedente_patologico = RecordPathologicalPatient::findOrFail($id);

        return response()->json(['message' => 'Antecedente patologico encontrado', 'code' => 201, 'state' => true, 'data' => $antecedente_patologico]);
        
    }
    
    public function vexSolucionesObtenerAntecedentePatologicoFamiliar($id) 
    {
        $antecedente_patologico_familiar = RecordPathologicalFamilyPatient::where('id', $id)->get();
        if(count($antecedente_patologico_familiar) == 0) {
            return response()->json(['message' => 'Antecedente patologico familiar no encontrado', 'code' => 404, 'state' => false]);
        }

        $antecedente_patologico_familiar = RecordPathologicalFamilyPatient::findOrFail($id);

        return response()->json(['message' => 'Antecedente patologico familiar encontrado', 'code' => 201, 'state' => true, 'data' => $antecedente_patologico_familiar]);
        
    }

    public function vexSolucionesObtenerOrdenesConsultas() 
    {
        $ordenes = OrderAnalysis::all();
        $consultas = QueryOffline::all();
        
        $orders = [];

        foreach ($ordenes as $key => $orden) {
            $orden["differentiator"] = 'orden';
            $patient = Patient::where('id', $orden->patient_id)->get();
            $user = User::where('id', $patient[0]->users_id)->get();
            $orden["patient"] = array(
                "name" => $user[0]->name,
                "lastname" => $user[0]->last_name
            );

            $orden["details"] = json_decode($orden["details"], true)['data'];
            array_push($orders, $orden);
        }

       
        $consults = [];
        foreach ($consultas as $key => $consulta) {
            $consulta['differentiator'] = 'consulta';
            $patient = Patient::where('id', $consulta->patient_id)->get();
            $user = User::where('id', $patient[0]->users_id)->get();
            $consulta["patient"] = array(
                "name" => $user[0]->name,
                "lastname" => $user[0]->last_name
            );
            array_push($consults, $consulta);
        }

        $data = array_merge($orders, $consults);

        usort($data, function($a, $b) {
            return strtotime($a['created_at']) - strtotime($b['created_at']);
        });

        return response()->json(['message' => 'Listado exitoso', 'status' => true, 'data' => $data]);
    }


    















    
    // actualizar estado de una consulta offline 'pendiente triaje', 'pendiente atencion', 'en consulta', 'atendido'
    public function updateStateQueryOffline(Request $request) 
    {
        $queryOfflineId = $request->get('query_offline_id');
        $state = $request->get('state');

        $queryOffline = QueryOffline::findOrFail($queryOfflineId);
        if ($queryOffline) {
            $queryOffline->state = $state;
            $queryOffline->save();
            return response()->json(['estado' => true, 'code' => '200', 'message' => "Actualizacion de consulta actualizada", 'data' => []]);
        } else {
            return response()->json(['estado' => false, 'code' => '404', 'message' => "Consulta no encontrada", 'data' => []]);
        }
    }

    // registrar enfermedad actual
    public function saveCurrentDisease(Request $request) 
    {
        $fields = array(
            "reason_consultation" => $request->get('reason_consultation'),
            "sign_sympthoms" => $request->get('sign_sympthoms'),
            "start_form" => $request->get('start_form'),
            "sickness_time" => $request->get('sickness_time'),
            "type_informant" => $request->get('type_informant'),
            "chronological_story" => $request->get('chronological_story'),
            "type_informant_id" => $request->get('type_informant_id'),
            "appetite_id" => $request->get('appetite_id'),
            "dream_id" => $request->get('dream_id'),
            "deposition_id" => $request->get('deposition_id'),
            "thirst_id" => $request->get('thirst_id'),
            "urine_id" => $request->get('urine_id'),
            "query_id" => $request->get('query_id'),
        );

        $currentDiseases = Current_diseases::create($fields);
        
        if(count($request->get('other_notes')) > 0){
            foreach ($request->get('other_notes') as $key => $element) {
                $note = new NoteOther();
                $note->body_note = $element['body_note'];
                $note->estado = '1';
                $note->table_id = $element['table_id'];
                $note->category_note  = 'query';
                $note->save();
            }
        }
        
        return response()->json(['status' => true, 'code' => '200', 'message' => "Peticion exitosa", 'data' => $currentDiseases]);
    }

    // actualizar enfermedad actual
    public function updateCurrentDisease(Request $request) 
    {
        $currentDiseaseId = $request->get('currentDiseaseId');

        $currentDisease = Current_diseases::findOrFail($currentDiseaseId);
        $currentDisease->reason_consultation = $request->get('reason_consultation');
        $currentDisease->sign_sympthoms = $request->get('sign_sympthoms');
        $currentDisease->start_form = $request->get('start_form');
        $currentDisease->sickness_time = $request->get('sickness_time');
        $currentDisease->type_informant = $request->get('type_informant');
        $currentDisease->chronological_story = $request->get('chronological_story');
        $currentDisease->type_informant_id = $request->get('type_informant_id');
        $currentDisease->appetite_id = $request->get('appetite_id');
        $currentDisease->dream_id = $request->get('dream_id');
        $currentDisease->deposition_id = $request->get('deposition_id');
        $currentDisease->thirst_id = $request->get('thirst_id');
        $currentDisease->urine_id = $request->get('urine_id');
        $currentDisease->query_id = $request->get('query_id');

        $currentDiseaseUpdated = $currentDisease->save();

        return response()->json(['estado' => true, 'code' => '200', 'message' => "Peticion exitosa", 'data' => $currentDiseaseUpdated]);
    }

    // registrar examen fisico
    public function savePhysicalExam(Request $request) 
    {
        $fields = $request->all();
        $physicalExam = Physical_exams::create($fields);

        return response()->json(['estado' => true, 'code' => '200', 'message' => "Peticion exitosa", 'data' => $physicalExam]);
    }

    // actualizar examen fisico
    public function updatePhysicalExam(Request $request) 
    {
        $physicalExamId = $request->get('physicalExamId');

        $physicalExam = Physical_exams::findOrFail($physicalExamId);

        $physicalExam->consciousness_state = $request->get('consciousness_state');
        $physicalExam->physical_examination = $request->get('physical_examination');
        $physicalExam->query_id = $request->get('query_id');
        $physicalExam->general_status_id = $request->get('general_status_id');

        $physicalExamUpdated = $physicalExam->save();

        return response()->json(['estado' => true, 'code' => '200', 'message' => "Peticion exitosa", 'data' => $physicalExamUpdated]);
    }

    // busqueda de diagnostico - autocomplete
    public function autocompleteDiagnostic($word) 
    {
        $typeDiagnostic = TypeDiagnostic::where('name', 'LIKE', $word . '%')->get();
        return response()->json(['estado' => true, 'code' => '200', 'message' => "Petición Exitoso", 'data' => $typeDiagnostic]);
    }

    // registrar diagnostico
    public function saveDiagnostic(Request $request) 
    {
        $data = $request->get('data');

        foreach ($data as $key => $element) {
            $fields = array(
                "code" => $element['code'],
                "description" => $element['description'], 
                "type_diagnostic_id" => $element['type_diagnostic_id'],
                "query_id" => $request->get('query_id')
            );
            $diagnostic = Diagnostic::create($fields);
        }

        return response()->json(['status' => true, 'code' => '200', 'message' => "Petición Exitoso", 'data' => $data]);
    }

    // actualizar diagnostico
    public function updateDiagnostic(Request $request) 
    {
        $diagnosticId = $request->get('diagnosticId');

        $diagnostic = Diagnostic::findOrFail($diagnosticId);

        $diagnostic->diagnostic_data_id = $request->get('diagnostic_data_id');
        $diagnostic->type_diagnostic_id = $request->get('type_diagnostic_id');
        $diagnostic->query_id = $request->get('query_id');

        $diagnostic->save();

        return response()->json(['estado' => true, 'code' => '200', 'message' => "Petición Exitoso", 'data' => $diagnostic]);
    }

    // registrar examen auxiliar
    public function saveAuxiliaryExam(Request $request) 
    {
        $fields = $request->all();
        $auxiliaryExam = Auxiliary_exams::create($fields);

        return response()->json(['estado' => true, 'code' => '200', 'message' => "Petición Exitoso", 'data' => $auxiliaryExam]);
    }

    // actualizar examen auxiliar
    public function updateAuxiliaryExam(Request $request) 
    {
        $auxiliaryExamId = $request->get('auxiliaryExamId');

        $auxiliaryExam = Auxiliary_exams::findOrFail($auxiliaryExamId);

        $auxiliaryExam->laboratory = $request->get('laboratory');
        $auxiliaryExam->imaging = $request->get('imaging');
        $auxiliaryExam->query_id = $request->get('query_id');

        $auxiliaryExam->save();

        return response()->json(['estado' => true, 'code' => '200', 'message' => "Petición Exitoso", 'data' => $auxiliaryExamId]);
    }

    // registrar procedimientos u otros
    public function saveProcedures(Request $request) 
    {
        $fields = $request->all();
        $procedure = Procedures::create($fields);

        return response()->json(['estado' => true, 'code' => '200', 'message' => "Petición Exitoso", 'data' => $procedure]);
    }

    // actualizar procedimientos u otros
    public function updateProcedures(Request $request) 
    {
        $procedureId = $request->get('procedureId');

        $procedure = Procedures::findOrFail($procedureId);

        $procedure->procedure = $request->get('procedure');
        $procedure->interconsultation = $request->get('interconsultation');
        $procedure->transfer = $request->get('transfer');
        $procedure->medical_rest_start = $request->get('medical_rest_start');
        $procedure->medical_rest_end = $request->get('medical_rest_end');
        $procedure->next_date = $request->get('next_date');
        $procedure->query_id = $request->get('query_id');

        $procedureUpdated = $procedure->save();

        return response()->json(['estado' => true, 'code' => '200', 'message' => "Petición Exitoso", 'data' => $procedureUpdated]);
    }

    public function saveQueryOffline(Request $request) 
    {
        $fields = $request['queryOffline'];
        $fields['state'] = 'pendiente triaje';
        $voucherId = $fields['voucher_id'];
        $patientId = $request['patient_id'];        

        $voucher = Voucher::findOrFail($voucherId);
        if ($voucher) {
            $voucher->patient_id = $patientId;
            $voucher->state = 'cancelado';
            $voucherUpdated = $voucher->save();
            $queryoffline = QueryOffline::create($fields);
            return response()->json(['estado' => true, 'code' => '200', 'message' => "Petición Exitoso", 'data' => $queryoffline]);
        }
    }

    public function updateQueryOffline(Request $request) 
    {
        $queryfflineId = $request->get('queryOfflineId');

        $queryoffline = QueryOffline::findOrFail($queryfflineId);

        $queryoffline->state = $request->get('state');
        $queryoffline->voucher_id = $request->get('voucher_id');
        $queryoffline->doctor_id = $request->get('doctor_id');
        $queryoffline->receipt_id = $request->get('receipt_id');
        $queryofflineUpdated = $queryoffline->save();

        return response()->json(['estado' => true, 'code' => '200', 'message' => "Petición Exitoso", 'data' => $queryofflineUpdated]);
    }

    public function changeStateQueryOffline(Request $request) 
    {

        $queryfflineId = $request->get('queryOfflineId');
        $queryoffline = QueryOffline::findOrFail($queryfflineId);
        $estados = array('pendiente triaje', 'pendiente atencion', 'en consulta', 'atendido');
        if (in_array($request->get('state'), $estados)) {
            $queryoffline->state = $request->get('state');
            $queryofflineUpdated = $queryoffline->save();
            return response()->json(['estado' => true, 'code' => '200', 'message' => "Petición Exitoso", 'data' => $queryofflineUpdated]);
        } else {
            return response()->json(['estado' => false, 'code' => 404, 'message' => "Error, estado no valido", 'data' => []]);
        }
    }

    public function saveTreatments(Request $request) {

        $fields = $request->all();
        if ($request->get('query_offline_id') != null) {
            $treatment = Treatment::create($fields);
            return response()->json(['estado' => true, 'code' => '200', 'message' => "Petición Exitoso", 'data' => $treatment]);
        } else {
            return response()->json(['estado' => false, 'code' => 404, 'message' => "Error, identificador de consultas requerido", 'data' => []]);
        }
    }

    public function updateTreatments(Request $request) {
        $treatmentId = $request->get('treatmentId');
        if ($request->get('query_offline_id') != null) {
            $treatment = Treatment::findOrFail($treatmentId);

            $treatment->validity = $request->get('validity');
            $treatment->date = $request->get('date');
            $treatment->general_recomendation = $request->get('general_recomendation');
            $treatment->state_notification = $request->get('state_notification');
            $treatment->query_offline_id = $request->get('query_offline_id');
            $treatmentUpdated = $treatment->save();

            return response()->json(['estado' => true, 'code' => '200', 'message' => "Petición Exitoso", 'data' => $treatmentUpdated]);
        } else {
            return response()->json(['estado' => false, 'code' => 404, 'message' => "Error, identificador de consultas requerido", 'data' => []]);
        }
    }

    public function listAllData($fechaDe, $fechaHasta) {
        $data = QueryOffline::where(DB::raw("DATE(created_at)"), '>=', $fechaDe)
                ->where(DB::raw("DATE(created_at)"), '<=', $fechaHasta)
                ->get();
        return response()->json(['estado' => true, 'code' => '200', 'message' => "Petición Exitosa", 'data' => $data]);
    }

    public function listAllDataQueryOffline($query_offline_id) {

        $data['current_diseases'] = Current_diseases::where('query_id', $query_offline_id)->get();
        $data['physical_exams'] = Physical_exams::where('query_id', $query_offline_id)->get();
        $data['diagnostic'] = Diagnostic::where('query_id', $query_offline_id)->get();
        $data['treatments'] = Treatment::where('query_offline_id', $query_offline_id)->get();
        $data['rrocedures'] = Procedures::where('query_id', $query_offline_id)->get();

        return response()->json(['estado' => true, 'code' => '200', 'message' => "Petición Exitosa", 'data' => $data]);
    }

    public function listoTodayQueryOffline() {
        $fecha = date('Y-m-d');
        $data = QueryOffline::where(DB::raw("DATE(created_at)"), '=', $fecha)
                ->whereIn('state', array("pendiente triaje", "pendiente atencion"))
                ->select('query_offlines.*', 
                        DB::raw("(SELECT CONCAT(name,' ',last_name) FROM users u INNER JOIN patients p ON u.id = p.users_id INNER JOIN "
                                . 'vouchers v ON p.id = v.patient_id'
                                . ' WHERE v.id = query_offlines.voucher_id) AS paciente'), 
                        DB::raw('(SELECT nro_medical_history FROM medical_histories mh INNER JOIN patients p '
                                . 'ON mh.patient_id = p.id INNER JOIN vouchers v ON p.id ='
                                . ' v.patient_id WHERE v.id = query_offlines.voucher_id) AS historia'), 
                        DB::raw('(SELECT birth_date FROM users u INNER JOIN patients p ON u.id = p.users_id INNER '
                                . 'JOIN vouchers v ON p.id = v.patient_id'
                                . ' WHERE v.id = query_offlines.voucher_id) AS edad'),
                        DB::raw("(SELECT CONCAT(name,' ',last_name) FROM users u INNER JOIN doctors d ON u.id = d.users_id "
                                . ' WHERE d.id = query_offlines.doctor_id) AS medico'), 
                        DB::raw("(SELECT specialty FROM doctors d  "
                                . ' WHERE d.id = query_offlines.doctor_id) AS especialidad'))
                ->get();
        return ['estado' => true, 'code' => '200', 'message' => "Petición Exitosa", 'data' => $data];
    }
    
    public function listTodayPenAtentionQueryOffline(Request $request) {
        $fecha = date('Y-m-d');
        $data = QueryOffline::where(DB::raw("DATE(created_at)"), '=', $fecha)
                ->whereIn('state', array("pendiente atencion"))->where('doctor_id',$request->get('doctor_id'))
                ->select('query_offlines.*', 
                        DB::raw("(SELECT CONCAT(name,' ',last_name) FROM users u INNER JOIN patients p ON u.id = p.users_id INNER JOIN "
                                . 'vouchers v ON p.id = v.patient_id'
                                . ' WHERE v.id = query_offlines.voucher_id) AS paciente'), 
                        DB::raw('(SELECT nro_medical_history FROM medical_histories mh INNER JOIN patients p '
                                . 'ON mh.patient_id = p.id INNER JOIN vouchers v ON p.id ='
                                . ' v.patient_id WHERE v.id = query_offlines.voucher_id) AS historia'), 
                        DB::raw('(SELECT birth_date FROM users u INNER JOIN patients p ON u.id = p.users_id INNER '
                                . 'JOIN vouchers v ON p.id = v.patient_id'
                                . ' WHERE v.id = query_offlines.voucher_id) AS edad'),
                        DB::raw("(SELECT CONCAT(name,' ',last_name) FROM users u INNER JOIN doctors d ON u.id = d.users_id "
                                . ' WHERE d.id = query_offlines.doctor_id) AS medico'), 
                        DB::raw("(SELECT specialty FROM doctors d  "
                                . ' WHERE d.id = query_offlines.doctor_id) AS especialidad'))
                ->get();
        return ['estado' => true, 'code' => '200', 'message' => "Petición Exitosa", 'data' => $data];
    }

}
