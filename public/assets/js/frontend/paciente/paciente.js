$(document).ready(function(){
 // $('ul.tabs').tabs('select_tab', 'tab_id');
 var swipe = localStorage.getItem('swipe');
 $('ul.tabs').tabs('select_tab', swipe);
});

function limpiarSwipe(){
  localStorage.setItem('swipe', 'test-swipe-2')
}

function volverListCC(){
  localStorage.setItem('swipe', 'test-swipe-3')
}
// STAR
// starFocus(){
//   alert(document.getElementById("star1"))
//   document.getElementById("star1").style.backgroundColor = "black";
// }


// TIMECALL


var minutesLabel = document.getElementById("minutes");
var secondsLabel = document.getElementById("seconds");
var totalSeconds = 0;
var url= window.location.href.split(window.location.host)[1];
if(url == '/user-consulta-doctor'){
  setInterval(setTime, 1000);
}

function setTime() {
  ++totalSeconds;
  secondsLabel.innerHTML = pad(totalSeconds % 60);
  minutesLabel.innerHTML = pad(parseInt(totalSeconds / 60));
}

$('#modalAccesoHistorial').modal();

function pad(val) {
  var valString = val + "";
  if (valString.length < 2) {
    return "0" + valString;
  } else {
    return valString;
  }
}
// TIMECALL END


function makeVideo(){
  $('#modalCall').modal();
}
function makeVideoStablished(){
  $('#modalCallStablished').modal();
}
function modReceta(){
  $('#modal1').modal();
}
function modalFinishCall(){

  $('#modalFinishCall').modal();
}
function modalVideo(){
  $('#modalVideo').modal();
}
function makeCall(){
  $('#modalCalled').modal();
}
function modalMessage(){
  $('#modalMessage').modal();
}


$('.paginate_page').val('Página');
var table = $('#tableMonedas').DataTable({
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
    "<span class='addMoneda'>+ 600 monedas</span>",
    "20/05/2018",
    "Orden #102524",
  ],
  [
    "<span class='resMoneda'>- 200 monedas</span>",
    "02/06/2018",
    "Orden #102525",
  ],
  [
    "<span class='resMoneda'>- 200 monedas</span>",
    "20/06/2018",
    "Orden #102526",
  ],

]
});


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
    "05 / 05 / 2018",
    "<a onclick='modReceta()' href='#modal1' class='format modal-trigger waves-effect btn btn-color' style='background-color: #868686; width: auto'>Ver</a>",
  ],
]
});

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
    "<img src='assets/images/doctor1.jpg' width='40px' style='border-radius: 50%'> &nbsp; <p style='padding-left:50px; margin-top: -30px'>Pedro U.</p> ",
    "05 / 05 / 2018",
    "<a onclick='modReceta()' href='#modal1' class='format modal-trigger waves-effect btn btn-color' style='background-color: #868686; width: auto'>Ver</a>",
  ],
]
});
$('select').material_select();

