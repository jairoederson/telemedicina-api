<?php namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Doctor;
use App\User;
use App\AcademincTraining;
use App\WorkExperience;
use App\UserPhone;
use App\Query;
use App\Note;
use App\Patient;
use Date;
class PacienteController extends Controller
{

    public function index(){
        return view('admin/paciente');
    }
    
    public function listarPacientes(Request $request){
        $items = Patient::join("users","users.id","=","patients.users_id")
                ->select('users.*',
                        DB::raw('(select count(queries.id) from queries where queries.patient_id= patients.id) as query'))
                ->where("users.estado","1")
                ->get();
        
        return response()->json($items);
    }
    
    public function eliminarPacientes(Request $request){
        $user = User::find($request['id_user'])->update(['estado' => '0']);
        return response()->json($user);
    }
    
    public function verPacientes($idusuario){
        return view('admin/verpaciente',array("idusuarios"=>$idusuario));
    }
    
    public function obtenerPacientes(Request $request){
        
        //$doctor = Doctor::find($request['iddoctor']);
        //$user = User::find($doctor['users_id']);
          $user = User::find($request['iduser']);
          $respuesta['usuario'] = $user;
          $phones = UserPhone::where('estado','1')->where('users_id',$user['id'])->get(); 
          $respuesta['telefono'] = $phones;
          $patient = Patient::where('users_id',$request['iduser'])->first();
          $respuesta['paciente'] = $patient;
          
          $consultasnum = Query::where('patient_id',$patient['id'])->count();
          $respuesta['consultasNum'] = $consultasnum;  
          $consultassum = Query::where('patient_id',$patient['id'])->sum('duration');
          $respuesta['consultasSum'] = $consultassum; 
//        $user = User::find($request['iduser']);
//        $doctor = Doctor::where('users_id',$user->id)->first();
//        
//        $academic = AcademincTraining::where('estado','1')->where('doctors_id',$doctor['id'])->first();
//        $experiencie = WorkExperience::where('estado','1')->where('doctors_id',$doctor['id'])->get();        
//        $phones = UserPhone::where('estado','1')->where('users_id',$doctor['users_id'])->get(); 
//        $queries = Query::where('doctor_id',$doctor['id'])->orderby('id','desc')->first();
//        
//        $consultasnum = Query::where('doctor_id',$doctor['id'])->count();
//        $consultassum = Query::where('doctor_id',$doctor['id'])->sum('duration');
//        $respuesta['doctor'] = $doctor; 
//        $respuesta['usuario'] = $user; 
//        $respuesta['academico'] = $academic;
//        $respuesta['experiencia'] = $experiencie;
//        $respuesta['telefono'] = $phones;
//        $respuesta['consulta'] = $queries;
//        $respuesta['consultasNum'] = $consultasnum;
//        $respuesta['consultasSum'] = $consultassum;
//        
            $dt = date('Y-m-d');
            $mes = date('m',strtotime($dt));

            $fecha = Date::createFromFormat('!m',$mes);
            $mesTexto = strftime("%B",$fecha->getTimestamp());

            $mespasado = strtotime('-1 month',strtotime($dt));        
            $mes1 = date('m',$mespasado);
            $fecha = Date::createFromFormat('!m',$mes1);
            $mesTexto1 = strftime("%B",$fecha->getTimestamp());

            $mesantepasado = strtotime('-2 month',strtotime($dt));        
            $mes2 = date('m',$mesantepasado);
            $fecha = Date::createFromFormat('!m',$mes2);
            $mesTexto2 = strftime("%B",$fecha->getTimestamp());


            $arrayTexto[] = null;
            $arrayTexto[0] =$mesTexto2;
            $arrayTexto[1] =$mesTexto1;
            $arrayTexto[2] =$mesTexto;

            $totalmes  = Query::where('patient_id',$patient['id'])->whereMonth('date',$mes)->count();
            $totalmes1  = Query::where('patient_id',$patient['id'])->whereMonth('date',$mes1)->count();
            $totalmes2  = Query::where('patient_id',$patient['id'])->whereMonth('date',$mes2)->count();

            $arrayCantidad[] = null;
            $arrayCantidad[0] =$totalmes2;
            $arrayCantidad[1] =$totalmes1;
            $arrayCantidad[2] =$totalmes;

            $respuesta['textos'] = $arrayTexto;
            $respuesta['cantidades'] = $arrayCantidad;
        
        $notes = Note::where('estado','1')->where('users_id',$user['id'])->get(); 
        
        $respuesta['notas'] = $notes;
        
        return response()->json($respuesta);
        
        
    }
    
       public function agregarNotaPacientes(Request $request){
         $user = User::find($request['idusuario']);
       
        
        $note = new Note();
        $note->text = $request['texto'];
        $note->estado = 1;
        $note->users_id=$user['id'];  
        $note->save();
        $notes = Note::where('estado','1')->where('users_id',$user['id'])->get(); 
        return response()->json($notes);
    }
    
    
    


}
