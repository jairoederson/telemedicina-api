var acciones =""
+"<div class='text-center'>"
+"<button title='Ver' data-toggle='modal' data-target='#verFinanzas' class='btn-crud btn' style='background-color: #868686'>"
  +"<span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>"
+"</button>&nbsp"
+"<button title='Editar' data-toggle='modal' data-target='#editarFinanzas' class='btn-crud btn' style='background-color: #868686'>"
  +"<span class='glyphicon glyphicon-edit' aria-hidden='true'></span>"
+"</button>&nbsp"
+"<button title='Eliminar' data-toggle='modal' data-target='#eliminarFinanzas' class='color-red btn-crud btn'>"
  +"<span class='glyphicon glyphicon-trash' aria-hidden='true'></span>"
+"</button>"
+"</div>";
  $(function() {
      $('#tablePagos').DataTable({
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
            "Liquidacion",
            "Pedro E.",
            "15/02/2017",
            "15/03/2017",
            "S/. 5000.00",
            acciones
          ],
        ]
      });

      var table = $('#table').DataTable({
          "order": [[3, "desc"]],
          processing: true,
          serverSide: true,
          ajax: '{!! route('admin.activity_log.data') !!}',
          columns: [
              { data: 'causer_id', name: 'causer_id' },
              { data: 'log_name', name: 'log_name' },
              { data: 'description', name: 'description' },
              { data: 'created_at', name:'created_at'}
          ]
      });
  });
