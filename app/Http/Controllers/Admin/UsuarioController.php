<?php namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Sentinel;
use App\TypeDocument;
use App\User;
use App\RoleUser;
use App\UserPhone;
use Date;
use App\Log;
class UsuarioController extends Controller
{
   
    public function index($idusuario){
        return view('admin/usuario',array("idusuario"=>$idusuario));
    }
    
    public function actualizarUsuario($idusuario){
        return view('admin/actualizacionusuario',array("idusuarios"=>$idusuario));
    }
    
    public function listarUsuario(Request $request){
        
        if ($request['idrol'] == 0) {
            $items = User::join("role_users","users.id","=","role_users.user_id")
                ->join("roles","roles.id","=","role_users.role_id")
                ->select('users.*','roles.name as rol','role_users.role_id as idrol')
                ->where("users.estado","1")
                ->get();
        }else{
             $items = User::join("role_users","users.id","=","role_users.user_id")
                ->join("roles","roles.id","=","role_users.role_id")
                ->select('users.*','roles.name as rol','role_users.role_id as idrol')
                ->where("users.estado","1")->where("roles.id",$request['idrol'])
                ->get();
        }
        return response()->json($items);
    }
    
    public function obtenerUsuario(Request $request){
        $response = null;
        $response['usuario'] = User::where("users.id",$request['idusuario'])
                ->first();
        $response['rol']= RoleUser::where('user_id',$request['idusuario'])->first();
        $response['telefono'] = UserPhone::where('users_id',$request['idusuario'])->first();
                        
        return response()->json($response);
    }
    
    public function listarTipoDocumento(Request $request){
        $response = null;
        $response['tipodoc'] = TypeDocument::where("estado","1")
                ->get();
                        
        return response()->json($response);
    }
    
      public function modificarUsuario(Request $request) {
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
        //dd($usuario);
        $usuariosave = User::updateOrCreate(['id' => $usuario['id']], $usuario);
        
        //$roleuser = RoleUser::where('user_id',$usuario['id'])->first();
        //$roleuser->update(['role_id' => $request['rol']]);        
                
        $telefono = UserPhone::where('users_id',$usuario['id'])->where('estado','1')->first();
        if($telefono != null){
        $telefono ->update(['number' => $request['telefono']]); 
        }else{
            $telefono = new UserPhone();
            $telefono->code = '+51';
            $telefono->number = $request['telefono'];
            $telefono->estado = '1';
            $telefono->type_phones_id = '1';
            $telefono->users_id = $usuariosave->id;
            $telefono->save();
        }
        //$idUsuario = Sentinel::getUser()->id;
        $idUsuario = $usuariosave->id;
        $log = new Log();
        $log->users_id = $idUsuario;
        $log->action = 'actualizar';
        $log->table_name = 'usuario';
        $log->id_row = $usuario['id'];
        $log->save();
//        $telefono = new UserPhone();
//        $telefono->code = '+51';
//        $telefono->number = $request['telefono'];
//        $telefono->estado = '1';
//        $telefono->type_phones_id = '1';
//        $telefono->users_id = $usuariosave->id;
//        $telefono->save();
        
        return response()->json($usuario);
    }

}
