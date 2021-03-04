<?php

namespace App\Http\Controllers\Query;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Query;
use App\QuerySympthom;
use App\Doctor;
use App\Patient;
use App\User;
use App\Calification;
use App\NoteOther;
use App\Relationship;
use App\ReprogramingQuery;
use App\GeneralRecordPatient;
use App\RecordPathologicalPatient;
use App\RecordPathologicalFamilyPatient;
use App\GinecologicalRecordPatient;
use App\Current_diseases;
use Illuminate\Support\Facades\DB;
use \Gnello\OpenFireRestAPI\Settings\SubscriptionType;
use Carbon\Carbon;
use Twilio\Rest\Client;
use Twilio\Jwt\ClientToken;
use Twilio\Exceptions\TwilioException;
class QueryController extends Controller
{
    public function getQueryOfDoctorRecieved(Request $request)
    {
        $doctor_id = $request->get('doctor_id');
        $doctor = \DB::table('doctors')
            ->where('doctors.users_id', $doctor_id)
            ->get();
        if (count($doctor) == 0) {
            return response()->json(["message" => "Usuario no encontrado", "code" => 404]);
        }
        $queries = \DB::table('queries')
            ->where('queries.doctor_id', $doctor[0]->id)
            ->where('queries.state', 1)
            ->orderBy('id', "desc")
            ->get();
        // ->paginate(10);
        // return response()->json($queries);
        foreach ($queries as $key => $query) {
            $patients = \DB::table('patients')
                ->where('patients.id', $query->patient_id)
                ->get();
            
            $users = \DB::table('users')
                ->where('users.id', $patients[0]->users_id)
                ->get();

            $calification = Calification::where('query_id', '=', $query->id)->get();
            if (count($calification) > 0) {
                $query->qualification = $calification[0]->calification;
            } else {
                $query->qualification = "0.00";
            }
            $hour = date('H:i', strtotime($query->created_at));
            $query->hour = $hour;
            $date = $users[0]->birth_date;
            $users[0]->years_old = $this->getAge($date);
            if ($users[0]->gender == 1) {
                $users[0]->genero = "Hombre";
            } else if ($users[0]->gender == 2) {
                $users[0]->genero = "Mujer";
            }
            $users[0]->last_name = (explode(" ", $users[0]->last_name))[0];
            $query->personal_data = $users[0];
            // $query->patient_data = $patients[0];
            $query->duration = gmdate("i:s", $query->duration);
            $timestamp = strtotime($query->created_at);
            $day = date('d', $timestamp);
            $month = date('m', $timestamp);
            $year = date('Y', $timestamp);
            $query->date = $day . "/" . $month . "/" . $year;
            // $date = $query->birth_date;
            // $query->years_old = $this->getAge($date);
        }
        // return $queries->paginate(2);
        return response()->json(['estado' => true, 'code' => '200', 'message' => "Listado Exitoso", 'data' => $queries]);
    }

    public function getQueryOfDoctorRecievedWithPagination($doctorId)
    {
        $doctor = \DB::table('doctors')
            ->where('doctors.users_id', $doctorId)
            ->get();
        if (count($doctor) == 0) {
            return response()->json(["message" => "Usuario no encontrado", "code" => 404]);
        }
        $queries = \DB::table('queries')
            ->where('queries.doctor_id', $doctor[0]->id)
            ->where('queries.state', 1)
            ->orderBy('id', "desc")
            ->paginate(10);

        foreach ($queries as $key => $query) {
            $patients = \DB::table('patients')
                ->where('patients.id', $query->patient_id)
                ->get();
            
            $users = \DB::table('users')
                ->where('users.id', $patients[0]->users_id)
                ->get();

            $calification = Calification::where('query_id', '=', $query->id)->get();
            if (count($calification) > 0) {
                $query->qualification = $calification[0]->calification;
            } else {
                $query->qualification = "0.00";
            }
            $hour = date('H:i', strtotime($query->created_at));
            $query->hour = $hour;
            $date = $users[0]->birth_date;
            $users[0]->years_old = $this->getAge($date);
            if ($users[0]->gender == 1) {
                $users[0]->genero = "Hombre";
            } else if ($users[0]->gender == 2) {
                $users[0]->genero = "Mujer";
            }
            $users[0]->last_name = (explode(" ", $users[0]->last_name))[0];
            $query->personal_data = $users[0];
            // $query->patient_data = $patients[0];
            $query->duration = gmdate("i:s", $query->duration);
            $timestamp = strtotime($query->created_at);
            $day = date('d', $timestamp);
            $month = date('m', $timestamp);
            $year = date('Y', $timestamp);
            $query->date = $day . "/" . $month . "/" . $year;
            // $date = $query->birth_date;
            // $query->years_old = $this->getAge($date);
        }
        // return $queries->paginate(2);
        return response()->json(['estado' => true, 'code' => '200', 'message' => "Listado Exitoso", 'data' => $queries]);
    }

