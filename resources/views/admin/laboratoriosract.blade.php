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
</style>
@stop

{{-- Page content --}}
@section('content')

<section class="content-header section-header">
    <div class="row">
        <div class="col-md-12">
            <h1 class="header-title">Actualizar Laboratorio</h1>
        </div>
    </div>

</section>

<section class="content paddingleft_right15">
    <div class="row" style="margin-right: -30px;margin-left: -30px">
        <div class="panel panel-primary ">
            <form id="formRegistrar">
                <fieldset>
                    <div class="col-md-12">
                        <div class="col-md-12">
                            
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label" for="">Nombre Laboratorio</label>
                                    <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="nombre"  type="text" class="format-input input-format form-control">
                                </div>
                            
                                <div class="form-group label-floating is-empty">
                                    <select id="cmbResponsable" class="form-control " style="font-size: 14px !important" required>                            
                                    </select>
                                </div>

                                <!-- Especialidad input-->
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label" for="telefono">Teléfono 1</label>
                                    <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="telefono" name="telefono" type="number" class="format-input input-format form-control" required>
                                </div>
                                
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label" for="telefono">Teléfono 2</label>
                                    <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="telefonoExtra" name="telefono" type="number" class="format-input input-format form-control">
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
                                    <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="direccion" name="idcmp" type="text" class="format-input input-format form-control">
                                </div>
                                    <div class="form-group  label-floating is-empty">
                                    <label class="control-label" for="email">Nro Maz. Lte</label>
                                    <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="numMzaLte" name="idcmp" type="text" class="format-input input-format form-control">
                                </div>
                                </div>

                            </fieldset>

                                <button type="submit" class="format btn btn-responsive btn-verde" style="margin:5px !important;vertical-align: middle;">Guardar </button>
                                <br><br>

                        </div>
                    </div>    
                </fieldset>
            </form>   


        </div>
    </div>    <!-- row-->
</section>



@stop

{{-- page level scripts --}}
@section('footer_scripts')

