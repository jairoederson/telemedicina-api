<?php

namespace App\Http\Controllers\OpenFire;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RosterController.php extends Controller
{
    // ADD NEW ROSTER
    public function AddRoster(){
      $api = $this.InitOpenFire();

      use \Gnello\OpenFireRestAPI\Settings\SubscriptionType;
      $result = $api->Users()->createUserRosterEntry('Username', 'Jid', 'Full Name', SubscriptionType::BOTH, array('group1','group2'));

      $this.CheckResult($result);
    }

    // UPDATE ROSTER
    public function UpdateRoster(){
      $api = $this.InitOpenFire();

      use \Gnello\OpenFireRestAPI\Settings\SubscriptionType;
      $result = $api->Users()->updateUserRosterEntry('Username', 'Jid', 'Full Name', SubscriptionType::BOTH, array('group1'));

      $this.CheckResult($result);
    }

    // DELETE FROM ROSTER
    public function DeleteFromRoster(){
      $api = $this.InitOpenFire();

      $result = $api->Users()->deleteUserRosterEntry('Username', 'Jid');

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
