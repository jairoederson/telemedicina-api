
      // NOTAS DEL POSTULANTE
      var misNotas = [
        {
          id: '1',
          contenido: 'pendiente documentos'
        },
        {
          id: '2',
          contenido: 'pendiente CV'
        },
        {
          id: '3',
          contenido: 'pendiente correo'
        },
      ];
      function guardarNota(){
        lenLista = misNotas.length;
        notaContenido = document.getElementById('notaContenido').value
        misNotas.push({
          id: lenLista + 1,
          contenido: notaContenido
        })
        listarNotas()
      }
      function listarNotas(){

        var listaNotas = document.getElementById('misNotas')
        for(var i = 0; i < 3; i++)
        {
          var li = document.createElement("li")
          li.appendChild(document.createTextNode(misNotas[i].contenido))
          li.setAttribute("id", misNotas[i].id);
          li.setAttribute("class", "nota");
          listaNotas.appendChild(li)
        }
      }
      listarNotas()
      // NOTAS DEL POSTULANTE END

      document.getElementById('selectP').onchange = function(){
        // alert(document.getElementById('selectP').value)
        if(document.getElementById('selectP').value == 'Total Postulantes'){
          document.getElementById('tPostulantes').style.display = 'block';
          document.getElementById('tPostulantesPendientes').style.display = 'none';
          document.getElementById('tPostulantesAdmitidos').style.display = 'none';
          document.getElementById('tPostulantesDeclinados').style.display = 'none';
        }else if (document.getElementById('selectP').value == 'Postulantes Pendientes'){
          document.getElementById('tPostulantes').style.display = 'none';
          document.getElementById('tPostulantesPendientes').style.display = 'block';
          document.getElementById('tPostulantesAdmitidos').style.display = 'none';
          document.getElementById('tPostulantesDeclinados').style.display = 'none';
        }else if(document.getElementById('selectP').value == 'Postulantes Admitidos'){
          document.getElementById('tPostulantes').style.display = 'none';
          document.getElementById('tPostulantesPendientes').style.display = 'none';
          document.getElementById('tPostulantesAdmitidos').style.display = 'block';
          document.getElementById('tPostulantesDeclinados').style.display = 'none';
        }else{
          document.getElementById('tPostulantes').style.display = 'none';
          document.getElementById('tPostulantesPendientes').style.display = 'none';
          document.getElementById('tPostulantesAdmitidos').style.display = 'none';
          document.getElementById('tPostulantesDeclinados').style.display = 'block';
        }
      };
var url = window.location.protocol + '//' + window.location.host + '/admin/verpostulante/';
var acciones = 
    '<div class="text-center"><a href='+ url+ '>' +
    "<button title='Ver' class='btn-crud btn' style='background-color: #868686;margin-right: 0px'>"+
    "<span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>"+
    "</button></a>"+
    "      <button title='Editar' data-toggle='modal' data-target='#editarPostulante' class='btn-crud btn' style='background-color: #868686; margin-right: 0px;'>"+
    "       <span class='glyphicon glyphicon-edit' aria-hidden='true'></span>"+
    "      </button>" +
    "</div>"
    ;
    
    
//    var acciones =`
//    <div class='text-center'>
//      <button title='Ver' data-toggle='modal' data-target='#verPostulante' class='btn' style='background-color: #868686; margin-right: 0px;'>
//        <span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>
//      </button>
//      <button title='Editar' data-toggle='modal' data-target='#editarPostulante' class='btn-crud btn' style='background-color: #868686; margin-right: 0px;'>
//        <span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
//      </button>
//    </div>`;

    var accionesPendiente =`
    <div class='text-center'>
    <button title='Ver' data-toggle='modal' data-target='#verPostulante' class='btn-crud btn' style='background-color: #868686'>
      <span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>
    </button>
    <button title='Editar' data-toggle='modal' data-target='#editarPostulante' class='btn-crud btn' style='background-color: #868686'>
      <span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
    </button>
    <button id='btnEliminarPostulantePendiente' title='Eliminar' data-toggle='modal' data-target='#eliminarPostulante' class='btn-crud btn color-red'>
      <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
    </button>
    </div>`;
      $(function() {
        var tableTotalPostulantes = $('#tableTotalPostulantes').DataTable({
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

            [
              "1",
              "45854541",
              "Salomon",
              "Soto Barraza",
              "Oftalmologia",
              "Lima- Lima",
              "Masculino",
              "32",
              "Admitido",
              acciones
            ],

            [
              "2",
              "45854541",
              "Salomon",
              "Soto Barraza",
              "Oftalmologia",
              "Lima- Lima",
              "Masculino",
              "32",
              "Pendiente",
              acciones
            ],

            [
              "3",
              "45854541",
              "Salomon",
              "Soto Barraza",
              "Oftalmologia",
              "Lima- Lima",
              "Masculino",
              "32",
              "Declinado",
              acciones
            ],
          ]
        });

        $('#tableTotalPostulantes tbody').on( 'click', 'button#btnEliminarPostulante', function () {
          var table = $(this);
          $("#eliminarPostulante").modal()
          $("#btnEliminarSi").on('click', function(){
            tableTotalPostulantes
            .row( table.parents('tr') )
            .remove()
            .draw();
          })
        });

        var tableTotalPostulantesPendientes = $('#tablePostulantesPendientes').DataTable({
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
            [
              "1",
              "45854541",
              "Salomon",
              "Soto Barraza",
              "Oftalmologia",
              "Lima- Lima",
              "Masculino",
              "32",
              "Pendiente",
              acciones
            ],
          ]

        });

        var tableTotalPostulantesAdmitidos = $('#tablePostulantesAdmitidos').DataTable({
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
            [
              "1",
              "45854541",
              "Salomon",
              "Soto Barraza",
              "Oftalmologia",
              "Lima- Lima",
              "Masculino",
              "32",
              "Admitido",
              acciones
            ],
          ]

        })

        var tableTotalPostulantesDeclinados = $('#tablePostulantesDeclinados').DataTable({
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
            [
              "1",
              "45854541",
              "Salomon",
              "Soto Barraza",
              "Oftalmologia",
              "Lima- Lima",
              "Masculino",
              "32",
              "Declinado",
              acciones
            ],
          ]

        })
      });
