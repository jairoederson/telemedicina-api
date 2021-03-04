<?php

namespace App\Http\Controllers;

//use Activation;
use App\Activation;
use App\Http\Requests;
use App\Http\Requests\PasswordResetRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\FrontendRequest;
use App\PasswordReset;

use App\RoleUser;
use App\Patient;
use App\Doctor;
use Carbon\Carbon;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use File;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;
use Redirect;
use Reminder;
use Validator;
use Sentinel;
use URL;
use View;
use stdClass;
use App\Mail\Contact;
use App\Mail\ForgotPassword;
use App\Mail\Restore;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;

use App\Mifarma\Repositories\UserRepo;

class FrontEndController extends JoshController
{
    /*
     * $user_activation set to false makes the user activation via user registered email
     * and set to true makes user activated while creation
     */
    public function __construct(UserRepo $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    private $user_activation = false;

    /**
     * Account sign in.
     *
     * @return View
     */
    public function getLogin(Request $request)
    {
        if (Auth::check()) {
            $query = Activation::where('user_id', Auth::user()->id)->first();
            if ($query->completed == 1) {
                return Redirect::to('https://telemedicina.today/web/paciente/mi-cuenta');
            } else {
                $request->session()->put('error', 'Verificar su cuenta');
            }
        }
        return view('login');
    }

    public function vexSolucionesVerificarTipoDispositivo()
    {
        $tablet_browser = 0;
        $mobile_browser = 0;
        $body_class = 'desktop';

        if (
            preg_match(
                '/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i',
                strtolower($_SERVER['HTTP_USER_AGENT'])
            )
        ) {
            $tablet_browser++;
            $body_class = 'tablet';
        }

        if (
            preg_match(
                '/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i',
                strtolower($_SERVER['HTTP_USER_AGENT'])
            )
        ) {
            $mobile_browser++;
            $body_class = 'mobile';
        }

        if (
            strpos(
                strtolower($_SERVER['HTTP_ACCEPT']),
                'application/vnd.wap.xhtml+xml'
            ) >
                0 or
            (isset($_SERVER['HTTP_X_WAP_PROFILE']) or
                isset($_SERVER['HTTP_PROFILE']))
        ) {
            $mobile_browser++;
            $body_class = 'mobile';
        }

        $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
        $mobile_agents = [
            'w3c ',
            'acs-',
            'alav',
            'alca',
            'amoi',
            'audi',
            'avan',
            'benq',
            'bird',
            'blac',
            'blaz',
            'brew',
            'cell',
            'cldc',
            'cmd-',
            'dang',
            'doco',
            'eric',
            'hipt',
            'inno',
            'ipaq',
            'java',
            'jigs',
            'kddi',
            'keji',
            'leno',
            'lg-c',
            'lg-d',
            'lg-g',
            'lge-',
            'maui',
            'maxo',
            'midp',
            'mits',
            'mmef',
            'mobi',
            'mot-',
            'moto',
            'mwbp',
            'nec-',
            'newt',
            'noki',
            'palm',
            'pana',
            'pant',
            'phil',
            'play',
            'port',
            'prox',
            'qwap',
            'sage',
            'sams',
            'sany',
            'sch-',
            'sec-',
            'send',
            'seri',
            'sgh-',
            'shar',
            'sie-',
            'siem',
            'smal',
            'smar',
            'sony',
            'sph-',
            'symb',
            't-mo',
            'teli',
            'tim-',
            'tosh',
            'tsm-',
            'upg1',
            'upsi',
            'vk-v',
            'voda',
            'wap-',
            'wapa',
            'wapi',
            'wapp',
            'wapr',
            'webc',
            'winw',
            'winw',
            'xda ',
            'xda-',
        ];

        if (in_array($mobile_ua, $mobile_agents)) {
            $mobile_browser++;
        }

        if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'opera mini') > 0) {
            $mobile_browser++;
            //Check for tablets on opera mini alternative headers
            $stock_ua = strtolower(
                isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])
                    ? $_SERVER['HTTP_X_OPERAMINI_PHONE_UA']
                    : (isset($_SERVER['HTTP_DEVICE_STOCK_UA'])
                        ? $_SERVER['HTTP_DEVICE_STOCK_UA']
                        : '')
            );
            if (
                preg_match(
                    '/(tablet|ipad|playbook)|(android(?!.*mobile))/i',
                    $stock_ua
                )
            ) {
                $tablet_browser++;
            }
        }
        if ($tablet_browser > 0) {
            // Si es tablet has lo que necesites
            return 'tablet';
        } elseif ($mobile_browser > 0) {
            // Si es dispositivo mobil has lo que necesites
            return 'mobile';
        } else {
            // Si es ordenador de escritorio has lo que necesites
            return 'desktop';
        }
    }

    /**
     * Account sign in form processing.
     *
     * @return Redirect
     */

    public function postLogin(Request $request)
    {
        $user = User::where('email', $request->get('email'))->get();
        if (count($user) == 0) {
            return redirect('login')->with('error', 'Cuenta no encontrada.');
        }
        $roleUser = RoleUser::where('user_id', $user[0]->id)->get();
        $role_id = $roleUser[0]->role_id;

        try {
            // Try to log the user in
            //if (Auth::attempt($request->only('email', 'password'))) {
            if (\Hash::check($request->get('password'), $user[0]->password)) {
                // Success
                //Activity log for login
                Auth::attempt($request->only('email', 'password'));

                activity(Auth::user()->full_name)
                    ->performedOn(Auth::user())
                    ->causedBy(Auth::user())
                    ->log('LoggedIn');

                if ($role_id == 2) {
                    $doctor = Doctor::where(
                        'users_id',
                        Auth::user()->id
                    )->get();
                    $doctorToUpdate = Doctor::findOrFail($doctor[0]->id);
                    $doctorToUpdate->status = 1;
                    $doctorToUpdate->save();

                    $device = $this->vexSolucionesVerificarTipoDispositivo();

                    if ($device == 'mobile') {
                        return Redirect::to(
                            'https://telemedicina.today/mobile/doctor/history'
                        );
                    } else {
                        return Redirect::to(
                            'https://telemedicina.today/web/doctor/mi-cuenta'
                        );
                    }
                } elseif ($role_id == 4) {
                    return Redirect::to('https://telemedicina.today/web/paciente/mi-cuenta');
                } elseif ($role_id == 5) {
                    return Redirect::to(
                        'https://telemedicina.today/web/laboratorio/mi-cuenta'
                    );
                } elseif ($role_id == 6) {
                    return Redirect::to(
                        'https://telemedicina.today/web/enfermero/'
                    );
                } elseif ($role_id == 1) {
                    return Redirect::to(
                        'https://telemedicina.today/web/doctor/mi-cuenta'
                    );
                } else {
                    // return redirect('login')->with('error', gettype($role_id));
                    $device = $this->vexSolucionesVerificarTipoDispositivo();

                    if ($device == 'mobile') {
                        $url =
                            'https://telemedicina.today/web/paciente/#/dashboard/' .
                            $user[0]->id;
                        return Redirect::to($url);
                    } else {
                        $url =
                            'https://telemedicina.today/web/paciente/dashboard/' .
                            $user[0]->id;
                       // $url ='http://telemedicina.today/web/paciente/dashboard/' .$user[0]->id;
                        return Redirect::to($url);
                    }
                }
            } else {
                return redirect('login')->with(
                    'error',
                    'Correo o Password Incorrecto.'
                );
            }
        } catch (UserNotFoundException $e) {
            return redirect('login')->with('error', 'Cuenta no encontrada.');
            // $this->messageBag->add('email', trans('auth/message.account_not_found'));
        } catch (NotActivatedException $e) {
            return redirect('login')->with(
                'error',
                'Cuenta no activada. revise su correo'
            );
            // $this->messageBag->add('email', trans('auth/message.account_not_activated'));
        } catch (UserSuspendedException $e) {
            return redirect('login')->with('error', 'Cuenta suspendida.');
            // $this->messageBag->add('email', trans('auth/message.account_suspended'));
        } catch (UserBannedException $e) {
            return redirect('login')->with('error', 'Cuenta baneada.');
            // $this->messageBag->add('email', trans('auth/message.account_banned'));
        } catch (ThrottlingException $e) {
            $delay = $e->getDelay();
            return redirect('login')->with('error', 'Cuenta No suspendida.');
            // $this->messageBag->add('email', trans('auth/message.account_suspended', compact('delay')));
        }

        // Ooops.. something went wrong
        return Redirect::back()
            ->withInput()
            ->withErrors($this->messageBag);
    }

    /**
     * get user details and display
     */
    public function myAccount(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return view('user_account', compact('user', 'countries'));
    }
    public function home(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return view('index', compact('user', 'countries'));
    }
    /**/

    /**
     * update user details and display
     * @param Request $request
     * @param User $user
     * @return Return Redirect
     */
    public function update(User $user, FrontendRequest $request)
    {
        $user = Sentinel::getUser();
        //update values
        $user->update($request->except('password', 'pic', 'password_confirm'));

        if ($password = $request->get('password')) {
            $user->password = Hash::make($password);
        }
        // is new image uploaded?
        if ($file = $request->file('pic')) {
            $extension = $file->extension() ?: 'png';
            $folderName = '/uploads/users/';
            $destinationPath = public_path() . $folderName;
            $safeName = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $safeName);

            //delete old pic if exists
            if (File::exists(public_path() . $folderName . $user->pic)) {
                File::delete(public_path() . $folderName . $user->pic);
            }
            //save new file path into db
            $user->pic = $safeName;
        }

        // Was the user updated?
        if ($user->save()) {
            // Prepare the success message
            $success = trans('users/message.success.update');
            //Activity log for update account
            activity($user->full_name)
                ->performedOn($user)
                ->causedBy($user)
                ->log('User Updated successfully');
            // Redirect to the user page
            return Redirect::route('my-account')->with('success', $success);
        }

        // Prepare the error message
        $error = trans('users/message.error.update');

        // Redirect to the user page
        return Redirect::route('my-account')
            ->withInput()
            ->with('error', $error);
    }

    /**
     * Account Register.
     *
     * @return View
     */
    public function getRegister()
    {
        // Show the page
        return view('register')->with([
            'infoSocialite' => [
                'name' => '',
                'email' => '',
                'provider_id' => '',
                'provider' => '',
                'avatar_original' =>
                    'https://telemedicina.today/images/user/default/default.jpg',
            ],
        ]);
    }

    /**
     * Account sign up form processing.
     *
     * @return Redirect
     */
    public function postRegister(Request $request)
    {
        $user_founded = User::where('email', $request->get('email'))->first();

        if ($user_founded) {
            return redirect('register')->with(
                'error',
                'Correo electrónico registrado'
            );
        }

        if ($request->get('password') !== $request->get('password_confirm')) {
            return redirect('register')->with(
                'error',
                'La confirmacion de contraseña no coincide'
            );
        }

        if ($request->get('subscribed') != 'on') {
            return redirect('register')->with(
                'error',
                'Aceptar los terminos y condiciones'
            );
        }

        $token_captcha = $request->input('g-recaptcha-response');
        $token_captcha = true;
        $essalud = new \jossmp\essalud\asegurado();

        $dni = $request->get('numdoc');
        $person = $essalud->consulta($dni);
        $gender = 2;

        if ($person->success == true) {
            $name = $person->result->nombre;
            $last_name =
                $person->result->paterno . ' ' . $person->result->materno;
            if (empty($person->result->nacimiento)) {
                $birth_date = '';
            } else {
                $birth_date =
                    explode('/', $person->result->nacimiento)[2] .
                    '/' .
                    explode('/', $person->result->nacimiento)[1] .
                    '/' .
                    explode('/', $person->result->nacimiento)[0];
            }

            $genero = $person->result->sexo;
            if ($genero == 'Masculino') {
                $gender = 1;
            }
        } else {
            // print_r($person);
            //return redirect('register')->with('error', $person->message);
        }

        $userToRegister = [
            'name' => $name,
            'last_name' => $last_name,
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'gender' => $gender,
            'birth_date' => $birth_date,
            'numdoc' => $request->get('numdoc'),
            'tel' => $request->get('tel'),
            'type_document_id' => $request->get('type_document_id'),
            'img' => $request->get('img'),
            'provider' => $request->get('provider'),
            'provider_id' => $request->get('provider_id'),
        ];

        if ($token_captcha) {
            try {
                $user = User::create($userToRegister);

                $fields_role = [
                    'role_id' => 3,
                    'user_id' => $user->id,
                ];

                RoleUser::create($fields_role);

                $user_to_update = User::findOrFail($user->id);

                $user_to_update->gender = $gender;

                $user_sinch =
                    strtolower(preg_replace('/\s+/', '', $user->name)) . time();
                $user_to_update->user_sinch = $user_sinch;
                $user_to_update->password_sinch = $user_sinch;
                // $user_to_update->img = "https://www.alo.doctor/images/user/default/default.jpg";

                $user_to_update->save();

                $fields_patient = [
                    'users_id' => $user->id,
                    'num_attentions' => 0,
                ];

                Patient::create($fields_patient);

                $activation = new Activation([
                    'user_id' => $user->id,
                    'code' => str_random(60),
                    'completed' => 0,
                ]);
                $activation->save();

                if ($activation) {
                    $data = [
                        'user_name' => $user->name . ' ' . $user->last_name,
                        'user_email' => $user->email,
                        'user_password' => $request->get('password'),
                        'activationUrl' => URL::route('activate', [
                            $user->id,
                            $activation->code,
                        ]),
                    ];
                    // $data['user_name'] =$user->name .' '. $user->last_name;
                    // $data['user_email'] = $user->email;
                    // $data['user_password'] = $request->get('password');
                    // $data['activationUrl'] = URL::route('activate', [$user->id,$activation->code]);
                    Mail::to($user->email)->send(new Restore($data));

                    return redirect('login')->with(
                        'success',
                        trans('auth/message.signup.success')
                    );
                }

                return Redirect::route('my-account')->with(
                    'success',
                    trans('auth/message.signup.success')
                );
            } catch (UserExistsException $e) {
                $this->messageBag->add(
                    'email',
                    trans('auth/message.account_already_exists')
                );
            }
        } else {
            return redirect('register')->with(
                'error',
                'Por favor Verifique Captcha'
            );
        }
        // Ooops.. something went wrong
        return Redirect::back()
            ->withInput()
            ->withErrors($this->messageBag);
    }

    /**
     * User account activation page.
     *
     * @param number $userId
     * @param string $activationCode
     *
     */
    public function getActivate($userId, $activationCode)
    {
        // Is the user logged in?
        /*if (Auth::check()) {
            // return Redirect::route('my-account');
            // return Redirect::to("https://www.alo.doctor/web/paciente/dist/nueva-consulta")
            return Redirect::route('login')->with('success', trans('auth/message.activate.success'));

        }*/

        $user = User::find($userId);
        $ctivation = Activation::where('code', $activationCode)->first();
        if ($user) {
            if ($ctivation) {
                $ctivation->completed = 1;
                $ctivation->save();
                // Activation was successfull
                return Redirect::route('login')->with(
                    'success',
                    trans('auth/message.activate.success')
                );
            } else {
                // Activation not found or not completed.
                $error = trans('auth/message.activate.error');
                return Redirect::route('login')->with('error', $error);
            }
        } else {
            $error = trans('auth/message.activate.error');
            return Redirect::route('login')->with('error', $error);
        }
    }

    /**
     * Forgot password page.
     *
     * @return View
     */
    public function getForgotPassword()
    {
        // Show the page
        return view('forgotpwd');
    }

    /**
     * Forgot password form processing page.
     * @param Request $request
     * @return Redirect
     */
    public function postForgotPassword(Request $request)
    {
        $tipo_usuario = $request->get('email');
        $token_captcha = $request->input('g-recaptcha-response');
        $token_captcha = true;
        if ($token_captcha) {
            $data = new stdClass();
            try {
                $user = User::where('email', $request->email)->first();
                if (!$user) {
                    return Redirect::route('forgot-password')->with(
                        'error',
                        trans('auth/message.account_email_not_found')
                    );
                }

                //$activation = Activation::completed($user);
                $activation = Activation::where('user_id', $user->id)->first();
                if (!$activation) {
                    return Redirect::route('forgot-password')->with(
                        'error',
                        trans('auth/message.account_not_activated')
                    );
                }

                $reminder = PasswordReset::updateOrCreate(
                    ['user_id' => $user->id],
                    [
                        'user_id' => $user->id,
                        'code' => str_random(60),
                    ]
                );
                //$reminder = Reminder::exists($user) ?: Reminder::create($user);

                $data->user_name = $user->first_name . ' ' . $user->last_name;
                $data->forgotPasswordUrl = URL::route(
                    'forgot-password-confirm',
                    [$user->id, $reminder->code]
                );

                Mail::to($user->email)->send(new ForgotPassword($data));
            } catch (UserNotFoundException $e) {
                // Even though the email was not found, we will pretend
                // we have sent the password reset code through email,
                // this is a security measure against hackers.
            }
        } else {
            return redirect('forgot-password')->with(
                'error',
                'Por favor Verifique Captcha'
            );
        }

        //  Redirect to the forgot password
        return back()->with(
            'success',
            trans('auth/message.forgot-password.success')
        );
    }

    /**
     * Forgot Password Confirmation page.
     *
     * @param  string $passwordResetCode
     * @return View
     */
    public function getForgotPasswordConfirm(
        Request $request,
        $userId,
        $passwordResetCode = null
    ) {
        if (!($user = User::find($userId))) {
            // Redirect to the forgot password page
            return Redirect::route('forgot-password')->with(
                'error',
                trans('auth/message.account_not_found')
            );
        }

        $reminder = PasswordReset::where('user_id', $user->id)->first();

        if ($reminder) {
            if ($passwordResetCode == $reminder->code) {
                return view(
                    'forgotpwd-confirm',
                    compact(['userId', 'passwordResetCode'])
                );
            } else {
                return 'code does not match';
            }
        } else {
            return 'does not exists';
        }
    }

    /**
     * Forgot Password Confirmation form processing page.
     *
     * @param  string $passwordResetCode
     * @return Redirect
     */
    public function postForgotPasswordConfirm(
        PasswordResetRequest $request,
        $userId,
        $passwordResetCode = null
    ) {
        $user = User::find($userId);
        $reminder = PasswordReset::where('user_id', $user->id)
            ->where('code', $passwordResetCode)
            ->first();
        if ($reminder) {
            // Password successfully reseted
            $reminder
                ->fill(['completed' => 1, 'completed_at' => Carbon::now()])
                ->save();
            $user
                ->fill(['password' => bcrypt($request->get('password'))])
                ->save();
            return Redirect::route('login')->with(
                'success',
                trans('auth/message.forgot-password-confirm.success')
            );
        } else {
            // Ooops.. something went wrong
            return Redirect::route('login')->with(
                'error',
                trans('auth/message.forgot-password-confirm.error')
            );
        }
    }

    /**
     * Contact form processing.
     * @param Request $request
     * @return Redirect
     */
    public function postContact(Request $request)
    {
        $data = new stdClass();

        // Data to be used on the email view
        $data->contact_name = $request->get('contact-name');
        $data->contact_email = $request->get('contact-email');
        $data->contact_msg = $request->get('contact-msg');

        // Send the activation code through email
        Mail::to('email@domain.com')->send(new Contact($data));

        //Redirect to contact page
        return redirect('contact')->with(
            'success',
            trans('auth/message.contact.success')
        );
    }

    public function showFrontEndView($name = null)
    {
        if (View::exists($name)) {
            return view($name);
        } else {
            abort('404');
        }
    }

    /**
     * Logout page.
     *
     * @return Redirect
     */
    public function getLogout()
    {
        if (Auth::check()) {
            //Activity log
            $user = Auth::user();
            unset($user['role_id']);
            activity($user->full_name)
                ->performedOn($user)
                ->causedBy($user)
                ->log('LoggedOut');
            // Log the user out
            Auth::logout();
        }
        // Redirect to the users page
        return redirect('/')->with(
            'success',
            'Has cerrado sesión exitosamente'
        );
    }
    // PACIENTE
    public function userPass(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return view('user_pass');
    }

    public function userPagos(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return view('user_pagos', compact('user', 'countries'));
    }
    public function userPagosCredit(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return view('user_pagos_credit_card', compact('user', 'countries'));
    }
    public function userEditCC(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return view('user_pagos_edit_creditCard', compact('user', 'countries'));
    }
    public function userPagosPaypal(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return view('user_pagos_paypal', compact('user', 'countries'));
    }
    public function userHistorial(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return view('user_historial', compact('user', 'countries'));
    }
    public function userConsulta(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return view('user_consulta', compact('user', 'countries'));
    }
    public function userConsultaDoctor(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return view('user_consulta_doctor', compact('user', 'countries'));
    }
    public function userReceta(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return view('user_receta', compact('user', 'countries'));
    }
    public function userAyuda(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return view('user_ayuda', compact('user', 'countries'));
    }
    public function UserHistotialMedico(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return view('user_historial_medico', compact('user', 'countries'));
    }
    public function UserChat(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return view('user_chat', compact('user', 'countries'));
    }
    public function UserAnalisis(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return view('user_analisis', compact('user', 'countries'));
    }
    public function UserCalifica(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return view('user_califica', compact('user', 'countries'));
    }

    //DOCTOR
    public function doctorAccount(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return view('doctor_account', compact('user', 'countries'));
    }
    public function doctorAyuda(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return view('doctor_ayuda', compact('user', 'countries'));
    }
    public function doctorConsulta(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return view('doctor_consulta', compact('user', 'countries'));
    }
    public function doctorConsultaPerdida(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return view('doctor_consulta_perdida', compact('user', 'countries'));
    }
    public function doctorIngreso(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return view('doctor_ingreso', compact('user', 'countries'));
    }
    public function doctorPass(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return view('doctor_pass', compact('user', 'countries'));
    }
    public function DoctorHistotialMedico(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return view('doctor_historial_medico', compact('user', 'countries'));
    }
    public function DoctorChat(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return view('doctor_chat', compact('user', 'countries'));
    }
    public function DoctorReceta(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return view('doctor_receta', compact('user', 'countries'));
    }
    public function DoctorAnalisis(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return view('doctor_analisis', compact('user', 'countries'));
    }
    public function listHistorial(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return view('doctor_list_historial', compact('user', 'countries'));
    }

    // responsable laboratorio
    public function LabAccount(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return view('lab_account', compact('user', 'countries'));
    }

    public function LabHistorial(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return view('lab_historial', compact('user', 'countries'));
    }

    public function LabAnalisis(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return view('lab_analisis', compact('user', 'countries'));
    }

    public function LabAnalisisMedico(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return view('lab_analisisMedico', compact('user', 'countries'));
    }

    public function LabNewAnalisis(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return view('lab_nuevo_analisis', compact('user', 'countries'));
    }

    public function LabAyuda(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return view('lab_ayuda', compact('user', 'countries'));
    }

    // secretaria laboratorio
    public function LabSecAccount(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return view('lab_sec_account', compact('user', 'countries'));
    }

    public function LabSecNewHistorial(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return view('lab_sec_nuevo_historial', compact('user', 'countries'));
    }

    public function LabSecHistorial(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return view('lab_sec_historial', compact('user', 'countries'));
    }

    public function LabSecAnalisis(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return view('lab_sec_analisis', compact('user', 'countries'));
    }

    public function LabSecAyuda(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return view('lab_sec_ayuda', compact('user', 'countries'));
    }

    public function LabSecComprobante(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return view('lab_sec_comprobante', compact('user', 'countries'));
    }
    public function LabSecListComprobante(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;
        return view('lab_sec_list_comprobante', compact('user', 'countries'));
    }
}
