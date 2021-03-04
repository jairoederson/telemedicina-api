<?php

namespace App\Http\Controllers\Patient;
use Carbon\Carbon;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use App\Http\Controllers\ML\MLController;
use App\Http\Controllers\Controller;
use App\Patient;
use App\User;


class PatientController extends Controller
{
  public function searchPatientByName(Request $request)
  {
    //$last_name_pat = $request->get('last_name_pat');
    $last_name = $request->get('last_name');
    $name = $request->get('name');

    $user = \DB::table('users')
      ->where('users.last_name','like', '%'.$last_name.'%')
      ->where('users.name','like', '%'.$name.'%')
      ->get();

    if(count($user) == 0){
      return response()->json(['estado'=>false, 'code'=>'404', 'message'=>"No se encontro al paciente", 'data'=>[]]);

    }else {
      $user_id = $user[0]->id;
      $role_user = \DB::table('role_users')
        ->where('role_users.user_id', $user_id)
        ->get();

      $role = $role_user[0]->role_id;
      if($role == 3){
        $usuario = $user[0];
        $patient = Patient::where('users_id', $user[0]->id)->get();
        $usuario->idPatient = $patient[0]->id;
        return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición exitosa", 'data'=>$usuario]);
      }else{
        return response()->json(['estado'=>false, 'code'=>'404', 'message'=>"No se encontro al paciente", 'data'=>[]]);
      }

    }
  }

  public function searchPatientByDocument(Request $request)
  {
    $numdoc= $request->get('numdoc');

    $user = \DB::table('users')
      ->where('users.numdoc', $numdoc )
      ->get();

    if(count($user) == 0){
      return response()->json(['estado'=>false, 'code'=>'404', 'message'=>"No se encontro al paciente", 'data'=>[]]);

    }else {

      $user_id = $user[0]->id;
      $role_user = \DB::table('role_users')
        ->where('role_users.user_id', $user_id)
        ->get();

      $role = $role_user[0]->role_id;
      if($role == 3){
        $usuario = $user[0];
        $patient = Patient::where('users_id', $user[0]->id)->get();
        $usuario->idPatient = $patient[0]->id;
        return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición exitosa", 'data'=>$usuario]);
      }else{
        return response()->json(['estado'=>false, 'code'=>'404', 'message'=>"No se encontro al paciente", 'data'=>[]]);
      }

    }
  }

