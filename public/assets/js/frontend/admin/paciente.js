// FUNCIONALIDAD RESPONSIVA

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
function guardarNota() {
    lenLista = misNotas.length;
    notaContenido = document.getElementById('notaContenido').value
    misNotas.push({
        id: lenLista + 1,
        contenido: notaContenido
    })
    listarNotas()
}
function listarNotas() {

    var listaNotas = document.getElementById('misNotas')
    for (var i = 0; i < 3; i++)
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

var ctx = document.getElementById("totalCostoPaciente");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"],
        datasets: [{
                label: 'Facturacion por mes',
                data: [10, 15, 25, 10, 5, 5, 10, 15, 18, 20, 12, 13],
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

var ctx = document.getElementById("totalLlamadasPaciente");
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
var acciones = `
<div class='text-center'>
<button title='Ver' data-toggle='modal' data-target='#verPaciente' class='btn-crud btn' style='background-color: #868686; margin-right: 0px'>
<span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>
</button>&nbsp;
<button id='btnEliminarPaciente' title='Eliminar' class='btn-crud btn color-red' >
<span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
</button>
</div>
`;
$(function () {
    
    $('#menuUsuario').addClass("active");
    var tablePacientes = $('#tablePaciente').DataTable({
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
        "columns": [
            {"data": "name"},
            {"data": "last_name"},
            {"data": "numdoc"},

//                { "data": "email" },
            {"data": "state"},
            {"data": "query"},

            {"data": "last_login"},
            {"data": "acciones"}

        ],
//"data": [
//  [
//    
//    "45856965",
//    "Elvira",
//    "Olivarez Santiago",
//    "Lima - Miraflores",
//    // "Miraflores",
//    "15",
//    "S/. 75.00",
//    "25/02/0218",
//    acciones
//  ],
//]
    })

});
