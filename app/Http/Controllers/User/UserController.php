<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mifarma\Managers\DetUserSocialProviderManager;
use App\Mifarma\Managers\DoctorManager;
use App\Mifarma\Managers\PatientManager;
use App\Mifarma\Managers\RoleUserManager;
use App\Mifarma\Managers\UserManager;
use App\Mifarma\Managers\UserPhoneManager;
use App\Mifarma\Repositories\DetUserSocialProviderRepo;
use App\Mifarma\Repositories\DoctorRepo;
use App\Mifarma\Repositories\PatientRepo;
use App\Mifarma\Repositories\RoleRepo;
use App\Mifarma\Repositories\RoleUserRepo;
use App\Mifarma\Repositories\SocialProviderRepo;    
use App\Mifarma\Repositories\UserPhoneRepo;
use App\Mifarma\Repositories\UserRepo;
use App\Role;
use App\TutorPatient;
use App\User;
use App\AffiliatePatient;
use App\Doctor;
use App\Query;
use App\Patient;
use App\RoleUser;
use App\Activation;
use App\Json\Json;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use URL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Sentinel;
use Gnello\OpenFireRestAPI\Settings\SubscriptionType;
use Validator;
use stdClass;
use App\Mail\Restore;
//use Illuminate\Database\Seeder;
use App\Notifications\SignupActivate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(
        UserRepo $userRepo,
        DoctorRepo $doctorRepo,
        PatientRepo $patientRepo,
        RoleUserRepo $roleUserRepo,
        RoleRepo $roleRepo,
        SocialProviderRepo $socialProviderRepo,
        DetUserSocialProviderRepo $detUserSocialProviderRepo,
        UserPhoneRepo $userPhoneRepo
    ) {
        $this->userRepo = $userRepo;
        $this->doctorRepo = $doctorRepo;
        $this->patientRepo = $patientRepo;
        $this->roleUserRepo = $roleUserRepo;
        $this->roleRepo = $roleRepo;
        $this->socialProviderRepo = $socialProviderRepo;
        $this->detUserSocialProviderRepo = $detUserSocialProviderRepo;
        $this->userPhoneRepo = $userPhoneRepo;
    }
    public function index()
    {
        $usuarios = User::all();
        return response()->json(['data' => $usuarios], 200);
        // return $usuarios;
    }
    public function loginSocial(Request $request)
    {
        if ($request->get('email')) {
            $user_to_login = User::where(
                'email',
                $request->get('email')
            )->get();
            if (count($user_to_login) == 0) {
            } else {
                $userData = $this->userRepo->findUserEmail(
                    $request->get('email')
                );
                if ($userData[0]->gender == 1) {
                    $userData[0]['genero'] = 'Hombre';
                } else {
                    $userData[0]['genero'] = 'Mujer';
                }
                return response()->json([
                    'status' => false,
                    'message' =>
                        'El usuario ya esta registrado con este correo electrónico',
                    'code' => 201,
                    'data' => $userData[0],
                ]);
            }
        } else {
            return response()->json([
                'message' => 'Campo de correo electrónico requerido',
                'code' => 400,
            ]);
        }

        $userProvider = $this->socialProviderRepo->loginSocial(
            $request->get('provider'),
            $request->get('id_provider')
        );
        $respuesta = '';
        if ($userProvider) {
            if ($userProvider->users_id == null) {
                return response()->json([
                    'status' => true,
                    'code' => 200,
                    'message' => 'Registro Incompleto',
                    'data' => response()->json($userProvider),
                ]);
            } else {
                $userData = $this->userRepo->findUserUserSocialProvider(
                    $userProvider->social_provider_id,
                    $request->get('id_provider')
                );
                if ($request->get('token_mobile')) {
                    $user_to_update = User::findOrFail($user_to_login[0]->id);
                    $user_to_update->token_mobile = $request->get(
                        'token_mobile'
                    );
                    $user_to_update->save();
                }
                if ($request->get('plataforma') == null) {
                    return response()->json([
                        'status' => true,
                        'code' => 201,
                        'message' => 'Login Exitoso',
                        'data' => $userData,
                    ]);
                } else {
                    if ($request->get('plataforma') == 'iOS') {
                        return response()->json([
                            'status' => true,
                            'code' => 201,
                            'message' => 'Login Exitoso',
                            'data' => [
                                'headers' => [],
                                'original' => $userData,
                                'exception' => null,
                            ],
                        ]);
                    } elseif ($request->get('plataforma') == 'android') {
                        return response()->json([
                            'status' => true,
                            'code' => 201,
                            'message' => 'Login Exitoso',
                            'data' => [
                                'headers' => [],
                                'original' => $userData,
                                'exception' => null,
                            ],
                        ]);
                    } else {
                        return response()->json([
                            'status' => true,
                            'code' => 201,
                            'message' => 'Login Exitoso',
                            'data' => [
                                'headers' => [],
                                'original' => $userData,
                                'exception' => null,
                            ],
                        ]);
                    }
                }
            }
        } else {
            $provider = $this->socialProviderRepo->getIdProvider(
                $request->get('provider')
            );
            $request['social_provider_id'] = $provider->id;

            $detUserProvider = $this->detUserSocialProviderRepo->getModel();
            $manager = new DetUserSocialProviderManager(
                $detUserProvider,
                $request->all()
            );
            $manager->save();
            return response()->json([
                'estado' => true,
                'code' => 200,
                'message' => 'Registro Incompleto',
                'data' => response()->json($detUserProvider),
            ]);
        }
    }

    public function loginWizard(Request $request)
    {
        $auth = Sentinel::authenticate(
            $request->only(['email', 'password']),
            $request->get('remember-me', 0)
        );
        if ($auth) {
            activity($user->full_name)
                ->performedOn($user)
                ->causedBy($user)
                ->log('LoggedIn');
            return 'logueado';
        } else {
            return 'no logueado';
        }
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->get('email'))->get();

        if (count($user) == 0) {
            return response()->json([
                'message' => 'Correo electronico no encontrado',
                'code' => 200,
                'status' => false,
            ]);
        }

        if ($request->get('token_mobile')) {
            $user_to_update = User::findOrFail($user[0]->id);
//print_r($user_to_update->token_mobile);	
            $tokens = json_decode($user_to_update->token_mobile, true);
            if ($request->get('platform') == 'ios') {
                $tokensIos = $tokens['tokens']['ios'];
                $tokensIos = $request->get('token_mobile');
                //array_push($tokensIos, $request->get('token_mobile'));
                $tokens['tokens']['ios'] = $tokensIos;
            } elseif ($request->get('platform') == 'android') {
         //print_r('prueba:'.$tokens);
                $tokensAndroid = $tokens['tokens']['android'];
                $tokensAndroid = $request->get('token_mobile');
                //array_push($tokensAndroid, $request->get('token_mobile'));
                $tokens['tokens']['android'] = $tokensAndroid;
            } else {
                
                $tokensWeb = $tokens['tokens']['web'];
                $tokensWeb = $request->get('token_mobile');
                //array_push($tokensWeb, $request->get('token_mobile'));
                $tokens['tokens']['web'] = $tokensWeb;
            }

            $user_to_update->token_mobile = json_encode($tokens);
          //  $user_to_update->platform = $request->get('platform');
            $user_to_update->save();
        }
        if (Auth::attempt($request->only('email', 'password'))) {
            $userData = $this->userRepo->findUserEmail($request->get('email'));
            $user = Auth::user();
            $token = $user->createToken('MyApp')->accessToken;
            if (count($userData) != 0) {
                $estado = $userData[0]->estado;
                if ($userData[0]->gender == 1) {
                    $userData[0]['genero'] = 'Hombre';
                } else {
                    $userData[0]['genero'] = 'Mujer';
                }

                if ($userData[0]['tel'] == null) {
                    $userData[0]['tel'] = '';
                }

                if ($estado == 1) {
                    if ($request->get('fingerprint')) {
                        if (
                            $userData[0]->fingerprint ==
                            $request->get('fingerprint')
                        ) {
                            return response()->json([
                                'status' => true,
                                'message' => 'Login Exitoso',
                               'data' => [
                                'headers' => [],
                                'original' => $userData,
                                'exception' => null,
                            ],
                            ]);
                        } else {
                            return response()->json([
                                'status' => false,
                                'code' => 401,
                                'message' => 'La Huella digital es Incorrecta.',
                            ]);
                        }
                    }

                    // validamos que rol del usuario es
                    $roleUser = RoleUser::where(
                        'user_id',
                        $userData[0]->id
                    )->get();
                    if ($roleUser[0]->role_id == 2) {
                        $doctor = Doctor::where(
                            'users_id',
                            $userData[0]->id
                        )->get();
                        $doctorToUpdate = Doctor::findOrFail($doctor[0]->id);
                        $doctorToUpdate->status = 1;
                        $doctorToUpdate->save();
                    }

                    $activation = Activation::where(
                        'user_id',
                        $userData[0]->id
                    )->get();

                    if (count($activation) == 0) {
                        return response()->json([
                            'message' => 'Usuario no encontrado',
                            'status' => false,
                            'code' => 400,
                        ]);
                    } else {
                        if ($activation[0]->completed == 0) {
                            return response()->json([
                                'status' => true,
                                'message' => 'Login Exitoso',
                                'token' => $token,
                                'data' => [
                                'headers' => [],
                                'original' => $userData,
                                'exception' => null,
                            ],
                            ]);
                        } else {
                            return response()->json([
                                'status' => true,
                                'message' => 'Login Exitoso',
                                'token' => $token,
                                'data' => [
                                'headers' => [],
                                'original' => $userData,
                                'exception' => null,
                            ],
                            ]);
                        }
                    }
                } elseif ($estado == 0) {
                    return response()->json([
                        'status' => false,
                        'message' => 'El Usuario esta eliminado.',
                        'data' => 'El Usuario esta eliminado.',
                    ]);
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'El Usuario esta inactivo.',
                        'data' => 'El Usuario esta inactivo.',
                    ]);
                }
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Email o Password Incorrecto.',
                    'email' => $request->get('email'),
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Email o Password Incorrecto.',
            ]);
        }
    }

    public function authWithFingerprint(Request $request)
    {
        $user_id = $request->get('user_id');
        $fingerprint = $request->get('fingerprint');

        $user = User::findOrFail($user_id);
        if ($user->fingerprint == '') {
            return response()->json([
                'estado' => false,
                'status' => 404,
                'message' =>
                    'El usuario no tiene registrado su huella digital.',
            ]);
        } else {
            if ($user->fingerprint == $fingerprint) {
                return response()->json([
                    'estado' => true,
                    'status' => 200,
                    'message' => 'Autenticación exitosa.',
                ]);
            } else {
                return response()->json([
                    'estado' => false,
                    'status' => 401,
                    'message' => 'Huella digital incorrecta.',
                ]);
            }
        }
    }

    public function validarCredenciales(Request $request)
    {
        $auth = Auth::attempt($request->only('email', 'password'));
        if ($auth) {
            return response()->json([
                'estado' => true,
                'message' => 'Credenciales Correctas',
                'code' => 200,
            ]);
        } else {
            return response()->json([
                'estado' => false,
                'message' => 'Credenciales Incorrectas',
                'code' => 400,
            ]);
        }
    }

    public function getUserEmail(Request $request)
    {
        $userData = $this->userRepo->findUserEmail($request->get('email'));

        return $userData;
    }

    public function getUserId(Request $request)
    {
        $userData = $this->userRepo->getUserId($request->get('user_id'));
        if (count($userData) == 0) {
            return response()->json([
                'message' => 'No existe el usuario',
                'code' => 404,
                'status' => false,
            ]);
        }
        if (
            $userData[0]->birth_date == null ||
            $userData[0]->birth_date == '0000-00-00'
        ) {
            $userData[0]->fecha_nacimiento = '';
        } else {
            $data_date = explode('-', $userData[0]->birth_date);
            $month = JSON::MONTH_TO_ABR[$data_date[1]];
            $userData[0]->fecha_nacimiento =
                $data_date[2] . ' ' . $month . ' ' . $data_date[0];
        }
        if ($userData[0]->gender == '1') {
            $userData[0]->genero = 'Hombre';
        } elseif ($userData[0]->gender == '2') {
            $userData[0]->genero = 'Mujer';
        }

        $userPhones = $this->userPhoneRepo->findPhonesUser(
            $request->get('user_id')
        );
        // return response()->json($userPhones);
        $userData[0]->phones = $userPhones;

        $date = $userData[0]->birth_date;
        $userData[0]->years_old = $this->getAge($date);

        if ($userData[0]->weight == null) {
            $userData[0]->weight = 0;
        }

        if ($userData[0]->size == null) {
            $userData[0]->size = 0;
        }

        $activation = Activation::where(
            'user_id',
            $request->get('user_id')
        )->get();

        if ($activation[0]->completed == 0) {
            return response()->json([
                'message' => 'Cuenta no activada',
                'code' => 200,
                'status' => false,
                'data' => $userData,
            ]);
        }

        return response()->json([
            'code' => 201,
            'status' => true,
            'message' => 'Usuario encontrado',
            'data' => $userData,
        ]);
    }

    public function getAge($date)
    {
        return intval(date('Y', time() - strtotime($date))) - 1970;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            //'confirm_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $dni = $request->get('numdoc');
        $essalud = new \jossmp\essalud\asegurado();

        $person = $essalud->consulta($dni);

        if ($person->success == false) {
            return response()->json([
                'message' => 'DNI no encontrado',
                'code' => 404,
                'estado' => false,
            ]);
        }
    //print_r($person->result);
        if ($person->result->dni != ' ') {
            // comparando la fecha de emision
            // estableciendo los parametros a almacenar
            $name = $person->result->nombre;
            $last_name =
                $person->result->paterno  .
                ' ' .
                $person->result->materno;
            $birth_date =
                explode('/', $person->result->nacimiento)[2] .
                '/' .
                explode('/', $person->result->nacimiento)[1] .
                '/' .
                explode('/', $person->result->nacimiento)[0];
            if ($person->result->sexo == 'Masculino') {
                $genero = 1;
            } else {
                $genero = 2;
            }
        } else {
            return response()->json([
                'message' => 'DNI no encontrado',
                'code' => 404,
                'estado' => false,
            ]);
        }

        $user_to_create = User::where('email', $request->get('email'))->get();

        if (count($user_to_create) > 0) {
            return response()->json([
                'message' => 'El usuario con este Correo electronico ya existe',
                'code' => 206,
                'estado' => false,
            ]);
        }

        //user sinch
        $user_sinch = strtolower(explode(' ', $name)[0]) . time();

        // validar ubicacion
        $image_bd = 'https://telemedicina.today/images/user/default/default.jpg';
        if ($request->get('image')) {
            $imageBase64 = $request->get('image');
            $image = base64_decode($imageBase64);
            $image_path = $request->get('name') . time() . '.jpg';
            \Storage::disk('imagesPaciente')->put($image_path, $image);
            $image_bd =
                'https://telemedicina.today/images/user/paciente/' . $image_path;
        }

        $fingerprint = '';
        if ($request->get('fingerprint')) {
            $fingerprint = $request->get('fingerprint');
        }

        $pacienteUser = User::create([
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'fingerprint' => $fingerprint,
            'last_login' => $request->get('last_login'),
            'name' => $name,
            'last_name' => $last_name,
            'img' => $image_bd,
            'gender' => $genero,
            'state' => $request->get('state'),
            'address' => 'direccion desconocida',
            'postal' => '07001',
            'numdoc' => $request->get('numdoc'),
            'type_document_id' => $request->get('type_document_id'),
            'ubigeo_id' => '1404',
            'user_sinch' => $user_sinch,
            'password_sinch' => $user_sinch,
            'tel' => $request->get('tel'),
            'birth_date' => $birth_date,
            'country' => 'Lima - Peru',
            'estado' => 1,
            'usuario_created_id' => $request->get('usuario_created_id'),
            'usuario_upd_id' => $request->get('usuario_upd_id'),
            'terminal' => $request->get('terminal'),
            'terminal_upd' => $request->get('terminal_upd'),
        ]);

        $request['users_id'] = $this->userRepo->findUserIdEmail(
            $request->get('email')
        )->id;
        $request['user_id'] = $this->userRepo->findUserIdEmail(
            $request->get('email')
        )->id;

        $role = $this->roleRepo->find('3');

        $pacienteUser->roles()->attach($role);

        //$pacienteUser->roles()->attach($role);

        $patient = $this->patientRepo->getModel();
        $manager = new PatientManager($patient, $request->all());
        $manager->save();

        if (
            $request->get('provider') != null &&
            $request->get('id_provider') != null
        ) {
            $userProvider = $this->socialProviderRepo->loginSocial(
                $request->get('provider'),
                $request->get('id_provider')
            );
            if ($userProvider) {
            } else {
                return response()->json([
                    'estado' => false,
                    'code' => 400,
                    'message' =>
                        'El ID_PROVIDER no coincide con el PROVIDER, ingresar otro ID_PROVIDER',
                    'data' => [],
                ]);
            }
            $request['social_provider_id'] = $userProvider->social_provider_id;

            $detUserSocialProvider = $this->detUserSocialProviderRepo->find(
                $userProvider->id
            );
            $managerUserSocialProvider = new DetUserSocialProviderManager(
                $detUserSocialProvider,
                $request->all()
            );
            $managerUserSocialProvider->save();

            $userData = $this->userRepo->findUserUserSocialProvider(
                $userProvider->social_provider_id,
                $request->get('id_provider')
            );
            return response()->json([
                'estado' => true,
                'code' => 201,
                'message' => 'Login Exitoso',
                'data' => $userData,
            ]);
        }

        $user = \DB::table('users')
            ->where('users.email', $request->get('email'))
            ->first();

        $activation = new Activation([
            'user_id' => $user->id,
            'code' => str_random(60),
            'completed' => 0,
        ]);
        $activation->save();

       // if ($request->get('token_mobile')) {
         //   $user_to_update = User::findOrFail($user[0]->id);
            //$user_to_update->token_mobile = $request->get('token_mobile');
           // $user_to_update->save();
        //} else
        //{
            $user_to_update = User::findOrFail($user->id);
            $user_to_update->token_mobile = '{"tokens":{"ios":"","android":"","web":""}}';
            $user_to_update->save();
        //}

        if ($activation) {
            $data = [
                'user_name' => $user->name . ' ' . $user->last_name,
                'user_email' => $user->email,
                'user_password' => $request->get('password'),
                'activationUrl' => URL::route(
                    'activate.api',
                    $activation->code
                ),
            ];
            // $data->user_name =$user->name .' '. $user->last_name;
            //  $data->user_email = $user->email;
            //  $data->user_password = $request->get('password');
            //  $data->activationUrl = URL::route('activate.api', $activation->code);
           // Mail::to($user->email)->send(new Restore($data));
        }
        //$activation->notify(new SignupActivate($activation));
        /*$activation = Activation::where('user_id', $user[0]->id)->get();
      $activation_update = Activation::findOrFail($activation[0]->id);
      $activation_update->completed = 0;
      $activation_update->save();*/

        return response()->json([
            'estado' => true,
            'message' => 'Registro exitoso',
            'code' => 200,
            'data' => $user,
        ]);
    }

    public function activateAccount($token)
    {
        /*$user = \DB::table('users')
        ->where('users.email', $request->get('email'))
        ->get();*/

        $user = Activation::where('code', $token)->get();

        if (count($user) == 0) {
            return response()->json([
                'message' => 'Usuario no encontrado',
                'code' => 404,
                'status' => false,
            ]);
        }

        $activation = User::find($user[0]->user_id);

        if (empty($activation)) {
            return response()->json([
                'message' => 'Usuario no encontrado',
                'code' => 404,
                'status' => false,
            ]);
        }

        $activation_update = Activation::findOrFail($user[0]->id);

        $activation_update->completed = 1;

        if ($activation_update->save()) {
            return Redirect::route('activate.app')->with(
                'success',
                'Cuenta activada correctamente'
            );
            //return response()->json(['status' => true, 'message' => "Cuenta activada", 'code' => 200]);
        } else {
            return redirect('register')->with(
                'error',
                'Error en activar cuenta'
            );
            //return response()->json(['status' => false, 'message' => "Cuenta no activada", 'code' => 200]);
        }
    }

    public function getDoctors(Request $request)
    {
        $speciality_id = $request->input('speciality_id');

        $userDoctor = $this->userRepo->getDoctors($speciality_id);

        foreach ($userDoctor as $key => $doctor) {
            $doctor_id = $doctor->doctor_id;
            $queries = Query::where('doctor_id', '=', $doctor_id)->get();
            $frequency = count($queries);
            // return response()->json($frequency);
            $doctor->frequency = $frequency;
            $doctor->experience_year = 6;
        }
        usort($userDoctor, function ($a, $b) {
            return $a->frequency > $b->frequency ? -1 : 1;
        });

        return response()->json([
            'code' => 200,
            'estado' => true,
            'message' => 'Data Exitoso',
            'data' => $userDoctor,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos = $request->all();
        $usuario = User::create($campos);
        return response()->json(['data' => $usuario], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::findOrFail($id);
        return response()->json(['data' => $usuario], 200);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function editImage(Request $request)
    {
        // get user to update image
        $user = User::findOrFail($request->get('user_id'));

        // role id
        $role_id = $request->get('role_id');

        // pre imagen
        //$preImage = $request->get('preImage');

        // image and image path
        $image = $request->file('img');
        $image_path = $user->id . '.jpg';

        if ($role_id == '1') {
            // Eliminar imagen existente
            // \Storage::disk('imagesAdmin')->delete($preImage);

            // Actualizar imagen
            \Storage::disk('imagesAdmin')->put($image_path, \File::get($image));

            // url image
            $image_url =
                'https://telemedicina.today/images/user/admin/' . $image_path;

            // actualizamos en base de datos
            $user->img = $image_url;
            $user->save();

            // retorno json
            return response()->json([
                'estado' => true,
                'code' => '200',
                'message' => 'Actualizacion Exitosa',
                'data' => $image_url,
            ]);
        } elseif ($role_id == '2') {
            // Eliminar imagen existente
            // \Storage::disk('imagesDoctor')->delete($preImage);

            // Actualizar imagen
            \Storage::disk('imagesDoctor')->put(
                $image_path,
                \File::get($image)
            );

            // url image
            $image_url =
                'https://telemedicina.today/images/user/doctor/' . $image_path;

            // actualizamos en base de datos
            $user->img = $image_url;
            $user->save();

            // retorno json
            return response()->json([
                'estado' => true,
                'code' => '200',
                'message' => 'Actualizacion Exitosa',
                'data' => $image_url,
            ]);
        } elseif ($role_id == '3') {
            // Eliminar imagen existente
            // \Storage::disk('imagesPaciente')->delete($preImage);

            // Actualizar imagen
            \Storage::disk('imagesPaciente')->put(
                $image_path,
                \File::get($image)
            );

            // url image
            $image_url =
                'https://telemedicina.today/images/user/paciente/' . $image_path;

            // actualizamos en base de datos
            $user->img = $image_url;
            $user->save();

            // retorno json
            return response()->json([
                'estado' => true,
                'code' => '200',
                'message' => 'Actualizacion Exitosa',
                'data' => $image_url,
            ]);
        } elseif ($role_id == '4') {
            // Eliminar imagen existente
            // \Storage::disk('imagesSecretaria')->delete($preImage);

            // Actualizar imagen
            \Storage::disk('imagesSecretaria')->put(
                $image_path,
                \File::get($image)
            );

            // url image
            $image_url =
                'https://telemedicina.today/images/user/secretaria/' . $image_path;

            // actualizamos en base de datos
            $user->img = $image_url;
            $user->save();

            // retorno json
            return response()->json([
                'estado' => true,
                'code' => '200',
                'message' => 'Actualizacion Exitosa',
                'data' => $image_url,
            ]);
        } else {
            // Eliminar imagen existente
            // \Storage::disk('imagesLaboratorio')->delete($preImage);

            // Actualizar imagen
            \Storage::disk('imagesLaboratorio')->put(
                $image_path,
                \File::get($image)
            );

            // url image
            $image_url =
                'https://telemedicina.today/images/user/laboratorio/' . $image_path;

            // actualizamos en base de datos
            $user->img = $image_url;
            $user->save();

            // retorno json
            return response()->json([
                'estado' => true,
                'code' => '200',
                'message' => 'Actualizacion Exitosa',
                'data' => $image_url,
            ]);
        }
    }

    public function editImageBase64(Request $request)
    {
        $user = User::findOrFail($request->get('id'));
        $role = \DB::table('role_users')
            ->where('user_id', $user->id)
            ->get();

        $role_id = $role[0]->role_id;

        $imageBase64 = $request->get('img');
        $image = base64_decode($imageBase64);
        $image_path = $user->name . time() . '.jpg';

        if ($role_id == '1') {
            $img_arr = explode(
                'https://telemedicina.today/images/user/admin/',
                $user->img
            );
            if (count($img_arr) == 2) {
                $preImage = $img_arr[1];
            } else {
                $preImage = '';
            }

            // Eliminar imagen existente
            \Storage::disk('imagesAdmin')->delete($preImage);

            // Actualizar imagen
            \Storage::disk('imagesAdmin')->put($image_path, $image);

            // url image
            $image_url =
                'https://telemedicina.today/images/user/admin/' . $image_path;

            // actualizamos en base de datos
            $user->img = $image_url;
            $user->save();

            // retorno json
            return response()->json([
                'estado' => true,
                'code' => '200',
                'message' => 'Actualizacion Exitosa',
                'data' => $image_url,
            ]);
        } elseif ($role_id == '2') {
            $img_arr = explode(
                'https://telemedicina.today/images/user/doctor/',
                $user->img
            );
            if (count($img_arr) == 2) {
                $preImage = $img_arr[1];
            } else {
                $preImage = '';
            }

            // Eliminar imagen existente
            \Storage::disk('imagesDoctor')->delete($preImage);

            // Actualizar imagen
            \Storage::disk('imagesDoctor')->put($image_path, $image);

            // url image
            $image_url =
                'https://telemedicina.today/images/user/doctor/' . $image_path;

            // actualizamos en base de datos
            $user->img = $image_url;
            $user->save();

            // retorno json
            return response()->json([
                'estado' => true,
                'code' => '200',
                'message' => 'Actualizacion Exitosa',
                'data' => $image_url,
            ]);
        } elseif ($role_id == '3') {
            $img_arr = explode(
                'https://telemedicina.today/images/user/paciente/',
                $user->img
            );
            if (count($img_arr) == 2) {
                $preImage = $img_arr[1];
            } else {
                $preImage = '';
            }
            // Eliminar imagen existente
            \Storage::disk('imagesPaciente')->delete($preImage);

            // Actualizar imagen
            \Storage::disk('imagesPaciente')->put($image_path, $image);

            // url image
            $image_url =
                'https://telemedicina.today/images/user/paciente/' . $image_path;

            // actualizamos en base de datos
            $user->img = $image_url;
            $user->save();

            // retorno json
            return response()->json([
                'estado' => true,
                'code' => '200',
                'message' => 'Actualizacion Exitosa',
                'data' => $image_url,
            ]);
        } elseif ($role_id == '4') {
            $img_arr = explode(
                'https://telemedicina.today/images/user/secretaria/',
                $user->img
            );
            if (count($img_arr) == 2) {
                $preImage = $img_arr[1];
            } else {
                $preImage = '';
            }

            // Eliminar imagen existente
            \Storage::disk('imagesSecretaria')->delete($preImage);

            // Actualizar imagen
            \Storage::disk('imagesSecretaria')->put($image_path, $image);

            // url image
            $image_url =
                'https://telemedicina.today/images/user/secretaria/' . $image_path;

            // actualizamos en base de datos
            $user->img = $image_url;
            $user->save();

            // retorno json
            return response()->json([
                'estado' => true,
                'code' => '200',
                'message' => 'Actualizacion Exitosa',
                'data' => $image_url,
            ]);
        } else {
            $img_arr = explode(
                'https://telemedicina.today/images/user/laboratorio/',
                $user->img
            );
            if (count($img_arr) == 2) {
                $preImage = $img_arr[1];
            } else {
                $preImage = '';
            }
            // Eliminar imagen existente
            \Storage::disk('imagesLaboratorio')->delete($preImage);

            // Actualizar imagen
            \Storage::disk('imagesLaboratorio')->put($image_path, $image);

            // url image
            $image_url =
                'https://telemedicina.today/images/user/laboratorio/' . $image_path;

            // actualizamos en base de datos
            $user->img = $image_url;
            $user->save();

            // retorno json
            return response()->json([
                'estado' => true,
                'code' => '200',
                'message' => 'Actualizacion Exitosa',
                'data' => $image_url,
            ]);
        }
    }

    public function edit(Request $request)
    {
        // role y validacion
        $role_id = $request->get('role_id');
        if ($role_id < 1 && $role_id > 5) {
            return response()->json([
                'message' => 'Rol del usuario invalido',
                'status' => false,
                'code' => 200,
            ]);
        }
        // usuario y validacion
        $user_id = $request->get('user_id');
        $user = User::where('id', $user_id)->get();
        if (count($user) == 0) {
            return response()->json([
                'message' => 'Usuario no encontrado',
                'status' => false,
                'code' => 404,
            ]);
        }

        // Actualizar Usuario
        $user_to_update = User::findOrFail($user_id);
        $user_to_update->name = $request->get('name');
        $user_to_update->last_name = $request->get('last_name');
        $user_to_update->address = $request->get('address');
        $user_to_update->tel = $request->get('tel');
        $user_to_update->type_document_id = $request->get('type_document_id');
        $user_to_update->numdoc = $request->get('numdoc');

        $date_birth = '';
        if ($request->get('fecha_nacimiento')) {
            $fecha = $request->get('fecha_nacimiento');
            $fecha_arr = explode(' ', $fecha);
            $fecha_format =
                $fecha_arr[2] .
                '-' .
                Json::ABR_TO_MONTH[$fecha_arr[1]] .
                '-' .
                $fecha_arr[0];
            $date_birth = $fecha_format;
        } else {
            if ($request->get('birth_date')) {
                $date_birth = $request->get('birth_date');
            }
        }
        $user_to_update->birth_date = $date_birth;

        $gender = 1;
        if ($request->get('genero')) {
            if ($request->get('genero') == 'Mujer') {
                $gender = 2;
            }
        }
        $user_to_update->gender = $gender;

        // Actualizar Rol
        if ($role_id == '3') {
            $user_to_update->address = $request->get('address');
            $user_to_update->save();

            $patient = Patient::where('users_id', $user_id)->get();
            $patient_to_update = Patient::findOrFail($patient[0]->id);
            $patient_to_update->weight = $request->get('weight');
            $patient_to_update->size = $request->get('size');

            $patient_to_update->save();
        } elseif ($role_id == '2') {
            $user_to_update->save();

            $doctor = Doctor::where('users_id', $user_id)->get();
            $doctor_to_update = Doctor::findOrFail($doctor[0]->id);

            $doctor_to_update->id_cmp = $request->get('id_cmp');
            $doctor_to_update->specialty = $request->get('specialty');

            $doctor_to_update->save();
        }

        return response()->json([
            'message' => 'Usuario actualizado',
            'status' => true,
            'code' => 201,
        ]);
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

    public function updatePassword(Request $request)
    {
        $user_id = $request->get('user_id');
        $current_password = $request->get('current_password');
        $new_password = $request->get('new_password');
        // $new_password_confirm = $request->get('new_password_confirm');

        if ($user_id == '' || $current_password == '' || $new_password == '') {
            return response()->json([
                'estado' => false,
                'code' => 200,
                'message' => 'Error, los campos deben tener un valor',
                'data' => [],
            ]);
        }

        $user = User::findOrFail($user_id);

        if (\Hash::check($current_password, $user->password)) {
            $user->password = \Hash::make($new_password);
            $user->save();
            return response()->json([
                'estado' => true,
                'code' => 200,
                'message' => 'Password actualizado',
                'data' => [],
            ]);
        } else {
            return response()->json([
                'estado' => false,
                'code' => 404,
                'message' => 'Error, El password actual es incorrecto',
                'data' => [],
            ]);
        }
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

    public function registrarUserXmpp(Request $request)
    {
        $user_id = $request->get('user_id');

        if ($user_id == '' || $user_id == null) {
            return response()->json([
                'estado' => false,
                'code' => 404,
                'message' => 'Error, ID user requerido',
                'data' => [],
            ]);
        } else {
            $patient_user = \DB::table('users')
                ->where('id', $user_id)
                ->get();

            $authenticationToken = new \Gnello\OpenFireRestAPI\AuthenticationToken(
                'd84G1zOiioruNwyk'
            );
            $api = new \Gnello\OpenFireRestAPI\API(
                'test.alo.doctor',
                9090,
                $authenticationToken
            );

            $api->Settings()->setServerName('localhost');
            $api->Settings()->setDebug(true);

            $password = strrev(
                $patient_user[0]->numdoc . $patient_user[0]->email . '#'
            );

            $result = $api
                ->Users()
                ->createUser(
                    $patient_user[0]->user_sinch,
                    $password,
                    $patient_user[0]->name . ' ' . $patient_user[0]->last_name,
                    $patient_user[0]->email
                );

            if ($result['response']) {
                return response()->json([
                    'estado' => true,
                    'code' => 201,
                    'message' => 'Nuevo usuario creado en XMPP',
                ]);
            } else {
                return response()->json([
                    'estado' => true,
                    'code' => 200,
                    'message' => 'Usuario existente',
                ]);
            }
        }
    }

    public function pruebaCallUser()
    {
        $authenticationToken = new \Gnello\OpenFireRestAPI\AuthenticationToken(
            'd84G1zOiioruNwyk'
        );
        $api = new \Gnello\OpenFireRestAPI\API(
            'test.alo.doctor',
            9090,
            $authenticationToken
        );

        $api->Settings()->setServerName('localhost');
        $api->Settings()->setDebug(true);

        $result = $api->Users()->retrieveUser('43434343');

        if ($result['response']) {
            return response()->json([
                'estado' => true,
                'message' => 'Petición Exitosa',
                'data' => $result['output'],
            ]);
        } else {
            return 'Error!';
        }
    }

    public function loginSecretary(Request $request)
    {
        $auth = Sentinel::authenticate($request->only(['email', 'password']));
        if ($auth) {
            $auxiliar = RoleUser::where('user_id', $auth->id)
                ->where('role_id', 4)
                ->count();

            if ($auxiliar > 0) {
                return response()->json([
                    'estado' => true,
                    'message' => 'Credenciales Correctas',
                    'code' => 200,
                    'data' => $auth,
                ]);
            } else {
                return response()->json([
                    'estado' => false,
                    'message' => 'No tiene Rol',
                    'code' => 400,
                ]);
            }
        } else {
            return response()->json([
                'estado' => false,
                'message' => 'Credenciales Incorrectas',
                'code' => 400,
            ]);
        }
    }

    /**
     *
     * Obtener Datos User Sinch
     *
     * @param    $userSinch
     * @return      json
     *
     */
    public function vex_soluciones_get_user_twilio($userSinch)
    {
        $user = \DB::table('users')
            ->where('user_sinch', $userSinch)
            ->get();

        if (count($user) == 0) {
            return response()->json([
                'message' => 'User not founded',
                'status' => 404,
            ]);
        }

        $password = strrev($user[0]->numdoc . $user[0]->email . '#');

        $genero = 'Hombre';
        if ($user[0]->gender == 2) {
            $genero = 'Mujer';
        }

        $date = new \DateTime($user[0]->birth_date);
        $now = new \DateTime();
        $interval = $now->diff($date);

        $result = [
            'user_id' => $user[0]->id,
            'name' => $user[0]->name,
            'last_name' => $user[0]->last_name,
            'img_profile' => $user[0]->img,
            //"password_sinch"=> $user[0]->password_sinch,
            'roomname' => strtolower($user[0]->user_sinch),
            //"password_openfire"=> $password,
            'genero' => $genero,
            'city' => $user[0]->country,
            'years_old' => $interval->y,
        ];

        $role = RoleUser::where('user_id', $user[0]->id)->get();
        if ($role[0]->role_id == 2) {
            $doctor = Doctor::where('users_id', $user[0]->id)->get();
            $queries = Query::where('doctor_id', $doctor[0]->id)->get();
            $result['doctor_specialty'] = $doctor[0]->specialty;
            $result['doctor_qualification'] = $doctor[0]->qualification;
            $result['type_user'] = 'doctor';
            $frequency = 0;
            $price = 5;
            if (count($queries) != 0) {
                $frequency = count($queries);
            }
            $result['doctor_frequency'] = $frequency;
            $result['doctor_price'] = $price;
        } elseif ($role[0]->role_id == 3) {
            $result['type_user'] = 'patient';
            $paciente = Patient::where('users_id', $user[0]->id)->get();

            $result['card_to_use'] = $paciente[0]->card_to_use;
            if ($paciente[0]->card_id == null) {
                $result['card_id'] = '';
            } else {
                $result['card_id'] = $paciente[0]->card_id;
            }

            if ($paciente[0]->temp_symptom == null) {
                $additionals = [
                    'symptoms' => 'ultimo sintoma no encontrado',
                ];
                $result['additionals'] = $additionals;
            } else {
                $additionals = [
                    'symptoms' => $paciente[0]->temp_symptom,
                ];
                $result['additionals'] = $additionals;
            }
        }
        return response()->json([
            'message' => 'User founded',
            'status' => 200,
            'data' => $result,
        ]);
    }

    public function getUsersAccount()
    {
        $users = User::all();
        $doctor = [];
        $patient = [];
        foreach ($users as $key => $user) {
            $role = RoleUser::where('user_id', $user->id)->get();
            if ($role[0]->role_id == 2) {
                $data = [
                    'name' => $user->name . ' ' . $user->last_name,
                    'user_sinch' => $user->user_sinch,
                    'password_sinch' => $user->password_sinch,
                    'user_openfire' => strtolower(
                        $user->user_sinch . '@localhost'
                    ),
                    'password_openfire' => strrev(
                        $user->numdoc . $user->email . '#'
                    ),
                ];
                array_push($doctor, $data);
            } elseif ($role[0]->role_id == 3) {
                $data = [
                    'name' => $user->name . ' ' . $user->last_name,
                    'user_sinch' => $user->user_sinch,
                    'password_sinch' => $user->password_sinch,
                    'user_openfire' => strtolower(
                        $user->user_sinch . '@localhost'
                    ),
                    'password_openfire' => strrev(
                        $user->numdoc . $user->email . '#'
                    ),
                ];
                array_push($patient, $data);
            }
        }
        return response()->json(['doctor' => $doctor, 'paciente' => $patient]);
    }
    public function getUserPlan($id)
    {
        $patient = Patient::where('users_id', $id)->get();
        if (count($patient) == 0) {
            return response()->json([
                'message' => 'Usuario no encontrado',
                'code' => 404,
                'status' => false,
            ]);
        }
        $affiliated = AffiliatePatient::where('affiliate_id')->get();

        if (count($affiliated) == 0) {
            $data = [
                'icon' => 'https://telemedicina.today/images/icon/price_icon.png',
                'title' => 'PLAN PARTICULAR',
                'description' =>
                    'Es un plan enfocado a individuales o familias.',
                'price' => 'S/5.00',
                'subtitle' => 'por consulta',
            ];
            return response()->json([
                'message' => 'Usuario no afiliado',
                'code' => 200,
                'status' => true,
                'isAffiliated' => false,
                'data' => $data,
            ]);
        } else {
            $data = [
                'icon' => 'https://telemedicina.today/images/icon/price_icon.png',
                'title' => 'PLAN EMPRESARIAL',
                'description' =>
                    'Es un plan enfocado a empresas. Protege a tu personal.',
                'price' => '',
                'subtitle' => '',
            ];
            return response()->json([
                'message' => 'Usuario afiliado',
                'code' => 200,
                'status' => true,
                'isAffiliated' => true,
                'data' => $data,
            ]);
        }
    }

    public function sendactivateAccount(Request $request)
    {
        if ($request->get('email')) {
            $user = User::where('email', $request->get('email'))->first();
            if ($user) {
                $activation = Activation::where('user_id', $user->id)->first();
                if ($activation) {
                    if ($activation->completed == 0) {
                        $data = [
                            'user_name' => $user->name . ' ' . $user->last_name,
                            'user_email' => $user->email,
                            'user_password' => '**********',
                            'activationUrl' => URL::route(
                                'activate.api',
                                $activation->code
                            ),
                        ];
                        // $data->user_name = $user->name .' '. $user->last_name;
                        // $data->user_email = $user->email;
                        // $data->user_password = "**********";
                        // $data->activationUrl = URL::route('activate.api', $activation->code);
                        Mail::to($user->email)->send(new Restore($data));
                        return response()->json([
                            'message' =>
                                'Se envio correo para confirmar su cuenta',
                            'code' => 202,
                            'status' => true,
                        ]);
                    } else {
                        return response()->json([
                            'message' => 'Email ya esta confirmado',
                            'code' => 202,
                            'status' => true,
                        ]);
                    }
                } else {
                    return response()->json([
                        'message' => 'No existe token de activacion',
                        'code' => 202,
                        'status' => false,
                    ]);
                }
            } else {
                return response()->json([
                    'message' => 'No existe el correo',
                    'code' => 404,
                    'status' => false,
                ]);
            }
        }
    }

    public function getActivationUser($id)
    {
        $user = User::find($id);
        if ($user) {
            $activation = Activation::where('user_id', $id)->first();
            if ($activation) {
                if ($activation->completed == 0) {
                    return response()->json([
                        'message' => 'Email sin confirmar',
                        'code' => 202,
                        'status' => false,
                    ]);
                } else {
                    return response()->json([
                        'message' => 'Email ya esta confirmado',
                        'code' => 202,
                        'status' => true,
                    ]);
                }
            }
        } else {
            return response()->json([
                'message' => 'Usuario no encontrado',
                'code' => 404,
                'status' => false,
            ]);
        }
    }

    public function vexSolucionesUpdateMobileToken(Request $request)
    {
        $user = User::find($request->get('userId'));

        if ($user) {
            $tokens = json_decode($user->token_mobile, true);

            if ($request->get('platform') == 'android') {
                $tokens['tokens']['android'][0] = $request->get('mobileToken');
            } elseif ($request->get('platform') == 'ios') {
                $tokens['tokens']['ios'][0] = $request->get('mobileToken');
            } else {
                $tokens['tokens']['web'][0] = $request->get('mobileToken');
            }

            $user->token_mobile = json_encode($tokens);
            $user->save();

            return response()->json([
                'message' => 'Actualizacion exitosa',
                'code' => 201,
                'state' => true,
            ]);
        } else {
            return response()->json([
                'message' => 'Usuario no encontrado',
                'code' => 404,
                'state' => false,
            ]);
        }
    }

    public function vexSolucionesLogout(Request $request)
    {
        $user = User::where('id', $request->get('user_id'))->get();

        if (count($user) == 0) {
            return response()->json([
                'message' => 'Usuario no encontrado',
                'code' => 404,
                'status' => false,
            ]);
        }

        $tokens = json_decode($user[0]->token_mobile, true);

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
        } elseif ($request->get('platform') == 'android') {
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

        $user = User::findOrFail($request->get('user_id'));
        $user->token_mobile = json_encode($tokens);
        $user->save();

        return response()->json([
            'message' => 'Cerrar Sesión',
            'code' => 201,
            'status' => true,
        ]);
    }

    public function registerPaciente(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $user_to_create = User::where('email', $request->get('email'))->get();

        if (count($user_to_create) > 0) {
            return response()->json([
                'message' => 'El usuario con este Correo electronico ya existe',
                'code' => 206,
                'estado' => false,
            ]);
        }

        $name = $request->get('name');
        $last_name = $request->get('last_name');
        $birth_date = $request->get('birth_date');
        $genero = $request->get('genero');
        //user sinch
        $user_sinch = strtolower(explode(' ', $name)[0]) . time();

        // validar ubicacion
        $image_bd = 'https://telemedicina.today/images/user/default/default.jpg';
        if ($request->get('image')) {
            $imageBase64 = $request->get('image');
            $image = base64_decode($imageBase64);
            $image_path = $request->get('name') . time() . '.jpg';
            \Storage::disk('imagesPaciente')->put($image_path, $image);
            $image_bd =
                'https://telemedicina.today/images/user/paciente/' . $image_path;
        }

        $fingerprint = '';
        if ($request->get('fingerprint')) {
            $fingerprint = $request->get('fingerprint');
        }

        $pacienteUser = User::create([
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'fingerprint' => $fingerprint,
            'last_login' => $request->get('last_login'),
            'name' => $name,
            'last_name' => $last_name,
            'img' => $image_bd,
            'gender' => $genero,
            'state' => $request->get('state'),
            'address' => $request->get('address'),
            'address_extra_info' => $request->get('address_extra_info'),
            'ubigeo_id' => $request->get('ubigeo_id'),
            'postal' => $request->get('postal'),
            'numdoc' => $request->get('numdoc'),
            'type_document_id' => $request->get('type_document_id'),
            'user_sinch' => $user_sinch,
            'password_sinch' => $user_sinch,
            'tel' => $request->get('tel'),
            'birth_date' => $birth_date,
            'country' => $request->get('country'),
            'estado' => 1,
            'usuario_created_id' => $request->get('usuario_created_id'),
            'usuario_upd_id' => $request->get('usuario_upd_id'),
            'terminal' => $request->get('terminal'),
            'terminal_upd' => $request->get('terminal_upd'),
        ]);

        $request['users_id'] = $pacienteUser->id;

        $role = $this->roleRepo->find('3');

        $pacienteUser->roles()->attach($role);

        $patient = Patient::create([
            'users_id' => $pacienteUser->id,
            'ocupation' => $request->get('ocupation'),
            'degree_instruction_id' => $request->get('degree_instruction_id'),
            'civil_status_id' => $request->get('civil_status_id'),
            'work_center' => $request->get('work_center'),
            'bloodType' => $request->get('bloodType'),
        ]);

        if (!empty($request->get('numdoc_tutor'))) {
            $tutor_patient = TutorPatient::create([
                'user_id' => $pacienteUser->id,
                'patient_id' => $patient->id,
                'ocupation' => $request->get('ocupation'),
                'vinculo' => $request->get('vinculo'),
                'type_document_id' => $request->get('tipo_documento_tutor'),
                'numdoc' => $request->get('numdoc_tutor'),
            ]);
        }

        $user = \DB::table('users')
            ->where('users.email', $request->get('email'))
            ->first();

        $activation = new Activation([
            'user_id' => $user->id,
            'code' => str_random(60),
            'completed' => 1,
        ]);
        $activation->save();

        $data = new stdClass();
        if ($activation) {
            $data->user_name = $user->name . ' ' . $user->last_name;
            $data->user_email = $user->email;
            $data->user_password = $request->get('password');
            $data->activationUrl = URL::route(
                'activate.api',
                $activation->code
            );
            Mail::to($user->email)->send(new Restore($data));
        }

        return response()->json([
            'estado' => true,
            'message' => 'Registro exitoso',
            'code' => 200,
            'data' => $user,
        ]);
    }

    public function getFullnamereniec(Request $request)
    {
        $dni = $request->get('dni');
        $essalud = new \EsSalud\EsSalud();

        $person = $essalud->search($dni);

        if ($person['success'] == false) {
            //if($person->success == false){
            return response()->json([
                'message' => 'DNI no encontrado',
                'code' => 404,
                'estado' => false,
            ]);
        }

        $user = User::where('numdoc', $dni)->first();

        if ($user) {
            $result = [
                'register' => true,
                'name' => $user->name,
                'last_name' => $user->last_name,
                'birth_date' => $user->birth_date,
                'genero' => $user->gender,
                'user_id' => $user->id,
            ];
            return response()->json([
                'message' => 'DNI encontrado',
                'code' => 202,
                'estado' => true,
                'data' => $result,
            ]);
        } else {
            if ($person['Nombres'] != '') {
                // comparando la fecha de emision
                // estableciendo los parametros a almacenar
                $name = $person['Nombres'];
                $last_name =
                    $person['ApellidoPaterno'] .
                    ' ' .
                    $person['ApellidoMaterno'];
                $birth_date =
                    explode('/', $person['FechaNacimiento'])[2] .
                    '/' .
                    explode('/', $person['FechaNacimiento'])[1] .
                    '/' .
                    explode('/', $person['FechaNacimiento'])[0];
                $genero = $person['Sexo'] - 1;

                $result = [
                    'register' => false,
                    'name' => $name,
                    'last_name' => $last_name,
                    'birth_date' => $birth_date,
                    'genero' => $genero,
                ];
                return response()->json([
                    'message' => 'DNI encontrado',
                    'code' => 202,
                    'estado' => true,
                    'data' => $result,
                ]);
            } else {
                return response()->json([
                    'message' => 'DNI no encontrado',
                    'code' => 404,
                    'estado' => false,
                ]);
            }
        }
    }

    public function vexSolucionesGetAuthUser($userId)
    {
        $user = User::where('id', $userId)->first();

        if (!$user) {
            return response()->json([
                'message' => 'Usuario no encontrado',
                'status' => false,
                'code' => 404,
            ]);
        }

        $patient = Patient::where('users_id', $userId)->first();

        if (!$patient) {
            return response()->json([
                'message' => 'Paciente no encontrado',
                'status' => false,
                'code' => 404,
            ]);
        }

        $role_user = RoleUser::where('user_id', $userId)->first();

        $genero = 'Hombre';

        if ($user->gender == 1) {
            $genero = 'Hombre';
        } else {
            $genero = 'Mujer';
        }

        $data = [
            'id' => $user->id,
            'email' => $user->email,
            'password' => $user->password,
            'remember_token' => $user->remember_token,
            'fingerprint' => $user->fingerprint,
            'permissions' => $user->permissions,
            'last_login' => $user->last_login,
            'name' => $user->name,
            'last_name' => $user->last_name,
            'gender' => $user->gender,
            'state' => $user->state,
            'address' => $user->address,
            'address_extra_info' => $user->address_extra_info,
            'postal' => $user->postal,
            'ubigeo_id' => $user->ubigeo_id,
            'ubigeo_birth' => $user->ubigeo_birth,
            'type_document_id' => $user->type_document_id,
            'user_sinch' => $user->user_sinch,
            'password_sinch' => $user->password_sinch,
            'numdoc' => $user->numdoc,
            'img' => $user->img,
            'tel' => $user->tel,
            'birth_date' => $user->birth_date,
            'country' => $user->country,
            'estado' => $user->estado,
            'token_mobile' => $user->token_mobile,
            'platform' => $user->platform,
            'usuario_created_id' => $user->usuario_created_id,
            'usuario_upd_id' => $user->usuario_upd_id,
            'terminal' => $user->terminal,
            'terminal_upd' => $user->terminal_upd,
            'provider' => $user->provider,
            'provider_id' => $user->provider_id,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
            'deleted_at' => $user->deleted_at,
            'id' => $user->id,
            'slug' => 'paciente',
            'role_id' => $role_user['role_id'],
            'name_role' => 'Paciente',
            'patient_id' => $patient['id'],
            'ocupation' => $patient['ocupation'],
            'num_attentions' => $patient['num_attentions'],
            'degree_instruction_id' => $patient['degree_instruction_id'],
            'civil_status_id' => $patient['civil_status_id'],
            'work_center' => $patient['work_center'],
            'card_id' => $patient['card_id'],
            'card_to_use' => $patient['card_to_use'],
            'weight' => $patient['weight'],
            'size' => $patient['size'],
            'allergies' => $patient['allergies'],
            'call_state' => $patient['call_state'],
            'bloodType' => $patient['bloodType'],
            'genero' => $genero,
        ];

        return response()->json([
            'message' => 'Usuario encontrado',
            'status' => true,
            'code' => 201,
            'data' => $data,
        ]);
    }
}