  /**
   * Almacenamos temporalment los sintomas y las imagenes de sintomas.
   *
   * @return json
   */
  public function saveTempSymptom(Request $request)
  {
    $temp_symptom = $request->get('temp_symptom');
    $temp_message = $request->get('temp_message');
    $temp_key_symptoms = $request->get('temp_key_symptoms');
    $temp_imageSymptom = $request->get('temp_imageSymptom');
    $temp_documents = $request->get('temp_documents');
    $user_id = $request->get('user_id');
    $patient = Patient::where('users_id', $user_id)->get();
    if (count($patient) == 0) {
      return response()->json(['message'=>'Usuario no encontrado', 'status'=>false, 'code'=>404]);
    }
    $patient_to_update = Patient::findOrFail($patient[0]->id);
    
    $patient_to_update->temp_symptom = json_encode(array("symptoms"=>$temp_symptom));

    $patient_to_update->temp_message = $temp_message;
    $patient_to_update->temp_key_symptoms = $temp_key_symptoms;

    $documents_arr = [];
    $documents_base64_arr = [];
    $images_arr = [];
    $images_base64_arr = [];

    \File::deleteDirectory(public_path('images/user/paciente/documents/temp'));

    foreach ($temp_documents as $key => $document) {
      if($temp_documents!=""){
        array_push($documents_base64_arr, $document);
        $document = base64_decode($document);
        $document_path = '/documents/temp'.'/'.'documento_medico_'.time().$key.'.pdf';

        \Storage::disk('imagesPaciente')->put($document_path, $document);
        // $document_bd = 'http://localhost:8000/images/user/paciente'.$document_path;
        $document_bd = 'https://telemedicina.today/images/user/paciente'.$document_path;
        array_push($documents_arr, $document_bd);
      }
    }

    \File::deleteDirectory(public_path('images/user/paciente/symptoms/temp'));

    foreach ($temp_imageSymptom as $key => $image) {
      if($image!=""){
        array_push($images_base64_arr, $image);
        $image_base64 = base64_decode($image);
        $image_path = '/symptoms/temp'.'/'.time().$key.'.jpg';

        \Storage::disk('imagesPaciente')->put($image_path, $image_base64);
        // $image_bd = 'http://localhost:8000/images/user/paciente'.$image_path;
        $image_bd = 'https://telemedicina.today/images/user/paciente'.$image_path;

        array_push($images_arr, $image_bd);
      }
    }

    $imageSymptomStr = json_encode(array("images"=>$images_arr));
    $documentSymptomStr = json_encode(array("documents"=>$documents_arr));
    $patient_to_update->temp_imageSymptom = $imageSymptomStr;
    $patient_to_update->temp_documents = $documentSymptomStr;
    $patient_to_update->temp_imageSymptomBase64 = json_encode(array("images_base64"=>$images_base64_arr));
    $patient_to_update->temp_documents_base64 = json_encode(array("documents_base64"=>$documents_base64_arr));
    $patient_to_update->save();
    return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Symtoms and images saved", 'data'=>array('temp_symptom'=> $temp_symptom, 'temp_message'=> $temp_message, 'temp_imageSymptom'=>$images_arr, 'temp_documents'=>$documents_arr)]);

  }

  /**
   * Obtenemos los sintomas almacenados
   *
   * @return json
   */
  public function getTempSymptoms($user_sinch)
  {

    $user = \DB::table('users')
      ->where('users.user_sinch', $user_sinch)
      ->get();

    $role_user = \DB::table('role_users')
      ->where('role_users.user_id', $user[0]->id)
      ->get();

    $role = "";
    
    if($role_user[0]->role_id == 2){
      $role = "doctor";
    }else if($role_user[0]->role_id == 3){
      $role = "patient";
    }
    
    $patient = Patient::where('users_id', $user[0]->id)->get();
    
    $temp_symptom = json_decode($patient[0]->temp_symptom, true);

    $imageSymptomJson = "";
    $predictions = [];
    if($patient[0]->temp_imageSymptom != "" && $patient[0]->temp_imageSymptom != null){
      $imageSymptomJson = json_decode($patient[0]->temp_imageSymptom, true);
      $imageSymptomJson = $imageSymptomJson['images'];
      
      $predictions = [];
      foreach ($imageSymptomJson as $key => $image) {
        $prediction = array(
          'img'=> $image,
          'prediction'=> "80%"
        );

        array_push($predictions, $prediction);
      }
      /*
      $data = new Request();
      $data->replace(['imagesArr' => $imageSymptomJson]);
      $predictions = MLController::predictDisease($data);*/
    }

    $documentSymptomJson = "";

    $documents = [];
    if($patient[0]->temp_documents != "" && $patient[0]->temp_documents != null){
      $documentSymptomJson = json_decode($patient[0]->temp_documents, true);
      $documentSymptomJson = $documentSymptomJson['documents'];
      foreach ($documentSymptomJson as $key => $doc) {
        array_push($documents, array('document'=>$doc, 'document_name'=>str_replace('https://telemedicina.today/images/user/paciente/documents/temp/', '', $doc)));
      }
    }

    $images_base64 = [];
    $imageSymptomBase64Json = "";
    if($patient[0]->temp_imageSymptomBase64 != "" && $patient[0]->temp_imageSymptomBase64 != null){
      $imageSymptomBase64Json = json_decode($patient[0]->temp_imageSymptomBase64, true);
      $imageSymptomBase64Json = $imageSymptomBase64Json['images_base64'];
    }

    $documents_base64 = [];
    $documentsSymptomBase64Json = "";
    if($patient[0]->temp_documents_base64 != "" && $patient[0]->temp_documents_base64 != null){
      $documentsSymptomBase64Json = json_decode($patient[0]->temp_documents_base64, true);
      $documentsSymptomBase64Json = $documentsSymptomBase64Json['documents_base64'];
    }

    $symptom = "";

    if($patient[0]->temp_symptom != "" && $patient[0]->temp_symptom != null){
      $symptom = $patient[0]->temp_symptom;
    }

    $genero = "";
    if($user[0]->gender == 1){
      $genero = "Hombre";
    }else{
      $genero = "Mujer";
    }

    $date = new \DateTime($user[0]->birth_date);
   $now = new \DateTime();
   $interval = $now->diff($date);

   $configs = \DB::table('configs')
     ->where('configs.email', 'mifarma@email.com')
     ->get();

    $result = array(
      "patient_id"=>$user[0]->id,
      "name"=>$user[0]->name,
      "last_name"=>$user[0]->last_name,
      "imgProfile"=>$user[0]->img,
      "city"=>$user[0]->country,
      "genero"=>$genero,
      "years_old"=>$interval->y,
      "symptoms" => $temp_symptom['symptoms'],
      "message" => $patient[0]->temp_message,
      "temp_key_symptoms" => $patient[0]->temp_key_symptoms,
      "images_prediction"=>$predictions,
      "documents_symtom"=>$documents,
      "price"=>$configs[0]->price,
      "temp_imageSymptomBase64" => $imageSymptomBase64Json,
      "temp_documents_base64" => $documentsSymptomBase64Json,
      "type_user" => $role
    );

    return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Request succesfully", 'data'=>$result]);

  }
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
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
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

