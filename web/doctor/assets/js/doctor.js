const urlBase = "https://telemedicina.today";
// ========== GENERAL ===========

// NOTIFICATIONS
export function Welcome() {
  console.log("LOCALSTORAGE", localStorage.getItem("welcome"));
  if (localStorage.getItem("welcome") == null) {
    let nameuser = JSON.parse(localStorage.getItem("identity"));
    Push.create("Bienvenido a Mifarma", {
      body: `Doctor ${nameuser.name} ${nameuser.last_name}`,
      icon: "/assets/images/mifarma_notification.png",
      timeout: 4000,
      onClick: function () {
        window.focus();
        this.close();
      },
    });
    localStorage.setItem("welcome", "true");
  }
}

export function incommingCallNotification(patient_sinch) {
  $.ajax({
    type: "GET",
    url: urlBase + "/api/get/temp/symptom/" + patient_sinch,
    dataType: "json",
    contentType: "application/json; charset=utf-8",
    success: function (response) {
      Push.create("Lllamada entrante", {
        body: `Paciente ${response.data.name} ${response.data.last_name}`,
        icon: urlBase + "/web/doctor/dist/assets/images/farmacias-logo.png",
        timeout: 40000,
        onClick: function () {
          window.focus();
          this.close();
        },
      });
    },
    error: function (error) {
      console.log(error);
    },
  });
}

export function ChangeIcon(valor) {
  var dp = document.getElementById("dp");
  var dpN = document.getElementById("dpN");
  var da = document.getElementById("da");
  var daN = document.getElementById("daN");
  var ln = document.getElementById("ln");
  var lnN = document.getElementById("lnN");
  var lp = document.getElementById("lp");
  var lpN = document.getElementById("lpN");
  var dad = document.getElementById("dad");
  var dpN = document.getElementById("dpN");
  var dac = document.getElementById("dac");
  var dacN = document.getElementById("dacN");
  var ot = document.getElementById("ot");
  var otN = document.getElementById("otN");

  if (valor == "dp") {
    if (dp.style.display == "" || dp.style.display == "block") {
      dp.style.display = "none";
      dpN.style.display = "block";
      da.style.display = "block";
      daN.style.display = "none";
      ln.style.display = "block";
      lnN.style.display = "none";
      lp.style.display = "block";
      lpN.style.display = "none";
      dad.style.display = "block";
      dadN.style.display = "none";
      dac.style.display = "block";
      dacN.style.display = "none";
    } else {
      dp.style.display = "block";
      dpN.style.display = "none";
    }
  } else if (valor == "da") {
    if (da.style.display == "" || da.style.display == "block") {
      dp.style.display = "block";
      dpN.style.display = "none";
      da.style.display = "none";
      daN.style.display = "block";
      ln.style.display = "block";
      lnN.style.display = "none";
      lp.style.display = "block";
      lpN.style.display = "none";
      dad.style.display = "block";
      dadN.style.display = "none";
      dac.style.display = "block";
      dacN.style.display = "none";
    } else {
      da.style.display = "block";
      daN.style.display = "none";
    }
  } else if (valor == "ln") {
    if (ln.style.display == "" || ln.style.display == "block") {
      dp.style.display = "block";
      dpN.style.display = "none";
      da.style.display = "block";
      daN.style.display = "none";
      ln.style.display = "none";
      lnN.style.display = "block";
      lp.style.display = "block";
      lpN.style.display = "none";
      dad.style.display = "block";
      dadN.style.display = "none";
      dac.style.display = "block";
      dacN.style.display = "none";
    } else {
      ln.style.display = "block";
      lnN.style.display = "none";
    }
  } else if (valor == "lp") {
    if (lp.style.display == "" || lp.style.display == "block") {
      dp.style.display = "block";
      dpN.style.display = "none";
      da.style.display = "block";
      daN.style.display = "none";
      ln.style.display = "block";
      lnN.style.display = "none";
      lp.style.display = "none";
      lpN.style.display = "block";
      dad.style.display = "block";
      dadN.style.display = "none";
      dac.style.display = "block";
      dacN.style.display = "none";
    } else {
      lp.style.display = "block";
      lpN.style.display = "none";
    }
  } else if (valor == "dad") {
    if (dad.style.display == "" || dad.style.display == "block") {
      dp.style.display = "block";
      dpN.style.display = "none";
      da.style.display = "block";
      daN.style.display = "none";
      ln.style.display = "block";
      lnN.style.display = "none";
      lp.style.display = "block";
      lpN.style.display = "none";
      dad.style.display = "none";
      dadN.style.display = "block";
      dac.style.display = "block";
      dacN.style.display = "none";
    } else {
      dad.style.display = "block";
      dadN.style.display = "none";
    }
  } else if (valor == "ot") {
    if (ot.style.display == "" || ot.style.display == "block") {
      dp.style.display = "block";
      dpN.style.display = "none";
      da.style.display = "block";
      daN.style.display = "none";
      ln.style.display = "block";
      lnN.style.display = "none";
      lp.style.display = "block";
      lpN.style.display = "none";
      dad.style.display = "block";
      dadN.style.display = "none";
      dac.style.display = "block";
      dacN.style.display = "none";
    } else {
    }
  } else {
    if (dac.style.display == "" || dac.style.display == "block") {
      dp.style.display = "block";
      dpN.style.display = "none";
      da.style.display = "block";
      daN.style.display = "none";
      ln.style.display = "block";
      lnN.style.display = "none";
      lp.style.display = "block";
      lpN.style.display = "none";
      dad.style.display = "block";
      dadN.style.display = "none";
      dac.style.display = "none";
      dacN.style.display = "block";
    } else {
      dac.style.display = "block";
      dacN.style.display = "none";
    }
  }
}

export function changeHistorialClinicoAnterior(val) {
  if (val) {
    $("#hcAnterior").prop("disabled", false);
    $("#fRegistroHC").prop("disabled", false);
  } else {
    $("#hcAnterior").prop("disabled", true);
    $("#fRegistroHC").prop("disabled", true);
  }
}

export function changeDatosMedicos(val) {
  if (val) {
    document.getElementById("desactivatedGS").style.display = "none";
    document.getElementById("activatedGS").style.display = "block";
    document.getElementById("desactivatedFR").style.display = "none";
    document.getElementById("activatedFR").style.display = "block";
  } else {
    document.getElementById("desactivatedGS").style.display = "block";
    document.getElementById("activatedGS").style.display = "none";
    document.getElementById("desactivatedFR").style.display = "block";
    document.getElementById("activatedFR").style.display = "none";
  }
}

export function changeDatosContacto(val) {
  if (val) {
    $("#hcanterior").prop("disabled", false);
    $("#fechaHc").prop("disabled", false);
  } else {
    $("#hcanterior").prop("disabled", true);
    $("#fechaHc").prop("disabled", true);
  }
}

// INIT TABS
export function InitTabs() {
  $("ul.tabs").tabs();
}

export function InitChip() {
  $(document).ready(function () {
    $(".chips-placeholder").material_chip({
      placeholder: "",
      secondaryPlaceholder: "+Tag",
    });
  });
}
// INIT TABS END

// INIT COLLAPSIBLE
export function InitCollapsible() {
  $(".collapsible").collapsible();
}
// INIT COLLAPSIBLE END

// INIT SELECT
export function InitSelect() {
  $("select").material_select();
}

export function SelectOptionInmunization() {
  $(document).ready(function () {
    $("#inmunizacion").on("change", function (e) {
      var optionSelected = $("option:selected", this);
      var valueSelected = this.value;
      if (valueSelected == 2) {
        $("#inmIncompleta").prop("disabled", false);
      } else {
        $("#inmIncompleta").prop("disabled", true);
      }
    });
  });
}

// INIT SELECT END

// INIT DATEPICKER
export function Datepicker() {
  $(".datepicker").pickadate({
    firstDay: true,
  });
}

export function ShowPassword() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    document.getElementById("pwd").style.display = "none";
    document.getElementById("pwd2").style.display = "block";
    x.type = "text";
  } else {
    document.getElementById("pwd").style.display = "block";
    document.getElementById("pwd2").style.display = "none";
    x.type = "password";
  }
}

export function ShowNewPassword() {
  var x = document.getElementById("passwordnew");
  if (x.type === "password") {
    document.getElementById("conf_pwd").style.display = "none";
    document.getElementById("conf_pwd2").style.display = "block";
    x.type = "text";
  } else {
    document.getElementById("conf_pwd").style.display = "block";
    document.getElementById("conf_pwd2").style.display = "none";
    x.type = "password";
  }
}

export function ShowNewPasswordRep() {
  var x = document.getElementById("passwordnewrep");
  if (x.type === "password") {
    document.getElementById("conf_rep_pwd").style.display = "none";
    document.getElementById("conf_rep_pwd2").style.display = "block";
    x.type = "text";
  } else {
    document.getElementById("conf_rep_pwd").style.display = "block";
    document.getElementById("conf_rep_pwd2").style.display = "none";
    x.type = "password";
  }
}

export function UpdateAccount() {
  $("#updateAccount").modal();
}

export function UpdatePassword() {
  $("#updatePassword").modal();
}
// INIT DATEPICKER END

// ========== GENERAL END ==========

// ========== PROFILE ==========

export function ShowUpgradeImage() {
  document.getElementById("inputImagen").style.display = "block";
  document.getElementById("inputFirma").style.display = "block";
}

export function HideUpgradeImage() {
  document.getElementById("inputImagen").style.display = "none";
  document.getElementById("inputFirma").style.display = "none";
}

export function EditarCuenta() {
  document.getElementById("name").disabled = false;
  document.getElementById("last_name").disabled = false;
  document.getElementById("specialty").disabled = false;
  document.getElementById("tel").disabled = false;
  document.getElementById("cmp").disabled = false;
  document.getElementById("numdoc").disabled = false;
  document.getElementById("date").disabled = false;
  document.getElementById("img").disabled = false;
  document.getElementById("firma").disabled = false;
  document.getElementById("activate-genero").style.display = "none";
  document.getElementById("activate-type-document").style.display = "none";
  document.getElementById("desactivate-genero").style.display = "block";
  document.getElementById("desactivate-type-document").style.display = "block";
  document.getElementById("editar").style.display = "none";
  document.getElementById("guardar").style.display = "block";
  document.getElementById("aboutme").disabled = false;
}

export function GuardarCuenta() {
  document.getElementById("name").disabled = true;
  document.getElementById("last_name").disabled = true;
  document.getElementById("specialty").disabled = true;
  document.getElementById("tel").disabled = true;
  document.getElementById("cmp").disabled = true;
  document.getElementById("numdoc").disabled = true;
  document.getElementById("date").disabled = true;
  document.getElementById("img").disabled = true;
  document.getElementById("firma").disabled = true;
  document.getElementById("activate-genero").style.display = "block";
  document.getElementById("activate-type-document").style.display = "block";
  document.getElementById("desactivate-genero").style.display = "none";
  document.getElementById("desactivate-type-document").style.display = "none";
  document.getElementById("editar").style.display = "block";
  document.getElementById("guardar").style.display = "none";
  document.getElementById("aboutme").disabled = true;
}

export function ModalUpdateUser() {
  $("#updateAccount").modal();
}
// ========== PROFILE END ==========

// ========== HISTORIAL MEDICO ==========
export function HideDatatableHistorialConsultas() {
  document.getElementById("dataHistorialConsultas").style.display = "none";
}

export function ShowDatatableHistorialConsultas() {
  document.getElementById("dataHistorialConsultas").style.display = "block";
}

export function HideDatatableHistorialAntecedentesGenerales() {
  document.getElementById("dataHistorialAntecedentesGenerales").style.display =
    "none";
}

export function ShowDatatableHistorialAntecedentesGenerales() {
  document.getElementById("dataHistorialAntecedentesGenerales").style.display =
    "block";
}

export function HideDatatableHistorialAntecedentesGinecologicos() {
  document.getElementById(
    "dataHistorialAntecedentesGinecologicos"
  ).style.display = "none";
}

export function ShowDatatableHistorialAntecedentesGinecologicos() {
  document.getElementById(
    "dataHistorialAntecedentesGinecologicos"
  ).style.display = "block";
}

export function HideDatatableHistorialAntecedentesPatologicos() {
  document.getElementById(
    "dataHistorialAntecedentesPatologicos"
  ).style.display = "none";
}

export function ShowDatatableHistorialAntecedentesPatologicos() {
  document.getElementById(
    "dataHistorialAntecedentesPatologicos"
  ).style.display = "block";
}

export function HideDatatableHistorialAntecedentesPatologicosFamiliares() {
  document.getElementById(
    "dataHistorialAntecedentesPatologicosFamiliares"
  ).style.display = "none";
}

export function ShowDatatableHistorialAntecedentesPatologicosFamiliares() {
  document.getElementById(
    "dataHistorialAntecedentesPatologicosFamiliares"
  ).style.display = "block";
}

export function HideDatatableAnalysis() {
  document.getElementById("dataAnalysis").style.display = "none";
}

export function ShowDatatableAnalysis() {
  document.getElementById("dataAnalysis").style.display = "block";
}

export function HideDatatableCMEsperaAdmision() {
  document.getElementById("dataEsperaAdmision").style.display = "none";
}

export function ShowDatatableCMEsperaAdmision() {
  document.getElementById("dataEsperaAdmision").style.display = "block";
}

export function HideDatatableCMTrazabilidad() {
  document.getElementById("dataCmTrazabilidad").style.display = "none";
}

export function ShowDatatableCMTrazabilidad() {
  document.getElementById("dataCmTrazabilidad").style.display = "block";
}

export function NotificationNuevoAnalisis(user) {
  Push.create("Nueva Analisis médico", {
    body: `Doctor ${user.name} ${user.last_name}`,
    icon: urlBase + "/web/doctor/dist/assets/images/mifarma_notification.png",
    timeout: 40000,
    onClick: function () {
      // window.focus();
      window.location = urlBase + "/web/paciente/dist/analisis-medico";
      this.close();
    },
  });
}

export function LoadTableAnalisis(dataTable) {
  $(".paginate_page").val("Página");
  var table = $("#tableAnalisis").DataTable({
    order: [[0, "desc"]],
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo:
        "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    },
    data: dataTable,
  });
  $("select").material_select();
  $("#tableAnalisis tbody").on("click", "a#selectTableAnalisis", function () {
    let row = table.row($(this).parents("tr")).data();
    $("#pacienteAnalisis").text(row[4]);
    $("#fechaAnalisis").text(row[3]);

    $.ajax({
      type: "GET",
      url: urlBase + "/api/get/one/order/" + row[0],
      dataType: "json",
      contentType: "application/json; charset=utf-8",
      success: function (response) {
        console.log("analisis paciente", response);
        $("#doctorAnalisis").text(response.data.doctor);
        $("#fechaAnalisis").text(response.data.created_at);
        $("#pacienteAnalisis").text(response.data.paciente);

        let details = JSON.parse(response.data.details);

        let html = "";
        details.data.forEach((element) => {
          let str = `<tr>
            <td>${element.code}</td>
            <td>${element.analysis}</td>
            <td>S/${element.price}</td>
          </tr>`;
          html += str;
        });
        document.getElementById("detailOrder").innerHTML = html;
      },
      error: function (error) {
        console.log(error);
      },
    });

    $("#btnVerAnalisis").on("click", function () {});
  });
}

export function InitGenerarAnalisis() {
  let namePatient = localStorage.getItem("name_patient_analisis");
  let idPatient = localStorage.getItem("id_patient_analisis");

  document.getElementById("idPacienteAnalisis").value = idPatient;
  document.getElementById("namePacienteAnalisis").value = namePatient;
}
// ========== HISTORIAL MEDICO END ==========

// ========== RECETA ==========
export function getDetailPatientRecipe() {
  let query_id = localStorage.getItem("query_recipe_id");
  $.ajax({
    type: "GET",
    url: urlBase + "/api/get/details/patient/" + query_id,
    dataType: "json",
    contentType: "application/json; charset=utf-8",
    success: function (response) {
      $("#nameEmitReceta").text(response.data.name);
      $("#dateEmitReceta").text(response.data.date);
    },
    error: function (error) {
      console.log(error);
    },
  });
}

export function HideDataTableReceta() {
  document.getElementById("dataTableReceta").style.display = "none";
}

export function ShowDataTableReceta() {
  $(document).ready(function () {
    document.getElementById("dataTableReceta").style.display = "block";
  });
}

export function LoadTableHistory(dataTable) {
  $(".paginate_page").val("Página");
  var table = $("#tableHistory").DataTable({
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo:
        "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    },
    data: dataTable,
  });
  $("select").material_select();

  $("#tableHistory tbody").on("click", "a#selectTableHistory", function () {
    localStorage.setItem(
      "treatment_id",
      table.row($(this).parents("tr")).data()[0]
    );
    console.log(table.row($(this).parents("tr")).data()[0]);

    let url =
      "/web/doctor/dist/historial-medico/" +
      table.row($(this).parents("tr")).data()[0];
    window.location.href = url;
  });
}

export function HideDataTableHistory() {
  document.getElementById("dataTableHistory").style.display = "none";
}

export function ShowDataTableHistory() {
  document.getElementById("dataTableHistory").style.display = "block";
}

export function InitRecipe(val) {
  $(document).ready(function () {
    $("ul.tabs").tabs("select_tab", val);
  });
}

export function InitAnalisis(val) {
  $(document).ready(function () {
    $("ul.tabs").tabs("select_tab", val);
  });
}

export function LoadTableHistorialConsultas(dataTable) {
  console.log(dataTable);
  $(".paginate_page").val("Página");
  var table = $("#tableHistorialConsultas").DataTable({
    pageLength: 2,
    destroy: true,
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo:
        "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    },
    data: dataTable,
  });

  $("select").material_select();

  $("#tableHistorialConsultas tbody").on(
    "click",
    "a#selectTableHistorialConsultas",
    function () {
      let id = table.row($(this).parents("tr")).data()[0];
      // window.location.href = `http://localhost:4200/ver-consulta-medica-hitorial/${id}`
      localStorage.setItem("consulta-medica-history", id);
    }
  );
}

export function LoadTableHistorialAntecedentesGenerales(dataTable) {
  $(".paginate_page").val("Página");
  var table = $("#tableHistorialAntecedentesGenerales").DataTable({
    pageLength: 2,
    destroy: true,
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo:
        "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    },
    data: dataTable,
  });
  $("select").material_select();

  $("#tableHistorialAntecedentesGenerales tbody").on(
    "click",
    "a#selectTableHistorialAntecedentesGenerales",
    function () {
      let id = table.row($(this).parents("tr")).data()[0];
      // window.location.href = `http://localhost:4200/ver-antecedente-general/${id}`
      localStorage.setItem("antecedente-general-history", id);
    }
  );
}

export function LoadTableHistorialAntecedentesGinecologicos(dataTable) {
  $(".paginate_page").val("Página");
  var table = $("#tableHistorialAntecedentesGinecologicos").DataTable({
    pageLength: 2,
    destroy: true,
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo:
        "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    },
    data: dataTable,
  });
  $("select").material_select();

  $("#tableHistorialAntecedentesGinecologicos tbody").on(
    "click",
    "a#selectTableHistorialAntecedentesGinecologicos",
    function () {
      let id = table.row($(this).parents("tr")).data()[0];
      // window.location.href = `http://localhost:4200/ver-antecedente-ginecologico/${id}`
      localStorage.setItem("antecedente-ginecologico-history", id);
    }
  );
}

export function LoadTableHistorialAntecedentesPatologicos(dataTable) {
  $(".paginate_page").val("Página");
  var table = $("#tableHistorialAntecedentesPatologicos").DataTable({
    pageLength: 2,
    destroy: true,
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo:
        "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    },
    data: dataTable,
  });
  $("select").material_select();

  $("#tableHistorialAntecedentesPatologicos tbody").on(
    "click",
    "a#selectTableHistorialAntecedentesPatologicos",
    function () {
      let id = table.row($(this).parents("tr")).data()[0];
      // window.location.href = `http://localhost:4200/ver-antecedente-patologico/${id}`
      localStorage.setItem("antecedente-patologico-history", id);
    }
  );
}

export function LoadTableHistorialAntecedentesPatologicosFamiliares(dataTable) {
  $(".paginate_page").val("Página");
  var table = $("#tableHistorialAntecedentesPatologicosFamiliares").DataTable({
    pageLength: 2,
    destroy: true,
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo:
        "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    },
    data: dataTable,
  });
  $("select").material_select();

  $("#tableHistorialAntecedentesPatologicosFamiliares tbody").on(
    "click",
    "a#selectTableHistorialAntecedentesPatologicosFamiliares",
    function () {
      let id = table.row($(this).parents("tr")).data()[0];
      // window.location.href = `http://localhost:4200/ver-antecedente-patologico-familiar/${id}`
      localStorage.setItem("antecedente-patologico-familiar-history", id);
    }
  );
}

export function LoadTableReceta(dataTable) {
  $(".paginate_page").val("Página");
  var table = $("#tableReceta").DataTable({
    order: [[0, "desc"]],
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo:
        "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    },
    data: dataTable,
  });
  $("select").material_select();

  $("#tableReceta tbody").on("click", "a#selectTableReceta", function () {
    localStorage.setItem(
      "treatment_id",
      table.row($(this).parents("tr")).data()[0]
    );
    let user = JSON.parse(localStorage.getItem("identity"));
    let namePaciente = table
      .row($(this).parents("tr"))
      .data()[3]
      .split("30px'>");

    // establecer fecha de receta
    $("#modalVerReceta div div div #fechaReceta").text(
      table.row($(this).parents("tr")).data()[4]
    );
    $("#namePacienteReceta").text(namePaciente[1].split("</p>")[0]);
    // establecer nombre del usuario
    let url =
      urlBase +
      "/api/get/medicaments/treatment/" +
      table.row($(this).parents("tr")).data()[0];

    // let datos = JSON.stringify(params)
    $.ajax({
      type: "GET",
      url: url,
      dataType: "json",
      contentType: "application/json; charset=utf-8",
      success: function (response) {
        localStorage.setItem("recetaToOpen", response.data.receta_medica);

        console.log("MEDICAMENTS", response);
        $("#nombreUsuario").text(response.data.patient.name);
        $("#nameDoctor").text(response.data.doctor.name);
        $("#cmpDoctor").text(response.data.doctor.cmp);
        $("#especialidadDoctor").text(response.data.doctor.specialty);
        $("#fechaDoctor").text(response.data.patient.date);
        $("#edadReceta").text(response.data.patient.years_old);
        $("#validez").text(response.data.patient.validity);

        $("#diagnostico").text(``);
        for (let medicament of response.data.diagnostics) {
          $("#diagnostico").append(
            `<li>
              <b>${medicament.code}</b>
              <td>${medicament.description}</td>
            </li>`
          );
        }

        $("#tratamiento").text(``);
        for (let medicament of response.data.treatment) {
          $("#tratamiento").append(
            `<tr>
              <td>${medicament.medicament}</td>
              <td>${medicament.um}</td>
              <td>${medicament.quantity}</td>
            </tr>`
          );
        }

        $("#indicaciones").text(``);
        for (let medicament of response.data.indications) {
          $("#indicaciones").append(
            `<tr>
              <td>${medicament.medicament}</td>
              <td>${medicament.way_administration}</td>
              <td>${medicament.frequency}</td>
              <td>${medicament.duration}</td>
            </tr>`
          );
        }
      },
      error: function (error) {
        console.log(error);
      },
    });
  });
}

export function LoadTableDiagnostico(dataTable) {
  $(".paginate_page").val("Página");
  var table = $("#tableDiagnostico").DataTable({
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo:
        "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    },
    data: dataTable,
  });
  $("select").material_select();
  $("#tableDiagnostico_filter").css("visibility", "hidden");
}

export function AgregarTableDiagnostico(value) {
  $(document).ready(function () {
    var table = $("#tableDiagnostico").DataTable();
    var rowNode = table.row.add(value).draw().node();
  });
}

export function LoadTableTratamiento(dataTable) {
  var table = $("#tableTratamiento").DataTable({
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo:
        "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    },
    data: dataTable,
  });
  $("#tableTratamiento_filter").hide();
  $("#tableTratamiento_paginate").hide();
  $("#tableTratamiento_length").hide();
  $("#tableTratamiento_info").hide();
  $(".chev").hide();
}

export function ObtenerTableMedicamento() {
  var table = $("#tableTratamiento").DataTable();
  var data = table.rows().data();
  console.log("MEDICAMENTOS DATA", data);
  let medicamentoArr = [];
  for (let i = 0; i < data.length; i++) {
    let med = {
      medicine: data[i][1],
      treatment: data[i][2],
      way_administration: data[i][3],
      dose: data[i][4],
      quantity: data[i][5],
    };
    medicamentoArr.push(med);
  }
  let receta_json = { data: medicamentoArr };
  let receta_json_str = JSON.stringify(receta_json);
  localStorage.setItem("receta_json", receta_json_str);
}

