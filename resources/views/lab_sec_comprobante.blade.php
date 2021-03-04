@extends('layouts.material-lab-sec')
@section('content')
<div id="historial" class="section-content">
  <div class="row background-white">
      <div class="row" >
        <div id="cabecera" class="col s12 title-color align-center">
          <h6 class="title-content content-title">
            NUEVO COMPROBANTE DE PAGO
          </h6>
        </div>
      </div>
      <div class="row" style="padding-left:20px;padding-right:20px">
        <div class="row padding-element">
          <div class="input-field col s6">
            <input id="codComprobante" name="codComprobante" type="email" class="validate">
            <label for="codComprobante" data-error="wrong" data-success="right">Ingresar Código de comprobante de pago</label>
          </div>
       </div>
       <div class="row padding-element">
         <div class="input-field col s4">
            <select name="tipoComprobante" id="tipoComprobante">
              <option value="" disabled selected>Seleccione una Opción</option>
              <option value="1">Boleta</option>
              <option value="2">Factura</option>
              <option value="3">Boucher</option>
            </select>
            <label>Tipo de comprobante</label>
          </div>

         <div class="input-field col s3">
           <input id="nroComprobante" name="nroComprobante" type="email" class="validate">
           <label for="nroComprobante" data-error="wrong" data-success="right">Nro. Comprobante</label>
         </div>

         <div class="input-field col s5">
           <input id="email" type="email" class="validate">
           <label for="email" data-error="wrong" data-success="right"></label>
         </div>

       </div>
       <div class="row padding-element right">
         <a id="guardar" href="/lab-sec-list-comprobante" onclick="guardar()" style="width:auto;" class="waves-effect btn button-cuenta format">Guardar Comprobante</a>
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
