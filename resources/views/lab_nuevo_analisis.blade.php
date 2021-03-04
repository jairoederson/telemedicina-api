@extends('layouts.material-lab')
@section('content')
<div id="historial" class="section-content">
    <div class="row background-white">
        <div class="row" >
          <div id="cabecera" class="col s12 title-color align-center">
            <h6 class="title-content content-title">
              NUEVO ANALISIS
            </h6>
          </div>
        </div>
        <div class="row" style="padding-left:20px;padding-right:20px">
          <div class="row">
            <h6><b></b></h6>
          </div>
          <div class="row" style="padding-top: 20px; padding-bottom: 20px">
            <!-- paciente -->
            <div class="col s2 center">
              <img src="{{asset('assets/images/c1.jpg')}}" alt="" width="80px;" style="border-radius: 50%">
            </div>
            <div class="col s4">
              <label for=""><b>Paciente: </b> Juan Perez Olviedo</label><br>
              <label for=""><b>Edad: </b> 35 años</label><br>
              <label for=""><b>Sexo: </b> Masculino</label><br>
              <label for=""><b>Fecha de la muestra: </b> 30/04/2018</label><br>
            </div>
            <div class="col s2 center">
              <img src="{{asset('assets/images/muestra-sangre.png')}}" alt="" width="80px;" style="border-radius: 50%">
            </div>
            <div class="col s4">
              <label for=""><b>Tipo de muestra: </b> Sangre</label><br>
              <label for=""><b>Fecha de solicitud: </b> 30/04/2018</label><br>
              <label for=""><b>Fecha de entrega: </b> 03/05/2018</label><br>
              <!--<label for=""><b>Fecha de la muestra: </b> 02/05/2018</label><br> -->
            </div>
          </div>
          <div class="row right" style="padding-bottom: 25px">
            <a href="/lab-analisis-medico" class="btn format" style="background-color: #868686">Generar Formulario</a>
            <a href="/lab-analisis" class="btn format" style="background-color: #e22715">Volver a tabla de análisis</a>
          </div>

        </div>
      </div>


   </div>
</div>
@endsection
<script type="text/javascript">
function preguntasCategoria(valor){
  if(valor == 'frecuentes'){
    document.getElementById('frecuentes').style.display = 'block';
    document.getElementById('categoria1').style.display = 'none';
    document.getElementById('categoria2').style.display = 'none';
    document.getElementById('categoria3').style.display = 'none';
  }else if (valor == 'categoria1') {
    document.getElementById('frecuentes').style.display = 'none';
    document.getElementById('categoria1').style.display = 'block';
    document.getElementById('categoria2').style.display = 'none';
    document.getElementById('categoria3').style.display = 'none';

  }else if (valor == 'categoria2'){
    document.getElementById('frecuentes').style.display = 'none';
    document.getElementById('categoria1').style.display = 'none';
    document.getElementById('categoria2').style.display = 'block';
    document.getElementById('categoria3').style.display = 'none';
  }else{
    document.getElementById('frecuentes').style.display = 'none';
    document.getElementById('categoria1').style.display = 'none';
    document.getElementById('categoria2').style.display = 'none';
    document.getElementById('categoria3').style.display = 'block';
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
  document.getElementById("historial").style.paddingLeft = '4%';
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
  document.getElementById("historial").style.paddingLeft = '2%';
}
</script>
