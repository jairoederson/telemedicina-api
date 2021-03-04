@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Josh Admin Template
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/admin/admin.css') }}">
<link href="{{ asset('assets/vendors/sweetalert/css/sweetalert.css') }}" rel="stylesheet" type="text/css" />
<!-- <link href="{{ asset('assets/vendors/fullcalendar/css/fullcalendar.css') }}" rel="stylesheet" type="text/css"/> -->
<!-- <link href="{{ asset('assets/css/pages/calendar_custom.css') }}" rel="stylesheet" type="text/css"/> -->
<!-- <link rel="stylesheet" media="all" href="{{ asset('assets/vendors/bower-jvectormap/css/jquery-jvectormap-1.2.2.css') }}"/> -->
<!-- <link rel="stylesheet" href="{{ asset('assets/vendors/animate/animate.min.css') }}"> -->
<!-- <link rel="stylesheet" href="{{ asset('assets/css/pages/only_dashboard.css') }}"/> -->
<!-- <link rel="stylesheet" href="{{ asset('assets/vendors/starrating/css/star-rating.min.css') }}"/> -->
<!-- <link rel="stylesheet" href="{{ asset('assets/vendors/starability/starability-all.css') }}"/> -->
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

<!-- <meta name="_token" content="{{ csrf_token() }}"> -->
<!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/smalotDatepicker/css/bootstrap-datetimepicker.min.css') }}"> -->
<!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/login.css') }}" /> -->


