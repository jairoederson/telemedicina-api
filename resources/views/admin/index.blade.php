@php
    $pacientes = \App\Patient::latest()
     ->take(5)
     ->get();
    $doctors = \App\Doctor::latest()
     ->take(5)
     ->get();
@endphp
@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Josh Admin Template
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<meta name="_token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ asset('assets/css/pages/dashboard2.css') }}"/>
<link type="text/css" rel="stylesheet" href="{{ asset('assets/css/pages/flot.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}"/>
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css"/>
@stop

{{-- Page content --}}
@section('content')



<section class="content margin-top " style="">
    <div class="row" style="margin-right: -35px; margin-left: -30px; margin-bottom: 15px">
        <div class="col-lg-4 col-md-6 col-sm-6 margin_10  fadeInLeftBig">
            <!-- Trans label pie charts strats here-->
            <div class="lightbluebg no-radius">
                <div class="panel-body squarebox square_boxs">
                    <div class="col-xs-12 pull-left nopadmar">
                        <div class="row">
                            <div class="square_box col-xs-12 text-right">
                                <!-- <span>Medicos</span> -->

                                <div style="padding-left: 0px;padding-right: 0px" class="text-left row">
                                    <div class="col-xs-7" style="padding-left: 0px;">
                                        <a href="#">
                                            <h4>
                                                INGRESOS HOY
                                            </h4>
                                        </a>
                                        <br>
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 0px;">
                                    <div class="col-md-6 number" id="myTargetElement1" style="padding-left: 0px;"></div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6" style="padding-left: 0px">
                                <a href="#">
                                    <small class="color-gris stat-label">Últ. Semana</small>
                                </a>
                                <h4 id="myTargetElement1.1"></h4>
                            </div>
                            <div class="col-xs-6 text-right" style="padding-right: 0px">
                                <a href="#">
                                    <small class="color-gris stat-label">Últ. Mes</small>
                                </a>
                                <h4 id="myTargetElement1.2"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 margin_10  fadeInUpBig">
            <!-- Trans label pie charts strats here-->
            <div class="redbg no-radius">
                <div class="panel-body squarebox square_boxs">
                    <div class="col-xs-12 pull-left nopadmar">
                        <div class="row">
                            <div class="square_box col-xs-12 pull-left">

                                <div class="text-left row" style="padding-left: 0px;padding-right: 0px;">
                                    <div class="col-xs-7" style="padding-left: 0px">
                                        <a href="#">
                                            <h4>
                                                CONSULTAS HOY
                                            </h4>
                                            <small>Valoración: 
                                                <label style="color: red !important" id="lbValoracion">Buena</label>
                                            </small>
                                        </a>
                                    </div>
                                    <div class="col-xs-5" style="padding-left: 10px;padding-right: 0px;" id="blEstrellas">
                                        
