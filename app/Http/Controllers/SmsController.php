<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use App\VerificationCode;
use App\User;
//require  '/twilio-php-main/src/Twilio/autoload.php';
require_once realpath(__DIR__ . '/../../../twilio-php-main/src/Twilio/autoload.php');

use Twilio\Jwt\ClientToken;
class SmsController extends Controller
{
    public function sendSms()
    {
        $accountSid = config('app.twilio')['TWILIO_ACCOUNT_SID'];
        $authToken  = config('app.twilio')['TWILIO_AUTH_TOKEN'];
        $appSid     = config('app.twilio')['TWILIO_APP_SID'];
        $chatSid     = config('app.twilio')['TWILIO_CHAT_SERVICE_SID'];
        //dd($accountSid);
        $client = new Client($accountSid, $authToken);
        try
        {

        $client->messages->create("whatsapp:".'+51959537288',
      [
        // A Twilio phone number you purchased at twilio.com/console
        'from' => "whatsapp:".'+14155238886',
        // the body of the text message you'd like to send
        'body' => 'Hey Jenny! Good luck on the bar exam!'
    ]
    );
           // $channels = $client->chat->v2->services($chatSid)
           //     ->channels
           //     ->read(array("uniqueName" => "35DOC_5PAC"), 20);

           // foreach ($channels as $record) {
            //    print($record->sid)."<br>";
        //    }

            /*$rooms = $client->video->v1->rooms
                ->read(array("status" => "completed", "uniqueName" => "35DOC_5PAC"));

            foreach ($rooms as $record) {
                echo $record->sid."<br>";
            }*/
        }
        catch (Exception $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }

    public function verConsulta($idconsulta){

        $consulta = Query::find($idconsulta);
        $patient = Patient::find($consulta->patient_id);
        $doctor = Doctor::find($consulta->doctor_id);

        $accountSid = config('app.twilio')['TWILIO_ACCOUNT_SID'];
        $authToken  = config('app.twilio')['TWILIO_AUTH_TOKEN'];
        $appSid     = config('app.twilio')['TWILIO_APP_SID'];
        $chatSid     = config('app.twilio')['TWILIO_CHAT_SERVICE_SID'];
        $user_id = $patient->users_id;
        $user_doctor_id = $doctor->users_id;

        //dd($accountSid);
        $client = new Client($accountSid, $authToken);
        try
        {
            $user = User::find($user_id);
            $user_doctor = User::find($user_doctor_id);
            $usuario = $user->name." ".$user->last_name;
            $doctor = $user_doctor->name." ".$user_doctor->last_name;

            $users = $client->chat->v2->services($chatSid)->users->read([], 20);
            $userTwilio = null;
            foreach ($users as $record) {
                if ($usuario == $record->identity) {
                    $userTwilio = $record->sid;
                }
            }

            if (empty($userTwilio)) {
                /*return response()->json([
                    'estado' => false,
                    'code' => '200',
                    'message' => "Usuario no tiene conversaciones",
                ]);*/

                $result = '';
            }else{
                $userChannels = $client->chat->v2->services($chatSid)->users($userTwilio)->userChannels->read([], 20);

                $result = [];
                $channelId = null;
                foreach ($userChannels as $record) {

                    $channelId = $record->channelSid;
                    /*$members = $client->chat->v2->services($chatSid)
                        ->channels($channelId)
                        ->members
                        ->read(array(), 20);

                    foreach ($members as $record) {
                        print($record)."<br>";
                    }*/

                    $messages = $client->chat->v2->services($chatSid)->channels($channelId)->messages->read([], 20);

                    $chat = [];
                    foreach ($messages as $record) {
                        //echo $record->sid."<br>";
                        if ($usuario == $record->from){
                            $receptor = 1;
                        }else{
                            $receptor = 0;
                        }
                        if ($usuario == $record->from || $doctor == $record->from){
                            $chat[] = [
                                'from' => $record->from,
                                'body' => $record->body,
                                'fecha' => $record->dateCreated,
                                'receptor' => $receptor
                            ];
                        }
                    }

                    $result[] = [
                        'channelSid' => $channelId,
                        'Messages' => $chat,
                    ];
                }
                //die();
            }

            //echo $userTwilio."<br>";

        } catch (Exception $e)
        {
            echo "Error: " . $e->getMessage();
        }

        return view('admin/verconsulta', compact('consulta', 'result', 'patient', 'doctor','chat'));
    }

    public function geturlvideo(){
        $accountSid = config('app.twilio')['TWILIO_ACCOUNT_SID'];
        $authToken  = config('app.twilio')['TWILIO_AUTH_TOKEN'];
        $appSid     = config('app.twilio')['TWILIO_APP_SID'];
        $chatSid     = config('app.twilio')['TWILIO_CHAT_SERVICE_SID'];
        //dd($accountSid);
        $client = new Client($accountSid, $authToken);
        try
        {
            // Use the client to do fun stuff like send text messages!
            /*$client->messages->create(
                '+51926436461',
                array(
                    'from' => '+14152374417',
                    'body' => 'Hey Ketav! It’s good to see you after long time!'
                )
            );
             $messages = $client->messages
                ->read(array(), 20);

            foreach ($messages as $record) {
                //print($record);

                $message = $client->messages($record->sid)
                    ->fetch();

                dd($message);
            }
            */

            /*$users = $client->chat->v2->services($chatSid)
                ->users
                ->read(array(), 20);

            foreach ($users as $record) {
                dd($record);
                print($record->sid);
            }*/

            /*$channels = $client->chat->v1->services($chatSid)
                ->channels
                ->read(array(), 20);

            foreach ($channels as $record) {
                $messages = $client->chat->v2->services($chatSid)
                    ->channels($record->sid)
                    ->messages
                    ->read(array(), 20);

                foreach ($messages as $record) {
                   echo $record->body."<br>";
                }

                echo ">>>>>>>>>>>>><>>><<<<<><br>";
            }*/
            $rooms = $client->video->v1->rooms
                ->read(array("status" => "completed"));

            foreach ($rooms as $record) {
                echo $record->sid."<br>";
                //$recording = $client->video->v1->recordings($record->sid)->fetch();

                $recordings = $client->video->v1->recordings
                    ->read(array(
                        "groupingSid" => array($record->sid)
                    ),
                        20
                    );

                foreach ($recordings as $record) {
                    $recordingSid = $record->sid;
                    $uri = "https://video.twilio.com/v1/Recordings/$recordingSid/Media";
                    $response = $client->request("GET", $uri);
                    $mediaLocation = $response->getContent()["redirect_to"];
                    echo $mediaLocation."<br>";
                }

                //print($recording->trackName);
            }


// +1 415 523 8886
        }
        catch (Exception $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }
    
    public function getVerificationCode(Request $request)
    
        {
        $telefono= (string) ($request->get('code').$request->get('phone'));
        $accountSid = config('app.twilio')['TWILIO_ACCOUNT_SID'];
        $authToken  = config('app.twilio')['TWILIO_AUTH_TOKEN'];
        $sid    = "VA5ae6557e2a4e708cd21bf9013b363e91";
        $twilio = new Client($accountSid, $authToken);
        $code = random_int(100000, 999999);
        $twilio_number_from=(string)'+12184893625';
            $user = User::select(
                'users.*')
                ->where('users.id', $request->get('user_id'))
                ->join('verifications_code', function ($join) {
                    $join->on('users.id', '=', 'verifications_code.user_id');
                })
                ->get();
                if (count($user) == 0) {
                    $twilio->messages->create(
                        // Where to send a text message (your cell phone?)
                        $telefono,
                        array(
                            'from' => $twilio_number_from,
                            'body' => 'Your verification code is : ' . $code
                        )
                        );                       
                     $activation = new VerificationCode([
                    'user_id' => $request->get('user_id'),
                     'phone' => $request->get('phone'),
                    'code_country'=> $request->get('code'),
                    'code_verify' => $code,
                    'status'=>'pending'
                    ]);
                    $activation->save();

                     return response()->json([
                     'estado' => true,
                    'code' => 201,
                     'message' => 'Envio de Codigo Correcto ',]);

                }else{
                    $verific = VerificationCode::select(
                        'verifications_code.id'
                    )
                        ->where('verifications_code.user_id', $request->get('user_id'))
                        ->where('status', 'pending')
                        ->join('users', function ($join) {
                            $join->on('users.id', '=', 'verifications_code.user_id');
                        })
                        ->orderby('verifications_code.id', 'desc')->first();
                if( !$verific ){
                  
                    $twilio->messages->create($telefono,
                    array(
                        'from' => $twilio_number_from,
                        'body' => 'Your verification code is : ' . $code
                    )
                    );                             
                    $activation = new VerificationCode([
                        'user_id' => $request->get('user_id'),
                        'phone' => $request->get('phone'),
                        'code_country'=> $request->get('code'),
                        'code_verify' => $code,
                        'status'=>'pending'
                        ]);
                    $activation->save();

            return response()->json([
                'estado' => true,
                'code' => 201,
                'message' => 'Envio de Codigo Correcto',
            ]);
                }
                else{
                    $verifications_code_update = VerificationCode::findOrFail($verific->id);
                    $verifications_code_update->status = 'canceled';
                    $verifications_code_update->save();
                    $twilio->messages->create($telefono,
                    array(
                        'from' => $twilio_number_from,
                        'body' => 'Your verification code is : ' . $code
                    )
                    );                             
                    $activation = new VerificationCode([
                        'user_id' => $request->get('user_id'),
                        'phone' => $request->get('phone'),
                        'code_country'=> $request->get('code'),
                        'code_verify' => $code,
                        'status'=>'pending'
                        ]);
                    $activation->save();

            return response()->json([
                'estado' => true,
                'code' => 201,
                'message' => 'Envio de Codigo Correcto',
            ]);



                }
                       
                                
                        }
                            
                         
                        
                }
              
    
    public function checkVerificationCode(Request $request){
  
     
        $verificado = VerificationCode::select(
            'verifications_code.*'
        )
            ->where('verifications_code.user_id', $request->get('user_id'))
            ->join('users', function ($join) {
                $join->on('users.id', '=', 'verifications_code.user_id');
            })
            ->orderby('verifications_code.id', 'desc')->first();

    if(!$verificado ){

        return response()->json([
            'estado' => false,
            'code' => 301,  
            'message' => 'Codigo Ingresado incorrecto',
        ]);
    }
    else{
        switch ($verificado->status) {
            case "pending":
                 if($verificado->code_verify == $request->get('token')){
                    $verifications_code_update = VerificationCode::findOrFail($verificado->id);
                    $verifications_code_update->status = 'aproved';
                    $verifications_code_update->save();
                return response()->json([
                'estado' => true,
                'code' => 201,
                'message' => 'Se guardo Correctamente ',
                'data'=> $verifications_code_update->id
                 ]);
    
        }else{
           
              return response()->json([
            'estado' => false,
            'code' => 301,  
            'message' => 'Codigo Ingresado incorrecto',
        ]);
        
        }
          break;
    default:
    return response()->json([
        'estado' => false,
        'code' => 301,  
        'message' => 'Codigo Ingresado Incorrecto o Expirado',
    ]);

       
        }
    }
       
                            

     
// Find your Account Sid and A
    }
}



