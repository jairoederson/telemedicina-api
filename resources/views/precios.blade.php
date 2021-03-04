@extends('layouts/default')

{{-- Page title --}}
@section('title')
Price
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!--page level css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/price.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/faq.css') }}">
    <!-- <link href="{{ asset('assets/vendors/animate/animate.min.css') }}" rel="stylesheet" type="text/css"/> -->
    <!--end of page level css-->
@stop

{{-- breadcrumb --}}



{{-- Page content --}}
@section('content')
<div class="section-price">
  <div class="container max-ancho espacio-top espacio-bottom">
    <div class="row">
      <div class="col m6 s12 section-price-layer-left">
        <div class="col s1"></div>
        <div class="col m10 s12">
          <div class="section-price-box" style="background-color: #fff">
            <div class="text-center">
              <img src="https://image.flaticon.com/icons/svg/913/913402.svg" alt="price" width="80px">
            </div>
            <h3 class="text-center">PLAN PARTICULAR</h3>
            <p class="text-center">Es un plan enfocado a individuales o familias.</p>
            <h1 class="text-center"><b>S/5.00</b></h1>
            <p class="text-center"><span>por consulta.</span></p>
            <div class="row">
              <div class="col s12 center">
                <a href="{{ URL::to('register') }}" class="btn btn-main" style="color: #e22715 !important; background-color: #fff;">Registrate</a>
              </div>
            </div>

          </div>
        </div>
        <div class="col s1"></div>
      </div>
      <div class="col m6 s12 section-price-layer-right">
        <div class="col s1"></div>
        <div class="col m10 s12">
          <div class="section-price-box">
            <div class="text-center">
              <img src="https://image.flaticon.com/icons/svg/808/808982.svg" alt="price" width="80px">
            </div>
            <h3 class="text-center">PLAN EMPRESARIAL</h3>
            <p class="text-center">Es un plan enfocado a empresas. Protege a tu personal.</p>
            <h1 class="text-center"><b>Pospago</b></h1>
            <p class="text-center"><span>por consulta</span></p>
            <div class="row">
              <!-- <div class="col s6 text-right">
                <button type="button" name="button" class="btn">Free trial</button>
              </div> -->
              <div class="col s12 text-center">
                <a href="{{ URL::to('contacto') }}" class="btn btn-main" style="color: #e22715 !important; background-color: #fff;">CONTÁCTANOS</a>
              </div>
            </div>

          </div>
        </div>
        <div class="col s1"></div>
      </div>
    </div>

  </div>
</div>

