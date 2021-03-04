@extends('layouts.material-lab-sec')
@section('content')
<div id="historial" class="section-content">
  <div class="row background-white">
      <div class="row" >
        <div id="cabecera" class="col s12 title-color align-center">
          <h6 class="title-content content-title">
            COMPROBANTES DE PAGO
          </h6>
        </div>
      </div>
      <div class="row" style="padding-left:20px;padding-right:20px">
        <div class="row padding-top-element">
          <div class="col s12 m12">
              <div class="dataTables_wrapper form-inline dt-material">
                <!-- <div style="position:absolute; margin-top: -60px; margin-left: 990px;">
                  <i class="material-icons" style="color:#adadad">search</i>
                </div> -->
                  <table id="tableComprobantes" class="bordered" style="width: 100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nro. Comprobante</th>
                            <th>Tipo de Comprobante</th>
                            <th>Paciente</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
              </div>

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
