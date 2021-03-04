$(document).ready(function(){
 // $('ul.tabs').tabs('select_tab', 'tab_id');
 var swipe = localStorage.getItem('swipeReceta');
 $('ul.tabs').tabs('select_tab', swipe);
});

function irAEmitirReceta(){
  localStorage.setItem('swipeReceta', 'emitir-receta')
}

function limpiarRecetaLS(){
  localStorage.setItem('swipeReceta', 'recetas')
}
function modalVideo(){
  $('#modalVideo').modal();
}

function modalMessage(){
  $('#modalMessage').modal();
}

function modalFinishCall(){
  $('#modalFinishCall').modal();
}

$('.paginate_page').val('Página');
var table = $('#tableAnalisis').DataTable({
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
    "000252454",
    "Glucosa",
    "05 / 04 / 2018",
    "Pendiente",
    "<label style='color: #868686;'>Realizado</label>",
    "<a onclick='verAnalisis()' href='#verAnalisis' class='modal-trigger format btn'>Ver</a>&nbsp"+
    "<a href='/lab-analisis-medico' class='format btn'>Editar</a>&nbsp"+
    "<a onclick='enviarAnalisisSecretaria()' href='#enviarAnalisisSecretaria' class='modal-trigger format btn' style='background-color:#e22715'>Enviar</a>"
  ],
  [
    "1",
    "000252454",
    "Glucosa",
    "05 / 04 / 2018",
    "05 / 05 / 2018",
    "<label style='color: #868686;'>Enviado</label>",
    "<a onclick='verAnalisis()' href='#verAnalisis' class='modal-trigger format btn'>Ver</a>&nbsp"+
    "<a href='/lab-analisis-medico' class='format btn'>Editar</a>&nbsp"+
    "<a onclick='enviarAnalisisSecretaria()' href='#enviarAnalisisSecretaria' class='modal-trigger format btn' style='background-color:#e22715'>Reenviar</a>"
  ],
  [
    "1",
    "000252454",
    "Glucosa",
    "05 / 04 / 2018",
    "Pendiente",
    "<label style='color: #e22715;'>Pendiente</label>",
    "<a onclick='verAnalisis()' href='#verAnalisis'  class='modal-trigger format btn'>Ver</a>&nbsp"+
    "<a href='/lab-analisis-medico' class='format btn'>Editar</a>&nbsp"+
    "<a href='/lab-new-analisis' class='format btn' style='background-color:#e22715'>Realizar</a>"
  ],
]
});
function updatePassword(){
  $('#updatePassword').modal();
}

function updateAccount(){
  $('#updateAccount').modal();
}

function verAnalisis(){
  $('#verAnalisis').modal();
}
function enviarAnalisisSecretaria(){
  $('#enviarAnalisisSecretaria').modal();
}
// MODALES

function modReceta(){
  $('#modalReceta').modal();
}

function modalEnvioReceta(){
  $('#modalEnvioReceta').modal();
}
// SET HEIGHT NAV
// document.getElementById('nav0').style.height = Number(document.documentElement.scrollHeight - document.documentElement.scrollHeight*0.556);

// alert(document.documentElement.scrollHeight)

console.log(document.getElementById('content').style);

$('.paginate_page').val('Página');
var table = $('#tableReceta').DataTable({
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
    "Analgesicos para el dolor de cabeza",
    "Dolor de cabeza",
    "Pedro Urbina",
    "05 / 05 / 2018",
    "<div class='center'><a onclick='modReceta()' href='#modalReceta' class='format modal-trigger waves-effect btn btn-color' style='background-color: #868686; width: auto'>Ver</a> &nbsp;"+
    "<a onclick='modalEnvioReceta()' href='#modalEnvioReceta' class='format modal-trigger waves-effect btn btn-color' style='background-color: #e22715; width: auto'>Reenviar</a> </div>",
  ],
]
});
$('select').material_select();


$('.paginate_page').val('Página');
var table = $('#tableHistorial').DataTable({
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
      "0122255",
      "Andrea Sanchez A.",
      "05 / 05 / 2018",
      "05 / 05 / 2018",
      "<a onclick='verHistorial()' href='#verHistorial' class='format modal-trigger waves-effect btn btn-color' style='background-color: #868686; width: auto'>Ver</a> &nbsp;"+
      "<a target='_blank' href='https://www.uwmedicine.org/neighborhood-clinics/Documents/PPEHISTORYSPANISH.pdf' class='format modal-trigger waves-effect btn btn-color' style='background-color: #e22715; width: auto'>Pdf</a>",
    ],
]
});

