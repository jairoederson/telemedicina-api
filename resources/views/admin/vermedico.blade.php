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
<link href="{{ asset('assets/vendors/dropzone/css/dropzone.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/vendors/sweetalert/css/sweetalert.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/vendors/daterangepicker/css/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
<!-- <link href="{{ asset('assets/vendors/fullcalendar/css/fullcalendar.css') }}" rel="stylesheet" type="text/css"/> -->
<!-- <link href="{{ asset('assets/css/pages/calendar_custom.css') }}" rel="stylesheet" type="text/css"/> -->
<!-- <link rel="stylesheet" media="all" href="{{ asset('assets/vendors/bower-jvectormap/css/jquery-jvectormap-1.2.2.css') }}"/> -->
<!-- <link rel="stylesheet" href="{{ asset('assets/vendors/animate/animate.min.css') }}"> -->
<!-- <link rel="stylesheet" href="{{ asset('assets/css/pages/only_dashboard.css') }}"/> -->
<!-- <link rel="stylesheet" href="{{ asset('assets/vendors/starrating/css/star-rating.min.css') }}"/> -->
<!-- <link rel="stylesheet" href="{{ asset('assets/vendors/starability/starability-all.css') }}"/> -->
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

<link type="text/css" href="{{ asset('assets/vendors/bootstrap-multiselect/css/bootstrap-multiselect.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/selectize/css/selectize.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet" />


<!-- <meta name="_token" content="{{ csrf_token() }}"> -->
<!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/smalotDatepicker/css/bootstrap-datetimepicker.min.css') }}"> -->
<!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/login.css') }}" /> -->


<!-- <link rel="stylesheet" type="text/css" href="http://material.joshadmin.com/assets/css/bootstrap.min.css"> -->
<!-- <link rel="stylesheet" type="text/css" href="http://material.joshadmin.com/assets/A.css,,_lib.css+vendors,,_bootstrapvalidator,,_css,,_bootstrapValidator.min.css,Mcc.O2mSEh98l7.css.pagespeed.cf.ASzEBs_nDp.css"> -->
<style>
    .form-group {
        margin: 0px 0 0 0 !important;
    }
    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
        padding: 8px 8px 0px 8px !important;
    }
    legend.scheduler-border {
        width:inherit !important; /* Or auto */
        padding:0 10px !important; /* To give a bit of padding on the left and right */
        border-bottom:none !important;
        font-size: 18px;
        font-weight: bold;
    }
    fieldset.scheduler-border {
        border: 1px groove #cccccc6b !important;
        padding: 0 1.4em 1.4em 1.4em !important;
        margin: 0 0 1.5em 0 !important;
        -webkit-box-shadow:  0px 0px 0px 0px #000;
        box-shadow:  0px 0px 0px 0px #000;
    }
</style>

@stop

{{-- Page content --}}
@section('content')

