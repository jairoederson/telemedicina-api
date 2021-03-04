@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Form Examples
@parent
@stop

{{-- page level styles --}}
@section('header_styles')

<link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}"  rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/vendors/iCheck/css/all.css') }}"  rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}"/>
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="{{ asset('assets/css/pages/only_dashboard.css') }}"/>
<link href="{{ asset('assets/vendors/sweetalert/css/sweetalert.css') }}" rel="stylesheet" type="text/css" />
<style>
    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
        padding: 8px 8px 0px 8px !important;
</style>
<style>
       
        th, td { white-space: nowrap; }
    div.dataTables_wrapper {
        margin: 0 auto;
    }
 
    div.container {
        width: 80%;
    }
    </style>
@stop
{{-- Page content --}}
@section('content')

<section class="content-header section-header">
    <!--section starts-->
    <div class="row">
        <div class="col-md-8">
            <h1 class="header-title">Laboratorios</h1>
        </div>
        <div class="col-md-3">
            <div class="text-right" style="padding-top: 5px; padding-right: 5px">
<!--                <button type="button" class="format btn" data-toggle="modal" data-target="#agregarMedico"
                        style="background-color: #868686; border-radius: 5px">Agregar Usuario</button>-->
<a href="{{ URL::to('admin/laboratoriosreg') }}"><button type="button" class="format btn"
        style="background-color: #868686; border-radius: 5px">Agregar Laboratorio</button></a>
            </div>
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
            <a href="#">Laboratorios</a>
        </li>
    </ol> -->
