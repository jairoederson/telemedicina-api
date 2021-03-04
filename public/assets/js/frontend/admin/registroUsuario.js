$(function () {
  $("#menuUsuario").addClass("active");
  // $("#cmbUsuarioRol").change(function () {
  //   $(".panelcambio").hide();
  //   $("#" + $("#cmbUsuarioRol option:selected").data("paneles")).show();
  // });
});

function showPassword() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    document.getElementById("viz1").style.display = "none";
    document.getElementById("viz2").style.display = "block";
    x.type = "text";
  } else {
    document.getElementById("viz1").style.display = "block";
    document.getElementById("viz2").style.display = "none";
    x.type = "password";
  }
}

function generarPwd() {
  document.getElementById("pwdUsuario").classList.remove("is-empty");
  document.getElementById(
    "password"
  ).value = generatePassword() /*Math.random().toString(36).slice(-8)*/;
}

function generatePassword() {
  String.prototype.pick = function (min, max) {
    var n,
      chars = "";

    if (typeof max === "undefined") {
      n = min;
    } else {
      n = min + Math.floor(Math.random() * (max - min + 1));
    }

    for (var i = 0; i < n; i++) {
      chars += this.charAt(Math.floor(Math.random() * this.length));
    }
    return chars;
  };

  String.prototype.shuffle = function () {
    var array = this.split("");
    var tmp,
      current,
      top = array.length;

    if (top)
      while (--top) {
        current = Math.floor(Math.random() * (top + 1));
        tmp = array[current];
        array[current] = array[top];
        array[top] = tmp;
      }

    return array.join("");
  };

  var specials = "!@#$%&()_+{}<>?|[]/";
  var lowercase = "abcdefghijklmnopqrstuvwxyz";
  var uppercase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  var numbers = "0123456789";

  var all = specials + lowercase + uppercase + numbers;

  var password = "";
  password += specials.pick(1);
  password += lowercase.pick(1);
  password += uppercase.pick(1);
  password += all.pick(5);
  password = password.shuffle();

  return password;
}

$("#formRegistrarUsuario").submit(function () {
  RegistrarUsuario();
  return false;
});

function RegistrarUsuario() {
  var ousuario = {
    id: null,

    name: $("#nombres").val(),
    last_name: $("#apellidos").val(),
    email: $("#correo").val(),
    ubigeo_id: $("#cmbDistrito").val(),
    type_document_id: $("#cmbTipoDoc").val(),
    birth_date: $("#rangepicker4").val(),
    numdoc: $("#dni").val(),
    gender: 1,
    address: $("#cuidad").val(),
    address_extra_info: $("#numMzaLte").val(),
    password: $("#password").val(),
  };

  $.ajax({
    type: "post",
    url: registrarUsuario,
    dataType: "json",
    data: {
      usuario: ousuario,
      rol: $("#cmbUsuarioRol").val(),
      telefono: $("#telefono").val(),
      _token: token,
    },
    beforeSend: function (xhr) {},
  })
    .done(function (dataRpta) {
      swal("Registrado!", "Registro correcto.", "success");
      $("#formRegistrarUsuario")[0].reset();
    })
    .fail(function (jqXHR, textStatus) {
      swal("Error!", "Contactese con el administrador", "error");
    })
    .always(function () {});
}
listarDepartamento();

function listarDepartamento() {
  $.ajax({
    type: "post",
    url: listardepartamentos,
    dataType: "json",
    data: {
      _token: token,
    },
    beforeSend: function (xhr) {},
  })
    .done(function (dataRpta) {
      var html = '<option value="">Departamento</option>';
      jQuery.each(dataRpta, function (i, val) {
        html +=
          '<option value="' +
          val.departamento +
          '"> ' +
          val.ubigeo +
          "</option>";
      });
      $("#cmbDepartamento").html(html);
    })
    .fail(function (jqXHR, textStatus) {})
    .always(function () {});
}

$("#cmbDepartamento").change(function () {
  $("#cmbProvincia").html('<option value="">Cargando Provincias ...</option>');
  listarProvincia($("#cmbDepartamento").val());
  $("#cmbDistrito").html('<option value="">Distrito</option>');
});

function listarProvincia(coddepartamento) {
  $.ajax({
    type: "post",
    url: listarprovincia,
    dataType: "json",
    data: {
      coddepartamento: coddepartamento,
      _token: token,
    },
    beforeSend: function (xhr) {},
  })
    .done(function (dataRpta) {
      var html = '<option value="">Provincia</option>';
      jQuery.each(dataRpta, function (i, val) {
        html +=
          '<option value="' + val.provincia + '"> ' + val.ubigeo + "</option>";
      });
      $("#cmbProvincia").html(html);
    })
    .fail(function (jqXHR, textStatus) {})
    .always(function () {});
}
$("#cmbProvincia").change(function () {
  $("#cmbDistrito").html('<option value="">Cargando Distritos ...</option>');
  listarDistrito($("#cmbDepartamento").val(), $("#cmbProvincia").val());
});

function listarDistrito(coddepartamento, codprovincia) {
  $.ajax({
    type: "post",
    url: listardistrito,
    dataType: "json",
    data: {
      coddepartamento: coddepartamento,
      codprovincia: codprovincia,
      _token: token,
    },
    beforeSend: function (xhr) {},
  })
    .done(function (dataRpta) {
      var html = '<option value="">Distrito</option>';
      jQuery.each(dataRpta, function (i, val) {
        html += '<option value="' + val.id + '"> ' + val.ubigeo + "</option>";
      });
      $("#cmbDistrito").html(html);
    })
    .fail(function (jqXHR, textStatus) {})
    .always(function () {});
}
listarTipoDocumento();
function listarTipoDocumento() {
  $.ajax({
    type: "post",
    url: listartipodocumento,
    dataType: "json",
    data: {
      _token: token,
    },
    beforeSend: function (xhr) {},
  })
    .done(function (dataRpta) {
      var html = '<option value="">Tipo Documento</option>';
      jQuery.each(dataRpta.tipodoc, function (i, val) {
        html +=
          '<option value="' + val.id + '"> ' + val.type_name + "</option>";
      });
      $("#cmbTipoDoc").html(html);
    })
    .fail(function (jqXHR, textStatus) {})
    .always(function () {});
}
