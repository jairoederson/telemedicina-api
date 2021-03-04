@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Activity Log
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}"/>
    <link href="{{ asset('assets/vendors/sweetalert/css/sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <!-- <link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css"/> -->
    <!-- <link rel="stylesheet" href="{{ asset('assets/css/pages/only_dashboard.css') }}"/> -->
<style>
    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
        padding: 8px 8px 0px 8px !important;
</style>
@stop


{{-- Page content --}}
@section('content')
    <section class="content-header section-header">
      <div class="row">
        <div class="col-md-9">
          <h4 class="header-title">Asociados</h4>
        </div>
        <div class="col-md-3">
          <div class="text-right" style="padding-top: 5px; padding-right: 5px">

            <a href="{{ URL::to('admin/registroasociado') }}">
              <button type="button" class="format btn btn-format">Agregar Asociados
            </button>
            </a>
          </div>
        </div>

      </div>

    </section>

    <!-- Main content -->
    <section class="content paddingleft_right15">
        <div class="row" style="margin-right: -30px;margin-left: -30px">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered width100" style="width: 100%" id="tableAsociado" >
                            <thead>
                            <tr class="filters">
                              
                              <th>Asociado</th>
                              <th>RUC</th>
                              <th>Telefono</th>                           
                              <th>Direccion</th>
                              
                              <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MODAL SECTIONS -->
    <!-- MODAL AGREGAR ASOCIADO -->
    <section id="agregarAsociado" class="modal fade" role="dialog">
      <div class="modal-dialog" >
        <div class="modal-content">
          <div class="panel panel-primary" id="hidepanel1">
            <div class="panel-heading">

              <div class="modal-header">
                <h3 class="panel-title">
                  <b>
                    Nuevo Asociado
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
                    <!-- Name input-->
                    <div class="form-group label-floating is-empty">
                      <label class="control-label" for="nombreJ">Nombre Jurídico</label>
                      <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="nombreJ" name="nombreJ" type="text" class="format-input input-format form-control">
                    </div>
                    <!-- Apellidos input -->
                    <div class="form-group label-floating is-empty">
                      <label class="control-label" for="ruc">RUC</label>
                      <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="ruc" name="ruc" type="number" class="format-input input-format form-control">
                    </div>
                    <!-- Especialidad input-->
                    <div class="form-group label-floating is-empty">
                      <label class="control-label" for="telefono">Teléfono</label>
                      <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="telefono" name="telefono" type="text" class="format-input input-format form-control">
                    </div>
                    <!-- Colegio medico input -->
                    <div class="form-group label-floating is-empty">
                      <label class="control-label" for="region">Región</label>
                      <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="region" name="region" type="text" class="format-input input-format form-control">
                    </div>
                    <!-- email -->
                    <div class="form-group label-floating is-empty">
                      <label class="control-label" for="direccion">Dirección</label>
                      <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="direccion" name="direccion" type="text" class="format-input input-format form-control">
                    </div>
                    <!-- teléfono -->
                    <div class="form-group label-floating">
                      <label class="control-label" for="plan">Plan</label>
                      <select id="selectP" name="plan" onchange="this.form.action=this.value;" class="form-control">
                          <option>Fijo</option>
                          <option>Cuotas</option>
                      </select>
                    </div>

                  </div>
                </fieldset>
              </form>
            </div>
            <div class="panel-footer">
              <div class="modal-pie">
                <div class=" text-right">
                  <button type="submit" class="format btn btn-responsive btn-verde" style="margin:5px !important;vertical-align: middle;">Guardar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- MODAL AGREGAR ASOCIADO -->

    <!-- MODAL VER ASOCIADO -->
    <section id="verAsociado" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="panel panel-primary" id="hidepanel1">
            <div class="panel-heading">
              <div class="modal-header">
                <h3 class="panel-title">
                  <b>
                    Ver Asociado
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
              <!--  -->
              <div class="row">
                <div class="col-md-4 text-center">
                  <img src="{{ asset('assets/images/asociado01.jpeg') }}" class="img-form" alt="" width="110px">
                </div>
                <div class="col-md-8">
                  <h4><b>Inmobiliraria Robles SAC.</b></h4>
                  <label for=""><b>RUC: </b></label>
                  <label for="">258545252525</label><br>
                  <label for=""><b>Correo: </b></label>
                  <label for="">robles@coorporacion.com</label><br>
                  <!-- <label for=""><b>Edad</b></label>
                  <label for="">28 años</label><br> -->
                  <label for=""><b>Telefono: </b></label>
                  <label for="">(01) 425541</label><br>
                  <label for=""><b>Domicilio Fiscal: </b></label>
                  <label for="">Av. javier prado nro. 2550</label>
                </div>
              </div>
              <br>
              <div class="row">
                <ul class="nav nav-tabs tabs-li" style="width:100%">
                    <li class="col-md-3 active" style="height: auto !important">
                        <a href="#asociadoGeneral" data-toggle="tab" aria-expanded="false">Información<div class="ripple-container"></div></a>
                    </li>
                    <li class="col-md-3">
                      <a href="#asociadoPersonal" data-toggle="tab" aria-expanded="false">Afiliados<div class="ripple-container"></div></a>
                    </li>

                    <li class="col-md-3">
                      <a href="#asociadoFacturacion" data-toggle="tab" aria-expanded="false">Facturación<div class="ripple-container"></div></a>
                    </li>
                    <li class="col-md-3">
                      <a href="#asociadoNotas" data-toggle="tab" aria-expanded="false">Notas<div class="ripple-container"></div></a>
                    </li>
                </ul>
              </div>

              <div class="tab-content">
                <div id="asociadoGeneral" class="tab-pane fade active in">
                  <div class="items-cv">
                    <!-- formacion academica -->
                    <div class="row">
                      <h4><b>Datos Generales</b></h4>
                      <p style="text-align: justify">
                        Empresa constructora dedicada a la construccion de
                        vias, aeropuertos, edificaciones, mineria entre otros. con una experiencia de mas de 10 años
                        en el serctor publico.
                      </p>
                      <ol>
                        <li><b>Fecha de Incorporación: </b><label>25/02/2017</label> </li>
                        <li><b>Cantidad de Empleados: </b><label>50 empleados</label> </li>
                        <li><b>Plan: </b><label>Fijo</label> </li>
                      </ol>

                    </div>
                  </div>
                </div>

                <div id="asociadoPersonal" class="tab-pane fade">
                  <div class="items-cv">
                    <div class="row">
                      <h4><b>Personal de contacto</b></h4>
                      <ol>
                        <li><b>Nombre: </b> <label>Juan Perez A.</label> </li>
                        <li><b>Cargo: </b><label>Administrador</label> </li>
                        <li><b>Teléfono: </b><label>98575455</label> </li>
                        <li><b>Email: </b><label>juan@email.com</label> </li>

                      </ol>
                      <a href="{{  URL::to('admin/afiliados') }}" type="submit" class="format btn btn-responsive btn-verde" style="margin:2px !important;vertical-align: middle;">Ver Afiliados</a>

                    </div>
                  </div>
                </div>

                <div id="asociadoFacturacion" class="tab-pane fade">
                  <div class="items-cv">
                    <!-- formacion academica -->
                    <div class="row">
                      <ol>
                        <li> <b>Total de gasto: </b> <label>S/.3000</label> </li>
                        <li> <b>Total de consultas: </b> <label>600</label> </li>
                        <li> <b>Total de Tiempo: </b> <label>3000 minutos</label> </li>
                      </ol>

                      <canvas id="totalFacturacionAsociado" width="300" height="200"></canvas>
                    </div>

                  </div>
                </div>

                <div id="asociadoNotas" class="tab-pane fade">
                  <div class="doc-postulantes">
                    <label class="nota-title"><b>Nueva Nota</b></label>
                    <div class="row">
                      <div class="form-group label-floating is-empty">
                          <label class="control-label" for="notaContenido">Escriba una nota del asociado</label>
                          <textarea  onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" class="form-control" id="notaContenido" maxlength="500" name="notaContenido" rows="3"></textarea>
                      </div>
                      <div class="text-right">
                        <button type="submit" onclick="guardarNota()" class="format btn btn-responsive btn-verde" style="margin:5px !important;vertical-align: middle;">Guardar Nota</button>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="nota-title"><b>Mis Notas</b></label>
                      <ol id="misNotas" class="">
                      </ol>
                    </div>
                  </div>
                </div>

              </div>
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
    <!-- MODAL VER ASOCIADO END -->

    <!-- MODAL EDITAR ASOCIADO -->
    <section id="editarAsociado" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="panel panel-primary" id="hidepanel1">
            <div class="panel-heading">
              <div class="modal-header">
                <h3 class="panel-title">
                  <b>
                    Editar Asociado
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
                      <label class="control-label" for="name">Nombre Jurídico</label>
                      <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="nombres" name="nombres" type="text" class="format-input input-format form-control" value="Constructora Inmobiliaria Robles SAC.">
                    </div>
                    <!-- Apellidos -->
                    <div class="form-group label-floating">
                      <label class="control-label" for="name">RUC</label>
                      <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="apellidos" name="apellidos" type="text" class="format-input input-format form-control" value="28525254141411">
                    </div>
                    <!-- email -->
                    <div class="form-group label-floating">
                      <label class="control-label" for="email">Teléfono</label>
                      <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="email" name="email" type="text" class="format-input input-format form-control" value="(01) 425685">
                    </div>
                    <!-- teléfono -->
                    <div class="form-group label-floating">
                      <label class="control-label" for="telefono">Región</label>
                      <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="telefono" name="telefono" type="text" class="format-input input-format form-control" value="Lima - Surco">
                    </div>
                    <!-- Domicilio -->
                    <div class="form-group label-floating">
                      <label class="control-label" for="email">Dirección</label>
                      <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')"s id="domicilio" name="domicilio" type="text" class="format-input input-format form-control" value="Av. javier prado Nro. 2550">
                    </div>
                    <!-- Plan -->
                    <div class="form-group label-floating">
                      <label class="control-label" for="email">Plan</label>
                      <select id="selectP" name="postulante" onchange="this.form.action=this.value;" class="form-control">
                          <option>Fijo</option>
                          <option>Cuotas</option>
                      </select>
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
    <!-- MODAL EDITAR ASOCIADO -->

    <!-- MODAL ELIMINAR ASOCIADO -->
    <section id="eliminarAsociado" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="panel panel-primary" id="hidepanel1">
            <div class="panel-heading">
              <div class="modal-header">
                <h3 class="panel-title">
                  <b>
                    Eliminar Asociado
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
                <h4>¿Desea eliminar al Asociado?</h4>
              </div>
              <!-- options -->
              <!-- <div class="row text-center">
                <div class="col-md-12">
                  <button class='format btn-crud btn btn-verde'>
                    Si
                  </button>
                  &nbsp;
                  <button class='format btn-crud btn btn-naranja'>
                    No
                  </button>
                </div>
              </div> -->
            </div>
            <div class="panel-footer">
              <div class="modal-pie">
                <div class=" text-right">
                  <button id="btnEliminarAsociadoSi" data-dismiss="modal" class='format btn-crud btn btn-verde'>
                    Si
                  </button>
                  &nbsp;
                  <button data-dismiss="modal" class='format btn-crud btn btn-naranja'>
                    No
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- MODAL EDITAR ASOCIADO -->

    <!-- MODAL ELIMINAR ASOCIADO -->
    <section id="verEmpleados" class="modal fade" role="dialog">
      <div class="modal-dialog table-empleados">
        <div class="modal-content">
          <div class="panel panel-primary" id="hidepanel1">
            <div class="panel-heading">
              <div class="modal-header">
                <h3 class="panel-title">
                  <b>
                    Empleados del Asociado
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
              <div class="table-responsive">
                  <table class="table table-bordered width100" id="tableEmpleados" >
                      <thead>
                      <tr class="filters">
                        <th>Id</th>
                        <th>DNI</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Edad</th>
                        <th>Correo</th>
                        <th>Plan</th>
                        <th>Acciones</th>
                      </tr>
                      </thead>
                      <tbody>
                      </tbody>
                  </table>
              </div>

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
    <!-- MODAL EDITAR ASOCIADO -->

    <!-- MODAL ASOCIADO EMPLEADO -->
    <section id="verAsociadoEmpleado" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="panel panel-primary" id="hidepanel1">
            <div class="panel-heading">
              <div class="modal-header">
                <h3 class="panel-title">
                  <b>
                    Ver Empleado
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

              <div class="row">
                <div class="col-md-4 text-center">
                  <img src="{{ asset('assets/images/image_14.jpg') }}" class="img-form" alt="" width="110px">
                </div>
                <div class="col-md-8">
                  <h4><b>Administrador de ventas.</b></h4>
                  <label for=""><b>Nombre: </b></label>
                  <label for="">Carlos Rivera Ayala</label><br>
                  <label for=""><b>Correo: </b></label>
                  <label for="">carlos@email.com</label><br>
                  <!-- <label for=""><b>Edad</b></label>
                  <label for="">28 años</label><br> -->
                  <label for=""><b>Telefono: </b></label>
                  <label for="">999858458</label><br>

                </div>
              </div>
              <br>
              <div class="row">
                <ul class="nav nav-tabs tabs-li" style="width:100%">
                  <li class="col-md-4 active">
                    <a href="#EmpleadoParientes" data-toggle="tab" aria-expanded="false">Parientes<div class="ripple-container"></div></a>
                  </li>
                  <li class="col-md-4">
                    <a href="#EmpleadoOtro" data-toggle="tab" aria-expanded="false">Gastos<div class="ripple-container"></div></a>
                  </li>
                  <li class="col-md-4">
                      <a href="#EmpleadoEstadistica" data-toggle="tab" aria-expanded="false">Datos de Uso<div class="ripple-container"></div></a>
                  </li>
                </ul>
              </div>

              <div class="tab-content">
                <div id="EmpleadoParientes" class="tab-pane fade active in">
                  <div class="items-cv">
                    <!-- formacion academica -->
                    <div class="row">
                      <h4><b>Esposa</b></h4>
                      <ol>
                        <li><b>Nombre: </b> <label>Sofia Santiago Mendez </label> </li>
                        <li><b>Edad: </b> <label>26</label> </li>

                      </ol>

                      <h4><b>Hijos</b></h4>
                      <ol>
                        <li><b>Nombre: </b> <label>Antonio Rivera Santiago</label> </li>
                        <li><b>Edad: </b> <label>10</label> </li>

                      </ol>
                    </div>
                  </div>
                </div>
                <div id="EmpleadoEstadistica" class="tab-pane fade">
                  <div class="items-cv">
                    <!-- formacion academica -->
                    <div class="row">
                      <h4><b>Uso del sistema</b></h4>
                      <canvas id="UsoEmpleado" width="300" height="200"></canvas>
                    </div>
                  </div>
                </div>
                <div id="EmpleadoOtro" class="tab-pane fade">
                  <div class="items-cv">
                    <div class="row">
                      <h4><b>Resumen</b></h4>
                      <ol>
                        <li><b>Gasto total: </b> <label>S/. 300.00</label> </li>
                        <li><b>Total de llamadas: </b> <label>20</label> </li>
                        <!-- <li><b>Cargo: </b><label>Administrador</label> </li>
                        <li><b>Teléfono: </b><label>98575455</label> </li>
                        <li><b>Email: </b><label>juan@email.com</label> </li> -->
                      </ol>
                      <h4><b>Parientes</b></h4>
                      <ol>
                        <li><b>Gasto total: </b> <label>S/. 300.00</label> </li>
                        <li><b>Total de llamadas: </b> <label>20</label> </li>
                        <!-- <li><b>Cargo: </b><label>Administrador</label> </li>
                        <li><b>Teléfono: </b><label>98575455</label> </li>
                        <li><b>Email: </b><label>juan@email.com</label> </li> -->
                      </ol>
                    </div>
                  </div>
                </div>
              </div>
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
    <!-- MODAL ASOCIADO EMPLEADO END -->

    <!-- MODAL ASOCIADO EMPLEADO -->
    <section id="editarAsociadoEmpleado" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="panel panel-primary" id="hidepanel1">
            <div class="panel-heading">
              <div class="modal-header">
                <h3 class="panel-title">
                  <b>
                    Editar Empleado
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
                      <label class="control-label" for="name">DNI</label>
                      <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="nombres" name="nombres" type="number" class="format-input input-format form-control" value="45854555">
                    </div>
                    <!-- Apellidos -->
                    <div class="form-group label-floating">
                      <label class="control-label" for="name">Nombres</label>
                      <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="apellidos" name="apellidos" type="text" class="format-input input-format form-control" value="Jose Felipe">
                    </div>
                    <!-- email -->
                    <div class="form-group label-floating">
                      <label class="control-label" for="email">Apellidos</label>
                      <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="email" name="email" type="text" class="format-input input-format form-control" value="Paucar Soto">
                    </div>
                    <!-- teléfono -->
                    <div class="form-group label-floating">
                      <label class="control-label" for="telefono">Fecha de Nacimiento</label>
                      <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="telefono" name="telefono" type="text" class="format-input input-format form-control" value="05/02/1989">
                    </div>
                    <!-- Domicilio -->
                    <div class="form-group label-floating">
                      <label class="control-label" for="email">Correo</label>
                      <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="domicilio" name="domicilio" type="text" class="format-input input-format form-control" value="jose@email.com">
                    </div>
                    <!-- Plan -->
                    <div class="form-group label-floating">
                      <label class="control-label" for="email">Plan</label>
                      <select id="selectP" name="postulante" onchange="this.form.action=this.value;" class="form-control" style="border-bottom: 1px solid #000000;">
                          <option>Fijo</option>
                          <option>Cuotas</option>
                      </select>
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
    <!-- MODAL ASOCIADO EMPLEADO END -->

    <!-- MODAL ASOCIADO EMPLEADO -->
    <section id="eliminarAsociadoEmpleado" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="panel panel-primary" id="hidepanel1">
            <div class="panel-heading">
              <div class="modal-header">
                <h3 class="panel-title">
                  <b>
                    Eliminar Empleado
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
                <h4>¿Desea eliminar al Empleado?</h4>
              </div>
            </div>
            <div class="panel-footer">
              <div class="modal-pie">
                <div class=" text-right">
                  <button id="btnEliminarEmpleadoSi" data-toggle='modal' data-target='#eliminarPaciente' class='format btn-crud btn btn-verde'>
                    Si
                  </button>
                  &nbsp;
                  <button class='format btn-crud btn btn-naranja' data-toggle='modal' data-target='#eliminarPaciente' >
                    No
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- MODAL ASOCIADO EMPLEADO END -->
    <!-- MODAL SECTIONS END -->
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script src="{{ asset('assets/vendors/sweetalert/js/sweetalert-dev.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
    var urllistarasociado = "{{ URL::to('admin/listarasociado') }}";
    var token = '{{ csrf_token() }}';
    var urleliminarasociado = "{{ URL::to('admin/eliminarasociado') }}";
    $(function () {
        $('#menuAsociado').addClass("active");
    });
    
    //listarAsociados();
    </script>
        <script type="text/javascript" src="{{ asset('assets/js/frontend/admin/asociado.js')}}"></script>

@stop