    public function getAge($date)
    {
        return intval(date('Y', time() - strtotime($date))) - 1970;
    }

    public function getQueryOfDoctorLost(Request $request)
    {
        $doctor_id = $request->get('doctor_id');
        $doctor = \DB::table('doctors')
            ->where('doctors.users_id', $doctor_id)
            ->get();
        if (count($doctor) == 0) {
            return response()->json(["message" => "Usuario no encontrado", "code" => 404]);
        }
        $queries = \DB::table('queries')
            // ->join('patients', 'patients.id', '=', 'queries.patient_id')
            // ->join('users', 'users.id', '=', 'patients.users_id')
            ->where('queries.doctor_id', $doctor[0]->id)
            ->where('queries.state', 0)
            ->orderBy('id', "desc")
            ->get();
        foreach ($queries as $key => $query) {
            $patients = \DB::table('patients')
                ->where('patients.id', $query->patient_id)
                ->get();
            $users = \DB::table('users')
                ->where('users.id', $patients[0]->users_id)
                ->get();
            $calification = Calification::where('query_id', '=', $query->id)->get();
            // return count($calification);
            if (count($calification) > 0) {
                $query->qualification = $calification[0]->calification;
            } else {
                $query->qualification = "0.00";
            }
            $hour = date('H:i', strtotime($query->created_at));
            $query->hour = $hour;
            $date = $users[0]->birth_date;
            $users[0]->years_old = $this->getAge($date);
            if ($users[0]->gender == 1) {
                $users[0]->genero = "Masculino";
            } else if ($users[0]->gender == 2) {
                $users[0]->genero = "Femenino";
            }
            $users[0]->last_name = (explode(" ", $users[0]->last_name))[0];
            // $patients[0]->experience = 8;
            $query->personal_data = $users[0];
            // $query->patient_data = $patients[0];
            $query->duration = gmdate("i:s", $query->duration);
            $timestamp = strtotime($query->created_at);
            $day = date('d', $timestamp);
            $month = date('m', $timestamp);
            $year = date('Y', $timestamp);
            $query->date = $day . "/" . $month . "/" . $year;
            // $date = $query->birth_date;
            // $query->years_old = $this->getAge($date);
        }
        return response()->json(['estado' => true, 'code' => '200', 'message' => "Listado Exitoso", 'data' => $queries]);
    }

    public function getQueryOfDoctorLostWithPagination($doctorId)
    {
        $doctor = \DB::table('doctors')
            ->where('doctors.users_id', $doctorId)
            ->get();
        if (count($doctor) == 0) {
            return response()->json(["message" => "Usuario no encontrado", "code" => 404]);
        }
        $queries = \DB::table('queries')
            ->where('queries.doctor_id', $doctor[0]->id)
            ->where('queries.state', 0)
            ->orderBy('id', "desc")
            ->paginate(10);

        foreach ($queries as $key => $query) {
            $patients = \DB::table('patients')
                ->where('patients.id', $query->patient_id)
                ->get();
            $users = \DB::table('users')
                ->where('users.id', $patients[0]->users_id)
                ->get();
            $calification = Calification::where('query_id', '=', $query->id)->get();
            // return count($calification);
            if (count($calification) > 0) {
                $query->qualification = $calification[0]->calification;
            } else {
                $query->qualification = "0.00";
            }
            $hour = date('H:i', strtotime($query->created_at));
            $query->hour = $hour;
            $date = $users[0]->birth_date;
            $users[0]->years_old = $this->getAge($date);
            if ($users[0]->gender == 1) {
                $users[0]->genero = "Masculino";
            } else if ($users[0]->gender == 2) {
                $users[0]->genero = "Femenino";
            }
            $users[0]->last_name = (explode(" ", $users[0]->last_name))[0];
            // $patients[0]->experience = 8;
            $query->personal_data = $users[0];
            // $query->patient_data = $patients[0];
            $query->duration = gmdate("i:s", $query->duration);
            $timestamp = strtotime($query->created_at);
            $day = date('d', $timestamp);
            $month = date('m', $timestamp);
            $year = date('Y', $timestamp);
            $query->date = $day . "/" . $month . "/" . $year;
            // $date = $query->birth_date;
            // $query->years_old = $this->getAge($date);
        }
        return response()->json(['estado' => true, 'code' => '200', 'message' => "Listado Exitoso", 'data' => $queries]);
    }

