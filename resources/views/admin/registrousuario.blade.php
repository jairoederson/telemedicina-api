@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Josh Admin Template
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/admin/admin.css') }}">
<link href="{{ asset('assets/vendors/dropzone/css/dropzone.css') }}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/farmacias-logo.ico') }}">
    <link href="{{ asset('assets/vendors/daterangepicker/css/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendors/clockface/css/clockface.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" type="text/css" />
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
        <div class="col-md-12">
            <h1 class="header-title">Registro Usuarios</h1>
        </div>
    </div>

</section>

<!-- Main content -->
<section class="content paddingleft_right15 ">
    <div class="row" style="margin-right: -30px;margin-left: -30px">
        <div class="panel panel-primary ">

            <fieldset>
                <div class="col-md-12">
                    <div class="col-md-12">

                        <div class="form-group label-floating is-empty">
                            <select id="cmbUsuarioRol" class="form-control " style="font-size: 14px !important" required>
                                <option value="1" data-paneles="usuarioSistema" >Admin</option>
                                <option value="4" data-paneles="usuarioSistema">Secretaria</option>
                                <option value="5" data-paneles="usuarioSistema">Laboratorista </option>
                                <option value="2" data-paneles="usuarioSistema">Medico</option>
                                <option value="3" data-paneles="usuarioSistema">Paciente </option>
                                <option value="6" data-paneles="usuarioSistema">Enfermero </option>
                            </select>
                        </div>
                        <div id="usuarioSistema" class="panelcambio" style="display: block">
                            <form id="formRegistrarUsuario">

                                <div class="form-group label-floating is-empty">
                                    <label class="control-label" for="nombres">Nombres</label>
                                    <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="nombres" name="nombres" type="text" class="format-input input-format form-control" required>
                                </div>
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label" for="apellidos">Apellidos</label>
                                    <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="apellidos" name="apellidos" type="text" class="format-input input-format form-control" required>
                                </div>

                                <div class="form-group label-floating is-empty">
                                    <label class="control-label" for="email">Correo</label>
                                    <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="correo" name="correo" type="email" class="format-input input-format form-control" required>
                                </div>

                                <div class="form-group label-floating is-empty">
                                    <label class="control-label" for="telefono">Teléfono</label>
                                    <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="telefono" name="telefono" type="number" class="format-input input-format form-control" required>
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
                                    <label>Fecha de Nacimiento</label>
                                    <div class="input-group issue-date">
                                        <!-- <div class="input-group-addon">
                                        </div> -->
                                        <i class="livicon" data-name="laptop" data-size="16" data-c="#e22715" data-hc="#e22715" data-loop="true"></i>
                                        <!-- <i class="fa fa-user icon"></i> -->
                                        <input type="text" class="form-control" id="rangepicker4"/>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <div class="row">
                                    <div id="pwdUsuario" class="col-md-7 form-group label-floating is-empty" style="padding-left: 0px;">
                                        <label class="control-label" >Contraseña</label>
                                        <input id="password"  type="password" class="format-input input-format form-control" required>
                                    </div>

                                    <div class="col-md-1" style="padding: 100px 0px 0px 0px">
                                        <br>
                                        <span onclick="showPassword()" id="viz1" class="glyphicon glyphicon-eye-open icon-viz" style="display: block; color: #9f9f9f" aria-hidden="true"></span>
                                        <span onclick="showPassword()" id="viz2" class="glyphicon glyphicon-eye-close icon-viz" style="display: none; color: #9f9f9f" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-4" style="padding-top: 5px;">
                                        <button id="testing" onclick="generarPwd()" type="button" class="format btn btn-responsive btn-format" style="margin:5px !important;vertical-align: middle;">Generar Contraseña</button>
                                    </div>

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

                                <button type="submit" class="format btn btn-responsive btn-format" style="margin:5px !important;vertical-align: middle;">Guardar </button>
                            </form>
                        </div>
                        <div id="usuarioMedico" class="panelcambio" style="display: none">
                            <form>
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label" for="nombres">Nombres</label>
                                    <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="nombdfdres" name="nombres" type="text" class="format-input input-format form-control" required>
                                </div>
                            </form>
                        </div>

                        <br><br>
                    </div>
                </div>
            </fieldset>

        </div>
    </div>
</section>
@stop
{{-- page level scripts --}}
@section('footer_scripts')

<script>

    var token = '{{ csrf_token() }}';
    var registrarUsuario = "{{ URL::to('admin/registrarUsuario') }}";
    var listardepartamentos = "{{ URL::to('admin/listardepartamentos') }}";
    var listarprovincia = "{{ URL::to('admin/listarprovincia') }}";
    var listardistrito = "{{ URL::to('admin/listardistrito') }}";
    var listartipodocumento = "{{ URL::to('admin/listartipodocumento') }}";
    $(document).ready(function () {
        $('#dni')
                .keypress(function (event) {
                    if ($('#cmbTipoDoc').val()==1) {
                        if (this.value.length === 8) {
                        return false;
                        }
                    }
                    if ($('#cmbTipoDoc').val()==2) {
                        if (this.value.length === 12) {
                        return false;
                        }
                    }
                    if (event.which < 48 || event.which > 57) {
                        return false;
                    }

                });
        $("#cmbTipoDoc").change(function() {
            $('#dni').val('');
        });
    });


</script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/js/frontend/admin/registroUsuario.js')}}"></script>
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
<script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('assets/vendors/daterangepicker/js/daterangepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/clockface/js/clockface.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/datepicker.js') }}" type="text/javascript"></script>
@stop