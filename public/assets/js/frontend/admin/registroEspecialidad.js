$(function () {
  $("#menuEspecialidades").addClass("active");
});
$("#formRegistrarEspecialidad").submit(function () {
  RegistrarEspecialidad();
  return false;
});
function RegistrarEspecialidad() {
  var oespecialidad = {
    id: null,
    name: $("#nombres").val(),
    description: $("#descripcion").val(),
  };

  $.ajax({
    type: "post",
    url: registrarEspecialidad,
    dataType: "json",
    data: {
      especialidad: oespecialidad,
            '_token': token
    },
    beforeSend: function (xhr) {},
  })
   .done(function (dataRpta) {
            //alert(JSON.stringify(dataRpta));
            swal("Registrado!", "Registro Correcto.", "success");
            $('#formRegistrarEspecialidad')[0].reset();
            //alert(dataRpta.message);
        }).fail(function (jqXHR, textStatus) {
            alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
        }).always(function () {
            //cerrarProgreso();
        });
}
