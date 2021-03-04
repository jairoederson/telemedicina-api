@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Form Elements
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link href="{{ asset('assets/css/pages/formelements.css') }}" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}"/>
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/vendors/sweetalert/css/sweetalert.css') }}" rel="stylesheet" type="text/css" />
@stop

{{-- Page content --}}
@section('content')

<section class="content-header section-header">
    <div class="row">
        <div class="col-md-12">
            <h1 class="header-title">Configuración</h1>
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

                            <input id="idConfig" type="text" style="display: none" />
                            {{-- <div class="form-group label-floating is-empty">
                                <label class="control-label" for="universidad">Titulo</label>
                                <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="titulo" type="text" class="format-input input-format form-control" required>
                            </div>--}}
                            <div class="form-group label-floating is-empty">
                                <label class="control-label" for="universidad">E-mail general</label>
                                <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="email" type="text" class="format-input input-format form-control" required>
                            </div>
                            <div class="form-group label-floating is-empty">
                                <label class="control-label" for="universidad">Descripcion de la Pagina </label>
                                <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="descripcion"  type="text" class="format-input input-format form-control" required>

                            </div>
                            <div class="form-group label-floating is-empty">
                                <label class="control-label" for="universidad">Precio de la consulta (S/)</label>
                                <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="precioconsulta" type="text" class="format-input input-format form-control" required>

                            </div>

                            <div class="form-group label-floating is-empty">
                                <label class="control-label" for="universidad">Comisión del Medico (%)</label>
                                <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="preciopagomedico" type="text" class="format-input input-format form-control" required>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-6">
                                        <label class="control-label" for="universidad">Hora de atencion inicio</label>
                                        <input id="hora_inicio" type="time" class="format-input input-format form-control" required>

                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label" for="universidad">Hora de atencion final</label>
                                        <input id="hora_final" type="time" class="format-input input-format form-control" style="margin-top: 0px;" >
                                    </div>

                                </div>
                            </div>
                            <div class="form-group label-floating is-empty">
                                <button type="submit" class="format btn btn-responsive btn-format" style="margin:5px !important;vertical-align: middle;">Guardar Cambios</button>
                            </div>


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

<!-- InputMask -->
<script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}" ></script>
<!-- date-range-picker -->
<script src="{{ asset('assets/js/pages/autogrow.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/bootstrap-maxlength/js/bootstrap-maxlength.js') }}"  type="text/javascript"></script>
<script src="{{ asset('assets/vendors/card/lib/js/jquery.card.js') }}"  type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/formelements.js') }}"  type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/frontend/admin/configuracion.js')}}"></script>
<script src="{{ asset('assets/vendors/sweetalert/js/sweetalert-dev.js') }}" type="text/javascript"></script>
<script type="text/javascript">
                            obtenerLaboratorio();
                            function obtenerLaboratorio() {
                                $.ajax({
                                    type: 'post',
                                    url: "{{ URL::to('admin/obtenerconfiguracion') }}",
                                    dataType: "json",
                                    data: {
                                        '_token': '{{ csrf_token() }}'
                                    },
                                    beforeSend: function (xhr) {
                                    }
                                }).done(function (dataRpta) {
                                    //alert(JSON.stringify(dataRpta));
                                    $('#idConfig').val(dataRpta.configuracion.id);
                                    $('#email').val(dataRpta.configuracion.email);
                                    $('#descripcion').val(dataRpta.configuracion.description);
                                    $('#precioconsulta').val(dataRpta.configuracion.price);
                                    $('#preciopagomedico').val(dataRpta.configuracion.doctor_price);
                                    // $('#titulo').val(dataRpta.configuracion.titulo);
                                    $('#hora_inicio').val(dataRpta.configuracion.hora_inicio);
                                    $('#hora_final').val(dataRpta.configuracion.hora_final);
                                    $("div").removeClass("is-empty");
                                }).fail(function (jqXHR, textStatus) {
                                    alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
                                }).always(function () {
                                });
                            }

                            $("#formRegistrar").submit(function () {
                                Registrar();
                                return false;
                            });


                            function Registrar() {

                                var oConfig = {
                                    id: $('#idConfig').val(),
                                    email: $('#email').val(),
                                    description: $('#descripcion').val(),
                                    doctor_price: $('#preciopagomedico').val(),
                                    price: $('#precioconsulta').val(),
                                    // titulo: $('#titulo').val(),
                                    hora_inicio: $('#hora_inicio').val(),
                                    hora_final: $('#hora_final').val(),
                                };

                                $.ajax({
                                    type: 'post',
                                    url: "{{ URL::to('admin/actualizarconfiguracion') }}",
                                    dataType: "json",
                                    data: {
                                        configuracion: oConfig,
                                        '_token': '{{ csrf_token() }}'
                                    },
                                    beforeSend: function (xhr) {
                                    }
                                }).done(function (dataRpta) {
                                    //alert(JSON.stringify(dataRpta));
                                    swal("Registrado!", "Registro correcto.", "success");
                                    //alert(dataRpta.message);
                                }).fail(function (jqXHR, textStatus) {
                                    console.log(jqXHR);
                                    alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
                                }).always(function () {
                                    //cerrarProgreso();
                                });
                            }


</script>
@stop
