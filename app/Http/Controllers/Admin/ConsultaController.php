<?php namespace App\Http\Controllers\Admin;

use App\Doctor;
use App\Patient;
use App\User;
use Doctrine\DBAL\Driver\AbstractDB2Driver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Sentinel;
use App\Query;
use App\Medicament;
use App\Treatment;
use App\NoteOther;
use App\DoctorSchedule;
use App\ReprogramingQuery;
use Date;
use Twilio\Rest\Client;
use Twilio\Jwt\ClientToken;
use Twilio\Exceptions\TwilioException;
class ConsultaController extends Controller
{
   
    public function index(){
        return view('admin/consultas');
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
        $chat = [];
        $client = new Client($accountSid, $authToken);
        try 
        {
            $user = User::find($user_id);
            $user_doctor = User::find($user_doctor_id);
            $usuario = $user->name." ".$user->last_name;
            $doctor = $user_doctor->name." ".$user_doctor->last_name;
   
            $uniqueName = $user_doctor->id."DOC_".$user->id."PAC_".$idconsulta."QUE";
            try{
                $channels = $client->chat->v2->services($chatSid)->channels($uniqueName)->fetch();
                $messages = $client->chat->v2->services($chatSid)->channels($channels->sid)->messages->read([]);
                foreach ($messages as $record) {
                //         //echo $record->sid."<br>";
                if ($usuario == $record->from){
                            $receptor = 1;
                       }else{
                            $receptor = 0;
                        }
                       if($usuario == $record->from || $doctor == $record->from){
                         $chat[] = [
                             'from' => $record->from,
                             'body' => $record->body,
                             'fecha' => $record->dateCreated,
                             'receptor' => $receptor
                             ];
                         }
                  }
            }catch(TwilioException $e)
            {
                $chat = [];
            }
            // $channels = $client->chat->v2->services($chatSid)->channels->
            // read(array("uniqueName" => $uniqueName),20);
           // print_r($channels);
           // print_r($channels->sid);
            //foreach ($channels as $record) {
                //print_R($record->uniqueName);
            //$channelId = $record->sid;
           // print_r($channelId);
         

             /*$result[] = [
                    'channelSid' => $channelId,
                    'Messages' => $chat,
                ];*/
      //}



        } catch (Exception $e)
        {
            echo "Error: " . $e->getMessage();
        }

        return view('admin/verconsulta', compact('consulta', 'patient', 'doctor','chat'));
    }
    public function ReprogramarConsulta($idconsulta){

        $consulta = Query::find($idconsulta);
        $patient = Patient::find($consulta->patient_id);
        $doctor = Doctor::find($consulta->doctor_id);
        $horario=DoctorSchedule::where('doctor_id', '=', ($consulta->doctor_id))
        ->where('status', 1)
        ->orderBy('start_time', 'asc')
        ->get();
        $queries_active = Query::select('queries.date','queries.querytime', 
        DB::raw("(select reprogramming_queries.date from reprogramming_queries where reprogramming_queries.query_id=queries.id order by reprogramming_queries.created_at desc limit 1) as new_date"),
        DB::raw("(select reprogramming_queries.querytime from reprogramming_queries where reprogramming_queries.query_id=queries.id order by reprogramming_queries.created_at desc limit 1) as new_time"))
        ->where('doctor_id', '=', $consulta->doctor_id)
        ->where('state','=',1)
        ->where('statusquery','=',0)
        ->get();

        $accountSid = config('app.twilio')['TWILIO_ACCOUNT_SID'];
        $authToken  = config('app.twilio')['TWILIO_AUTH_TOKEN'];
        $appSid     = config('app.twilio')['TWILIO_APP_SID'];
        $chatSid     = config('app.twilio')['TWILIO_CHAT_SERVICE_SID'];
        $user_id = $patient->users_id;
        $user_doctor_id = $doctor->users_id;
        $chat = [];
        $videos = [];
        $client = new Client($accountSid, $authToken);
        try
        {
            $user = User::find($user_id);
            $user_doctor = User::find($user_doctor_id);
            $usuario = $user->name." ".$user->last_name;
            $doctor = $user_doctor->name." ".$user_doctor->last_name;
            $consulta->pendientes = $queries_active;

            $uniqueName = $user_doctor->id."DOC_".$user->id."PAC_".$idconsulta."QUE";

            // $channels = $client->chat->v2->services($chatSid)
            //    ->channels
            //     ->read(array("uniqueName" => $uniqueName), 20);

        //    foreach ($channels as $record) {
        //        $channelId = $record->sid;
        //        $messages = $client->chat->v2->services($chatSid)->channels($channelId)->messages->read([]);
        //        foreach ($messages as $record) {
        //             echo $record->sid."<br>";
        //             if ($usuario == $record->from){
        //                $receptor = 1;
        //            }else{
        //                 $receptor = 0;
        //            }
        //             if ($usuario == $record->from || $doctor == $record->from){
        //                $chat[] = [
        //                    'from' => $record->from,
        //                    'body' => $record->body,
        //                    'fecha' => $record->dateCreated,
        //                    'receptor' => $receptor
        //                 ];
        //             }
        //        }

                /*$result[] = [
                    'channelSid' => $channelId,
                    'Messages' => $chat,
                ];*/
           



        } catch (Exception $e)
        {
            echo "Error: " . $e->getMessage();
        }

        return view('admin/reprogramarconsulta', compact('consulta', 'patient', 'doctor','horario','chat'));
    }
    public function verReceta($idconsulta){
        return view('admin/verrecetas',array("idconsultas"=>$idconsulta));
    }
    