<section class="content-header section-header">
    <div class="row">
        <div class="col-md-9">
            <h4 class="header-title">    Perfil Médico</h4>
              
        </div>

        <div class="col-md-12">


            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="{{ asset('assets/images/doctor.jpg') }}" alt="" class="img-form" width="130px">
                </div>
                <div class="col-md-8">
                    <h4><b id="lbMedico">Ricardo Santiago Quispe</b></h4>
                    <div class="text-left" id="blEstrellas">
                        <label><b>(14)</b></label>
                        <span class="glyphicon glyphicon-star" aria-hidden="true" style="color: #f1c420; font-size: 15px;"></span> &nbsp;
                        <span class="glyphicon glyphicon-star" aria-hidden="true" style="color: #f1c420; font-size: 15px;"></span>&nbsp;
                        <span class="glyphicon glyphicon-star" aria-hidden="true" style="color: #f1c420; font-size: 15px;"></span>&nbsp;
                        <span class="glyphicon glyphicon-star" aria-hidden="true" style="color: #f1c420; font-size: 15px;"></span>&nbsp;
                        <span class="glyphicon glyphicon-star" aria-hidden="true" style="color: #f1c420; font-size: 15px;"></span>
                    </div>
                    <label for=""><b>Especialidad: </b></label>
                    <label id="lbEspecialidad">Cardiología</label><br>
                    <label for=""><b>Linked In: </b></label>
                    <a id="lblinkedin" target="_blank" href="https://www.linkedin.com">
                        Ricardo S.
                        <!-- <img src="{{ asset('assets/images/linkedin.png') }}"  alt="" width="30px;" />  <br> -->
                    </a><br>
                    <label for=""><b>Edad: </b></label>
                    <label id="lbEdad" >32 años</label><br>

                </div>
            </div>
            <br>
            <div class="row">
                <ul class="nav nav-tabs tabs-li" style="width:100%">
                    <li class="col-md-2 active">
                        <a href="#medicoInfoPersonal" data-toggle="tab" aria-expanded="false">Info. Personal<div class="ripple-container"></div></a>
                    </li>
                    <li class="col-md-2">
                        <a href="#medicoInfoProfesional" data-toggle="tab" aria-expanded="false">Info. Profesional<div class="ripple-container"></div></a>
                    </li>
                    <li class="col-md-2">
                        <a href="#medicoInfoExtra" data-toggle="tab" aria-expanded="false">Info. Academica<div class="ripple-container"></div></a>
                    </li>
                    <li class="col-md-2">
                        <a href="#medicoConsulta" data-toggle="tab" aria-expanded="false">Consulta<div class="ripple-container"></div></a>
                    </li>
                    <li class="col-md-2">
                        <a href="#medicoPago" data-toggle="tab" aria-expanded="false">Facturación<div class="ripple-container"></div></a>
                    </li>
                    <li class="col-md-2">
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
                            <label id="lbfechanac"></label><br>
                            <label for=""><b>DNI: </b></label>
                            <label id="lbDNI"></label><br>
                            <label for=""><b>Telefono: </b></label>
                            <label id="lbtelefono"></label><br>
                            <label for=""><b>Domicilio: </b></label>
                            <label id="lbdomicilio"></label><br>
                            <label for=""><b>Correo: </b></label>
                            <label id="lbcorreo"></label><br>
                            <label for=""><b>Estado Civil: </b></label>
                            <label id="lbestadocivil"></label><br>

                            <h4><b>Calidad de servicio</b></h4>
                            <label> <b>calificacion:</b></label>
                            <div id="lbcalifi">
                                <span style="margin-bottom: 20px;"><b>(14)</b></span>
                                <span class="glyphicon glyphicon-star" aria-hidden="true" style="color: #f1c420; font-size: 15px;"></span> &nbsp;
                                <span class="glyphicon glyphicon-star" aria-hidden="true" style="color: #f1c420; font-size: 15px;"></span>&nbsp;
                                <span class="glyphicon glyphicon-star" aria-hidden="true" style="color: #f1c420; font-size: 15px;"></span>&nbsp;
                                <span class="glyphicon glyphicon-star" aria-hidden="true" style="color: #f1c420; font-size: 15px;"></span>&nbsp;
                                <span class="glyphicon glyphicon-star" aria-hidden="true" style="color: #f1c420; font-size: 15px;"></span><br>
                            </div>
                            <br>
                            <label for=""><b>Valoracion: </b></label>
                            <label id="lbValoracion">Excelente</label><br>
                            <label for=""><b>Opiniones: </b></label>
                            <label id="lbOpinion" >Atención Excelente al cliente</label><br>
                        </div>

                    </div>
                </div>
                <div id="medicoInfoProfesional" class="tab-pane fade">
                    <div class="items-cv">
                        <div class="row">
                            <form id="formMedicoProfesional">
                                  
                                 <fieldset class="scheduler-border">
                                    <legend class="scheduler-border">Especialidades:</legend>
                                    
                                    <div class="form-group label-floating is-empty">
                                            <div class=" label-floating is-empty">
                                                <select id="cmbEspecialidad" class="form-control " style="font-size: 14px !important" >
                                                    <option value="">Seleccionar Especialidad</option>
                                                </select>
                                            </div>
                                    </div>
                            
                                    <div class="form-group label-floating is-empty">
                                            <div class="text-left" style="padding-top: 5px; padding-right: 5px">
                                                <button type="button" class="format btn btn-format"  id='agregarEspecialidad'>Agregar Especialidad</button>
                                            </div>
                                    </div>
                            
                                    <div class="form-group label-floating is-empty">
                                            <table class="table table-bordered width100" style="width: 100%" id="tableEspecialidad" >
                                                <thead>
                                                    <tr class="filters">
                                                        
                                                        <th>Id</th>
                                                        <th>Name</th>                                        
                                                        <th>Acciones</th>                                        

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                    </div>
                                    
                                </fieldset>
                                
                                <fieldset class="scheduler-border">
                                    <legend class="scheduler-border">Otros datos:</legend>
                                    
                                     <!-- Apellidos input -->
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label" for="apellidos">CMP</label>
                                        <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="idcmp" name="apellidos" type="text" class="format-input input-format form-control" required>
                                    </div>
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label" for="nombres">Linkedin</label>
                                        <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="linkedin" name="nombres" type="text" class="format-input input-format form-control" required>
                                    </div>
                                    <!-- Apellidos input -->
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label" for="apellidos">Acera de El</label>
                                        <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="acercade" name="apellidos" type="text" class="format-input input-format form-control" required>
                                    </div>
                                    
                                    <button type="submit" class="format btn btn-responsive btn-format" style="margin:5px !important;vertical-align: middle;">Guardar </button>
                                </fieldset>
                                    
                           
                            </form>
                            <br><br>
                        </div>
                    </div>
                </div>
                <div id="medicoInfoExtra" class="tab-pane fade">
                    <div class="items-cv">
                        <!-- formacion academica -->
                        <div class="row">
                            <h4><b>Formación académica</b></h4>
                            <ol>
                                <li><b>Centro: </b> <label id="lbCentroEstudio"></label></li>
                                <li><b>Estudios: </b> <label id="lbEstudios"></label> </li>
                                <li><b>Fechas: </b> <label id="lbAnios"></label> </li>
                            </ol>
                        </div>
                        <fieldset class="scheduler-border">
                                    <legend class="scheduler-border">Formación Academica:</legend>
                            
                            
                                    <div class="form-group label-floating is-empty">
                                        <div class="text-right" style="padding-top: 5px; padding-right: 5px">
                                            <button type="button" class="format btn btn-format" data-toggle="modal" data-target="#agregarFormacion">Agregar Formacion</button>
                                    </div>
                                           
                                    </div>
                            
                                    <div class="form-group label-floating is-empty">
                                            <table class="table table-bordered width100" style="width: 100%" id="tableFormacionAcademica" >
                                                <thead>
                                                    <tr class="filters">
                                                        
                                                        <th>Centro</th>                                        
                                                        <th>Estudios</th>                                        
                                                        <th>FechaInicio</th>                                        
                                                        <th>FechaFin</th>
                                                        <th>Acciones</th>                                       
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                    </div>
                                    
                                </fieldset>
                        <!-- formacion academica end -->
                        <!-- experiencia profesional -->
                        <div class="row">
                           {{-- !-- <h4><b>Experiencia Profesional</b></h4>
<!--                            @for($i = 0; $i < 2; $i++)
                            <ol>
                                <li><b>Centro: </b> <label>Hospital Basadre (2 años)</label> </li>
                                <li><b>Actividad: </b> <label>Cirugia, Consultas</label> </li>
                                <li><b>Puesto: </b>Medico Cardiólogo</li>
                            </ol>
                            @endfor--> --}}
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">Experiencia Profesional:</legend>
                        
                        
                                <div class="form-group label-floating is-empty">
                                    <div class="text-right" style="padding-top: 5px; padding-right: 5px">
                                        <button type="button" class="format btn btn-format" data-toggle="modal" data-target="#agregarExperiencia">Agregar Experiencia</button>
                                </div>
                                       
                                </div>
                        
                                <div class="form-group label-floating is-empty">
                                        <table class="table table-bordered width100" style="width: 100%" id="tableExperienciaProfesional" >
                                            <thead>
                                                <tr class="filters">
                                                    
                                                    <th>Institucion</th>                                        
                                                    <th>Actividad</th>                                        
                                                    <th>FechaInicio</th>                                        
                                                    <th>FechaFin</th>
                                                    <th>Acciones</th>                                       
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                </div>
                                
                            </fieldset>
                            <div id="experienciaLabora"></div>
                        </div>
                        <!-- experiencia profesional end -->
                        <!-- especialidades -->
