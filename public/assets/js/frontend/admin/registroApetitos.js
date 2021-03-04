$(function () {
  $("#menuApetitos").addClass("active");
});

$("#formRegistrarApetitos").submit(function () {
  RegistrarApetitos();
  return false;
});

function RegistrarApetitos() {
  var oapetitos = {
    id: null,
    name: $("#nombre").val(),
    description: $("#descripcion").val(),
  };

  $.ajax({
    type: "post",
    url: registrarApetitos,
    dataType: "json",
    data: {
      apetitos: oapetitos,
      _token: token,
    },
    beforeSend: function (xhr) {},
  })
    .done(function (dataRpta) {
      swal("Registrado!", "Registro correcto.", "success");
      $("#formRegistrarApetitos")[0].reset();
    })
    .fail(function (jqXHR, textStatus) {
      swal("Error!", "Contactese con el administrador", "error");
    })
    .always(function () {});
}