    public function listarRecetas(Request $request){
        $treatments = Treatment::where('query_id',$request['idconsulta'])->get();
        for($i = 0, $size = count($treatments); $i < $size; ++$i) {
            $treatments[$i]['medicaments'] = Medicament::where('treatment_id',$treatments[$i]['id'])->get();
        }
        return response()->json($treatments);
    }
    
    public function listarConsultas(Request $request){
        $items =[];
        switch ($request['estado']) {
            case 'a':
                $items = Query::join('doctors','queries.doctor_id','doctors.id')->join('patients','queries.patient_id','patients.id')
                ->select('queries.*',"doctors.users_id as doctorusid","patients.users_id as pacienteusid",          
                        DB::raw("(select concat(name,' ',last_name) from users where users.id = doctors.users_id) as doctor"),
                        DB::raw("(select reprogramming_queries.date from reprogramming_queries where reprogramming_queries.query_id=queries.id order by reprogramming_queries.created_at desc limit 1) as new_date"),
                        DB::raw("(select concat(name,' ',last_name) from users where users.id = patients.users_id) as patient"))
                ->where('queries.statusquery','!=','1')
                    ->get();
          
              break;
            case '3':
                $items = Query::join('doctors','queries.doctor_id','doctors.id')->join('patients','queries.patient_id','patients.id')
                ->select('queries.*',"doctors.users_id as doctorusid","patients.users_id as pacienteusid",          
                        DB::raw("(select concat(name,' ',last_name) from users where users.id = doctors.users_id) as doctor"),
                        DB::raw("(select reprogramming_queries.date from reprogramming_queries where reprogramming_queries.query_id=queries.id order by reprogramming_queries.created_at desc limit 1) as new_date"),
                        DB::raw("(select concat(name,' ',last_name) from users where users.id = patients.users_id) as patient"))
                ->where('queries.statuspayment','1')
                    ->get();
              break;
            case '4':
                $items = Query::join('doctors','queries.doctor_id','doctors.id')->join('patients','queries.patient_id','patients.id')
                ->select('queries.*',"doctors.users_id as doctorusid","patients.users_id as pacienteusid",          
                        DB::raw("(select concat(name,' ',last_name) from users where users.id = doctors.users_id) as doctor"),
                        DB::raw("(select reprogramming_queries.date from reprogramming_queries where reprogramming_queries.query_id=queries.id order by reprogramming_queries.created_at desc limit 1) as new_date"),
                        DB::raw("(select concat(name,' ',last_name) from users where users.id = patients.users_id) as patient"))
                ->where('queries.statuspayment','0')
                    ->get();

            break;
              
            default:
            $items = Query::join('doctors','queries.doctor_id','doctors.id')->join('patients','queries.patient_id','patients.id')
            ->select('queries.*',"doctors.users_id as doctorusid","patients.users_id as pacienteusid",          
                    DB::raw("(select concat(name,' ',last_name) from users where users.id = doctors.users_id) as doctor"),
                    DB::raw("(select reprogramming_queries.date from reprogramming_queries where reprogramming_queries.query_id=queries.id order by reprogramming_queries.created_at desc limit 1) as new_date"),

                    DB::raw("(select concat(name,' ',last_name) from users where users.id = patients.users_id) as patient"))
            ->where('queries.statusquery',$request['estado'])
                ->get();
         
          }
      
       
        
        return response()->json($items);
    }