</section>
<!--section ends-->
<section class="content">
    <!--main content-->
    <div class="row">
        <div class="panel panel-primary">
            <!-- <div class="panel-heading">
                <h4 class="panel-title"><i class="livicon" data-name="user" data-size="16" data-loop="true"
                                           data-c="#fff" data-hc="white"></i>
                    Laboratorios
                </h4>
            </div> -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered width100" id="tableLaboratorio">
                        <thead>
                            <tr class="filters">
                                <th>Laboratorio</th>
                                <th>Responsable</th>
                                <th>Telefono</th>
                                <th>Departamento</th>
                                <th>Provincia</th>
                                <th>Distrito</th>
                                <th>Ubicacion</th>
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
<!-- MODAL VER PACIENTE LABORATORIO -->
<section id="verPacienteLaboratorio" class="modal fade" role="dialog">
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
<!-- MODAL VER MEDICO LABORATORIO -->
<section id="verMedicoLaboratorio" class="modal fade" role="dialog">
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
<section id="verLaboratorio" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="panel panel-primary" id="hidepanel1">
                <div class="panel-heading">
                    <div class="modal-header">
                        <h3 class="panel-title">
                            <b>
                                Ver Analisis Clínico
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
                        <div class="col-md-2 text-center">
                            <img src="{{ asset('assets/images/paciente2.jpg') }}" class="img-form" alt="" width="80px">
                        </div>
                        <div class="col-md-4">
                            <h4><b>Paciente</b></h4>
                            <h5>Elvira Olivarez Santiago</h5>
                            <h5>Edad: 25 años</h5>

                        </div>
                        <div class="col-md-2 text-center">
                            <img src="{{ asset('assets/images/medico.png') }}" class="img-form" alt="" width="80px">
                        </div>
                        <div class="col-md-4">
                            <h4><b>Responsable</b></h4>
                            <label>Juan Perez Olivare<</label>
                            <label>Médico Farmaceutico</label>

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <ul class="nav nav-tabs tabs-li" style="width: 100%">

                            <li class="col-md-4 active">
                                <a href="#labGeneral" data-toggle="tab" aria-expanded="false">General<div class="ripple-container"></div></a>
                            </li>

                            <li class="col-md-4">
                                <a href="#labDetalle" data-toggle="tab" aria-expanded="false">Detalle de Análisis<div class="ripple-container"></div></a>
                            </li>

                            <li class="col-md-4">
                                <a href="#labNotas" data-toggle="tab" aria-expanded="false">Notas<div class="ripple-container"></div></a>
                            </li>

                        </ul>
                    </div>
                    <div class="tab-content">
                        <div id="labGeneral" class="tab-pane fade active in">
                            <div class="items-cv">
                                <!-- formacion academica -->
                                <div class="row" style="padding-top: 9px">
                                    <ol>
                                        <li> <b>Codigo: </b> <label>555858</label> </li>
                                        <li> <b>Analisis: </b> <label>Glucosa</label> </li>
                                        <li> <b>Fecha: </b> <label>05/08/2018</label> </li>
                                        <li> <b>Precio: </b> <label>S/.30.00</label> </li>

                                    </ol>

                                </div>
                            </div>
                        </div>
                        <div id="labDetalle" class="tab-pane fade">
                            <div class="items-cv">
                                <div class="row">
                                    <h5> <b>General Orina</b> </h4>

                                        <label> <b>Aspecto: </b> </label>
                                        <label>Oscuro</label><br>

                                        <label> <b>Color: </b> </label>
                                        <label>Verde</label><br>

                                        <label> <b>Densidad: </b> </label>
                                        <label>1.222</label>
                                </div>


                            </div>
                        </div>
                        <div id="labNotas" class="tab-pane fade">
                            <div class="doc-postulantes">
                                <label class="nota-title"><b>Nueva Nota</b></label>
                                <div class="row">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label" for="notaContenido">Escriba una nota del analisis</label>
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
<section id="editarLaboratorio" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="panel panel-primary" id="hidepanel1">
                <div class="panel-heading">

                    <div class="modal-header">
                        <h3 class="panel-title">
                            <b>
                                Editar Análisis Clínico
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
                                    <label class="control-label" for="nombres">Responsable</label>
                                    <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="nombres" name="nombres" type="text" class="format-input input-format form-control" value="Juan Perez Olviedo">
                                </div>
                                <!-- Apellidos -->
                                <div class="form-group label-floating">
                                    <label class="control-label" for="apellidos">Tipo Prueba</label>
                                    <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="apellidos" name="apellidos" type="text" class="format-input input-format form-control" value="Glucosa">
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
<section id="eliminarLaboratorio" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="panel panel-primary" id="hidepanel1">
                <div class="panel-heading">
                    <div class="modal-header">
                        <h3 class="panel-title">
                            <b>
                                Eliminar Análisis Médico
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
                    <!-- <div class="row text-center">
                      <div class="col-md-12">
    
                      </div>
                    </div> -->
                </div>
                <div class="panel-footer">
                    <div class="modal-pie">
                        <div class=" text-right">
                            <button id="btnEliminarLaboratorioSi" data-dismiss="modal" class='format btn-crud btn btn-verde'>
                                Si
                            </button>
                            &nbsp;
                            <button data-toggle='modal' data-target='#eliminarLaboratorio' class='format btn-crud btn btn-naranja'>
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
<script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" ></script>
<script src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
<script src="{{ asset('assets/js/pages/form_examples.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
 <script src="{{ asset('assets/vendors/sweetalert/js/sweetalert.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/sweetalert/js/sweetalert-dev.js') }}" type="text/javascript"></script>
<script type="text/javascript" >
    
    $(function () {
    $('#menuLaboratorios').addClass("active");
    });
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
                        function guardarNota() {
                            lenLista = misNotas.length;
                            notaContenido = document.getElementById('notaContenido').value
                            misNotas.push({
                                id: lenLista + 1,
                                contenido: notaContenido
                            })
                            listarNotas()
                        }
                        function listarNotas() {

                            var listaNotas = document.getElementById('misNotas')
                            for (var i = 0; i < 3; i++)
                            {
                                var li = document.createElement("li")
                                li.appendChild(document.createTextNode(misNotas[i].contenido))
                                li.setAttribute("id", misNotas[i].id);
                                li.setAttribute("class", "nota");
                                listaNotas.appendChild(li)
                            }
                        }
                        listarNotas()
