const urlBase = "https://telemedicina.today";

// =========== DASHBOARD ===========
export function displayARBodyHuman() {
  var container = document.getElementById("container");
  main.init(container);
}
// =========== DASHBOARD END ===========

// =========== NUEVA CONSULTA ===========
export function Wizard() {
  $(".tap-target").tapTarget("open");
}

// =========== NUEVA CONSULTA ===========
// DICTATION VOICE
if (!window.hasOwnProperty("webkitSpeechRecognition")) {
  document.getElementById("microfono").remove(0);
}
var recognition;

export function startDictation() {
  if (window.hasOwnProperty("webkitSpeechRecognition")) {
    recognition = new webkitSpeechRecognition();

    recognition.continuous = false;
    recognition.interimResults = false;

    recognition.lang = "es_ES";
    recognition.start();

    recognition.onresult = function (e) {
      document.getElementById("transcript").value = e.results[0][0].transcript;
      recognition.stop();
    };

    recognition.onerror = function (e) {
      recognition.stop();
    };
  } else {
    alert(2);
  }
}

// INIT COUNT TEXTAREA
export function InitCountTextArea() {
  $(document).ready(function () {
    $("input#input_text, textarea#consultaPaciente").characterCounter();
  });
}

// CONVERTIR A DOM
export function ConverterDOM(html) {
  let sintomas = document
    .getElementById("sintomas")
    .getElementsByTagName("div");
  let sintomasArr = [];
  for (let i = 0; i < sintomas.length; i++) {
    console.log("HTML", sintomas[i].innerText.replace("close", ""));
    sintomasArr.push(sintomas[i].innerText.replace("close", ""));
  }

  return sintomasArr;
}
// INIT CHIP
export function chipAdd() {
  let symptoms = "";
  $(".chips").on("chip.add", function (e, chip) {
    console.log("CHIP AÑADIDO", chip);
    console.log("CHIP ALÑADIDO", (symptoms = symptoms + ", " + chip.tag));
  });

  $(".chips").on("chip.delete", function (e, chip) {
    console.log("Eliminado", chip);
  });
}

export function chipInit(val) {
  $(document).ready(function () {
    $(".chips-placeholder").material_chip({
      placeholder: "Sintomas",
      secondaryPlaceholder: "+Tag",
    });
    $(".chips-autocomplete").material_chip({
      autocompleteOptions: {
        data: val,
        limit: Infinity,
        minLength: 1,
      },
      placeholder: "Sintomas",
    });
    $(".chips").on("chip.select", function (e, chip) {});
  });

  let dataSymptoms = $(".chips-initial").material_chip("data");
}

export function ChipInittialInit(arr) {
  $(document).ready(function () {
    $(".chips-initial").material_chip({
      data: arr,
    });
    var data = $(".chips-initial").material_chip("data");
  });
}

export function MostrarMenu() {
  document.getElementById("content").classList.remove("s11");
  document.getElementById("content").classList.remove("m11");
  document.getElementById("content").classList.add("s10");
  document.getElementById("content").classList.add("m10");
  document.getElementById("navActive").style.display = "block";
  document.getElementById("nav1").style.display = "none";
  document.getElementById("logofarma").style.display = "block";
  document.getElementById("logofarma1").style.display = "none";
  document.getElementById("hamb1").style.display = "block";
  document.getElementById("hamb").style.display = "none";
  document.getElementById("section-content").style.padding = "4% 4% 4% 4%";
}

export function OcultarMenu() {
  document.getElementById("nav1").style.display = "block";
  document.getElementById("navActive").style.display = "none";
  document.getElementById("content").classList.remove("s10");
  document.getElementById("content").classList.remove("m10");
  document.getElementById("content").classList.add("s11");
  document.getElementById("content").classList.add("m11");
  document.getElementById("logofarma").style.display = "none";
  document.getElementById("logofarma1").style.display = "block";
  document.getElementById("hamb1").style.display = "none";
  document.getElementById("hamb").style.display = "block";
  document.getElementById("section-content").style.padding = "4% 4% 4% 0%";
}

export function LoadImage() {}

export function clearImagesInput() {
  document.getElementById("files").value = "";
}

export function dragAndDrop() {
  var drop = $("#files");
  drop
    .on("dragenter", function (e) {
      $(".drop").css({
        border: "4px dashed #09f",
        background: "rgba(0, 153, 255, .05)",
      });
      $(".cont").css({
        color: "#09f",
      });
    })
    .on("dragleave dragend mouseout drop", function (e) {
      $(".drop").css({
        border: "3px dashed #DADFE3",
        background: "transparent",
      });
      $(".cont").css({
        color: "#8E99A5",
      });
    });

  var dropPdf = $("#filesPdf");

  dropPdf
    .on("dragenter", function (e) {
      $(".drop").css({
        border: "4px dashed #09f",
        background: "rgba(0, 153, 255, .05)",
      });
      $(".cont").css({
        color: "#09f",
      });
    })
    .on("dragleave dragend mouseout drop", function (e) {
      $(".drop").css({
        border: "3px dashed #DADFE3",
        background: "transparent",
      });
      $(".cont").css({
        color: "#8E99A5",
      });
    });

  function handleFileSelect(evt) {
    document.getElementById("btnUploadImgLoading").style.display = "block";
    document.getElementById("btnUploadImg").style.display = "none";
    var files = evt.target.files; // FileList object

    console.log("FILES", files.length);
    for (var i = 0, f; (f = files[i]); i++) {
      if (files[i].size <= 8000000) {
      } else {
        alert("Ingresar imagenes menores a 8mb.");
        return;
      }
    }

    let time = 0;
    if (files.length == 1) time = 2000;
    if (files.length == 2) time = 3000;
    if (files.length == 3) time = 4000;

    if (files.length <= 3) {
      // Loop through the FileList and render image files as thumbnails.
      for (var i = 0, f; (f = files[i]); i++) {
        console.log(files[i]);

        // Only process image files.
        if (!f.type.match("image.*")) {
          continue;
        }

        var reader = new FileReader();

        var count = i;
        // Closure to capture the file information.
        reader.onload = (function (theFile) {
          console.log("COUNT", count);
          if (count == 0) {
            let output = document.getElementById("list");
            output.innerHTML = "";
          }

          var span = document.createElement("span");
          span.setAttribute("id", "span" + i);
          let a = `<a onclick="removeImage(${i})" class="btn-floating btn-medium waves-effect waves-light" style="background-color:#9a9898; position: absolute !important;"><i class="material-icons">cancel</i></a>`;

          return function (e) {
            span.innerHTML = [
              `${a}<img class="thumb" width="300em" style="padding-left: 5px; padding-top: 5px; border-radius: 10px" src="`,
              e.target.result,
              '" title="',
              escape(theFile.name),
              '"/>',
            ].join("");
            document.getElementById("list").insertBefore(span, null);
            // Render thumbnail.
            setTimeout(() => {
              document.getElementById("btnUploadImgLoading").style.display =
                "none";
              document.getElementById("btnUploadImg").style.display = "block";
            }, time);
          };
        })(f);

        // Read in the image file as a data URL.
        reader.readAsDataURL(f);
      }
    } else {
      alert("No se permiten mas de 3 imagenes");
    }
  }

  $("#files").change(handleFileSelect);

  $("#filesPdf").change(handleFileSelectPdf);

  function handleFileSelectPdf(evt) {
    document.getElementById("btnUploadPdfLoading").style.display = "block";
    document.getElementById("btnUploadPdf").style.display = "none";

    var files = evt.target.files; // FileList object
    for (var i = 0, f; (f = files[i]); i++) {
      if (files[i].size <= 20000000) {
      } else {
        alert("Ingresar imagenes menores a 20mb.");
        return;
      }
    }
    let time = 0;
    if (files.length == 1) time = 2000;
    if (files.length == 2) time = 3000;
    if (files.length == 3) time = 4000;

    if (files.length <= 3) {
      for (var i = 0, f; (f = files[i]); i++) {
        // Only process image files.
        // if (!f.type.match('application/pdf') && !f.type.match('.docx') && !f.type.match('.doc')) {
        //   continue;
        // }

        var reader = new FileReader();
        let a = `<a onclick="removePdf(${i})" class="btn-floating btn-medium waves-effect waves-light" style="background-color:#9a9898; position: absolute !important;"><i class="material-icons">cancel</i></a>`;

        // Closure to capture the file information.
        var count = i;
        reader.onload = (function (theFile) {
          if (count == 0) {
            let output = document.getElementById("divrow");
            output.innerHTML = "";
          }
          var div = document.createElement("div");
          div.setAttribute("id", "div" + i);
          div.setAttribute("class", "fileupload col s4");
          return function (e) {
            // Render thumbnail.

            div.innerHTML = [
              `${a} <i class="large material-icons" style="color:#9ba6ae">insert_drive_file</i><p style="margin-top: 0px">`,
              theFile.name,
              "</p>",
            ].join("");

            document.getElementById("divrow").insertBefore(div, null);
            setTimeout(function () {
              document.getElementById("navActive").style.height = "0px";
              document.getElementById("navNoActive").style.height = "0px";
              document.getElementById("navActive").style.height =
                Number($(document).height()) - 120 + "px";
              document.getElementById("navNoActive").style.height =
                Number($(document).height()) - 120 + "px";

              document.getElementById("nueva-consulta").style.height =
                Number($(document).height()) - 130 + "px";
            }, 100);

            setTimeout(() => {
              document.getElementById("btnUploadPdfLoading").style.display =
                "none";
              document.getElementById("btnUploadPdf").style.display = "block";
            }, time);
          };
        })(f);

        // Read in the image file as a data URL.
        reader.readAsDataURL(f);
      }
    } else {
      alert("No se permite mas de 3 Archivos");
    }
    // Loop through the FileList and render image files as thumbnails.
  }
}

