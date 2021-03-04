<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar Sesion | Bienvenido</title>
    <!--global css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- <link rel="icon" href="https://www.mifarma.com.pe/wp-content/themes/mifarma/favicon.ico" type="image/x-icon"> -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/farmacias-logo.ico') }}">
    <!--end of global css-->
    <!--page level css starts-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/iCheck/css/all.css')}}" />
    <link href="{{ asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/app.css') }}">
    <!--end of page level css-->
    <!-- MATERIAL DESIGN -->
    <!-- Compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/login.css') }}">
</head>
<body class="bg-naranja">
  <div class="max-ancho">
    <div class="container espacio-top" >
    <!--Content Section Start -->
    <div class="row">
        <div class="box animation flipInX" style="max-width: 420px !important; border-radius: 10px">
            <div class="box1">
              <a href="/">
                <img src="{{ asset('assets/images/medicentros-peruanos.png') }}" alt="logo" class="img-responsive mar" width="180px">
              </a>
              <h4 class="text-center" style="color: #9f9f9f">Iniciar Sesión</h4>
              <!-- Notifications -->
              <div id="notific">
                @include('notifications')
              </div>
              <br>

              <form id="loginForm" action="{{ route('login') }}" autocomplete="off" method="POST">

                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <div class="group form-group {{ $errors->first('email', 'has-error') }}">
                    <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" type="text" id="email" name="email" required value="{!! old('email') !!}">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label class="material">Correo</label>
                  </div>
                  <span class="help-block">{{ $errors->first('email', ':message') }}</span>

                  <div class="group form-group {{ $errors->first('password', 'has-error') }}">
                      <span id="icon-span" onclick="showPassword()" class="glyphicon glyphicon-eye-open icon-visibility" style="cursor: pointer;"></span>
                      <input id="password" type="password" name="password" required>
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label class="material">Contraseña</label>
                  </div>
                  <span class="help-block">{{ $errors->first('password', ':message') }}</span>

                  <input type="hidden" id="attemps" name="attemps" value="0">
                  <div id="captcha" class="form-group" style="display:none;text-align: center">
                    <div class="g-recaptcha" data-sitekey="6Lf5-tcZAAAAAAXUQuvG3a8dL93N3IUP87ZlMe31"></div>
                  </div>
                  {{$errors->first('email',':message')}}
                  <br>
                  <div class="row">
                    <div class="col-xs-5" style="padding-left:0px;padding-right:0px; font-size:14px;">
                      <input type="checkbox" class=""> Recordar Contraseña
                    </div>
                    <div class="col-xs-1">
                    </div>
                    <div class="col-xs-6" style="text-align:right;margin-left:20px;padding-left:0px; padding-right:0px; font-size:14px;">
                      <a href="{{ route('forgot-password') }}" class="text-link-color" id="forgot_pwd_title" style="margin-left:0px">
                        ¿Olvidaste tu Contraseña?
                      </a>
                    </div>

                  </div>
                  <br>
                  <input type="hidden" name="type_user" value="paciente">
                  <input type="submit" onclick="login()" class="btn btn-block btn-color" style="color: #e22715;border-radius: 4px !important; border: 1px solid; background-color: white" value="INICIAR SESIÓN">
                  <!-- <div class="" style="text-align:center">
                    <a href="{{ route('register') }}" class="text-link-color">Regístrese Aquí</a>
                  </div> -->
              </form>
              <div class="row">
                <p style="text-align: center">ó</p>
              </div>
              <div class="row">
                <div class="center">
                </div>
                <a href="{{url('/redirect/facebook')}}" class="btn btn-block btn-color" style=" color: #ffffff; background-color: #3b5998; border-color: #3b5998"> <img width="23px" style="margin-top: -2px;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c2/F_icon.svg/2000px-F_icon.svg.png" alt=""> &nbsp;&nbsp;&nbsp;INICIAR SESIÓN CON FACEBOOK</a>
              </div>
              <br>
              <div class="row">
                <div class="center">
                  <a href="{{ url('/redirect/google') }}" class="btn btn-block btn-color" style=" color: #000; background-color: #e2e2e2; border-color: #e2e2e2"><img width="20px" src="https://cdn4.iconfinder.com/data/icons/new-google-logo-2015/400/new-google-favicon-512.png" alt="">&nbsp;&nbsp;&nbsp;INICIAR SESIÓN CON GOOGLE</a>
                </div>
              </div>
              <div class="row" style="padding-top: 15px;padding-bottom: 10px;">
                <p style="text-align: center">¿Eres nuevo en Humanidad Sur?</p>
              </div>
              <div class="row">
                <div class="center">
                  <a href="{{ route('register') }}" class="btn btn-block btn-color" style=" color: #000; background-color: #e2e2e2; border-color: #e2e2e2">REGÍSTRATE</a>
                </div>
              </div>
            </div>
        </div>
    </div>
    <!-- //Content Section End -->
</div>
  </div>

  <!-- ANGULAR JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.5/angular.min.js" ></script>
<!--global js starts-->
<script type="text/javascript" src="{{ asset('assets/js/frontend/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/frontend/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/frontend/login_custom.js') }}"></script>
<script async defer src="https://www.recaptcha.net/recaptcha/api.js" ></script>

<script type="text/javascript">

  let base_url = "https://telemedicina.today";
  $('#loginForm').submit(function() {
    let user = {
      'email': $("#email").val(),
      'password': $("#password").val(),
    }
    let data = JSON.stringify(user);
    $.ajax({
      type: 'POST',
      url: base_url + '/api/login',
      data: data,
      dataType: 'json',
      contentType: 'application/json; charset=utf-8',
      success: function(response) {
        let identity = response.data.original[0];
        console.log(response.data);
        
        localStorage.setItem('identity', JSON.stringify(identity));
        console.log(localStorage);
      },
      error: function(error) {
        console.log(error);

      }
    });
  });
  function login(){
  }
  // ANGULAR JS

  // ANGULAR END JS
  if (localStorage.attemps == null) {
    localStorage.setItem('attemps', 0);
  }else{
    if(Number(localStorage.attemps) < 3){
      document.getElementById('captcha').style.display = 'none';

    }else{
      document.getElementById('captcha').style.display = 'block';
    }
    document.getElementById('attemps').value = localStorage.attemps;
  }
  function saveAttempps(){
    var attemps = Number(localStorage.attemps) + 1;
    localStorage.setItem("attemps", attemps);
  }

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
<!-- Compiled and minified JavaScript -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script> -->

<!--global js end-->
</body>
</html>
