@extends('layouts.material-medico')
@section('content')
<div id="ayuda" class="section-ayuda">
    <div class="row background-white">
        <div class="row" >
          <div id="cabecera" class="col s12 title-color align-center">
            <h6 class="title-content content-title">
              <b>AYUDA | PREGUNTAS FRECUENTES</b>
            </h6>
          </div>
        </div>
        <div class="row">
          <div class="col s4">
            <div class="ayuda-title">
              <p>Aqui encontraras</p>
            </div>
            <div id="">
              <div class="row">
                <ul class="collapsible" data-collapsible="accordion">
                  <li>
                    <div onclick="preguntasCategoria('frecuentes')" class="collapsible-header"><i class="material-icons icon-color">check_circle</i>Preguntas frecuentes</div>
                    <!-- <div class="collapsible-body">
                      <span>
                        Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.
                        Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.
                        Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.
                        Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.
                      </span>
                    </div> -->
                  </li>
                  <li>
                    <div onclick="preguntasCategoria('categoria1')" class="collapsible-header"><i class="material-icons icon-color">monetization_on</i>Ingresos</div>
                    <!-- <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div> -->
                  </li>
                  <li>
                    <div onclick="preguntasCategoria('categoria2')" class="collapsible-header"><i class="material-icons icon-color">assignment_ind</i>Mi cuenta</div>
                    <!-- <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div> -->
                  </li>
                  <li>
                    <div onclick="preguntasCategoria('categoria3')" class="collapsible-header"><i class="material-icons icon-color">assignment_turned_in</i>Consultas de paciente</div>
                      <!-- <div class="collapsible-body">
                          <span>
                          Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.
                          Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.
                          Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.
                          Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.
                        </span>
                      </div> -->
                  </li>
                  <!-- <li>
                    <div class="collapsible-header"><i class="material-icons">question_answer</i>¿Como?</div>
                    <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                  </li> -->
                </ul>
              </div>
            </div>
          </div>
          <div class="col s8">
            <div id="frecuentes">
              <div class="ayuda-title">
                <p>Preguntas frecuentes</p>
              </div>
              <div class="row">
                <ul class="collapsible" data-collapsible="accordion">
                  <li>
                    <div class="collapsible-header"><i class="material-icons icon-color">check</i>¿Cómo puedo recuperar mi contraseña?</div>
                    <div class="collapsible-body question-detail">
                      <div class="border-bottom">
                        <p>No he recibido mi pedido ¿Que puedo hacer?</p>
                      </div>
                      <div class="row border-bottom">
                        <p>
                          En caso de que no haya recigido tu pedido, ponte en contacto
                          con nosotros para más información. Si eso no funciona, siempre
                          puedes abrir disputa para solicitar un reembolso
                        </p>
                      </div>

                      <div class="row">
                        <p>¿LA RESPUESTA FUE ÚTIL?</p>
                      </div>
                      <div class="row button-answer">
                        <div class="col s6 without-padding-left without-padding-right left">
                          <a class="waves-effect waves-light btn button-green" onclick="respuestaUtil()"><i class="material-icons left">thumb_up</i>si</a> &nbsp;
                          <a class="waves-effect waves-light btn" style="background-color: #e22715"  onclick="respuestaNoUtil()"><i class="material-icons left">thumb_down</i>No</a>
                        </div>

                        <div class="col s6">

                        </div>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="collapsible-header"><i class="material-icons icon-color">check</i>¿Cómo puedo recuperar mi contraseña?</div>
                    <div class="collapsible-body question-detail">
                      <div class="border-bottom">
                        <p>No he recibido mi pedido ¿Que puedo hacer?</p>
                      </div>
                      <div class="row border-bottom">
                        <p>
                          En caso de que no haya recigido tu pedido, ponte en contacto
                          con nosotros para más información. Si eso no funciona, siempre
                          puedes abrir disputa para solicitar un reembolso
                        </p>
                      </div>

                      <div class="row">
                        <p>¿LA RESPUESTA FUE ÚTIL?</p>
                      </div>
                      <div class="row button-answer">
                        <div class="col s6 without-padding-left without-padding-right left">
                          <a class="waves-effect waves-light btn button-green"  onclick="respuestaUtil()"><i class="material-icons left">thumb_up</i>si</a> &nbsp;
                          <a class="waves-effect waves-light btn" style="background-color: #e22715"  onclick="respuestaNoUtil()"><i class="material-icons left">thumb_down</i>No</a>
                        </div>

                        <div class="col s6">

                        </div>
                      </div>
                    </div>
                  </li>
                  <!-- <li>
                    <div class="collapsible-header"><i class="material-icons">question_answer</i>¿Como?</div>
                    <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                  </li> -->
                </ul>
              </div>
            </div>
            <div id="categoria1" style="display:none">
              <p class="ayuda-title">Preguntas relacionadas a Ingresos</p>
              <div class="row">
                <ul class="collapsible" data-collapsible="accordion">
                  <li>
                    <div class="collapsible-header"><i class="material-icons icon-color">check</i>¿Cómo puedo recuperar mi contraseña?</div>
                    <div class="collapsible-body question-detail">
                      <div class="border-bottom">
                        <p>No he recibido mi pedido ¿Que puedo hacer?</p>
                      </div>
                      <div class="row border-bottom">
                        <p>
                          En caso de que no haya recigido tu pedido, ponte en contacto
                          con nosotros para más información. Si eso no funciona, siempre
                          puedes abrir disputa para solicitar un reembolso
                        </p>
                      </div>

                      <div class="row">
                        <p>¿LA RESPUESTA FUE ÚTIL?</p>
                      </div>
                      <div class="row button-answer">
                        <div class="col s6 without-padding-left without-padding-right left">
                          <a class="waves-effect waves-light btn button-green"  onclick="respuestaUtil()"><i class="material-icons left">thumb_up</i>si</a> &nbsp;
                          <a class="waves-effect waves-light btn" style="background-color: #e22715"  onclick="respuestaNoUtil()"><i class="material-icons left">thumb_down</i>No</a>
                        </div>

                        <div class="col s6">

                        </div>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="collapsible-header"><i class="material-icons icon-color">check</i>¿Cómo puedo recuperar mi contraseña?</div>
                    <div class="collapsible-body question-detail">
                      <div class="border-bottom">
                        <p>No he recibido mi pedido ¿Que puedo hacer?</p>
                      </div>
                      <div class="row border-bottom">
                        <p>
                          En caso de que no haya recigido tu pedido, ponte en contacto
                          con nosotros para más información. Si eso no funciona, siempre
                          puedes abrir disputa para solicitar un reembolso
                        </p>
                      </div>

                      <div class="row">
                        <p>¿LA RESPUESTA FUE ÚTIL?</p>
                      </div>
                      <div class="row button-answer">
                        <div class="col s6 without-padding-left without-padding-right left">
                          <a class="waves-effect waves-light btn button-green" onclick="respuestaUtil()"><i class="material-icons left">thumb_up</i>si</a> &nbsp;
                          <a class="waves-effect waves-light btn" style="background-color: #e22715" onclick="respuestaNoUtil()"><i class="material-icons left">thumb_down</i>No</a>
                        </div>

                        <div class="col s6">

                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <div id="categoria2" style="display: none;">
              <p class="ayuda-title">Preguntas relacionadas a Mi cuenta</p>
              <div class="row">
                <ul class="collapsible" data-collapsible="accordion">
                  <li>
                    <div class="collapsible-header"><i class="material-icons icon-color">check</i>¿Cómo puedo recuperar mi contraseña?</div>
                    <div class="collapsible-body question-detail">
                      <div class="border-bottom">
                        <p>No he recibido mi pedido ¿Que puedo hacer?</p>
                      </div>
                      <div class="row border-bottom">
                        <p>
                          En caso de que no haya recigido tu pedido, ponte en contacto
                          con nosotros para más información. Si eso no funciona, siempre
                          puedes abrir disputa para solicitar un reembolso
                        </p>
                      </div>

                      <div class="row">
                        <p>¿LA RESPUESTA FUE ÚTIL?</p>
                      </div>
                      <div class="row button-answer">
                        <div class="col s6 without-padding-left without-padding-right left">
                          <a class="waves-effect waves-light btn button-green" onclick="respuestaUtil()"><i class="material-icons left">thumb_up</i>si</a> &nbsp;
                          <a class="waves-effect waves-light btn" style="background-color: #e22715" onclick="respuestaNoUtil()"><i class="material-icons left">thumb_down</i>No</a>
                        </div>

                        <div class="col s6">

                        </div>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="collapsible-header"><i class="material-icons icon-color">check</i>¿Cómo puedo recuperar mi contraseña?</div>
                    <div class="collapsible-body question-detail">
                      <div class="border-bottom">
                        <p>No he recibido mi pedido ¿Que puedo hacer?</p>
                      </div>
                      <div class="row border-bottom">
                        <p>
                          En caso de que no haya recigido tu pedido, ponte en contacto
                          con nosotros para más información. Si eso no funciona, siempre
                          puedes abrir disputa para solicitar un reembolso
                        </p>
                      </div>

                      <div class="row">
                        <p>¿LA RESPUESTA FUE ÚTIL?</p>
                      </div>
                      <div class="row button-answer">
                        <div class="col s6 without-padding-left without-padding-right left">
                          <a class="waves-effect waves-light btn button-green" onclick="respuestaUtil()"><i class="material-icons left">thumb_up</i>si</a> &nbsp;
                          <a class="waves-effect waves-light btn" style="background-color: #e22715" onclick="respuestaNoUtil()"><i class="material-icons left">thumb_down</i>No</a>
                        </div>

                        <div class="col s6">

                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <div id="categoria3" style="display: none;">
              <p class="ayuda-title">Preguntas relacionadas a Consultas al paciente</p>
              <div class="row">
                <ul class="collapsible" data-collapsible="accordion">
                  <li>
                    <div class="collapsible-header"><i class="material-icons icon-color">check</i>¿Cómo puedo recuperar mi contraseña?</div>
                    <div class="collapsible-body question-detail">
                      <div class="border-bottom">
                        <p>No he recibido mi pedido ¿Que puedo hacer?</p>
                      </div>
                      <div class="row border-bottom">
                        <p>
                          En caso de que no haya recigido tu pedido, ponte en contacto
                          con nosotros para más información. Si eso no funciona, siempre
                          puedes abrir disputa para solicitar un reembolso
                        </p>
                      </div>

                      <div class="row">
                        <p>¿LA RESPUESTA FUE ÚTIL?</p>
                      </div>
                      <div class="row button-answer">
                        <div class="col s6 without-padding-left without-padding-right left">
                          <a class="waves-effect waves-light btn button-green" onclick="respuestaUtil()"><i class="material-icons left">thumb_up</i>si</a> &nbsp;
                          <a class="waves-effect waves-light btn" style="background-color: #e22715" onclick="respuestaNoUtil()"><i class="material-icons left">thumb_down</i>No</a>
                        </div>

                        <div class="col s6">

                        </div>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="collapsible-header"><i class="material-icons icon-color">check</i>¿Cómo puedo recuperar mi contraseña?</div>
                    <div class="collapsible-body question-detail">
                      <div class="border-bottom">
                        <p>No he recibido mi pedido ¿Que puedo hacer?</p>
                      </div>
                      <div class="row border-bottom">
                        <p>
                          En caso de que no haya recigido tu pedido, ponte en contacto
                          con nosotros para más información. Si eso no funciona, siempre
                          puedes abrir disputa para solicitar un reembolso
                        </p>
                      </div>

                      <div class="row">
                        <p>¿LA RESPUESTA FUE ÚTIL?</p>
                      </div>
                      <div class="row button-answer">
                        <div class="col s6 without-padding-left without-padding-right left">
                          <a class="waves-effect waves-light btn button-green" onclick="respuestaUtil()"><i class="material-icons left">thumb_up</i>si</a> &nbsp;
                          <a class="waves-effect waves-light btn" style="background-color: #e22715" onclick="respuestaNoUtil()"><i class="material-icons left">thumb_down</i>No</a>
                        </div>

                        <div class="col s6">

                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--
        <div class="card" style="padding-bottom: 20px;">
          <div class="card-form">
            <div class="row">
              <br>
              <div class="col s2 m2">
                <img src="https://www.1plusx.com/app/mu-plugins/all-in-one-seo-pack-pro/images/default-user-image.png" style="border-radius: 50%;" alt="" width="120px">
            </div>
              <div class="col s7 m7">
                <h6 for=""> <strong>Dr. Ricardo Smith</strong> </6>
                <h6>Hombre, 32 años</h6>
                <h6>04/10/17 - 15 minutos</h6>
                <h6>Ubicacion: Ayacucho</h6>
                <h6>Precio Cobrado: S/.5.00</h6>
              </div>
              <div class="col s3 m3">

              </div>
            </div>
          </div>
        </div>
      -->

   </div>
