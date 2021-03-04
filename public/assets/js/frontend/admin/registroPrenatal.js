$(function () {
  $("#menuPrenatal").addClass("active");
});

$("#formRegistrarPrenatal").submit(function () {
  RegistrarPrenatal();
  return false;
});

function RegistrarPrenatal() {
  var oprenatal = {
    id: null,
    name: $("#nombre").val(),
    description: $("#descripcion").val(),
  };

  $.ajax({
    type: "post",
    url: registrarPrenatal,
    dataType: "json",
    data: {
      prenatal: oprenatal,
      _token: token,
    },
    beforeSend: function (xhr) {},
  })
    .done(function (dataRpta) {
      swal("Registrado!", "Registro correcto.", "success");
      $("#formRegistrarPrenatal")[0].reset();
    })
    .fail(function (jqXHR, textStatus) {
      swal("Error!", "Contactese con el administrador", "error");
    })
    .always(function () {});
}
