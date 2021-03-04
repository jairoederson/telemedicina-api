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
    }
</style>
@stop

{{-- Page content --}}
@section('content')
<style>
    .section-header {
     margin-top: 0px !important; 
    }
</style>
<div>
    <br>
<label class="control-label" for="name" ><a style="color:gray" href="{{ URL::to('admin/usuario/0') }}">Todos</a></label> 
    <label class="control-label" for="name"> | </label> 
    <label class="control-label" for="name"><a style="color:gray"  href="{{ URL::to('admin/usuario/1') }}">Administradores</a></label>
    <label class="control-label" for="name"> | </label> 
    <label class="control-label" for="name"><a  style="color:gray" href="{{ URL::to('admin/usuario/4') }}">Secretarios</a></label>
    <label class="control-label" for="name"> | </label> 
    <label class="control-label" for="name"><a  style="color:gray" href="{{ URL::to('admin/usuario/5') }}">Laboratoristas</a></label>
    <label class="control-label" for="name"> | </label> 
    <label class="control-label" for="name"><a style="color:gray"  href="{{ URL::to('admin/medicos') }}">Medicos</a></label>
    <label class="control-label" for="name"> | </label> 
    <label class="control-label" for="name"><a style="color:gray"  href="{{ URL::to('admin/pacientes') }}">Pacientes</a></label>

</div>
    <section class="content-header section-header">
      <div class="row">
        <div class="col-md-12">
          <h4 class="header-title">Usuarios</h4>
        </div>
      </div>

    </section>

    <!-- Main content -->
    <section class="content paddingleft_right15">
        <div class="row" style="margin-right: -30px;margin-left: -30px">
            <div class="panel panel-primary ">


                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered width100" id="tablePaciente" >
                            <thead>
                            <tr class="filters">
                              
                              <th>Nombres</th>
                              <th>Apellidos</th>
                              <th>DNI</th>
                              <th>Ubicacion</th>
                              <!-- <th>Ciudad</th> -->
                              <th>Atenciones</th>
<!--                              <th>Comprado</th>-->
                              <th>Últ. Acceso</th>
                              <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>    <!-- row-->
    </section>


    <!-- MODAL SECTIONS -->

      <!-- MODAL VER PACIENTE -->
      <section id="verPaciente" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="panel panel-primary" id="hidepanel1">
              <div class="panel-heading">
                <div class="modal-header">
                  <h3 class="panel-title">
                    <b>
                      Ver Paciente
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
                    <img src="{{ asset('assets/images/paciente2.jpg') }}" class="img-form" alt="" width="130px">
                  </div>
                  <div class="col-md-8">
                    <h4><b>Elvira Olivarez Santiago</b></h4>
                    <label for=""><b>Correo: </b></label>
                    <label for="">elvira@email.com</label><br>
                    <label for=""><b>Edad: </b></label>
                    <label for="">28 años</label><br>
                    <label for=""><b>Telefono: </b></label>
                    <label for="">985854545</label><br>
                    <label for=""><b>Domicilio: </b></label>
                    <label for="">Av. ayacucho Nro. 454</label>
                  </div>
                </div>
                <br>
                <div class="row">
                  <ul class="nav nav-tabs tabs-li" style="width:100%">
                    <li class="col-md-4 active">
                      <a href="#pacienteInfoPersonal" data-toggle="tab" aria-expanded="false">Info. Personal<div class="ripple-container"></div></a>
                    </li>
                    <!-- <li class="col-md-3">
                      <a href="#pacienteConsulta" data-toggle="tab" aria-expanded="false">Consultas<div class="ripple-container"></div></a>
                    </li> -->
                    <li class="col-md-4">
                      <a href="#pacienteFacturacion" data-toggle="tab" aria-expanded="false">Facturación<div class="ripple-container"></div></a>
                    </li>
                    <li class="col-md-4">
                      <a href="#pacienteNotas" data-toggle="tab" aria-expanded="false">Notas<div class="ripple-container"></div></a>
                    </li>
                  </ul>
                </div>

                <div class="tab-content">
                  <div class="tab-pane fade active in" id="pacienteInfoPersonal">
                    <div class="items-cv">
                      <!-- formacion academica -->
                      <div class="row">
                        <h4><b>Datos filiatorios</b></h4>
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
                  <div class="tab-pane fade" id="pacienteConsulta">
                    <div class="items-cv">
                      <!-- formacion academica -->
                      <div class="row">
                        <ol>
                          <li><b>Total de Consulta: </b><label>20</label> </li>
                          <li><b>Total de Tiempo: </b><label> 300 minutos</label> </li>
                        </ol>
                        <canvas id="totalLlamadasPaciente" width="300" height="200"></canvas>

                      </div>

                    </div>
                  </div>
                  <div class="tab-pane fade" id="pacienteFacturacion">
                    <div class="items-cv">
                      <!-- formacion academica -->
                      <div class="row">
                        <ol>
                            <li><b>Total de Consulta: </b><label id="lbNumConsulta">20</label> </li>
                          <li><b>Total de Tiempo: </b><label id="lbTiempoConsulta"> 300 minutos</label> </li>
