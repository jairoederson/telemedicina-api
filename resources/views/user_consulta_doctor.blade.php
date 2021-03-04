@extends('layouts.material')
@section('content')
<div id="nueva-consulta" class="content-consulta">
      <div class="row content-inside">
        <div class="row">
          <div class="col s12 title-color center">
            <h6 class="title-content content-title">
              <b>NUEVA CONSULTA</b>
            </h6>
          </div>
        </div>
        <br>
        <div class="col s12 m12">
          <form class="col s12" id="doctor1">
              <div class="row">
                <div class="col s4 m4">
                </div>
                <div class="col s4 m4 center margin-top-element">
                  <img class="doctor-image" src="{{ asset('assets/images/doctor.jpg') }}" alt="" width="40%">
                </div>
                <div class="col s4 m4">
                </div>
              </div>
              <div class="row text-center">
                <div class="col s12 md12">
                  <h5 class="without-margin-bottom">Richar P.</h5>
                </div>
              </div>
                <div class="row text-center">
                  <div class="col s4">
                  </div>
                  <div class="col s4">
                    <div id="valoracionDoctor" class="row" style="padding-left: 20px">
                      <div class="col s1">

                      </div>
                      <div class="col s7 center without-padding-right" style="padding-left: 10px">
                        <i class="material-icons star star-m text-darken-4 icon-star">star</i>
                        <i class="material-icons star star-m text-darken-4 icon-star">star</i>
                        <i class="material-icons star star-m text-darken-4 icon-star">star</i>
                        <i class="material-icons star star-m text-darken-4 icon-star">star</i>
                        <i class="material-icons star-m star-desactivate text-darken-4 icon-star">star</i>
                      </div>
                      <div class="col s3 left" style="text-align: left;padding-left: 25px">
                        <span class="count-star" style="">(14)</span>
                      </div>

                    </div>
                  </div>
                  <div class="col s4"></div>
                </div>
                <div class="row">
                  <div class="col s4">
                  </div>
                  <div class="col s4 text-center">
                    <label>Hombre, 26 años de Lima</label><br>
                    <b>Especialidad: </b><label> Cardiologia</label><br>
                    <b>Precio: </b> <label> S/. 5.00 por consulta</label><br>
                  </div>
                  <div class="col s4">
                  </div>
                </div>
                <div class="row">
                  <div class="col s12">
                    <p class="text-center">
                      <b>
                        Datos del médico
                      </b>
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 center">
                    <span class="text-center">El doctor lang es especialista en la evaluacion y tratamiento
                      de la enfermedad de vitreonitales de la vista
                    </span>
                  </div>
                </div>
                <div class="row text-center">
                  <div class="col s12">
                    <p class="text-center">
                      <b>
                        ¿Cómo desea comunicarse con el doctor?
                      </b>
                    </p>
                  </div>
                </div>
                <div class="row center section-call">
                  <div class="col s4"></div>
                  <div class="col s4">
                    <a onclick="makeCall()" href="#modalCalled" class="format waves-effect waves-light btn modal-trigger" style="background-color: #868686">
                      <i class="material-icons left">local_phone</i>
                      Voz
                    </a>
                    &nbsp;
                    <a onclick="makeCall(); videoCall()" href="#modalCalled" class="format waves-effect waves-light btn btn-color-orange modal-trigger" style="background-color: #868686">
                      <i class="material-icons left">videocam</i>Video</a>
                  </div>
                  <!-- <div id="modalCall" class="modal bottom-sheet video-call">
                    <div class="modal-content">
                      <div class="zoom align-left">
                        <i class="material-icons icon-fullscreen">zoom fullscreen</i>

                      </div>
                      <div class="row">
                        <img class="img-video" src="http://www.kauveryhospital.com/doctorimage/Dr.%20Balamurali-Dec-11-2015-02-21-05-Dr_Bala-Murali.jpg" alt="" width="150px">
                      </div>
                      <div class="row section-star">
                        <div class="start-content">
                          <i class="material-icons star text-darken-4 icon-star">star</i>
                          <i class="material-icons star text-darken-4 icon-star">star</i>
                          <i class="material-icons star text-darken-4 icon-star">star</i>
                          <i class="material-icons star text-darken-4 icon-star">star</i>
                          <i class="material-icons star-desactivate text-darken-4 icon-star">star</i>
                          <p class="count-star-video">
                            (14)
                          </p>
                        </div>
                      </div>
                      <div class="row" style="display:block">
                        <div class="col s12">
                          <img class="img-gif" src="https://meetup.kms-technology.com/common/img/loading.gif" alt="">
                        </div>
                      </div>
                      <div class="row">

                      </div>
                      <div class="row padding-top-element">
                        <p class="align-center label-white label-word">Richar M.</p>
                        <p class="align-center label-white without-margin-top without-margin-bottom">Cardiología</p>
                        <p class="align-center label-white without-margin-top">S/. 5.00 por consulta</p>

                      </div>
                      <div class="row">
                        <div class="col s3">

                        </div>
                        <div class="col s6">
                          <a class="icon-mute btn-floating btn-large waves-effect waves-light button-green"><i class="material-icons">keyboard_voice</i></a>
                          <a class="btn-miss center waves-effect waves-light btn-large button-red modal-close"><i class="icon-miss material-icons">call_end</i></a>
                          <a class="btn-floating btn-large waves-effect waves-light button-green"><i class="material-icons">videocam</i></a>

                        </div>
                        <div class="col s3">

                        </div>
                      </div>

                    </div>

                  </div> -->
                  <!-- INTERFAZ LLAMADA END -->
                  <!-- INTERFAZ LLAMADA -->
                  <!-- <div id="modalCallStablished" class="modal bottom-sheet video-cawhitell">
                    <div class="modal-content">
                      <div class="zoom align-left">

                      </div>
                      <div class="row">
                        <div class="content-video">
                          <div class="another-screen">

                          </div>
                        </div>
                      </div>
                      <div class="row" style="display:block">
                        <div class="col s12">
                        </div>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col s1">

                      </div>
                      <div class="col s5">
                        <div class="row">
                          <p class="align-center label-white label-word" style="font-size: 16px;">Richar M.</p>
                          <p class="align-center label-white without-margin-top without-margin-bottom">Cardiología</p>
                          <p class="align-center label-white without-margin-top">S/. 5.00 por consulta</p>

                        </div>
                      </div>
                      <div class="col s5">
                        <div class="row section-star">
                          <div class="start-content-call">
                            <i class="material-icons star text-darken-4 icon-star">star</i>
                            <i class="material-icons star text-darken-4 icon-star">star</i>
                            <i class="material-icons star text-darken-4 icon-star">star</i>
                            <i class="material-icons star text-darken-4 icon-star">star</i>
                            <i class="material-icons star-desactivate text-darken-4 icon-star">star</i>

                        </div>
                        <div class="row">
                          <div class="col s2">

                          </div>
                          <div class="col s8">
                            <a class="icon-mute btn-floating btn-large waves-effect waves-light button-green"><i class="material-icons">keyboard_voice</i></a>
                            <a onclick="modalFinishCall()" class="btn-miss center waves-effect waves-light btn-large button-red modal-trigger" href="#modalFinishCall"><i class="icon-miss material-icons">call_end</i></a>
                            <a class="btn-floating btn-large waves-effect waves-light button-green"><i class="material-icons">videocam</i></a>

                          </div>


                          <div class="col s2">

                          </div>
                        </div>
                      </div>
                      </div>
                      <div class="col s1">

                      </div>
                    </div>

                  </div> -->
                  <!-- INTERFAZ LLAMADA END -->
                  <!-- INTERFAZ LLAMADA -->
                </div>
                <div id="modalVideo" class="modal bottom-sheet video-call">
                    <div class="modal-content video-call">
                      <div class="row">
                        <div class="col s2">
                          <img src="{{ asset('assets/images/logo.png') }}" alt="" width="150px;">
                        </div>
                        <div class="col s8 center">
                          <a href="#">
                            <i class="material-icons icon-call">person_add</i>
                          </a>
                          <a href="#">
                            <i class="material-icons icon-call">keyboard_voice</i>
                          </a>
                          <a id="video-icon" href="#" onclick="verVideo()">
                            <i  style="" class="material-icons icon-call">videocam</i>
                          </a>
                          <a id="video-icon-d" hidden href="#" onclick="ocultarVideo()">
                            <i class="material-icons icon-call">videocam_off</i>
                          </a>
                          <a href=""><i class="material-icons icon-call">network_cell</i></a>

                          <a href=""><i class="material-icons icon-call">settings_applications</i></a>
                          <a href="#modalFinishCall" onclick="modalFinishCall()" class="modal-trigger "><i class="icon-miss material-icons" style="color: red">call_end</i></a>
                          <!-- <a onclick="modalFinishCall()" class="waves-effect icon-miss waves-light modal-trigger" href="#modalFinishCall"><i style="color: red" class="icon-miss material-icons">call_end</i></a> -->

                          <!-- <a class="btn-floating btn-large waves-effect waves-light button-green"><i class="material-icons">videocam</i></a> -->
                        </div>

                        <div class="col s1 right">
                          <a onclick="modalMessage()" href="#modalMessage" class="modal-trigger"><i class="material-icons icon-call">message</i></a>
                        </div>




                        <div class="col s2">
                        </div>
                      </div>
                      <div class="row">
                        <div class="width: 100px; height: 50px;position: absolute;border: 1px solid #FFFFFF">

                        </div>
                      </div>


                    </div>

                  </div>
                <div id="modalCalled" class="modal bottom-sheet video-call" >
                    <div class="modal-content video-call" style="padding-bottom: 0px">
                      <div class="row">
                        <div class="col s2">
                          <img src="{{ asset('assets/images/logo.png') }}" alt="" width="150px;">
                        </div>
                        <div class="col s8 center">
                          <a href="#">
                            <i class="material-icons icon-call">person_add</i>
                          </a>
                          <a href="#">
                            <i class="material-icons icon-call">keyboard_voice</i>
                          </a>
                          <a id="video-icon" href="#" onclick="verVideo()">
                            <i  style="" class="material-icons icon-call">videocam</i>
                          </a>
                          <a id="video-icon-d" hidden href="#" onclick="ocultarVideo()">
                            <i class="material-icons icon-call">videocam_off</i>
                          </a>
                          <a href=""><i class="material-icons icon-call">network_cell</i></a>

                          <a href=""><i class="material-icons icon-call">settings_applications</i></a>
                          <a href="#modalFinishCall" onclick="modalFinishCall()" class="modal-trigger "><i class="icon-miss material-icons" style="color: red">call_end</i></a>
                          <!-- <a onclick="modalFinishCall()" class="waves-effect icon-miss waves-light modal-trigger" href="#modalFinishCall"><i style="color: red" class="icon-miss material-icons">call_end</i></a> -->

                          <!-- <a class="btn-floating btn-large waves-effect waves-light button-green"><i class="material-icons">videocam</i></a> -->
                        </div>

                        <div class="col s1 right">
                          <a onclick="modalMessage();activarChat()" href="#modalMessage" class="modal-trigger"><i class="material-icons icon-call">message</i></a>
                        </div>




                        <div class="col s2">
                        </div>
                      </div>
                      <div class="row">
                        <div id="proceso" style="display: block" class="content-video">
                          <div class="row center padding-top-element">
                            <div class="container" style="margin : 0px 0px 0px 0px !important; width: 100% !important">
                              <div class="frame">
                                <div id="call">
                                  <form id="newCall">
                                    <audio id="ringback" src='assets/js/video/style/ringback.wav' loop></audio>
                                    <audio id="ringtone" src='assets/js/video/style/phone_ring.wav' loop></audio>
                                  </form>
                                </div>
                                <div class="row">
                                  <div class="col s8">
                                    <video style="border: solid 1px white; width: 100%; height: 550px;" id="outgoing" autoplay muted></video>
                                  </div>
                                  <div class="col s4 left">
                                    <video style="border: solid 1px white; width: 95%" id="incoming" autoplay></video>

                                    <br>
                                    <img class="margin-top-element img-video" src="{{ asset('assets/images/doctor.jpg') }}" alt="" width="80px">
                                    <div class="">
                                      <p id="estadoLlamada" class="label-white center" style="margin-bottom: 0px !important;">Llamando a Ricardo S.</p>
                                      <p class="label-white center" style="margin-top: 0px !important;">Cardiología</p>
                                      <div class="row without-padding-right">
                                        <i class="material-icons star text-darken-4 icon-star">star</i>
                                        <i class="material-icons star text-darken-4 icon-star">star</i>
                                        <i class="material-icons star text-darken-4 icon-star">star</i>
                                        <i class="material-icons star text-darken-4 icon-star">star</i>
                                        <i class="material-icons star-desactivate text-darken-4 icon-star">star</i>
                                      </div>
                                      <label class="label-white center">Precio:</label><br>
                                      <label class="label-white center">S/. 5.00 por consulta</label>
                                      <div class="time padding-bottom-element">
                                        <label id="minutes" class="label-time label-white">00</label>
                                        <label class="label-time label-white">:</label>
                                        <label class="label-time label-white" id="seconds">00</label>
                                      </div>
                                      <div id="gifLlamada" style="display:block">
                                        <img class="img-gif" src="https://www.rogers.com/web/smb/bss/images/widget-loader-lg_no-lang.gif" alt="" height="100px">
                                      </div>
                                    </div>
                                  </div>
                                </div>

                              </div>
                            </div>
                          </div>
                          <!-- <div class="another-screen-call">
                          </div> -->


                        </div>
                        <div class="margin-top-element">
                          <video class="margin-top-element" autoplay="true" id="thevideo"  style="display: none; width: 100%; height: 80%" hidden></video>
                        </div>
                      </div>

                    </div>

                  </div>

              <div class="another-doctor row center" id="otroMedico" style="display: block">
                <div class="row">
                  <div class="col s12">
                    <p class="text-center without-margin-top">
                      <b>
                        ¿Desea ver otro médico?
                      </b>
                    </p>
                  </div>
                </div>
                <div class="row section-call">
                  <div class="col s4">
                  </div>
                  <div class="col s4">
                    <a onclick="recomendarOtro()" class="format waves-effect btn button-green">
                      Si
                    </a>
                    &nbsp;
                    <!-- <a onclick="ocultarVerOtroMedico()" class="waves-light waves-effect btn button-color-orange">
                      No
                    </a> -->
                    <a onclick="ocultarVerOtroMedico()" class="format waves-effect waves-light btn btn-color-orange modal-trigger" style="width: 75px;">
                      <i class="material-icons left"></i>No</a>
                  </div>
                  <div class="col s4">
                  </div>
                </div>
              </div>
          </form>

          <form class="col s12" id="doctor2" style="display: none">
              <div class="row">
                <div class="col s4 m4">
                </div>
                <div class="col s4 m4 center margin-top-element">
                  <img class="doctor-image" src="{{ asset('assets/images/medico.png') }}" alt="" width="40%">
                </div>
                <div class="col s4 m4">
                </div>
              </div>
              <div class="row text-center">
                <div class="col s12 md12">
                  <h5 class="without-margin-bottom">Richar P.</h5>
                </div>
              </div>
                <div class="row text-center">
                  <div class="col s4 md4">
                  </div>
                  <div class="col s4 m4">
                    <div class="row">
                      <div class="col s2">

                      </div>
                      <div class="col s7 without-padding-right">
                        <i class="material-icons star text-darken-4 icon-star">star</i>
                        <i class="material-icons star text-darken-4 icon-star">star</i>
                        <i class="material-icons star text-darken-4 icon-star">star</i>
                        <i class="material-icons star text-darken-4 icon-star">star</i>
                        <i class="material-icons star-desactivate text-darken-4 icon-star">star</i>
                      </div>
                      <div class="col s3" style="text-align: left;padding-left: 0px">
                        <span class="count-star" style="">(14)</span>
                      </div>
                      <div class="col s1">

                      </div>
                    </div>
                  </div>
                  <div class="col s4"></div>
                </div>
                <div class="row">
                  <div class="col s4">
                  </div>
                  <div class="col s4 text-center">
                    <label>Hombre, 26 años de Lima</label><br>
                    <b>Especialidad: </b><label> Cardiologia</label><br>
                    <b>Precio: </b> <label> S/. 5.00 por consulta</label><br>
                  </div>
                  <div class="col s4">
                  </div>
                </div>
                <div class="row">
                  <div class="col s12">
                    <p class="text-center">
                      <b>
                        Datos del médico
                      </b>
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 center">
                    <span class="text-center">El doctor lang es especialista en la evaluacion y tratamiento
                      de la enfermedad de vitreonitales de la vista
                    </span>
                  </div>
                </div>
                <div class="row text-center">
                  <div class="col s12">
                    <p class="text-center">
                      <b>
                        ¿Cómo desea comunicarse con el doctor?
                      </b>
                    </p>
                  </div>
                </div>
                <div class="row center section-call">
                  <div class="col s4"></div>
                  <div class="col s4">
                    <a onclick="makeCall()" href="#modalCalled" class="format waves-effect waves-light btn modal-trigger" style="background-color: #868686">
                      <i class="material-icons left">local_phone</i>
                      Voz
                    </a>
                    &nbsp;
                    <a onclick="makeCall()" href="#modalCalled" class="format waves-effect waves-light btn btn-color-orange modal-trigger" style="background-color: #868686">
                      <i class="material-icons left">videocam</i>Video</a>
                  </div>
                  <!-- INTERFAZ LLAMADA INCOMING-->
                  <div id="modalCall" class="modal bottom-sheet video-call">
                    <div class="modal-content">
                      <div class="zoom align-left">
                        <i class="material-icons icon-fullscreen">zoom fullscreen</i>

                      </div>
                      <div class="row">
                        <img class="img-video" src="http://www.kauveryhospital.com/doctorimage/Dr.%20Balamurali-Dec-11-2015-02-21-05-Dr_Bala-Murali.jpg" alt="" width="150px">
                      </div>
                      <div class="row section-star">
                        <div class="start-content">
                          <i class="material-icons star text-darken-4 icon-star">star</i>
                          <i class="material-icons star text-darken-4 icon-star">star</i>
                          <i class="material-icons star text-darken-4 icon-star">star</i>
                          <i class="material-icons star text-darken-4 icon-star">star</i>
                          <i class="material-icons star-desactivate text-darken-4 icon-star">star</i>
                          <p class="count-star-video">
                            (14)
                          </p>
                        </div>
                      </div>
                      <div class="row" style="display:block">
                        <div class="col s12">
                          <img class="img-gif" src="https://meetup.kms-technology.com/common/img/loading.gif" alt="">
                        </div>
                      </div>
                      <div class="row">

                      </div>
                      <div class="row padding-top-element">
                        <p class="align-center label-white label-word">Richar M.</p>
                        <p class="align-center label-white without-margin-top without-margin-bottom">Cardiología</p>
                        <p class="align-center label-white without-margin-top">S/. 5.00 por consulta</p>
                        <!-- <div class="time padding-top-element padding-bottom-element">
                          <label id="minutes" class="label-time label-white">00</label>
                          <label class="label-time label-white">:</label>
                          <label class="label-time label-white" id="seconds">00</label>
                        </div> -->
                      </div>
                      <div class="row">
                        <div class="col s3">

                        </div>
                        <div class="col s6">
                          <a class="icon-mute btn-floating btn-large waves-effect waves-light button-green"><i class="material-icons">keyboard_voice</i></a>
                          <a class="btn-miss center waves-effect waves-light btn-large button-red modal-close"><i class="icon-miss material-icons">call_end</i></a>
                          <a class="btn-floating btn-large waves-effect waves-light button-green"><i class="material-icons">videocam</i></a>

                        </div>
                        <div class="col s3">

                        </div>
                      </div>

                    </div>
                    <!-- <div class="modal-footer">
                      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
                    </div> -->
                  </div>
                  <!-- INTERFAZ LLAMADA END -->
                  <!-- INTERFAZ LLAMADA -->
                  <div id="modalCallStablished" class="modal bottom-sheet video-cawhitell">
                    <div class="modal-content">
                      <div class="zoom align-left">
                        <!-- <i class="material-icons icon-fullscreen">zoom fullscreen</i> -->

                      </div>
                      <div class="row">
                        <div class="content-video">
                          <div class="another-screen">

                          </div>
                        </div>
                        <!-- <img class="img-video" src="http://www.kauveryhospital.com/doctorimage/Dr.%20Balamurali-Dec-11-2015-02-21-05-Dr_Bala-Murali.jpg" alt="" width="150px"> -->
                      </div>
                      <div class="row" style="display:block">
                        <div class="col s12">
                          <!-- <img class="img-gif" src="https://meetup.kms-technology.com/common/img/loading.gif" alt=""> -->
                        </div>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col s1">

                      </div>
                      <div class="col s5">
                        <div class="row">
                          <p class="align-center label-white label-word" style="font-size: 16px;">Richar M.</p>
                          <p class="align-center label-white without-margin-top without-margin-bottom">Cardiología</p>
                          <p class="align-center label-white without-margin-top">S/. 5.00 por consulta</p>
                          <!-- <div class="time padding-bottom-element">
                            <label id="minutes" class="label-time label-white">00</label>
                            <label class="label-time label-white">:</label>
                            <label class="label-time label-white" id="seconds">00</label>
                          </div> -->
                        </div>
                      </div>
                      <div class="col s5">
                        <div class="row section-star">
                          <div class="start-content-call">
                            <i class="material-icons star text-darken-4 icon-star">star</i>
                            <i class="material-icons star text-darken-4 icon-star">star</i>
                            <i class="material-icons star text-darken-4 icon-star">star</i>
                            <i class="material-icons star text-darken-4 icon-star">star</i>
                            <i class="material-icons star-desactivate text-darken-4 icon-star">star</i>
                            <!-- <p class="count-star-video">
                            (14)
                          </p> -->
                        </div>
                        <div class="row">
                          <div class="col s2">

                          </div>
                          <div class="col s8">
                            <a class="icon-mute btn-floating btn-large waves-effect waves-light button-green"><i class="material-icons">keyboard_voice</i></a>
                            <a onclick="modalFinishCall()" class="btn-miss center waves-effect waves-light btn-large button-red modal-trigger" href="#modalFinishCall"><i class="icon-miss material-icons">call_end</i></a>
                            <a class="btn-floating btn-large waves-effect waves-light button-green"><i class="material-icons">videocam</i></a>

                          </div>
                          <!-- <div id="modalFinishCall" class="modal" style="background-color: #FFFFFF !important">
                            <div class="modal-content">
                              <h5>Finalizar Llamada</h5>
                              <p class="align-center">¿Estas seguro que deseas finalizar la llamada?</p>
                              <a onclick="recomendarOtro()" class="waves-effect btn button-green">
                                Si
                              </a>
                              &nbsp;
                              <a onclick="ocultarVerOtroMedico()" class="waves-effect btn button-orange">
                                No
                              </a>
                            </div>

                          </div> -->

                          <div class="col s2">

                          </div>
                        </div>
                      </div>
                      </div>
                      <div class="col s1">

                      </div>
                    </div>
                    <!-- <div class="modal-footer">
                      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
                    </div> -->
                  </div>
                  <!-- INTERFAZ LLAMADA END -->
                  <!-- INTERFAZ LLAMADA -->
                  <div id="modalCalled" class="modal bottom-sheet video-call">
                    <div class="modal-content video-call">
                      <div class="row">
                        <div class="col s2">
                          <img src="{{ asset('assets/images/logo.png') }}" alt="" width="150px;">
                        </div>
                        <div class="col s8 center">
                          <a href="#">
                            <i class="material-icons icon-call">person_add</i>
                          </a>
                          <a href="#">
                            <i class="material-icons icon-call">keyboard_voice</i>
                          </a>
                          <a id="video-icon" href="#" onclick="verVideo()">
                            <i  style="" class="material-icons icon-call">videocam</i>
                          </a>
                          <a id="video-icon-d" hidden href="#" onclick="ocultarVideo()">
                            <i class="material-icons icon-call">videocam_off</i>
                          </a>
                          <a href=""><i class="material-icons icon-call">network_cell</i></a>

                          <a href=""><i class="material-icons icon-call">settings_applications</i></a>
                          <a href=""><i class="icon-miss material-icons" style="color: red">call_end</i></a>
                          <!-- <a class="btn-floating btn-large waves-effect waves-light button-green"><i class="material-icons">videocam</i></a> -->
                        </div>
                        <div class="col s1 right">
                          <a href=""><i class="material-icons icon-call">message</i></a>
                        </div>
                        <div class="col s2">
                        </div>
                      </div>
                      <div class="row">
                        <div id="proceso" style="display: block" class="content-video">
                          <div class="row center padding-top-element">
                            <img class="margin-top-element img-video" src="{{ asset('assets/images/doctor.jpg') }}" alt="" width="80px">
                            <div class="">
                              <p class="label-white center">Llamando a Ricardo</p>
                              <img class="img-gif" src="https://www.rogers.com/web/smb/bss/images/widget-loader-lg_no-lang.gif" alt="" height="100px">
                            </div>
                          </div>
                        </div>
                        <div class="margin-top-element">
                          <video class="" autoplay="true" id="thevideo"  style="display: none; width: 100%; height: 80%" hidden></video>
                        </div>
                      </div>

                    </div>

                  </div>
                </div>

              <div class="another-doctor row center" id="otroMedico" style="display: block">
                <div class="row">
                  <div class="col s12">
                    <p class="text-center without-margin-top">
                      <b>
                        ¿Desea ver otro médico?
                      </b>
                    </p>
                  </div>
                </div>
                <div class="row section-call">
                  <div class="col s4">
                  </div>
                  <div class="col s4">
                    <a onclick="recomendarOtro()" class="waves-effect btn button-green format">
                      Si
                    </a>
                    &nbsp;
                    <a onclick="ocultarVerOtroMedico()" class="format waves-effect waves-light btn btn-color-orange modal-trigger" style="width: 75px;">
                      <i class="material-icons left"></i>No</a>
                  </div>
                  <div class="col s4">
                  </div>
                </div>
              </div>
          </form>

        </div>
      </div>
    </div>
  </div>
  <!-- MODAL SALIR LLAMADA -->
  <div id="modalFinishCall" class="modal" style="background-color: #ffffff; left:0px !important">
    <div class="modal-cabecera">
      <div class="row">
        <div class="col s6">
          <div class="left title-modal" style="padding-left: 10px;">
            <h5 class="color-white" style="font-size: 20px;"> <b>Detalle de Consulta</b> </h5>
          </div>
        </div>
        <div class="col s6">
          <div class="right title-modal" style="padding-right: 10px;">
            <a class="modal-close" style="color:#383737de">
              <h5>x</h5>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-content center">
      <h5>Finalizar Llamada</h5>
      <p class="align-center">¿Estas seguro que deseas finalizar la llamada?</p>

    </div>
    <div class="modal-pie right">
      <div class="right">
        <a href="/user-califica" class="format waves-effect btn button-green">
          Si
        </a>
        &nbsp;
        <a class="format modal-close waves-effect btn button-orange" style="background-color: #e22715">
          No
        </a>
      </div>
    </div>
  </div>
  <!-- MODAL MESSAGE -->
  <!-- Modal Trigger -->
  <!-- <a onclick="modalMessage()" class="waves-effect waves-light btn modal-trigger" href="#modalMessage">Modal</a> -->
  <!-- Modal Structure -->
  <div id="modalMessage" class="modal-message modal bottom-sheet" style="left: inherit">
    <div class="row margin-bottom-element" style="position: absolute; background-color: #FFFFFF; color: #000000;width:100%">
      <div class="col s12 center">
        <h5 style="">Chat y mensajeria</h5>
      </div>
    </div>
    <div class="modal-content margin-top-element">
      <!-- <div class="row margin-bottom-element border-bottom">
        <div class="col s12 center">
          <h5>Chat y mensajeria</h5>
        </div>
      </div> -->
      <div id="chat-contactos" style="display: none" class="row">
        @for ($i = 0; $i <= 3; $i++)
        <div class="row user-contact">
          <div class="contact" style="margin-bottom: 25px;">
            <div class="col s2">
              <a href="#" onclick="verMensajes()">
                <img class="img-chat-user" src="{{ asset('assets/images/user_chat.jpg') }}" alt="" width="40px" style="border-radius: 50%">
              </a>
            </div>
            <div class="col s10">
              <div class="row">
                <div class="col s7">
                  <a href="#">
                    <label for="">sebastian</label>
                  </a>
                </div>
                <div class="col s5">
                  <label for="">7:22 a.m.</label>
                </div>
              </div>
              <div class="row">
                <div class="col s12">
                  <label for="">hola doctor Ricardo, le escribia ...</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endfor
      </div>
      <div id="chat-mensajeria" class=" ">
        <div class="row margin-bottom-element" style="">
          @for($i=0; $i < 3 ; $i++)
          <div class="row margin-bottom-element">
            <div class="left col s12">

              <div class="row">
                <div class="col s10">
                  <div class="chip chip-color">
                    <img src="{{ asset('assets/images/doctor.jpg') }}" alt="Contact Person">
                    <a href="#" style="color:#000000">
                      Ricardo S.
                    </a>
                  </div>
                </div>
                <div class="col s2">
                  <label style="text-align: right">7:36</label>
                </div>
              </div>

              <div class="message-chat row" >
                Hola A Jhon, como estas, mira sobre el malestar que te aqueja
                en el estomago, de acuerdo a los analisis del laboratorio,
                tengo que pedirte los siguientes medicamentos.
              </div>
            </div>
          </div>
          <div class="row padding-bottom-element">
            <div class="left col s12">
              <div class="row">
                <div class="col s2">
                  <label style="text-align: right">7:40</label>
                </div>
                <div class="col s10">
                  <div class="chip chip-color right">
                    <img src="{{ asset('assets/images/usuario_chat.jpg') }}" alt="Contact Person">
                    <a href="#" style="color: #000000">
                      Jhon D.
                    </a>
                  </div>
                </div>
              </div>
              <div class="message-chat-oher" style="margin-top: 0px !important;">
                Doctor Ricardo, un gusto, si por favor, me ṕodría Enviar
                la receta indicada, un favor este malestar verdaderamente
                me incomoda
              </div>
            </div>

          </div>
          @endfor
        </div>

      </div>
    </div>
    <div class="row" style="bottom:0; position: fixed;padding: 5px 0px 0px 25px; min-width: 100%; background-color: #FFFFFF">
      <textarea id="textarea1" onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" class="materialize-textarea" style="min-height: inherit" placeholder="Escriba un mensaje ..." style="color: #000000 !important; line-height: 3rem !important"></textarea>
      <p style="padding-left: 360px; margin-top: -75px">
        <a href="#" style="color: black">
          <i class="material-icons">send</i>
        </a>
      </p>
    </div>
  </div>
  <!-- MODAL MESSAGE END -->
  <!-- MODAL SALIR LLAMADA END -->
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/js/video/sinch.min.js') }}"></script>
<script type="text/javascript">

    function verMensajes(){
      document.getElementById("chat-contactos").style.display = "none";
      document.getElementById("chat-mensajeria").style.display = "block";
    }
    function verContactos(){
      document.getElementById("chat-contactos").style.display = "block";
      document.getElementById("chat-mensajeria").style.display = "none";
    }
    function ocultarVideo(){
      // document.getElementById("video-icon-d").style.visibility = 'hidden';
      // document.getElementById("video-icon").style.visibility= 'visible';
      document.getElementById("proceso").style.display = 'block';
      document.getElementById("thevideo").style.display= 'none';
    }
    function verVideo(){
      document.getElementById("proceso").style.display= 'none';
      document.getElementById("thevideo").style.display = 'block';
      // document.getElementById("video-icon-d").style.visibility = 'visible';
      // document.getElementById("video-icon").style.visibility= 'hidden';

      var video = document.querySelector("#thevideo");

      navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;

      if (navigator.getUserMedia) {
        navigator.getUserMedia({video: true}, handleVideo, videoError);
      }

      function handleVideo(stream) {
        video.src = window.URL.createObjectURL(stream);
      }

      function videoError(e) {
        alert("error loading camera");
      }
    }

  function mostrar(){
    document.getElementById("content").classList.remove('s11');
    document.getElementById("content").classList.remove('m11');
    document.getElementById("content").classList.add('s10');
    document.getElementById("content").classList.add('m10');
    document.getElementById("nav0").style.display = 'block';
    document.getElementById("nav1").style.display = 'none';
    document.getElementById("logofarma").style.display = 'block';
    document.getElementById("logofarma1").style.display = 'none';
    document.getElementById("hamb1").style.display = 'block';
    document.getElementById("hamb").style.display = 'none';
    document.getElementById("nueva-consulta").style.paddingLeft = '4%';
  }
  function ocultar(){
    document.getElementById("content").classList.remove('s10');
    document.getElementById("content").classList.remove('m10');
    document.getElementById("content").classList.add('s11');
    document.getElementById("content").classList.add('m11');
    document.getElementById("nav0").style.display = 'none';
    document.getElementById("nav1").style.display = 'block';
    document.getElementById("logofarma").style.display = 'none';
    document.getElementById("logofarma1").style.display = 'block';
    document.getElementById("hamb1").style.display = 'none';
    document.getElementById("hamb").style.display = 'block';
    document.getElementById("nueva-consulta").style.paddingLeft = '2%';
  }
  function hablar() {

    if (window.hasOwnProperty('webkitSpeechRecognition')) {

      var recognition = new webkitSpeechRecognition();

      recognition.continuous = false;
      recognition.interimResults = false;

      recognition.lang = "es-PE";
      recognition.start();

      recognition.onresult = function(e) {
        console.log(e.results[0][0].transcript);
        console.log(document.getElementById('consulta'));
        document.getElementById('textarea1').value = e.results[0][0].transcript;
        recognition.stop();
        //document.getElementById('labnol').submit();
      };

      recognition.onerror = function(e) {
        recognition.stop();
      }

    }
  }
  function ocultarVerOtroMedico(){
    document.getElementById("otroMedico").style.display = 'none'
  }

  function recomendarOtro(){
    document.getElementById("doctor1").style.display = 'none';
    document.getElementById("doctor2").style.display = 'block';
  }



  //VIDEO

    var sinchClient;
    var callClient;
    var call;

    var callListeners = {
      onCallProgressing: function(call) {

        $('audio#ringback').prop("currentTime",0);
        $('audio#ringback').trigger("play");

        // icon gif displayed
        document.getElementById('gifLlamada').style.display = 'none';
        // document.getElementById('estadoLlamada').value = 'llamando a ..';
        //Report call stats
        $('div#callLog').append('<div id="stats">Ringing...</div>');
      },
      onCallEstablished: function(call) {
        $('video#outgoing').attr('src', call.outgoingStreamURL);
        $('video#incoming').attr('src', call.incomingStreamURL);
        $('audio#ringback').trigger("pause");
        $('audio#ringtone').trigger("pause");

        // icon gif don't displayed
        document.getElementById('gifLlamada').style.display = 'none';
        // document.getElementById('estadoLlamada').value = 'llamada establecida';
        //Report call stats
        var callDetails = call.getDetails();
      },
      onCallEnded: function(call) {

        $('audio#ringback').trigger("pause");
        $('audio#ringtone').trigger("pause");

        $('video#outgoing').attr('src', '');
        $('video#incoming').attr('src', '');

        $('#modalCalled').modal('close');

        //Report call stats
        var callDetails = call.getDetails();
      }
    }

    //export function  videoInit(){
    var global_username = '';

    /*** After successful authentication, show user interface ***/
    var showUI = function() {
      console.log("shdfgdfgowUI");
    }
    /*** If no valid session could be started, show the login interface ***/
    var clearError = function() {
      $('div.error').hide();
    }

    var login = function(){
      console.log("login");
      clearError();

      var signInObj = {username: 'cristobal', password: '123456'};

      //Use Sinch SDK to authenticate a user
      sinchClient.start(signInObj, function() {
        global_username = signInObj.username;
        //On success, show the UI
        showUI();

        //Store session & manage in some way (optional)
        localStorage[sessionName] = JSON.stringify(sinchClient.getSession());
      }).fail(handleError);

    }
    var showLoginUI = function() {
      console.log("showLoginUI");
      //$('form#userForm').css('display', 'inline');
      login();
    }
    //*** Set up sinchClient ***/

    sinchClient = new SinchClient({
      applicationKey: '798996bb-fc49-4369-90ad-fab14011afce',
      capabilities: {calling: true, video: true},
      supportActiveConnection: true,
      //Note: For additional loging, please uncomment the three rows below
      onLogMessage: function(message) {
        console.log(message);
      },
    });

    sinchClient.startActiveConnection();

    /*** Name of session, can be anything. ***/

    var sessionName = 'VIDEO-' + sinchClient.applicationKey;


    /*** Check for valid session. NOTE: Deactivated by default to allow multiple browser-tabs with different users. ***/
    localStorage.removeItem(sessionName);
    var sessionObj = JSON.parse(localStorage[sessionName] || '{}');
    if(sessionObj.userId) {
      sinchClient.start(sessionObj)
        .then(function() {
          global_username = sessionObj.userId;
          //On success, show the UI
          showUI();
          //Store session & manage in some way (optional)
          localStorage[sessionName] = JSON.stringify(sinchClient.getSession());
        })
        .fail(function() {
          //No valid session, take suitable action, such as prompting for username/password, then start sinchClient again with login object
          showLoginUI();
        });
    }
    else {
      showLoginUI();
    }

    /*** Set up callClient and define how to handle incoming calls ***/

     callClient = sinchClient.getCallClient();
    callClient.initStream().then(function() { // Directly init streams, in order to force user to accept use of media sources at a time we choose
      $('div.frame').not('#chromeFileWarning').show();
    });
    call;

    callClient.addEventListener({
      onIncomingCall: function(incomingCall) {
      //Play some groovy tunes
      $('audio#ringtone').prop("currentTime",0);
      $('audio#ringtone').trigger("play");


      //Print statistics
      $('div#callLog').append('<div id="title">Incoming call from ' + incomingCall.fromId + '</div>');
      $('div#callLog').append('<div id="stats">Ringing...</div>');
      $('button').addClass('incall');

      //Manage the call object
        call = incomingCall;
        call.addEventListener(callListeners);
      $('button').addClass('callwaiting');
      }
    });

    $('button#answer').click(function(event) {
      event.preventDefault();

      if($(this).hasClass("callwaiting")) {
        clearError();

        try {

          call.answer();


          $('button').removeClass('callwaiting');
        }
        catch(error) {
          handleError(error);
        }
      }
    });

    /*** Make a new data call ***/
    function videoCall(){
      console.log("LLAMANDO");
        clearError();
        var usernameCall="alexis";
        console.log('Placing call to: ' + usernameCall);
        call = callClient.callUser(usernameCall);

        call.addEventListener(callListeners);
    }
    /*** Hang up a call ***/

    $('button#hangup').click(function(event) {
      console.log("Terminar llamada");
      event.preventDefault();

      if($(this).hasClass("incall")) {
        clearError();

        console.info('Will request hangup..');

        call && call.hangup();
      }
    });


    /*** Handle errors, report them and re-enable UI ***/

    var handleError = function(error) {
      //Enable buttons
      $('button#createUser').prop('disabled', false);
      $('button#loginUser').prop('disabled', false);

      //Show error
      $('div.error').text(error.message);
      $('div.error').show();
    }

    /** Always clear errors **/


    /** Chrome check for file - This will warn developers of using file: protocol when testing WebRTC **/
    if(location.protocol == 'file:' && navigator.userAgent.toLowerCase().indexOf('chrome') > -1) {
      $('div#chromeFileWarning').show();
    }

    $('button').prop('disabled', false); //Solve Firefox issue, ensure buttons always clickable after load

    function activarChat(){
      document.getElementById('modalMessage').style.left = 'inherit'
    }
</script>
