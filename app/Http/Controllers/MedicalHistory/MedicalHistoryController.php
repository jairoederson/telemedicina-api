<?php

namespace App\Http\Controllers\MedicalHistory;

use App\Appetites;
use App\Current_diseases;
use App\Deposition;
use App\Doctor;
use App\Dreams;
use App\GeneralBirths;
use App\GeneralImmunization;
use App\GeneralPrenatal;
use App\GeneralRecordPatient;
use App\GinecologicalRecordPatient;
use App\HarmfulHabits;
use App\Query;
use App\RecordPathologicalFamilyPatient;
use App\RecordPathologicalPatient;
use App\Relationship;
use App\Thirst;
use App\TypeInformant;
use App\Urines;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MedicalHistory;
use App\User;
use App\CivilStatus;
use App\Patient;
use App\PlaceBirthPatient;
use App\PlaceOriginPatient;
use App\PassengerDataPatient;
use App\MedicalDataPatient;
use App\DegreeInstruction;
use App\UserPhone;
use App\RoleUser;
use App\Ubigeo;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Sentinel;
use Mail;
use stdClass;

class MedicalHistoryController extends Controller
{
    public function testMedicalHistory(Request $request)
    {
        $datos = [
            'usuario' => 'hola',
            'email' => 'vamos',
            'password' => 'demo'
        ];
        //$mensajes[0] = $men;
        Mail::send('emails.demo', $datos, function ($msj) {
            $msj->subject('Envio de Contraseña');
            $msj->to('jcmp.030692@gmail.com');
        });

        return response()->json(['estado' => true, 'code' => '201', 'message' => "Peticion Exitoso", 'data' => []]);
    }

    public function loadMedicalHistory(Request $request)
    {
        $respuesta['type_documents'] = \DB::table('type_documents')->where("estado", "=", 1)->get();
        $respuesta['civil_status'] = \DB::table('civil_status')->get();
        $respuesta['type_passengers'] = \DB::table('type_passengers')->get();
        $respuesta['blood_types'] = \DB::table('blood_types')->get();
        $respuesta['degree_instructions'] = \DB::table('degree_instructions')->get();
        $userId = $request['userId'];
        $respuesta['user'] = User::where('id', $userId)->first();

        $ubigeo = Ubigeo::find($respuesta['user']['ubigeo_id']);
        $respuesta['ubigeo'] = $ubigeo;
        $departamentos = Ubigeo::where('estado', '1')->where('provincia', '00')->where('distrito', '00')->get();
        $respuesta['departamentos'] = $departamentos;
        $provincias = Ubigeo::where('estado', '1')->where('departamento', $ubigeo['departamento'])->where('distrito', '00')->where('provincia', '<>', '00')->get();
        $respuesta['provincias'] = $provincias;
        $distritos = Ubigeo::where('estado', '1')->where('departamento', $ubigeo['departamento'])->where('distrito', '<>', '00')->where('provincia', $ubigeo['provincia'])->get();
        $respuesta['distritos'] = $distritos;

        $patientId = Patient::where('users_id', $userId)->first()['id'];
        $respuesta['patient'] = Patient::where('id', $patientId)->first();

        $placeBirthPatientId = PlaceBirthPatient::where('patient_id', $patientId)->first()['id'];
        $respuesta['placeBirthPatient'] = PlaceBirthPatient::where('id', $placeBirthPatientId)->first();
        $ubigeoLN = Ubigeo::find($respuesta['placeBirthPatient']['ubigeo_id']);
        $respuesta['ubigeoLN'] = $ubigeoLN;
        $departamentosLN = Ubigeo::where('estado', '1')->where('provincia', '00')->where('distrito', '00')->get();
        $respuesta['departamentosLN'] = $departamentosLN;
        $provinciasLN = Ubigeo::where('estado', '1')->where('departamento', $ubigeoLN['departamento'])->where('distrito', '00')->where('provincia', '<>', '00')->get();
        $respuesta['provinciasLN'] = $provinciasLN;
        $distritosLN = Ubigeo::where('estado', '1')->where('departamento', $ubigeoLN['departamento'])->where('distrito', '<>', '00')->where('provincia', $ubigeoLN['provincia'])->get();
        $respuesta['distritosLN'] = $distritosLN;

        $placeOriginPatientId = PlaceOriginPatient::where('patient_id', $patientId)->first()['id'];
        $respuesta['placeOriginPatient'] = PlaceOriginPatient::where('id', $placeOriginPatientId)->first();
        $ubigeoLP = Ubigeo::find($respuesta['placeOriginPatient']['ubigeo_id']);
        $respuesta['ubigeoLP'] = $ubigeoLP;
        $departamentosLP = Ubigeo::where('estado', '1')->where('provincia', '00')->where('distrito', '00')->get();
        $respuesta['departamentosLP'] = $departamentosLP;
        $provinciasLP = Ubigeo::where('estado', '1')->where('departamento', $ubigeoLP['departamento'])->where('distrito', '00')->where('provincia', '<>', '00')->get();
        $respuesta['provinciasLP'] = $provinciasLP;
        $distritosLP = Ubigeo::where('estado', '1')->where('departamento', $ubigeoLP['departamento'])->where('distrito', '<>', '00')->where('provincia', $ubigeoLP['provincia'])->get();
        $respuesta['distritosLP'] = $distritosLP;

        $passengerDataPatientId = PassengerDataPatient::where('patient_id', $patientId)->first()['id'];
        $respuesta['passengerDataPatient'] = PassengerDataPatient::where('id', $passengerDataPatientId)->first();
        $medicalHistoryId = MedicalHistory::where('patient_id', $patientId)->first()['id'];
        $respuesta['medicalHistory'] = MedicalHistory::where('patient_id', $patientId)->first();
        $medicalDataPatientId = MedicalDataPatient::where('medical_history_id', $medicalHistoryId)->first()['id'];
        $respuesta['medicalDataPatient'] = MedicalDataPatient::where('id', $medicalDataPatientId)->first();
        $respuesta['celphone'] = UserPhone::where('users_id', $userId)->where('type_phones_id', '1')->first();
        $respuesta['telephone'] = UserPhone::where('users_id', $userId)->where('type_phones_id', '2')->first();

        return response()->json([
            'estado' => true,
            'code' => '201',
            'message' => "Peticion Exitoso",
            'data' => $respuesta
        ]);
    }

