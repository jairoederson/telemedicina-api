@php
    $idconsultas = $consulta->id;
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
            <h4 class="header-title">Ver consulta</h4>
        </div>

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/images/paciente2.jpg') }}" class="img-form" alt="" width="80px">
                </div>
                <div class="col-md-4">
                    <h4><b>Paciente</b></h4>
                    <h5 id="lbPaciente"></h5>
                    <!--                    <h5>32 años</h5>-->


                </div>
                <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/images/doctor.jpg') }}" alt="" class="img-form" width="80px">
                </div>
                <div class="col-md-4">
                    <h4><b>Medico</b></h4>
                    <label id="lbMedico">Juan Perez Olivarez</label>
                    <!--                    <label>Medicina General</label>-->

                </div>
            </div>
            <br>
            <div class="row">
                <ul class="nav nav-tabs tabs-li" style="width: 100%">

                    <li class="col-md-3 active">
                        <a href="#consultaGeneral" data-toggle="tab" aria-expanded="false">General<div class="ripple-container"></div></a>
                    </li>
                    <li class="col-md-3 ">
                        <a href="#consultaReprogramacion" data-toggle="tab" aria-expanded="false">Reprogramacion<div class="ripple-container"></div></a>
                    </li>
                    <li class="col-md-3">
                        <a href="#consultaConversacion" data-toggle="tab" aria-expanded="false">Conversacion<div class="ripple-container"></div></a>
                    </li>

                    <li class="col-md-3">
                        <a href="#consultaGrab" data-toggle="tab" aria-expanded="true">Grabacion<div class="ripple-container"></div></a>
                    </li>

                    <li class="col-md-3">
                        <a href="#consultaNotas" data-toggle="tab" aria-expanded="true">Notas<div class="ripple-container"></div></a>
                    </li>
                </ul>
            </div>
            <br>
            <div class="tab-content">

                <div id="consultaGeneral" class="margin-bottom tab-pane fade active in">

                    <div class="row generalCont1">
                        <div class="col-md-3">
                            <div class="text-center">
                                <label class="text-center"><b>Fecha</b></label>
                            </div>
                            <div class="text-center">
                                <label for="" id="lbFecha">05/08/2018</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center">
                                <label for="" ><b>Duracion</b> </label>
                            </div>
                            <div class="text-center">
                                <label for="" id="lbDuracion">15 minutos</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center">
                                <label for="" ><b>Horario</b> </label>
                            </div>
                            <div class="text-center">
                                <label for="" id="lbHorario">12:00</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center">
                                <label for=""><b>Precio</b></label>
                            </div>
                            <div class="text-center">
                                <label for="" id="lbPrecio">S/. 5.00</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center">
                                <label for=""><b>Modalidad</b></label>
                            </div>
                            <div class="text-center">
                                <label for="" id="lbModalidad">Online</label>
                            </div>
                        </div>
                        <!--                      <div class="col-md-3">
                                                <div class="text-center">
                                                  <label for=""><b>Modo</b></label>
                                                </div>
                                                <div class="text-center">
                                                  <label for="">App - Web</label>
                                                </div>
                                              </div>-->
                    </div>
                    <div class="generalCont2">
                        <div class="row">
                            <h5><b>Sintoma del paciente</b></h5>
                            <p id="lbSintomas">Dolor de cabeza, nauceas, diarrea</p>
                        </div>
                        <div class="row">
                            <h5><b>Mensaje del paciente</b></h5>
                            <p id="lbMensaje">Doctor me siento mal tengo nauceas y diarrea y me duele mucho la
                                cabeza, por favor ayudeme, que puedo hacer para evitar el malestar. </p>
                        </div>
                        <!--                      <div class="row">
                                                <h5><b>Calificacion del cliente</b></h5>
                                                <div class='text-left'>
                                                    <span class='glyphicon glyphicon-star' aria-hidden='true' style='color: #f1c420; font-size: 20px;'></span> &nbsp;
                                                    <span class='glyphicon glyphicon-star' aria-hidden='true' style='color: #f1c420; font-size: 20px;'></span>&nbsp;
                                                    <span class='glyphicon glyphicon-star' aria-hidden='true' style='color: #f1c420; font-size: 20px;'></span>&nbsp;
                                                    <span class='glyphicon glyphicon-star' aria-hidden='true' style='color: #f1c420; font-size: 20px;'></span>&nbsp;
                                                    <span class='glyphicon glyphicon-star' aria-hidden='true' style='color: #f1c420; font-size: 20px;'></span>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <h5><b>Valoración</b></h5>
                                                <p> Excelente </p>
                                              </div>-->
                    </div>
                </div>
                <div id="consultaReprogramacion" class="tab-pane fade">
                    <div class="doc-reprogramacion" >
                        <div class="row"> 
                            <table class="table table-bordered width100" style="width: 100%" id="tableReprogramacion" >
                                <thead>
                                    <tr class="filters">
                                        
                                        <th>Fecha</th>
                                        <th>Dia</th>                                        
                                        <th>Hora </th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="consultaConversacion" class="margin-bottom margin-top tab-pane fade">
                    <div class="row">
                        @if (empty($chat))
                            <div class="col-md-12">
                            <div class="row">
                                <div class="message-chat">
                                    No hay mensajes
                                </div>
                            </div>
                            </div>
                            @else
                            @foreach($chat as $msg)
                                @php
                                    //$date = new DateTime();
                                    //$date = \Carbon\Carbon::parse($msg['fecha']->date);

                                @endphp
                                @if($msg['receptor'] == 1)
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4" style="">
                                                <div class="" style="background-color: #f5f5f5; padding-top: 3px; padding-bottom: 3px; border-radius: 10px 10px 10px 10px;">
                                                    <img class="img-chat" src="{{ asset('assets/images/paciente2.jpg') }}" alt="" width="30px;">
                                                    <label>{{ $msg['from'] }}</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">

                                            </div>
                                            <div class="col-md-4 text-right" style="padding-top: 10px;">
                                                <label id="time">{{ $msg['fecha']->format('Y-m-d H:i:s') }}</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="message-chat">
                                                {{ $msg['body'] }}
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="col-md-12 margin-top">
                                        <div class="row">
                                            <div class="col-md-4" style="padding-top: 10px;">
                                                <label id="tiempo">{{ $msg['fecha']->format('Y-m-d H:i:s') }}</label>
                                            </div>
                                            <div class="col-md-4">

                                            </div>
                                            <div class="col-md-4 text-right">
                                                <div class=""  style="background-color: #f5f5f5; padding-top: 3px; padding-bottom: 3px; border-radius: 10px 10px 10px 10px;">
                                                    <label>{{ $msg['from'] }}</label>
                                                    <img class="img-chat" src="{{ asset('assets/images/doctor.jpg') }}" alt="" width="30px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="message-chat">
                                                {{ $msg['body'] }}
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            @endforeach
                        @endif

                    </div>
                </div>

                <div id="consultaGrab" class="margin-bottom tab-pane fade text-center margin-top">
