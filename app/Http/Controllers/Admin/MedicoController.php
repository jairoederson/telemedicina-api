<?php

namespace App\Http\Controllers\Admin;

use App\Config;
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
use App\Log;
use App\Specialty;
use App\SpecialityDoctor;
use App\PaymentDoctor;
use Date;
use Sentinel;

class MedicoController extends Controller {

    public function index() {
        return view('admin/medico');
    }

    public function listarMedicos(Request $request) {
        $items = Doctor::join("users", "users.id", "=", "doctors.users_id")
                ->select('users.*', 'doctors.*', DB::raw('(select count(queries.id) from queries where queries.doctor_id= doctors.id) as query'))
                ->where("users.estado", "1")
                ->get();

        return response()->json($items);
    }

    public function eliminarMedicos(Request $request) {
        //$doctor = Doctor::find($request['iddoctor']);
        //$user = User::find($doctor['users_id'])
        $user = User::find($request['id_user'])->update(['estado' => '0']);

        $idUsuario = Sentinel::getUser()->id;
        $log = new Log();
        $log->users_id = $idUsuario;
        $log->action = 'eliminar';
        $log->table_name = 'usuario';
        $log->id_row = $request['id_user'];
        $log->save();
        return response()->json($user);
    }

    public function verMedico($idusuario) {
        $doctor = Doctor::where('users_id', $idusuario)->first();
        return view('admin/vermedico', array("idusuarios" => $idusuario, "iddoctors" => $doctor['id']));
    }

    public function obtenerMedicos(Request $request) {

        //$doctor = Doctor::find($request['iddoctor']);
        //$user = User::find($doctor['users_id']);


        $user = User::find($request['iduser']);
        $doctor = Doctor::where('users_id', $user->id)->first();

        $academic = AcademincTraining::where('estado', '1')->where('doctors_id', $doctor['id'])->first();
        $experiencie = WorkExperience::where('estado', '1')->where('doctors_id', $doctor['id'])->get();
        $phones = UserPhone::where('estado', '1')->where('users_id', $doctor['users_id'])->get();
        $queries = Query::where('doctor_id', $doctor['id'])->orderby('id', 'desc')->first();
        $especialidad= SpecialityDoctor::join("specialties", "doctor_specialities.speciality_id", "=", "specialties.id")
        ->select('doctor_specialities.*', 'specialties.name')
        ->where("doctor_specialities.doctor_id", $doctor['id'])
        ->get();
        $consultasnum = Query::where('doctor_id', $doctor['id'])->count();
        $consultassum = Query::where('doctor_id', $doctor['id'])->sum('duration');
        $respuesta['doctor'] = $doctor;
        $respuesta['usuario'] = $user;
        $respuesta['academico'] = $academic;
        $respuesta['experiencia'] = $experiencie;
        $respuesta['telefono'] = $phones;
        $respuesta['consulta'] = $queries;
     $respuesta['especialidad']=$especialidad;
        $respuesta['consultasNum'] = $consultasnum;
        $respuesta['consultasSum'] = $consultassum;

        $dt = date('Y-m-d');
        $mes = date('m', strtotime($dt));

        $fecha = Date::createFromFormat('!m', $mes);
        $mesTexto = strftime("%B", $fecha->getTimestamp());

        $mespasado = strtotime('-1 month', strtotime($dt));
        $mes1 = date('m', $mespasado);
        $fecha = Date::createFromFormat('!m', $mes1);
        $mesTexto1 = strftime("%B", $fecha->getTimestamp());

        $mesantepasado = strtotime('-2 month', strtotime($dt));
        $mes2 = date('m', $mesantepasado);
        $fecha = Date::createFromFormat('!m', $mes2);
        $mesTexto2 = strftime("%B", $fecha->getTimestamp());


        $arrayTexto[] = null;
        $arrayTexto[0] = $mesTexto2;
        $arrayTexto[1] = $mesTexto1;
        $arrayTexto[2] = $mesTexto;

        $totalmes = Query::where('doctor_id', $doctor['id'])->whereMonth('date', $mes)->count();
        $totalmes1 = Query::where('doctor_id', $doctor['id'])->whereMonth('date', $mes1)->count();
        $totalmes2 = Query::where('doctor_id', $doctor['id'])->whereMonth('date', $mes2)->count();

        $arrayCantidad[] = null;
        $arrayCantidad[0] = $totalmes2;
        $arrayCantidad[1] = $totalmes1;
        $arrayCantidad[2] = $totalmes;

        $respuesta['textos'] = $arrayTexto;
        $respuesta['cantidades'] = $arrayCantidad;

        $notes = Note::where('estado', '1')->where('users_id', $doctor['users_id'])->get();

        $respuesta['notas'] = $notes;

        return response()->json($respuesta);
    }

