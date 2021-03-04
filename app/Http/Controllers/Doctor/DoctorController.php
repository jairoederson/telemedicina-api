<?php

namespace App\Http\Controllers\Doctor;

use App\Mifarma\Entities\Specialty;
use App\PaymentDoctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Doctor;
use App\SpecialityDoctor;
use App\User;
use App\Config;
use App\Query;
use App\Sede;
use App\Calification;
use App\DoctorSchedule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use stdClass;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
  public function saveCalification(Request $request){
    // obtenemos todos los campost del request y lo almacenamos
    $qualification = $request->get('qualification');
    $appreciation = $request->get('appreciation');
    $doctor_id = $request->get('doctor_id');
    $query_id = $request->get('query_id');

    // buscar query por id
    $query = Query::findOrFail($query_id);

    // asignamos la apreciacion en query
    $query->appreciation = $appreciation;

    // actualizamos la consulta
    $query->save();

    // creamos el array de calificacion
    $calification = array(
      "doctor_id" => $query->doctor_id,
      "patient_id" => $query->patient_id,
      "query_id" => $query_id,
      "calification" => $qualification
    );

    // creamos la calificacion
    Calification::create($calification);

    // buscamos la calificacion por el doctor id
    $califications = Calification::where('doctor_id', '=', $query->doctor_id)->get();

    // obtenemos la calificacion del doctor bajo un promedio
    $calification_value = $this->getCalification($califications);

    // buscamos al doctor por users_id
    $doctor = Doctor::where('users_id', '=', $doctor_id)->firstOrFail();

    // establecemos la nueva calificacion
    $doctor->qualification = $calification_value;

    // actualizamos doctor con la nueva calificacion
    $doctor->save();

    // retornamos el apirest
    return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Calificacion Exitosa", 'data'=>[]]);
  }

  public function getEarningByMonth(Request $request){
    // obtenemos el mes
    $month = $request->get('month');
    $year= $request->get('year');

    // obtenemos el id del doctor
    $doctor_id = $request->get('doctor_id');

    // inicializamos la variable de tiempo total de llamadas
    $tiempo_total = 0;

    // buscamos al doctor por user_id
    $doctor = Doctor::where('users_id', '=', $doctor_id)->get();

    if(count($doctor)==0){
      return response()->json(["message"=>"Doctor not found", "code"=>404]);
    }
    // buscamos todas las consultas por mes
    $consultas = Query::where('doctor_id', '=', $doctor[0]->id)
                      ->where('state', 1)
                      ->whereMonth('created_at', '=', $month)
                      ->get();

    // obtenemos el tiempo total
    foreach ($consultas as $key => $value) {
      $tiempo_total = $tiempo_total + $value->duration;
    }


    // obtenemos el numero total de consultas
    $nro_consultas = count($consultas);

    // obtenermos el precio de la consulta
    $config = Config::all();
    $pctje = $config[0]->doctor_price;

    // creamos el array json
    $earning = array(
      "calificacion_doctor"=>$doctor[0]->qualification,
      "nro_consultas"=>$nro_consultas,
      "duration_total"=>gmdate("H:i:s", $tiempo_total),
      "otros"=>"S/4.99",
      "price"=>"S/" . $config[0]->price,
      //"total"=>"S/" . round($nro_consultas*5 + 4.99, 2),
      // "total" =>"S/" . $this->getMontoMensual($doctor[0]->id,$month,$year,$pctje),
      "total" =>"S/" . round(5*$nro_consultas + 4.99, 2),
      "status" => $this->getStatusPagoMensual($doctor[0]->id,$month,$year)
    );

    // obtenemos el apirest
    return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Obtener Ingreso Exitoso", 'data'=>$earning]);

  }

    public function getMontoMensual($doctor_id, $month,$year,$pctje){
        $monto = Query::where('doctor_id', $doctor_id)->
        whereMonth('queries.created_at', $month)->
        whereYear('queries.created_at', $year)->sum('price');
        $total_mes = round(($monto * $pctje / 100 ), 2);

        return $total_mes;

    }

    public function getStatusPagoMensual($doctor_id, $month, $year){
        $affiliatePatient = PaymentDoctor::where('doctor_id', $doctor_id)->where('year', $year)->where('month', $month)->first();
        if ($affiliatePatient){
            if ($affiliatePatient->estado == 1){
                $mensaje = "Pagado";
            }else{
                $mensaje = "Pendiente";
            }

        }else{
            $mensaje = "Pendiente";
        }
        return $mensaje;
    }

  public function getEarningByYear(Request $request){

    // obtenemos el mes
    $year = date("Y");

    // obtenemos el id del doctor
    $doctor_id = $request->get('doctor_id');

    // inicializamos la variable de tiempo total de llamadas
    $tiempo_total = 0;

    // buscamos al doctor por user_id
    $doctor = Doctor::where('users_id', '=', $doctor_id)->get();
    if(count($doctor)==0){
      return response()->json(["message"=>"Doctor not found", "code"=>404]);
    }
    // buscamos todas las consultas por mes
    $consultas = Query::where('doctor_id', '=', $doctor[0]->id)
                      ->where('state', 1)
                      ->whereYear('date', '=', $year)
                      ->get();

    // obtenemos el tiempo total
    foreach ($consultas as $key => $value) {
      $tiempo_total = $tiempo_total + $value->duration;
    }

    // obtenemos el numero total de consultas
    $nro_consultas = count($consultas);

    // obtenermos el precio de la consulta
    $config = Config::all();

    // creamos el array json
    $earning = array(
      "calificacion_doctor"=>$doctor[0]->qualification,
      "nro_consultas"=>$nro_consultas,
      "duration_total"=>gmdate("H:i:s", $tiempo_total),
      "otros"=>"S/4.99",
      "price"=> "S/".$config[0]->price,
      "total"=>"S/".round($nro_consultas*5 + 4.99, 2)
    );
    // obtenemos el apirest
    return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Obtener Ingreso Exitoso", 'data'=>$earning]);
  }

  public function months(){
    $months = array(
      array(
        "code"=> "00",
        "value"=> "Todo el año",
        "year"=>date("Y")
      ),
      array(
        "code"=> "01",
        "value"=> "Enero",
      ),
      array(
        "code"=> "02",
        "value"=> "Febrero",
      ),
      array(
        "code"=> "03",
        "value"=> "Marzo",
      ),
      array(
        "code"=> "04",
        "value"=> "Abril",
      ),
      array(
        "code"=> "05",
        "value"=> "Mayo",
      ),
      array(
        "code"=> "06",
        "value"=> "Junio",
      ),
      array(
        "code"=> "07",
        "value"=> "Julio",
      ),
      array(
        "code"=> "08",
        "value"=> "Agosto",
      ),
      array(
        "code"=> "09",
        "value"=> "Setiembre",
      ),
      array(
        "code"=> "10",
        "value"=> "Octubre",
      ),
      array(
        "code"=> "11",
        "value"=> "Noviembre",
      ),
      array(
        "code"=> "12",
        "value"=> "Diciembre",
      ),
    );

    return response()->json(['message'=>"Listado de meses", "code"=>201, "status"=>true, "data"=>$months]);
  }

  public function updateStatus(Request $request){
    $status = $request->get('status');
    $users_id = $request->get('doctor_id');
    $doctor = Doctor::where('users_id', '=', $users_id)->firstOrFail();
    
    $doctor->status = $status;
    $doctor->save();

    $user = User::findOrFail($request->get('doctor_id'));
    $tokens = json_decode($user->token_mobile, true);
    if($status == 0 || $status == 2) {
      if ($request->get('platform') == 'ios') {
        /*
        $tokensIos = $tokens["tokens"]["ios"];
        $newTokens = [];
        foreach ($tokensIos as $key => $value) {
          if($value != $request->get('token')) {
            array_push($newTokens, $value);
          }
        }
        
        $tokens["tokens"]["ios"] = $newTokens;
        */
      } else if($request->get('platform') == "android") {
        /*
        $tokensAndroid = $tokens["tokens"]["android"];
        $newTokens = [];
        foreach ($tokensAndroid as $key => $value) {
          if($value != $request->get('token')) {
            array_push($newTokens, $value);
          }
        }
        $tokens["tokens"]["android"] = $newTokens;
        */
      } else {
        /*
        $tokensWeb = $tokens["tokens"]["web"];
        $newTokens = [];
        foreach ($tokensWeb as $key => $value) {
          if($value != $request->get('token')) {
            array_push($newTokens, $value);
          }
        }
        $tokens["tokens"]["web"] = $newTokens;
        */
      }

      $user->token_mobile = json_encode($tokens);
      $user->save();
    } else {
      if ($request->get('platform') == 'ios') {

        $tokensIos = $tokens["tokens"]["ios"];
        if($request->get('token')){
          $tokensIos[0] = $request->get('token');
        }
        // array_push($tokensIos, $request->get('token'));
        $tokens["tokens"]["ios"] = $tokensIos;

      } else if($request->get('platform') == "android") {

        $tokensAndroid = $tokens["tokens"]["android"];
        if($request->get('token')){
          $tokensAndroid[0] = $request->get('token');
        }
        // array_push($tokensAndroid, $request->get('token'));
        $tokens["tokens"]["android"] = $tokensAndroid;

      } else {

        $tokensWeb = $tokens["tokens"]["web"];
        if($request->get('token')) {
          $tokensWeb[0] = $request->get('token');
        }
        // array_push($tokensWeb, $request->get('token'));
        $tokens["tokens"]["web"] = $tokensWeb;

      }

      $user->token_mobile = json_encode($tokens);
      $user->save();
    }
    return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Actualizacion del estado Exitosa", 'data'=>$doctor]);
  }

  public function getStatusDoctor($id){
    $doctor = Doctor::where("users_id", "=", $id)->get();
    $status = $doctor[0]->status;
    return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición exitosa", 'status'=>$status]);
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getCalification($califications){
      $pesimo = 0;
      $malo = 0;
      $regular = 0;
      $bueno = 0;
      $excelente = 0;

      foreach ($califications as $valor){
          if($valor->calification == "1.00"){
            $pesimo++;
          }elseif($valor->calification == "2.00"){
            $malo++;
          }elseif($valor->calification == "3.00"){
            $regular++;
          }elseif ($valor->calification == "4.00") {
            $bueno++;
          }else{
            $excelente++;
          }
      }

      $calification_arr = array(
        "1.00" => $pesimo,
        "2.00" => $malo,
        "3.00" => $regular,
        "4.00" => $bueno,
        "5.00" => $excelente
      );

      $max_arr = max($calification_arr);

      foreach ($calification_arr as $key => $value) {
        if($value == $max_arr){
          return $key;
        }
      }

    }

    // buscar doctor por cmp
    public function searchDoctorByCmp(Request $request){
      $cmp = $request->get('cmp');

      $doctor = Doctor::where('id_cmp', '=', $cmp)->get();


      if(count($doctor) == 0){
        return response()->json(['estado'=>false, 'code'=>'404', 'message'=>"No se encontro el cmp respectivo", 'data'=>[]]);

      }else{
        $user = \DB::table('users')
          ->where('users.id', $doctor[0]->users_id )
          ->get();
        $user[0]->specialty = $doctor[0]->specialty;
        $user[0]->idDoctor = $doctor[0]->id;
        return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición exitosa", 'data'=>$user[0]]);

      }
    }

    // obtener doctor nombre y apellidos
    public function searchDoctorByName(Request $request){
      $name = $request->get('name');
//      $last_name_pat = $request->get('last_name_pat');
//      $last_name_mat = $request->get('last_name_mat');
      $last_name = $request->get('last_name');

      $users = \DB::table('users')
//        ->where('users.last_name', $last_name_pat . ' '. $last_name_mat)
//        ->where('users.name', $name)
        ->where('users.last_name','like', '%'.$last_name.'%')
        ->where('users.name','like', '%'.$name.'%')
        ->get();

      if(count($users) == 0){
        return response()->json(['estado'=>false, 'code'=>'404', 'message'=>"No se encontro al paciente", 'data'=>[]]);

      }else {
        $usersDoctor = [];
        foreach ($users as $key => $user) {
          $role_user = \DB::table('role_users')
          ->where('role_users.user_id', $user->id)
          ->get();

          $role = $role_user[0]->role_id;


          $doctor = Doctor::where("users_id", "=", $user->id)->get();
          $user->cmp = $doctor[0]->id_cmp;
          $user->specialty = $doctor[0]->specialty;
          $user->idDoctor = $doctor[0]->id;
          if($role == 2){
            array_push($usersDoctor, $user);
          }else{
          }
        }

        if(count($usersDoctor) == 0){
          return response()->json(['estado'=>false, 'code'=>'404', 'message'=>"No se encontro al paciente", 'data'=>[]]);

        }else{
          return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición exitosa", 'data'=>$usersDoctor]);

        }

      }


    }

    // autenticar doctor por cmp y dni
    public function authDoctorByCmpAndDni(Request $request){
      $cmp = $request->get('cmp');
      $numdoc = $request->get('numdoc');
      $doctor = Doctor::where('id_cmp', '=', $cmp)
              ->where('numdoc', '=', $numdoc)
              -get();
      if(count(doctor) == 0){
        return response()->json(['estado'=>false, 'code'=>'404', 'message'=>"Autenticación inválida", 'data'=>[]]);

      }else{
        return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Autenticación válida", 'data'=>$doctor[0]]);

      }
    }

    public function signOutUserSinch($user_sinch)
    {
      $users = \DB::table('users')
        ->where('users.user_sinch', $user_sinch)
        ->get();

      $doctor = Doctor::where('users_id', $users[0]->id)->get();
      $doctor_to_update = Doctor::findOrFail($doctor[0]->id);
      $doctor_to_update->status_sinch = 0;
      $doctor_to_update->save();

      return response()->json(["message"=>"Sign out", "code"=>200]);
    }

    public function getStateUserSinch($user_sinch){
      $users = \DB::table('users')
        ->where('users.user_sinch', $user_sinch)
        ->get();

      $doctor = Doctor::where('users_id', $users[0]->id)->get();
      return response()->json(["message"=>"successful request", "code"=>200, "state"=>$doctor[0]->status_sinch]);
    }

    public function isDoctorActive($user_id){
      $doctor = Doctor::where('users_id', $user_id)->get();

      if(count($doctor)==0){
        return response()->json(["message"=>"No se encontro al usuario", "code"=>404, "status"=>false]);
      }

      if($doctor[0]->status == 1){
        return response()->json(["message"=>"El Doctor esta activo", "code"=>200, "status"=>true]);
      }else{
        return response()->json(["message"=>"El Doctor esta inactivo", "code"=>200, "status"=>false]);
      }
    }

    public function staff(Request $request){
        $sede = $request->get('sede');
        $specialty_id = $request->get('specialty_id');
        //$sede = $request->get('sede');
        //prueba

        $doctors= SpecialityDoctor::join("doctors", "doctor_specialities.doctor_id", "=", "doctors.id")
        ->join("specialties", "doctor_specialities.speciality_id", "=", "specialties.id")
        ->select('doctors.*','specialties.name as namespeciality')
        ->where("doctor_specialities.speciality_id", $specialty_id)
        ->get();

        if ($doctors){
            foreach ($doctors as $doctor){
                $user = User::find($doctor->users_id);
                if ($user->gender == 1) {
                  $gender= 'Hombre';
              } else {
                $gender= 'Mujer';
              }

                $queries = Query::where('doctor_id', '=', $doctor->id)->get();
                $schedule=DoctorSchedule::where('doctor_id', '=', $doctor->id)
                ->where('status', 1)
                ->orderBy('start_time', 'asc')
                ->get();
                $sede = Sede::select('sedes.name','sedes.description')->where('id', '=', $doctor->sede_id)->where('status', '=', '1')->first();
                $queries_active = Query::select('queries.date','queries.querytime', 
                DB::raw("(select reprogramming_queries.date from reprogramming_queries where reprogramming_queries.query_id=queries.id order by reprogramming_queries.created_at desc limit 1) as new_date"),
                DB::raw("(select reprogramming_queries.querytime from reprogramming_queries where reprogramming_queries.query_id=queries.id order by reprogramming_queries.created_at desc limit 1) as new_time"))
                ->where('doctor_id', '=', $doctor->id)
                ->where('state','=',1)
                ->where('statusquery','=',0)
                ->get();
                $frequency = count($queries);
                $doctor->name = $user->name." ".$user->last_name;
                $doctor->img = $user->img;
                            $doctor->frequency = $frequency;
                            $doctor->year_old=  Carbon::parse($user->birth_date)->age;
                            $doctor->specialty= $doctor->namespeciality;
                            $doctor->schedule=$schedule;
                            $doctor->pendientes = $queries_active;
                            $doctor->gender= $gender;
                            $doctor->sede= $sede;
            }
            return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición Exitoso", 'data'=>$doctors]);
        }else{
            return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"No hay medicos", 'data'=>$doctors]);
        }
    }

    public function listSpeciality(){

        $query = Specialty::all();

        return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición Exitoso", 'data'=>$query]);
    }

    public function uploadFirmadigital(Request $request){
        $user_id = $request->get('user_id');

        $doctor = Doctor::where('users_id', $user_id)->first();

        if ($doctor){
            if ($request->file('firma')) {
                $patch = Storage::disk('images')->putFileAs('firmas', $request->file('firma'), $doctor->id.".jpg");
                $doctor->fill(['firma_digital' => $patch ])->save();
                $doctor->firma_digital = URL::to('/images/')."/".$patch."?time=".time();
            }
            return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición Exitoso", 'data'=>$doctor]);
        }else{
            return response()->json(['estado'=>false, 'code'=>'200', 'message'=>"No existe doctor", 'data'=>$doctor]);
        }


    }

}