<!--                        <div class="row">
                            <h4><b>Especialidades</b></h4>
                            <ol>
                                <li>Medicina General</li>
                                <li>Cardiolgía</li>
                            </ol>
                        </div>-->
                        <!-- especialidades end -->
                    </div>

                </div>
                <div id="medicoConsulta" class="tab-pane fade">
                    <div class="items-cv">
                        <!-- formacion academica -->
                        <div class="row">
                            <ol>
                                <li> <b>Total de consultas: </b> <label id="lbNumConsulta">100</label> </li>
                                <li> <b>Total de Tiempo: </b> <label id="lbTiempoConsulta">500 minutos</label> </li>
<!--                                <li> <b>Total de Precio: </b> <label>S/.500</label> </li>-->
                            </ol>
                            <div class="col-md-2 "></div>
                            <div class="col-md-8 ">
                                <canvas id="cvtotalLlamadasDoctor" width="300" height="200"></canvas>
                            </div>
                        </div>

                    </div>
                </div>
                <div id="medicoPago" class="tab-pane fade">
                    <div class="items-cv">
                          <div class="row">
                                    <div class="col-md-9">

                                        <h4 class="header-title">Pagos</h4>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="text-right" style="padding-top: 5px; padding-right: 5px">
                                            <button type="button" class="format btn btn-format" data-toggle="modal" data-target="#agregarPago">Agregar Pago</button>
                                        </div>
                                    </div>
                                </div>
                            
                            <table class="table table-bordered width100" style="width: 100%" id="tablePagos" >
                                <thead>
                                    <tr class="filters">
                                        
                                        <th>Monto</th>
                                        <th>Concepto</th>                                        
                                        <th>Fecha </th>
                                        <th>Año </th>
                                        <th>Mes </th>
                                        <th>Estado </th>
                                        <th>Acciones </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
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
                                <button type="submit" onclick="agregarNotaMedico()" class="format btn btn-responsive btn-format" style="margin:5px !important;vertical-align: middle;">Guardar Nota</button>
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
    </div>
</section>