export function AgregarTableMedicamento(value) {
  $(document).ready(function () {
    var table = $("#tableTratamiento").DataTable();
    var rowNode = table.row.add(value).draw().node();
    ObtenerTableMedicamento();
    document.getElementById("tableTratamiento_filter").style.visibility =
      "hidden";
  });
}

export function EliminarTableMedicamento() {
  function eliminarMedicamento() {
    var table = $("#tableTratamiento").DataTable();

    $("#tableTratamiento tbody").on(
      "click",
      "button#agregarMedicamento",
      function () {
        table.row($(this).parents("tr")).remove().draw();
      }
    );
  }
}

export function ModalReceta() {
  $("#modalReceta").modal();
}
export function ModalVerReceta() {
  $("#modalVerReceta").modal();
}

export function ModalEnvioReceta() {
  $("#modalEnvioReceta").modal();
}

export function AutocompleteMedicine(data) {
  // AUTOCOMPLETE MEDICAMENTO
  $(document).ready(function () {
    console.log("MEDICAMENTO", data);
    $("#medicamento").autocomplete({
      data: data,
      limit: 4,
      onAutocomplete: function (val) {
        // Callback function when value is autcompleted.
      },
      minLength: 1,
    });
  });
}

var contMedicamento = 1;
export function AgregarMedicamento() {
  var medicamento = document.getElementById("medicamento").value;
  var especificacion = document.getElementById("especificacion").value;
  var divReceta = document.getElementById("lista-medicamentos");
  var diasMedicamento = document.getElementById("diasMedicamento").value;
  var horaMedicamento = document.getElementById("horaMedicamento").value;
  var tiempoMedicamento = diasMedicamento + horaMedicamento;
  if (diasMedicamento != "" && horaMedicamento != "") {
    tiempoMedicamento =
      ". Cada " +
      horaMedicamento +
      " horas " +
      "por " +
      diasMedicamento +
      " dias";
  }
  if (medicamento != "" && especificacion != "") {
    var btnGenerar = document.getElementById("btnGenerar");
    btnGenerar.style.display = "block";
    divReceta.innerHTML +=
      "" +
      "<li>" +
      '<div class="collapsible-header">' +
      medicamento +
      "</div>" +
      '<div class="collapsible-body"><span>' +
      especificacion +
      tiempoMedicamento +
      "</span></div>" +
      "</li>";
  }
  contMedicamento++;
}

export function ModalGenerarReceta() {
  $("#modalReceta").modal();
}
// ========== RECETA END =========

// ========== AYUDA ==========
export function RespuestaUtil() {
  Materialize.toast("La respuesta fue útil", 2000, "rounded");
}
export function RespuestaNoUtil() {
  Materialize.toast("La respuesta no fue útil", 2000, "rounded");
}
export function PreguntasCategoria(valor) {
  if (valor == "frecuentes") {
    document.getElementById("frecuentes").style.display = "block";
    document.getElementById("categoria1").style.display = "none";
    document.getElementById("categoria2").style.display = "none";
    document.getElementById("categoria3").style.display = "none";
  } else if (valor == "categoria1") {
    document.getElementById("frecuentes").style.display = "none";
    document.getElementById("categoria1").style.display = "block";
    document.getElementById("categoria2").style.display = "none";
    document.getElementById("categoria3").style.display = "none";
  } else if (valor == "categoria2") {
    document.getElementById("frecuentes").style.display = "none";
    document.getElementById("categoria1").style.display = "none";
    document.getElementById("categoria2").style.display = "block";
    document.getElementById("categoria3").style.display = "none";
  } else {
    document.getElementById("frecuentes").style.display = "none";
    document.getElementById("categoria1").style.display = "none";
    document.getElementById("categoria2").style.display = "none";
    document.getElementById("categoria3").style.display = "block";
  }
}
// ========== AYUDA END ==========

export function TabState() {
  $(document).ready(function () {
    var swipe = localStorage.getItem("swipeReceta");
    $("ul.tabs").tabs("select_tab", swipe);
  });
}

function irAEmitirReceta() {
  localStorage.setItem("swipeReceta", "emitir-receta");
}

function limpiarRecetaLS() {
  localStorage.setItem("swipeReceta", "recetas");
}

function modalVideo() {
  $("#modalVideo").modal();
}

export function OpenVideoCall(doctor_sinch, patient_sinch) {
  let doctor = JSON.parse(localStorage.getItem("identity"));

  var h = screen.height;
  var w = screen.width;

  // let popup = window.open(`https://test.alo.doctor/demo/?from=Santiago2569865454&to=Andres1551818629`,'Videollama Alo Doctor', 'toolbar=no ,location=0, status=no,titlebar=no,menubar=no,width='+w +',height=' +h);
  let popup = window.open(
    `https://telemedicinasocket.herokuapp.com/?from=${doctor_sinch}&to=${patient_sinch}`,
    "Videollama Alo Doctor",
    "toolbar=no ,location=0, status=no,titlebar=no,menubar=no,width=" +
      w +
      ",height=" +
      h
  );

  var popupTick = setInterval(function () {
    if (popup.closed) {
      let stateDoctor = {
        status: 1,
        doctor_id: doctor.id,
      };
      clearInterval(popupTick);
      /*let dataStateDoctor = JSON.stringify(stateDoctor);
      $.ajax({
        type: 'POST',
        url: 'https://telemedicina.today/api/update/status',
        data: dataStateDoctor,
        dataType: 'json',
        contentType: 'application/json; charset=utf-8',
        success: function(responseStateDoctor) {
          clearInterval(popupTick);
        },
        error: function(error) {
          clearInterval(popupTick);
        }
      });*/
    }
  });
}

export function InitModal() {
  $(document).ready(function () {
    $(".modal").modal();
  });
}

export function OpenModalConfirmationCall() {
  $("#confirmationCall").modal({
    dismissible: false, // Modal can be dismissed by clicking outside of the modal
    opacity: 0.5, // Opacity of modal background
  });

  $("#confirmationCall").modal("open");

  var audio = document.getElementById("ringtone");
  audio.play();
}

export function closeModalConfirmationCall() {
  $("#confirmationCall").modal("close");
}

export function offAudioCall() {
  var audio = document.getElementById("ringtone");
  audio.pause();
  audio.currentTime = 0;
}

export function SetDataPatient(patient_sinch) {
  $.ajax({
    type: "GET",
    url: urlBase + "/api/get/temp/symptom/" + patient_sinch,
    dataType: "json",
    contentType: "application/json; charset=utf-8",
    success: function (response) {
      $("#name").text(response.data.name);
      $("#lastname").text(response.data.last_name);
      $("#gender").text(response.data.genero);
      $("#years_old").text(response.data.years_old);
      $("#location").text(response.data.city);
      $("#symptom").text(response.data.message);
    },
    error: function (error) {
      console.log(error);
    },
  });
}

export function modalMessage() {
  $("#modalMessage").css("left", "inherit");
  $("#modalMessage").modal();
}

export function ModalFinishCall() {
  $("#modalFinishCall").modal();
}

export function EnviarMensaje(message) {
  let html = message.trim();
  let list_chat = document.getElementById("list-chat");
  list_chat.innerHTML = list_chat.innerHTML + html;
  document.getElementById("messageChat").value = "";
}

// MODALES
function modReceta() {
  $("#modalReceta").modal();
}

function modalEnvioReceta() {
  $("#modalEnvioReceta").modal();
}

export function LoadTableHistorial() {
  $(".paginate_page").val("Página");
  var table = $("#tableHistorial").DataTable({
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo:
        "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    },
    data: [
      [
        "1",
        "0122255",
        "Andrea Sanchez A.",
        "05 / 05 / 2018",
        "05 / 05 / 2018",
        "<div class = 'center'><a onclick='modHistorial()' href='/doctor-historial-medico' class='format modal-trigger waves-effect btn btn-color' style='background-color: #868686; width: auto'>Ver</a> &nbsp;" +
          "<a onclick='modHistorial()' href='/doctor-historial-medico' class='format modal-trigger waves-effect btn btn-color' style='background-color: #f09721; width: auto'>Pdf</a></div>",
      ],
    ],
  });
  $("select").material_select();
}

export function DropdownMenu() {
  $(".dropdown-button").dropdown({
    inDuration: false,
    outDuration: false,
    constrainWidth: true, // Does not change width of dropdown to that of the activator
    hover: false, // Activate on hover
    gutter: 100, // Spacing from edge
    belowOrigin: false, // Displays dropdown below the button
    alignment: "left", // Displays dropdown with edge aligned to the left of button
    stopPropagation: false, // Stops event propagation
  });
}

// DATAPICKER
export function DatepickerCustom() {
  $(".datepicker").pickadate({
    firstDay: true,
  });
}

// DATAPICKER END
export function fullScreen() {
  document.getElementById("f1").style.display = "none";
  document.getElementById("f2").style.display = "block";
  var el = document.documentElement,
    rfs = // for newer Webkit and Firefox
      el.requestFullScreen ||
      el.webkitRequestFullScreen ||
      el.mozRequestFullScreen ||
      el.msRequestFullScreen;
  if (typeof rfs != "undefined" && rfs) {
    rfs.call(el);
  } else if (typeof window.ActiveXObject != "undefined") {
    // for Internet Explorer
    var wscript = new ActiveXObject("WScript.Shell");
    if (wscript != null) {
      wscript.SendKeys("{F11}");
    }
  }
}

export function fullScreen1() {
  document.getElementById("fs1").style.display = "none";
  document.getElementById("fs2").style.display = "block";
  var el = document.documentElement,
    rfs = // for newer Webkit and Firefox
      el.requestFullScreen ||
      el.webkitRequestFullScreen ||
      el.mozRequestFullScreen ||
      el.msRequestFullScreen;
  if (typeof rfs != "undefined" && rfs) {
    rfs.call(el);
  } else if (typeof window.ActiveXObject != "undefined") {
    // for Internet Explorer
    var wscript = new ActiveXObject("WScript.Shell");
    if (wscript != null) {
      wscript.SendKeys("{F11}");
    }
  }
}

export function fullScreenChat() {
  var el = document.documentElement,
    rfs = // for newer Webkit and Firefox
      el.requestFullScreen ||
      el.webkitRequestFullScreen ||
      el.mozRequestFullScreen ||
      el.msRequestFullScreen;
  if (typeof rfs != "undefined" && rfs) {
    rfs.call(el);
  } else if (typeof window.ActiveXObject != "undefined") {
    // for Internet Explorer
    var wscript = new ActiveXObject("WScript.Shell");
    if (wscript != null) {
      wscript.SendKeys("{F11}");
    }
  }
}

export function escScreen() {
  document.getElementById("f1").style.display = "block";
  document.getElementById("f2").style.display = "none";
  if (document.exitFullscreen) document.exitFullscreen();
  else if (document.mozCancelFullScreen) document.mozCancelFullScreen();
  else if (document.webkitExitFullscreen) document.webkitExitFullscreen();
  else if (document.msExitFullscreen) document.msExitFullscreen();
}

export function escScreen1() {
  document.getElementById("fs1").style.display = "block";
  document.getElementById("fs2").style.display = "none";
  if (document.exitFullscreen) document.exitFullscreen();
  else if (document.mozCancelFullScreen) document.mozCancelFullScreen();
  else if (document.webkitExitFullscreen) document.webkitExitFullscreen();
  else if (document.msExitFullscreen) document.msExitFullscreen();
}

export function escScreenChat() {
  if (document.exitFullscreen) document.exitFullscreen();
  else if (document.mozCancelFullScreen) document.mozCancelFullScreen();
  else if (document.webkitExitFullscreen) document.webkitExitFullscreen();
  else if (document.msExitFullscreen) document.msExitFullscreen();
}

export function MostrarMenu() {
  document.getElementById("contenido").classList.remove("s11");
  document.getElementById("contenido").classList.remove("m11");
  document.getElementById("contenido").classList.add("s10");
  document.getElementById("contenido").classList.add("m10");
  document.getElementById("navActive").style.display = "block";
  document.getElementById("nav1").style.display = "none";
  document.getElementById("logofarma").style.display = "block";
  document.getElementById("logofarma1").style.display = "none";
  document.getElementById("section-content").style.padding = "4% 4% 4% 4%";
  document.getElementById("hamb1").style.display = "block";
  document.getElementById("hamb").style.display = "none";
}

export function OcultarMenu() {
  document.getElementById("contenido").classList.remove("s10");
  document.getElementById("contenido").classList.remove("m10");
  document.getElementById("contenido").classList.add("s11");
  document.getElementById("contenido").classList.add("m11");
  document.getElementById("navActive").style.display = "none";
  document.getElementById("nav1").style.display = "block";
  document.getElementById("logofarma").style.display = "none";
  document.getElementById("logofarma1").style.display = "block";
  document.getElementById("section-content").style.padding = "4% 4% 4% 0%";
  document.getElementById("hamb1").style.display = "none";
  document.getElementById("hamb").style.display = "block";
}

export function ModalConsulta() {
  $("#modal1").modal();
}

export function ModalAnalisis() {
  $("#modal1").modal();
}

// CHANGE ICON DROPDOWN
export function ChangeIconDropDown(valor) {
  var df = document.getElementById("df");
  var dfN = document.getElementById("dfN");
  var ah = document.getElementById("ah");
  var ahN = document.getElementById("ahN");
  var ap = document.getElementById("ap");
  var apN = document.getElementById("apN");

  if (valor == "df") {
    if (df.style.display == "" || df.style.display == "block") {
      df.style.display = "none";
      dfN.style.display = "block";
      ah.style.display = "block";
      ahN.style.display = "none";
      ap.style.display = "block";
      apN.style.display = "none";
    } else {
      df.style.display = "block";
      dfN.style.display = "none";
    }
  } else if (valor == "ah") {
    if (ah.style.display == "" || ah.style.display == "block") {
      df.style.display = "block";
      dfN.style.display = "none";
      ah.style.display = "none";
      ahN.style.display = "block";
      ap.style.display = "block";
      apN.style.display = "none";
    } else {
      ah.style.display = "block";
      ahN.style.display = "none";
    }
  } else {
    if (ap.style.display == "" || ap.style.display == "block") {
      df.style.display = "block";
      dfN.style.display = "none";
      ah.style.display = "block";
      ahN.style.display = "none";
      ap.style.display = "none";
      apN.style.display = "block";
    } else {
      ap.style.display = "block";
      apN.style.display = "none";
    }
  }
}
// CHANGE ICON DROPDOWN END

// ESTADOS DEL DOCTOR
export function ActivarEstado() {
  document.getElementById("iconEstado").style.color = "#5fb302";
  document.getElementById("iconEstadoActivo").style.color = "#9e9e9e";
  document.getElementById("iconEstadoOcupado").style.color = "#000000";
  document.getElementById("iconEstadoInactivo").style.color = "#000000";
}

export function OcuparEstado() {
  document.getElementById("iconEstado").style.color = "red";
  document.getElementById("iconEstadoActivo").style.color = "#000000";
  document.getElementById("iconEstadoOcupado").style.color = "#9e9e9e";
  document.getElementById("iconEstadoInactivo").style.color = "#000000";
}

export function InactivarEstado() {
  document.getElementById("iconEstado").style.color = "#3FBFBF";
  document.getElementById("iconEstadoActivo").style.color = "#000000";
  document.getElementById("iconEstadoOcupado").style.color = "#000000";
  document.getElementById("iconEstadoInactivo").style.color = "#9e9e9e";
}

/*======CENTROE MEDICO=======*/
export function ModalDetalleAtencion() {
  $(document).ready(function () {
    $("#modalDetalleAtencion").modal();
  });
}

export function ModalVerConsultaMedica() {
  $(document).ready(function () {
    $("#modalVerConsultaMedica").modal();
  });
}

export function ModalMensajeSistema() {
  $(document).ready(function () {
    $("#modalMensajeSistema").modal();
  });
}

export function ModalImpresionReceta() {
  $(document).ready(function () {
    $("#modalImpresionReceta").modal();
  });
}

export function ModalMensajeSistema01() {
  $(document).ready(function () {
    $("#modalMensajeSistema01").modal();
  });
}

export function LoadTableEsperaAdmision(dataTable) {
  $(".paginate_page").val("Página");
  var table = $("#tableEsperaAdmision").DataTable({
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo:
        "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    },
    data: dataTable,
  });

  $("#tableEsperaAdmision tbody").on(
    "click",
    "a#selectTableEsperaAdmision",
    function () {
      let id = table.row($(this).parents("tr")).data()[0];
      localStorage.setItem("consulta_pendiente_id", id);
    }
  );
}

export function LoadTableTrazabilidad(dataTable) {
  $(".paginate_page").val("Página");

  var table = $("#tableTrazabilidad").DataTable({
    destroy: true,
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo:
        "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    },
    data: dataTable,
  });

  table.clear().draw();

  table.rows.add(dataTable);
  table.columns.adjust().draw();

  //document.getElementById('tableTrazabilidad_filter').style.visibility = 'hidden';

  $("#tableTrazabilidad tbody").on(
    "click",
    "a#selectTableTrazabilidad",
    function () {
      let id = table.row($(this).parents("tr")).data()[0];
      localStorage.setItem("ver_consulta_pendiente_id", id);
      console.log(id);
    }
  );

  $("#tableTrazabilidad tbody").on("click", "a#selectTableReceta", function () {
    console.log("ROW SELECTED", table.row($(this).parents("tr")).data());

    let row = table.row($(this).parents("tr")).data();

    $("#nuevoComprobante div div div #fechaAnalisis").text(row[3]);
    $("#nuevoComprobante div div div #nombrePacienteAnalisis").text(row[4]);

    $("#cuerpoComprobante").append(`<tr>
      <td>${table.row($(this).parents("tr")).data()[2]}</td>
      <td>S/.15.00</td>
      <td>S/.5.00</td>
      <td #amount>S/.20.00</td>
    </tr>`);

    $("#btnGenerarComprobante").on("click", function () {
      let params = {
        order_id: row[0],
        patient_id: "2",
        nro_receipt: row[1],
        amount: "20.00",
      };
      let data = JSON.stringify(params);
      $.ajax({
        type: "POST",
        url: urlBase + "/api/save/receipt",
        data: data,
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        success: function (response) {
          console.log("comprobante guardado", response);
          window.location = urlBase + "/web/secretaria/dist/analisis-medico";
        },
        error: function (error) {
          console.log(error);
        },
      });
    });
  });
}