<!--                                    <span style="width: 18px;color:#f1c420" class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                        <span style="width: 18px;color:#f1c420" class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                        <span style="width: 18px;color:#f1c420" class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                        <span style="width: 18px;color:#f1c420" class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                        <span style="width: 18px;color:#d6d6cd" class="glyphicon glyphicon-star" aria-hidden="true"></span>-->
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 0px;padding-right: 0px;">
                                    <div class="col-md-6 number" id="myTargetElement2" style="padding-left: 0px;"></div>
                                    <!--                                    <div class="col-md-6" style="padding-left: 90px; padding-right: 0px; padding-bottom: 5px;!important text-right">
                                                                          <span class="glyphicon glyphicon-earphone" aria-hidden="true" style="color: #ebebeb; font-size: 45px;"></span>
                                                                        </div>-->
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-xs-6" style="padding-left: 0px">
                                <a href="#">
                                    <small class="color-gris stat-label">Últ. semana</small>
                                </a>
                                <h4 id="myTargetElement2.1"></h4>
                            </div>
                            <div class="col-xs-6 text-right" style="padding-right: 0px">
                                <a href="#">
                                    <small class="color-gris stat-label">Últ. mes</small>
                                </a>
                                <h4 id="myTargetElement2.2"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--        <div class="col-lg-3 col-sm-6 col-md-6 margin_10  fadeInDownBig">
            <div class="goldbg no-radius">
                <div class="panel-body squarebox square_boxs">
                    <div class="col-xs-12 pull-left nopadmar">
                        <div class="row">
                            <div class="square_box col-xs-12 pull-left">
                                <div class="text-left row" style="padding-left: 0px;padding-right: 0px">
                                    <div class="col-xs-7" style="padding-left: 0px">
                                        <a href="#">
                                            <h4>
                                                Nº POSTULANTES HOY
                                            </h4>
                                        </a>
                                    </div>
                                </div>
                                <br>
                                <div class="row" style="padding-left: 0px">

                                    <div class="col-md-6 number" id="myTargetElement3" style="padding-left: 0px;"></div>
                                    
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-xs-6" style="padding-left: 0px">
                                <a href="#">
                                    <small class="color-gris stat-label">Últ. semana</small>
                                </a>
                                <h4 id="myTargetElement3.1"></h4>
                            </div>
                            <div class="col-xs-6 text-right" style="padding-right: 0px">
                                <a href="#">
                                    <small class="color-gris stat-label">Últ. mes</small>
                                </a>
                                <h4 id="myTargetElement3.2"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        <div class="col-lg-4 col-md-4 col-sm-4 margin_10  fadeInUpBig">
            <!-- Trans label pie charts strats here-->
            <div class="redbg no-radius">
                <div class="panel-body squarebox square_boxs">
                    <div class="col-xs-12 pull-left nopadmar">
                        <div class="row">
                            <div class="square_box col-xs-12 pull-left">

                                <div class="text-left row" style="padding-left: 0px;padding-right: 0px;">
                                    <div class="col-xs-7" style="padding-left: 0px">
                                        <a href="#">
                                            <h4>
                                                Tiempo Promedio de consulta 
                                            </h4>
                                        </a>
                                    </div>
                                </div>
                                <br>
                                <div class="row" style="padding-left: 0px;padding-right: 0px;">
                                    <div class="col-md-6 number" id="myTargetElement4" style="padding-left: 0px;"></div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6" style="padding-left: 0px">
                                <a href="#">
                                    <small class="color-gris stat-label"></small>
                                </a>
                                <h4 id="myTargetElement4.1"></h4>
                            </div>
                            <div class="col-xs-6 text-right" style="padding-right: 0px">
                                <a href="#">
                                    <small class="color-gris stat-label"></small>
                                </a>
                                <h4 id="myTargetElement4.2"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  

    </div>
    <!--/row-->

<div class="row">
    <div class="col-md-8">
        <div class="row without-padding">
            <div class="col-lg-12 col-sm-12 no_padding">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-border main_chart">
                            <div class="panel-heading ">
                                <h3 class="panel-title title-box">
                                    Graficos de Ingresos y Egresos
                                </h3>
                            </div>
                            <div class="panel-body">
                                <!-- <canvas id="IndexPagos" height="167.5"></canvas> -->
                            <!-- {!! $db_chart->html() !!} -->
                                <canvas id="line-chart" width="800" height="300" ></canvas>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-12 col-sm-12 no_padding">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-border main_chart">
                            <div class="panel-heading ">
                                <h3 class="panel-title title-box">
                                    Graficos de Utilidad
                                </h3>
                            </div>
                            <div class="panel-body">
                                <!-- <canvas id="IndexPagos" height="167.5"></canvas> -->
                            <!-- {!! $db_chart->html() !!} -->
                                <canvas id="line-chart2" width="800" height="300" ></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-sm-12 no_padding">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-border main_chart">
                            <div class="panel-heading ">
                                <h3 class="panel-title title-box">
                                    Graficos de consultas
                                </h3>
                            </div>
                            <div class="panel-body">
                                <!-- <canvas id="IndexPagos" height="167.5"></canvas> -->
                            <!-- {!! $db_chart->html() !!} -->
                                <canvas id="totalLlamadasDoctor" width="300" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

            <!--        <div class="col-lg-4 col-md-12 col-sm-5">
                        <div class="panel panel-border">
                            <div class="panel-heading border-light">
                                <h3 class="panel-title title-box">
                                     <i class="livicon" data-name="users" data-size="18" data-color="#00bc8c" data-hc="#00bc8c"
                                       data-l="true"></i>
                                    Enfermedades del paciente
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="">
                                    <canvas id="radar-chart" width="432" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>-->


        </div>
    </div>
    <div class="col-md-4 col-md-6">
        <div class="row">

            <div class="col-lg-12 col-md-12">
                <div class="panel panel-border">
                    <div class="panel-heading">
                        <h4 class="panel-title title-box">
                            Últimos Asociados
                        </h4>
                    </div>
                    <div class="panel-body nopadmar" id="divAsociados">
                    <!--                    @foreach($users as $user )
                        <div class="media">
                            <div class="media-left">
