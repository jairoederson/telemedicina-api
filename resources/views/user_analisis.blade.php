@extends('layouts.material')
@section('content')
<div id="analisis" class="content-ayuda">

  <div class="row content-inside">
    <div class="row">
      <div class="title-color col s12 center">
        <h6 class="title-content content-title">
          <b>ANALISIS DE LABORATORIO</b>
        </h6>
      </div>
    </div>
    <div class="row padding-element">
      <div class="col s12 m12">
          <div class="dataTables_wrapper form-inline dt-material">
            <!-- <div style="position:absolute; margin-top: -60px; margin-left: 1030px;">
              <i class="material-icons" style="color:#adadad">search</i>
            </div> -->
              <table id="tableAnalisis" class="bordered" style="width: 100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Código de análisis</th>
                        <th>Tipo de analisis</th>
                        <th>Fecha de realizacion</th>
                        <th>Fecha de entrega</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
          </div>
            <!-- <div class="row" style="text-align: right">
              <a class="waves-effect btn" style=" background-color: #868686; width: 100%">AGREGAR METODO DE PAGO</a>
            </div> -->
      </div>
   </div>
   <div id="modal1" class="modal" style="background-color: #FFFFFF">
     <div class="modal-cabecera">
       <div class="row">
         <div class="col s6">
           <div class="left title-modal" style="padding-left: 10px;">
             <h5 class="color-white" style="font-size: 20px;"> <b>Detalle de Consulta</b> </h5>
           </div>
         </div>
         <div class="col s6">
           <div class="right title-modal" style="padding-right: 10px;">
             <a class="modal-close" style="color:#383737de">
               <h5>x</h5>
             </a>
           </div>
         </div>
       </div>
     </div>

      <div class="modal-content padding">
        <div class="row cabecera-detalle">
          <div class="col s4 align-center">
            <img src="{{ asset('assets/images/logo_mifarma.jpg') }}" width="150px" alt="">
            <p><b>CENTRO DE ATENCION AL PACIENTE - MIFARMA</b></p>
          </div>
          <div class="col s4">
          </div>
          <div class="col s4 cabecera-datos">
            <span class="receta-name-doctor">Alejandro T.</span><br>
            <span>Medico Gastroenterólogo</span><br>
            <!-- <span>CODIGO: 458 254</span><br> -->
            <span><b>FECHA:</b></span><br>
            <span>12/05/2017</span><br>
            <span><b>NOMBRE DEL PACIENTE</b></span><br>
            <span>Juan Rodriguez valenzuela</span><br>
            <!-- <span><b>EDAD</b></span><br> -->
            <!-- <span>30</span><br> -->
            <!-- <span><b>SEXO</b></span><br> -->
            <!-- <span>Masculino</span><br> -->
          </div>
        </div>

        <div class="row contenido-detalle">
          <div class="col s12">
            <span><b>Gastroenteritis Aguda</b></span>
          </div>
          <div class="row">
            <div class="col s8">
              <ol>
                <li>
                  <p>Medicamento 1</p>
                  <span>Tomar 1 cápsula cada 24 horas por 7 días</span>
                </li>
                <li>
                  <p>Medicamento 2</p>
                  <span>Tomar una cápsula cada 8 horas por 5 días</span>
                </li>
                <li>
                  <p>
                    Guardar reposo total por 4 días
                  </p>
                </li>
              </ol>
            </div>
            <div class="col s4" style="text-align: center">

            </div>
          </div>
        </div>

      </div>
      <div class="modal-pie right">
        <div class="right">
          <a class="waves-effect waves-light btn button-green"><i class="material-icons left">local_printshop</i>Imprimir</a>

          <a class="waves-effect waves-light btn button-orange"><i class="material-icons left">file_download</i>Descargar</a>
        </div>
      </div>
    </div>
</div>
</div>

    @endsection
    <script type="text/javascript">
    function preguntas(valor){
      if(valor == 'frecuentes'){
        document.getElementById("preguntasFrecuentes").style.display = 'block';
        document.getElementById("preguntasConsultas").style.display = 'none';
        document.getElementById("preguntasHistorial").style.display = 'none';
        document.getElementById("preguntasMimonedero").style.display = 'none';
        document.getElementById("preguntasRecetas").style.display = 'none';
        // document.getElementById("preguntasFrecuentes").style.display = 'block';
      }else if (valor == 'consultas') {
        document.getElementById("preguntasFrecuentes").style.display = 'none';
        document.getElementById("preguntasConsultas").style.display = 'block';
        document.getElementById("preguntasHistorial").style.display = 'none';
        document.getElementById("preguntasMimonedero").style.display = 'none';
        document.getElementById("preguntasRecetas").style.display = 'none';
      }else if (valor == 'historial') {
        document.getElementById("preguntasFrecuentes").style.display = 'none';
        document.getElementById("preguntasConsultas").style.display = 'none';
        document.getElementById("preguntasHistorial").style.display = 'block';
        document.getElementById("preguntasMimonedero").style.display = 'none';
        document.getElementById("preguntasRecetas").style.display = 'none';
      }else if (valor == 'recetas') {
        document.getElementById("preguntasFrecuentes").style.display = 'none';
        document.getElementById("preguntasConsultas").style.display = 'none';
        document.getElementById("preguntasHistorial").style.display = 'none';
        document.getElementById("preguntasMimonedero").style.display = 'none';
        document.getElementById("preguntasRecetas").style.display = 'block';
      }else {
        document.getElementById("preguntasFrecuentes").style.display = 'none';
        document.getElementById("preguntasConsultas").style.display = 'none';
        document.getElementById("preguntasHistorial").style.display = 'none';
        document.getElementById("preguntasMimonedero").style.display = 'block';
        document.getElementById("preguntasRecetas").style.display = 'none';
      }
    }

    function mostrar(){
      document.getElementById("content").classList.remove('s11');
      document.getElementById("content").classList.remove('m11');
      document.getElementById("content").classList.add('s10');
      document.getElementById("content").classList.add('m10');
      document.getElementById("nav0").style.display = 'block';
      document.getElementById("nav1").style.display = 'none';
      document.getElementById("logofarma").style.display = 'block';
      document.getElementById("logofarma1").style.display = 'none';
      document.getElementById("hamb1").style.display = 'block';
      document.getElementById("hamb").style.display = 'none';
      document.getElementById("analisis").style.paddingLeft = '4%';
    }
    function ocultar(){
      document.getElementById("content").classList.remove('s10');
      document.getElementById("content").classList.remove('m10');
      document.getElementById("content").classList.add('s11');
      document.getElementById("content").classList.add('m11');
      document.getElementById("nav0").style.display = 'none';
      document.getElementById("nav1").style.display = 'block';
      document.getElementById("logofarma").style.display = 'none';
      document.getElementById("logofarma1").style.display = 'block';
      document.getElementById("hamb1").style.display = 'none';
      document.getElementById("hamb").style.display = 'block';
      document.getElementById("analisis").style.paddingLeft = '2%';
    }
  </script>
