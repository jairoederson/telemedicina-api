@extends('layouts/default')

{{-- Page title --}}
@section('title')
Contact
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!--page level css starts-->

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/contact.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/como-funciona.css') }}">
    <!--end of page level css-->
@stop

{{-- breadcrumb --}}
@section('top')

@stop


{{-- Page content --}}
@section('content')

    <div class="row">
      <div class="img-thumbnail" style="background-size:100% auto;position:relative; height:430px; width:100%; background-image: url('/assets/images/banner.jpeg');">

      </div>
    </div>

    <div class="" style="width: 100%">
      <div class="container max-ancho espacio-top espacio-bottom espacio-bottom">
        <div class="row" style="text-align: center">
          <div class="panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title">
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">
                    Formulario de postulación
                  </font>
                </font>
              </h3>
            </div>
            <div class="panel-body">
                <form id="commentForm" method="post" action="#" novalidate="novalidate" class="bv-form"><button type="submit" class="bv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>
                    <div id="rootwizard">
                        <ul class="nav nav-pills">
                            <li class="active">
                                <a href="#tab1" data-toggle="tab" aria-expanded="true">
                                  <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                      Datos Personales
                                    </font>
                                  </font>
                                </a>
                            </li>
                            <li>
                                <a href="#tab2" data-toggle="tab">
                                  <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                      Datos Profesionales
                                    </font>
                                  </font>
                                </a>
                            </li>
                            <li>
                                <a href="#tab3" data-toggle="tab">
                                  <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                      Documentos
                                    </font>
                                  </font>
                                </a>
                            </li>
                        </ul>
                        <br>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                              <div class="row">
                                <div class="input-field col s6">
                                  <input id="email" type="text" name="nombres" class="validate" style="height: 4rem">
                                  <label for="email">Nombres</label>
                                </div>

                                <div class="input-field col s6">
                                  <input id="email" type="text" name="apellidos" class="validate" style="height: 4rem">
                                  <label for="email">Apellidos</label>
                                </div>
                              </div>
                              <div class="row">
                                <div class="input-field col s6">
                                  <input id="email" type="text" name="correo" class="validate" style="height: 4rem">
                                  <label for="email">Correo</label>
                                </div>

                                <div class="input-field col s6">
                                  <input id="email" type="number" name="correo" class="validate" style="height: 4rem">
                                  <label for="email">Celular</label>
                                </div>
                              </div>

                              <div class="row">
                                <div class="input-field col s6">
                                  <input id="email" type="number" name="correo" class="validate" style="height: 4rem">
                                  <label for="email">Dirección</label>
                                </div>
                              </div>

                            </div>
                            <div class="tab-pane" id="tab2">
                              <div class="row">
                                <div class="input-field col s6">
                                  <input id="email" type="text" name="nombres" class="validate" style="height: 4rem">
                                  <label for="email">Especialidad</label>
                                </div>

                                <div class="input-field col s6">
                                  <input id="email" type="text" name="apellidos" class="validate" style="height: 4rem">
                                  <label for="email">Colegio Médico</label>
                                </div>
                              </div>
                              <div class="row">
                                <div class="input-field col s6">
                                  <input id="email" type="text" name="correo" class="validate" style="height: 4rem">
                                  <label for="email">Correo</label>
                                </div>

                                <div class="input-field col s6">
                                  <input id="email" type="number" name="correo" class="validate" style="height: 4rem">
                                  <label for="email">Celular</label>
                                </div>
                              </div>

                              <div class="row">
                                <div class="input-field col s6">
                                  <input id="email" type="number" name="correo" class="validate" style="height: 4rem">
                                  <label for="email">Dirección</label>
                                </div>
                              </div>
                            </div>
                            <div class="tab-pane" id="tab3">
                              <div class="row">
                                <div class="input-field col s6">
                                  <input id="email" type="text" name="nombres" class="validate" style="height: 4rem">
                                  <label for="email">Nombres</label>
                                </div>

                                <div class="input-field col s6">
                                  <input id="email" type="text" name="apellidos" class="validate" style="height: 4rem">
                                  <label for="email">Apellidos</label>
                                </div>
                              </div>
                              <div class="row">
                                <div class="input-field col s6">
                                  <input id="email" type="text" name="correo" class="validate" style="height: 4rem">
                                  <label for="email">Correo</label>
                                </div>

                                <div class="input-field col s6">
                                  <input id="email" type="number" name="correo" class="validate" style="height: 4rem">
                                  <label for="email">Celular</label>
                                </div>
                              </div>

                              <div class="row">
                                <div class="input-field col s6">
                                  <input id="email" type="number" name="correo" class="validate" style="height: 4rem">
                                  <label for="email">Dirección</label>
                                </div>
                              </div>
                            </div>
                            <ul class="pager wizard">
                                <li class="previous disabled">
                                    <a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Anterior</font></font></a>
                                </li>
                                <li class="next">
                                    <a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Siguiente</font></font></a>
                                </li>
                                <li class="next finish hidden" style="display: none;">
                                    <a href="javascript:;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Terminar</font></font></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">×</font></font></button>
                                    <h4 class="modal-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Registro de usuario</font></font></h4>
                                </div>
                                <div class="modal-body">
                                    <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Enviado con éxito.</font></font></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">DE ACUERDO</font></font></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
      </div>
    </div>

@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <!-- page level js starts-->

    <script src="https://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/gmaps/js/gmaps.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/js/pages/form_wizard.js') }}" ></script>

    <!--page level js ends-->
    <script>

        $(document).ready(function() {
            var map = new GMaps({
                el: '#map',
                lat: 38.8921021,
                lng: -77.0260358
            });
            map.addMarker({
                lat: 38.8921021,
                lng: -77.0260358,
                title: 'Washington'
            });
        });
    </script>

@stop
