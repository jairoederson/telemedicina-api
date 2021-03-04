@extends('layouts.material')
@section('content')
<div id="ayuda" class="content-ayuda">

  <div class="row content-inside">
    <div class="row" >
      <div id="cabecera" class="center col s12 title-color">
        <h6 class="title-content content-title">
          <b>AYUDA | PREGUNTAS FRECUENTES</b>

        </h6>
      </div>
    </div>
    <div class="row">
      <div class="col s4 align-center">
        <p style="font-size: 16px">Aqui encontrarás</p>
        <div id="cuerpo" class="row">
          <ul class="collapsible" data-collapsible="accordion">
            <li>
              <div onclick="preguntas('frecuentes')" class="collapsible-header"><i class="material-icons icon-color">question_answer</i>Preguntas Frecuentes</div>
            </li>
            <li>
              <div onclick="preguntas('consultas')" class="collapsible-header"><i class="material-icons icon-color">message</i>Consultas</div>
            </li>
            <li>
              <div onclick="preguntas('historial')" class="collapsible-header"><i class="material-icons icon-color">class</i>Historial</div>
            </li>
            <li>
              <div onclick="preguntas('recetas')" class="collapsible-header"><i class="material-icons icon-color">assignment</i>Recetas</div>
            </li>
            <li>
              <div onclick="preguntas('mimonedero')" class="collapsible-header"><i class="material-icons icon-color">monetization_on</i>Mi monedero</div>
            </li>
          </ul>
        </div>
      </div>
      <div class="col s8">
        <div id="preguntasFrecuentes">
          <p style="text-align:center;font-size: 16px">Preguntas frecuentes</p>
          <div id="cuerpo" class="row">
            <ul class="collapsible" data-collapsible="accordion">
              <li class="">
                <div class="collapsible-header">
                  <i class="material-icons icon-color">check</i>
                  ¿Qué pasa si me llega un producto vencido?
                </div>
                <div class="detalle-mensaje collapsible-body without-padding-top">
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
              <li class="">
                <div class="collapsible-header">
                  <i class="material-icons icon-color">check</i>
                  ¿Qué pasa si me llega un producto vencido?
                </div>
                <div class="detalle-mensaje collapsible-body without-padding-top">
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
              <li class="">
                <div class="collapsible-header">
                  <i class="material-icons icon-color">check</i>
                  ¿Qué pasa si me llega un producto vencido?
                </div>
                <div class="detalle-mensaje collapsible-body without-padding-top">
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
        <div id="preguntasConsultas" style="display: none">
          <p style="text-align:center;font-size: 16px">Preguntas relacionadas a consultas</p>
          <div id="cuerpo" class="row" style="margin: 0px 0px 0px 0px;">
            <ul class="collapsible" data-collapsible="accordion">
              <li class="">
                <div class="collapsible-header">
                  <i class="material-icons icon-color">check</i>
                  ¿Qué pasa si me llega un producto vencido?
                </div>
                <div class="detalle-mensaje collapsible-body without-padding-top">
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
              <li class="">
                <div class="collapsible-header">
                  <i class="material-icons icon-color">check</i>
                  ¿Qué pasa si me llega un producto vencido?
                </div>
                <div class="detalle-mensaje collapsible-body without-padding-top">
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
                      <a class="waves-effect waves-light btn"style="background-color: #e22715" onclick="respuestaNoUtil()"><i class="material-icons left">thumb_down</i>No</a>
                    </div>

                    <div class="col s6">

                    </div>
                  </div>
                </div>
              </li>
              <li class="">
                <div class="collapsible-header">
                  <i class="material-icons icon-color">check</i>
                  ¿Qué pasa si me llega un producto vencido?
                </div>
                <div class="detalle-mensaje collapsible-body without-padding-top">
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
                      <a class="waves-effect waves-light btn button-orange" style="background-color: #e22715" onclick="respuestaNoUtil()"><i class="material-icons left">thumb_down</i>No</a>
                    </div>

                    <div class="col s6">

                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div id="preguntasHistorial" style="display: none">
          <p style="text-align:center;font-size: 16px">Preguntas relacionadas a historial</p>
          <div id="cuerpo" class="row" style="margin: 0px 0px 0px 0px;">
            <ul class="collapsible" data-collapsible="accordion">
              <li class="">
                <div class="collapsible-header">
                  <i class="material-icons icon-color">check</i>
                  ¿Qué pasa si me llega un producto vencido?
                </div>
                <div class="detalle-mensaje collapsible-body without-padding-top">
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
              <li class="">
                <div class="collapsible-header">
                  <i class="material-icons icon-color">check</i>
                  ¿Qué pasa si me llega un producto vencido?
                </div>
                <div class="detalle-mensaje collapsible-body without-padding-top">
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
              <li class="">
                <div class="collapsible-header">
                  <i class="material-icons icon-color">check</i>
                  ¿Qué pasa si me llega un producto vencido?
                </div>
                <div class="detalle-mensaje collapsible-body without-padding-top">
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
        <div id="preguntasRecetas" style="display: none">
          <p style="text-align:center;font-size: 16px">Preguntas relacionadas a recetas</p>
          <div id="cuerpo" class="row" style="margin: 0px 0px 0px 0px;">
            <ul class="collapsible" data-collapsible="accordion">
              <li class="">
                <div class="collapsible-header">
                  <i class="material-icons icon-color">check</i>
                  ¿Qué pasa si me llega un producto vencido?
                </div>
                <div class="detalle-mensaje collapsible-body without-padding-top">
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
              <li class="">
                <div class="collapsible-header">
                  <i class="material-icons icon-color">check</i>
                  ¿Qué pasa si me llega un producto vencido?
                </div>
                <div class="detalle-mensaje collapsible-body without-padding-top">
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
              <li class="">
                <div class="collapsible-header">
                  <i class="material-icons icon-color">check</i>
                  ¿Qué pasa si me llega un producto vencido?
                </div>
                <div class="detalle-mensaje collapsible-body without-padding-top">
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
        <div id="preguntasMimonedero" style="display: none">
          <p style="text-align:center;font-size: 16px">Preguntas relacionadas a mi monedero</p>
          <div id="cuerpo" class="row" style="margin: 0px 0px 0px 0px;">
            <ul class="collapsible" data-collapsible="accordion">
              <li class="">
                <div class="collapsible-header">
                  <i class="material-icons icon-color">check</i>
                  ¿Qué pasa si me llega un producto vencido?
                </div>
                <div class="detalle-mensaje collapsible-body without-padding-top">
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
              <li class="">
                <div class="collapsible-header">
                  <i class="material-icons icon-color">check</i>
                  ¿Qué pasa si me llega un producto vencido?
                </div>
                <div class="detalle-mensaje collapsible-body without-padding-top">
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
                      <a class="waves-effect waves-light btn" style="background-color: #e22715" onclick="respuestaNoUtil()"><i class="material-icons left">thumb_down</i>No</a>
                    </div>

                    <div class="col s6">

                    </div>
                  </div>
                </div>
              </li>
              <li class="">
                <div class="collapsible-header">
                  <i class="material-icons icon-color">check</i>
                  ¿Qué pasa si me llega un producto vencido?
                </div>
                <div class="detalle-mensaje collapsible-body without-padding-top">
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
        <!-- <div id="preguntasFrecuentes" style="display: block">
          <p style="text-align:center;font-size: 16px">Preguntas frecuentes</p>
          <div id="cuerpo" class="row" style="margin: 0px 0px 0px 0px;">
            <ul class="collapsible" data-collapsible="accordion">
              <li>
                <div class="collapsible-header"><i class="material-icons icon-color">check</i>No he recibido los productos</div>
                <div class="collapsible-body" style="padding-top: 0px;">
                  <p>No he recibido mi pedido ¿Que puedo hacer?</p>
                  <hr>
                  <div class="row">
                    <p style="text-align: justify; !important">
                      En caso de que no haya recigido tu pedido, ponte en contacto
                      con nosotros para más información. Si eso no funciona, siempre
                      puedes abrir disputa para solicitar un reembolso
                    </p>
                  </div>
                  <hr>
                  <div class="row">
                    <p style="text-align: justify; !important">¿LA RESPUESTA FUE ÚTIL?</p>
                  </div>
                  <div class="row">
                    <div class="col s4" style="padding-right: 0px; padding-left: 0px">
                      <a href="#" class="btn btn-color" style="background-color: #868686">
                        <span>
                          <i style="padding-right: 0px" class="material-icons">thumb_up</i>
                        </span>
                        <span>Si</span>
                       </a>
                    </div>
                    <div class="col s4" style="padding-left: 0px">
                      <a href="#" class="btn btn-color" style="background-color: #868686">
                        <span>
                          <i class="material-icons">thumb_down </i>
                        </span>
                        <span>
                          No
                        </span>
                       </a>
                    </div>
                    <div class="col s2">

                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <p style="text-align: justify; !important">Preguntas Relacionadas</p>
                  </div>
                  <hr>
                  <div class="row">
                    <p style="text-align: justify; !important"><a href="" style="color: #000000">¿Qué pasa si me llega un producto vencido?</a></p>
                    <p style="text-align: justify; !important"> <a href="" style="color: #000000">¿Qué pasa si mi pedio no llega?</a> </p>
                    <p style="text-align: justify; !important"> <a href="" style="color: #000000">¿Qué pasa si mi pedido llega en las estado?</a> </p>
                  </div>
                </div>
              </li>
              <li>
                <div class="collapsible-header"><i class="material-icons icon-color">check</i>Horario de entrega por fiestas</div>
                <div class="collapsible-body" style="padding-top: 0px;">
                  <p>No he recibido mi pedido ¿Que puedo hacer?</p>
                  <hr>
                  <div class="row">
                    <p style="text-align: justify; !important">
                      En caso de que no haya recigido tu pedido, ponte en contacto
                      con nosotros para más información. Si eso no funciona, siempre
                      puedes abrir disputa para solicitar un reembolso
                    </p>
                  </div>
                  <hr>
                  <div class="row">
                    <p style="text-align: justify; !important">¿LA RESPUESTA FUE ÚTIL?</p>
                  </div>
                  <div class="row">
                    <div class="col s4" style="padding-right: 0px; padding-left: 0px">
                      <a href="#" class="btn btn-color" style="background-color: #868686">
                        <span>
                          <i style="padding-right: 0px" class="material-icons">thumb_up</i>
                        </span>
                        <span>Si</span>
                       </a>
                    </div>
                    <div class="col s4" style="padding-left: 0px">
                      <a href="#" class="btn btn-color" style="background-color: #868686">
                        <span>
                          <i class="material-icons">thumb_down </i>
                        </span>
                        <span>
                          No
                        </span>
                       </a>
                    </div>
                    <div class="col s2">

                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <p style="text-align: justify; !important">Preguntas Relacionadas</p>
                  </div>
                  <hr>
                  <div class="row">
                    <p style="text-align: justify; !important"><a href="" style="color: #000000">¿Qué pasa si me llega un producto vencido?</a></p>
                    <p style="text-align: justify; !important"> <a href="" style="color: #000000">¿Qué pasa si mi pedio no llega?</a> </p>
                    <p style="text-align: justify; !important"> <a href="" style="color: #000000">¿Qué pasa si mi pedido llega en las estado?</a> </p>
                  </div>
                </div>
              </li>
              <li>
                <div class="collapsible-header"><i class="material-icons icon-color">check</i>¿Cuales son los distritos a los que se hace el envío?</div>
                <div class="collapsible-body" style="padding-top: 0px;">
                  <p>No he recibido mi pedido ¿Que puedo hacer?</p>
                  <hr>
                  <div class="row">
                    <p style="text-align: justify; !important">
                      En caso de que no haya recigido tu pedido, ponte en contacto
                      con nosotros para más información. Si eso no funciona, siempre
                      puedes abrir disputa para solicitar un reembolso
                    </p>
                  </div>
                  <hr>
                  <div class="row">
                    <p style="text-align: justify; !important">¿LA RESPUESTA FUE ÚTIL?</p>
                  </div>
                  <div class="row">
                    <div class="col s4" style="padding-right: 0px; padding-left: 0px">
                      <a href="#" class="btn btn-color" style="background-color: #868686">
                        <span>
                          <i style="padding-right: 0px" class="material-icons">thumb_up</i>
                        </span>
                        <span>Si</span>
                       </a>
                    </div>
                    <div class="col s4" style="padding-left: 0px">
                      <a href="#" class="btn btn-color" style="background-color: #868686">
                        <span>
                          <i class="material-icons">thumb_down </i>
                        </span>
                        <span>
                          No
                        </span>
                       </a>
                    </div>
                    <div class="col s2">

                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <p style="text-align: justify; !important">Preguntas Relacionadas</p>
                  </div>
                  <hr>
                  <div class="row">
                    <p style="text-align: justify; !important"><a href="" style="color: #000000">¿Qué pasa si me llega un producto vencido?</a></p>
                    <p style="text-align: justify; !important"> <a href="" style="color: #000000">¿Qué pasa si mi pedio no llega?</a> </p>
                    <p style="text-align: justify; !important"> <a href="" style="color: #000000">¿Qué pasa si mi pedido llega en las estado?</a> </p>
                  </div>
                </div>
              </li>
              <div class="row">
                <p>
                  <a href="#" style="color: #000000">Ver más</a>
                </p>
              </div>
            </ul>
          </div>
        </div> -->
      </div>
    </div>
  </div>
        <!-- <div class="card" style="padding-bottom: 20px;">
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
        </div> -->

