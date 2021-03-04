<?php

namespace App\Http\Controllers\OpenFire;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChatRoomController.php extends Controller
{
    // CREATE A NEW CHATROOM
    public function CreateNewChatRoom(){
      $api = $this.InitOpenFire();

      $payload = $api->Payloads()->createChatRoomPayload();
      $payload->setRoomName('myfirstchatroom');
      $payload->setNaturalName('my_first_chat_room');
      $payload->setDescription('This is my first chat room!');
      $result = $api->ChatRooms()->createChatRoom($payload);

      $this.CheckResult($result);
    }

    // ADD USER WITH ROLE TO CHAT ROOM
    public function AddUserChatRoom(){
      $api = $this.InitOpenFire();

      $result = $api->ChatRooms()->addUserWithRoleToChatRoom('myfirstchatroom','members','username');

      $this.CheckResult($result);
    }

    // ADD GROUP WITH ROLE TO CHAT ROOM
    public function AddGroupChatRoom(){
      $api = $this.InitOpenFire();

      $result = $api->ChatRooms()->addGroupWithRoleToChatRoom('myfirstchatroom','outcasts','groupname');

      $this.CheckResult($result);
    }

    // DELETE A USER FROM A CHAT ROOM
    public function DeleteUserChatRoom(){
      $api = $this.InitOpenFire();

      $result = $api->ChatRooms()->deleteUserFromChatRoom('myfirstchatroom','members','username');

      $this.CheckResult($result);
    }

    // DELETE A CHAT ROOM
    public function DeleteChatRoom(){
      $api = $this.InitOpenFire();

      $result = $api->ChatRooms()->deleteChatRoom('myfirstchatroom');

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
