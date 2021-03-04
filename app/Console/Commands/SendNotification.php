<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;
use Carbon\Carbon;
use Twilio\Rest\Client;
use App\Query;
use Pusher\Pusher;
use App\ReprogramingQuery;

require_once realpath(__DIR__ . '/../../../twilio-php-main/src/Twilio/autoload.php');

class SendNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendnotification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'link for  logger controller';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    { 
      $options = array(
        'cluster' => 'us2',
        'encrypted' => true
      );
  

      $accountSid = config('app.twilio')['TWILIO_ACCOUNT_SID'];
      $authToken  = config('app.twilio')['TWILIO_AUTH_TOKEN'];
      $twilio = new Client($accountSid, $authToken);
      $twilio_number_from=(string)'+12184893625';
      $date = Carbon::now();
      $hour= $date->format('H:i');
      $fechaactual=  $date->format('Y-m-d');

      $queries = Query::select(
        'queries.*','verifications_code.phone','u1.name','u1.last_name','verifications_code.code_country','patients.id as patient_id','doctors.id as doctor_id','u1.id as doctor_user_id','u1.user_sinch','u2.id as patient_user_id','u2.user_sinch as user_sinchpatient','u1.tel as telefonomedico','u2.name as namepacient','u2.birth_date as birthdatepacient','u2.gender as genderpacient','u1.birth_date','u1.gender','queries.symptom as symptonpatient'
      )
       ->where("date","=", $fechaactual)
       ->where("modalidad",1)
      ->join('verifications_code', function ($join) {
        $join->on('queries.verification_code_id', '=', 'verifications_code.id');
    }) 
    ->join('doctors', function ($join) {
      $join->on('queries.doctor_id', '=', 'doctors.id');
  })
  ->join('patients', function ($join) {
    $join->on('queries.patient_id', '=', 'patients.id');
})
  ->join('users as u1', function ($join) {
    $join->on('doctors.users_id', '=', 'u1.id');
})
->join('users as u2', function ($join) {
  $join->on('patients.users_id', '=', 'u2.id');
})

       ->get();

       foreach ($queries as $query) {
 
        $reprogramaciones= ReprogramingQuery::select('reprogramming_queries.created_at','reprogramming_queries.date', 'reprogramming_queries.diasemana','reprogramming_queries.querytime')
        ->where('query_id',$query->id)
        ->orderby('reprogramming_queries.id', 'desc')
        ->first();
        if(!$reprogramaciones){
          $hourquery= $query->querytime;
          $diferenciahora=date("H:i:s",strtotime("00:00:00")+strtotime($hourquery)-strtotime($hour));

        }
        else{
          $hourqueryreprograming= $reprogramaciones->querytime;
          $diferenciahora=date("H:i:s",strtotime("00:00:00")+strtotime($hourqueryreprograming)-strtotime($hour));
        }


        $message="";
        $telefono= (string) ($query->code_country.$query->phone);
        $telefonomedico= (string) ($query->code_country.$query->telefonomedico);
        $now = new \DateTime();
        if($query->gender=="1" ){
          $sexodoctor="Hombre";
        }
        else{
          $sexodoctor="Mujer";

        }
        if($query->genderpacient=="1" ){
          $sexopaciente="Hombre";
        }
        else{
          $sexopaciente="Mujer";

        }
        $datedoctor = new \DateTime($query->birth_date);
        $datepaciente = new \DateTime($query->birthdatepacient);
        $interval = $now->diff($datedoctor);
        $interval2 = $now->diff($datepaciente);
        $edaddoctor=$interval->y;
        $edadpaciente=$interval2->y;

            if($diferenciahora=="00:00:00" ){
              //paciente
              $urlpacientesms="https://telemedicinasocket.herokuapp.com/?from=".$query->user_sinchpatient."&to=".$query->user_sinch."&query=".$query->id."&source=sms";
              $urlpaciente="https://telemedicinasocket.herokuapp.com/?from=".$query->user_sinchpatient."&to=".$query->user_sinch."&query=".$query->id;

              $message="Tienes una cita ahora ".$urlpacientesms;
              $twilio->messages->create($telefono,
              array(
             'from' => $twilio_number_from,
             'body' => $message
              )
              );

            //doctor
              $urldoctorsms=" https://telemedicinasocket.herokuapp.com/?from=".$query->user_sinch."&to=".$query->user_sinchpatient."&query=".$query->id."&source=sms";
              $urldoctor=" https://telemedicinasocket.herokuapp.com/?from=".$query->user_sinch."&to=".$query->user_sinchpatient."&query=".$query->id;

              $message="Tienes una cita ahora ".$urldoctorsms;
              $twilio->messages->create($telefonomedico,
              array(
             'from' => $twilio_number_from,
             'body' => $message
              )
              ); 

            $pusher = new Pusher(
            'de27b817089745cae1fb',
          'c0fbbd7f2dacf6036fd2',
            '1086711',
         $options );
          $sender = [
      "url_room_paciente"=>$urlpaciente,
      "url_room_doctor"=>$urldoctor,
      "query_id"=>($query->id),
      "patient_id"=>($query->patient_id),
      "patient_user_id"=>($query->patient_user_id),
      "patient_sinch"=>($query->user_sinchpatient),
      "patient_name"=>($query->namepacient),
      "patient_symptoms" =>($query->symptonpatient),
      "patient_gender" =>$sexopaciente,
      "doctor_id" =>($query->doctor_id),
      "doctor_user_id" =>($query->doctor_user_id),
      "doctor_name" =>($query->name),
      "doctor_gender" =>$sexodoctor,
      "patient_age" =>$edadpaciente,
      "doctor_age" =>$edaddoctor,
      "title" =>" ",
      "body" =>" ",
     ];
     $pusher->trigger('videocall', 'SendVideoCall',$sender);
             
      }
    }
  }
}