    public function listarConsultasAtendidas(Request $request){
        $items = Query::join('doctors','queries.doctor_id','doctors.id')->join('patients','queries.patient_id','patients.id')
            ->select('queries.*',"doctors.users_id as doctorusid","patients.users_id as pacienteusid",          
                    DB::raw("(select concat(name,' ',last_name) from users where users.id = doctors.users_id) as doctor"),
                    DB::raw("(select reprogramming_queries.date from reprogramming_queries where reprogramming_queries.query_id=queries.id order by reprogramming_queries.created_at desc limit 1) as new_date"),
                    DB::raw("(select concat(name,' ',last_name) from users where users.id = patients.users_id) as patient"))
                    ->where('queries.statusquery','1')
                    ->get();
        
        return response()->json($items);
    }
    
    public function listarConsultasCanceladas(Request $request){
        $items = Query::join('doctors','queries.doctor_id','doctors.id')->join('patients','queries.patient_id','patients.id')
            ->select('queries.*',"doctors.users_id as doctorusid","patients.users_id as pacienteusid",          
                    DB::raw("(select concat(name,' ',last_name) from users where users.id = doctors.users_id) as doctor"),
                    DB::raw("(select reprogramming_queries.date from reprogramming_queries where reprogramming_queries.query_id=queries.id order by reprogramming_queries.created_at desc limit 1) as new_date"),

                    DB::raw("(select concat(name,' ',last_name) from users where users.id = patients.users_id) as patient"))
                    ->where('queries.statusquery','3')
                    ->get();
        
        return response()->json($items);
    }
    
     public function listarConsultasPorMedico(Request $request){
          $doctor = Doctor::where('doctors.users_id',$request['doctor_id'])->first();
          $doctor_user = User::where('users.id',$doctor->users_id)->first();
         
        $items = Query::join('doctors','queries.doctor_id','doctors.id')->join('patients','queries.patient_id','patients.id')->join('users','users.id','patients.users_id')
            ->select('queries.*',"doctors.users_id as doctorusid","patients.users_id as pacienteusid", "users.user_sinch as patient_sinch",          
                    DB::raw("(select concat(name,' ',last_name) from users where users.id = doctors.users_id) as doctor"),
                    DB::raw("(select concat(name,' ',last_name) from users where users.id = patients.users_id) as patient"),
                    DB::raw("(select reprogramming_queries.date from reprogramming_queries where reprogramming_queries.query_id=queries.id order by reprogramming_queries.created_at desc limit 1) as new_date"),
                    DB::raw("(select reprogramming_queries.querytime from reprogramming_queries where reprogramming_queries.query_id=queries.id order by reprogramming_queries.created_at desc limit 1) as new_time"),
                    //DB::raw("(select 'https://telemedicinasocket.herokuapp.com/?from=".$doctor_user->user_sinch."&to=' + users.user_sinch + '&query=' + queries.id) as url")
                    DB::raw("(select concat('https://telemedicinasocket.herokuapp.com/?from=','".$doctor_user->user_sinch."','&to=',users.user_sinch,'&query=',queries.id)) as url")
                    )
                    ->where('queries.statusquery',$request['statusquery'])
                    ->where('queries.doctor_id',$doctor->id)
                    ->get();
        
        return response()->json($items);
    }
    
    public function obtenerConsultas(Request $request){
        $respuesta['consulta'] = Query::join('doctors','queries.doctor_id','doctors.id')->join('patients','queries.patient_id','patients.id')
            ->where('queries.id',$request['idconsulta'])
                ->select('queries.*',          
                    DB::raw("(select concat(name,' ',last_name) from users where users.id = doctors.users_id) as doctor"),
                    DB::raw("(select ' ' from dual) as medicamento"),
                    DB::raw("(select concat(name,' ',last_name) from users where users.id = patients.users_id) as patient"))
                ->first();
        $respuesta['notas'] = NoteOther::where('estado', '1')
                ->where('table_id', $request['idconsulta'])
                ->where('category_note', 'query')->get();
                $Modalidad = 'Online';

                if ($respuesta['consulta']->modalidad == 2) {
                    $Modalidad = 'Presencial';
                }
                $respuesta['consulta']->modalidad=$Modalidad;
        
        return response()->json($respuesta);
    }
       