<!--                          <li><b>Costo Total: </b><label>S/. 300</label> </li>-->
                          <!-- <li><b>Total de Tiempo: </b><label> 300 minutos</label> </li> -->
                        </ol>
                        <canvas id="totalCostoPaciente" width="300" height="200"></canvas>

                      </div>

                    </div>
                  </div>
                  <div class="tab-pane fade" id="pacienteNotas">
                    <div class="doc-postulantes">
                      <label class="nota-title"><b>Nueva Nota</b></label>
                      <div class="row">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label" for="notaContenido">Escriba una nota del paciente</label>
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
      <!-- MODAL VER PACIENTE END -->

      <!-- MODAL EDITAR PACIENTE -->
      <section id="editarPaciente" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="panel panel-primary" id="hidepanel1">
              <div class="panel-heading">
                <div class="modal-header">
                  <h3 class="panel-title">
                    <b>
                      Editar Paciente
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
                        <label class="control-label" for="nombres">Nombres</label>
                        <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="nombres" name="nombres" type="text" class="format-input input-format form-control" value="Elvira">
                      </div>
                      <!-- Apellidos -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="apellidos">Apellidos</label>
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
                        <label class="control-label" for="domicilio">Domicilio</label>
                        <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="domicilio" name="domicilio" type="text" class="format-input input-format form-control" value="Av. perez de cuellar Nro. 524">
                      </div>
                      <!-- sexo -->
                      <!-- <div class="form-group label-floating">
                        <label class="control-label" for="email">Sexo</label>
                        <input id="sexo" name="sexo" type="text" class="format-input input-format form-control" value="femenino">
                      </div> -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="sexo">Sexo</label>
                        <select id="selectP" name="sexo" onchange="this.form.action=this.value;" class="form-control">
                            <option>Femenino</option>
                            <option>Masculino</option>
                        </select>
                      </div>
                      <!-- dni -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="dni">DNI</label>
                        <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="dni" name="dni" type="number" class="format-input input-format form-control" value="45254141">
                      </div>
                      <!-- nacionalidad -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="nacionalidad">Nacionalidad</label>
                        <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="nacionalidad" name="nacionalidad" type="text" class="format-input input-format form-control" value="Peruana">
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
      <section id="eliminarPaciente" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="panel panel-primary" id="hidepanel1">
              <div class="panel-heading">
                <div class="modal-header">
                  <h3 class="panel-title">
                    <b>
                      Eliminar Paciente
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
                  <h4>¿Desea eliminar al Paciente?</h4>
                </div>

              </div>
              <div class="panel-footer">
                <div class="modal-pie">
                  <div class=" text-right">
                    <button id="btnEliminarPacienteSi" data-dismiss="modal" class='format btn-crud btn btn-verde'>
                      Si
                    </button>
                    &nbsp;
                    <button class='format btn-crud btn btn-naranja' data-dismiss="modal" >
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

    <!-- MODAL SECTIONS END -->
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>    
    <script src="{{ asset('assets/vendors/sweetalert/js/sweetalert.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/sweetalert/js/sweetalert-dev.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assets/js/frontend/admin/paciente.js')}}"></script>
    <script type="text/javascript">
    
    function eliminarPaciente(id) {

        $.ajax({
            type: 'post',
            url: "{{ URL::to('admin/eliminarpaciente') }}",
            dataType: "json",
            data: {id_user: id,'_token': '{{ csrf_token() }}'},
            beforeSend: function (xhr) {
                //alert(id);
            }
        }).done(function (dataRpta) {
            //alert(JSON.stringify(dataRpta));
          
             listarPaciente();
            
            //alert(dataRpta.message);
        }).fail(function (jqXHR, textStatus) {
            alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
        }).always(function () {
        });

    }

  
    
    
    
    listarPaciente();
    
    function eliminar(id) {
      
      swal({
            title: "Eliminar?",
            text: "esta Seguro de eliminar!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55  ",
            confirmButtonText: "Si, eliminalo!",
            closeOnConfirm: false
        }, function () {
            eliminarPaciente(id);
            swal("Eliminado!", "eliminacion correcta.", "success");
        });
    }
    function listarPaciente() {
        $.ajax({
            type: 'post',
            url: "{{ URL::to('admin/listarpacientes') }}",
            dataType: "json",
            data: {'_token': '{{ csrf_token() }}'},
            beforeSend: function (xhr) {
                //progreso();
            }
        }).done(function (dataRpta) {
            //alert(JSON.stringify(dataRpta));
            $('#tablePaciente').DataTable().clear().draw();
            jQuery.each(dataRpta, function (i, val) {
              
                               
                val.acciones = `
                    <div class='text-center'>
                      <button title='Ver' onclick="location.href='/admin/verpaciente/` + val.id +`'" class='btn-crud btn' style='background-color: #868686'>
                        <span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>
                      </button>
                    <button title='Editar' onclick="location.href='/admin/actualizarusuario/` + val.id + 
                        `'" class='btn-crud btn' style='background-color: #868686'>
                      <span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
                    </button>
                      <button onclick="eliminar(` + val.id +`)" title='Eliminar' class='delete btn-crud btn color-red'>
                        <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
                      </button>
                    </div>`;
                            
                $('#tablePaciente').DataTable().row.add(val).draw();
            });


        }).fail(function (jqXHR, textStatus) {
            alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
        }).always(function () {
            //cerrarProgreso();
        });
    }
    
    </script>
    
@stop
