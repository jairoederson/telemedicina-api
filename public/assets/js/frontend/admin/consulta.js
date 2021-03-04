function convertirSeg(time) {
  var minutes = Math.floor(time / 60);
  var seconds = time % 60;

  //Anteponiendo un 0 a los minutos si son menos de 10
  minutes = minutes < 10 ? "0" + minutes : minutes;

  //Anteponiendo un 0 a los segundos si son menos de 10
  seconds = seconds < 10 ? "0" + seconds : seconds;

  var result = minutes + ":" + seconds; // 161:30

  return result;
}

function listarConsultas2() {
  $.ajax({
    type: "post",
    url: urllistar2,
    dataType: "json",
    data: { _token: token },
    beforeSend: function (xhr) {
      //progreso();
    },
  })
    .done(function (dataRpta) {
      //alert(JSON.stringify(dataRpta));
      $("#tableConsulta2").DataTable().clear().draw();
      jQuery.each(dataRpta, function (i, val) {
        val.duration = convertirSeg(val.duration);
        val.price = "S/. " + val.price;
        val.doctor =
          "<a href='/admin/vermedicos/" +
          val.doctorusid +
          "'>" +
          val.doctor +
          "</a>";
        val.patient =
          "<a href='/admin/verpaciente/" +
          val.pacienteusid +
          "'>" +
          val.patient +
          "</a>";
        if (val.modalidad == 2) {
          val.modalidad = "Presencial";
        } else {
          val.modalidad = "Online";
        }
        if (val.new_date != null) {
          val.date = val.new_date;
        }
        val.acciones =
          `
                  <div class='text-center'>
                    <button title='Ver' onclick="location.href='/admin/verconsulta/` +
          val.id +
          `'" class='btn-crud btn btn-format'>
                      <span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>
                    </button>
                  </div>`;
        if (val.statuspayment == "1") {
          val.statuspayment = "Pagado";
        } else {
          val.statuspayment = "No Pagado";
        }
        if (val.payment_method == "1") {
          val.payment_method = "Efectivo";
        } else {
          val.payment_method = "Tarjeta";
        }
        // val.medicamento =
        //   "<a href='/admin/verreceta/" + val.id + "'>Medicamento</a>";
        $("#tableConsulta2").DataTable().row.add(val).draw();
      });
    })
    .fail(function (jqXHR, textStatus) {
      alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
    })
    .always(function () {
      //cerrarProgreso();
    });
}