export function AutocompleteAntecedenteP() {
  $(document).ready(function () {
    $("#antecedentePatologico").autocomplete({
      data: {
        "CIE N64.3-Galactorrea no asociada con el parto": null,
        "CIE O10-Hipertensión preexistente que complica el embarazo, el parto y el puerperio": null,
        "CIE O10.0-Hipertensión esencial preexistente que complica el embarazo, el parto y el puerperio": null,
        "CIE O10.1-Enfermedad cardíaca hipertensiva preexistente que complica el embarazo, el parto y el puerperio": null,
        "CIE O10.2-Enfermedad renal hipertensiva preexistente que complica el embarazo, el parto y el puerperio": null,
        "CIE O10.3-Enfermedad cardiorrenal hipertensiva preexistente que complica el embarazo, el parto y el puerperio": null,
        "CIE O10.4-Hipertensión secundaria preexistente que complica el embarazo, el parto y el puerperio, el parto y el puerperio": null,
        "CIE O10.9-Hipertensión preexistente no especificada, que complica el embarazo, el parto y el puerperio": null,
        "CIE O15.1-Eclampsia durante el trabajo de parto": null,
        "CIE O26.6-Trastornos del hígado en el embarazo, el parto y el puerperio": null,
        "CIE O26.7-Subluxación de la sínfisis (del pubis) en el embarazo, el parto y el puerperio": null,
        "CIE O42.0-Ruptura prematura de las membranas, e inicio del trabajo de parto dentro de las 24 horas": null,
        "CIE O42.1-Ruptura prematura de las membranas, e inicio del trabajo de parto después de las 24 horas": null,
        "CIE O42.2-Ruptura prematura de las membranas, trabajo de parto retrasado por la terapéutica": null,
        "CIE O46-Hemorragia anteparto, no clasificada en otra parte": null,
        "CIE O46.0-Hemorragia anteparto con defecto de la coagulación": null,
        "CIE O46.8-Otras hemorragias anteparto": null,
        "CIE O46.9-Hemorragia anteparto, no especificada": null,
        "CIE O47-Falso trabajo de parto": null,
        "CIE O47.0-Falso trabajo de parto antes de las 37 semanas completas de gestación": null,
        "CIE O47.1-Falso trabajo de parto a las 37 y más semanas completas de gestación": null,
        "CIE O47.9-Falso trabajo de parto, sin otra especificación": null,
        "CIE O60-Parto prematuro": null,
        "CIE O61.0-Fracaso de la inducción médica del trabajo de parto": null,
        "CIE O61.1-Fracaso de la inducción instrumental del trabajo de parto": null,
        "CIE O61.8-Otros fracasos de la inducción del trabajo de parto": null,
        "CIE O61.9-Fracaso no especificado de la inducción del trabajo de parto": null,
        "CIE O62-Anormalidades de la dinámica del trabajo de parto": null,
        "CIE O62.3-Trabajo de parto precipitado": null,
        "CIE O62.8-Otras anomalías dinámicas del trabajo de parto": null,
        "CIE O62.9-Anomalía dinámica del trabajo de parto, no especificada": null,
        "CIE O63-Trabajo de parto prolongado": null,
        "CIE O63.0-Prolongación del primer período (del trabajo de parto)": null,
        "CIE O63.1-Prolongación del segundo período (del trabajo de parto)": null,
        "CIE O63.9-Trabajo de parto prolongado, no especificado": null,
        "CIE O64-Trabajo de parto obstruido debido a mala posición y presentación anormal del feto": null,
        "CIE O64.0-Trabajo de parto obstruido debido a rotación incompleta de la cabeza fetal": null,
        "CIE O64.1-Trabajo de parto obstruido debido a presentación de nalgas": null,
        "CIE O64.2-Trabajo de parto obstruido debido a presentación de cara": null,
        "CIE O64.3-Trabajo de parto obstruido debido a presentación de frente": null,
        "CIE O64.4-Trabajo de parto obstruido debido a presentación de hombro": null,
        "CIE O64.5-Trabajo de parto obstruido debido a presentación compuesta": null,
        "CIE O64.8-Trabajo de parto obstruido debido a otras presentaciones anormales del feto": null,
        "CIE O64.9-Trabajo de parto obstruido debido a presentación anormal del feto no especificada": null,
        "CIE O65-Trabajo de parto obstruido debido a anormalidad de la pelvis materna": null,
        "CIE O65.0-Trabajo de parto obstruido debido a deformidad de la pelvis": null,
        "CIE O65.1-Trabajo de parto obstruido debido a estrechez general de la pelvis": null,
        "TCIE O65.2-rabajo de parto obstruido debido a disminución del estrecho superior de la pelvis": null,
        "CIE O65.3-Trabajo de parto obstruido debido a disminución del estrecho inferior de la pelvis": null,
        "TCIE O65.4-rabajo de parto obstruido debido a desproporción fetopelviana, sin otra especificación": null,
        "CIE O65.5-Trabajo de parto obstruido debido a anomalías de los órganos pelvianos maternos": null,
        "CIE O65.8-Trabajo de parto obstruido debido a otras anomalías pelvianas maternas": null,
        "CIE O65.9-Trabajo de parto obstruido debido a anomalía pelviana no especificada": null,
        "CIE O66-Otras obstrucciones del trabajo de parto": null,
        "CIE O66.0-Trabajo de parto obstruido debido a distocia de hombros": null,
        "CIE O66.1-Trabajo de parto obstruido debido a distocia gemelar": null,
        "CIE O66.2-Trabajo de parto obstruido debido a distocia por feto inusualmente grande": null,
        "CIE O66.3-Trabajo de parto obstruido debido a otras anormalidades del feto": null,
        "CIE O66.4-Fracaso de la prueba del trabajo de parto, no especificada": null,
        "CIE O66.8-Otras obstrucciones especificadas del trabajo de parto": null,
        "CIE O66.9-Trabajo de parto obstruido, sin otra especificación": null,
        "CIE O67-Trabajo de parto y parto complicados por hemorragia intraparto, no clasificados en otra parte": null,
        "CIE O67.0-Hemorragia intraparto con defectos de la coagulación": null,
        "CIE O67.8-Otras hemorragias intraparto": null,
        "CIE O67.9-Hemorragia intraparto, no especificada": null,
        "CIE O68-Trabajo de parto y parto complicados por sufrimiento fetal": null,
        "CIE O68.0-Trabajo de parto y parto complicados por anomalía de la frecuencia cardíaca fetal": null,
        "CIE O68.1-Trabajo de parto y parto complicados por la presencia de meconio en el líquido amniótico": null,
        "CIE O68.2-Trabajo de parto y parto complicados por anomalía de la frecuencia cardíaca fetal asociada con presencia de meconio en el líquido amniótico": null,
        "CIE O68.3-Trabajo de parto y parto complicados por evidencia bioquímica de sufrimiento fetal": null,
        "CIE O68.8-Trabajo de parto y parto complicados por otras evidencias de sufrimiento fetal": null,
        "CIE O68.9-Trabajo de parto y parto complicados por sufrimiento fetal, sin otra especificación": null,
        "CIE O69-Trabajo de parto y parto complicados por problemas del cordón umbilical": null,
        "CIE O69.0-Trabajo de parto y parto complicados por prolapso del cordón umbilical": null,
        "CIE O69.1-Trabajo de parto y parto complicados por circular pericervical del cordón, con compresión": null,
        "CIE O69.2-Trabajo de parto y parto complicados por otros enredos del cordón": null,
        "CIE O69.3-Trabajo de parto y parto complicados por cordón umbilical corto": null,
        "CIE O69.4-Trabajo de parto y parto complicados por vasa previa": null,
        "CIE O69.5-Trabajo de parto y parto complicados por lesión vascular del cordón": null,
        "CIE O69.8-Trabajo de parto y parto complicados por otros problemas del cordón umbilical": null,
        "CIE O69.9-Trabajo de parto y parto complicados por problemas no especificados del cordón umbilical": null,
        "CIE O70-Desgarro perineal durante el parto": null,
        "CIE O70.0-Desgarro perineal de primer grado durante el parto": null,
        "CIE O70.1-Desgarro perineal de segundo grado durante el parto": null,
        "CIE O70.2-Desgarro perineal de tercer grado durante el parto": null,
        "CIE O70.3-Desgarro perineal de cuarto grado durante el parto": null,
        "CIE O70.9-Desgarro perineal durante el parto, de grado no especificado": null,
        "CIE O71.0-Ruptura del útero antes del inicio del trabajo de parto": null,
        "CIE O71.1-Ruptura del útero durante el trabajo de parto": null,
        "CIE O71.2-Inversión del útero, postparto": null,
        "CIE O72-Hemorragia postparto": null,
        "CIE O72.0-Hemorragia del tercer período del parto": null,
        "CIE O72.1-Otras hemorragias postparto inmediatas": null,
        "CIE O72.2-Hemorragia postparto secundaria o tardía": null,
        "CIE O72.3-Defecto de la coagulación postparto": null,
        "CIE O74-Complicaciones de la anestesia administrada durante el trabajo de parto y el parto": null,
        "CIE O74.0-Neumonitis por aspiración debida a la anestesia administrada durante el trabajo de parto y el parto": null,
        "CIE O74.1-Otras complicacion: nulles pulmonares debidas a la anestesia administrada  durante el trabajo de parto y el parto": null,
        "CIE O74.2-Complicaciones cardíacas de la anestesia administrada durante el trabajo de parto y el parto": null,
        "CIE O74.3-Complicaciones del sistema nervioso central por la anestesia administrada durante el trabajo de parto y el parto": null,
        "CIE O74.4-Reacción tóxica a la anestesia local administrada durante el trabajo de parto y el parto": null,
        "CIE O74.5-Cefalalgia inducida por la anestesia espinal o epidural administradas  durante el trabajo de parto y el parto": null,
        "CIE O74.6-Otras complicaciones de la anestesia espinal o epidural administradas durante el trabajo de parto y el parto": null,
        "CIE O74.7-Falla o dificultad en la intubación durante el trabajo de parto y el parto": null,
        "CIE O74.8-Otras complicaciones de la anestesia administrada durante el trabajo de parto y el parto": null,
        "CIE O74.9-Complicación no especificada de la anestesia administrada durante el trabajo de parto y el parto": null,
        "CIE O75-Otras complicaciones del trabajo de parto y del parto, no clasificadas en otra parte": null,
        "CIE O75.0-Sufrimiento materno durante el trabajo de parto y el parto": null,
        "CIE O75.1-Choque durante o después del trabajo de parto y el parto": null,
        "CIE O75.2-Pirexia durante el trabajo de parto, no clasificada en otra parte": null,
        "CIE O75.3-Otras infecciones durante el trabajo de parto": null,
        "CIE O75.5-Retraso del parto después de la ruptura artificial de las membranas": null,
        "CIE O75.6-Retraso del parto después de la ruptura espontánea o no especificada de las membranas": null,
        "CIE O75.7-Parto vaginal posterior a una cesárea previa": null,
        "CIE O75.8-Otras complicaciones especificadas del trabajo de parto y del parto": null,
        "CIE O75.9-Complicación no especificada del trabajo de parto y del parto": null,
        "CIE O80-Parto único espontáneo": null,
        "CIE O80.0-Parto único espontáneo, presentación cefálica de vértice": null,
        "CIE O80.1-Parto único espontáneo, presentación de nalgas o podálica": null,
        "CIE O80.8-Parto único espontáneo, otras presentaciones": null,
        "CIE O80.9-Parto único espontáneo, sin otra especificación": null,
        "CIE O81-Parto único con fórceps y ventosa extractora": null,
        "CIE O81.0-Parto con fórceps bajo": null,
        "CIE O81.1-Parto con fórceps medio": null,
        "CIE O81.2-Parto con fórceps medio con rotación": null,
        "CIE O81.3-Parto con fórceps de otros tipos y los no especificados": null,
        "CIE O81.4-Parto con ventosa extractora": null,
        "CIE O81.5-Parto con combinación de fórceps y ventosa extractora": null,
        "CIE O82-Parto único por cesárea": null,
        "CIE O82.0-Parto por cesárea electiva": null,
        "CIE O82.1-Parto por cesárea de emergencia": null,
        "CIE O82.2-Parto por cesárea con histerectomía": null,
        "CIE O82.8-Otros partos únicos por cesárea": null,
        "CIE O82.9-Parto por cesárea, sin otra especificación": null,
        "CIE O83-Otros partos únicos asistidos": null,
        "CIE O83.1-Otros partos únicos asistidos, de nalgas": null,
        "CIE O83.2-Otros partos únicos con ayuda de manipulación obstétrica": null,
        "CIE O83.3-Parto de feto viable en embarazo abdominal": null,
        "CIE O83.4-Operación destructiva para facilitar el parto": null,
        "CIE O83.8-Otros partos únicos asistidos especificados": null,
        "CIE O83.9-Parto único asistido, sin otra especificación": null,
        "CIE O84-Parto múltiple": null,
        "CIE O84.0-Parto múltiple, todos espontáneos": null,
        "CIE O84.1-Parto múltiple, todos por fórceps y ventosa extractora": null,
        "CIE O84.2-Parto múltiple, todos por cesárea": null,
        "CIE O84.8-Otros partos múltiples": null,
        "CIE O91-Infecciones de la mama asociadas con el parto": null,
        "CIE O91.0-Infecciones del pezón asociadas con el parto": null,
        "CIE O91.1-Absceso de la mama asociado con el parto": null,
        "CIE O91.2-Mastitis no purulenta asociada con el parto": null,
        "CIE O92-Otros trastornos de la mama y de la lactancia asociados con el parto": null,
        "CIE O92.0-Retracción del pezón asociada con el parto": null,
        "CIE O92.1-Fisuras del pezón asociadas con el parto": null,
        "CIE O92.2-Otros trastornos de la mama y los no especificados asociados con el parto": null,
        "CIE O96-Muerte materna debida a cualquier causa obstétrica que ocurre después de 42 días pero antes de un año del parto": null,
        "CIE O98-Enfermedades maternas infecciosas y parasitarias clasificables en otra parte, pero que complican el embarazo, el parto y el puerperio": null,
        "CIE O98.0-Tuberculosis que complica el embarazo, el parto y el puerperio": null,
        "CIE O98.1-Sífilis que complica el embarazo, el parto y el puerperio": null,
        "CIE O98.2-Gonorrea que complica el embarazo, el parto y el puerperio": null,
        "CIE O98.3-Otras infecciones con un modo de transmisión predominantemente sexual que complican el embarazo, el parto y el puerperio": null,
        "CIE O98.4-Hepatitis viral que complica el embarazo, el parto y el puerperio": null,
        "CIE O98.5-Otras enfermedades virales que complican el embarazo, el parto y el puerperio": null,
        "CIE O98.6-Enfermedades causadas por protozoarios que complican el embarazo, el parto y el puerperio": null,
        "CIE O98.8-Otras enfermedades infecciosas y parasitarias maternas que complican el embarazo, el parto y el puerperio": null,
        "CIE O98.9-Enfermedad infecciosa y parasitaria materna no especificada que complica el embarazo, el parto y el puerperio": null,
        "CIE O99-Otras enfermedades maternas clasificables en otra parte, pero que complican el embarazo, el parto y el puerperio": null,
        "CIE O99.0-Anemia que complica el embarazo, el parto y el puerperio": null,
        "CIE O99.1-Otras enfermedades de la sangre y de los órganos hematopoyéticos y ciertos trastornos que afectan el sistema inmunitario cuando complican el embarazo, el parto y el puerperio": null,
        "CIE O99.2-Enfermedades endocrinas, de la nutrición y del metabolismo que complican el embarazo, el parto y el puerperio": null,
        "CIE O99.3-Trastornos mentales y enfermedades del sistema nervioso que complican el embarazo, el parto y el puerperio": null,
        "CIE O99.4-Enfermedades del sistema circulatorio que complican el embarazo, el parto y el puerperio": null,
        "CIE O99.5-Enfermedades del sistema respiratorio que complican el embarazo, el parto y el puerperio": null,
        "CIE O99.6-Enfermedades del sistema digestivo que complican el embarazo, el parto y el puerperio": null,
        "CIE O99.7-Enfermedades de la piel y del tejido subcutáneo que complican el embarazo, el parto y el puerperio": null,
        "CIE O99.8-Otras enfermedades especificadas y afecciones que complican el embarazo, el parto y el puerperio": null,
        "CIE P01.7-Feto y recién nacido afectados por presentación anómala antes del trabajo de parto": null,
        "CIE P03-Feto y recién nacido afectados por otras complicaciones del trabajo de parto y del parto": null,
        "CIE P03.0-Feto y recién nacido afectados por parto y extracción de nalgas": null,
        "CIE P03.1-Feto y recién nacido afectados por otra presentación anómala, posición anómala y desproporción durante el trabajo de parto y el parto": null,
        "CIE P03.2-Feto y recién nacido afectados por parto con fórceps": null,
        "CIE P03.3-Feto y recién nacido afectados por parto con ventosa extractora": null,
        "CIE P03.4-Feto y recién nacido afectados por parto por cesárea": null,
        "CIE P03.5-Feto y recién nacido afectados por parto precipitado": null,
        "CIE P03.8-Feto y recién nacido afectados por otras complicaciones especificadas del trabajo de parto y del parto": null,
        "CIE P03.9-Feto y recién nacido afectados por complicaciones no especificadas del trabajo de parto y del parto": null,
        "CIE P04.0-Feto y recién nacido afectados por anestesia y analgesia materna en el embarazo, en el trabajo de parto y en el parto": null,
        "CIE P20.0-Hipoxia intrauterina notada por primera vez antes del inicio del trabajo de parto": null,
        "CIE P20.1-Hipoxia intrauterina notada por primera vez durante el trabajo de parto y el parto": null,
        "CIE P59.0-Ictericia neonatal asociada con el parto antes de término": null,
        "CIE Z37-Producto del parto": null,
        "CIEZ37.9-Producto del parto no especificado": null,
        "CIEZ39-Examen y atención del postparto": null,
        "CIE Z39.0-Atención y examen inmediatamente después del parto": null,
        "CIE Z39.2-Seguimiento postparto, de rutina": null,
        "CIE Z87.5-Historia personal de complicaciones del embarazo, del parto y del puerperio": null,
      },
      limit: 20, // The max amount of results that can be shown at once. Default: Infinity.
      onAutocomplete: function (val) {
        // Callback function when value is autcompleted.
      },
      minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
    });
  });
}

export function AutocompletePatologico() {
  $(document).ready(function () {
    $("#patologicoFamiliar").autocomplete({
      data: {
        "CIE N64.3-Galactorrea no asociada con el parto": null,
        "CIE O10-Hipertensión preexistente que complica el embarazo, el parto y el puerperio": null,
        "CIE O10.0-Hipertensión esencial preexistente que complica el embarazo, el parto y el puerperio": null,
        "CIE O10.1-Enfermedad cardíaca hipertensiva preexistente que complica el embarazo, el parto y el puerperio": null,
        "CIE O10.2-Enfermedad renal hipertensiva preexistente que complica el embarazo, el parto y el puerperio": null,
        "CIE O10.3-Enfermedad cardiorrenal hipertensiva preexistente que complica el embarazo, el parto y el puerperio": null,
        "CIE O10.4-Hipertensión secundaria preexistente que complica el embarazo, el parto y el puerperio, el parto y el puerperio": null,
        "CIE O10.9-Hipertensión preexistente no especificada, que complica el embarazo, el parto y el puerperio": null,
        "CIE O15.1-Eclampsia durante el trabajo de parto": null,
        "CIE O26.6-Trastornos del hígado en el embarazo, el parto y el puerperio": null,
        "CIE O26.7-Subluxación de la sínfisis (del pubis) en el embarazo, el parto y el puerperio": null,
        "CIE O42.0-Ruptura prematura de las membranas, e inicio del trabajo de parto dentro de las 24 horas": null,
        "CIE O42.1-Ruptura prematura de las membranas, e inicio del trabajo de parto después de las 24 horas": null,
        "CIE O42.2-Ruptura prematura de las membranas, trabajo de parto retrasado por la terapéutica": null,
        "CIE O46-Hemorragia anteparto, no clasificada en otra parte": null,
        "CIE O46.0-Hemorragia anteparto con defecto de la coagulación": null,
        "CIE O46.8-Otras hemorragias anteparto": null,
        "CIE O46.9-Hemorragia anteparto, no especificada": null,
        "CIE O47-Falso trabajo de parto": null,
        "CIE O47.0-Falso trabajo de parto antes de las 37 semanas completas de gestación": null,
        "CIE O47.1-Falso trabajo de parto a las 37 y más semanas completas de gestación": null,
        "CIE O47.9-Falso trabajo de parto, sin otra especificación": null,
        "CIE O60-Parto prematuro": null,
        "CIE O61.0-Fracaso de la inducción médica del trabajo de parto": null,
        "CIE O61.1-Fracaso de la inducción instrumental del trabajo de parto": null,
        "CIE O61.8-Otros fracasos de la inducción del trabajo de parto": null,
        "CIE O61.9-Fracaso no especificado de la inducción del trabajo de parto": null,
        "CIE O62-Anormalidades de la dinámica del trabajo de parto": null,
        "CIE O62.3-Trabajo de parto precipitado": null,
        "CIE O62.8-Otras anomalías dinámicas del trabajo de parto": null,
        "CIE O62.9-Anomalía dinámica del trabajo de parto, no especificada": null,
        "CIE O63-Trabajo de parto prolongado": null,
        "CIE O63.0-Prolongación del primer período (del trabajo de parto)": null,
        "CIE O63.1-Prolongación del segundo período (del trabajo de parto)": null,
        "CIE O63.9-Trabajo de parto prolongado, no especificado": null,
        "CIE O64-Trabajo de parto obstruido debido a mala posición y presentación anormal del feto": null,
        "CIE O64.0-Trabajo de parto obstruido debido a rotación incompleta de la cabeza fetal": null,
        "CIE O64.1-Trabajo de parto obstruido debido a presentación de nalgas": null,
        "CIE O64.2-Trabajo de parto obstruido debido a presentación de cara": null,
        "CIE O64.3-Trabajo de parto obstruido debido a presentación de frente": null,
        "CIE O64.4-Trabajo de parto obstruido debido a presentación de hombro": null,
        "CIE O64.5-Trabajo de parto obstruido debido a presentación compuesta": null,
        "CIE O64.8-Trabajo de parto obstruido debido a otras presentaciones anormales del feto": null,
        "CIE O64.9-Trabajo de parto obstruido debido a presentación anormal del feto no especificada": null,
        "CIE O65-Trabajo de parto obstruido debido a anormalidad de la pelvis materna": null,
        "CIE O65.0-Trabajo de parto obstruido debido a deformidad de la pelvis": null,
        "CIE O65.1-Trabajo de parto obstruido debido a estrechez general de la pelvis": null,
        "TCIE O65.2-rabajo de parto obstruido debido a disminución del estrecho superior de la pelvis": null,
        "CIE O65.3-Trabajo de parto obstruido debido a disminución del estrecho inferior de la pelvis": null,
        "TCIE O65.4-rabajo de parto obstruido debido a desproporción fetopelviana, sin otra especificación": null,
        "CIE O65.5-Trabajo de parto obstruido debido a anomalías de los órganos pelvianos maternos": null,
        "CIE O65.8-Trabajo de parto obstruido debido a otras anomalías pelvianas maternas": null,
        "CIE O65.9-Trabajo de parto obstruido debido a anomalía pelviana no especificada": null,
        "CIE O66-Otras obstrucciones del trabajo de parto": null,
        "CIE O66.0-Trabajo de parto obstruido debido a distocia de hombros": null,
        "CIE O66.1-Trabajo de parto obstruido debido a distocia gemelar": null,
        "CIE O66.2-Trabajo de parto obstruido debido a distocia por feto inusualmente grande": null,
        "CIE O66.3-Trabajo de parto obstruido debido a otras anormalidades del feto": null,
        "CIE O66.4-Fracaso de la prueba del trabajo de parto, no especificada": null,
        "CIE O66.8-Otras obstrucciones especificadas del trabajo de parto": null,
        "CIE O66.9-Trabajo de parto obstruido, sin otra especificación": null,
        "CIE O67-Trabajo de parto y parto complicados por hemorragia intraparto, no clasificados en otra parte": null,
        "CIE O67.0-Hemorragia intraparto con defectos de la coagulación": null,
        "CIE O67.8-Otras hemorragias intraparto": null,
        "CIE O67.9-Hemorragia intraparto, no especificada": null,
        "CIE O68-Trabajo de parto y parto complicados por sufrimiento fetal": null,
        "CIE O68.0-Trabajo de parto y parto complicados por anomalía de la frecuencia cardíaca fetal": null,
        "CIE O68.1-Trabajo de parto y parto complicados por la presencia de meconio en el líquido amniótico": null,
        "CIE O68.2-Trabajo de parto y parto complicados por anomalía de la frecuencia cardíaca fetal asociada con presencia de meconio en el líquido amniótico": null,
        "CIE O68.3-Trabajo de parto y parto complicados por evidencia bioquímica de sufrimiento fetal": null,
        "CIE O68.8-Trabajo de parto y parto complicados por otras evidencias de sufrimiento fetal": null,
        "CIE O68.9-Trabajo de parto y parto complicados por sufrimiento fetal, sin otra especificación": null,
        "CIE O69-Trabajo de parto y parto complicados por problemas del cordón umbilical": null,
        "CIE O69.0-Trabajo de parto y parto complicados por prolapso del cordón umbilical": null,
        "CIE O69.1-Trabajo de parto y parto complicados por circular pericervical del cordón, con compresión": null,
        "CIE O69.2-Trabajo de parto y parto complicados por otros enredos del cordón": null,
        "CIE O69.3-Trabajo de parto y parto complicados por cordón umbilical corto": null,
        "CIE O69.4-Trabajo de parto y parto complicados por vasa previa": null,
        "CIE O69.5-Trabajo de parto y parto complicados por lesión vascular del cordón": null,
        "CIE O69.8-Trabajo de parto y parto complicados por otros problemas del cordón umbilical": null,
        "CIE O69.9-Trabajo de parto y parto complicados por problemas no especificados del cordón umbilical": null,
        "CIE O70-Desgarro perineal durante el parto": null,
        "CIE O70.0-Desgarro perineal de primer grado durante el parto": null,
        "CIE O70.1-Desgarro perineal de segundo grado durante el parto": null,
        "CIE O70.2-Desgarro perineal de tercer grado durante el parto": null,
        "CIE O70.3-Desgarro perineal de cuarto grado durante el parto": null,
        "CIE O70.9-Desgarro perineal durante el parto, de grado no especificado": null,
        "CIE O71.0-Ruptura del útero antes del inicio del trabajo de parto": null,
        "CIE O71.1-Ruptura del útero durante el trabajo de parto": null,
        "CIE O71.2-Inversión del útero, postparto": null,
        "CIE O72-Hemorragia postparto": null,
        "CIE O72.0-Hemorragia del tercer período del parto": null,
        "CIE O72.1-Otras hemorragias postparto inmediatas": null,
        "CIE O72.2-Hemorragia postparto secundaria o tardía": null,
        "CIE O72.3-Defecto de la coagulación postparto": null,
        "CIE O74-Complicaciones de la anestesia administrada durante el trabajo de parto y el parto": null,
        "CIE O74.0-Neumonitis por aspiración debida a la anestesia administrada durante el trabajo de parto y el parto": null,
        "CIE O74.1-Otras complicacion: nulles pulmonares debidas a la anestesia administrada  durante el trabajo de parto y el parto": null,
        "CIE O74.2-Complicaciones cardíacas de la anestesia administrada durante el trabajo de parto y el parto": null,
        "CIE O74.3-Complicaciones del sistema nervioso central por la anestesia administrada durante el trabajo de parto y el parto": null,
        "CIE O74.4-Reacción tóxica a la anestesia local administrada durante el trabajo de parto y el parto": null,
        "CIE O74.5-Cefalalgia inducida por la anestesia espinal o epidural administradas  durante el trabajo de parto y el parto": null,
        "CIE O74.6-Otras complicaciones de la anestesia espinal o epidural administradas durante el trabajo de parto y el parto": null,
        "CIE O74.7-Falla o dificultad en la intubación durante el trabajo de parto y el parto": null,
        "CIE O74.8-Otras complicaciones de la anestesia administrada durante el trabajo de parto y el parto": null,
        "CIE O74.9-Complicación no especificada de la anestesia administrada durante el trabajo de parto y el parto": null,
        "CIE O75-Otras complicaciones del trabajo de parto y del parto, no clasificadas en otra parte": null,
        "CIE O75.0-Sufrimiento materno durante el trabajo de parto y el parto": null,
        "CIE O75.1-Choque durante o después del trabajo de parto y el parto": null,
        "CIE O75.2-Pirexia durante el trabajo de parto, no clasificada en otra parte": null,
        "CIE O75.3-Otras infecciones durante el trabajo de parto": null,
        "CIE O75.5-Retraso del parto después de la ruptura artificial de las membranas": null,
        "CIE O75.6-Retraso del parto después de la ruptura espontánea o no especificada de las membranas": null,
        "CIE O75.7-Parto vaginal posterior a una cesárea previa": null,
        "CIE O75.8-Otras complicaciones especificadas del trabajo de parto y del parto": null,
        "CIE O75.9-Complicación no especificada del trabajo de parto y del parto": null,
        "CIE O80-Parto único espontáneo": null,
        "CIE O80.0-Parto único espontáneo, presentación cefálica de vértice": null,
        "CIE O80.1-Parto único espontáneo, presentación de nalgas o podálica": null,
        "CIE O80.8-Parto único espontáneo, otras presentaciones": null,
        "CIE O80.9-Parto único espontáneo, sin otra especificación": null,
        "CIE O81-Parto único con fórceps y ventosa extractora": null,
        "CIE O81.0-Parto con fórceps bajo": null,
        "CIE O81.1-Parto con fórceps medio": null,
        "CIE O81.2-Parto con fórceps medio con rotación": null,
        "CIE O81.3-Parto con fórceps de otros tipos y los no especificados": null,
        "CIE O81.4-Parto con ventosa extractora": null,
        "CIE O81.5-Parto con combinación de fórceps y ventosa extractora": null,
        "CIE O82-Parto único por cesárea": null,
        "CIE O82.0-Parto por cesárea electiva": null,
        "CIE O82.1-Parto por cesárea de emergencia": null,
        "CIE O82.2-Parto por cesárea con histerectomía": null,
        "CIE O82.8-Otros partos únicos por cesárea": null,
        "CIE O82.9-Parto por cesárea, sin otra especificación": null,
        "CIE O83-Otros partos únicos asistidos": null,
        "CIE O83.1-Otros partos únicos asistidos, de nalgas": null,
        "CIE O83.2-Otros partos únicos con ayuda de manipulación obstétrica": null,
        "CIE O83.3-Parto de feto viable en embarazo abdominal": null,
        "CIE O83.4-Operación destructiva para facilitar el parto": null,
        "CIE O83.8-Otros partos únicos asistidos especificados": null,
        "CIE O83.9-Parto único asistido, sin otra especificación": null,
        "CIE O84-Parto múltiple": null,
        "CIE O84.0-Parto múltiple, todos espontáneos": null,
        "CIE O84.1-Parto múltiple, todos por fórceps y ventosa extractora": null,
        "CIE O84.2-Parto múltiple, todos por cesárea": null,
        "CIE O84.8-Otros partos múltiples": null,
        "CIE O91-Infecciones de la mama asociadas con el parto": null,
        "CIE O91.0-Infecciones del pezón asociadas con el parto": null,
        "CIE O91.1-Absceso de la mama asociado con el parto": null,
        "CIE O91.2-Mastitis no purulenta asociada con el parto": null,
        "CIE O92-Otros trastornos de la mama y de la lactancia asociados con el parto": null,
        "CIE O92.0-Retracción del pezón asociada con el parto": null,
        "CIE O92.1-Fisuras del pezón asociadas con el parto": null,
        "CIE O92.2-Otros trastornos de la mama y los no especificados asociados con el parto": null,
        "CIE O96-Muerte materna debida a cualquier causa obstétrica que ocurre después de 42 días pero antes de un año del parto": null,
        "CIE O98-Enfermedades maternas infecciosas y parasitarias clasificables en otra parte, pero que complican el embarazo, el parto y el puerperio": null,
        "CIE O98.0-Tuberculosis que complica el embarazo, el parto y el puerperio": null,
        "CIE O98.1-Sífilis que complica el embarazo, el parto y el puerperio": null,
        "CIE O98.2-Gonorrea que complica el embarazo, el parto y el puerperio": null,
        "CIE O98.3-Otras infecciones con un modo de transmisión predominantemente sexual que complican el embarazo, el parto y el puerperio": null,
        "CIE O98.4-Hepatitis viral que complica el embarazo, el parto y el puerperio": null,
        "CIE O98.5-Otras enfermedades virales que complican el embarazo, el parto y el puerperio": null,
        "CIE O98.6-Enfermedades causadas por protozoarios que complican el embarazo, el parto y el puerperio": null,
        "CIE O98.8-Otras enfermedades infecciosas y parasitarias maternas que complican el embarazo, el parto y el puerperio": null,
        "CIE O98.9-Enfermedad infecciosa y parasitaria materna no especificada que complica el embarazo, el parto y el puerperio": null,
        "CIE O99-Otras enfermedades maternas clasificables en otra parte, pero que complican el embarazo, el parto y el puerperio": null,
        "CIE O99.0-Anemia que complica el embarazo, el parto y el puerperio": null,
        "CIE O99.1-Otras enfermedades de la sangre y de los órganos hematopoyéticos y ciertos trastornos que afectan el sistema inmunitario cuando complican el embarazo, el parto y el puerperio": null,
        "CIE O99.2-Enfermedades endocrinas, de la nutrición y del metabolismo que complican el embarazo, el parto y el puerperio": null,
        "CIE O99.3-Trastornos mentales y enfermedades del sistema nervioso que complican el embarazo, el parto y el puerperio": null,
        "CIE O99.4-Enfermedades del sistema circulatorio que complican el embarazo, el parto y el puerperio": null,
        "CIE O99.5-Enfermedades del sistema respiratorio que complican el embarazo, el parto y el puerperio": null,
        "CIE O99.6-Enfermedades del sistema digestivo que complican el embarazo, el parto y el puerperio": null,
        "CIE O99.7-Enfermedades de la piel y del tejido subcutáneo que complican el embarazo, el parto y el puerperio": null,
        "CIE O99.8-Otras enfermedades especificadas y afecciones que complican el embarazo, el parto y el puerperio": null,
        "CIE P01.7-Feto y recién nacido afectados por presentación anómala antes del trabajo de parto": null,
        "CIE P03-Feto y recién nacido afectados por otras complicaciones del trabajo de parto y del parto": null,
        "CIE P03.0-Feto y recién nacido afectados por parto y extracción de nalgas": null,
        "CIE P03.1-Feto y recién nacido afectados por otra presentación anómala, posición anómala y desproporción durante el trabajo de parto y el parto": null,
        "CIE P03.2-Feto y recién nacido afectados por parto con fórceps": null,
        "CIE P03.3-Feto y recién nacido afectados por parto con ventosa extractora": null,
        "CIE P03.4-Feto y recién nacido afectados por parto por cesárea": null,
        "CIE P03.5-Feto y recién nacido afectados por parto precipitado": null,
        "CIE P03.8-Feto y recién nacido afectados por otras complicaciones especificadas del trabajo de parto y del parto": null,
        "CIE P03.9-Feto y recién nacido afectados por complicaciones no especificadas del trabajo de parto y del parto": null,
        "CIE P04.0-Feto y recién nacido afectados por anestesia y analgesia materna en el embarazo, en el trabajo de parto y en el parto": null,
        "CIE P20.0-Hipoxia intrauterina notada por primera vez antes del inicio del trabajo de parto": null,
        "CIE P20.1-Hipoxia intrauterina notada por primera vez durante el trabajo de parto y el parto": null,
        "CIE P59.0-Ictericia neonatal asociada con el parto antes de término": null,
        "CIE Z37-Producto del parto": null,
        "CIEZ37.9-Producto del parto no especificado": null,
        "CIEZ39-Examen y atención del postparto": null,
        "CIE Z39.0-Atención y examen inmediatamente después del parto": null,
        "CIE Z39.2-Seguimiento postparto, de rutina": null,
        "CIE Z87.5-Historia personal de complicaciones del embarazo, del parto y del puerperio": null,
      },
      limit: 20, // The max amount of results that can be shown at once. Default: Infinity.
      onAutocomplete: function (val) {
        // Callback function when value is autcompleted.
      },
      minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
    });
  });
}

