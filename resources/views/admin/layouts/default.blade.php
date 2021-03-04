<!DOCTYPE html>
<html>

<head><meta charset="gb18030">

    
    <title>
        Telemedicina
    </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    {{--CSRF Token--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- global css -->
    <link href="{{ asset('assets/images/farmacias-logo.ico') }}" rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-ubuntu.css') }}">

    <link href="{{ asset('assets/css/frontend/admin/admin.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/app_1.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/assets/css/pages/jasny-bootstrap.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/assets/css/pages/formexample.css') }}" rel="stylesheet" type="text/css"/>
    <style>
        .dataTables_filter{
            background-color: white !important;
        }
        .dataTables_filter > label > input:focus {
            background-color: white !important;
        }
        .page-sidebar .page-sidebar-menu .sub-menu li > a,
        .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu .sub-menu li > a {
            background-color: #e56b6b !important;
        }
        .skin-josh .sidebar li ul {
            background-color: #e22715 !important;
            border-top: 0.08em solid #e22715 !important;
        }


    </style>
    <!-- formexample.css
    jasny-bootstrap.css -->

    <!-- font Awesome -->

    <!-- end of global css -->
    <!--page level css-->
    @yield('header_styles')
    <!--end of page level css-->

<body class="skin-josh" style="">
  <header class="header" >
    
      <nav class="navbar navbar-static-top" role="navigation" style="background-color: #e30613;margin-left:0px">
          <!-- Sidebar toggle button-->
          <div>
         
              <a href="#" class="icon-color navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button" style="background-color: #e30613">
                  <!-- <div class="responsive_nav"></div> -->
                  <span class="icon-fullscreen glyphicon glyphicon-menu-hamburger" aria-hidden="true" style="color:white;font-size:22px"></span>

              </a>
              <a href="{{ route('admin.dashboard') }}" class="logo" style="background-color: #e30613">
                <img src="{{ asset('assets/images/medicentros-peruanos-1.png') }}" class="logo-imagen" alt="logo" width="170px">
            </a>
{{-- 
              <a id="full" href="#" onclick="zoom()" class="link-fullscreen sidebar-toggle" >
                <img src="{{asset('assets/images/fullscreen.png')}}" alt="" width="15px" style="margin-top:12px;">
                  <!-- <span class="icon-size icon-color icon-fullscreen glyphicon glyphicon-fullscreen" aria-hidden="true"></span> -->
              </a> --}}

              <a id="esc" href="#" onclick="esc()" style="display:none" class="link-fullscreen sidebar-toggle">
                <img src="{{asset('assets/images/fullscreen-exit.png')}}" alt="" width="15px" style="margin-top:12px;">
                  <!-- <span style="color: #000000" class="icon-size glyphicon glyphicon-resize-small" aria-hidden="true"></span> -->
              </a>
          </div>
          <div class="navbar-right" style="margin-right: 25px">

              <ul class="nav navbar-nav">
                <li style="margin-right: 20px; margin-top: 10px">
                  <a href="">
                    <span class="glyphicon glyphicon-bell" aria-hidden="true" style="font-size: 20px;color: #9f9f9f"></span>
                  </a>
                </li>
                  @include('admin.layouts._messages')
                  @include('admin.layouts._notifications')
                  <li class="dropdown user user-menu">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-top: 15px;">
                          @if(Auth::user()->pic)
                              <img src="{!! url('/').'/uploads/users/'.Auth::user()->pic !!}" alt="img" height="40px" width="40px"
                                   class="img-circle img-responsive pull-left"/>

                          @elseif(Auth::user()->gender === "male")
                              <img src="{{ asset('assets/images/authors/avatar3.png') }}" alt="img" height="40px" width="40px"
                                   class="img-circle img-responsive pull-left"/>

                          @elseif(Auth::user()->gender === "female")
                              <img src="{{ asset('assets/images/authors/avatar5.png') }}" alt="img" height="40px" width="40px"
                                   class="img-circle img-responsive pull-left"/>

                          @else
                              <img src="{{ asset('assets/images/doctor1.jpg') }}" alt="img" width="38px"
                                   class="img-circle img-responsive pull-left"/>
                          @endif
                          <div class="riot">
                            <div class="name-admin">
                              <span class="user_name_max" style="color: white !important;margin-left:6px;">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>

                                <i class="caret" style="margin-left:10px; font-size: 25px !important; color: #000000"></i>

                            </div>
                          </div>
                      </a>
                      <ul class="dropdown-menu">

                          <!-- Menu Body -->
<!--                          <li style="border-bottom: 1px solid #d6d2d2">
                              <a href="{{ route('admin.dashboard') }}" class="menu-letter-color">
                                 {{ URL::route('admin.users.show',Auth::user()->id) }}

                                  <i class="" data-name="user" data-s="18"></i>
                                  <span class="glyphicon glyphicon-home color-icon" style="font-size: 18px !important"></span>
                                  Dashboard
                              </a>
                          </li>
                          <li role="presentation"></li>
                          <li>
                              <a href="{{  URL::to('admin/micuenta') }}" class="menu-letter-color">
                                 {{ route('admin.users.edit', Auth::user()->id) }}
                                  <i class="" data-name="gears" data-s="18"></i>
                                  <span class="glyphicon glyphicon-check color-icon" style="font-size: 18px !important"></span>
                                  Mi cuenta
                              </a>
                          </li>
                          <li>
                              <a href="{{  URL::to('admin/index1') }}" class="menu-letter-color">
                                 {{ route('admin.users.edit', Auth::user()->id) }}
                                  <i class="" data-name="gears" data-s="18"></i>
                                  <span class="glyphicon glyphicon-check color-icon" style="font-size: 18px !important"></span>
                                  Médicos
                              </a>
                          </li>
                          <li>
                              <a href="{{  URL::to('admin/form_builder2') }}" class="menu-letter-color">
                                  <i class="" data-name="gears" data-s="18"></i>
                                  <span class="glyphicon glyphicon-bookmark color-icon" style="font-size: 18px !important"></span>
                                  Postulantes
                              </a>
                          </li>
                          <li>
                              <a href="{{  URL::to('admin/activity_log') }}" class="menu-letter-color">
                                  <i class="" data-name="gears" data-s="18"></i>
                                  <span class="glyphicon glyphicon-duplicate color-icon" style="font-size: 18px !important"></span>
                                  Pacientes
                              </a>
                          </li>
                          <li>
                              <a href="{{  URL::to('admin/form_builder') }}" class="menu-letter-color">
                                  <i class="" data-name="gears" data-s="18"></i>
                                  <span class="glyphicon glyphicon-list color-icon" style="font-size: 18px !important"></span>
                                  Consultas
                              </a>
                          </li>
                          <li>
                              <a href="{{  URL::to('admin/form_examples') }}" class="menu-letter-color">
                                 {{ URL::route('admin.users.show',Auth::user()->id) }}

                                  <i class="" data-name="user" data-s="18"></i>
                                  <span class="glyphicon glyphicon-sound-dolby color-icon" style="font-size: 18px !important"></span>
                                  Laboratorios
                              </a>
                          </li>
                          <li>
                              <a href="{{  URL::to('admin/form_layouts') }}" class="menu-letter-color">
                                 {{ URL::route('admin.users.show',Auth::user()->id) }}

                                  <i class="" data-name="user" data-s="18"></i>
                                  <span class="glyphicon glyphicon-list-alt color-icon" style="font-size: 18px !important"></span>
                                  Recetas
                              </a>
                          </li>
                          <li>
                              <a href="{{  URL::to('admin/pagos-liquidaciones') }}" class="menu-letter-color">
                                  <i class="" data-name="gears" data-s="18"></i>
                                  <span class="glyphicon glyphicon-duplicate color-icon" style="font-size: 18px !important"></span>
                                  Pagos y liquidaciones
                              </a>
                          </li>-->

                          <li style="border-top: 1px solid #d6d2d2">
                            <a href="{{ URL::to('admin/logout') }}" class="menu-letter-color">
                                <i class="" data-name="sign-out" data-s="15"></i>
                                <span class="glyphicon glyphicon-log-out color-icon" style="font-size: 18px !important"></span>
                                Cerrar Sesión
                            </a>
                          </li>
                          <li style="border-top: 1px solid #d6d2d2">
                            <a href="{{ URL::to('admin/actualizarusuario/'.Auth::user()->id) }}" class="menu-letter-color">
                                <i class="" data-name="gears" data-s="16"></i>
                                <span class="glyphicon glyphicon-user color-icon" style="font-size: 18px !important"></span>
                                Editar Perfil
                            </a>
                          </li>

                          <!-- Menu Footer-->

                      </ul>
                  </li>
              </ul>
          </div>
      </nav>
    
  </header>
  <div class="wrapper ">
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="left-side" id="navActive">
          <section class="sidebar ">
              <div class="page-sidebar  sidebar-nav">
                  <div class="nav_icons">
                      <!-- <ul class="sidebar_threeicons">
                          <li>
                              <a href="{{ URL::to('admin/advanced_tables') }}">
                                  <i class="livicon" data-name="table" title="Advanced tables" data-loop="true"
                                     data-color="#ffffff" data-hc="#ffffff" data-s="25"></i>
                              </a>
                          </li>
                          <li>
                              <a href="{{ URL::to('admin/tasks') }}">
                                  <i class="livicon" data-name="list-ul" title="Tasks" data-loop="true"
                                     data-color="#e9573f" data-hc="#e9573f" data-s="25"></i>
                              </a>
                          </li>
                          <li>
                              <a href="{{ URL::to('admin/gallery') }}">
                                  <i class="livicon" data-name="image" title="Gallery" data-loop="true"
                                     data-color="#F89A14" data-hc="#F89A14" data-s="25"></i>
                              </a>
                          </li>
                          <li>
                              <a href="{{ URL::to('admin/users') }}">
                                  <i class="livicon" data-name="user" title="Users" data-loop="true"
                                     data-color="#6CC66C" data-hc="#6CC66C" data-s="25"></i>
                              </a>
                          </li>
                      </ul> -->
                  </div>
                  <div class="clearfix"></div>
                  <!-- BEGIN SIDEBAR MENU -->
                  @include('admin.layouts._left_menu')
                  <!-- END SIDEBAR MENU -->
              </div>
          </section>
  
      </aside>
      <aside class="right-side" style="padding-left:50px; padding-right:50px; background-color: #fafafa; padding-bottom: 70px">

          <!-- Notifications -->
          <div id="notific">
          @include('notifications')
          </div>

          <!-- Content -->
          @yield('content')
      </aside>

      <!-- right-side -->
  </div>
  <div style="position: fixed;left: 0;bottom: 0;color: white;text-align: center; pasition:relative; width:100%; background-color: #e22715;">
    <div class="">
      <div class="row" style="margin-bottom: 0px !important">
        <div class="" style="color: #ffffff; text-align: center !important; padding-top:10px">
          <p>Telemedicina - Todos los derechos reservados.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- global js -->
  <script src="{{ asset('assets/js/app_1.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/frontend/admin/admin.js') }}"></script>
  <script src="{{ asset('/assets/js/pages/jasny-bootstrap.js') }}"></script>
  <script src="{{ asset('/assets/js/pages/form_reset.js') }}"></script>

  <!-- end of global js -->
  <!-- begin page level js -->
  @yield('footer_scripts')
  <!-- end page level js -->
</body>
</html>