    public function agregarNotaMedicos(Request $request) {

        //$doctor = Doctor::find($request['iddoctor']);
        $user = User::find($request['idusuario']);

        $note = new Note();
        $note->text = $request['texto'];
        $note->estado = 1;
        $note->users_id = $user['id'];
        $note->save();

        $notes = Note::where('estado', '1')->where('users_id', $user['id'])->get();

        return response()->json($notes);
    }

    public function GenerarPlanPagosMedico(Request $request) {

        $config = Config::all();
        $pctje = $config[0]->doctor_price;
        $monto = Query::where('doctor_id', $request['iddoctor'])->
                        whereMonth('queries.created_at', $request['mes'])->
                        whereYear('queries.created_at', $request['anio'])->sum('price');
        $respuesta['monto'] = ($monto * $pctje / 100);
        return response()->json($respuesta);
    }
    
    public function actualizarDatosProMedico(Request $request) {

        $user = User::find($request['iduser']);
        $doctor = Doctor::where('users_id', $user->id)->first();

        //Doctor::updateOrCreate(['id' => $doctor['id']], $doctor);
        $doctor ->update(['specialty' => $request['specialty'],
                          'id_cmp' => $request['id_cmp'],
                          'linkedIn' => $request['lnkedIn'],
                          'about_me' => $request['about_me']]); 
        return response()->json('ok');
    }

    public function RegistroPagosMedico(Request $request) {

        $pago = $request['pago'];
        $pago['estado'] = '1';

        PaymentDoctor::updateOrCreate(['id' => $pago['id']], $pago);
        return response()->json('ok');
    }
    public function RegistroExperienciaMedico(Request $request) {

        $experiencia = $request['experiencia'];
        $experiencia['estado'] = '1';
        $fechainicio =
        explode('/', $experiencia['start_date'])[2] .
        '/' .
        explode('/', $experiencia['start_date'])[1] .
        '/' .
        explode('/', $experiencia['start_date'])[0];
        $experiencia['start_date']=$fechainicio;
        $fechafin =
        explode('/', $experiencia['end_date'])[2] . 
        '/' .
        explode('/', $experiencia['end_date'])[1] .
        '/' .
        explode('/', $experiencia['end_date'])[0];
        $experiencia['end_date']=$fechafin;
        WorkExperience::updateOrCreate(['id' => $experiencia['id']], $experiencia);
        return response()->json('ok');
    }
    public function RegistroFormacionMedico(Request $request) {

        $formacion = $request['formacion'];
        $formacion['estado'] = '1';
        $fechainicio =
        explode('/', $formacion['start_date'])[2] .
        '/' .
        explode('/', $formacion['start_date'])[1] .
        '/' .
        explode('/', $formacion['start_date'])[0];
        $formacion['start_date']=$fechainicio;
        $fechafin =
        explode('/', $formacion['end_date'])[2] . 
        '/' .
        explode('/', $formacion['end_date'])[1] .
        '/' .
        explode('/', $formacion['end_date'])[0];
        $formacion['end_date']=$fechafin;
        AcademincTraining::updateOrCreate(['id' => $formacion['id']], $formacion);
        return response()->json('ok');
    }

    public function eliminarPagosMedico(Request $request) {
        $pago = PaymentDoctor::find($request['idPago'])->update(['estado' => '0']);
        return response()->json($pago);
    }
    public function eliminarFormacionMedico(Request $request) {
        $formacion = AcademincTraining::find($request['idFormacion'])->update(['estado' => '0']);
        return response()->json($formacion);
    }
    public function eliminarExperienciaMedico(Request $request) {
        $experiencia = WorkExperience::find($request['idExperiencia'])->update(['estado' => '0']);
        return response()->json($experiencia);
    }
    public function obtenerPagosMedico(Request $request) {

        $payment = PaymentDoctor::where('doctor_id', $request['iddoctor'])->where('estado', 1)->get();


        for ($i = 0, $size = count($payment); $i < $size; ++$i) {
            $fecha = Date::createFromFormat('!m', $payment[$i]['month']);
            $mesTexto = strftime("%B", $fecha->getTimestamp());
            $payment[$i]['monthName'] = $mesTexto;
            if ($payment[$i]['estado'] == 1){
                $payment[$i]['estado'] = "Pagado";
            }else{
                $payment[$i]['estado'] = "Pendiente";
            }
        }

        $respuesta['pagos'] = $payment;

        return response()->json($respuesta);
    }
    public function  obtenerFormacionMedico(Request $request){
        $academics = AcademincTraining::where('doctors_id', $request['iddoctor'])->where('estado', 1)->get();

        $respuesta['academics'] = $academics;

        return response()->json($respuesta);

    }
    public function  obtenerExperienciaMedico(Request $request){
        $experiens = WorkExperience::where('doctors_id', $request['iddoctor'])->where('estado', 1)->get();

        $respuesta['experiencias'] = $experiens;

        return response()->json($respuesta);

    }
}
