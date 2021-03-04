@extends('layouts/default')

{{-- Page title --}}
@section('title')
Contact
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!--page level css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/contact.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/como-funciona.css') }}">
    <!--end of page level css-->
@stop

{{-- breadcrumb --}}
@section('top')

@stop


{{-- Page content --}}
@section('content')

    <!-- <div class="row"  style="padding-top: 73px">
      <div class="img-thumbnail" style="background-size:100% auto;position:relative; height:430px; width:100%; background-image: url('/assets/images/banner.jpeg');">

      </div>
    </div> -->


    <div class="section-mobile">
      <div class="max-ancho">
        <div class="row">
          <div class="col m6 s12">
            <div class="title-content-mobile">
              <h1> See an NHS GP in minutes for free*</h1>
            </div>
            <div class="row description-content-mobile">
              <div class="description-item">
                <img width="50px" src="https://s3-eu-west-1.amazonaws.com/nhs-gp-at-hand-production/icons/mobile-video-wide.png"> <label><b>On mobile</b></label> <span>in minutes 24/7</span>
              </div>
              <div class="description-item">
                <img width="50px" src="https://s3-eu-west-1.amazonaws.com/nhs-gp-at-hand-production/icons/doctor-wide.png"> <label><b>In person</b></label> <span>at a choice of locations</span>
              </div>
              <div class="description-item">
                <img width="50px" src="https://s3-eu-west-1.amazonaws.com/nhs-gp-at-hand-production/icons/prescriptions-wide.png"> <label><b>Prescriptions delivered</b></label> <span>to your local pharmacy</span>
              </div>
            </div>
            <div class="row">
              <div class="text-center">
                <button type="button" name="button" class="btn btn-register" style="color: #e22715 !important;">REGISTRATE AHORA</button>
              </div>
            </div>
            <div class="row">
              <div class="description-content">
                <p style="text-align: justify;">*To register you will need to switch from your current GP practice. Once an application is made, a registration period will apply before you are able to access the service. Available for people living or working within 40 minutes of one of our clinic locations.</p>
              </div>
            </div>
          </div>
          <div class="col m6 s12">
            <div class="img-mobile">
              <img src="/assets/images/image_mobile.jpg" alt="" width="750px">
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="section-information">
      <div class="row">
        <div class="col m6 s12" style="padding:0px;">
          <div class="img-information">
            <!-- <img src="https://s3-eu-west-1.amazonaws.com/nhs-gp-at-hand-production/hero/hero-man-on-couch.jpg" alt="" width="600px"> -->
          </div>
        </div>
        <div class="col m6 s12" style="padding:0px;">
          <div class="description-section-information">
            <p class="text-white text-left">Medicentros Peruanos</p>
            <h1 class="text-white title-information"> <b>Comunicarte con un doctor nunca había sido tan sencillo.</b>  </h1>
            <p class="description-information">Nuestra red de doctores especializados estarán contentos de atenderte, sin importar la hora.</p>
            <p class="description-information"> <b>Sólo abre una consulta, coloca los síntomas que estas padeciendo, y dale clic en llamar. Nuestros doctores se encargaran del resto.</b> </p>
          </div>
        </div>
      </div>
    </div>

    <div class="section-how-work">
      <div class="max-ancho">
        <div class="row title-how-work">
          <h1 class="text-center"> <b>Cómo funciona</b> </h1>
        </div>

        

        <div class="row items-how-work">
          <div class="col m1">

          </div>
          <div class="col m10 s12">
            <div class="col m4 s12">
              <img width="70px" src="https://s3-eu-west-1.amazonaws.com/nhs-gp-at-hand-production/icons/virtual-appointments-no-padding.svg">
              <h4> <b>No importa dónde estes.</b></h4>
              <p class="text-left">
                Desde la comodidad de tu casa, en tu oficina, da igual. Puedes comunicarte con un doctor siempre y cuando tengas un dispositivo que pueda acceder a la aplicación.
              </p>
            </div>
            <div class="col m4 s12">
              <img width="70px" style="padding-bottom: 18px" src="https://s3-eu-west-1.amazonaws.com/nhs-gp-at-hand-production/icons/prescriptions-no-padding.svg">
              <h4> <b>Multitud de dispositivos</b></h4>
              <p class="text-left">
                Accede al servicio desde tu computadora, teléfono o tablet. No hay límites.
              </p>
            </div>
            <div class="col m4 s12">
              <img width="70px" src="https://s3-eu-west-1.amazonaws.com/nhs-gp-at-hand-production/icons/hospital-no-padding.svg">
              <h4> <b>24/7</b></h4>
              <p class="text-left">
                Nuestros doctores estarán disponibles 24/7 para atender tu llamada. No hay hora específica cuando se trata de salud.
              </p>
            </div>

          </div>
          <div class="col m1">

          </div>
        </div>

        <div class="row">
          <div class="col m1">

          </div>
          <div class="col m10 s12">
            <div class="col m4 s12">
              <img width="70px" style="padding-bottom: 35px" src="https://s3-eu-west-1.amazonaws.com/nhs-gp-at-hand-production/icons/heartbeat.svg">
              <h4><b>Sin citas.</b></h4>
              <p class="text-left">
                Las citas médicas son cosas del pasado. Consulta a un médico cuando quieras y donde quieras.
              </p>
            </div>
            <div class="col m4 s12">
              <img width="70px" style="padding-bottom: 23px" src="https://s3-eu-west-1.amazonaws.com/nhs-gp-at-hand-production/icons/symptom-checker-no-padding.svg">
              <h4><b>Fácil y práctico</b></h4>
              <p class="text-left">
                El sistema es súper fácil y práctico. Solo abre la consulta, coloca tus datos y llama al doctor de tu preferencia.
              </p>
            </div>
            <div class="col m4 s12">
              <img width="70px" src="https://s3-eu-west-1.amazonaws.com/nhs-gp-at-hand-production/icons/medical-records-no-padding.svg">
              <h4><b>Médicos especialistas de altura</b></h4>
              <p class="text-left">
                Nuestros médicos son especialistas calificados en sus materias. Estan capacitados, y cumplen los más altos estándares para darte una respuesta acertada a tus malestares.
              </p>
            </div>

          </div>
          <div class="col m1">

          </div>
        </div>

      </div>
    </div>

    <div class="section-stepper">
      <div class="max-ancho">
        <div class="row title-stepper">
          <h1 class="text-center"><b>¿Cómo unirte a Medicentros Peruanos?</b></h1>
        </div>

        <div class="row numbers-sttepper">
          <div class="col m1">

          </div>
          <div class="col m10 s12">
            <div class="col m3 s12">
              <div class="number1">
                <h1 class="text-center">1</h1>
              </div>
              <div class="">
                <h5 class="text-center"><b>check your eligibility</b></h5>
              </div>
              <div class="">
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. </p>
              </div>
            </div>
            <div class="col m3 s12">
              <div class="number1">
                <h1 class="text-center">2</h1>
              </div>
              <div class="">
                <h5 class="text-center"><b>check your eligibility</b></h5>
              </div>
              <div class="">
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. </p>
              </div>
            </div>
            <div class="col m3 s12">
              <div class="number1">
                <h1 class="text-center">3</h1>
              </div>
              <div class="">
                <h5 class="text-center"><b>check your eligibility</b></h5>
              </div>
              <div class="">
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. </p>
              </div>
            </div>
            <div class="col m3 s12">
              <div class="number1">
                <h1 class="text-center">4</h1>
              </div>
              <div class="">
                <h5 class="text-center"><b>check your eligibility</b></h5>
              </div>
              <div class="">
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. </p>
              </div>
            </div>

          </div>
          <div class="col m1">

          </div>
        </div>

        <div class="row btn-stepper">
          <div class="text-center">
            <button type="button" name="button" class="btn btn-register" style="color: #e22715 !important;">REGISTRATE AHORA</button>
          </div>
        </div>

        <div class="row final-stepper">
          <div class="title-final-stepper">
            <h3 class="text-center">Powered By Medicentros Peruanos</h3>
          </div>
          <div class="description-final-stepper">
            <div class="row">
              <div class="col s2">

              </div>
              <div class="col s8">
                <p>Babylon’s AI services provide health information only, and do not provide a diagnosis. The AI services respond to the information entered, and the information provided is based on risk factors and statistics, rather than a personalised assessment. The AI services are not a substitute for a doctor, and should not be used in a medical emergency.</p>

              </div>
              <div class="col s2">

              </div>
            </div>
          </div>
          <div class="deal-final-stepper">
            <div class="row">
              <div class="col s2">

              </div>
              <div class="col s8">
                <p>Babylon is regulated by the Care Quality Commission in England</p>

              </div>
              <div class="col s2">

              </div>
            </div>
          </div>


        </div>
      </div>

    </div>

    <div class="section-phrase">
      <div class="max-ancho">
        <div class="row phrase-section-app">
          <h1 class="text-center text-white"> <b>"FACIL DE USAR"</b> </h1>
        </div>
      </div>
    </div>

    <div class="section-app">
      <div class="max-ancho">
        <div class="row title-section-app">
          <h2 class="text-center"> <b>DESCARGA LA APLICACIÓN</b> </h2>
        </div>
        <div class="row img-section-app">
          <div class="col m4">

          </div>
          <div class="col m4 s12">
            <div class="col m6" style="padding-left:0px">
              <div class="text-right">
                <a target="_blank" href="https://play.google.com/store/apps/details?id=com.vexsoluciones.alodoctorpaciente">
                  <img src="assets/images/google_play.png" width="150px" alt="">
                </a>
              </div>
            </div>
            <div class="col m6" style="padding-left: 0px; padding-top: 10px">
              <div class="">
                <a target="_blank" href="https://play.google.com/store/apps/details?id=com.vexsoluciones.alodoctorpaciente">
                  <img src="assets/images/appstore.png" width="120px" height="40px" alt="">
                </a>
              </div>
            </div>

          </div>
          <div class="col m4">

          </div>
        </div>
      </div>
    </div>

@stop

{{-- page level scripts --}}
@section('footer_scripts')

@stop