export function LoadTableAntecedentesPatologicos(dataTable) {
  $(".paginate_page").val("Página");
  var table = $("#tableAntecedentesPatologicos").DataTable({
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo:
        "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    },
    data: dataTable,
  });
  $("#tableAntecedentesPatologicos_filter").hide();
  $("#tableAntecedentesPatologicos_paginate").hide();
  $("#tableAntecedentesPatologicos_length").hide();
  $("#tableAntecedentesPatologicos_info").hide();
  $(".chev").hide();
}

export function AgregarAntecedente(value) {
  $(document).ready(function () {
    var table = $("#tableAntecedentesPatologicos").DataTable();
    var rowNode = table.row.add(value).draw().node();
  });
}

export function LoadTablePatologicosFamiliares(dataTable) {
  $(".paginate_page").val("Página");
  var table = $("#tablePatologicosFamiliares").DataTable({
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo:
        "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    },
    data: dataTable,
  });
  $("#tablePatologicosFamiliares_filter").hide();
  $("#tablePatologicosFamiliares_paginate").hide();
  $("#tablePatologicosFamiliares_length").hide();
  $("#tablePatologicosFamiliares_info").hide();
  $(".chev").hide();
}

export function AgregarPatologico(value) {
  document.getElementById("tablePatologicosFamiliares_filter").style.display =
    "none";

  $(document).ready(function () {
    var table = $("#tablePatologicosFamiliares").DataTable();
    var rowNode = table.row.add(value).draw().node();
  });
}
/*======CENTROE MEDICO======*/

/*VIDEO CHAT*/

export function activateActMic() {
  document.getElementById("voice-act-icon-d").style.display = "none";
  document.getElementById("voice-act-icon").style.display = "inline";
}
export function desactivateActMic() {
  document.getElementById("voice-act-icon").style.display = "none";
  document.getElementById("voice-act-icon-d").style.display = "inline";
}
export function activateActCam() {
  document.getElementById("video-act-icon-d").style.display = "none";
  document.getElementById("video-act-icon").style.display = "inline";
}
export function desactivateActCam() {
  document.getElementById("video-act-icon").style.display = "none";
  document.getElementById("video-act-icon-d").style.display = "inline";
}

export function setTypeDocumentUpdatePatient(value) {
  $("#tipoDocumento").val(value).prop("selected", true);
}

export function setSexUpdatePatient(value) {
  $("#genero").val(value).prop("selected", true);
}

export function setEstadoCivilUpdatePatient(value) {
  $("#estadoCivil").val(value).prop("selected", true);
}

export function setGradoInstruccionUpdatePatient(value) {
  $("#gradoInstruccion").val(value).prop("selected", true);
}

export function setDepartamentoActualUpdatePatient(
  departamento,
  provincia,
  distrito
) {
  $("#cboDepartamentoDA").val(departamento).prop("selected", true);

  $.ajax({
    type: "GET",
    url: urlBase + "/api/get/provincias/" + departamento,
    dataType: "json",
    contentType: "application/json; charset=utf-8",
    success: function (response) {
      response.data.forEach((departamento) => {
        $("#cboProvinciaDA").append(
          $("<option>", {
            value: departamento.provincia,
            text: departamento.ubigeo,
          })
        );
      });

      $("#cboProvinciaDA").val(provincia).prop("selected", true);

      $(document).ready(function () {
        $("select").material_select();
      });
      let params = {
        departamento: departamento,
        provincia: provincia,
      };
      let data = JSON.stringify(params);

      $.ajax({
        type: "POST",
        url: urlBase + "/api/get/distritos",
        data: data,
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        success: function (res) {
          res.data.forEach((distrito) => {
            $("#cboDistritoDA").append(
              $("<option>", {
                value: distrito.distrito,
                text: distrito.ubigeo,
              })
            );
          });

          $(document).ready(function () {
            $("select").material_select();
          });
        },
        error: function (error) {
          console.log(error);
        },
      });
    },
    error: function (error) {
      console.log(error);
    },
  });
  $(document).ready(function () {
    $("select").material_select();
  });
}

export function setDepartamentoNacimientoUpdatePatient(
  departamento,
  provincia,
  distrito
) {
  $("#cboDepartamentoLN").val(departamento).prop("selected", true);

  $.ajax({
    type: "GET",
    url: urlBase + "/api/get/provincias/" + departamento,
    dataType: "json",
    contentType: "application/json; charset=utf-8",
    success: function (response) {
      response.data.forEach((departamento) => {
        $("#cboProvinciaLN").append(
          $("<option>", {
            value: departamento.provincia,
            text: departamento.ubigeo,
          })
        );
      });

      $("#cboProvinciaLN").val(provincia).prop("selected", true);

      $(document).ready(function () {
        $("select").material_select();
      });
      let params = {
        departamento: departamento,
        provincia: provincia,
      };
      let data = JSON.stringify(params);

      $.ajax({
        type: "POST",
        url: urlBase + "/api/get/distritos",
        data: data,
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        success: function (res) {
          res.data.forEach((distrito) => {
            $("#cboDistritoLN").append(
              $("<option>", {
                value: distrito.distrito,
                text: distrito.ubigeo,
              })
            );
          });

          $(document).ready(function () {
            $("select").material_select();
          });
        },
        error: function (error) {
          console.log(error);
        },
      });
    },
    error: function (error) {
      console.log(error);
    },
  });
  $(document).ready(function () {
    $("select").material_select();
  });
}

export function setDistritoDA(distrito) {
  console.log("distrito", distrito);
  $("#cboDistritoDA").val(distrito).prop("selected", true);
  $(document).ready(function () {
    $("select").material_select();
  });
}

export function setDistritoNacimiento(distrito) {
  console.log("distrito", distrito);
  $("#cboDistritoLN").val(distrito).prop("selected", true);
  $(document).ready(function () {
    $("select").material_select();
  });
}

export function SelectComboUbigeos() {
  /*DIRECCION ACTUAL*/
  $("#cboDepartamentoDA").on("change", function () {
    $.ajax({
      type: "GET",
      url: urlBase + "/api/get/provincias/" + this.value,
      dataType: "json",
      contentType: "application/json; charset=utf-8",
      success: function (response) {
        resetearUbigeo("cboProvinciaDA");
        response.data.forEach((departamento) => {
          $("#cboProvinciaDA").append(
            $("<option>", {
              value: departamento.provincia,
              text: departamento.ubigeo,
            })
          );
        });
        resetearUbigeo("cboDistritoDA");

        $(document).ready(function () {
          $("select").material_select();
        });
      },
      error: function (error) {
        console.log(error);
      },
    });
  });

  $("#cboProvinciaDA").on("change", function () {
    let departamentoCode = $("#cboDepartamentoDA").val();
    let provinciaCode = this.value;
    let params = {
      departamento: departamentoCode,
      provincia: provinciaCode,
    };
    let data = JSON.stringify(params);
    $.ajax({
      type: "POST",
      url: urlBase + "/api/get/distritos",
      data: data,
      dataType: "json",
      contentType: "application/json; charset=utf-8",
      success: function (response) {
        resetearUbigeo("cboDistritoDA");
        response.data.forEach((distrito) => {
          $("#cboDistritoDA").append(
            $("<option>", {
              value: distrito.id,
              text: distrito.ubigeo,
            })
          );
        });
        $(document).ready(function () {
          $("select").material_select();
        });
      },
      error: function (error) {
        console.log(error);
      },
    });
  });
  /*DIRECCION ACTUAL*/

  /*LUGAR DE NACIMIENTO*/
  $("#cboDepartamentoLN").on("change", function () {
    $.ajax({
      type: "GET",
      url: urlBase + "/api/get/provincias/" + this.value,
      dataType: "json",
      contentType: "application/json; charset=utf-8",
      success: function (response) {
        resetearUbigeo("cboProvinciaLN");
        response.data.forEach((departamento) => {
          $("#cboProvinciaLN").append(
            $("<option>", {
              value: departamento.provincia,
              text: departamento.ubigeo,
            })
          );
        });
        resetearUbigeo("cboDistritoLN");
        $(document).ready(function () {
          $("select").material_select();
        });
      },
      error: function (error) {
        console.log(error);
      },
    });
  });

  $("#cboProvinciaLN").on("change", function () {
    let departamentoCode = $("#cboDepartamentoLN").val();
    let provinciaCode = this.value;
    let params = {
      departamento: departamentoCode,
      provincia: provinciaCode,
    };
    let data = JSON.stringify(params);
    $.ajax({
      type: "POST",
      url: urlBase + "/api/get/distritos",
      data: data,
      dataType: "json",
      contentType: "application/json; charset=utf-8",
      success: function (response) {
        resetearUbigeo("cboDistritoLN");
        response.data.forEach((distrito) => {
          $("#cboDistritoLN").append(
            $("<option>", {
              value: distrito.id,
              text: distrito.ubigeo,
            })
          );
        });
        $(document).ready(function () {
          $("select").material_select();
        });
      },
      error: function (error) {
        console.log(error);
      },
    });
  });
  /*LUGAR DE NACIMIENTO*/

  /*LUGAR DE PROCEDENCIA*/
  $("#cboDepartamentoLP").on("change", function () {
    $.ajax({
      type: "GET",
      url: urlBase + "/api/get/provincias/" + this.value,
      dataType: "json",
      contentType: "application/json; charset=utf-8",
      success: function (response) {
        resetearUbigeo("cboProvinciaLP");
        response.data.forEach((departamento) => {
          $("#cboProvinciaLP").append(
            $("<option>", {
              value: departamento.provincia,
              text: departamento.ubigeo,
            })
          );
        });
        resetearUbigeo("cboDistritoLP");
        $(document).ready(function () {
          $("select").material_select();
        });
      },
      error: function (error) {
        console.log(error);
      },
    });
  });

  $("#cboProvinciaLP").on("change", function () {
    let departamentoCode = $("#cboDepartamentoLP").val();
    let provinciaCode = this.value;
    let params = {
      departamento: departamentoCode,
      provincia: provinciaCode,
    };
    let data = JSON.stringify(params);
    $.ajax({
      type: "POST",
      url: urlBase + "/api/get/distritos",
      data: data,
      dataType: "json",
      contentType: "application/json; charset=utf-8",
      success: function (response) {
        resetearUbigeo("cboDistritoLP");
        response.data.forEach((distrito) => {
          $("#cboDistritoLP").append(
            $("<option>", {
              value: distrito.id,
              text: distrito.ubigeo,
            })
          );
        });
        $(document).ready(function () {
          $("select").material_select();
        });
      },
      error: function (error) {
        console.log(error);
      },
    });
  });
  /*LUGAR DE PROCEDENCIA*/
}

function resetearUbigeo(idCombroReseteo) {
  $("#" + idCombroReseteo).html("");
  $("#" + idCombroReseteo).append(
    $("<option>", {
      value: "",
      text: "Seleccione una Opción",
      disabled: "disabled",
      selected: "selected",
    })
  );
}

