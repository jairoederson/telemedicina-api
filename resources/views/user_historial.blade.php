@extends('layouts.material')
@section('content')
<div id="historial" class="content">
      <div class="row content-inside">
        <div class="row">
          <div class="col s9 title-color left padding-left-element" >
            <h6 class="title-content content-title">
              <b>
                HISTORIAL DE CONSULTAS
              </b>
            </h6>
          </div>
          <div class="col s3 title-color center" >
            <div class="row" style="background-color: white; height: 36px;margin-top: 5px; border-radius:25px;">
              <div class="col s1">

              </div>
              <div class="col s10">
                <div class="col s10" style="padding-left:0px;margin-left:-15px;">
                  <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" type="text" name="" placeholder="Buscar consulta ..." value="" style="margin-top: 0px;height:2.5rem;border-bottom: none;">
                </div>
                <div class="col s2 right">
                  <i class="material-icons icon-search" style="padding-top: 5px; margin-left: 15px; color:#adadad">search</i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col s12 m12">
           @for($i=0; $i<=4; $i++)
            <div class="historial-row">
              <div class="row">
                <div class="col s6 selectable">
                  <div class="row">
                      <div class="col s5 center" style="padding-left: 0px;">
                        <a onclick="mod()" style="padding-top: 8px" class="waves-effect waves-light modal-trigger" href="#modal1">
                          <img class="doctor-image" src="{{ asset('assets/images/doctor.jpg') }}" alt="" width="110px"><br>
                          <!-- <span class="doctor-exp">Exp: 10 años</span> -->
                          <div class="row" style="padding-top: 5px">
                            <div class="col s2" style="text-align: left;margin-left: 0px">
                              <p style="color: #000000; margin-top: 8px; padding-left:12px;">(14)</p>
                            </div>
                            <div class="col s10" style="padding-left: 13px;">
                              <i style="width:0px;" class="star star-style star-m material-icons star text-darken-4">star</i>
                              <i style="width:0px;" class="star star-style star-m material-icons text-darken-4">star</i>
                              <i style="width:0px;" class="star star-style star-m material-icons text-darken-4">star</i>
                              <i style="width:0px;" class="star star-style star-m material-icons text-darken-4">star</i>
                              <i style="width:0px;" class="star-style star-m material-icons star-desactivate">star</i>
                            </div>
                          </div>
                        </a>
                        <div id="modal1" class="modal modal-detalle-historial">

                          <div class="modal-cabecera">
                            <div class="row">
                              <div class="col s6">
                                <div class="left title-modal" style="padding-left: 10px;">
                                  <h5 class="color-white" style="font-size: 20px; "> <b>Detalle de Consulta</b> </h5>
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

                          <div class="modal-content" style="padding-top: 0px;">
                            <div class="row">
                              <!-- <a  class="btn-floating btn-small waves-effect waves-light modal-close" style="background-color:#ced0cd; position:absolute; margin-left: 200px; margin-top: -15px;"><i class="material-icons">close</i></a> -->
                            </div>
                            <div class="row border-bottom padding-bottom-element" style="margin-top:10px">
                              <div class="col s4">
                                <div class="center" style="padding-top: 10px;">
                                  <img src="{{ asset('assets/images/doctor.jpg') }}" style="border-radius: 50%;" alt="" width="110px">
                                </div>
                              </div>
                              <div class="col s8 align-left">
                                <label class="doctor-name">
                                  <b>Ricardo S.</b>
                                  (14)&nbsp;
                                  <i style="width:0px;" class="star star-style star-m material-icons star text-darken-4">star</i>
                                  <i style="width:0px;" class="star star-style star-m material-icons text-darken-4">star</i>
                                  <i style="width:0px;" class="star star-style star-m material-icons text-darken-4">star</i>
                                  <i style="width:0px;" class="star star-style star-m material-icons text-darken-4">star</i>
                                  <i style="width:0px;" class="star-style star-m material-icons star-desactivate">star</i>
                                </label> &nbsp;&nbsp;&nbsp;


                                <b class="negrita">Especialidad: </b><label>Cardiología</label><br>
                                <b class="negrita">Fecha: </b><label>04/10/17 </label><br>
                                <b class="negrita">Tiempo: </b>  <label>15 minutos</label><br>
                                <b class="negrita">Precio: </b><label>S/.5.00</label><br>
                              </div>

                            </div>
                            <div class="row">

                              <ul id="tabs-swipe-demo" class="tabs">
                                 <li class="tab col s6"><a class="active" href="#generalHistorial">General</a></li>
                                 <li class="tab col s6"><a  href="#convHistorial">Conversación</a></li>
                              </ul>
                               <div id="generalHistorial" class="col s12 align-left">
                                 <div class="row padding-top-element">
                                   <b>Síntoma del cliente</b>
                                 </div>
                                 <div class="row">
                                   <label for="">Dolor de cabeza, nauceas, diarréa</label>
                                 </div>
                                 <div class="row" style="padding-top:10px">
                                   <b>Mensaje del paciente</b>
                                 </div>
                                 <div class="row">
                                  Doctor me siento mal tengo nauceas y diarrea y me duele mucho la cabeza,
                                  por favor ayudeme, que puedo hacer para evitar el malestar.
                                 </div>
                                 <div class="row" style="padding-top:10px">
                                   <div class="">
                                     <b>Calificacion del cliente</b>
                                   </div>
                                   <div class="col s6">
                                     <i style="width:0px;" class="star star-style material-icons star text-darken-4">star</i>
                                     <i style="width:0px" class="star star-style material-icons text-darken-4">star</i>
                                     <i style="width:0px" class="star star-style material-icons text-darken-4">star</i>
                                     <i style="width:0px" class="star star-style material-icons text-darken-4">star</i>
                                     <i style="width:0px" class="star-style material-icons star-desactivate">star</i>
                                   </div>
                                 </div>
                                 <div class="left">
                                   <label><b>Calidad: </b>Excelente</label>
                                 </div>
                               </div>
                               <div id="convHistorial" class="padding-bottom-element col s12" style="height:226px; overflow:auto;">
                                 <div class="col s12" style="height: 230px !important; float: right">
                                     <!-- CONVERSACION -->
                                     <div class="row">
                                       <div class="chip left margin-top-element" style="background-color: #e4e4e4; color: #000000">
                                         <img src="{{ asset('assets/images/doctor.jpg') }}" alt="Contact Person">
                                         Ricardo S.
                                       </div>
                                       <div class="" style="padding-top: 30px;">
                                         <span style="margin-left: 220px;">9:31 am.</span>
                                       </div>
                                     </div>
                                     <div class="row">
                                       <div class="col s12" style="text-align: justify; background-color: #eceaea; padding: 15px; border-radius: 25px;">
                                         Hola carlos, es urgente tratar ese malestar, por favor sigue al pie de la letra las
                                         siguientes indicaciones
                                       </div>
                                     </div>
                                     <!-- CONVERSACION END-->

                                     <!-- CONVERSACION -->
                                     <div class="row">
                                       <div class="chip right margin-top-element" style="background-color: #e4e4e4; color: #000000">
                                         <img src="{{ asset('assets/images/paciente1.jpg') }}" alt="Contact Person">
                                         Carlos A.
                                       </div>
                                       <div class="left" style="padding-top: 30px;text-align:left">
                                         <span style="margin-left: 15px;">9:31 am.</span>
                                       </div>
                                     </div>
                                     <div class="row">
                                       <div class="col s12" style="text-align: justify; background-color: #eceaea; padding: 15px; border-radius: 25px;">
                                         Dr. Ricardo, muchas gracias por su atención al instante.
                                       </div>
                                     </div>
                                     <!-- CONVERSACION END -->

                                </div>

                               </div>

                            </div>


                          </div>
                          <div class="modal-pie right">
                            <div class="right">
                              <button type="button" name="button" class="btn button-green format">Ver Consulta</button>
                            </div>
                          </div>
                        </div>

                      </div>
                      <div class="col s5" style="padding-top: 5px;">
                        <label class="doctor-name"> <b>Ricardo S.</b> </label><br>
                        <b class="negrita">Especialidad: </b><label>Cardiología</label><br>
                        <b class="negrita">Fecha: </b><label>04/10/17 </label><br>
                        <b class="negrita">Tiempo: </b>  <label>15 minutos</label><br>
                        <b class="negrita">Precio: </b><label>S/.5.00</label><br>
                        <div style="padding-top: 15px;">
                          <button onclick="mod()" href="#modal1" class=" btn button-green modal-trigger" style="text-transform: none;height:35px;">Ver consulta</button>
                        </div>
                        <!-- <a onclick="mod()" class="historial-link waves-effect waves-light modal-trigger" >ver detalle</a> -->

                        <!-- <div class="row">
                          <div class="col s2" style="text-align: left;padding-left: 0px">
                            <span class="star" style="padding-left:0px;margin-bottom: 10px">(14)</span>
                          </div>
                          <div class="col s10" style="padding-left: 0px;">
                            <i style="width:1px" class="star material-icons text-darken-4">star</i>
                            <i style="width:1px" class="material-icons star text-darken-4">star</i>
                            <i style="width:1px" class="material-icons star text-darken-4">star</i>
                            <i style="width:1px" class="material-icons star text-darken-4">star</i>
                            <i style="width:1px" class="material-icons star-desactivate">star</i>
                          </div>
                        </div> -->
                      </div>
                      <div class="col s2">
                      </div>
                    </div>
                </div>
                <div class="col s6 selectable">
                  <div class="row">
                      <div class="col s5 center" style="padding-left: 0px;">
                        <a onclick="mod()" style="padding-top: 8px" class="waves-effect waves-light modal-trigger" href="#modal1">
                          <img class="doctor-image" src="{{ asset('assets/images/doctor.jpg') }}" alt="" width="110px"><br>
                          <!-- <span class="doctor-exp">Exp: 10 años</span> -->
                          <div class="row" style="padding-top: 5px">
                            <div class="col s2" style="text-align: left;padding-left: 0px">
                              <p style="color: #000000; margin-top: 8px; padding-left:12px;">(14)</p>
                            </div>
                            <div class="col s10" style="padding-left: 13px;">
                              <i style="width:0px; margin-right: 15px !important" class="star star-style material-icons star text-darken-4">star</i>
                              <i style="width:0px; margin-right: 15px !important" class="star star-style material-icons text-darken-4">star</i>
                              <i style="width:0px; margin-right: 15px !important" class="star star-style material-icons text-darken-4">star</i>
                              <i style="width:0px; margin-right: 15px !important" class="star star-style material-icons text-darken-4">star</i>
                              <i style="width:0px; margin-right: 15px !important" class="star-style material-icons star-desactivate">star</i>
                            </div>
                          </div>

                        </a>
                        <div id="modal1" class="modal modal-detalle-historial">
                          <div class="modal-content">
                            <div class="row">
                              <a  class="btn-floating btn-small waves-effect waves-light modal-close" style="background-color:#ced0cd; position:absolute; margin-left: 200px; margin-top: -15px;"><i class="material-icons">close</i></a>
                            </div>
                            <div class="row border-bottom padding-bottom-element" style="margin-top:10px">
                              <div class="col s4">
                                <div class="left" style="padding-top: 10px;">
                                  <img src="{{ asset('assets/images/doctor.jpg') }}" style="border-radius: 50%;" alt="" width="110px">
                                </div>
                              </div>
                              <div class="col s8 align-left">
                                <label class="doctor-name">
                                  <b>Ricardo S.</b>
                                </label> &nbsp;&nbsp;&nbsp; <p style="display: inline;margin-top: -90px;">(14)&nbsp;</p>
                                  <i style="width:0px; margin-right: 15px !important" class="star star-style material-icons star text-darken-4">star</i>
                                  <i style="width:0px; margin-right: 15px !important" class="star star-style material-icons text-darken-4">star</i>
                                  <i style="width:0px; margin-right: 15px !important" class="star star-style material-icons text-darken-4">star</i>
                                  <i style="width:0px; margin-right: 15px !important" class="star star-style material-icons text-darken-4">star</i>
                                  <i style="width:0px; margin-right: 15px !important" class="star-style material-icons star-desactivate">star</i>

                                <b class="negrita">Especialidad: </b><label>Cardiología</label><br>
                                <b class="negrita">Fecha: </b><label>04/10/17 </label><br>
                                <b class="negrita">Tiempo: </b>  <label>15 minutos</label><br>
                                <b class="negrita">Precio: </b><label>S/.5.00</label><br>
                              </div>

                            </div>
                            <div class="">
                              <ul id="tabs-swipe-demo" class="tabs">
                                 <li class="tab col s6"><a class="active" href="#test-swipe-1">General</a></li>
                                 <li class="tab col s6"><a  href="#test-swipe-2">Conversación</a></li>
                              </ul>
                               <div id="test-swipe-1" class="col s12 align-left">
                                 <div class="row padding-top-element">
                                   <b>Síntoma del cliente</b>
                                 </div>
                                 <div class="row">
                                   <label for="">Dolor de cabeza, nauceas, diarréa</label>
                                 </div>
                                 <div class="row padding-top-element">
                                   <b>Mensaje del paciente</b>
                                 </div>
                                 <div class="row">
                                  Doctor me siento mal tengo nauceas y diarrea y me duele mucho la cabeza,
                                  por favor ayudeme, que puedo hacer para evitar el malestar.
                                 </div>
                                 <div class="row padding-top-element  padding-bottom-element">
                                   <div class="">
                                     <b>Calificacion del cliente</b>
                                   </div>
                                   <div class="col s6">
                                     <i style="width:0px;" class="star star-style material-icons star text-darken-4">star</i>
                                     <i style="width:0px" class="star star-style material-icons text-darken-4">star</i>
                                     <i style="width:0px" class="star star-style material-icons text-darken-4">star</i>
                                     <i style="width:0px" class="star star-style material-icons text-darken-4">star</i>
                                     <i style="width:0px" class="star-style material-icons star-desactivate">star</i>
                                   </div>
                                   <div class="right">
                                     <button type="button" name="button" class="btn button-green">Ver consulta</button>
                                   </div>
                                 </div>
                               </div>
                               <div id="test-swipe-2" class="padding-bottom-element col s12">
                                 <div class="col s12" style="height: 230px !important; float: right">
                                   <!-- CONVERSACION -->
                                   <div class="row">
                                     <div class="chip left margin-top-element" style="background-color: #e4e4e4; color: #000000">
                                       <img src="{{ asset('assets/images/doctor.jpg') }}" alt="Contact Person">
                                       Ricardo S.
                                     </div>
                                     <div class="" style="padding-top: 30px;">
                                       <span style="margin-left: 220px;">9:31 am.</span>
                                     </div>
                                   </div>
                                   <div class="row">
                                    <div class="col s12" style="text-align: justify; background-color: #eceaea; padding: 15px; border-radius: 25px;">
                                          Hola carlos, es urgente tratar ese malestar, por favor sigue al pie de la letra las
                                          siguientes indicaciones
                                    </div>
                                  </div>
                                    <!-- CONVERSACION END-->

                                    <!-- CONVERSACION -->
                                    <div class="row">
                                    <div class="chip right margin-top-element" style="background-color: #e4e4e4; color: #000000">
                                      <img src="{{ asset('assets/images/paciente1.jpg') }}" alt="Contact Person">
                                      Carlos A.
                                    </div>
                                    <div class="left" style="padding-top: 30px;text-align:left">
                                      <span style="margin-left: 15px;">9:31 am.</span>
                                    </div>
                                  </div>
                                    <div class="row">
                                   <div class="col s12" style="text-align: justify; background-color: #eceaea; padding: 15px; border-radius: 25px;">
                                         Dr. Ricardo, muchas gracias por su atención al instante.
                                   </div>
                                 </div>
                                    <!-- CONVERSACION END -->

                                    <!-- CONVERSACION -->
                                    <div class="row">
                                   <div class="chip left margin-top-element" style="background-color: #e4e4e4; color: #000000">
                                     <img src="{{ asset('assets/images/doctor.jpg') }}" alt="Contact Person">
                                     Ricardo S.
                                   </div>
                                   <div class="" style="padding-top: 30px;">
                                     <span style="margin-left: 220px;">9:31 am.</span>
                                   </div>
                                 </div>
                                    <div class="row">
                                  <div class="col s12" style="text-align: justify; background-color: #eceaea; padding: 15px; border-radius: 25px;">
                                        Hola carlos, es urgente tratar ese malestar, por favor sigue al pie de la letra las
                                        siguientes indicaciones
                                  </div>
                                </div>
                                    <!-- CONVERSACION END-->

                                    <!-- CONVERSACION -->
                                    <div class="row">
                                  <div class="chip right margin-top-element" style="background-color: #e4e4e4; color: #000000">
                                    <img src="{{ asset('assets/images/paciente1.jpg') }}" alt="Contact Person">
                                    Carlos A.
                                  </div>
                                  <div class="left" style="padding-top: 30px;text-align:left">
                                    <span style="margin-left: 15px;">9:31 am.</span>
                                  </div>
                                </div>
                                    <div class="row">
                                 <div class="col s12" style="text-align: justify; background-color: #eceaea; padding: 15px; border-radius: 25px;">
                                       Dr. Ricardo, muchas gracias por su atención al instante.
                                 </div>
                               </div>
                                    <!-- CONVERSACION END -->
                                </div>

                               </div>

                            </div>


                          </div>
                        </div>

                      </div>
                      <div class="col s5" style="padding-top: 5px;">
                        <label class="doctor-name"> <b>Ricardo S.</b> </label><br>
                        <b class="negrita">Especialidad: </b><label>Cardiología</label><br>
                        <b class="negrita">Fecha: </b><label>04/10/17 </label><br>
                        <b class="negrita">Tiempo: </b>  <label>15 minutos</label><br>
                        <b class="negrita">Precio: </b><label>S/.5.00</label><br>
                        <div style="padding-top: 15px;">
                          <button onclick="mod()" href="#modal1" class=" btn button-green modal-trigger" style="text-transform: none;height:35px;">Ver consulta</button>
                        </div>
                        <!-- <a onclick="mod()" class="historial-link waves-effect waves-light modal-trigger" >ver detalle</a> -->

                        <!-- <div class="row">
                          <div class="col s2" style="text-align: left;padding-left: 0px">
                            <span class="star" style="padding-left:0px;margin-bottom: 10px">(14)</span>
                          </div>
                          <div class="col s10" style="padding-left: 0px;">
                            <i style="width:1px" class="star material-icons text-darken-4">star</i>
                            <i style="width:1px" class="material-icons star text-darken-4">star</i>
                            <i style="width:1px" class="material-icons star text-darken-4">star</i>
                            <i style="width:1px" class="material-icons star text-darken-4">star</i>
                            <i style="width:1px" class="material-icons star-desactivate">star</i>
                          </div>
                        </div> -->
                      </div>
                      <div class="col s2">
                      </div>
                    </div>
                </div>
              </div>
            </div>
            @endfor
        </div>
        <div class="row">
          <div class="col s3">
          </div>
          <div class="col s6 center">
            <ul class="pagination">
              <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
              <li class="active"><a href="#!">1</a></li>
              <li class="waves-effect"><a href="#!">2</a></li>
              <li class="waves-effect"><a href="#!">3</a></li>
              <li class="waves-effect"><a href="#!">4</a></li>
              <li class="waves-effect"><a href="#!">5</a></li>
              <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
            </ul>
          </div>
          <div class="col s3">
          </div>
        </div>
    </div>
@endsection
<script type="text/javascript">


function mod(){
  $('#modal1').modal();
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
  document.getElementById("historial").style.paddingLeft = '4%';
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
  document.getElementById("historial").style.paddingLeft = '2%';
}
</script>