@if($user->pic)
                            <img src="{!! url('/').'/uploads/users/'.$user->pic !!}" class="media-object img-circle" >
                            @else
                            <img src="{{ asset('assets/images/authors/no_avatar.jpg') }}" class="media-object img-circle" >
                            @endif
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading">{{ $user->full_name }}</h5>
                            <p>{{ $user->email }}  <span class="user_create_date pull-right">{{ $user->created_at->format('d M') }} </span></p>
                        </div>
                    </div>
                    @endforeach-->
                    </div>
                </div>

            </div>

            <div class="col-lg-12 col-md-12">
                <div class="panel panel-border">
                    <div class="panel-heading">
                        <h4 class="panel-title title-box">
                            Últimos Pacientes
                        </h4>
                    </div>
                    <div class="panel-body nopadmar" id="divPacientes">
                        @foreach($pacientes as $user_paciente)
                            @php
                                $user = \App\User::find($user_paciente->users_id);
                            @endphp
                            <div class="media">
                                <div class="media-left">
                                    @if($user->pic)
                                        <img src="{!! url('/').'/uploads/users/'.$user->pic !!}" class="media-object img-circle" >
                                    @else
                                        <img src="{{ asset('assets/images/authors/no_avatar.jpg') }}" class="media-object img-circle" >
                                    @endif
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading">{{ $user->full_name }}</h5>
                                    <p>{{ $user->email }}  <span class="user_create_date pull-right">{{ $user->created_at->format('d M') }} </span></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="panel panel-border">
                    <div class="panel-heading">
                        <h4 class="panel-title title-box">
                            Últimos Doctores
                        </h4>
                    </div>
                    <div class="panel-body nopadmar" id="divPacientes">
                        @foreach($doctors as $user_doctor)
                            @php
                                $user = \App\User::find($user_doctor->users_id);
                            @endphp
                            <div class="media">
                                <div class="media-left">
                                    @if($user->pic)
                                        <img src="{!! url('/').'/uploads/users/'.$user->pic !!}" class="media-object img-circle" >
                                    @else
                                        <img src="{{ asset('assets/images/authors/no_avatar.jpg') }}" class="media-object img-circle" >
                                    @endif
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading">{{ $user->full_name }}</h5>
                                    <p>{{ $user->email }}  <span class="user_create_date pull-right">{{ $user->created_at->format('d M') }} </span></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

</div>

</div>

</section>
<div class="modal fade" id="editConfirmModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Alert</h4>
            </div>
            <div class="modal-body">
                <p>You are already editing a row, you must save or cancel that row before edit/delete a new row</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
@stop

{{-- page level scripts --}}
@section('footer_scripts')

<script type="text/javascript" src="{{ asset('assets/vendors/countUp_js/js/countUp.js') }}"></script>
<!-- {{--<script src="http://demo.lorvent.com/rare/default/vendors/raphael/js/raphael.min.js"></script>--}} -->
<script src="{{ asset('assets/vendors/morrisjs/morris.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
<!--<script type="text/javascript" src="{{ asset('assets/js/pages/animation-chart.js') }}"></script> -->
<script src="{{ asset('assets/vendors/Chartjs/js/Chart.js') }}"></script>
<!--<script src="{{ asset('assets/js/pages/chartjs.js') }}" ></script>-->