  public function getCallState($user_id){
    $patient = Patient::where('users_id', $user_id)->get();

    if(count($patient)==0){
        return response()->json(["message"=>"Usuario no encontrado", "code"=>404]);
    }

    $images_base64 = [];
    if($patient[0]->temp_imageSymptomBase64 != "" && $patient[0]->temp_imageSymptomBase64 != null){
      $imageSymptomBase64Json = json_decode($patient[0]->temp_imageSymptomBase64, true);
      $imageSymptomBase64Json = $imageSymptomBase64Json['images_base64'];
    }

    $documents_base64 = [];
    if($patient[0]->temp_documents_base64 != "" && $patient[0]->temp_documents_base64 != null){
      $documentsSymptomBase64Json = json_decode($patient[0]->temp_documents_base64, true);
      $documentsSymptomBase64Json = $documentsSymptomBase64Json['documents_base64'];
    }

    $result = array(
      "temp_imageSymptomBase64"=>$images_base64,
      "temp_documents_base64"=>$documents_base64,
      "call_state"=>$patient[0]->call_state
    );

    return response()->json(["message"=>"Peticion exitosa", "code"=>200, "data"=>$result]);
  }

  public function setCallState(Request $request){
    $user_id = $request->get('user_id');
    $call_state = $request->get('call_state');

    $patient = Patient::where('users_id', $user_id)->get();

    if(count($patient) == 0){
      return response()->json(["message"=>"Usuarion no encontrado", "code"=>404]);
    }
    $patient_to_update = Patient::findOrFail($patient[0]->id);
    
    $patient_to_update->call_state = $call_state;
    $patient_to_update->save();

    return response()->json(["message"=>"Estado de llamada actualizado", "code"=>200]);

  }

  public function setCardToUse(Request $request){
    $user_id = $request->get('user_id');
    $card_id = $request->get('card_id');

    $patients = Patient::where('users_id', $user_id)->get();
    
    if(count($patients)==0){
      return response()->json(["message"=>"El usuario no fue encontrado o el usuario no existe", "code"=>404]);
    }
    $patient = Patient::findOrFail($patients[0]->id);

    $patient->card_to_use = $card_id;

    $patient->save();

    return response()->json(["message"=>"Peticion Exitosa", "code"=>200]);

  }

