<?php

namespace App\Http\Controllers\ML;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MLController extends Controller
{
    public function diseasePredict(Request $request){
      $images = $request->get('imagesArr');

      $responseArr = [];
      foreach ($images as $key => $value) {
        $data = array("image_url" => $value);

        $url = 'http://159.65.96.225/api/classifier/dermatology';

        //inicializamos el objeto CUrl
        $ch = curl_init($url);
        //creamos el json a partir de nuestro arreglo
        $jsonDataEncoded = json_encode($data);

        //Indicamos que nuestra petición sera Post
        curl_setopt($ch, CURLOPT_POST, 1);

         //para que la peticion no imprima el resultado como un echo comun, y podamos manipularlo
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        //Adjuntamos el json a nuestra petición
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

        //Agregamos los encabezados del contenido
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

         //ignorar el certificado, servidor de desarrollo
                  //utilicen estas dos lineas si su petición es tipo https y estan en servidor de desarrollo
         //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                 //curl_setopt($process, CURLOPT_SSL_VERIFYHOST, FALSE);

        //Ejecutamos la petición
        $result = curl_exec($ch);

        // return $result;

        curl_close($ch);

        if(!$result) {
          return false;
        }else{
          array_push($responseArr, json_decode($result));
        }
      }

      return response()->json(["result"=> $responseArr]);
    }

    public static function predictDisease(Request $request){
      $images = $request->get('imagesArr');
      // return $images;
      $responseArr = [];
      foreach ($images as $key => $value) {
        $data = array("image_url" => $value);

        $url = 'http://159.65.96.225/api/classifier/dermatology';

        //inicializamos el objeto CUrl
        $ch = curl_init($url);
        //creamos el json a partir de nuestro arreglo
        $jsonDataEncoded = json_encode($data);

        //Indicamos que nuestra petición sera Post
        curl_setopt($ch, CURLOPT_POST, 1);

         //para que la peticion no imprima el resultado como un echo comun, y podamos manipularlo
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        //Adjuntamos el json a nuestra petición
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

        //Agregamos los encabezados del contenido
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

         //ignorar el certificado, servidor de desarrollo
                  //utilicen estas dos lineas si su petición es tipo https y estan en servidor de desarrollo
         //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                 //curl_setopt($process, CURLOPT_SSL_VERIFYHOST, FALSE);

        //Ejecutamos la petición
        $result = curl_exec($ch);

        // return $result;

        curl_close($ch);

        if(!$result) {
          return false;
        }else{
          array_push($responseArr, json_decode($result));
        }
      }

      return $responseArr;
    }
}
