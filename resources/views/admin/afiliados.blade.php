@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Activity Log
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}"/>
    <!-- <link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css"/> -->
    <!-- <link rel="stylesheet" href="{{ asset('assets/css/pages/only_dashboard.css') }}"/> -->

@stop


{{-- Page content --}}
@section('content')
    <section class="content-header section-header">
      <div class="row">
        <div class="col-md-9">

          <h4 class="header-title">Afiliados</h4>
        </div>
        <div class="col-md-3">
          <div class="text-right" style="padding-top: 5px; padding-right: 5px">
            <button type="button" class="format btn-agregar-medico btn" data-toggle="modal" data-target="#agregarAfiliado">Agregar Afiliado</button>
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
                        <table class="table table-bordered width100" id="tableAfiliado" >
                            <thead>
                            <tr class="filters">
                              <th>Id</th>
                              <th>DNI</th>
                              <th>Nombres</th>
                              <th>Correo</th>
                              <th>Region</th>
                              <th>Atenciones</th>
                              <th>Comprado</th>
                              <th>Plan</th>
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
      <section id="agregarAfiliado" class="modal fade" role="dialog">
        <div class="modal-dialog" >
          <div class="modal-content">
            <div class="panel panel-primary" id="hidepanel1">
              <div class="panel-heading">

                <div class="modal-header">
                  <h3 class="panel-title">
                    <b>
                      Nuevo Afiliado
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
                        <label class="control-label" for="dni">DNI</label>
                        <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="dni" name="dni" type="text" class="format-input input-format form-control">
                      </div>
                      <!-- Name input-->
                      <div class="form-group label-floating is-empty">
                        <label class="control-label" for="nombres">Nombres</label>
                        <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="nombres" name="nombres" type="text" class="format-input input-format form-control">
                      </div>
                      <!-- Apellidos input -->
                      <div class="form-group label-floating is-empty">
                        <label class="control-label" for="apellidos">Apellidos</label>
                        <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="apellidos" name="apellidos" type="text" class="format-input input-format form-control">
                      </div>
                      <!-- Name input-->
                      <div class="form-group label-floating is-empty">
                        <label class="control-label" for="correo">Correo</label>
                        <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="correo" name="correo" type="text" class="format-input input-format form-control">
                      </div>
                      <!-- telefono input -->
                      <div class="form-group label-floating is-empty">
                        <label class="control-label" for="telefono">Teléfono</label>
                        <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="telefono" name="telefono" type="tel" class="format-input input-format form-control">
                      </div>
                      <!-- Especialidad input-->
                      <div class="form-group label-floating is-empty">
                        <label class="control-label" for="ubicacion">Ubicacion</label>
                        <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="ubicacion" name="ubicacion" type="text" class="format-input input-format form-control">
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
      <section id="verAfiliado" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="panel panel-primary" id="hidepanel1">
              <div class="panel-heading">
                <div class="modal-header">
                  <h3 class="panel-title">
                    <b>
                      Ver Afiliado
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
                    <img src="{{ asset('assets/images/image_13.jpg') }}" class="img-form" alt="" width="110px">
                  </div>
                  <div class="col-md-8">
                    <h4><b>Jesús Conde Mendoza</b></h4>
                    <label for=""><b>Correo: </b></label>
                    <label for="">jesus@email.com</label><br>
                    <label for=""><b>Edad: </b></label>
                    <label for="">28 años</label><br>
                    <label for=""><b>Telefono: </b></label>
                    <label for="">985854545</label><br>
                    <label for=""><b>Domicilio: </b></label>
                    <label for="">Av. Ayacucho Nro. 454</label>
                  </div>
                </div>
                <br>
                <div class="row">
                  <ul class="nav nav-tabs tabs-li" style="width:100%">
                      <li class="col-md-4 active" style="height: auto !important">
                          <a href="#afiliadoGeneral" data-toggle="tab" aria-expanded="false">Información<div class="ripple-container"></div></a>
                      </li>
                      <li class="col-md-4">
                        <a href="#afiliadoFacturacion" data-toggle="tab" aria-expanded="false">Facturación<div class="ripple-container"></div></a>
                      </li>
                      <li class="col-md-4">
                        <a href="#afiliadoNotas" data-toggle="tab" aria-expanded="false">Notas<div class="ripple-container"></div></a>
                      </li>
                  </ul>
                </div>

                <div class="tab-content">
                  <div id="afiliadoGeneral" class="tab-pane fade active in">
                    <div class="items-cv">
                      <!-- formacion academica -->
                      <div class="row">
                        <h4><b>Datos Generales</b></h4>
                        <ol>
                          <li><b>Sexo: </b><label>Femenino</label> </li>
                          <li><b>Ocupación: </b><label>Profesora</label> </li>
                          <li><b>Fecha de nacimiento: </b><label>05/08/1987</label> </li>
                          <li><b>Estado Civil: </b><label>Casada</label> </li>
                          <li><b>DNI: </b><label>45885655</label> </li>
                          <li><b>Nacionalidad: </b><label>Peruana</label></li>
                          <li><b>Residencia Actual: </b><label>Av. Perez de cuellar Nro. 3565</label></li>
                          <li><b>Residencia Anterior: </b><label>Av. Perez de cuellar Nro. 3565</label></li>
                          <li><b>Grado de instrucción: </b><label>Superior</label></li>
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
                        <a href="/afiliados" type="submit" class="format btn btn-responsive btn-verde" style="margin:5px !important;vertical-align: middle;">Ver Afiliados</a>

                      </div>
                    </div>
                  </div>

                  <div id="afiliadoFacturacion" class="tab-pane ">
                    <div class="items-cv">
                      <!-- formacion academica -->
                      <div class="row">
                        <ol>
                          <li> <b>Total de consultas: </b> <label>100</label> </li>
                          <li> <b>Total de Tiempo: </b> <label>500 minutos</label> </li>
                          <li> <b>Total de Precio: </b> <label>S/. 500.00</label> </li>
                        </ol>

                        <canvas id="totalFacturacionAsociado" width="300" height="200"></canvas>
                      </div>

                    </div>
                  </div>

                  <div id="afiliadoNotas" class="tab-pane ">
                    <div class="doc-postulantes">
                      <label class="nota-title"><b>Nueva Nota</b></label>
                      <div class="row">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label" for="notaContenido">Escriba una nota del paciente</label>
                            <textarea  onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" class="form-control" id="notaContenido" maxlength="500" name="notaContenido" rows="3" style="border-bottom: 1px solid #c8c8c8"></textarea>
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
      <section id="editarAfiliado" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="panel panel-primary" id="hidepanel1">
              <div class="panel-heading">
                <div class="modal-header">
                  <h3 class="panel-title">
                    <b>
                      Editar Afiliado
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
                      <!-- DNI input-->
                      <div class="form-group label-floating ">
                        <label class="control-label" for="dni">DNI</label>
                        <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="dni" name="dni" type="text" class="format-input input-format form-control">
                      </div>
                      <!-- Name -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="nombres">Nombres</label>
                        <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="nombres" name="nombres" type="text" class="format-input input-format form-control" value="Jesus">
                      </div>
                      <!-- Apellidos -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="apellidos">Apellidos</label>
                        <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="apellidos" name="apellidos" type="text" class="format-input input-format form-control" value="Conde Mendoza">
                      </div>
                      <!-- correo -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="correo">Correo</label>
                        <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="correo" name="correo" type="text" class="format-input input-format form-control" value="jesus@email.com">
                      </div>
                      <!-- email -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="telefono">Teléfono</label>
                        <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="telefono" name="telefono" type="tel" class="format-input input-format form-control" value="958545854">
                      </div>
                      <!-- teléfono -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="ubicacion">Ubicacion</label>
                        <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="ubicacion" name="ubicacion" type="text" class="format-input input-format form-control" value="Lima - Surco">
                      </div>
                      <!-- Domicilio -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="direccion">Dirección</label>
                        <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')"s id="direccion" name="direccion" type="text" class="format-input input-format form-control" value="Av. javier prado Nro. 2550">
                      </div>
                      <!-- Plan -->
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
      <section id="eliminarAfiliado" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="panel panel-primary" id="hidepanel1">
              <div class="panel-heading">
                <div class="modal-header">
                  <h3 class="panel-title">
                    <b>
                      Eliminar Afiliado
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
                  <h4>¿Desea eliminar al Afiliado?</h4>
                </div>

              </div>
              <div class="panel-footer">
                <div class="modal-pie">
                  <div class=" text-right">
                    <button id="btnEliminarAfiliadoSi" data-dismiss="modal" class='format btn-crud btn btn-verde'>
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
      <!-- MODAL ASOCIADO EMPLEADO END -->
    <!-- MODAL SECTIONS END -->
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

    <script>

    // NOTAS DEL POSTULANTE
    var misNotas = [
      {
        id: '1',
        contenido: 'pendiente documentos'
      },
      {
        id: '2',
        contenido: 'pendiente CV'
      },
      {
        id: '3',
        contenido: 'pendiente correo'
      },
    ];
    function guardarNota(){
      lenLista = misNotas.length;
      notaContenido = document.getElementById('notaContenido').value
      misNotas.push({
        id: lenLista + 1,
        contenido: notaContenido
      })
      listarNotas()
    }
    function listarNotas(){

      var listaNotas = document.getElementById('misNotas')
      @for($i = 0; $i < 3; $i++)
        var li = document.createElement("li")
        li.appendChild(document.createTextNode(misNotas[{{$i}}].contenido))
        li.setAttribute("id", misNotas[{{$i}}].id);
        li.setAttribute("class", "nota");
        listaNotas.appendChild(li)
      @endfor
    }
    listarNotas()
    // NOTAS DEL POSTULANTE END

    var ctx = document.getElementById("totalFacturacionAsociado");
    var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"],
        datasets: [{
            label: 'numero de llamadas',
            data: [5, 6, 4, 5, 2, 3, 5, 6, 4, 5, 2, 3],
            backgroundColor: [
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
            ],
            borderColor: [
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
    });

    var ctx = document.getElementById("UsoEmpleado");
    var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"],
        datasets: [{
            label: 'numero de llamadas',
            data: [5, 6, 4, 5, 2, 3, 5, 6, 4, 5, 2, 3],
            backgroundColor: [
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
            ],
            borderColor: [
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

    var acciones =`
    <div class='text-center'>
    <button title='Ver' data-toggle='modal' data-target='#verAfiliado' class='btn-crud btn' style='background-color: #868686'>
      <span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>
    </button>
    <button title='Editar' data-toggle='modal' data-target='#editarAfiliado' class='btn-crud btn' style='background-color: #868686'>
      <span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
    </button>
    <button id='btnEliminarAfiliado' title='Eliminar' class='btn-crud btn color-red'>
      <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
    </button>
    </div>
    `

$(function() {
  var tableAfiliados = $('#tableAfiliado').DataTable({
    "language": {
        "sProcessing":    "Procesando...",
        "sLengthMenu":    "Mostrar _MENU_ registros",
        "sZeroRecords":   "No se encontraron resultados",
        "sEmptyTable":    "Ningún dato disponible en esta tabla",
        "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":   "",
        "sSearch":        "Buscar:",
        "sUrl":           "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":    "Último",
            "sNext":    "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    },
    "data": [
      @for($i = 1; $i < 20; $i++)
      [
        "{{$i}}",
        "45874584",
        "Jesus Conde Mendoza",
        "jesus@email.com",
        "Lima - Surco",
        "10",
        "50",
        "Fijo",
        acciones

      ],
      @endfor
    ]
  })
  $('#tableAfiliado tbody').on( 'click', 'button#btnEliminarAfiliado', function () {
    var table = $(this);
    $("#eliminarAfiliado").modal();
    $("#btnEliminarAfiliadoSi").on('click', function(){
      tableAfiliados
        .row( table.parents('tr') )
        .remove()
        .draw();
    })
  });

});
    </script>
@stop
