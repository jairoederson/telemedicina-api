export function MostrarMenuOpciones(){
  // var $toastContent = $('<span id="menuOpciones">Menu de opciones</span>').add($('<button class="btn-flat toast-action">Undo</button>'));
  // Materialize.toast($toastContent, 100000);
}

export function MostrarOpcionIrInicio(){
  var $toastContent = $('<span>Haciendo clic en esta opcion puedes ir a inicio</span>').add($('<button class="btn-flat toast-action">Siguiente</button>'));
  Materialize.toast($toastContent, 10000);
}

export function MostrarOpcionZoom(){
  var $toastContent = $('<span>Haciendo clic en esta opcion, se activa la pantalla completa</span>').add($('<button class="btn-flat toast-action">Siguiente</button>'));
  Materialize.toast($toastContent, 10000);
}

export function MostrarOpcionNotificacion(){
  var $toastContent = $('<span>Haciendo clic en esta opcion, puedes ver tus ultimas notificaciones</span>').add($('<button class="btn-flat toast-action">Undo</button>'));
  Materialize.toast($toastContent, 10000);
}

export function MostrarOpcionMenuDesplegable(){
  var $toastContent = $('<span>Haciendo clic en esta opcion se muestra el menu desplegable</span>').add($('<button class="btn-flat toast-action">Undo</button>'));
  Materialize.toast($toastContent, 10000);
}
