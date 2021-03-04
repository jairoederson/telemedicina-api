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
            <h4 class="header-title">Ver Pagos y Liquidaciones</h4>
        </div>

        <div class="col-md-12">

            <div class="row border-bottom">

                  <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/images/asociado01.jpeg') }}" class="img-form" alt="" width="80px">
                  </div>
                  <div class="col-md-10">
                    <h4><b>Inmoviliaria Robles SAC.</b></h4>
                    <label><b>RUC: </b>258545252525</label><br>
                    <label><b>Contacto: </b>Juan Perez Olivarez</label><br>
                    <label><b>Telefono: </b>(01) 425541</label><br>
                    <label><b>Correo</b>robles@coorporacion.com</label>
                  </div>
                </div>
                <div class="row">
                  <ul class="nav nav-tabs tabs-li" style="width: 100%">

                    <li class="col-md-4 active">
                      <a href="#pagGeneralEmpresa" data-toggle="tab" aria-expanded="false">General<div class="ripple-container"></div></a>
                    </li>
                    <li class="col-md-4">
                      <a href="#historialPagos" data-toggle="tab" aria-expanded="false">Historial<div class="ripple-container"></div></a>
                    </li>

                    <li class="col-md-4">
                      <a href="#pagNotaEmpresa" data-toggle="tab" aria-expanded="false">Notas<div class="ripple-container"></div></a>
                    </li>

                  </ul>
                </div>
                <div class="tab-content">
                  <div id="pagGeneralEmpresa" class="tab-pane fade active in">

                    <div class="items-cv">
                      <!-- formacion academica -->
                      <div class="row">
                        <h4><b>General</b></h4>
                        <ol>
                          <li><b>Monto: </b> S/. <label> 2000.00</label> </li>
                          <li><b>Concepto: </b> <label> Servicios en el Área de Medicina General</label> </li>
                          <li><b>Fecha de Pago: </b> <label> 30/10/2018</label> </li>
                        </ol>
                      </div>

                    </div>
                  </div>
                    
                     <div id="historialPagos" class="tab-pane fade ">
                        <div class="table-responsive">
                            <table class="table table-bordered width100" id="tablePaciente" >
                                <thead>
                                <tr class="filters">
                                  <th>Id</th>
                                  <th>Monto</th>
                                  <th>Concepto</th>
                                  <th>Usuario</th>
                                  <th>Fecha </th>
                                  <th>Acciones </th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                  <div id="pagNotaEmpresa" class="tab-pane fade">
                    <div class="doc-postulantes">
                      <label class="nota-title"><b>Nueva Nota</b></label>
                      <div class="row">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label" for="notaContenido">Escriba una nota del pago</label>
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
    
    var acciones = `
<div class='text-center'>
  <button id='btnEliminarMedico' title='Eliminar' class='delete btn-crud btn color-red'>
    <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
  </button>
</div>`;
        
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
</script>
    <script type="text/javascript">
        
        $(function() {
          var tablePagos = $('#tablePaciente').DataTable({
            "language": {
                "sProcessing":    "Procesando...",
                "sLengthMenu":    "Mostrar _MENU_ registros",
                "sZeroRecords":   "No se encontraron resultados",
                "sEmptyTable":    "Ningún dato disponible en esta tabla",
                "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":   "",
                "sSearch":        "Buscar:",
                "sUrl":           "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":    "Último",
                    "sNext":    "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            },
            "data": [
              [
                "1",
                "2000",
                "pago",
                "Empresa",
                "02/05/2018 ",
                acciones
              ],
              [
                "2",
                "2000",
                "pago",
                "Empresa",
                "03/05/2018 ",
                acciones
              ],
              [
                "3",
                "2000",
                "pago",
                "Empresa",
                "03/05/2018",
                acciones
              ]
            ]

          });
      });

    </script>
@stop
