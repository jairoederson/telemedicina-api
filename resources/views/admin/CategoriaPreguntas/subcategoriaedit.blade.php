@php
    $idcategorias = $subcategoryQuestion->id;
    $category_id = $subcategoryQuestion->category_id;

@endphp
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
                <h1 class="header-title">Actualizar Categoria Pregunta</h1>
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
                                    <select id="cmbCategoria" class="form-control " style="font-size: 14px !important" required>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" @if($category->id==$category_id)selected @endif>{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Especialidad input-->
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label" for="telefono">Titulo</label>
                                    <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="titulo" name="titulo" type="text" class="format-input input-format form-control" required value="{{ $subcategoryQuestion->title }}">
                                </div>

                                <div class="form-group label-floating is-empty">
                                    <label class="control-label" for="direccion">Descripccion</label>
                                    <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="descripccion" name="descripccion" type="text" class="format-input input-format form-control" required value="{{ $subcategoryQuestion->description  }}">
                                </div>
                                <!--                            <div class="form-group label-floating is-empty">
                                                                <select id="cmbEstado" class="form-control " style="font-size: 14px !important" required>
                                                                    <option value="">Estado</option>
                                                                    <option value="1">Activo</option>
                                                                    <option value="0">Inactivo</option>
                                                                </select>
                                                            </div>-->


                                <button type="submit" class="format btn btn-responsive btn-verde" style="margin:5px !important;vertical-align: middle;">Guardar </button>
                                <br><br>
                            </div>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div>
    </section>




@stop

{{-- page level scripts --}}
@section('footer_scripts')

    <script>
        $(function () {
            $('#menuPreguntas').addClass("active");
            $("div").removeClass("is-empty");
        });




        $("#formRegistrar").submit(function () {
            Registrar();
            return false;
        });

        function obtenerCategoria(id) {
            $.ajax({
                type: 'post',
                url: "{{ URL::to('admin/obtenersubcategoria') }}",
                dataType: "json",
                data: {
                    idcategoria:id,
                    '_token': '{{ csrf_token() }}'
                },
                beforeSend: function (xhr) {
                }
            }).done(function (dataRpta) {

                //alert(JSON.stringify(dataRpta));

                $('#titulo').val(dataRpta.categoria.title);
                $('#descripccion').val(dataRpta.categoria.description);
                //$('#cmbEstado').val(dataRpta.categoria.state);
                $("div").removeClass("is-empty");
            }).fail(function (jqXHR, textStatus) {
                alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
            }).always(function () {
            });
        }


        function Registrar() {

            var categoria = {
                id: '{!! $idcategorias !!}',
                title: $('#titulo').val(),
                description: $('#descripccion').val(),
                category_id: $('#cmbCategoria').val()
                //state: $('#cmbEstado').val()
            };

            $.ajax({
                type: 'post',
                url: "{{ URL::to('admin/registrarsubcategoria') }}",
                dataType: "json",
                data: {
                    categoria: categoria,
                    '_token': '{{ csrf_token() }}'
                },
                beforeSend: function (xhr) {
                }
            }).done(function (dataRpta) {
                swal("Actualizado!", "Actualización Correcta.", "success");


            }).fail(function (jqXHR, textStatus) {
                alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
            }).always(function () {
                //cerrarProgreso();
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
