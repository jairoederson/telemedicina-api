<?php

namespace App\Http\Controllers\Query;

use App\Query;
use App\Usuario\User;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Twilio\Jwt\ClientToken;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function getChat(Request $request)
    {

        $accountSid = config('app.twilio')['TWILIO_ACCOUNT_SID'];
        $authToken  = config('app.twilio')['TWILIO_AUTH_TOKEN'];
        $appSid     = config('app.twilio')['TWILIO_APP_SID'];
        $chatSid     = config('app.twilio')['TWILIO_CHAT_SERVICE_SID'];
        $user_id = $request->get('user_id');
        //dd($accountSid);
        $client = new Client($accountSid, $authToken);
        try
        {
            $user = User::find($user_id);
            if ($user){

            $usuario = $user->name." ".$user->last_name;

            $users = $client->chat->v2->services($chatSid)
                ->users
                ->read(array(), 20);
            $userTwilio = null;
            foreach ($users as $record) {
                if ($usuario == $record->identity){
                    $userTwilio = $record->sid;
                }
            }

            if (empty($userTwilio)){
                return response()->json(['estado' => false, 'code' => '200', 'message' => "Usuario no tiene conversaciones"]);
            }

            //echo $userTwilio."<br>";
            $userChannels = $client->chat->v2->services($chatSid)
                ->users($userTwilio)
                ->userChannels
                ->read(array(), 20);

            $result = [];
            $channelId = null;
            foreach ($userChannels as $record) {

                $channelId = $record->channelSid;
                $messages = $client->chat->v2->services($chatSid)
                    ->channels($channelId)
                    ->messages
                    ->read(array(), 20);


                $chat = [];
                foreach ($messages as $record) {
                    //echo $record->sid."<br>";
                    $chat[] = [
                        'from' => $record->from,
                        'body' => $record->body,
                        'fecha' => $record->dateCreated
                    ];
                }

                $result[] = [
                  'channelSid' => $channelId,
                  'Messages' => $chat,
                ];

            }
            return response()->json(['estado' => true, 'code' => '200', 'message' => "Listado Exitoso", 'data' => $result]);
            }else{
                return response()->json(['estado' => false, 'code' => '200', 'message' => "Error usuario no existe"]);
            }

        }
        catch (Exception $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }

    public function saveChannels(Request $request){
        $query_id = $request->get('query_id');
        $channel_id = $request->get('channel_id');
        $room_id = $request->get('room_id');

        $query = Query::find($query_id);
        $query->channel_id = $channel_id;
        $query->room_id = $room_id;

        if ($query->save()){
            return response()->json(['estado' => true, 'code' => '200', 'message' => "Listado Exitoso", 'data' => $query]);
        }

    }
}