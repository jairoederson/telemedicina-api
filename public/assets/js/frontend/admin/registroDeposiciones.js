$(function () {
  $("#menuDeposiciones").addClass("active");
});

$("#formRegistrarDeposiciones").submit(function () {
  RegistrarDeposiciones();
  return false;
});

function RegistrarDeposiciones() {
  var odeposiciones = {
    id: null,
    name: $("#nombre").val(),
    description: $("#descripcion").val(),
  };

  $.ajax({
    type: "post",
    url: registrarDeposiciones,
    dataType: "json",
    data: {
      deposiciones: odeposiciones,
      _token: token,
    },
    beforeSend: function (xhr) {},
  })
    .done(function (dataRpta) {
      swal("Registrado!", "Registro correcto.", "success");
      $("#formRegistrarDeposiciones")[0].reset();
    })
    .fail(function (jqXHR, textStatus) {
      swal("Error!", "Contactese con el administrador", "error");
    })
    .always(function () {});
}
