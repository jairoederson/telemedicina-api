@php
    $companies = \App\Company::all();
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
                <h1 class="header-title">Registro pago</h1>
            </div>

        </div>

    </section>

    <!-- Main content -->
    <section class="content paddingleft_right15 ">
        <div class="row" style="margin-right: -30px;margin-left: -30px">
            <div class="panel panel-primary ">
                <div id="notific">
                    @include('notifications')
                </div>
                <fieldset>
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <div id="usuarioSistema" class="panelcambio" style="display: block">
                                <form id="formRegistrarPago" action="{{ route('admin.pagos.empresa.store') }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <fieldset>

                                        <div class="col-md-12">
                                            <!-- Name input-->
                                            <div class="form-group label-floating is-empty">
                                                <select id="company_id" name="company_id" class="form-control " style="font-size: 14px !important" required>
                                                    <option value="">Seleccione Empresa</option>
                                                    @foreach($companies as $company)
                                                    <option value="{{ $company->id }}">{{ $company->name." - Ruc: ".$company->ruc }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <!-- Name input-->
                                            <div class="form-group label-floating is-empty">
                                                <select id="anio" name="year" class="form-control " style="font-size: 14px !important" required>
                                                    <option value="">Seleccione Año</option>
                                                    <option value="2019">2019</option>
                                                    <option value="2020">2020</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                </select>
                                            </div>
                                            <!-- Apellidos input -->
                                            <div class="form-group label-floating is-empty">
                                                <select id="mes" name="month" class="form-control " style="font-size: 14px !important" required>
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
                                                <input  onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="monto" name="amount" type="text" readonly="" class="format-input input-format form-control" required>
                                            </div>
                                            <div class="form-group label-floating is-empty">
                                                <button id="btnGenerarMonto" type="button" class="format btn btn-responsive btn-format" style="margin:5px !important;vertical-align: middle;">Generar Monto Pago</button>
                                            </div>

                                            <!-- email -->
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="line-height: 150px;"></div>
                                                <div>
                                                <span class="btn btn-primary btn-file">
                                                    <span class="fileinput-new">Select voucher</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="hidden" value="" name="..."><input type="file" name="voucher">
                                                <div class="ripple-container"></div></span>
                                                    <a href="#" class="btn btn-primary fileinput-exists" data-dismiss="fileinput">Remove<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: 28.7344px; top: 24px; background-color: rgb(255, 255, 255); transform: scale(10.625);"></div></div></a>
                                                </div>
                                            </div>

                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label" for="email">Concepto</label>
                                                <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="conceptoPago" type="text" class="format-input input-format form-control" name="payment_description">
                                            </div>


                                        </div>
                                        <button type="submit" class="format btn btn-responsive btn-format" style="margin:5px !important;vertical-align: middle;">Guardar </button>
                                    </fieldset>
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

        $(document).ready(function () {

        });

        $('#btnGenerarMonto').click(function () {
            generaMontoPago();
        });


        function generaMontoPago() {
            $.ajax({
                type: 'post',
                url: "{{ URL::to('admin/generar/pagos/empresa') }}",
                dataType: "json",
                data: {
                    company_id: $('#company_id').val(),
                    mes:$('#mes').val(),
                    anio:$('#anio').val(),
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

    </script>

    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    {{-- <script type="text/javascript" src="{{ asset('assets/js/frontend/admin/registroUsuario.js')}}"></script> --}}
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