<?php namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Sentinel;
use App\Config;
use App\User;
use App\Laboratory;
use App\Log;
use Date;
class LogController extends Controller
{
   
    public function index(){
        return view('admin/log');
    }
    public function listarLog(Request $request){
        $items = Log::select('logs.*',
                    DB::raw("(select concat(name,' ',last_name) from users where users.id = logs.users_id) as us_accion"),
                DB::raw("(select concat(name,' ',last_name) from users where users.id = logs.id_row) as us_afectado"))
                ->get();
        
        return response()->json($items);
    }
    
}
