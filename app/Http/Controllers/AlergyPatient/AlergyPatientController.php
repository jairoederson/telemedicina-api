<?php

namespace App\Http\Controllers\AlergyPatient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ActiveMedication;
use App\AlergyPatient;
use App\Patient;

class AlergyPatientController extends Controller
{
    /*Autocomplete para buscar un medicamento activo*/
    public function autocompleteActiveMedicament($word){
      $activeMedicament = ActiveMedication::where('name','LIKE',$word.'%')->get();
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición Exitoso", 'data'=>$activeMedicament]);
    }

    /*Guardar un medicamento activo alergico a un paciente*/
    public function saveActiveMedicationPatient(Request $request){
      $patient = Patient::where('users_id', '=', $request->get('patient_id'))->firstOrFail();
      $fields = array(
        "patient_id"=>$patient->id,
        "active_medication_id"=>$request->get('active_medication_id')
      );

      $alergyPatient = AlergyPatient::create($fields);

      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Almacenamiento Exitoso", 'data'=>$alergyPatient]);
    }

    /*Obtener los medicamentos activos alergicos a un paciente*/
    public function getAlergicMedicamentActive($dni){
      $user = \DB::table('users')
        ->where('users.numdoc', $dni)
        ->get();
      if(count($user) == 0){
        return response()->json(['estado'=>false, 'code'=>'404', 'message'=>"No se encontro al usuario con ese dni", 'data'=>[]]);

      }else{
        $patient = Patient::where('users_id', '=', $user[0]->id)->get();
        if(count($patient) == 0){
          return response()->json(['estado'=>false, 'code'=>'404', 'message'=>"El dni no pertenece a la cuenta de un paciente", 'data'=>[]]);

        }else{
          $alergyMedicament = AlergyPatient::where('patient_id', '=', $patient[0]->id)->get();
          if(count($alergyMedicament) == 0){
            return response()->json(['estado'=>false, 'code'=>'404', 'message'=>"El paciente no es alergico a ningun medicamento activo", 'data'=>[]]);

          }else{
            $activeMedicaments = [];

            foreach ($alergyMedicament as $key => $value) {
              $activeMedicament = ActiveMedication::findOrFail($value->active_medication_id);
              array_push($activeMedicaments, $activeMedicament->name);
            }

            return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición Exitosa", 'data'=>$activeMedicaments]);

          }
        }
      }
    }
}
