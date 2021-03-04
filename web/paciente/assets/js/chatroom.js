export function EventsJSXC(url) {
  let popup = window.open(url, '_blank')
  // let popup = window.open(url, 'Video Chat Mifarma','_blank', "location=1,status=1,scrollbars=1,resizable=no,width=800,height=600,menubar=no,toolbar=no");

  let paramStatusOff = {
    status: '2',
    doctor_id: JSON.parse(localStorage.getItem('doctor')).id.toString(),
  }

  console.log('params status off', paramStatusOff)
  let dataStatusOff = JSON.stringify(paramStatusOff)

  $.ajax({
    type: 'POST',
    url: 'https://telemedicina.today/api/update/status',
    // url: 'http://localhost:8000/api/update/status',
    data: dataStatusOff,
    dataType: 'json',
    contentType: 'application/json; charset=utf-8',
    success: function (response) {
      console.log('ACTUALIZACION DE ESTADO DOCTOR OFF', response)
    },
    error: function (error) {
      console.log(error)
    },
  })

  var popupTick = setInterval(function () {
    if (popup.closed) {
      clearInterval(popupTick)

      var today = new Date()
      var dd = today.getDate()
      var mm = today.getMonth() + 1 //January is 0!
      var yyyy = today.getFullYear()
      if (dd < 10) {
        dd = '0' + dd
      }

      if (mm < 10) {
        mm = '0' + mm
      }

      today = yyyy + '/' + mm + '/' + dd

      let paramStatusOn = {
        status: '1',
        doctor_id: JSON.parse(localStorage.getItem('doctor')).id.toString(),
      }

      console.log('params status on', paramStatusOn)
      let dataStatusOn = JSON.stringify(paramStatusOn)
      $.ajax({
        type: 'POST',
        url: 'https://telemedicina.today/api/update/status',
        // url: 'http://localhost:8000/api/update/status',
        data: dataStatusOn,
        dataType: 'json',
        contentType: 'application/json; charset=utf-8',
        success: function (response) {
          console.log('ACTUALIZACION DE ESTADO DOCTOR ON', response)
        },
        error: function (error) {
          console.log(error)
        },
      })

      let params = {
        patient_id: JSON.parse(localStorage.getItem('identity')).id.toString(),
        doctor_id: JSON.parse(localStorage.getItem('doctor')).id.toString(),
        date: today,
        price: '5.00',
        duration: '500',
        state: '1',
        symptom: localStorage.getItem('symtomQuery'),
        symptom_keys: localStorage.getItem('symptomKeyQuery'),
        message: localStorage.getItem('messageQuery'),
        mode: 'web',
      }

      console.log('PARAMS', params)

      let datos = JSON.stringify(params)
      $.ajax({
        type: 'POST',
        url: 'https://telemedicina.today/api/queries',
        // url: 'http://localhost:8000/api/queries',
        data: datos,
        dataType: 'json',
        contentType: 'application/json; charset=utf-8',
        success: function (response) {
          localStorage.setItem('query_id', response.data.id)
          window.location.href =
            'https://telemedicina.today/web/paciente/calificacion'
          // window.location.href = "http://localhost:4200/calificacion";

          // let parametros = {
          //   "patient_id": ((JSON.parse(localStorage.getItem("identity"))).id).toString(),
          //   "card_id": localStorage.getItem("creditcard_id"),
          //   "payment_description": "Pago unico",
          //   "amount": "153",
          // }

          // let data = JSON.stringify(parametros)
          //
          // $.ajax({
          //   type: 'POST',
          //   url: 'https://www.alo.doctor/api/payment/generatePatient',
          //   data: data,
          //   dataType: 'json',
          //   contentType: 'application/json; charset=utf-8',
          //   success: function(response) {
          //
          //     console.log('RESPONSE PAYMENT', response)
          //     window.location.href = "https://www.alo.doctor/web/paciente/dist/calificacion"
          //   },
          //   error: function(error) {
          //     console.log(error);
          //   }
          // });
          console.log('RESPONSE JQUERY', response)
        },
        error: function (error) {
          console.log(error)
        },
      })
    }
  }, 500)

  window.addEventListener('message', receiveMessage, false)

  function receiveMessage(event) {
    if (event.origin !== 'https://call.alo.doctor') {
      localStorage.setItem('callDuration', event.data)
      popup.close()
    }
  }
}