function listarConsultas3() {
  $.ajax({
    type: "post",
    url: urllistar3,
    dataType: "json",
    data: { _token: token },
    beforeSend: function (xhr) {
      //progreso();
    },
  })
    .done(function (dataRpta) {
      //alert(JSON.stringify(dataRpta));
      $("#tableConsulta3").DataTable().clear().draw();
      jQuery.each(dataRpta, function (i, val) {
        val.duration = convertirSeg(val.duration);
        val.price = "S/. " + val.price;
        val.doctor =
          "<a href='/admin/vermedicos/" +
          val.doctorusid +
          "'>" +
          val.doctor +
          "</a>";
        val.patient =
          "<a href='/admin/verpaciente/" +
          val.pacienteusid +
          "'>" +
          val.patient +
          "</a>";
        if (val.modalidad == 2) {
          val.modalidad = "Presencial";
        } else {
          val.modalidad = "Online";
        }
        if (val.new_date != null) {
          val.date = val.new_date;
        }
        if (val.payment_method == "1") {
          val.payment_method = "Efectivo";
        } else {
          val.payment_method = "Tarjeta";
        }
        val.acciones =
          `
                  <div class='text-center'>
                    <button title='Ver' onclick="location.href='/admin/verconsulta/` +
          val.id +
          `'" class='btn-crud btn btn-format'>
                      <span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>
                    </button>
                  </div>`;
        // val.medicamento =
        //   "<a href='/admin/verreceta/" + val.id + "'>Medicamento</a>";
        $("#tableConsulta3").DataTable().row.add(val).draw();
      });
    })
    .fail(function (jqXHR, textStatus) {
      alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
    })
    .always(function () {
      //cerrarProgreso();
    });
}
function listarConsultas(estado) {
  $.ajax({
    type: "post",
    url: urllistar,
    dataType: "json",
    data: { estado: estado, _token: token },
    beforeSend: function (xhr) {
      //progreso();
    },
  })
    .done(function (dataRpta) {
      //alert(JSON.stringify(dataRpta));
      $("#tableConsulta").DataTable().clear().draw();
      jQuery.each(dataRpta, function (i, val) {
        // var Modalidad = "Online";

        val.duration = convertirSeg(val.duration);
        val.price = "S/. " + val.price;
        val.doctor =
          "<a href='/admin/vermedicos/" +
          val.doctorusid +
          "'>" +
          val.doctor +
          "</a>";
        val.patient =
          "<a href='/admin/verpaciente/" +
          val.pacienteusid +
          "'>" +
          val.patient +
          "</a>";
        val.acciones =
          `
                <div class='text-center'>
                  <button title='Ver' onclick="location.href='/admin/verconsulta/` +
          val.id +
          `'" class='btn-crud btn btn-format'>
                    <span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>
                  </button>
                   <button onclick="CambiarEstado(` +
          val.id +
          `)" title='Cambiar Estado' class='btn-crud btn color-red'>
                  <span class='glyphicon glyphicon-ok' aria-hidden='true'></span>
                </button>
                </button>
                   <button onclick="location.href='/admin/reprogramarconsulta/` +
          val.id +
          `'" title='Reprogramar Consulta' class='btn-crud btn color-red'>
                  <span class='glyphicon glyphicon-calendar' aria-hidden='true'></span>
                </button>
                <button onclick="CancelarConsulta(` +
          val.id +
          `)" title='Cancelar Consulta' class='btn-crud btn color-red'>
                <span class='glyphicon glyphicon-remove' aria-hidden='true'></span>
              </button>`;

        if (val.modalidad == 2) {
          val.modalidad = "Presencial";
        } else {
          val.modalidad = "Online";
        }

        if (val.new_date != null) {
          val.date = val.new_date;
        }
        if (val.statuspayment == "1") {
          val.statuspayment = "Pagado";
          val.acciones = val.acciones + `</div>`;

          if (val.payment_method == "1") {
            val.payment_method = "Efectivo";
          } else {
            val.payment_method = "Tarjeta";
          }
        } else {
          val.statuspayment = "No Pagado";
          if (val.payment_method == "1") {
            val.payment_method = "Efectivo";
            val.acciones =
              val.acciones +
              `<button onclick="ActualizarPago(` +
              val.id +
              `)" title='Actualizar Pago' class='btn-crud btn color-red'>
                <span class='glyphicon glyphicon-tasks' aria-hidden='true'></span>
              </button></div>`;
          } else {
            val.payment_method = "Tarjeta";

            val.acciones = val.acciones + `</div>`;
          }
        }

        // val.medicamento =
        //   "<a href='/admin/verreceta/" + val.id + "'>Medicamento</a>";
        $("#tableConsulta").DataTable().row.add(val).draw();
      });
    })
    .fail(function (jqXHR, textStatus) {
      alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
    })
    .always(function () {
      //cerrarProgreso();
    });
}
listarConsultas2();
listarConsultas3();

var url =
  window.location.protocol +
  "//" +
  window.location.host +
  "/admin/asociadoreg/";
var acciones =
  "<a href=" +
  url +
  '><div class="text-center">' +
  "<button title='Ver' class='btn-crud btn' style='background-color: #868686;margin-right: 0px'>" +
  "<span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>" +
  "</button></div></a>";