// NOTAS DEL POSTULANTE END

                        var acciones = `
<div class='text-center'>
    <button title='Ver' class='btn-crud btn' onclick="location.href='/admin/laboratoriosver/'" style='background-color: #868686; margin-right: 0px'>
    <span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>
</button>
<button title='Editar' data-toggle='modal' data-target='#editarLaboratorio' class='btn-crud btn' style='background-color: #868686; margin-right: 0px'>
<span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
</button>
<button id='btnEliminarLaboratorio' title='Eliminar' class='btn-crud btn color-red'>
<span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
</button>
</div>
`;

                        $(function () {
                            var tableLaboratorios = $('#tableLaboratorio').DataTable({
                                "language": {
                                    "sProcessing": "Procesando...",
                                    "sLengthMenu": "Mostrar _MENU_ registros",
                                    "sZeroRecords": "No se encontraron resultados",
                                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                                    "sInfoPostFix": "",
                                    "sSearch": "Buscar:",
                                    "sUrl": "",
                                    "sInfoThousands": ",",
                                    "sLoadingRecords": "Cargando...",
                                    "oPaginate": {
                                        "sFirst": "Primero",
                                        "sLast": "Último",
                                        "sNext": "Siguiente",
                                        "sPrevious": "Anterior"
                                    },
                                    "oAria": {
                                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                                    }
                                },
                                "columns": [
                                    { "data": "name" },
                                    { "data": "laboratorista" },
                                    { "data": "telephone" },
                                    { "data": "departamentos" },
                                    { "data": "provincias" },
                                    { "data": "distritos" },
                                    { "data": "address_total" },
//                                    { "data": "created_at" },
                                    { "data": "acciones" }
                                ]
//                                "data": [
//                                    [
//                                        "1",
//                                        "Juan Perez Olviedo",
//                                        "Lima",
//                                        "Jr Tupac amaru 223",
//                                        "12/05/2017",
//                                        acciones
//                                    ]
//                                ]
                            });
//
//                            $('#tableLaboratorio tbody').on('click', 'button#btnEliminarLaboratorio', function () {
//                                var table = $(this);
//                                $("#eliminarLaboratorio").modal();
//                                $("#btnEliminarLaboratorioSi").on('click', function () {
//                                    tableLaboratorios
//                                            .row(table.parents('tr'))
//                                            .remove()
//                                            .draw();
//                                })
//                            });


                        });
listarLaboratorios();
function listarLaboratorios() {
    $.ajax({
        type: 'post',
        url: "{{ URL::to('admin/listarlaboratorios') }}",
        dataType: "json",
        data: {'_token': '{{ csrf_token() }}'},
        beforeSend: function (xhr) {
            //progreso();
        }
    }).done(function (dataRpta) {
//        alert(JSON.stringify(dataRpta));
        $('#tableLaboratorio').DataTable().clear().draw();
        jQuery.each(dataRpta, function (i, val) {
            val.address_total = val.address + ' - ' + val.address_extra_info;
            val.acciones = `
                    <div class='text-center'>
                    <button title='Editar' onclick="location.href='/admin/laboratoriosact/` + val.id + 
                        `'" class='btn-crud btn' style='background-color: #868686'>
                      <span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
                    </button>
                    <button title='Ver' onclick="location.href='/admin/laboratoriosimagen/` + val.id + 
                        `'" class='btn-crud btn' style='background-color: #868686'>
                      <span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>
                    </button>
                    <button onclick="eliminar(` + val.id + `)" title='Eliminar' class='btn-crud btn color-red'>
                      <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
                    </button>
                    </div>`;
            $('#tableLaboratorio').DataTable().row.add(val).draw();
        });


    }).fail(function (jqXHR, textStatus) {
        //alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
    }).always(function () {
        //cerrarProgreso();
    });
}


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
            eliminarLaboratorio(id);
            swal("Eliminado!", "eliminacion correcta.", "success");
        });
    }


    function eliminarLaboratorio(id) {

        $.ajax({
            type: 'post',
            url: "{{ URL::to('admin/eliminarlaboratorio') }}",
            dataType: "json",
            data: {idlaboratorio: id, '_token': '{{ csrf_token() }}'},
            beforeSend: function (xhr) {
                //alert(id);
            }
        }).done(function (dataRpta) {
            listarLaboratorios();
        }).fail(function (jqXHR, textStatus) {
            alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
        }).always(function () {
        });

    }




</script>


@stop
