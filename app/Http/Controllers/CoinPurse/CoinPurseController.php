<?php

namespace App\Http\Controllers\CoinPurse;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoinPurseController extends Controller
{
  // Autentificarse en el monedero
    public function authWallet(){
      //datos a enviar
      $data = array("email" => "apiweb@mifarma.com.pe", "password" => "9rfu4Vx=W6%Nw;3y");
      //url contra la que atacamos
      $ch = curl_init("http://apishop.mifarma.com.pe/api/v1/auth/login");
      //a true, obtendremos una respuesta de la url, en otro caso,
      //true si es correcto, false si no lo es
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      //establecemos el verbo http que queremos utilizar para la petición
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      //enviamos el array data
      curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));

      //obtenemos la respuesta
      $response = curl_exec($ch);
      // Se cierra el recurso CURL y se liberan los recursos del sistema
      curl_close($ch);
      if(!$response) {
          return false;
      }else{
        return response()->json((string)(json_decode($response)->access_token));
      }
    }


  // Consulta de datos de afiliacion de monedero
    public function checkWalletAffiliationData($dni){

      $auth = CoinPurseController::authWallet();
      $value = explode('{"headers":{},"original":"', json_encode($auth));
      $token = explode('","exception":null}', $value[1]);

      // option header
      $option = 'Authorization: Bearer ' .  $token[0];

      // return $token[0];
      //datos a enviar
      // $data = array("email" => "apiweb@mifarma.com.pe", "password" => "9rfu4Vx=W6%Nw;3y");
      // url_get
      $url = "http://apishop.mifarma.com.pe/api/v1/wallet/card/" . $dni;

      //url contra la que atacamos
      $ch = curl_init($url);
      //a true, obtendremos una respuesta de la url, en otro caso,
      //true si es correcto, false si no lo es
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      //establecemos el verbo http que queremos utilizar para la petición
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

      //enviamos el array data
      // curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));

      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        $option
        // 'Authorization: Bearer ' . 'eyJpYXQiOjE1MzExNjcwMTcsImp0aSI6IlRVWkJVRWxUU0U5UU5XSTBNMk14TWpsaU9HWmlNelF1TWpBNU5qSTVNakEiLCJuYmYiOjE1MzExNjcwMTcsImV4cCI6MTUzMTE3MDYxN30.eyJlbWFpbCI6ImFwaXdlYkBtaWZhcm1hLmNvbS5wZSIsInBhc3N3b3JkIjoiOXJmdTRWeD1XNiVOdzszeSJ9.1ZoAk6Echu7iTio6mC5ef6H1xU2JV9Ss-ZaOpXXPk-1kthTQ8Wjx9i7BKtIPIJZpS2SeWkRhrCekiPcwufiDfA',
          // 'Authorization: Bearer ' . 'eyJpYXQiOjE1MzExNjcwMTcsImp0aSI6IlRVWkJVRWxUU0U5UU5XSTBNMk14TWpsaU9HWmlNelF1TWpBNU5qSTVNakEiLCJuYmYiOjE1MzExNjcwMTcsImV4cCI6MTUzMTE3MDYxN30.eyJlbWFpbCI6ImFwaXdlYkBtaWZhcm1hLmNvbS5wZSIsInBhc3N3b3JkIjoiOXJmdTRWeD1XNiVOdzszeSJ9.1ZoAk6Echu7iTio6mC5ef6H1xU2JV9Ss-ZaOpXXPk-1kthTQ8Wjx9i7BKtIPIJZpS2SeWkRhrCekiPcwufiDfA',
          // 'X-Apple-Store-Front: 143444,12'
      ));

      //obtenemos la respuesta
      $response = curl_exec($ch);
      // Se cierra el recurso CURL y se liberan los recursos del sistema
      curl_close($ch);
      if(!$response) {
          return false;
      }else{
          return response()->json(json_decode($response));
      }
    }

    // registro en el monedero
    public function registerWallet(Request $request){

      //datos a enviar
      $data = array(
        "cardnumber" => $request->get('cardnumber'),
        "cardname" => $request->get('cardname'),
        "cardlastname" => $request->get('cardlastname'),
        "cardbirthdate" => $request->get('cardbirthdate'),
        "cardgender" => $request->get('cardgender'),
        "cardemail" => $request->get('cardemail'),
        "cardpass" => $request->get('cardpass'));



      $auth = CoinPurseController::authWallet();
      $value = explode('{"headers":{},"original":"', json_encode($auth));
      $token = explode('","exception":null}', $value[1]);

      // option header
      $option = 'Authorization: Bearer ' .  $token[0];

      //url contra la que atacamos
      $ch = curl_init("http://apishop.mifarma.com.pe/api/v1/wallet/register");
      //a true, obtendremos una respuesta de la url, en otro caso,
      //true si es correcto, false si no lo es
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      //establecemos el verbo http que queremos utilizar para la petición
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      //enviamos el array data
      curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
      //enviamos options
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        $option,
        'Accept: application/json',
        'Content-Type: application/json'
      ));
      //obtenemos la respuesta
      $response = curl_exec($ch);
      // Se cierra el recurso CURL y se liberan los recursos del sistema
      curl_close($ch);
      if(!$response) {
          return false;
      }else{
        return response()->json(json_decode($response));
      }
    }

    // obtener balance de cuenta monedero
    public function checkWalletBalance($dni){
      $auth = CoinPurseController::authWallet();
      $value = explode('{"headers":{},"original":"', json_encode($auth));
      $token = explode('","exception":null}', $value[1]);

      // option header
      $option = 'Authorization: Bearer ' .  $token[0];

      // return $token[0];
      //datos a enviar
      // $data = array("email" => "apiweb@mifarma.com.pe", "password" => "9rfu4Vx=W6%Nw;3y");
      // url_get
      $url = "http://apishop.mifarma.com.pe/api/v1/wallet/balance/" . $dni;

      //url contra la que atacamos
      $ch = curl_init($url);
      //a true, obtendremos una respuesta de la url, en otro caso,
      //true si es correcto, false si no lo es
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      //establecemos el verbo http que queremos utilizar para la petición
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

      //enviamos el array data
      // curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));

      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        $option,
        'Accept: application/json'
      ));

      //obtenemos la respuesta
      $response = curl_exec($ch);
      // Se cierra el recurso CURL y se liberan los recursos del sistema
      curl_close($ch);
      if(!$response) {
          return false;
      }else{
          return response()->json(json_decode($response));
      }
    }

    // obtener detalle de balance de monedero
    public function checkWalletDetailBalance($dni){
      $auth = CoinPurseController::authWallet();
      $value = explode('{"headers":{},"original":"', json_encode($auth));
      $token = explode('","exception":null}', $value[1]);

      // option header
      $option = 'Authorization: Bearer ' .  $token[0];

      // return $token[0];
      //datos a enviar
      // $data = array("email" => "apiweb@mifarma.com.pe", "password" => "9rfu4Vx=W6%Nw;3y");
      // url_get
      $url = "http://apishop.mifarma.com.pe/api/v1/wallet/balance/" . $dni . "/detail";

      //url contra la que atacamos
      $ch = curl_init($url);
      //a true, obtendremos una respuesta de la url, en otro caso,
      //true si es correcto, false si no lo es
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      //establecemos el verbo http que queremos utilizar para la petición
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

      //enviamos el array data
      // curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));

      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        $option,
        'Accept: application/json'
      ));

      //obtenemos la respuesta
      $response = curl_exec($ch);
      // Se cierra el recurso CURL y se liberan los recursos del sistema
      curl_close($ch);
      if(!$response) {
          return false;
      }else{
          return response()->json(json_decode($response));
      }
    }
}
