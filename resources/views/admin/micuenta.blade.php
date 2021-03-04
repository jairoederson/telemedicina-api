@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Form Elements
    @parent
    @stop

    {{-- page level styles --}}
    @section('header_styles')
    <link href="{{ asset('assets/css/pages/formelements.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}"/>
    <link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css"/>

@stop

{{-- Page content --}}
@section('content')

    <section class="content-header section-header">
        <!--section starts-->
        <div class="row">
          <div class="col-md-12">
            <h4>
              Mi Cuenta
            </h4>
          </div>
        </div>
        <!-- <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#">Pagos y liquidaciones</a>
            </li>

        </ol> -->
    </section>
    <!--section ends-->
    <section class="content">
      <!--main content-->
      <div class="row">
          <div class="panel panel-primary ">
              <!-- <div class="panel-heading">
                  <h4 class="panel-title"><i class="livicon" data-name="user" data-size="16" data-loop="true"
                                             data-c="#fff" data-hc="white"></i>
                      Pagos y liquidaciones
                  </h4>
              </div> -->
              <div class="panel-body">
                <ul class="nav nav-tabs tabs-li" style="width:100%">
                    <li class="col-md-6 active">
                        <a href="#micuenta" data-toggle="tab" aria-expanded="false">Mi Cuenta<div class="ripple-container"></div></a>
                    </li>
                    <li class="col-md-6">
                      <a href="#password" data-toggle="tab" aria-expanded="false">Cambiar Contraseña<div class="ripple-container"></div></a>
                    </li>
                </ul>
                <div class="tab-content">
                  <div id="micuenta" style="padding:10px;" class="tab-pane fade active in">
                    <div class="row">
                      <div class="col-md-6 form-group label-floating is-empty">
                        <label for="disabledInput">Nombres</label>
                        <input class="form-control input-format" id="cuentaNombres" value="{{ Sentinel::getUser()->first_name }}" type="text" disabled="">
                      </div>
                      <div class="col-md-6 form-group label-floating is-empty">
                        <label for="disabledInput">Apellidos</label>
                        <input class="form-control input-format" id="cuentaApellidos" value="{{ Sentinel::getUser()->last_name }}" type="text" disabled="">
                      </div>
                      <div class="col-md-6 form-group label-floating is-empty">
                        <label for="disabledInput">Correo</label>
                        <input class="form-control input-format" id="cuentaCorreo" value="{{ Sentinel::getUser()->email }}" type="text" disabled="">
                      </div>
                    </div>
                    <div class="form-group text-right">
                      <div class="text-right" id="btnEditarCuenta" style="display:block">
                        <button onclick="EditarCuenta()" type="submit" class="format btn btn-responsive btn-verde" style="margin:5px !important;vertical-align: middle;">Editar Cambios</button>
                      </div>
                      <div class="text-right" id="btnGuardarCuenta" style="display:none">
                        <button onclick="GuardarCCuenta()" type="submit" class="format btn btn-responsive btn-verde" style="margin:5px !important;vertical-align: middle;">Guardar Cambios</button>
                      </div>
                    </div>
                  </div>
                  <div id="password" class="tab-pane fade">
                    <div class="row">

                      <div class="col-md-6 form-group label-floating is-empty">
                        <label for="disabledInput">Contraseña Actual</label>
                        <input class="form-control input-format" id="disabledInput" type="password">
                      </div>
                      <div class="col-md-6 form-group">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 form-group label-floating is-empty">
                        <label for="disabledInput">Nueva Contraseña</label>
                        <input class="form-control input-format" id="disabledInput" type="password">
                        <span class="restrictions">8 caracteres, 1 mayúscula, 1 carácter no alfanumérico</span>
                      </div>
                      <div class="col-md-6 form-group label-floating is-empty">
                        <label for="disabledInput">Confirmar Contraseña</label>
                        <input class="form-control input-format" id="disabledInput" type="password">
                        <span class="restrictions">8 caracteres, 1 mayúscula, 1 carácter no alfanumérico</span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group text-right">
                        <button onclick="cambiarContraseña()" type="button" class="format btn btn-responsive btn-verde" style="margin:5px !important;vertical-align: middle;">Guardar Cambios</button>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
          </div>
      </div>    <!-- row-->
      <!--main content ends-->
    </section>
    <!-- content -->

    @stop

    {{-- page level scripts --}}
    @section('footer_scripts')

    <!-- InputMask -->
    <script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}" ></script>
    <!-- date-range-picker -->
    <script src="{{ asset('assets/js/pages/autogrow.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrap-maxlength/js/bootstrap-maxlength.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/card/lib/js/jquery.card.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/formelements.js') }}"  type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
    <script>
      function EditarCuenta(){
        document.getElementById('cuentaNombres').disabled = false;
        document.getElementById('cuentaApellidos').disabled = false;
        document.getElementById('cuentaCorreo').disabled = false;
        document.getElementById('btnEditarCuenta').style.display = 'none'
        document.getElementById('btnGuardarCuenta').style.display = 'block'
      }
      function GuardarCCuenta(){
        document.getElementById('cuentaNombres').disabled = true;
        document.getElementById('cuentaApellidos').disabled = true;
        document.getElementById('cuentaCorreo').disabled = true;
        document.getElementById('btnEditarCuenta').style.display = 'block'
        document.getElementById('btnGuardarCuenta').style.display = 'none'
      }
    </script>
@stop