/* ANTECEDENTES DEL PACIENTE */
export function recordPathologicalAutocomplete() {
  $(document).ready(function () {
    $("input#antecedentePatologico").autocomplete({
      data: {
        "CIE N64.3-Galactorrea no asociada con el parto": null,
        "CIE O10-Hipertensión preexistente que complica el embarazo, el parto y el puerperio": null,
        "CIE O10.0-Hipertensión esencial preexistente que complica el embarazo, el parto y el puerperio": null,
        "CIE O10.1-Enfermedad cardíaca hipertensiva preexistente que complica el embarazo, el parto y el puerperio": null,
        "CIE O10.2-Enfermedad renal hipertensiva preexistente que complica el embarazo, el parto y el puerperio": null,
        "CIE O10.3-Enfermedad cardiorrenal hipertensiva preexistente que complica el embarazo, el parto y el puerperio": null,
        "CIE O10.4-Hipertensión secundaria preexistente que complica el embarazo, el parto y el puerperio, el parto y el puerperio": null,
        "CIE O10.9-Hipertensión preexistente no especificada, que complica el embarazo, el parto y el puerperio": null,
        "CIE O15.1-Eclampsia durante el trabajo de parto": null,
        "CIE O26.6-Trastornos del hígado en el embarazo, el parto y el puerperio": null,
        "CIE O26.7-Subluxación de la sínfisis (del pubis) en el embarazo, el parto y el puerperio": null,
        "CIE O42.0-Ruptura prematura de las membranas, e inicio del trabajo de parto dentro de las 24 horas": null,
        "CIE O42.1-Ruptura prematura de las membranas, e inicio del trabajo de parto después de las 24 horas": null,
        "CIE O42.2-Ruptura prematura de las membranas, trabajo de parto retrasado por la terapéutica": null,
        "CIE O46-Hemorragia anteparto, no clasificada en otra parte": null,
        "CIE O46.0-Hemorragia anteparto con defecto de la coagulación": null,
        "CIE O46.8-Otras hemorragias anteparto": null,
        "CIE O46.9-Hemorragia anteparto, no especificada": null,
        "CIE O47-Falso trabajo de parto": null,
        "CIE O47.0-Falso trabajo de parto antes de las 37 semanas completas de gestación": null,
        "CIE O47.1-Falso trabajo de parto a las 37 y más semanas completas de gestación": null,
        "CIE O47.9-Falso trabajo de parto, sin otra especificación": null,
        "CIE O60-Parto prematuro": null,
        "CIE O61.0-Fracaso de la inducción médica del trabajo de parto": null,
        "CIE O61.1-Fracaso de la inducción instrumental del trabajo de parto": null,
        "CIE O61.8-Otros fracasos de la inducción del trabajo de parto": null,
        "CIE O61.9-Fracaso no especificado de la inducción del trabajo de parto": null,
        "CIE O62-Anormalidades de la dinámica del trabajo de parto": null,
        "CIE O62.3-Trabajo de parto precipitado": null,
        "CIE O62.8-Otras anomalías dinámicas del trabajo de parto": null,
        "CIE O62.9-Anomalía dinámica del trabajo de parto, no especificada": null,
        "CIE O63-Trabajo de parto prolongado": null,
        "CIE O63.0-Prolongación del primer período (del trabajo de parto)": null,
        "CIE O63.1-Prolongación del segundo período (del trabajo de parto)": null,
        "CIE O63.9-Trabajo de parto prolongado, no especificado": null,
        "CIE O64-Trabajo de parto obstruido debido a mala posición y presentación anormal del feto": null,
        "CIE O64.0-Trabajo de parto obstruido debido a rotación incompleta de la cabeza fetal": null,
        "CIE O64.1-Trabajo de parto obstruido debido a presentación de nalgas": null,
        "CIE O64.2-Trabajo de parto obstruido debido a presentación de cara": null,
        "CIE O64.3-Trabajo de parto obstruido debido a presentación de frente": null,
        "CIE O64.4-Trabajo de parto obstruido debido a presentación de hombro": null,
        "CIE O64.5-Trabajo de parto obstruido debido a presentación compuesta": null,
        "CIE O64.8-Trabajo de parto obstruido debido a otras presentaciones anormales del feto": null,
        "CIE O64.9-Trabajo de parto obstruido debido a presentación anormal del feto no especificada": null,
        "CIE O65-Trabajo de parto obstruido debido a anormalidad de la pelvis materna": null,
        "CIE O65.0-Trabajo de parto obstruido debido a deformidad de la pelvis": null,
        "CIE O65.1-Trabajo de parto obstruido debido a estrechez general de la pelvis": null,
        "TCIE O65.2-rabajo de parto obstruido debido a disminución del estrecho superior de la pelvis": null,
        "CIE O65.3-Trabajo de parto obstruido debido a disminución del estrecho inferior de la pelvis": null,
        "TCIE O65.4-rabajo de parto obstruido debido a desproporción fetopelviana, sin otra especificación": null,
        "CIE O65.5-Trabajo de parto obstruido debido a anomalías de los órganos pelvianos maternos": null,
        "CIE O65.8-Trabajo de parto obstruido debido a otras anomalías pelvianas maternas": null,
        "CIE O65.9-Trabajo de parto obstruido debido a anomalía pelviana no especificada": null,
        "CIE O66-Otras obstrucciones del trabajo de parto": null,
        "CIE O66.0-Trabajo de parto obstruido debido a distocia de hombros": null,
        "CIE O66.1-Trabajo de parto obstruido debido a distocia gemelar": null,
        "CIE O66.2-Trabajo de parto obstruido debido a distocia por feto inusualmente grande": null,
        "CIE O66.3-Trabajo de parto obstruido debido a otras anormalidades del feto": null,
        "CIE O66.4-Fracaso de la prueba del trabajo de parto, no especificada": null,
        "CIE O66.8-Otras obstrucciones especificadas del trabajo de parto": null,
        "CIE O66.9-Trabajo de parto obstruido, sin otra especificación": null,
        "CIE O67-Trabajo de parto y parto complicados por hemorragia intraparto, no clasificados en otra parte": null,
        "CIE O67.0-Hemorragia intraparto con defectos de la coagulación": null,
        "CIE O67.8-Otras hemorragias intraparto": null,
        "CIE O67.9-Hemorragia intraparto, no especificada": null,
        "CIE O68-Trabajo de parto y parto complicados por sufrimiento fetal": null,
        "CIE O68.0-Trabajo de parto y parto complicados por anomalía de la frecuencia cardíaca fetal": null,
        "CIE O68.1-Trabajo de parto y parto complicados por la presencia de meconio en el líquido amniótico": null,
        "CIE O68.2-Trabajo de parto y parto complicados por anomalía de la frecuencia cardíaca fetal asociada con presencia de meconio en el líquido amniótico": null,
        "CIE O68.3-Trabajo de parto y parto complicados por evidencia bioquímica de sufrimiento fetal": null,
        "CIE O68.8-Trabajo de parto y parto complicados por otras evidencias de sufrimiento fetal": null,
        "CIE O68.9-Trabajo de parto y parto complicados por sufrimiento fetal, sin otra especificación": null,
        "CIE O69-Trabajo de parto y parto complicados por problemas del cordón umbilical": null,
        "CIE O69.0-Trabajo de parto y parto complicados por prolapso del cordón umbilical": null,
        "CIE O69.1-Trabajo de parto y parto complicados por circular pericervical del cordón, con compresión": null,
        "CIE O69.2-Trabajo de parto y parto complicados por otros enredos del cordón": null,
        "CIE O69.3-Trabajo de parto y parto complicados por cordón umbilical corto": null,
        "CIE O69.4-Trabajo de parto y parto complicados por vasa previa": null,
        "CIE O69.5-Trabajo de parto y parto complicados por lesión vascular del cordón": null,
        "CIE O69.8-Trabajo de parto y parto complicados por otros problemas del cordón umbilical": null,
        "CIE O69.9-Trabajo de parto y parto complicados por problemas no especificados del cordón umbilical": null,
        "CIE O70-Desgarro perineal durante el parto": null,
        "CIE O70.0-Desgarro perineal de primer grado durante el parto": null,
        "CIE O70.1-Desgarro perineal de segundo grado durante el parto": null,
        "CIE O70.2-Desgarro perineal de tercer grado durante el parto": null,
        "CIE O70.3-Desgarro perineal de cuarto grado durante el parto": null,
        "CIE O70.9-Desgarro perineal durante el parto, de grado no especificado": null,
        "CIE O71.0-Ruptura del útero antes del inicio del trabajo de parto": null,
        "CIE O71.1-Ruptura del útero durante el trabajo de parto": null,
        "CIE O71.2-Inversión del útero, postparto": null,
        "CIE O72-Hemorragia postparto": null,
        "CIE O72.0-Hemorragia del tercer período del parto": null,
        "CIE O72.1-Otras hemorragias postparto inmediatas": null,
        "CIE O72.2-Hemorragia postparto secundaria o tardía": null,
        "CIE O72.3-Defecto de la coagulación postparto": null,
        "CIE O74-Complicaciones de la anestesia administrada durante el trabajo de parto y el parto": null,
        "CIE O74.0-Neumonitis por aspiración debida a la anestesia administrada durante el trabajo de parto y el parto": null,
        "CIE O74.1-Otras complicacion: nulles pulmonares debidas a la anestesia administrada  durante el trabajo de parto y el parto": null,
        "CIE O74.2-Complicaciones cardíacas de la anestesia administrada durante el trabajo de parto y el parto": null,
        "CIE O74.3-Complicaciones del sistema nervioso central por la anestesia administrada durante el trabajo de parto y el parto": null,
        "CIE O74.4-Reacción tóxica a la anestesia local administrada durante el trabajo de parto y el parto": null,
        "CIE O74.5-Cefalalgia inducida por la anestesia espinal o epidural administradas  durante el trabajo de parto y el parto": null,
        "CIE O74.6-Otras complicaciones de la anestesia espinal o epidural administradas durante el trabajo de parto y el parto": null,
        "CIE O74.7-Falla o dificultad en la intubación durante el trabajo de parto y el parto": null,
        "CIE O74.8-Otras complicaciones de la anestesia administrada durante el trabajo de parto y el parto": null,
        "CIE O74.9-Complicación no especificada de la anestesia administrada durante el trabajo de parto y el parto": null,
        "CIE O75-Otras complicaciones del trabajo de parto y del parto, no clasificadas en otra parte": null,
        "CIE O75.0-Sufrimiento materno durante el trabajo de parto y el parto": null,
        "CIE O75.1-Choque durante o después del trabajo de parto y el parto": null,
        "CIE O75.2-Pirexia durante el trabajo de parto, no clasificada en otra parte": null,
        "CIE O75.3-Otras infecciones durante el trabajo de parto": null,
        "CIE O75.5-Retraso del parto después de la ruptura artificial de las membranas": null,
        "CIE O75.6-Retraso del parto después de la ruptura espontánea o no especificada de las membranas": null,
        "CIE O75.7-Parto vaginal posterior a una cesárea previa": null,
        "CIE O75.8-Otras complicaciones especificadas del trabajo de parto y del parto": null,
        "CIE O75.9-Complicación no especificada del trabajo de parto y del parto": null,
        "CIE O80-Parto único espontáneo": null,
        "CIE O80.0-Parto único espontáneo, presentación cefálica de vértice": null,
        "CIE O80.1-Parto único espontáneo, presentación de nalgas o podálica": null,
        "CIE O80.8-Parto único espontáneo, otras presentaciones": null,
        "CIE O80.9-Parto único espontáneo, sin otra especificación": null,
        "CIE O81-Parto único con fórceps y ventosa extractora": null,
        "CIE O81.0-Parto con fórceps bajo": null,
        "CIE O81.1-Parto con fórceps medio": null,
        "CIE O81.2-Parto con fórceps medio con rotación": null,
        "CIE O81.3-Parto con fórceps de otros tipos y los no especificados": null,
        "CIE O81.4-Parto con ventosa extractora": null,
        "CIE O81.5-Parto con combinación de fórceps y ventosa extractora": null,
        "CIE O82-Parto único por cesárea": null,
        "CIE O82.0-Parto por cesárea electiva": null,
        "CIE O82.1-Parto por cesárea de emergencia": null,
        "CIE O82.2-Parto por cesárea con histerectomía": null,
        "CIE O82.8-Otros partos únicos por cesárea": null,
        "CIE O82.9-Parto por cesárea, sin otra especificación": null,
        "CIE O83-Otros partos únicos asistidos": null,
        "CIE O83.1-Otros partos únicos asistidos, de nalgas": null,
        "CIE O83.2-Otros partos únicos con ayuda de manipulación obstétrica": null,
        "CIE O83.3-Parto de feto viable en embarazo abdominal": null,
        "CIE O83.4-Operación destructiva para facilitar el parto": null,
        "CIE O83.8-Otros partos únicos asistidos especificados": null,
        "CIE O83.9-Parto único asistido, sin otra especificación": null,
        "CIE O84-Parto múltiple": null,
        "CIE O84.0-Parto múltiple, todos espontáneos": null,
        "CIE O84.1-Parto múltiple, todos por fórceps y ventosa extractora": null,
        "CIE O84.2-Parto múltiple, todos por cesárea": null,
        "CIE O84.8-Otros partos múltiples": null,
        "CIE O91-Infecciones de la mama asociadas con el parto": null,
        "CIE O91.0-Infecciones del pezón asociadas con el parto": null,
        "CIE O91.1-Absceso de la mama asociado con el parto": null,
        "CIE O91.2-Mastitis no purulenta asociada con el parto": null,
        "CIE O92-Otros trastornos de la mama y de la lactancia asociados con el parto": null,
        "CIE O92.0-Retracción del pezón asociada con el parto": null,
        "CIE O92.1-Fisuras del pezón asociadas con el parto": null,
        "CIE O92.2-Otros trastornos de la mama y los no especificados asociados con el parto": null,
        "CIE O96-Muerte materna debida a cualquier causa obstétrica que ocurre después de 42 días pero antes de un año del parto": null,
        "CIE O98-Enfermedades maternas infecciosas y parasitarias clasificables en otra parte, pero que complican el embarazo, el parto y el puerperio": null,
        "CIE O98.0-Tuberculosis que complica el embarazo, el parto y el puerperio": null,
        "CIE O98.1-Sífilis que complica el embarazo, el parto y el puerperio": null,
        "CIE O98.2-Gonorrea que complica el embarazo, el parto y el puerperio": null,
        "CIE O98.3-Otras infecciones con un modo de transmisión predominantemente sexual que complican el embarazo, el parto y el puerperio": null,
        "CIE O98.4-Hepatitis viral que complica el embarazo, el parto y el puerperio": null,
        "CIE O98.5-Otras enfermedades virales que complican el embarazo, el parto y el puerperio": null,
        "CIE O98.6-Enfermedades causadas por protozoarios que complican el embarazo, el parto y el puerperio": null,
        "CIE O98.8-Otras enfermedades infecciosas y parasitarias maternas que complican el embarazo, el parto y el puerperio": null,
        "CIE O98.9-Enfermedad infecciosa y parasitaria materna no especificada que complica el embarazo, el parto y el puerperio": null,
        "CIE O99-Otras enfermedades maternas clasificables en otra parte, pero que complican el embarazo, el parto y el puerperio": null,
        "CIE O99.0-Anemia que complica el embarazo, el parto y el puerperio": null,
        "CIE O99.1-Otras enfermedades de la sangre y de los órganos hematopoyéticos y ciertos trastornos que afectan el sistema inmunitario cuando complican el embarazo, el parto y el puerperio": null,
        "CIE O99.2-Enfermedades endocrinas, de la nutrición y del metabolismo que complican el embarazo, el parto y el puerperio": null,
        "CIE O99.3-Trastornos mentales y enfermedades del sistema nervioso que complican el embarazo, el parto y el puerperio": null,
        "CIE O99.4-Enfermedades del sistema circulatorio que complican el embarazo, el parto y el puerperio": null,
        "CIE O99.5-Enfermedades del sistema respiratorio que complican el embarazo, el parto y el puerperio": null,
        "CIE O99.6-Enfermedades del sistema digestivo que complican el embarazo, el parto y el puerperio": null,
        "CIE O99.7-Enfermedades de la piel y del tejido subcutáneo que complican el embarazo, el parto y el puerperio": null,
        "CIE O99.8-Otras enfermedades especificadas y afecciones que complican el embarazo, el parto y el puerperio": null,
        "CIE P01.7-Feto y recién nacido afectados por presentación anómala antes del trabajo de parto": null,
        "CIE P03-Feto y recién nacido afectados por otras complicaciones del trabajo de parto y del parto": null,
        "CIE P03.0-Feto y recién nacido afectados por parto y extracción de nalgas": null,
        "CIE P03.1-Feto y recién nacido afectados por otra presentación anómala, posición anómala y desproporción durante el trabajo de parto y el parto": null,
        "CIE P03.2-Feto y recién nacido afectados por parto con fórceps": null,
        "CIE P03.3-Feto y recién nacido afectados por parto con ventosa extractora": null,
        "CIE P03.4-Feto y recién nacido afectados por parto por cesárea": null,
        "CIE P03.5-Feto y recién nacido afectados por parto precipitado": null,
        "CIE P03.8-Feto y recién nacido afectados por otras complicaciones especificadas del trabajo de parto y del parto": null,
        "CIE P03.9-Feto y recién nacido afectados por complicaciones no especificadas del trabajo de parto y del parto": null,
        "CIE P04.0-Feto y recién nacido afectados por anestesia y analgesia materna en el embarazo, en el trabajo de parto y en el parto": null,
        "CIE P20.0-Hipoxia intrauterina notada por primera vez antes del inicio del trabajo de parto": null,
        "CIE P20.1-Hipoxia intrauterina notada por primera vez durante el trabajo de parto y el parto": null,
        "CIE P59.0-Ictericia neonatal asociada con el parto antes de término": null,
        "CIE Z37-Producto del parto": null,
        "CIEZ37.9-Producto del parto no especificado": null,
        "CIEZ39-Examen y atención del postparto": null,
        "CIE Z39.0-Atención y examen inmediatamente después del parto": null,
        "CIE Z39.2-Seguimiento postparto, de rutina": null,
        "CIE Z87.5-Historia personal de complicaciones del embarazo, del parto y del puerperio": null,
      },
      limit: 5, // The max amount of results that can be shown at once. Default: Infinity.
      onAutocomplete: function (val) {
        // Callback function when value is autcompleted.
      },
      minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
    });
  });
}

export function InitDatatablePatologico(id) {
  var table = $("#" + id).DataTable({
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo:
        "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    },
  });

  document.getElementById(
    "tableAntecedentesPatologicos_filter"
  ).style.visibility = "hidden";

  $("#tableAntecedentesPatologicos tbody").on(
    "click",
    "a#rmPatologico",
    function () {
      table.row($(this).parents("tr")).remove().draw();
    }
  );
}

export function AgregarTablePathological(value) {
  $(document).ready(function () {
    var table = $("#tableAntecedentesPatologicos").DataTable();
    var rowNode = table.row.add(value).draw().node();
  });
}

export function recordPathologicalFamiliarAutocomplete() {
  $(document).ready(function () {
    $("input#patologicoFamiliar").autocomplete({
      data: {
        "CIE N64.3-Galactorrea no asociada con el parto": null,
        "CIE O10-Hipertensión preexistente que complica el embarazo, el parto y el puerperio": null,
        "CIE O10.0-Hipertensión esencial preexistente que complica el embarazo, el parto y el puerperio": null,
        "CIE O10.1-Enfermedad cardíaca hipertensiva preexistente que complica el embarazo, el parto y el puerperio": null,
        "CIE O10.2-Enfermedad renal hipertensiva preexistente que complica el embarazo, el parto y el puerperio": null,
        "CIE O10.3-Enfermedad cardiorrenal hipertensiva preexistente que complica el embarazo, el parto y el puerperio": null,
        "CIE O10.4-Hipertensión secundaria preexistente que complica el embarazo, el parto y el puerperio, el parto y el puerperio": null,
        "CIE O10.9-Hipertensión preexistente no especificada, que complica el embarazo, el parto y el puerperio": null,
        "CIE O15.1-Eclampsia durante el trabajo de parto": null,
        "CIE O26.6-Trastornos del hígado en el embarazo, el parto y el puerperio": null,
        "CIE O26.7-Subluxación de la sínfisis (del pubis) en el embarazo, el parto y el puerperio": null,
        "CIE O42.0-Ruptura prematura de las membranas, e inicio del trabajo de parto dentro de las 24 horas": null,
        "CIE O42.1-Ruptura prematura de las membranas, e inicio del trabajo de parto después de las 24 horas": null,
        "CIE O42.2-Ruptura prematura de las membranas, trabajo de parto retrasado por la terapéutica": null,
        "CIE O46-Hemorragia anteparto, no clasificada en otra parte": null,
        "CIE O46.0-Hemorragia anteparto con defecto de la coagulación": null,
        "CIE O46.8-Otras hemorragias anteparto": null,
        "CIE O46.9-Hemorragia anteparto, no especificada": null,
        "CIE O47-Falso trabajo de parto": null,
        "CIE O47.0-Falso trabajo de parto antes de las 37 semanas completas de gestación": null,
        "CIE O47.1-Falso trabajo de parto a las 37 y más semanas completas de gestación": null,
        "CIE O47.9-Falso trabajo de parto, sin otra especificación": null,
        "CIE O60-Parto prematuro": null,
        "CIE O61.0-Fracaso de la inducción médica del trabajo de parto": null,
        "CIE O61.1-Fracaso de la inducción instrumental del trabajo de parto": null,
        "CIE O61.8-Otros fracasos de la inducción del trabajo de parto": null,
        "CIE O61.9-Fracaso no especificado de la inducción del trabajo de parto": null,
        "CIE O62-Anormalidades de la dinámica del trabajo de parto": null,
        "CIE O62.3-Trabajo de parto precipitado": null,
        "CIE O62.8-Otras anomalías dinámicas del trabajo de parto": null,
        "CIE O62.9-Anomalía dinámica del trabajo de parto, no especificada": null,
        "CIE O63-Trabajo de parto prolongado": null,
        "CIE O63.0-Prolongación del primer período (del trabajo de parto)": null,
        "CIE O63.1-Prolongación del segundo período (del trabajo de parto)": null,
        "CIE O63.9-Trabajo de parto prolongado, no especificado": null,
        "CIE O64-Trabajo de parto obstruido debido a mala posición y presentación anormal del feto": null,
        "CIE O64.0-Trabajo de parto obstruido debido a rotación incompleta de la cabeza fetal": null,
        "CIE O64.1-Trabajo de parto obstruido debido a presentación de nalgas": null,
        "CIE O64.2-Trabajo de parto obstruido debido a presentación de cara": null,
        "CIE O64.3-Trabajo de parto obstruido debido a presentación de frente": null,
        "CIE O64.4-Trabajo de parto obstruido debido a presentación de hombro": null,
        "CIE O64.5-Trabajo de parto obstruido debido a presentación compuesta": null,
        "CIE O64.8-Trabajo de parto obstruido debido a otras presentaciones anormales del feto": null,
        "CIE O64.9-Trabajo de parto obstruido debido a presentación anormal del feto no especificada": null,
        "CIE O65-Trabajo de parto obstruido debido a anormalidad de la pelvis materna": null,
        "CIE O65.0-Trabajo de parto obstruido debido a deformidad de la pelvis": null,
        "CIE O65.1-Trabajo de parto obstruido debido a estrechez general de la pelvis": null,
        "TCIE O65.2-rabajo de parto obstruido debido a disminución del estrecho superior de la pelvis": null,
        "CIE O65.3-Trabajo de parto obstruido debido a disminución del estrecho inferior de la pelvis": null,
        "TCIE O65.4-rabajo de parto obstruido debido a desproporción fetopelviana, sin otra especificación": null,
        "CIE O65.5-Trabajo de parto obstruido debido a anomalías de los órganos pelvianos maternos": null,
        "CIE O65.8-Trabajo de parto obstruido debido a otras anomalías pelvianas maternas": null,
        "CIE O65.9-Trabajo de parto obstruido debido a anomalía pelviana no especificada": null,
        "CIE O66-Otras obstrucciones del trabajo de parto": null,
        "CIE O66.0-Trabajo de parto obstruido debido a distocia de hombros": null,
        "CIE O66.1-Trabajo de parto obstruido debido a distocia gemelar": null,
        "CIE O66.2-Trabajo de parto obstruido debido a distocia por feto inusualmente grande": null,
        "CIE O66.3-Trabajo de parto obstruido debido a otras anormalidades del feto": null,
        "CIE O66.4-Fracaso de la prueba del trabajo de parto, no especificada": null,
        "CIE O66.8-Otras obstrucciones especificadas del trabajo de parto": null,
        "CIE O66.9-Trabajo de parto obstruido, sin otra especificación": null,
        "CIE O67-Trabajo de parto y parto complicados por hemorragia intraparto, no clasificados en otra parte": null,
        "CIE O67.0-Hemorragia intraparto con defectos de la coagulación": null,
        "CIE O67.8-Otras hemorragias intraparto": null,
        "CIE O67.9-Hemorragia intraparto, no especificada": null,
        "CIE O68-Trabajo de parto y parto complicados por sufrimiento fetal": null,
        "CIE O68.0-Trabajo de parto y parto complicados por anomalía de la frecuencia cardíaca fetal": null,
        "CIE O68.1-Trabajo de parto y parto complicados por la presencia de meconio en el líquido amniótico": null,
        "CIE O68.2-Trabajo de parto y parto complicados por anomalía de la frecuencia cardíaca fetal asociada con presencia de meconio en el líquido amniótico": null,
        "CIE O68.3-Trabajo de parto y parto complicados por evidencia bioquímica de sufrimiento fetal": null,
        "CIE O68.8-Trabajo de parto y parto complicados por otras evidencias de sufrimiento fetal": null,
        "CIE O68.9-Trabajo de parto y parto complicados por sufrimiento fetal, sin otra especificación": null,
        "CIE O69-Trabajo de parto y parto complicados por problemas del cordón umbilical": null,
        "CIE O69.0-Trabajo de parto y parto complicados por prolapso del cordón umbilical": null,
        "CIE O69.1-Trabajo de parto y parto complicados por circular pericervical del cordón, con compresión": null,
        "CIE O69.2-Trabajo de parto y parto complicados por otros enredos del cordón": null,
        "CIE O69.3-Trabajo de parto y parto complicados por cordón umbilical corto": null,
        "CIE O69.4-Trabajo de parto y parto complicados por vasa previa": null,
        "CIE O69.5-Trabajo de parto y parto complicados por lesión vascular del cordón": null,
        "CIE O69.8-Trabajo de parto y parto complicados por otros problemas del cordón umbilical": null,
        "CIE O69.9-Trabajo de parto y parto complicados por problemas no especificados del cordón umbilical": null,
        "CIE O70-Desgarro perineal durante el parto": null,
        "CIE O70.0-Desgarro perineal de primer grado durante el parto": null,
        "CIE O70.1-Desgarro perineal de segundo grado durante el parto": null,
        "CIE O70.2-Desgarro perineal de tercer grado durante el parto": null,
        "CIE O70.3-Desgarro perineal de cuarto grado durante el parto": null,
        "CIE O70.9-Desgarro perineal durante el parto, de grado no especificado": null,
        "CIE O71.0-Ruptura del útero antes del inicio del trabajo de parto": null,
        "CIE O71.1-Ruptura del útero durante el trabajo de parto": null,
        "CIE O71.2-Inversión del útero, postparto": null,
        "CIE O72-Hemorragia postparto": null,
        "CIE O72.0-Hemorragia del tercer período del parto": null,
        "CIE O72.1-Otras hemorragias postparto inmediatas": null,
        "CIE O72.2-Hemorragia postparto secundaria o tardía": null,
        "CIE O72.3-Defecto de la coagulación postparto": null,
        "CIE O74-Complicaciones de la anestesia administrada durante el trabajo de parto y el parto": null,
        "CIE O74.0-Neumonitis por aspiración debida a la anestesia administrada durante el trabajo de parto y el parto": null,
        "CIE O74.1-Otras complicacion: nulles pulmonares debidas a la anestesia administrada  durante el trabajo de parto y el parto": null,
        "CIE O74.2-Complicaciones cardíacas de la anestesia administrada durante el trabajo de parto y el parto": null,
        "CIE O74.3-Complicaciones del sistema nervioso central por la anestesia administrada durante el trabajo de parto y el parto": null,
        "CIE O74.4-Reacción tóxica a la anestesia local administrada durante el trabajo de parto y el parto": null,
        "CIE O74.5-Cefalalgia inducida por la anestesia espinal o epidural administradas  durante el trabajo de parto y el parto": null,
        "CIE O74.6-Otras complicaciones de la anestesia espinal o epidural administradas durante el trabajo de parto y el parto": null,
        "CIE O74.7-Falla o dificultad en la intubación durante el trabajo de parto y el parto": null,
        "CIE O74.8-Otras complicaciones de la anestesia administrada durante el trabajo de parto y el parto": null,
        "CIE O74.9-Complicación no especificada de la anestesia administrada durante el trabajo de parto y el parto": null,
        "CIE O75-Otras complicaciones del trabajo de parto y del parto, no clasificadas en otra parte": null,
        "CIE O75.0-Sufrimiento materno durante el trabajo de parto y el parto": null,
        "CIE O75.1-Choque durante o después del trabajo de parto y el parto": null,
        "CIE O75.2-Pirexia durante el trabajo de parto, no clasificada en otra parte": null,
        "CIE O75.3-Otras infecciones durante el trabajo de parto": null,
        "CIE O75.5-Retraso del parto después de la ruptura artificial de las membranas": null,
        "CIE O75.6-Retraso del parto después de la ruptura espontánea o no especificada de las membranas": null,
        "CIE O75.7-Parto vaginal posterior a una cesárea previa": null,
        "CIE O75.8-Otras complicaciones especificadas del trabajo de parto y del parto": null,
        "CIE O75.9-Complicación no especificada del trabajo de parto y del parto": null,
        "CIE O80-Parto único espontáneo": null,
        "CIE O80.0-Parto único espontáneo, presentación cefálica de vértice": null,
        "CIE O80.1-Parto único espontáneo, presentación de nalgas o podálica": null,
        "CIE O80.8-Parto único espontáneo, otras presentaciones": null,
        "CIE O80.9-Parto único espontáneo, sin otra especificación": null,
        "CIE O81-Parto único con fórceps y ventosa extractora": null,
        "CIE O81.0-Parto con fórceps bajo": null,
        "CIE O81.1-Parto con fórceps medio": null,
        "CIE O81.2-Parto con fórceps medio con rotación": null,
        "CIE O81.3-Parto con fórceps de otros tipos y los no especificados": null,
        "CIE O81.4-Parto con ventosa extractora": null,
        "CIE O81.5-Parto con combinación de fórceps y ventosa extractora": null,
        "CIE O82-Parto único por cesárea": null,
        "CIE O82.0-Parto por cesárea electiva": null,
        "CIE O82.1-Parto por cesárea de emergencia": null,
        "CIE O82.2-Parto por cesárea con histerectomía": null,
        "CIE O82.8-Otros partos únicos por cesárea": null,
        "CIE O82.9-Parto por cesárea, sin otra especificación": null,
        "CIE O83-Otros partos únicos asistidos": null,
        "CIE O83.1-Otros partos únicos asistidos, de nalgas": null,
        "CIE O83.2-Otros partos únicos con ayuda de manipulación obstétrica": null,
        "CIE O83.3-Parto de feto viable en embarazo abdominal": null,
        "CIE O83.4-Operación destructiva para facilitar el parto": null,
        "CIE O83.8-Otros partos únicos asistidos especificados": null,
        "CIE O83.9-Parto único asistido, sin otra especificación": null,
        "CIE O84-Parto múltiple": null,
        "CIE O84.0-Parto múltiple, todos espontáneos": null,
        "CIE O84.1-Parto múltiple, todos por fórceps y ventosa extractora": null,
        "CIE O84.2-Parto múltiple, todos por cesárea": null,
        "CIE O84.8-Otros partos múltiples": null,
        "CIE O91-Infecciones de la mama asociadas con el parto": null,
        "CIE O91.0-Infecciones del pezón asociadas con el parto": null,
        "CIE O91.1-Absceso de la mama asociado con el parto": null,
        "CIE O91.2-Mastitis no purulenta asociada con el parto": null,
        "CIE O92-Otros trastornos de la mama y de la lactancia asociados con el parto": null,
        "CIE O92.0-Retracción del pezón asociada con el parto": null,
        "CIE O92.1-Fisuras del pezón asociadas con el parto": null,
        "CIE O92.2-Otros trastornos de la mama y los no especificados asociados con el parto": null,
        "CIE O96-Muerte materna debida a cualquier causa obstétrica que ocurre después de 42 días pero antes de un año del parto": null,
        "CIE O98-Enfermedades maternas infecciosas y parasitarias clasificables en otra parte, pero que complican el embarazo, el parto y el puerperio": null,
        "CIE O98.0-Tuberculosis que complica el embarazo, el parto y el puerperio": null,
        "CIE O98.1-Sífilis que complica el embarazo, el parto y el puerperio": null,
        "CIE O98.2-Gonorrea que complica el embarazo, el parto y el puerperio": null,
        "CIE O98.3-Otras infecciones con un modo de transmisión predominantemente sexual que complican el embarazo, el parto y el puerperio": null,
        "CIE O98.4-Hepatitis viral que complica el embarazo, el parto y el puerperio": null,
        "CIE O98.5-Otras enfermedades virales que complican el embarazo, el parto y el puerperio": null,
        "CIE O98.6-Enfermedades causadas por protozoarios que complican el embarazo, el parto y el puerperio": null,
        "CIE O98.8-Otras enfermedades infecciosas y parasitarias maternas que complican el embarazo, el parto y el puerperio": null,
        "CIE O98.9-Enfermedad infecciosa y parasitaria materna no especificada que complica el embarazo, el parto y el puerperio": null,
        "CIE O99-Otras enfermedades maternas clasificables en otra parte, pero que complican el embarazo, el parto y el puerperio": null,
        "CIE O99.0-Anemia que complica el embarazo, el parto y el puerperio": null,
        "CIE O99.1-Otras enfermedades de la sangre y de los órganos hematopoyéticos y ciertos trastornos que afectan el sistema inmunitario cuando complican el embarazo, el parto y el puerperio": null,
        "CIE O99.2-Enfermedades endocrinas, de la nutrición y del metabolismo que complican el embarazo, el parto y el puerperio": null,
        "CIE O99.3-Trastornos mentales y enfermedades del sistema nervioso que complican el embarazo, el parto y el puerperio": null,
        "CIE O99.4-Enfermedades del sistema circulatorio que complican el embarazo, el parto y el puerperio": null,
        "CIE O99.5-Enfermedades del sistema respiratorio que complican el embarazo, el parto y el puerperio": null,
        "CIE O99.6-Enfermedades del sistema digestivo que complican el embarazo, el parto y el puerperio": null,
        "CIE O99.7-Enfermedades de la piel y del tejido subcutáneo que complican el embarazo, el parto y el puerperio": null,
        "CIE O99.8-Otras enfermedades especificadas y afecciones que complican el embarazo, el parto y el puerperio": null,
        "CIE P01.7-Feto y recién nacido afectados por presentación anómala antes del trabajo de parto": null,
        "CIE P03-Feto y recién nacido afectados por otras complicaciones del trabajo de parto y del parto": null,
        "CIE P03.0-Feto y recién nacido afectados por parto y extracción de nalgas": null,
        "CIE P03.1-Feto y recién nacido afectados por otra presentación anómala, posición anómala y desproporción durante el trabajo de parto y el parto": null,
        "CIE P03.2-Feto y recién nacido afectados por parto con fórceps": null,
        "CIE P03.3-Feto y recién nacido afectados por parto con ventosa extractora": null,
        "CIE P03.4-Feto y recién nacido afectados por parto por cesárea": null,
        "CIE P03.5-Feto y recién nacido afectados por parto precipitado": null,
        "CIE P03.8-Feto y recién nacido afectados por otras complicaciones especificadas del trabajo de parto y del parto": null,
        "CIE P03.9-Feto y recién nacido afectados por complicaciones no especificadas del trabajo de parto y del parto": null,
        "CIE P04.0-Feto y recién nacido afectados por anestesia y analgesia materna en el embarazo, en el trabajo de parto y en el parto": null,
        "CIE P20.0-Hipoxia intrauterina notada por primera vez antes del inicio del trabajo de parto": null,
        "CIE P20.1-Hipoxia intrauterina notada por primera vez durante el trabajo de parto y el parto": null,
        "CIE P59.0-Ictericia neonatal asociada con el parto antes de término": null,
        "CIE Z37-Producto del parto": null,
        "CIEZ37.9-Producto del parto no especificado": null,
        "CIEZ39-Examen y atención del postparto": null,
        "CIE Z39.0-Atención y examen inmediatamente después del parto": null,
        "CIE Z39.2-Seguimiento postparto, de rutina": null,
        "CIE Z87.5-Historia personal de complicaciones del embarazo, del parto y del puerperio": null,
      },
      limit: 5, // The max amount of results that can be shown at once. Default: Infinity.
      onAutocomplete: function (val) {
        // Callback function when value is autcompleted.
      },
      minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
    });
  });
}