function verHistorial(){
  $('#verHistorial').modal();
}

$('select').material_select();


$(document).ready(function(){
// AUTOCOMPLETE MEDICAMENTO
$('input.autocomplete').autocomplete({
  data: {
    "Pildoras": null,
    "Amoxicilina": null, //null en vez de imagen
    "Penicilina": null,
    "Clindamicina": null,
    "Sulfato": null,
    "Vitamina A": null,
    "Vitamina B": null,
    "Vitamina C": null,
    "Vitamina D": null,
    "Omega": null,
    "Aspirina": null,
    "Hidroxido de aluminio": null,
    "Vacuna": null,
    "Teofilina": null,
    "Isoniacida": null,
    "Beclometasona": null,
    "Nitroglicerina": null,
    "Sulfato ferroso": null,
    "Fitomenadiona": null,
    "Glucosa en Agua ": null,
    "Agua Destilada": null,
    "Bicarbonato Sódico": null,
    "Calcio acetato": null,
    "Bicarbonato sódico": null,
    "Diazepam": null,
    "Fenobarbital Sódico ": 'https://placehold.it/250x250',
  },
  limit: 20, // The max amount of results that can be shown at once. Default: Infinity.
  onAutocomplete: function(val) {
    // Callback function when value is autcompleted.
  },
  minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
});





var url= window.location.href.split(window.location.host)[1];
if(url == "/lab-historial"){
  document.getElementById("cuentaNav").classList.remove("active");
  document.getElementById("nuevoAnalisisNav").classList.remove("active");
  document.getElementById("analisisNav").classList.remove("active");
  document.getElementById("historialNav").classList.add("active");
  document.getElementById("ayudaNav").classList.remove("active");

  document.getElementById("navCuenta").classList.remove("active");
  document.getElementById("navNuevoAnalisis").classList.remove("active");
  document.getElementById("navAnalisis").classList.remove("active");
  document.getElementById("navHistorialMedico").classList.add("active");
  document.getElementById("navAyuda").classList.remove("active");

}else if(url == "/lab-ayuda"){
  document.getElementById("cuentaNav").classList.remove("active");
  document.getElementById("nuevoAnalisisNav").classList.remove("active");
  document.getElementById("analisisNav").classList.remove("active");
  document.getElementById("historialNav").classList.remove("active");
  document.getElementById("ayudaNav").classList.add("active");

  document.getElementById("navCuenta").classList.remove("active");
  document.getElementById("navNuevoAnalisis").classList.remove("active");
  document.getElementById("navAnalisis").classList.remove("active");
  document.getElementById("navHistorialMedico").classList.remove("active");
  document.getElementById("navAyuda").classList.add("active");


  // document.getElementById("nav0").style.height = '978px'
}
else if(url == "/lab-analisis"){
  document.getElementById("cuentaNav").classList.remove("active");
  document.getElementById("nuevoAnalisisNav").classList.remove("active");
  document.getElementById("analisisNav").classList.add("active");
  document.getElementById("historialNav").classList.remove("active");
  document.getElementById("ayudaNav").classList.remove("active");

  document.getElementById("navCuenta").classList.remove("active");
  document.getElementById("navNuevoAnalisis").classList.remove("active");
  document.getElementById("navAnalisis").classList.add("active");
  document.getElementById("navHistorialMedico").classList.remove("active");
  document.getElementById("navAyuda").classList.remove("active");

}else if(url == "/lab-new-analisis"){
  document.getElementById("cuentaNav").classList.remove("active");
  document.getElementById("nuevoAnalisisNav").classList.add("active");
  document.getElementById("analisisNav").classList.remove("active");
  document.getElementById("historialNav").classList.remove("active");
  document.getElementById("ayudaNav").classList.remove("active");

  document.getElementById("navCuenta").classList.remove("active");
  document.getElementById("navNuevoAnalisis").classList.add("active");
  document.getElementById("navAnalisis").classList.remove("active");
  document.getElementById("navHistorialMedico").classList.remove("active");
  document.getElementById("navAyuda").classList.remove("active");


  // document.getElementById("nav0").style.height = '978px'
}else{
  document.getElementById("cuentaNav").classList.add("active");
  document.getElementById("nuevoAnalisisNav").classList.remove("active");
  document.getElementById("analisisNav").classList.remove("active");
  document.getElementById("historialNav").classList.remove("active");
  document.getElementById("ayudaNav").classList.remove("active");

  document.getElementById("navCuenta").classList.add("active");
  document.getElementById("navNuevoAnalisis").classList.remove("active");
  document.getElementById("navAnalisis").classList.remove("active");
  document.getElementById("navHistorialMedico").classList.remove("active");
  document.getElementById("navAyuda").classList.remove("active");


  // document.getElementById("nav0").style.height = '978px'
}
})

