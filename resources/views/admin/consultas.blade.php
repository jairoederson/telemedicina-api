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
    <link href="{{ asset('assets/vendors/sweetalert/css/sweetalert.css') }}" rel="stylesheet" type="text/css" />

    <!-- <link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css"/> -->
    <!-- <link rel="stylesheet" href="{{ asset('assets/css/pages/only_dashboard.css') }}"/> -->
    <style>
    
    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
        padding: 8px 8px 0px 8px !important;
    }
    .red {
  background-color: orange !important;
    }
</style>
@stop

{{-- Page content --}}
@section('content')
<section class="content-header section-header">


  <div class="row">
    <div class="col-md-9">
      <h4 class="header-title"> Consultas Medicas </h4>
        
  </div>
    <div class="col-md-12">

      <div class="row">

        <ul class="nav nav-tabs tabs-li" style="width:100%">
          <li class="col-md-6 active">
            <a href="#ConsultasPendientes" data-toggle="tab" aria-expanded="false">Consultas Pendientes<div class="ripple-container"></div></a>
          </li>
          <li class="col-md-6">
            <a href="#ConsultasAtendidas" data-toggle="tab" aria-expanded="false">Consultas Atendidas<div class="ripple-container"></div></a> 
           </li>
           <li class="col-md-6">
            <a href="#ConsultasCanceladas" data-toggle="tab" aria-expanded="false">Consultas Canceladas<div class="ripple-container"></div></a> 
           </li>
        </ul>
        </div>
    </div>
    <div class="tab-content">
      <div class="tab-pane fade active in" id="ConsultasPendientes">
        <div class="items-cv">
          <div class="row">
            <select class="form-control" id="cmboConsultas">
              <option value="a">Seleccione un Estado</option>
              <option value="0">Pendientes</option>
              <option value="2">No Atendidas</option>
              <option value="3">Pagadas</option>
              <option value="4">No Pagadas</option>

            </select>
              <table class="table table-bordered width100"  style="width:100%" id="tableConsulta" >
                          <thead>
                          <tr class="filters">
                            
                            <th>Medico</th>
                            <th>Paciente</th>
                            <th>Fecha</th>
                            <th>Duración</th>
                            <th>Costo</th>
                            <th>Estado de Pago</th>
                            <th>Modalidad</th>
                            <th>Modalidad de Pago</th>

                            {{-- <th>Receta</th> --}}
                            <th>Acciones</th>
                          </tr>
                          </thead>
                          <tbody>

                          </tbody>
              </table>
          </div>
        </div>

      </div>  
      <div class="tab-pane fade" id="ConsultasAtendidas">
        <div class="items-cv">
          <div class="row">
                      <table class="table table-bordered width100" style="width:100%" id="tableConsulta2" >
                          <thead>
                          <tr class="filters">
                            
                            <th>Medico</th>
                            <th>Paciente</th>
                            <th>Fecha</th>
                            <th>Duración</th>
                            <th>Costo</th>
                            <th>Estado de Pago</th>
                            <th>Modalidad</th>
                            <th>Modalidad de Pago</th>
                            {{-- <th>Receta</th> --}}
                            <th>Acciones</th>
                          </tr>
                          </thead>
                          <tbody>

                          </tbody>
                      </table>
          </div>
        </div>

      </div>
      <div class="tab-pane fade" id="ConsultasCanceladas">
        <div class="items-cv">
          <div class="row">
                      <table class="table table-bordered width100" style="width:100%" id="tableConsulta3" >
                          <thead>
                          <tr class="filters">
                            
                            <th>Medico</th>
                            <th>Paciente</th>
                            <th>Fecha</th>
                            <th>Duración</th>
                            <th>Costo</th>
                            <th>Modalidad</th>
                            <th>Modalidad de Pago</th>
                            {{-- <th>Receta</th> --}}
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

  </div>
