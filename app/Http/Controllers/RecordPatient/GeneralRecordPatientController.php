<?php

namespace App\Http\Controllers\RecordPatient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\GeneralRecordPatient;
use App\Patient;

class GeneralRecordPatientController extends Controller
{
  // verificar si un paciente tiene registrado antecedentes
  public function checkGeneralRecordPatient($patientId){
    $generalRecord = GeneralRecordPatient::where('patient_id',$patientId)->get();
    if(count($generalRecord)==0){
      return response()->json(['estado'=>false, 'code'=>'404', 'message'=>"Antecedente no encontrado", 'data'=>[]]);

    }else{
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición Exitosa", 'data'=> $generalRecord]);

    }
  }

  // registrar antecedentes generales
  public function saveGeneralRecord(Request $request){
    $patient = Patient::where('users_id', $request->get('user_id'))->get();

    if(count($patient) == 0){
      return response()->json(["message"=>"Usuario no encontrado", "code"=>404, "status"=>false]);
    }

    $fields = array(
      "medicaments"=> $request->get('medicaments'),
      "RAM" => $request->get('RAM'),
      "occupational"=> $request->get('occupational'),
      "general_prenatal_id"=> $request->get('general_prenatal_id'),
      "general_birth_id"=> $request->get('general_birth_id'),
      "general_immunization_id"=> $request->get('general_immunization_id'),
      "harmful_habits_id"=> $request->get('harmful_habits_id'),
      "patient_id"=> $patient[0]->id
    );


    $generalRecord = GeneralRecordPatient::create($fields);
    return response()->json(['status'=>true, 'code'=>'200', 'message'=>"Petición Exitosa", 'data'=> $generalRecord]);
  }

  // actualizar antecedente general
  public function updateGeneralRecord(Request $request){
    $generalRecordId = $request->get('id');

    $generalRecord = GeneralRecordPatient::findOrFail($generalRecordId);
    $generalRecord->medicaments = $request->get('medicaments');
    $generalRecord->RAM = $request->get('RAM');
    $generalRecord->occupational = $request->get('occupational');
    $generalRecord->general_prenatal_id = $request->get('general_birth_id');
    $generalRecord->general_immunization_id = $request->get('general_immunization_id');
    $generalRecord->harmful_habits_id = $request->get('harmful_habits_id');
    $generalRecord->patient_id = $request->get('patient_id');

    $generalRecordUpdated = $generalRecord->save();

    return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición Exitosa", 'data'=> $generalRecordUpdated]);
  }
}
