@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Form Layouts
@parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link href="{{ asset('assets/vendors/iCheck/css/all.css') }}"  rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/pages/form_layouts.css') }}" rel="stylesheet" type="text/css"/>
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
              <h4 class="header-title">Recetas</h4>
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
                  <a href="#">Recetas</a>
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
                        Recetas
                    </h4>
                </div> -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered width100" id="tableReceta" >
                            <thead>
                            <tr class="filters">
                              <th>Id</th>
                              <th>Id Consulta</th>
                              <th>Sintoma</th>
                              <th>Paciente</th>
                              <th>Medico</th>
                              <th>Fecha</th>
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
      <!-- MODAL VER PACIENTE RECETA -->
      <section id="verPacienteReceta" class="modal fade" role="dialog">
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
                    <li class="col-md-3 active">
                      <a href="#pacienteInfoPersonal" data-toggle="tab" aria-expanded="false">Info. Personal
                        <div class="ripple-container"></div>
                      </a>

                    </li>
                    <li class="col-md-3">
                      <a href="#pacienteConsulta" data-toggle="tab" aria-expanded="false">Consultas<div class="ripple-container"></div></a>
                    </li>
                    <li class="col-md-3">
                      <a href="#pacienteFacturacion" data-toggle="tab" aria-expanded="false">Facturación<div class="ripple-container"></div></a>
                    </li>
                    <li class="col-md-3">
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
                          <li><b>Costo Total: </b><label>S/. 300</label> </li>
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

      <!-- MODAL VER MEDICO RECETA -->
      <section id="verMedicoReceta" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="panel panel-primary" id="hidepanel1">
              <div class="panel-heading">
                <div class="modal-header">
                  <h3 class="panel-title">
                    <b>
                      Perfil Médico
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
                    <img src="{{ asset('assets/images/doctor.jpg') }}" alt="" class="img-form" width="130px">
                  </div>
                  <div class="col-md-8">
                    <h4><b>Ricardo Santiago Quispe</b></h4>
                    <div class="text-left">
                      <label><b>(14)</b></label>
                      <span class="glyphicon glyphicon-star" aria-hidden="true" style="color: #f1c420; font-size: 20px;"></span> &nbsp;
                      <span class="glyphicon glyphicon-star" aria-hidden="true" style="color: #f1c420; font-size: 20px;"></span>&nbsp;
                      <span class="glyphicon glyphicon-star" aria-hidden="true" style="color: #f1c420; font-size: 20px;"></span>&nbsp;
                      <span class="glyphicon glyphicon-star" aria-hidden="true" style="color: #f1c420; font-size: 20px;"></span>&nbsp;
                      <span class="glyphicon glyphicon-star" aria-hidden="true" style="color: #f1c420; font-size: 20px;"></span>
                    </div>
                    <label for=""><b>Especialidad: </b></label>
                    <label for="">Cardiología</label><br>
                    <label for=""><b>Linked In: </b></label>
                    <a target="_blank" href="https://www.linkedin.com">
                      Ricardo S.
                      <!-- <img src="{{ asset('assets/images/linkedin.png') }}"  alt="" width="30px;" />  <br> -->
                    </a><br>
                    <label for=""><b>Edad: </b></label>
                    <label for="">32 años</label><br>

                  </div>
                </div>
                <br>
                <div class="row">
                  <ul class="nav nav-tabs tabs-li" style="width:100%">
                    <li class="col-md-3 active">
                      <a href="#medicoInfoPersonal" data-toggle="tab" aria-expanded="false">Info. Personal<div class="ripple-container"></div></a>
                    </li>
                    <li class="col-md-3">
                      <a href="#medicoInfoProfesional" data-toggle="tab" aria-expanded="false">Info. Profesional<div class="ripple-container"></div></a>
                    </li>
                    <li class="col-md-3">
                      <a href="#medicoConsulta" data-toggle="tab" aria-expanded="false">Consultas<div class="ripple-container"></div></a>
                    </li>
                    <li class="col-md-3">
                      <a href="#medicoNotas" data-toggle="tab" aria-expanded="false">Notas<div class="ripple-container"></div></a>
                    </li>
                  </ul>
                </div>

                <div class="tab-content">
                  <div id="medicoInfoPersonal" class="tab-pane fade active in">
                    <div class="items-cv">
                      <!-- formacion academica -->
                      <div class="row">
                        <h4><b>Datos Personales</b></h4>

                        <label for=""><b>Fecha de nacimiento: </b></label>
                        <label for="">12/02/1972</label><br>
                        <label for=""><b>DNI: </b></label>
                        <label for="">48545241</label><br>
                        <label for=""><b>Telefono: </b></label>
                        <label for="">985854545</label><br>
                        <label for=""><b>Domicilio: </b></label>
                        <label for="">Av. perez de cuellar Nro. 454</label><br>
                        <label for=""><b>Correo: </b></label>
                        <label for="">ricardo@email.com</label><br>
                        <label for=""><b>Estado Civil: </b></label>
                        <label for="">Casado</label><br>


                        <h4><b>Calidad de servicio</b></h4>
                        <label> <b>calificacion:</b></label>
                        <span style="margin-bottom: 20px;"><b>(14)</b></span>
                        <span class="glyphicon glyphicon-star" aria-hidden="true" style="color: #f1c420; font-size: 20px;"></span> &nbsp;
                        <span class="glyphicon glyphicon-star" aria-hidden="true" style="color: #f1c420; font-size: 20px;"></span>&nbsp;
                        <span class="glyphicon glyphicon-star" aria-hidden="true" style="color: #f1c420; font-size: 20px;"></span>&nbsp;
                        <span class="glyphicon glyphicon-star" aria-hidden="true" style="color: #f1c420; font-size: 20px;"></span>&nbsp;
                        <span class="glyphicon glyphicon-star" aria-hidden="true" style="color: #f1c420; font-size: 20px;"></span><br>
                        <label for=""><b>Valoracion: </b></label>
                        <label for="">Excelente</label><br>
                        <label for=""><b>Opiniones: </b></label>
                        <label for="">Atención Excelente al cliente</label><br>
                      </div>

                    </div>
                  </div>
                  <div id="medicoInfoProfesional" class="tab-pane fade">
                    <div class="items-cv">
                      <!-- formacion academica -->
                      <div class="row">
                        <h4><b>Formación académica</b></h4>
                        <ol>
                          <li><b>Centro: </b> <label>Universidad Mayor de San Marcos</label></li>
                          <li><b>Estudios: </b> <label>Cardiología</label> </li>
                          <li><b>Fechas: </b> <label>1990 - 2000</label> </li>
                        </ol>
                      </div>
                      <!-- formacion academica end -->
                      <!-- experiencia profesional -->
                      <div class="row">
                        <h4><b>Experiencia Profesional</b></h4>
                        @for($i = 0; $i < 2; $i++)
                        <ol>
                          <li><b>Centro: </b> <label>Hospital Basadre (2 años)</label> </li>
                          <li><b>Actividad: </b> <label>Cirugia, Consultas</label> </li>
                          <li><b>Puesto: </b>Medico Cardiólogo</li>
                        </ol>
                        @endfor
                      </div>
                      <!-- experiencia profesional end -->
                      <!-- especialidades -->
                      <div class="row">
                        <h4><b>Especialidades</b></h4>
                        <ol>
                          <li>Medicina General</li>
                          <li>Cardiolgía</li>
                        </ol>
                      </div>
                      <!-- especialidades end -->
                    </div>

                  </div>
                  <div id="medicoConsulta" class="tab-pane fade">
                    <div class="items-cv">
                      <!-- formacion academica -->
                      <div class="row">
                        <ol>
                          <li> <b>Total de consultas: </b> <label>100</label> </li>
                          <li> <b>Total de Tiempo: </b> <label>500 minutos</label> </li>
                        </ol>

                        <canvas id="totalLlamadasDoctor" width="300" height="200"></canvas>
                      </div>

                    </div>
                  </div>
                  <div id="medicoNotas" class="tab-pane fade">
                    <div class="doc-postulantes">
                      <label class="nota-title"><b>Nueva Nota</b></label>
                      <div class="row">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label" for="notaContenido">Escriba una nota del médico</label>
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
      <!-- MODAL VER PACIENTE -->

      <section id="verReceta" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="panel panel-primary" id="hidepanel1">
              <div class="panel-heading">
                <div class="modal-header">
                  <h3 class="panel-title">
                    <b>
                      Ver Receta
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
                    <h5>Edad 25 años</h5>


                  </div>
                  <div class="col-md-2">
                    <img src="{{ asset('assets/images/medico.png') }}" alt="" width="80px">
                  </div>
                  <div class="col-md-4">
                    <h4><b>Médico</b></h4>
                    <label><b>Juan Perez Olivarez</b></label>
                    <label>Médico General</label>

                  </div>
                </div>
                <br>
                <div class="row">
                  <ul class="nav nav-tabs tabs-li" style="width:100%">
                      <li class="col-md-3 active">
                          <a href="#recetaGeneral" data-toggle="tab" aria-expanded="false">General<div class="ripple-container"></div></a>
                      </li>
                      <li class="col-md-3">
                        <a href="#recetaConsulta" data-toggle="tab" aria-expanded="false">Consulta<div class="ripple-container"></div></a>
                      </li>
                      <li class="col-md-3">
                        <a href="#recetaReceta" data-toggle="tab" aria-expanded="false">Receta<div class="ripple-container"></div></a>
                      </li>
                      <li class="col-md-3">
                        <a href="#recetaNota" data-toggle="tab" aria-expanded="false">Notas<div class="ripple-container"></div></a>
                      </li>
                  </ul>
                </div>
                <div class="tab-content">
                  <div id="recetaGeneral" class="tab-pane fade active in">
                    <div class="items-cv">
                      <!-- formacion academica -->
                      <div class="row">
                        <ol>
                          <li> <b>Codigo: </b> <label>555858</label> </li>
                          <li> <b>Analisis: </b> <label>Glucosa</label> </li>
                          <li> <b>Fecha: </b> <label>05/08/2018</label> </li>
                          <li> <b>Precio: </b> <label>S/.30.00</label> </li>
                        </ol>
                      </div>
                    </div>
                  </div>
                  <div id="recetaConsulta" class="tab-pane ">
                    <div class="items-cv">
                      <div class="row">
                          <h4> <b>Sintomas</b> </h4>

                          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                              <div class="panel-heading" role="tab" id="headingOne">
                                <div class="row" onclick="consulta1()">
                                  <div class="col-md-11">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#sintoma1" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                      <h5 style="color: #000000">Dolor de cabeza</h5>
                                    </a>
                                  </div>
                                  <div class="col-md-1" style="padding-top: 10px">
                                    <span id="icoCD1" class="glyphicon glyphicon-triangle-bottom" style="display: block;color: #9f9f9f" aria-hidden="true"></span>
                                    <span id="icoCU1" class="glyphicon glyphicon-triangle-top" style="display: none;color: #9f9f9f" aria-hidden="true"></span>

                                  </div>
                                </div>
                              </div>
                              <div id="sintoma1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                                <div class="panel-body">
                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                </div>
                              </div>
                            </div>
                            <div class="panel panel-default">
                              <div class="panel-heading" role="tab" id="headingTwo">
                                <div class="row" onclick="consulta2()">
                                  <div class="col-md-11" >
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#sintoma2" aria-expanded="false" aria-controls="collapseTwo">
                                      <h5 style="color: #000000">
                                        Fiebre
                                      </h5>
                                    </a>
                                  </div>
                                  <div class="col-md-1">
                                    <span id="icoCD2" class="glyphicon glyphicon-triangle-bottom" style="display: block;color: #9f9f9f" aria-hidden="true"></span>
                                    <span id="icoCU2" class="glyphicon glyphicon-triangle-top" style="display: none;color: #9f9f9f" aria-hidden="true"></span>

                                  </div>
                                </div>
                              </div>
                              <div id="sintoma2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">
                                <div class="panel-body">
                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                </div>
                              </div>
                            </div>
                            <div class="panel panel-default">
                              <div class="panel-heading" role="tab" id="headingThree">
                                <div class="row" onclick="consulta3()">
                                  <div class="col-md-11" >
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#sintoma3" aria-expanded="false" aria-controls="collapseThree">
                                      <h5 style="color: #000000">tos seca</h5>
                                    </a>
                                  </div>
                                  <div class="col-md-1">
                                    <span id="icoCD3" class="glyphicon glyphicon-triangle-bottom" style="display: block;color: #9f9f9f" aria-hidden="true"></span>
                                    <span id="icoCU3" class="glyphicon glyphicon-triangle-top" style="display: none;color: #9f9f9f" aria-hidden="true"></span>

                                  </div>
                                </div>
                              </div>
                              <div id="sintoma3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">
                                <div class="panel-body">
                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>
                  <div id="recetaReceta" class="tab-pane  ">
                    <div class="items-cv">
                      <div class="row">
                          <h4> <b>Medicamentos</b> </h4>

                          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                              <div class="panel-heading" role="tab" id="headingOne">
                                <div class="row"  onclick="receta1()">
                                  <div class="col-md-11">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#med1" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                      <h5 style="color: #000000">Pastillas para el resfrio</h5>
                                    </a>
                                  </div>
                                  <div class="col-md-1">
                                    <span id="icoRD1" class="glyphicon glyphicon-triangle-bottom" style="display: block;color: #9f9f9f" aria-hidden="true"></span>
                                    <span id="icoRU1" class="glyphicon glyphicon-triangle-top" style="display: none;color: #9f9f9f" aria-hidden="true"></span>

                                  </div>
                                </div>
                              </div>
                              <div id="med1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                                <div class="panel-body">
                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                </div>
                              </div>
                            </div>
                            <div class="panel panel-default">
                              <div class="panel-heading" role="tab" id="headingTwo">
                                <div class="row"  onclick="receta2()">
                                  <div class="col-md-11">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#med2" aria-expanded="false" aria-controls="collapseTwo">
                                      <h5 style="color: #000000">
                                        Jarabe sicolan
                                      </h5>
                                    </a>
                                  </div>
                                  <div class="col-md-1">
                                    <span id="icoRD2" class="glyphicon glyphicon-triangle-bottom" style="display: block;color: #9f9f9f" aria-hidden="true"></span>
                                    <span id="icoRU2" class="glyphicon glyphicon-triangle-top" style="display: none;color: #9f9f9f" aria-hidden="true"></span>
                                  </div>
                                </div>
                              </div>
                              <div id="med2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">
                                <div class="panel-body">
                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                </div>
                              </div>
                            </div>

                          </div>

                        </div>
                    </div>
                  </div>
                  <div id="recetaNota" class="tab-pane fade">
                    <div class="doc-postulantes">
                      <label class="nota-title"><b>Nueva Nota</b></label>
                      <div class="row">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label" for="notaContenido">Escriba una nota de la receta</label>
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
      <section id="editarReceta" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="panel panel-primary" id="hidepanel1">
              <div class="panel-heading">
                <div class="modal-header">
                  <h3 class="panel-title">
                    <b>
                      Editar receta
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
                        <input id="nombres" name="nombres" type="text" class="format-input input-format form-control" value="Elvira">
                      </div>
                      <!-- Apellidos -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="apellidos">Apellidos</label>
                        <input id="apellidos" name="apellidos" type="text" class="format-input input-format form-control" value="Olivarez Santiago">
                      </div>
                      <!-- email -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="email">Correo</label>
                        <input id="email" name="email" type="text" class="format-input input-format form-control" value="elvira@email.com">
                      </div>
                      <!-- teléfono -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="telefono">Teléfono</label>
                        <input id="telefono" name="telefono" type="number" class="format-input input-format form-control" value="985574485">
                      </div>
                      <!-- Domicilio -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="domicilio">Domicilio</label>
                        <input id="domicilio" name="domicilio" type="text" class="format-input input-format form-control" value="Av. perez de cuellar Nro. 524">
                      </div>
                      <!-- sexo -->
                      <!-- <div class="form-group label-floating">
                        <label class="control-label" for="email">Sexo</label>
                        <input id="sexo" name="sexo" type="text" class="format-input input-format form-control" value="femenino">
                      </div> -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="sexo">Sexo</label>
                        <select id="selectP" name="sexo" onchange="this.form.action=this.value;" class="form-control" style="border-bottom: 1px solid #000000;">
                            <option>Femenino</option>
                            <option>Masculino</option>
                        </select>
                      </div>
                      <!-- dni -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="dni">DNI</label>
                        <input id="dni" name="dni" type="text" class="format-input input-format form-control" value="45254141">
                      </div>
                      <!-- nacionalidad -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="nacionalidad">Nacionalidad</label>
                        <input id="nacionalidad" name="nacionalidad" type="text" class="format-input input-format form-control" value="Peruana">
                      </div>


                      <!-- ID CMP -->
                      <!-- <div class="form-group label-floating">
                        <label class="control-label" for="email">ID CMP</label>
                        <input id="idcmp" name="idcmp" type="text" class="format-input input-format form-control" value="74857474">
                      </div> -->

                    </div>
                  </fieldset>
                </form>
              </div>
              <div class="panel-footer">
                <div class="modal-pie">
                  <div class=" text-right">
                    <button type="submit" class="format btn btn-responsive btn-verde" style="margin:5px !important;vertical-align: middle;">Editar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- MODAL EDITAR POSTULANTE -->

      <!-- MODAL ELIMINAR POSTULANTE -->
      <section id="eliminarReceta" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="panel panel-primary" id="hidepanel1">
              <div class="panel-heading">
                <div class="modal-header">
                  <h3 class="panel-title">
                    <b>
                      Eliminar Receta Médica
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
                  <h4>¿Desea eliminar el análisis clínico?</h4>
                </div>
              </div>
              <div class="panel-footer">
                <div class="modal-pie">
                  <div class=" text-right">
                    <button id="btnEliminarRecetaSi" data-dismiss="modal" class='format btn-crud btn btn-verde'>
                      Si
                    </button>
                    &nbsp;
                    <button data-toggle='modal' data-dismiss="modal" class='format btn-crud btn btn-naranja'>
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

      <!-- MODAL ELIMINAR POSTULANTE -->
      <section id="verDetalleReceta" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="panel panel-primary" id="hidepanel1">
              <div class="panel-heading">

                <div class="modal-header">
                  <h3 class="panel-title">
                    <b>
                      Ver receta
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
                  <h4>¿Desea eliminar el análisis clínico?</h4>
                </div>
                <!-- options -->
                <div class="row text-center">
                  <div class="col-md-12">
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

      <!-- MODAL ELIMINAR POSTULANTE -->
      <section id="verDetalleConsulta" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="panel panel-primary" id="hidepanel1">
              <div class="panel-heading">
                <div class="modal-header">
                  <h3 class="panel-title">
                    <b>
                      Ver consulta
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
                  <h4>¿Desea eliminar el análisis clínico?</h4>
                </div>
                <!-- options -->
                <div class="row text-center">
                  <div class="col-md-12">
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
    <!-- MODAL SECTIONS END -->

    @stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form_layouts.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/frontend/admin/receta.js')}}"></script>
    
@stop
