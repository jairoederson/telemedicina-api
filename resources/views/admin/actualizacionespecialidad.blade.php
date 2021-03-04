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
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

<link type="text/css" href="{{ asset('assets/vendors/bootstrap-multiselect/css/bootstrap-multiselect.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/selectize/css/selectize.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet" />
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
            <h1 class="header-title">Actualizacion Especialidades</h1>
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

          
                        <div id="usuarioSistema" class="panelcambio" style="display: block">
                            <form id="formRegistrarEspecialidad">

                                <div class="form-group label-floating is-empty">
                                    <label class="control-label" for="nombres">Nombre</label>
                                    <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="nombres" name="nombres" type="text" class="format-input input-format form-control" required>
                                </div>
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label" for="descripcion">Descripcion</label>
                                    <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="descripcion" name="descripcion" type="text" class="format-input input-format form-control" required>
                                </div>
                                <button type="submit" class="format btn btn-responsive btn-format" style="margin:5px !important;vertical-align: middle;">Guardar </button>
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
    obtenerEspecialidad('{!! $idespecialidades!!}');

    $("#formRegistrarEspecialidad").submit(function () {
        ActualizarEspecialidad();
        return false;
    });
    function ActualizarEspecialidad() {

var oespecialidad = {
    id: '{!! $idespecialidades!!}',
    name: $('#nombres').val(),
    description: $('#descripcion').val()
}
$.ajax({
    type: 'post',
    url: "{{ URL::to('admin/modificarespecialidad') }}",
    dataType: "json",
    data: {
        especialidad: oespecialidad,
        '_token': token
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

function obtenerEspecialidad(idespecialidad) {

$.ajax({
    type: 'post',
    url: "{{ URL::to('admin/obtenerespecialidad') }}",
    dataType: "json",
    data: {
      idespecialidad: idespecialidad,
        '_token': token
    },
    beforeSend: function (xhr) {
    }
}).done(function (dataRpta) {
    //alert(JSON.stringify(dataRpta));
    $('#nombres').val(dataRpta.especialidad.name);
    $('#descripcion').val(dataRpta.especialidad.description);
    $("div").removeClass("is-empty");    
}).fail(function (jqXHR, textStatus) {
    alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
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

@stop