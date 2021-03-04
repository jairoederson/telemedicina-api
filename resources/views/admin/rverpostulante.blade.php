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
            <h4 class="header-title">Perfil Postulante</h4>
        </div>

        <div class="col-md-12">
            <!--  -->
              <div class="row">
                <div class="col-md-4 text-center">
                  <img src="{{ asset('assets/images/doctor.jpg') }}" class="img-form" alt="" width="130px">
                </div>
                <div class="col-md-8">
                  <h4><b>Ricardo Santiago Quispe</b></h4>
                  <label for=""><b>Correo: </b></label>
                  <label for="">ricardo@email.com</label><br>
                  <label for=""><b>Edad: </b></label>
                  <label for="">32 años</label><br>
                  <label for=""><b>Telefono: </b></label>
                  <label for="">985854545</label><br>
                  <label for=""><b>Domicilio: </b></label>
                  <label for="">Av. perez de cuellar Nro. 454</label>
                </div>
              </div>
              <br>
              <div class="row">
                <ul class="nav nav-tabs tabs-li" style="width:100%">
                    <li class="col-md-3 active">
                        <a href="#postulanteInfo" data-toggle="tab" aria-expanded="false">Info. Personal<div class="ripple-container"></div></a>
                    </li>
                    <li class="col-md-3">
                      <a href="#postulanteInfoProf" data-toggle="tab" aria-expanded="false">Info. Profesional<div class="ripple-container"></div></a>
                    </li>
                    <li class="col-md-3">
                      <a href="#postulanteDoc" data-toggle="tab" aria-expanded="false">Documentos<div class="ripple-container"></div></a>
                    </li>
                    <li class="col-md-3">
                      <a href="#postulanteNota" data-toggle="tab" aria-expanded="false">Notas<div class="ripple-container"></div></a>
                    </li>
                </ul>
              </div>
              <div class="tab-content">
                <div id="postulanteInfo" class="tab-pane fade active in">
                  <div class="items-cv">
                    <!-- formacion academica -->
                    <div class="row">
                      <h4><b>Datos Personales</b></h4>
                      <ol>
                        <li> <b>Nombre Completo: </b> <label>Ricardo Santiago Quispe</label></li>
                        <li> <b>correo: </b> <label>ricardo@email.com</label></li>
                        <li> <b>Linked In: </b> <a href="https://www.linkedin.com">Ricardo S.</a></li>
                        <li> <b>DNI: </b> <label>78545854</label> </li>
                        <li> <b>Dirección: </b> <label>78545854</label> </li>
                        <li> <b>Departamento: </b> <label>Lima</label> </li>
                        <li> <b>Provincia: </b> <label>Lima</label>  </li>
                        <li> <b>Distrito: </b> <label>Lima</label>  </li>
                        <li> <b>Fecha Nacimiento: </b> <label>12/05/1980</label> </li>

                      </ol>
                    </div>

                  </div>
                </div>
                <div id="postulanteInfoProf" class="tab-pane fade">
                  <div class="items-cv">
                    <!-- formacion academica -->
                    <div class="row">
                      <h4><b>Formación académica</b></h4>
                      <ol>
                        <li><label>Universidad Mayor de San Marcos</label></li>
                        <li><label>Instituto Médico de Pediatría</label></li>
                      </ol>
                    </div>
                    <!-- formacion academica end -->
                    <!-- experiencia profesional -->
                    <div class="row">
                      <h4><b>Experiencia Profesional</b></h4>
                      <ol>
                        <li>Hospital Basadre (2 años)</li>
                        <li>Acitvidad: Atención al paciente, Consultas</li>
                        <li>Medico pediatra</li>
                        <br>
                        <li>Clinica Nazareno (3 años)</li>
                        <li>Acitvidad: Atención al paciente, Consultas</li>
                        <li>Medico pediatra</li>
                      </ol>
                    </div>
                    <!-- experiencia profesional end -->
                    <!-- especialidades -->
                    <div class="row">
                      <h4><b>Especialidades</b></h4>
                      <ol>
                        <li>Medicina General</li>
                        <li>Pediatria</li>
                      </ol>
                    </div>
                    <!-- especialidades end -->
                  </div>
                </div>
                <div id="postulanteDoc" class="tab-pane fade">
                  <div class="doc-postulantes">
                    <div class="row">
                      <div class="col-md-4 text-center">
                        <label for=""><b>CV</b></label><br>
                        <img src="{{ asset('assets/images/file.png') }}" alt="" width="100px"><br>
                        <button type="button" class="btn btn-verde" title="Descargar" name="button"><span class="glyphicon glyphicon-save" aria-hidden="true"></span></button>
                        <button type="button" class="btn btn-verde" title="Ver" name="button"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>

                      </div>
                      <div class="col-md-4 text-center">
                        <label for=""><b>Certificado</b></label>
                        <img src="{{ asset('assets/images/file.png') }}" alt="" width="100px"><br>
                        <button type="button" class="btn btn-verde" title="Descargar" name="button"><span class="glyphicon glyphicon-save" aria-hidden="true"></span></button>
                        <button type="button" class="btn btn-verde" title="Ver" name="button"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>

                      </div>
                      <div class="col-md-4 text-center">
                        <label for=""><b>Estudio Psicológico</b></label>
                        <img src="{{ asset('assets/images/file.png') }}" alt="" width="100px"><br>
                        <button type="button" class="btn btn-verde" title="Descargar" name="button"><span class="glyphicon glyphicon-save" aria-hidden="true"></span></button>
                        <button type="button" class="btn btn-verde" title="Ver" name="button"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>

                      </div>
                    </div>
                  </div>

                </div>
                <div id="postulanteNota" class="tab-pane fade">
                  <div class="doc-postulantes">
                    <label class="nota-title"><b>Nueva Nota</b></label>
                    <div class="row">
                      <div class="form-group label-floating is-empty">
                          <label class="control-label" for="notaContenido">Escriba una nota del postulante</label>
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
