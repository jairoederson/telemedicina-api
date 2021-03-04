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
    .form-group.label-floating label.control-label, .form-group.label-placeholder label.control-label {
        /*margin: 0px;*/
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
            <h1 class="header-title">Actualización Usuarios</h1>
        </div>
    </div>

</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row" style="margin-right: -30px;margin-left: -30px">
        <div class="panel panel-primary ">
            <form id="formRegistrarUsuario">
                <fieldset>
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <div class="form-group label-floating is-empty">
                                <select id="cmbUsuarioRol" class="form-control " style="font-size: 14px !important" disabled>
                                    <option value="">Seleccione Rol</option>
                                    <option value="1">Admin</option>
                                    <option value="4">Secretaria</option>
                                    <option value="5">Laboratorista </option>
<!--                                    <option value="2">Medico</option>
                                    <option value="3">Paciente </option>-->
                                    <!--                <option value="panelmedico">Doctor</option>-->
                                    <!--                <option value="panelpaciente">Paciente </option>-->
                                </select>
                            </div>
                            <!-- Name input-->
                            <div class="form-group label-floating is-empty">
                                <label class="control-label" for="nombres">Nombres</label>
                                <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="nombres" name="nombres" type="text" class="format-input input-format form-control" required>
                            </div>
                            <!-- Apellidos input -->
                            <div class="form-group label-floating is-empty">
                                <label class="control-label" for="apellidos">Apellidos</label>
                                <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="apellidos" name="apellidos" type="text" class="format-input input-format form-control" required>
                            </div>

                            <!-- email -->
                            <div class="form-group label-floating is-empty">
                                <label class="control-label" for="email">Correo</label>
                                <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="correo" name="correo" type="email" class="format-input input-format form-control" required>
                            </div>

                            <!-- teléfono -->
                            <div class="form-group label-floating is-empty">
                                <label class="control-label" for="telefono">Teléfono</label>
                                <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="telefono" name="telefono" type="number" class="format-input input-format form-control" required>
                            </div>
                            
                            <div class="form-group label-floating is-empty">
                                <select id="cmbTipoDoc" class="form-control " style="font-size: 14px !important" required>
                                    <option value="">Tipo Documento</option>
                                    <!--                <option value="panelmedico">Doctor</option>-->
                                    <!--                <option value="panelpaciente">Paciente </option>-->
                                </select>
                            </div>
                            <!-- ID CMP -->
                            <div class="form-group label-floating is-empty">
                                <label class="control-label" for="dni">Numero Documento</label>
                                <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" pattern="[0-9]{8}" id="dni" name="idcmp" type="text" class="format-input input-format form-control" required>
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
                            <!-- Contraseña -->



                            <button type="submit" class="format btn btn-responsive btn-format" style="margin:5px !important;vertical-align: middle;">Guardar </button>
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
    var token = '{{ csrf_token() }}';
    var listartipodocumento = "{{ URL::to('admin/listartipodocumento') }}";
    obtenerUsuario('{!! $idusuarios!!}');
    $("#formRegistrarUsuario").submit(function () {
        ActualizarUsuario();
        return false;
    });
    
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
    
function showPassword() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        document.getElementById('viz1').style.display = "none";
        document.getElementById('viz2').style.display = "block";
        ;
        x.type = "text";
    } else {
        document.getElementById('viz1').style.display = "block";
        document.getElementById('viz2').style.display = "none";
        ;
        x.type = "password";
    }
}
    
function generarPwd() {
    document.getElementById('pwdUsuario').classList.remove('is-empty');
    document.getElementById('password').value = generatePassword()/*Math.random().toString(36).slice(-8)*/;
}


