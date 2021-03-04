<?php

namespace App\Http\Controllers\Reniec;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SunatController extends Controller
{
  /**
   *
   * Obtener Datos desde RENIEC
   *
   * @param    $userSinch
   * @return      json
   *
   */
    public function getDataByRUC(Request $request){
        $ruc = $request->get('ruc');

        $cookie = array(
            'cookie' 		=> array(
                'use' 		=> true,
                'file' 		=> __DIR__ . "/cookie.txt"
            )
        );
        
        $config = array(
            'representantes_legales' 	=> true,
            'cantidad_trabajadores' 	=> true,
            'establecimientos' 			=> true,
            'cookie' 					=> $cookie
        );
        
        $sunatInstance = new \Sunat\Sunat( true, true );
        // $sunat = $sunatInstance->ruc( $config );
        
        $ruc = "20169004359";
        $dni = "44274795";
        
        $search1 = $sunatInstance->search( $ruc );
        return response()->json($search1);

        // $reniecDni = new \Tecactus\Reniec\DNI('Jrp8UmZxezibWvUu7KqCo1eZ5PJrwbnyFQB5ugqU');
        // return response()->json($reniecDni->get($dni, true));

    }
}
