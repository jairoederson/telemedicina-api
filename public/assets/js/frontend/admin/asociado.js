function listarAsociados() {
    $.ajax({
        type: 'post',
        url: urllistarasociado,
        dataType: "json",
        data: {'_token': token},
        beforeSend: function (xhr) {
            //progreso();
        }
    }).done(function (dataRpta) {
        //alert(JSON.stringify(dataRpta));
        $('#tableAsociado').DataTable().clear().draw();
        jQuery.each(dataRpta, function (i, val) {

            val.acciones = `
            <div class='text-center'>
                <button title='Ver' onclick="location.href='/admin/verasociado/` + val.id + `'" class='btn-crud btn btn-format'>
                <span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>
                </button>
            <button title='Editar'  onclick="location.href='/admin/actualizarasociado/` + val.id + `'"  class='btn-crud btn btn-format'>
                <span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
                </button>
            <button onclick="eliminar(` + val.id + `)" title='Eliminar' class='btn-crud btn color-red'>
                <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
            </button>
            </div>`;

            $('#tableAsociado').DataTable().row.add(val).draw();
        });


    }).fail(function (jqXHR, textStatus) {
        alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
    }).always(function () {
        //cerrarProgreso();
    });
}

function eliminarAsociado(id) {

    $.ajax({
        type: 'post',
        url: urleliminarasociado,
        dataType: "json",
        data: {idcompania: id, '_token': token},
        beforeSend: function (xhr) {
            //alert(id);
        }
    }).done(function (dataRpta) {
        //alert(JSON.stringify(dataRpta));

        listarAsociados();

        //alert(dataRpta.message);
    }).fail(function (jqXHR, textStatus) {
        alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
    }).always(function () {
    });

}


function eliminar(id) {

    swal({
        title: "Eliminar?",
        text: "esta Seguro de eliminar!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55  ",
        confirmButtonText: "Si, eliminalo!",
        closeOnConfirm: false
    }, function () {
        eliminarAsociado(id);
        swal("Eliminado!", "eliminacion correcta.", "success");
    });
}


var ctx = document.getElementById("totalFacturacionAsociado");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"],
        datasets: [{
                label: 'Consultas mensuales',
                data: [120, 130, 170, 130, 150, 190, 170, 150, 320, 220, 180, 150],
                backgroundColor: [
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                ],
                borderColor: [
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                ],
                borderWidth: 1
            }]
    },
    options: {
        scales: {
            yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
        }
    }
});

var ctx = document.getElementById("UsoEmpleado");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"],
        datasets: [{
                label: 'numero de llamadas',
                data: [5, 6, 4, 5, 2, 3, 5, 6, 4, 5, 2, 3],
                backgroundColor: [
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                ],
                borderColor: [
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                    'rgba(238, 130, 18, 0.6)',
                ],
                borderWidth: 1
            }]
    },
    options: {
        scales: {
            yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
        }
    }
});

var url = window.location.protocol + '//' + window.location.host + '/admin/verasociado/';
var acciones =
        '<a href=' + url + '><div class="text-center">' +
        "<button title='Ver' class='btn-crud btn btn-format'>" +
        "<span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>" +
        "</button></div></a>"
        ;

var accionesAsociado = `
    <div class='text-center'>
      <button title='Ver' data-toggle='modal' data-target='#verAsociadoEmpleado' class='btn-crud btn btn-format'>
        <span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>
      </button>&nbsp;
      <button title='Editar' data-toggle='modal' data-target='#editarAsociadoEmpleado' class='btn-crud btn btn-format'>
        <span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
      </button>&nbsp;
      <button title='Eliminar' class='btn-crud btn color-red' >
        <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
      </button>
    </div>
    `;

$(function () {
    var tableAsociados = $('#tableAsociado').DataTable({
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
//    "data": [
//      [
//        "1",
//        "Inmobiliaria Robles SAC.",
//        "<a target='_blank' href='http://www.sunat.gob.pe/cl-ti-itmrconsruc/FrameCriterioBusquedaMovil.jsp'>28525254141411</a>",
//        "01 425685",
//        "Av. javier prado Nro. 2550 <br>Lima - Surco",
//        // "15",
//        // "2",
//        "postpago",
//        acciones
//
//      ],
//    ],
        "columns": [
            {"data": "name"},
            {"data": "ruc"},
            {"data": "number_phone"},
            {"data": "address"},
//                { "data": "location" },
            {"data": "acciones"}
        ]
    })

    $('#tableAsociado tbody').on('click', 'button#btnEliminarAsociado', function () {
        var table = $(this);
        $("#eliminarAsociado").modal();
        $("#btnEliminarAsociadoSi").on('click', function () {
            tableAsociados
                    .row(table.parents('tr'))
                    .remove()
                    .draw();
        })
    });






    var tableEmpleados = $('#tableEmpleados').DataTable({
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
        "data": [
            [
                "1",
                "45858545",
                "Jose Felipe",
                "Paucar Soto",
                "35 años",
                "jose@email.com",
                // "15",
                // "2",
                "Fijo",
                accionesAsociado
            ],
        ]
    })

});


$(function () {
    listarAsociados();
});