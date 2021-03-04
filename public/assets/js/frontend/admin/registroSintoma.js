$(function () {
  $("#menuSintoma").addClass("active");
});

$("#formRegistrarSintoma").submit(function () {
  RegistrarSintoma();
  return false;
});

function RegistrarSintoma() {
  var osintoma = {
    id: null,
    name: $("#nombre").val(),
    description: $("#descripcion").val(),
    diseas_id: $("#cmbDisease").val(),
  };

  $.ajax({
    type: "post",
    url: registrarSintoma,
    dataType: "json",
    data: {
      sintoma: osintoma,
      _token: token,
    },
    beforeSend: function (xhr) {},
  })
    .done(function (dataRpta) {
      swal("Registrado!", "Registro correcto.", "success");
      $("#formRegistrarSintoma")[0].reset();
    })
    .fail(function (jqXHR, textStatus) {
      swal("Error!", "Contactese con el administrador", "error");
    })
    .always(function () {});
}

listarEnfermedad();
function listarEnfermedad() {
  $.ajax({
    type: "post",
    url: listarenfermedad,
    dataType: "json",
    data: {
      _token: token,
    },
    beforeSend: function (xhr) {},
  })
    .done(function (dataRpta) {
      var html = '<option value="">Enfermedad</option>';
      jQuery.each(dataRpta.disease, function (i, val) {
        html +=
          '<option value="' + val.id + '"> ' + val.name + "</option>";
      });
      $("#cmbDisease").html(html);
    })
    .fail(function (jqXHR, textStatus) { })
    .always(function () {});
}
