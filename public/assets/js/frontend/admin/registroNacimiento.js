$(function () {
  $("#menuNacimiento").addClass("active");
});

$("#formRegistrarNacimiento").submit(function () {
  RegistrarNacimiento();
  return false;
});

function RegistrarNacimiento() {
  var onacimiento = {
    id: null,
    name: $("#nombre").val(),
    description: $("#descripcion").val(),
  };

  $.ajax({
    type: "post",
    url: registrarNacimiento,
    dataType: "json",
    data: {
      nacimiento: onacimiento,
      _token: token,
    },
    beforeSend: function (xhr) {},
  })
    .done(function (dataRpta) {
      swal("Registrado!", "Registro correcto.", "success");
      $("#formRegistrarNacimiento")[0].reset();
    })
    .fail(function (jqXHR, textStatus) {
      swal("Error!", "Contactese con el administrador", "error");
    })
    .always(function () {});
}