  public function getVitalSigns($user_id){
    $patient = Patient::where('users_id', $user_id)->get();
    if(count($patient) == 0){
      return response()->json(["message"=>"Paciente no encontrado", "code"=>404, "status"=>false]);
    }
    
    $user = User::findOrFail($user_id);
    
    $gender = "M";

    if($user->gender == 2){
      $gender = "F";
    }

    $date = new \DateTime($user->birth_date);
    $now = new \DateTime();
    $interval = $now->diff($date);
    
    $size = 0;
    if($patient[0]->size != null){
      $size = $patient[0]->size;
    }

    $weight = 0;
    if($patient[0]->weight != null){
      $weight = $patient[0]->weight;
    }

    $bloodType = "O+";
    if($patient[0]->bloodType != null){
      $bloodType = $patient[0]->bloodType;
    }

    $fields = array(
      "size"=>array(
        "icon"=>"https://telemedicina.today/images/icon/altura.png",
        "text"=>"Altura",
        "value"=>$size
      ),
      "weight"=>array(
        "icon"=>"https://telemedicina.today/images/icon/peso.png",
        "text"=>"Peso",
        "value"=>$weight
      ),
      "gender"=>array(
        "icon"=>"https://telemedicina.today/images/icon/sexo.png",
        "text"=>"Sexo",
        "value"=>$gender
      ),
      "bloodType"=>array(
        "icon"=>"https://telemedicina.today/images/icon/tipo_sangre.png",
        "text"=>"Tipo de sangre",
        "value"=>$bloodType
      ),
      "age"=>array(
        "icon"=>"https://telemedicina.today/images/icon/edad.png",
        "text"=>"Edad",
        "value"=>$interval->y
      )
    );

    return response()->json(["message"=>"Signos vitales encontrados", "code"=>201, "status"=>true, "data"=>$fields]);
  }

  public function updateVitalSign(Request $request)
  {
    $size = $request->get('size');
    $weight = $request->get('weight');
    $gender = $request->get('gender');
    $bloodType = $request->get('bloodType');
    $birth_date = $request->get('birth_date');
    $age = $request->get('age');
    $user_id = $request->get('user_id');

    // validation
    $user = User::where('id', $user_id)->get();

    if( count($user) == 0 ){
      return response()->json(['message'=>'Usuario no encontrado', 'status'=>false, 'code'=>404]);
    }

    // values
    $genderToUpdate = 1;
    if($gender == "M"){
      $genderToUpdate = 2;
    }

      $date = Carbon::now();
      $birth_date = $date->subYears($age);

    // updating
    $user_to_update = User::findOrFail($user_id);
    $user_to_update->gender = $genderToUpdate;
    $user_to_update->birth_date = $birth_date;
    $user_to_update->save();

    // validation
    $patient = Patient::where('users_id', $user_id)->get();
    if( count($patient) == 0 ){
      return response()->json(['message'=>'Usuario no encontrado', 'status'=>false, 'code'=>404]);
    }

    // updating
    $patient_to_update = Patient::findOrFail($patient[0]->id);
    $patient_to_update->bloodType = $bloodType;
    $patient_to_update->weight = $weight;
    $patient_to_update->size = $size;
    $patient_to_update->save();
    
    // response
    return response()->json(['message'=>'Signos vitales actualizados', 'code'=>200, 'status'=>true]);
  }

