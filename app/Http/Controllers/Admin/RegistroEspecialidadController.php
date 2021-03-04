<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Speciality;
use App\Http\Requests\FileUploadRequest;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
class RegistroEspecialidadController extends Controller
{
    
     public function index() {
        return view('admin/registroespecialidad');
    }
    public function registroEspecialidad(Request $request){

        $especialidad = $request['especialidad'];
        $especialidad['estado'] = '1';
        $especialidadsave = Speciality::updateOrCreate(['id' => $especialidad['id']], $especialidad);
        return response()->json($especialidadsave);
    }
}