<!--<script type="text/javascript" src="{{ asset('vendors/animatechart/jquery.flot.animator.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/animationcharts/jquery.circliful.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/flotchart/js/jquery.flot.resize.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/flotchart/js/jquery.flot.js') }}"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/flotchart/js/jquery.flot.js') }}" ></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/flotchart/js/jquery.flot.stack.js') }}" ></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/flotchart/js/jquery.flot.crosshair.js') }}" ></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/flotchart/js/jquery.flot.time.js') }}" ></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/flotchart/js/jquery.flot.selection.js') }}" ></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/flotchart/js/jquery.flot.symbol.js') }}" ></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/flotchart/js/jquery.flot.resize.js') }}" ></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/flotchart/js/jquery.flot.categories.js') }}"  ></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/splinecharts/jquery.flot.spline.js') }}"  ></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/flot_tooltip/js/jquery.flot.tooltip.js') }}"  ></script>

<script>

var useOnComplete = false,
        useEasing = false,
        useGrouping = false,
        options = {
            useEasing: useEasing, // toggle easing
            useGrouping: useGrouping, // 1,000,000 vs 1000000
            separator: ',', // character to use as a separator
            decimal: '.' // character to use as a decimal
        };


// var demo = new CountUp("myTargetElement4", 125, {{ $user_count }}, 0, 6, options);
// demo.start();

 obtenerDatosResumen();
    function obtenerDatosResumen() {

        $.ajax({
            type: 'post',
            url: "{{ URL::to('admin/obtenerdatosresumen') }}",
            dataType: "json",
            data: {
                '_token': '{{ csrf_token() }}'
            },
            beforeSend: function (xhr) {
                //alert(id);
            }
        }).done(function (dataRpta) {
            
            //alert(JSON.stringify(dataRpta));
            var demo = new CountUp("myTargetElement1", 12.52, dataRpta.ingresosHoy, 0, 2, options);
            demo.start();
            var demo = new CountUp("myTargetElement1.1", 12.52, dataRpta.ingresosUltimaSem, 0, 2, options);
            demo.start();
            var demo = new CountUp("myTargetElement1.2", 12.52, dataRpta.ingresosUltimoMes, 0, 2, options);
            demo.start();

            var demo = new CountUp("myTargetElement2", 1, dataRpta.numeroConsultasHoy, 0, 2, options);
            demo.start();
            var demo = new CountUp("myTargetElement2.1", 1, dataRpta.numeroConsultasSem, 0, 2, options);
            demo.start();
            var demo = new CountUp("myTargetElement2.2", 1, dataRpta.numeroConsultasUltimoMes, 0, 2, options);
            demo.start();
            
            var quali = ""; 
                for(i=0;i<dataRpta.calificacionHoy;i++){
                    quali = quali + "<span class='glyphicon glyphicon-star' aria-hidden='true' style='color: #f1c420; font-size: 18px;'></span>";                    
                }
            $('#blEstrellas').html(quali);
            
            var valoracion='';
            switch (dataRpta.calificacionHoy) {
                case 1:valoracion='Pésimo';   break;
                case 2:valoracion='Malo';   break;
                case 3:valoracion='Regular';   break;
                case 4:valoracion='Bueno';   break;
                case 5:valoracion='Muy Bueno';   break;
               
            }
            $('#lbValoracion').html(valoracion);

//            var demo = new CountUp("myTargetElement3", 24.02, 10, 0, 2, options);
//            demo.start();
//            var demo = new CountUp("myTargetElement3.1", 24.02, 58, 0, 2, options);
//            demo.start();
//            var demo = new CountUp("myTargetElement3.2", 24.02, 178, 0, 2, options);
//            demo.start();

//            var demo = new CountUp("myTargetElement4", 24.02, convertirSeg(dataRpta.tiempoPromedioConsulta), 0, 2, options);
//            demo.start();
            
            //var demo = new CountUp("myTargetElement4.1", 24.02, null, 0, 2, options);
            //demo.start();
            //var demo = new CountUp("myTargetElement4.2", 24.02, null, 0, 2, options);
            //demo.start();

//            var notas = '';
//            jQuery.each(dataRpta, function (i, val) {
//             
//                 notas = notas + "<li> <label>" + val.text + "</label> </li>";
//                
//            });
//            
//            $('#misNotas').html(notas);
//            $('#notaContenido').val('');
            //alert(dataRpta.message);
            
            
            setTimeout(
              function(){
                var ingresos = document.getElementById("myTargetElement1").textContent;
                document.getElementById("myTargetElement1").textContent = 'S/.' + ingresos + '.00';

                var ingSemana = document.getElementById("myTargetElement1.1").textContent;
                document.getElementById("myTargetElement1.1").textContent = 'S/.' + ingSemana + '.00';

                var ingMes = document.getElementById("myTargetElement1.2").textContent;
                document.getElementById("myTargetElement1.2").textContent = 'S/.' + ingMes + '.00';

                 var tiempopromedio = document.getElementById("myTargetElement4").textContent;
                document.getElementById("myTargetElement4").textContent =  convertirSeg(dataRpta.tiempoPromedioConsulta); 
                //alert('');
              },
              2500
            );
    
            //primer grafico
    
            var lineChartData = {
                labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"],
                datasets: [
                    {
                        fill:true,
                        tension:0,
                        pointBackgroundColor:"rgba(65,139,202,0.5)",
                        pointBorderColor:"#fff",
                        borderJoinStyle: 'miter',
                        pointBorderWidth:"1",
                        label:"Ingresos ",
                        data :dataRpta.ingresosMes,
                        //data : [5,3,2,4,6,2,6,8,2,1,3,4],
                        backgroundColor:"rgba(254,132,0,0.5)"
                    },
                    {
                        fill:true,
                        tension:0,
                        pointBackgroundColor:"rgba(95,179,15,0.5)",
                        pointBorderColor:"#fff",
                        borderJoinStyle: 'miter',
                        pointBorderWidth:"1",
                        pointStrokeColor: "#fff",
                        label:"Egresos ",
                        data :dataRpta.egresoMes,
                        //data : [25,15,10,20,30,10,30,40,10,5,15,20],
                        backgroundColor:"rgba(95,179,15,0.5)"
                    }

                ]

            };
            var selector = '#line-chart';

            $(selector).attr('width', $(selector).parent().width());
            var myLine = new Chart($(selector), {
                type: 'line',
                data: lineChartData,
                options: {
                    title: {
                        display: false,
                        text: 'Line Chart'
                    }
                }
            });
            
            //fin primer grafico
            
            //segundo grafico
            
            var lineChartDataS = {
                labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"],
                datasets: [
                    {
                        fill:true,
                        tension:0,
                        pointBackgroundColor:"rgba(65,139,202,0.5)",
                        pointBorderColor:"#fff",
                        borderJoinStyle: 'miter',
                        pointBorderWidth:"1",
                        label:"Utilidad (miles)",
                        //data : [5,3,2,4,6,2,6,8,2,1,3,4],
                        data:dataRpta.utilidad,
                        backgroundColor:"rgba(254,132,0,0.5)"
                    }

                ]

            };

            var selector = '#line-chart2';

            $(selector).attr('width', $(selector).parent().width());
            var myLine = new Chart($(selector), {
                type: 'line',
                data: lineChartDataS,
                options: {
                    title: {
                        display: false,
                        text: 'Line Chart'
                    }
                }
            });
            
            //fin segundo grafico 
            //alert(JSON.stringify(dataRpta.numerollamadas));
            //tercer grafico
            var ctx = document.getElementById("totalLlamadasDoctor");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["0:00 a 2:00", "2:00 a 4:00", "4:00 a 6:00", "6:00 a 8:00", "8:00 a 10:00", "10:00 a 12:00",
                        "12:00 a 14:00", "14:00 a 16:00", "16:00 a 1820:00", "18:00 a 20:00", "20:00 a 22:00", "22:00 a 24:00"],
                    datasets: [{
                            label: 'Numero de consultas',
                            //data: [5, 6, 4, 5, 2, 3, 5, 6, 4, 5, 2, 3],
                            data: dataRpta.numerollamadas,
                            backgroundColor: [
                                'rgba(238, 130, 18, 0.6)',
                                'rgba(238, 130, 18, 0.6)',
                                'rgba(238, 130, 18, 0.6)',
                                'rgba(238, 130, 18, 0.6)',
                                'rgba(238, 130, 18, 0.6)',
                                'rgba(238, 130, 18, 0.6)',
                                'rgba(238, 130, 18, 0.6)',
                                'rgba(238, 130, 18, 0.6)',
                                'rgba(238, 130, 18, 0.6)',
                                'rgba(238, 130, 18, 0.6)',
                                'rgba(238, 130, 18, 0.6)',
                                'rgba(238, 130, 18, 0.6)',
                            ],
                            borderColor: [
                                'rgba(238, 130, 18, 0.6)',
                                'rgba(238, 130, 18, 0.6)',
                                'rgba(238, 130, 18, 0.6)',
                                'rgba(238, 130, 18, 0.6)',
                                'rgba(238, 130, 18, 0.6)',
                                'rgba(238, 130, 18, 0.6)',
                                'rgba(238, 130, 18, 0.6)',
                                'rgba(238, 130, 18, 0.6)',
                                'rgba(238, 130, 18, 0.6)',
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
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
            //fin tercer grafico
            //otro grafico
            //var doctorCanvas = document.getElementById("doctorChart");
            //var doctorData = {
            //    labels: [
            //        "Doctor1",
            //        "Doctor2",
            //        "Doctor3",
            //        "Doctor4",
            //        "Doctor5"
            //    ],
            //    datasets: [
            //        {
            //            data: [133.3, 86.2, 52.2, 51.2, 50.2],
            //            backgroundColor: [
            //                "#FF6384",
            //                "#63FF84",
            //                "#84FF63",
            //                "#8463FF",
            //                "#6384FF"
            //            ]
            //        }]
            //};

            //var pieChart = new Chart(doctorCanvas, {
            //    type: 'pie',
            //    data: doctorData
            //});

            var html  = '';
            jQuery.each(dataRpta.asociados, function (i, val) {
                html +=  '<div class="media"><div class="media-body">'+
                            '<h5 class="media-heading">'+val.name+'</h5>'+
                            '<p>'+val.ruc +'<span class="user_create_date pull-right">'
                                     +val.formattdate+' </span></p>'+
                        '</div></div>';     
            });
            $('#divAsociados').html(html);
            
           
                   
    
        }).fail(function (jqXHR, textStatus) {
            alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
        }).always(function () {
        });

    }
    
    function convertirSeg(time){
        var minutes = Math.floor( time / 60 );
        var seconds = time % 60;

        //Anteponiendo un 0 a los minutos si son menos de 10 
        minutes = minutes < 10 ? '0' + minutes : minutes;

        //Anteponiendo un 0 a los segundos si son menos de 10 
        seconds = seconds < 10 ? '0' + seconds : seconds;

        var result = minutes + ":" + Math.round(seconds);  // 161:30
        
        return result;
    }
    
//
//$('.blogs').slimScroll({
//    color: '#A9B6BC',
//    height: 350 + 'px',
//    size: '5px'
//});
//
//var week_data = {!! $month_visits !!}
//;
//        var year_data = {!! $year_visits !!}
//;
//
//function lineChart() {
//    Morris.Line({
//        element: 'visitors_chart',
//        data: week_data,
//        lineColors: ['#418BCA', '#00bc8c', '#EF6F6C'],
//        xkey: 'date',
//        ykeys: ['pageViews', 'visitors'],
//        labels: ['pageViews', 'visitors'],
//        pointSize: 0,
//        lineWidth: 2,
//        resize: true,
//        fillOpacity: 1,
//        behaveLikeLine: true,
//        gridLineColor: '#e0e0e0',
//        hideHover: 'auto'
//
//    });
//}
//function barChart() {
//    Morris.Bar({
//        element: 'bar_chart',
//        data: year_data.length ? year_data : [{label: "No Data", value: 100}],
//        barColors: ['#418BCA', '#00bc8c'],
//        xkey: 'date',
//        ykeys: ['pageViews', 'visitors'],
//        labels: ['pageViews', 'visitors'],
//        pointSize: 0,
//        lineWidth: 2,
//        resize: true,
//        fillOpacity: 0.4,
//        behaveLikeLine: true,
//        gridLineColor: '#e0e0e0',
//        hideHover: 'auto'
//
//    });
//}
//lineChart();
//barChart();
//$(".sidebar-toggle").on("click", function () {
//    setTimeout(function () {
//        $('#visitors_chart').empty();
//        $('#bar_chart').empty();
//        lineChart();
//        barChart();
//    }, 10);
//});

</script>

{!! Charts::scripts() !!}
{{--{!! $db_chart->script() !!}--}}
{{--{!! $geo->script() !!}--}}
{{--{!! $user_roles->script() !!}--}}
{{--{!! $line_chart->script() !!}--}}
@stop
