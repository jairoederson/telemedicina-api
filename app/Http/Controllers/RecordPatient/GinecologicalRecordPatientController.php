<?php

namespace App\Http\Controllers\RecordPatient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\GinecologicalRecordPatient;
use App\Patient;

class GinecologicalRecordPatientController extends Controller
{
    // registrar un antecedente ginecologico
    public function saveGinecologicalRecord(Request $request){
      $patient = Patient::where('users_id', $request->get('user_id'))->get();
      
      if(count($patient) == 0){
        return response()->json(["message"=>"Usuario no encontrado", "code"=>404, "status"=>false]);
      }
      
      $fields = array(
        "menarquia"=>$request->get('menarquia'),
        "regular_rule"=>$request->get('regular_rule'),
        "r_caternial"=>$request->get('r_caternial'),
        "rs"=>$request->get('rs'),
        "fur"=>$request->get('fur'),
        "fpp"=>$request->get('fpp'),
        "disminorrea"=>$request->get('disminorrea'),
        "nro_gestaciones"=>$request->get('nro_gestaciones'),
        "fup"=>$request->get('fup'),
        "pariedad"=>$request->get('pariedad'),
        "cesareas"=>$request->get('cesareas'),
        "pap"=>$request->get('pap'),
        "mamografia"=>$request->get('mamografia'),
        "mac"=>$request->get('mac'),
        "otros"=>$request->get('otros'),
        "patient_id"=>$patient[0]->id
      );

      $ginecologicalRecord = GinecologicalRecordPatient::create($fields);

      return response()->json(['status'=>true, 'code'=>'200', 'message'=>"Petición Exitosa", 'data'=> $ginecologicalRecord]);

    }
    
    public function checkGinecologicalRecord($patientId){
        $ginecologicalRecords = GinecologicalRecordPatient::where('patient_id',$patientId)->get();
        if(count($ginecologicalRecords)==0){
          return response()->json(['estado'=>false, 'code'=>'404', 'message'=>"Antecedente no encontrado", 'data'=>[]]);

        }else{
          return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición Exitosa", 'data'=> $ginecologicalRecords]);

        }
    }
    
    // actualizar antecedente ginecologico
    public function updateGinecologicalRecord(Request $request){
      $ginecologicalRecordId = $request->get('id');

      $ginecologicalRecord = GinecologicalRecordPatient::findOrFail($ginecologicalRecordId);
      $ginecologicalRecord->menarquia = $request->get('menarquia');
      $ginecologicalRecord->regular_rule = $request->get('regular_rule');
      $ginecologicalRecord->r_caternial = $request->get('r_caternial');
      $ginecologicalRecord->rs = $request->get('rs');
      $ginecologicalRecord->fur = $request->get('fur');
      $ginecologicalRecord->fpp = $request->get('fpp');
      $ginecologicalRecord->disminorrea = $request->get('disminorrea');
      $ginecologicalRecord->nro_gestaciones = $request->get('nro_gestaciones');
      $ginecologicalRecord->fup = $request->get('fup');
      $ginecologicalRecord->pariedad = $request->get('pariedad');
      $ginecologicalRecord->cesareas = $request->get('cesareas');
      $ginecologicalRecord->pap = $request->get('pap');
      $ginecologicalRecord->mamografia = $request->get('mamografia');
      $ginecologicalRecord->mac = $request->get('mac');
      $ginecologicalRecord->otros = $request->get('otros');
      $ginecologicalRecord->patient_id = $request->get('patient_id');

      $ginecologicalRecordUpdated = $ginecologicalRecord->save();
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición Exitosa", 'data'=> $ginecologicalRecordUpdated]);

    }
}
