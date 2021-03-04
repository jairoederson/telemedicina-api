$(function () {
  $("#menuOrinas").addClass("active");
});

$("#formRegistrarOrinas").submit(function () {
  RegistrarOrinas();
  return false;
});

function RegistrarOrinas() {
  var oorinas = {
    id: null,
    name: $("#nombre").val(),
    description: $("#descripcion").val(),
  };

  $.ajax({
    type: "post",
    url: registrarOrinas,
    dataType: "json",
    data: {
      orinas: oorinas,
      _token: token,
    },
    beforeSend: function (xhr) {},
  })
    .done(function (dataRpta) {
      swal("Registrado!", "Registro correcto.", "success");
      $("#formRegistrarOrinas")[0].reset();
    })
    .fail(function (jqXHR, textStatus) {
      swal("Error!", "Contactese con el administrador", "error");
    })
    .always(function () {});
}
