<?php

namespace App\Http\Controllers\OpenFire;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller{
    // SEND MESSAGE TO ALL ONLINE USERS
    public function SendMessage(){
      $api = $this.InitOpenFire();

      $result = $api->Messages()->sendBroadcastMessage('Hello everybody!');

      $this.CheckResult($result);
    }

    // INIT OPENFIRE CONFIG
    public function InitOpenFire(){
      $authenticationToken = new \Gnello\OpenFireRestAPI\AuthenticationToken('d84G1zOiioruNwyk');
      $api = new \Gnello\OpenFireRestAPI\API('test.alo.doctor', 9090, $authenticationToken);
      $api->Settings()->setServerName("localhost");
      $api->Settings()->setDebug(true);
      return $api;
    }

    // CHECK RESULT
    public function CheckResult($result){
      if($result['response']) {
          return $result['output'];
      } else {
          return 'Error!';
      }
    }
}