    // registrar historial medico
    public function saveMedicalHistory(Request $request)
    {

        $user = $request['user'];
        $contadorEmail = User::where('email', $user['email'])->count();
        $contadorNumDoc = User::where('numdoc', $user['numdoc'])->count();

        if ($contadorEmail == 0 && $contadorNumDoc == 0) {

            $password = rand(100000, 999999);
            $user['password'] = bcrypt($password);
            $userCreate = User::create($user);

//            $datos = array(
//			'usuario' => $user['name'].' '.$user['last_name'],
//			'email' => $user['email'],
//			'password' => $password
//		);
//            Mail::send('emails.demo',$datos,function($msj){
//                $msj->subject('Envio de Contraseña');
//                $msj->to('jcmp.030692@gmail.com');
//            });

            $roleuser = new RoleUser();
            $roleuser->user_id = $userCreate->id;
            $roleuser->role_id = 3;
            $roleuser->save();

            $userSentinel = Sentinel::findById($userCreate->id);
            $activation = Activation::create($userSentinel);
            $activate = Activation::where('user_id', $userCreate->id)->first();
            $activate->update(['completed' => 1]);

            $patient = $request['patient'];
            $patient['users_id'] = $userCreate->id;
            $patientCreate = Patient::create($patient);

            $placeBirthPatient['ubigeo_id'] = $request['ubigeo_id_Birth'];
            $placeBirthPatient['patient_id'] = $patientCreate->id;
            $placeBirthPatientCreate = PlaceBirthPatient::create($placeBirthPatient);

            $placeOriginPatient['ubigeo_id'] = $request['ubigeo_id_Origin'];
            $placeOriginPatient['patient_id'] = $patientCreate->id;
            $placeOriginPatientCreate = PlaceOriginPatient::create($placeOriginPatient);

            $passengerDataPatient = $request['passengerDataPatient'];
            $passengerDataPatient['patient_id'] = $patientCreate->id;
            $passengerDataPatientCreate = PassengerDataPatient::create($passengerDataPatient);

            $nroMedicalHistory = 'H';
            $countMedicalHistory = MedicalHistory::count();
            $numdigitmedicalhistory = strlen($countMedicalHistory + 1);
            for ($i = 0; $i < 9 - $numdigitmedicalhistory; ++$i) {
                $nroMedicalHistory = $nroMedicalHistory.'0';
            }
            $nroMedicalHistory = $nroMedicalHistory.($countMedicalHistory + 1);
            $medicalHistory['nro_medical_history'] = $nroMedicalHistory;
            $medicalHistory['patient_id'] = $patientCreate->id;
            $medicalHistoryCreate = MedicalHistory::create($medicalHistory);

            $medicalDataPatient = $request['medicalDataPatient'];
            $medicalDataPatient['medical_history_id'] = $medicalHistoryCreate->id;
            $medicalDataPatientCreate = MedicalDataPatient::create($medicalDataPatient);

            if ($request['celular'] != null) {
                $celular = new UserPhone();
                $celular->code = '+51';
                $celular->number = $request['celular'];
                $celular->estado = '1';
                $celular->type_phones_id = '1';
                $celular->users_id = $userCreate->id;
                $celular->save();
            }

            if ($request['telefono'] != null) {
                $telefono = new UserPhone();
                $telefono->code = '+51';
                $telefono->number = $request['telefono'];
                $telefono->estado = '1';
                $telefono->type_phones_id = '2';
                $telefono->users_id = $userCreate->id;
                $telefono->save();
            }

            return response()->json([
                'estado' => true,
                'code' => '201',
                'message' => "Peticion Exitoso",
                'data' => $patientCreate->id
            ]);
        } else {
            return response()->json([
                'estado' => false,
                'code' => '404',
                'message' => "Email o Numero Existe",
                'data' => []
            ]);
        }
    }

