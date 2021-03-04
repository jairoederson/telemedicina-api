<?php

namespace App\Http\Controllers\OpenFire;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
  public function getChat(Request $request)
  {
    $user01 = $request->get('patient_dni');
    $user02 = $request->get('doctor_dni');

    // option header
    $option = 'Authorization:  ' .  'd84G1zOiioruNwyk';

    $url = "http://178.128.147.26:9090/plugins/restapi/v1/messageschat/".$user01."/" . $user02;

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      $option
    ));

    $response = curl_exec($ch);
    curl_close($ch);
    if(!$response) {
        return false;
    }else{
      $result = json_decode($response);
      $chat = [];
      if(count($result) != 0){
        foreach ($result->messages as $key => $msj) {
          $time = $this->time_elapsed_string($msj->sendDate);
          // $time = $this->time_elapsed_string("2018-09-23 05:22:15");
          $msj->sendDate = $time;
          array_push($chat, $msj);
        }

      }
        return response()->json(array('messages'=>$chat));
    }

  }

  function time_elapsed_string($datetime, $full = false) {
    $now = new \DateTime;
    $ago = new \DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'año',
        'm' => 'mes',
        'w' => 'semana',
        'd' => 'dia',
        'h' => 'hora',
        'i' => 'minuto',
        's' => 'segundo',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? 'hace ' . implode(', ', $string) : 'justo ahora';
}
}
