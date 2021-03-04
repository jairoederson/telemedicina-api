<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Date;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Sentinel;
use App\Company;
use App\User;
use App\RoleUser;
use App\Patient;
use App\PaymentCompany;
use App\UserPhone;
use App\Query;
use App\NoteOther;
use App\AffiliatePatient;

use App\File;
use App\Helpers\Thumbnail;
use App\Http\Requests\FileUploadRequest;


class AsociadoController extends Controller {

    public function index() {
        return view('admin/asociados');
    }

    public function listarAsociados(Request $request) {
        $asociados = Company::where('estado', '1')->get();
        return response()->json($asociados);
    }

    public function registroAsociados() {
        return view('admin/registroasociado');
    }

    public function registrarAsociado(Request $request) {
        $asociado = $request['asociado'];
        $asociado['estado'] = '1';
        $asociadosave = Company::updateOrCreate(['id' => $asociado['id']], $asociado);
        return response()->json($asociadosave);
    }
    
    public function store($idasociado,FileUploadRequest $request)
    {
        $destinationPath = public_path() . '/images/companies/';

        $file_temp = $request->file('file');
        $extension       = $file_temp->getClientOriginalExtension() ?: 'png';
        $safeName        = str_random(10).'.'.$extension;
        //$safeName = $idasociado +1;
        
        $compania = Company::where('id',$idasociado)->first();
        $compania->update(['url_image' => $safeName]);      
        
        $fileItem = new File();
        $fileItem->filename = $safeName;
        //$fileItem->filename = $request->input('idasociado');
        $fileItem->mime = $file_temp->getMimeType();
        $fileItem->save();

        $file_temp->move($destinationPath, $safeName);

        Thumbnail::generate_image_thumbnail($destinationPath . $safeName, $destinationPath . 'thumb_' . $safeName);

        return $fileItem->toJson();
    }

    public function verAsociado($idasociado) {
        return view('admin/verasociado', array("idasociados" => $idasociado));
    }

    public function actualizarAsociado($idasociado) {
        return view('admin/actualizacionasociado', array("idasociados" => $idasociado));
    }
    
    
    public function GenerarPlanPagosAsociado(Request $request) {
        $monto = Query::join("patients", "patients.id", "=", "queries.patient_id")->
                        where('patients.company_id', $request['idasociado'])->
                        whereMonth('queries.created_at',$request['mes'])->
                        whereYear('queries.created_at',$request['anio'])->sum('price');
        $respuesta['monto'] = $monto;
        return response()->json($respuesta);
    }
    public function RegistroPagosAsociado(Request $request) {
        
        $oagoCompania = $request['pago'];
        $oagoCompania['estado'] = '1';        
        
        PaymentCompany::updateOrCreate(['id' => $oagoCompania['id']], $oagoCompania);
        return response()->json('ok');
    }
    public function eliminarPagosAsociado(Request $request) {
        $pago = PaymentCompany::find($request['idPago'])->update(['estado' => '0']);
        return response()->json($pago);
    }
    
    
    public function obtenerPagosAsociado(Request $request) {

        $payment = PaymentCompany::where('company_id', $request['idasociado'])->where('estado',1)->get();
        
        if(count($payment) == 0) {
            $respuesta['consultasNum'] = "0";
            $respuesta['consultasSum'] = "0";
            $respuesta['consultasPrecio'] = "0";
            $respuesta['pagos'] = $payment;

            return response()->json($respuesta);
        }
        
        for($i = 0, $size = count($payment); $i < $size; ++$i) {
            $fecha = Date::createFromFormat('!m',$payment[$i]['month']);
            $mesTexto = strftime("%B",$fecha->getTimestamp());
            $payment[$i]['monthName'] = $mesTexto;
        }
        
        $respuesta['pagos'] = $payment;
        
        $consultasnum = Query::join("patients", "patients.id", "=", "queries.patient_id")->
                        where('patients.company_id', $request['idasociado'])->count();
        $respuesta['consultasNum'] = $consultasnum;

        $consultassum = Query::join("patients", "patients.id", "=", "queries.patient_id")->
                        where('patients.company_id', $request['idasociado'])->sum('duration');
        $respuesta['consultasSum'] = $consultassum;

        $consultasprecio = Query::join("patients", "patients.id", "=", "queries.patient_id")->
                        where('patients.company_id', $request['idasociado'])->sum('price');
        $respuesta['consultasPrecio'] = $consultasprecio;

        return response()->json($respuesta);
    }

    public function obtenerAsociado(Request $request) {
        $asociado = Company::find($request['idasociado']);
        $asociado['cantidadEmpleados'] = count(AffiliatePatient::where('company_id', $request['idasociado'])->get());
        
        $notes = NoteOther::where('estado', '1')
                ->where('table_id', $request['idasociado'])
                ->where('category_note', 'company')->get();
        
        $asociado['notas'] = $notes;
        
        return response()->json($asociado);
    }
    
    

    public function agregarNota(Request $request) {

        
        //$asociado = Company::find($request['idasociado']);

        $note = new NoteOther();
        $note->body_note = $request['texto'];
        $note->estado = '1';
        $note->table_id = $request['idasociado'];
        $note->category_note  = 'company';
        $note->save();

        $notes = NoteOther::where('estado', '1')
                ->where('table_id', $request['idasociado'])
                ->where('category_note', 'company')->get();

        return response()->json($notes);
    }

    public function listarAfiliados(Request $request) {

        /*
        $items = Patient::join("users", "users.id", "=", "patients.users_id")
                ->select('users.*', DB::raw('(select count(queries.id) from queries where queries.patient_id= patients.id) as query'))
                ->where("users.estado", "1")->where('patients.company_id', $request['idasociado'])
                ->get();*/

        $items = AffiliatePatient::where('company_id', $request['idasociado'])->get();
        $patients = [];
        foreach ($items as $key => $value) {
            $patient = Patient::findOrFail($value["affiliate_id"]);
            array_push($patients, $patient);
        }

        $users = [];
        foreach ($patients as $key => $patient) {
            $user = User::findOrFail($patient["users_id"]);
            array_push($users, $user);
        }

        return response()->json($users);
    }

    public function registrarAfiliado(Request $request) {
        $usuario = $request['usuario'];
        $usuario['estado'] = '1';
        $usuario['password'] = bcrypt($usuario['password']);

        $usuariosave = User::updateOrCreate(['id' => $usuario['id']], $usuario);

        $patient = new Patient();
        $patient->ocupation = '';
        $patient->num_attentions = '';
        $patient->users_id = $usuariosave->id;
        $patient->company_id = $request['idcompania'];
        $patient->save();

        $roleuser = new RoleUser();
        $roleuser->user_id = $usuariosave->id;
        $roleuser->role_id = 3;
        $roleuser->save();

        $telefono = new UserPhone();
        $telefono->code = '+51';
        $telefono->number = $request['telefono'];
        $telefono->estado = '1';
        $telefono->type_phones_id = '1';
        $telefono->users_id = $usuariosave->id;
        $telefono->save();

        $user = Sentinel::findById($usuariosave->id);
        $activation = Activation::create($user);

        $activat = Activation::where('user_id', $usuariosave->id)->first();
        $activat->update(['completed' => 1]);

        return response()->json($activation);
    }

    public function eliminarAsociado(Request $request) {
        $compania = Company::find($request['idcompania'])->update(['estado' => '0']);
        return response()->json($compania);
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

}
