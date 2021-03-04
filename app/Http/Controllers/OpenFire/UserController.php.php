<?php

namespace App\Http\Controllers\OpenFire;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    // ADD NEW USER
    public function AddUser(){
      $api = $this.InitOpenFire();

      $properties = array('key1' => 'value1', 'key2' => 'value2');
      $result = $api->Users()->createUser('Username', 'Password', 'Full Name', 'email@domain.com', $properties);

      $this.CheckResult($result);
    }

    // DELETE USER
    public function DeleteUser(){
      $api = $this.InitOpenFire();

      $result = $api->Users()->deleteUser('Username');

      $this.CheckResult($result);
    }

    // BAN USER
    public function BanUser(){
      $api = $this.InitOpenFire();

      $result = $api->Users()->lockoutUser('Username');

      $this.CheckResult($result);
    }

    // UNBAN USER
    public function UnbanUser(){
      $api = $this.InitOpenFire();

      $result = $api->Users()->unlockUser('Username');

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
