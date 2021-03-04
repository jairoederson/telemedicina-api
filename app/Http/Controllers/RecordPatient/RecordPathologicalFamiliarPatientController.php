<?php

namespace App\Http\Controllers\RecordPatient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RecordPathologicalFamilyPatient;
use App\RecordPathologicalFamily;
use App\Patient;

class RecordPathologicalFamiliarPatientController extends Controller
{
  // registrar un antecente patologico
  public function savePathologicalRecordFamilyPatient(Request $request){
    $patient = Patient::where('users_id', $request->get('user_id'))->get();

    if(count($patient) == 0){
      return response()->json(["message"=>"Usuario no encontrado", "code"=>404, "status"=>false]);
    }

    $data = $request->get('data');

    foreach ($data as $key => $element) {
      $fields = array(
        "CIE"=>$element["cie"],
        "description"=>$element["description"],
        "familiar"=>$element["familiar"],
        "patient_id"=>$patient[0]->id
      );
  
      $pathologicalRecord = RecordPathologicalFamilyPatient::create($fields);  
    }
    return response()->json(['status'=>true, 'code'=>'200', 'message'=>"Petición Exitosa", 'data'=> $data]);

  }

  // busqueda de antecedente patologico - autocomplete
  public function autocompletePathologicalFamiliarRecord($word){
    $recordPathologicalFamily = RecordPathologicalFamily::where('description','LIKE',$word.'%')->get();
    return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición Exitoso", 'data'=>$recordPathologicalFamily]);

  }

  // actualizar antecedente pagologico familiar
  public function updatePathologicalFamiliarRecord(Request $request){
        $pathologicalFamiliarRecordId = $request->get('pathologicalRecordId');

    $pathologicalFamiliarRecord = RecordPathologicalFamilyPatient::findOrFail($pathologicalFamiliarRecordId);

    $pathologicalFamiliarRecord->pathological_fam_id = $request->get('pathological_fam_id');
    $pathologicalFamiliarRecord->patient_id= $request->get('patient_id');

    $pathologicalRecordFamiliarUpdated = $pathologicalFamiliarRecord->save();
    return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición Exitoso", 'data'=>$pathologicalRecordFamiliarUpdated]);
  }
}