  public function searchDni(Request $request){
      $users = User::where("numdoc", "LIKE", "%{$request->get('dni')}%")->first();
      $ids = [];
      /*foreach ($users as $user){
          array_push($ids,$user->id);
      }*/
      //$pacientes = Patient::whereIn('users_id', $ids)->get();
      $paciente = Patient::where('users_id', $users->id)->first();
      if ($paciente){
          $result = [
              'user_id' => $users->id,
              'patient_id' => $paciente->id,
              'name' => $users->name." ".$users->last_name,
              'numdoc' => $users->numdoc
          ];
          return response()->json(['message'=>'Paciente encontrado', 'code'=>200, 'status'=>true, 'data' => $result]);
      }else{
          return response()->json(['message'=>'Usuario no encontrado', 'code'=>200, 'status'=>false]);
      }
  }

  public function getPatients()
  {
     $patients = Patient::all();
      $result = [];
      if ($patients){
          foreach ($patients as $row){
              $user = User::find($row->users_id);
              $result[] = [
                  'patient' => $user->name." ".$user->last_name,
                  'numdoc' => $user->numdoc,
                  'created_at' => Carbon::parse($row->created_at)->format('d/m/Y'),
                  'updated_at' => Carbon::parse($row->updated_at)->format('d/m/Y'),
                  'user_id' => $row->users_id,
                  'patient_id' => $row->id,
              ];

          }
          return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición Exitoso", 'data'=>$result]);
      }else{
          return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"No tiene triaje", 'data'=>$result]);
      }
  }

  public function updateWeight(Request $request) 
  {
  
    $patient = Patient::where("users_id", $request->get('userId'))->get();
    
    if(count($patient) == 0) {

      return response()->json(["message"=>"No se encontro al usuario paciente", "status"=>false]);
    
    }
    
    $patient_to_update = Patient::findOrFail($patient[0]->id);

    $patient_to_update->weight = $request->get('weight');
    
    $patient_to_update->save();

    return response()->json(["message"=>"Peso del paciente actualizado", "status"=>true, "data"=>$patient_to_update]);

  }

  public function saveAllergy(Request $request) 
  {

    $patient = Patient::where('users_id', $request->get('userId'))->get();

    if(count($patient) == 0) {

      return response()->json(['message'=>"Usuario paciente no encontrado", "status"=>false]);

    }

    $patient_to_update = Patient::findOrFail($patient[0]->id);

    $allergies = $patient[0]->allergies;

    if($allergies == null) {
      $allergy_to_save = array(
        "allergies" => [$request->get('allergy')]
      );

      $patient_to_update->allergies = json_encode($allergy_to_save);
      $patient_to_update->save();

    } else {
      $allergies_founded = json_decode($allergies, true);
      array_push($allergies_founded["allergies"], $request->get('allergy'));
      
      $patient_to_update->allergies = json_encode($allergies_founded);
      $patient_to_update->save();
      
    }

    return response()->json(["message"=>"Alergia registrada", "status"=>true]);

  }

  public function getAllergies($user_id) 
  {

    $patient = Patient::where('users_id', $user_id)->get();

    if(count($patient) == 0) {

      return response()->json(["message"=>"Usuario paciente no encontrado", "status"=>false]);

    }

    if($patient[0]->allergies == null) {

      return response()->json([ "message"=>"Allergias del paciente", "status"=>true, "data"=>[] ]);
    }

    $temp = json_decode($patient[0]->allergies, true);

    $allergies = $temp["allergies"];

    return response()->json(["message"=>"Allergias del paciente", "status"=>true, "data"=>$allergies]);

  }

  public function deleteAllergy(Request $request) {

    $patient = Patient::where('users_id', $request->get('userId'))->get();

    if(count($patient) == 0) {
      return response()->json(["message"=>"Usuario paciente no encontrado", "status"=>false]);
    }

    $allergies = json_decode($patient[0]->allergies, true);

    unset($allergies["allergies"][array_search($request->get("allergy"), $allergies["allergies"])]);

    $patient_to_update = Patient::findOrFail($patient[0]->id);

    $patient_to_update->allergies = json_encode($allergies);

    $patient_to_update->save();

    return response()->json(["message"=>"Alergia eliminada", "status"=>true]);

  }

}
