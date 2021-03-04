<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\WorkExperience;
use App\AcademincTraining;
use Date;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use App\Speciality;
use App\SpecialityDoctor;
use App\Log;
use App\PaymentCompany;
use App\File;
use Sentinel;

class EspecialidadController extends Controller {

    public function index() {
        return view('admin/especialidades');
    }

    public function listarEspecialidades(Request $request) {
        $especialidades = Speciality::where('estado', '1')->get();
        return response()->json($especialidades);
    }

    public function verEspecialidad($idespecialidad) {
        return view('admin/verespecialidad', array("idespecialidades" => $idespecialidad));
    }

    public function actualizarEspecialidad($idespecialidad) {
        return view('admin/actualizacionespecialidad', array("idespecialidades" => $idespecialidad));
    }
      public function ModificarEspecialidad(Request $request){
      $especialidad = $request['especialidad'];
      $especialidad['estado'] = '1';
      $especialidadsave = Speciality::updateOrCreate(['id' => $especialidad['id']], $especialidad);
      return response()->json($especialidadsave);
  }
    public function obtenerEspecialidad(Request $request){
    $response = null;
    $response['especialidad'] = Speciality::where("specialties.id",$request['idespecialidad'])
            ->first();
                    
    return response()->json($response);
    }
    public function eliminarEspecialidad(Request $request) {
  $compania = Speciality::find($request['idespecialidad'])->update(['estado' => '0']);
  return response()->json($compania);
}
public function obtenerEspecialidadMedico(Request $request) {
   // print_r("entro");
    //$especialidades = SpecialityDoctor::join("specialities", "doctor_specialities.speciality_id", "=", "specialities.id")
    //->select('doctor_specialities.*', 'specialities.name')
    //->where("doctor_specialities.doctor_id", $request['iddoctor'])
    //->get();
   // return response()->json($especialidades);
    
  $especialidades = SpecialityDoctor::join("specialties", "doctor_specialities.speciality_id", "=", "specialties.id")
                ->select('doctor_specialities.*', 'specialties.name')
                ->where("doctor_specialities.doctor_id", $request['iddoctor'])
                ->get();
        return response()->json($especialidades);
  }
public function eliminarEspecialidadMedico(Request $request) {
      $especialidad = SpecialityDoctor::find($request['idEspecialidad'])->delete();
          
          return response()->json($especialidad);

}
    public function agregarEspecialidadMedico(Request $request) {
        $especialidad = $request['oEspecialidad'];
        $especialidadsave = SpecialityDoctor::updateOrCreate(['id' => $especialidad['id']], $especialidad);
        return response()->json($especialidadsave);
    }
    
}