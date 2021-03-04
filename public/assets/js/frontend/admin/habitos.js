//                `<a onclick="window.open('https://cel.reniec.gob.pe/valreg/valreg.do','_blank','location=yes,height=570,width=520,scrollbars=yes,status=yes');">28525254</a>`,
$(function () {
  $("#menuhabitos").addClass("active");
  var tablehabitos = $("#tablehabitos").DataTable({
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo:
        "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    },
    columns: [{ data: "name" }, { data: "description" }, { data: "acciones" }],
  });
});

function listarhabitos() {
  $.ajax({
    type: "post",
    url: urllistarhabitos,
    dataType: "json",
    data: { _token: token },
    beforeSend: function (xhr) {
      //progreso();
    },
  })
    .done(function (dataRpta) {
      //alert(JSON.stringify(dataRpta));
      $("#tablehabitos").DataTable().clear().draw();
      jQuery.each(dataRpta, function (i, val) {
        val.acciones =
          `
                  <div class='text-center'>
                    
              <button title='Editar' onclick="location.href='/admin/actualizarhabitos/` +
          val.id +
          `'" class='btn-crud btn btn-format'>
                    <span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
                  </button>
                    <button  onclick="eliminar(` +
          val.id +
          `)" title='Eliminar' class='delete btn-crud btn color-red'>
                      <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
                    </button>
                  </div>`;

        $("#tablehabitos").DataTable().row.add(val).draw();
      });
    })
    .fail(function (jqXHR, textStatus) {
      alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
    })
    .always(function () {
      //cerrarProgreso();
    });
}

function eliminarhabitos(id) {
  $.ajax({
    type: "post",
    url: eliminarhabitos,
    dataType: "json",
    data: { id_habitos: id, _token: token },
    beforeSend: function (xhr) {
      //alert(id);
    },
  })
    .done(function (dataRpta) {
      listarhabitos();
    })
    .fail(function (jqXHR, textStatus) {
      alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
    })
    .always(function () {});
}

function eliminar(id) {
  swal(
    {
      title: "Eliminar?",
      text: "esta Seguro de eliminar!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55  ",
      confirmButtonText: "Si, eliminalo!",
      closeOnConfirm: false,
    },
    function () {
      eliminarhabitos(id);
      swal("Eliminado!", "eliminacion correcta.", "success");
    }
  );
}