</div>
@endsection
<script type="text/javascript">
function preguntasCategoria(valor){
  if(valor == 'frecuentes'){
    document.getElementById('frecuentes').style.display = 'block';
    document.getElementById('categoria1').style.display = 'none';
    document.getElementById('categoria2').style.display = 'none';
    document.getElementById('categoria3').style.display = 'none';
  }else if (valor == 'categoria1') {
    document.getElementById('frecuentes').style.display = 'none';
    document.getElementById('categoria1').style.display = 'block';
    document.getElementById('categoria2').style.display = 'none';
    document.getElementById('categoria3').style.display = 'none';

  }else if (valor == 'categoria2'){
    document.getElementById('frecuentes').style.display = 'none';
    document.getElementById('categoria1').style.display = 'none';
    document.getElementById('categoria2').style.display = 'block';
    document.getElementById('categoria3').style.display = 'none';
  }else{
    document.getElementById('frecuentes').style.display = 'none';
    document.getElementById('categoria1').style.display = 'none';
    document.getElementById('categoria2').style.display = 'none';
    document.getElementById('categoria3').style.display = 'block';
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
  document.getElementById("ayuda").style.paddingLeft = '4%';
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
  document.getElementById("ayuda").style.paddingLeft = '2%';
}
function respuestaUtil(){
  Materialize.toast('La respuesta fue útil', 2000, 'rounded')
}
function respuestaNoUtil(){
  Materialize.toast('La respuesta no fue útil', 2000, 'rounded')
}
</script>