function generatePassword() {

    String.prototype.pick = function (min, max) {
        var n, chars = '';

        if (typeof max === 'undefined') {
            n = min;
        } else {
            n = min + Math.floor(Math.random() * (max - min + 1));
        }

        for (var i = 0; i < n; i++) {
            chars += this.charAt(Math.floor(Math.random() * this.length));
        }
        return chars;
    };

    String.prototype.shuffle = function () {
        var array = this.split('');
        var tmp, current, top = array.length;

        if (top)
            while (--top) {
                current = Math.floor(Math.random() * (top + 1));
                tmp = array[current];
                array[current] = array[top];
                array[top] = tmp;
            }

        return array.join('');
    };


    var specials = '!@#$%&()_+{}<>?\|[]\/';
    var lowercase = 'abcdefghijklmnopqrstuvwxyz';
    var uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    var numbers = '0123456789';

    var all = specials + lowercase + uppercase + numbers;

    var password = '';
    password += specials.pick(1);
    password += lowercase.pick(1);
    password += uppercase.pick(1);
    password += all.pick(5);
    password = password.shuffle();

    return password;
}

    function ActualizarUsuario() {

        var ousuario = {
            id: '{!! $idusuarios!!}',
            name: $('#nombres').val(),
            last_name: $('#apellidos').val(),
            email: $('#correo').val(),
            ubigeo_id: $('#cmbDistrito').val(),
            type_document_id: $('#cmbTipoDoc').val(),        
            numdoc: $('#dni').val(),
            address: $('#cuidad').val(),
            address_extra_info: $('#numMzaLte').val(),        
            password: $('#password').val(),
            birth_date: $('#rangepicker4').val()
        };

        $.ajax({
            type: 'post',
            url: "{{ URL::to('admin/modificarusuario') }}",
            dataType: "json",
            data: {
                usuario: ousuario,
                rol: $('#cmbUsuarioRol').val(),
                telefono: $('#telefono').val(),
                '_token': '{{ csrf_token() }}'
            },
            beforeSend: function (xhr) {
            }
        }).done(function (dataRpta) {
            //alert(JSON.stringify(dataRpta));
            swal("Actualizado!", "Actualización correcto.", "success");    
            //alert(dataRpta.message);
        }).fail(function (jqXHR, textStatus) {
            alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
        }).always(function () {
            //cerrarProgreso();
        });
    }

    function obtenerUsuario(idusuario) {

        $.ajax({
            type: 'post',
            url: "{{ URL::to('admin/obtenerusuario') }}",
            dataType: "json",
            data: {
                idusuario: idusuario,
                '_token': '{{ csrf_token() }}'
            },
            beforeSend: function (xhr) {
            }
        }).done(function (dataRpta) { 
            //alert(JSON.stringify(dataRpta)); 
            listarTipoDocumento(dataRpta.usuario.type_document_id);
            $('#cmbUsuarioRol').val(dataRpta.rol.role_id);
            $('#nombres').val(dataRpta.usuario.name);
            $('#apellidos').val(dataRpta.usuario.last_name);
            $('#correo').val(dataRpta.usuario.email);
            $('#dni').val(dataRpta.usuario.numdoc);
            $('#cuidad').val(dataRpta.usuario.address);
            $('#cmbTipoDoc').val(dataRpta.usuario.type_document_id);
            $('#numMzaLte').val(dataRpta.usuario.address_extra_info);
            var array=dataRpta.usuario.birth_date.split('-');
            var birth_date= array[2] + '/' +array[1]+ '/'+array[0];
            $('#rangepicker4').val(birth_date);

            try {$('#telefono').val(dataRpta.telefono.number);} catch (e) {}
            $("div").removeClass("is-empty");
            obtenerUbigeo(dataRpta.usuario.ubigeo_id);
            
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
            alert("jqXHR fail: " + jqXHR + " - " + "Request failed: " + textStatus);
        }).always(function () {
            
            
        });
    }
   
$('#cmbDepartamento').change(function() {
        $('#cmbProvincia').html('<option value="">Cargando Provincias ...</option>');
        listarProvincia($('#cmbDepartamento').val());
        $('#cmbDistrito').html('<option value="">Distrito</option>');
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
        $('#cmbDistrito').html('<option value="">Cargando Distritos ...</option>');
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
    
    
    
    
    function listarTipoDocumento(id) {
    $.ajax({
        type: 'post',
        url: listartipodocumento,
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
        $('#cmbTipoDoc').val(id);
    }).fail(function (jqXHR, textStatus) {
        //alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
    }).always(function () {
    });
}
    
    
   
</script>

<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<!--<script type="text/javascript" src="{{ asset('assets/js/frontend/admin/registroUsuario.js')}}"></script>-->
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
<script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/vendors/daterangepicker/js/daterangepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/clockface/js/clockface.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/datepicker.js') }}" type="text/javascript"></script>
@stop
