<?php

namespace App\Http\Controllers\VisaNet;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

include 'librerias/lib.inc';
include 'librerias/funciones.php';

class VisaNetController extends Controller
{
    // Obtener Formulario de pago visanet
    public function getFormVisanet(){
      $precio_consulta = 9.55;
      // if (isset($_POST['amount'])){
      if ($precio_consulta == 9.55){
    		$sessionToken = getGUID();
    		// echo $sessionToken."<hr>";
    		$merchantid = MERCHANT;
        // $amount = $_POST['amount'];
    		$amount = $precio_consulta;
    		$sessionKey = create_token($amount,"dev",MERCHANT,AccessKey,SecretAccessKey,$sessionToken);
    		// guarda_sessionKey($sessionKey);
    		// echo $sessionKey."<br>".$sessionToken."<br>".$merchantid;
        $counter = contador();

    		$arrayPost = array("sessionToken"=>$sessionToken,"merchantId"=>MERCHANT,"amount"=>$amount, "counter"=>$counter);
        $url = "boton.php";
    		guarda_sessionToken($sessionToken);
    		$html = post_form($arrayPost,$url);
        // return response()->json(['estado' => true, 'code' => 201, 'message' => "Login Exitoso", 'data' => ["headers"=>array(), "original"=>$userData, "exception"=> null]]);

    		return response()->json(["estado"=>true, "message"=>"Claves de pasarela", "data"=>$arrayPost]);
    		// exit;
    	}
    }
}
