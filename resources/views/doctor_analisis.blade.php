@extends('layouts.material-medico')
@section('content')
<div id="analisis" class="section-analisis">
    <div class="row background-white">
        <div class="row" >
          <div id="cabecera" class="col s12 title-color align-center">
            <h6 class="title-content content-title">
              <b>ANALISIS CLINICO</b>
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
      </div>
   </div>
</div>
@endsection
<script type="text/javascript">
  $('.paginate_page').val('Página');
  var table = $('#tableAnalisis').DataTable({
    "language": {
      "sProcessing":    "Procesando...",
      "sLengthMenu":    "Mostrar _MENU_ registros",
      "sZeroRecords":   "No se encontraron resultados",
      "sEmptyTable":    "Ningún dato disponible en esta tabla",
      "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
      "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix":   "",
      "sSearch":        "Buscar:",
      "sUrl":           "",
      "sInfoThousands":  ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
          "sFirst":    "Primero",
          "sLast":    "Último",
          "sNext":    "Siguiente",
          "sPrevious": "Anterior"
      },
      "oAria": {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
  },
  "data": [
    @for($i=0; $i < 20; $i++)
    [
      "1",
      "000252454",
      "Glucosa",
      "05 / 04 / 2018",
      "05 / 05 / 2018",
      "<a onclick='modReceta()' href='#modal1' class='modal-trigger waves-effect btn btn-color' style='background-color: #868686; width: auto'>VER</a>",
    ],
    @endfor
  ]
  });
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