$(document).ready(function(){
var url= window.location.href.split(window.location.host)[1];
if(url == "/user-consulta" || url == "/user-consulta-doctor" || url == "/user-califica"){
  document.getElementById("consultaNav").classList.add("active");
  document.getElementById("recetasNav").classList.remove("active");
  document.getElementById("historialNav").classList.remove("active");
  document.getElementById("pagosNav").classList.remove("active");
  document.getElementById("analisisNav").classList.remove("active");
  document.getElementById("historialMedicoNav").classList.remove("active");
  document.getElementById("ayudaNav").classList.remove("active");

  document.getElementById("navConsulta").classList.add("active");
  document.getElementById("navReceta").classList.remove("active");
  document.getElementById("navHistorial").classList.remove("active");
  document.getElementById("navMonedero").classList.remove("active");
  document.getElementById("navAnalisis").classList.remove("active");
  document.getElementById("navHistorialMedico").classList.remove("active");
  document.getElementById("navAyuda").classList.remove("active");

  document.getElementById('nav0').style.height = '700px';
  document.getElementById('nav1').style.height = '700px';

}else if(url == "/user-historial"){
  document.getElementById("consultaNav").classList.remove("active");
  document.getElementById("recetasNav").classList.remove("active");
  document.getElementById("historialNav").classList.add("active");
  document.getElementById("pagosNav").classList.remove("active");
  document.getElementById("analisisNav").classList.remove("active");
  document.getElementById("historialMedicoNav").classList.remove("active");
  document.getElementById("ayudaNav").classList.remove("active");

  document.getElementById("navConsulta").classList.remove("active");
  document.getElementById("navReceta").classList.remove("active");
  document.getElementById("navHistorial").classList.add("active");
  document.getElementById("navMonedero").classList.remove("active");
  document.getElementById("navAnalisis").classList.remove("active");
  document.getElementById("navHistorialMedico").classList.remove("active");
  document.getElementById("navAyuda").classList.remove("active");

  document.getElementById('nav0').style.height = '1270px';
  document.getElementById('nav1').style.height = '1270px';
}else if(url == "/user-historial-medico"){
  console.log(document.getElementById("historialMedicoNav"))
  document.getElementById("consultaNav").classList.remove("active");
  document.getElementById("recetasNav").classList.remove("active");
  document.getElementById("historialNav").classList.remove("active");
  document.getElementById("pagosNav").classList.remove("active");
  document.getElementById("analisisNav").classList.remove("active");
  document.getElementById("historialMedicoNav").classList.add("active");
  document.getElementById("ayudaNav").classList.remove("active");

  document.getElementById("navConsulta").classList.remove("active");
  document.getElementById("navReceta").classList.remove("active");
  document.getElementById("navHistorial").classList.remove("active");
  document.getElementById("navMonedero").classList.remove("active");
  document.getElementById("navAnalisis").classList.remove("active");
  document.getElementById("navHistorialMedico").classList.add("active");
  document.getElementById("navAyuda").classList.remove("active");
}else if(url == "/user-analisis"){
  document.getElementById("consultaNav").classList.remove("active");
  document.getElementById("recetasNav").classList.remove("active");
  document.getElementById("historialNav").classList.remove("active");
  document.getElementById("pagosNav").classList.remove("active");
  document.getElementById("analisisNav").classList.add("active");
  document.getElementById("historialMedicoNav").classList.remove("active");
  document.getElementById("ayudaNav").classList.remove("active");

  document.getElementById("navConsulta").classList.remove("active");
  document.getElementById("navReceta").classList.remove("active");
  document.getElementById("navHistorial").classList.remove("active");
  document.getElementById("navMonedero").classList.remove("active");
  document.getElementById("navAnalisis").classList.add("active");
  document.getElementById("navHistorialMedico").classList.remove("active");
  document.getElementById("navAyuda").classList.remove("active");

  document.getElementById('nav0').style.height = '978px';
  document.getElementById('nav1').style.height = '978px';

}else if(url == "/my-account"){
  document.getElementById("consultaNav").classList.remove("active");
  document.getElementById("recetasNav").classList.remove("active");
  document.getElementById("historialNav").classList.remove("active");
  document.getElementById("pagosNav").classList.remove("active");
  document.getElementById("analisisNav").classList.remove("active");
  document.getElementById("historialMedicoNav").classList.remove("active");
  document.getElementById("ayudaNav").classList.remove("active");

  document.getElementById("navConsulta").classList.remove("active");
  document.getElementById("navReceta").classList.remove("active");
  document.getElementById("navHistorial").classList.remove("active");
  document.getElementById("navMonedero").classList.remove("active");
  document.getElementById("navAnalisis").classList.remove("active");
  document.getElementById("navHistorialMedico").classList.remove("active");
  document.getElementById("navAyuda").classList.remove("active");
}else if(url == "/user-recetas"){
  document.getElementById("consultaNav").classList.remove("active");
  document.getElementById("recetasNav").classList.add("active");
  document.getElementById("historialNav").classList.remove("active");
  document.getElementById("pagosNav").classList.remove("active");
  document.getElementById("analisisNav").classList.remove("active");
  document.getElementById("historialMedicoNav").classList.remove("active");
  document.getElementById("ayudaNav").classList.remove("active");

  document.getElementById("navConsulta").classList.remove("active");
  document.getElementById("navReceta").classList.add("active");
  document.getElementById("navHistorial").classList.remove("active");
  document.getElementById("navMonedero").classList.remove("active");
  document.getElementById("navAnalisis").classList.remove("active");
  document.getElementById("navHistorialMedico").classList.remove("active");
  document.getElementById("navAyuda").classList.remove("active");

  document.getElementById('nav0').style.height = '978px';
  document.getElementById('nav1').style.height = '978px';

}else if(url == "/user-ayuda"){
  document.getElementById("consultaNav").classList.remove("active");
  document.getElementById("recetasNav").classList.remove("active");
  document.getElementById("historialNav").classList.remove("active");
  document.getElementById("pagosNav").classList.remove("active");
  document.getElementById("analisisNav").classList.remove("active");
  document.getElementById("historialMedicoNav").classList.remove("active");
  document.getElementById("ayudaNav").classList.add("active");

  document.getElementById("navConsulta").classList.remove("active");
  document.getElementById("navReceta").classList.remove("active");
  document.getElementById("navHistorial").classList.remove("active");
  document.getElementById("navMonedero").classList.remove("active");
  document.getElementById("navAnalisis").classList.remove("active");
  document.getElementById("navHistorialMedico").classList.remove("active");
  document.getElementById("navAyuda").classList.add("active");
}else{
  document.getElementById("consultaNav").classList.remove("active");
  document.getElementById("recetasNav").classList.remove("active");
  document.getElementById("historialNav").classList.remove("active");
  document.getElementById("pagosNav").classList.add("active");
  document.getElementById("analisisNav").classList.remove("active");
  document.getElementById("historialMedicoNav").classList.remove("active");
  document.getElementById("ayudaNav").classList.remove("active");

  document.getElementById("navConsulta").classList.remove("active");
  document.getElementById("navReceta").classList.remove("active");
  document.getElementById("navHistorial").classList.remove("active");
  document.getElementById("navMonedero").classList.add("active");
  document.getElementById("navAnalisis").classList.remove("active");
  document.getElementById("navHistorialMedico").classList.remove("active");
  document.getElementById("navAyuda").classList.remove("active");
}
})


