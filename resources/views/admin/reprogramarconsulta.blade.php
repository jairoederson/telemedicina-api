@php
    $idconsultas = $consulta->id;
    $pendientes= $consulta->pendientes;
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
<link href="{{ asset('assets/vendors/sweetalert/css/sweetalert.css') }}" rel="stylesheet" type="text/css" />

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
    .btnSelected{ background-color:green; } 
    .chip{
        padding: 5px;
    }
    
}

</style>
@stop

{{-- Page content --}}
@section('content')
<section class="content-header section-header">
    <div class="row">
        <div class="col-md-9">
            <h4 class="header-title">Reprogramar consulta</h4>
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
                    {{-- <li class="col-md-3">
                        <a href="#consultaConversacion" data-toggle="tab" aria-expanded="false">Conversacion<div class="ripple-container"></div></a>
                    </li> --}}

                    {{-- <li class="col-md-3">
                        <a href="#consultaGrab" data-toggle="tab" aria-expanded="true">Grabacion<div class="ripple-container"></div></a>
                    </li> --}}

                    {{-- <li class="col-md-3">
                        <a href="#consultaNotas" data-toggle="tab" aria-expanded="true">Notas<div class="ripple-container"></div></a>
                    </li> --}}
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
                        <div class="form-group label-floating is-empty">
                        <label class="active">Fecha : </label>
                        <input type="date" class="validate doctor-date-selector" id="fechaconsulta">
                        </div>
                        <div class="form-group label-floating is-empty">
                            <h6 style="text-align: left">Selecciona una hora:</h6>
                          
                        </div>
                        <div class="form-group label-floating is-empty" style="text-align: left; "  id="horarioconsulta">
                        </div>

                    
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
                          
                          var diasSemana = [
    "Domingo",
    "Lunes",
    "Martes",
    "Miercoles",
    "Jueves",
    "Viernes",
    "Sabado",
  ];

var  now = new Date();

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
       

        var currentDate =  `${now.getFullYear()}-${
      now.getMonth() + 1 < 10 ? "0" : ""
    }${now.getMonth() + 1}-${
      now.getDate() < 10 ? "0" : ""
    }${now.getDate()}`;
        $('#fechaconsulta').val(currentDate);
        document.getElementById("fechaconsulta").min = currentDate;
        FormDropzone.init();
        $("#fechaconsulta").trigger("change"); 


    });

    $('#fechaconsulta').on('change',function(e){

            var dateValue =  e.target.value;
            if (dateValue != "") {
                var horarios =[];
                document.getElementById("horarioconsulta").innerHTML ="";
                var date =  new Date(dateValue + "T" + now.toLocaleTimeString());
                console.log(dateValue);
                console.log(now.toLocaleTimeString());

                console.log(date);

                 var weekday = date.getDay();
                var diaSemana = diasSemana[weekday];
                 var  horariocompleto = JSON.parse('{!! $horario !!}');
              
                 var  pendientecompleto =  JSON.parse('{!! $pendientes !!}');
                jQuery.each(horariocompleto, function (i, val) {

                if (val.days == diaSemana) {
                    var startTime = new Date("December 17, 1995 " + val.start_time);
                    startTime.setFullYear(date.getFullYear());
          startTime.setMonth(date.getMonth());
          startTime.setDate(date.getDate());
                     var endTime = new Date("December 17, 1995 " + val.end_time);
                     endTime.setFullYear(date.getFullYear());
          endTime.setMonth(date.getMonth());
          endTime.setDate(date.getDate());
          var pendientes = pendientecompleto.filter((pendiente) =>
            pendiente.new_date ? pendiente.new_date == dateValue : pendiente.date == dateValue
          );
          var horaAux;

                     while (startTime.getTime() < endTime.getTime()) {

                        horaAux = `${
              startTime.getHours() < 10 ? "0" : ""
            }${startTime.getHours()}:${
              startTime.getMinutes() < 10 ? "0" : ""
            }${startTime.getMinutes()}`;

                    horarios.push({
                          dia: dateValue,
                            hora: horaAux, 
                             habilitado:
                startTime.getTime() < now.getTime() ||
                pendientes.findIndex((pendiente) =>
                  pendiente.new_time
                    ? pendiente.new_time == horaAux + ":00"
                    : pendiente.querytime == horaAux + ":00"
                ) >= 0
                  ? false
                  : true
                 });
                startTime.setMinutes(startTime.getMinutes() + 30);
                }
                
                }
            
                    });
                    
                  //  console.log(horarios);
        jQuery.each( horarios,function(i,val){
        if(val.habilitado){
            console.log("rojo");

            document.getElementById("horarioconsulta").innerHTML += ` <button  type="submit" class="chip" onclick="agregarReprogramacion('${val.hora}','${val.dia}')"`+`style="cursor: pointer; background: #F44336; color: white; border:none">`+
            val.hora +`</button>`;
        }
        else{
            console.log("gris");

            document.getElementById("horarioconsulta").innerHTML += ` <button  type="button"  class="chip"`+`style="cursor: default; background: grey; color: white; border:none">`+
             val.hora +`</button>`;
        }

});

    }else{
        horarios =[];
    }
       
    });



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
    function agregarReprogramacion(hora,dia){
        if(hora === ''){

            swal('No hay horario seleccionado');
        }
        else{
        swal({
      title: "Reprogramar?",
      text: "Estas seguro de reprogramar la consulta el dia " + dia+" a las " + hora+"?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55  ",
      confirmButtonText: "Si, Cambialo!",
      closeOnConfirm: false,
    },
    function () {
        agregarReprogramacionConsulta(hora,dia);
      swal("Actualizacion!", "Reprogramación exitosa.", "success");
      document.location.href="{{ URL::to('admin/consultas') }}";

    

    });
        }
    }
    function agregarReprogramacionConsulta(hora,dia) {

$.ajax({
    type: 'post',
    url: "{{ URL::to('admin/reprogramacion') }}",
    dataType: "json",
    data: {
        idconsulta:'{!! $idconsultas!!}',
        date:   $('#fechaconsulta').val(),
        querytime: hora,
        diasemana: dia,
        '_token': '{{ csrf_token() }}'
    },
    beforeSend: function (xhr) {
    }
}).done(function (dataRpta) {
    //alert(JSON.stringify(dataRpta));
  
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