export function AgregarTablePathologicalFamiliar(value) {
  $(document).ready(function () {
    var table = $("#tablePatologicosFamiliares").DataTable();
    var rowNode = table.row.add(value).draw().node();
  });
}

export function InitDatatableFamiliar(id) {
  var table = $("#" + id).DataTable({
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo:
        "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    },
  });

  document.getElementById(
    "tablePatologicosFamiliares_filter"
  ).style.visibility = "hidden";

  // Eliminar Fila
  $("#tablePatologicosFamiliares tbody").on(
    "click",
    "a#rmPatologicoFamiliar",
    function () {
      table.row($(this).parents("tr")).remove().draw();
    }
  );
}

export function registrarAntecedentes() {
  let tablePatologico = $("#tableAntecedentesPatologicos").DataTable();
  let dataPatologico = tablePatologico.rows().data();

  let arrPatologico = [];
  let codePatologico = "";
  let descriptionPatologico = "";
  for (let i = 0; i < dataPatologico.length; i++) {
    codePatologico = "";
    descriptionPatologico = "";
    for (let j = 0; j < dataPatologico[i].length; j++) {
      if (j == 0) {
        codePatologico = dataPatologico[i][j];
      } else if (j == 1) {
        descriptionPatologico = dataPatologico[i][j];
      }
    }

    let jsonPatologico = {
      cie: codePatologico,
      description: descriptionPatologico,
    };

    arrPatologico.push(jsonPatologico);
  }

  let json_antecedente_patologico = {
    pathological_record: arrPatologico,
  };

  localStorage.setItem(
    "pathological_record",
    JSON.stringify(json_antecedente_patologico)
  );

  let tableFamiliar = $("#tablePatologicosFamiliares").DataTable();
  let dataFamiliar = tableFamiliar.rows().data();

  let arrFamiliar = [];
  let codeFamiliar = "";
  let descriptionFamiliar = "";
  let parentescoFamiliar = "";
  for (let i = 0; i < dataFamiliar.length; i++) {
    codeFamiliar = "";
    descriptionFamiliar = "";
    parentescoFamiliar = "";
    for (let j = 0; j < dataFamiliar[i].length; j++) {
      if (j == 0) {
        codeFamiliar = dataFamiliar[i][j];
      } else if (j == 1) {
        descriptionFamiliar = dataFamiliar[i][j];
      } else if (j == 2) {
        parentescoFamiliar = dataFamiliar[i][j];
      }
    }

    let jsonFamiliar = {
      cie: codeFamiliar,
      description: descriptionFamiliar,
      familiar: parentescoFamiliar,
    };

    arrFamiliar.push(jsonFamiliar);
  }
  let json_antecedente_familiar = {
    pathological_familiar_record: arrFamiliar,
  };
  localStorage.setItem(
    "pathological_familiar_record",
    JSON.stringify(json_antecedente_familiar)
  );

  // proceso de almacenamiento antecedentes generales
  let user_call_patient = localStorage.getItem("user_patient_call");

  return true;
  $.ajax({
    type: "GET",
    url: urlBase + "/api/get/user/sinch/" + user_call_patient,
    dataType: "json",
    contentType: "application/json; charset=utf-8",
    success: function (response) {
      console.log("OBTENCION DE USER MEDIANTE USER SINCH");
      let jsonGeneralRecord = JSON.parse(
        localStorage.getItem("general_records")
      );

      // Almacenar antedentes generales
      let dataGeneralRecord = {
        medicaments: jsonGeneralRecord.medicaments,
        RAM: jsonGeneralRecord.RAM,
        occupational: jsonGeneralRecord.occupational,
        general_prenatal_id: jsonGeneralRecord.general_prenatal_id,
        general_birth_id: jsonGeneralRecord.general_birth_id,
        general_immunization_id: jsonGeneralRecord.general_immunization_id,
        harmful_habits_id: jsonGeneralRecord.harmful_habits_id,
        user_id: response.data.user_id,
      };
      console.log("DATA GENERAL RECORD", dataGeneralRecord);
      $.ajax({
        type: "POST",
        url: urlBase + "/api/save/general/record",
        data: JSON.stringify(dataGeneralRecord),
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        success: function (response) {
          console.log("RECORD GENERAL GUARDADO");
        },
        error: function (error) {
          console.log(error);
          return false;
        },
      });

      // Almacenar antecedentes ginecologicos
      if (
        localStorage.getItem("ginecological_records") == null ||
        localStorage.getItem("ginecological_records") == ""
      ) {
      } else {
        let jsonGinecologicalRecord = JSON.parse(
          localStorage.getItem("ginecological_records")
        );

        let dataGinecologicalRecord = {
          menarquia: jsonGinecologicalRecord.menarquia,
          regular_rule: jsonGinecologicalRecord.regular_rule,
          r_caternial: jsonGinecologicalRecord.r_caternial,
          rs: jsonGinecologicalRecord.rs,
          fur: jsonGinecologicalRecord.fur,
          fpp: jsonGinecologicalRecord.fpp,
          disminorrea: jsonGinecologicalRecord.disminorrea,
          nro_gestaciones: jsonGinecologicalRecord.nro_gestaciones,
          fup: jsonGinecologicalRecord.fup,
          pariedad: jsonGinecologicalRecord.pariedad,
          cesareas: jsonGinecologicalRecord.cesareas,
          pap: jsonGinecologicalRecord.pap,
          mamografia: jsonGinecologicalRecord.mamografia,
          mac: jsonGinecologicalRecord.mac,
          otros: jsonGinecologicalRecord.otros,
          user_id: response.data.user_id,
        };
        console.log("DATA ANTECEDENTES GINECOLOGICOS", dataGinecologicalRecord);
        $.ajax({
          type: "POST",
          url: urlBase + "/api/save/ginecological/record",
          data: JSON.stringify(dataGinecologicalRecord),
          dataType: "json",
          contentType: "application/json; charset=utf-8",
          success: function (response) {
            console.log("ANTECEDENTE GINECOLOGICO REGISTRADO");
          },
          error: function (error) {
            console.log(error);
            return false;
          },
        });
      }

      // Almacenar antecedentes patologicos
      let jsonPathologicalRecord = JSON.parse(
        localStorage.getItem("pathological_record")
      );

      let dataPathologicalRecord = {
        data: jsonPathologicalRecord.pathological_record,
        user_id: response.data.user_id,
      };
      console.log("DATA ANTECEDENTE PATOLOGICO", dataPathologicalRecord);
      $.ajax({
        type: "POST",
        url: urlBase + "/api/save/pathological/record",
        data: JSON.stringify(dataPathologicalRecord),
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        success: function (response) {
          console.log("ANTECEDENTE PATOLOGICO");
        },
        error: function (error) {
          console.log(error);
          return false;
        },
      });

      // Almacenar antecedentes patologicos familiar
      let jsonPathologicalRecordFamiliar = JSON.parse(
        localStorage.getItem("pathological_familiar_record")
      );

      let dataPathologicalRecordFamiliar = {
        data: jsonPathologicalRecordFamiliar.pathological_familiar_record,
        user_id: response.data.user_id,
      };
      console.log(
        "DATA ANTECEDENTE PATOLOGICO FAMILIAR",
        jsonPathologicalRecordFamiliar
      );
      $.ajax({
        type: "POST",
        url: urlBase + "/api/save/pathological/familiar/record",
        data: JSON.stringify(dataPathologicalRecordFamiliar),
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        success: function (response) {
          console.log("REGISTRO DE ANTECEDENTE PATOLOGICO FAMILIAR");
        },
        error: function (error) {
          console.log(error);
          return false;
        },
      });

      console.log("REGISTRO DE ANTECEDENTES COMPLETADO");

      localStorage.removeItem("general_records");
      localStorage.removeItem("ginecological_records");
      localStorage.removeItem("pathological_record");
      localStorage.removeItem("pathological_familiar_record");

      console.log("STORAGE DE ANTECEDENTES ELIMINADOS");
      return true;
    },
    error: function (error) {
      console.log(error);
      return false;
    },
  });
}

export function InitDataCurrentIllness(symptom, message) {
  $(document).ready(function () {
    $("#lblMotivo").addClass("active");
    $("#lblSignos").addClass("active");
    $("#signos").val(symptom);
    $("#motivo").val(message);
  });
}

export function diagnosticAutocomplete() {
  $(document).ready(function () {
    $("input#diagnostico").autocomplete({
      data: {
        "CIE N64.3-Galactorrea no asociada con el parto": null,
        "CIE O10-Hipertensión preexistente que complica el embarazo, el parto y el puerperio": null,
        "CIE O10.0-Hipertensión esencial preexistente que complica el embarazo, el parto y el puerperio": null,
        "CIE O10.1-Enfermedad cardíaca hipertensiva preexistente que complica el embarazo, el parto y el puerperio": null,
        "CIE O10.2-Enfermedad renal hipertensiva preexistente que complica el embarazo, el parto y el puerperio": null,
        "CIE O10.3-Enfermedad cardiorrenal hipertensiva preexistente que complica el embarazo, el parto y el puerperio": null,
        "CIE O10.4-Hipertensión secundaria preexistente que complica el embarazo, el parto y el puerperio, el parto y el puerperio": null,
        "CIE O10.9-Hipertensión preexistente no especificada, que complica el embarazo, el parto y el puerperio": null,
        "CIE O15.1-Eclampsia durante el trabajo de parto": null,
        "CIE O26.6-Trastornos del hígado en el embarazo, el parto y el puerperio": null,
        "CIE O26.7-Subluxación de la sínfisis (del pubis) en el embarazo, el parto y el puerperio": null,
        "CIE O42.0-Ruptura prematura de las membranas, e inicio del trabajo de parto dentro de las 24 horas": null,
        "CIE O42.1-Ruptura prematura de las membranas, e inicio del trabajo de parto después de las 24 horas": null,
        "CIE O42.2-Ruptura prematura de las membranas, trabajo de parto retrasado por la terapéutica": null,
        "CIE O46-Hemorragia anteparto, no clasificada en otra parte": null,
        "CIE O46.0-Hemorragia anteparto con defecto de la coagulación": null,
        "CIE O46.8-Otras hemorragias anteparto": null,
        "CIE O46.9-Hemorragia anteparto, no especificada": null,
        "CIE O47-Falso trabajo de parto": null,
        "CIE O47.0-Falso trabajo de parto antes de las 37 semanas completas de gestación": null,
        "CIE O47.1-Falso trabajo de parto a las 37 y más semanas completas de gestación": null,
        "CIE O47.9-Falso trabajo de parto, sin otra especificación": null,
        "CIE O60-Parto prematuro": null,
        "CIE O61.0-Fracaso de la inducción médica del trabajo de parto": null,
        "CIE O61.1-Fracaso de la inducción instrumental del trabajo de parto": null,
        "CIE O61.8-Otros fracasos de la inducción del trabajo de parto": null,
        "CIE O61.9-Fracaso no especificado de la inducción del trabajo de parto": null,
        "CIE O62-Anormalidades de la dinámica del trabajo de parto": null,
        "CIE O62.3-Trabajo de parto precipitado": null,
        "CIE O62.8-Otras anomalías dinámicas del trabajo de parto": null,
        "CIE O62.9-Anomalía dinámica del trabajo de parto, no especificada": null,
        "CIE O63-Trabajo de parto prolongado": null,
        "CIE O63.0-Prolongación del primer período (del trabajo de parto)": null,
        "CIE O63.1-Prolongación del segundo período (del trabajo de parto)": null,
        "CIE O63.9-Trabajo de parto prolongado, no especificado": null,
        "CIE O64-Trabajo de parto obstruido debido a mala posición y presentación anormal del feto": null,
        "CIE O64.0-Trabajo de parto obstruido debido a rotación incompleta de la cabeza fetal": null,
        "CIE O64.1-Trabajo de parto obstruido debido a presentación de nalgas": null,
        "CIE O64.2-Trabajo de parto obstruido debido a presentación de cara": null,
        "CIE O64.3-Trabajo de parto obstruido debido a presentación de frente": null,
        "CIE O64.4-Trabajo de parto obstruido debido a presentación de hombro": null,
        "CIE O64.5-Trabajo de parto obstruido debido a presentación compuesta": null,
        "CIE O64.8-Trabajo de parto obstruido debido a otras presentaciones anormales del feto": null,
        "CIE O64.9-Trabajo de parto obstruido debido a presentación anormal del feto no especificada": null,
        "CIE O65-Trabajo de parto obstruido debido a anormalidad de la pelvis materna": null,
        "CIE O65.0-Trabajo de parto obstruido debido a deformidad de la pelvis": null,
        "CIE O65.1-Trabajo de parto obstruido debido a estrechez general de la pelvis": null,
        "TCIE O65.2-rabajo de parto obstruido debido a disminución del estrecho superior de la pelvis": null,
        "CIE O65.3-Trabajo de parto obstruido debido a disminución del estrecho inferior de la pelvis": null,
        "TCIE O65.4-rabajo de parto obstruido debido a desproporción fetopelviana, sin otra especificación": null,
        "CIE O65.5-Trabajo de parto obstruido debido a anomalías de los órganos pelvianos maternos": null,
        "CIE O65.8-Trabajo de parto obstruido debido a otras anomalías pelvianas maternas": null,
        "CIE O65.9-Trabajo de parto obstruido debido a anomalía pelviana no especificada": null,
        "CIE O66-Otras obstrucciones del trabajo de parto": null,
        "CIE O66.0-Trabajo de parto obstruido debido a distocia de hombros": null,
        "CIE O66.1-Trabajo de parto obstruido debido a distocia gemelar": null,
        "CIE O66.2-Trabajo de parto obstruido debido a distocia por feto inusualmente grande": null,
        "CIE O66.3-Trabajo de parto obstruido debido a otras anormalidades del feto": null,
        "CIE O66.4-Fracaso de la prueba del trabajo de parto, no especificada": null,
        "CIE O66.8-Otras obstrucciones especificadas del trabajo de parto": null,
        "CIE O66.9-Trabajo de parto obstruido, sin otra especificación": null,
        "CIE O67-Trabajo de parto y parto complicados por hemorragia intraparto, no clasificados en otra parte": null,
        "CIE O67.0-Hemorragia intraparto con defectos de la coagulación": null,
        "CIE O67.8-Otras hemorragias intraparto": null,
        "CIE O67.9-Hemorragia intraparto, no especificada": null,
        "CIE O68-Trabajo de parto y parto complicados por sufrimiento fetal": null,
        "CIE O68.0-Trabajo de parto y parto complicados por anomalía de la frecuencia cardíaca fetal": null,
        "CIE O68.1-Trabajo de parto y parto complicados por la presencia de meconio en el líquido amniótico": null,
        "CIE O68.2-Trabajo de parto y parto complicados por anomalía de la frecuencia cardíaca fetal asociada con presencia de meconio en el líquido amniótico": null,
        "CIE O68.3-Trabajo de parto y parto complicados por evidencia bioquímica de sufrimiento fetal": null,
        "CIE O68.8-Trabajo de parto y parto complicados por otras evidencias de sufrimiento fetal": null,
        "CIE O68.9-Trabajo de parto y parto complicados por sufrimiento fetal, sin otra especificación": null,
        "CIE O69-Trabajo de parto y parto complicados por problemas del cordón umbilical": null,
        "CIE O69.0-Trabajo de parto y parto complicados por prolapso del cordón umbilical": null,
        "CIE O69.1-Trabajo de parto y parto complicados por circular pericervical del cordón, con compresión": null,
        "CIE O69.2-Trabajo de parto y parto complicados por otros enredos del cordón": null,
        "CIE O69.3-Trabajo de parto y parto complicados por cordón umbilical corto": null,
        "CIE O69.4-Trabajo de parto y parto complicados por vasa previa": null,
        "CIE O69.5-Trabajo de parto y parto complicados por lesión vascular del cordón": null,
        "CIE O69.8-Trabajo de parto y parto complicados por otros problemas del cordón umbilical": null,
        "CIE O69.9-Trabajo de parto y parto complicados por problemas no especificados del cordón umbilical": null,
        "CIE O70-Desgarro perineal durante el parto": null,
        "CIE O70.0-Desgarro perineal de primer grado durante el parto": null,
        "CIE O70.1-Desgarro perineal de segundo grado durante el parto": null,
        "CIE O70.2-Desgarro perineal de tercer grado durante el parto": null,
        "CIE O70.3-Desgarro perineal de cuarto grado durante el parto": null,
        "CIE O70.9-Desgarro perineal durante el parto, de grado no especificado": null,
        "CIE O71.0-Ruptura del útero antes del inicio del trabajo de parto": null,
        "CIE O71.1-Ruptura del útero durante el trabajo de parto": null,
        "CIE O71.2-Inversión del útero, postparto": null,
        "CIE O72-Hemorragia postparto": null,
        "CIE O72.0-Hemorragia del tercer período del parto": null,
        "CIE O72.1-Otras hemorragias postparto inmediatas": null,
        "CIE O72.2-Hemorragia postparto secundaria o tardía": null,
        "CIE O72.3-Defecto de la coagulación postparto": null,
        "CIE O74-Complicaciones de la anestesia administrada durante el trabajo de parto y el parto": null,
        "CIE O74.0-Neumonitis por aspiración debida a la anestesia administrada durante el trabajo de parto y el parto": null,
        "CIE O74.1-Otras complicacion: nulles pulmonares debidas a la anestesia administrada  durante el trabajo de parto y el parto": null,
        "CIE O74.2-Complicaciones cardíacas de la anestesia administrada durante el trabajo de parto y el parto": null,
        "CIE O74.3-Complicaciones del sistema nervioso central por la anestesia administrada durante el trabajo de parto y el parto": null,
        "CIE O74.4-Reacción tóxica a la anestesia local administrada durante el trabajo de parto y el parto": null,
        "CIE O74.5-Cefalalgia inducida por la anestesia espinal o epidural administradas  durante el trabajo de parto y el parto": null,
        "CIE O74.6-Otras complicaciones de la anestesia espinal o epidural administradas durante el trabajo de parto y el parto": null,
        "CIE O74.7-Falla o dificultad en la intubación durante el trabajo de parto y el parto": null,
        "CIE O74.8-Otras complicaciones de la anestesia administrada durante el trabajo de parto y el parto": null,
        "CIE O74.9-Complicación no especificada de la anestesia administrada durante el trabajo de parto y el parto": null,
        "CIE O75-Otras complicaciones del trabajo de parto y del parto, no clasificadas en otra parte": null,
        "CIE O75.0-Sufrimiento materno durante el trabajo de parto y el parto": null,
        "CIE O75.1-Choque durante o después del trabajo de parto y el parto": null,
        "CIE O75.2-Pirexia durante el trabajo de parto, no clasificada en otra parte": null,
        "CIE O75.3-Otras infecciones durante el trabajo de parto": null,
        "CIE O75.5-Retraso del parto después de la ruptura artificial de las membranas": null,
        "CIE O75.6-Retraso del parto después de la ruptura espontánea o no especificada de las membranas": null,
        "CIE O75.7-Parto vaginal posterior a una cesárea previa": null,
        "CIE O75.8-Otras complicaciones especificadas del trabajo de parto y del parto": null,
        "CIE O75.9-Complicación no especificada del trabajo de parto y del parto": null,
        "CIE O80-Parto único espontáneo": null,
        "CIE O80.0-Parto único espontáneo, presentación cefálica de vértice": null,
        "CIE O80.1-Parto único espontáneo, presentación de nalgas o podálica": null,
        "CIE O80.8-Parto único espontáneo, otras presentaciones": null,
        "CIE O80.9-Parto único espontáneo, sin otra especificación": null,
        "CIE O81-Parto único con fórceps y ventosa extractora": null,
        "CIE O81.0-Parto con fórceps bajo": null,
        "CIE O81.1-Parto con fórceps medio": null,
        "CIE O81.2-Parto con fórceps medio con rotación": null,
        "CIE O81.3-Parto con fórceps de otros tipos y los no especificados": null,
        "CIE O81.4-Parto con ventosa extractora": null,
        "CIE O81.5-Parto con combinación de fórceps y ventosa extractora": null,
        "CIE O82-Parto único por cesárea": null,
        "CIE O82.0-Parto por cesárea electiva": null,
        "CIE O82.1-Parto por cesárea de emergencia": null,
        "CIE O82.2-Parto por cesárea con histerectomía": null,
        "CIE O82.8-Otros partos únicos por cesárea": null,
        "CIE O82.9-Parto por cesárea, sin otra especificación": null,
        "CIE O83-Otros partos únicos asistidos": null,
        "CIE O83.1-Otros partos únicos asistidos, de nalgas": null,
        "CIE O83.2-Otros partos únicos con ayuda de manipulación obstétrica": null,
        "CIE O83.3-Parto de feto viable en embarazo abdominal": null,
        "CIE O83.4-Operación destructiva para facilitar el parto": null,
        "CIE O83.8-Otros partos únicos asistidos especificados": null,
        "CIE O83.9-Parto único asistido, sin otra especificación": null,
        "CIE O84-Parto múltiple": null,
        "CIE O84.0-Parto múltiple, todos espontáneos": null,
        "CIE O84.1-Parto múltiple, todos por fórceps y ventosa extractora": null,
        "CIE O84.2-Parto múltiple, todos por cesárea": null,
        "CIE O84.8-Otros partos múltiples": null,
        "CIE O91-Infecciones de la mama asociadas con el parto": null,
        "CIE O91.0-Infecciones del pezón asociadas con el parto": null,
        "CIE O91.1-Absceso de la mama asociado con el parto": null,
        "CIE O91.2-Mastitis no purulenta asociada con el parto": null,
        "CIE O92-Otros trastornos de la mama y de la lactancia asociados con el parto": null,
        "CIE O92.0-Retracción del pezón asociada con el parto": null,
        "CIE O92.1-Fisuras del pezón asociadas con el parto": null,
        "CIE O92.2-Otros trastornos de la mama y los no especificados asociados con el parto": null,
        "CIE O96-Muerte materna debida a cualquier causa obstétrica que ocurre después de 42 días pero antes de un año del parto": null,
        "CIE O98-Enfermedades maternas infecciosas y parasitarias clasificables en otra parte, pero que complican el embarazo, el parto y el puerperio": null,
        "CIE O98.0-Tuberculosis que complica el embarazo, el parto y el puerperio": null,
        "CIE O98.1-Sífilis que complica el embarazo, el parto y el puerperio": null,
        "CIE O98.2-Gonorrea que complica el embarazo, el parto y el puerperio": null,
        "CIE O98.3-Otras infecciones con un modo de transmisión predominantemente sexual que complican el embarazo, el parto y el puerperio": null,
        "CIE O98.4-Hepatitis viral que complica el embarazo, el parto y el puerperio": null,
        "CIE O98.5-Otras enfermedades virales que complican el embarazo, el parto y el puerperio": null,
        "CIE O98.6-Enfermedades causadas por protozoarios que complican el embarazo, el parto y el puerperio": null,
        "CIE O98.8-Otras enfermedades infecciosas y parasitarias maternas que complican el embarazo, el parto y el puerperio": null,
        "CIE O98.9-Enfermedad infecciosa y parasitaria materna no especificada que complica el embarazo, el parto y el puerperio": null,
        "CIE O99-Otras enfermedades maternas clasificables en otra parte, pero que complican el embarazo, el parto y el puerperio": null,
        "CIE O99.0-Anemia que complica el embarazo, el parto y el puerperio": null,
        "CIE O99.1-Otras enfermedades de la sangre y de los órganos hematopoyéticos y ciertos trastornos que afectan el sistema inmunitario cuando complican el embarazo, el parto y el puerperio": null,
        "CIE O99.2-Enfermedades endocrinas, de la nutrición y del metabolismo que complican el embarazo, el parto y el puerperio": null,
        "CIE O99.3-Trastornos mentales y enfermedades del sistema nervioso que complican el embarazo, el parto y el puerperio": null,
        "CIE O99.4-Enfermedades del sistema circulatorio que complican el embarazo, el parto y el puerperio": null,
        "CIE O99.5-Enfermedades del sistema respiratorio que complican el embarazo, el parto y el puerperio": null,
        "CIE O99.6-Enfermedades del sistema digestivo que complican el embarazo, el parto y el puerperio": null,
        "CIE O99.7-Enfermedades de la piel y del tejido subcutáneo que complican el embarazo, el parto y el puerperio": null,
        "CIE O99.8-Otras enfermedades especificadas y afecciones que complican el embarazo, el parto y el puerperio": null,
        "CIE P01.7-Feto y recién nacido afectados por presentación anómala antes del trabajo de parto": null,
        "CIE P03-Feto y recién nacido afectados por otras complicaciones del trabajo de parto y del parto": null,
        "CIE P03.0-Feto y recién nacido afectados por parto y extracción de nalgas": null,
        "CIE P03.1-Feto y recién nacido afectados por otra presentación anómala, posición anómala y desproporción durante el trabajo de parto y el parto": null,
        "CIE P03.2-Feto y recién nacido afectados por parto con fórceps": null,
        "CIE P03.3-Feto y recién nacido afectados por parto con ventosa extractora": null,
        "CIE P03.4-Feto y recién nacido afectados por parto por cesárea": null,
        "CIE P03.5-Feto y recién nacido afectados por parto precipitado": null,
        "CIE P03.8-Feto y recién nacido afectados por otras complicaciones especificadas del trabajo de parto y del parto": null,
        "CIE P03.9-Feto y recién nacido afectados por complicaciones no especificadas del trabajo de parto y del parto": null,
        "CIE P04.0-Feto y recién nacido afectados por anestesia y analgesia materna en el embarazo, en el trabajo de parto y en el parto": null,
        "CIE P20.0-Hipoxia intrauterina notada por primera vez antes del inicio del trabajo de parto": null,
        "CIE P20.1-Hipoxia intrauterina notada por primera vez durante el trabajo de parto y el parto": null,
        "CIE P59.0-Ictericia neonatal asociada con el parto antes de término": null,
        "CIE Z37-Producto del parto": null,
        "CIEZ37.9-Producto del parto no especificado": null,
        "CIEZ39-Examen y atención del postparto": null,
        "CIE Z39.0-Atención y examen inmediatamente después del parto": null,
        "CIE Z39.2-Seguimiento postparto, de rutina": null,
        "CIE Z87.5-Historia personal de complicaciones del embarazo, del parto y del puerperio": null,
      },
      limit: 5, // The max amount of results that can be shown at once. Default: Infinity.
      onAutocomplete: function (val) {
        // Callback function when value is autcompleted.
      },
      minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
    });
  });
}

