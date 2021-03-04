<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Calification;

class CalificationController extends Controller
{
    public function getCalificationDoctor($id){
      $doctors = Calification::where('doctor_id', '=' ,$id)->firstOrFail();
      return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion Exitoso", 'data'=>$doctors]);      
    }

    public function saveCalification(Request $request){
      $fields = $request->all();
      $calification_stored = Calification::create($fields);
      return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Almacenamiento Exitoso", 'data'=>$calification_stored]);
    }
}
