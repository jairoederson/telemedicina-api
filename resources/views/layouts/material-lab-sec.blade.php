<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Mifarma</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dataTables.materialize.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/mifarma.ico') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/materialize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/lab-sec/lab-sec.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/icon-material.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-ubuntu.css') }}">

  </head>
  <body>
    <div class="">
      <header style="background-color: white" >
        <nav class="white">
          <div class="white">

            <a id="logofarma" href="/" class="brand-logo" style="display:block; width: 16.5%;">
              <img id="img-logotipo" style="margin-left: 8%;padding-top: 2%" src="{{ asset('assets/images/logo_mifarma.jpg') }}" alt="logo" class="" width="190px">
            </a>
            <a id="logofarma1" href="" class="brand-logo" style="display:none; width: 89px; background-color: #ffffff">
              <img id="img-logo" style="padding-left: 12px;" src="{{ asset('assets/images/logomifarma.png') }}" alt="logo" class="" height="65px" width="72px">
            </a>
            <a href="#">
              <ul id="hamb" class="left hide-on-med-and-down" style="display: none; margin-left: 7.2%">
                <li class="nav-header">
                  <a id="hamburg" onclick="mostrar();" class="" style="font-family: 'Ubuntu', sans-serif; padding-top:0px; padding-bottom:0px">
                    <i class="material-icons black-text text-darken-4 lg" style="margin-right: 0px !important;">dehaze</i>
                  </a>
                </li>
                <li id="fs1" style="display:block" class="nav-header">
                  <a id="zoom" onclick="fullScreen1();" class="" style="font-family: 'Ubuntu', sans-serif; padding-top:0px; padding-bottom:0px">
                    <i class="material-icons black-text text-darken-4" style="margin-right: 0px !important;">fullscreen</i>
                  </a>
                </li>
                <li id="fs2" style="display: none" class="nav-header">
                  <a id="zoom" onclick="escScreen1();" class="" style="font-family: 'Ubuntu', sans-serif; padding-top:0px; padding-bottom:0px">
                    <i class="material-icons black-text text-darken-4" style="margin-right: 0px !important;">fullscreen_exit</i>
                  </a>
                </li>
              </ul>
            </a>
            <ul id="hamb1" class="left hide-on-med-and-down" style="display: block; margin-left: 16.6%">
              <li class="nav-header" style="">
                <a id="hamburg" onclick="ocultar();" class="" style="font-family: 'Ubuntu', sans-serif; padding-top:0px; padding-bottom:0px;; text-align:center">
                  <i class="material-icons black-text text-darken-4" style="margin-right: 0px !important;">dehaze</i>
                </a>
              </li>
              <li id="f1" style="display:block" class="nav-header">
                <a id="zoom" onclick="fullScreen();" class="" style="font-family: 'Ubuntu', sans-serif; padding-top:0px; padding-bottom:0px">
                  <i class="material-icons black-text text-darken-4" style="margin-right: 0px !important;">fullscreen</i>
                </a>
              </li>
              <li id="f2" style="display: none" class="nav-header">
                <a id="zoom" onclick="escScreen();" class="" style="font-family: 'Ubuntu', sans-serif; padding-top:0px; padding-bottom:0px">
                  <i class="material-icons black-text text-darken-4" style="margin-right: 0px !important;">fullscreen_exit</i>
                </a>
              </li>
            </ul>
            <ul id="nav-mobile" class="right hide-on-med-and-down" style="">
              <!-- <li><a href="" style="font-size: 14px; color: #757575">NUEVA CONSULTA</a></li> -->
              <!-- <li>
                <a onclick="modalVideo()" href="#modalVideo" class="modal-trigger"><i class="material-icons">mode_comment</i></a>
              </li> -->

              <li>
                <a href="#"><i class="material-icons icon-notification">notifications</i></a>
              </li>
              <li>
                <a href="{{ URL::to('doctor-account') }}">
                  <img style="position: absolute; margin-left: 30px; margin-top: 13px;border-radius:50px;" src="{{ asset('assets/images/doctor1.jpg') }}" alt="img" height="40px" width="40px" class="img-circle img-responsive pull-left"/>
                </a>
              </li>
              <li class="nav-header">
                <!-- <a style="font-size: 14px; color: #000000;font-family: 'Ubuntu', sans-serif;" href="">{{ Sentinel::getUser()->first_name }} {{ Sentinel::getUser()->last_name }}</a> -->

                <a href="{{ URL::to('doctor-account') }}" onclick="keyleft()" class='dropdown-button black-text' href='#' data-activates='dropdown'>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <strong style="color: #000000">

                      {{ Sentinel::getUser()->first_name }} {{ Sentinel::getUser()->last_name }}

                  </strong>

                </a>

                <!-- Dropdown Structure -->
                <ul id='dropdown1' class='dropdown-content' style="margin-top:65px; margin-left: 20px;border: 1px solid #d6d2d2">
                  <li><a href="{{ URL::to('lab-sec-account') }}"><i class="material-icons" style="margin-right: 10px !important">account_circle</i>Mi Cuenta</a></li>
                  <li class="divider"></li>
                  <!-- <li><a href="{{ URL::to('doctor-consulta') }}"><i class="material-icons">assignment_turned_in</i>Historial Medico</a></li> -->
                  <li><a href="{{ URL::to('lab-sec-new-historial') }}"><i class="material-icons" style="margin-right: 10px !important">add_circle</i>Nuevo Hist. Médico</a></li>

                  <li><a href="{{ URL::to('lab-sec-historial') }}"><i class="material-icons" style="margin-right: 10px !important">assignment</i>Historial Médico</a></li>
                  <li><a href="{{ URL::to('lab-sec-analisis') }}"><i class="material-icons" style="margin-right: 10px !important">note_add</i>Análisis Clínico</a></li>
                  <!-- <li><a href="{{ URL::to('lab-ingresos') }}"><i class="material-icons">monetization_on</i>Ingresos</a></li> -->
                  <!-- <li><a href="{{ URL::to('doctor-ingreso') }}"><i class="material-icons">monetization_on</i>Ayuda</a></li> -->
                  <li><a href="{{ URL::to('lab-sec-ayuda') }}"><i class="material-icons" style="margin-right: 10px !important">live_help</i>Ayuda</a></li>
                  <li class="divider"></li>
                  <li><a href="{{ URL::to('logout') }}"><i class="material-icons" style="margin-right: 10px !important">input</i>Cerrar Sesión</a></li>
                </ul>
              </li>
              <li class="nav-header-bg">
                <a class="dropdown-button black-text" data-activates='dropdown1'>
                  <i id="keyleft"  style="padding-right: 0px;color: #000000; position: absolute;"class="material-icons">arrow_drop_down</i>
                </a>
                <!-- Dropdown Structure -->
              </li>

              <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

              </li>
              <!-- <i style="color: #000000; position: absolute; margin-left:220px;"class="material-icons">keyboard_arrow_down</i> -->
            </ul>
          </div>
        </nav>
        <!-- Nav bar End -->
      </header>
      <div class="row">
        <div id="nav0" class="col s2" style="padding: 0px 0px 0px 0px; background-color: #e22715;">
            <ul class="side-nav fixed" style="transform: translateX(0px);display: block;background-color: #e22715; bottom:0px !important; width: 100%; margin-top: 0%; position: relative">
              <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                  <li id="cuentaNav" class="bold" {!! (Request::is('lab-sec-account') ? 'class="active"' : '') !!}>
                    <a href="{{ URL::to('lab-sec-account') }}" class="collapsible-header  waves-effect waves-teal" style="color: white; font-family: 'Ubuntu', sans-serif;">
                      <i class="menu material-icons white-text text-darken-4">account_circle</i>
                      Mi Cuenta
                    </a>
                  </li>
                  <li id="comprobanteNav" class="bold" {!! (Request::is('lab-sec-new-historial') ? 'class="active"' : '') !!}>
                    <a href="{{ URL::to('lab-sec-comprobante') }}" class="collapsible-header  waves-effect waves-teal" style="color: white; margin-bottom: 0px !important; font-family: 'Ubuntu', sans-serif;">
                      <i class="material-icons white-text text-darken-4">content_paste</i>
                      Nuevo Comprobante
                    </a>
                  </li>
                  <li id="comprobantesNav" class="bold" {!! (Request::is('lab-sec-new-historial') ? 'class="active"' : '') !!}>
                    <a href="{{ URL::to('lab-sec-list-comprobante') }}" class="collapsible-header  waves-effect waves-teal" style="color: white; margin-bottom: 0px !important; font-family: 'Ubuntu', sans-serif;">
                      <i class="material-icons white-text text-darken-4">chrome_reader_mode</i>
                      Comprobantes
                    </a>
                  </li>
                  <li id="nuevoHistorialNav" class="bold" {!! (Request::is('lab-sec-new-historial') ? 'class="active"' : '') !!}>
                    <a href="{{ URL::to('lab-sec-new-historial') }}" class="collapsible-header  waves-effect waves-teal" style="color: white; margin-bottom: 0px !important; font-family: 'Ubuntu', sans-serif;">
                      <i class="material-icons white-text text-darken-4">add_circle</i>
                      Nuevo Historial Méd.
                    </a>
                  </li>
                  <li id="historialNav" class="bold" {!! (Request::is('lab-sec-historial') ? 'class="active"' : '') !!}>
                    <a href="{{ URL::to('lab-sec-historial') }}" class="collapsible-header  waves-effect waves-teal" style="color: white; font-family: 'Ubuntu', sans-serif;">
                      <i class="menu material-icons white-text text-darken-4">assignment</i>
                      Historial Médico
                    </a>
                  </li>
                  <li id="analisisNav" class="bold" {!! (Request::is('lab-sec-analisis') ? 'class="active"' : '') !!}>
                    <a href="{{ URL::to('lab-sec-analisis') }}" class="collapsible-header  waves-effect waves-teal" style="color: white; margin-bottom: 0px !important; font-family: 'Ubuntu', sans-serif;">
                      <i class="material-icons white-text text-darken-4">note_add</i>
                      Análisis Médico
                    </a>
                  </li>
                  <li id="ayudaNav" class="bold" {!! (Request::is('lab-sec-ayuda') ? 'class="active"' : '') !!}>
                    <a href="{{ URL::to('lab-sec-ayuda') }}" class="collapsible-header  waves-effect waves-teal" style="color: white; margin-bottom: 0px !important; font-family: 'Ubuntu', sans-serif;">
                      <i class="material-icons white-text text-darken-4">live_help</i>
                      Ayuda
                    </a>
                  </li>
                  <li  class="bold">
                    <a href="{{ URL::to('logout') }}" class="collapsible-header  waves-effect waves-teal" style="color: white; margin-bottom: 0px !important; font-family: 'Ubuntu', sans-serif;">
                      <i class="material-icons white-text text-darken-4">input</i>
                      Cerrar Sesión
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
        </div>
        <div  id="nav1" class="col s1" style="display: none; padding: 0px 0px 0px 0px; background-color: #ffffff;">
          <ul class="side-nav fixed" style=" background-color: #e22715; height: 100%; width: 63%; margin-top: 0%; position: relative">
            <li class="no-padding">
              <ul class="collapsible collapsible-accordion">

                <li id="navCuenta" class="bold menu-aside">
                  <a href="{{ URL::to('lab-sec-account') }}" data-position="right" data-delay="50" data-tooltip="Mi Cuenta" class="tooltipped collapsible-header  waves-effect waves-teal" style="color: white; margin-bottom: 0px !important; font-family: 'Ubuntu', sans-serif;">
                    <i class="icon-margin-left material-icons white-text text-darken-4">account_circle</i>
                  </a>
                </li>

                <li id="navComprobante" class="bold menu-aside">
                  <a href="{{ URL::to('lab-sec-comprobante') }}" data-position="right" data-delay="50" data-tooltip="Nuevo Comprobante" class="tooltipped collapsible-header  waves-effect waves-teal" style="color: white; margin-bottom: 0px !important; font-family: 'Ubuntu', sans-serif;">
                    <i class="icon-margin-left material-icons white-text text-darken-4">content_paste</i>
                  </a>
                </li>

                <li id="navComprobantes" class="bold menu-aside">
                  <a href="{{ URL::to('lab-sec-list-comprobante') }}" data-position="right" data-delay="50" data-tooltip="Comprobantes" class="tooltipped collapsible-header  waves-effect waves-teal" style="color: white; margin-bottom: 0px !important; font-family: 'Ubuntu', sans-serif;">
                    <i class="icon-margin-left material-icons white-text text-darken-4">chrome_reader_mode</i>
                  </a>
                </li>

                <li id="navNuevoHistorial" class="bold menu-aside">
                  <a href="{{ URL::to('lab-sec-new-historial') }}" data-position="right" data-delay="50" data-tooltip="Nuevo Historial Médico" class="tooltipped collapsible-header  waves-effect waves-teal" style="color: white; margin-bottom: 0px !important; font-family: 'Ubuntu', sans-serif;">
                    <i class="icon-margin-left material-icons white-text text-darken-4">add_circle</i>
                  </a>
                </li>

                <li id="navHistorialMedico" class="bold menu-aside">
                  <a href="{{ URL::to('lab-sec-historial') }}" data-position="right" data-delay="50" data-tooltip="Historial Médico" class="tooltipped collapsible-header  waves-effect waves-teal" style="color: white; margin-bottom: 0px !important; font-family: 'Ubuntu', sans-serif;">
                    <i class="icon-margin-left material-icons white-text text-darken-4">assignment</i>
                  </a>
                </li>

                <li id="navAnalisis" class="bold menu-aside">
                  <a href="{{ URL::to('lab-sec-analisis') }}" data-position="right" data-delay="50" data-tooltip="Análisis clínico" class="tooltipped collapsible-header  waves-effect waves-teal" style="color: white; margin-bottom: 0px !important; font-family: 'Ubuntu', sans-serif;">
                    <i class="icon-margin-left material-icons white-text text-darken-4">note_add</i>
                  </a>
                </li>

                <li id="navAyuda" class="bold menu-aside">
                  <a href="{{ URL::to('lab-sec-ayuda') }}" data-position="right" data-delay="50" data-tooltip="Ayuda" class="tooltipped collapsible-header waves-effect waves-teal" style="color: white; font-family: 'Ubuntu', sans-serif;">
                    <i class="icon-margin-left large material-icons white-text text-darken-4">live_help</i>
                    <style media="screen">
                      i.icon-white {
                        color: white;
                      }
                    </style>
                  </a>
                </li>
                <li class="bold menu-aside">
                  <a href="{{ URL::to('logout')}}" data-position="right" data-delay="50" data-tooltip="Cerrar Sesión" class="tooltipped collapsible-header  waves-effect waves-teal" style="color: white; font-family: 'Ubuntu', sans-serif;">
                    <i class="icon-margin-left white-text text-darken-4 material-icons"> input</i>
                  </a>
                </li>

                <!-- <li class="menu-aside">
                  <a data-position="right" data-delay="50" data-tooltip="Otros"  href="{{ URL::to('#')}}" class="tooltipped collapsible-header  waves-effect waves-teal" style="color: white; font-family: 'Ubuntu', sans-serif;">
                    <i class="icon-margin-left white-text text-darken-4 material-icons"> radio_button_checked</i>

                  </a>
                  <div class="collapsible-body" style="">
                    <ul style="margin-left: 0px">
                      <li>
                        <a data-position="right" data-delay="50" data-tooltip="Calificar" class="tooltipped Calificar" href="{{ URL::to('#') }}" style="">
                          <i class="material-icons black-text text-darken-4"> stars</i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li> -->
              </ul>
            </li>
          </ul>
        </div>
        <div id="content" class="col s10" style="display: block; padding: 0px 0px 0px 0px;">
          @yield('content')
        </div>
      </div>
    </div>
    <footer class="page-footer footer-content" style="">
      <div class="footer-copyright">
        <div class="container">
          © Mifarma 2018 - Todos los derechos reservados.
          <!-- <a class="grey-text text-lighten-4 right" href="#!">More Links</a> -->
        </div>
      </div>
    </footer>


    <div id="modalVideo" class="modal bottom-sheet video-call">
      <div class="modal-content video-call">
        <div class="row">
          <div class="col s2">
            <img src="{{ asset('assets/images/logo.png') }}" alt="" width="150px;">
          </div>
          <div class="col s8 center">
            <a href="#">
              <i class="material-icons icon-call">person_add</i>
            </a>
            <a href="#">
              <i class="material-icons icon-call">keyboard_voice</i>
            </a>
            <a id="video-icon" href="#" onclick="verVideo()">
              <i  style="" class="material-icons icon-call">videocam</i>
            </a>
            <a id="video-icon-d" hidden href="#" onclick="ocultarVideo()">
              <i class="material-icons icon-call">videocam_off</i>
            </a>
            <a href=""><i class="material-icons icon-call">network_cell</i></a>
            <a href=""><i class="material-icons icon-call">settings_applications</i></a>
            <a href="#modalFinishCall" onclick="modalFinishCall()" class="modal-trigger "><i class="icon-miss material-icons" style="color: red">call_end</i></a>
            <!-- <a onclick="modalFinishCall()" class="waves-effect icon-miss waves-light modal-trigger" href="#modalFinishCall"><i style="color: red" class="icon-miss material-icons">call_end</i></a> -->

            <!-- <a class="btn-floating btn-large waves-effect waves-light button-green"><i class="material-icons">videocam</i></a> -->
          </div>
          <div class="col s1 right">
            <a onclick="modalMessage()" href="#modalMessage" class="modal-trigger"><i class="material-icons icon-call">message</i></a>
          </div>
          <div class="col s2">
          </div>
        </div>
        <div class="row">
          <div style="position: absolute; right:0; bottom: 0; width: 350px; height: 200px; margin-right:10px; border: 1px solid #FFFFFF; color: #FFFFFF !important">

          </div>
        </div>
      </div>
    </div>


    <div id="modalMessage" class="modal-message modal bottom-sheet" style="left: inherit">
      <div class="row margin-bottom-element" style="position: absolute; background-color: #FFFFFF; color: #000000;width:100%">
        <div class="col s12 center">
          <h5 style="">Chat y mensajeria</h5>
        </div>
      </div>
      <div class="modal-content margin-top-element">
        <div id="chat-contactos" style="display: none" class="row">
          @for ($i = 0; $i <= 3; $i++)
          <div class="row user-contact">
            <div class="contact" style="margin-bottom: 25px;">
              <div class="col s2">
                <a href="#" onclick="verMensajes()">
                  <img class="img-chat-user" src="{{ asset('assets/images/user_chat.jpg') }}" alt="" width="40px" style="border-radius: 50%">
                </a>
              </div>
              <div class="col s10">
                <div class="row">
                  <div class="col s7">
                    <a href="#">
                      <label for="">sebastian</label>
                    </a>
                  </div>
                  <div class="col s5">
                    <label for="">7:22 a.m.</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12">
                    <label for="">hola doctor Ricardo, le escribia ...</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endfor
        </div>
        <div id="chat-mensajeria" class=" ">
          <div class="row margin-bottom-element" style="">
            @for($i=0; $i < 3 ; $i++)
            <div class="row margin-bottom-element">
              <div class="left col s12">

                <div class="row">
                  <div class="col s10">
                    <div class="chip chip-color">
                      <img src="{{ asset('assets/images/doctor.jpg') }}" alt="Contact Person">
                      <a href="#" style="color:#000000">
                        Ricardo S.
                      </a>
                    </div>
                  </div>
                  <div class="col s2">
                    <label style="text-align: right">7:36</label>
                  </div>
                </div>

                <div class="message-chat row" >
                  Hola A Jhon, como estas, mira sobre el malestar que te aqueja
                  en el estomago, de acuerdo a los analisis del laboratorio,
                  tengo que pedirte los siguientes medicamentos.
                </div>
              </div>
            </div>
            <div class="row padding-bottom-element">
              <div class="left col s12">
                <div class="row">
                  <div class="col s2">
                    <label style="text-align: right">7:40</label>
                  </div>
                  <div class="col s10">
                    <div class="chip chip-color right">
                      <img src="{{ asset('assets/images/usuario_chat.jpg') }}" alt="Contact Person">
                      <a href="#" style="color: #000000">
                        Jhon D.
                      </a>
                    </div>
                  </div>
                </div>
                <div class="message-chat-oher" style="margin-top: 0px !important;">
                  Doctor Ricardo, un gusto, si por favor, me ṕodría Enviar
                  la receta indicada, un favor este malestar verdaderamente
                  me incomoda
                </div>
              </div>

            </div>
            @endfor
          </div>

        </div>
      </div>
      <div class="row" style="bottom:0; position: fixed;padding: 5px 0px 0px 25px; min-width: 100%; background-color: #FFFFFF">
        <textarea id="textarea1" class="materialize-textarea" style="min-height: inherit" placeholder="Escriba un mensaje ..." style="color: #000000 !important; line-height: 3rem !important"></textarea>
        <p style="padding-left: 360px; margin-top: -75px">
          <a href="#" style="color: black">
            <i class="material-icons">send</i>
          </a>
        </p>
      </div>
    </div>


    <!-- MODAL SALIR LLAMADA -->
    <div id="modalFinishCall" class="modal" style="background-color: #ffffff; left:0px !important">
      <div class="modal-content center">
        <h5>Finalizar Llamada</h5>
        <p class="align-center">¿Estas seguro que deseas finalizar la llamada?</p>
        <a onclick="irAEmitirReceta()" href="/doctor-receta" class="format waves-effect btn button-green">
          Si
        </a>
        &nbsp;
        <a class="format modal-close waves-effect btn button-orange" style="background-color: #e22715">
          No
        </a>
      </div>
    </div>
    <!-- MODAL MESSAGE -->

  </body>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.5/angular.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/dataTables.materialize.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/materialize.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/js/frontend/lab-sec/lab-sec.js') }}"></script>
    <script type="text/javascript">
      if(screen.width >=992 && screen.width <=1100){
        document.getElementById('img-logotipo').width = '135'
        document.getElementById('nav0').style.height = '400px'
      }else if(screen.width >=1101 && screen.width <=1306){
        document.getElementById('img-logotipo').width = '165'
      }else{
        document.getElementById('img-logotipo').width = '190'
      }
    </script>
  </html>
