


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
  for(var i = 0; i < 3; i++){
    var li = document.createElement("li")
    li.appendChild(document.createTextNode(misNotas[i].contenido))
    li.setAttribute("id", misNotas[i].id);
    li.setAttribute("class", "nota");
    listaNotas.appendChild(li)
  }
}
listarNotas()
// NOTAS DEL POSTULANTE END
var ctx = document.getElementById("totalLlamadasDoctor");
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
                beginAtZero:true
            }
        }]
    }
}
});

function showPassword() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    document.getElementById('viz1').style.display = "none";
    document.getElementById('viz2').style.display = "block";;
      x.type = "text";
  } else {
    document.getElementById('viz1').style.display = "block";
    document.getElementById('viz2').style.display = "none";;
      x.type = "password";
  }
}

function showPasswordEdit() {
  var x = document.getElementById("passwordEdit");
  if (x.type === "password") {
    document.getElementById('vizEdit1').style.display = "none";
    document.getElementById('vizEdit2').style.display = "block";;
      x.type = "text";
  } else {
    document.getElementById('vizEdit1').style.display = "block";
    document.getElementById('vizEdit2').style.display = "none";;
      x.type = "password";
  }
}

function generarPwd(){
  document.getElementById('pwdMedico').classList.remove('is-empty');
  document.getElementById('password').value = generatePassword()/*Math.random().toString(36).slice(-8)*/;
}

function generarPwdEdit(){


  document.getElementById('pwdEdit').classList.remove('is-empty');
  document.getElementById('passwordEdit').value = generatePassword()/*Math.random().toString(36).slice(-8)*/;
}

function generatePassword() {

  String.prototype.pick = function(min, max) {
      var n, chars = '';

      if (typeof max === 'undefined') {
          n = min;
      } else {
          n = min + Math.floor(Math.random() * (max - min + 1));
      }

      for (var i = 0; i < n; i++) {
          chars += this.charAt(Math.floor(Math.random() * this.length));
      }
      return chars;
  };

      // Credit to @Christoph: http://stackoverflow.com/a/962890/464744
    String.prototype.shuffle = function() {
        var array = this.split('');
        var tmp, current, top = array.length;

        if (top) while (--top) {
            current = Math.floor(Math.random() * (top + 1));
            tmp = array[current];
            array[current] = array[top];
            array[top] = tmp;
        }

        return array.join('');
    };


    var specials = '!@#$%&()_+{}<>?\|[]\/';
    var lowercase = 'abcdefghijklmnopqrstuvwxyz';
    var uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    var numbers = '0123456789';

    var all = specials + lowercase + uppercase + numbers;

    var password = '';
    password += specials.pick(1);
    password += lowercase.pick(1);
    password += uppercase.pick(1);
    password += all.pick(5);
    password = password.shuffle();

    return password;
}

var acciones = `
<div class='text-center'>
  <button title='Ver' onclick="location.href='/admin/vermedico/'" class='btn-crud btn' style='background-color: #868686'>
    <span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>
  </button>
  <button id='btnEliminarMedico' title='Eliminar' class='delete btn-crud btn color-red'>
    <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
  </button>
</div>`;

var rating = `
<div class='text-center'>
    <span class='glyphicon glyphicon-star' aria-hidden='true' style='color: #f1c420; font-size: 18px;'></span>
    <span class='glyphicon glyphicon-star' aria-hidden='true' style='color: #f1c420; font-size: 18px;'></span>
    <span class='glyphicon glyphicon-star' aria-hidden='true' style='color: #f1c420; font-size: 18px;'></span>
    <span class='glyphicon glyphicon-star' aria-hidden='true' style='color: #f1c420; font-size: 18px;'></span>
    <span class='glyphicon glyphicon-star' aria-hidden='true' style='color: #f1c420; font-size: 18px;'></span>
</div>`;
$(function() {
    var tableMedicos = $('#tableMedico').DataTable({
      "language": {
        "sProcessing":    "Procesando...",
        "searching":      "false",
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
    "columns": [
                { "data": "name" },
                { "data": "last_name" },
                { "data": "numdoc" },
                { "data": "id_cmp" },
                { "data": "email" },
                { "data": "specialty" },
                { "data": "query" },
                { "data": "qualification" },
                { "data": "last_login" },
                { "data": "acciones" }
                
            ],
//    "data": [
//        [
////          "1",
//          "Juan",
//          "Perez Olviedo",
//          "18283747",
//          "12345",
//          "j@win.com",
//          "Cardiologo",
//          "25",
//          rating,
//          "25/12/2017",
//          acciones
//        ],
//        [
////          "2",
//          "Juan",
//          "Perez Olviedo",
//          "18283747",
//          "12345",
//          "j@wisn.com",
//          "Cardiologo",
//          "25",
//          rating,
//          "25/12/2017",
//          acciones
//        ],
//        [
////          "3",
//          "Juan",
//          "Perez Olviedo",
//          "18283747",
//          "12345",
//          "j@win.com",
//          "Cardiologo",
//          "25",
//          rating,
//          "25/12/2017",
//          acciones
//        ],
//        [
////          "4",
//          "Juan",
//          "Perez Olviedo",
//          "18283747",
//          "12345",
//          "j@win.com",
//          "Cardiologo",
//          "25",
//          rating,
//          "25/12/2017",
//          acciones
//        ],
//        [
////          "5",
//          "Juan",
//          "Perez Olviedo",
//          "18283747",
//          "12345",
//          "j@win.com",
//          "Cardiologo",
//          "25",
//          rating,
//          "25/12/2017",
//          acciones
//        ],
//      ]
    });
    
    
/*
    $('#tableMedico tbody').on( 'click', 'button#btnEliminarMedicojkj', function () {
      var table = $(this);
      $("#eliminarMedico").modal();
      $("#btnEliminarMedicoSi").on('click', function(){
          //alert(JSON.stringify(tableMedicos.row(table.parents('tr')).data().id));
          eliminarMedico(tableMedicos.row(table.parents('tr')).data().users_id);
        tableMedicos
          .row( table.parents('tr') )
          .remove()
          .draw();
          
      });
    });*/
    
    

});