    public function obtenerReprogramacion(Request $request){
        $reprogramaciones= ReprogramingQuery::where('query_id', $request['idconsultas'])
                                ->get();
        $respuesta['reprogramacion'] = $reprogramaciones;

        return response()->json($respuesta);
    }
    
    public function agregarNota(Request $request) {

        
        //$asociado = Company::find($request['idasociado']);

        $note = new NoteOther();
        $note->body_note = $request['texto'];
        $note->estado = '1';
        $note->table_id = $request['idconsulta'];
        $note->category_note  = 'query';
        $note->save();

        $notes = NoteOther::where('estado', '1')
                ->where('table_id', $request['idconsulta'])
                ->where('category_note', 'query')->get();

        return response()->json($notes);
    }
   
    public function Reprogramacion(Request $request) {

        

        $reprograming = new ReprogramingQuery();
        $reprograming->querytime = $request['querytime'];
        $reprograming->date	 =  $request['date'];
        $reprograming->query_id = $request['idconsulta'];
        $reprograming->diasemana = $request['diasemana'];
        
        $reprograming->save();

        return response()->json(true);
    }
    public function getVideos(Request $request){
        $idconsulta = $request->get('query_id');
        $consulta = Query::find($idconsulta);
        $patient = Patient::find($consulta->patient_id);
        $doctor = Doctor::find($consulta->doctor_id);
        $loader= true;
        $accountSid = config('app.twilio')['TWILIO_ACCOUNT_SID'];
        $authToken  = config('app.twilio')['TWILIO_AUTH_TOKEN'];
        $appSid     = config('app.twilio')['TWILIO_APP_SID'];
        $chatSid     = config('app.twilio')['TWILIO_CHAT_SERVICE_SID'];
        $user_id = $patient->users_id;
        $user_doctor_id = $doctor->users_id;
        $chat = [];
        $videos = [];
        $client = new Client($accountSid, $authToken);
        try
        {
            $user = User::find($user_id);
            $user_doctor = User::find($user_doctor_id);
            $usuario = $user->name." ".$user->last_name;
            $doctor = $user_doctor->name." ".$user_doctor->last_name;
            $entro=true;
        try
        {
           $uniqueName = $user_doctor->id."DOC_".$user->id."PAC_".$idconsulta."QUE";
           $rooms = $client->video->v1->rooms->read(array("status" => "completed", "uniqueName" => $uniqueName));
        if(empty($rooms)){
               
            $videos = [];
        }
        else{
        foreach ($rooms as $record) {
                $compositions = $client->video->compositions
                ->read([
                  'roomSid' => $record->sid
                ]);
                if(!empty($compositions)){
            
                    foreach ($compositions as $c) {
                        $compositionSid = $c->sid;
                        $uri = "https://video.twilio.com/v1/Compositions/$compositionSid/Media?Ttl=3600";
                        $response = $client->request("GET", $uri);
                        $mediaLocation = $response->getContent()["redirect_to"];
                        if (!empty($mediaLocation)){
                          $videos[] = $mediaLocation;
                         }
                    }
                }
            
        }
         }
          
   //$loader=false;

         }catch(TwilioException $e)
        {
            echo $e;
            $videos = [];
        }
           return view('admin/includes/videos', compact('videos','loader'));

        } catch (Exception $e)
        {
            echo "Error: " . $e->getMessage();
        }

    }
    public function ActualizarConsultasAtendidas(Request $request) {
        
        $query = Query::find($request['id_consulta'])->update(['statusquery' => '1']);
        return response()->json($query);
    }

    public function CancelarConsultas(Request $request) {   
        
        $query = Query::find($request['id_consulta'])->update(['statusquery' => '3']);
        return response()->json($query);
    }
    public function ActualizarPagos(Request $request) {   
        
        $query = Query::find($request['id_consulta'])->update(['statuspayment' => '1']);
        return response()->json($query);
    }
    public function ActualizarEstadoConsulta(Request $request) {   
        
        $query = Query::find($request['id_consulta'])->update(['statusquery' => $request['statusquery']]);
        return response()->json($query);
    }
}