<section id="agregarPago" class="modal fade" role="dialog">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="panel panel-primary" id="hidepanel2">
                <div class="panel-heading">

                    <div class="modal-header">
                        <h3 class="panel-title">
                            <b>
                                Nuevo Pago
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
                    <form id="formRegistrarPago">
                        <fieldset>
                          
                            <div class="col-md-12">

                                <!-- Name input-->
                                <div class="form-group label-floating is-empty">
                                    <select id="anio" class="form-control " style="font-size: 14px !important" required>
                                        <option value="">Seleccione Año</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                    </select>
                                </div>
                                <!-- Apellidos input -->
                                <div class="form-group label-floating is-empty">
                                    <select id="mes" class="form-control " style="font-size: 14px !important" required>
                                        <option value="">Seleccione Mes</option>
                                        <option value="01">Enero</option>
                                        <option value="02">Febrero</option>
                                        <option value="03">Marzo</option>
                                        <option value="04">Abril</option>
                                        <option value="05">Mayo</option>
                                        <option value="06">Junio</option>
                                        <option value="07">Julio</option>
                                        <option value="08">Agosto</option>
                                        <option value="09">Septiempre</option>
                                        <option value="10">Octubre</option>
                                        <option value="11">Noviembre</option>
                                        <option value="12">Diciembre</option>
                                    </select>
                                </div>
                                <!-- teléfono -->
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label" for="email">Monto</label>
                                    <input  onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="monto" name="telefono" type="text" readonly="" class="format-input input-format form-control" required>
                                </div>
                                <div class="form-group label-floating is-empty">
                                    <button id="btnGenerarMonto" type="button" class="format btn btn-responsive btn-format" style="margin:5px !important;vertical-align: middle;">Generar Monto Pago</button>
                                </div>
                                
                                
                                <!-- email -->
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label" for="email">Concepto</label>
                                    <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="conceptoPago" type="text" class="format-input input-format form-control" required>
                                </div>
                                
                               
                            </div>

                        </fieldset>
                    </form>
                </div>
                <div class="panel-footer">
                    <div class="modal-pie">
                        <div class=" text-right">
                            <button form="formRegistrarPago" type="submit" class="format btn btn-responsive btn-format" style="margin:5px !important;vertical-align: middle;">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="agregarExperiencia" class="modal fade" role="dialog">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="panel panel-primary" id="hidepanel3">
                <div class="panel-heading">

                    <div class="modal-header">
                        <h3 class="panel-title">
                            <b>
                                Nueva Experiencia Profesional
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
                    <form id="formRegistrarExperiencia">
                        <fieldset>
                          
                            <div class="col-md-12">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label" for="email">Institucion</label>
                                    <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="institucion" type="text" class="format-input input-format form-control" required>
                                </div>
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label" for="email">Actividad</label>
                                    <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="actividad" type="text" class="format-input input-format form-control" required>
                                </div>
                                <div class="form-group label-floating is-empty">
                                    <label>Fecha Inicio</label>
                                    <div class="input-group issue-date">
                                        <!-- <div class="input-group-addon">
                                        </div> -->
                                        <i class="livicon" data-name="laptop" data-size="16" data-c="#e22715" data-hc="#e22715" data-loop="true"></i>
                                        <!-- <i class="fa fa-user icon"></i> -->
                                        <input type="text" class="form-control" id="rangepicker6"/>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <div class="form-group label-floating is-empty">
                                    <label>Fecha Fin</label>
                                    <div class="input-group issue-date" >
                                        <!-- <div class="input-group-addon">
                                        </div> -->
                                        <i class="livicon" data-name="laptop" data-size="16" data-c="#e22715" data-hc="#e22715" data-loop="true"></i>
                                        <!-- <i class="fa fa-user icon"></i> -->
                                        <input type="text" class="form-control" id="rangepicker7"/>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                
                               
                            </div>

                        </fieldset>
                    </form>
                </div>
                <div class="panel-footer">
                    <div class="modal-pie">
                        <div class=" text-right">
                            <button form="formRegistrarExperiencia" type="submit" class="format btn btn-responsive btn-format" style="margin:5px !important;vertical-align: middle;">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="agregarFormacion" class="modal fade" role="dialog">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="panel panel-primary" id="hidepanel4">
                <div class="panel-heading">

                    <div class="modal-header">
                        <h3 class="panel-title">
                            <b>
                                Nueva Formación Academica
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
                    <form id="formRegistrarFormacion">
                        <fieldset>
                          
                            <div class="col-md-12">

                            
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label" for="email">Centro</label>
                                    <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="centro" type="text" class="format-input input-format form-control" required>
                                </div>
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label" for="email">Estudios</label>
                                    <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="estudios" type="text" class="format-input input-format form-control" required>
                                </div>
                                <div class="form-group label-floating is-empty">
                                    <label>Fecha Inicio</label>
                                    <div class="input-group issue-date" >
                                        <!-- <div class="input-group-addon">
                                        </div> -->
                                        <i class="livicon" data-name="laptop" data-size="16" data-c="#e22715" data-hc="#e22715" data-loop="true"></i>
                                        <!-- <i class="fa fa-user icon"></i> -->
                                        <input type="text" class="form-control" id="rangepicker4"/>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <div class="form-group label-floating is-empty">
                                    <label>Fecha Fin</label>
                                    <div class="input-group issue-date">
                                        <!-- <div class="input-group-addon">
                                        </div> -->
                                        <i class="livicon" data-name="laptop" data-size="16" data-c="#e22715" data-hc="#e22715" data-loop="true"></i>
                                        <!-- <i class="fa fa-user icon"></i> -->
                                        <input type="text" class="form-control" id="rangepicker5"/>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                               
                            </div>

                        </fieldset>
                    </form>
                </div>
                <div class="panel-footer">
                    <div class="modal-pie">
                        <div class=" text-right">
                            <button form="formRegistrarFormacion" type="submit" class="format btn btn-responsive btn-format" style="margin:5px !important;vertical-align: middle;">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')

<script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}" type="text/javascript"></script>

<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/js/frontend/admin/usuario.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/dropzone/js/dropzone.js') }}" ></script>

<script src="{{ asset('assets/vendors/sweetalert/js/sweetalert.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/sweetalert/js/sweetalert-dev.js') }}" type="text/javascript"></script>

<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-multiselect/js/bootstrap-multiselect.js') }}" ></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/sifter/sifter.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/microplugin/microplugin.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/selectize/js/selectize.min.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-switch/js/bootstrap-switch.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/switchery/js/switchery.js') }}" ></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-maxlength/js/bootstrap-maxlength.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/card/lib/js/jquery.card.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/js/pages/custom_elements.js') }}"></script>

<script src="{{ asset('assets/vendors/daterangepicker/js/daterangepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/clockface/js/clockface.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/datepicker.js') }}" type="text/javascript"></script>

<script>
   var token = '{{ csrf_token() }}';

</script>
<script language="javascript" type="text/javascript">

    listarObtenerMedico('{!! $idusuarios!!}');   
     listarEspecialidades();

