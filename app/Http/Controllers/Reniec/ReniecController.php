<?php

namespace App\Http\Controllers\Reniec;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReniecController extends Controller
{
  /**
   *
   * Obtener Datos desde RENIEC
   *
   * @param    $userSinch
   * @return      json
   *
   */
    public function getDataByDNI(Request $request){
      $dni = $request->get('dni');
      $reniec = new \Reniec\Reniec();
      $persona = $reniec->search($dni);
      return response()->json($persona);

       // $reniecDni = new \Tecactus\Reniec\DNI('Jrp8UmZxezibWvUu7KqCo1eZ5PJrwbnyFQB5ugqU');
       // return response()->json($reniecDni->get($dni, true));

    }
}