<script>
    $(function () {
    $('#menuLaboratorios').addClass("active");
    });
    
    listarUsuario();
    obtenerLaboratorio('{!! $idlaboratorios!!}');
    

    $("#formRegistrar").submit(function () {
        Registrar();
        return false;
    });
    
    function obtenerLaboratorio(id) {
        $.ajax({
            type: 'post',
            url: "{{ URL::to('admin/obtenerlaboratorio') }}",
            dataType: "json",
            data: {
                idlaboratorio:id,
                '_token': '{{ csrf_token() }}'
            },
            beforeSend: function (xhr) {
            }
        }).done(function (dataRpta) {
            //alert(JSON.stringify(dataRpta));
           obtenerUbigeo(dataRpta.laboratorio.ubigeo_id);
           
           $('#cmbResponsable').val(dataRpta.laboratorio.users_id);
           $('#telefono').val(dataRpta.laboratorio.telephone);
           $('#direccion').val(dataRpta.laboratorio.address);
           $('#nombre').val(dataRpta.laboratorio.name);
           $('#telefonoExtra').val(dataRpta.laboratorio.telephone_aux);
           $('#numMzaLte').val(dataRpta.laboratorio.address_extra_info);
           
           $("div").removeClass("is-empty");
        }).fail(function (jqXHR, textStatus) {
            alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
        }).always(function () {
        });
    }


    function Registrar() {

        var oLaboratorio = {
            id: '{!! $idlaboratorios!!}',
            name:$('#nombre').val(),
            users_id: $('#cmbResponsable').val(),
            telephone: $('#telefono').val(),
            telephone_aux: $('#telefonoExtra').val(),
            ubigeo_id: $('#cmbDistrito').val(),
            address: $('#direccion').val(),
            address_extra_info: $('#numMzaLte').val()
        };

        $.ajax({
            type: 'post',
            url: "{{ URL::to('admin/registrarLaboratorio') }}",
            dataType: "json",
            data: {
                laboratorio: oLaboratorio,                
                '_token': '{{ csrf_token() }}'
            },
            beforeSend: function (xhr) {
            }
        }).done(function (dataRpta) {
            swal("Actualizado!", "Actualizacion Correcta.", "success");
            
            
            //alert(dataRpta.message);
        }).fail(function (jqXHR, textStatus) {
            alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
        }).always(function () {
            //cerrarProgreso();
        });
    }


    function listarUsuario() {
        $.ajax({
            type: 'post',
            url: "{{ URL::to('admin/listarusuarios') }}",
            dataType: "json",
            data: {
                '_token': '{{ csrf_token() }}'
            },
            beforeSend: function (xhr) {
            }
        }).done(function (dataRpta) {
            //alert(JSON.stringify(dataRpta));
            var html = '<option value="">Responsable</option>';
            jQuery.each(dataRpta, function (i, val) {
                html += '<option value="' + val.id + '"> ' + val.name + ' ' + val.last_name + '</option>';
            });
            $('#cmbResponsable').html(html);
        }).fail(function (jqXHR, textStatus) {
            alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
        }).always(function () {
        });
    }
    
    function obtenerUbigeo(idubigeo) {

        $.ajax({
            type: 'post',
            url: "{{ URL::to('admin/obtenerubigeo') }}",
            dataType: "json",
            data: {
                idubigeo: idubigeo,
                '_token': '{{ csrf_token() }}'
            },
            beforeSend: function (xhr) {
            }
        }).done(function (dataRpta) {
            //alert(JSON.stringify(dataRpta.ubigeo));
            var html = '<option value="">Departamento</option>';
            jQuery.each(dataRpta.departamentos, function (i, val) {
                html += '<option value="' + val.departamento +  '"> ' + val.ubigeo + '</option>';
            });
            $('#cmbDepartamento').html(html);
            $('#cmbDepartamento').val(dataRpta.ubigeo.departamento);
            
            var html = '<option value="">Provincia</option>';
            jQuery.each(dataRpta.provincias, function (i, val) {
                html += '<option value="' + val.provincia +  '"> ' + val.ubigeo + '</option>';
            });
            $('#cmbProvincia').html(html);
            $('#cmbProvincia').val(dataRpta.ubigeo.provincia);
            
            var html = '<option value="">Distrito</option>';
            jQuery.each(dataRpta.distritos, function (i, val) {
                html += '<option value="' + val.id +  '"> ' + val.ubigeo + '</option>';
            });
            $('#cmbDistrito').html(html);
            $('#cmbDistrito').val(dataRpta.ubigeo.id);
            
            
            //alert(dataRpta.message);
        }).fail(function (jqXHR, textStatus) {
            alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
        }).always(function () {
            
            
        });
    }
    
    $('#cmbDepartamento').change(function() {
        listarProvincia($('#cmbDepartamento').val());
    });

    function listarProvincia(coddepartamento) {
        $.ajax({
            type: 'post',
            url: "{{ URL::to('admin/listarprovincia') }}",
            dataType: "json",
            data: {
                coddepartamento: coddepartamento,
                '_token': '{{ csrf_token() }}'
            },
            beforeSend: function (xhr) {
            }
        }).done(function (dataRpta) {
            //alert(JSON.stringify(dataRpta));
            var html = '<option value="">Provincia</option>';
            jQuery.each(dataRpta, function (i, val) {
                html += '<option value="' + val.provincia +  '"> ' + val.ubigeo + '</option>';
            });
            $('#cmbProvincia').html(html);
        }).fail(function (jqXHR, textStatus) {
            alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
        }).always(function () {
        });
    }
    $('#cmbProvincia').change(function() {
        listarDistrito($('#cmbDepartamento').val(),$('#cmbProvincia').val());
    });

    function listarDistrito(coddepartamento,codprovincia) {
        $.ajax({
            type: 'post',
            url: "{{ URL::to('admin/listardistrito') }}",
            dataType: "json",
            data: {
                coddepartamento: coddepartamento,
                codprovincia: codprovincia,
                '_token': '{{ csrf_token() }}'
            },
            beforeSend: function (xhr) {
            }
        }).done(function (dataRpta) {
            //alert(JSON.stringify(dataRpta));
            var html = '<option value="">Distrito</option>';
            jQuery.each(dataRpta, function (i, val) {
                html += '<option value="' + val.id +  '"> ' + val.ubigeo + '</option>';
            });
            $('#cmbDistrito').html(html);
        }).fail(function (jqXHR, textStatus) {
            alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
        }).always(function () {
        });
    }
    
   

  
    

</script>

<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

<script type="text/javascript" src="{{ asset('assets/vendors/dropzone/js/dropzone.js') }}" ></script>
        
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

@stop