function listarEspecialidades() {
    $.ajax({
        type: 'post',
        url: "{{ URL::to('admin/listarespecialidad') }}",
        dataType: "json",
        data: {
            '_token': '{{ csrf_token() }}'
        },
        beforeSend: function (xhr) {
        }
    }).done(function (dataRpta) {
        var html = '<option value="">Especialidad</option>';
        jQuery.each(dataRpta, function (i, val) {
            html += '<option value="' + val.id + '"> ' + val.name + '</option>';
        });
        $('#cmbEspecialidad').html(html);
    }).fail(function (jqXHR, textStatus) {
    }).always(function () {
    });
}
    //alert('{!! $iddoctors!!}');   
    function listarObtenerMedico(id) {
        $.ajax({
            type: 'post',
            url: "{{ URL::to('admin/obtenermedico') }}",
            dataType: "json",
            data: {iduser: id,'_token': '{{ csrf_token() }}'},
            beforeSend: function (xhr) {
            }
        }).done(function (dataRpta) {
            
            //alert(JSON.stringify(dataRpta));
            $('#lbMedico').html(dataRpta.usuario.last_name + ' '+ dataRpta.usuario.name);
            
                var quali = ""; 
                for(i=0;i<dataRpta.doctor.qualification;i++){
                    quali = quali + "<span class='glyphicon glyphicon-star' aria-hidden='true' style='color: #f1c420; font-size: 18px;'></span>";                    
                }
            $('#blEstrellas').html(quali);
                var especial = '';
            jQuery.each(dataRpta.especialidad, function (i, val) {
                especial = especial + val.name + ',';
            });
            $('#lbEspecialidad').html(especial.substring(0,especial.length-1));
            //$('#lbEspecialidad').html(dataRpta.doctor.specialty);
            $('#lblinkedin').html(dataRpta.doctor.linkedIn);
            
            try {
            $('#lbEdad').html(calculateAge(convertDateTommddyyyy(dataRpta.usuario.birth_date)) + ' '+ 'años');
            $('#lbfechanac').html(convertDateTommddyyyy(dataRpta.usuario.birth_date));
            } catch (e) {}
            $('#lbDNI').html(dataRpta.usuario.numdoc);
            var tele = '';
            jQuery.each(dataRpta.telefono, function (i, val) {
                tele = tele + val.number + ' ';
            });
            $('#lbtelefono').html(tele);
            $('#lbdomicilio').html(dataRpta.usuario.address);
            $('#lbcorreo').html(dataRpta.usuario.email);
            $('#lbestadocivil').html(dataRpta.usuario.state);
           
            $('#lbcalifi').html(quali);
            var valoracion='';
            switch (dataRpta.doctor.qualification) {
                case '1.00':valoracion='Pésimo';   break;
                case '2.00':valoracion='Malo';   break;
                case '3.00':valoracion='Regular';   break;
                case '4.00':valoracion='Bueno';   break;
                case '5.00':valoracion='Muy Bueno';   break;
               
            }
            $('#lbValoracion').html(valoracion);
            try {$('#lbOpinion').html(dataRpta.consulta.appreciation);} catch (e) {}

            
            //lbOpinion
            try {
            $('#lbCentroEstudio').html(dataRpta.academico.institution);
            $('#lbEstudios').html(dataRpta.academico.title);
            } catch (e) {}

            
            try {$('#lbAnios').html(convertDateTommddyyyy(dataRpta.academico.start_date) + ' - ' 
                    + convertDateTommddyyyy(dataRpta.academico.end_date) );
            } catch (e) {}
            var expe = '';
            jQuery.each(dataRpta.experiencia, function (i, val) {
                expe= expe + "<ol>";
                 expe = expe + "<li><b>Centro: </b> <label>" + val.institution + "</label> </li>";
                 expe = expe + "<li><b>Actividad:  </b> <label>" + val.activity + "</label> </li>";
                expe= expe + "</ol>";
            });
            $('#experienciaLabora').html(expe);
            $('#lbNumConsulta').html(dataRpta.consultasNum);
            $('#lbTiempoConsulta').html(dataRpta.consultasSum);
            try {                
                chartmedicos(dataRpta.textos,dataRpta.cantidades);    
            } catch (e) {    
            }
            
            var notas = '';
            jQuery.each(dataRpta.notas, function (i, val) {
             
                 notas = notas + "<li> <label>" + val.text + "</label> </li>";
                
            });
            
            $('#misNotas').html(notas);
            
            
            $("#especialidad").val(dataRpta.doctor.specialty);
            $("#idcmp").val(dataRpta.doctor.id_cmp);
            $("#linkedin").val(dataRpta.doctor.linkedIn);
            $("#acercade").val(dataRpta.doctor.about_me);
            $("div").removeClass("is-empty");
            
        }).fail(function (jqXHR, textStatus) {
            alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
        }).always(function () {
        });
    }
    
    function calculateAge(birthday) {
        var birthday_arr = birthday.split("/");
        var birthday_date = new Date(birthday_arr[2], birthday_arr[1] - 1, birthday_arr[0]);
        var ageDifMs = Date.now() - birthday_date.getTime();
        var ageDate = new Date(ageDifMs);
        return Math.abs(ageDate.getUTCFullYear() - 1970);
    }
    
    
    function convertDateTommddyyyy(mmm) {
        var dia = mmm.substring(10, 8);
        var mes = mmm.substring(7, 5);
        var anio = mmm.substring(4, 0);
        //var mmm2 = mes + "/" + dia + "/" + anio;
        var mmm2 = dia + "/" + mes + "/" + anio;
        return mmm2;
    }
    
    function chartmedicos(texto,cantidades){
    
    var ctx = document.getElementById("cvtotalLlamadasDoctor");
    var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: texto,
        datasets: [{
            label: 'numero de llamadas',
            data: cantidades,
            backgroundColor: [
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)'
            ],
            borderColor: [
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)',
              'rgba(238, 130, 18, 0.6)'
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
    }
    
     
    function agregarNotaMedico() {

        $.ajax({
            type: 'post',
            url: "{{ URL::to('admin/agregarnotamedico') }}",
            dataType: "json",
            data: {
                idusuario: '{!! $idusuarios!!}',
                texto:$('#notaContenido').val(),
                '_token': '{{ csrf_token() }}'
            },
            beforeSend: function (xhr) {
                //alert(id);
            }
        }).done(function (dataRpta) {
            //alert(JSON.stringify(dataRpta));
            var notas = '';
            jQuery.each(dataRpta, function (i, val) {
             
                 notas = notas + "<li> <label>" + val.text + "</label> </li>";
                
            });
            
            $('#misNotas').html(notas);
            $('#notaContenido').val('');
            //alert(dataRpta.message);
        }).fail(function (jqXHR, textStatus) {
            alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
        }).always(function () {
        });

    }
    /*
    * otro script
     */
    
    $(function () {
        var tableP = $('#tablePagos').DataTable({
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
            }
            ,
            "columns": [
                {"data": "amount"},
                {"data": "payment_description"},
                {"data": "created_at"},
                {"data": "year"},
                {"data": "monthName"},
                {"data": "estado"},
                {"data": "acciones"}
            ]
        });
          var tableE = $('#tableEspecialidad').DataTable({
            "searching": false,
            "paging": false,
            "info": false,
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
            }
            ,
            "columns": [
                {"data": "id"},
                {"data": "name"},
                {"data": "acciones"}
            ]
        });
        var table = $('#tableFormacionAcademica').DataTable({
            "searching": false,
            "paging": false,
            "info": false,
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
            }
            ,
            "columns": [
                {"data": "institution"},
                {"data": "title"},
                {"data": "start_date"},
                {"data": "end_date"},
                {"data": "acciones"}
            ]
        });
        var tableE = $('#tableExperienciaProfesional').DataTable({
            "searching": false,
            "paging": false,
            "info": false,
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
            }
            ,
            "columns": [
                {"data": "institution"},
                {"data": "activity"},
                {"data": "start_date"},
                {"data": "end_date"},
                {"data": "acciones"}
            ]
        });
    });

    $('#btnGenerarMonto').click(function () {
           generaMontoPago();
    });

    
    function generaMontoPago() {
        $.ajax({
            type: 'post',
            url: "{{ URL::to('admin/planpagosmedico') }}",
            dataType: "json",
            data: {
                iddoctor: '{!! $iddoctors!!}',
                mes:$('#mes').val(), 
                anio:$('#anio').val(),
                '_token': '{{ csrf_token() }}'},
            beforeSend: function (xhr) {
            }
        }).done(function (dataRpta) {

            //alert(JSON.stringify(dataRpta));
            $('#monto').val(dataRpta.monto);
            $("div").removeClass("is-empty");
            //monto
     
        }).fail(function (jqXHR, textStatus) {
            alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
        }).always(function () {
        });
    }
    $("#formRegistrarFormacion").submit(function () {
            registrarFormacion();
            return false;
    });
        $("#formRegistrarExperiencia").submit(function () {
            registrarExperiencia();
            return false;
        });
    $("#formRegistrarPago").submit(function () {
            registrarPago();
            return false;
         });
        function registrarPago() {
        
        var oPago = {
            id:null,
            amount: $('#monto').val(),
            doctor_id: '{!! $iddoctors!!}',
            month:$('#mes').val(), 
            year:$('#anio').val(),
            payment_description:$('#conceptoPago').val()
        };
    $.ajax({
        type: 'post',
        url: "{{ URL::to('admin/registropagosmedico') }}",
        dataType: "json",
        data: {
            pago:oPago,
            '_token': '{{ csrf_token() }}'},
        beforeSend: function (xhr) {
        }
    }).done(function (dataRpta) {
        obtenerPagosMedico('{!! $iddoctors!!}');
        $('#agregarPago').modal('hide');
        swal("Registrado!", "Registro correcto.", "success");
        
        //monto
 
    }).fail(function (jqXHR, textStatus) {
        alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
    }).always(function () {
    });
}
function registrarExperiencia() {
        
        var oExperiencia = {
            id:null,
            institution: $('#institucion').val(),
            activity:  $('#actividad').val(),
            doctors_id: '{!! $iddoctors!!}',
            start_date:$('#rangepicker6').val(), 
            end_date:$('#rangepicker7').val(),
        };
    $.ajax({
        type: 'post',
        url: "{{ URL::to('admin/registroexperienciamedico') }}",
        dataType: "json",
        data: {
            experiencia:oExperiencia,
            '_token': '{{ csrf_token() }}'},
        beforeSend: function (xhr) {
        }
    }).done(function (dataRpta) {
       obtenerExperienciaMedico('{!! $iddoctors!!}');
        $('#agregarExperiencia').modal('hide');
        swal("Registrado!", "Registro correcto.", "success");
        
        //monto
 
    }).fail(function (jqXHR, textStatus) {
        alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
    }).always(function () {
    });
}
    function registrarFormacion() {
        
            var oFormacion = {
                id:null,
                institution: $('#centro').val(),
                title:  $('#estudios').val(),
            doctors_id: '{!! $iddoctors!!}',
            start_date:$('#rangepicker4').val(), 
            end_date:$('#rangepicker5').val()
            };
        $.ajax({
            type: 'post',
            url: "{{ URL::to('admin/registroformacionmedico') }}",
            dataType: "json",
            data: {
                formacion:oFormacion,
                '_token': '{{ csrf_token() }}'},
            beforeSend: function (xhr) {
            }
        }).done(function (dataRpta) {
            obtenerFormacionMedico('{!! $iddoctors!!}');
            $('#agregarFormacion').modal('hide');
            swal("Registrado!", "Registro correcto.", "success");
            
            //monto
     
        }).fail(function (jqXHR, textStatus) {
            alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
        }).always(function () {
        });
    }
    
    function eliminarPago(id) {

        swal({
            title: "Eliminar?",
            text: "esta Seguro de eliminar!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55  ",
            confirmButtonText: "Si, eliminalo!",
            closeOnConfirm: false
        }, function () {
            eliminarPagos(id);
            swal("Eliminado!", "eliminacion correcta.", "success");
        });
    }

    
    function eliminarPagos(id) {

        $.ajax({
            type: 'post',
            url: "{{ URL::to('admin/eliminarpagosmedico') }}",
            dataType: "json",
            data: {idPago: id, '_token': '{{ csrf_token() }}'},
            beforeSend: function (xhr) {
                //alert(id);
            }
        }).done(function (dataRpta) {
            obtenerPagosMedico('{!! $iddoctors!!}');
            swal("Eliminado!", "Eliminación correcta.", "success");
           

        }).fail(function (jqXHR, textStatus) {
            alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
        }).always(function () {
        });

    }
    
    function eliminarFormacion(id) {

swal({
    title: "Eliminar?",
    text: "esta Seguro de eliminar!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55  ",
    confirmButtonText: "Si, eliminalo!",
    closeOnConfirm: false
}, function () {
    eliminarFormaciones(id);
    swal("Eliminado!", "eliminacion correcta.", "success");
});
}

