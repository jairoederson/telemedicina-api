<!DOCTYPE html>
<html>
<head>
    {{--<meta charset="utf-8">--}}
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Olvidaste tu Contraseña | Bienvenido a Mifarma</title>
    <!--global css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link href="{{ asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}" rel="stylesheet"/>
    <!-- <link rel="icon" href="https://www.mifarma.com.pe/wp-content/themes/mifarma/favicon.ico" type="image/x-icon"> -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/farmacias-logo.ico') }}">
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <!--end of global css-->
    <!--page level css starts-->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/forgot.css') }}">
    <!--end of page level css-->
</head>
<body class="bg-naranja">
  <div class="max-ancho">
    <div class="container" >
    <div class="row">
        <div class="box animation flipInX" style="border-radius: 10px">
          <div class="" style="margin: 0px 50px 0px 50px; padding: 20px 0px 20px; ">
            <a href="/">
              <img src="{{ asset('assets/images/medicentros-peruanos.png') }}" alt="logo" class="img-responsive mar" width="180px">
            </a>
            <h4 style="color: #9f9f9f">Restablecer contraseña</h4>
            <div id="notific">
              @include('notifications')
            </div>
            <br>
            <form action="{{ route('forgot-password') }}" class="omb_loginForm" autocomplete="off" method="POST">
              {!! Form::token() !!}
              <div class="group form-group">
                <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" type="text" name="email" value="{!! old('email') !!}" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label class="material">Correo</label>
                <span class="help-block">{{ $errors->first('email', ':message') }}</span>
              </div>
              <!-- <input type="hidden" id="attempsF" name="attempsF" value="0"> -->
              <div>
                <!-- <div class="g-recaptcha" data-sitekey="6Lf5B0YUAAAAADoiUFizC-NMYd-OtAXgXEQqo9c-"></div> -->
              </div>
              <br>
              <div class="form-group">
                <input class="form-control btn btn-block" style="background-color: #fff; color: #e22715; border: 1px solid;" type="submit" value="ENVIAR">
              </div>
            </form>

            Volver a la sección de Iniciar Sesion? <a href="{{ route('login') }}" class="text-link-color"> Click Aquí</a>
          </div>
        </div>
    </div>
</div>
  </div>
<!--global js starts-->
<script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/frontend/forgotpwd_custom.js') }}"></script>

<!--global js end-->
<script type="text/javascript">



</script>
</body>
</html>
