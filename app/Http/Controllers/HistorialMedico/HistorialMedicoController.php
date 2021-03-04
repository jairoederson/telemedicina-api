<?php

namespace App\Http\Controllers\HistorialMedico;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\GeneralPrenatal;
use App\GeneralBirths;
use App\GeneralImmunization;
use App\HarmfulHabits;
use App\Appetites;
use App\Urines;
class HistorialMedicoController extends Controller
{
  public function indexPrenatal()
  {
      return view('admin/prenatal');
  }

  public function listarPreNatal(Request $request)
  {
      $items = GeneralPrenatal::where("state", "1")
          ->get();
      return response()->json($items);
  }
  
  public function eliminarPrenatal(Request $request)
  {
      $symptom = GeneralPrenatal::find($request['prenatal'])->update(['state' => '0']);
      return response()->json($symptom);
  }
  
  public function registroPreNatal()
  {
      return view('admin/registroprenatal');
  }
  
  public function registrarPreNatal(Request $request)
  {
      $prenatal = $request['prenatal'];
      $prenatal['state'] = '1';
      $prenatalsave = GeneralPrenatal::updateOrCreate(['id' => $prenatal['id']], $prenatal);
      return response()->json(true);
  }
  public function actualizarPreNatal($idprenatal)
  {
      return view('admin/actualizacionprenatal', array("idprenatal" => $idprenatal));
  }

  public function obtenerPreNatal(Request $request)
  {
      $response = null;
      $response['prenatal'] = GeneralPrenatal::where("id", $request['idprenatal'])->first();

      return response()->json($response);
  }
  
  public function modificarPreNatal(Request $request)
  {
      $prenatal = $request['prenatal'];
      $prenatal['status'] = '1';
      $prenatalsave = GeneralPrenatal::updateOrCreate(['id' => $prenatal['id']], $prenatal);

      return response()->json($prenatal);
  }

  public function indexNacimiento()
  {
      return view('admin/nacimiento');
  }

  public function listarNacimiento(Request $request)
  {
      $items = GeneralBirths::where("state", "1")
          ->get();
      return response()->json($items);
  }
  
  public function eliminarNacimiento(Request $request)
  {
      $symptom = GeneralBirths::find($request['nacimiento'])->update(['state' => '0']);
      return response()->json($symptom);
  }
  
  public function registroNacimiento()
  {
      return view('admin/registronacimiento');
  }
  
  public function registrarNacimiento(Request $request)
  {
      $nacimiento = $request['nacimiento'];
      $nacimiento['state'] = '1';
      $nacimientosave = GeneralBirths::updateOrCreate(['id' => $nacimiento['id']], $nacimiento);
      return response()->json(true);
  }

  public function actualizarNacimiento($idnacimiento)
  {
      return view('admin/actualizacionnacimiento', array("idnacimiento" => $idnacimiento));
  }

  public function obtenerNacimiento(Request $request)
  {
      $response = null;
      $response['nacimiento'] = GeneralBirths::where("id", $request['idnacimiento'])->first();

      return response()->json($response);
  }
  
  public function modificarNacimiento(Request $request)
  {
      $nacimiento = $request['nacimiento'];
      $nacimiento['status'] = '1';
      $nacimientosave = GeneralBirths::updateOrCreate(['id' => $nacimiento['id']], $nacimiento);

      return response()->json($nacimiento);
  }




  public function indexInmunisaciones()
  {
      return view('admin/inmunisaciones');
  }

  public function listarInmunisaciones(Request $request)
  {
      $items = GeneralImmunization::where("state", "1")
          ->get();
      return response()->json($items);
  }
  
  public function eliminarInmunisaciones(Request $request)
  {
      $symptom = GeneralImmunization::find($request['Inmunisaciones'])->update(['state' => '0']);
      return response()->json($symptom);
  }
  
  public function registroInmunisaciones()
  {
      return view('admin/registroinmunisaciones');
  }
  
  public function registrarInmunisaciones(Request $request)
  {
      $Inmunisaciones = $request['Inmunisaciones'];
      $Inmunisaciones['state'] = '1';
      $Inmunisacionessave = GeneralImmunization::updateOrCreate(['id' => $Inmunisaciones['id']], $Inmunisaciones);
      return response()->json(true);
  }

