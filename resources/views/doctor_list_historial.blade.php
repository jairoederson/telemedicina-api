@extends('layouts.material-medico')
@section('content')
<div id="doctor-list-historial" class="section-content">
    <div class="row content-inside">
      <div class="row center">
        <div class="title-color col s12">
          <h6 class="title-content content-title">
            <b>HISTORIALES MEDICOS</b>
          </h6>
        </div>
      </div>
      <div class="row padding-element">
        <div class="col s12 m12">
            <div class="dataTables_wrapper form-inline dt-material">
              <!-- <div style="position:absolute; margin-top: -60px; margin-left: 1030px;">
                <i class="material-icons" style="color:#adadad">search</i>
              </div> -->
                <table id="tableHistorial" class="bordered" style="width: 100% !important">
                  <thead>
                      <tr>
                          <th>ID</th>
                          <th>CODIGO</th>
                          <th>Paciente</th>
                          <th>Fecha de creación</th>
                          <th>Fecha de actualizacion</th>
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
     <div id="modal1" class="modal">
        <div class="modal-head align-right border-bottom">
          <a class="waves-effect modal-action modal-close"><i class="material-icons right icon-color button-cancel" style="">cancel</i></a>
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

                  <img src="http://4.bp.blogspot.com/_iFFqUBkgqDU/SyUjOU8_VSI/AAAAAAAAAlM/MwIs1UhwL7s/s400/sello+col+medi+fam+ourense.jpg" alt="" width="150px">
                <!-- <hr> -->

                <!-- <span>Alejandro T.</span><br>
                <span>Medico Gastroenterólogo</span> -->
              </div>
            </div>
          </div>

          <div class="row footer-detalle">
            <div class="col s12">
              <span>CENTRO DE ESPECIALIDADES MEDICAS - MIFARMA</span>
            </div>
          </div>

          <div class="row buttons-detalle">

            <div class="col s4">
              <a class="waves-effect waves-light btn button-green"><i class="material-icons left">local_printshop</i>Imprimir</a>
            </div>
            <div class="col s4">
            </div>
            <div class="col s4" style="text-align: right">
              <a class="waves-effect waves-light btn button-orange"><i class="material-icons left">file_download</i>Descargar</a>
            </div>

          </div>
        </div>
      </div>
  </div>
</div>
@endsection

<script type="text/javascript">

// $(function() {
//   $('#tableRecetas').DataTable({
//     "language": {
//       "sProcessing":    "Procesando...",
//       "sLengthMenu":    "Mostrar _MENU_ registros",
//       "sZeroRecords":   "No se encontraron resultados",
//       "sEmptyTable":    "Ningún dato disponible en esta tabla",
//       "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
//       "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
//       "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
//       "sInfoPostFix":   "",
//       "sSearch":        "Buscar:",
//       "sUrl":           "",
//       "sInfoThousands":  ",",
//       "sLoadingRecords": "Cargando...",
//       "oPaginate": {
//           "sFirst":    "Primero",
//           "sLast":    "Último",
//           "sNext":    "Siguiente",
//           "sPrevious": "Anterior"
//       },
//       "oAria": {
//           "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
//           "sSortDescending": ": Activar para ordenar la columna de manera descendente"
//       }
//   },
//   "data": [
//     [
//       "Analgesicos para el dolor de cabeza",
//       "Dolor de cabeza",
//       "Pedro Urbina",
//       "05 / 05 / 2018",
//
//     ],
//     [
//       "Agua mas el medicamento por las mañanas",
//       "Dolor de estómago",
//       "Alejandro Salas",
//       "10 / 07 / 20185",
//
//     ],
//     [
//       "Analgesicos para el dolor de cabeza",
//       "Dolor de cabeza",
//       "Pedro Urbina",
//       "11 / 12 / 2018",
//     ],
//   ]
// // });
//
// });

// MODAL
function mod(){
  $('#modal1').modal();
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
  document.getElementById("doctor-list-historial").style.paddingLeft = '4%';
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
  document.getElementById("doctor-list-historial").style.paddingLeft = '2%';
}
</script>
