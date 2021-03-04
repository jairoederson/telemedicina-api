
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/farmacias-logo.ico') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-ubuntu.css') }}">

    <script src='https://www.google.com/recaptcha/api.js'></script>
    <title> Inicio </title>

    <link href="{{ asset('assets/css/app_1.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/materialize.css') }}">
    <!--global css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/lib.css') }}">
    <!--end of global css-->

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/sweetalert/css/sweetalert.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/custom_sweet_alert.css') }}"/>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--page level css-->
    @yield('header_styles')
    <!--end of page level css-->
</head>

<body>
    <script type="text/javascript">
      if (screen.width <= 699) {
      // document.location = "/mobile/home/dist";
      }
    </script>
    <!-- Header Start -->
    <div id="header-download" class="hide-on-med-only hide-on-large-only">
      <div class="chip" style="width: 100%; border-radius: 0px !important; height: 60px; margin-bottom: -4px">
        <div class="row" style="padding-left: 0px;padding-right: 0px;">
          <div class="col s1" style="padding-top: 12px;">
            <i class="close material-icons" style="float: left; font-size: 25px; padding-left: 0px; opacity: .7">close</i>
          </div>
          <div class="col s2" style="padding-top: 5px; padding-right: 0px;">
            <a href="https://play.google.com/store/apps/details?id=com.vexsoluciones.alodoctorpaciente">
              <img src="{{ asset('assets/images/farmacias-logo.png') }}" alt="logo"  width="50px" height="auto">
            </a>
          </div>
          <div class="col s3 left" style="padding-top: 5px; padding-left: 0px;">
            <p style="text-align: left;">
              <b style="color: #e22715; font-size: 12px;">
              DESCARGAR 
              </b>
            </p>
            <p style="margin-top: -25px; text-align: left; margin-bottom: 0px;">
              <b style="color: #e22715; font-size: 12px;">
                NUESTRA APP
              </b>
            </p>
          </div>
          <div class="col s5 right" style="padding-top: 10px;">
            <a href="https://play.google.com/store/apps/details?id=com.vexsoluciones.alodoctorpaciente" class="waves-effect waves-light btn" style="background-color: #e22715"><i class="material-icons right">file_download</i>Descargar</a>
          </div>

        </div>
      </div>
    </div>


    <div style="background-color: #fff;position:fixed; width: 100%; height: 75px; z-index: 1;box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);">
        
        <header class="max-ancho">
          <!-- Nav bar Start -->
          <nav class="navbar navbar-default">
            <div class="navbar-header">

              <a href="#" data-activates="slide-out" class="button-collapse hide-on-large-only height-adaptable" style="color: black; margin-right: 0px;">
                <i class="material-icons" style="margin-right: 0px !important; font-size: 30px; padding-top: 8px;">menu</i>
              </a>

              <a class="navbar-brand" href="{{ URL::to('/') }}" style="padding: 5px 0 0 15px ;">
                <img src="{{ asset('assets/images/medicentros-peruanos.png') }}" alt="logo"  width="170px" height="auto">
              </a>


              @if(Auth::check())
                @if(Auth::user()->role_user == 3)
                  <a class='dropdown-button black-text right hide-on-med-only hide-on-large-only' data-activates='dropdownPatient' style="padding-right: 15px;padding-top: 7px;">
                    <img class="circle" src="{{ Auth::user()->img }}" style="width:50px; height:50px; margin-bottom: 15px;">
                  </a>

                  <ul id='dropdownPatient' class='dropdown-content' style="margin-top:70px; border: 1px solid #eeeeee;">

                    <li class="divider"></li>
                    <li>
                      <a href="{{ URL::to('/web/paciente/dashboard') }}">
                        <i class="material-icons">dashboard</i>
                        Dashboard
                      </a>
                    </li>
                    <li>
                      <a href="{{ URL::to('/web/paciente/triaje-paso-1') }}">
                      <i class="material-icons">add_box</i>
                        <span style="padding-left: 10px">Nueva Consulta</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{ URL::to('/web/paciente/historial-consulta') }}">
                        <i class="material-icons">list</i>
                        <span style="padding-left: 10px">Consultas</span>
                        </a>
                    </li>
                    <li>  
                      <a href="{{ URL::to('/web/paciente/historial-medico') }}">
                        <i class="material-icons">assignment</i>
                        <span style="padding-left: 10px">Historial Médico</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{ URL::to('/web/paciente/receta') }}">
                        <i class="material-icons">healing</i>
                        <span style="padding-left: 10px">Recetas</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{ URL::to('/web/paciente/analisis-medico') }}">
                        <i class="material-icons">description</i>
                        <span style="padding-left: 10px">Resultados Lab.</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{ URL::to('/web/paciente/mi-cuenta') }}">
                        <i class="material-icons">account_circle</i>
                        <span style="padding-left: 10px">Mi Cuenta</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{ URL::to('/web/paciente/monedero') }}">
                        <i class="material-icons">account_balance_wallet</i>
                        <span style="padding-left: 10px">Mi Monedero</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{ URL::to('/web/paciente/atencion-cliente') }}">
                        <i class="material-icons">help</i> 
                        <span style="padding-left: 10px">Atención al cliente</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{ URL::to('/web/paciente/administrar-familiares') }}">
                        <i class="material-icons">group</i>
                        <span style="padding-left: 10px">Familiares</span>
                      </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                      <a href="{{ URL::to('logout') }}" onclick="localStorage.removeItem('identity')">
                        <i class="material-icons">power_settings_new</i>
                        <span style="padding-left: 10px">Cerrar Sesión</span>
                      </a>
                    </li>
                  </ul>
                @elseif(Auth::user()->role_user == 2)
                  <a class='dropdown-button black-text right hide-on-med-only hide-on-large-only' data-activates='dropdownPatient' style="padding-right: 15px;padding-top: 7px;">
                    <img class="circle" src="{{ Auth::user()->img }}" style="width:50px; height:50px; margin-bottom: 15px;">
                  </a>
                  <ul id='dropdownDoctor' class='dropdown-content' style="margin-top:70px">
                    <li class="divider"></li>
                    <li>
                      <a href="{{ URL::to('/web/doctor/dist/consultas') }}">
                        <i class="material-icons">assignment_turned_in</i>
                        <span style="padding-left: 10px">Consultas</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{ URL::to('/web/doctor/dist/mi-cuenta') }}">
                        <i class="material-icons">account_circle</i>
                        <span style="padding-left: 10px">Mi Cuenta</span>
                      </a>
                    </li>
                    
                    <li>
                      <a href="{{ URL::to('/web/doctor/dist/ingresos') }}">
                        <i class="material-icons">monetization_on</i>
                        <span style="padding-left: 10px">Ingresos</span>
                      </a>
                    </li>
                    
                    <li>
                      <a href="{{ URL::to('/web/doctor/dist/receta') }}">
                        <i class="material-icons">notifications</i>
                        <span style="padding-left: 10px">Notificaciones</span>
                      </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                      <a href="{{ URL::to('/web/doctor/dist/ayuda') }}">
                        <i class="material-icons">help</i>
                        <span style="padding-left: 10px">Atencion al cliente</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{ URL::to('/web/doctor/dist/ayuda') }}">
                        <i class="material-icons">settings</i>
                        <span style="padding-left: 10px">Preferencias</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{ URL::to('/web/doctor/dist/ayuda') }}">
                        <i class="material-icons">share</i>
                        <span style="padding-left: 10px">Invitar Amigos</span>
                      </a>
                    </li>
                    <!-- <li><a href="{{ URL::to('user-pagos') }}"><i class="material-icons"></i>Recetas</a></li> -->
                    
                    <li>
                      <a href="{{ URL::to('logout') }}" onclick="localStorage.removeItem('identity')">
                        <i class="material-icons">dashboard</i>
                        <span style="padding-left: 10px">Cerrar Sesión</span>
                      </a>
                    </li>
                  </ul>
                @else
                @endif
              @endif


            </div>
            <div class="center" style="width: 100%">
              <div class="center" style="display: inline-block">
                <ul class="right">
                  <ul id="slide-out" class="side-nav drawer">
                    <li style="line-height: 0px !important;">
                      <div class="user-view" style="background-color: #e22715;">
                        
                        <div class="row" style="padding: 0px">
                          @if(!Auth::check())
                          <div class="col s2">
                            <img class="circle" src="https://telemedicina.today/images/user/default/default.jpg" style="width:50px; height:50px; margin-bottom: 15px;">

                          </div>
                          <div class="col s10" style="text-align: left;padding-left: 24px;padding-top: 10px;">
                            <label style="color: white !important;">Bienvenid@</label> <br>
                              <a href="/login" style="color: white; display: inline; font-weight: bold; font-size: 12px; padding-left: 0px;padding-right: 0px;">
                                Iniciar Sesión
                              </a>
                              -
                              <a href="/register" style="color: white; display: inline; font-weight: bold; font-size: 12px; padding-left: 0px;">
                                Regístrate
                              </a> 
                              
                              
                          </div>
                          @else
                          <div class="col s2">
                            <img class="circle" src="{{ Auth::user()->img }}" style="width:50px; height:50px; margin-bottom: 15px;">

                          </div>
                          <div class="col s10" style="text-align: left;padding-left: 24px;padding-top: 10px;">
                            
                              
                              <label style="color: white !important;"><b>Bienvenid@</b></label> <label style="color: white !important;"><b>{{ Auth::user()->name }}</b></label> <br>
                              <a href="#" style="color: white; display: inline; font-weight: bold; font-size: 12px; padding-left: 0px;padding-right: 0px;">
                              {{ Auth::user()->email }}
                              </a>
                            
                          </div>
                          @endif
                        </div>
                      </div>
                    </li>
                    
                    @if(Auth::check())

                      @if(Auth::user()->role_user == 3)
                        <li {!! (Request::is('/') ? 'class="active"' : '/') !!} style="text-align: left">
                          <a style="padding-left: 20px; font-weight: bold;" href="{{ URL::to('/') }}"><i class="material-icons" style="color: #e22715">home</i>Inicio</a>
                        </li>

                        <li {!! (Request::is('/mobile/paciente/dist/#/dashboard') ? 'class="active"' : '') !!} style="text-align: left">
                          <a style="padding-left: 20px; font-weight: bold;" href="{{ URL::to('/mobile/paciente/dist/#/dashboard') }}"><i class="material-icons" style="color: #e22715">dashboard</i>Escritorio</a>
                        </li>

                        <li {!! (Request::is('/mobile/paciente/dist/#/consult') ? 'class="active"' : '') !!} style="text-align: left">
                          <a style="padding-left: 20px; font-weight: bold;" href="{{ URL::to('/mobile/paciente/dist/#/consult') }}"><i class="material-icons" style="color: #e22715">add_box</i>Nueva Consulta</a>
                        </li>

                        <li {!! (Request::is('/mobile/paciente/dist/#/history') ? 'class="active"' : '') !!} style="text-align: left">
                          <a style="padding-left: 20px; font-weight: bold;" href="{{ URL::to('/mobile/paciente/dist/#/history') }}"><i class="material-icons" style="color: #e22715">list</i>Consultas</a>
                        </li>

                        <li {!! (Request::is('/mobile/paciente/dist/#/recetas') ? 'class="active"' : '') !!} style="text-align: left">
                          <a style="padding-left: 20px; font-weight: bold;" href="{{ URL::to('/mobile/paciente/dist/#/recetas') }}"><i class="material-icons" style="color: #e22715">healing</i>Recetas</a>
                        </li>

                        <li {!! (Request::is('/mobile/paciente/dist/#/resultados') ? 'class="active"' : '') !!} style="text-align: left">
                          <a style="padding-left: 20px; font-weight: bold;" href="{{ URL::to('/mobile/paciente/dist/#/resultados') }}"><i class="material-icons" style="color: #e22715">description</i>Resultados</a>
                        </li>

                        <li {!! (Request::is('/mobile/paciente/dist/#/wallet') ? 'class="active"' : '') !!} style="text-align: left">
                          <a style="padding-left: 20px; font-weight: bold;" href="{{ URL::to('/mobile/paciente/dist/#/wallet') }}"><i class="material-icons" style="color: #e22715">account_balance_wallet</i>Mi monedero</a>
                        </li>

                        <li {!! (Request::is('/mobile/paciente/dist/#/help') ? 'class="active"' : '') !!} style="text-align: left">
                          <a style="padding-left: 20px; font-weight: bold;" href="{{ URL::to('/mobile/paciente/dist/#/help') }}"><i class="material-icons" style="color: #e22715">help</i>Atencion al cliente</a>
                        </li>

                      

                      @elseif(Auth::user()->role_user == 2)
                        <li {!! (Request::is('/mobile/doctor/dist/#/history') ? 'class="active"' : '') !!} style="text-align: left">
                          <a style="padding-left: 20px; font-weight: bold;" href="{{ URL::to('/mobile/paciente/dist/#/help') }}"><i class="material-icons" style="color: #e22715">list</i>Consultas</a>
                        </li>

                        <li {!! (Request::is('/mobile/doctor/dist/#/myprofile') ? 'class="active"' : '') !!} style="text-align: left">
                          <a style="padding-left: 20px; font-weight: bold;" href="{{ URL::to('/mobile/paciente/dist/#/help') }}"><i class="material-icons" style="color: #e22715">account_circle</i>Mi cuenta</a>
                        </li>

                        <li {!! (Request::is('/mobile/doctor/dist/#/commission') ? 'class="active"' : '') !!} style="text-align: left">
                          <a style="padding-left: 20px; font-weight: bold;" href="{{ URL::to('/mobile/paciente/dist/#/help') }}"><i class="material-icons" style="color: #e22715">monetization_on</i>Ingresos</a>
                        </li>

                        <li {!! (Request::is('/mobile/doctor/dist/#/notificaciones') ? 'class="active"' : '') !!} style="text-align: left">
                          <a style="padding-left: 20px; font-weight: bold;" href="{{ URL::to('/mobile/paciente/dist/#/help') }}"><i class="material-icons" style="color: #e22715">notifications</i>Notificaciones</a>
                        </li>

                        <li {!! (Request::is('/mobile/doctor/dist/#/help') ? 'class="active"' : '') !!} style="text-align: left">
                          <a style="padding-left: 20px; font-weight: bold;" href="{{ URL::to('/mobile/paciente/dist/#/help') }}"><i class="material-icons" style="color: #e22715">help</i>Atención al cliente</a>
                        </li>
                      @else
                        <li style="text-align: left">
                          <a style="padding-left: 20px; font-weight: bold;">Solo en plataformas de escritorio</a>
                        </li>
                      @endif
                      
                    @else

                    <li {!! (Request::is('/') ? 'class="active"' : '') !!} style="text-align: left">
                      <a style="padding-left: 20px; font-weight: bold;" href="{{ URL::to('/') }}"><i class="material-icons" style="color: #e22715">home</i>inicio</a>
                    </li>
                    <li {!! (Request::is('como-funciona') ? 'class="active"' : '') !!} style="text-align: left">
                      <a style="padding-left: 20px; font-weight: bold;" href="{{ URL::to('/como-funciona') }}"><i class="material-icons" style="color: #e22715">assignment_turned_in</i>Como funciona</a>
                    </li>
                    <li {!! (Request::is('precios') ? 'class="active"' : '') !!} style="text-align: left">
                      <a style="padding-left: 20px; font-weight: bold;" href="{{ URL::to('/precios') }}"><i class="material-icons" style="color: #e22715">monetization_on</i>Precios</a>
                    </li>
                    <li {!! (Request::is('ayuda') ? 'class="active"' : '') !!} style="text-align: left">
                      <a style="padding-left: 20px; font-weight: bold;" href="{{ URL::to('/ayuda') }}"><i class="material-icons" style="color: #e22715">help</i>Ayuda</a>
                    </li>
                    <li {!! (Request::is('contacto') ? 'class="active"' : '') !!} style="text-align: left">
                      <a style="padding-left: 20px; font-weight: bold;" href="{{ URL::to('/contacto') }}"><i class="material-icons" style="color: #e22715">insert_comment</i>Contacto</a>
                    </li>
                    @endif
                    <li style="text-align: left">
                      <a onclick="compartirWeb()" style="padding-left: 20px; font-weight: bold;"><i class="material-icons" style="color: #e22715">share</i>Invitar amigos</a>
                    </li>
                    <li {!! (Request::is('preferencias') ? 'class="active"' : '') !!} style="text-align: left">
                      @if(!Auth::check())
                      <a style="padding-left: 20px; font-weight: bold;" href="{{ URL::to('/login') }}"><i class="material-icons" style="color: #e22715">settings</i>Preferencias</a>
                      @else
                      <a style="padding-left: 20px; font-weight: bold;" href="{{ URL::to('/preferencias') }}"><i class="material-icons" style="color: #e22715">settings</i>Preferencias</a>
                      @endif
                    </li>

                  </ul>
                  
                  {{--based on anyone login or not display menu items--}}
                  <li {!! (Request::is('/') ? 'class="active hide-on-med-and-down"' : 'class="hide-on-med-and-down"') !!} style="margin-top: 5px">
                    <a href="{{ URL::to('/') }}" style="color: #e22715; font-size:14px; ">
                      Inicio
                    </a>
                  </li>
                  &nbsp;
                  {{--based on anyone login or not display menu items--}}

                  <li style="margin-top: 5px" {!! (Request::is('como-funciona') ? 'class="active hide-on-med-and-down"' : 'class="hide-on-med-and-down"') !!} class="hide-on-med-and-down {!! (Request::is('products') || Request::is('single_product') || Request::is('compareproducts') || Request::is('category')  ? 'active' : '') !!}">
                    <a href="{{ URL::to('como-funciona') }}" style="color: #e22715; font-size:14px">
                      Como Funciona
                    </a>
                  </li>
                  {{--based on anyone login or not display menu items--}}
                  <li style="margin-top: 5px" {!! (Request::is('precios') ? 'class="active hide-on-med-and-down"' : 'class="hide-on-med-and-down"') !!} class="hide-on-med-and-down dropdown {!! (Request::is('products') || Request::is('single_product') || Request::is('compareproducts') || Request::is('category')  ? 'active' : '') !!}">
                    <a href="{{ URL::to('precios') }}" style="color: #e22715; font-size:14px">
                      Precios
                    </a>
                  </li>
                  {{--based on anyone login or not display menu items--}}
                  @if(Sentinel::guest())

                  @else
                  @endif
                  {{--based on anyone login or not display menu items--}}
                  <li style="margin-top: 5px" {!! (Request::is('ayuda') ? 'class="active hide-on-med-and-down"' : 'class="hide-on-med-and-down"') !!} class="hide-on-med-and-down dropdown {!! (Request::is('products') || Request::is('single_product') || Request::is('compareproducts') || Request::is('category')  ? 'active' : '') !!}">
                    <a href="{{ URL::to('ayuda') }}" style="color: #e22715; font-size:14px">
                      Ayuda
                    </a>
                  </li>
                  <li style="margin-top: 5px" {!! (Request::is('contacto hide-on-med-and-down') ? 'class="active"' : 'class="hide-on-med-and-down"') !!} class="hide-on-med-and-down dropdown {!! (Request::is('products') || Request::is('single_product') || Request::is('compareproducts') || Request::is('category')  ? 'active' : '') !!}">
                    <a href="{{ URL::to('contacto') }}" style="color: #e22715; font-size:14px">
                      Contacto
                    </a>
                  </li>

                </ul>
              </div>
              <div class="right" style="display: inline-block">
                <ul class="right">
                  {{--based on anyone login or not display menu items--}}
                  @if(!Auth::check())
                  <li style="margin-top: 5px; margin-right: 0px" class="hide-on-small-only">
                    <a href="{{ URL::to('login') }}" style="color:white !important;border-radius:20px; background-color:#e30613;margin-right:20px; font:size:20px!important;height: 40px;
                    line-height: 40px;
                    margin: 12px;
                    padding:0 16px;">Iniciar Sesión</a>
                  </li>
                  <li style="margin-top: 5px;" class="hide-on-small-only">
                    <a href="{{ URL::to('register') }}" style="margin-right: 0px;color:white !important;border-radius:20px; background-color:#575756;font:size:14px !important;height: 40px;
                    line-height: 40px;
                    margin: 12px;
                    padding:0 16px;
                ">Crear Cuenta</a>
                  </li>
                  @else
                  
                  @endif
                  @if(Auth::check())
                  <li style="margin-top: 5px">
                    <img style="position: absolute; margin-left: 20px;margin-top:13px;border-radius:50px;" src="{{ Auth::user()->img }}" alt="img" height="40px" width="40px" class="img-circle img-responsive pull-left"/>
                  </li>

                  <li style="margin-top: 5px; margin-right: 10px" class="hide-on-small-only">

                    @if(Auth::user()->role_user == 3)
                    <a class='dropdown-button black-text' data-activates='dropdownPatient'>
                      <strong style="color: #000; font-size:14px; margin-left:65px" class="hide-on-small-only">
                        {{ Auth::user()->name }}
                      </strong>
                      <span class="icon-nav glyphicon glyphicon-chevron-down" aria-hidden="true" style="margin-left:10px;margin-right:10px;margin-top:25px; color: #000"></span>
                    </a>
                    <ul id='dropdownPatient' class='dropdown-content' style="margin-top:70px">

                      <li class="divider"></li>
                      <li><a href="{{ URL::to('/web/paciente/dashboard') }}"><span class="glyphicon glyphicon-th-large"></span> <span style="padding-left: 10px">Dashboard</span></a></li>
                      <li><a href="{{ URL::to('/web/paciente/triaje-paso-1') }}"><span class="glyphicon glyphicon-ok-sign"></span> <span style="padding-left: 10px">Nueva Consulta</span></a></li>
                      <li><a href="{{ URL::to('/web/paciente/historial-consulta') }}"><span class="glyphicon glyphicon-list-alt"></span> <span style="padding-left: 10px">Historial de Consultas</span></a></li>
                      <li><a href="{{ URL::to('/web/paciente/historial-medico') }}"><span class="glyphicon glyphicon-th-list"></span> <span style="padding-left: 10px">Historial Médico</span></a></li>
                      <li><a href="{{ URL::to('/web/paciente/analisis-medico') }}"><span class="glyphicon glyphicon-plus-sign"></span> <span style="padding-left: 10px">Resultados Lab.</span></a></li>
                      <li><a href="{{ URL::to('/web/paciente/receta') }}"><span class="glyphicon glyphicon-file"></span> <span style="padding-left: 10px">Recetas</span></a></li>
                      <li><a href="{{ URL::to('/web/paciente/mi-cuenta') }}"><span class="glyphicon glyphicon-user"></span> <span style="padding-left: 10px">Mi Cuenta</span></a></li>
                      <li><a href="{{ URL::to('/web/paciente/monedero') }}"><span class="glyphicon glyphicon-usd"></span> <span style="padding-left: 10px">Mi Monedero</span></a></li>
                      <li><a href="{{ URL::to('/web/paciente/atencion-cliente') }}"><span class="glyphicon glyphicon-question-sign"></span> <span style="padding-left: 10px">Atención al cliente</span></a></li>
                      <li><a href="{{ URL::to('/web/paciente/administrar-familiares') }}"><span class="glyphicon glyphicon-home"></span> <span style="padding-left: 10px">Familiares</span></a></li>
                      <li class="divider"></li>
                      <li><a href="{{ URL::to('logout') }}" onclick="localStorage.removeItem('identity')"><span class="glyphicon glyphicon-log-out"></span> <span style="padding-left: 10px">Cerrar Sesión</span></a></li>
                    </ul>
                    @elseif(Auth::user()->role_user == 2)
                    <a class='dropdown-button black-text' data-activates='dropdownDoctor'>
                      <strong style="color: #000; font-size:14px; margin-left:65px" class="hide-on-small-only">
                        {{ Auth::user()->name }} {{ Auth::user()->last_name }}
                      </strong>
                      <span class="icon-nav glyphicon glyphicon-chevron-down" aria-hidden="true" style="margin-left:10px;margin-right:10px; color: #000"></span>
                    </a>
                    <ul id='dropdownDoctor' class='dropdown-content' style="margin-top:70px">
                      <li class="divider"></li>
                      <li><a href="{{ URL::to('/web/doctor/dist/mi-cuenta') }}"><span class="glyphicon glyphicon-user"></span> <span style="padding-left: 10px">Mi Cuenta</span></a></li>
                      <li><a href="{{ URL::to('/web/doctor/dist/consultas') }}"><span class="glyphicon glyphicon-ok-circle"></span> <span style="padding-left: 10px">Consultas</span></a></li>
                      <li><a href="{{ URL::to('/web/doctor/dist/historial-medico') }}"><span class="glyphicon glyphicon-th-list"></span> <span style="padding-left: 10px">Historial Médico</span></a></li>
                      <li><a href="{{ URL::to('/web/doctor/dist/analisis-medico') }}"><span class="glyphicon glyphicon-plus-sign"></span> <span style="padding-left: 10px">Orden Análisis</span></a></li>
                      <li><a href="{{ URL::to('/web/doctor/dist/receta') }}"><span class="glyphicon glyphicon-book"></span> <span style="padding-left: 10px">Recetas</span></a></li>
                      <!-- <li><a href="{{ URL::to('user-pagos') }}"><i class="material-icons"></i>Recetas</a></li> -->
                      <li><a href="{{ URL::to('/web/doctor/dist/ingresos') }}"><span class="glyphicon glyphicon-usd"></span> <span style="padding-left: 10px">Ingresos</span></a></li>
                      <li><a href="{{ URL::to('/web/doctor/dist/ayuda') }}"><span class="glyphicon glyphicon-tags"></span> <span style="padding-left: 10px">Ayuda</span></a></li>
                      <li class="divider"></li>
                      <li><a href="{{ URL::to('logout') }}" onclick="localStorage.removeItem('identity')"><span class="glyphicon glyphicon-log-out"></span> <span style="padding-left: 10px">Cerrar Sesión</span></a></li>
                    </ul>

                    @elseif(Auth::user()->role_user == 4)
                    <a class='dropdown-button black-text' data-activates='dropdownSecretaria'>
                      <strong style="color: #000; font-size:14px; margin-left:65px">
                        {{ Auth::user()->name }} {{ Auth::user()->last_name }}
                      </strong>
                      <span class="icon-nav glyphicon glyphicon-chevron-down" aria-hidden="true" style="margin-left:10px;margin-right:10px; color: #000"></span>
                    </a>
                    <ul id='dropdownSecretaria' class='dropdown-content' style="margin-top:70px">
                      <li class="divider"></li>
                      <li><a href="{{ URL::to('/web/secretaria/dist/mi-cuenta') }}"><span class="glyphicon glyphicon-user"></span> <span style="padding-left: 10px">Mi Cuenta</span></a></li>
                      <li><a href="{{ URL::to('/web/secretaria/dist/nuevo-comprobante') }}"><span class="glyphicon glyphicon-plus"></span> <span style="padding-left: 10px">Nuevo Comprobante</span></a></li>
                      <li><a href="{{ URL::to('/web/secretaria/dist/comprobantes') }}"><span class="glyphicon glyphicon-th-list"></span> <span style="padding-left: 10px">Comprobantes</span></a></li>
                      <li><a href="{{ URL::to('/web/secretaria/dist/nuevo-historial-medico') }}"><span class="glyphicon glyphicon-plus-sign"></span> <span style="padding-left: 10px">Registro de pacientes</span></a></li>
                      <li><a href="{{ URL::to('/web/secretaria/dist/solicitud-analisis') }}"><span class="glyphicon glyphicon-file"></span> <span style="padding-left: 10px">Ingreso de Solicitud</span></a></li>
                      <li><a href="{{ URL::to('/web/secretaria/dist/historial-medico') }}"><span class="glyphicon glyphicon-list"></span> <span style="padding-left: 10px">Historial Médico</span></a></li>
                      <li><a href="{{ URL::to('/web/secretaria/dist/analisis-medico') }}"><span class="glyphicon glyphicon-plus-sign"></span> <span style="padding-left: 10px">Análisis Médico</span></a></li>
                      <li><a href="{{ URL::to('/web/secretaria/dist/ayuda') }}"><span class="glyphicon glyphicon-tags"></span> <span style="padding-left: 10px">Ayuda</span></a></li>
                      <li class="divider"></li>
                      <li><a href="{{ URL::to('logout') }}" onclick="localStorage.removeItem('identity')"><span class="glyphicon glyphicon-log-out"></span> <span style="padding-left: 10px">Cerrar Sesión</span></a></li>
                    </ul>

                    @elseif(Auth::user()->role_user == 5)
                    <a class='dropdown-button black-text' data-activates='dropdownDoctor'>
                      <strong style="color: #000; font-size:14px; margin-left:65px">
                        {{ Auth::user()->name }} {{ Auth::user()->last_name }}
                      </strong>
                      <span class="icon-nav glyphicon glyphicon-chevron-down" aria-hidden="true" style="margin-left:10px;margin-right:10px; color: #000"></span>
                    </a>
                    <ul id='dropdownDoctor' class='dropdown-content' style="margin-top:70px">
                      <li class="divider"></li>
                      <li><a href="{{ URL::to('/web/laboratorio/dist/mi-cuenta') }}"><span class="glyphicon glyphicon-user"></span> <span style="padding-left: 10px">Mi cuenta</span></a></li>
                      <li><a href="{{ URL::to('/web/laboratorio/dist/orden-analisis') }}"><span class="glyphicon glyphicon-ok-circle"></span> <span style="padding-left: 10px">Ordenes de análisis</span></a></li>
                      <li><a href="{{ URL::to('/web/laboratorio/dist/nuevo-analisis-medico') }}"><span class="glyphicon glyphicon-th-list"></span> <span style="padding-left: 10px">Recepcion de muestras</span></a></li>
                      <li><a href="{{ URL::to('/web/laboratorio/dist/analisis-medico') }}"><span class="glyphicon glyphicon-plus-sign"></span> <span style="padding-left: 10px">Historial de análisis</span></a></li>
                      <li><a href="{{ URL::to('/web/laboratorio/dist/historial-medico') }}"><span class="glyphicon glyphicon-book"></span> <span style="padding-left: 10px">Historial Médico</span></a></li>
                      <li><a href="{{ URL::to('/web/laboratorio/dist/ayuda') }}"><span class="glyphicon glyphicon-usd"></span> <span style="padding-left: 10px">Ayuda</span></a></li>
                      <li class="divider"></li>
                      <li><a href="{{ URL::to('logout') }}" onclick="localStorage.removeItem('identity')"><span class="glyphicon glyphicon-log-out"></span> <span style="padding-left: 10px">Cerrar Sesión</span></a></li>
                    </ul>
                    @elseif(Auth::user()->role_user == 1)
                    <a class='dropdown-button black-text' data-activates='dropdownDoctor'>
                      <strong style="color: #000; font-size:14px; margin-left:65px">
                        {{ Auth::user()->name }} {{ Auth::user()->last_name }}
                      </strong>
                      <span class="icon-nav glyphicon glyphicon-chevron-down" aria-hidden="true" style="margin-left:10px;margin-right:10px; color: #000"></span>
                    </a>
                    <ul id='dropdownDoctor' class='dropdown-content' style="margin-top:70px">
                      <li class="divider"></li>
                      <li><a href="{{ URL::to('/admin') }}"><span class="glyphicon glyphicon-user"></span> <span style="padding-left: 10px">Dashboard</span></a></li>
                      <li><a href="{{ URL::to('/admin/usuario/0') }}"><span class="glyphicon glyphicon-ok-circle"></span> <span style="padding-left: 10px">Usuarios</span></a></li>
                      <li><a href="{{ URL::to('/admin/asociado') }}"><span class="glyphicon glyphicon-th-list"></span> <span style="padding-left: 10px">Asociados</span></a></li>
                      <li><a href="{{ URL::to('/admin/consultas') }}"><span class="glyphicon glyphicon-plus-sign"></span> <span style="padding-left: 10px">Consultas</span></a></li>
                      <li><a href="{{ URL::to('/admin/pagosmedico') }}"><span class="glyphicon glyphicon-book"></span> <span style="padding-left: 10px">Pagos</span></a></li>
                      <li><a href="{{ URL::to('/admin/liquidaciones') }}"><span class="glyphicon glyphicon-book"></span> <span style="padding-left: 10px">Liquidaciones</span></a></li>
                      <!-- <li><a href="{{ URL::to('user-pagos') }}"><i class="material-icons"></i>Recetas</a></li> -->
                      <li><a href="{{ URL::to('/admin/configuracion') }}"><span class="glyphicon glyphicon-usd"></span> <span style="padding-left: 10px">Configurcion</span></a></li>
                      <li><a href="{{ URL::to('/admin/pregunta') }}"><span class="glyphicon glyphicon-tags"></span> <span style="padding-left: 10px">Preguntas</span></a></li>
                      <li class="divider"></li>
                      <li><a href="{{ URL::to('logout') }}" onclick="localStorage.removeItem('identity')"><span class="glyphicon glyphicon-log-out"></span> <span style="padding-left: 10px;">Cerrar Sesión</span></a></li>
                    </ul>
                    @else
                    @endif
                  </li>
                  @endif
                  {{-- <li style="margin-top: 5px;" class="hide-on-small-only">
                    <a class="btn btn-descargar" href="{{ URL::to('descargar-app') }}" style="color: #e22715 !important; background-color: #fff;">Descargar</a>
                  </li> --}}
                </ul>
              </div>
            </div>

          </nav>
        <!-- Nav bar End -->
        </header>

    </div>

      <!-- slider / breadcrumbs section -->
      @yield('top')

      <!-- Content -->
      @yield('content')

      <!-- Footer Section Start -->
      <footer style="background-color: #f9f9f9; border-top: 1px solid #bdbdbd">
          <div class="hide-on-large-only hide-on-med-only">
            <ul class="collapsible" data-collapsible="accordion">
              <li>
                <div class="collapsible-header active" style="color: black; font-size: 20px">
                  <div class="row" style="width: 100%">
                    <div class="col s6">
                      Nosotros
                    </div>
                    <div class="col s6 right">
                      <i class="material-icons right" style="font-size: 30px">expand_more</i>
                    </div>
                  </div>
                </div>
                <div class="collapsible-body">
                  <ul class="list-unstyled">
                    <li class="suboption-footer"> <a style="color: #212121" href="{{ URL::to('condiciones-de-uso') }}">Condiciones de uso</a></li>
                    <li class="suboption-footer"> <a  style="color: #212121" href="{{ URL::to('politicas') }}">Privacidad</a></li>
                    <li class="suboption-footer"> <a style="color: #212121" href="{{ URL::to('ayuda') }}">Atención al cliente</a></li>
                    <!--<li class="suboption-footer"> <a style="color: #212121" href="{{ URL::to('inteligencia-artificial') }}">Inteligencia artificial</a></li>-->
                  </ul>
                </div>
              </li>

              <li>
                <div class="collapsible-header" style="color: black; font-size: 20px">
                  <div class="row" style="width: 100%">
                    <div class="col s6">Pacientes</div>
                    <div class="col s6">
                      <i class="material-icons right" style="font-size: 30px">expand_more</i>
                    </div>
                  </div>
                  
                </div>
                <div class="collapsible-body">
                  <ul class="list-unstyled">
                    <li class="suboption-footer"> <a style="color: #212121" href="{{ URL::to('register') }}">Registrate Gratis</a></li>
                    <li class="suboption-footer"> <a style="color: #212121" href="{{ URL::to('como-funciona') }}">Cómo Funciona</a></li>
                    <!--<li class="suboption-footer"> <a style="color: #212121" href="{{ URL::to('precios') }}">Precios</a></li>
                    <li class="suboption-footer"> <a style="color: #212121" href="{{ URL::to('empresarial') }}">Empresarial</a></li>-->
                  </ul>
                </div>
              </li>

              <!--<li>
                <div class="collapsible-header" style="color: black; font-size: 20px">
                  <div class="row" style="width: 100%">
                    <div class="col s6">
                      Médicos
                    </div>
                    <div class="col s6">
                      <i class="material-icons right" style="font-size: 30px">expand_more</i>
                    </div>
                  </div>
                </div>
                <div class="collapsible-body">
                  <ul class="list-unstyled">
                    <li class="suboption-footer"> <a style="color: #212121" href="{{ URL::to('como-funciona') }}">Cómo Funciona</a></li>
                    <li class="suboption-footer"> <a style="color: #212121" href="{{ URL::to('medicina') }}">Medicina</a></li>
                    <li class="suboption-footer"> <a style="color: #212121" href="{{ URL::to('nuestro-staff') }}">Nuestro Staff</a></li>
                  </ul>
                </div>
              </li>-->
              
              <li>
                <div class="collapsible-header" style="color: black; font-size: 20px">
                  <div class="row" style="width: 100%">
                    <div class="col s6">Apps</div>
                    <div class="col s6">
                      <i class="material-icons right" style="font-size: 30px">expand_more</i>
                    </div>
                  </div>
                  
                </div>
                <div class="collapsible-body">
                  <ul class="list-unstyled">

                    <li class="suboption-footer"> <a style="color: #212121" href="{{ URL::to('descargar-app') }}">Descarga nuestra app</a></li>

                  </ul>
                </div>
              </li>

              <li>
                <div class="collapsible-header" style="color: black; font-size: 20px">
                  <div class="row" style="width: 100%">
                    <div class="col s6">Mantenerse en contacto</div>
                    <div class="col s6">
                      <i class="material-icons right" style="font-size: 30px">expand_more</i>
                    </div>
                  </div>
                  
                </div>
                <div class="collapsible-body">
                  <div class="">
                    <input type="text" name=""id="emailSuscripion" value="" placeholder="Suscribete con tu correo electronico" style="border-bottom: 1px solid #b2b2b2">
                    <button class="btn" style="border: 1px solid; color: #e22715; background-color: white" type="button" name="button" id="btn8">Enviar</button>

                  </div>
                </div>
              </li>

              <li>
                <div class="collapsible-header" style="color: black; font-size: 20px">
                  <div class="row" style="width: 100%">
                    <div class="col s6">App</div>
                    <div class="col s6">
                      <i class="material-icons right" style="font-size: 30px">expand_more</i>
                    </div>
                  </div>
                  
                </div>
                <div class="collapsible-body">
                  <div class="row" style="padding-left: 0px">
                    <div class="col s6" style="padding-left:0px">
                      <div class="">
                        <a target="_blank" href="https://play.google.com/store/apps/details?id=com.vexsoluciones.alodoctorpaciente">
                          <img src="assets/images/google_play.png" width="150px" alt="">
                        </a>
                      </div>
                    </div>
                    <div class="col s6" style="padding-left: 10px; padding-top: 10px">
                      <div class="">
                        <a target="_blank" href="https://play.google.com/store/apps/details?id=com.vexsoluciones.alodoctorpaciente">
                          <img src="assets/images/appstore.png" width="120px" height="40px" alt="">
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </li>

            </ul>
          
          </div>


          <div class="container max-ancho footer-text hide-on-small-only" style="background-color: #f9f9f9">
            <!-- About Us Section Start -->
            <div class="row">
              <div class="col-sm-3">
                <div class="menu">
                  <h4 class="subheading-footer" style="color: #212121">Nosotros</h4>
                  <ul class="list-unstyled">
                    <li class="suboption-footer"> <a style="color: #212121" href="{{ URL::to('condiciones-de-uso') }}">Condiciones de uso</a></li>
                    <li class="suboption-footer"> <a  style="color: #212121" href="{{ URL::to('politicas') }}">Privacidad</a></li>
                    <li class="suboption-footer"> <a style="color: #212121" href="{{ URL::to('ayuda') }}">Atención al cliente</a></li>
                    <!--<li class="suboption-footer"> <a style="color: #212121" href="{{ URL::to('inteligencia-artificial') }}">Inteligencia artificial</a></li>-->
                  </ul>
                </div>
              </div>
              <!-- //About us Section End -->
              <!-- Contact Section Start -->
              <div class="col-sm-3">
                <div class="menu">
                  <h4 class="subheading-footer" style="color: #212121">Pacientes</h4>
                  <ul class="list-unstyled">
                    <li class="suboption-footer"> <a style="color: #212121" href="{{ URL::to('register') }}">Registrate Gratis</a></li>
                    <li class="suboption-footer"> <a style="color: #212121" href="{{ URL::to('como-funciona') }}">Cómo Funciona</a></li>
                    <!--<li class="suboption-footer"> <a style="color: #212121" href="{{ URL::to('precios') }}">Precios</a></li>
                    <li class="suboption-footer"> <a style="color: #212121" href="{{ URL::to('empresarial') }}">Empresarial</a></li>-->
                  </ul>
                </div>
              </div>
              <!-- //Contact Section End -->
              <!-- Recent post Section Start -->
              <!--<div class="col-sm-3">
                <div class="menu">
                  <h4 class="subheading-footer" style="color: #212121">Médicos</h4>
                  <ul class="list-unstyled">
                    <li class="suboption-footer"> <a style="color: #212121" href="{{ URL::to('como-funciona') }}">Cómo Funciona</a></li>
                    <li class="suboption-footer"> <a style="color: #212121" href="{{ URL::to('medicina') }}">Medicina</a></li>
                    <li class="suboption-footer"> <a style="color: #212121" href="{{ URL::to('nuestro-staff') }}">Nuestro Staff</a></li>
                  </ul>
                </div>
              </div>-->
              <div class="col-sm-3">
                <div class="menu">
                  <h4 class="subheading-footer" style="color: #212121">Apps</h4>
                  <ul class="list-unstyled">
                    <li class="suboption-footer"> <a style="color: #212121" href="{{ URL::to('descargar-app') }}">Descarga nuestra app</a></li>
                  </ul>

                </div>
              </div>
            </div>
          </div>

          <div class="container max-ancho footer-text" style="background-color: #f9f9f9">
            <!-- About Us Section Start -->
            <div class="row">
              <div class="col m3 s12 hide-on-small-only">
                <div class="menu">
                  <h4 class="subheading-footer" style="color: #212121">Mantenerse en contacto</h4>
                  <div class="">
                    <input type="text" name=""id="emailSuscripion" value="" placeholder="Suscribete con tu correo electronico" style="color: white; border-bottom: 1px solid #b2b2b2">
                    <button class="btn" style="border: 1px solid; color: #e22715; background-color: white;" type="button" name="button" id="btn8">Enviar</button>

                    <!-- <button type="button" class="btn btn-responsive button-alignment btn-warning">Auto Close</button> -->
                  </div>
                </div>
              </div>
              <!-- //About us Section End -->
              <!-- Contact Section Start -->
              <div class="col m3 s12 hide-on-small-only">
                <div class="menu">
                  <h4 class="subheading-footer" style="color: #212121">App</h4>
                  <div class="row" style="padding-left: 0px">
                    <div class="col s6 m12" style="padding-left:0px">
                      <div class="">
                        <a target="_blank" href="https://play.google.com/store/apps/details?id=com.vexsoluciones.alodoctorpaciente">
                          <img src="assets/images/google_play.png" width="150px" alt="">
                        </a>
                      </div>
                    </div>
                    <div class="col s6 m12" style="padding-left: 10px; padding-top: 10px">
                      <div class="">
                        <a target="_blank" href="https://play.google.com/store/apps/details?id=com.vexsoluciones.alodoctorpaciente">
                          <img src="assets/images/appstore.png" width="120px" height="40px" alt="">
                        </a>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <!-- //Contact Section End -->
              <!-- Recent post Section Start -->
              <div class="col m3 s12">
                <div class="menu">
                  <h4 class="subheading-footer" style="color: #212121">Seguridad</h4>
                  <div class="row" style="padding-left: 0px">
                    <div class="col s6 m12" style="background-image:url('assets/images/footer/logo-bsi.svg'); background-repeat: no-repeat; height: 70px;background-size: contain;">
                    </div>
                    <div class="col s6 m12" style="background-image:url('assets/images/footer/CQC_180502_145234.svg'); background-repeat: no-repeat; height: 70px;background-size: contain;">
                    </div>
                  </div>
                </div>
              </div>

              <div class="col m3 s12">
                <div class="menu">
                  <h4 class="subheading-footer" style="color: #212121">Síguenos</h4>
                  <div class="row" style="padding-left: 0px">
                    <div class="col s2" style="background-image:url('assets/images/footer/facebook_icon.svg'); background-repeat: no-repeat; height: 70px;background-size: contain;">
                      
                    </div>
                    <div class="col s2" style="background-image:url('assets/images/footer/twitter_icon.svg'); background-repeat: no-repeat; height: 70px;background-size: contain;">
                      
                    </div>
                    <div class="col s2" style="background-image:url('assets/images/footer/linkedin_icon.svg'); background-repeat: no-repeat; height: 70px;background-size: contain;">
                      
                    </div>
                    <div class="col s2" style="background-image:url('assets/images/footer/instagram_icon.svg'); background-repeat: no-repeat; height: 70px;background-size: contain;">
                      
                    </div>
                    <div class="col s2" style="background-image:url('assets/images/footer/youtube_icon.svg'); background-repeat: no-repeat; height: 70px;background-size: contain;">
                      
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        <!--global js starts-->
          <script type="text/javascript" src="{{ asset('assets/js/frontend/lib.js') }}"></script>
      </footer>

      <div style="width:100%; background-color: #e22715">
        <div class="max-ancho">

          <div class="row" style="margin-bottom: 0px !important">

            <div class="" style="color: #ffffff; text-align: center !important; padding-top:10px">
              <p>© Humanidad Sur 2019 - Todos los derechos reservados.</p>
            </div>
          </div>

        </div>
      </div>

      <!-- begin page level js -->
      @yield('footer_scripts')
      <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/js/materialize.js') }}"></script>
      <!-- <script type="text/javascript" src="{{ asset('assets/js/frontend/faq.js') }}"></script> -->
      <script type="text/javascript" src="{{ asset('assets/vendors/mixitup/jquery.mixitup.js') }}"></script>
      <script type="text/javascript" src="{{asset('assets/vendors/sweetalert/js/sweetalert.min.js')}}"></script>
      <script type="text/javascript" src="{{ asset('assets/vendors/sweetalert/js/sweetalert-dev.js')}}"></script>
      <script type="text/javascript" src="{{ asset('assets/js/pages/sweetalert.js') }}"></script>

      <script>
        $(".button-collapse").sideNav();

        function compartirWeb() {
          if (navigator.share) {
            navigator.share({
                title: 'Humanidad Sur',
                text: 'Tu salud es primero',
                url: 'https://telemedicina.today',
            })
              .then(() => console.log('Successful share'))
              .catch((error) => console.log('Error sharing', error));
          }else{
            console.log('Desktop platform')
          }
        }

        window.onscroll = function() {descargarAppHeader()};

        function descargarAppHeader() {
          
          if (document.documentElement.scrollTop > 0.01) {
            document.getElementById('header-download').style.display = 'none';
            console.log('desaparecer')
            console.log(document.documentElement.scrollTop)
          } else {
            document.getElementById('header-download').style.display = 'block'

            
          }
        }
      </script>
    </body>

</html>