<div class="section-frequently-questions">
  <div class="container max-ancho">


    <div class="row">
      
      <div class="col s12">

        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="panel-accordion faq-accordion">
                  <div id="faq">
                    <div class="mix category-1 col-lg-12 panel panel-default" data-value="1">
                      <div class="panel-heading">
                        <h1 class="panel-title text-center">
                          <a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#question1" style="font-size: 25px">
                            <b>Preguntas frecuentes, contestadas.</b> &nbsp;
                            <i class="glyphicon glyphicon-chevron-down"></i>
                            <span class="pull-right">
                              <!-- <i class="glyphicon glyphicon-chevron-down"></i> -->
                            </span>
                          </a>
                        </h1>
                      </div>
                      <div id="question1" class="panel-collapse collapse">
                        <div class="panel-body">
                          <!-- subquestions -->
                          <div class="col-md-12 container">

                            <div class="panel panel-default">
                              <div class="panel-body">
                                <div class="panel-accordion">
                                  <div id="faqs">
                                    <p class="row">
                                      <h3 class="group-questions">SERVICIO.</h3>
                                    </p>
                                    <div class="mix category-2 col-md-12 panel panel-default" data-value="2">
                                      <div class="panel-heading" >
                                        <h4 class="panel-title">
                                          <a class="collapsed" data-toggle="collapse" data-parent="#faqs" href="#subquestion1">
                                            ¿Debo registrarme para realizar una consulta?
                                            <span class="pull-right">
                                              <i class="glyphicon glyphicon-chevron-down"></i>
                                            </span>
                                          </a>
                                        </h4>
                                      </div>
                                      <div id="subquestion1" class="panel-collapse collapse">
                                        <div class="panel-body">
                                          <p>
                                            R. Sí, debes registrarte para realizar una. Clic <a href="{{ URL::to('register') }}">aquí</a> para hacerlo.
                                          </p>

                                        </div>
                                      </div>
                                    </div>
                                    <div class="mix category-3 col-md-12 panel panel-default" data-value="3">
                                      <div class="panel-heading">
                                        <h4 class="panel-title">
                                          <a class="collapsed" data-toggle="collapse" data-parent="#faqs" href="#question2">
                                            ¿En qué plataformas puedo acceder al servicio?
                                            <span class="pull-right">
                                              <i class="glyphicon glyphicon-chevron-down"></i>
                                            </span>
                                          </a>
                                        </h4>
                                      </div>
                                      <div id="question2" class="panel-collapse collapse">
                                        <div class="panel-body">
                                          <p>
                                            R. Desde iPhone/iPad, Android, y computadora.
                                          </p>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="mix category-4 col-md-12 panel panel-default" data-value="4">
                                      <div class="panel-heading">
                                        <h4 class="panel-title">
                                          <a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#question3">
                                            ¿La consulta online es una llamada, videollamada o chat?
                                            <span class="pull-right">
                                              <i class="glyphicon glyphicon-chevron-down"></i>
                                            </span>
                                          </a>
                                        </h4>
                                      </div>
                                      <div id="question3" class="panel-collapse collapse">
                                        <div class="panel-body">
                                          <p>
                                            R. Es una videollamada directa con el doctor, pero si lo deseas puedes desactivar la cámara para que sea solamente audio.
                                          </p>

                                        </div>
                                      </div>
                                    </div>
                                    <div class="mix category-5 col-md-12 panel panel-default" data-value="5">
                                      <div class="panel-heading" >
                                        <h4 class="panel-title">
                                          <a class="collapsed" data-toggle="collapse" data-parent="#faqs" href="#question4">
                                            ¿Dan recipes médicos?
                                            <span class="pull-right">
                                              <i class="glyphicon glyphicon-chevron-down"></i>
                                            </span>
                                          </a>
                                        </h4>
                                      </div>
                                      <div id="question4" class="panel-collapse collapse">
                                        <div class="panel-body">
                                          <p>
                                            R. Si, al final de la consulta el médico le recetará uno. Si lo desea se lo podemos enviar a la puerta de su casa.
                                          </p>

                                        </div>
                                      </div>
                                    </div>
                                    <p class="row">
                                      <h3 class="group-questions">DOCTORES</h3>
                                    </p>

                                    <div class="mix category-6 col-md-12 panel panel-default" data-value="6">
                                      <div class="panel-heading">
                                        <h4 class="panel-title">
                                          <a class="collapsed" data-toggle="collapse" data-parent="#faqs" href="#question5">
                                            ¿El doctor que me verá, lo puedo escoger?
                                            <span class="pull-right">
                                              <i class="glyphicon glyphicon-chevron-down"></i>
                                            </span>
                                          </a>
                                        </h4>
                                      </div>
                                      <div id="question5" class="panel-collapse collapse">
                                        <div class="panel-body">
                                          <p>
                                            R. Sí, de hecho es el cliente el que selecciona cuál doctor prefiere para la consulta. Podrá ver su nombre, sus títulos y especialidades.
                                          </p>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="mix category-7 col-md-12 panel panel-default" data-value="7">
                                      <div class="panel-heading">
                                        <h4 class="panel-title">
                                          <a class="collapsed" data-toggle="collapse" data-parent="#faqs" href="#question6">
                                            ¿Los doctores son especialistas?
                                            <span class="pull-right">
                                              <i class="glyphicon glyphicon-chevron-down"></i>
                                            </span>
                                          </a>
                                        </h4>
                                      </div>
                                      <div id="question6" class="panel-collapse collapse">
                                        <div class="panel-body">
                                          <p>
                                            R. Sí, la gran mayoría es especialista. Y usted puede escoger solamente doctores especialistas si así lo quisiera.
                                          </p>

                                        </div>
                                      </div>
                                    </div>


                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- subquestions end -->
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>

<div class="section-more-questions">
  <div class="container max-ancho">
    <div class="row content-more-questions">
      <h1 class="text-center title-more-questions"> <b>Más preguntas?</b></h1>
      <h4 class="text-center">Nuetro <a href="#">centro de ayuda</a> está abierto 24/7 o comuníquese con nuestro equipo de soporte global. <a href="#">Estamos aquí para ayudarte</a>.</h4>
    </div>
  </div>
</div>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script type="text/javascript" src="{{ asset('assets/vendors/mixitup/jquery.mixitup.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/frontend/faq.js') }}"></script>
    <script src="{{ asset('assets/vendors/wow/js/wow.min.js') }}" type="text/javascript"></script>

    <script>
        jQuery(document).ready(function () {
            new WOW().init();
        });
    </script>
    <!-- <script type="text/javascript" src="{{ asset('assets/js/frontend/faq.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/mixitup/jquery.mixitup.js') }}"></script> -->
@stop
