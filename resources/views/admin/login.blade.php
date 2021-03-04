<!DOCTYPE html>
<html>

<head>
    <title>Iniciar Sesion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/farmacias-logo.ico') }}">

    <!-- global level css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- <link href="{{ asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}" rel="stylesheet"/> -->
    <link href="{{ asset('assets/css/app_1.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/assets/css/pages/formexample.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('/assets/css/pages/jasny-bootstrap.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-ubuntu.css') }}">

    <!-- end of global level css -->
    <!-- page level css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/login.css') }}" />
    <link href="{{ asset('assets/vendors/iCheck/css/square/blue.css') }}" rel="stylesheet"/>
    <!-- end of page level css -->
    <style >
      .login{
        margin-top: 50px;
        width: 420px;
        align: center;
        padding: 2px 8px 8px 8px;
        background-color: white;
        margin-left: 60px;
      }
      .title{
        color: #e22715;
      }
      .format{
        text-transform: none !important;
      }
      .bb-input{
        /* border-bottom: 1px solid #dadada !important; */
        height: 4rem;
      }
      .icon-visibility{
        color: #9f9f9f;
        font-size:20px ;
        margin-left:330px;
        margin-top:12px;
        position:absolute
      }
      #password::-ms-reveal,#password::-ms-clear{

        display: none;
      
      }
    </style>
</head>

