@extends('layouts.material-lab')
@section('content')
<div id="historial" class="section-content">
    <div class="row background-white">
        <div class="row" >
          <div id="cabecera" class="col s12 title-color align-center">
            <h6 class="title-content content-title">
              FORMULARIO ANALISIS MEDICO
            </h6>
          </div>
        </div>
        <div class="row" style="padding-left:20px;padding-right:20px">
          <div class="row" style="padding-top: 25px">
            <label><b>TIPO DE ANALISIS: </b></label>
            <label for="">Sangre</label>
          </div>
          <div class="row" style="padding-top: 20px; padding-bottom: 20px">
            <div class="input-field col s4">
              <input id="email" type="number" class="validate">
              <label for="email" data-error="wrong" data-success="right">Sodio (Na / mmol/L)</label>
            </div>
            <div class="input-field col s4">
              <input id="email" type="number" class="validate">
              <label for="email" data-error="wrong" data-success="right">Potasio (K / mmol/L)</label>
            </div>
            <div class="input-field col s4">
              <input id="email" type="number" class="validate">
              <label for="email" data-error="wrong" data-success="right">Urea (mmol/L	)</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s4">
              <input id="email" type="number" class="validate">
              <label for="email" data-error="wrong" data-success="right">Creatinina (µmol/L)</label>
            </div>
            <div class="input-field col s4">
              <input id="email" type="number" class="validate">
              <label for="email" data-error="wrong" data-success="right">Glucosa (mmol/L	)</label>
            </div>
          </div>
          <div class="row right" style="padding-bottom:25px">
            <a href="/lab-analisis" class="btn format" style="background-color: #868686">Guardar Análisis</a>
            <!-- <a href="/lab-analisis" class="btn" style="background-color: #e22715">Volver a tabla de análisis</a> -->
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
