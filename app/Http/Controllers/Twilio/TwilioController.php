<?php

namespace App\Http\Controllers\Twilio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VideoGrant;

class TwilioController extends Controller
{
    // Get Token
    public function getToken(Request $request) 
    {
        // Required for all Twilio access tokens
        $twilioAccountSid = 'AC5b960a9b24365cfafb83f7f5ecdd5591';
        $twilioApiKey = 'SKff7bc694030774623b9d09bf4be4a06e';
        $twilioApiSecret = '5cd0eaf635c6f04dcc5c9c2463257839';

        // russell keys
        
        // A unique identifier for this user
        $identity = $request->get('identity');
        // The specific Room we'll allow the user to access
        $roomName = $request->get('roomName');

        // Create access token, which we will serialize and send to the client
        $token = new AccessToken($twilioAccountSid, $twilioApiKey, $twilioApiSecret, 3600, $identity);

        // Create Video grant
        $videoGrant = new VideoGrant();
        $videoGrant->setRoom($roomName);

        // Add grant to token
        $token->addGrant($videoGrant);
        // render token to string
        return response()->json(["status"=>false, "code"=>200, "token" => $token->toJWT()]);
    }

    // Get user SID
    public function getSIDUser(Request $request)
    {
        return response()->json(['message'=>'room created', 'code'=>200, 'status'=>false]);
    }

    // create Room 
    public function createRoom(Request $request){
        return response()->json(['message'=>'room created', 'code'=>200, 'status'=>false]);
    }

}
