// NOTAS DEL POSTULANTE
var misNotas = [
  {
    id: "1",
    contenido: "pendiente documentos",
  },
  {
    id: "2",
    contenido: "pendiente CV",
  },
  {
    id: "3",
    contenido: "pendiente correo",
  },
];
function guardarNota() {
  var lenLista = misNotas.length;
  var notaContenido = document.getElementById("notaContenido").value;
  misNotas.push({
    id: lenLista + 1,
    contenido: notaContenido,
  });
  listarNotas();
}
function listarNotas() {
  var listaNotas = document.getElementById("misNotas");
  for (var i = 0; i < 3; i++) {
    var li = document.createElement("li");
    li.appendChild(document.createTextNode(misNotas[i].contenido));
    li.setAttribute("id", misNotas[i].id);
    li.setAttribute("class", "nota");
    listaNotas.appendChild(li);
  }
}
listarNotas();
// NOTAS DEL POSTULANTE END

document.getElementById("selPagos").onchange = function () {
  // alert(document.getElementById('selectP').value)
  if (document.getElementById("selPagos").value == "Pagos a empresas") {
    document.getElementById("pagosEmpresas").style.display = "block";
    document.getElementById("pagos").style.display = "none";
  } else {
    document.getElementById("pagosEmpresas").style.display = "none";
    document.getElementById("pagos").style.display = "block";
  }
};

var url =
  window.location.protocol +
  "//" +
  window.location.host +
  "/admin/detallepagos/";
//var acciones =
//    '<div class="text-center"><a href='+ url+ '>' +
//    "<button title='Ver' class='btn-crud btn' style='background-color: #868686;margin-right: 0px'>"+
//    "<span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>"+
//    "</button></a>"+
//    "</div>"
//    ;
//
//
//    var url2 = window.location.protocol + '//' + window.location.host + '/admin/detallepagosempresa/';
//var accionesEmpresa =
//    '<div class="text-center"><a href='+ url2+ '>' +
//    "<button title='Ver' class='btn-crud btn' style='background-color: #868686;margin-right: 0px'>"+
//    "<span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>"+
//    "</button></a>"+
//
//    "</div>"
//    ;

var acciones = `
    <div class='text-center'>
    <button title='Ver' onclick="location.href='/admin/detallepagos/'" class='btn-crud btn' style='background-color: #868686;margin-right: 0px'>
    <span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>
    </button>
    <button title='Ver' data-toggle='modal' data-target='#verPagosEmpresa' class='btn-crud btn' style='background-color: #868686'>
    <span class='glyphicon glyphicon-usd' aria-hidden='true'></span>
    </button>
    </div>
    `;

var accionesEmpresa = `
    <div class='text-center'>
    <button title='Ver' onclick="location.href='/admin/detallepagosempresa/'" class='btn-crud btn' style='background-color: #868686;margin-right: 0px'>
    <span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>
    </button>
    <button title='Ver' data-toggle='modal' data-target='#verPagosEmpresa' class='btn-crud btn' style='background-color: #868686'>
    <span class='glyphicon glyphicon-usd' aria-hidden='true'></span>
    </button>
    </div>
    `;

//    var accionesEmpresa = `
//    <div class='text-center'>
//    <button title='Ver' data-toggle='modal' data-target='#verPagosEmpresa' class='btn-crud btn' style='background-color: #868686'>
//    <span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>
//    </button>
//    <button title='Editar' data-toggle='modal' data-target='#editarPagosEmpresa' class='btn-crud btn' style='background-color: #868686'>
//    <span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
//    </button>
//    <button id='btnEliminarPagoEmpresa' title='Eliminar' class='btn-crud btn color-red'>
//    <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
//    </button>
//    </div>
//    `;