$('.dropdown-button').dropdown({
   inDuration: false,
   outDuration: false,
   constrainWidth: true, // Does not change width of dropdown to that of the activator
   hover: false, // Activate on hover
   gutter: 100, // Spacing from edge
   belowOrigin: false, // Displays dropdown below the button
   alignment: 'left', // Displays dropdown with edge aligned to the left of button
   stopPropagation: false // Stops event propagation
 });
// ANGULAR SECTION

// FORMULARIO ACCOUNT DOCTOR
var app = angular.module('app_doctor_account', []);
app.controller('validateCtrl', function($scope) {
    $scope.email = 'john.doe@gmail.com';
    $scope.name = 'Jhon Doe';
    $scope.cmp = 78458585;
    $scope.especialidad = 'Cardiología';
    $scope.tel = '985854545';
    $scope.date = '22 Febrero, 1988';
});

// FORMULARIO PASSWORD DOCTOR
var app = angular.module('app_doctor_pass', []);
app.controller('validateCtrl', function($scope) {

});

// ANGULAR SECTION END
// SIDEBAR
$(document).ready(function(){
  $('.datepicker').pickadate({
    firstDay: true
});
$('.button-collapse').sideNav({
    // menuWidth: 200, // Default is 300
    // edge: 'left', // Choose the horizontal origin
    // closeOnClick: false, // Closes side-nav on <a> clicks, useful for Angular/Meteor
    // draggable: false // Choose whether you can drag to open on touch screens
  }
);
// START OPEN
$('.button-collapse').sideNav('show');

$('.datepicker').pickadate({
  selectMonths: true, // Creates a dropdown to control month
  selectYears: 15 // Creates a dropdown of 15 years to control year
});
$(document).ready(function() {
  $('select').material_select();
});
});

function fullScreen() {
document.getElementById('f1').style.display = 'none';
document.getElementById('f2').style.display = 'block';
var el = document.documentElement, rfs = // for newer Webkit and Firefox
           el.requestFullScreen
        || el.webkitRequestFullScreen
        || el.mozRequestFullScreen
        || el.msRequestFullScreen
;
if(typeof rfs!="undefined" && rfs){
  rfs.call(el);
} else if(typeof window.ActiveXObject!="undefined"){
  // for Internet Explorer
  var wscript = new ActiveXObject("WScript.Shell");
  if (wscript!=null) {
     wscript.SendKeys("{F11}");
  }
}
}
function fullScreen1() {
document.getElementById('fs1').style.display = 'none';
document.getElementById('fs2').style.display = 'block';
var el = document.documentElement, rfs = // for newer Webkit and Firefox
           el.requestFullScreen
        || el.webkitRequestFullScreen
        || el.mozRequestFullScreen
        || el.msRequestFullScreen
;
if(typeof rfs!="undefined" && rfs){
  rfs.call(el);
} else if(typeof window.ActiveXObject!="undefined"){
  // for Internet Explorer
  var wscript = new ActiveXObject("WScript.Shell");
  if (wscript!=null) {
     wscript.SendKeys("{F11}");
  }
}
}
function escScreen(){
document.getElementById('f1').style.display = 'block';
document.getElementById('f2').style.display = 'none';
if(document.exitFullscreen)
  document.exitFullscreen();
else if(document.mozCancelFullScreen)
  document.mozCancelFullScreen();
else if(document.webkitExitFullscreen)
  document.webkitExitFullscreen();
else if(document.msExitFullscreen)
  document.msExitFullscreen();
}
function escScreen1(){
document.getElementById('fs1').style.display = 'block';
document.getElementById('fs2').style.display = 'none';
if(document.exitFullscreen)
  document.exitFullscreen();
else if(document.mozCancelFullScreen)
  document.mozCancelFullScreen();
else if(document.webkitExitFullscreen)
  document.webkitExitFullscreen();
else if(document.msExitFullscreen)
  document.msExitFullscreen();
}