// INIT CHIP END
// =========== NUEVA CONSULTA END ===========

// =========== CONSULTA MEDICA ===========
export function InitModal() {
  $(document).ready(function () {
    $(".modal").modal();
  });
}

// OPEN WINDOW
export function checkPayment() {
  // let card_id = localStorage.getItem('creditcard_id')
  // let patient = JSON.parse(localStorage.getItem('identity'))
  // let json = {
  //   card_id: card_id,
  //   patient_id: patient.id,
  // }
  // let data = JSON.stringify(json)

  // $.ajax({
  //   type: 'POST',
  //   url: urlBase + '/api/culqi/create/charge',
  //   data: data,
  //   dataType: 'json',
  //   contentType: 'application/json',
  //   success: function (response) {
  //     if (response.object == 'error') {
  //       alert(`ERROR: ${response.merchant_message}`)
  //       document.getElementById('loaderVideoCall').style.display = 'none'
  //       document.getElementById('wordVideoCall').style.display = 'block'

  //       let doctor = JSON.parse(localStorage.getItem('doctor'))
  //       let jsonUpdateStatus = {
  //         status: 1,
  //         doctor_id: doctor.id,
  //       }

  //       let dataUpdateStatus = JSON.stringify(jsonUpdateStatus)

  //       $.ajax({
  //         type: 'POST',
  //         url: urlBase + '/api/update/status',
  //         data: dataUpdateStatus,
  //         dataType: 'json',
  //         contentType: 'application/json',
  //         success: function (response) {},
  //         error: function (error) {
  //           console.log(error)
  //         },
  //       })
  //     } else {
  // let doctor = JSON.parse(localStorage.getItem('doctor'));
  // let patient_user_sinch = (JSON.parse(localStorage.getItem('identity'))).user_sinch
  // let jsonNotification = {
  //   user_id: doctor.id,
  //   title: "LLamada entrante",
  //   body: patient_user_sinch,
  //   data: patient_user_sinch
  // }

  // let jsonNotificationStr = JSON.stringify(jsonNotification)
  document.getElementById("loaderVideoCall").style.display = "none";
  document.getElementById("wordVideoCall").style.display = "block";

  console.log("levantamos confirmation call");
  $("#confirmationCall").modal({
    dismissible: false,
    opacity: 0.5,
  });

  $("#confirmationCall").modal("open");
  /*$.ajax({
          type: 'POST',
          url: urlBase + '/api/send/notification/incoming/call',
          data: jsonNotificationStr,
          dataType: 'json',
          contentType: 'application/json',
          success: function(response) {
            console.log("RESPONSESSSSw3232",response)
            document.getElementById('loaderVideoCall').style.display = 'none';
            document.getElementById('wordVideoCall').style.display = 'block';
    
            $('#confirmationCall').modal({
                dismissible: false, 
                opacity: .5, 
              }
            );
    
            $('#confirmationCall').modal('open');
          },
          error: function(error) {
            console.log(error);

          }
        });*/

  // },
  // error: function (error) {
  //   console.log(error)
  // },
  //})
}

export function enviarNotificacionLlamadaEntrante() {
  let doctor = JSON.parse(localStorage.getItem("doctor"));

  let patient_user_sinch = JSON.parse(localStorage.getItem("identity"))
    .user_sinch;

  let jsonNotification = {
    user_id: doctor.id,
    title: "LLamada entrante",
    body: patient_user_sinch,
    data: patient_user_sinch,
  };

  let jsonNotificationStr = JSON.stringify(jsonNotification);

  $.ajax({
    type: "POST",
    url: urlBase + "/api/send/notification/incoming/call",
    data: jsonNotificationStr,
    dataType: "json",
    contentType: "application/json",
    success: function (response) {
      console.log("se termino de enviar la notificacion");
      document.getElementById("loaderVideoCall").style.display = "none";
      document.getElementById("wordVideoCall").style.display = "block";

      // $('#confirmationCall').modal({
      //     dismissible: false,
      //     opacity: .5,
      //   }
      // );

      // $('#confirmationCall').modal('open');
    },
    error: function (error) {
      console.log(error);
    },
  });
}
export function checkPaymentAffiliate() {
  document.getElementById("loaderVideoCall").style.display = "none";
  document.getElementById("wordVideoCall").style.display = "block";

  $("#confirmationCall").modal({
    dismissible: false,
    opacity: 0.5,
  });

  $("#confirmationCall").modal("open");
}

export function checkPaymentOrderAnalysis() {
  let card_id = localStorage.getItem("creditcard_id");
  let json = {
    card_id: card_id,
  };
  let data = JSON.stringify(json);

  $.ajax({
    type: "POST",
    url: urlBase + "/api/culqi/create/charge",
    data: data,
    dataType: "json",
    contentType: "application/json",
    success: function (response) {
      if (response.object == "error") {
        alert(`ERROR: ${response.merchant_message}`);
        document.getElementById("loaderVideoCall").style.display = "none";
        document.getElementById("wordVideoCall").style.display = "block";
      } else {
        document.getElementById("loaderVideoCall").style.display = "none";
        document.getElementById("wordVideoCall").style.display = "block";

        console.log("RESPONSE CARGO", response);
      }
    },
    error: function (error) {
      console.log(error);
    },
  });
}