function eliminarFormaciones(id) {
    $.ajax({
    type: 'post',
    url: "{{ URL::to('admin/eliminarformacionmedico') }}",
    dataType: "json",
    data: {idFormacion: id, '_token': '{{ csrf_token() }}'},
    beforeSend: function (xhr) {
        //alert(id);
    }}).done(function (dataRpta) {
    obtenerFormacionMedico('{!! $iddoctors!!}');
    swal("Eliminado!", "Eliminación correcta.", "success");
   }).fail(function (jqXHR, textStatus) {
    alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
   }).always(function () {
});

}
                
    function eliminarExperiencia(id) {

swal({
    title: "Eliminar?",
    text: "esta Seguro de eliminar!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55  ",
    confirmButtonText: "Si, eliminalo!",
    closeOnConfirm: false
}, function () {
    eliminarExperiencias(id);
    swal("Eliminado!", "eliminacion correcta.", "success");
});
}

function eliminarExperiencias(id) {
    $.ajax({
    type: 'post',
    url: "{{ URL::to('admin/eliminarexperienciamedico') }}",
    dataType: "json",
    data: {idExperiencia: id, '_token': '{{ csrf_token() }}'},
    beforeSend: function (xhr) {
        //alert(id);
    }}).done(function (dataRpta) {
    obtenerExperienciaMedico('{!! $iddoctors!!}');
    swal("Eliminado!", "Eliminación correcta.", "success");
   }).fail(function (jqXHR, textStatus) {
    alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
   }).always(function () {
});

}
    function eliminarEspecialidad(id) {

        swal({
            title: "Eliminar?",
            text: "esta Seguro de eliminar!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55  ",
            confirmButtonText: "Si, eliminalo!",
            closeOnConfirm: false
        }, function () {
            eliminarEspecialidades(id);
        });
    }

    function eliminarEspecialidades(id) {

        $.ajax({
            type: 'post',
            url: "{{ URL::to('admin/eliminarespecialidadmedico') }}",
            dataType: "json",
            data: {idEspecialidad: id, '_token': '{{ csrf_token() }}'},
            beforeSend: function (xhr) {
            }
        }).done(function (dataRpta) {
            obtenerEspecialidadesMedico('{!! $iddoctors!!}');
            swal("Eliminado!", "Eliminación correcta.", "success");
           

        }).fail(function (jqXHR, textStatus) {
                            //alert(id);

            alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
        }).always(function () {
        });

    }
    
     $("#agregarEspecialidad").click(function () {
         var especialidad_id = $('#cmbEspecialidad').val();
         if(especialidad_id == ""){
            swal('Debe seleccionar una especialidad');
            $('#cmbEspecialidad').focus();
            return 0;
        }
        
        $.ajax({
            type: 'post',
            url: "{{ URL::to('admin/obtenerespecialidadmedico') }}",
            dataType: "json",
            data: {iddoctor: '{!! $iddoctors!!}', '_token':token },
            beforeSend: function (xhr) {
            }
        }).done(function (dataRpta) {
            if(dataRpta.find(element => element.speciality_id == especialidad_id)){
                 swal('El doctor ya tiene asignado la especialidad seleccionada.');
            }else{
                swal({
                        title: "Agregar?",
                        text: "esta Seguro de agregar?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55  ",
                        confirmButtonText: "Si, Agregalo!",
                        closeOnConfirm: false
                    },
                        function () {
                        agregarEspecialidad();
                        
                    });
            }
            
                 

        }).fail(function (jqXHR, textStatus) {
            console.log("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
        }).always(function () {
        });
        
});
    function agregarEspecialidad(){
        
        var oEspecialidad = {
                id:null,
                speciality_id : $('#cmbEspecialidad').val(),
                doctor_id: '{!! $iddoctors!!}',
            };
        $.ajax({
            type: 'post',
            url: "{{ URL::to('admin/agregarespecialidadmedico') }}",
            dataType: "json",
            data: {
                oEspecialidad:oEspecialidad,
                '_token': '{{ csrf_token() }}'},
            beforeSend: function (xhr) {
            }
        }).done(function (dataRpta) {
            obtenerEspecialidadesMedico('{!! $iddoctors!!}');
            $('#agregarPago').modal('hide');
            //swal("Registrado!", "Registro correcto.", "success");
            swal("Agregado!", "Agregado correctamente.", "success");
            //monto
     
        }).fail(function (jqXHR, textStatus) {
            alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
        }).always(function () {
        });

    }
    obtenerPagosMedico('{!! $iddoctors!!}');
    obtenerFormacionMedico('{!! $iddoctors!!}');
obtenerEspecialidadesMedico('{!! $iddoctors!!}');
obtenerExperienciaMedico('{!! $iddoctors!!}');
    function obtenerPagosMedico(id) {
        $.ajax({
            type: 'post',
            url: "{{ URL::to('admin/obtenerpagosmedico') }}",
            dataType: "json",
            data: {iddoctor: id, '_token': '{{ csrf_token() }}'},
            beforeSend: function (xhr) {
            }
        }).done(function (dataRpta) {

            
            $('#tablePagos').DataTable().clear().draw();
            jQuery.each(dataRpta.pagos, function (i, val) {

                val.acciones = `
                <div class='text-center'>
                  <button  onclick="eliminarPago(` + val.id + `)" title='Eliminar' class='delete btn-crud btn color-red'>
                    <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
                  </button>
                </div>`;

                $('#tablePagos').DataTable().row.add(val).draw();
            });


        }).fail(function (jqXHR, textStatus) {
            alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
        }).always(function ()    {
        });
    }
    function obtenerFormacionMedico(id) {
        $.ajax({
            type: 'post',
            url: "{{ URL::to('admin/obtenerformacionmedico') }}",
            dataType: "json",
            data: {iddoctor: id, '_token': '{{ csrf_token() }}'},
            beforeSend: function (xhr) {
            }
        }).done(function (dataRpta) {
            $('#tableFormacionAcademica').DataTable().clear().draw();
            jQuery.each(dataRpta.academics, function (i, val) {

                val.acciones = `
                <div class='text-center'>
                  <button  onclick="eliminarFormacion(` + val.id + `)" title='Eliminar' class='delete btn-crud btn color-red'>
                    <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
                  </button>
                </div>`;

                $('#tableFormacionAcademica').DataTable().row.add(val).draw();
            });


        }).fail(function (jqXHR, textStatus) {
            alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
        }).always(function () {
        });
    }
    function obtenerExperienciaMedico(id) {
        $.ajax({
            type: 'post',
            url: "{{ URL::to('admin/obtenerexperienciamedico') }}",
            dataType: "json",
            data: {iddoctor: id, '_token': '{{ csrf_token() }}'},
            beforeSend: function (xhr) {
            }
        }).done(function (dataRpta) {
            $('#tableExperienciaProfesional').DataTable().clear().draw();
            jQuery.each(dataRpta.experiencias, function (i, val) {

                val.acciones = `
                <div class='text-center'>
                  <button  onclick="eliminarExperiencia(` + val.id + `)" title='Eliminar' class='delete btn-crud btn color-red'>
                    <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
                  </button>
                </div>`;

                $('#tableExperienciaProfesional').DataTable().row.add(val).draw();
            });


        }).fail(function (jqXHR, textStatus) {
            alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
        }).always(function () {
        });
    }
     function obtenerEspecialidadesMedico(id) {
        $.ajax({
            type: 'post',
            url: "{{ URL::to('admin/obtenerespecialidadmedico') }}",
            dataType: "json",
            data: {iddoctor: id, '_token':token },
            beforeSend: function (xhr) {
            }
        }).done(function (dataRpta) {
            //console.log(dataRpta);

            
            $('#tableEspecialidad').DataTable().clear().draw();
            jQuery.each(dataRpta, function (i, val) {

                val.acciones = `
                <div class='text-center'>
                  <button type='button' onclick="eliminarEspecialidad(` + val.id + `)" title='Eliminar' class='delete btn-crud btn color-red'>
                    <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
                  </button>
                </div>`;

                $('#tableEspecialidad').DataTable().row.add(val).draw();
            });


        }).fail(function (jqXHR, textStatus) {
            console.log("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
        }).always(function () {
        });
    }
    $("#formMedicoProfesional").submit(function () {
            registrardatospromedico();
            return false;
        });
        
        
      function registrardatospromedico() {
        
        $.ajax({
            type: 'post',
            url: "{{ URL::to('admin/actualizardatospromedico') }}",
            dataType: "json",
            data: {
                iduser:'{!! $idusuarios!!}',
                specialty:$("#especialidad").val(),
                id_cmp: $("#idcmp").val(),
                lnkedIn: $("#linkedin").val(),
                about_me:  $("#acercade").val(),
                '_token': '{{ csrf_token() }}'
            },
            beforeSend: function (xhr) {
            }
        }).done(function (dataRpta) {
         
            swal("Actualizado!", "Actualización correcta.", "success");
  
        }).fail(function (jqXHR, textStatus) {
            alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
        }).always(function () {
        });
    }
    
    
    

</script>

@stop
