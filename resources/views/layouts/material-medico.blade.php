<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Mifarma</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dataTables.materialize.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/mifarma.ico') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/materialize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/doctor/doctor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/icon-material.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-ubuntu.css') }}">

  </head>
  <body>
    <div id="content" style="display: block">
      <header style="background-color: white" >
        <nav class="white">
          <div class="white">
            <div class="">
              <a id="logofarma" href="/" class="brand-logo" style="display:block; width: 16.5%;">
                <img id="img-logotipo" style="margin-left: 8%;padding-top: 2%" src="{{ asset('assets/images/logo_mifarma.jpg') }}" alt="logo" class="" width="190px">
              </a>
            </div>
            <div class="">
              <a id="logofarma1" href="" class="brand-logo" style="display:none; width: 89px; background-color: #ffffff">
                <img id="img-logo" style="padding-left: 12px;" src="{{ asset('assets/images/logomifarma.png') }}" alt="logo" class="" height="65px" width="72px">
              </a>
            </div>
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
                <a onclick="llamadaentranteN()" href="#llamadaentranteN" class="modal-trigger"><i class="material-icons" style="color:#000">mode_comment</i></a>
              </li> -->
              <!-- <li>
                <a onclick="llamadaentrante()" href="#llamadaentrante" class="modal-trigger"><i class="material-icons" style="color:#000">mode_comment</i></a>
              </li> -->

              <li>
                <a href="#"><i class="material-icons icon-notification">notifications</i></a>
              </li>
              <li>
                <a href="{{ URL::to('doctor-account') }}">
                  <img style="position: absolute; margin-left: 30px; margin-top: 13px;border-radius:50px;" src="{{ asset('assets/images/doctor1.jpg') }}" alt="img" height="35px" width="36px" class="img-circle img-responsive pull-left"/>
                </a>
              </li>
              <li class="nav-header">
                <!-- <a style="font-size: 14px; color: #000000;font-family: 'Ubuntu', sans-serif;" href="">{{ Sentinel::getUser()->first_name }} {{ Sentinel::getUser()->last_name }}</a> -->

                <a href="{{ URL::to('doctor-account') }}" onclick="keyleft()" class='dropdown-button black-text' href='#' data-activates='dropdown' style="padding-right: 0px">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <strong style="color: #000000">

                      {{ Sentinel::getUser()->first_name }} {{ Sentinel::getUser()->last_name }}

                  </strong>

                </a>

                <!-- Dropdown Structure -->
                <ul id='dropdown1' class='dropdown-content' style="margin-top:65px; margin-left: 20px;border: 1px solid #d6d2d2">
                  <li><a href="{{ URL::to('doctor-account') }}"><i class="material-icons" style="margin-right: 10px !important">account_circle</i>Mi Cuenta</a></li>
                  <li class="divider"></li>
                  <li><a href="{{ URL::to('doctor-consulta') }}"><i class="material-icons" style="margin-right: 10px !important">assignment_turned_in</i>Consultas</a></li>
                  <li><a href="{{ URL::to('doctor-list-historial') }}"><i class="material-icons" style="margin-right: 10px !important">assignment</i>Historial Médico</a></li>
                  <li><a href="{{ URL::to('doctor-analisis') }}"><i class="material-icons" style="margin-right: 10px !important">note_add</i>Análisis Clínico</a></li>
                  <li><a href="{{ URL::to('doctor-receta') }}"><i class="material-icons" style="margin-right: 10px !important">local_pharmacy</i>Recetas</a></li>
                  <li><a href="{{ URL::to('doctor-ingreso') }}"><i class="material-icons" style="margin-right: 10px !important">monetization_on</i>Ingresos</a></li>
                  <li><a href="{{ URL::to('doctor-ayuda') }}"><i class="material-icons" style="margin-right: 10px !important">live_help</i>Ayuda</a></li>
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
                  <li id="micuentaNav" class="bold">
                    <a href="{{ URL::to('doctor-account') }}" class="collapsible-header  waves-effect waves-teal" style="color: white; font-family: 'Ubuntu', sans-serif;">
                      <i class="menu material-icons white-text text-darken-4">account_circle</i>
                      Mi Cuenta
                    </a>
                  </li>
                  <li id="consultaNav" class="bold">
                    <a href="{{ URL::to('doctor-consulta') }}" class="collapsible-header  waves-effect waves-teal" style="color: white; margin-bottom: 0px !important; font-family: 'Ubuntu', sans-serif;">
                      <i class="material-icons white-text text-darken-4">assignment_turned_in</i>
                      Consultas
                    </a>
                  </li>
                  <li id="historialNav" class="bold">
                    <a href="{{ URL::to('doctor-list-historial') }}" class="collapsible-header  waves-effect waves-teal" style="color: white; margin-bottom: 0px !important; font-family: 'Ubuntu', sans-serif;">
                      <i class="material-icons white-text text-darken-4">assignment</i>
                      Historial Médico
                      <!-- doctor-historial -->
                    </a>
                  </li>
                  <li id="analisisNav" class="bold">
                    <a href="{{ URL::to('doctor-analisis') }}" class="collapsible-header  waves-effect waves-teal" style="color: white; margin-bottom: 0px !important; font-family: 'Ubuntu', sans-serif;">
                      <i class="material-icons white-text text-darken-4">note_add</i>
                      Análisis Clínico
                    </a>
                  </li>
                  <li id="recetasNav" class="bold">
                    <a href="{{ URL::to('doctor-receta') }}" class="collapsible-header  waves-effect waves-teal" style="color: white; margin-bottom: 0px !important; font-family: 'Ubuntu', sans-serif;">
                      <i class="material-icons white-text text-darken-4">local_pharmacy</i>
                      Recetas
                    </a>
                  </li>
                  <li id="ingresoNav" class="bold">
                    <a href="{{ URL::to('doctor-ingreso') }}" class="collapsible-header  waves-effect waves-teal" style="color: white; margin-bottom: 0px !important; font-family: 'Ubuntu', sans-serif;">
                      <i class="material-icons white-text text-darken-4">monetization_on</i>
                      Ingresos
                    </a>
                  </li>
                  <!-- <li id="ingresoNav" class="bold">
                    <a href="{{ URL::to('doctor-chat') }}" class="collapsible-header  waves-effect waves-teal" style="color: white; margin-bottom: 0px !important; font-family: 'Ubuntu', sans-serif;">
                      <i class="material-icons white-text text-darken-4">mode_comment</i>
                      Chat | Mensajería
                    </a>
                  </li> -->
                  <li id="ayudaNav" class="bold">
                    <a href="{{ URL::to('doctor-ayuda') }}" class="collapsible-header waves-effect waves-teal" style="color: white; font-family: 'Ubuntu', sans-serif;">
                      <i class="large material-icons white-text text-darken-4">live_help</i>
                        Ayuda
                        <style media="screen">
                          i.icon-white {
                            color: white;
                          }
                        </style>
                      </a>
                  </li>
                  <li class="bold">
                    <a href="{{ URL::to('logout')}}" class="collapsible-header  waves-effect waves-teal" style="color: white; font-family: 'Ubuntu', sans-serif;">
                      <i class="white-text text-darken-4 material-icons"> input</i>
                      Cerrar Sesion
                    </a>
                  </li>

                  <!-- <li>
                    <a href="{{ URL::to('#')}}" class="collapsible-header  waves-effect waves-green" style="color: white; font-family: 'Ubuntu', sans-serif;">
                      <i class="white-text text-darken-4 material-icons"> radio_button_checked</i>
                      Otros
                    </a>
                    <div class="collapsible-body" style="">
                      <ul style="margin-left: 10px">
                        <li>
                          <a href="{{ URL::to('#') }}" style="">
                            <i class="material-icons black-text text-darken-4"> stars</i>
                            Calificar
                          </a>
                        </li>
                      </ul>
                    </div>
                  </li> -->
                </ul>
              </li>
            </ul>
        </div>
        <div  id="nav1" class="col s1" style="display: none; padding: 0px 0px 0px 0px; background-color: #ffffff;">
          <ul class="side-nav fixed" style=" background-color: #e22715; height: 100%; width: 63%; margin-top: 0%; position: relative">
            <li class="no-padding">
              <ul class="collapsible collapsible-accordion">
                <li></li>
                <li id="navCuenta" class="bold menu-aside">
                  <a href="{{ URL::to('doctor-account') }}" class="collapsible-header  waves-effect waves-teal tooltipped" data-position="right" data-delay="50" data-tooltip="Mi Cuenta" style="color: white; font-family: 'Ubuntu', sans-serif;">
                    <i class="icon-margin-left material-icons white-text text-darken-4">account_circle</i>
                  </a>
                  <!-- <div class="collapsible-body">
                    <ul >
                      <li><a href="{{ URL::to('doctor-account') }} " data-position="right" data-delay="50" data-tooltip="Mi Perfil" class="tooltipped"><i style="; postition: relative" class="material-icons">assignment_ind</i></a></li>
                      <li><a href="{{ URL::to('doctor-pass') }}" data-position="right" data-delay="50" data-tooltip="Cambiar contraseña" class="tooltipped"><i style="postition: relative" class="material-icons">lock</i></a></li>
                    </ul>
                  </div> -->
                </li>
                <li id="navConsulta" class="bold menu-aside">
                  <a href="{{ URL::to('doctor-consulta') }}" data-position="right" data-delay="50" data-tooltip="Consultas" class="tooltipped collapsible-header  waves-effect waves-teal" style="color: white; margin-bottom: 0px !important; font-family: 'Ubuntu', sans-serif;">
                    <i class="icon-margin-left material-icons white-text text-darken-4">assignment_turned_in</i>
                  </a>
                </li>
                <li id="navHistorialMedico" class="bold menu-aside">
                  <a href="{{ URL::to('doctor-historial-medico') }}" data-position="right" data-delay="50" data-tooltip="Historial Médico" class="tooltipped collapsible-header  waves-effect waves-teal" style="color: white; margin-bottom: 0px !important; font-family: 'Ubuntu', sans-serif;">
                    <i class="icon-margin-left material-icons white-text text-darken-4">assignment</i>
                  </a>
                </li>
                <li id="navAnalisis" class="bold menu-aside">
                  <a href="{{ URL::to('doctor-analisis') }}" data-position="right" data-delay="50" data-tooltip="Análisis clínico" class="tooltipped collapsible-header  waves-effect waves-teal" style="color: white; margin-bottom: 0px !important; font-family: 'Ubuntu', sans-serif;">
                    <i class="icon-margin-left material-icons white-text text-darken-4">note_add</i>
                  </a>
                </li>
                <li id="navReceta" class="bold menu-aside">
                  <a href="{{ URL::to('doctor-receta') }}" data-position="right" data-delay="50" data-tooltip="Recetas" class="tooltipped collapsible-header  waves-effect waves-teal" style="color: white; margin-bottom: 0px !important; font-family: 'Ubuntu', sans-serif;">
                    <i class="icon-margin-left material-icons white-text text-darken-4">local_pharmacy</i>
                  </a>
                </li>
                <li id="navIngreso" class="bold menu-aside">
                  <a href="{{ URL::to('doctor-ingreso') }}" data-position="right" data-delay="50" data-tooltip="Ingresos" class="tooltipped collapsible-header  waves-effect waves-teal" style="color: white; margin-bottom: 0px !important; font-family: 'Ubuntu', sans-serif;">
                    <i class="icon-margin-left material-icons white-text text-darken-4">monetization_on</i>
                  </a>
                </li>
                <!-- <li id="ingresoNav" class="bold menu-aside">
                  <a href="{{ URL::to('doctor-chat') }}" data-position="right" data-delay="50" data-tooltip="Chat | Mensajería" class="tooltipped collapsible-header  waves-effect waves-teal" style="color: white; margin-bottom: 0px !important; font-family: 'Ubuntu', sans-serif;">
                    <i class="icon-margin-left material-icons white-text text-darken-4">mode_comment</i>
                  </a>
                </li> -->
                <li id="navAyuda" class="bold menu-aside">
                  <a href="{{ URL::to('doctor-ayuda') }}" data-position="right" data-delay="50" data-tooltip="Ayuda" class="tooltipped collapsible-header waves-effect waves-teal" style="color: white; font-family: 'Ubuntu', sans-serif;">
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
        <div id="contents" class="col s10" style="display: block; padding: 0px 0px 0px 0px;">
          @yield('content')
        </div>
      </div>
        <!--Llamada-->
      <footer class="page-footer footer-content">
          <div class="footer-copyright">
            <div class="container">
              © Mifarma 2018 - Todos los derechos reservados.
              <!-- <a class="grey-text text-lighten-4 right" href="#!">More Links</a> -->
            </div>
          </div>
        </footer>
    </div>
    <div id="modalMessage" class="modal-message modal bottom-sheet" style="left: inherit">
      <div class="row margin-bottom-element" style="position: absolute; background-color: #FFFFFF; color: #000000;width:100%">
        <div class="col s12 center">
          <h5 style="">Chat y mensajeria</h5>
        </div>
      </div>
      <div class="modal-content margin-top-element">
        <!-- <div class="row margin-bottom-element border-bottom">
          <div class="col s12 center">
            <h5>Chat y mensajeria</h5>
          </div>
        </div> -->
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

    <div id="llamadaentrante" class="col s10" style="display: none; width: 100%; height: 100vh; padding-left: 0px; padding-right: 0px">
      <div class="modal-" style="padding: 0px 0px 0px 0px; background-color: #181818; height:100vh">
        <div class="row" style="padding-top: 25px;background-color: #181818">
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
            <!-- <a href="#modalFinishCall" onclick="modalFinishCall()" class="modal-trigger "><i class="icon-miss material-icons" style="color: red">call_end</i></a> -->
            <!-- <a onclick="modalFinishCall()" class="waves-effect icon-miss waves-light modal-trigger" href="#modalFinishCall"><i style="color: red" class="icon-miss material-icons">call_end</i></a> -->

            <!-- <a class="btn-floating btn-large waves-effect waves-light button-green"><i class="material-icons">videocam</i></a> -->
          </div>

          <div class="col s1 right">
            <a onclick="modalMessage()" href="#modalMessage" class="modal-trigger"><i class="material-icons icon-call">message</i></a>
          </div>

          <div class="col s2">
          </div>
        </div>
        <!-- <p>Llamada Entrante</p> -->
        <div class="center">
          <img class="img-gif" src="https://www.rogers.com/web/smb/bss/images/widget-loader-lg_no-lang.gif" alt="" height="100px">

        </div>
        <div id="call" style="background-color: #181818">
          <form id="newCall">
            <!--<input id="callUserName" placeholder="Username (alice)"><br>-->

            <audio id="ringback" src='assets/js/video/style/ringback.wav' loop></audio>
            <audio id="ringtone" src='assets/js/video/style/phone_ring.wav' loop></audio>

            <!--<button id="call">Call</button>-->
            <br><br>
            <div style="text-align: center;">

              <div class="row">
                <div class="col s4">

                </div>
                <div class="col s4" style="padding-left: 0px; padding-right: 0px">
                  <div class="row">
                    <!-- <div class="col s m1">

                    </div> -->
                    <div class="col s6 m6" style="padding-left: 0px">
                      <button href="" id="answer" class="btn" style="background-color: #868686;">
                        <i class="material-icons left">call</i>
                        Responder
                        <!-- <img src="{{asset('assets/images/call.png')}}" alt="" width="55px"> -->
                      </button>
                    </div>
                    <div class="col s6 m6">
                      <button href="" class="btn" id="hangup" style="background-color: red">
                        <i class="material-icons left">call_end</i>
                        Colgar
                        <!-- <img src="{{asset('assets/images/callend.png')}}" alt="" width="65px"> -->
                      </button>
                    </div>
                    <!-- <div class="col s1 m1">

                    </div> -->
                  </div>
                </div>
                <div class="col s4">

                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div id="llamada" class="col s10" style="display: none;  width: 100%; height: 100vh; padding-left: 0px; padding-right: 0px">
      <div class="modal-" style="padding: 0px 15px 66px 15px; background-color: #181818; height:auto">
        <div class="row" style="padding-top: 25px;background-color: #181818;">
          <div class="col s2" style="padding-lef:0px">
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
            <!-- <a href="" id="" class="modal-trigger"><i class="icon-miss material-icons" style="color: red">call_end</i></a> -->
            <!-- <a onclick="modalFinishCall()" class="waves-effect icon-miss waves-light modal-trigger" href="#modalFinishCall"><i style="color: red" class="icon-miss material-icons">call_end</i></a> -->

            <!-- <a class="btn-floating btn-large waves-effect waves-light button-green"><i class="material-icons">videocam</i></a> -->
          </div>

          <div class="col s1 right">
            <a onclick="modalMessage()" href="#modalMessage" class="modal-trigger"><i class="material-icons icon-call">message</i></a>
          </div>

          <div class="col s2">
          </div>
        </div>

        <!-- <p>Llamada Proceso</p> -->
        <div class="frame">
          <div class="row" style="padding-top: 25px">
            <div class="col s8 responsive-video">

              <video style="border: solid 1px white; width: 100%; height: 520px;" id="incoming" autoplay></video>
            </div>
            <div class="col s4">
              <div class="responsive-video">
                <video style="border: solid 1px white; width: 99%" id="outgoing" autoplay muted></video>
              </div>
              <br><br><br>
              <div id="call">
                <form id="newCall">
                  <div class="center">
                    <button id="hangup" class="btn" style="background-color: red">
                      Finalizar Llamada
                      <!-- <img src="{{asset('assets/images/callend.png')}}" alt="" width="65px"> -->
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>

        </div>

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
  <script type="text/javascript" src="{{ asset('assets/js/frontend/doctor/doctor.js') }}"></script>
  <script type="text/javascript">
  // function llamadaentrante(){
  //   $('#llamadaentrante').modal();
  // }
  </script>
  <!-- Inicio Script Llamada -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
  <script type="text/javascript" src="{{ asset('assets/js/video/sinch.min.js') }}"></script>
  <script>
    if(screen.width >=992 && screen.width <=1100){
      document.getElementById('img-logotipo').width = '135'
      document.getElementById('nav0').style.height = '600px'
    }else if(screen.width >=1101 && screen.width <=1306){
      document.getElementById('img-logotipo').width = '165'
    }else{
      document.getElementById('img-logotipo').width = '190'
    }
    function llamadaentrante(){
      $('#llamadaentrante').modal();

      document.getElementById('llamadaentrante').style.width = '100%'
      document.getElementById('llamadaentrante').style.paddingRight = '0px'
      document.getElementById('llamadaentrante').style.paddingLeft = '0px'

    }
    function llamada(){
      $('#llamadaentrante').modal('close');
      $('#llamada').modal();
      document.getElementById('llamada').style.width = '100%'
      document.getElementById('llamada').style.paddingRight = '0px'
      document.getElementById('llamada').style.paddingLeft = '0px'

    }
    function llamadaN(){
      $('#llamada').modal('close');
      // document.getElementById('llamadaentrante').style.width = '100%'
      // document.getElementById('llamadaentrante').style.paddingRight = '0px'
      // document.getElementById('llamadaentrante').style.paddingLeft = '0px'

    }
    function llamadaentranteN(){
      $('#llamadaentrante').modal('close');
      document.getElementById('llamadaentrante').style.width = '100%'
    }

    var global_username = '';
    console.log("desdeJs");
    var estadollamada=true;

    /*** After successful authentication, show user interface ***/
    var showUI = function() {
      console.log("shdfgdfgowUI");
      $('div#call').show();
      $('h3#login').css('display', 'none');
      $('video').show();
      $('span#username').text(global_username);
    }
    /*** If no valid session could be started, show the login interface ***/
    var clearError = function() {
      $('div.error').hide();
    }

    var login = function(){
      console.log("login");
      //event.preventDefault();
      $('button#loginUser').attr('disabled', true);
      $('button#createUser').attr('disabled', true);
      clearError();

      var signInObj = {username: 'alexis', password: '123456'};

      //Use Sinch SDK to authenticate a user
      sinchClient.start(signInObj, function() {
        global_username = signInObj.username;
        //On success, show the UI
        showUI();

        //Store session & manage in some way (optional)
        localStorage[sessionName] = JSON.stringify(sinchClient.getSession());
      }).fail(handleError);

    }

    var showLoginUI = function() {
      console.log("showLoginUI");
      //$('form#userForm').css('display', 'inline');
      login();
    }

    //*** Set up sinchClient ***/

    sinchClient = new SinchClient({
      applicationKey: '798996bb-fc49-4369-90ad-fab14011afce',
      capabilities: {calling: true, video: true},
      supportActiveConnection: true,
      //Note: For additional loging, please uncomment the three rows below
      onLogMessage: function(message) {
        console.log(message);
      },
    });

    sinchClient.startActiveConnection();

    /*** Name of session, can be anything. ***/

    var sessionName = 'VIDEO-' + sinchClient.applicationKey;


    /*** Check for valid session. NOTE: Deactivated by default to allow multiple browser-tabs with different users. ***/
    localStorage.removeItem(sessionName);
    var sessionObj = JSON.parse(localStorage[sessionName] || '{}');
    if(sessionObj.userId) {
      sinchClient.start(sessionObj)
        .then(function() {
          global_username = sessionObj.userId;
          //On success, show the UI
          showUI();
          //Store session & manage in some way (optional)
          localStorage[sessionName] = JSON.stringify(sinchClient.getSession());
        })
        .fail(function() {
          //No valid session, take suitable action, such as prompting for username/password, then start sinchClient again with login object
          showLoginUI();
        });
    }
    else {
      showLoginUI();
    }


    var callListeners = {
      onCallProgressing: function(call) {
        $('audio#ringback').prop("currentTime",0);
        $('audio#ringback').trigger("play");
        // llamadaentrante()
        //Report call stats
        $('div#callLog').append('<div id="stats">Ringing...</div>');
      },
      onCallEstablished: function(call) {
        $('video#outgoing').attr('src', call.outgoingStreamURL);
        $('video#incoming').attr('src', call.incomingStreamURL);
        $('audio#ringback').trigger("pause");
        $('audio#ringtone').trigger("pause");
        // llamadaentranteN()
        // llamada()
        //Report call stats
        var callDetails = call.getDetails();
        $('div#callLog').append('<div id="stats">Answered at: '+(callDetails.establishedTime && new Date(callDetails.establishedTime))+'</div>');
      },
      onCallEnded: function(call) {
        /* ========= LLAMADA FINALIZADA========= */
        $('#content').css('display', 'inline');
        $('#llamadaentrante').css('display', 'none');
        // llamadaentranteN()
        // llamadaN()
        $('#llamada').css('display', 'none');
        /* ========= FIN LLAMADA FINALIZADA ========= */

        $('audio#ringback').trigger("pause");
        $('audio#ringtone').trigger("pause");

        $('video#outgoing').attr('src', '');
        $('video#incoming').attr('src', '');

        $('button').removeClass('incall');
        $('button').removeClass('callwaiting');

        //Report call stats
        var callDetails = call.getDetails();
        $('div#callLog').append('<div id="stats">Ended: '+new Date(callDetails.endedTime)+'</div>');
        $('div#callLog').append('<div id="stats">Duration (s): '+callDetails.duration+'</div>');
        $('div#callLog').append('<div id="stats">End cause: '+call.getEndCause()+'</div>');
        if(call.error) {
          $('div#callLog').append('<div id="stats">Failure message: '+call.error.message+'</div>');
        }
      }
    }

    /*** Set up callClient and define how to handle incoming calls ***/

    var callClient = sinchClient.getCallClient();
    callClient.initStream().then(function() { // Directly init streams, in order to force user to accept use of media sources at a time we choose
      $('div.frame').not('#chromeFileWarning').show();
    });
    var call;

    callClient.addEventListener({
      onIncomingCall: function(incomingCall) {
      //Play some groovy tunes
      $('audio#ringtone').prop("currentTime",0);
      $('audio#ringtone').trigger("play");


        $('#content').css('display', 'none');

        $('#llamadaentrante').css('display', 'inline');
        // llamadaentrante()
        // llamadaN()
        $('#llamada').css('display', 'none');



      //Print statistics
      $('div#callLog').append('<div id="title">Incoming call from ' + incomingCall.fromId + '</div>');
      $('div#callLog').append('<div id="stats">Ringing...</div>');
      $('button').addClass('incall');

      //Manage the call object
        call = incomingCall;
        call.addEventListener(callListeners);
      $('button').addClass('callwaiting');

      //call.answer(); //Use to test auto answer
      //call.hangup();
      }
    });

    $('button#answer').click(function(event) {
      console.log("================================");
      event.preventDefault();

      if($(this).hasClass("callwaiting")) {
        clearError();
        console.log("================================");

        try {
          estadollamada = false;
          // llamadaentrante();
          $('#llamadaentrante').css('display', 'none');
          // llamada();
          $('#llamada').css('display', 'inline');
          $('#content').css('display', 'none');



          call.answer();


          $('button').removeClass('callwaiting');
        }
        catch(error) {
          handleError(error);
        }
      }
    });

    /*** Make a new data call ***/

    $('button#call').click(function(event) {
      event.preventDefault();

      if(!$(this).hasClass("incall") && !$(this).hasClass("callwaiting")) {
        clearError();

        $('button').addClass('incall');

        $('div#callLog').append('<div id="title">Calling ' + $('input#callUserName').val()+'</div>');

        console.log('Placing call to: ' + $('input#callUserName').val());
        call = callClient.callUser($('input#callUserName').val());

        call.addEventListener(callListeners);
      }
    });

    /*** Hang up a call ***/

    $('button#hangup').click(function(event) {
      console.log("Terminar llamada");
      event.preventDefault();

      if($(this).hasClass("incall")) {
        clearError();
        estadollamada=true;

            $('#content').css('display', 'inline');
            // llamadaentranteN()
            // llamadaN()
            $('#llamadaentrante').css('display', 'none');
            $('#llamada').css('display', 'none');

        console.info('Will request hangup..');

        call && call.hangup();
      }
    });


    /*** Handle errors, report them and re-enable UI ***/

    var handleError = function(error) {
      //Enable buttons
      $('button#createUser').prop('disabled', false);
      $('button#loginUser').prop('disabled', false);

      //Show error
      $('div.error').text(error.message);
      $('div.error').show();
    }

    /** Always clear errors **/


    /** Chrome check for file - This will warn developers of using file: protocol when testing WebRTC **/
    if(location.protocol == 'file:' && navigator.userAgent.toLowerCase().indexOf('chrome') > -1) {
      $('div#chromeFileWarning').show();
    }

    $('button').prop('disabled', false); //Solve Firefox issue, ensure buttons always clickable after load



  </script>
   <!-- Fin Script Llamada -->

  </html>
