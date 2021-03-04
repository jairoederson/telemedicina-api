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
                <h1 class="header-title">Sub Categoria Pregunta </h1>
            </div>
            <div class="col-md-3">
                <div class="text-right" style="padding-top: 5px; padding-right: 5px">

                    <a href="{{ URL::to('admin/subcategoriapregunta/create') }}"><button type="button" class="format btn btn-format">Agregar Sub Categoria Pregunta</button></a>
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
                        <table class="table table-bordered width100" id="tableCategoria">
                            <thead>
                            <tr class="filters">
                                <th>Titulo</th>
                                <th>Descripciòn</th>
                                <!--                                <th>Estado</th>-->
                                <th>Fecha Registro</th>
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
            var tableCategorias = $('#tableCategoria').DataTable({
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
                    {"data": "title"},
                    {"data": "description"},
//            {"data": "estado"},
                    {"data": "created_at"},
                    {"data": "acciones"}
                ]
//                                "data": [
//                                    [
//                                        "1",
//                                        "Juan Perez Olviedo",
//                                        "Lima",
//                                        "Jr Tupac amaru 223",
//                                        "12/05/2017",
//                                        acciones
//                                    ]
//                                ]
            });
//
//                            $('#tableCategoria tbody').on('click', 'button#btnEliminarLaboratorio', function () {
//                                var table = $(this);
//                                $("#eliminarLaboratorio").modal();
//                                $("#btnEliminarLaboratorioSi").on('click', function () {
//                                    tableCategorias
//                                            .row(table.parents('tr'))
//                                            .remove()
//                                            .draw();
//                                })
//                            });


        });
        listarCategorias();
        function listarCategorias() {
            $.ajax({
                type: 'post',
                url: "{{ URL::to('admin/listarsubcategoriapregunta') }}",
                dataType: "json",
                data: {'_token': '{{ csrf_token() }}'},
                beforeSend: function (xhr) {
                    //progreso();
                }
            }).done(function (dataRpta) {
                //alert(JSON.stringify(dataRpta));
                $('#tableCategoria').DataTable().clear().draw();
                jQuery.each(dataRpta, function (i, val) {

                    val.acciones = `
                    <div class='text-center'>
                    <button title='Editar' onclick="location.href='/admin/subcategoriapregunta/` + val.id +
                        `/edit'" class='btn-crud btn' style='background-color: #868686'>
                      <span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
                    </button>
                    <button onclick="eliminar(` + val.id + `)" title='Eliminar' class='btn-crud btn color-red'>
                      <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
                    </button>
                    </div>`;
                    $('#tableCategoria').DataTable().row.add(val).draw();
                });


            }).fail(function (jqXHR, textStatus) {
                //alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
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
                url: "{{ URL::to('admin/eliminarsubcategoria') }}",
                dataType: "json",
                data: {id: id, '_token': '{{ csrf_token() }}'},
                beforeSend: function (xhr) {
                    //alert(id);
                }
            }).done(function (dataRpta) {
                listarCategorias();
            }).fail(function (jqXHR, textStatus) {
                alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
            }).always(function () {
            });

        }

    </script>


@stop
