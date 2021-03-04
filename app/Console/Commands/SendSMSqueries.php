<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;
use Carbon\Carbon;
use Twilio\Rest\Client;
use App\Query;
use App\ReprogramingQuery;
require_once realpath(__DIR__ . '/../../../twilio-php-main/src/Twilio/autoload.php');

class SendSMSqueries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendsms';

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
      $accountSid = config('app.twilio')['TWILIO_ACCOUNT_SID'];
      $authToken  = config('app.twilio')['TWILIO_AUTH_TOKEN'];
      $twilio = new Client($accountSid, $authToken);
      $twilio_number_from=(string)'+12184893625';
      $date = Carbon::now();
      $hour= $date->format('H:i');
      $fechaactual=  $date->format('Y-m-d');

      $queries = Query::select(
        'queries.*','verifications_code.phone','users.name','users.last_name','verifications_code.code_country'
      )
       ->where("date","=", $fechaactual)
      ->join('verifications_code', function ($join) {
        $join->on('queries.verification_code_id', '=', 'verifications_code.id');
    }) 
    ->join('doctors', function ($join) {
      $join->on('queries.doctor_id', '=', 'doctors.id');
  })
  ->join('users', function ($join) {
    $join->on('doctors.users_id', '=', 'users.id');
})
       ->get();
      // print_R($queries);
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
        if($query->modalidad==1){
          $message="Tienes una cita online con el doctor ".$query->name." ".$query->last_name." dentro de una hora";
       
         } else{

          $message="Tienes una cita con  el doctor ".$query->name." ".$query->last_name." dentro de una hora";

        }
            if($diferenciahora=="01:00:00" ){
              $twilio->messages->create($telefono,
               array(
              'from' => $twilio_number_from,
              'body' => $message
             )
        );   
      }
    }
  }
}
