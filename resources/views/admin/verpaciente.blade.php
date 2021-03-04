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
            <h4 class="header-title">    Perfil Paciente</h4>
              
        </div>

        <div class="col-md-12">


            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="{{ asset('assets/images/paciente1.jpg') }}" class="img-form" alt="" width="130px">
                </div>
                <div class="col-md-8">                    
                    
                    <h4><b id="lbPaciente"></b></h4>
                    <label for=""><b>Correo: </b></label>
                    <label for="" id="lbEmail"></label><br>
                    <label for=""><b>Edad: </b></label>
                    <label for="" id="lbEdad"></label><br>
                    <label for=""><b>Telefono: </b></label>
                    <label for="" id="lbCelular"></label><br>
                    <label for=""><b>Domicilio: </b></label>
                    <label for="" id="lbdomicilio"></label>

                </div>
            </div>
            <br>
            <div class="row">
                  <ul class="nav nav-tabs tabs-li" style="width:100%">
                    <li class="col-md-4 active">
                      <a href="#pacienteInfoPersonal" data-toggle="tab" aria-expanded="false">Info. Personal<div class="ripple-container"></div></a>
                    </li>
                    <!-- <li class="col-md-3">
                      <a href="#pacienteConsulta" data-toggle="tab" aria-expanded="false">Consultas<div class="ripple-container"></div></a>
                    </li> -->
                    <li class="col-md-4">
                      <a href="#pacienteFacturacion" data-toggle="tab" aria-expanded="false">Facturación<div class="ripple-container"></div></a>
                    </li>
                    <li class="col-md-4">
                      <a href="#pacienteNotas" data-toggle="tab" aria-expanded="false">Notas<div class="ripple-container"></div></a>
                    </li>
                  </ul>
            </div>

            <div class="tab-content">
                <div class="tab-pane fade active in" id="pacienteInfoPersonal">
                    <div class="items-cv">
                      <!-- formacion academica -->
                      <div class="row">
                        <h4><b>Datos filiatorios</b></h4>
                        <ol>
                            <li><b>Sexo: </b><label id="lbSexo"></label> </li>
                            <li><b>Ocupación: </b><label id="lbOcupacion"></label> </li>
                            <li><b>Fecha de nacimiento: </b><label id="lbFecha"></label> </li>
                            <li><b>Estado Civil: </b><label id="lbEstadoCivil"></label> </li>
                            <li><b>DNI: </b><label id="lbDNI"></label> </li>
<!--                            <li><b>Nacionalidad: </b><label id="lbNacionalidad">Peruana</label></li>-->
                            <li><b>Residencia: </b><label id="lbDireccion"></label></li>
<!--                          <li><b>Residencia Anterior: </b><label>Av. Perez de cuellar Nro. 3565</label></li>-->
<!--                            <li><b>Grado de instrucción: </b><label id="lbInstruccion">Superior</label></li>-->
                        </ol>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="pacienteConsulta">
                    <div class="items-cv">
                      <!-- formacion academica -->
                      <div class="row">
                        <ol>
                          <li><b>Total de Consulta: </b><label>20</label> </li>
                          <li><b>Total de Tiempo: </b><label> 300 minutos</label> </li>
                        </ol>
                        <canvas id="totalLlamadasPaciente" width="300" height="200"></canvas>

                      </div>

                    </div>
                  </div>
                  <div class="tab-pane fade" id="pacienteFacturacion">
                    <div class="items-cv">
                      <!-- formacion academica -->
                      <div class="row">
                        <ol>
                           <li><b>Total de Consulta: </b><label id="lbNumConsulta">20</label> </li>
                          <li><b>Total de Tiempo: </b><label id="lbTiempoConsulta"> 300 minutos</label> </li>
