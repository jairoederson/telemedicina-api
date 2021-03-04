<?php namespace App\Http\Controllers\Admin;


use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Sentinel;
use App\Config;
use App\User;
use App\Laboratory;
use App\NoteOther;
use Date;
class ConfiguracionController extends Controller
{
   
    public function index(){
        return view('admin/configuracion');
    }
    public function obtenerConfiguracion(Request $request){
        $response = null;
        $response['configuracion'] = Config::where("estado","1")->first();                         
        return response()->json($response);
    }
   
    public function actualizarConfiguracion(Request $request) {
        $config = $request['configuracion'];
        $config['estado'] = '1';        

        Config::updateOrCreate(['id' => $config['id']], $config);
        return response()->json('ok');
    }

    public function gethorarioAtencion(){
        $config = Config::find(1);

        $result = [
          "hora_inicio" => $config->hora_inicio,
          "hora_final" => $config->hora_final,
        ];

        $hora_inicio = date("g:i a",strtotime($config->hora_inicio));
        $hora_final = date("g:i a",strtotime($config->hora_final));

        $message = "Medico Virtual solo esta disponible de ".$hora_inicio." a ".$hora_final;

        $dt = Carbon::now();

        $final = explode(':', $config->hora_final);
        $inicio = explode(':', $config->hora_inicio);

        if ($dt->hour <= intval($final[0]) && $dt->hour >= intval($inicio[0])){
            return response()->json(['estado'=>true, 'code'=>'201', 'message'=> "Si esta disponible", 'data'=>$result]);
        }else{
            return response()->json(['estado'=>false, 'code'=>'201', 'message'=> $message, 'data'=>$result]);
        }


    }
    
}
