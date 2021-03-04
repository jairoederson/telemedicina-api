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

@stop
{{-- Page content --}}
@section('content')

<section class="content-header section-header">
    <!--section starts-->
    <div class="row">
        <div class="col-md-8">
            <h4 class="header-title">Preguntas </h4>
        </div>
        <div class="col-md-3">
            <div class="text-right" style="padding-top: 5px; padding-right: 5px">
<a href="{{ URL::to('admin/preguntareg') }}"><button type="button" class="format btn btn-format">Agregar Pregunta </button></a>
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
        <div class="panel panel-primary ">
            <!-- <div class="panel-heading">
                <h4 class="panel-title"><i class="livicon" data-name="user" data-size="16" data-loop="true"
                                           data-c="#fff" data-hc="white"></i>
                    Laboratorios
                </h4>
            </div> -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered width100" id="tablePregunta">
                        <thead>
                            <tr class="filters">                                
                                <th>Pregunta</th>
                                <th>Respuesta</th>
                                <th style="width: 10%">Categoria</th>
                                <th style="width: 10%">Frecuente</th>
<!--                                <th style="width: 10%">Estado</th>-->
<!--                                <th>Fecha Registro</th>-->
                                <th style="width: 10%">Acciones</th>
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
    $('#menuPreguntas').addClass("active");
    });
                        $(function () {
                            var tablePreguntas = $('#tablePregunta').DataTable({
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
                                    { "data": "question" },
                                    { "data": "answer" },
                                    { "data": "categoria" },
                                    { "data": "frecuencia" },
//                                    { "data": "estado" },
                                    //{ "data": "created_at" },
                                    { "data": "acciones" }
                                ]
                            });


                        });
listarPreguntas();
function listarPreguntas() {
    $.ajax({
        type: 'post',
        url: "{{ URL::to('admin/listarpregunta') }}",
        dataType: "json",
        data: {'_token': '{{ csrf_token() }}'},
        beforeSend: function (xhr) {
            //progreso();
        }
    }).done(function (dataRpta) {
        //alert(JSON.stringify(dataRpta));
        $('#tablePregunta').DataTable().clear().draw();
        jQuery.each(dataRpta, function (i, val) {
            
            val.acciones = `
                    <div class='text-center'>
                    <button title='Editar' onclick="location.href='/admin/preguntaact/` + val.id + 
                        `'" class='btn-crud btn btn-format'>
                      <span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
                    </button>                                      
                    <button onclick="eliminar(` + val.id + `)" title='Eliminar' class='btn-crud btn color-red'>
                      <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
                    </button>
                    </div>`;
            $('#tablePregunta').DataTable().row.add(val).draw();
        });


    }).fail(function (jqXHR, textStatus) {
        alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
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
        eliminarCategoria(id);
        swal("Eliminado!", "eliminacion correcta.", "success");
    });
}


function eliminarCategoria(id) {

    $.ajax({
        type: 'post',
        url: "{{ URL::to('admin/eliminarpregunta') }}",
        dataType: "json",
        data: {id: id, '_token': '{{ csrf_token() }}'},
        beforeSend: function (xhr) {
            //alert(id);
        }
    }).done(function (dataRpta) {
        listarPreguntas();
    }).fail(function (jqXHR, textStatus) {
        alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
    }).always(function () {
    });

}



</script>


@stop