    // actualizar historial medico
    public function updateMedicalHistory(Request $request)
    {

        $user = $request['user'];
        $userId = $request['userId'];
        $flagEmail = false;
        $flagNumdoc = false;
        if ($user['email'] == User::find($userId)->email) {
            $flagEmail = true;
        } else {
            $contadorEmail = User::where('email', $user['email'])->count();
            if ($contadorEmail == 0) {
                $flagEmail = true;
            }
        }
        if ($user['numdoc'] == User::find($userId)->numdoc) {
            $flagNumdoc = true;
        } else {
            $contadorNumDoc = User::where('numdoc', $user['numdoc'])->count();
            if ($contadorNumDoc == 0) {
                $flagNumdoc = true;
            }
        }

        if ($flagEmail && $flagNumdoc) {

            User::where('id', $userId)->update($user);

            $patient = $request['patient'];
            $patientId = Patient::where('users_id', $userId)->first()->id;
            Patient::where('id', $patientId)->update($patient);

            $placeBirthPatient['ubigeo_id'] = $request['ubigeo_id_Birth'];
            if (PlaceBirthPatient::where('patient_id', $patientId)->count() != 0) {
                $placeBirthPatientId = PlaceBirthPatient::where('patient_id', $patientId)->first()->id;
                PlaceBirthPatient::where('id', $placeBirthPatientId)->update($placeBirthPatient);
            } else {
                $placeBirthPatient['patient_id'] = $patientId;
                $placeBirthPatientCreate = PlaceBirthPatient::create($placeBirthPatient);
            }

            $placeOriginPatient['ubigeo_id'] = $request['ubigeo_id_Origin'];
            if (PlaceOriginPatient::where('patient_id', $patientId)->count() != 0) {
                $placeOriginPatientId = PlaceOriginPatient::where('patient_id', $patientId)->first()->id;
                PlaceOriginPatient::where('id', $placeOriginPatientId)->update($placeOriginPatient);
            } else {
                $placeOriginPatient['patient_id'] = $patientId;
                $placeOriginPatientCreate = PlaceOriginPatient::create($placeOriginPatient);
            }

            $passengerDataPatient = $request['passengerDataPatient'];
            if (PassengerDataPatient::where('patient_id', $patientId)->count() != 0) {
                $passengerDataPatientId = PassengerDataPatient::where('patient_id', $patientId)->first()->id;
                PassengerDataPatient::where('id', $passengerDataPatientId)->update($passengerDataPatient);
            } else {
                $passengerDataPatient['patient_id'] = $patientId;
                $passengerDataPatientCreate = PassengerDataPatient::create($passengerDataPatient);
            }

            if (MedicalHistory::where('patient_id', $patientId)->count() != 0) {
                $medicalHistoryId = MedicalHistory::where('patient_id', $patientId)->first()->id;//atencion!!!!!
            } else {
                $nroMedicalHistory = 'H';
                $countMedicalHistory = MedicalHistory::count();
                $numdigitmedicalhistory = strlen($countMedicalHistory + 1);
                for ($i = 0; $i < 9 - $numdigitmedicalhistory; ++$i) {
                    $nroMedicalHistory = $nroMedicalHistory.'0';
                }
                $nroMedicalHistory = $nroMedicalHistory.($countMedicalHistory + 1);
                $medicalHistory['nro_medical_history'] = $nroMedicalHistory;
                $medicalHistory['patient_id'] = $patientId;
                $medicalHistoryCreate = MedicalHistory::create($medicalHistory);
                $medicalHistoryId = $medicalHistoryCreate->id;
            }

            $medicalDataPatient = $request['medicalDataPatient'];
            if (MedicalDataPatient::where('medical_history_id', $medicalHistoryId)->count() != 0) {

                $medicalDataPatientId = MedicalDataPatient::where('medical_history_id', $medicalHistoryId)->first()->id;
                MedicalDataPatient::where('id', $medicalDataPatientId)->update($medicalDataPatient);
            } else {
                $medicalDataPatient['medical_history_id'] = $medicalHistoryId;
                $medicalDataPatientCreate = MedicalDataPatient::create($medicalDataPatient);
            }

            $celular = UserPhone::where('users_id', $userId)->where('type_phones_id', '1')->first();
            if ($celular != null) {
                $celular->update(['number' => $request['celular']]);
            } else {
                if ($request['celular'] != null) {
                    $celular = new UserPhone();
                    $celular->code = '+51';
                    $celular->number = $request['celular'];
                    $celular->estado = '1';
                    $celular->type_phones_id = '1';
                    $celular->users_id = $userId;
                    $celular->save();
                }
            }
            $telefono = UserPhone::where('users_id', $userId)->where('type_phones_id', '2')->first();
            if ($telefono != null) {
                $telefono->update(['number' => $request['telefono']]);
            } else {
                if ($request['telefono'] != null) {
                    $telefono = new UserPhone();
                    $telefono->code = '+51';
                    $telefono->number = $request['telefono'];
                    $telefono->estado = '1';
                    $telefono->type_phones_id = '2';
                    $telefono->users_id = $userId;
                    $telefono->save();
                }
            }

            return response()->json([
                'estado' => true,
                'code' => '201',
                'message' => "Peticion Exitoso",
                'data' => $patientId
            ]);
        } else {
            return response()->json([
                'estado' => false,
                'code' => '404',
                'message' => "Email o Numero Existe",
                'data' => []
            ]);
        }

//        $medicalHistoryId = $request->get('medicalHistoryId');
//        $nroMedicalHistory = $request->get('nro_medical_history');
//        $patientId = $request->get('patient_id');
//
//        $medicalHistory = MedicalHistory::findOrFail($medicalHistoryId);
//        if ($medicalHistory) {
//            $medicalHistory->nro_medical_history = $nroMedicalHistory;
//            $medicalHistory->patient_id = $patientId;
//            $medicalUpdated = $medicalHistory->save();
//            return response()->json(['estado' => true, 'code' => '201', 'message' => "Peticion Exitosa", 'data' => $medicalUpdated]);
//        } else {
//
//            return response()->json(['estado' => false, 'code' => '404', 'message' => "No se encontro el historial medico", 'data' => []]);
//        }
    }