// VERIFICAMOS SI EL ESTADO ES PENDIENTE O RAEALIZADO Y MOSTRAMOS EL MODAL RESPECTIVO
var rating = `
<div class='text-center'>
    <span class='glyphicon glyphicon-star' aria-hidden='true' style='color: #f1c420; font-size: 18px;'></span> &nbsp;
    <span class='glyphicon glyphicon-star' aria-hidden='true' style='color: #f1c420; font-size: 18px;'></span>&nbsp;
    <span class='glyphicon glyphicon-star' aria-hidden='true' style='color: #f1c420; font-size: 18px;'></span>&nbsp;
    <span class='glyphicon glyphicon-star' aria-hidden='true' style='color: #f1c420; font-size: 18px;'></span>&nbsp;
    <span class='glyphicon glyphicon-star' aria-hidden='true' style='color: #f1c420; font-size: 18px;'></span>
</div>`;

$(function () {
  var tablePagos = $("#tablePagos__").DataTable({
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
    data: [
      [
        "1",
        "Juan Soto Morales",
        rating,
        "S/.2000.00",
        "Medicina General",
        "02/05/2018 - 02/06/2018",
        "Pendiente",
        acciones,
      ],
      [
        "2",
        "Juan Soto Morales",
        rating,
        "S/.2000.00",
        "Medicina General",
        "02/05/2018 - 02/06/2018",
        "Realizado",
        acciones,
      ],
    ],
  });

  // CUSTOM MODAL WITH STATUS PAGOS
  $("#tablePagos tbody").on("click", "tr", function () {
    var data = tablePagos.row(this).data();
    if (data[5] == "Realizado") {
      document.getElementById("estadoPago").style.display = "none";
      document.getElementById("estadoPagoN").style.display = "block";
    } else {
      document.getElementById("estadoPago").style.display = "block";
      document.getElementById("estadoPagoN").style.display = "none";
    }
  });
  // CUSTOM MODAL WITH STATUS PAGOS END

  // ELIMINAR UN REGISTRO
  $("#tablePagos tbody").on("click", "button#btnEliminarPago", function () {
    var table = $(this);
    $("#eliminarPagos").modal();
    $("#btnEliminarPagoSi").on("click", function () {
      tablePagos.row(table.parents("tr")).remove().draw();
    });
  });
  // ELIMINAR REGISTRO END

  var tablePagosEmpresa = $("#tablePagosEmpresa").DataTable({
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
    data: [
      [
        "1",
        "Empresa",
        "S/.20000.00",
        "Servicio para afiliados",
        "02/05/2018 - 03/06/2018",
        "Realizado",
        accionesEmpresa,
      ],
      [
        "2",
        "Empresa",
        "S/.20000.00",
        "Servicio para afiliados",
        "02/05/2018 - 03/06/2018",
        "Pendiente",
        accionesEmpresa,
      ],
      [
        "3",
        "Empresa",
        "S/.20000.00",
        "Servicio para afiliados",
        "02/05/2018 - 03/06/2018",
        "Realizado",
        accionesEmpresa,
      ],
      [
        "4",
        "Empresa",
        "S/.20000.00",
        "Servicio para afiliados",
        "02/05/2018 - 03/06/2018",
        "Pendiente",
        accionesEmpresa,
      ],
    ],
  });

  // CUSTOM MODAL WITH STATUS PAGOS
  $("#tablePagosEmpresa tbody").on("click", "tr", function () {
    var data = tablePagos.row(this).data();
    if (data[5] == "Realizado") {
      document.getElementById("estadoPago").style.display = "none";
      document.getElementById("estadoPagoN").style.display = "block";
    } else {
      document.getElementById("estadoPago").style.display = "block";
      document.getElementById("estadoPagoN").style.display = "none";
    }
  });

  // CUSTOM MODAL WITH STATUS PAGOS END

  // ELIMINAR UN REGISTRO
  $("#tablePagosEmpresa tbody").on(
    "click",
    "button#btnEliminarPagoEmpresa",
    function () {
      var table = $(this);
      $("#eliminarPagosEmpresa").modal();
      $("#btnEliminarPagoEmpresaSi").on("click", function () {
        tablePagosEmpresa.row(table.parents("tr")).remove().draw();
      });
    }
  );
  // ELIMINAR REGISTRO END
});
