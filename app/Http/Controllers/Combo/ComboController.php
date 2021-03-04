<?php

namespace App\Http\Controllers\Combo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComboController extends Controller
{

  // Obtener tipos de comprobantes
    public function getTypeVouchers(){
      $type_vouchers = \DB::table('type_vouchers')->get();
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición exitosa", 'data'=>$type_vouchers]);

    }

  // Obtener estados civiles
    public function getCivilStatus(){
      $civil_status = \DB::table('civil_status')->get();
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición exitosa", 'data'=>$civil_status]);

    }

  // Obtener grado de instruccion
    public function getDegreeInstruccions(){
      $degree_instructions = \DB::table('degree_instructions')->get();
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición exitosa", 'data'=>$degree_instructions]);

    }

  // Obtener tipo de acompañante
    public function getTypePassengers(){
      $type_passengers = \DB::table('type_passengers')->get();
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición exitosa", 'data'=>$type_passengers]);

    }

  // Obtener prenatales
    public function getPrenatals(){
      $general_prenatals = \DB::table('general_prenatals')->where('state','1')->get();
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición exitosa", 'data'=>$general_prenatals]);

    }

  // Obtener partos
    public function getPartos(){
      $general_births = \DB::table('general_births')->where('state','1')->get();
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición exitosa", 'data'=>$general_births]);

    }

  // Obtener inmunizaciones
    public function getImmunizations(){
      $general_immunizations = \DB::table('general_immunizations')->where('state','1')->get();
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición exitosa", 'data'=>$general_immunizations]);

    }

  // Obtener habitos nocivos
    public function getHarmfulHabits(){
      $harmful_habits = \DB::table('harmful_habits')->where('state','1')->get();
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición exitosa", 'data'=>$harmful_habits]);

    }

  // Obtener antecedente patologico
    public function getRecordPatological(){
      $record_pathologicals = \DB::table('record_pathologicals')->get();
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición exitosa", 'data'=>$record_pathologicals]);

    }

  // Obtener antecedente patologico familiar
    public function getRecordPatologicalFamiliar(){
      $record_pathological_families = \DB::table('record_pathological_families')->get();
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición exitosa", 'data'=>$record_pathological_families]);

    }

  // Obtener tipo de informante
    public function getTypeInformant(){
      $type_informants = \DB::table('type_informants')->get();
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición exitosa", 'data'=>$type_informants]);

    }

  // Obtener apetitos
    public function getAppetites(){
      $appetites = \DB::table('appetites')->get();
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición exitosa", 'data'=>$appetites]);

    }

  // Obtener Sueños
    public function getDreams(){
      $dreams = \DB::table('dreams')->get();
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición exitosa", 'data'=>$dreams]);

    }

  // Obtener Deposiciones
    public function getDepositions(){
      $depositions = \DB::table('depositions')->get();
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición exitosa", 'data'=>$depositions]);

    }

  // Obtener sed
    public function getThirts(){
      $thirsts = \DB::table('thirsts')->get();
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición exitosa", 'data'=>$thirsts]);

    }

  // Obtener orina
    public function getUrines(){
      $urines = \DB::table('urines')->get();
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición exitosa", 'data'=>$urines]);

    }

  // Obtener estado general
    public function getGeneralStatus(){
      $general_status = \DB::table('general_status')->get();
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición exitosa", 'data'=>$general_status]);

    }

  // Obtener diagnostico
    public function getDiagnosticData(){
      $diagnostic_datas = \DB::table('diagnostic_datas')->get();
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición exitosa", 'data'=>$diagnostic_datas]);

    }

  // Obtener tipo de diagnostico
    public function getTypeDiagnostic(){
      $type_diagnostics = \DB::table('type_diagnostics')->get();
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición exitosa", 'data'=>$type_diagnostics]);

    }

    // Obtener tipo de diagnostico
    public function getBloodType(){
      $bloodType = \DB::table('blood_types')->get();
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición exitosa", 'data'=>$bloodType]);

    }
}