<!-- <link rel="stylesheet" type="text/css" href="http://material.joshadmin.com/assets/css/bootstrap.min.css"> -->
<!-- <link rel="stylesheet" type="text/css" href="http://material.joshadmin.com/assets/A.css,,_lib.css+vendors,,_bootstrapvalidator,,_css,,_bootstrapValidator.min.css,Mcc.O2mSEh98l7.css.pagespeed.cf.ASzEBs_nDp.css"> -->
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
        th, td { white-space: nowrap; }
    div.dataTables_wrapper {
        margin: 0 auto;
    }
 
    div.container {
        width: 80%;
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
        <div class="col-md-9">
            <h4 class="header-title">Medicos</h4>
        </div>

        <div class="col-md-3">
            <div class="text-right" style="padding-top: 5px; padding-right: 5px">
                <a href="{{ URL::to('admin/registrousuario') }}"><button type="button" class="format btn" d
                                                                         style="background-color: #868686; border-radius: 5px">Agregar Usuario</button></a>
            </div>
        </div>
    </div>
</section>


<section class="content">
    <div class="row medico-content">
        <div class="panel panel-primary" >
            <br>
            <div class="panel-body" style="padding-top: 0px !important;">
                
<!--                <a href="{{url('admin/vermedicos',array('idmedico'=>10))}}">aquiiii</a>-->
                
                <div class="table-responsive">
                    <table class="table table-bordered width100" id="tableMedico" >
                        <thead>
                            <tr class="filters">
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>DNI</th>
                                <th>CMP</th>
                                <th>Email</th>
                                <th>Especialidad</th>
                                <th>Atenciones</th>
                                <th>Rating Global &nbsp;&nbsp;</th>
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
<!-- MODAL AGREGAR MEDICO -->
<section id="agregarMedico" class="modal fade" role="dialog">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="panel panel-primary" id="hidepanel1">
                <div class="panel-heading">

                    <div class="modal-header">
                        <h3 class="panel-title">
                            <b>
                                Nuevo Médico
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
                        <ul class="nav nav-tabs tabs-li" style="width:100%">
                            <li class="col-md-4 active">
                                <a href="#medicoDatosPers" data-toggle="tab" aria-expanded="false">Datos Personales<div class="ripple-container"></div></a>
                            </li>
                            <li class="col-md-4">
                                <a href="#medicoDatosProf" data-toggle="tab" aria-expanded="false">Datos Profesionales<div class="ripple-container"></div></a>
                            </li>
                            <li class="col-md-4">
                                <a href="#medicoDocumentos" data-toggle="tab" aria-expanded="false">Documentos<div class="ripple-container"></div></a>
                            </li>
                        </ul>
                    </div>
                    <br>
                    <div class="tab-content">
                        <div id="medicoDatosPers" class="tab-pane fade active in">
                            <form>
                                <fieldset>
                                    <div class="col-md-12">
                                        <!-- Name input-->
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label" for="name">Nombres</label>
                                            <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="nombres" name="nombres" type="text" class="format-input input-format form-control">
                                        </div>
                                        <!-- Apellidos input -->
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label" for="name">Apellidos</label>
                                            <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="apellidos" name="apellidos" type="text" class="format-input input-format form-control">
                                        </div>

                                        <!-- email -->
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label" for="email">Correo</label>
                                            <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="correo" name="correo" type="text" class="format-input input-format form-control">
                                        </div>

                                        <!-- teléfono -->
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label" for="email">Teléfono</label>
                                            <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="telefono" name="telefono" type="text" class="format-input input-format form-control">
                                        </div>
                                        <!-- ID CMP -->
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label" for="email">ID CMP</label>
                                            <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="idcmp" name="idcmp" type="text" class="format-input input-format form-control">
                                        </div>
                                        <!-- Contraseña -->
                                        <div class="row">
                                            <div id="pwdMedico" class="col-md-7 form-group label-floating is-empty" style="padding-left: 0px;">
                                                <label class="control-label" for="password">Contraseña</label>
                                                <input id="password" name="password" type="password" class="format-input input-format form-control">
                                            </div>
                                            <div class="col-md-1" style="padding-top: 150px;">
                                                <span onclick="showPassword()" id="viz1" class="glyphicon glyphicon-eye-open icon-viz" style="display: block; color: #9f9f9f" aria-hidden="true"></span>
                                                <span onclick="showPassword()" id="viz2" class="glyphicon glyphicon-eye-close icon-viz" style="display: none; color: #9f9f9f" aria-hidden="true"></span>
                                            </div>
                                            <div class="col-md-4" style="padding-top: 40px;">
                                                <button onclick="generarPwd()" type="button" class="format btn btn-responsive btn-verde" style="margin:5px !important;vertical-align: middle;">Generar Contraseña</button>
                                            </div>

                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                        <div id="medicoDatosProf" class="tab-pane fade">
                            <form>
                                <fieldset>
                                    <div class="col-md-12">
                                        <!-- Name input-->
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label" for="especialidad">Especialidades</label>
                                            <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="especialidad" name="especialidad" type="text" class="format-input input-format form-control">
                                            <em style="color: #d0d0d0">Separado por comas</em>
                                        </div>
                                        <!-- Name input-->
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label" for="colegio">Colegio Médico</label>
                                            <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="colegio" name="colegio" type="text" class="format-input input-format form-control">
                                        </div>
                                        <!-- Apellidos input -->
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label" for="universidad">Universidad</label>
                                            <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="universidad" name="universidad" type="text" class="format-input input-format form-control">
                                        </div>

                                        <!-- linked in -->
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label" for="linkedIn">LinkedIn</label>
                                            <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="linkedIn" name="linkedIn" type="text" class="format-input input-format form-control">
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                        <div id="medicoDocumentos" class="tab-pane fade">
                            <div class="row">
                                <div class="col-md-6 fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 100px; height: 100px;"></div>
                                    <div>
                                        <span class="btn btn-primary btn-file">
                                            <span class="fileinput-new">Titulo Universitario</span>
                                            <span class="fileinput-exists">Cambiar</span>
                                            <input type="file" name="tituloU" id="tituloU">
                                        </span>
                                        <a href="#" class="btn btn-primary fileinput-exists" data-dismiss="fileinput">Quitar</a>
                                    </div>
                                </div>
                                <div class="col-md-6 fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 100px; height: 100px;"></div>
                                    <div>
                                        <span class="btn btn-primary btn-file">
                                            <span class="fileinput-new">Certificado de capacitación</span>
                                            <span class="fileinput-exists">Cambiar</span>
                                            <input type="file" name="certificadoC" id="certificadoC">
                                        </span>
                                        <a href="#" class="btn btn-primary fileinput-exists" data-dismiss="fileinput">Quitar</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 100px; height: 100px;"></div>
                                    <div>
                                        <span class="btn btn-primary btn-file">
                                            <span class="fileinput-new">Constancia de trabajo</span>
                                            <span class="fileinput-exists">Cambiar</span>
                                            <input type="file" name="constanciaT" id="constanciaT">
                                        </span>
                                        <a href="#" class="btn btn-primary fileinput-exists" data-dismiss="fileinput">Quitar</a>
                                    </div>
                                </div>
                                <div class="col-md-6 fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 100px; height: 100px;"></div>
                                    <div>
                                        <span class="btn btn-primary btn-file">
                                            <span class="fileinput-new">Constancia de Colegio Médico</span>
                                            <span class="fileinput-exists">Cambiar</span>
                                            <input type="file" name="constanciaCM" id="constanciaCM">
                                        </span>
                                        <a href="#" class="btn btn-primary fileinput-exists" data-dismiss="fileinput">Quitar</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 100px; height: 100px;"></div>
                                    <div>
                                        <span class="btn btn-primary btn-file">
                                            <span class="fileinput-new">Otro Documento</span>
                                            <span class="fileinput-exists">Cambiar</span>
                                            <input type="file" name="otroDoc" id="otroDoc">
                                        </span>
                                        <a href="#" class="btn btn-primary fileinput-exists" data-dismiss="fileinput">Quitar</a>
                                    </div>
                                </div>
                                <div class="col-md-6 fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 100px; height: 100px;"></div>
                                    <div>
                                        <span class="btn btn-primary btn-file">
                                            <span class="fileinput-new">Otro Documento</span>
                                            <span class="fileinput-exists">Cambiar</span>
                                            <input type="file" name="otroDoc" id="otroDoc">
                                        </span>
                                        <a href="#" class="btn btn-primary fileinput-exists" data-dismiss="fileinput">Quitar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
<!-- MODAL AGREGAR MEDICO -->

<!-- MODAL VER MEDICO -->
<section id="verMedico" class="modal fade" role="dialog">
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
                                <span class="glyphicon glyphicon-star" aria-hidden="true" style="color: #f1c420; font-size: 15px;"></span> &nbsp;
                                <span class="glyphicon glyphicon-star" aria-hidden="true" style="color: #f1c420; font-size: 15px;"></span>&nbsp;
                                <span class="glyphicon glyphicon-star" aria-hidden="true" style="color: #f1c420; font-size: 15px;"></span>&nbsp;
                                <span class="glyphicon glyphicon-star" aria-hidden="true" style="color: #f1c420; font-size: 15px;"></span>&nbsp;
                                <span class="glyphicon glyphicon-star" aria-hidden="true" style="color: #f1c420; font-size: 15px;"></span>
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
                                <a href="#medicoConsulta" data-toggle="tab" aria-expanded="false">Facturación<div class="ripple-container"></div></a>
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
                                    <span class="glyphicon glyphicon-star" aria-hidden="true" style="color: #f1c420; font-size: 15px;"></span> &nbsp;
                                    <span class="glyphicon glyphicon-star" aria-hidden="true" style="color: #f1c420; font-size: 15px;"></span>&nbsp;
                                    <span class="glyphicon glyphicon-star" aria-hidden="true" style="color: #f1c420; font-size: 15px;"></span>&nbsp;
                                    <span class="glyphicon glyphicon-star" aria-hidden="true" style="color: #f1c420; font-size: 15px;"></span>&nbsp;
                                    <span class="glyphicon glyphicon-star" aria-hidden="true" style="color: #f1c420; font-size: 15px;"></span><br>
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
                                        <li> <b>Total de Precio: </b> <label>S/.500</label> </li>

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
<!-- MODAL VER MEDICO END -->

<!-- MODAL EDITAR MEDICO -->
<section id="editarMedico" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="panel panel-primary" id="hidepanel1">
                <div class="panel-heading">
                    <div class="modal-header">
                        <h3 class="panel-title">
                            <b>
                                Editar Médico
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
                        <ul class="nav nav-tabs tabs-li" style="width:100%">
                            <li class="col-md-4 active">
                                <a href="#medicoEdtDatosPer" data-toggle="tab" aria-expanded="false">Datos Personales<div class="ripple-container"></div></a>
                            </li>
                            <li class="col-md-4">
                                <a href="#medicoEdtDatosPro" data-toggle="tab" aria-expanded="false">Datos Profesionales<div class="ripple-container"></div></a>
                            </li>
                            <li class="col-md-4">
                                <a href="#medicoEdtDocumentos" data-toggle="tab" aria-expanded="false">Documentos<div class="ripple-container"></div></a>
                            </li>
                        </ul>
                    </div>
                    <br>
                    <div class="tab-content">
                        <div id="medicoEdtDatosPer" class="tab-pane fade active in">
                            <form>
                                <fieldset>
                                    <div class="col-md-12">
                                        <!-- Name input-->
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="nombresEdt">Nombres</label>
                                            <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="nombresEdt" name="nombresEdt" type="text" class="format-input input-format form-control" value="Ricardo">
                                        </div>
                                        <!-- Apellidos input -->
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="apellidosEdt">Apellidos</label>
                                            <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="apellidosEdt" name="apellidosEdt" type="text" class="format-input input-format form-control" value="Santiago Quispe">
                                        </div>

                                        <!-- email -->
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="correoEdt">Correo</label>
                                            <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="correoEdt" name="correoEdt" type="text" class="format-input input-format form-control" value="ricardo@email.com">
                                        </div>

                                        <!-- teléfono -->
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="telefonoEdt">Teléfono</label>
                                            <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="telefonoEdt" name="telefonoEdt" type="tel" class="format-input input-format form-control" value="985574485">
                                        </div>

                                        <!-- ID CMP -->
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="cmpEdt">ID CMP</label>
                                            <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="cmpEdt" name="cmpEdt" type="text" class="format-input input-format form-control" value="74857474">
                                        </div>

                                        <!-- Contraseña -->
                                        <div class="row">
                                            <div id="pwdEdit" class="col-md-7 form-group label-floating " style="padding-left: 0px;">
                                                <label class="control-label" for="passwordEdt">Contraseña</label>
                                                <input id="passwordEdit" name="passwordEdt" type="passwordEdt" class="format-input input-format form-control" value="123456">
                                            </div>
                                            <div class="col-md-1" style="padding-top: 150px;">
                                                <span onclick="showPasswordEdit()" id="vizEdit1" class="glyphicon glyphicon-eye-open icon-viz" style="display: block; color: #9f9f9f" aria-hidden="true"></span>
                                                <span onclick="showPasswordEdit()" id="vizEdit2" class="glyphicon glyphicon-eye-close icon-viz" style="display: none; color: #9f9f9f" aria-hidden="true"></span>
                                            </div>
                                            <div class="col-md-4" style="padding-top: 40px;">
                                                <button onclick="generarPwdEdit()" type="button" class="format btn btn-responsive btn-verde" style="margin:5px !important;vertical-align: middle;">Generar Contraseña</button>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                        <div id="medicoEdtDatosPro" class="tab-pane fade">
                            <form>
                                <fieldset>
                                    <div class="col-md-12">
                                        <!-- Name input-->
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="especialidad">Especialidades</label>
                                            <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="especialidad" name="especialidad" type="text" class="format-input input-format form-control" value="Medicina General, Pediatria">
                                        </div>
                                        <!-- <em>Separado por comas</em> -->
                                        <!-- Name input-->
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="colegio">Colegio Médico</label>
                                            <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="colegio" name="colegio" type="text" class="format-input input-format form-control" value="Colegio Medico de medicina general">
                                        </div>
                                        <!-- Apellidos input -->
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="name">Universidad</label>
                                            <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="apellidos" name="apellidos" type="text" class="format-input input-format form-control" value="Universidad Mayor de San Marcos">
                                        </div>
                                        <!-- linked in -->
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="linkedIn">LinkedIn</label>
                                            <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="linkedIn" name="linkedIn" type="text" class="format-input input-format form-control" value="www.linkedin.com">
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                        <div id="medicoEdtDocumentos" class="tab-pane fade">
                            <div class="row">
                                <div class="col-md-6 fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 100px; height: 100px;"></div>
                                    <div>
                                        <span class="btn btn-primary btn-file">
                                            <span class="fileinput-new">Titulo Universitario</span>
                                            <span class="fileinput-exists">Cambiar</span>
                                            <input type="file" name="tituloUni" id="tituloUni" value="titulo">
                                        </span>
                                        <a href="#" class="btn btn-primary fileinput-exists" data-dismiss="fileinput">Quitar</a>
                                    </div>
                                </div>
                                <div class="col-md-6 fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 100px; height: 100px;"></div>
                                    <div>
                                        <span class="btn btn-primary btn-file">
                                            <span class="fileinput-new">Certificado de capacitación</span>
                                            <span class="fileinput-exists">Cambiar</span>
                                            <input type="file" name="certCapac" id="certCapac">
                                        </span>
                                        <a href="#" class="btn btn-primary fileinput-exists" data-dismiss="fileinput">Quitar</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 100px; height: 100px;"></div>
                                    <div>
                                        <span class="btn btn-primary btn-file">
                                            <span class="fileinput-new">Constancia de trabajo</span>
                                            <span class="fileinput-exists">Cambiar</span>
                                            <input type="file" name="constTrabajo" id="constTrabajo">
                                        </span>
                                        <a href="#" class="btn btn-primary fileinput-exists" data-dismiss="fileinput">Quitar</a>
                                    </div>
                                </div>
                                <div class="col-md-6 fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 100px; height: 100px;"></div>
                                    <div>
                                        <span class="btn btn-primary btn-file">
                                            <span class="fileinput-new">Constancia de Colegio Médico</span>
                                            <span class="fileinput-exists">Cambiar</span>
                                            <input type="file" name="constCM" id="constCM">
                                        </span>
                                        <a href="#" class="btn btn-primary fileinput-exists" data-dismiss="fileinput">Quitar</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 100px; height: 100px;"></div>
                                    <div>
                                        <span class="btn btn-primary btn-file">
                                            <span class="fileinput-new">Otro Documento</span>
                                            <span class="fileinput-exists">Cambiar</span>
                                            <input type="file" name="otroDoc" id="otroDoc">
                                        </span>
                                        <a href="#" class="btn btn-primary fileinput-exists" data-dismiss="fileinput">Quitar</a>
                                    </div>
                                </div>
                                <div class="col-md-6 fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 100px; height: 100px;"></div>
                                    <div>
                                        <span class="btn btn-primary btn-file">
                                            <span class="fileinput-new">Otro Documento</span>
                                            <span class="fileinput-exists">Cambiar</span>
                                            <input type="file" name="otroDoc" id="otroDoc">
                                        </span>
                                        <a href="#" class="btn btn-primary fileinput-exists" data-dismiss="fileinput">Quitar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
<!-- MODAL EDITAR MEDICO -->

<!-- MODAL ELIMINAR MEDICO -->
<section id="eliminarMedico" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="panel panel-primary" id="hidepanel1">
                <div class="panel-heading">
                    <div class="modal-header">
                        <h3 class="panel-title">
                            <b>
                                Eliminar Médico
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
                        <h4>¿Desea eliminar al médico?</h4>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="modal-pie">
                        <div class="text-right">
                            <button id="btnEliminarMedicoSi" class='format btn-crud btn btn-verde' id="delete_item" data-dismiss="modal">
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
<!-- MODAL EDITAR MEDICO -->

<!-- MODAL SECTIONS END -->
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/js/frontend/admin/medico.js')}}"></script>
    <script src="{{ asset('assets/vendors/sweetalert/js/sweetalert.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/sweetalert/js/sweetalert-dev.js') }}" type="text/javascript"></script>
<script language="javascript" type="text/javascript">


   
    
    function eliminarUsuario(id) {

        $.ajax({
            type: 'post',
            url: "{{ URL::to('admin/eliminarmedicos') }}",
            dataType: "json",
            data: {id_user: id,'_token': '{{ csrf_token() }}'},
            beforeSend: function (xhr) {
                //alert(id);
            }
        }).done(function (dataRpta) {
            //alert(JSON.stringify(dataRpta));
          
             listarMedicos();
            
            //alert(dataRpta.message);
        }).fail(function (jqXHR, textStatus) {
            alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
        }).always(function () {
        });

    }

  
    
    
    
    listarMedicos();
    
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
            eliminarUsuario(id);
            swal("Eliminado!", "eliminacion correcta.", "success");
        });
    }
    function listarMedicos() {
        $.ajax({
            type: 'post',
            url: "{{ URL::to('admin/listarmedicos') }}",
            dataType: "json",
            data: {'_token': '{{ csrf_token() }}'},
            beforeSend: function (xhr) {
                //progreso();
            }
        }).done(function (dataRpta) {
            //alert(JSON.stringify(dataRpta));
            $('#tableMedico').DataTable().clear().draw();
            jQuery.each(dataRpta, function (i, val) {
              
                 
                  
                var quali = "<div class='text-center'>"; 
                //#d4d1c5
                for(i=0;i<val.qualification;i++){
                    quali = quali + "<span class='glyphicon glyphicon-star' aria-hidden='true' style='color: #f1c420; font-size: 18px;'></span>";                    
                }
                for(i=0;i<5-val.qualification;i++){
                    quali = quali + "<span class='glyphicon glyphicon-star' aria-hidden='true' style='color: #d4d1c5; font-size: 18px;'></span>";                    
                }
                quali = quali + " </div>";
                val.qualification =quali;
                //onclick="location.href='/admin/vermedico/'" 
               
                val.acciones = `
                    <div class='text-center'>
                      <button title='Ver' onclick="location.href='/admin/vermedicos/` + val.users_id +`'" class='btn-crud btn' style='background-color: #868686'>
                        <span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>
                      </button>
                    <button title='Editar' onclick="location.href='/admin/actualizarusuario/` + val.id + 
                        `'" class='btn-crud btn' style='background-color: #868686'>
                      <span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
                    </button>
                      <button id='btnEliminarMedico' onclick="eliminar(` + val.users_id +`)" title='Eliminar' class='delete btn-crud btn color-red'>
                        <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
                      </button>
                    </div>`;
                $('#tableMedico').DataTable().row.add(val).draw();
            });


        }).fail(function (jqXHR, textStatus) {
            alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
        }).always(function () {
            //cerrarProgreso();
        });
    }


</script>
@stop
