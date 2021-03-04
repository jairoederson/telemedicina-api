@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Activity Log
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}"/>
<!-- <link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css"/> -->
<!-- <link rel="stylesheet" href="{{ asset('assets/css/pages/only_dashboard.css') }}"/> -->

@stop

{{-- Page content --}}
@section('content')
<style>
    .section-header {
        /*margin-top: 0px !important;*/ 
    }
</style>


<section class="content-header section-header">
    <div class="row">
        <div class="col-md-12">
            <h4 class="header-title">Log - Actividades</h4>
        </div>
    </div>

</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row" style="margin-right: -30px;margin-left: -30px">
        <div class="panel panel-primary ">


            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered width100" id="tableLog" >
                        <thead>
                            <tr class="filters">
                                <th>Usuario Ejecucion</th>
                                <th>Accion</th>
<!--                                <th>Tabla</th>-->
                                <th>Usuario Afectado</th>
                                <th>Fecha y Hora</th>

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


@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">

$(function () {
    $('#menuLog').addClass("active");
    
var tablePagos = $('#tableLog').DataTable({
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
        {"data": "us_accion"},
        {"data": "action"},
        //{"data": "table_name"},
        {"data": "us_afectado"},
        {"data": "created_at"}
    ]


});
});


listarLog();
function listarLog() {
$.ajax({
    type: 'post',
    url: "{{ URL::to('admin/listarlog') }}",
    dataType: "json",
    data: {'_token': '{{ csrf_token() }}'},
    beforeSend: function (xhr) {
        //progreso();
    }
}).done(function (dataRpta) {
    //alert(JSON.stringify(dataRpta));
    $('#tableLog').DataTable().clear().draw();
    jQuery.each(dataRpta, function (i, val) {

        $('#tableLog').DataTable().row.add(val).draw();
    });


}).fail(function (jqXHR, textStatus) {
    alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
}).always(function () {
    //cerrarProgreso();
});
}

</script>
@stop
