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

    </style>
<style>

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
        color: #ccc;
    }
</style>
    @stop

    {{-- Page content --}}
    @section('content')
    <section class="content-header section-header">
        <div class="row">
            <div class="col-md-9">
                <h4 class="header-title">Ver Asociado</h4>
            </div>

            <div class="col-md-12">
                <!--  -->
                <div class="row">
                    <div class="col-md-2 text-center" id="divImagen">
<!--                        <img src="{{ asset('assets/images/asociado01.jpeg') }}" class="img-form" alt="" width="110px">-->
                    </div>
                    <div class="col-md-8">
                        <h4><b id="lbasociado">Inmobiliraria Robles SAC.</b></h4>
                        <label for=""><b>RUC: </b></label>
                        <label for="" id="lbruc">258545252525</label><br>                   
                        <!-- <label for=""><b>Edad</b></label>
                        <label for="">28 años</label><br> -->
                        <label for=""><b>Telefono: </b></label>
                        <label for="" id="lbtelefono">(01) 425541</label><br>
                        <label for=""><b>Domicilio Fiscal: </b></label>
                        <label for="" id="lbdomicilio">Av. javier prado nro. 2550</label>
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
                                    <p style="text-align: justify" id="lbdescripcion">
                                        Empresa constructora dedicada a la construccion de
                                        vias, aeropuertos, edificaciones, mineria entre otros. con una experiencia de mas de 10 años
                                        en el serctor publico.
                                    </p>
                                    <ol>
                                        <li><b>Fecha de Incorporación: </b><label id="lbfecharegistro">25/02/2017</label> </li>
                                        <li><b>Cantidad de Empleados: </b><label id="lbcntEmpleados">50 empleados</label> </li>
                                        <!--                                <li><b>Plan: </b><label>Fijo</label> </li>-->
                                    </ol>
                                    <h4><b>Personal de contacto</b></h4>
                                    <ol>
                                        <li><b>Nombres: </b> <label id="lbnombres">Juan Perez A.</label> </li>
                                        <li><b>Apellidos: </b> <label id="lbapellidos">Juan Perez A.</label> </li>
                                        <li><b>Cargo: </b><label id="lbcargo">Administrador</label> </li>
                                        <li><b>Teléfono: </b><label id="lbtelefono">98575455</label> </li>
                                        <li><b>Email: </b><label id="lbcorreo">juan@email.com</label> </li>

                                    </ol>

                                </div>
                            </div>
                            
                <div class="panel panel-white" style="overflow-y:auto; overflow-x: hidden">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="upload-alt" data-size="20" data-loop="true" data-c="#fff" data-hc="white"></i>
                            Subir Imagen de Asociado
                        </h3>
                    </div>
                    <div class="panel-body" style="padding:0px !important;">
                        <div class="col-md-12" style="padding:30px;">
                            {!! Form::open(array('url' => URL::to('admin/subirimagen/'.$idasociados), 'method' => 'post', 'id'=>'myDropzone','class' => 'dropzone', 'files'=> true)) !!}
                            <div class="fallback">
                                <input name="file" type="file" multiple />
                                <input name="idasociado" value="1" type="text" multiple />
                            </div>
                            {!! Form::close() !!}
                        </div>
                        
                    </div>
                </div>
                        </div>

                        <div id="asociadoPersonal" class="tab-pane fade">
                            <div class="items-cv">
                                <div class="row">


                                    <!--                      <a href="{{  URL::to('admin/afiliados') }}" type="submit" class="format btn btn-responsive btn-verde" style="margin:2px !important;vertical-align: middle;">Ver Afiliados</a>-->
                                    <section class="content-header section-header">
                                        <div class="row">
                                            <div class="col-md-9">

                                                <h4 class="header-title">Afiliados</h4>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="text-right" style="padding-top: 5px; padding-right: 5px">
                                                    <button type="button" class="format btn-format" data-toggle="modal" data-target="#agregarAfiliado">Agregar Afiliado</button>
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
                                                        <table class="table table-bordered width100" style="width: 100%" id="tableAfiliado" >
                                                            <thead>
                                                                <tr class="filters">  
                                                                    <th>Nombres</th>
                                                                    <th>Apellidos</th>
                                                                    <th>Email</th>
                                                                    <th>DNI</th>
                                                                    <th>Direccion</th>
                                                                    <th>Últ. Acceso</th>
                                                                    <th>Acciones</th>
        <!--                                                            <th>DNI</th>
                                                                    <th>Nombres</th>
                                                                    <th>Correo</th>
                                                                    <th>Ubicacion</th>
                                                                    <th>Atenciones</th>
                                                                    <th>Último Acceso</th>
                                                                    <th>Comprado</th>                                                            
                                                                    <th>Acciones</th>-->
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
                                </div>
                            </div>
                        </div>

                        <div id="asociadoFacturacion" class="tab-pane fade">
                            <div class="items-cv">
                                <!-- formacion academica -->
                                <div class="row">
                                    
                                    <div class="col-sm-12">
                                        <h4 class="header-title">Filtrar por</h4>
                                    </div>
                                    
                                    <div class="col-sm-3">
                                        <div class="form-group label-floating is-empty">
                                            <select id="cmbYear" class="form-control " style="font-size: 14px !important" required>
                                                <option value="2019" data-paneles="usuarioSistema" >2019</option>
                                                <option value="2018" data-paneles="usuarioSistema">2018</option>
                                                <option value="2017" data-paneles="usuarioSistema">2017 </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group label-floating is-empty">
                                            <select id="cmbMonth" class="form-control " style="font-size: 14px !important" required>
                                                <option value="01" data-paneles="usuarioSistema">ENERO</option>
                                                <option value="02" data-paneles="usuarioSistema">FEBRERO</option>
                                                <option value="03" data-paneles="usuarioSistema">MARZO</option>
                                                <option value="04" data-paneles="usuarioSistema">ABRIL</option>
                                                <option value="05" data-paneles="usuarioSistema">MAYO</option>
                                                <option value="06" data-paneles="usuarioSistema">JUNIO</option>
                                                <option value="07" data-paneles="usuarioSistema">JULIO</option>
                                                <option value="08" data-paneles="usuarioSistema">AGOSTO </option>
                                                <option value="09" data-paneles="usuarioSistema">SETIEMBRE </option>
                                                <option value="10" data-paneles="usuarioSistema">OCTUBRE </option>
                                                <option value="11" data-paneles="usuarioSistema">NOVIEMBRE </option>
                                                <option value="12" data-paneles="usuarioSistema">DICIEMBRE </option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-sm-12">
                                        
                                        <label for=""> <b>Total De Gastos:</b> S/<label id="lbPecio"></label></label> <br>
                                        <label for=""> <b>Total De Consultas:</b> S/<label id="lbnumconsultas"></label></label> <br>
                                        <label for=""> <b>Total De Tiempo:</b> <label id="lbTiempo"></label> minutos</label>
                                        
                                    </div>

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

                                                <th>Acciones </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div>

                        <div id="asociadoNotas" class="tab-pane fade">
                            <div class="doc-postulantes">
                                <label class="nota-title"><b>Nueva Nota</b></label>
                                <div class="row">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label" for="notaContenido">Escriba una nota</label>
                                        <textarea  onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" class="form-control" id="notaContenido" maxlength="500" name="notaContenido" rows="3"></textarea>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" onclick="agregarNota()" class="format btn btn-responsive btn-format" style="margin:5px !important;vertical-align: middle;">Guardar Nota</button>
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
                        <form id="formRegistrarUsuario">
                            <fieldset>

                                <div class="col-md-12">

                                    <!-- Name input-->
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label" for="name">Nombres</label>
                                        <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="nombres" name="nombres" type="text" class="format-input input-format form-control" required>
                                    </div>
                                    <!-- Apellidos input -->
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label" for="name">Apellidos</label>
                                        <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="apellidos" name="apellidos" type="text" class="format-input input-format form-control" required>
                                    </div>
                                    <!-- email -->
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label" for="email">Correo</label>
                                        <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="correo" name="correo" type="email" class="format-input input-format form-control" required>
                                    </div>
                                    <!-- teléfono -->
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label" for="email">Teléfono</label>
                                        <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="telefono" name="telefono" type="text" class="format-input input-format form-control" required>
                                    </div>
                                    <div class="form-group label-floating is-empty">
                                        <select id="cmbTipoDoc" class="form-control " style="font-size: 14px !important" required>
                                            <option value="">Tipo Documento</option>
                                        </select>
                                    </div>
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label" for="dni">Numero Documento</label>
                                        <input  id="dni" name="idcmp" type="text" class="format-input input-format form-control" required>
                                    </div>
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label" >Contraseña</label>
                                        <input id="password"  type="password" class="format-input input-format form-control" required>
                                    </div>
                                    
                                    <fieldset class="scheduler-border">
                                    <legend class="scheduler-border">Direccion:</legend>

                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <div class=" label-floating is-empty">
                                                <select id="cmbDepartamento" class="form-control " style="font-size: 14px !important" required>                            
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <div class=" label-floating is-empty">
                                                <select id="cmbProvincia" class="form-control " style="font-size: 14px !important" required>                            
                                                    <option value="">Provincia</option>         
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <div class=" label-floating is-empty">
                                                <select id="cmbDistrito" class="form-control " style="font-size: 14px !important" required>                            
                                                    <option value="">Distrito</option>  
                                                </select>
                                            </div>
                                        </div>  
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group  label-floating is-empty">
                                            <label class="control-label" for="email">Direccion</label>
                                            <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="cuidad" name="idcmp" type="text" class="format-input input-format form-control">
                                        </div>
                                        <div class="form-group  label-floating is-empty">
                                            <label class="control-label" for="email">Nro Maz. Lte</label>
                                            <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="numMzaLte" name="idcmp" type="text" class="format-input input-format form-control">
                                        </div>
                                    </div>

                                    </fieldset>
                                       

                                </div>

                            </fieldset>
                        </form>
                    </div>
                    <div class="panel-footer">
                        <div class="modal-pie">
                            <div class=" text-right">
                                <button form="formRegistrarUsuario" type="submit" class="format btn btn-responsive btn-format" style="margin:5px !important;vertical-align: middle;">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- MODAL AGREGAR ASOCIADO -->
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


    @stop

    {{-- page level scripts --}}
    @section('footer_scripts')

    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
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


    <script>
        // ESTABLECER AÑO - MES Y CALCULAR LA FACTURACION
        $(document).ready(function() {
            cmbYear

        })
        var FormDropzone = function() {
            return {
                //main function to initiate the module
                init: function() {
                    Dropzone.options.myDropzone = {
                        init: function() {
                            this.on("success", function(file,responseText) {
                                var obj = jQuery.parseJSON(responseText);
                                //alert(obj.filename);
                                $('#divImagen').html('<img src="../../images/companies/' + obj.filename + '" class="img-form" alt="" width="150px">');

                                this.removeFile(file);
                                
                            });

                        }
                    }
                }
            };
        }();
        jQuery(document).ready(function() {

            FormDropzone.init();
        });

        var token = '{{ csrf_token() }}';
        var urllistarusuario = "{{ URL::to('admin/listarafiliados') }}";
        listarUsuarios('{!! $idasociados!!}');

        var listardepartamentos = "{{ URL::to('admin/listardepartamentos') }}";
        var listarprovincia = "{{ URL::to('admin/listarprovincia') }}";
        var listardistrito = "{{ URL::to('admin/listardistrito') }}";


        $(function () {
            $('#menuAsociado').addClass("active");
        });

        $("#formRegistrarUsuario").submit(function () {
            RegistrarUsuario();
            return false;
        });

        function RegistrarUsuario() {

            var ousuario = {
                id: null,

                name: $('#nombres').val(),
                last_name: $('#apellidos').val(),
                email: $('#correo').val(),
                ubigeo_id: $('#cmbDistrito').val(),
                type_document_id: $('#cmbTipoDoc').val(),  
                numdoc: $('#dni').val(),
                address: $('#cuidad').val(),
                address_extra_info: $('#numMzaLte').val(),
                password: $('#password').val()
            };

            $.ajax({
                type: 'post',
                url: "{{ URL::to('admin/registrarafiliado') }}",
                dataType: "json",
                data: {
                    usuario: ousuario,
                    idcompania: '{!! $idasociados!!}',
                    telefono: $('#telefono').val(),
                    '_token': token
                },
                beforeSend: function (xhr) {
                }
            }).done(function (dataRpta) {
                swal("Registrado!", "Registro Correcto.", "success");
                
                //alert(JSON.stringify(dataRpta));
                listarUsuarios('{!! $idasociados!!}');
                //alert(dataRpta.message);
            }).fail(function (jqXHR, textStatus) {
                alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
            }).always(function () {
                //cerrarProgreso();
            });
        }


        var acciones = `
                <div class='text-center'>
                <button title='Ver' data-toggle='modal' data-target='#verAfiliado' class='btn-crud btn btn-format'>
                  <span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>
                </button>
                <button title='Editar' data-toggle='modal' data-target='#editarAfiliado' class='btn-crud btn btn-format'>
                  <span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
                </button>
                <button id='btnEliminarAfiliado' title='Eliminar' class='btn-crud btn color-red'>
                  <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
                </button>
                </div>
                `;

        $(function () {
            var tableAfiliado = $('#tableAfiliado').DataTable({
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
                    {"data": "name"},
                    {"data": "last_name"},
                    {"data": "email"},
                    {"data": "numdoc"},
                    {"data": "address"},
                    {"data": "last_login"},
                    //{ "data": "rol" },
                    {"data": "acciones"}
                ]
            });
        });
        //    $('#tableAfiliado tbody').on('click', 'button#btnEliminarAfiliado', function () {
        //    var table = $(this);
        //            $("#eliminarAfiliado").modal();
        //            $("#btnEliminarAfiliadoSi").on('click', function(){
        //    tableAfiliados
        //            .row(table.parents('tr'))
        //            .remove()
        //            .draw();
        //    })
        //    });



        function listarUsuarios(idasociado) {
            $.ajax({
                type: 'post',
                url: urllistarusuario,
                dataType: "json",
                data: {idasociado: idasociado, '_token': token},
                beforeSend: function (xhr) {
                    //progreso();
                }
            }).done(function (dataRpta) {
                //alert(JSON.stringify(dataRpta));
                console.log('RESPONES LISTAR', dataRpta)
                $('#tableAfiliado').DataTable().clear().draw();
                jQuery.each(dataRpta, function (i, val) {

                    val.acciones = `
                <div class='text-center'>
                  <button title='Ver' onclick="location.href='/admin/verpaciente/` + val.id + `'" class='btn-crud btn btn-format'>
                    <span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>
                  </button>
                  <button  onclick="eliminar(` + val.id + `)" title='Eliminar' class='delete btn-crud btn color-red'>
                    <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
                  </button>
                </div>`;

                    $('#tableAfiliado').DataTable().row.add(val).draw();
                });


            }).fail(function (jqXHR, textStatus) {
                console.log('ERRROR LISTAR',jqXHR)
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
                eliminarUsuario(id);
                swal("Eliminado!", "eliminacion correcta.", "success");
            });
        }


        function eliminarUsuario(id) {

            $.ajax({
                type: 'post',
                url: "{{ URL::to('admin/eliminarmedicos') }}",
                dataType: "json",
                data: {id_user: id, '_token': '{{ csrf_token() }}'},
                beforeSend: function (xhr) {
                    //alert(id);
                }
            }).done(function (dataRpta) {
                //alert(JSON.stringify(dataRpta));

                listarUsuarios('{!! $idasociados!!}');

                //alert(dataRpta.message);
            }).fail(function (jqXHR, textStatus) {
                alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
            }).always(function () {
            });

        }



        var acciones2 = `
            <div class='text-center'>
            <button id='btnEliminarMedico' title='Eliminar' class='delete btn-crud btn color-red'>
            <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
            </button>
            </div>`;

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
                    {"data": "acciones"}
                ]
            });
        });

        obtenerAsociado('{!! $idasociados!!}');

        obtenerPagosAsociado('{!! $idasociados!!}');
        $('#btnGenerarMonto').click(function () {
            generaMontoPago();
        });


        function generaMontoPago() {
            $.ajax({
                type: 'post',
                url: "{{ URL::to('admin/planpagosasociado') }}",
                dataType: "json",
                data: {
                    idasociado: '{!! $idasociados!!}',
                    mes: $('#mes').val(),
                    anio: $('#anio').val(),
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

        $("#formRegistrarPago").submit(function () {
            registrarPago();
            return false;
        });

        function registrarPago() {

            var oPago = {
                id: null,
                amount: $('#monto').val(),
                company_id: '{!! $idasociados!!}',
                month: $('#mes').val(),
                year: $('#anio').val(),
                payment_description: $('#conceptoPago').val()
            };
            $.ajax({
                type: 'post',
                url: "{{ URL::to('admin/registropagosasociado') }}",
                dataType: "json",
                data: {
                    pago: oPago,
                    '_token': '{{ csrf_token() }}'},
                beforeSend: function (xhr) {
                }
            }).done(function (dataRpta) {

                swal("Registrado!", "Registro correcto.", "success");
                obtenerPagosAsociado('{!! $idasociados!!}');

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
                url: "{{ URL::to('admin/eliminarpagosasociado') }}",
                dataType: "json",
                data: {idPago: id, '_token': '{{ csrf_token() }}'},
                beforeSend: function (xhr) {
                    //alert(id);
                }
            }).done(function (dataRpta) {
                //alert(JSON.stringify(dataRpta));
                swal("Eliminado!", "Eliminación correcta.", "success");
                obtenerPagosAsociado('{!! $idasociados!!}');

                //alert(dataRpta.message);
            }).fail(function (jqXHR, textStatus) {
                alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
            }).always(function () {
            });

        }

        function obtenerPagosAsociado(id) {
            $.ajax({
                type: 'post',
                url: "{{ URL::to('admin/obtenerpagosasociado') }}",
                dataType: "json",
                data: {idasociado: id, '_token': '{{ csrf_token() }}'},
                beforeSend: function (xhr) {
                }
            }).done(function (dataRpta) {
                console.log('RESPONSE OBTENER PAGOS', dataRpta)
                //alert(JSON.stringify(dataRpta));
                $('#lbnumconsultas').html(dataRpta.consultasNum);
                $('#lbTiempo').html(dataRpta.consultasSum);
                $('#lbPecio').html(dataRpta.consultasPrecio);



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
                console.log('ERROR OBTENER PAGOS', jqXHR);
            }).always(function () {
            });
        }




        function obtenerAsociado(id) {
            $.ajax({
                type: 'post',
                url: "{{ URL::to('admin/obtenerasociado') }}",
                dataType: "json",
                data: {idasociado: id, '_token': '{{ csrf_token() }}'},
                beforeSend: function (xhr) {
                }
            }).done(function (dataRpta) {

                //alert(JSON.stringify(dataRpta));
                console.log('RESPONSE OBTENER ASOCIADO', dataRpta)
                $('#lbasociado').html(dataRpta.name);
                $('#lbruc').html(dataRpta.ruc);
                $('#lbtelefono').html(dataRpta.number_phone);
                $('#lbdomicilio').html(dataRpta.address);
                $('#lbdescripcion').html(dataRpta.about);
                $('#lbfecharegistro').html(dataRpta.created_at);
                //$('#lbcntEmpleados').html(dataRpta.cantidadEmpleados);
                $('#lbcntEmpleados').html(dataRpta.number_workers);
                $('#lbnombres').html(dataRpta.name_contact);
                $('#lbapellidos').html(dataRpta.last_name_contact);
                $('#lbcargo').html(dataRpta.position_contact);
                $('#lbtelefono').html(dataRpta.telephone_contact);
                $('#lbcorreo').html(dataRpta.email_contact);
                try {
    
                $('#divImagen').html('<img src="../../images/companies/' + dataRpta.url_image + '" class="img-form" alt="" width="150px">');

                } catch (e) {}

                var notas = '';
                jQuery.each(dataRpta.notas, function (i, val) {

                    notas = notas + "<li> <label>" + val.body_note + "</label> </li>";

                });

                $('#misNotas').html(notas);

            }).fail(function (jqXHR, textStatus) {
                console.log("ERROR OBTENER ASOCIADO", jqXHR);
            }).always(function () {
            });
        }

        function agregarNota() {

            $.ajax({
                type: 'post',
                url: "{{ URL::to('admin/agregarnotaasociado') }}",
                dataType: "json",
                data: {
                    idasociado: '{!! $idasociados!!}',
                    texto: $('#notaContenido').val(),
                    '_token': '{{ csrf_token() }}'
                },
                beforeSend: function (xhr) {
                    //alert(id);
                }
            }).done(function (dataRpta) {
                //alert(JSON.stringify(dataRpta));
                var notas = '';
                jQuery.each(dataRpta, function (i, val) {

                    notas = notas + "<li> <label>" + val.body_note + "</label> </li>";

                });

                $('#misNotas').html(notas);
                $('#notaContenido').val('');
                //alert(dataRpta.message);
            }).fail(function (jqXHR, textStatus) {
                alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
            }).always(function () {
            });

        }





        listarDepartamento();

        function listarDepartamento() {
            $.ajax({
                type: 'post',
                url: listardepartamentos,
                dataType: "json",
                data: {
                    '_token': token
                },
                beforeSend: function (xhr) {
                }
            }).done(function (dataRpta) {
                //alert(JSON.stringify(dataRpta));
                var html = '<option value="">Departamento</option>';
                jQuery.each(dataRpta, function (i, val) {
                    html += '<option value="' + val.departamento + '"> ' + val.ubigeo + '</option>';
                });
                $('#cmbDepartamento').html(html);
            }).fail(function (jqXHR, textStatus) {
                //alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
            }).always(function () {
            });
        }

        $('#cmbDepartamento').change(function () {
            listarProvincia($('#cmbDepartamento').val());
        });

        function listarProvincia(coddepartamento) {
            $.ajax({
                type: 'post',
                url: listarprovincia,
                dataType: "json",
                data: {
                    coddepartamento: coddepartamento,
                    '_token': token
                },
                beforeSend: function (xhr) {
                }
            }).done(function (dataRpta) {
                //alert(JSON.stringify(dataRpta));
                var html = '<option value="">Provincia</option>';
                jQuery.each(dataRpta, function (i, val) {
                    html += '<option value="' + val.provincia + '"> ' + val.ubigeo + '</option>';
                });
                $('#cmbProvincia').html(html);
            }).fail(function (jqXHR, textStatus) {
                //alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
            }).always(function () {
            });
        }
        $('#cmbProvincia').change(function () {
            listarDistrito($('#cmbDepartamento').val(), $('#cmbProvincia').val());
        });

        function listarDistrito(coddepartamento, codprovincia) {
            $.ajax({
                type: 'post',
                url: listardistrito,
                dataType: "json",
                data: {
                    coddepartamento: coddepartamento,
                    codprovincia: codprovincia,
                    '_token': token
                },
                beforeSend: function (xhr) {
                }
            }).done(function (dataRpta) {
                //alert(JSON.stringify(dataRpta));
                var html = '<option value="">Distrito</option>';
                jQuery.each(dataRpta, function (i, val) {
                    html += '<option value="' + val.id + '"> ' + val.ubigeo + '</option>';
                });
                $('#cmbDistrito').html(html);
            }).fail(function (jqXHR, textStatus) {
                //alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
            }).always(function () {
            });
        }
        
    listarTipoDocumento();
    function listarTipoDocumento() {
    $.ajax({
        type: 'post',
        url: "{{ URL::to('admin/listartipodocumento') }}",
        dataType: "json",
        data: {
            '_token': token
        },
        beforeSend: function (xhr) {
        }
    }).done(function (dataRpta) {
        //alert(JSON.stringify(dataRpta));
        var html = '<option value="">Tipo Documento</option>';
        jQuery.each(dataRpta.tipodoc, function (i, val) {
            html += '<option value="' + val.id + '"> ' + val.type_name + '</option>';
        });
        $('#cmbTipoDoc').html(html);
    }).fail(function (jqXHR, textStatus) {
        //alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
    }).always(function () {
    });
}
    



    </script>
    @stop