<!--                          <li><b>Costo Total: </b><label>S/. 300</label> </li>-->
                          <!-- <li><b>Total de Tiempo: </b><label> 300 minutos</label> </li> -->
                        </ol>
                          <div class="col-md-8 col-md-offset-2" >
                        <canvas id="totalCostoPaciente" width="300" height="200"></canvas>
                          </div>
                      </div>

                    </div>
                  </div>
                <div id="pacienteNotas" class="tab-pane fade">
                    <div class="doc-postulantes">
                        <label class="nota-title"><b>Nueva Nota</b></label>
                        <div class="row">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label" for="notaContenido">Escriba una nota </label>
                                <textarea  onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" class="form-control" id="notaContenido" maxlength="500" name="notaContenido" rows="3"></textarea>
                            </div>
                            <div class="text-right">
                                <button type="submit" onclick="agregarNotaPaciente()" class="format btn btn-responsive btn-verde" style="margin:5px !important;vertical-align: middle;">Guardar Nota</button>
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

<script language="javascript" type="text/javascript">

    listarObtenerPaciente('{!! $idusuarios!!}');   
    function listarObtenerPaciente(id) {
        $.ajax({
            type: 'post',
            url: "{{ URL::to('admin/obtenerpaciente') }}",
            dataType: "json",
            data: {iduser: id,'_token': '{{ csrf_token() }}'},
            beforeSend: function (xhr) {
            }
        }).done(function (dataRpta) {
            
              //alert(JSON.stringify(dataRpta));
              $('#lbPaciente').html(dataRpta.usuario.last_name + ' ' + dataRpta.usuario.name); 
              $('#lbEmail').html(dataRpta.usuario.email);              
              $('#lbdomicilio').html(dataRpta.usuario.address);
              var tele = '';
                jQuery.each(dataRpta.telefono, function (i, val) {
                    tele = tele + val.number + ' ';
                });
              $('#lbCelular').html(tele);
              try {
                  $('#lbEdad').html(calculateAge(convertDateTommddyyyy(dataRpta.usuario.birth_date)) + ' años');    
              } catch (e) {}

              
              if(dataRpta.usuario.gender===1){
                  $('#lbSexo').html("masculino");  
              }
              if(dataRpta.usuario.gender===2){
                  $('#lbSexo').html("femenino"); 
              }
              $('#lbOcupacion').html(dataRpta.paciente.ocupation);
              try {
                  $('#lbFecha').html(convertDateTommddyyyy(dataRpta.usuario.birth_date));
              } catch (e) {}
              
              $('#lbEstadoCivil').html(dataRpta.usuario.state);
              $('#lbDNI').html(dataRpta.usuario.dni);  
              //$('#lbNacionalidad').html(dataRpta.usuario.en);
              $('#lbDireccion').html(dataRpta.usuario.address);
              $('#lbNumConsulta').html(dataRpta.consultasNum);
              $('#lbTiempoConsulta').html(dataRpta.consultasSum);
                try {                
                    chartPacientes(dataRpta.textos,dataRpta.cantidades);    
                } catch (e) {  
                    alert("error");
                }
//              $('#lbInstruccion').html(dataRpta.usuario.en);
              
//            $('#lbMedico').html(dataRpta.usuario.last_name + ' '+ dataRpta.usuario.name);
//            
//                var quali = ""; 
//                for(i=0;i<dataRpta.doctor.qualification;i++){
//                    quali = quali + "<span class='glyphicon glyphicon-star' aria-hidden='true' style='color: #f1c420; font-size: 18px;'></span>";                    
//                }
//            $('#blEstrellas').html(quali);
//            $('#lbEspecialidad').html(dataRpta.doctor.specialty);
//            $('#lblinkedin').html(dataRpta.doctor.linkedIn);
//            $('#lbEdad').html(calculateAge(convertDateTommddyyyy(dataRpta.usuario.birth_date)) + 'años');
//            
//            $('#lbfechanac').html(convertDateTommddyyyy(dataRpta.usuario.birth_date));
//            $('#lbDNI').html(dataRpta.usuario.dni);
//            var tele = '';
//            jQuery.each(dataRpta.telefono, function (i, val) {
//                tele = tele + val.number + ' ';
//            });
//            $('#lbtelefono').html(tele);
//            $('#lbdomicilio').html(dataRpta.usuario.address);
//            $('#lbcorreo').html(dataRpta.usuario.email);
//            $('#lbestadocivil').html(dataRpta.usuario.state);
//           
//            $('#lbcalifi').html(quali);
//            var valoracion='test';
//            switch (dataRpta.doctor.qualification) {
//                case '1.00':valoracion='Pésimo';   break;
//                case '2.00':valoracion='Malo';   break;
//                case '3.00':valoracion='Regular';   break;
//                case '4.00':valoracion='Bueno';   break;
//                case '5.00':valoracion='Muy Bueno';   break;
//               
//            }
//            $('#lbValoracion').html(valoracion);
//            $('#lbOpinion').html(dataRpta.consulta.appreciation);
//            //lbOpinion
//            
//            $('#lbCentroEstudio').html(dataRpta.academico.institution);
//            $('#lbEstudios').html(dataRpta.academico.title);
//            $('#lbAnios').html(convertDateTommddyyyy(dataRpta.academico.start_date) + ' - ' 
//                    + convertDateTommddyyyy(dataRpta.academico.end_date) );
//            
//            var expe = '';
//            jQuery.each(dataRpta.experiencia, function (i, val) {
//                expe= expe + "<ol>";
//                 expe = expe + "<li><b>Centro: </b> <label>" + val.institution + "</label> </li>";
//                 expe = expe + "<li><b>Actividad:  </b> <label>" + val.activity + "</label> </li>";
//                expe= expe + "</ol>";
//            });
//            $('#experienciaLabora').html(expe);
//            $('#lbNumConsulta').html(dataRpta.consultasNum);
//            $('#lbTiempoConsulta').html(dataRpta.consultasSum);
//            try {                
//                chartmedicos(dataRpta.textos,dataRpta.cantidades);    
//            } catch (e) {    
//            }
//            
            var notas = '';
            jQuery.each(dataRpta.notas, function (i, val) {
             
                 notas = notas + "<li> <label>" + val.text + "</label> </li>";
                
            });
            
            $('#misNotas').html(notas);
//            
//            
            

            
            
        }).fail(function (jqXHR, textStatus) {
            alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
        }).always(function () {
        });
    }
    
    function calculateAge(birthday) {
        var birthday_arr = birthday.split("/");
        var birthday_date = new Date(birthday_arr[2], birthday_arr[1] - 1, birthday_arr[0]);
        var ageDifMs = Date.now() - birthday_date.getTime();
        var ageDate = new Date(ageDifMs);
        return Math.abs(ageDate.getUTCFullYear() - 1970);
    }
    
    
    function convertDateTommddyyyy(mmm) {
        var dia = mmm.substring(10, 8);
        var mes = mmm.substring(7, 5);
        var anio = mmm.substring(4, 0);
        //var mmm2 = mes + "/" + dia + "/" + anio;
        var mmm2 = dia + "/" + mes + "/" + anio;
        return mmm2;
    }
    
    function chartPacientes(texto,cantidades){
    
    var ctx = document.getElementById("totalCostoPaciente");
var myChart = new Chart(ctx, {
type: 'bar',
data: {
    labels:texto,
    datasets: [{
        label: 'numero de llamadas',
        data: cantidades,
        backgroundColor: [
          'rgba(238, 130, 18, 0.6)',
          'rgba(238, 130, 18, 0.6)',
          'rgba(238, 130, 18, 0.6)'
        ],
        borderColor: [
          'rgba(238, 130, 18, 0.6)',
          'rgba(238, 130, 18, 0.6)',
          'rgba(238, 130, 18, 0.6)'
        ],
        borderWidth: 1
    }]
},
options: {
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero:true
            }
        }]
    }
}
});

    }
    
     
    function agregarNotaPaciente() {

        $.ajax({
            type: 'post',
            url: "{{ URL::to('admin/agregarnotapaciente') }}",
            dataType: "json",
            data: {
                idusuario: '{!! $idusuarios!!}',
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
             
                 notas = notas + "<li> <label>" + val.text + "</label> </li>";
                
            });
            
            $('#misNotas').html(notas);
            $('#notaContenido').val('');
            //alert(dataRpta.message);
        }).fail(function (jqXHR, textStatus) {
            alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
        }).always(function () {
        });

    }

</script>

@stop
