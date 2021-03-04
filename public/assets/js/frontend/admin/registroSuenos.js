$(function () {
  $("#menuSuenos").addClass("active");
});

$("#formRegistrarSuenos").submit(function () {
  RegistrarSuenos();
  return false;
});

function RegistrarSuenos() {
  var osuenos = {
    id: null,
    name: $("#nombre").val(),
    description: $("#descripcion").val(),
  };

  $.ajax({
    type: "post",
    url: registrarSuenos,
    dataType: "json",
    data: {
      suenos: osuenos,
      _token: token,
    },
    beforeSend: function (xhr) {},
  })
    .done(function (dataRpta) {
      swal("Registrado!", "Registro correcto.", "success");
      $("#formRegistrarSuenos")[0].reset();
    })
    .fail(function (jqXHR, textStatus) {
      swal("Error!", "Contactese con el administrador", "error");
    })
    .always(function () {});
}
