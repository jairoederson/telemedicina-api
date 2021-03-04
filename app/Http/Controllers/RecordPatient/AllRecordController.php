<?php

namespace App\Http\Controllers\RecordPatient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\GeneralRecordPatient;
use App\GinecologicalRecordPatient;
use App\RecordPathologicalPatient;
use App\RecordPathologicalFamilyPatient;

class AllRecordController extends Controller
{
  
  public function listAllDataGeneralRecord($patientId){
      
      $data['generalRecordPatient']= GeneralRecordPatient::where('patient_id',$patientId)->get();
      $data['ginecologicalRecordPatient']= GinecologicalRecordPatient::where('patient_id',$patientId)->get();
      $data['recordPathologicalPatient']= RecordPathologicalPatient::where('patient_id',$patientId)->get();
      $data['recordPathologicalFamilyPatient']= RecordPathologicalFamilyPatient::where('patient_id',$patientId)->get();
      
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición Exitosa", 'data'=> $data]);      
  }

}