//    var acciones = `
//    <button title='Ver' data-toggle='modal' data-target='#verConsulta' class='btn-crud btn' style='background-color: #868686; margin-right: 0px'>
//    <span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>
//    </button>
//    <button id='btnEliminarConsulta' title='Eliminar' class='btn-crud btn color-red'>
//    <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
//    </button>
//    `;
function CambiarEstado(id) {
  swal(
    {
      title: "Cambiar Estado?",
      text: "esta Seguro de cambiar a consulta atendida!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55  ",
      confirmButtonText: "Si, Cambialo!",
      closeOnConfirm: false,
    },
    function () {
      CambiarEstados(id);
      swal("Actualizacion!", "actualizacion correcta.", "success");
    }
  );
}
function CancelarConsulta(id) {
  swal(
    {
      title: "Cambiar Estado?",
      text: "esta Seguro de cambiar a consulta cancelada!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55  ",
      confirmButtonText: "Si, Cambialo!",
      closeOnConfirm: false,
    },
    function () {
      CancelarConsultas(id);
      swal("Actualizacion!", "actualizacion correcta.", "success");
    }
  );
}
function ActualizarPago(id) {
  swal(
    {
      title: "Cambiar Estado?",
      text: "esta Seguro de actualizar pago!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55  ",
      confirmButtonText: "Si, Cambialo!",
      closeOnConfirm: false,
    },
    function () {
      ActualizarPagos(id);
      swal("Actualizacion!", "actualizacion correcta.", "success");
    }
  );
}
function CambiarEstados(id) {
  $.ajax({
    type: "post",
    url: urlcambiarestados,
    dataType: "json",
    data: { id_consulta: id, _token: token },
    beforeSend: function (xhr) {
      //alert(id);
    },
  })
    .done(function (dataRpta) {
      var estado = $("#cmboConsultas").val();
      listarConsultas(estado);
      listarConsultas2();
    })
    .fail(function (jqXHR, textStatus) {
      alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
    })
    .always(function () {});
}
function CancelarConsultas(id) {
  $.ajax({
    type: "post",
    url: urlcancelar,
    dataType: "json",
    data: { id_consulta: id, _token: token },
    beforeSend: function (xhr) {
      //alert(id);
    },
  })
    .done(function (dataRpta) {
      var estado = $("#cmboConsultas").val();
      listarConsultas(estado);
      listarConsultas3();
    })
    .fail(function (jqXHR, textStatus) {
      alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
    })
    .always(function () {});
}
function ActualizarPagos(id) {
  $.ajax({
    type: "post",
    url: urlactualizarpagos,
    dataType: "json",
    data: { id_consulta: id, _token: token },
    beforeSend: function (xhr) {
      //alert(id);
    },
  })
    .done(function (dataRpta) {
      var estado = $("#cmboConsultas").val();
      listarConsultas(estado);
      listarConsultas3();
    })
    .fail(function (jqXHR, textStatus) {
      alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
    })
    .always(function () {});
}
$(function () {
  var tableConsultas = $("#tableConsulta").DataTable({
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
    columns: [
      { data: "doctor" },
      { data: "patient" },
      { data: "date" },
      { data: "duration" },
      { data: "price" },
      { data: "statuspayment" },
      { data: "modalidad" },
      { data: "payment_method" },
      //            {"data": "medio"},
      { data: "acciones" },
    ],
    rowCallback: function (row, data, dataIndex) {
      if (data["statusquery"] == "2") {
        $(row).addClass("red");
      }
    },
    //            "data": [
    //              [
    //                "1",
    //                "<a href='' data-toggle='modal' data-target='#verMedicoConsulta'>Juan Perez Olviedo</a>",
    //                "<a href='' data-toggle='modal' data-target='#verPacienteConsulta'>Cinthia Olivarez Santiago</a>",
    //                "15/02/2017",
    //                "10 minutos",
    //                "S/. 20.00",
    //                "App Llamada",
    //                "<a href='' data-toggle='modal' data-target='#verConsultaReceta' >Medicamento</a>",
    //                acciones
    //              ],
    //            ]
  });

  var tableConsultas2 = $("#tableConsulta2").DataTable({
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
    columns: [
      { data: "doctor" },
      { data: "patient" },
      { data: "date" },
      { data: "duration" },
      { data: "price" },
      { data: "statuspayment" },
      { data: "modalidad" },
      { data: "payment_method" },
      //            {"data": "medio"},
      { data: "acciones" },
    ],
    //            "data": [
    //              [
    //                "1",
    //                "<a href='' data-toggle='modal' data-target='#verMedicoConsulta'>Juan Perez Olviedo</a>",
    //                "<a href='' data-toggle='modal' data-target='#verPacienteConsulta'>Cinthia Olivarez Santiago</a>",
    //                "15/02/2017",
    //                "10 minutos",
    //                "S/. 20.00",
    //                "App Llamada",
    //                "<a href='' data-toggle='modal' data-target='#verConsultaReceta' >Medicamento</a>",
    //                acciones
    //              ],
    //            ]
  });

  var tableConsultas3 = $("#tableConsulta3").DataTable({
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
    columns: [
      { data: "doctor" },
      { data: "patient" },
      { data: "date" },
      { data: "duration" },
      { data: "price" },
      { data: "modalidad" },
      { data: "payment_method" },
      //            {"data": "medio"},
      { data: "acciones" },
    ],
    //            "data": [
    //              [
    //                "1",
    //                "<a href='' data-toggle='modal' data-target='#verMedicoConsulta'>Juan Perez Olviedo</a>",
    //                "<a href='' data-toggle='modal' data-target='#verPacienteConsulta'>Cinthia Olivarez Santiago</a>",
    //                "15/02/2017",
    //                "10 minutos",
    //                "S/. 20.00",
    //                "App Llamada",
    //                "<a href='' data-toggle='modal' data-target='#verConsultaReceta' >Medicamento</a>",
    //                acciones
    //              ],
    //            ]
  });
  $("#cmboConsultas").trigger("change");
});
$("#cmboConsultas").on("change", function (e) {
  listarConsultas(e.target.value);
});
