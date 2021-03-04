@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Form Builder 2
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!-- <link href="{{ asset('assets/css/pages/formbuilder1.css') }}"  rel="stylesheet"/> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}"/>
    <!-- <link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css"/> -->
    <!-- <link rel="stylesheet" href="{{ asset('assets/css/pages/only_dashboard.css') }}"/> -->

@stop

{{-- Page content --}}
@section('content')

    <section class="content-header section-header">
        <!--section starts-->
        <div class="row">
          <div class="col-md-8">
            <h4 class="header-title">Postulantes</h4>
          </div>
          <div class="col-md-1">
            <p style="margin-top: 10px"><b>Seleccione:</b></p>
          </div>
          <div class="col-md-3 text-right">
            <div class="form-group select-postulante">
              <!-- <label>Categoría</label> -->
              <select id="selectP" name="postulante" onchange="this.form.action=this.value;" class="form-control" style="font-size: 14px !important">
                  <option>Total Postulantes</option>
                  <option>Postulantes Pendientes</option>
                  <option>Postulantes Admitidos</option>
                  <option>Postulantes Declinados</option>
              </select>
            </div>
          </div>

        </div>

    </section>
    <!--section ends-->
    <section class="content" style="box-shadow: inherit !important">
      <!-- <h1>Postulantes   <span class="hidden-xs header_info">( Panel Dinámico )</span></h1> -->

      <div class="row" style="box-shadow: inherit !important">
          <div class="panel panel-primary ">

              <div class="panel-body">
                <div class="table-responsive" id="tPostulantes">
                  <table class="table table-bordered width100" id="tableTotalPostulantes" >
                    <thead>
                    <tr class="filters">
                      <th>Id</th>
                      <th>DNI</th>
                      <th>Nombres</th>
                      <th>Apellidos</th>
                      <th>Especialidad</th>
                      <th>Ubicación</th>
                      <th>Sexo</th>
                      <th>Edad</th>
                      <th>Estado</th>
                      <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
                <div style="display:none" class="table-responsive" id="tPostulantesPendientes">
                  <table class="table table-bordered width100" id="tablePostulantesPendientes" >
                    <thead>
                    <tr class="filters">
                      <th>Id</th>
                      <th>DNI</th>
                      <th>Nombres</th>
                      <th>Apellidos</th>
                      <th>Especialidad</th>
                      <th>Ubicación</th>
                      <th>Sexo</th>
                      <th>Edad</th>
                      <th>Estado</th>
                      <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
                <div class="table-responsive" id="tPostulantesAdmitidos" style="display:none">
                  <table class="table table-bordered width100" id="tablePostulantesAdmitidos" >
                    <thead>
                    <tr class="filters">
                      <th>Id</th>
                      <th>DNI</th>
                      <th>Nombres</th>
                      <th>Apellidos</th>
                      <th>Especialidad</th>
                      <th>Ubicación</th>
                      <th>Sexo</th>
                      <th>Edad</th>
                      <th>Estado</th>
                      <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>

                  <div style="display: none" class="table-responsive" id="tPostulantesDeclinados">
                      <table class="table table-bordered width100" id="tablePostulantesDeclinados" >
                          <thead>
                          <tr class="filters">
                            <th>Id</th>
                            <th>DNI</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Especialidad</th>
                            <th>Ubicación</th>
                            <th>Sexo</th>
                            <th>Edad</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                          </tr>
                          </thead>
                          <tbody>
                          </tbody>
                      </table>
                  </div>
                  <div style="display: none" class="table-responsive" id="pDeclinados">
                      <table class="table table-bordered width100" id="tablePostulanteDeclinados" >
                          <thead>
                          <tr class="filters">
                            <th>Id</th>
                            <th>DNI</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Especialidad</th>
                            <th>Ubicación</th>tablePostulantesAdmitidos
                            <th>Sexo</th>
                            <th>Edad</th>
                            <th>Estado</th>
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
        <!--main content ends-->
    </section>
    <!-- content -->


    <!-- MODAL SECTIONS -->

    <!-- MODAL AGREGAR POSTULANTE -->
    <section id="agregarPostulante" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="panel panel-primary" id="hidepanel1">
            <div class="panel-heading">
              <div class="modal-header">
                <h3 class="panel-title">
                  <b>
                    Nuevo Postulante
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
                      <label class="control-label" for="nombres">Nombres</label>
                      <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="nombres" name="nombres" type="text" class="format-input input-format form-control">
                    </div>
                    <!-- Apellidos input -->
                    <div class="form-group label-floating is-empty">
                      <label class="control-label" for="apellidos">Apellidos</label>
                      <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="apellidos" name="apellidos" type="text" class="format-input input-format form-control">
                    </div>
                    <!-- Especialidad input-->
                    <div class="form-group label-floating is-empty">
                      <label class="control-label" for="especialidad">Especialidad</label>
                      <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="especialidad" name="especialidad" type="text" class="format-input input-format form-control">
                    </div>
                    <!-- Colegio medico input -->
                    <div class="form-group label-floating is-empty">
                      <label class="control-label" for="colegio">Colegio Médico</label>
                      <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="colegio" name="colegio" type="text" class="format-input input-format form-control">
                    </div>
                    <!-- email -->
                    <div class="form-group label-floating is-empty">
                      <label class="control-label" for="correo">Correo</label>
                      <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="correo" name="correo" type="text" class="format-input input-format form-control">
                    </div>
                    <!-- teléfono -->
                    <div class="form-group label-floating is-empty">
                      <label class="control-label" for="telefono">Teléfono</label>
                      <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="telefono" name="telefono" type="text" class="format-input input-format form-control">
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
    <!-- MODAL AGREGAR POSTULANTE -->

    <!-- MODAL VER POSTULANTE -->
    <section id="verPostulante" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="panel panel-primary" id="hidepanel1">
            <div class="panel-heading">
              <div class="modal-header">
                <h3 class="panel-title">
                  <b>
                    Perfil Postulante
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
                  <img src="{{ asset('assets/images/doctor.jpg') }}" class="img-form" alt="" width="130px">
                </div>
                <div class="col-md-8">
                  <h4><b>Ricardo Santiago Quispe</b></h4>
                  <label for=""><b>Correo: </b></label>
                  <label for="">ricardo@email.com</label><br>
                  <label for=""><b>Edad: </b></label>
                  <label for="">32 años</label><br>
                  <label for=""><b>Telefono: </b></label>
                  <label for="">985854545</label><br>
                  <label for=""><b>Domicilio: </b></label>
                  <label for="">Av. perez de cuellar Nro. 454</label>
                </div>
              </div>
              <br>
              <div class="row">
                <ul class="nav nav-tabs tabs-li" style="width:100%">
                    <li class="col-md-3 active">
                        <a href="#postulanteInfo" data-toggle="tab" aria-expanded="false">Info. Personal<div class="ripple-container"></div></a>
                    </li>
                    <li class="col-md-3">
                      <a href="#postulanteInfoProf" data-toggle="tab" aria-expanded="false">Info. Profesional<div class="ripple-container"></div></a>
                    </li>
                    <li class="col-md-3">
                      <a href="#postulanteDoc" data-toggle="tab" aria-expanded="false">Documentos<div class="ripple-container"></div></a>
                    </li>
                    <li class="col-md-3">
                      <a href="#postulanteNota" data-toggle="tab" aria-expanded="false">Notas<div class="ripple-container"></div></a>
                    </li>
                </ul>
              </div>
              <div class="tab-content">
                <div id="postulanteInfo" class="tab-pane fade active in">
                  <div class="items-cv">
                    <!-- formacion academica -->
                    <div class="row">
                      <h4><b>Datos Personales</b></h4>
                      <ol>
                        <li> <b>Nombre Completo: </b> <label>Ricardo Santiago Quispe</label></li>
                        <li> <b>correo: </b> <label>ricardo@email.com</label></li>
                        <li> <b>Linked In: </b> <a href="https://www.linkedin.com">Ricardo S.</a></li>
                        <li> <b>DNI: </b> <label>78545854</label> </li>
                        <li> <b>Dirección: </b> <label>78545854</label> </li>
                        <li> <b>Departamento: </b> <label>Lima</label> </li>
                        <li> <b>Provincia: </b> <label>Lima</label>  </li>
                        <li> <b>Distrito: </b> <label>Lima</label>  </li>
                        <li> <b>Fecha Nacimiento: </b> <label>12/05/1980</label> </li>

                      </ol>
                    </div>

                  </div>
                </div>
                <div id="postulanteInfoProf" class="tab-pane fade">
                  <div class="items-cv">
                    <!-- formacion academica -->
                    <div class="row">
                      <h4><b>Formación académica</b></h4>
                      <ol>
                        <li><label>Universidad Mayor de San Marcos</label></li>
                        <li><label>Instituto Médico de Pediatría</label></li>
                      </ol>
                    </div>
                    <!-- formacion academica end -->
                    <!-- experiencia profesional -->
                    <div class="row">
                      <h4><b>Experiencia Profesional</b></h4>
                      <ol>
                        <li>Hospital Basadre (2 años)</li>
                        <li>Acitvidad: Atención al paciente, Consultas</li>
                        <li>Medico pediatra</li>
                        <br>
                        <li>Clinica Nazareno (3 años)</li>
                        <li>Acitvidad: Atención al paciente, Consultas</li>
                        <li>Medico pediatra</li>
                      </ol>
                    </div>
                    <!-- experiencia profesional end -->
                    <!-- especialidades -->
                    <div class="row">
                      <h4><b>Especialidades</b></h4>
                      <ol>
                        <li>Medicina General</li>
                        <li>Pediatria</li>
                      </ol>
                    </div>
                    <!-- especialidades end -->
                  </div>
                </div>
                <div id="postulanteDoc" class="tab-pane fade">
                  <div class="doc-postulantes">
                    <div class="row">
                      <div class="col-md-4 text-center">
                        <label for=""><b>CV</b></label><br>
                        <img src="{{ asset('assets/images/file.png') }}" alt="" width="100px"><br>
                        <button type="button" class="btn btn-verde" title="Descargar" name="button"><span class="glyphicon glyphicon-save" aria-hidden="true"></span></button>
                        <button type="button" class="btn btn-verde" title="Ver" name="button"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>

                      </div>
                      <div class="col-md-4 text-center">
                        <label for=""><b>Certificado</b></label>
                        <img src="{{ asset('assets/images/file.png') }}" alt="" width="100px"><br>
                        <button type="button" class="btn btn-verde" title="Descargar" name="button"><span class="glyphicon glyphicon-save" aria-hidden="true"></span></button>
                        <button type="button" class="btn btn-verde" title="Ver" name="button"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>

                      </div>
                      <div class="col-md-4 text-center">
                        <label for=""><b>Estudio Psicológico</b></label>
                        <img src="{{ asset('assets/images/file.png') }}" alt="" width="100px"><br>
                        <button type="button" class="btn btn-verde" title="Descargar" name="button"><span class="glyphicon glyphicon-save" aria-hidden="true"></span></button>
                        <button type="button" class="btn btn-verde" title="Ver" name="button"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>

                      </div>
                    </div>
                  </div>

                </div>
                <div id="postulanteNota" class="tab-pane fade">
                  <div class="doc-postulantes">
                    <label class="nota-title"><b>Nueva Nota</b></label>
                    <div class="row">
                      <div class="form-group label-floating is-empty">
                          <label class="control-label" for="notaContenido">Escriba una nota del postulante</label>
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
                  <button type="submit" class="format btn btn-responsive btn-verde" style="margin:5px !important;vertical-align: middle;">Aceptar Postulante</button>
                  <button type="submit" class="format btn btn-responsive btn-verde" style="margin:5px !important;vertical-align: middle;">Declinar Postulante</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- MODAL VER POSTULANTE END -->

    <!-- MODAL EDITAR POSTULANTE -->
    <section id="editarPostulante" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="panel panel-primary" id="hidepanel1">
            <div class="panel-heading">
              <div class="modal-header">
                <h3 class="panel-title">
                  <b>
                    Editar Postulante
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
                    <div class="form-group label-floating">
                      <label class="control-label" for="nombres">Nombres</label>
                      <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="nombres" name="nombres" type="text" class="format-input input-format form-control" value="Ricardo">
                    </div>
                    <!-- Apellidos input -->
                    <div class="form-group label-floating">
                      <label class="control-label" for="apellidos">Apellidos</label>
                      <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="apellidos" name="apellidos" type="text" class="format-input input-format form-control" value="Santiago Quispe">
                    </div>
                    <!-- Especialidad input-->
                    <div class="form-group label-floating">
                      <label class="control-label" for="especialidad">Especialidad</label>
                      <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="especialidad" name="especialidad" type="text" class="format-input input-format form-control" value="Pediatria, Medicina General">
                    </div>
                    <!-- Colegio medico input -->
                    <div class="form-group label-floating">
                      <label class="control-label" for="colegio">Colegio Médico</label>
                      <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="colegio" name="colegio" type="text" class="format-input input-format form-control" value="Colegio Médico General">
                    </div>
                    <!-- email -->
                    <div class="form-group label-floating">
                        <label class="control-label" for="email">Correo</label>
                        <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="email" name="email" type="text" class="format-input input-format form-control" value="4544">
                    </div>
                    <!-- teléfono -->
                    <div class="form-group label-floating">
                      <label class="control-label" for="telefono">Teléfono</label>
                      <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="telefono" name="telefono" type="number" class="format-input input-format form-control" value="985574485">
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
    <section id="eliminarPostulante" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="panel panel-primary" id="hidepanel1">
            <div class="panel-heading">
              <h3 class="panel-title">
                Eliminar Postulante
              </h3>
              <span class="pull-right">
              </span>
            </div>
            <div class="panel-body">
              <!-- question -->
              <div class="row text-center">
                <h4>¿Desea eliminar al Postulante?</h4>
              </div>

            </div>
            <div class="panel-footer">
              <div class="modal-pie">
                <div class=" text-right">
                  <button id="btnEliminarSi" data-dismiss="modal" class='format btn-crud btn btn-verde'>
                    Si
                  </button>
                  &nbsp;
                  <button class='format btn-crud btn btn-naranja' data-dismiss="modal">
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
    <!--livicons-->
    <!-- <script src="{{ asset('assets/vendors/form-builder/js/beautify-html.js') }}" ></script> -->
    <!-- <script src="{{ asset('assets/vendors/form-builder/js/beautify-css.js') }}" ></script> -->
    <!-- <script src="{{ asset('assets/vendors/form-builder/js/beautify.js') }}" ></script> -->
    <!-- <script src="{{ asset('assets/js/pages/form_builder2.js') }}" ></script> -->
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/frontend/admin/postulante.js')}}"></script>
@stop