  public function actualizarInmunisaciones($idinmunisaciones)
  {
      return view('admin/actualizacioninmunisaciones', array("idinmunisaciones" => $idinmunisaciones));
  }

  public function obtenerInmunisaciones(Request $request)
  {
      $response = null;
      $response['inmunisaciones'] = GeneralImmunization::where("id", $request['idinmunisaciones'])->first();

      return response()->json($response);
  }
  
  public function modificarInmunisaciones(Request $request)
  {
      $inmunisaciones = $request['inmunisaciones'];
      $inmunisaciones['status'] = '1';
      $inmunisacionessave = GeneralImmunization::updateOrCreate(['id' => $inmunisaciones['id']], $inmunisaciones);

      return response()->json($inmunisaciones);
  }

  public function indexHabitos()
  {
      return view('admin/habitos');
  }

  public function listarHabitos(Request $request)
  {
      $items = HarmfulHabits::where("state", "1")
          ->get();
      return response()->json($items);
  }
  
  public function eliminarHabitos(Request $request)
  {
      $symptom = HarmfulHabits::find($request['habitos'])->update(['state' => '0']);
      return response()->json($symptom);
  }
  
  public function registroHabitos()
  {
      return view('admin/registrohabitos');
  }
  
  public function registrarHabitos(Request $request)
  {
      $habitos = $request['habitos'];
      $habitos['state'] = '1';
      $habitossave = HarmfulHabits::updateOrCreate(['id' => $habitos['id']], $habitos);
      return response()->json(true);
  }
  public function actualizarHabitos($idhabitos)
  {
      return view('admin/actualizacionhabitos', array("idhabitos" => $idhabitos));
  }

  public function obtenerHabitos(Request $request)
  {
      $response = null;
      $response['habitos'] = HarmfulHabits::where("id", $request['idhabitos'])->first();

      return response()->json($response);
  }
  
  public function modificarHabitos(Request $request)
  {
      $habitos = $request['habitos'];
      $habitos['status'] = '1';
      $habitossave = HarmfulHabits::updateOrCreate(['id' => $habitos['id']], $habitos);

      return response()->json($habitos);
  }
  public function indexApetitos()
  {
      return view('admin/apetitos');
  }

  public function listarApetitos(Request $request)
  {
      $items = Appetites::where("state", "1")
          ->get();
      return response()->json($items);
  }
  
  public function eliminarApetitos(Request $request)
  {
      $symptom = Appetites::find($request['apetitos'])->update(['state' => '0']);
      return response()->json($symptom);
  }
  
  public function registroApetitos()
  {
      return view('admin/registroapetitos');
  }
  
  public function registrarApetitos(Request $request)
  {
      $apetitos = $request['apetitos'];
      $apetitos['state'] = '1';
      $apetitossave = Appetites::updateOrCreate(['id' => $apetitos['id']], $apetitos);
      return response()->json(true);
  }
  public function actualizarApetitos($idapetitos)
  {
      return view('admin/actualizacionapetitos', array("idapetitos" => $idapetitos));
  }

  public function obtenerApetitos(Request $request)
  {
      $response = null;
      $response['apetitos'] = Appetites::where("id", $request['idapetitos'])->first();

      return response()->json($response);
  }
  
  public function modificarApetitos(Request $request)
  {
      $apetitos = $request['apetitos'];
      $apetitos['status'] = '1';
      $apetitossave = Appetites::updateOrCreate(['id' => $apetitos['id']], $apetitos);

      return response()->json($apetitos);
  }

  public function indexOrinas()
  {
      return view('admin/orinas');
  }

  public function listarOrinas(Request $request)
  {
      $items = Urines::where("state", "1")
          ->get();
      return response()->json($items);
  }
  
  public function eliminarOrinas(Request $request)
  {
      $symptom = Urines::find($request['orinas'])->update(['state' => '0']);
      return response()->json($symptom);
  }
  
  public function registroOrinas()
  {
      return view('admin/registroorinas');
  }
  
  public function registrarOrinas(Request $request)
  {
      $orinas = $request['orinas'];
      $orinas['state'] = '1';
      $orinassave = Urines::updateOrCreate(['id' => $orinas['id']], $orinas);
      return response()->json(true);
  }
  public function actualizarOrinas($idorinas)
  {
      return view('admin/actualizacionorinas', array("idorinas" => $idorinas));
  }