export function openVideoCall() {
  let doctor = JSON.parse(localStorage.getItem("doctor"));
  let patient = JSON.parse(localStorage.getItem("identity"));

  var h = screen.height;
  var w = screen.width;

  let popup = window.open(
    `https://telemedicinasocket.herokuapp.com/?from=${patient.user_sinch}&to=${doctor.user_sinch}`,
    "Videollama Alo Doctor",
    "toolbar=no ,location=0, status=no,titlebar=no,menubar=no,width=" +
      w +
      ",height=" +
      h
  );

  let openDate = new Date();
  let todayOpenDate = openDate.getTime();

  var popupTick = setInterval(function () {
    if (popup.closed) {
      let closeDate = new Date();
      let todaycloseDate = closeDate.getTime();

      var dif = todayOpenDate - todaycloseDate;

      var Seconds_from_T1_to_T2 = dif / 1000;
      var Seconds_Between_Dates = Math.abs(Seconds_from_T1_to_T2);

      // Guardar nueva consulta
      let doctor = JSON.parse(localStorage.getItem("doctor"));
      let patient = JSON.parse(localStorage.getItem("identity"));

      let symtomQuery = localStorage.getItem("symtomQuery");
      let messageQuery = localStorage.getItem("messageQuery");
      let symptomKeyQuery = localStorage.getItem("symptomKeyQuery");

      var today = new Date();
      var dd = today.getDate();
      var mm = today.getMonth() + 1;
      var yyyy = today.getFullYear();

      if (dd < 10) {
        dd = "0" + dd;
      }

      if (mm < 10) {
        mm = "0" + mm;
      }

      let now = yyyy + "/" + mm + "/" + dd;
      let query;

      console.log("SYMPTOM", symtomQuery);
      console.log("SYMPTOM KEY", symptomKeyQuery);
      console.log("MESSAGE", messageQuery);

      $.ajax({
        type: "GET",
        url: urlBase + "/api/get/call/state/" + patient.id.toString(),
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        success: function (response) {
          if (response.code == 200) {
            if (response.data.call_state == 1) {
              query = {
                doctor_id: doctor.id.toString(),
                patient_id: patient.id.toString(),
                date: now,
                price: 5,
                duration: Seconds_Between_Dates,
                state: 1,
                symptom: symtomQuery,
                symptom_keys: symptomKeyQuery,
                message: messageQuery,
                mode: "web",
                symptom_images: response.data.temp_imageSymptomBase64,
                documents: response.data.temp_documents_base64,
              };
            } else {
              query = {
                doctor_id: doctor.id.toString(),
                patient_id: patient.id.toString(),
                date: now,
                price: 5,
                duration: Seconds_Between_Dates,
                state: 0,
                symptom: symtomQuery,
                symptom_keys: symptomKeyQuery,
                message: messageQuery,
                mode: "web",
              };
            }

            let data = JSON.stringify(query);
            $.ajax({
              type: "POST",
              url: urlBase + "/api/queries",
              data: data,
              dataType: "json",
              contentType: "application/json; charset=utf-8",
              success: function (responseQuery) {
                localStorage.setItem("query_id", responseQuery.data.id);

                let dataSet = {
                  user_id: patient.id,
                  call_state: 0,
                };

                let dataService = JSON.stringify(dataSet);

                $.ajax({
                  type: "POST",
                  url: urlBase + "/api/set/call/state",
                  data: dataService,
                  dataType: "json",
                  contentType: "application/json; charset=utf-8",
                  success: function (responseState) {
                    clearInterval(popupTick);
                    window.location.href =
                      urlBase + "/web/paciente/calificacion";
                  },
                  error: function (error) {
                    console.log(error);
                    clearInterval(popupTick);
                  },
                });
                clearInterval(popupTick);
              },
              error: function (error) {
                console.log(error);
                clearInterval(popupTick);
              },
            });
            clearInterval(popupTick);
          }
        },
        error: function (error) {
          console.log(error);
        },
      });
    }
  }, 500);
}

export function selectedCard() {
  $("#select_card").on("change", function () {
    $("#isCardSelected").hide();
    localStorage.setItem("creditcard_id", this.value);
  });
}

export function loadVideoCall() {
  document.getElementById("loaderVideoCall").style.display = "block";
  document.getElementById("wordVideoCall").style.display = "none";
}

export function dontLoadVideoCall() {
  document.getElementById("loaderVideoCall").style.display = "none";
  document.getElementById("wordVideoCall").style.display = "block";
}
// INIT VIDEOCHAT
export function InitViews() {
  document.getElementById("videochat").style.display = "block";
  document.getElementById("principal").style.display = "none";
}

export function initDropdown() {
  $(".dropdown-trigger").dropdown();
}

export function activateMic() {
  document.getElementById("voice-icon-d").style.display = "none";
  document.getElementById("voice-icon").style.display = "inline";
}
export function desactivateMic() {
  document.getElementById("voice-icon").style.display = "none";
  document.getElementById("voice-icon-d").style.display = "inline";
}
export function activateCam() {
  document.getElementById("video-icon-d").style.display = "none";
  document.getElementById("video-icon").style.display = "inline";
}
export function desactivateCam() {
  document.getElementById("video-icon").style.display = "none";
  document.getElementById("video-icon-d").style.display = "inline";
}

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

export function setDoctor(doctor) {
  console.log("DOCTOR", doctor);
  $(document).ready(function () {
    let doctorName = "Doctor " + doctor.name + " " + doctor.last_name;
    $("#imgDoctor").attr("src", doctor.img);
    $("#estadoLlamada").text(doctorName);
    $("#especialityDoctor").text(doctor.specialty);
    $("#frequencyDoctor").text("(" + doctor.frequency + ")");
  });
}
// INABILITAR TARJETA COMBO
export function DisableCard(value) {
  // $("select option:contains('Value b')").attr("disabled","disabled");
  $("select option[value='" + value + "']").attr("disabled", true);
  // $("#select_card option[value='" + value + "']").attr("disabled", true);
  console.log("TARJETA DESABILITADA");
}

// OBTENER TARJETA SELECCIONADA

// OBTENER TARJETA SELECCIONADA END

// RECOMENDAR OTRO MEDICO
export function RecomendDoctor() {
  document.getElementById("doctor1").style.display = "none";
  document.getElementById("doctor2").style.display = "block";
}

export function MakeVideoCall() {
  $("#modalCallVideo").modal();
}

export function ModalFinishCall() {
  $("#modalFinishCall").modal();
}

export function ModalMessage() {
  $("#modalMessage").modal();
  document.getElementById("modalMessage").style.left = "inherit";
}
// RECOMENDAR OTRO MEDICO END

export function EnviarMensaje(message) {
  let html = message.trim();
  let list_chat = document.getElementById("list-chat");
  list_chat.innerHTML = list_chat.innerHTML + html;
  document.getElementById("messageChat").value = "";
}
// =========== CONSULTA MEDICA END ===========

// =========== CALIFICATION  ===========

// CALIFICATE
export function CalificateFocus(val) {
  if (val == "star1") {
    document.getElementById("star1").style.color = "#f1c420";
    document.getElementById("star2").style.color = "#d6d6cd";
    document.getElementById("star3").style.color = "#d6d6cd";
    document.getElementById("star4").style.color = "#d6d6cd";
    document.getElementById("star5").style.color = "#d6d6cd";
  } else if (val == "star2") {
    document.getElementById("star1").style.color = "#f1c420";
    document.getElementById("star2").style.color = "#f1c420";
    document.getElementById("star3").style.color = "#d6d6cd";
    document.getElementById("star4").style.color = "#d6d6cd";
    document.getElementById("star5").style.color = "#d6d6cd";
  } else if (val == "star3") {
    document.getElementById("star1").style.color = "#f1c420";
    document.getElementById("star2").style.color = "#f1c420";
    document.getElementById("star3").style.color = "#f1c420";
    document.getElementById("star4").style.color = "#d6d6cd";
    document.getElementById("star5").style.color = "#d6d6cd";
  } else if (val == "star4") {
    document.getElementById("star1").style.color = "#f1c420";
    document.getElementById("star2").style.color = "#f1c420";
    document.getElementById("star3").style.color = "#f1c420";
    document.getElementById("star4").style.color = "#f1c420";
    document.getElementById("star5").style.color = "#d6d6cd";
  } else {
    document.getElementById("star1").style.color = "#f1c420";
    document.getElementById("star2").style.color = "#f1c420";
    document.getElementById("star3").style.color = "#f1c420";
    document.getElementById("star4").style.color = "#f1c420";
    document.getElementById("star5").style.color = "#f1c420";
  }
}
export function CalificateNoFocus() {
  // alert(document.getElementById("star1"))
  document.getElementById("star1").style.color = "#d6d6cd";
  document.getElementById("star2").style.color = "#d6d6cd";
  document.getElementById("star3").style.color = "#d6d6cd";
  document.getElementById("star4").style.color = "#d6d6cd";
  document.getElementById("star5").style.color = "#d6d6cd";
}

export function Calificate(val) {
  if (val == "star1") {
    document.getElementById("star1").style.color = "#f1c420";
    document.getElementById("star2").style.color = "#d6d6cd";
    document.getElementById("star3").style.color = "#d6d6cd";
    document.getElementById("star4").style.color = "#d6d6cd";
    document.getElementById("star5").style.color = "#d6d6cd";
  } else if (val == "star2") {
    document.getElementById("star1").style.color = "#f1c420";
    document.getElementById("star2").style.color = "#f1c420";
    document.getElementById("star3").style.color = "#d6d6cd";
    document.getElementById("star4").style.color = "#d6d6cd";
    document.getElementById("star5").style.color = "#d6d6cd";
  } else if (val == "star3") {
    document.getElementById("star1").style.color = "#f1c420";
    document.getElementById("star2").style.color = "#f1c420";
    document.getElementById("star3").style.color = "#f1c420";
    document.getElementById("star4").style.color = "#d6d6cd";
    document.getElementById("star5").style.color = "#d6d6cd";
  } else if (val == "star4") {
    document.getElementById("star1").style.color = "#f1c420";
    document.getElementById("star2").style.color = "#f1c420";
    document.getElementById("star3").style.color = "#f1c420";
    document.getElementById("star4").style.color = "#f1c420";
    document.getElementById("star5").style.color = "#d6d6cd";
  } else {
    document.getElementById("star1").style.color = "#f1c420";
    document.getElementById("star2").style.color = "#f1c420";
    document.getElementById("star3").style.color = "#f1c420";
    document.getElementById("star4").style.color = "#f1c420";
    document.getElementById("star5").style.color = "#f1c420";
  }
}
// =========== CALIFICATION END ===========