export function AgregarTableDiagnosticoOnline(value) {
  $(document).ready(function () {
    var table = $("#tableDiagnostico").DataTable();
    var rowNode = table.row.add(value).draw().node();
  });
}

export function registrarDiagnostico() {
  let tableDiagnostico = $("#tableDiagnostico").DataTable();
  let dataDiagnostico = tableDiagnostico.rows().data();

  if (dataDiagnostico.length == 0) {
    alert("Ingresar por lo menos un diagnostico");
    return false;
  } else {
    let arrDiagnostico = [];
    let codeDiagnostico = "";
    let descriptionDiagnostico = "";
    let tipoDiagnostico = "";

    for (let i = 0; i < dataDiagnostico.length; i++) {
      codeDiagnostico = "";
      descriptionDiagnostico = "";
      tipoDiagnostico = "";
      for (let j = 0; j < dataDiagnostico[i].length; j++) {
        if (j == 0) {
          codeDiagnostico = dataDiagnostico[i][j];
        } else if (j == 1) {
          descriptionDiagnostico = dataDiagnostico[i][j];
        } else if (j == 2) {
          tipoDiagnostico = dataDiagnostico[i][j];
        }
      }

      let tipoDiagnosticoId = 2;

      if (tipoDiagnostico == "DEFINITIVO") {
        tipoDiagnosticoId = 1;
      }

      let jsonDiagnostico = {
        code: codeDiagnostico,
        description: descriptionDiagnostico,
        type_diagnostic_id: tipoDiagnosticoId,
      };

      arrDiagnostico.push(jsonDiagnostico);
    }

    localStorage.setItem(
      "diagnostic",
      JSON.stringify({ diagnostico: arrDiagnostico })
    );

    return true;
  }
}

export function InitDatatableGeneral(id) {
  var table = $("#" + id).DataTable({
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo:
        "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    },
  });

  document.getElementById(id + "_filter").style.visibility = "hidden";

  // Eliminar Fila
  $("#" + id + " tbody").on("click", "a#rm" + id, function () {
    table.row($(this).parents("tr")).remove().draw();
  });
}

export function InitDatatableTratamieno(id) {
  var table = $("#" + id).DataTable({
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo:
        "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    },
  });

  document.getElementById(id + "_filter").style.visibility = "hidden";

  // Eliminar Fila
  $("#" + id + " tbody").on("click", "a#rm" + id, function () {
    table.row($(this).parents("tr")).remove().draw();

    let data = table.rows().data();
    if (data.length == 0) {
      $("#generateRecipe").attr("disabled", "disabled");
    }
  });
}

export function AgregarTableTratamiento(value) {
  $(document).ready(function () {
    $("#generateRecipe").removeAttr("disabled");
    var table = $("#tableTratamiento").DataTable();
    var rowNode = table.row.add(value).draw().node();
  });
}

export function openModalTratamientoGenerado(validez, recomendacion) {
  let tableTratamiento = $("#tableTratamiento").DataTable();
  let dataTratamiento = tableTratamiento.rows().data();

  if (dataTratamiento.length == 0) {
    alert("Ingresar al menos un medicamento");
  } else {
    let user_sinch = localStorage.getItem("user_patient_call");
    let url = urlBase + "/api/get/user/twilio/";

    let now = new Date();

    let dd = now.getDate();
    let mm = now.getMonth() + 1;
    let yyyy = now.getFullYear();

    let dia;
    let mes;

    if (dd < 10) {
      dia = "0" + dd.toString();
    } else {
      dia = dd.toString();
    }
    if (mm < 10) {
      mes = "0" + mm.toString();
    } else {
      mes = mm.toString();
    }
    let today = dia + "/" + mes + "/" + yyyy;

    $("#fechaPaciente").text(today);

    var valid = new Date();

    valid.setDate(valid.getDate() + parseInt(validez));

    let ddv = valid.getDate();
    let mmv = valid.getMonth() + 1;
    let yyyyv = valid.getFullYear();

    let diav;
    let mesv;

    if (ddv < 10) {
      diav = "0" + ddv.toString();
    } else {
      diav = ddv.toString();
    }
    if (mmv < 10) {
      mesv = "0" + mmv.toString();
    } else {
      mesv = mmv.toString();
    }
    let todayv = diav + "/" + mesv + "/" + yyyyv;

    $("#validoPaciente").text(todayv);

    $.ajax({
      type: "GET",
      url: url + user_sinch,
      dataType: "json",
      contentType: "application/json; charset=utf-8",
      success: function (response) {
        $("#nombrePaciente").text(
          response.data.name + " " + response.data.last_name
        );
        $("#edadPaciente").text(response.data.years_old);
      },
      error: function (error) {
        console.log(error);
      },
    });

    //datos principales
    let user = JSON.parse(localStorage.getItem("identity"));
    $("#nameDoctor").text(user.name + " " + user.last_name);
    $("#cmpDoctor").text(user.id_cmp);
    $("#especialidadDoctor").text(user.specialty);

    //diagnostico
    let diagnosticData = JSON.parse(localStorage.getItem("diagnostic"));

    let diagnosticHTML = document.getElementById("diagnosticoData");
    diagnosticHTML.innerHTML = "";
    diagnosticData.diagnostico.forEach((element) => {
      diagnosticHTML.innerHTML += `
        <li>
          <b>${element.code}</b> <label for="">${element.description}</label><br>
        </li>
      `;
    });

    //tratamiento
    var medicamentsArr = [];
    let tratamientoHTML = document.getElementById("tratamientoData");
    tratamientoHTML.innerHTML = "";
    for (let index = 0; index < dataTratamiento.length; index++) {
      tratamientoHTML.innerHTML += `
        <tr>
          <td>${dataTratamiento[index][1].split("(")[0]}</td>
          <td>(${dataTratamiento[index][1].split("(")[1]}</td>
          <td>${dataTratamiento[index][6]}</td>
        </tr>
        `;

      let sUrl = urlBase + "/api/get/detail/medicament/";
      let medicamentArr = [];
      $.ajax({
        type: "GET",
        url: sUrl + dataTratamiento[index][0],
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        success: function (response) {
          let json_medicaments = {
            medicine: dataTratamiento[index][1],
            frequency: dataTratamiento[index][2],
            duration: dataTratamiento[index][3],
            way_administration: dataTratamiento[index][4],
            dose: dataTratamiento[index][5],
            quantity: dataTratamiento[index][6],
            price: response.price,
            sku: dataTratamiento[index][0],
            mu: response.sku,
          };
          medicamentsArr[index] = json_medicaments;
          localStorage.setItem(
            "medicaments",
            JSON.stringify({ medicaments: medicamentsArr })
          );
        },
        error: function (error) {
          console.log(error);
        },
      });
    }

    let jsonTemp = JSON.parse(localStorage.getItem("medicaments"));
    jsonTemp["validity"] = validez;
    jsonTemp["recomendation"] = recomendacion;

    localStorage.setItem("medicaments", JSON.stringify(jsonTemp));
    //indicaciones
    let indicacionesHTML = document.getElementById("indicacionesData");
    indicacionesHTML.innerHTML = "";
    for (let index = 0; index < dataTratamiento.length; index++) {
      indicacionesHTML.innerHTML += `
        <tr>
          <td>${dataTratamiento[index][1]}</td>
          <td>${dataTratamiento[index][4]}</td>
          <td>${dataTratamiento[index][2]}</td>
          <td>${dataTratamiento[index][3]}</td>
        </tr>
      `;
    }

    $("#modalReceta").modal("open");
  }
}

export function closeModalTratamientoGenerado() {
  $(document).ready(function () {
    $("#modalReceta").modal("close");
  });
}

export function registrarTratamiento() {
  let jsonTreatment = JSON.parse(localStorage.getItem("medicaments"));
  let now = new Date();

  let dd = now.getDate();
  let mm = now.getMonth() + 1;
  let yyyy = now.getFullYear();

  let dia;
  let mes;

  if (dd < 10) {
    dia = "0" + dd.toString();
  } else {
    dia = dd.toString();
  }
  if (mm < 10) {
    mes = "0" + mm.toString();
  } else {
    mes = mm.toString();
  }
  let today = yyyy + "/" + mes + "/" + dia;

  let dataTreatment = {
    validity: jsonTreatment.validity,
    date: today,
    general_recomendation: jsonTreatment.recomendation,
    state_notification: 0,
    query_id: localStorage.getItem("query_id"),
  };

  $.ajax({
    type: "POST",
    url: urlBase + "/api/treatments",
    data: JSON.stringify(dataTreatment),
    dataType: "json",
    contentType: "application/json; charset=utf-8",
    success: function (response) {
      console.log("RESPONSE TREATMENT SAVED", response);
      let jsonMedicament = JSON.parse(localStorage.getItem("medicaments"));
      jsonMedicament.medicaments.forEach((element) => {
        let jsonSaveMedicament = {
          medicine: element.medicine,
          dose: element.dose,
          mu: element.mu,
          price: element.price,
          quantity: element.quantity,
          sku: element.sku,
          treatment: element.treatment,
          way_administration: element.way_administration,
          treatment_id: response.data.id,
        };

        $.ajax({
          type: "POST",
          url: urlBase + "/api/medicaments",
          data: JSON.stringify(jsonSaveMedicament),
          dataType: "json",
          contentType: "application/json; charset=utf-8",
          success: function (response) {
            console.log("RESPONSE MEDICAMENT SAVED", response);
          },
          error: function (error) {
            console.log("ERROR MEDICAMENT SAVED", error);
          },
        });
      });
    },
    error: function (error) {
      console.log("ERROR TREATMENT SAVED", error);
      return false;
    },
  });
}