  public function obtenerOrinas(Request $request)
  {
      $response = null;
      $response['orinas'] = Urines::where("id", $request['idorinas'])->first();

      return response()->json($response);
  }
  
  public function modificarOrinas(Request $request)
  {
      $orinas = $request['orinas'];
      $orinas['status'] = '1';
      $orinassave = Urines::updateOrCreate(['id' => $orinas['id']], $orinas);

      return response()->json($orinas);
  }
  public function indexDeposiciones()
  {
      return view('admin/deposiciones');
  }

  public function listarDeposiciones(Request $request)
  {
      $items = Urines::where("state", "1")
          ->get();
      return response()->json($items);
  }
  
  public function eliminarDeposiciones(Request $request)
  {
      $symptom = Urines::find($request['deposiciones'])->update(['state' => '0']);
      return response()->json($symptom);
  }
  
  public function registroDeposiciones()
  {
      return view('admin/registrodeposiciones');
  }
  
  public function registrarDeposiciones(Request $request)
  {
      $deposiciones = $request['deposiciones'];
      $deposiciones['state'] = '1';
      $deposicionessave = Urines::updateOrCreate(['id' => $deposiciones['id']], $deposiciones);
      return response()->json(true);
  }
  public function actualizarDeposiciones($iddeposiciones)
  {
      return view('admin/actualizaciondeposiciones', array("iddeposiciones" => $iddeposiciones));
  }

  public function obtenerDeposiciones(Request $request)
  {
      $response = null;
      $response['deposiciones'] = Urines::where("id", $request['iddeposiciones'])->first();

      return response()->json($response);
  }
  
  public function modificarDeposiciones(Request $request)
  {
      $deposiciones = $request['deposiciones'];
      $deposiciones['status'] = '1';
      $deposicionessave = Urines::updateOrCreate(['id' => $deposiciones['id']], $deposiciones);

      return response()->json($deposiciones);
  }
  public function indexSed()
  {
      return view('admin/sed');
  }

  public function listarSed(Request $request)
  {
      $items = Urines::where("state", "1")
          ->get();
      return response()->json($items);
  }
  
  public function eliminarSed(Request $request)
  {
      $symptom = Urines::find($request['sed'])->update(['state' => '0']);
      return response()->json($symptom);
  }
  
  public function registroSed()
  {
      return view('admin/registrosed');
  }
  
  public function registrarSed(Request $request)
  {
      $sed = $request['sed'];
      $sed['state'] = '1';
      $sedsave = Urines::updateOrCreate(['id' => $sed['id']], $sed);
      return response()->json(true);
  }
  public function actualizarSed($idsed)
  {
      return view('admin/actualizacionsed', array("idsed" => $idsed));
  }

  public function obtenerSed(Request $request)
  {
      $response = null;
      $response['sed'] = Urines::where("id", $request['idsed'])->first();

      return response()->json($response);
  }
  
  public function modificarSed(Request $request)
  {
      $sed = $request['sed'];
      $sed['status'] = '1';
      $sedsave = Urines::updateOrCreate(['id' => $sed['id']], $sed);

      return response()->json($sed);
  }
  public function indexSuenos()
  {
      return view('admin/suenos');
  }

  public function listarSuenos(Request $request)
  {
      $items = Urines::where("state", "1")
          ->get();
      return response()->json($items);
  }
  
  public function eliminarSuenos(Request $request)
  {
      $symptom = Urines::find($request['suenos'])->update(['state' => '0']);
      return response()->json($symptom);
  }
  
  public function registroSuenos()
  {
      return view('admin/registrosuenos');
  }
  
  public function registrarSuenos(Request $request)
  {
      $suenos = $request['suenos'];
      $suenos['state'] = '1';
      $suenossave = Urines::updateOrCreate(['id' => $suenos['id']], $suenos);
      return response()->json(true);
  }
  public function actualizarSuenos($idsuenos)
  {
      return view('admin/actualizacionsuenos', array("idsuenos" => $idsuenos));
  }

  public function obtenerSuenos(Request $request)
  {
      $response = null;
      $response['suenos'] = Urines::where("id", $request['idsuenos'])->first();

      return response()->json($response);
  }
  
  public function modificarSuenos(Request $request)
  {
      $suenos = $request['suenos'];
      $suenos['status'] = '1';
      $suenossave = Urines::updateOrCreate(['id' => $suenos['id']], $suenos);

      return response()->json($suenos);
  }
}