<?php

namespace App\Http\Controllers\OpenFire;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupController.php extends Controller
{
    // CREATE GROUP
    public function CreateGroup(){
      $api = $this.InitOpenFire();

      $result = $api->Groups()->createGroup('groupname', 'description');

      $this.CheckResult($result);
    }

    // ADD TO GROUPS
    public function AddToGroups(){
      $api = $this.InitOpenFire();

      $result = $api->Users()->addUserToGroups('Username', array('groupname1', 'groupname2', 'groupname3'));

      $this.CheckResult($result);
    }

    // DELETE FROM GROUPS
    public function DeleteFromGroups(){
      $api = $this.InitOpenFire();

      $result = $api->Users()->deleteUserFromGroups('Username', array('groupname1','groupname2'));

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
