<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
// use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Sentinel;
use App\Ubigeo;
use App\Patient;
use App\User;
use App\RoleUser;
use App\UserPhone;
use App\Activation;
use App\Doctor;
use Date;
use App\Log;

class RegistroUsuarioController extends Controller {

    public function index() {
        return view('admin/registrousuario');
    }

    public function registrarUsuario(Request $request) {
        if ($request['rol'] == 2) {
            $usuario = $request['usuario'];
            $usuario['estado'] = '1';
            $usuario['password'] = bcrypt($usuario['password']);
            $user_sinch = preg_replace('/\s+/', '', $usuario['name']) . time();
            $usuario['user_sinch'] = $user_sinch;
            $usuario['password_sinch'] = $user_sinch;
            $usuario['img'] = "https://telemedicina.today/images/user/default/default.jpg";
                $birth_date =
                    explode('/', $usuario['birth_date'])[2] .
                    '/' .
                    explode('/', $usuario['birth_date'])[1] .
                    '/' .
                    explode('/', $usuario['birth_date'])[0];
            $usuario['birth_date']=$birth_date;
            $usuariosave = User::updateOrCreate(['id' => $usuario['id']], $usuario);
            
            $doctor = new Doctor();
            $doctor->users_id = $usuariosave->id;
            $doctor->status = 1;
            $doctor->save();
            
            $roleuser = new RoleUser();
            $roleuser->user_id = $usuariosave->id;
            $roleuser->role_id = $request['rol'];
            $roleuser->save();
            
            $telefono = new UserPhone();
            $telefono->code = '+51';
            $telefono->number = $request['telefono'];
            $telefono->estado = '1';
            $telefono->type_phones_id = '1';
            $telefono->users_id = $usuariosave->id;
            $telefono->save();
            
            
            $act = array(
                "user_id" => $usuariosave->id,
                "code" => bcrypt($usuario['name']),
                "completed" => 1,
                "completed_at" => date('Y-m-d H:i:s'),
            );
            
            Activation::create($act);

            // $idUsuario = Sentinel::getUser()->id;
            // $log = new Log();
            // $log->users_id = $idUsuario;
            // $log->action = 'registrar';
            // $log->table_name = 'usuario';
            // $log->id_row = $usuariosave->id;
            // $log->save();
            
        }
        if ($request['rol'] == 3) {
            $usuario = $request['usuario'];
            
            $usuario['estado'] = '1';
            $usuario['password'] = bcrypt($usuario['password']);
                $birth_date =
                    explode('/', $usuario['birth_date'])[2] .
                    '/' .
                    explode('/', $usuario['birth_date'])[1] .
                    '/' .
                    explode('/', $usuario['birth_date'])[0];
            $usuario['birth_date']=$birth_date;
            $usuariosave = User::updateOrCreate(['id' => $usuario['id']], $usuario);

            $patient = new Patient();
            $patient->ocupation = '';
            $patient->num_attentions = '';
            $patient->users_id = $usuariosave->id;
            //$patient->company_id = $request['idcompania'];
            $patient->save();

            $roleuser = new RoleUser();
            $roleuser->user_id = $usuariosave->id;
            $roleuser->role_id = $request['rol'];
            $roleuser->save();

            $telefono = new UserPhone();
            $telefono->code = '+51';
            $telefono->number = $request['telefono'];
            $telefono->estado = '1';
            $telefono->type_phones_id = '1';
            $telefono->users_id = $usuariosave->id;
            $telefono->save();


            $act = array(
                "user_id" => $usuariosave->id,
                "code" => bcrypt($usuario['name']),
                "completed" => 1,
                "completed_at" => date('Y-m-d H:i:s'),
            );
            
            Activation::create($act);
            
            // $user = Sentinel::findById($usuariosave->id);
            // Activation::create($user);

            // $activat = Activation::where('user_id', $usuariosave->id)->first();
            // $activat->update(['completed' => 1]);

            // $idUsuario = Sentinel::getUser()->id;
            // $log = new Log();
            // $log->users_id = $idUsuario;
            // $log->action = 'registrar';
            // $log->table_name = 'usuario';
            // $log->id_row = $usuariosave->id;
            // $log->save();
        }
        if ($request['rol'] == 1 || $request['rol'] == 4 ||  $request['rol'] == 5 || $request['rol'] == 6) {
            $usuario = $request['usuario'];
            $usuario['estado'] = '1';
            $usuario['password'] = bcrypt($usuario['password']);
     
                $birth_date =
                    explode('/', $usuario['birth_date'])[2] .
                    '/' .
                    explode('/', $usuario['birth_date'])[1] .
                    '/' .
                    explode('/', $usuario['birth_date'])[0];
            $usuario['birth_date']=$birth_date;


            $usuariosave = User::updateOrCreate(['id' => $usuario['id']], $usuario);

            $roleuser = new RoleUser();
            $roleuser->user_id = $usuariosave->id;
            $roleuser->role_id = $request['rol'];
            $roleuser->save();

            $telefono = new UserPhone();
            $telefono->code = '+51';
            $telefono->number = $request['telefono'];
            $telefono->estado = '1';
            $telefono->type_phones_id = '1';
            $telefono->users_id = $usuariosave->id;
            $telefono->save();


            $act = array(
                "user_id" => $usuariosave->id,
                "code" => bcrypt($usuario['name']),
                "completed" => 1,
                "completed_at" => date('Y-m-d H:i:s'),
            );
            
            Activation::create($act);
            // $user = Sentinel::findById($usuariosave->id);
            // $activation = Activation::create($user);

            // $activat = Activation::where('user_id', $usuariosave->id)->first();
            // $activat->update(['completed' => 1]);

            // $idUsuario = Sentinel::getUser()->id;
            // $log = new Log();
            // $log->users_id = $idUsuario;
            // $log->action = 'registrar';
            // $log->table_name = 'usuario';
            // $log->id_row = $usuariosave->id;
            // $log->save();
        }
        return response()->json(true);
    }

}
