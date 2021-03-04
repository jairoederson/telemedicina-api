<?php

namespace App\Http\Controllers\RecordPatient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RecordPathologicalPatient;
use App\RecordPathological;
use App\Patient;

class RecordPathologicalPatientController extends Controller
{
    // registrar un antecente patologico
    public function savePathologicalRecordPatient(Request $request){
      $patient = Patient::where('users_id', $request->get('user_id'))->get();

      if(count($patient) == 0){
        return response()->json(["message"=>"Usuario no encontrado", "code"=>404, "status"=>false]);
      }

      $data = $request->get('data');
      foreach ($data as $key => $element) {
        $fields = array(
          "CIE"=> $element["cie"],
          "description"=> $element["description"],
          "patient_id"=> $patient[0]->id
        );
  
        $pathologicalRecord = RecordPathologicalPatient::create($fields);
      }
      
      return response()->json(['status'=>true, 'code'=>'200', 'message'=>"Petición Exitosa", 'data'=> $data]);
    }

    // busqueda de antecedente patologico - autocomplete
    public function autocompletePathologicalRecord($word){
      $recordPathological = RecordPathological::where('description','LIKE',$word.'%')->get();
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición Exitoso", 'data'=>$recordPathological]);
    }

    // actualizar antecedente $pathologicalRecord
    public function updatePathologicalRecord(Request $request){
      $pathologicalRecordId = $request->get('pathologicalRecordId');

      $pathologicalRecord = RecordPathologicalPatient::findOrFail($pathologicalRecordId);
      
      if($request->get('record_pathological_id') != null){
      
      $pathologicalRecord->record_pathological_id = $request->get('record_pathological_id');
      $pathologicalRecord->patient_id = $request->get('patient_id');

      $pathologicalRecordUpdated = $pathologicalRecord->save();

      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición Exitoso", 'data'=>$pathologicalRecordUpdated]);
      }else{
           return response()->json(['estado'=>false, 'code'=>404, 'message'=>"Error, identificador de antecedente patologicos requerido", 'data'=>[]]);
      }
    }

}
