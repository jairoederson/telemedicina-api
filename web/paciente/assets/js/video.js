//
// var sinchClient;
// var callClient;
// var call;
//
//
// var timeInit;
// var timeEnd;
//
// var callListeners = {
//   onCallProgressing: function(call) {
//
//     $('audio#ringback').prop("currentTime",0);
//     $('audio#ringback').trigger("play");
//   },
//   onCallEstablished: function(call) {
//     $('video#outgoing').attr('src', call.outgoingStreamURL);
//     $('video#incoming').attr('src', call.incomingStreamURL);
//     $('audio#ringback').trigger("pause");
//     $('audio#ringtone').trigger("pause");
//     // document.getElementById('gifLlamada').style.display = 'none';
//     document.getElementById('videoEntrante').style.display = 'block';
//     // document.getElementById('videoPropio').style.display = 'block';
//     // document.getElementById('videoDatos').style.display = 'block';
//     document.getElementById('entranteDatos').style.display = 'none';
//
//     var worked = $("#worked");
//
//     function update() {
//         var myTime = worked.html();
//         var ss = myTime.split(":");
//         var dt = new Date();
//         dt.setHours(0);
//         dt.setMinutes(ss[0]);
//         dt.setSeconds(ss[1]);
//
//         var dt2 = new Date(dt.valueOf() + 1000);
//         var temp = dt2.toTimeString().split(" ");
//         var ts = temp[0].split(":");
//
//         worked.html(ts[1]+":"+ts[2]);
//         setTimeout(update, 1000);
//     }
//
//     update();
//   },
//   onCallEnded: function(call) {
//
//     $('audio#ringback').trigger("pause");
//     $('audio#ringtone').trigger("pause");
//
//     $('video#outgoing').attr('src', '');
//     $('video#incoming').attr('src', '');
//
//     // $('#modalCallVideo').modal('close');
//     // $('#modalMessage').modal('close');
//
//
//     var callDetails = call.getDetails();
//     console.log('CALL DETAILS', callDetails);
//     localStorage.setItem('durationVideoCall', callDetails.duration);
//
//     let doctor = JSON.parse(localStorage.getItem('doctor'));
//     let patient = JSON.parse(localStorage.getItem('identity'));
//     console.log('DOCTOR', doctor);
//     console.log('PACIENTE', patient);
//
//     let symtomQuery = localStorage.getItem('symtomQuery');
//     let messageQuery = localStorage.getItem('messageQuery');
//     let symptomKeyQuery = localStorage.getItem('symptomKeyQuery');
//
//     var today = new Date();
//     var dd = today.getDate();
//     var mm = today.getMonth()+1; //January is 0!
//     var yyyy = today.getFullYear();
//     console.log('MM INIT', mm);
//     if(dd<10) {
//         dd = '0'+dd
//         console.log('DD', dd);
//     }
//
//     if(mm<10) {
//         mm = '0'+mm
//         console.log('MM', mm);
//     }
//
//     let now = yyyy + '/' + mm + '/' + dd;
//     console.log('TODAY', now);
//
//     let query;
//
//     console.log('DURATION', Math.round(callDetails.duration));
//     console.log('SYMPTOM', symtomQuery);
//     console.log('SYMPTOM KEY', symptomKeyQuery);
//     console.log('MESSAGE', messageQuery);
//
//     if(callDetails.duration <= 0){
//       query = {
//         "doctor_id": (doctor.id).toString(),
//         "patient_id": (patient.id).toString(),
//         "date": now,
//         "price": 5,
//         "duration": Math.round(callDetails.duration),
//         "state": 0,
//         "symptom": symtomQuery,
//         "symptom_keys": symptomKeyQuery,
//         "message": messageQuery,
//         "mode": "web",
//       }
//       console.log('QUERY LOST', query);
//
//     }else{
//       query = {
//         "doctor_id": (doctor.id).toString(),
//         "patient_id": (patient.id).toString(),
//         "date": now,
//         "price": 5,
//         "duration": Math.round(callDetails.duration),
//         "state": 1,
//         "symptom": symtomQuery,
//         "symptom_keys": symptomKeyQuery,
//         "message": messageQuery,
//         "mode": "web",
//       }
//       console.log('QUERY RECIEVED', query);
//
//     }
//
//     console.log('DATA TO SAVE', query);
//     let data = JSON.stringify(query);
//     $.ajax({
//       type: 'POST',
//       url: 'https://www.alo.doctor/api/queries',
//       data: data,
//       dataType: 'json',
//       contentType: 'application/json; charset=utf-8',
//       success: function(response) {
//         localStorage.setItem('query_id', response.data.id);
//         console.log('REPONSE SAVVE QUERY', response);
//         window.close();
//       },
//       error: function(error) {
//         console.log(error);
//         window.close();
//
//       }
//     });
//
//   }
// }
//
//
//
// var global_username = '';
//
// var showUI = function() {
//   console.log("shdfgdfgowUI");
// }
// function clearError() {
//   $('div.error').hide();
// }
//
// var login = function(){
//   console.log("login");
//   clearError();
//
//   var user = JSON.parse(localStorage.getItem('identity'));
//   var signInObj = {username: 'cristobal', password: '123456'};
//   // var signInObj = {username: user.user_sinch, password: user.password_sinch};
//
//   sinchClient.start(signInObj, function() {
//     global_username = signInObj.username;
//     showUI();
//     console.log("sign in obj", sinchClient.getSession())
//     localStorage[sessionName] = JSON.stringify(sinchClient.getSession());
//   }).fail(handleError);
//
// }
//
// var showLoginUI = function() {
//   console.log("showLoginUI");
//   login();
// }
//
// sinchClient = new SinchClient({
//   applicationKey: '798996bb-fc49-4369-90ad-fab14011afce',
//   // applicationKey: 'cc01acfa-f44b-4536-af9b-50f2764e9105',
//   capabilities: {calling: true, video: true},
//   supportActiveConnection: true,
//   onLogMessage: function(message) {
//     console.log(message);
//   },
// });
//
// let usuario = JSON.parse(localStorage.getItem('identity'));
//
// // sinchClient.newUser({username: usuario.user_sinch, email: usuario.email, password: usuario.password_sinch});
//
// sinchClient.startActiveConnection();
//
//
// var sessionName = 'VIDEO-' + sinchClient.applicationKey;
//
//
// localStorage.removeItem(sessionName);
// var sessionObj = JSON.parse(localStorage[sessionName] || '{}');
// if(sessionObj.userId) {
//   sinchClient.start(sessionObj)
//     .then(function() {
//       global_username = sessionObj.userId;
//       showUI();
//       localStorage[sessionName] = JSON.stringify(sinchClient.getSession());
//     })
//     .fail(function() {
//       showLoginUI();
//     });
// }
// else {
//   showLoginUI();
// }
//
// callClient = sinchClient.getCallClient();
// callClient.initStream().then(function() {
//   $('div.frame').not('#chromeFileWarning').show();
// });
// call;
//
// callClient.addEventListener({
//   onIncomingCall: function(incomingCall) {
//   $('audio#ringtone').prop("currentTime",0);
//   $('audio#ringtone').trigger("play");
//
//
//   $('div#callLog').append('<div id="title">Incoming call from ' + incomingCall.fromId + '</div>');
//   $('div#callLog').append('<div id="stats">Ringing...</div>');
//   $('button').addClass('incall');
//
//     call = incomingCall;
//     call.addEventListener(callListeners);
//   $('button').addClass('callwaiting');
//   }
// });
//
// $('button#answer').click(function(event) {
//   event.preventDefault();
//
//   if($(this).hasClass("callwaiting")) {
//     clearError();
//
//     try {
//
//       call.answer();
//
//
//       $('button').removeClass('callwaiting');
//     }
//     catch(error) {
//       handleError(error);
//     }
//   }
// });
//
// export function videoCall(){
//   var user = JSON.parse(localStorage.getItem('doctor'));
//   clearError();
//   var usernameCall= user.user_sinch;
//   console.log('video js ', user)
//   console.log('Placing call to: ' + user.user_sinch);
//   call = callClient.callUser(usernameCall);
//   // call = callClient.callUser('perez201849135922');
//
//   call.addEventListener(callListeners);
// }
//
// $('button#hangup').click(function(event) {
//   console.log("Terminar llamada");
//   event.preventDefault();
//
//   if($(this).hasClass("incall")) {
//     clearError();
//
//     console.info('Will request hangup..');
//
//     call && call.hangup();
//   }
// });
//
// $(document).ready(function(){
//   document.getElementById("finishVideoCall").addEventListener("click", function(){
//
//     console.log("Terminar llamada");
//     var callDetails = call.getDetails();
//     console.log('CALL DETAILS', callDetails);
//
//     localStorage.setItem('durationVideoCall', callDetails.duration);
//     event.preventDefault();
//
//     call && call.hangup();
//     if($(this).hasClass("incall")) {
//       clearError();
//     }
//   });
//
// })
//
//
//
// var handleError = function(error) {
//   $('button#createUser').prop('disabled', false);
//   $('button#loginUser').prop('disabled', false);
//
//   $('div.error').text(error.message);
//   $('div.error').show();
// }
//
//
//
// if(location.protocol == 'file:' && navigator.userAgent.toLowerCase().indexOf('chrome') > -1) {
//   $('div#chromeFileWarning').show();
// }
//
// $('button').prop('disabled', false);
//
// function activarChat(){
//   document.getElementById('modalMessage').style.left = 'inherit'
// }
