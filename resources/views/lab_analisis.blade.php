@extends('layouts.material-lab')
@section('content')
<div id="historial" class="section-content">
    <div class="row background-white">
        <div class="row" >
          <div id="cabecera" class="col s12 title-color align-center">
            <h6 class="title-content content-title">
              ANALISIS MEDICO
            </h6>
          </div>
        </div>
        <div class="row" style="padding-left:15px;padding-right:15px">
          <div class="row" style="padding: 25px 2px 15px 0px">
            <div class="col s12 m12">
                <div class="dataTables_wrapper form-inline dt-material">
                    <table id="tableAnalisis" class="bordered" style="width: 100%">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Código de análisis</th>
                              <th>Tipo de analisis</th>
                              <th>Fecha de solicitud</th>
                              <th>Fecha de entrega</th>
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

<!-- MODAL -->
<div id="verAnalisis" class="modal">

  <div class="modal-cabecera">
    <div class="row">
      <div class="col s6">
        <div class="left title-modal" style="padding-left: 10px;">
          <h5 class="color-white" style="font-size: 20px;"> <b>Analisis Medico</b> </h5>
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

  <div class="modal-content">
    <div class="row modal-cabecera">

    </div>
    <div class="row center">
      Detalle de analisis medico
    </div>
    <div class="row margin-top-element">

    </div>

  </div>

  <div class="modal-pie right">
    <div class="right">
      <br><br>
      <!-- <button type="button" name="button" class="btn button-green format">Ver receta</button> -->
    </div>
  </div>
</div>
<!-- MODAL END -->

<!-- MODAL -->
<div id="enviarAnalisisSecretaria" class="modal">

  <div class="modal-cabecera">
    <div class="row">
      <div class="col s6">
        <div class="left title-modal" style="padding-left: 10px;">
          <h5 class="color-white" style="font-size: 20px;"> <b>Envío de análisis Médico</b> </h5>
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

  <div class="modal-content">
    <div class="row modal-cabecera">

    </div>
    <div class="row center">
      ¿Desea enviar el análisis clínico al area de secretaria?
    </div>
    <div class="row margin-top-element">

    </div>

  </div>

  <div class="modal-pie right">
    <div class="right">
      <button type="button" name="button" class="btn button-green format">Si</button>
      <button type="button" name="button" class="btn button-orange format">No</button>
    </div>
  </div>
</div>
<!-- MODAL END -->
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