<body style="height: 100vh; background-color: #f4f4f4">
  <div class="container">
    <div id="notific">
        @include('notifications')
    </div>
    <div class="row">
      <div class="col-md-3">

      </div>
      <div class="col-md-6">
        <div class="login" style="">
          <div class="row text-center" style="padding-top: 20px">
            <a href="{{ URL::to('/') }}">
              <img src="{{ asset('assets/images/medicentros-peruanos.png') }}" alt="" width="180px">
            </a>
            <h4 class="title">Iniciar Sesión</h4>
          </div>
          <form action="{{ route('signin') }}" autocomplete="on" method="post" role="form" id="login_form">
            <fieldset>
              <div class="col-md-12">

                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <!-- Name input-->
                <div class="form-group label-floating is-empty {{ $errors->first('email', 'has-error') }}" style="margin-top: 10px">
                  <label class="control-label" for="name" style="color: #9a9a9a !important; font-size: 14px !important;">Correo</label>
                  <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="email" name="email" type="email" class="bb-input format-input input-format form-control">
                  <div class="col-sm-12">
                      {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                  </div>
                </div>
                <!-- Apellidos input -->
                <div class="form-group label-floating is-empty {{ $errors->first('password', 'has-error') }}">
                  <span id="icon-span" onclick="showPassword()" class="glyphicon glyphicon-eye-open icon-visibility" ></span>
                  <label class="control-label" for="password" style="color: #9a9a9a !important">Contraseña</label>
                  <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="password" name="password" type="password" class="bb-input format-input input-format form-control">
                  <div class="col-sm-12">
                      {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-6 checkbox" style="padding-left:0px">
                    <label>
                      <input type="checkbox" value="">
                      <span class="checkbox-material">
                      </span>&nbsp; Recordar contraseña
                    </label>
                  </div>
                  <div class="col-md-6 text-right" style="padding-right:0px;padding-top:15px">
                    <a href="#toforgot">¿Olvidaste tu contraseña?</a>
                  </div>
                </div>
                <br>
                <div class="row text-center">
                  <input type="submit" value="INICIAR SESION" class="format btn btn-block" style="color: #e22715 !important; background-color: #FFF; border: 1px solid; font-size:14px"/>
                </div>
              </div>
            </fieldset>
          </form>
        </div>

      </div>
      <div class="col-md-3">

      </div>
    </div>
    <!-- <div class="row vertical-offset-100">
           <div id="notific">
               @include('notifications')
           </div>

            <div class="col-sm-6 col-sm-offset-3  col-md-5 col-md-offset-4 col-lg-4 col-lg-offset-4">
                <div id="container_demo">
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <a class="hiddenanchor" id="toforgot"></a>
                    <div id="wrapper">
                        <div id="login" class="">
                            <form action="{{ route('signin') }}" autocomplete="on" method="post" role="form" id="login_form">
                                <h3 class="">
                                  <img src="{{ asset('assets/images/logo_mifarma.jpg') }}" alt="" width="180px">
                                  <br>Iniciar Sesion
                                </h3>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />


                                <div class="form-group {{ $errors->first('email', 'has-error') }}">
                                    <label style="margin-bottom:0px;" for="email" class="uname control-label">
                                      <i class="livicon" data-name="mail" data-size="16" data-loop="true" data-c="#cac8c6" data-hc="#cac8c6"></i>
                                        Correo
                                    </label>
                                    <input id="email" name="email" type="email" placeholder="Correo"
                                           value="{!! old('email') !!}"/>
                                    <div class="col-sm-12">
                                        {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->first('password', 'has-error') }}">
                                    <label style="margin-bottom:0px;" for="password" class="contraseña">
                                      <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#cac8c6" data-hc="#cac8c6"></i>
                                        Contraseña
                                    </label>
                                    <input id="password" name="password" type="password" placeholder="Contraseña" />
                                    <div class="col-sm-12">
                                        {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <label>
                                        <input type="checkbox" name="remember-me" id="remember-me" value="remember-me"
                                        class="square-blue"/>
                                        Guardar estado
                                      </label>
                                    </div>
                                    <div class="col-md-6" style="padding-left: 0px">
                                      <p class="change_link">
                                        <a href="#toforgot">
                                          <button type="button" class="btn btn-responsive botton-alignment btn-warning btn-sm">Olvidaste tu Contraseña</button>
                                        </a>

                                    </p>
                                    </div>
                                  </div>
                                </div>
                                <p class="login button">
                                    <input type="submit" value="Iniciar Sesion" class="btn" style="color: #ffffff; background-color: #868686;"/>
                                </p>
                            </form>
                        </div>
                        <div id="register" class="animate form">
                            <form action="{{ route('admin.signup') }}" autocomplete="on" method="post" role="form" id="register_here">
                                <h3 class="black_bg">
                                    <img src="{{ asset('assets/images/logo.png') }}" alt="josh logo">
                                    <br>Sign Up</h3>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                    <div class="form-group {{ $errors->first('first_name', 'has-error') }}">
                                        <label style="margin-bottom:0px;" for="first_name" class="youmail">
                                            <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                            First Name
                                        </label>
                                        <input id="first_name" name="first_name" required type="text" placeholder="John"
                                               value="{!! old('first_name') !!}"/>
                                        <div class="col-sm-12">
                                            {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->first('last_name', 'has-error') }}">
                                        <label style="margin-bottom:0px;" for="last_name" class="youmail">
                                            <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                            Last Name
                                        </label>
                                        <input id="last_name" name="last_name" required type="text" placeholder="Doe"
                                               value="{!! old('last_name') !!}"/>
                                        <div class="col-sm-12">
                                            {!! $errors->first('last_name', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->first('email', 'has-error') }}">
                                        <label style="margin-bottom:0px;" for="email" class="youmail">
                                            <i class="livicon" data-name="mail" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                            E-mail
                                        </label>
                                        <input id="email" name="email" value="{!! old('email') !!}" required type="email"
                                               placeholder="mysupermail@mail.com"/>
                                        <div class="col-sm-12">
                                            {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->first('email_confirm', 'has-error') }}">
                                        <label style="margin-bottom:0px;" for="email" class="youmail">
                                            <i class="livicon" data-name="mail" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                            Confirm E-mail
                                        </label>
                                        <input id="email_confirm" name="email_confirm" required type="email"
                                               placeholder="mysupermail@mail.com" value="{!! old('email_confirm') !!}"/>
                                        <div class="col-sm-12">
                                            {!! $errors->first('email_confirm', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->first('password', 'has-error') }}">
                                        <label style="margin-bottom:0px;" for="password" class="youpasswd">
                                            <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                            Password
                                        </label>
                                        <input id="password" name="password" required type="password" placeholder="Password" />
                                        <div class="col-sm-12">
                                            {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->first('password_confirm', 'has-error') }}">
                                        <label style="margin-bottom:0px;" for="passwor_confirm" class="youpasswd">
                                            <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                            Confirm Password
                                        </label>
                                        <input id="password_confirm" name="password_confirm" required type="password" placeholder="Confirm Password" />
                                        <div class="col-sm-12">
                                            {!! $errors->first('password_confirm', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                <p class="signin button">
                                    <input type="submit" class="btn btn-success" value="Sign Up" />
                                </p>
                                <p class="change_link">
                                    <a href="#tologin" class="to_register">
                                        <button type="button" class="btn btn-responsive botton-alignment btn-warning btn-sm">Back</button>
                                    </a>
                                </p>
                            </form>
                        </div>
                        <div id="forgot" class="animate form">
                            <form action="{{ url('admin/forgot-password') }}" autocomplete="on" method="post" role="form" id="reset_pw">
                                <h3 class="black_bg">
                                    <img src="{{ asset('assets/images/logo.png') }}" alt="josh logo"><br>Forgot Password</h3>
                                <p>
                                    Enter your email address below and we'll send a special reset password link to your inbox.
                                </p>

                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                <div class="form-group {{ $errors->first('email', 'has-error') }}">
                                    <label style="margin-bottom:0px;" for="emailsignup1" class="youmai">
                                        <i class="livicon" data-name="mail" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                        Your email
                                    </label>
                                    <input id="email" name="email" required type="email" placeholder="your@mail.com"
                                           value="{!! old('email') !!}"/>
                                    <div class="col-sm-12">
                                        {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                                <p class="">
                                    <input type="submit" value="Reset Password" class="btn btn-success" />
                                </p>
                                <p class="change_link">
                                    <a href="#tologin" class="to_register">
                                        <button type="button" class="btn btn-responsive botton-alignment btn-warning btn-sm">Back</button>
                                    </a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
  </div>
    <script type="text/javascript">
    function showPassword() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        $("#icon-span").removeClass('glyphicon-eye-open');
        $("#icon-span").addClass('glyphicon-eye-close');
          x.type = "text";
      } else {
        $("#icon-span").removeClass('glyphicon-eye-close');
        $("#icon-span").addClass('glyphicon-eye-open');
          x.type = "password";
      }
    }
    </script>
    <!-- global js -->
    <script src="{{ asset('assets/js/app_1.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/frontend/admin/admin.js') }}"></script>
    <script src="{{ asset('/assets/js/pages/jasny-bootstrap.js') }}"></script>
    <script src="{{ asset('/assets/js/pages/form_reset.js') }}"></script>

    <script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
    <!--livicons-->
    <script src="{{ asset('assets/js/raphael-min.js') }}"></script>
    <script src="{{ asset('assets/js/livicons-1.4.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/login.js') }}" type="text/javascript"></script>
    <!-- end of global js -->
</body>
</html>
