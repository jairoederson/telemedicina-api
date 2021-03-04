@extends('layouts.material-medico')
@section('content')
<div id="consulta" class="section-content">

  <ul id="tabs-swipe-demo" class="tabs account-header">
    <li class="tab col s4">
      <!-- <a class="active" href="#test-swipe-1"><i class="material-icons left">cloud</i> Atendidas </a> -->
      <a class="active" href="#test-swipe-1">
        <p style="position: absolute; margin-left: 5%; margin-top:11px;">
          <i style="" class="material-icons">phone</i>
        </p>
        <b>Atendidas</b>
      </a>
    </li>

    <li class="tab col s4">
      <!-- <a href="#test-swipe-2"> Perdidas </a> -->
      <a href="#test-swipe-2">
        <p style="position: absolute; margin-left: 5%; margin-top:11px;">
          <i class="material-icons">phone_missed</i>
        </p>
        <b>Perdidas</b>
      </a>
    </li>

    <li class="tab col s4">
      <div class="col s12 title-color right" >
        <div class="row" style="background-color: white; height: 36px;margin-top: 5px; border-radius:25px;">

          <div class="col s12">
            <div class="col s10" style="padding-left:10px;margin-left:0%;">
              <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" type="text" name="" placeholder="Buscar consulta ..." value="" style="margin-top: 0px;height:2.5rem;border-bottom: none;">
            </div>
            <div class="col s2 right" style="padding-right: 0px !important;">
              <i class="material-icons" style="padding-top: 5px; margin-right: 0px !important; color:#adadad">search</i>
            </div>
          </div>
        </div>
      </div>
    </li>

  </ul>


  <div id="test-swipe-1" class="">
    <div class="row background-white">

      @for($i=0; $i < 5; $i++)
      <!-- FILA -->
      <div class="col s12 padding-top-element">
        <div class="">
          <h5>
          </h5>
        </div>
        <div class="row border-bottom padding-bottom-element">
          <div class="col s6">
            <div class="col s5 center">
              <a onclick="mod()" class="waves-effect waves-light modal-trigger" href="#modal1">
                <div class="center">
                  <img src="https://fedspendingtransparency.github.io/assets/img/user_personas/repurposer_mug.jpg" class="img-paciente" alt="" width="110px">
                </div>
              </a>
              <div class="" style="margin-top: 10px;">
                <label>Hombre, 32 años</label><br>
              </div>
              <div id="modal1" class="modal modalLlamada">

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

                <div class="modal-content">
                  <div class="row modal-cabecera">
                    <!-- <a class="btn-floating btn-small waves-effect waves-light modal-close" style="background-color:#ced0cd; position:absolute; margin-left: 200px; margin-top: -15px;"><i class="material-icons">close</i></a> -->
                  </div>
                  <div class="row center">
                    <div class="col s4 center">
                      <img src="https://fedspendingtransparency.github.io/assets/img/user_personas/repurposer_mug.jpg" class="img-paciente" alt="" width="110px">
                    </div>
                    <div class="col s8">
                      <div class="row left" style="text-align: left">
                        <label class="name-paciente"> <b>Ricardo S.</b> </label><br>
                        <!-- <label>Hombre, 32 años</label><br> -->
                        <label><b>Fecha:</b> </label>
                        <label> 04/10/17</label><br>
                        <label> <b>Duración:</b> </label>
                        <label> 15 minutos</label><br>
                        <label> <b>Ubicacion:</b> </label>
                        <label> Ayacucho</label><br>
                        <label> <b>Precio Cobrado:</b> </label>
                        <label> S/.5.00</label><br>
                      </div>
                    </div>
                  </div>
                  <div class="row margin-top-element">
                    <ul id="tabs-swipe-demo" class="tabs">
                       <li class="tab col s6"><a class="active" href="#general">General</a></li>
                       <li class="tab col s6"><a  href="#conversacion">Conversación</a></li>
                    </ul>
                     <div id="general" class="col s12 align-left">
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
                       <div class="row padding-top-element  ">
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
                           <!-- <button type="button" name="button" class="btn button-green format">Ver receta</button> -->
                         </div>
                       </div>
                     </div>
                     <div id="conversacion" class="padding-bottom-element col s12">
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
                     </div>
                  </div>

                </div>

                <div class="modal-pie right">
                  <div class="right">
                    <button type="button" name="button" class="btn button-green format">Ver receta</button>
                  </div>
                </div>
              </div>


              <div id="modalCon" class="modal modalLlamada">
                <div class="modal-content">
                  <div class="row modal-cabecera">
                    <a class="btn-floating btn-small waves-effect waves-light modal-close" style="background-color:#ced0cd; position:absolute; margin-left: 200px; margin-top: -15px;"><i class="material-icons">close</i></a>
                  </div>
                  <div class="row center">
                    <div class="col s4 center">
                      <img src="https://fedspendingtransparency.github.io/assets/img/user_personas/repurposer_mug.jpg" class="img-paciente" alt="" width="110px">
                    </div>
                    <div class="col s8">
                      <div class="row left" style="text-align: left">
                        <label class="name-paciente"> <b>Ricardo S.</b> </label><br>
                        <!-- <label>Hombre, 32 años</label><br> -->
                        <label><b>Fecha:</b> </label>
                        <label> 04/10/17</label><br>
                        <label> <b>Duración:</b> </label>
                        <label> 15 minutos</label><br>
                        <label> <b>Ubicacion:</b> </label>
                        <label> Ayacucho</label><br>
                        <label> <b>Precio Cobrado:</b> </label>
                        <label> S/.5.00</label><br>
                      </div>
                    </div>
                  </div>
                  <div class="row margin-top-element">
                    <ul id="tabs-swipe-demo" class="tabs">
                       <li class="tab col s6"><a class="active" href="#general">General</a></li>
                       <li class="tab col s6"><a  href="#conversacion">Conversación</a></li>
                    </ul>
                     <div id="general" class="col s12 align-left">
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
                           <button type="button" name="button" class="btn button-green format">Ver receta</button>
                         </div>
                       </div>
                     </div>
                     <div id="conversacion" class="padding-bottom-element col s12">
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
                     </div>
                  </div>

                </div>
              </div>
            </div>

            <div class="col s7 ">
              <label class="name-paciente"> <b>Ricardo S.</b> </label><br>
              <!-- <label>Hombre, 32 años</label><br> -->
              <label><b>Fecha:</b> </label>
              <label> 04/10/17</label><br>
              <label> <b>Duración:</b> </label>
              <label> 15 minutos</label><br>
              <label> <b>Ubicacion:</b> </label>
              <label> Ayacucho</label><br>
              <label> <b>Precio Cobrado:</b> </label>
              <label> S/.5.00</label><br>
              <button onclick="mod()" href="#modal1" class="btn button-green modal-trigger" style="margin-top: 10px; text-transform: none;height:35px;">Ver consulta</button>

            </div>

          </div>
          <div class="col s6">
            <div class="col s5 center">
              <a onclick="mod()" class="waves-effect waves-light modal-trigger" href="#modal1">
                <img src="https://fedspendingtransparency.github.io/assets/img/user_personas/repurposer_mug.jpg" class="img-paciente" alt="" width="110px">
              </a>
              <div class="" style="margin-top: 10px;">
                <label>Hombre, 32 años</label><br>
              </div>
              <div id="modal1" class="modal">
                <div class="modal-content">
                  <div class="row center">
                    <img src="https://fedspendingtransparency.github.io/assets/img/user_personas/repurposer_mug.jpg" class="img-paciente" alt="" width="110px">
                  </div>
                  <div class="row center">
                    <p class="name-paciente"> <b>Ricardo S aaaa</b> </p>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col s1 m1 center">
                    </div>
                    <div class="col s2 m2 center">
                      <i class="material-icons">supervisor_account</i>
                      <p>Hombre</p>
                    </div>
                    <div class="col s2 m2 center">
                      <i class="material-icons">event_available</i>
                      <p for="">32 años</p>
                    </div>
                    <div class="col s2 m2 center">
                      <i class="material-icons">place</i>
                      <p for="">Ayacucho</p>
                    </div>
                    <div class="col s2 m2 center">
                      <i class="material-icons">date_range</i>
                      <p for="">10/12/18</p>
                    </div>
                    <div class="col s2 m2 center">
                      <i class="material-icons">access_time</i>
                      <p for="">12 minutos</p>
                    </div>
                    <div class="col s1 m1 center">
                    </div>
                  </div>
                  <hr>
                  <div class="row center">
                    <span>Mensaje</span>
                  </div>
                  <div class="row center">
                    <span>
                      "Doctor me siento mal, tengo fiebre y no dejo de toser, necesito ayuda
                      llevo unos 5 dias asi"
                    </span>
                  </div>
                  <br>
                  <div class="row center" style="margin-bottom: 0px">
                    <span>Precio cobrado S/.5.99</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col s7">
              <label class="name-paciente"> <b>Ricardo S.</b> </label><br>
              <label><b>Fecha:</b> </label>
              <label> 04/10/17</label><br>
              <label> <b>Duración:</b> </label>
              <label> 15 minutos</label><br>
              <label> <b>Ubicacion:</b> </label>
              <label> Ayacucho</label><br>
              <label> <b>Precio Cobrado:</b> </label>
              <label> S/.5.00</label><br>
              <button onclick="mod()" href="#modal1" class="btn button-green modal-trigger" style="margin-top: 10px; text-transform: none;height:35px;">Ver consulta</button>
            </div>
          </div>
        </div>
      </div>
      <!-- FILA END -->
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
  <div id="test-swipe-2">
    <div class="row background-white">
      @for($i=0; $i < 4; $i++)
      <div class="col s12 m12  padding-top-element padding-bottom-element border-bottom">
        <div class="row">
          <div class="col s6" style="padding-left:0px">
              <div class="row">
                <div class="col s4 center">
                  <img src="{{asset('assets/images/usuario_chat.jpg')}}" style="border-radius: 50%;" alt="" width="100px">
                </div>
                <div class="col s8">
                  <label class="name-paciente"> <b>Ricardo S.</b> </label><br>
                    <label>Hombre, 32 años</label><br>
                    <label><b>Fecha:</b> </label>
                    <label>04/10/17</label><br>
                    <label><b>Ubicación: </b></label>
                    <label>Ayacucho</label><br>
                    <label>Llamada Perdida</label>
                </div>
              </div>
          </div>
          <div class="col s6" style="padding-left:0px">
              <div class="row">
                <div class="col s4 center">
                  <img src="{{asset('assets/images/usuario_chat.jpg')}}" style="border-radius: 50%;" alt="" width="100px">
                </div>
                <div class="col s8">
                  <label class="name-paciente"> <b>Ricardo S.</b> </label><br>
                    <label>Hombre, 32 años</label><br>
                    <label><b>Fecha:</b> </label>
                    <label>04/10/17</label><br>
                    <label><b>Ubicación: </b></label>
                    <label>Ayacucho</label><br>
                    <label>Llamada Perdida</label>
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
  document.getElementById("consulta").style.paddingLeft = '4%';
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
  document.getElementById("consulta").style.paddingLeft = '2%';
  activarOpcion();
}
</script>