</section>

    <!--section starts-->

      <!-- MODAL SECTIONS -->
      <!-- MODAL VER PACIENTE CONSULTA -->
      <section id="verPacienteConsulta" class="modal fade" role="dialog">
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
                      <a href="#pacienteInfoPersonal" data-toggle="tab" aria-expanded="false">Info. Personal<div class="ripple-container"></div></a>
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
      <!-- MODAL VER MEDICO CONSULTA -->

      <section id="verMedicoConsulta" class="modal fade" role="dialog">
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
      <!-- MODAL VER CONSULTA -->

      <section id="verConsulta" class="modal fade" role="dialog">
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
                <!--  -->
                <div class="row">
                  <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/images/paciente2.jpg') }}" class="img-form" alt="" width="80px">
                  </div>
                  <div class="col-md-4">
                    <h4><b>Paciente</b></h4>
                    <h5>Elvira Olivarez Santiago</h5>
                    <h5>32 años</h5>


                  </div>
                  <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/images/doctor.jpg') }}" alt="" class="img-form" width="80px">
                  </div>
                  <div class="col-md-4">
                    <h4><b>Medico</b></h4>
                    <label>Juan Perez Olivarez</label>
                    <label>Medicina General</label>

                  </div>
                </div>
                <br>
                <div class="row">
                  <ul class="nav nav-tabs tabs-li" style="width: 100%">

                    <li class="col-md-3 active">
                      <a href="#consultaGeneral" data-toggle="tab" aria-expanded="false">General<div class="ripple-container"></div></a>
                    </li>

                    <li class="col-md-3">
                      <a href="#consultaConversacion" data-toggle="tab" aria-expanded="false">Conversacion<div class="ripple-container"></div></a>
                    </li>

                    <li class="col-md-3">
                      <a href="#consultaGrab" data-toggle="tab" aria-expanded="true">Grabacion<div class="ripple-container"></div></a>
                    </li>

                    <li class="col-md-3">
                      <a href="#consultaNotas" data-toggle="tab" aria-expanded="true">Notas<div class="ripple-container"></div></a>
                    </li>
                  </ul>
                </div>
                <br>
                <div class="tab-content">

                  <div id="consultaGeneral" class="margin-bottom tab-pane fade active in">

                    <div class="row generalCont1">
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
                          <label for=""><b>Duracion</b> </label>
                        </div>
                        <div class="text-center">
                          <label for="">15 minutos</label>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="text-center">
                          <label for=""><b>Precio</b></label>
                        </div>
                        <div class="text-center">
                          <label for="">S/. 5.00</label>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="text-center">
                          <label for=""><b>Modo</b></label>
                        </div>
                        <div class="text-center">
                          <label for="">App - Web</label>
                        </div>
                      </div>
                    </div>
                    <div class="generalCont2">
                      <div class="row">
                        <h5><b>Sintoma del paciente</b></h5>
                        <p>Dolor de cabeza, nauceas, diarrea</p>
                      </div>
                      <div class="row">
                        <h5><b>Mensaje del paciente</b></h5>
                        <p>Doctor me siento mal tengo nauceas y diarrea y me duele mucho la
                          cabeza, por favor ayudeme, que puedo hacer para evitar el malestar. </p>
                      </div>
                      <div class="row">
                        <h5><b>Calificacion del cliente</b></h5>
                        <div class='text-left'>
                            <span class='glyphicon glyphicon-star' aria-hidden='true' style='color: #f1c420; font-size: 20px;'></span> &nbsp;
                            <span class='glyphicon glyphicon-star' aria-hidden='true' style='color: #f1c420; font-size: 20px;'></span>&nbsp;
                            <span class='glyphicon glyphicon-star' aria-hidden='true' style='color: #f1c420; font-size: 20px;'></span>&nbsp;
                            <span class='glyphicon glyphicon-star' aria-hidden='true' style='color: #f1c420; font-size: 20px;'></span>&nbsp;
                            <span class='glyphicon glyphicon-star' aria-hidden='true' style='color: #f1c420; font-size: 20px;'></span>
                        </div>
                      </div>
                      <div class="row">
                        <h5><b>Valoración</b></h5>
                        <p> Excelente </p>
                      </div>
                    </div>
                  </div>

                  <div id="consultaConversacion" class="margin-bottom margin-top tab-pane fade">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-md-4" style="">
                            <div class="" style="background-color: #f5f5f5; padding-top: 3px; padding-bottom: 3px; border-radius: 10px 10px 10px 10px;">
                              <img class="img-chat" src="{{ asset('assets/images/paciente2.jpg') }}" alt="" width="30px;">
                              <label>Elvira</label>
                            </div>
                          </div>
                          <div class="col-md-4">

                          </div>
                          <div class="col-md-4 text-right" style="padding-top: 10px;">
                            <label id="time">7:35 am.</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="message-chat">
                            Hola doc como esta, le escribo por que tengo una consulta
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12 margin-top">
                        <div class="row">
                          <div class="col-md-4" style="padding-top: 10px;">
                            <label id="tiempo">7:36 am.</label>
                          </div>
                          <div class="col-md-4">

                          </div>
                          <div class="col-md-4 text-right">
                            <div class=""  style="background-color: #f5f5f5; padding-top: 3px; padding-bottom: 3px; border-radius: 10px 10px 10px 10px;">
                              <label>Ricardo</label>
                              <img class="img-chat" src="{{ asset('assets/images/doctor.jpg') }}" alt="" width="30px;">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="message-chat">
                            Hola doc como esta, le escribo por que tengo una consulta
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div id="consultaGrab" class="margin-bottom tab-pane fade text-center margin-top">
                    <video width="400" controls style="background-color: #fafafa">
                      <source src="" type="video/mp4">
                      <source src="mov_bbb.ogg" type="video/ogg">
                    </video>
                  </div>

                  <div id="consultaNotas" class="tab-pane fade">
                    <div class="doc-postulantes">
                      <label class="nota-title"><b>Nueva Nota</b></label>
                      <div class="row">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label" for="notaContenido">Escriba una nota de la consulta</label>
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
      <!-- MODAL VER CONSULTA END -->

      <!-- MODAL EDITAR CONSULTA -->
      <section id="editarConsulta" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="panel panel-primary" id="hidepanel1">
              <div class="panel-heading">
                <div class="modal-header">
                  <h3 class="panel-title">
                    <b>
                      Editar Consulta
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

                      <div class="form-group">
                        <div class=" text-right">
                          <button type="" class="btn format btn-responsive btn-verde">Editar</button>
                        </div>
                      </div>
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
      <!-- MODAL EDITAR CONSULTA -->

      <!-- MODAL ELIMINAR CONSULTA -->
      <section id="eliminarConsulta" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="panel panel-primary" id="hidepanel1">
              <div class="panel-heading">
                <div class="modal-header">
                  <h3 class="panel-title">
                    <b>
                      Eliminar Consulta
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
                  <h4>¿Desea eliminar la consulta?</h4>
                </div>

              </div>
              <div class="panel-footer">
                <div class="modal-pie">
                  <div class=" text-right">
                    <button id="btnEliminarConsultaSi" data-dismiss="modal" class='format btn-crud btn btn-verde'>
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
      <!-- MODAL EDITAR CONSULTA -->

      <!-- MODAL VER GRABACION -->
      <section id="verConsultaM" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="panel panel-primary" id="hidepanel1">
              <div class="panel-heading">
                <h3 class="panel-title">
                  Grabacion de consulta
                </h3>
                <span class="pull-right">
                  <!-- <i class="material-icons clickable">keyboard_arrow_up</i> -->
                  <!-- <i class="material-icons removepanel clickable">clear</i> -->
                </span>
              </div>
              <div class="panel-body">
                <!-- question -->
                <div class="row text-center"> 
                  <h4>¿Desea eliminar al Paciente?</h4>
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

      <section id="verConsultaReceta" class="modal fade" role="dialog">
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
                <!-- question -->
                <div class="row text-left">
                  <h4><b>Detalle de receta</b></h4>
                </div>
                <!-- options -->
                <div class="row text-left">
                    <ol>
                      <li><b>Medicamento 01</b></li>
                      <li>Tomar despues de cada almuerzo por una semana</li>
                      <br>
                      <li><b>Medicamento 02</b></li>
                      <li>Tomar despues de cada almuerzo por una semana</li>
                      <br>
                      <li><b>Medicamento 03</b></li>
                      <li>Tomar despues de cada almuerzo por una semana</li>

                    </ol>
                </div>
              </div>
              <div class="panel-footer">
                <div class="modal-pie">
                  <div class=" text-right">
                    <br><br><br>

                  </div>
                </div>
              </div
            </div>
          </div>
        </div>
      </section>

      <!-- MODAL EDITAR CONSULTA -->
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
    <script src="{{ asset('assets/vendors/sweetalert/js/sweetalert.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/sweetalert/js/sweetalert-dev.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
         $('#menuConsultas').addClass("active");
    var urllistar = "{{ URL::to('admin/listarconsultas') }}";
    var urllistar2 = "{{ URL::to('admin/listarconsultasatendidas') }}";
    var urllistar3 = "{{ URL::to('admin/listarconsultascanceladas') }}";

    var urlcambiarestados = "{{ URL::to('admin/actualizarconsultasatendidas') }}";
    var urlcancelar = "{{ URL::to('admin/actualizarconsultascanceladas') }}";
    var urlactualizarpagos = "{{ URL::to('admin/actualizarconsultaspagos') }}";

    var token = '{{ csrf_token() }}';
    //listarAsociados();
    </script>
    <script type="text/javascript" src="{{ asset('assets/js/frontend/admin/consulta.js')}}"></script>
   
    
@stop
