<?php

namespace App\Http\Controllers\Trigger;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Doctor;
use Pusher\Pusher;
class TriggerController extends Controller
{
  public function sendTriggerVideoCall() {

    // $pusher = new Pusher( 'd9c49ee33bfc536bdab3','7a4cccc88a85c8054c3e','1086709', array( 'cluster' => 'us2', 'useTLS' => true ) );
    // $pusher->trigger('videocall', 'App\Events\SendVideoCall', 'prueba');

    //event(new \App\Events\SendVideoCall("prueba"));
    $options = array(
      'cluster' => 'us2',
      'encrypted' => true
    );

   $pusher = new \Pusher(
    'de27b817089745cae1fb',
    'c0fbbd7f2dacf6036fd2',
    '1086711',
  $options
  );

  //   $patient = $request->get('user_patient_sinch');
  //   $doctor = $request->get('user_doctor_sinch');
  //   $sender = ["user_patient_sinch"=>$patient, "user_doctor_sinch"=>$doctor];
    // $data['location'] = array('lat'=> $request->input('lat'), 'long' => $request->input('long'));
 $pusher->trigger('videocall', 'SendVideoCall', 'prueba');
    // return response()->json(['message'=>'Ok', 'status'=>200]);


      // return response()->json(['status'=>'success', 'data'=>$sender]);
  }

  public function sendCustomTrigger(Request $request)
  {

    $options = array(
      'cluster' => 'us2',
      'encrypted' => true
    );

    $pusher = new \Pusher(
      '173379ad2e6b6d8f8854',
      'b64756714266ecbaa358',
      '620116',
      $options
    );
    $user_sinch = $request->get('user_sinch');

    $users = \DB::table('users')
      ->where('users.user_sinch', $user_sinch)
      ->get();

    $doctor = Doctor::where('users_id', $users[0]->id)->get();
    $doctor_to_update = Doctor::findOrFail($doctor[0]->id);
    $doctor_to_update->status_sinch = 1;
    $doctor_to_update->save();

    $eventName = $request->get('event_name');
    $data = $request->get('data');
    $pusher->trigger('doctor_user_sinch_status', $eventName, $data);

    return response()->json(['status'=>'successfully', 'data'=>$data]);
  }
}