</div>

    @endsection
    <script type="text/javascript">
    function preguntas(valor){
      if(valor == 'frecuentes'){
        document.getElementById("preguntasFrecuentes").style.display = 'block';
        document.getElementById("preguntasConsultas").style.display = 'none';
        document.getElementById("preguntasHistorial").style.display = 'none';
        document.getElementById("preguntasMimonedero").style.display = 'none';
        document.getElementById("preguntasRecetas").style.display = 'none';
        // document.getElementById("preguntasFrecuentes").style.display = 'block';
      }else if (valor == 'consultas') {
        document.getElementById("preguntasFrecuentes").style.display = 'none';
        document.getElementById("preguntasConsultas").style.display = 'block';
        document.getElementById("preguntasHistorial").style.display = 'none';
        document.getElementById("preguntasMimonedero").style.display = 'none';
        document.getElementById("preguntasRecetas").style.display = 'none';
      }else if (valor == 'historial') {
        document.getElementById("preguntasFrecuentes").style.display = 'none';
        document.getElementById("preguntasConsultas").style.display = 'none';
        document.getElementById("preguntasHistorial").style.display = 'block';
        document.getElementById("preguntasMimonedero").style.display = 'none';
        document.getElementById("preguntasRecetas").style.display = 'none';
      }else if (valor == 'recetas') {
        document.getElementById("preguntasFrecuentes").style.display = 'none';
        document.getElementById("preguntasConsultas").style.display = 'none';
        document.getElementById("preguntasHistorial").style.display = 'none';
        document.getElementById("preguntasMimonedero").style.display = 'none';
        document.getElementById("preguntasRecetas").style.display = 'block';
      }else {
        document.getElementById("preguntasFrecuentes").style.display = 'none';
        document.getElementById("preguntasConsultas").style.display = 'none';
        document.getElementById("preguntasHistorial").style.display = 'none';
        document.getElementById("preguntasMimonedero").style.display = 'block';
        document.getElementById("preguntasRecetas").style.display = 'none';
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
