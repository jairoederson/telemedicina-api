
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
var url = window.location.protocol + '//' + window.location.host + '/admin/recetasreg/';
var acciones = 
    '<a href='+ url+ '><div class="text-center">' +
    "<button title='Ver' class='btn-crud btn' style='background-color: #868686;margin-right: 0px'>"+
    "<span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>"+
    "</button></div></a>"
    ;

//    var acciones = `
//    <div class='text-center'>
//      <button title='Ver' data-toggle='modal' data-target='#verReceta' class='btn-crud btn' style='background-color: #868686;margin-right: 0px'>
//      <span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>
//      </button>
//      <button title='Editar' data-toggle='modal' data-target='#editarReceta' class='btn-crud btn' style='display:none;background-color: #868686; margin-right: 0px'>
//      <span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
//      </button>
//      <button title='Receta' data-toggle='modal' data-target='#verDetalleReceta' class='btn-crud btn' style='display:none;background-color: #ee7c12'>
//      <span class='glyphicon glyphicon-list-alt' aria-hidden='true'></span>
//      </button>
//      <button title='Consulta' data-toggle='modal' data-target='#verDetalleConsulta' class='btn-crud btn' style='display:none;background-color: #ee7c12'>
//      <span class='glyphicon glyphicon-tags' aria-hidden='true'></span>
//      </button>
//    </div>
//    `;
      $(function() {
          var tableRecetas = $('#tableReceta').DataTable({
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
                "00201565",
                "Dolor de estomago",
                "<a href='' data-toggle='modal' data-target='#verPacienteReceta'>Cinthia Olivarez Santiago</a>",
                "<a href='' data-toggle='modal' data-target='#verMedicoReceta'>Pedro Espino Perez</a>",
                "12/05/2017",
                acciones
                // "<a onclick='modReceta()' href='#modal1' class='format btn' style='color: #ffffff;background-color: #868686'>Ver receta</a><a onclick='modReceta()' href='#modal1' class='format btn' style='color: #ffffff;background-color: #868686'>Ver consulta</a>",
              ],
            ]
          });

          $('#tableReceta tbody').on( 'click', 'button#btnEliminarReceta', function () {
            var table = $(this);
            $("#eliminarReceta").modal();
            $("#btnEliminarRecetaSi").on('click', function(){
              tableRecetas
                .row( table.parents('tr') )
                .remove()
                .draw();
            })
          });

      });

      // ver detalles consultas
      function consulta1(){

      }
      function consulta2(){

      }
      function consulta3(){

      }
      // ver detalles recetas
      function receta1(){

      }
      function receta2(){

      }