    public function getQueryOfPatient(Request $request)
    {
        $patient_id = $request->get('patient_id');
        
        $patient = \DB::table('patients')
            ->where('patients.users_id', $patient_id)
            ->get();

        if(count($patient) == 0){
            return response()->json(["messge"=>"Usuario no encontrado", "code"=>404, "status"=>false]);
        }

        $queries = \DB::table('queries')
            // ->join('doctors', 'doctors.id', '=', 'queries.doctor_id')
            // ->join('users', 'users.id', '=', 'doctors.users_id')
            ->where('queries.patient_id', $patient[0]->id)
            ->where('queries.state', 1)
            ->orderBy('id', "desc")
            // ->paginate(4);
            ->get();
            
        foreach ($queries as $key => $query) {
            $doctors = \DB::table('doctors')
                ->where('doctors.id', $query->doctor_id)
                ->get();
            $doctors_frequency = count(Query::where('doctor_id', '=', $query->doctor_id)->get());
            $query->frequency = $doctors_frequency;
            // return $doctors;
            $users = \DB::table('users')
                // ->join('doctors', 'doctors.id', '=', 'queries.doctor_id')
                // ->join('users', 'users.id', '=', 'doctors.users_id')
                ->where('users.id', $doctors[0]->users_id)
                ->get();
            $date = $users[0]->birth_date;
            $users[0]->years_old = $this->getAge($date);
            if ($users[0]->gender == 1) {
                $users[0]->genero = "Masculino";
            } else if ($users[0]->gender == 2) {
                $users[0]->genero = "Femenino";
            }
            $hour = date('H:i', strtotime($query->created_at));
            $query->hour = $hour;
            $users[0]->last_name = (explode(" ",  $users[0]->last_name))[0];
            $doctors[0]->experience = 8;
            $query->personal_data = $users[0];
            $query->profesional_data = $doctors[0];
            $query->duration = gmdate("i:s", $query->duration);
            $timestamp = strtotime($query->created_at);
            $day = date('d', $timestamp);
            $month = date('m', $timestamp);
            $year = date('Y', $timestamp);
            $query->date = $day . "/" . $month . "/" . $year;
            // return $query
        }
        return response()->json(['estado' => true, 'code' => '200', 'message' => "Listado Exitoso", 'data' => $queries]);
        // return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Listado Exitoso", 'pagination'=>$queries]);
    }

    public function getQueryOfPatientWithPagination($patientId)
    {
        $patient = \DB::table('patients')
            ->where('patients.users_id', $patientId)
            ->get();

        if(count($patient) == 0){
            return response()->json(["messge"=>"Usuario no encontrado", "code"=>404, "status"=>false]);
        }

        $queries = \DB::table('queries')
            ->where('queries.patient_id', $patient[0]->id)
            ->where('queries.state', 1)
            ->orderBy('id', "desc")
            ->paginate(10);
            
        foreach ($queries as $key => $query) {
            $doctors = \DB::table('doctors')
                ->where('doctors.id', $query->doctor_id)
                ->get();
            $doctors_frequency = count(Query::where('doctor_id', '=', $query->doctor_id)->get());
            $query->frequency = $doctors_frequency;
            // return $doctors;
            $users = \DB::table('users')
                // ->join('doctors', 'doctors.id', '=', 'queries.doctor_id')
                // ->join('users', 'users.id', '=', 'doctors.users_id')
                ->where('users.id', $doctors[0]->users_id)
                ->get();
            $date = $users[0]->birth_date;
            $users[0]->years_old = $this->getAge($date);
            if ($users[0]->gender == 1) {
                $users[0]->genero = "Masculino";
            } else if ($users[0]->gender == 2) {
                $users[0]->genero = "Femenino";
            }
            $hour = date('H:i', strtotime($query->created_at));
            $query->hour = $hour;
            $users[0]->last_name = (explode(" ",  $users[0]->last_name))[0];
            $doctors[0]->experience = 8;
            $query->personal_data = $users[0];
            $query->profesional_data = $doctors[0];
            $query->duration = gmdate("i:s", $query->duration);
            $timestamp = strtotime($query->created_at);
            $day = date('d', $timestamp);
            $month = date('m', $timestamp);
            $year = date('Y', $timestamp);
            $query->date = $day . "/" . $month . "/" . $year;
            // return $query
        }
        return response()->json(['estado' => true, 'code' => '200', 'message' => "Listado Exitoso", 'data' => $queries]);
        // return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Listado Exitoso", 'pagination'=>$queries]);
    }

    public function getQueryByIdPatient(Request $request)
    {
        $query_id = $request->get('query_id');
        $query = Query::findOrFail($query_id);
        $patient_id = $query->patient_id;
        $patient_i = $query->patient_id;
        return response()->json(['estado' => true, 'code' => '200', 'message' => "Listado Exitoso", 'data' => $query]);
    }

