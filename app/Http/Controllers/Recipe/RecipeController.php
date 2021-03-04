<?php

namespace App\Http\Controllers\Recipe;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Treatment;
use App\Current_diseases;
use App\Biological_functions;
use App\Vital_functions;
use App\Physical_exams;
use App\Diagnostic;
use App\Medicament;
use App\Auxiliary_exams;
use App\Procedures;
use App\Query;
use App\QueryOffline;
use App\Patient;
use App\Doctor;
use App\User;
use Illuminate\Pagination\LengthAwarePaginator;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $recetas = Treatment::all();
        $recetas = Treatment::all();

        // return $recetas;
        return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Listado Exitoso", 'data'=>$recetas]);
    }

    public function getTreatmentByPaciente(Request $request)
    {
      // obtener id del paciente
      $patient_id = $request->get('patient_id');

      // obtener paciente x id
      $paciente = Patient::where('users_id', '=', $patient_id)->get();
      
      if(count($paciente) == 0){
        return response()->json(["message"=>"Usuario no encontrado", "status"=>false, "code"=>404]);
      }
      $vexSolucionesUserPaciente = \DB::table('users')
          ->where('users.id', $patient_id)
          ->get();

      // obtener todas las consultas del paciente
      $consulta = Query::where('patient_id', '=', $paciente[0]->id)->get();
      $treatment = [];
      
      // recorrer todas las consultas
      foreach ($consulta as $key => $value) {
        // obtener todos los tratamientos de la consulta
        $tratamientos = Treatment::where('query_id', '=', $value->id)->orderBy('id', 'DESC')->get();

        $doctor = Doctor::where('id', '=', $value->doctor_id)->get();

        $vexSolucionesUserDoctor = \DB::table('users')
          ->where('users.id', $doctor[0]->users_id)
          ->get();

        // recorrer los tratamientos
        foreach ($tratamientos as $key => $tratamiento) {
          // obtener los medicamentos
          $medicamentos = Medicament::where('treatment_id', '=', $tratamiento->id)->get();
          $lastNameDoctor = explode(" ", $vexSolucionesUserDoctor[0]->last_name);
          $tratamiento->patient_name = $vexSolucionesUserPaciente[0]->name . " " . $vexSolucionesUserPaciente[0]->last_name. '.';
          $tratamiento->patient_img = $vexSolucionesUserPaciente[0]->img;
          $tratamiento->doctor_name = $vexSolucionesUserDoctor[0]->name . " " . $lastNameDoctor[0] . '.';
          $tratamiento->doctor_img = $vexSolucionesUserDoctor[0]->img;
          $tratamiento->date = $tratamiento->created_at->format('d-m-Y');
          $tratamiento->sintoma = $value->symptom;
          
          // insertar en los tratamientos todos los medicamentos
          $diagnostics = Diagnostic::where('query_id', $tratamiento->query_id)->get();

          if( count($medicamentos) == 0 ){
            $tratamiento->medicamentos = $medicamentos;
          }else{
            $tratamiento->medicamentos = $medicamentos;
          }

          $tratamiento["diagnosticos"] = $diagnostics;
          array_push($treatment, $tratamiento);
        }
      }

      if(count($treatment) == 0){
        return response()->json(["message"=>"No se encontraron tratamientos del paciente", "status"=>false, "code"=>404]);
      }

      return response()->json(['status'=>true, 'code'=>200, 'message'=>"Listado de tratamientos exitoso", 'data'=>$treatment]);

    }

    public function getTreatmentByPacientePaginated(Request $request)
    {
      // obtener id del paciente
      $patient_id = $request->get('patient_id');

      // obtener paciente x id
      $paciente = Patient::where('users_id', '=', $patient_id)->get();
      
      if ( count($paciente) == 0 ) {

        return response()->json([ "message" => "Usuario no encontrado", "status"=>false, "code"=>404]);
        
      }

      $vexSolucionesUserPaciente = \DB::table('users')
          ->where('users.id', $patient_id)
          ->get();

      // obtener todas las consultas del paciente
      $consulta = Query::where('patient_id', $paciente[0]->id)->paginate(10);
      
      $treatment = [];
      // recorrer todas las consultas
      foreach ( $consulta as $key => $value ) {
        
        // obtener todos los tratamientos de la consulta
        $tratamientos = Treatment::where('query_id', '=', $value->id)->orderBy('id', 'DESC')->get();

        $doctor = Doctor::where('id', '=', $value->doctor_id)->get();

        $vexSolucionesUserDoctor = \DB::table('users')
          ->where('users.id', $doctor[0]->users_id)
          ->get();

        // recorrer los tratamientos
        if (count($tratamientos) == 0 ) {
        } else {
          foreach ($tratamientos as $key => $tratamiento) {
            // obtener los medicamentos
            $medicamentos = Medicament::where('treatment_id', '=', $tratamiento->id)->get();
            $lastNameDoctor = explode(" ", $vexSolucionesUserDoctor[0]->last_name);
            $tratamiento->patient_name = $vexSolucionesUserPaciente[0]->name . " " . $vexSolucionesUserPaciente[0]->last_name. '.';
            $tratamiento->patient_img = $vexSolucionesUserPaciente[0]->img;
            $tratamiento->doctor_name = $vexSolucionesUserDoctor[0]->name . " " . $lastNameDoctor[0] . '.';
            $tratamiento->doctor_img = $vexSolucionesUserDoctor[0]->img;
            $tratamiento->date = $tratamiento->created_at->format('d-m-Y');
            $tratamiento->sintoma = $value->symptom;
            
            // insertar en los tratamientos todos los medicamentos
            $diagnostics = Diagnostic::where('query_id', $tratamiento->query_id)->get();

            if( count($medicamentos) == 0 ){
              $tratamiento->medicamentos = $medicamentos;
            }else{
              $tratamiento->medicamentos = $medicamentos;
            }

            $tratamiento["diagnosticos"] = $diagnostics;
            $treatment[] = $tratamiento;

            
          }
        }
        // $value["tratamientos"] = $treatment;
        
      }

      if(count($treatment) == 0){
        return response()->json(["message"=>"No se encontraron tratamientos del paciente", "status"=>false, "code"=>404]);
      }

      $treats = new LengthAwarePaginator($treatment, count($treatment), 10);
      return response()->json(['status'=>true, 'code'=>200, 'message'=>"Listado de tratamientos exitoso", 'result'=>$treats]);

    }

    public function getTreatmentsPacienteNotSeen($patient_id)
    {
      $patient = Patient::where('users_id', $patient_id)->get();

      if(count($patient) == 0){
        return response()->json(['message'=>'Usuario no encontrado', 'code'=>404, 'status'=>false]);
      }

      $query = Querie::where('patient_id', $patient[0]->id)->get();

      if(count($query) == 0){
        return response()->json(['message'=>'Consulta del paciente no encontrada', 'code'=>404, 'status'=>false]);
      }

      $treatment = [];

      // recorrer todas las consultas
      foreach ($query as $key => $value) {
        // obtener todos los tratamientos de la consulta
        $tratamientos = Treatment::where('query_id', $value->id)->orderBy('id', 'DESC')->get();

        $patient = Patient::where('id', '=', $value->patient_id)->get();

        $user = \DB::table('users')
          ->where('users.id', $patient[0]->users_id)
          ->get();

        if(count($tratamientos) == 0){
        }else{
          // recorrer los tratamientos
          foreach ($tratamientos as $key => $tratamiento) {
            if($tratamiento->state_notification == '0'){
              // obtener los medicamentos
              $medicamentos = Medicament::where('treatment_id', '=', $tratamiento->id)->get();
  
              $tratamiento->patient_name = $user[0]->name . " " . $user[0]->last_name[0] . '.';
              $tratamiento->patient_img = $user[0]->img;
              $tratamiento->date = $tratamiento->created_at->format('d-m-Y');
              $tratamiento->sintoma = $value->symptom;
  
              if(count($medicamentos) == 0){
  
              }else{
                // insertar en los tratamientos todos los medicamentos
                $tratamiento->medicamentos = $medicamentos;
              }
              array_push($treatment, $tratamiento);
            }
          }
        }
      }

      if(count($treatment) == 0){
        return response()->json(["message"=>"No se encontraron tratamientos del paciente", "status"=>false, "code"=>404]);
      }
      
      return response()->json(['status'=>true, 'code'=>200, 'message'=>"Listado de tratamientos exitoso", 'data'=>$treatment]);


    }

    public function getTreatmentByDoctor(Request $request)
    {
      // obtener id del doctor
      $doctor_id = $request->get('doctor_id');

      // obtener doctor x id
      $doctor = Doctor::where('users_id', '=', $doctor_id)->get();

      if(count($doctor) == 0){
        return response()->json(["message"=>"Usuario no encontrado", "code"=> 404, "status"=>false]);
      }

      // obtener todas las consultas del doctor
      $consulta = Query::where('doctor_id', '=', $doctor[0]->id)->get();
      $treatment = [];

      // recorrer todas las consultas
      foreach ($consulta as $key => $value) {
        // obtener todos los tratamientos de la consulta
        $tratamientos = Treatment::where('query_id', $value->id)->orderBy('id', 'DESC')->get();

        $patient = Patient::where('id', '=', $value->patient_id)->get();

        $user = \DB::table('users')
          ->where('users.id', $patient[0]->users_id)
          ->get();

        if(count($tratamientos) == 0){
        }else{
          // recorrer los tratamientos
          foreach ($tratamientos as $key => $tratamiento) {
            // obtener los medicamentos
            $medicamentos = Medicament::where('treatment_id', '=', $tratamiento->id)->get();

            $tratamiento->patient_name = $user[0]->name . " " . $user[0]->last_name[0] . '.';
            $tratamiento->patient_img = $user[0]->img;
            $tratamiento->date = $tratamiento->created_at->format('d-m-Y');
            $tratamiento->sintoma = $value->symptom;

            if(count($medicamentos) == 0){

            }else{
              // insertar en los tratamientos todos los medicamentos
              $tratamiento->medicamentos = $medicamentos;
            }
            array_push($treatment, $tratamiento);
          }
        }
      }

      if(count($treatment) == 0){
        return response()->json(["message"=>"No se encontraron tratamientos del paciente", "status"=>false, "code"=>404]);
      }
      
      return response()->json(['status'=>true, 'code'=>200, 'message'=>"Listado de tratamientos exitoso", 'data'=>$treatment]);
    }

    public function getTreatmentByDoctorPaginated(Request $request)
    {
      // obtener id del doctor
      $doctor_id = $request->get('doctor_id');

      // obtener doctor x id
      $doctor = Doctor::where('users_id', '=', $doctor_id)->get();

      if(count($doctor) == 0){
        return response()->json(["message"=>"Usuario no encontrado", "code"=> 404, "status"=>false]);
      }

      // obtener todas las consultas del doctor
      $consulta = Query::where('doctor_id', '=', $doctor[0]->id)->paginate(10);
      
      // recorrer todas las consultas
      foreach ($consulta as $key => $value) {
        $treatment = [];
        // obtener todos los tratamientos de la consulta
        $tratamientos = Treatment::where('query_id', $value->id)->orderBy('id', 'DESC')->get();

        $patient = Patient::where('id', '=', $value->patient_id)->get();

        $user = \DB::table('users')
          ->where('users.id', $patient[0]->users_id)
          ->get();

        if(count($tratamientos) == 0){
        }else{
          // recorrer los tratamientos
          foreach ($tratamientos as $key => $tratamiento) {
            // obtener los medicamentos
            $medicamentos = Medicament::where('treatment_id', '=', $tratamiento->id)->get();

            $tratamiento->patient_name = $user[0]->name . " " . $user[0]->last_name[0] . '.';
            $tratamiento->patient_img = $user[0]->img;
            $tratamiento->date = $tratamiento->created_at->format('d-m-Y');
            $tratamiento->sintoma = $value->symptom;

            if(count($medicamentos) == 0){

            }else{
              // insertar en los tratamientos todos los medicamentos
              $tratamiento->medicamentos = $medicamentos;
            }
            array_push($treatment, $tratamiento);
          }
        }
        $value['tratamientos'] = $treatment;
      }

      // if(count($treatment) == 0){
      //   return response()->json(["message"=>"No se encontraron tratamientos del paciente", "status"=>false, "code"=>404]);
      // }
      
      return response()->json(['status'=>true, 'code'=>200, 'message'=>"Listado de tratamientos exitoso", 'result'=>$consulta]);
    }

    public function getMedicamentsByTreatment($id)
    {
      
      $treatment = Treatment::where('id', $id)->get();
      if(count($treatment) == 0) {
        return response()->json(['message'=>'No se encontro el tratamiento', 'code'=>404, 'status'=>false]);
      }
      
      $query = Query::where('id', $treatment[0]->query_id)->get();
      if(count($query) == 0) {
        return response()->json(['message'=>'No se encontro la consulta relacionada al tratamiento', 'code'=>404, 'status'=>false]);
      }

      $doctor = Doctor::where('id', $query[0]->doctor_id)->get();
      if(count($query) == 0) {
        return response()->json(['message'=>'No se encontro al doctor relacionada al tratamiento', 'code'=>404, 'status'=>false]);
      }

      $patient = Patient::where('id', $query[0]->patient_id)->get();
      if(count($query) == 0) {
        return response()->json(['message'=>'No se encontro al paciente relacionada al tratamiento', 'code'=>404, 'status'=>false]);
      }

      $user_doctor = User::where('id', $doctor[0]->users_id)->get();
      if(count($query) == 0) {
        return response()->json(['message'=>'No se encontro al usuario doctor relacionada al tratamiento', 'code'=>404, 'status'=>false]);
      }

      $user_patient = User::where('id', $patient[0]->users_id)->get();
      if(count($query) == 0) {
        return response()->json(['message'=>'No se encontro al usuario paciente relacionada al tratamiento', 'code'=>404, 'status'=>false]);
      }

      $diagnostics = Diagnostic::where('query_id', $query[0]['id'])->get();
      
      $medicaments = Medicament::where("treatment_id", "=", $id)->get();

      $treatments = [];
      $indications = [];

      foreach ($medicaments as $key => $medicament) {
        $treat = array(
          "medicament" => $medicament["medicine"],
          "um" => $medicament["um"],
          "quantity" => $medicament["quantity"],
          "sku" => $medicament["sku"]
        );

        $indication = array(
          "medicament" => $medicament["medicine"],
          "way_administration" => $medicament["way_administration"],
          "frequency" => $medicament["frequency"],
          "duration" => $medicament["duration"],
        );

        array_push($treatments, $treat);
        array_push($indications, $indication);
      }



      $data = array(
        "patient" => array(
          "hc" => "C7001584",
          "name" => $user_patient[0]['name'] . ' ' . $user_patient[0]['last_name'],
          "date" => $treatment[0]['date'],
          "validity" => $treatment[0]['validity'],
          "years_old" => $this->getAge($user_patient[0]['birth_date'])
        ),
        "doctor" => array(
          "cmp" => $doctor[0]['id_cmp'],
          "specialty" => $doctor[0]['specialty'],
          "name" => $user_doctor[0]['name'] . ' ' . $user_doctor[0]['last_name']
        ),
        "diagnostics" => $diagnostics,
        "treatment" => $treatments,
        "indications" => $indications,
        "receta_medica" => route('print.receta.medica', $id),
      );

      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Listado Exitoso", 'data'=>$data]);

    }

    public function getMedicamentsByTreatmentOffline($id)
    {
      
      $treatment = Treatment::where('id', $id)->get();
      if(count($treatment) == 0) {
        return response()->json(['message'=>'No se encontro el tratamiento', 'code'=>404, 'status'=>false]);
      }
      
      $query = QueryOffline::where('id', $treatment[0]->query_offline_id)->get();
      if(count($query) == 0) {
        return response()->json(['message'=>'No se encontro la consulta relacionada al tratamiento', 'code'=>404, 'status'=>false]);
      }

      $doctor = Doctor::where('id', $query[0]->doctor_id)->get();
      if(count($query) == 0) {
        return response()->json(['message'=>'No se encontro al doctor relacionada al tratamiento', 'code'=>404, 'status'=>false]);
      }

      $patient = Patient::where('id', $query[0]->patient_id)->get();
      if(count($query) == 0) {
        return response()->json(['message'=>'No se encontro al paciente relacionada al tratamiento', 'code'=>404, 'status'=>false]);
      }

      $user_doctor = User::where('id', $doctor[0]->users_id)->get();
      if(count($query) == 0) {
        return response()->json(['message'=>'No se encontro al usuario doctor relacionada al tratamiento', 'code'=>404, 'status'=>false]);
      }

      $user_patient = User::where('id', $patient[0]->users_id)->get();
      if(count($query) == 0) {
        return response()->json(['message'=>'No se encontro al usuario paciente relacionada al tratamiento', 'code'=>404, 'status'=>false]);
      }

      $diagnostics = Diagnostic::where('query_offline_id', $query[0]['id'])->get();
      
      $medicaments = Medicament::where("treatment_id", "=", $id)->get();

      $treatments = [];
      $indications = [];

      foreach ($medicaments as $key => $medicament) {
        $treat = array(
          "medicament" => $medicament["medicine"],
          "um" => $medicament["um"],
          "quantity" => $medicament["quantity"],
          "sku" => $medicament["sku"]
        );

        $indication = array(
          "medicament" => $medicament["medicine"],
          "way_administration" => $medicament["way_administration"],
          "frequency" => $medicament["frequency"],
          "duration" => $medicament["duration"],
        );

        array_push($treatments, $treat);
        array_push($indications, $indication);
      }



      $data = array(
        "patient" => array(
          "hc" => "C7001584",
          "name" => $user_patient[0]['name'] . ' ' . $user_patient[0]['last_name'],
          "date" => $treatment[0]['date'],
          "validity" => $treatment[0]['validity'],
          "years_old" => $this->getAge($user_patient[0]['birth_date'])
        ),
        "doctor" => array(
          "cmp" => $doctor[0]['id_cmp'],
          "specialty" => $doctor[0]['specialty'],
          "name" => $user_doctor[0]['name'] . ' ' . $user_doctor[0]['last_name']
        ),
        "diagnostics" => $diagnostics,
        "treatment" => $treatments,
        "indications" => $indications,
        "receta_medica" => route('print.receta.medica.offline', $id),

      );

      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Listado Exitoso", 'data'=>$data]);

    }

    public function getAge($date)
    {
        return intval(date('Y', time() - strtotime($date))) - 1970;
    }

    public function updateStateNotification(Request $request)
    {
      // obtenemos el id del tratamiento
      $treatment_id = $request->get('treatment_id');

      // obtenemos el nuevo estado de la notificacion
      $state_notification = $request->get('state_notification');

      // obtenemos el tratamiento x id
      $treatment = Treatment::findOrFail($treatment_id);

      // establecemos el nuevo estado de la notificacion
      $treatment->state_notification = $state_notification;

      // guardamos el nuevo estado
      $treatment_updated = $treatment->save();

      // devolvemos la apirest
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Actualizacion exitosa", 'data'=>$treatment_updated]);

    }

    public function resendRecipe(Request $request)
    {
      // obtenemos el id del tratamiento
      $treatment_id = $request->get('treatment_id');

      // obtenemos el nuevo estado de la notificacion
      $state_notification = $request->get('state_notification');

      // obtenemos el tratamiento x id
      $treatment = Treatment::findOrFail($treatment_id);

      // establecemos el nuevo estado de la notificacion
      $treatment->state_notification = $state_notification;

      // guardamos el nuevo estado
      $treatment_updated = $treatment->save();

      // devolvemos la apirest
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Actualizacion exitosa", 'data'=>$treatment_updated]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if($request->get('query_id') == null) {
        
        $doctor = Doctor::where('users_id', $request->get('doctor_id'))->get();
        $patient = Patient::where('users_id', $request->get('patient_id'))->get();

        $query = array(
          "doctor_id" => $doctor[0]->id,
          "patient_id" => $patient[0]->id,
          "date" => "today",
          "duration" => 0,
          "video" => "no consulta",
          "state" => 0,
          "symptom" => "no consulta",
          "symptom_keys" => "no consulta",
          "message" => "no consulta",
          "mode" => "no consulta",
        );

        $q = Query::create($query);

        $treat = array(
          "validity" => $request->get('validity'),
          "general_recomendation" => $request->get('general_recomendation'),
          "state_notification" => $request->get('state_notification'),
          "query_id" => $q->id,
          "indicacion_general" => $request->get('indicacion_general')
        );

        $treatment = Treatment::create($treat);
          
        return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Almacenamiento Exitoso", 'data'=>$treatment]);

      }else{
        // obtener todos los campos del request
        $fields = $request->all();
  
        // guardar en tratamiento
        $treatment = Treatment::create($fields);
  
        // retorno del apirest
        return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Almacenamiento Exitoso", 'data'=>$treatment]);
      }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveCurrentDisease(Request $request)
    {
      // obtener todos los campos del request
      $fields = $request->all();

      // guardar en actual enfermedad
      $current_diseases = Current_diseasess::create($fields);

      // retorno del apirest
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Almacenamiento Exitoso", 'data'=>$current_diseases]);
    }

    public function saveBiologicalFunction(Request $request)
    {
      // obtener todos los campos del request
      $fields = $request->all();

      // guardar en funcion biologica
      $biological_functions = Biological_functions::create($fields);

      // retorno del apirest
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Almacenamiento Exitoso", 'data'=>$biological_functions]);
    }

    public function saveVitalFunction(Request $request)
    {
      // obtener todos los campos del request
      $fields = $request->all();

      // guardar en funcion vital
      $vital_functions = Vital_functions::create($fields);

      // retorno del apirest
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Almacenamiento Exitoso", 'data'=>$vital_functions]);

    }

    public function savePhysicalExam(Request $request)
    {
      // obtener todos los campos del request
      $fields = $request->all();

      // guardar en examen fisico
      $physical_exams = Physical_exams::create($fields);

      // retorno del apirest
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Almacenamiento Exitoso", 'data'=>$physical_exams]);

    }

    public function saveDiagnostic(Request $request)
    {
      // obtener todos los campos del request
      $fields = $request->all();

      // guardar en diagnostico
      $diagnostic = Diagnostic::create($fields);

      // retorno del apirest
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Almacenamiento Exitoso", 'data'=>$diagnostic]);

    }

    public function saveMedicament(Request $request)
    {
      // obtener todos los campos del request
      $data = $request->get('data');

      foreach ($data as $key => $element) {
        $fields = array(
          "medicine"=> $element["medicine"],
          "frequency"=> $element["frequency"],
          "duration"=> $element["duration"],
          "way_administration"=> $element["way_administration"],
          "dose"=> $element["dose"],
          "quantity"=> $element["quantity"],
          "treatment_id" => $request->get('treatment_id'),
          "um" => $request->get('treatment_id')
        );  

        // guardar en medicamento
        Medicament::create($fields);
      }
		
      // retorno del apirest
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Almacenamiento Exitoso"]);

    }

    public function saveAuxiliaryExam(Request $request)
    {
      // obtener todos los campos del request
      $fields = $request->all();

      // guardar en examen auxiliar
      $procedure = Auxiliary_exams::create($fields);

      // retorno del apirest
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Almacenamiento Exitoso", 'data'=>$procedure]);

    }

    public function saveProcedure(Request $request)
    {
      // obtener todos los campos del request
      $fields = $request->all();

      // guardar en procedure
      $procedure = Procedures::create($fields);

      // retorno del apirest
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Almacenamiento Exitoso", 'data'=>$procedure]);
    }

    public function existRecipeMakedPatient($id)
    {
      $patient = Patient::where("users_id","=",$id)->get();
      $query = Query::where("patient_id", "=", $patient[0]->id)->get();
      $state_notification = false;
      foreach ($query as $key => $value) {
        $treatments = Treatment::where("query_id", "=", $value->id)->get();
        if(count($treatments) > 0){
          $state_notification = true;
        }
      }
      return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion exitosa", 'state_notification' => $state_notification, 'data'=>$query]);

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getDetailPatient($consulta_id)
    {
      
      $query = Query::findOrFail($consulta_id);

      $patient = Patient::findOrFail($query->patient_id);

      $user = User::findOrFail($patient->users_id);

      $result = array(
        "name"=>$user->name . " " . $user->last_name,
        "date"=>date('d-m-Y')
      );

      return response()->json(["message"=>"Usuario encontrado", "code"=>200, "data"=>$result]);
    }

    public function getRecetaPDF($id)
    {
        $treatment = Treatment::where('id', $id)->get();
        if(count($treatment) == 0) {
            return response()->json(['message'=>'No se encontro el tratamiento', 'code'=>404, 'status'=>false]);
        }

        $query = Query::where('id', $treatment[0]->query_id)->get();
        if(count($query) == 0) {
            return response()->json(['message'=>'No se encontro la consulta relacionada al tratamiento', 'code'=>404, 'status'=>false]);
        }

        $doctor = Doctor::where('id', $query[0]->doctor_id)->get();
        if(count($query) == 0) {
            return response()->json(['message'=>'No se encontro al doctor relacionada al tratamiento', 'code'=>404, 'status'=>false]);
        }

        $patient = Patient::where('id', $query[0]->patient_id)->get();
        if(count($query) == 0) {
            return response()->json(['message'=>'No se encontro al paciente relacionada al tratamiento', 'code'=>404, 'status'=>false]);
        }

        $user_doctor = User::where('id', $doctor[0]->users_id)->get();
        if(count($query) == 0) {
            return response()->json(['message'=>'No se encontro al usuario doctor relacionada al tratamiento', 'code'=>404, 'status'=>false]);
        }

        $user_patient = User::where('id', $patient[0]->users_id)->get();
        if(count($query) == 0) {
            return response()->json(['message'=>'No se encontro al usuario paciente relacionada al tratamiento', 'code'=>404, 'status'=>false]);
        }

        $diagnostics = Diagnostic::where('query_id', $query[0]['id'])->get();

        $medicaments = Medicament::where("treatment_id", "=", $id)->get();

        $treatments = [];
        $indications = [];

        foreach ($medicaments as $key => $medicament) {
            $treat = array(
                "medicament" => $medicament["medicine"],
                "um" => $medicament["um"],
                "quantity" => $medicament["quantity"]
            );

            $indication = array(
                "medicament" => $medicament["medicine"],
                "way_administration" => $medicament["way_administration"],
                "frequency" => $medicament["frequency"],
                "duration" => $medicament["duration"],
            );

            array_push($treatments, $treat);
            array_push($indications, $indication);
        }

        $data = array(
            "patient" => array(
                "hc" => "C7001584",
                "name" => $user_patient[0]['name'] . ' ' . $user_patient[0]['last_name'],
                "date" => Carbon::parse($treatment[0]['date'])->format('d/m/Y'),
                "validity" => Carbon::parse($treatment[0]['validity'])->format('d/m/Y'),
                "years_old" => $this->getAge($user_patient[0]['birth_date'])
            ),
            "doctor" => array(
                "cmp" => $doctor[0]['id_cmp'],
                "specialty" => $doctor[0]['specialty'],
                "name" => $user_doctor[0]['name'] . ' ' . $user_doctor[0]['last_name'],
                "firma_digital" => 'https://www.alo.doctor/images/' . $doctor[0]['firma_digital']
            ),
            "diagnostics" => $diagnostics,
            "treatment" => $treatments,
            "indications" => $indications,
            "indicacion_general"=> $treatment[0]->indicacion_general,
            "query_id" => $treatment[0]->query_id,
        );

        //return view('print.receta', compact('data'));
        //$today = Carbon::now()->format('H:i');
        $pdf = \PDF::loadView('print.receta', compact('data'));
        //return $pdf->download('ejemplo.pdf');
        return $pdf->stream();
    }

    public function getRecetaPDFOffline($id)
    {
      
        $query = QueryOffline::where('id', $id)->get();
        if(count($query) == 0) {
          return response()->json(['message'=>'No se encontro la consulta relacionada al tratamiento', 'code'=>404, 'status'=>false]);
        }
        
        $treatment = Treatment::where('query_offline_id', $query[0]->id)->get();
        if(count($treatment) == 0) {
            return response()->json(['message'=>'No se encontro el tratamiento', 'code'=>404, 'status'=>false]);
        }

        $doctor = Doctor::where('id', $query[0]->doctor_id)->get();
        if(count($query) == 0) {
            return response()->json(['message'=>'No se encontro al doctor relacionada al tratamiento', 'code'=>404, 'status'=>false]);
        }

        $patient = Patient::where('id', $query[0]->patient_id)->get();
        if(count($query) == 0) {
            return response()->json(['message'=>'No se encontro al paciente relacionada al tratamiento', 'code'=>404, 'status'=>false]);
        }

        $user_doctor = User::where('id', $doctor[0]->users_id)->get();
        if(count($query) == 0) {
            return response()->json(['message'=>'No se encontro al usuario doctor relacionada al tratamiento', 'code'=>404, 'status'=>false]);
        }

        $user_patient = User::where('id', $patient[0]->users_id)->get();
        if(count($query) == 0) {
            return response()->json(['message'=>'No se encontro al usuario paciente relacionada al tratamiento', 'code'=>404, 'status'=>false]);
        }

        $diagnostics = Diagnostic::where('query_offline_id', $query[0]['id'])->get();

        $medicaments = Medicament::where("treatment_id", $treatment[count($treatment) - 1])->get();

        $treatments = [];
        $indications = [];

        foreach ($medicaments as $key => $medicament) {
            $treat = array(
                "medicament" => $medicament["medicine"],
                "um" => $medicament["um"],
                "quantity" => $medicament["quantity"]
            );

            $indication = array(
                "medicament" => $medicament["medicine"],
                "way_administration" => $medicament["way_administration"],
                "frequency" => $medicament["frequency"],
                "duration" => $medicament["duration"],
            );

            array_push($treatments, $treat);
            array_push($indications, $indication);
        }

        $data = array(
            "patient" => array(
                "hc" => "C7001584",
                "name" => $user_patient[0]['name'] . ' ' . $user_patient[0]['last_name'],
                "date" => Carbon::parse($treatment[count($treatment) - 1]['date'])->format('d/m/Y'),
                "validity" => Carbon::parse($treatment[count($treatment) - 1]['validity'])->format('d/m/Y'),
                "years_old" => $this->getAge($user_patient[0]['birth_date'])
            ),
            "doctor" => array(
                "cmp" => $doctor[0]['id_cmp'],
                "specialty" => $doctor[0]['specialty'],
                "name" => $user_doctor[0]['name'] . ' ' . $user_doctor[0]['last_name'],
                "firma_digital" => 'https://www.alo.doctor/images/' . $doctor[0]['firma_digital']
            ),
            "diagnostics" => $diagnostics,
            "treatment" => $treatments,
            "indications" => $indications,
            "indicacion_general"=> $treatment[count($treatment) - 1]->indicacion_general,
            "query_id" => $id,
        );

        //return view('print.receta', compact('data'));
        //$today = Carbon::now()->format('H:i');
        $pdf = \PDF::loadView('print.receta', compact('data'));
        //return $pdf->download('ejemplo.pdf');
        return $pdf->stream();
    }
}
