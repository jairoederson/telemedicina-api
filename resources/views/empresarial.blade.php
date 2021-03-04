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
        <div class="col s12 m6" style="padding:0px;">
          <div class="img-information">
            <!-- <img src="https://s3-eu-west-1.amazonaws.com/nhs-gp-at-hand-production/hero/hero-man-on-couch.jpg" alt="" width="600px"> -->
          </div>
        </div>
        <div class="col s12 m6" style="padding:0px;">
          <div class="description-section-information">
            <p class="text-white text-left">Humanidad Sur and the NHS</p>
            <h1 class="text-white title-information"> <b>An NHS GP practice</b>  </h1>
            <h1 class="text-white"> <b>that works around you.</b> </h1>
            <p class="description-information">Our GPs are available 24 hours a day, 365 days a year. Every session is free, no matter how long the appointment lasts. We offer a full NHS GP service including digital appointments, physical appointments at one of our five locations, repeat prescriptions and specialist referrals.</p>
            <p class="description-information"> <b>By registering, you will be switching from your current NHS practice to GP at hand.</b> </p>
          </div>
        </div>
      </div>
    </div>

    <div class="section-how-work">
      <div class="max-ancho">
        <div class="row title-how-work">
          <h1 class="text-center"> <b>Cómo funciona</b> </h1>
        </div>

        <div class="row video-how-work">
          <div class="col m2">

          </div>
          <div class="col m8 s12">
            <div class="text-center">
              <video width="800px" preload="none" controls="" poster="https://s3-eu-west-1.amazonaws.com/nhs-gp-at-hand-production/hero/hero-gp-clinic-locations-mothers-children.jpg ">
                <source src="https://s3-eu-west-1.amazonaws.com/nhs-gp-at-hand-production/videos/mother-with-children-with-audio-2018.mov" type="video/webm">
                <source src="https://s3-eu-west-1.amazonaws.com/nhs-gp-at-hand-production/videos/mother-with-children-with-audio-2018.mov" type="video/mp4">
              </video>
            </div>

          </div>
          <div class="col m2">

          </div>
        </div>

        <div class="row items-how-work">
          <div class="col m1">

          </div>
          <div class="col m10 s12">
            <div class="col m4 s12">
              <img width="70px" src="https://s3-eu-west-1.amazonaws.com/nhs-gp-at-hand-production/icons/virtual-appointments-no-padding.svg">
              <h4> <b>Virtual GP appointment</b></h4>
              <p class="text-left">
                See a doctor quicker. Video appointments are available 24/7 on mobile or tablet and often within two hours of booking.
              </p>
            </div>
            <div class="col m4 s12">
              <img width="70px" style="padding-bottom: 18px" src="https://s3-eu-west-1.amazonaws.com/nhs-gp-at-hand-production/icons/prescriptions-no-padding.svg">
              <h4> <b>Prescriptions sorted</b></h4>
              <p class="text-left">
                Our NHS GPs prescribe medicines which you can collect from a local pharmacy of your choice, usually within the hour.
              </p>
            </div>
            <div class="col m4 s12">
              <img width="70px" src="https://s3-eu-west-1.amazonaws.com/nhs-gp-at-hand-production/icons/hospital-no-padding.svg">
              <h4> <b>Your choice of clinics</b></h4>
              <p class="text-left">
                If you need to see a doctor in person, we have five clinics in London and you can visit the one most convenient for you.
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
              <h4><b>Digital Healthcheck</b></h4>
              <p class="text-left">
                Healthcheck is a free information and educational tool to help you understand health risk factors, health profile, and lifestyle changes designed to help achieve a healthy lifestyle.
              </p>
            </div>
            <div class="col m4 s12">
              <img width="70px" style="padding-bottom: 23px" src="https://s3-eu-west-1.amazonaws.com/nhs-gp-at-hand-production/icons/symptom-checker-no-padding.svg">
              <h4><b>Instant symptom checker</b></h4>
              <p class="text-left">
                Check your symptoms and get health information anytime using the symptom checker.
              </p>
            </div>
            <div class="col m4 s12">
              <img width="70px" src="https://s3-eu-west-1.amazonaws.com/nhs-gp-at-hand-production/icons/medical-records-no-padding.svg">
              <h4><b>Medical records</b></h4>
              <p class="text-left">
                Quickly view medical notes and replay a video of your appointment with records securely stored in your app.
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
          <h1 class="text-center"><b>¿Cómo unirte a Humanidad Sur?</b></h1>
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
          <div class="col s1">

          </div>
        </div>

        <div class="row btn-stepper">
          <div class="text-center">
            <button type="button" name="button" class="btn btn-register" style="color: #e22715 !important;">REGISTRATE AHORA</button>
          </div>
        </div>

        <div class="row final-stepper">
          <div class="title-final-stepper">
            <h3 class="text-center">Powered By Humanidad Sur</h3>
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
          <h1 class="text-center text-white"> <b>"EASY TO USE"</b> </h1>
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
