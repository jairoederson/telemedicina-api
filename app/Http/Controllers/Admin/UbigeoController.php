<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Sentinel;
use App\Ubigeo;
use Date;

class UbigeoController extends Controller {

    public function listarDepartamentos(Request $request) {
        $items = Ubigeo::where('estado', '1')->where('provincia', '00')->where('distrito', '00')->get();

        return response()->json($items);
    }

    public function listarProvincia(Request $request) {
        $items = Ubigeo::where('estado', '1')->where('departamento', $request['coddepartamento'])->where('distrito', '00')
                        ->where('provincia', '<>', '00')->get();

        return response()->json($items);
    }

    public function listarDistrito(Request $request) {
        $items = Ubigeo::where('estado', '1')->where('departamento', $request['coddepartamento'])->where('distrito', '<>', '00')
                        ->where('provincia', $request['codprovincia'])->get();

        return response()->json($items);
    }
    
    public function obtenerUbigeo(Request $request) {
        $ubigeo = Ubigeo::find( $request['idubigeo']);
        $respuesta['ubigeo'] = $ubigeo;

        $departamentos = Ubigeo::where('estado', '1')->where('provincia', '00')->where('distrito', '00')->get();
        $respuesta['departamentos'] = $departamentos;
        
        $provincias = Ubigeo::where('estado', '1')->where('departamento', $ubigeo['departamento'])->where('distrito', '00')
                        ->where('provincia', '<>', '00')->get();
        $respuesta['provincias'] = $provincias;
        
        $distritos = Ubigeo::where('estado', '1')->where('departamento', $ubigeo['departamento'])->where('distrito', '<>', '00')
                        ->where('provincia', $ubigeo['provincia'])->get();
        $respuesta['distritos'] = $distritos;
        
        return response()->json($respuesta);
    }

}
