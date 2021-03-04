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
            <h1 class="header-title">Ver Laboratorio</h1>
        </div>
    </div>

</section>

<section class="content paddingleft_right15">
    <div class="row" style="margin-right: -30px;margin-left: -30px">
        <div class="panel panel-primary ">
            
                <fieldset>
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-2 text-center" id="divImagen">
            <!--                        <img src="{{ asset('assets/images/asociado01.jpeg') }}" class="img-form" alt="" width="110px">-->
                                </div>
                                <div class="col-md-8">
                                    <h4><b id="lblaboratorio">Inmobiliraria Robles SAC.</b></h4>
                                    <label for=""><b>Responsable: </b></label>
                                    <label for="" id="lbnombre">258545252525</label><br> 
                                    <label for=""><b>Telefono 1: </b></label>
                                    <label for="" id="lbtelefono">(01) 425541</label><br>
                                    <label for=""><b>Telefono 2: </b></label>
                                    <label for="" id="lbtelefonoExtra">(01) 425541</label><br>
                                    <label for=""><b>Domicilio Fiscal: </b></label>
                                    <label for="" id="lbdireccion">Av. javier prado nro. 2550</label><br>
                                    <label for=""><b>Mza Lte</b></label>
                                    <label for="" id="lbnumMzaLte">Av. javier prado nro. 2550</label>
                                </div>
                            </div>



                        </div>
                    </div>
                   
                    
                    <div class="col-md-12" style="padding:30px;">
                        <label for="" ><strong>Imagen la Laboratorio</strong></label>
                        {!! Form::open(array('url' => URL::to('admin/subirimagenlaboratorio/'.$idlaboratorios), 'method' => 'post', 'id'=>'myDropzone','class' => 'dropzone', 'files'=> true)) !!}
                        <div class="fallback">
                            <input name="file" type="file" multiple />                            
                        </div>
                        {!! Form::close() !!}
                    </div>
                   
                </fieldset>
            


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

    obtenerLaboratorio('{!! $idlaboratorios!!}');


    function obtenerLaboratorio(id) {
        $.ajax({
            type: 'post',
            url: "{{ URL::to('admin/obtenerlaboratorio') }}",
            dataType: "json",
            data: {
                idlaboratorio: id,
                '_token': '{{ csrf_token() }}'
            },
            beforeSend: function (xhr) {
            }
        }).done(function (dataRpta) {
            //alert(JSON.stringify(dataRpta));


            $('#lblaboratorio').html(dataRpta.laboratorio.name);
            $('#lbnombre').html(dataRpta.usuario.name + ' ' + dataRpta.usuario.last_name);
            $('#lbtelefono').html(dataRpta.laboratorio.telephone);
            $('#lbtelefonoExtra').html(dataRpta.laboratorio.telephone_aux);
            $('#lbdireccion').html(dataRpta.laboratorio.address);
            $('#lbnumMzaLte').html(dataRpta.laboratorio.address_extra_info);
            $('#divImagen').html('<img src="../../images/laboratories/' + dataRpta.laboratorio.url_image + '" class="img-form" alt="" width="150px">');
            $("div").removeClass("is-empty");
        }).fail(function (jqXHR, textStatus) {
            alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
        }).always(function () {
        });
    }
    
    jQuery(document).ready(function () {

        FormDropzone.init();
    });


    var FormDropzone = function () {
        return {
            //main function to initiate the module
            init: function () {
                Dropzone.options.myDropzone = {
                    init: function () {
                        this.on("success", function (file, responseText) {
                            var obj = jQuery.parseJSON(responseText);
                            //alert(obj.filename);
                            $('#divImagen').html('<img src="../../images/laboratories/' + obj.filename + '" class="img-form" alt="" width="150px">');

                            this.removeFile(file);

                        });

                    }
                }
            }
        };
    }();



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
