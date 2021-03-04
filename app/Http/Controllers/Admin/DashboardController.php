<?php namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


use App\Query;
use App\Calification;
use App\Company;
use Date;
use Sentinel;
class DashboardController extends Controller
{
    public function listarDatos(Request $request){
        $dateToday = date('Y-m-d');
        $nuevafecha = strtotime ( '-7 day' , strtotime ( $dateToday ) ) ;
        $nuevafecha = date ( 'Y-m-d' , $nuevafecha );
        
        $mes = date('m',strtotime($dateToday));
        $anio = date('Y',strtotime($dateToday));
        

        $respuesta['ingresosHoy'] = Query::where(DB::raw("DATE(created_at)"),$dateToday)->where('state',1)->sum('price');
        $respuesta['ingresosUltimaSem'] = Query::where(DB::raw("DATE(created_at)"), '>=', $nuevafecha)
                ->where('state',1)->where(DB::raw("DATE(created_at)"), '<=', $dateToday)->sum('price');
        $respuesta['ingresosUltimoMes'] = Query::whereMonth('created_at',$mes)->where('state',1)->
                whereYear('date',$anio)->sum('price');
        
        $respuesta['numeroConsultasHoy'] = Query::where(DB::raw("DATE(created_at)"),$dateToday)->where('state',1)->count();
        $respuesta['numeroConsultasSem'] = Query::where(DB::raw("DATE(created_at)"), '>=', $nuevafecha)
                ->where('state',1)->where(DB::raw("DATE(created_at)"), '<=', $dateToday)->count();
        $respuesta['numeroConsultasUltimoMes'] = Query::whereMonth('created_at',$mes)->where('state',1)->
                whereYear('created_at',$anio)->count();
  
        $respuesta['calificacionHoy'] =  
                Calification::where(DB::raw("DATE(created_at)"),$dateToday)->sum('calification')/
                (Calification::where(DB::raw("DATE(created_at)"),$dateToday)->count()==0?1:
                 Calification::where(DB::raw("DATE(created_at)"),$dateToday)->count());   
        
        $respuesta['tiempoPromedioConsulta'] =  
                Query::where('state',1)->sum('duration') /
                (Query::where('state',1)->count()==0?1:Query::where('state',1)->count());
        
        $arrayNumLlamadas[] = null;
        $j=0;
        for($i = 0; $i < 12; ++$i) {            
            $j = $i*2;
            $arrayNumLlamadas[] = Query::where('state',1)
                ->where(DB::raw("HOUR(created_at)"), '>', $j)
                ->where(DB::raw("HOUR(created_at)"), '<=', $j+2)
                ->count();
        }
//        $arrayNumLlamadas = Query::where('state',1)->where(DB::raw("HOUR(created_at)"), '>', 20)
//                ->where(DB::raw("HOUR(created_at)"), '<', 22)
//                ->count();
        $respuesta['numerollamadas'] = $arrayNumLlamadas;
        
        $arrayIngresoMes[] = null;
        for($i = 0; $i < 12; ++$i) {
            
            $arrayIngresoMes[$i] = Query::where('state',1)
                ->where(DB::raw("MONTH(created_at)"), '=', $i)
                ->sum('price');
        }
        
        $respuesta['ingresosMes'] = $arrayIngresoMes;
        
        $arrayEgresoMes[] = null;
        for($i = 0; $i < 12; ++$i) {
            
            $arrayEgresoMes[$i] = Query::where('state',1)
                ->where(DB::raw("MONTH(created_at)"), '=', $i)
                ->sum('price')/3;
        }
        
        $respuesta['egresoMes'] = $arrayEgresoMes;
        
        
        $arrayUtilidad[] = null;
        for($i = 0; $i < 12; ++$i) {
            
            $arrayUtilidad[$i] = Query::where('state',1)
                ->where(DB::raw("MONTH(created_at)"), '=', $i)
                ->sum('price') - 
                    Query::where('state',1)
                ->where(DB::raw("MONTH(created_at)"), '=', $i)
                ->sum('price')/3;
        }
        
        $respuesta['utilidad'] = $arrayUtilidad;
        
        $respuesta['asociados']  = Company::select('name','ruc',DB::raw("DATE_FORMAT(created_at,'%d/%m/%Y') as formattdate"))->
                where('estado', '1')->orderby('created_at')->take(10)->get();
        //DATE_FORMAT(date,'%d/%m/%Y')
        return response()->json($respuesta);
    }
}
