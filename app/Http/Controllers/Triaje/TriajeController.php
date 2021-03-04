<?php

namespace App\Http\Controllers\Triaje;

use App\Patient;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TriajePatient;
use App\QueryOffline;
use App\Query;
use stdClass;

class TriajeController extends Controller
{
    // registrar triaje
    public function saveTriaje(Request $request){
      $query_offline_id = $request->get('query_offline_id');
      $query_id = $request->get('query_id');
      $patient= Patient::where('users_id', $request->get('user_id'))->first();
      $patient_id = $patient->id;

        //$triaje = TriajePatient::findOrFail($triajeId);
        if($request->get('user_id') != null){
            /*
            $triaje = TriajePatient::where('patient_id', $patient_id)->get()->last();
            if ($triaje){
                $triaje->blood_pressure = $request->get('blood_pressure');
                $triaje->breathing_frequency = $request->get('breathing_frequency');
                $triaje->heart_rate = $request->get('heart_rate');
                $triaje->temperature = $request->get('temperature');
                $triaje->weight = $request->get('weight');
                $triaje->size = $request->get('size');
                $triaje->patient_id = $request->get('patient_id');
                $triajeUpdated = $triaje->save();
            }else{
                $triajeUpdated = TriajePatient::create($request->all());
            }*/
            //$triajeUpdated = TriajePatient::create($request->all());
            $triajeUpdated = TriajePatient::create(['blood_pressure' => $request->get('blood_pressure'),
                'breathing_frequency' =>  $request->get('breathing_frequency'),
                'heart_rate'=> $request->get('heart_rate'),
                'temperature'=> $request->get('temperature'),
                'weight'=> $request->get('weight'),
                'size'=> $request->get('size'),
                'patient_id' => $patient_id]);

            return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición Exitoso", 'data'=>$triajeUpdated]);
        }else{
            return response()->json(['estado'=>false, 'code'=>404, 'message'=>"Error, identificador de paciente requerido", 'data'=>[]]);
        }

/*
      if($query_id){
        $query = Query::where('id', $query_id)->get();
        if(count($query) == 0){
          return response()->json(['message'=>'Consulta no encontrada', 'code'=>404]);
        }
        $triaje = TriajePatient::create($fields);
        return response()->json(["message"=>"Triaje registrado", "code"=>201, "data"=>$triaje]);

      }else if($query_offline_id){
        $query_offline = QueryOffline::where('id', $query_offline_id)->get();
        if(count($query_offline) == 0){
          return response()->json(['message'=>'Consulta offline no encontrada', 'code'=>404]);
        }

        $triaje = TriajePatient::create($fields);

        $queryoffline = QueryOffline::findOrFail($query_offline_id);
        $queryoffline->state = 'pendiente atencion';
        $queryofflineUpdated = $queryoffline->save();
        return response()->json(["message"=>"Triaje registrado", "code"=>201, "data"=>$triaje]);

      }else{
        return response()->json(["message"=>"Es necesario enviar el parametro query_id o query_offline_id", "code"=>200]);
      }
*/
    }
    
    public function updateTriaje(Request $request)
    {
      $triajeId = $request->get('triaje_id');

      $triaje = TriajePatient::findOrFail($triajeId);
      if($request->get('user_id') != null){
          $patient= Patient::where('users_id', $request->get('user_id'))->first();

            $triaje->blood_pressure = $request->get('blood_pressure');
            $triaje->breathing_frequency = $request->get('breathing_frequency');
            $triaje->heart_rate = $request->get('heart_rate');
            $triaje->temperature = $request->get('temperature');
            $triaje->weight = $request->get('weight');
            $triaje->size = $request->get('size');
            $triaje->patient_id = $patient->id;
            $triaje->query_id = $request->get('query_id');
            $triaje->query_offline_id = $request->get('query_offline_id');
            $triajeUpdated = $triaje->save();

            return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición Exitoso", 'data'=>$triaje]);
      }else{
           return response()->json(['estado'=>false, 'code'=>404, 'message'=>"Error, identificador de paciente requerido", 'data'=>[]]);
      }
      

    }

    public function getLastTriaje($id)
    {
        //$request->get('user_id')
            $patient= Patient::where('users_id', $id)->first();
            $patient_id = $patient->id;
            if ($patient){
                $triaje = TriajePatient::where('patient_id', $patient_id)->get()->last();
                if ($triaje){
                    return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición Exitoso", 'data'=>$triaje]);
                }else{
                    return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"No tiene triaje", 'data'=>$triaje]);
                }
            }else{
                return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"No es paciente"]);
            }
    }

    public function getTriajeUser($id){
        $patient= Patient::where('users_id', $id)->first();
        $patient_id = $patient->id;
        if ($patient){
            $triajes = TriajePatient::where('patient_id', $patient_id)->get();

            foreach ($triajes as $triaje){
                $patient = Patient::find($triaje->patient_id);
                $user = User::find($patient->users_id);
                $triaje->patient = $user->name." ".$user->last_name;
            }

            if ($triajes){
                return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición Exitoso", 'data'=>$triajes]);
            }else{
                return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"No tiene triaje", 'data'=>$triajes]);
            }
        }else{
            return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"No es paciente"]);
        }
    }

    public function getTriajeAll(){
            $triajes = TriajePatient::all();
            if ($triajes){
                foreach ($triajes as $triaje){
                    $patient = Patient::find($triaje->patient_id);
                    $user = User::find($patient->users_id);
                    $triaje->patient = $user->name." ".$user->last_name;
                }
                return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición Exitoso", 'data'=>$triajes]);
            }else{
                return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"No tiene triaje", 'data'=>$triajes]);
            }

    }


}
