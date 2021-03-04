<?php

namespace App\Http\Controllers\Relationship;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Relationship;
use App\Patient;
use App\User;
use App\RoleUser;

class RelationshipController extends Controller
{
  /**
   *
   * Obtener miembros de familia
   *
   * @param    var $user_id
   * @return      json
   *
   */
  public function getFamilyMembers($user_id)
  {
    $patient = Patient::where('users_id', $user_id)->get();
    if(count($patient) == 0){
      return response()->json(["message"=>"Paciente no encontrado", "code"=>404]);
    }

    $relationship = Relationship::where('tutor', $patient[0]->id)->get();

    if(count($relationship) == 0){
      return response()->json(["message"=>"El usuario no posee parientes a cargo", "code"=>404]);
    }

    $data = [];

    foreach ($relationship as $key => $value) {
      $patient_member = Patient::findOrFail($value->tutored);

      $user = \DB::table('users')
      ->where('users.id', $patient_member->users_id)
      ->get();

      $queries = \DB::table('queries')
      ->where('queries.patient_id', $patient_member->id)
      ->get();

      $i = count($queries) - 1;

      $last_query = "No existe";

      if(count($queries) != 0){
        $last_query = (end($queries)[0])->created_at;
      }

      $type_document = "DNI";

      if($user[0]->type_document_id == 2){
        $type_document = "CARNET DE EXTRANJERIA";
      }else if($user[0]->type_document_id == 3){
        $type_document = "PASAPORTE";
      }else if($user[0]->type_document_id == 4){
        $type_document = "CARNET IDENTIDAD";
      }

      $result = array(
        "user_id"=>$user[0]->id,
        "type_document" => $type_document,
        "document_number" => $user[0]->numdoc,
        "name" => $user[0]->name . " " . $user[0]->last_name,
        "relationship" =>$value->relationship,
        "total_calls" => count($queries),
        "last_query" => $last_query
      );

      array_push($data, $result);

    }

    return response()->json(["message"=>"Parientes a cargo encontrados", "code"=>200, "data"=>$data]);
  }

    /**
   *
   * Obtener familiar específico
   *
   * @param    var $user_id
   * @return      json
   *
   */
  public function getFamilyMember($user_id)
  {
    $patient = Patient::where('users_id', $user_id)->get();
    
    if(count($patient) == 0){
      return response()->json(["message"=>"Paciente no encontrado", "code"=>404]);
    }

    $user = \DB::table('users')
    ->where('users.id', $user_id)
    ->get();

    $queries = \DB::table('queries')
    ->where('queries.patient_id', $patient[0]->id)
    ->get();

    $relationship = Relationship::where('tutored', $patient[0]->id)->get();
    
    $i = count($queries) - 1;
    
    $last_query = "No existe";

    if(count($queries) != 0){
      $last_query = (end($queries)[0])->created_at;
    }

    $type_document = "DNI";

    if($user[0]->type_document_id == 2){
      $type_document = "CARNET DE EXTRANJERIA";
    }else if($user[0]->type_document_id == 3){
      $type_document = "PASAPORTE";
    }else if($user[0]->type_document_id == 4){
      $type_document = "CARNET IDENTIDAD";
    }

    $result = array(
      "type_document" => $type_document,
      "document_number" => $user[0]->numdoc,
      "name" => $user[0]->name . " " . $user[0]->last_name,
      "img" => $user[0]->img,
      "relationship" =>$relationship[0]->relationship,
      "total_calls" => count($queries),
      "last_query" => $last_query
    );

    return response()->json(["message"=>"Parientes a cargo encontrados", "code"=>200, "data"=>$result]);

  }

  /**
   *
   * Validar si es un tutorado
   *
   * @param    var $user_id
   * @return      boolean
   *
   */
  public function isTutored($user_id)
  {
    $patient = Patient::where('users_id', $user_id)->get();

    if(count($patient) == 0){
      return response()->json(["message"=>"Paciente no encontrado", "code"=>404]);
    }

    $relationship = Relationship::where('tutored', $patient[0]->id)->get();

    if(count($relationship) == 0){
      return response()->json(["message"=>"No es un tutorado", "code"=>404, "isTutored"=>false]);
    }

    return response()->json(["message"=>"Es un tutorado", "code"=>200, "isTutored"=>true]);
  }

  /**
   *
   * Registrar pariente
   *
   * @param    var $user_id
   * @return      boolean
   *
   */
  public function saveFamilyMember(Request $request)
  {
    $user_to_create = User::where('email', $request->get('email'))->get();

    if(count($user_to_create) > 0){
      return response()->json(["message"=>"El usuario con este Correo electronico ya existe", "code"=>206]);
    }

    $user_sinch = preg_replace('/\s+/', '', $request->get('name')) . time();
    $fields_user = array(
      "email"=>$request->get('email'),
      "password"=>\Hash::make($request->get('password')),
      "name"=>$request->get('name'),
      "last_name"=>$request->get('last_name'),
      "gender"=>$request->get('gender'),
      "type_document_id"=>$request->get('type_document_id'),
      "numdoc"=>$request->get('numdoc'),
      "tel"=>$request->get('tel'),
      "birth_date"=>$request->get('birth_date'),
      "user_sinch"=>$user_sinch,
      "password_sinch"=>$user_sinch,
      "img"=>"https://www.alo.doctor/images/user/default/default.jpg"
    );

    $user_to_save = User::create($fields_user);

    $fields_role = array(
      "user_id"=>$user_to_save->id,
      "role_id"=>3
    );

    $role_user = RoleUser::create($fields_role);

    $fields_patient = array(
      "users_id"=>$user_to_save->id
    );

    $patient_to_save = Patient::create($fields_patient);

    $user_id  = $request->get('user_id');
    $tutor = Patient::where('users_id', $user_id)->get();
    $relationship = $request->get('relationship');
    $fields_relationship = array(
      "tutor"=> $tutor[0]->id,
      "tutored"=> $patient_to_save->id,
      "relationship"=> $relationship
    );

    Relationship::create($fields_relationship);

    // $authenticationToken = new \Gnello\OpenFireRestAPI\AuthenticationToken('d84G1zOiioruNwyk');
    // $api = new \Gnello\OpenFireRestAPI\API('test.alo.doctor', 9090, $authenticationToken);

    // $api->Settings()->setServerName("localhost");
    // $api->Settings()->setDebug(true);

    // $password =  strrev($request->get('numdoc').$request->get('email')."#");

    // $result = $api->Users()->createUser($user_sinch, $password, $request->get('name') ." ". $request->get('last_name'), $request->get('email'));
    // $result =$api->Users()->addUserToGroups($user_sinch, array('consulta'));
    
    return response()->json(["message"=>"Nuevo Usuario registrado", "code"=>200]);
  }
}