// =========== HISTORIAL MEDICO ===========

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

// =========== HISTORIAL MEDICO END ===========

// =========== TABLE ANALISIS ===========
export function NotificationNuevoAnalisis(user) {
  Push.create("Nueva Analisis médico", {
    body: `${user.name} ${user.last_name}`,
    icon: urlBase + "/web/paciente/dist/assets/images/farmacias-logo.png",
    timeout: 40000,
    onClick: function () {
      window.location = urlBase + "/web/paciente/dist/analisis-medico";
      this.close();
    },
  });
}

export function HideDatatableOrders() {
  document.getElementById("dataOrders").style.display = "none";
}

export function ShowDatatableOrders() {
  document.getElementById("dataOrders").style.display = "block";
}

export function HideDatatableAnalysis() {
  document.getElementById("dataAnalysis").style.display = "none";
}

export function ShowDatatableAnalysis() {
  document.getElementById("dataAnalysis").style.display = "block";
}

export function HideDatatableAnalysisFamiliar() {
  document.getElementById("dataAnalysisFamiliar").style.display = "none";
}

export function ShowDatatableAnalysisFamiliar() {
  document.getElementById("dataAnalysisFamiliar").style.display = "block";
}

export function LoadTableAdmFamiliar(dataTable) {
  $(".paginate_page").val("Página");
  var table = $("#tableAdmFamiliar").DataTable({
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
  $("#tableAdmFamiliar tbody").on("click", "a#selectRow", function () {
    document.getElementById("loaderPatientDetail").style.display = "block";
    document.getElementById("contentPatientDetails").style.display = "none";

    let row = table.row($(this).parents("tr")).data();
    console.log("ROW SELECTED", row);

    $.ajax({
      type: "GET",
      url: urlBase + "/api/get/family/member/" + row[0],
      dataType: "json",
      contentType: "application/json; charset=utf-8",
      success: function (response) {
        document.getElementById("loaderPatientDetail").style.display = "none";
        document.getElementById("contentPatientDetails").style.display =
          "block";

        $("#name").text(response.data.name);
        $("#type_document").text(response.data.type_document);
        $("#numdoc").text(response.data.document_number);
        $("#parentezco").text(response.data.relationship);
        $("#nro_calls").text(response.data.total_calls);
        $("#last_query").text(response.data.last_query);
      },
      error: function (error) {
        console.log(error);
      },
    });
  });
}

export function HideDatatableAdmFamiliar() {
  document.getElementById("dataAdmFamiliar").style.display = "none";
}

export function ShowDatatableAdmFamiliar() {
  document.getElementById("dataAdmFamiliar").style.display = "block";
}

export function LoadTableAnalisis(dataTable) {
  $(".paginate_page").val("Página");
  var table = $("#tableAnalisis").DataTable({
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
  $("#tableAnalisis tbody").on("click", "a#selectTableAnalisis", function () {
    let row = table.row($(this).parents("tr")).data();

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

export function LoadTableAnalisisFamiliar(dataTable) {
  $(".paginate_page").val("Página");
  var table = $("#tableAnalisisFamiliar").DataTable({
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
  $("#tableAnalisisFamiliar tbody").on(
    "click",
    "a#selectTableAnalisis",
    function () {
      let row = table.row($(this).parents("tr")).data();

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
    }
  );
}

// =========== TABLE ANALISIS END ===========

// =========== TABLE RECETA ===========
export function HideDatatableReceta() {
  document.getElementById("dataReceta").style.display = "none";
}

export function ShowDatatableReceta() {
  document.getElementById("dataReceta").style.display = "block";
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

    let url =
      urlBase +
      "/api/get/medicaments/treatment/" +
      table.row($(this).parents("tr")).data()[0];
    $.ajax({
      type: "GET",
      url: url,
      dataType: "json",
      contentType: "application/json; charset=utf-8",
      success: function (response) {
        localStorage.setItem("recetaToOpen", response.data.receta_medica);

        $("#nombreUsuario").text(response.data.patient.name);
        $("#nameDoctor").text(response.data.doctor.name);
        $("#cmpDoctor").text(response.data.doctor.cmp);
        $("#especialidadDoctor").text(response.data.doctor.specialty);
        $("#dateAtention").text(response.data.patient.date);
        $("#edadPaciente").text(response.data.patient.years_old);
        $("#validated").text(response.data.patient.validity);
        let json = "";
        let index = 0;
        $("#tratamiento").text(``);
        for (let medicament of response.data.treatment) {
          console.log("MEDICAMENTO", medicament);
          json += `{"sku":"${medicament.sku}","qty":"${medicament.quantity}","um":"${medicament.um}"},`;
          $("#tratamiento").append(
            `<tr>
              <td>${medicament.medicament} </td>
              <td>${medicament.quantity}.</td> 
              <td>${medicament.um}.</td>               
            </tr>`
          );
          index++;
        }

        index = 0;
        $("#indicaciones").text(``);
        for (let indication of response.data.indications) {
          $("#indicaciones").append(
            `<tr>
              <td>${indication.medicament} </td>
              <td>${indication.way_administration}.</td> 
              <td>${indication.frequency}.</td>               
              <td>${indication.duration}.</td>               
            </tr>`
          );
          index++;
        }

        index = 0;
        $("#diagnostico").text(``);
        for (let diagnostic of response.data.diagnostics) {
          $("#diagnostico").append(
            `<li>
              <b>${diagnostic.code} </b>
              <label>${diagnostic.description}.</label> </br>
            </li>`
          );
          index++;
        }

        let url =
          "https://www.devmf.com/alodoctor/?data=" +
          window.btoa(`[${json.substring(0, json.length - 1)}]`);
        localStorage.setItem(
          "path_url_order",
          "https://www.devmf.com/alodoctor/?data=" +
            window.btoa(`[${json.substring(0, json.length - 1)}]`)
        );
        console.log("uer", url);
        update_qrcode(url);
      },
      error: function (error) {
        console.log(error);
      },
    });
  });
}

export function LoadTableOrders(dataTable) {
  $(".paginate_page").val("Página");
  var table = $("#tableOrdersAnalysis").DataTable({
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

  $("#tableOrdersAnalysis tbody").on(
    "click",
    "a#selectTableReceta",
    function () {
      localStorage.setItem(
        "treatment_id",
        table.row($(this).parents("tr")).data()[0]
      );

      let url =
        urlBase +
        "/api/get/medicaments/treatment/" +
        table.row($(this).parents("tr")).data()[0];
      $.ajax({
        type: "GET",
        url: url,
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        success: function (response) {
          localStorage.setItem("recetaToOpen", response.data.receta_medica);

          $("#nombreUsuario").text(response.data.patient.name);
          $("#nameDoctor").text(response.data.doctor.name);
          $("#cmpDoctor").text(response.data.doctor.cmp);
          $("#especialidadDoctor").text(response.data.doctor.specialty);
          $("#dateAtention").text(response.data.patient.date);
          $("#edadPaciente").text(response.data.patient.years_old);
          $("#validated").text(response.data.patient.validity);
          let json = "";
          let index = 0;
          $("#tratamiento").text(``);
          for (let medicament of response.data.treatment) {
            console.log("MEDICAMENTO", medicament);
            json += `{"sku":"${medicament.sku}","qty":"${medicament.quantity}","um":"${medicament.um}"},`;
            $("#tratamiento").append(
              `<tr>
              <td>${medicament.medicament} </td>
              <td>${medicament.quantity}.</td> 
              <td>${medicament.um}.</td>               
            </tr>`
            );
            index++;
          }

          index = 0;
          $("#indicaciones").text(``);
          for (let indication of response.data.indications) {
            $("#indicaciones").append(
              `<tr>
              <td>${indication.medicament} </td>
              <td>${indication.way_administration}.</td> 
              <td>${indication.frequency}.</td>               
              <td>${indication.duration}.</td>               
            </tr>`
            );
            index++;
          }

          index = 0;
          $("#diagnostico").text(``);
          for (let diagnostic of response.data.diagnostics) {
            $("#diagnostico").append(
              `<li>
              <b>${diagnostic.code} </b>
              <label>${diagnostic.description}.</label> </br>
            </li>`
            );
            index++;
          }

          let url =
            "https://www.devmf.com/alodoctor/?data=" +
            window.btoa(`[${json.substring(0, json.length - 1)}]`);
          localStorage.setItem(
            "path_url_order",
            "https://www.devmf.com/alodoctor/?data=" +
              window.btoa(`[${json.substring(0, json.length - 1)}]`)
          );
          console.log("uer", url);
          update_qrcode(url);
        },
        error: function (error) {
          console.log(error);
        },
      });
    }
  );
}

export function SelectRowRecipe() {}

export function CheckPushRecipe(nameuser) {
  Push.create("Nueva Receta médica", {
    body: `Paciente ${nameuser.name} ${nameuser.last_name}`,
    icon: urlBase + "/web/paciente/dist/assets/images/farmacias-logo.png",
    timeout: 40000,
    onClick: function () {
      window.location = urlBase + "/web/paciente/dist/receta";
      this.close();
    },
  });
}
// =========== TABLE RECETA END ===========

// ========== MI MONEDERO ===========
export function LoadTableMonedas(dataTable) {
  $(".paginate_page").val("Página");
  var table = $("#tableMonedas").DataTable({
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
  $(document).ready(function () {
    document.getElementById("tableMonedas_filter").style.display = "none";
    document.getElementById("tableMonedas_info").style.display = "none";
    document.getElementById("tableMonedas_length").style.display = "none";
    document.getElementById("tableMonedas_paginate").style.display = "none";
  });
}

export function CleanSwipe() {
  localStorage.setItem("swipe", "test-swipe-2");
}

export function ModalAddCreditCard() {
  $("#modalAddCreditCard").modal();
}
// ========== MI MONEDERO END===========

// ========== GENERAL ===========

// INIT TABS
export function InitTabs() {
  $("ul.tabs").tabs();
}
// INIT TABS END

// INIT COLLAPSIBLE
export function InitCollapsible() {
  $(".collapsible").collapsible();
}
// INIT COLLAPSIBLE END

// INIT SELECT
export function InitSelect() {
  $(document).ready(function () {
    $("select").material_select();
  });
}

export function InitMaterialBox() {
  $(document).ready(function () {
    $(".materialboxed").materialbox();
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

// INIT SELECT END

// INIT DATEPICKER
export function Datepicker() {
  $(".datepicker").pickadate({
    firstDay: true,
  });
}
// INIT DATEPICKER END

// ========== GENERAL END ==========

// ============ ADD CREDIT CARD ============
// SET USER EMAIL
export function setUserEmail() {
  let user = JSON.parse(localStorage.getItem("identity"));
  console.log("EMAIL", document.getElementById("card[email]"));
  document.getElementById("card[email]").value = user.email;
}

export function hideBadgeEmptyCards() {
  document.getElementById("badgeEmptyCards").style.display = "none";
}

export function showBadgeEmptyCards() {
  document.getElementById("badgeEmptyCards").style.display = "block";
}

export function hideBadgeIsAffiliated() {
  document.getElementById("badge-is-affiliated").style.display = "none";
}

export function showBadgeIsAffiliated() {
  document.getElementById("badge-is-affiliated").style.display = "block";
}

// CREDIT CARD FIELD VALIDATION
export function CardValidation() {
  let card = document.getElementById("card[number]");
  card.addEventListener("keyup", function () {
    // comprobamos que no es un characterCounter
    if (
      (this.value.slice(-1).charCodeAt() < 48 ||
        this.value.slice(-1).charCodeAt() > 57) &&
      this.value.slice(-1).charCodeAt() != NaN
    ) {
      card.value = this.value.substr(0, this.value.length - 1);
    } else {
    }
  });

  let cvv = document.getElementById("card[cvv]");
  cvv.addEventListener("keyup", function () {
    // comprobamos que no es un characterCounter
    if (
      (this.value.slice(-1).charCodeAt() < 48 ||
        this.value.slice(-1).charCodeAt() > 57) &&
      this.value.slice(-1).charCodeAt() != NaN
    ) {
      cvv.value = this.value.substr(0, this.value.length - 1);
    } else {
      if (this.value.length > 4) {
        cvv.value = this.value.substr(0, this.value.length - 1);
      }
    }
  });

  let month = document.getElementById("card[exp_month]");
  month.addEventListener("keyup", function () {
    // comprobamos que no es un characterCounter
    if (
      (this.value.slice(-1).charCodeAt() < 48 ||
        this.value.slice(-1).charCodeAt() > 57) &&
      this.value.slice(-1).charCodeAt() != NaN
    ) {
      month.value = this.value.substr(0, this.value.length - 1);
    } else {
      if (this.value.length > 2) {
        month.value = this.value.substr(0, this.value.length - 1);
      }
    }
  });

  let year = document.getElementById("card[exp_year]");
  year.addEventListener("keyup", function () {
    // comprobamos que no es un characterCounter
    if (
      (this.value.slice(-1).charCodeAt() < 48 ||
        this.value.slice(-1).charCodeAt() > 57) &&
      this.value.slice(-1).charCodeAt() != NaN
    ) {
      year.value = this.value.substr(0, this.value.length - 1);
    } else {
      if (this.value.length > 4) {
        year.value = this.value.substr(0, this.value.length - 1);
      }
    }
  });
}

// FECHA DE EXPIRACION FIEL VALIDATION END

// VOLVER A LISTA DE CREDIT CARD
export function VolverListCC() {
  localStorage.setItem("swipe", "test-swipe-3");
}
// VOLVER A LISTA DE CREDIT CARD END
// ============ ADD CREDIT CARD END ============

// ========== AYUDA ===========
export function RespuestaUtil() {
  Materialize.toast("La respuesta fue útil", 2000, "rounded");
}
export function RespuestaNoUtil() {
  Materialize.toast("La respuesta no fue útil", 2000, "rounded");
}

export function PreguntasCategoria(valor) {
  if (valor == "frecuentes") {
    document.getElementById("PreguntasCategoriaFrecuentes").style.display =
      "block";
    document.getElementById("PreguntasCategoriaConsultas").style.display =
      "none";
    document.getElementById("PreguntasCategoriaHistorial").style.display =
      "none";
    document.getElementById("PreguntasCategoriaRecetas").style.display = "none";
    document.getElementById("PreguntasCategoriaMimonedero").style.display =
      "none";
  } else if (valor == "consultas") {
    document.getElementById("PreguntasCategoriaFrecuentes").style.display =
      "none";
    document.getElementById("PreguntasCategoriaConsultas").style.display =
      "block";
    document.getElementById("PreguntasCategoriaHistorial").style.display =
      "none";
    document.getElementById("PreguntasCategoriaRecetas").style.display = "none";
    document.getElementById("PreguntasCategoriaMimonedero").style.display =
      "none";
  } else if (valor == "historial") {
    document.getElementById("PreguntasCategoriaFrecuentes").style.display =
      "none";
    document.getElementById("PreguntasCategoriaConsultas").style.display =
      "none";
    document.getElementById("PreguntasCategoriaHistorial").style.display =
      "block";
    document.getElementById("PreguntasCategoriaRecetas").style.display = "none";
    document.getElementById("PreguntasCategoriaMimonedero").style.display =
      "none";
  } else if (valor == "recetas") {
    document.getElementById("PreguntasCategoriaFrecuentes").style.display =
      "none";
    document.getElementById("PreguntasCategoriaConsultas").style.display =
      "none";
    document.getElementById("PreguntasCategoriaHistorial").style.display =
      "none";
    document.getElementById("PreguntasCategoriaRecetas").style.display =
      "block";
    document.getElementById("PreguntasCategoriaMimonedero").style.display =
      "none";
  } else {
    document.getElementById("PreguntasCategoriaFrecuentes").style.display =
      "none";
    document.getElementById("PreguntasCategoriaConsultas").style.display =
      "none";
    document.getElementById("PreguntasCategoriaHistorial").style.display =
      "none";
    document.getElementById("PreguntasCategoriaRecetas").style.display = "none";
    document.getElementById("PreguntasCategoriaMimonedero").style.display =
      "block";
  }
}
// ========== AYUDA END ===========

// ========= PROFILE

export function ShowUpgradeImage() {
  document.getElementById("inputImagen").style.display = "block";
  document.getElementById("extensionImagen").style.display = "block";
  document.getElementById("sizeImagen").style.display = "block";
}

export function HideUpgradeImage() {
  document.getElementById("inputImagen").style.display = "none";
  document.getElementById("extensionImagen").style.display = "none";
  document.getElementById("sizeImagen").style.display = "none";
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

// MI PERFIL
export function Editar() {
  document.getElementById("name").disabled = false;
  document.getElementById("last_name").disabled = false;
  document.getElementById("dni").disabled = false;
  document.getElementById("address").disabled = false;
  document.getElementById("tel").disabled = false;
  document.getElementById("birth_date").disabled = false;
  document.getElementById("generoActivated").disabled = false;
  document.getElementById("image").disabled = false;

  document.getElementById("activate-genero").style.display = "none";
  document.getElementById("desactivate-genero").style.display = "block";
  document.getElementById("activate-type-document").style.display = "none";
  document.getElementById("desactivate-type-document").style.display = "block";
  document.getElementById("editar").style.display = "none";
  document.getElementById("guardar").style.display = "block";
}

export function Guardar() {
  document.getElementById("name").disabled = true;
  document.getElementById("last_name").disabled = true;
  document.getElementById("dni").disabled = true;
  document.getElementById("address").disabled = true;
  document.getElementById("tel").disabled = true;
  document.getElementById("birth_date").disabled = true;
  document.getElementById("image").disabled = true;

  document.getElementById("activate-genero").style.display = "block";
  document.getElementById("desactivate-genero").style.display = "none";
  document.getElementById("activate-type-document").style.display = "block";
  document.getElementById("desactivate-type-document").style.display = "none";
  document.getElementById("editar").style.display = "block";
  document.getElementById("guardar").style.display = "none";
}

export function UpdateAccount() {
  $("#updateAccount").modal();
}

export function UpdatePassword() {
  $("#updatePassword").modal();
}
// MI PERFIL END
// ========== PROFILE END

// TIMECALL
export function TimeCall() {
  $(document).ready(function () {
    var minutesLabel = document.getElementById("minutes");
    var secondsLabel = document.getElementById("seconds");
    var totalSeconds = 0;
    var url = window.location.href.split(window.location.host)[1];

    function setTime() {
      ++totalSeconds;
      secondsLabel.innerHTML = pad(totalSeconds % 60);
      minutesLabel.innerHTML = pad(parseInt(totalSeconds / 60));
    }
    function pad(val) {
      var valString = val + "";
      if (valString.length < 2) {
        return "0" + valString;
      } else {
        return valString;
      }
    }
  });
}

export function modalAccesoHistorial() {
  $("#modalAccesoHistorial").modal();
}

// TIMECALL END

function makeVideo() {
  $("#modalCall").modal();
}
function makeVideoStablished() {
  $("#modalCallStablished").modal();
}
export function ModalReceta() {
  $("#modal1").modal();
}

export function ModalPagos() {
  $("#modalPagos").modal();
}

export function ModalPagosClose() {
  $("#modalPagos").modal("close");
}

function modalVideo() {
  $("#modalVideo").modal();
}

// MENU DESPLEGABLE
export function dropdownMenu() {
  $(".dropdown-button").dropdown({
    inDuration: false,
    outDuration: false,
    constrainWidth: true, // Does not change width of dropdown to that of the activator
    hover: false, // Activate on hover
    gutter: 120, // Spacing from edge
    belowOrigin: false, // Displays dropdown below the button
    alignment: "left", // Displays dropdown with edge aligned to the left of button
    stopPropagation: false, // Stops event propagation
  });
}
// MENU DESPLEGABLE END

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

function keydown() {
  document.getElementById("keyleft").style.display = "none";
  document.getElementById("keydown").style.display = "block";
}

function keyleft() {
  document.getElementById("keyleft").style.display = "block";
  document.getElementById("keydown").style.display = "none";
}

// CONSULTA
export function Hablar() {
  if (window.hasOwnProperty("webkitSpeechRecognition")) {
    var recognition = new webkitSpeechRecognition();

    recognition.continuous = false;
    recognition.interimResults = false;

    recognition.lang = "es-PE";
    recognition.start();

    recognition.onresult = function (e) {
      console.log(e.results[0][0].transcript);
      document.getElementById("consultaPaciente").click();
      document.getElementById("lblConsulta").classList.add("active");
      document.getElementById("consultaPaciente").value =
        e.results[0][0].transcript;
      document.getElementById("init_voice").style.display = "block";
      document.getElementById("in_voice").style.display = "none";
      let total = 500 - $("#consultaPaciente").val().length;
      $("#num_caracter").text(total);
      // $("#num_caracter").val(500 - ($("#consultaPaciente").val()).length)
      recognition.stop();
      //document.getElementById('labnol').submit();
    };

    recognition.onerror = function (e) {
      recognition.stop();
    };
  }
}

export function showGifVoice() {
  document.getElementById("init_voice").style.display = "none";
  document.getElementById("in_voice").style.display = "block";
}

// CONSULTA END
// CONSULTA MEDICA

function verMensajes() {
  document.getElementById("chat-contactos").style.display = "none";
  document.getElementById("chat-mensajeria").style.display = "block";
}
function verContactos() {
  document.getElementById("chat-contactos").style.display = "block";
  document.getElementById("chat-mensajeria").style.display = "none";
}
function ocultarVideo() {
  document.getElementById("proceso").style.display = "block";
  document.getElementById("thevideo").style.display = "none";
}
function verVideo() {
  document.getElementById("proceso").style.display = "none";
  document.getElementById("thevideo").style.display = "block";

  var video = document.querySelector("#thevideo");

  navigator.getUserMedia =
    navigator.getUserMedia ||
    navigator.webkitGetUserMedia ||
    navigator.mozGetUserMedia ||
    navigator.msGetUserMedia ||
    navigator.oGetUserMedia;

  if (navigator.getUserMedia) {
    navigator.getUserMedia({ video: true }, handleVideo, videoError);
  }

  function handleVideo(stream) {
    video.src = window.URL.createObjectURL(stream);
  }

  function videoError(e) {
    alert("error loading camera");
  }
}

export function hideSelectCards() {
  document.getElementById("section-select-cards").style.display = "none";
}

function ocultarVerOtroMedico() {
  document.getElementById("otroMedico").style.display = "none";
}

//VIDEO

/** Always clear errors **/

function activarChat() {
  document.getElementById("modalMessage").style.left = "inherit";
}
// CONSULTA MEDICA END

// HISTORIAL DE CONSULTAS
export function ModalHistorialConsultas() {
  $("#modal1").modal();
}
// HISTORIAL DE CONSULTAS END

// HISTORIAL MEDICO
function preguntasCategoria(valor) {
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

// MI MONEDERO
function mod() {
  $("#modal1").modal();
}

export function ModalEliminar() {
  $("#modalEliminar").modal();
}

function modEliminarPaypal() {
  $("#modalEliminarPaypal").modal();
}

function eliminarTarjeta(element) {
  element.parentElement.parentElement.parentElement.style.display = "none";
}
function eliminarTarjetaPaypal(element) {
  element.parentElement.parentElement.parentElement.parentElement.parentElement.style.display =
    "none";
}
// MI MONEDERO END

// AYUDA
function preguntas(valor) {
  if (valor == "frecuentes") {
    document.getElementById("preguntasFrecuentes").style.display = "block";
    document.getElementById("preguntasConsultas").style.display = "none";
    document.getElementById("preguntasHistorial").style.display = "none";
    document.getElementById("preguntasMimonedero").style.display = "none";
    document.getElementById("preguntasRecetas").style.display = "none";
  } else if (valor == "consultas") {
    document.getElementById("preguntasFrecuentes").style.display = "none";
    document.getElementById("preguntasConsultas").style.display = "block";
    document.getElementById("preguntasHistorial").style.display = "none";
    document.getElementById("preguntasMimonedero").style.display = "none";
    document.getElementById("preguntasRecetas").style.display = "none";
  } else if (valor == "historial") {
    document.getElementById("preguntasFrecuentes").style.display = "none";
    document.getElementById("preguntasConsultas").style.display = "none";
    document.getElementById("preguntasHistorial").style.display = "block";
    document.getElementById("preguntasMimonedero").style.display = "none";
    document.getElementById("preguntasRecetas").style.display = "none";
  } else if (valor == "recetas") {
    document.getElementById("preguntasFrecuentes").style.display = "none";
    document.getElementById("preguntasConsultas").style.display = "none";
    document.getElementById("preguntasHistorial").style.display = "none";
    document.getElementById("preguntasMimonedero").style.display = "none";
    document.getElementById("preguntasRecetas").style.display = "block";
  } else {
    document.getElementById("preguntasFrecuentes").style.display = "none";
    document.getElementById("preguntasConsultas").style.display = "none";
    document.getElementById("preguntasHistorial").style.display = "none";
    document.getElementById("preguntasMimonedero").style.display = "block";
    document.getElementById("preguntasRecetas").style.display = "none";
  }
}

// AYUDA END

// ====== ADMINISTRAR EMPLEADOS ========
export function ModalShowEmployee() {
  $("#modal1").modal();
}

export function LoadTableAdmEmployee(dataTable) {
  $(".paginate_page").val("Página");
  var table = $("#tableAdmEmployee").DataTable({
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
}

export function LoadTableAdmCompanyPayment(dataTable) {
  $(".paginate_page").val("Página");
  var table = $("#tableAdmCompanyPayment").DataTable({
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
  $("#tableAdmCompanyPayment tbody").on("click", "a#selectRow", function () {
    let row = table.row($(this).parents("tr")).data();
    let index = table.row($(this).parents("tr")).index();

    let companies = JSON.parse(localStorage.getItem("companiesToPayment"));

    let vouchers = companies.data[index].voucher;

    vouchers.forEach((element) => {
      $("#vouchers").append(`
      <div class="chip" style = "height: 177px;">
        <img id="blah" style = "height: 177px; width: 177px; border-radius: 0%;" src="${element}" alt="imagen de voucher"/>
        <i class="close material-icons" (click)="deleteImage(img)">close</i> 
      </div>
        `);
    });
    let jsonToPayment = {
      index: index,
      company_id: row[0],
      amount: row[2],
      payment_description: "Por consulta medica",
      month: row[5],
      year: row[4],
    };

    localStorage.setItem("payment", JSON.stringify(jsonToPayment));
    console.log("ROW SELECTED", row);
  });

  $("#tableAdmCompanyPayment tbody").on("click", "a#cancelRow", function () {
    let row = table.row($(this).parents("tr")).data();

    let paramsJson = {
      month: row[5],
      year: row[4],
      company_id: row[0],
    };
    $.ajax({
      type: "POST",
      url: urlBase + "/api/cancelar/pagos/empresa",
      data: JSON.stringify(paramsJson),
      dataType: "json",
      contentType: "application/json",
      success: function (response) {
        console.log(response);
        alert("Pago cancelado");
        window.location.reload();
      },
      error: function (error) {
        console.log(error);
      },
    });
  });
}

export function HideDatatableAdmEmployee() {
  document.getElementById("dataAdmEmployee").style.display = "none";
}

export function ShowDatatableAdmEmployee() {
  document.getElementById("dataAdmEmployee").style.display = "block";
}

export function HideDatatableAdmPaymentsCompany() {
  document.getElementById("dataAdmPaymentCompany").style.display = "none";
}

export function ShowDatatableAdmPaymentsCompany() {
  document.getElementById("dataAdmPaymentCompany").style.display = "block";
}

// ====== ADMINISTRAR EMPLEADOS END ========
// SINCH VIDEO
export function SinchVideo(usernameCall) {
  var sinchClient;
  var callClient;
  var call;

  var callListeners = {
    onCallProgressing: function (call) {
      $("audio#ringback").prop("currentTime", 0);
      $("audio#ringback").trigger("play");

      // icon gif displayed
      document.getElementById("gifLlamada").style.display = "none";
      // document.getElementById('estadoLlamada').value = 'llamando a ..';
      //Report call stats
      $("div#callLog").append('<div id="stats">Ringing...</div>');
    },
    onCallEstablished: function (call) {
      $("video#outgoing").attr("src", call.outgoingStreamURL);
      $("video#incoming").attr("src", call.incomingStreamURL);
      $("audio#ringback").trigger("pause");
      $("audio#ringtone").trigger("pause");

      // icon gif don't displayed
      document.getElementById("gifLlamada").style.display = "none";
      // document.getElementById('estadoLlamada').value = 'llamada establecida';
      //Report call stats
      var callDetails = call.getDetails();
    },
    onCallEnded: function (call) {
      $("audio#ringback").trigger("pause");
      $("audio#ringtone").trigger("pause");

      $("video#outgoing").attr("src", "");
      $("video#incoming").attr("src", "");

      $("#modalCalled").modal("close");

      //Report call stats
      var callDetails = call.getDetails();
    },
  };

  //export function  videoInit(){
  var global_username = "";

  /*** After successful authentication, show user interface ***/
  var showUI = function () {
    console.log("shdfgdfgowUI");
  };
  /*** If no valid session could be started, show the login interface ***/
  var clearError = function () {
    $("div.error").hide();
  };

  // localStorage
  var user = JSON.parse(localStorage.getItem("identity"));

  var login = function () {
    console.log("login");
    clearError();

    // var signInObj = {username: username, password: password};
    // var signInObj = {username: 'cristobal', password: '123456'};
    var signInObj = {
      username: user.user_sinch,
      password: user.password_sinch,
    };

    //Use Sinch SDK to authenticate a user
    sinchClient
      .start(signInObj, function () {
        global_username = signInObj.username;
        //On success, show the UI
        showUI();

        //Store session & manage in some way (optional)
        localStorage[sessionName] = JSON.stringify(sinchClient.getSession());
      })
      .fail(handleError);
  };
  var showLoginUI = function () {
    console.log("showLoginUI");
    //$('form#userForm').css('display', 'inline');
    login();
  };
  //*** Set up sinchClient ***/

  sinchClient = new SinchClient({
    applicationKey: "798996bb-fc49-4369-90ad-fab14011afce",
    capabilities: { calling: true, video: true },
    supportActiveConnection: true,
    //Note: For additional loging, please uncomment the three rows below
    onLogMessage: function (message) {
      console.log(message);
    },
  });

  sinchClient.startActiveConnection();

  /*** Name of session, can be anything. ***/

  var sessionName = "VIDEO-" + sinchClient.applicationKey;

  /*** Check for valid session. NOTE: Deactivated by default to allow multiple browser-tabs with different users. ***/
  localStorage.removeItem(sessionName);
  var sessionObj = JSON.parse(localStorage[sessionName] || "{}");
  if (sessionObj.userId) {
    sinchClient
      .start(sessionObj)
      .then(function () {
        global_username = sessionObj.userId;
        //On success, show the UI
        showUI();
        //Store session & manage in some way (optional)
        localStorage[sessionName] = JSON.stringify(sinchClient.getSession());
      })
      .fail(function () {
        //No valid session, take suitable action, such as prompting for username/password, then start sinchClient again with login object
        showLoginUI();
      });
  } else {
    showLoginUI();
  }

  /*** Set up callClient and define how to handle incoming calls ***/

  callClient = sinchClient.getCallClient();
  callClient.initStream().then(function () {
    // Directly init streams, in order to force user to accept use of media sources at a time we choose
    $("div.frame").not("#chromeFileWarning").show();
  });
  call;

  callClient.addEventListener({
    onIncomingCall: function (incomingCall) {
      //Play some groovy tunes
      $("audio#ringtone").prop("currentTime", 0);
      $("audio#ringtone").trigger("play");

      //Print statistics
      $("div#callLog").append(
        '<div id="title">Incoming call from ' + incomingCall.fromId + "</div>"
      );
      $("div#callLog").append('<div id="stats">Ringing...</div>');
      $("button").addClass("incall");

      //Manage the call object
      call = incomingCall;
      call.addEventListener(callListeners);
      $("button").addClass("callwaiting");
    },
  });

  $("button#answer").click(function (event) {
    event.preventDefault();

    if ($(this).hasClass("callwaiting")) {
      clearError();

      try {
        call.answer();

        $("button").removeClass("callwaiting");
      } catch (error) {
        handleError(error);
      }
    }
  });

  /*** Make a new data call ***/
  function videoCall(usernameCall) {
    console.log("LLAMANDO");
    clearError();
    // var usernameCall="alexis";
    console.log("Placing call to: " + usernameCall);
    call = callClient.callUser(usernameCall);

    call.addEventListener(callListeners);
  }
  /*** Hang up a call ***/

  $("button#hangup").click(function (event) {
    console.log("Terminar llamada");
    event.preventDefault();

    if ($(this).hasClass("incall")) {
      clearError();

      console.info("Will request hangup..");

      call && call.hangup();
    }
  });

  /*** Handle errors, report them and re-enable UI ***/

  var handleError = function (error) {
    //Enable buttons
    $("button#createUser").prop("disabled", false);
    $("button#loginUser").prop("disabled", false);

    //Show error
    $("div.error").text(error.message);
    $("div.error").show();
  };

  /** Always clear errors **/

  /** Chrome check for file - This will warn developers of using file: protocol when testing WebRTC **/
  if (
    location.protocol == "file:" &&
    navigator.userAgent.toLowerCase().indexOf("chrome") > -1
  ) {
    $("div#chromeFileWarning").show();
  }

  $("button").prop("disabled", false); //Solve Firefox issue, ensure buttons always clickable after load
  videoCall(usernameCall);
}

// SINCH VIDEO END

export function CerrarModal() {
  $("#modalFinishCall").modal("close");
}

export function Imprimir() {
  var doc = new jsPDF();

  // We'll make our own renderer to skip this editor
  var specialElementHandlers = {
    "#editor": function (element, renderer) {
      return true;
    },
    ".controls": function (element, renderer) {
      return true;
    },
  };

  // All units are in the set measurement for the document
  // This can be changed to "pt" (points), "mm" (Default), "cm", "in"
  doc.fromHTML($("body").get(0), 15, 15, {
    width: 170,
    elementHandlers: specialElementHandlers,
  });
}

// VISANET CARGAR FORMULARIO
export function setButtonVisanet() {
  $(document).ready(function () {
    $("#formVisa").insertAfter("#formVisanet");
  });
}

export function LoadFormVisanet(sessionToken, merchantId, amount) {
  $(document).ready(function () {
    let form = `
    <form action="" method="post">
      <script src="https://static-content.vnforapps.com/v1/js/checkout.js?qa=true"
      data-sessiontoken="${sessionToken}"
      data-merchantid="${merchantId}"
      data-buttonsize=""
      data-buttoncolor=""
      data-merchantlogo ="http://labceperu.com/test/files/logo.png"
      data-merchantname=""
      data-formbuttoncolor="#0A0A2A"
      data-showamount=""
      data-purchasenumber="77"
      data-amount="$amount"
      data-cardholdername="GLEIZER"
      data-cardholderlastname="PANDURO"
      data-cardholderemail="gleizerp@gmail.com"
      data-usertoken=""
      data-recurrence="false"
      data-frequency="Quarterly"
      data-recurrencetype="fixed"
      data-recurrenceamount="200"
      data-documenttype="0"
      data-documentid=""
      data-beneficiaryid="TEST1123"
      data-productid=""
      data-phone="">
    </script>
  </form>
  `;
    $("#formVisanet").html(form);
  });
  // $('#formVisanet').load(a);
}

export function createElement() {
  $(document).ready(function () {
    var script = document.createElement("SCRIPT");
    script.setAttribute(
      "src",
      "https://static-content.vnforapps.com/v1/js/checkout.js?qa=true"
    );
    script.setAttribute(
      "data-sessiontoken",
      localStorage.getItem("sessionToken")
    );
    script.setAttribute("data-merchantid", localStorage.getItem("merchantId"));
    script.setAttribute("data-buttonsize", "");
    script.setAttribute("data-buttoncolor", "");
    script.setAttribute(
      "data-merchantlogo",
      "http://labceperu.com/test/files/logo.png"
    );
    script.setAttribute("data-merchantname", "");
    script.setAttribute("data-formbuttoncolor", "#0A0A2A");
    script.setAttribute("data-showamount", "");
    script.setAttribute("data-purchasenumber", localStorage.getItem("counter"));
    script.setAttribute("data-amount", localStorage.getItem("amount"));
    script.setAttribute("data-cardholdername", "GLEIZER");
    script.setAttribute("data-cardholderlastname", "PANDURO");
    script.setAttribute("data-cardholderemail", "gleizerp@gmail.com");
    script.setAttribute("data-usertoken", "");
    script.setAttribute("data-recurrence", "false");
    script.setAttribute("data-frequency", "Quarterly");
    script.setAttribute("data-recurrencetype", "fixed");
    script.setAttribute("data-recurrenceamount", "200");
    script.setAttribute("data-documenttype", "0");
    script.setAttribute("data-documentid", "");
    script.setAttribute("data-beneficiaryid", "TEST1123");
    script.setAttribute("data-productid", "");
    script.setAttribute("data-phone", "");

    document.getElementById("formVisanet").appendChild(script);
  });
}

export function enableButton() {
  let btn = document.getElementById("videocall");
  btn.removeAttribute("disabled");
  document.getElementById("msjPayment").style.display = "none";
}

export function disableButton() {
  let btn = document.getElementById("videocall");
  btn.disabled = true;
  document.getElementById("msjPayment").style.display = "block";
}

export function initPayment() {
  $(document).ready(function () {
    setTimeout(function () {
      var formVisanet = document.getElementById("formVisanet").childNodes;
      let btnVisanet = formVisanet[4];
      console.log("BOTON", btnVisanet);
      btnVisanet.addEventListener("click", function () {
        localStorage.setItem("payment-visanet", "1");
      });
    }, 1000);
  });
}

// ============ CULQI ====================
export function setCulqiPayment() {}

export function addDefaultCard(card) {
  $("#select_card")
    .prepend(
      `<option value='${card.id}'> ${card.source.iin.card_brand} **** ${card.source.last_four} </option>`
    )
    .val("");
  $("#select_card")[0].options[0].selected = true;
  localStorage.setItem("creditcard_id", card.id);
}

export function selectAddOptionCard() {
  $("#select_card").change(function () {
    if ($(this).val() === "addCard") {
      localStorage.setItem("waitCard", "true");
      window.location.href = urlBase + "/web/paciente/dist/agregar-metodo-pago";
    }
  });
}

export function showFormAddCard() {
  document.getElementById("form-addcard-section").style.display = "block";
}

export function hideFormAddCard() {
  document.getElementById("form-addcard-section").style.display = "none";
}

export function clickCulqi() {
  Culqi.publicKey = "pk_test_cb5ebcb4117b006a";
  Culqi.init();

  $("#culqiButton").on("click", function (e) {
    let a = true;
    let numberCard = document.getElementById("card[number]").value;
    let cvv = document.getElementById("card[cvv]").value;
    let month = document.getElementById("card[exp_month]").value;
    let year = document.getElementById("card[exp_year]").value;

    if (numberCard == "" || cvv == "" || month == "" || year == "") {
      if (numberCard == "") {
        alert("Ingrese el numero de tarjeta");
      } else if (cvv == "") {
        alert("Ingrese CVV");
      } else if (month == "") {
        alert("Ingrese el mes");
      } else if (year == "") {
        alert("Ingrese Año");
      }
    } else {
      document.getElementById("wordAddCard").style.display = "none";
      document.getElementById("loaderAddCard").style.display = "block";
      document.getElementById("navActive").style.height = "0px";
      document.getElementById("navNoActive").style.height = "0px";

      document.getElementById("navActive").style.height =
        Number($(document).height()) - 120 + "px";
      document.getElementById("navNoActive").style.height =
        Number($(document).height()) - 120 + "px";

      //document.getElementById('pago-add').style.height = (Number($(document).height()) - 130 )+'px';
      let token = Culqi.createToken();
      // e.preventDefault();
    }
  });
} // ============= CULQI END ================
/*
  COOCKIES
*/
export function setCookie() {
  var pathToMyPage = "https://www.devmf.com/"; // this gives pages/myPage.html

  document.cookie =
    "acceso_vex=9192f360252997233772e9b3ac9b16f2;path=" + pathToMyPage;
}

export function openModalSchedule() {
  $("#confirmationCall").modal({
    dismissible: true, // Modal can be dismissed by clicking outside of the modal
    opacity: 0.5, // Opacity of modal background
  });

  $("#confirmationCall").modal("open");
}
