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
        <div class="col-md-9">
            <h4 class="header-title">  Ver Receta</h4>
        </div>

        <div class="col-md-12">
            <div class="row border-bottom">
                <div class="col-md-2">
                    <img src="{{ asset('assets/images/paciente2.jpg') }}" alt="" width="80px">
                </div>
                <div class="col-md-4">
                    <h4><b>Paciente</b></h4>
                    <h5><b>Elvira Olivarez Santiago</b></h5>
                    <h5>Edad 25 años</h5>


                </div>
                <div class="col-md-2">
                    <img src="{{ asset('assets/images/medico.png') }}" alt="" width="80px">
                </div>
                <div class="col-md-4">
                    <h4><b>Médico</b></h4>
                    <label><b>Juan Perez Olivarez</b></label>
                    <label>Médico General</label>

                </div>
            </div>
            <br>
            <div class="row">
                <ul class="nav nav-tabs tabs-li" style="width:100%">
                    <li class="col-md-3 active">
                        <a href="#recetaGeneral" data-toggle="tab" aria-expanded="false">General<div class="ripple-container"></div></a>
                    </li>
                    <li class="col-md-3">
                        <a href="#recetaConsulta" data-toggle="tab" aria-expanded="false">Consulta<div class="ripple-container"></div></a>
                    </li>
                    <li class="col-md-3">
                        <a href="#recetaReceta" data-toggle="tab" aria-expanded="false">Receta<div class="ripple-container"></div></a>
                    </li>
                    <li class="col-md-3">
                        <a href="#recetaNota" data-toggle="tab" aria-expanded="false">Notas<div class="ripple-container"></div></a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div id="recetaGeneral" class="tab-pane fade active in">
                    <div class="items-cv">
                        <!-- formacion academica -->
                        <div class="row">
                            <ol>
                                <li> <b>Codigo: </b> <label>555858</label> </li>
                                <li> <b>Analisis: </b> <label>Glucosa</label> </li>
                                <li> <b>Fecha: </b> <label>05/08/2018</label> </li>
                                <li> <b>Precio: </b> <label>S/.30.00</label> </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div id="recetaConsulta" class="tab-pane ">
                    <div class="items-cv">
                        <div class="row">
                        
                      <div class="col-md-6">
                        <label class="nota-title"><b>Sintomas</b></label>
                        <ol class="">
                            <li>Dolor de cabeza</li>
                            <li>Mareos</li>
                            <li>Malestar General</li>
                        </ol>
                      </div>
                            <div class="col-md-6">
                                <label class="nota-title"><b>Fecha :12-05-2018 12:12</b></label>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label" for="notaContenido">Descripcion</label>
                                    <textarea  onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" 
                                               class="form-control" id="notaContenido" maxlength="500" name="notaContenido" rows="3"></textarea>
                                </div>
                            </div>
                  

<!--                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <div class="row" onclick="consulta1()">
                                            <div class="col-md-11">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#sintoma1" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                                    <h5 style="color: #000000">Dolor de cabeza</h5>
                                                </a>
                                            </div>
                                            <div class="col-md-1" style="padding-top: 10px">
                                                <span id="icoCD1" class="glyphicon glyphicon-triangle-bottom" style="display: block;color: #9f9f9f" aria-hidden="true"></span>
                                                <span id="icoCU1" class="glyphicon glyphicon-triangle-top" style="display: none;color: #9f9f9f" aria-hidden="true"></span>

                                            </div>
                                        </div>
                                    </div>
                                    <div id="sintoma1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <div class="row" onclick="consulta2()">
                                            <div class="col-md-11" >
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#sintoma2" aria-expanded="false" aria-controls="collapseTwo">
                                                    <h5 style="color: #000000">
                                                        Fiebre
                                                    </h5>
                                                </a>
                                            </div>
                                            <div class="col-md-1">
                                                <span id="icoCD2" class="glyphicon glyphicon-triangle-bottom" style="display: block;color: #9f9f9f" aria-hidden="true"></span>
                                                <span id="icoCU2" class="glyphicon glyphicon-triangle-top" style="display: none;color: #9f9f9f" aria-hidden="true"></span>

                                            </div>
                                        </div>
                                    </div>
                                    <div id="sintoma2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">
                                        <div class="panel-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingThree">
                                        <div class="row" onclick="consulta3()">
                                            <div class="col-md-11" >
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#sintoma3" aria-expanded="false" aria-controls="collapseThree">
                                                    <h5 style="color: #000000">tos seca</h5>
                                                </a>
                                            </div>
                                            <div class="col-md-1">
                                                <span id="icoCD3" class="glyphicon glyphicon-triangle-bottom" style="display: block;color: #9f9f9f" aria-hidden="true"></span>
                                                <span id="icoCU3" class="glyphicon glyphicon-triangle-top" style="display: none;color: #9f9f9f" aria-hidden="true"></span>

                                            </div>
                                        </div>
                                    </div>
                                    <div id="sintoma3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">
                                        <div class="panel-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                        </div>
                    </div>
                </div>
                <div id="recetaReceta" class="tab-pane  ">
                    <div class="items-cv">
                        <div class="row">
                            <h4> <b>Medicamentos</b> </h4>

                            <div class="col-md-6">
                            <ol class="">
                                <li>Panadol - 3 veces al dia  x 5 dias</li>
                                <li>Antigripal - 1 veces al dia  x 5 dias</li>
                                <li>Doloflan -  1 veces al dia x 5 dias</li>
                            </ol>
                          </div>

                        </div>
                    </div>
                </div>
                <div id="recetaNota" class="tab-pane fade">
                    <div class="doc-postulantes">
                        <label class="nota-title"><b>Nueva Nota</b></label>
                        <div class="row">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label" for="notaContenido">Escriba una nota de la receta</label>
                                <textarea  onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" class="form-control" id="notaContenido" maxlength="500" name="notaContenido" rows="3"></textarea>
                            </div>
                            <div class="text-right">
                                <button type="submit" onclick="guardarNota()" class="format btn btn-responsive btn-verde" style="margin:5px !important;vertical-align: middle;">Guardar Nota</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="nota-title"><b>Mis Notas</b></label>
                            <ol id="misNotas" class="">
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>





</section>




@stop

{{-- page level scripts --}}
@section('footer_scripts')

<script>
    var FormDropzone = function () {
        return {
            //main function to initiate the module
            init: function () {
                Dropzone.options.myDropzone = {
                    init: function () {
                        this.on("success", function (file, responseText) {
                            var obj = jQuery.parseJSON(responseText);
                            file.id = obj.id;
                            file.filename = obj.filename;
                            // Create the remove button
                            var removeButton = Dropzone.createElement("<button style='margin: 10px 0 0 15px;'>Remove file</button>");

                            // Capture the Dropzone instance as closure.
                            var _this = this;

                            // Listen to the click event
                            removeButton.addEventListener("click", function (e) {
                                // Make sure the button click doesn't submit the form:
                                e.preventDefault();
                                e.stopPropagation();

                                $.ajax({
                                    url: "file/delete",
                                    type: "DELETE",
                                    data: {"id": file.id, "_token": '{{ csrf_token() }}'}
                                });
                                // Remove the file preview.
                                _this.removeFile(file);
                            });

                            // Add the button to the file preview element.
                            file.previewElement.appendChild(removeButton);

                        });

                    }
                }
            }
        };
    }();
    jQuery(document).ready(function () {

        FormDropzone.init();
    });
</script>

<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/js/frontend/admin/usuario.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/dropzone/js/dropzone.js') }}" ></script>

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