<div align="center">
    <button type="button" onclick="verVideos()" class="format btn btn-format">Cargar videos</button>
</div>
                    <div id="videos">
<div id="respuesta2" align="center" style="display: none">
    <img src="{{ asset('images/icon/load.gif') }}" alt="">
</div>
                    </div>

                </div>

                <div id="consultaNotas" class="tab-pane fade">
                    <div class="doc-postulantes">
                        <label class="nota-title"><b>Nueva Nota</b></label>
                        <div class="row">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label" for="notaContenido">Escriba una nota</label>
                                <textarea  onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" class="form-control" id="notaContenido" maxlength="500" name="notaContenido" rows="3"></textarea>
                            </div>
                            <div class="text-right">
                                <button type="submit" onclick="agregarNota()" class="format btn btn-responsive btn-verde" style="margin:5px !important;vertical-align: middle;">Guardar Nota</button>
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
        var tableP = $('#tableReprogramacion').DataTable({
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
            }
            ,
            "columns": [
                {"data": "date"},
                {"data": "diasemana"},
                {"data": "querytime"}
            ]
        });
        FormDropzone.init();
    });
    obtenerReprogramaciones('{!! $idconsultas!!}');
    function obtenerReprogramaciones(id) {
        $.ajax({
            type: 'post',
            url: "{{ URL::to('admin/obtenerreprogramaciones') }}",
            dataType: "json",
            data: {idconsultas: id, '_token': '{{ csrf_token() }}'},
            beforeSend: function (xhr) {
            }
        }).done(function (dataRpta) {

            $('#tableReprogramacion').DataTable().clear().draw();
            jQuery.each(dataRpta.reprogramacion, function (i, val) {

                $('#tableReprogramacion').DataTable().row.add(val).draw();
            });


        }).fail(function (jqXHR, textStatus) {
            alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
        }).always(function ()    {
        });
    }
    function convertirSeg(time){
        var minutes = Math.floor( time / 60 );
        var seconds = time % 60;

        //Anteponiendo un 0 a los minutos si son menos de 10 
        minutes = minutes < 10 ? '0' + minutes : minutes;

        //Anteponiendo un 0 a los segundos si son menos de 10 
        seconds = seconds < 10 ? '0' + seconds : seconds;

        var result = minutes + ":" + seconds;  // 161:30
        
        return result;
    }
    
    var urlObtenerAsociado = "{{ URL::to('admin/obtenerconsultas') }}";
    var token = '{{ csrf_token() }}';
    function listarAsociados() {
        $.ajax({
            type: 'post',
            url: urlObtenerAsociado,
            dataType: "json",
            data: {idconsulta:'{!! $idconsultas!!}', '_token': token},
            beforeSend: function (xhr) {
                //progreso();
            }
        }).done(function (dataRpta) {
            //alert(JSON.stringify(dataRpta.consulta));
            $('#lbPaciente').html(dataRpta.consulta.patient);
            $('#lbMedico').html(dataRpta.consulta.doctor);
            $('#lbDuracion').html(convertirSeg(dataRpta.consulta.duration));
            $('#lbFecha').html(dataRpta.consulta.date);
            $('#lbPrecio').html("S/. " + dataRpta.consulta.price);
            $('#lbModalidad').html(dataRpta.consulta.modalidad);
            $('#lbHorario').html(dataRpta.consulta.querytime);

            $('#lbSintomas').html(dataRpta.consulta.symptom);
            $('#lbMensaje').html(dataRpta.consulta.message);
            
            var notas = '';
            jQuery.each(dataRpta.notas, function (i, val) {
             
                 notas = notas + "<li> <label>" + val.body_note + "</label> </li>";
                
            });
            
            $('#misNotas').html(notas);

        }).fail(function (jqXHR, textStatus) {
            alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
        }).always(function () {
            //cerrarProgreso();
        });
    }
    listarAsociados();
    
    function agregarNota() {

        $.ajax({
            type: 'post',
            url: "{{ URL::to('admin/agregarnotaconsulta') }}",
            dataType: "json",
            data: {
                idconsulta:'{!! $idconsultas!!}',
                texto:$('#notaContenido').val(),
                '_token': '{{ csrf_token() }}'
            },
            beforeSend: function (xhr) {
                //alert(id);
            }
        }).done(function (dataRpta) {
            //alert(JSON.stringify(dataRpta));
            var notas = '';
            jQuery.each(dataRpta, function (i, val) {
             
                 notas = notas + "<li> <label>" + val.body_note + "</label> </li>";
                
            });
            
            $('#misNotas').html(notas);
            $('#notaContenido').val('');
            //alert(dataRpta.message);
        }).fail(function (jqXHR, textStatus) {
            alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
        }).always(function () {
        });

    }

    function verVideos() {

        $.ajax({
            type: 'post',
            url: "{{ URL::to('admin/get/videos/query') }}",
            /*dataType: "json",*/
            data: {
                query_id:'{!! $idconsultas!!}',
                '_token': '{{ csrf_token() }}'
            },
            beforeSend: function (xhr) {
                $("#respuesta2").show();
            }
        }).done(function (dataRpta) {
            $('#videos').html(dataRpta);
            $("#respuesta2").hide();
            //alert(dataRpta.message);
        }).fail(function (jqXHR, textStatus) {
            alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
        }).always(function () {
        });

    }

</script>

<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

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