    // verificar la existencia de un historial medico del paciente
    public function verifyExistMedicalHistoryPatient($numdoc)
    {
        $users = \DB::table('users')->where('users.numdoc', $numdoc)->get();

        $patient = \DB::table('patients')->where('patients.users_id', $users[0]->id)->get();

        $medicalHistory = MedicalHistory::where('patient_id', '=', $patient[0]->id)->get();
        //$medicalHistory['userId'] = $users[0]->id;
        if (count($medicalHistory) == 0) {
            return response()->json([
                'estado' => false,
                'code' => '404',
                'message' => "Historial médico no encontrado",
                'data' => $users[0]->id
            ]);
        } else {
            return response()->json([
                'estado' => true,
                'code' => '201',
                'message' => "Peticion Exitosa",
                'data' => $users[0]->id
            ]);
        }
    }

    public function findMedicalHistory($word)
    {
        $numMedicalHsitory = MedicalHistory::where('nro_medical_history', 'LIKE', $word.'%')->get();

        return response()->json([
            'estado' => true,
            'code' => '200',
            'message' => "Petición Exitoso",
            'data' => $numMedicalHsitory
        ]);
    }

    public function HistoryMedicalPaciente($id)
    {

        $user = User::find($id);
        if(empty($user)){
            return response()->json(["message"=>"Usuario no encontrado", "code"=>404, "status"=>false]);
        }

        $tutored = Relationship::where('tutored', $user->id)->get();
        $patient  = Patient::where('users_id',$user->id)->first();


        // datos del tutor
        $nameTutor = "No existe";
        $dniTutor = "No existe";

        if(count($tutored) != 0 ){
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
        if($patient->civil_status_id == 1){
            $civil_status = "SOLTERO";
        }else if($patient->civil_status_id == 2){
            $civil_status = "CASADO";
        }else if($patient->civil_status_id == 3){
            $civil_status = "CONVIVIENTE";
        }else if($patient->civil_status_id == 4){
            $civil_status = "DIVORCIADO";
        }else{
            $civil_status = "VIUDO";
        }

        // grado de instruccion
        if($patient->degree_instruction_id == 1){
            $degree_instruction = "NO RECUERDA";
        }else if($patient->degree_instruction_id == 2){
            $degree_instruction = "PRIMARIA";
        }else if($patient->degree_instruction_id == 3){
            $degree_instruction = "SECUNDARIA";
        }else{
            $degree_instruction = "SUPERIOR";
        }

        // edad
        $date = new \DateTime($user->birth_date);
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
            "bloodType"=>$patient->bloodType,
            "rhFactor"=>"DESCONOCIDO",
            "tel"=>$user->tel,
            "cel"=>$user->tel
        );
        $id = $patient->id;
        $data['identificacionPatient'] = $personal_data;

        $generalRecordPatient = GeneralRecordPatient::where('patient_id', $id)->get()->last();
        if ($generalRecordPatient){
            if (empty($generalRecordPatient->occupational)){
                $generalRecordPatient->occupational = "Desconocido";
            }
            if (empty($generalRecordPatient->general_prenatal_id)){
                $generalRecordPatient->general_prenatal_id = "Desconocido";
            }else{
                $GeneralPrenatal = GeneralPrenatal::find($generalRecordPatient->general_prenatal_id);
                $generalRecordPatient->general_prenatal_id = $GeneralPrenatal->name;
            }
            if (empty($generalRecordPatient->general_birth_id)){
                $generalRecordPatient->general_birth_id = "Desconocido";
            }else{
                $GeneralPrenatal = GeneralBirths::find($generalRecordPatient->general_birth_id);
                $generalRecordPatient->general_birth_id = $GeneralPrenatal->name;
            }
            if (empty($generalRecordPatient->general_immunization_id)){
                $generalRecordPatient->general_immunization_id = "Desconocido";
            }else{
                $GeneralPrenatal = GeneralImmunization::find($generalRecordPatient->general_immunization_id);
                $generalRecordPatient->general_immunization_id = $GeneralPrenatal->name;
            }
            if (empty($generalRecordPatient->harmful_habits_id)){
                $generalRecordPatient->harmful_habits_id = "Desconocido";
            }else{
                $GeneralPrenatal = HarmfulHabits::find($generalRecordPatient->harmful_habits_id);
                $generalRecordPatient->harmful_habits_id = $GeneralPrenatal->name;
            }
        }else{
            $generalRecordPatient = "Desconocido";
        }

        $data['generalRecordPatient'] = $generalRecordPatient;

        $ginecologicalRecordPatient = GinecologicalRecordPatient::where('patient_id', $id)->get()->last();
        if (empty($ginecologicalRecordPatient)){
            $ginecologicalRecordPatient = "Desconocido";
        }
        $data['ginecologicalRecordPatient'] = $ginecologicalRecordPatient;

        $recordPathologicalPatient = RecordPathologicalPatient::where('patient_id', $id)->get()->last();
        $data['recordPathologicalPatient'] = $recordPathologicalPatient;

        $recordPathologicalFamilyPatient = RecordPathologicalFamilyPatient::where('patient_id', $id)->get()->last();
        if (empty($recordPathologicalFamilyPatient)){
            $recordPathologicalFamilyPatient = "Desconocido";
        }
        $data['recordPathologicalFamilyPatient'] = $recordPathologicalFamilyPatient;



        $dataenfermedadActual = new stdClass();
        if ($dataenfermedadActual){

            $query = Query::where('patient_id', $id)->get()->last();
            if ($query){
                $enfermedadActual = Current_diseases::where('query_id', $query->id)->get()->last();
                if (empty($enfermedadActual)){
                    $enfermedadActual = new stdClass();
                    $enfermedadActual->reason_consultation = '';
                    $enfermedadActual->sign_sympthoms = '';
                    $enfermedadActual->start_form = '';
                    $enfermedadActual->sickness_time = '';
                    $enfermedadActual->type_informant = '';
                    $enfermedadActual->deposition_id = '';
                    $enfermedadActual->thirst_id = '';
                    $enfermedadActual->urine_id = '';
                    $enfermedadActual->chronological_story = '';
                    $enfermedadActual->appetite_id = '';
                    $enfermedadActual->type_informant_id = '';
                    $enfermedadActual->dream_id = '';
                }
            }else{
                $enfermedadActual = new stdClass();
                $enfermedadActual->reason_consultation = '';
                $enfermedadActual->sign_sympthoms = '';
                $enfermedadActual->start_form = '';
                $enfermedadActual->sickness_time = '';
                $enfermedadActual->type_informant = '';
                $enfermedadActual->deposition_id = '';
                $enfermedadActual->thirst_id = '';
                $enfermedadActual->urine_id = '';
                $enfermedadActual->chronological_story = '';
                $enfermedadActual->appetite_id = '';
                $enfermedadActual->type_informant_id = '';
                $enfermedadActual->dream_id = '';
            }

            $dataenfermedadActual->reason_consultation = $enfermedadActual->reason_consultation;
            if (empty($dataenfermedadActual->reason_consultation)){
                $dataenfermedadActual->reason_consultation = "Desconocido";
            }
            $dataenfermedadActual->sign_sympthoms = $enfermedadActual->sign_sympthoms;
            if (empty($dataenfermedadActual->sign_sympthoms)){
                $dataenfermedadActual->sign_sympthoms = "Desconocido";
            }
            $dataenfermedadActual->start_form = $enfermedadActual->start_form;
            if (empty($dataenfermedadActual->start_form)){
                $dataenfermedadActual->start_form = "Desconocido";
            }
            $dataenfermedadActual->sickness_time = $enfermedadActual->sickness_time;
            if (empty($dataenfermedadActual->sickness_time)){
                $dataenfermedadActual->sickness_time = "Desconocido";
            }
            $dataenfermedadActual->type_informant = $enfermedadActual->type_informant;
            if (empty($dataenfermedadActual->type_informant)){
                $dataenfermedadActual->type_informant = "Desconocido";
            }
            $dataenfermedadActual->chronological_story = $enfermedadActual->chronological_story;
            if (empty($dataenfermedadActual->chronological_story)){
                $dataenfermedadActual->chronological_story = "Desconocido";
            }
            $datos = Appetites::find($enfermedadActual->appetite_id);
            if ($datos){
                $dataenfermedadActual->appetite_id = $datos->name;
            }else{
                $dataenfermedadActual->appetite_id = "Desconocido";
            }
            $datos = TypeInformant::find($enfermedadActual->type_informant_id);
            if ($datos){
                $dataenfermedadActual->type_informant_id = $datos->name;
            }else{
                $dataenfermedadActual->type_informant_id = "Desconocido";
            }
            $datos = Dreams::find($enfermedadActual->dream_id);
            if ($datos){
                $dataenfermedadActual->dream_id = $datos->name;
            }else{
                $dataenfermedadActual->dream_id = "Desconocido";
            }
            $datos = Deposition::find($enfermedadActual->deposition_id);
            if ($datos){
                $dataenfermedadActual->deposition_id = $datos->name;
            }else{
                $dataenfermedadActual->deposition_id = "Desconocido";
            }
            $datos = Thirst::find($enfermedadActual->thirst_id);
            if ($datos){
                $dataenfermedadActual->thirst_id = $datos->name;
            }else{
                $dataenfermedadActual->thirst_id = "Desconocido";
            }
            $datos = Urines::find($enfermedadActual->urine_id);
            if ($datos){
                $dataenfermedadActual->urine_id = $datos->name;
            }else{
                $dataenfermedadActual->urine_id = "Desconocido";
            }
        }else{
            $enfermedadActual = "Desconocido";
        }

        $data['enfermedadActual'] = $dataenfermedadActual;

        return response()->json(['estado' => true, 'code' => '200', 'message' => "Petición Exitosa", 'data' => $data]);
    }


