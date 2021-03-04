<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrese | a Mifarma</title>
    <!--global css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/farmacias-logo.ico') }}">
    <link href="{{ asset('assets/vendors/daterangepicker/css/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendors/clockface/css/clockface.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <!--end of global css-->
    <!--page level css starts-->
<!-- <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/iCheck/css/all.css')}}" /> -->
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <!--end of page level css-->
    <!-- MATERIAL DESIGN -->
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/register.css') }}">

    <!-- Compiled and minified JavaScript -->

</head>
<body class="bg-naranja">
<div class="max-ancho">
    <div class="container">
        <!--Content Section Start -->
        <div class="row">
            <div class="box animation flipInX" style="border-radius: 10px">
                <a href="/">
                    <img src="{{ asset('assets/images/medicentros-peruanos.png') }}" alt="logo" class="img-responsive mar" width="180px">
                </a>
                <h4 class="text-center" style="color: #9f9f9f">Activacición de App</h4>
                <!-- Notifications -->
                <div id="notific">
                    <div class="alert alert-dismissable margin5" style="background-color: #fff; border: 1px solid #5fb302;color: #5fb302;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Exito:</strong> Cuenta habilitada correctamente
                    </div>
                </div>

                <div class="text-center">
                    <strong>Ya puede realizar consultas desde la app</strong>
                </div>
            </div>
        </div>
        <!-- //Content Section End -->
    </div>
</div>

<!-- SECTION MODAL END -->
<!--global js starts-->
<script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/vendors/daterangepicker/js/daterangepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/clockface/js/clockface.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/datepicker.js') }}" type="text/javascript"></script>
<!--global js end-->

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script> -->

</body>
</html>