export function orderAnalysisAutocomplete() {
  $(document).ready(function () {
    $("input#typeAnalisis").autocomplete({
      data: {
        "241621-PAQUETE PREVENCION Y CONT/DIABETES-UNIDAD-ANALISIS CLINICOS-66": null,
        "241647-ANTI MICROSOMALES (PEROXIDA TIROID)-UNIDAD-ANALISIS CLINICOS-52": null,
        "241648-CMA PAQUETE PREVENC.Y CONTR/DIABET-UNIDAD-ANALISIS CLINICOS-15": null,
        "241671-ANTICUERPOS ANTITIROIDEOS (2 EXAM)-UNIDAD-ANALISIS CLINICOS-100": null,
        "241649-TSH (HORM ESTIM DE TIROIDES/IROTROP)-UNIDAD-ANALISIS CLINICOS-40": null,
        "241680-HEMATOCRITO Y HEMOGLOBINA REFEREN-UNIDAD-ANALISIS CLINICOS-7": null,
        "241681-HEPATITIS BS ANTICUERPOS CUANTITAT-UNIDAD-ANALISIS CLINICOS-48": null,
        "241694-CULTIVO DE SECRECION FARINGEA Y ANTB-UNIDAD-ANALISIS CLINICOS-35": null,
        "241695-HEPATITIS B CORE ANTICUERPOS TOTALES-UNIDAD-ANALISIS CLINICOS-40": null,
        "241707-BILIRRUBINAS TOTALES Y FRACCION-UNIDAD-ANALISIS CLINICOS-15": null,
        "241708-VELOCIDAD DE SEDIMENTACION GLOBULAR-UNIDAD-ANALISIS CLINICOS-15": null,
        "241719-COPROCULTIVO/EXAMEN DIRECTO Y ANTB-UNIDAD-ANALISIS CLINICOS-35": null,
        "241721-ELECTROLITOS (NA,K,CL) EN SANGRE-UNIDAD-ANALISIS CLINICOS-46.8": null,
        "241728-HEPATITIS A ANTICUERPOS IGG E IGM-UNIDAD-ANALISIS CLINICOS-65": null,
        "241729-PROTEINA C REACTIVA: CUANTITATIVO-UNIDAD-ANALISIS CLINICOS-55": null,
        "241738-EXAMEN DIRECTO SECRECION URETRAL-UNIDAD-ANALISIS CLINICOS-15": null,
        "241739-PROTEINAS TOTALES Y FRACCIONADAS-UNIDAD-ANALISIS CLINICOS-15.3": null,
        "241740-UROCULTIVO/EXAMEN DIRECTO Y ANTB-UNIDAD-ANALISIS CLINICOS-0": null,
        "241752-ANTICUERPOS ANTIESPERMATOZOIDES-UNIDAD-ANALISIS CLINICOS-58": null,
        "241753-ANTINUCLEARES ESPECIFICOS (ANA)-UNIDAD-ANALISIS CLINICOS-45.5": null,
        "241754-BRUCELLA AGLUTINACION EN LAMINA-UNIDAD-ANALISIS CLINICOS-35": null,
        "241755-CULTIVO Y ANTIB SECRECION NASAL-UNIDAD-ANALISIS CLINICOS-35": null,
        "241769-FACTOR REUMATOIDE CUANTITATIVO-UNIDAD-ANALISIS CLINICOS-20": null,
        "241770-HEPATITIS C HCV 3RA GENERACION-UNIDAD-ANALISIS CLINICOS-60": null,
        "241771-PROTEINAS EN ORINA DE 24 HORAS-UNIDAD-ANALISIS CLINICOS-21": null,
        "241780-ALERGIA PANEL DE 23 ALERGENOS-UNIDAD-ANALISIS CLINICOS-200": null,
        "241781-ANTIGENO CARCINO EMBRIOGENICO-UNIDAD-ANALISIS CLINICOS-45": null,
        "241782-CULTIVO DE SECRECION FARINGEA-UNIDAD-ANALISIS CLINICOS-45": null,
        "241783-FACTOR REUMATOIDE CUALITATIVO-UNIDAD-ANALISIS CLINICOS-13.6": null,
        "241784-HEPATITIS B ANTICUERPOS (HAC)-UNIDAD-ANALISIS CLINICOS-47": null,
        "241802-CULTIVO DE OTRAS SECRECIONES-UNIDAD-ANALISIS CLINICOS-35": null,
        "241803-CULTIVO DE SECRECION VAGINAL-UNIDAD-ANALISIS CLINICOS-45": null,
        "241804-CULTIVO DE SECRECION URETRAL-UNIDAD-ANALISIS CLINICOS-45": null,
        "241805-FOSFORO EN ORINA DE 24 HORAS-UNIDAD-ANALISIS CLINICOS-35": null,
        "241806-HEPATITIS A ANTICUERPOS IG G-UNIDAD-ANALISIS CLINICOS-79": null,
        "241807-HORMONA DE CRECIMIENTO (HGH)-UNIDAD-ANALISIS CLINICOS-55": null,
        "241808-PAQUETE FAMILIA SANA Y FELIZ-UNIDAD-ANALISIS CLINICOS-150": null,
        "241809-RECCIONES SEROLOGICAS (VDRL)-UNIDAD-ANALISIS CLINICOS-20": null,
        "241810-SUBUNIDAD BETA: CUANTITATIVA-UNIDAD-ANALISIS CLINICOS-30": null,
        "241824-CALCIO EN ORINA DE 24 HORAS-UNIDAD-ANALISIS CLINICOS-20": null,
        "241825-GRUPO SANGUINEO Y FACTOR RH-UNIDAD-ANALISIS CLINICOS-15": null,
        "241826-HEMOGLOBINA GLICOSILADA A1C-UNIDAD-ANALISIS CLINICOS-45": null,
        "241827-HEPATITIS B (PRUEBA RAPIDA)-UNIDAD-ANALISIS CLINICOS-45": null,
        "241828-TROMBOPLASTINA PARCIAL TPTK-UNIDAD-ANALISIS CLINICOS-35": null,
        "241829-PAQUETE CONTROL DE DIABETES-UNIDAD-ANALISIS CLINICOS-110": null,
        "241843-ACIDO URICO ORINA 24 HORAS-UNIDAD-ANALISIS CLINICOS-20": null,
        "241844-ELECTROFORESIS HEMOGLOBINA-UNIDAD-ANALISIS CLINICOS-134.9": null,
        "241845-FOSFATASA ACIDA PROSTATICA-UNIDAD-ANALISIS CLINICOS-40": null,
        "241846-HEPATITIS B CORE IGM (HBC)-UNIDAD-ANALISIS CLINICOS-48": null,
        "241847-PARASITOLOGICO SERIADO X 3-UNIDAD-ANALISIS CLINICOS-25": null,
        "241848-TEST DE EMBARAZO EN SANGRE-UNIDAD-ANALISIS CLINICOS-26": null,
        "241849-PARASITOLOGICO CONCENTRADO-UNIDAD-ANALISIS CLINICOS-25": null,
        "241850-PARASITOLOGICO SERIADO X 2-UNIDAD-ANALISIS CLINICOS-15": null,
        "241851-TOMA DE PRESION ARTERIAL B-UNIDAD-ANALISIS CLINICOS-1.5": null,
        "241863-MICROALBUMINURIA 24 HORAS-UNIDAD-ANALISIS CLINICOS-58.5": null,
        "241864-TRANSAMINASAS (TGO Y TGP)-UNIDAD-ANALISIS CLINICOS-35": null,
        "241865-UROCULTIVO Y ANTIBIOGRAMA-UNIDAD-ANALISIS CLINICOS-35": null,
        "241866-PAQUETE DE LA SALUD XVIII-UNIDAD-ANALISIS CLINICOS-100": null,
        "241872-AGLUTINACIONES COMPLETAS-UNIDAD-ANALISIS CLINICOS-22.6": null,
        "241873-ALFA FETOPROTEINAS (AFP)-UNIDAD-ANALISIS CLINICOS-45": null,
        "241874-BK EN ESPUTO UNA MUESTRA-UNIDAD-ANALISIS CLINICOS-25": null,
        "241875-CONSTANTES CORPUSCULARES-UNIDAD-ANALISIS CLINICOS-15": null,
        "241876-DEPURACION DE CREATININA-UNIDAD-ANALISIS CLINICOS-35": null,
        "241877-HELICOBACTER PYLORI IG G-UNIDAD-ANALISIS CLINICOS-45": null,
        "241878-HELICOBACTER PYLORI IG M-UNIDAD-ANALISIS CLINICOS-45": null,
        "241879-HIDATIDOSIS WESTERN BLOT-UNIDAD-ANALISIS CLINICOS-110": null,
        "241880-HIV ANTIGENO ANTICUERPO-UNIDAD-ANALISIS CLINICOS-35": null,
        "241881-EXAMEN COMPLETO DE ORINA-UNIDAD-ANALISIS CLINICOS-15": null,
        "241882-PAQUETE DE LA SALUD VIII-UNIDAD-ANALISIS CLINICOS-90": null,
        "241883-TIEMPO DE TROMBOPLASTINA-UNIDAD-ANALISIS CLINICOS-42": null,
        "241884-PAQUETE DE LA SALUD XIII-UNIDAD-ANALISIS CLINICOS-120": null,
        "241885-PAQUETE DE LA SALUD XVII-UNIDAD-ANALISIS CLINICOS-100": null,
        "241886-MEDIDA DE PESO Y TALLA B-UNIDAD-ANALISIS CLINICOS-1.77": null,
        "241896-PAQUETE GINECOLOGICO III-UNIDAD-ANALISIS CLINICOS-100": null,
        "241901-AGLUTINACIONMES TIFICAS-UNIDAD-ANALISIS CLINICOS-20": null,
        "241902-CMA PAQUETE ADULTO SANO-UNIDAD-ANALISIS CLINICOS-20.06": null,
        "241903-OBSERVACION DIRECTA KOH-UNIDAD-ANALISIS CLINICOS-10": null,
        "241904-PAQUETE DE LA SALUD III-UNIDAD-ANALISIS CLINICOS-100": null,
        "241905-PAQUETE DE LA SALUD VII-UNIDAD-ANALISIS CLINICOS-100": null,
        "241906-TOLERANCIA A LA GLUCOSA-UNIDAD-ANALISIS CLINICOS-55": null,
        "241907-TRANSFERRINA (T.I.B.C.)-UNIDAD-ANALISIS CLINICOS-45": null,
        "241908-PAQUETE DE LA SALUD XII-UNIDAD-ANALISIS CLINICOS-50": null,
        "241909-PAQUETE DE LA SALUD XIV-UNIDAD-ANALISIS CLINICOS-35": null,
        "241910-PAQUETE DE LA SALUD XVI-UNIDAD-ANALISIS CLINICOS-55": null,
        "241912-PAQUETE DE LA SALUD XIX-UNIDAD-ANALISIS CLINICOS-60": null,
        "241913-PAQUETE DE LA SALUD XXI-UNIDAD-ANALISIS CLINICOS-100": null,
        "241929-PAQUETE GINECOLOGICO II-UNIDAD-ANALISIS CLINICOS-100": null,
        "241934-17 HIDROXIPROGESTERONA-UNIDAD-ANALISIS CLINICOS-65": null,
        "241935-ANCA ANTI NEUTROFILOS-UNIDAD-ANALISIS CLINICOS-83": null,
        "241936-DESHIDROGENASA LACTICA-UNIDAD-ANALISIS CLINICOS-58.5": null,
        "241937-EXAMEN DIRECTO CON KOH-UNIDAD-ANALISIS CLINICOS-12": null,
        "241938-HEPATITIS HBS AG ELISA-UNIDAD-ANALISIS CLINICOS-42": null,
        "241939-INSULINA POST-PRANDIAL-UNIDAD-ANALISIS CLINICOS-48": null,
        "241940-PAQUETE DE LA SALUD II-UNIDAD-ANALISIS CLINICOS-250": null,
        "241941-PAQUETE DE LA SALUD IV-UNIDAD-ANALISIS CLINICOS-80": null,
        "241942-PAQUETE DE LA SALUD VI-UNIDAD-ANALISIS CLINICOS-50": null,
        "241943-PARASITOLOGICO DIRECTO-UNIDAD-ANALISIS CLINICOS-15": null,
        "241944-PROTEINAS EN ORINA/LCR-UNIDAD-ANALISIS CLINICOS-24": null,
        "241945-RECUENTO DE LEUCOCITOS-UNIDAD-ANALISIS CLINICOS-15": null,
        "241946-T4 (TETRAYODOTIRONINA)-UNIDAD-ANALISIS CLINICOS-35": null,
        "241947-TEST DE COOMBS DIRECTO-UNIDAD-ANALISIS CLINICOS-30": null,
        "241948-PAQUETE DE LA SALUD IX-UNIDAD-ANALISIS CLINICOS-120": null,
        "241949-PAQUETE DE LA SALUD XI-UNIDAD-ANALISIS CLINICOS-130": null,
        "241950-PAQUETE DE LA SALUD XV-UNIDAD-ANALISIS CLINICOS-155": null,
        "241951-PAQUETE DE LA SALUD XX-UNIDAD-ANALISIS CLINICOS-100": null,
        "241966-PAQUETE GERIATRICO II-UNIDAD-ANALISIS CLINICOS-120": null,
        "241967-COAGULACION Y SANGRIA-UNIDAD-ANALISIS CLINICOS-10": null,
        "241968-COPROLOGICO FUNCIONAL-UNIDAD-ANALISIS CLINICOS-35": null,
        "241969-EXAMEN DIRECTO Y GRAM-UNIDAD-ANALISIS CLINICOS-10": null,
        "241970-GLUCOSA POST PRANDIAL-UNIDAD-ANALISIS CLINICOS-15": null,
        "241971-PAQUETE DE LA SALUD I-UNIDAD-ANALISIS CLINICOS-150": null,
        "241972-PAQUETE DE LA SALUD V-UNIDAD-ANALISIS CLINICOS-100": null,
        "241973-PERFIL DE COAGULACION-UNIDAD-ANALISIS CLINICOS-95": null,
        "241974-PERFIL PRE QUIRURGICO-UNIDAD-ANALISIS CLINICOS-90": null,
        "241975-REACCION INFLAMATORIA-UNIDAD-ANALISIS CLINICOS-15": null,
        "241976-RECUENTO DE PLAQUETAS-UNIDAD-ANALISIS CLINICOS-13": null,
        "241977-RETRACCION DE COAGULO-UNIDAD-ANALISIS CLINICOS-10": null,
        "241978-TIEMPO DE COAGULACION-UNIDAD-ANALISIS CLINICOS-7": null,
        "241979-TIEMPO DE PROTROMBINA-UNIDAD-ANALISIS CLINICOS-35": null,
        "241980-PAQUETE NINO SANO III-UNIDAD-ANALISIS CLINICOS-25": null,
        "241981-PAQUETE DE LA SALUD X-UNIDAD-ANALISIS CLINICOS-25": null,
        "241982-PROMOCION ALBIS FARMA-UNIDAD-ANALISIS CLINICOS-0.01": null,
        "241991-BRUCELLA FEN DE ZONA-UNIDAD-ANALISIS CLINICOS-35": null,
        "241992-CITOMEGALOVIRUS IG M-UNIDAD-ANALISIS CLINICOS-40": null,
        "241993-PAQUETE NINO SANO II-UNIDAD-ANALISIS CLINICOS-30": null,
        "241994-PAQUETE GERIATRICO I-UNIDAD-ANALISIS CLINICOS-65": null,
        "241995-PROTEINA C FUNCIONAL-UNIDAD-ANALISIS CLINICOS-81": null,
        "241996-T3 (TRIYODOTIRONINA)-UNIDAD-ANALISIS CLINICOS-35": null,
        "241997-PAQUETE NINO SANO IV-UNIDAD-ANALISIS CLINICOS-30": null,
        "242001-PAQUETE GINECOLOGICO-UNIDAD-ANALISIS CLINICOS-100": null,
        "242012-CREATININA EN ORINA-UNIDAD-ANALISIS CLINICOS-15": null,
        "242013-HIV 1 2 WESTER BLOT-UNIDAD-ANALISIS CLINICOS-221": null,
        "242014-INSULINA 30 MINUTOS-UNIDAD-ANALISIS CLINICOS-48": null,
        "242015-PAQUETE ADULTO SANO-UNIDAD-ANALISIS CLINICOS-20": null,
        "242016-PAQUETE EMPRESARIAL-UNIDAD-ANALISIS CLINICOS-150": null,
        "242017-PAQUETE NINO SANO I-UNIDAD-ANALISIS CLINICOS-70": null,
        "242018-TIROGLOBULINA (TBG)-UNIDAD-ANALISIS CLINICOS-50": null,
        "242019-UREA ORINA 24 HORAS-UNIDAD-ANALISIS CLINICOS-26": null,
        "242020-PAQUETE NINO SANO V-UNIDAD-ANALISIS CLINICOS-50": null,
        "242021-PAQUETE HOMBRE SANO-UNIDAD-ANALISIS CLINICOS-100": null,
        "242041-CA 19 9 (PANCREAS)-UNIDAD-ANALISIS CLINICOS-60": null,
        "242042-CA 72 4 (ESTOMAGO)-UNIDAD-ANALISIS CLINICOS-88": null,
        "242043-FACTOR REUMATOIDEO-UNIDAD-ANALISIS CLINICOS-15": null,
        "242044-FOSFATASA ALCALINA-UNIDAD-ANALISIS CLINICOS-15": null,
        "242045-GLUCOSA BASAL Y PP-UNIDAD-ANALISIS CLINICOS-15": null,
        "242046-HEMOGRAMA COMPLETO-UNIDAD-ANALISIS CLINICOS-15": null,
        "242047-HIV ANTI.172 ELISA-UNIDAD-ANALISIS CLINICOS-200": null,
        "242048-PERFIL FISIOLOGICO-UNIDAD-ANALISIS CLINICOS-80": null,
        "242049-PERFIL REUMATOIDEO-UNIDAD-ANALISIS CLINICOS-95": null,
        "242050-POOL DE PROLACTINA-UNIDAD-ANALISIS CLINICOS-45": null,
        "242051-SEDIMENTO URINARIO-UNIDAD-ANALISIS CLINICOS-17": null,
        "242052-TESTOSTERONA LIBRE-UNIDAD-ANALISIS CLINICOS-40": null,
        "242053-TESTOSTERONA TOTAL-UNIDAD-ANALISIS CLINICOS-35": null,
        "242054-TIEMPO DE TROMBINA-UNIDAD-ANALISIS CLINICOS-42": null,
        "242055-PAQUETE MUJER SANA-UNIDAD-ANALISIS CLINICOS-120": null,
        "242066-CULTIVO DE HONGOS-UNIDAD-ANALISIS CLINICOS-55": null,
        "242067-ELISA RETROVIRUS-UNIDAD-ANALISIS CLINICOS-35": null,
        "242068-HEPATITIS C (VHC)-UNIDAD-ANALISIS CLINICOS-60": null,
        "242069-INMUNOGLOBULINA E-UNIDAD-ANALISIS CLINICOS-50": null,
        "242070-LAMINA PERIFERICA-UNIDAD-ANALISIS CLINICOS-12": null,
        "242071-PCR ULTRASENSIBLE-UNIDAD-ANALISIS CLINICOS-50": null,
        "242072-REACCION DE WIDAL-UNIDAD-ANALISIS CLINICOS-18": null,
        "242073-TIEMPO DE SANGRIA-UNIDAD-ANALISIS CLINICOS-7": null,
        "242074-TSH ULTRASENSIBLE-UNIDAD-ANALISIS CLINICOS-60": null,
        "242075-VDRL CUANTITATIVO-UNIDAD-ANALISIS CLINICOS-15": null,
        "242087-COLESTEROL TOTAL-UNIDAD-ANALISIS CLINICOS-15": null,
        "242088-FERRITINA SERICA-UNIDAD-ANALISIS CLINICOS-40": null,
        "242089-HEPATITIS A IG M-UNIDAD-ANALISIS CLINICOS-65": null,
        "242090-HIV (RAPID TEST)-UNIDAD-ANALISIS CLINICOS-35": null,
        "242091-NITROGENO UREICO-UNIDAD-ANALISIS CLINICOS-26": null,
        "242092-PCR CUANTITATIVO-UNIDAD-ANALISIS CLINICOS-58": null,
        "242093-RPR CUANTITATIVO-UNIDAD-ANALISIS CLINICOS-15": null,
        "242094-HCG CUANTITATIVO-UNIDAD-ANALISIS CLINICOS-35": null,
        "242095-VDRL CUALITATIVO-UNIDAD-ANALISIS CLINICOS-12": null,
        "242096-HEMOGRAMA SIMPLE-UNIDAD-ANALISIS CLINICOS-13": null,
        "242106-ANDROSTENEDIONA-UNIDAD-ANALISIS CLINICOS-50": null,
        "242107-CA 125 (OVARIO)-UNIDAD-ANALISIS CLINICOS-55": null,
        "242108-CITOQUIMICO LCR-UNIDAD-ANALISIS CLINICOS-40": null,
        "242109-COLORACION GRAM-UNIDAD-ANALISIS CLINICOS-9": null,
        "242110-COMPLEMENTO C'3-UNIDAD-ANALISIS CLINICOS-45": null,
        "242111-ESTRADIOL LIBRE-UNIDAD-ANALISIS CLINICOS-68": null,
        "242112-TEST DE GLUCOSA-UNIDAD-ANALISIS CLINICOS-9.4": null,
        "242113-LIPIDOS TOTALES-UNIDAD-ANALISIS CLINICOS-40": null,
        "242114-PERFIL LIPIDICO-UNIDAD-ANALISIS CLINICOS-50": null,
        "242115-PERFIL HEPATICO-UNIDAD-ANALISIS CLINICOS-65": null,
        "242116-PERFIL HORMONAL-UNIDAD-ANALISIS CLINICOS-202.8": null,
        "242117-PERFIL PRENATAL-UNIDAD-ANALISIS CLINICOS-100": null,
        "242118-PERFIL TIROIDEO-UNIDAD-ANALISIS CLINICOS-190": null,
        "242119-PCR CUALITATIVO-UNIDAD-ANALISIS CLINICOS-30": null,
        "242120-PSA TOTAL ELISA-UNIDAD-ANALISIS CLINICOS-40": null,
        "242121-RPR CUALITATIVO-UNIDAD-ANALISIS CLINICOS-15": null,
        "242122-HCG CUALITATIVO-UNIDAD-ANALISIS CLINICOS-26": null,
        "242123-T4 LIBRE INDICE-UNIDAD-ANALISIS CLINICOS-35": null,
        "242124-TOXOPLASMA IG G-UNIDAD-ANALISIS CLINICOS-47": null,
        "242125-TOXOPLASMA IG M-UNIDAD-ANALISIS CLINICOS-42": null,
        "242129-AGLUTINACIONES-UNIDAD-ANALISIS CLINICOS-20": null,
        "242130-ALBUMINA SUERO-UNIDAD-ANALISIS CLINICOS-15": null,
        "242131-COLESTEROL HDL-UNIDAD-ANALISIS CLINICOS-15": null,
        "242132-COLESTEROL LDL-UNIDAD-ANALISIS CLINICOS-15": null,
        "242133-ESPERMACULTIVO-UNIDAD-ANALISIS CLINICOS-45": null,
        "242134-ESPERMATOGRAMA-UNIDAD-ANALISIS CLINICOS-50": null,
        "242135-EXAMEN DIRECTO-UNIDAD-ANALISIS CLINICOS-10": null,
        "242136-GAMMA GLUTAMIL-UNIDAD-ANALISIS CLINICOS-20": null,
        "242137-HERPES II IG G-UNIDAD-ANALISIS CLINICOS-45": null,
        "242138-HERPES II IG M-UNIDAD-ANALISIS CLINICOS-50": null,
        "242139-INSULINA BASAL-UNIDAD-ANALISIS CLINICOS-45": null,
        "242140-PSA ESPECIFICO-UNIDAD-ANALISIS CLINICOS-70": null,
        "242141-TEST DE GRAHAM-UNIDAD-ANALISIS CLINICOS-10": null,
        "242147-CA 549 (MAMA)-UNIDAD-ANALISIS CLINICOS-99": null,
        "242148-CALCIO IONICO-UNIDAD-ANALISIS CLINICOS-40": null,
        "242149-CLAMIDEA IG G-UNIDAD-ANALISIS CLINICOS-80": null,
        "242150-CLAMIDEA IG M-UNIDAD-ANALISIS CLINICOS-50": null,
        "242151-HERPES I IG G-UNIDAD-ANALISIS CLINICOS-50": null,
        "242152-HERPES I IG M-UNIDAD-ANALISIS CLINICOS-50": null,
        "242153-HIERRO SERICO-UNIDAD-ANALISIS CLINICOS-23": null,
        "242154-RETICULOCITOS-UNIDAD-ANALISIS CLINICOS-20": null,
        "242155-TRIGLICERIDOS-UNIDAD-ANALISIS CLINICOS-14.8": null,
        "242159-ACIDO FOLICO-UNIDAD-ANALISIS CLINICOS-40": null,
        "242160-VITAMINA B12-UNIDAD-ANALISIS CLINICOS-45": null,
        "242161-CELULAS L.E.-UNIDAD-ANALISIS CLINICOS-15": null,
        "242162-COPROCULTIVO-UNIDAD-ANALISIS CLINICOS-38": null,
        "242163-HCG EN ORINA-UNIDAD-ANALISIS CLINICOS-26": null,
        "242164-PROGESTERONA-UNIDAD-ANALISIS CLINICOS-42": null,
        "242165-RUBEOLA IG G-UNIDAD-ANALISIS CLINICOS-50": null,
        "242166-RUBEOLA IG M-UNIDAD-ANALISIS CLINICOS-40": null,
        "242169-ACIDO URICO-UNIDAD-ANALISIS CLINICOS-15": null,
        "242170-FIBRINOGENO-UNIDAD-ANALISIS CLINICOS-40": null,
        "242171-GOTA GRUESA-UNIDAD-ANALISIS CLINICOS-15": null,
        "242172-HEMATOCRITO-UNIDAD-ANALISIS CLINICOS-13": null,
        "242173-HEMOCULTIVO-UNIDAD-ANALISIS CLINICOS-65": null,
        "242174-HEMOGLOBINA-UNIDAD-ANALISIS CLINICOS-13": null,
        "242175-HEPATITIS A-UNIDAD-ANALISIS CLINICOS-67.6": null,
        "242176-HEPATITIS B-UNIDAD-ANALISIS CLINICOS-55.3": null,
        "242177-PAPANICOLAU-UNIDAD-ANALISIS CLINICOS-80": null,
        "242180-BK CULTIVO-UNIDAD-ANALISIS CLINICOS-67.5": null,
        "242181-BK DIRECTO-UNIDAD-ANALISIS CLINICOS-25": null,
        "242182-CREATININA-UNIDAD-ANALISIS CLINICOS-15": null,
        "242183-ESTROGENOS-UNIDAD-ANALISIS CLINICOS-45": null,
        "242184-MOCO FECAL-UNIDAD-ANALISIS CLINICOS-15": null,
        "242186-PSA INDICE-UNIDAD-ANALISIS CLINICOS-78": null,
        "242187-UROCULTIVO-UNIDAD-ANALISIS CLINICOS-45": null,
        "242191-ESTRADIOL-UNIDAD-ANALISIS CLINICOS-60": null,
        "242192-FERRITINA-UNIDAD-ANALISIS CLINICOS-40": null,
        "242193-PEPTIDO C-UNIDAD-ANALISIS CLINICOS-120": null,
        "242194-PSA LIBRE-UNIDAD-ANALISIS CLINICOS-40": null,
        "242195-ROTAVIRUS-UNIDAD-ANALISIS CLINICOS-45": null,
        "242196-HIV ELISA-UNIDAD-ANALISIS CLINICOS-32.5": null,
        "242198-ACAROTEST-UNIDAD-ANALISIS CLINICOS-8": null,
        "242199-CORTISOL-UNIDAD-ANALISIS CLINICOS-40": null,
        "242200-DIMERO D-UNIDAD-ANALISIS CLINICOS-45": null,
        "242201-GASTRINA-UNIDAD-ANALISIS CLINICOS-109.6": null,
        "242202-MAGNESIO-UNIDAD-ANALISIS CLINICOS-25": null,
        "242203-T3 LIBRE-UNIDAD-ANALISIS CLINICOS-45": null,
        "242204-T4 LIBRE-UNIDAD-ANALISIS CLINICOS-45": null,
        "242205-THEVENON-UNIDAD-ANALISIS CLINICOS-15": null,
        "242206-AMILASA-UNIDAD-ANALISIS CLINICOS-28": null,
        "242207-FOSFORO-UNIDAD-ANALISIS CLINICOS-25": null,
        "242208-GLUCOSA-UNIDAD-ANALISIS CLINICOS-14.9": null,
        "242209-POTASIO-UNIDAD-ANALISIS CLINICOS-25": null,
        "242210-CALCIO-UNIDAD-ANALISIS CLINICOS-20": null,
        "242211-LIPASA-UNIDAD-ANALISIS CLINICOS-30": null,
        "242212-CLORO-UNIDAD-ANALISIS CLINICOS-20": null,
        "242213-DHEAS-UNIDAD-ANALISIS CLINICOS-45": null,
        "242214-SODIO-UNIDAD-ANALISIS CLINICOS-20": null,
        "242215-UREA-UNIDAD-ANALISIS CLINICOS-15": null,
        "242216-ASO-UNIDAD-ANALISIS CLINICOS-35": null,
        "242217-FSH-UNIDAD-ANALISIS CLINICOS-60": null,
        "242218-TGO-UNIDAD-ANALISIS CLINICOS-15": null,
        "242219-TGP-UNIDAD-ANALISIS CLINICOS-15": null,
        "242220-LH-UNIDAD-ANALISIS CLINICOS-35": null,
      },
      limit: 5, // The max amount of results that can be shown at once. Default: Infinity.
      onAutocomplete: function (val) {
        // Callback function when value is autcompleted.
      },
      minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
    });
  });
}

export function InitTableOrderAnalysis(id) {
  $(".paginate_page").val("Página");
  var table = $("#" + id).DataTable({
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo:
        "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    },
  });
  $("select").material_select();

  document.getElementById(id + "_filter").style.visibility = "hidden";

  // Eliminar Fila
  $("#" + id + " tbody").on("click", "a#rm" + id, function () {
    table.row($(this).parents("tr")).remove().draw();

    let data = table.rows().data();
    if (data.length == 0) {
      $("#finalize").attr("disabled", "disabled");
    }
  });
}

export function registrarOrdenAnalisis() {
  let tableOrderAnalysis = $("#tableOrderAnalysis").DataTable();
  let dataOrderAnalysis = tableOrderAnalysis.rows().data();

  let arrOrderAnalysis = [];

  let totalPrice = 0;

  for (let i = 0; i < dataOrderAnalysis.length; i++) {
    let jsonOrderAnalysis = {
      code: dataOrderAnalysis[i][0],
      analysis: dataOrderAnalysis[i][1],
      um: dataOrderAnalysis[i][2],
      type_analisys: dataOrderAnalysis[i][3],
      price: dataOrderAnalysis[i][4],
    };
    totalPrice = parseInt(totalPrice) + parseInt(dataOrderAnalysis[i][4]);
    arrOrderAnalysis.push(jsonOrderAnalysis);
  }

  localStorage.setItem("orders", JSON.stringify({ data: arrOrderAnalysis }));
  return true;

  let user_call_patient = localStorage.getItem("user_patient_call");
  let doctor = JSON.parse(localStorage.getItem("identity"));

  let doctor_id = doctor.id;
  let patient_id = 0;

  $.ajax({
    type: "GET",
    url: urlBase + "/api/get/user/sinch/" + user_call_patient,
    dataType: "json",
    contentType: "application/json; charset=utf-8",
    success: function (response) {
      patient_id = response.data.user_id;
      patient_card_id = response.data.patient_card_id;
    },
    error: function (error) {
      patient_id = 0;
      console.log(error);
    },
  });

  let arrToJson = [];
  arrOrderAnalysis.forEach((element) => {
    let json = {
      type_analisys: element.typeAnalysis,
      code: element.code,
      analysis: element.analysis,
      um: element.um,
      price: element.price,
    };
    arrToJson.push(json);
  });

  let jsonOrderAnalisys = {
    patient_id: patient_id,
    doctor_id: doctor_id,
    state: "pendiente",
    state_notification: "0",
    data: arrToJson,
  };
  let dataSaveOrderAnalysis = JSON.stringify(jsonOrderAnalisys);

  $.ajax({
    type: "POST",
    url: urlBase + "/api/save/order",
    data: dataSaveOrderAnalysis,
    dataType: "json",
    contentType: "application/json; charset=utf-8",
    success: function (response) {
      console.log("RESPONSE SAVE ORDER ANALYSIS", response);
    },
    error: function (error) {
      console.log("ERROR SAVE ORDER ANALYSIS", error);
    },
  });
}

export function AgregarTableOrderAnalysis(value) {
  $(document).ready(function () {
    $("#finalize").removeAttr("disabled");
    var table = $("#tableOrderAnalysis").DataTable();
    var rowNode = table.row.add(value).draw().node();
  });
}

export function SideNav() {
  $(document).ready(function () {
    $(".button-collapse").sideNav();
  });
}

export function ExitSideNav() {
  console.log("aas");
  $(document).ready(function () {
    $(".button-collapse").sideNav("hide");
  });
}

// VER HISTORIAL DE CONSULTA MEDICA
export function setPrenatalCMHistory(value) {
  $("#prenatales").val(value).prop("selected", true);
  $("select").material_select();
}

export function setPartoCMHistory(value) {
  $("#parto").val(value).prop("selected", true);
  $("select").material_select();
}

export function setInmunizationCMHistory(value) {
  $("#inmunizacion").val(value).prop("selected", true);
  $("select").material_select();
}

export function setHabitoCMHistory(value) {
  $("#habitosNocivos").val(value).prop("selected", true);
  $("select").material_select();
}

export function setTypeInformantCMHistory(value) {
  $("#tipoInformante").val(value).prop("selected", true);
  $("select").material_select();
}

export function setApetitoCMHistory(value) {
  $("#apetito").val(value).prop("selected", true);
  $("select").material_select();
}

export function setSuenoCMHistory(value) {
  $("#sueno").val(value).prop("selected", true);
  $("select").material_select();
}

export function setDeposicionCMHistory(value) {
  $("#deposicion").val(value).prop("selected", true);
  $("select").material_select();
}

export function setSedCMHistory(value) {
  $("#sed").val(value).prop("selected", true);
  $("select").material_select();
}

export function setOrinaCMHistory(value) {
  $("#orina").val(value).prop("selected", true);
  $("select").material_select();
}

export function setEstadoGeneralCMHistory(value) {
  $("#estadoGeneral").val(value).prop("selected", true);
  $("select").material_select();
}