$('.dropdown-button').dropdown({
 inDuration: false,
 outDuration: false,
 constrainWidth: true, // Does not change width of dropdown to that of the activator
 hover: false, // Activate on hover
 gutter: 120, // Spacing from edge
 belowOrigin: false, // Displays dropdown below the button
 alignment: 'left', // Displays dropdown with edge aligned to the left of button
 stopPropagation: false // Stops event propagation
});
// CREDIT CARD FIELD VALIDATION
$('#credit_card').on('keypress', function(e){
if (e.which < 48 || e.which > 57) {
  e.preventDefault();
}else {
  var val = $(this).val();
  if(val.length >16){
  }else{
    if(e.which != 8)
    {
      if(val.replace(/\s/g, '').length % 4 == 0)
      {
        $(this).val(val + ' ');
      }
    }
    else
    {
      $(this).val(val);
    }
  }
}
});

// FECHA DE EXPIRACION FIEL VALIDATION
$('#exp').on('keypress', function(e){
if (e.which < 48 || e.which > 57) {
  e.preventDefault();
}else {
  var val = $(this).val();
  if(val.length >5){
  }else{
    if(e.which != 8)
    {
      if(val.length % 2 == 0)
      {
        if (val.length>1) {
          $(this).val(val + ' / ');
        }
      }
    }
    else
    {
      $(this).val(val);
    }
  }
}
});
// ANGULAR SECTION
// FORMULARIO ACCOUNT PACIENTE
var app = angular.module('app_paciente_account', []);
app.controller('validateCtrl', function($scope) {
    $scope.email = 'john.doe@gmail.com';
    $scope.name = 'Jhon Doe';
    $scope.address = 'av. los alamos nro.145';
    $scope.dni = 4545574;
    $scope.tel = '985854545';
    $scope.date = '1985-12-05';
});

// FORMULARIO CAMBIAR CONTRASEÑA PACIENTE
var app = angular.module('app_paciente_pass', []);
app.controller('validateCtrl', function($scope) {

});

// FORMULARIO EDITAR TARJETA DE CREDITO PACIENTE
var app = angular.module('app_paciente_edit_card', []);
app.controller('validateCtrl', function($scope) {
  $scope.credit_card = '**** **** **** 4545';
  $scope.exp = '14/20';
  $scope.cvv = 454;
});

// FORMULARIO AGREGAR TARJETA DE CREDITO PACIENTE
var app = angular.module('app_paciente_add_card', []);
app.controller('validateCtrl', function($scope) {

});

// FORMULARIO AGREGAR TARJETA DE CREDITO PACIENTE
var app = angular.module('app_paciente_add_paypal', []);
app.controller('validateCtrl', function($scope) {

});

// ANGULAR SECTION END




// SIDEBAR
$(document).ready(function(){
  // CHIPS
  // $('.chips-placeholder').material_chip({
  //   placeholder: 'Sintomas',
  //   secondaryPlaceholder: '+Tag',
  // });
  $('.chips-autocomplete').material_chip({
    autocompleteOptions: {
      data: {
        'Resfrio': null,
        'Dolor de cabeza': null,
        'toz seca': null,
        'toz con flema': null,
        'toz': null,
        'mareos': null,
        'dolor': null,
        'fiebre': null,
      },
      limit: Infinity,
      minLength: 1
    },
    placeholder: 'Sintomas',
  });
  //  CLOSE CHIPS
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
function keydown(){
  document.getElementById('keyleft').style.display = 'none';
  document.getElementById('keydown').style.display = 'block';
}

function keyleft(){
  document.getElementById('keyleft').style.display = 'block';
  document.getElementById('keydown').style.display = 'none';
}

function updatePassword(){
  $('#updatePassword').modal();
}

function updateAccount(){
  $('#updateAccount').modal();
}
