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
    <link rel="stylesheet" href="{{ asset('assets/css/pages/only_dashboard.css') }}"/>

@stop

{{-- Page content --}}
@section('content')

      <section class="content-header section-header">
          <!--section starts-->
          <div class="row">
            <div class="col-md-12">
              <h4 class="header-title">
                Finanzas
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
                    <div class="row">
                      <div class="col-md-12">
                        <div class="panel panel-border main_chart">
                              <div class="panel-heading ">
                                  <h3 class="panel-title title-box">
                                      Ingresos y Egresos
                                  </h3>
                              </div>
                              <div class="panel-body">
                                <canvas id="finanza-chart" width="800" height="300" ></canvas>
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

    <!-- MODAL SECTIONS -->

      <!-- MODAL VER PACIENTE -->
      <section id="verFinanzas" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="panel panel-primary" id="hidepanel1">
              <div class="panel-heading">
                <div class="modal-header">
                  <h3 class="panel-title">
                    <b>
                      Detalle de Finanzas
                    </b>
                  </h3>
                </div>
                <div class="pull-right icon-close">
                  <a href="" data-dismiss="modal" style="font-family: 'Ubuntu', sans-serif !important;">
                    X
                  </a>
                </div>
              </div>
              <div class="panel-body">
                <div class="row border-bottom">
                  <div class="col-md-2">
                    <img src="{{ asset('assets/images/paciente2.jpg') }}" alt="" width="80px">
                  </div>
                  <div class="col-md-4">
                    <h4><b>Paciente</b></h4>
                    <h5><b>Elvira Olivarez Santiago</b></h5>

                    <!-- <label for=""><b>Correo</b></label>
                    <label for="">elvira@email.com</label><br>
                    <label for=""><b>Edad</b></label>
                    <label for="">28 años</label><br>
                    <label for=""><b>Telefono</b></label>
                    <label for="">985854545</label><br>
                    <label for=""><b>Domicilio</b></label>
                    <label for="">Av. ayacucho Nro. 454</label> -->
                  </div>
                  <div class="col-md-2">
                    <img src="{{ asset('assets/images/medico.png') }}" alt="" width="80px">
                  </div>
                  <div class="col-md-4">
                    <h4><b>Responsable</b></h4>
                    <label><b>Juan Perez Olivarez</b></label>
                    <label>Médico Farmaceutico</label>
                    <!-- <label for=""><b>Correo</b></label>
                    <label for="">elvira@email.com</label><br>
                    <label for=""><b>Edad</b></label>
                    <label for="">28 años</label><br>
                    <label for=""><b>Telefono</b></label>
                    <label for="">985854545</label><br>
                    <label for=""><b>Domicilio</b></label>
                    <label for="">Av. ayacucho Nro. 454</label> -->
                  </div>
                </div>

                <div class="items-cv border-bottom">
                  <!-- formacion academica -->
                  <div class="row">
                    <div class="col-md-3">

                      <div class="text-center">
                        <label for=""><b>Codigo</b></label>
                      </div>
                      <div class="text-center">
                        <label for="">555858</label>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="text-center">
                        <label for=""><b>Analisis</b> </label>
                      </div>
                      <div class="text-center">
                        <label for="">Glucosa</label>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="text-center">
                        <label class="text-center"><b>Fecha</b></label>
                      </div>
                      <div class="text-center">
                        <label for="">05/08/2018</label>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="text-center">
                        <label for=""><b>Precio</b></label>
                      </div>
                      <div class="text-center">
                        <label for="">S/.30.00</label>
                      </div>
                    </div>
                  </div>
                  <!-- formacion academica end -->
                  <!-- experiencia profesional -->
                  <!-- <div class="row">
                    <h4><b>Experiencia Profesional</b></h4>
                    <ol>
                      <li>Hospital Basadre (2 años)</li>
                      <li>Clinica Nazareno (3 años)</li>
                    </ol>
                  </div> -->
                  <!-- experiencia profesional end -->
                  <!-- especialidades -->
                  <!-- <div class="row">
                    <h4><b>Especialidades</b></h4>
                    <ol>
                      <li>Medicina General</li>
                      <li>Pediatria</li>
                    </ol>
                  </div> -->
                  <!-- especialidades end -->
                </div>
                <br>
              </div>
              <div class="panel-footer">
                <div class="modal-pie">
                  <div class=" text-right">
                    <br>
                    <br>
                    <br>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- MODAL VER PACIENTE END -->

      <!-- MODAL EDITAR PACIENTE -->
      <section id="editarFinanzas" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="panel panel-primary" id="hidepanel1">
              <div class="panel-heading">
                <div class="modal-header">
                  <h3 class="panel-title">
                    <b>
                      Editar Finanzas
                    </b>
                  </h3>
                </div>
                <div class="pull-right icon-close">
                  <a href="" data-dismiss="modal" style="font-family: 'Ubuntu', sans-serif !important;">
                    X
                  </a>
                </div>

              </div>
              <div class="panel-body">
                <form>
                  <fieldset>
                    <div class="col-md-12">
                      <!-- Name -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="name">Nombres</label>
                        <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="nombres" name="nombres" type="text" class="format-input input-format form-control" value="Elvira">
                      </div>
                      <!-- Apellidos -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="name">Apellidos</label>
                        <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="apellidos" name="apellidos" type="text" class="format-input input-format form-control" value="Olivarez Santiago">
                      </div>
                      <!-- email -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="email">Correo</label>
                        <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="email" name="email" type="text" class="format-input input-format form-control" value="elvira@email.com">
                      </div>
                      <!-- teléfono -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="telefono">Teléfono</label>
                        <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="telefono" name="telefono" type="number" class="format-input input-format form-control" value="985574485">
                      </div>
                      <!-- Domicilio -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="email">Domicilio</label>
                        <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="domicilio" name="domicilio" type="text" class="format-input input-format form-control" value="Av. perez de cuellar Nro. 524">
                      </div>
                      <!-- sexo -->
                      <!-- <div class="form-group label-floating">
                        <label class="control-label" for="email">Sexo</label>
                        <input id="sexo" name="sexo" type="text" class="format-input input-format form-control" value="femenino">
                      </div> -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="email">Sexo</label>
                        <select id="selectP" name="postulante" onchange="this.form.action=this.value;" class="form-control" style="border-bottom: 1px solid #000000;">
                            <option>Femenino</option>
                            <option>Masculino</option>
                        </select>
                      </div>
                      <!-- dni -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="email">DNI</label>
                        <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="sexo" name="sexo" type="text" class="format-input input-format form-control" value="45254141">
                      </div>
                      <!-- nacionalidad -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="email">Nacionalidad</label>
                        <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="sexo" name="sexo" type="text" class="format-input input-format form-control" value="Peruana">
                      </div>
                    </div>
                  </fieldset>
                </form>
              </div>
              <div class="panel-footer">
                <div class="modal-pie">
                  <div class=" text-right">
                    <button type="submit" class="format btn btn-responsive btn-verde" style="margin:5px !important;vertical-align: middle;">Guardar Cambios</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- MODAL EDITAR POSTULANTE -->

      <!-- MODAL ELIMINAR POSTULANTE -->
      <section id="eliminarFinanzas" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="panel panel-primary" id="hidepanel1">
              <div class="panel-heading">
                <div class="modal-header">
                  <h3 class="panel-title">
                    <b>
                      Eliminar Finanza
                    </b>
                  </h3>
                </div>
                <div class="pull-right icon-close">
                  <a href="" data-dismiss="modal" style="font-family: 'Ubuntu', sans-serif !important;">
                    X
                  </a>
                </div>
              </div>
              <div class="panel-body">
                <!-- question -->
                <div class="row text-center">
                  <h4>¿Desea eliminar la finanza?</h4>
                </div>

              </div>
              <div class="panel-footer">
                <div class="modal-pie">
                  <div class=" text-right">
                    <button class='format btn-crud btn btn-verde'>
                      Si
                    </button>
                    &nbsp;
                    <button class='format btn-crud btn btn-naranja'>
                      No
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- MODAL EDITAR POSTULANTE -->

    <!-- MODAL SECTION END -->
    @stop

    {{-- page level scripts --}}
    @section('footer_scripts')

    <!-- InputMask -->
    <!-- <script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}" ></script> -->
    <!-- date-range-picker -->
    <!-- <script src="{{ asset('assets/js/pages/autogrow.js') }}" type="text/javascript"></script> -->
    <!-- <script src="{{ asset('assets/vendors/bootstrap-maxlength/js/bootstrap-maxlength.js') }}"  type="text/javascript"></script> -->
    <!-- <script src="{{ asset('assets/vendors/card/lib/js/jquery.card.js') }}"  type="text/javascript"></script> -->
    <!-- <script src="{{ asset('assets/js/pages/formelements.js') }}"  type="text/javascript"></script> -->
    <!-- <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script> -->
    <!-- <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script> -->
    <script src="{{ asset('assets/vendors/Chartjs/js/Chart.js') }}"></script>
    <script src="{{ asset('assets/js/pages/chartjs.js') }}" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/js/frontend/admin/finanza.js')}}"></script>
@stop
