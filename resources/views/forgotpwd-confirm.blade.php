<!DOCTYPE html>
<html>
<head>
    {{--<meta charset="utf-8">--}}
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restablecer Contraseña</title>
    <!--global css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/farmacias-logo.ico') }}">

    <!--end of global css-->
    <!--page level css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/login.css') }}">

    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/forgot.css') }}"> -->
    <!--end of page level css-->
</head>
<body class="bg-naranja">
<div class="container" style="padding-top: 100px">
    <div class="row">
      <div class="col-sm-3">

      </div>
      <div class="col-sm-6" style="padding-left: 80px; padding-right: 80px">
        <div class="box animation flipInX" style="background-color: #FFFFFF; padding: 25px;padding-bottom: 25px; border-radius: 10px">
          <img src="{{asset('assets/images/medicentros-peruanos.png')}}" alt="logo" class="img-responsive mar" width="180px">
          <!-- <img src="{{ asset('assets/images/logo.png') }}" alt="logo" class="img-responsive mar" width="150px"> -->
          <h4 class="text-link-color text-center">Restablezca su Contraseña</h4>
          <!-- <p>Ingrese su nueva contraseña</p> -->
          <div id="notific">
            @include('notifications')
          </div>
          <br>

          <form action="{{ route('forgot-password-confirm',compact(['userId','passwordResetCode'])) }}" class="omb_loginForm pwd_validation"  autocomplete="off" method="POST">
                {!! Form::token() !!}
                <div class="group form-group">
                  <span id="icon-span" onclick="showPassword()" class="glyphicon glyphicon-eye-open icon-visibility" style="cursor: pointer;"></span>
                  <input id="password" type="password" name="password" required>
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label class="material">Nueva Contraseña</label>
                  <span class="span-medidor">8 caracteres, 1 mayúscula, 1 carácter no alfanumérico</span>
                  {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                </div>
                <!-- <label class="sr-only"> Nueva Contraseña</label>
                <input type="password" class="form-control" name="password" placeholder="Nuevo Password">
                <span class="help-block">{{ $errors->first('password', ':message') }}</span> -->
                <div class="group form-group">
                  <span id="icon-span" onclick="showPasswordRep()" class="glyphicon glyphicon-eye-open icon-visibility" style="cursor: pointer;"></span>
                  <input id="rep-password" type="password" name="password_confirm" required>
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label class="material">Confirmar Nueva Contraseña</label>
                  <span class="span-medidor">8 caracteres, 1 mayúscula, 1 carácter no alfanumérico</span>
                  {!! $errors->first('password_confirm', '<span class="help-block">:message</span>') !!}
                </div>

                <!-- <label class="sr-only">Confirmar Nueva Contraseña</label>
                <input type="password" class="form-control mt-15" name="password_confirm" placeholder="Confirma tu Nuevo Password">
                <span class="help-block">{{ $errors->first('password_confirm', ':message') }}</span> -->
                <!-- <input type="submit" class="btn btn-block btn-color" style=" color: #ffffff" value="Iniciar Sesion"> -->
                <input type="submit" class="btn btn-block btn-color" style=" color: #e22715; background-color: #fff; border: 1px solid; margin-top: 10px" value="RESTABLECER" >
              </form>
        </div>
      </div>
      <div class="col-sm-3">

      </div>
    </div>
</div>
<!--global js starts-->
<script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<!--global js end-->
<script type="text/javascript">
  document.body.style.backgroundColor = "#e22715";
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
  function showPasswordRep() {
    var x = document.getElementById("rep-password");
    if (x.type === "password") {
      $("#icon-span-rep").removeClass('glyphicon-eye-open');
      $("#icon-span-rep").addClass('glyphicon-eye-close');
        x.type = "text";
    } else {
      $("#icon-span-rep").removeClass('glyphicon-eye-close');
      $("#icon-span-rep").addClass('glyphicon-eye-open');
        x.type = "password";
    }
  }
</script>
</body>
</html>
