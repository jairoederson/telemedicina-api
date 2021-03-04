<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Mifarma</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dataTables.materialize.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/mifarma.ico') }}">
    <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/icon-material.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/paciente/paciente.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/materialize.css') }}">

    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}"/> -->

    <!-- <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet" type="text/css"/> -->
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/lib.css') }}"> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-ubuntu.css') }}">

  </head>
  <body>
    <div class="">
      <header style="background-color: white" >
        <nav class="white">
          <div class="white">
            <div id="logofarma" class="left" style="display: block">
              <a href="/" class="brand-logo" style="">
                <img id="img-logotipo" style="margin-left: 8%;padding-top: 2%" src="{{ asset('assets/images/logo_mifarma.jpg') }}" alt="logo" class="">
              </a>
            </div>
            <div id="logofarma1" class="" style="display: none">
              <a href="" class="brand-logo">
                <img id="img-logo" style="padding-left: 10px;padding-top: 0%" src="{{ asset('assets/images/logomifarma.png') }}" alt="logo" height="65px"  width="72px">
              </a>
            </div>
            <a href="#">
              <ul id="hamb" class="left hide-on-med-and-down" style="display: none; margin-left: 7.2%">
                <li class="nav-header">
                  <a id="hamburg" onclick="mostrar();" class="" style="font-family: 'Ubuntu', sans-serif; padding-top:0px; padding-bottom:0px">
                    <i class="material-icons black-text text-darken-4" style="margin-right: 0px !important;">dehaze</i>
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
              <li class="nav-header">
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
              <!-- <li style="position: absolute; margin-left: 25px"> -->
                <!-- <a href="" style=""> -->
                <!-- </a> -->
              <!-- </li> -->
              <li style="text-align: center">
                <a href="#" class="center"><i class="material-icons icon-notification">notifications</i></a>
              </li>
              <!-- <li>
                <a href="#"><i class="material-icons icon-message">mode_comment</i></a>
              </li> -->
              <li>
                <img style="position: absolute; margin-left: 40px;margin-top:13px;border-radius:50px;" src="https://fedspendingtransparency.github.io/assets/img/user_personas/repurposer_mug.jpg" alt="img" height="40px" width="40px" class="img-circle img-responsive pull-left"/>
              </li>
              <li class="nav-header">
                <!-- <a style="font-size: 14px; color: #000000;font-family: 'Ubuntu', sans-serif;" href="">{{ Sentinel::getUser()->first_name }} {{ Sentinel::getUser()->last_name }}</a> -->
                <a onclick="keyleft()" class='dropdown-button black-text' href='#' data-activates='dropdown'>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <strong style="color: #000000">
                    {{ Sentinel::getUser()->first_name }} {{ Sentinel::getUser()->last_name }}
                  </strong>

                </a>
                <!-- Dropdown Structure -->
                <ul id='dropdown1' class='dropdown-content' style="margin-top:65px; margin-left: 20px; border: 1px solid #d6d2d2">
                  <li><a href="{{ URL::to('user-consulta') }}"><i class="material-icons" style="margin-right: 10px !important">assignment_turned_in</i>Nueva Consulta</a></li>
                  <li class="divider"></li>
                  <li><a href="{{ URL::to('user-historial') }}"><i class="material-icons" style="margin-right: 10px !important">view_list</i>Historial Consultas</a></li>
                  <li><a href="{{ URL::to('user-historial-medico') }}"><i class="material-icons" style="margin-right: 10px !important">assignment</i>Historial Médico</a></li>
                  <li><a href="{{ URL::to('user-analisis') }}"><i class="material-icons" style="margin-right: 10px !important">note_add</i>Análisis Clínico</a></li>
                  <li><a href="{{ URL::to('user-recetas') }}"><i class="material-icons" style="margin-right: 10px !important">local_pharmacy</i>Recetas</a></li>
                  <li><a href="{{ URL::to('user-pagos') }}"><i class="material-icons" style="margin-right: 10px !important">monetization_on</i>Mi monedero</a></li>
                  <li><a href="{{ URL::to('my-account') }}"><i class="material-icons" style="margin-right: 10px !important">account_circle</i>Mi Cuenta</a></li>
                  <li><a href="{{ URL::to('user-ayuda') }}"><i class="material-icons" style="margin-right: 10px !important">live_help</i>Atención al cliente</a></li>
                  <li class="divider"></li>
                  <li><a href="{{ URL::to('logout') }}"><i class="material-icons">input</i>Cerrar Sesión</a></li>
                </ul>

              </li>
              <li class="nav-header-bg">
                <a class="dropdown-button black-text" data-activates='dropdown1'>
                  <i id="keyleft"  style="margin-right: 0px;color: #000000; position: absolute;"class="material-icons">arrow_drop_down</i>
                </a>
              </li>
              <li>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;
              </li>
              <!-- <i id="keydown"  style="display:none; color: #000000; position: absolute; margin-left:15%;"class="material-icons">keyboard_arrow_down</i> -->
            </ul>
          </div>
        </nav>
      </header>
      <div class="row">
        <div id="nav0" class="col s2 m2" style="padding: 0px 0px 0px 0px; background-color: #e22715 !important">
          <ul id="nav-mobile" class="side-nav fixed" style="background-color: #e22715; width: 100%; position: relative">
            <li class="no-padding">
              <ul class="collapsible collapsible-accordion">
                <li id="consultaNav" class="bold">
                  <a href="{{ URL::to('user-consulta') }}" class="collapsible-header  waves-effect waves-teal" style="color: white; margin-bottom: 0px !important; font-family: 'Ubuntu', sans-serif;">
                    <i class="material-icons white-text text-darken-4">assignment_turned_in</i>
                    Nueva Consulta
                  </a>
                </li>
                <li id="historialNav" class="bold">
                  <a href="{{ URL::to('user-historial') }}" class="collapsible-header waves-effect waves-teal" style="color: white; font-family: 'Ubuntu', sans-serif;">
                    <i class="material-icons white-text text-darken-4">view_list</i>
                    Historial de Consultas
                  </a>
                </li>
                <li id="historialMedicoNav" class="bold">
                  <a href="{{ URL::to('user-historial-medico') }}" class="collapsible-header waves-effect waves-teal" style="color: white; font-family: 'Ubuntu', sans-serif;">
                    <i class="material-icons white-text text-darken-4">assignment</i>
                    Historial Médico
                  </a>
                </li>
                <li id="analisisNav" class="bold">
                  <a href="{{ URL::to('user-analisis') }}" class="collapsible-header waves-effect waves-teal" style="color: white; font-family: 'Ubuntu', sans-serif;">
                    <i class="material-icons white-text text-darken-4">note_add</i>
                    Análisis Médico
                  </a>
                </li>
                <li id="recetasNav" class="bold">
                  <a href="{{ URL::to('user-recetas') }}" class="collapsible-header  waves-effect waves-teal" style="color: white; margin-bottom: 0px !important; font-family: 'Ubuntu', sans-serif;">
                    <i class="material-icons white-text text-darken-4">local_pharmacy</i>
                    Recetas
                  </a>
                </li>
                <li id="pagosNav" class="bold">
                  <a href="{{ URL::to('user-pagos') }}" class="collapsible-header waves-effect waves-teal" style="color: white; font-family: 'Ubuntu', sans-serif;">
                    <i class="large material-icons white-text text-darken-4">monetization_on</i>
                    Mi monedero
                    <style media="screen">
                    i.icon-white {
                      color: white;
                    }
                    </style>
                  </a>
                </li>

                <li id="ayudaNav" class="bold">
                  <a href="{{ URL::to('user-ayuda') }}" class="collapsible-header  waves-effect waves-teal" style="color: white; margin-bottom: 0px !important; font-family: 'Ubuntu', sans-serif;">
                    <i class="material-icons white-text text-darken-4">live_help</i>
                    Atención al cliente
                  </a>
                </li>
                <li class="bold">
                  <a href="{{ URL::to('logout')}}" class="collapsible-header  waves-effect waves-teal" style="color: white; font-family: 'Ubuntu', sans-serif;">
                    <i class="white-text text-darken-4 material-icons"> input</i>
                    Cerrar Sesion
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <div id="nav1" class="col s1 m1" style="display: none; height: 100%; padding: 0px 0px 0px 0px; background-color: #ffffff">
          <ul class="side-nav fixed" style="background-color: #e22715; height: 100%; width: 63%;  position: relative">
            <li class="no-padding">
              <ul class="collapsible collapsible-accordion">
                <li id="navConsulta" class="bold active" >
                  <a href="{{ URL::to('user-consulta') }}" data-position="right" data-delay="50" data-tooltip="Nueva Consulta" class="tooltipped collapsible-header  waves-effect waves-teal" style="color: white; margin-bottom: 0px !important; font-family: 'Ubuntu', sans-serif;">
                    <i class="icon-margin-left material-icons white-text text-darken-4">assignment_turned_in</i>
                  </a>
                </li>
                <li id="navHistorial" class="bold">
                  <a href="{{ URL::to('user-historial') }}" data-position="right" data-delay="50" data-tooltip="Historial de Consultas" class="tooltipped collapsible-header waves-effect waves-teal" style="color: white; font-family: 'Ubuntu', sans-serif;">
                    <i class="icon-margin-left material-icons white-text text-darken-4">view_list</i>
                  </a>
                </li>
                <li id="navHistorialMedico" class="bold">
                  <a href="{{ URL::to('user-historial-medico') }}" data-position="right" data-delay="50" data-tooltip="Historial Médico" class="tooltipped collapsible-header waves-effect waves-teal" style="color: white; font-family: 'Ubuntu', sans-serif;">
                    <i class="icon-margin-left material-icons white-text text-darken-4">assignment</i>
                  </a>
                </li>
                <li id="navAnalisis" class="bold">
                  <a href="{{ URL::to('user-analisis') }}" data-position="right" data-delay="50" data-tooltip="Análisis Clínico" class="tooltipped collapsible-header waves-effect waves-teal" style="color: white; font-family: 'Ubuntu', sans-serif;">
                    <i class="icon-margin-left material-icons white-text text-darken-4">note_add</i>
                  </a>
                </li>
                <li id="navReceta" class="bold">
                  <a href="{{ URL::to('user-recetas') }}" data-position="right" data-delay="50" data-tooltip="Recetas" class="tooltipped collapsible-header waves-effect waves-teal" style="color: white; font-family: 'Ubuntu', sans-serif;">
                    <i class="icon-margin-left material-icons white-text text-darken-4">local_pharmacy</i>
                  </a>
                </li>
                <li id="navMonedero" class="bold">
                  <a href="{{ URL::to('user-pagos') }}" data-position="right" data-delay="50" data-tooltip="Mi monedero" class="tooltipped collapsible-header waves-effect waves-teal" style="color: white; font-family: 'Ubuntu', sans-serif;">
                    <i class="icon-margin-left large material-icons white-text text-darken-4">monetization_on</i>
                    <style media="screen">
                    i.icon-white {
                      color: white;
                    }
                    </style>
                  </a>
                </li>

                <li id="navAyuda" class="bold">
                  <a href="{{ URL::to('user-ayuda') }}" data-position="right" data-delay="50" data-tooltip="Atención al Cliente" class="tooltipped collapsible-header  waves-effect waves-teal" style="color: white; margin-bottom: 0px !important; font-family: 'Ubuntu', sans-serif;">
                    <i class="icon-margin-left material-icons white-text text-darken-4">live_help</i>
                  </a>
                </li>
                <li class="bold">
                  <a href="{{ URL::to('logout')}}" data-position="right" data-delay="50" data-tooltip="Cerrar Sesión" class="tooltipped collapsible-header  waves-effect waves-teal" style="color: white; font-family: 'Ubuntu', sans-serif;">
                    <i class="icon-margin-left white-text text-darken-4 material-icons"> input</i>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <div id="content" class="col s10" style="padding: 0px;">
          @yield('content')
        </div>
      </div>
    </div>
    <!-- FOOTER -->
    <div style="width:100%; height:55px; color: #FFFFFF; background-color: #e22715 !important">
      <div class="footer-copyright">
        <div class="container center" style="padding-top: 15px;">
          © Mifarma 2018 - Todos los derechos reservados.
          <!-- <a class="grey-text text-lighten-4 right" href="#!">More Links</a> -->
        </div>
      </div>
    </div>
    <!-- FOOTER END -->
    <div id="modal1" class="modal">
       <div class="modal-head" style="text-align: right">
         <a class="waves-effect modal-action modal-close" style="margin-top: 10px"><i class="material-icons right icon-color" style="font-size: 35px; position: relative">cancel</i></a>
       </div>
       <div class="modal-content" style="padding:10px 20px 0px 20px">
         <div class="row">
           <div class="col s4" style="text-align: center">
             <img src="{{ asset('assets/images/logo_mifarma.jpg') }}" width="150px" alt=""> <br>
             <p><b>CENTRO DE ATENCION AL PACIENTE - MIFARMA</b></p>
           </div>
           <div class="col s4">
           </div>
           <div class="col s4" style="padding-left: 50px">
             <span style="font-size: 18px">Alejandro T.</span><br>
             <span>Medico Gastroenterólogo</span><br>
             <!-- <span>CODIGO: 458 254</span><br> -->
             <span><b>FECHA:</b></span><br>
             <span>12/05/2017</span><br>
             <span><b>NOMBRE DEL PACIENTE</b></span><br>
             <span>Juan Rodriguez valenzuela</span><br>
             <!-- <span><b>EDAD</b></span><br> -->
             <!-- <span>30</span><br> -->
             <!-- <span><b>SEXO</b></span><br> -->
             <!-- <span>Masculino</span><br> -->
           </div>
         </div>
         <hr>
         <br>
         <div class="row" style="padding-left: 30px;">
           <div class="col s12">
             <span><b>Gastroenteritis Aguda</b></span>
           </div>
           <div class="row">
             <div class="col s8">
               <ol>
                 <li>
                   <p>Medicamento 1</p>
                   <span>Tomar 1 cápsula cada 24 horas por 7 días</span>
                 </li>
                 <li>
                   <p>Medicamento 2</p>
                   <span>Tomar una cápsula cada 8 horas por 5 días</span>
                 </li>
                 <li>
                   <p>
                     Guardar reposo total por 4 días
                   </p>
                 </li>
               </ol>
             </div>
             <div class="col s4" style="text-align: center">

                 <img src="http://4.bp.blogspot.com/_iFFqUBkgqDU/SyUjOU8_VSI/AAAAAAAAAlM/MwIs1UhwL7s/s400/sello+col+medi+fam+ourense.jpg" alt="" width="150px">
               <!-- <hr> -->

               <!-- <span>Alejandro T.</span><br>
               <span>Medico Gastroenterólogo</span> -->
             </div>
           </div>
         </div>
         <hr>
         <div class="row">
           <div class="col s12" style="text-align: center">
             <span>CENTRO DE ESPECIALIDADES MEDICAS - MIFARMA</span>
           </div>
         </div>
       </div>
       <br>
       <div class="row modal-footer" style="text-align: justify; margin-bottom: 20px;">
         <div class="col s1">

         </div>
         <div class="col s4">
             <a class="waves-effect waves-light btn" style="background-color: #868686"><i class="material-icons left">local_printshop</i>Imprimir</a>
         </div>
         <div class="col s2">

         </div>
         <div class="col s4" style="text-align: right">
           <a class="waves-effect waves-light btn" style="background-color: #e22715"><i class="material-icons left">file_download</i>Descargar</a>

         </div>
         <div class="col s1">

         </div>
       </div>
     </div>
  </body>
  <!-- Compiled and minified JavaScript -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.5/angular.min.js" ></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/dataTables.materialize.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/materialize.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/frontend/paciente/paciente.js')}}"></script>
  <!-- <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script> -->
  <script type="text/javascript">
    if(screen.width >=992 && screen.width <=1100){
      document.getElementById('img-logotipo').width = '135'
      document.getElementById('nav0').style.height = '600px'
    }else if(screen.width >=1101 && screen.width <=1306){
      document.getElementById('img-logotipo').width = '165'
    }else{
      document.getElementById('img-logotipo').width = '190'
    }
  </script>
</html>