    public function HistoryMedicalDoctor($id)
    {
        $user_doctor = User::find($id);

        $doctor = Doctor::where('users_id', $user_doctor->id)->first();

        if(empty($doctor)){
            return response()->json(["message"=>"Doctor no encontrado", "code"=>404, "status"=>false]);
        }
        $result = [];
        $Consultas = Query::where('doctor_id', $doctor->id)->get();

        foreach ($Consultas->unique('patient_id') as $consulta){

            $patient = Patient::find($consulta->patient_id);
            $user = User::find($patient->users_id);
            $tutored = Relationship::where('tutored', $user->id)->get();
            //$patient  = Patient::where('users_id',$user->id)->first();
            // datos del tutor
            $nameTutor = "No existe";
            $dniTutor = "No existe";

            if(count($tutored) != 0 ){
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
            if($patient->civil_status_id == 1){
                $civil_status = "SOLTERO";
            }else if($patient->civil_status_id == 2){
                $civil_status = "CASADO";
            }else if($patient->civil_status_id == 3){
                $civil_status = "CONVIVIENTE";
            }else if($patient->civil_status_id == 4){
                $civil_status = "DIVORCIADO";
            }else{
                $civil_status = "VIUDO";
            }

            // grado de instruccion
            if($patient->degree_instruction_id == 1){
                $degree_instruction = "NO RECUERDA";
            }else if($patient->degree_instruction_id == 2){
                $degree_instruction = "PRIMARIA";
            }else if($patient->degree_instruction_id == 3){
                $degree_instruction = "SECUNDARIA";
            }else{
                $degree_instruction = "SUPERIOR";
            }

            // edad
            $date = new \DateTime($user->birth_date);
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
                "bloodType"=>$patient->bloodType,
                "rhFactor"=>"DESCONOCIDO",
                "tel"=>$user->tel,
                "cel"=>$user->tel
            );


            $result[] = [
                'doctor_id' => $doctor->id,
                'query_id' => $consulta->id,
                //'history_patients' => $data,
                'history_patients' => ['user_id' => $user->id,'patient' => $personal_data],
            ];
        }

        return response()->json(['estado' => true, 'code' => '200', 'message' => "Petición Exitosa", 'data' => $result]);
    }

    public function getMedicalHistories() 
    {

        $histories = MedicalHistory::all();

        if(count($histories) == 0) {
            return response()->json([ "message"=>"Historiales no encontrados", "status"=>false ]);
        }

        return response()->json([ "message"=>"Historiales medicos", "status"=>true, "data"=>$histories ]);

    }


}
