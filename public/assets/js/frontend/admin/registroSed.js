$(function () {
  $("#menuSed").addClass("active");
});

$("#formRegistrarSed").submit(function () {
  RegistrarSed();
  return false;
});

function RegistrarSed() {
  var osed = {
    id: null,
    name: $("#nombre").val(),
    description: $("#descripcion").val(),
  };

  $.ajax({
    type: "post",
    url: registrarSed,
    dataType: "json",
    data: {
      sed: osed,
      _token: token,
    },
    beforeSend: function (xhr) {},
  })
    .done(function (dataRpta) {
      swal("Registrado!", "Registro correcto.", "success");
      $("#formRegistrarSed")[0].reset();
    })
    .fail(function (jqXHR, textStatus) {
      swal("Error!", "Contactese con el administrador", "error");
    })
    .always(function () {});
}