    public function getQueryByIdDoctor(Request $request)
    {
        $query_id = $request->get('query_id');
        $query = Query::findOrFail($query_id);
        $patient_id = $query->patient_id;
        $doctor_id = $query->doctor_id;
        return response()->json(['estado' => true, 'code' => '200', 'message' => "Listado Exitoso", 'data' => $query]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $queries = \DB::table('queries')->get();
        return response()->json(['estado' => true, 'code' => '200', 'message' => "Listado Exitoso", 'data' => $queries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $doctor_id = $request->get('doctor_id');
        $patient_id = $request->get('patient_id');
        $doctor = \DB::table('doctors')
            ->where('doctors.users_id', $doctor_id)
            ->get();
        $patient = \DB::table('patients')
            ->where('patients.users_id', $patient_id)
            ->get();
        // get all keys of symptoms
        $symptom_keys = $request->get('symptom_keys');
        $fields = array(
            "doctor_id" => $doctor[0]->id,
            "patient_id" => $patient[0]->id,
            "date" => $request->get('date'),
            "price" => $request->get('price'),
            "duration" => $request->get('duration'),
            "state" => $request->get('state'),
            "symptom" => $request->get('symptom'),
            "symptom_keys" => $request->get('symptom_keys'),
            "message" => $request->get('message'),
            "mode" => $request->get('mode'),
            "querytime" => $request->get('querytime'),
            "statusquery" => $request->get('statusquery'),
            "modalidad" => $request->get('modalidad'),
            "verification_code_id" => $request->get('verification_code_id'),
            "statuspayment" => $request->get('statuspayment'),
            "payment_method" => $request->get('payment_method'),
        );
        // save Query
        $query = Query::create($fields);
        // analysis
        $analysis_pdf = "";
        $documents_arr = [];
        $documents_symptom = $request->get('documents');
        if ($documents_symptom != "" && $documents_symptom != null) {
            foreach ($documents_symptom as $key => $document) {
                if ($document != "") {
                    $document_base64 = base64_decode($document);
                    $document_path = '/' . $query->id . '/' . time() . $key . '.pdf';
                    // return $image_path;
                    \Storage::disk('documentsPaciente')->put($document_path, $document_base64);
                    // $image_bd = 'http://localhost:8000/images/user/paciente/symptoms'.$image_path;
                    $document_bd = 'https://telemedicina.today/images/user/paciente/documents' . $document_path;
                    array_push($documents_arr, $document_bd);
                }
            }
            $query_to_update = Query::findOrFail($query->id);
            if (count($documents_arr) == 0) {
                $query_to_update->documents = "";
            } else {
                $query_to_update->documents = json_encode(array("documents" => $documents_arr));
            }
            $query_to_update->save();
        }
        // images symptom
        $images_symptom = $request->get('symptom_images');
        $images_arr = [];
        if ($images_symptom != "" && $images_symptom != null) {
            foreach ($images_symptom as $key => $image) {
                if ($image != "") {
                    $image = base64_decode($image);
                    $image_path = '/' . $query->id . '/' . $request->get("name") . time() . $key . '.jpg';
                    // return $image_path;
                    \Storage::disk('imagesSymptom')->put($image_path, $image);
                    // $image_bd = 'http://localhost:8000/images/user/paciente/symptoms'.$image_path;
                    $image_bd = 'https://telemedicina.today/images/user/paciente/symptoms' . $image_path;
                    array_push($images_arr, $image_bd);
                }
            }
            $query_to_update = Query::findOrFail($query->id);
            if (count($images_arr) == 0) {
                $query_to_update->imagesSymptom = "";
            } else {
                $query_to_update->imagesSymptom = json_encode(array("images" => $images_arr));
            }
            $query_to_update->save();
        }
        // save keys on array
        if ($symptom_keys == "") {
        } else {
            $array = explode(",", $symptom_keys);
            if (count($array) > 1) {
                foreach ($array as $key) {
                    $query_sympthom = array("query_id" => $query->id, "sympthom_id" => $key);
                    QuerySympthom::create($query_sympthom);
                }
            } else {
                $query_sympthom = array("query_id" => $query->id, "sympthom_id" => $symptom_keys);
                QuerySympthom::create($query_sympthom);
            }
        }
        // save on QuerySympthom
        $query['images'] = $images_arr;
        $query['documents'] = $documents_arr;
        return response()->json(['estado' => true, 'code' => '201', 'message' => "Almacenamiento Exitoso", 'data' => $query]);
    }

    public function SearchQuery(Request $request)
    {
        $word = $request->get('word');
        $queries = Query::all()->search($word);
        return response()->json($queries);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function CreateRoster(Request $request)
    {
        $from = $request->get('from');
        $to = $request->get('to');
        if ($from == "" || $from == null) {
            return response()->json(['estado' => false, 'code' => '404', 'message' => "from necesario", 'data' => []]);
        }
        else {
            $authenticationToken = new \Gnello\OpenFireRestAPI\AuthenticationToken('d84G1zOiioruNwyk');
            $api = new \Gnello\OpenFireRestAPI\API('telemedicinasocket.herokuapp.com', 9090, $authenticationToken);
            $api->Settings()->setServerName("localhost");
            $api->Settings()->setDebug(true);
            $result =$api->Users()->addUserToGroups($from, array('consulta'));
            return response()->json(['estado' => true, 'code' => '200', 'message' => "Creacion de Roster exitosa", 'data' => $result]);
        }
    }

    public function CreateChatRoom(Request $request)
    {
        $patient_user_id = $request->get('patient_id');
        $doctor_user_id = $request->get('doctor_id');
        $patient_user = \DB::table('users')
            ->where('id', $patient_user_id)
            ->get();
        $doctor_user = \DB::table('users')
            ->where('id', $doctor_user_id)
            ->get();
        
        $authenticationToken = new \Gnello\OpenFireRestAPI\AuthenticationToken('d84G1zOiioruNwyk');
        $api = new \Gnello\OpenFireRestAPI\API('telemedicinasocket.herokuapp.com', 9090, $authenticationToken);
        $api->Settings()->setServerName("localhost");
        $api->Settings()->setDebug(true);

        $resultado = $api->Users()->retrieveUserRoster(strtolower($patient_user[0]->user_sinch));
        if (count($resultado["output"]->rosterItem) > 0) {
            $xmppPrebind = new \XmppPrebind('localhost', 'https:/' . '/telemedicinasocket.herokuapp.com/http-bind/', 'example', true, true);
            $username = strtolower($patient_user[0]->user_sinch);
            $password = strrev($patient_user[0]->numdoc . $patient_user[0]->email . "#");
            $xmppPrebind->connect($username, $password);
            $xmppPrebind->auth();
            $sessionInfo = $xmppPrebind->getSessionInfo(); 
            $url_vide_chat = "https://telemedicinasocket.herokuapp.com/?jid=" . $sessionInfo["jid"] . "&sid=" . $sessionInfo["sid"] . "&rid=" . $sessionInfo["rid"] . "&user=" . strtolower($doctor_user[0]->user_sinch);
            if ($sessionInfo["jid"] != "" && $sessionInfo["sid"] != "" && $sessionInfo["rid"] != "") {
                $doctor = Doctor::where('users_id', '=', $doctor_user_id)->get();
                $doctor_to_update = Doctor::findOrFail($doctor[0]->id);
                $doctor_to_update->status = 1;
                $doctor_updated = $doctor_to_update->save();
                return response()->json(['estado' => true, 'code' => '201', 'message' => "Peticion Exitoso", 'data' => $url_vide_chat]);
            } else {
                return response()->json(['estado' => false, 'code' => '400', 'message' => "No se establecio la conexion", 'data' => []]);
            }
        } else {
            return response()->json(['estado' => false, 'message' => "No se creo la lista de amigos", 'data' => ""]);
        }
    }

    public function InitChatRoom(Request $request)
    {
        $doctor_user_id = $request->get('doctor_id');
        $doctor_user = \DB::table('users')
            ->where('id', $doctor_user_id)
            ->get();

        $xmppPrebind = new \XmppPrebind('localhost', 'https://telemedicinasocket.herokuapp.com/http-bind/', 'example', true, true);
        $username = strtolower($doctor_user[0]->user_sinch);
        $password = strrev($doctor_user[0]->numdoc . $doctor_user[0]->email . "#");
        $xmppPrebind->connect($username, $password);
        $xmppPrebind->auth();
        $sessionInfo = $xmppPrebind->getSessionInfo();
        if ($sessionInfo["jid"]) {
            return response()->json($sessionInfo);
        } else {
            return response()->json(["error" => $sessionInfo]);
        }
    }

    public function getMedicalHistory($user_id){
        $patient = Patient::where('users_id', $user_id)->get();
        
        if(count($patient)==0){
            return response()->json(["message"=>"Usuario no encontrado", "code"=>404, "status"=>false]);
        } 

        $user = User::findOrFail($user_id);
        $patient = Patient::where('users_id', $user->id)->get();
        
        if(count($patient) == 0){
            return response()->json(["message"=>"Usuario no encontrado", "code"=>404, "status"=>false]);
        }
        
        $tutored = Relationship::where('tutored', $patient[0]->users_id)->get();
        $query = Query::where('patient_id', $patient)->get();
        
        $current_disease = Current_diseases::where('query_id', end($query)->id)->get();
        
        if(count($query) == 0){
            $type_informant = "DESCONOCIDO";
            $time_illness = "DESCONOCIDO";
            $start_form = "DESCONOCIDO";
            $main_symptoms = "DESCONOCIDO";
            $chronological_story = "DESCONOCIDO";
            $appetite ="DESCONOCIDO";
            $thirst = "DESCONOCIDO";
            $dream = "DESCONOCIDO";
            $urine = "DESCONOCIDO";
            $stools = "DESCONOCIDO";
        }else{
            $type_informant = $current_disease[0]->type_informant;
            $time_illness = $current_disease[0]->sickness_time;
            $start_form = $current_disease[0]->start_form;
            $main_symptoms = $current_disease[0]->sign_sympthoms;
            $chronological_story = $current_disease[0]->chronological_story;
            $appetite = $current_disease[0]->appetite_id;
            $thirst = $current_disease[0]->thirst_id;
            $dream = $current_disease[0]->dream_id;
            $urine = $current_disease[0]->urine_id;
            $stools = $current_disease[0]->deposition_id;
        }
        
        // datos del tutor
        $nameTutor = "No existe";
        $dniTutor = "No existe";

        if( count($tutored) != 0 ){
            $tutorPatient = Patient::findOrFail($tutored->tutor);
            $tutor = User::findOrFail($tutorPatient->id);
            $nameTutor = $tutor->name . " " . $tutor->last_name;
            $dniTutor = $tutor->numdoc;
        }

        // genero
        if($user->gender == 1){
            $genderString = "Masculino";
        }else{
            $genderString = "Femenino";
        }

        // estado civil
        if($patient[0]->civil_status_id == 1){
            $civil_status = "SOLTERO";
        }else if($patient[0]->civil_status_id == 2){
            $civil_status = "CASADO";
        }else if($patient[0]->civil_status_id == 3){
            $civil_status = "CONVIVIENTE";
        }else if($patient[0]->civil_status_id == 4){
            $civil_status = "DIVORCIADO";
        }else{
            $civil_status = "VIUDO";
        }

        // grado de instruccion
        if($patient[0]->degree_instruction_id == 1){
            $degree_instruction = "NO RECUERDA";
        }else if($patient[0]->degree_instruction_id == 2){
            $degree_instruction = "PRIMARIA";
        }else if($patient[0]->degree_instruction_id == 3){
            $degree_instruction = "SECUNDARIA";
        }else{
            $degree_instruction = "SUPERIOR";
        }

        // edad
        $date = new \DateTime($user[0]->birth_date);
        $now = new \DateTime();
        $interval = $now->diff($date);

        // Obtener datos del paciente
        $personal_data = array(
            "name"=>$user->name . " " . $user->last_name,
            "dni"=>$user->numdoc,
            "nameTutor"=>$nameTutor,
            "dniTutor"=>$dniTutor,
            "gender"=>$genderString,
            "civilStatus"=>$civil_status,
            "race"=>"DESCONOCIDO",
            "religion"=>"DESCONOCIDO",
            "yearsOld"=>$interval->y,
            "dateBirth"=>$user->birth_date,
            "placeBirth"=>$user->country,
            "origin"=>$user->country,
            "email"=>$user->email,
            "currentDirection"=>$user->address . " " . $user->address_extra_info,
            "degreeInstruction"=>$degree_instruction,
            "school"=>"DESCONOCIDO",
            "bloodType"=>$patient[0]->bloodType,
            "rhFactor"=>"DESCONOCIDO",
            "tel"=>$user->tel,
            "cel"=>$user->tel
        );

        // Obtener antecedentes del paciente
        $generalRecordData = GeneralRecordPatient::where('patient_id', $patient[0]->id)->get();
        $physiologicalRecordData = GinecologicalRecordPatient::where('patient_id', $patient[0]->id)->get();
        $ginecologicalRecord = GinecologicalRecordPatient::where('patient_id', $patient[0]->id)->get();
        $ginecologicalRecord = Current_diseases::where('patient_id', $patient[0]->id)->get();
        
        // Generales
        
        $general_record = array(
            "medicaments"=>end($people)->medicaments,
            "tabacco"=>"DESCONOCIDO",
            "ch"=>"DESCONOCIDO",
            "drug"=>"DESCONOCIDO",
            "cofee"=>"DESCONOCIDO",
            "others"=>"DESCONOCIDO",
        );
        
        // Fisiologicos

        $physiological_record = array(
            "prenatal"=>end($generalRecordData)->general_prenatal_id,
            "birth"=>end($generalRecordData)->general_birth_id,
            "inmunizations"=>end($generalRecordData)->general_immunization_id
        );
        
        // Gineco obstetrico
        
        $gynecological_record = array(
            "menarquia"=>end($ginecologicalRecord)->menarquia,
            "rc"=>end($ginecologicalRecord)->r_caternial,
            "fur"=>end($ginecologicalRecord)->fur,
            "fpp"=>end($ginecologicalRecord)->fpp,
            "rs"=>end($ginecologicalRecord)->rs,
            "disminorrea"=>end($ginecologicalRecord)->disminorrea,
            "g"=>"DESCONOCIDO",
            "p"=>"DESCONOCIDO",
            "fup"=>end($ginecologicalRecord)->fup,
            "cesarea"=>end($ginecologicalRecord)->cesareas,
            "lastPAP"=>end($ginecologicalRecord)->pap,
            "mamografia"=>end($ginecologicalRecord)->mamografia,
            "MAC"=>end($ginecologicalRecord)->mac,
            "others"=>end($ginecologicalRecord)->otros,
            "pathological"=>"DESCONOCIDO",
            "familiars"=>"DESCONOCIDO",
            "occupationals"=>"DESCONOCIDO",
            "hepatitis"=>"DESCONOCIDO",
            "sdFebril"=>"DESCONOCIDO",
            "allergies"=>"DESCONOCIDO",
            "tbc"=>"DESCONOCIDO",
            "ram"=>"DESCONOCIDO",
            "surgeries"=>"DESCONOCIDO",
            "hypertension"=>"DESCONOCIDO",
            "medicament"=>"DESCONOCIDO",
        );

        // Obtener enfermedad actual
        $current_illness = array(
            "type_informant"=>$type_informant,
            "time_illness"=>$time_illness,
            "start_form"=>$start_form,
            "main_symptoms"=>$main_symptoms,
            "chronological_story"=>$chronological_story,
        );
        
        // Obtener funciones biologicas
        $biological_functions= array(
            "appetite"=>$appetite,
            "thirst"=>$thirst,
            "dream"=>$dream,
            "urine"=>$urine,
            "stools"=>$stools,
        );

        // response data
        $data = array(
            "personal_data"=>$personal_data,
            "physiological_record"=>$physiological_record,
            "gynecological_record"=>$gynecological_record,
            "current_illness"=>$current_illness,
            "biological_functions"=>$biological_functions,
        );

        return response()->json(["message"=>"Historial medico", "code"=>200, "status"=>true, "data"=>$data]);
    }

    public function getLastQueryId($doctor_id){
        $doctor = Doctor::where('users_id', $doctor_id)->get();

        if(count($doctor) == 0){
            return response()->json(["message"=>"Usuario doctor no encontrado", "code"=>404, "status"=>false]);
        }

        $queries = Query::where('doctor_id', $doctor[0]->id)->get();
        
        if(count($queries) == 0){
            return response()->json(["message"=>"No se encontro una consulta registrada", "code"=>404, "status"=>false]);
        }

        $query =  $queries[count($queries) - 1];

        return response()->json(["message"=>"Ultima consulta encontrada", "data"=>array("query_id"=>$query->id),"code"=>200, "status"=>true]);
    }

    public function vexSetRecordVideoCall(Request $request){
        $query_id = $request->get('query_id');
        $code_base64_record = $request->get('code_base64_record');
        $query = Query::where('id', $query_id)->get();

        if(count($query)!=0){
            return response()->json(['message'=>'La consulta no fue encontrada', 'code'=>404, 'status'=>false ]);
        }

        $record = base64_decode($code_base64_record);
        $record_path = 'record'.time().'.mp3';

        \Storage::disk('recordQueries')->put($record_path, $record);
        $record_url = 'https://telemedicina.today/records/queries/'.$record_path;

         // retorno json
         return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Grabación registrada", 'data'=>$record_url]);

    }
    
    public function getQueryPatientStatus(Request $request){
        $patient = Patient::where('patients.users_id',$request['user_id'])->first();
        $items = Query::join('doctors','queries.doctor_id','doctors.id')->join('patients','queries.patient_id','patients.id')
            ->select('queries.*',"doctors.users_id as doctorusid","patients.users_id as pacienteusid",          
                    DB::raw("(select concat(name,' ',last_name) from users where users.id = doctors.users_id) as doctor"),
                    //DB::raw("(select 'medicamento' from dual) as medicamento"),
                    DB::raw("(select concat(name,' ',last_name) from users where users.id = patients.users_id) as patient"),
                    DB::raw("(select reprogramming_queries.date from reprogramming_queries where reprogramming_queries.query_id=queries.id order by reprogramming_queries.created_at desc limit 1) as new_date"),
                DB::raw("(select reprogramming_queries.querytime from reprogramming_queries where reprogramming_queries.query_id=queries.id order by reprogramming_queries.created_at desc limit 1) as new_time"))
                
                    ->where('queries.statusquery',$request['statusquery'])
                    ->where('patients.id',$patient->id)
                    ->get();
        
        return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"", 'data'=>$items]);

    }
    
    public function getQueryDetailsById(Request $request){
        $consulta = Query::find($request->get('query_id'));
        $patient = Patient::find($consulta->patient_id);
        $doctor = Doctor::find($consulta->doctor_id);
        $user_id = $patient->users_id;
        $user_doctor_id = $doctor->users_id;
        try
        {
            $user = User::find($user_id);
            $user_doctor = User::find($user_doctor_id);
            $consulta['nombre_doctor'] = $user_doctor->name." ".$user_doctor->last_name;
            $consulta['nombre_paciente'] = $user->name." ".$user->last_name;
            $consulta['doctorusid'] = $user_doctor->id;
            $consulta['pacienteusid'] = $user->id;
            
            $notas = NoteOther::select('note_others.body_note')->where('estado', '1')
                ->where('table_id', $request['query_id'])
                ->where('category_note', 'query')->get();
            $consulta['notas'] = $notas;
            
            $reprogramaciones= ReprogramingQuery::select('reprogramming_queries.created_at','reprogramming_queries.date', 'reprogramming_queries.diasemana','reprogramming_queries.querytime')
            ->where('query_id', $request['query_id'])->get();
            $consulta['reprogramaciones'] = $reprogramaciones;
                
            $consulta['nombre_modalidad'] = 'Online';
            
            $consulta['url'] = '';
            if ($consulta->modalidad == 1 && $consulta->statusquery == 0) {
                $consulta['url'] = 'https://telemedicinasocket.herokuapp.com/?from='.$user->user_sinch.'&to='.$user_doctor->user_sinch.'&query='.$consulta->id;
            }
            
            if ($consulta->modalidad == 2) {
                $consulta['nombre_modalidad'] = 'Presencial';
            }
        } catch (Exception $e)
        {
            echo "Error: " . $e->getMessage();
        }
        return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"", 'data'=>$consulta]);
    }
    public function ValidateHourQuery(Request $request){
        $consulta = Query::find($request->get('query_id'));
     
            $user = User::find($request->get('patient_user_id'));
            $user_doctor = User::find($request->get('doctor_user_id'));
            $consulta['nombre_doctor'] = $user_doctor->name." ".$user_doctor->last_name;
            $consulta['nombre_paciente'] = $user->name." ".$user->last_name;
            $reprogramaciones= ReprogramingQuery::select('reprogramming_queries.created_at','reprogramming_queries.date', 'reprogramming_queries.diasemana','reprogramming_queries.querytime')
            ->where('query_id', $request->get('query_id'))
            ->orderby('reprogramming_queries.id', 'desc')
            ->first();
            $date = Carbon::now();
            $fechaactual=  $date->format('Y-m-d');
            $hour= $date->format('H:i');
            if(!$reprogramaciones){
                $datequery=$consulta->date;
                $querytime=$consulta->querytime;
                $diferenciahora=date("H:i:s",strtotime("00:00:00")+strtotime($hour)-strtotime($querytime));
             

            }else{
                $datequery=$reprogramaciones->date;
                $querytime_reprogramacion= $reprogramaciones->querytime;
                $diferenciahora=date("H:i:s",strtotime("00:00:00")+strtotime($hour)-strtotime($querytime_reprogramacion));
                   
            }
        //    print_R($diferenciahora);
            $diferenciatotal = explode(":", $diferenciahora);
            $horas =(int) $diferenciatotal[0];
            $minutos=(int) $diferenciatotal[1];
        // print_r($fechaactual);
          //  print_r($datequery);
            if($horas==0 && $minutos <=15 && $fechaactual==$datequery){
                return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"", 'data'=>$consulta,'status'=>'200']);

            }else{
                return response()->json(['estado'=>false, 'code'=>'200', 'message'=>"", 'data'=>$consulta,'status'=>'500']);

            }
            }
            public function ActualizarEstadoConsultaTiempo(Request $request) {  
                $accountSid = config('app.twilio')['TWILIO_ACCOUNT_SID'];
                $authToken  = config('app.twilio')['TWILIO_AUTH_TOKEN'];
                $appSid     = config('app.twilio')['TWILIO_APP_SID'];
                $chatSid     = config('app.twilio')['TWILIO_CHAT_SERVICE_SID']; 
                $client = new Client($accountSid, $authToken);
                $idconsulta=$request['query_id'];
                //$mode=$request['mode'];
                $sid =$request['room_name'];
                $room = $client->video->v1->rooms($sid)->fetch();

           
                $query = Query::find($idconsulta)->update(['statusquery' => '1','duration' => $request['duration']]);

        $composition = $client->video->compositions->create($room->sid, [
                        'audioSources' => '*','videoLayout' =>  array('grid' => array ('video_sources' => array('*'))  ),
            'statusCallback' => 'http://my.server.org/callbacks',
              'format' => 'mp4']);


                return response()->json(['status'=>'200']);
            }
    
}
