@extends('layouts/default')

{{-- Page title --}}
@section('title')
Home
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!--page level css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/tabbular.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/home.css') }}">
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/animate/animate.min.css') }}" /> -->
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/jquery.circliful.css') }}"> -->
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/owl_carousel/css/owl.carousel.css') }}"> -->
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/owl_carousel/css/owl.theme.css') }}"> -->
    <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/svg/TweenMax.min.js') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/svg/waypoints.min.js') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/svg/icons.js') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/svg/seoicons.js') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/svg/snap.svg.js') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/svg/seoicons.css') }}">
    <style media="screen">
      ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: #000;
        opacity: 1; /* Firefox */
      }
    </style>
    <!--end of page level css-->
@stop

{{-- slider --}}
@section('top')

<!--Carousel Start -->
<div class="row" style="padding-top:75px;">
  <div class="img-thumbnail" style="background-size:100% auto;position:absolute; height:430px; width:100%; background-image: url('/assets/images/banner.jpeg'); background-repeat: no-repeat;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
  </div>
</div>
<div id="wizardAloDoctor">
  <div class="max-ancho pagination-centered row" style="position:relative;display:block;height:430px; padding:16% 0px 0px 0px; align:center;
  display: flex;
    align-items: center;
    justify-content: center;
">
    <div class="col s1 l2"></div>
    <div class="col s10 l8">
      <div class="center panel-wizard">
        <img src="assets/images/app_image.png" style="width:300px">
        <div>
          <img src="assets/images/google_play.png" width="150px" alt="">
          <img src="assets/images/appstore.png" width="120px" height="40px" alt=""> 
      </div>
     
      </div>
      {{-- <div class="center panel-wizard" style="width:auto;height: 320px; background-color: rgba(255, 2555, 255, 0.7); padding:40px">
        <div class="container" style="width:auto;">
          <h5 class="banner" style="font-size: 40px;color:#e22715;"> <b>Hola! ¿Cómo puedo ayudarte?</b> </h5>
          <div class="row" style="padding-top: 40px">
            <div class="col-sm-9">
              <input id="query" onkeyup="typeQuery()" type="text" name="" value="" style="color: black !important; border-bottom: 1px solid #868686 !important" placeholder="Comienza escribiendo tu consulta o Síntoma">
            </div>
            <div class="col-sm-3">
              <button id="button01" class="btn disabled" type="button" name="button" onclick="loadWizard02()" style="background-color: #fff; color: #e22715 !important; border: 1px solid;">Enviar Consulta</button>
            </div>
          </div>
          <br>
        </div>
      </div> --}}
    </div>
    <div class="col s1 l2"></div>
  
  </div>

</div>


<!-- //Carousel End -->
@stop

{{-- content --}}
@section('content')
<div class="section-card" style="width: 100%;">
  <div class="container max-ancho espacio-top espacio-bottom">
    <div class="row" style="text-align: center;">
      <div class="row">
        <h2 id="paciente" style="color: #000; padding-bottom: 5px">¿Cómo funciona Telemedicina?</h2>
      </div>
      <div class="row" style="padding-bottom: 55px">
        <p style="font-size: 16px; padding-left: 30px; padding-right: 30px">Telemedicina es una red verificada de profesionales de la salud creada para darte el mejor asesoramiento online y presencial que resolverá todas tus dudas y te ayudará a tener la mejor salud posible, aprovechando al máximo el poder de la inteligencia artificial.</p>
      </div>
      <div class="col-md-6">
          <div class="box">
            <div class="box-icon">
              <div class="seoicon contentWritingIcon" style="visibility: visible ;width:80px"><!--?xml version="1.0" encoding="utf-8"?-->
                <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                <svg version="1.1" id="contentWritingIcon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-212 88 75 75" style="enable-background:new -212 88 75 75;" xml:space="preserve">
                <style type="text/css">
                  .st0{fill:none;stroke:#000000;stroke-width:1.17;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                </style>
                <g>
                  <g>
                    <path id="path0" class="st0" d="M-195.1,112.4c1,0,1,0,1,0" style="stroke-dasharray: 1, 1; stroke-dashoffset: 0;"></path>
                    <path id="path1" class="st0" d="M-191,112.4c1,0,1,0,1,0" style="stroke-dasharray: 1, 1; stroke-dashoffset: 0;"></path>
                    <path id="path2" class="st0" d="M-186.8,112.4c1,0,1,0,1,0" style="stroke-dasharray: 1, 1; stroke-dashoffset: 0;"></path>
                    <path id="path4" class="st0" d="M-193.8,131.7h19.1 M-193.8,134.7h15.7 M-181.4,137.9h-12.5 M-182.6,141.2h-11.3 M-193.8,125.4
                      h27.6 M-193.8,128.6h23.2 M-193.8,122.5h27.6" style="stroke-dasharray: 136.999, 136.999; stroke-dashoffset: 0;"></path>
                    <path id="path5" class="st0" d="M-199.8,115.1c39.1,0,39.1,0,39.1,0" style="stroke-dasharray: 39.1001, 39.1001; stroke-dashoffset: 0;"></path>
                    <path id="path7" class="st0" d="M-199.8,149.6c0-13.8,0-23,0-36.7c0-1.2,0.4-3.1,3.1-3.1c11.4,0,21.1,0,32.6,0
                      c1.4,0,2.1,0.3,2.8,0.9c0.6,0.6,0.7,1.2,0.7,2.3c0,0.9,0,8.4,0,8.4" style="stroke-dasharray: 88.2068, 88.2068; stroke-dashoffset: 0;"></path>
                    <path id="path3" class="st0" d="M-178.9,141.2L-178.9,141.2c-0.2-0.3,2.7-4.3,2.7-4.3s19.1-13.9,19.7-14.3l0,0
                      c0.9-0.6,2.1-0.4,2.7,0.4l0,0c0.6,0.9,0.4,2.1-0.5,2.7l0,0c-0.5,0.4-19.6,14.2-19.6,14.2S-178.7,141.4-178.9,141.2z" style="stroke-dasharray: 64.8934, 64.8934; stroke-dashoffset: 0;"></path>
                    <path id="path6" class="st0" d="M-161,125.9c2.1,2.8,0.2,0.2,2.3,3" style="stroke-dasharray: 3.78101, 3.78101; stroke-dashoffset: 0;"></path>
                  </g>
                  <g id="stars_1_">
                    <path id="star5" d="M-150.9,113.9c-1.3,0-2.2,1-2.2,2.2c0,1.3,1,2.2,2.2,2.2c1.3,0,2.2-1,2.2-2.2
                      C-148.8,114.8-149.7,113.9-150.9,113.9z M-150.9,117.7c-0.9,0-1.6-0.7-1.6-1.6s0.7-1.6,1.6-1.6s1.6,0.7,1.6,1.6
                      S-150,117.7-150.9,117.7z" style="opacity: 0;"></path>
                    <path id="star4" d="M-178.5,146.1c-0.9,0-1.7,0.7-1.7,1.7s0.7,1.7,1.7,1.7s1.7-0.7,1.7-1.7S-177.6,146.1-178.5,146.1z
                       M-178.5,149.1c-0.7,0-1.3-0.5-1.3-1.3s0.5-1.3,1.3-1.3c0.7,0,1.3,0.5,1.3,1.3S-177.9,149.1-178.5,149.1z" style="opacity: 0;"></path>
                    <path id="star3" d="M-152.7,135.5c-2.4,0-3.2-0.7-3.2-3.2c0-0.2-0.1-0.3-0.3-0.3s-0.3,0.1-0.3,0.3c0,2.4-0.8,3.2-3.2,3.2
                      c-0.2,0-0.3,0.1-0.3,0.3s0.1,0.3,0.3,0.3c2.4,0,3.2,0.7,3.2,3.2c0,0.2,0.1,0.3,0.3,0.3s0.3-0.1,0.3-0.3c0-2.4,0.7-3.2,3.2-3.2
                      c0.2,0,0.3-0.1,0.3-0.3S-152.6,135.5-152.7,135.5z M-156.2,137.2c-0.3-0.7-0.7-1.2-1.4-1.4c0.7-0.3,1.2-0.7,1.4-1.4
                      c0.3,0.7,0.7,1.2,1.4,1.4C-155.5,136.1-156,136.5-156.2,137.2z" style="opacity: 0;"></path>
                    <path id="star2" d="M-159.1,103.6c-2,0-2.6-0.6-2.6-2.6c0-0.2-0.1-0.2-0.2-0.2c-0.2,0-0.2,0.1-0.2,0.2c0,2-0.6,2.6-2.6,2.6
                      c-0.2,0-0.2,0.1-0.2,0.2s0.1,0.2,0.2,0.2c2,0,2.6,0.6,2.6,2.6c0,0.2,0.1,0.2,0.2,0.2c0.2,0,0.2-0.1,0.2-0.2c0-2,0.6-2.6,2.6-2.6
                      c0.2,0,0.2-0.1,0.2-0.2S-159,103.6-159.1,103.6z M-161.9,105c-0.2-0.6-0.6-1-1.2-1.2c0.6-0.2,1-0.6,1.2-1.2c0.2,0.6,0.6,1,1.2,1.2
                      C-161.3,104.1-161.7,104.4-161.9,105z" style="opacity: 0;"></path>
                    <path id="star1" d="M-160.4,142.7c-1.8,0-2.3-0.5-2.3-2.3c0-0.1-0.1-0.2-0.2-0.2s-0.2,0.1-0.2,0.2c0,1.8-0.5,2.3-2.3,2.3
                      c-0.1,0-0.2,0.1-0.2,0.2c0,0.1,0.1,0.2,0.2,0.2c1.8,0,2.3,0.5,2.3,2.3c0,0.1,0.1,0.2,0.2,0.2s0.2-0.1,0.2-0.2
                      c0-1.8,0.5-2.3,2.3-2.3c0.1,0,0.2-0.1,0.2-0.2S-160.3,142.7-160.4,142.7z M-162.9,143.9c-0.2-0.5-0.5-0.8-1.1-1
                      c0.5-0.2,0.8-0.5,1.1-1.1c0.2,0.5,0.5,0.9,1,1.1C-162.4,143.1-162.8,143.4-162.9,143.9z" style="opacity: 0.0126667;"></path>
                  </g>
                </g>
                <desc>Created with Snap</desc><defs></defs></svg>
              </div>



            </div>
            <div class="info">
              <h3 class="text-center title-box">Identifícate</h3>
              <p>Identificate con tu correo y contraseña para realizar una consulta online. Puedes acceder con facebook o google también.</p>
              <!-- <div class="text-right">
                <a href="#" class="enlace-color" style="">Ver más</a>
              </div> -->
            </div>
          </div>
      </div>
      <div class="col-md-6">
        <div class="box">
            <div class="box-icon">


              <div class="seoicon voiceSearchIcon" style="visibility: visible; width:80px"><!--?xml version="1.0" encoding="utf-8"?-->
                <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                <svg version="1.1" id="voiceSearchIcon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-212 88 75 75" style="enable-background:new -212 88 75 75;" xml:space="preserve">
                <style type="text/css">
                  .st0{fill:none;stroke:#000000;stroke-width:1.17;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                </style>
                <g>
                  <path id="path5" class="st0" d="M-176.5,146.7c0,3.1,0,4,0,6.7" style="stroke-dasharray: 6.70001, 6.70001; stroke-dashoffset: 0;"></path>
                  <path id="path7" class="st0" d="M-177.9,130.4c-3.1,0-2.5,0-5.2,0" style="stroke-dasharray: 5.20002, 5.20002; stroke-dashoffset: 0;"></path>
                  <path id="path6" class="st0" d="M-177.9,126c-3.1,0-2.5,0-5.2,0" style="stroke-dasharray: 5.20002, 5.20002; stroke-dashoffset: 0;"></path>
                  <path id="path4" class="st0" d="M-177.9,121.6c-3.1,0-2.5,0-5.2,0" style="stroke-dasharray: 5.20002, 5.20002; stroke-dashoffset: 0;"></path>
                  <path id="path2" class="st0" d="M-167,141.1c0,0-3.5,5.2-9.5,5.2c-7.2,0-9.5-5.2-9.5-5.2" style="stroke-dasharray: 22.633, 22.633; stroke-dashoffset: 0;"></path>
                  <path id="path3" class="st0" d="M-169,119.8c1.5,0,2.9,0.7,3.9,1.7s1.7,2.4,1.8,3.9c0.1,1.6-0.6,3.1-1.6,4.2c-1,1.1-2.5,1.8-4,1.8
                    c-1.7,0.1-3.2-0.6-4.3-1.7c-1.1-1.1-1.8-2.6-1.7-4.3c0.1-1.6,0.8-3,1.8-4C-172,120.4-170.5,119.8-169,119.8z" style="stroke-dasharray: 36.396, 36.396; stroke-dashoffset: 0;"></path>
                  <path id="path1" class="st0" d="M-162.5,130.4l4.9,4.6c1.4,1.3-0.5,3.9-2.1,2.1l0,0l-4.8-4.6l0,0" style="stroke-dasharray: 18.3411, 18.3411; stroke-dashoffset: 0;"></path>
                  <path id="path0" class="st0" d="M-169.8,134.4c0,3.9,0-2.1,0,1.6c0,3.2-2.7,5.7-5.7,6.2c-3.4,0.5-7.8-1.6-7.8-5.4
                    c0-7.5,0-13,0-20.6c0-3.4,3.8-5.7,6.8-5.7c3.6,0,6.7,2.8,6.7,5.7c0,1.3,0,0,0,1.3" style="stroke-dasharray: 64.8933, 64.8933; stroke-dashoffset: 0;"></path>
                  <g id="stars_1_">
                    <path id="star5" d="M-190.5,114.6c-1.2,0-2,0.9-2,2s0.9,2,2,2s2-0.9,2-2C-188.5,115.4-189.5,114.6-190.5,114.6z M-190.5,118
                      c-0.8,0-1.4-0.6-1.4-1.4s0.6-1.4,1.4-1.4s1.4,0.6,1.4,1.4S-189.7,118-190.5,118z" style="opacity: 0.518667;"></path>
                    <path id="star4" d="M-160.8,121.2c-0.8,0-1.5,0.6-1.5,1.5s0.6,1.5,1.5,1.5s1.5-0.6,1.5-1.5S-160,121.2-160.8,121.2z M-160.8,123.9
                      c-0.6,0-1.2-0.5-1.2-1.2c0-0.6,0.5-1.2,1.2-1.2c0.6,0,1.2,0.4,1.2,1.2S-160.2,123.9-160.8,123.9z" style="opacity: 0.452;"></path>
                    <path id="star3" d="M-180.1,106.3c-2.2,0-2.9-0.6-2.9-2.9c0-0.2-0.1-0.3-0.3-0.3s-0.3,0.1-0.3,0.3c0,2.2-0.7,2.9-2.9,2.9
                      c-0.2,0-0.3,0.1-0.3,0.3s0.1,0.3,0.3,0.3c2.2,0,2.9,0.6,2.9,2.9c0,0.2,0.1,0.3,0.3,0.3s0.3-0.1,0.3-0.3c0-2.2,0.6-2.9,2.9-2.9
                      c0.2,0,0.3-0.1,0.3-0.3S-180,106.3-180.1,106.3z M-183.3,107.8c-0.3-0.6-0.6-1.1-1.3-1.3c0.6-0.3,1.1-0.6,1.3-1.3
                      c0.3,0.6,0.6,1.1,1.3,1.3C-182.6,106.8-183,107.2-183.3,107.8z" style="opacity: 0.385333;"></path>
                    <path id="star2" d="M-164.2,111.5c-1.8,0-2.3-0.5-2.3-2.3c0-0.2-0.1-0.2-0.2-0.2c-0.2,0-0.2,0.1-0.2,0.2c0,1.8-0.5,2.3-2.3,2.3
                      c-0.2,0-0.2,0.1-0.2,0.2s0.1,0.2,0.2,0.2c1.8,0,2.3,0.5,2.3,2.3c0,0.2,0.1,0.2,0.2,0.2c0.2,0,0.2-0.1,0.2-0.2
                      c0-1.8,0.5-2.3,2.3-2.3c0.2,0,0.2-0.1,0.2-0.2S-164.1,111.5-164.2,111.5z M-166.7,112.8c-0.2-0.5-0.5-0.9-1.1-1.1
                      c0.5-0.2,0.9-0.5,1.1-1.1c0.2,0.5,0.5,0.9,1.1,1.1C-166.2,111.9-166.5,112.2-166.7,112.8z" style="opacity: 0.318667;"></path>
                    <path id="star1" d="M-186.2,128.6c-1.4,0-2-0.4-2-2c0-0.1-0.1-0.2-0.2-0.2s-0.2,0.1-0.2,0.2c0,1.4-0.5,2-2,2
                      c-0.1,0-0.2,0.1-0.2,0.2c0,0.1,0.1,0.2,0.2,0.2c1.4,0,2,0.4,2,2c0,0.1,0.1,0.2,0.2,0.2s0.2-0.1,0.2-0.2c0-1.4,0.4-2,2-2
                      c0.1,0,0.2-0.1,0.2-0.2C-186,128.7-186.1,128.6-186.2,128.6z M-188.4,129.6c-0.3-0.5-0.4-0.6-0.9-0.8c0.5-0.2,0.6-0.4,0.9-0.9
                      c0.2,0.5,0.5,0.7,0.8,0.9C-188.1,129-188.3,129.3-188.4,129.6z" style="opacity: 0.252;"></path>
                  </g>
                </g>
                <desc>Created with Snap</desc><defs></defs></svg>
              </div>


            </div>
            <div class="info">
              <h3 class="text-center title-box">Consulta Online</h3>
              <p>Realiza una consulta online con un médico especialista para que te de un diagnostico y una receta ó análisis.</p>
              <!-- <div class="text-right">
                <a href="#" class="enlace-color" style="">Ver más</a>
              </div> -->
            </div>
        </div>
      </div>
      <!--<div class="col-md-3">
          <div class="box">
            <div class="box-icon">


              <div class="seoicon articleMarketingIcon" style="visibility: visible; width:80px">
                Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  
                <svg version="1.1" id="articleMarketingIcon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-212 88 75 75" style="enable-background:new -212 88 75 75;" xml:space="preserve">
                <style type="text/css">
                  .st0{fill:none;stroke:#000000;stroke-width:1.17;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                </style>
                <g>
                  <g>
                    <path id="path0" class="st0" d="M-179.6,145.7l-4.3,4.6c-1.3,1.3-3.7-0.4-2-2l0,0l4.3-4.5l0,0" style="stroke-dasharray: 17.2669, 17.2669; stroke-dashoffset: 0;"></path>
                    <path id="path7" class="st0" d="M-188.9,145.7v-33.4c0,0-0.2-2.1,2.6-2.1c10.1,0,5.1,0,15.2,0v8.9h10.8c0,0,0,11.3,0,30.1
                      c-4.9,0-12.7,0-17.6,0" style="stroke-dasharray: 119.795, 119.795; stroke-dashoffset: 0;"></path>
                    <path id="path5" class="st0" d="M-168.6,115.2v-4.9c2.8,2.1,5.5,4.3,8.3,6.4c-2.3,0-4.7,0-7,0
                      C-168.3,116.6-168.6,116.1-168.6,115.2z" style="stroke-dasharray: 24.6377, 24.6377; stroke-dashoffset: 0;"></path>
                    <path id="path4" class="st0" d="M-180.8,135.4L-180.8,135.4c1.5-3.6,5.6-5,9-3.5l0,0c3.5,1.5,4.9,5.7,3.4,9l0,0
                      c-1.5,3.6-5.6,5-9,3.5l0,0C-180.8,143-182.6,139-180.8,135.4z" style="stroke-dasharray: 43.0463, 43.0463; stroke-dashoffset: 0;"></path>
                    <path id="path6" class="st0" d="M-178.7,140.1l2.1-2c0.4-0.4,1-0.3,1.2,0.1l0.5,0.7c0.3,0.5,0.9,0.5,1.2,0.1l2.9-3.1" style="stroke-dasharray: 10.8452, 10.8452; stroke-dashoffset: 0;"></path>
                    <path id="path1" class="st0" d="M-166.6,127.7c-9.4,0-7.5,0-15.7,0" style="stroke-dasharray: 15.7001, 15.7001; stroke-dashoffset: 0;"></path>
                    <path id="path2" class="st0" d="M-166.6,125c-9.4,0-7.5,0-15.7,0" style="stroke-dasharray: 15.7001, 15.7001; stroke-dashoffset: 0;"></path>
                    <path id="path3" class="st0" d="M-166.6,122.2c-9.4,0-7.5,0-15.7,0" style="stroke-dasharray: 15.7001, 15.7001; stroke-dashoffset: 0;"></path>
                  </g>
                  <g id="stars_1_">
                    <path id="star5" d="M-196.9,121.9c-1.3,0-2.2,1-2.2,2.2c0,1.3,1,2.2,2.2,2.2c1.3,0,2.2-1,2.2-2.2S-195.6,121.9-196.9,121.9z
                       M-196.9,125.7c-0.9,0-1.6-0.7-1.6-1.6s0.7-1.6,1.6-1.6s1.6,0.7,1.6,1.6S-195.9,125.7-196.9,125.7z" style="opacity: 0.385333;"></path>
                    <path id="star4" d="M-193.5,135.8c-0.9,0-1.7,0.7-1.7,1.7s0.7,1.7,1.7,1.7s1.7-0.7,1.7-1.7S-192.6,135.8-193.5,135.8z
                       M-193.5,138.8c-0.7,0-1.3-0.5-1.3-1.3s0.5-1.3,1.3-1.3c0.7,0,1.3,0.5,1.3,1.3S-192.9,138.8-193.5,138.8z" style="opacity: 0.318667;"></path>
                    <path id="star3" d="M-149.8,133.8c-2.4,0-3.2-0.7-3.2-3.2c0-0.2-0.1-0.3-0.3-0.3s-0.3,0.1-0.3,0.3c0,2.4-0.8,3.2-3.2,3.2
                      c-0.2,0-0.3,0.1-0.3,0.3s0.1,0.3,0.3,0.3c2.4,0,3.2,0.7,3.2,3.2c0,0.2,0.1,0.3,0.3,0.3s0.3-0.1,0.3-0.3c0-2.4,0.7-3.2,3.2-3.2
                      c0.2,0,0.3-0.1,0.3-0.3C-149.4,133.9-149.6,133.8-149.8,133.8z M-153.3,135.5c-0.3-0.7-0.7-1.2-1.4-1.4c0.7-0.3,1.2-0.7,1.4-1.4
                      c0.3,0.7,0.7,1.2,1.4,1.4C-152.6,134.4-153.1,134.8-153.3,135.5z" style="opacity: 0.252;"></path>
                    <path id="star2" d="M-144.8,125.9c-2,0-2.6-0.6-2.6-2.6c0-0.2-0.1-0.2-0.2-0.2c-0.2,0-0.2,0.1-0.2,0.2c0,2-0.6,2.6-2.6,2.6
                      c-0.2,0-0.2,0.1-0.2,0.2s0.1,0.2,0.2,0.2c2,0,2.6,0.6,2.6,2.6c0,0.2,0.1,0.2,0.2,0.2c0.2,0,0.2-0.1,0.2-0.2c0-2,0.6-2.6,2.6-2.6
                      c0.2,0,0.2-0.1,0.2-0.2S-144.8,125.9-144.8,125.9z M-147.6,127.3c-0.2-0.6-0.6-1-1.2-1.2c0.6-0.2,1-0.6,1.2-1.2
                      c0.2,0.6,0.6,1,1.2,1.2C-147,126.4-147.5,126.7-147.6,127.3z" style="opacity: 0.185333;"></path>
                    <path id="star1" d="M-199.2,133.5c-1.8,0-2.3-0.5-2.3-2.3c0-0.1-0.1-0.2-0.2-0.2s-0.2,0.1-0.2,0.2c0,1.8-0.5,2.3-2.3,2.3
                      c-0.1,0-0.2,0.1-0.2,0.2c0,0.1,0.1,0.2,0.2,0.2c1.8,0,2.3,0.5,2.3,2.3c0,0.1,0.1,0.2,0.2,0.2s0.2-0.1,0.2-0.2
                      c0-1.8,0.5-2.3,2.3-2.3c0.1,0,0.2-0.1,0.2-0.2S-199.1,133.5-199.2,133.5z M-201.7,134.8c-0.2-0.5-0.5-0.8-1.1-1
                      c0.5-0.2,0.8-0.5,1.1-1.1c0.2,0.5,0.5,0.9,1,1.1C-201.3,133.9-201.5,134.3-201.7,134.8z" style="opacity: 0.118667;"></path>
                  </g>
                </g>
                <desc>Created with Snap</desc><defs></defs></svg>
              </div>


            </div>
            <div class="info">
              <h3 class="text-center title-box">Obten tu Receta</h3>
              <p>Después de verificar tu diagnostico, el médico especialista recetará medicina adecuada para mejorar tus malestares.</p>
            </div>
          </div>
      </div>
      <div class="col-md-3">
          <div class="box">
            <div class="box-icon">


              <div class="seoicon rankingIcon" style="visibility: visible; width:80px">
                Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0) 
                <svg version="1.1" id="rankingIcon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-212 88 75 75" style="enable-background:new -212 88 75 75;" xml:space="preserve">
                <style type="text/css">
                  .st0{fill:none;stroke:#000000;stroke-width:1.17;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                </style>
                <g>
                  <g>
                    <path id="path7" class="st0" d="M-164.3,140.9c5.6,1.1,10.2,2.8,13.4,4.3c1.3,0.4-2.8-6.7-2.8-6.7c0.1-0.3,6.6-2.5,6.6-2.5
                      c-2.8-1.7-7.4-3.4-13.3-4.5" style="stroke-dasharray: 42.8991, 42.8991; stroke-dashoffset: 0;"></path>
                    <path id="path4" class="st0" d="M-189.1,131.3c-5.8,1-10.2,2.6-12.8,4.2l6.5,2.8l-3.2,6.6c3.2-1.4,7.9-3.2,13.7-4.2" style="stroke-dasharray: 42.3204, 42.3204; stroke-dashoffset: 0;"></path>
                    <path id="path3" class="st0" d="M-184.9,140.8l0.6-4.3c0-0.2,0-0.4-0.2-0.5l-4.6-4.7" style="stroke-dasharray: 11.4917, 11.4917; stroke-dashoffset: 0;"></path>
                    <path id="path2" class="st0" d="M-160.5,131.5l-4.4,4.3c-0.2,0.2-0.3,0.4-0.2,0.6l0.7,4.4" style="stroke-dasharray: 11.2874, 11.2874; stroke-dashoffset: 0;"></path>
                    <path id="path1" class="st0" d="M-184.9,140.8l-1.1,6.8c-0.1,0.5,0.5,1,1,0.7l9.9-5.1c0.2-0.1,0.5-0.1,0.6,0l10.2,5.1
                      c0.5,0.3,1.1-0.2,1-0.7l-1.1-6.7" style="stroke-dasharray: 39.8798, 39.8798; stroke-dashoffset: 0;"></path>
                    <path id="path0" class="st0" d="M-189.1,131.3l-3.5-3.5c-0.4-0.4-0.2-1.1,0.4-1.2l11.2-1.7c0.2,0,0.4-0.2,0.5-0.4l5.1-10.2
                      c0.4-0.6,1.1-0.6,1.3-0.1l5.1,10.2c0.1,0.2,0.3,0.4,0.5,0.4l11.2,1.7c0.5,0.1,0.7,0.7,0.4,1.2l-3.6,3.8" style="stroke-dasharray: 61.6606, 61.6606; stroke-dashoffset: 0;"></path>
                    <path id="path5" class="st0" d="M-181.2,132.7c0.2-3.3,3-5.9,6.3-5.9c3.7-0.1,6.5,3,6.7,6.2c0.2,3.5-2.6,6.9-6.4,6.9
                      C-178.3,139.9-181.4,136.4-181.2,132.7z" style="stroke-dasharray: 40.9299, 40.9299; stroke-dashoffset: 0;"></path>
                    <path id="path6" class="st0" d="M-176.7,130.9l2.1-1.6c0.4-0.1,0.5,0.2,0.5,0.5v7.5" style="stroke-dasharray: 10.9987, 10.9987; stroke-dashoffset: 0;"></path>
                  </g>
                  <g id="stars_1_">
                    <path id="star5" d="M-157,117.4c-1.4,0-2.3,1.1-2.3,2.3c0,1.3,1.1,2.3,2.3,2.3c1.4,0,2.3-1.1,2.3-2.3
                      C-154.7,118.4-155.8,117.4-157,117.4z M-157,121.4c-1,0-1.7-0.7-1.7-1.7s0.7-1.7,1.7-1.7s1.7,0.7,1.7,1.7S-156.1,121.4-157,121.4z
                      " style="opacity: 0.203333;"></path>
                    <path id="star4" d="M-184.1,115.1c-0.8,0-1.5,0.6-1.5,1.5s0.6,1.5,1.5,1.5s1.5-0.6,1.5-1.5C-182.6,115.7-183.3,115.1-184.1,115.1z
                       M-184.1,117.8c-0.6,0-1.2-0.4-1.2-1.2c0-0.6,0.5-1.2,1.2-1.2c0.6,0,1.2,0.4,1.2,1.2S-183.5,117.8-184.1,117.8z" style="opacity: 0.27;"></path>
                    <path id="star3" d="M-159.7,110.8c-2.5,0-3.4-0.7-3.4-3.4c0-0.2-0.1-0.4-0.4-0.4c-0.2,0-0.3,0.1-0.3,0.4c0,2.5-0.9,3.4-3.4,3.4
                      c-0.2,0-0.3,0.1-0.3,0.3s0.1,0.4,0.3,0.4c2.5,0,3.4,0.7,3.4,3.4c0,0.2,0.1,0.3,0.3,0.3c0.2,0,0.4-0.1,0.4-0.3
                      c0-2.5,0.7-3.4,3.4-3.4c0.2,0,0.4-0.1,0.4-0.4S-159.6,110.8-159.7,110.8z M-163.5,112.6c-0.4-0.7-0.7-1.2-1.5-1.5
                      c0.7-0.3,1.3-0.7,1.5-1.5c0.3,0.7,0.7,1.2,1.5,1.5C-162.7,111.4-163.2,111.9-163.5,112.6z" style="opacity: 0.336667;"></path>
                    <path id="star2" d="M-176.1,105.4c-2.3,0-3.1-0.7-3.1-3.1c0-0.3-0.1-0.3-0.3-0.3c-0.3,0-0.3,0.1-0.3,0.3c0,2.3-0.7,3.1-3.1,3.1
                      c-0.3,0-0.3,0.1-0.3,0.3c0,0.1,0.1,0.3,0.3,0.3c2.3,0,3.1,0.7,3.1,3.1c0,0.3,0.1,0.3,0.3,0.3c0.3,0,0.3-0.1,0.3-0.3
                      c0-2.3,0.7-3.1,3.1-3.1c0.3,0,0.3-0.1,0.3-0.3C-175.8,105.5-175.9,105.4-176.1,105.4z M-179.5,107c-0.3-0.7-0.7-1.2-1.4-1.3
                      c0.7-0.3,1.2-0.7,1.4-1.4c0.3,0.7,0.7,1.2,1.4,1.4C-178.9,105.9-179.2,106.3-179.5,107z" style="opacity: 0.403333;"></path>
                    <path id="star1" d="M-192.4,122c-1.6,0-2.1-0.4-2.1-2.1c0-0.1-0.1-0.2-0.2-0.2s-0.2,0.1-0.2,0.2c0,1.6-0.5,2.1-2.1,2.1
                      c-0.1,0-0.2,0.1-0.2,0.2s0.1,0.2,0.2,0.2c1.6,0,2.1,0.4,2.1,2.1c0,0.1,0.1,0.2,0.2,0.2s0.2-0.1,0.2-0.2c0-1.6,0.5-2.1,2.1-2.1
                      c0.1,0,0.2-0.1,0.2-0.2S-192.3,122-192.4,122z M-194.7,123.1c-0.2-0.4-0.5-0.7-1-0.9c0.5-0.2,0.7-0.4,1-1c0.2,0.5,0.4,0.8,0.9,1
                      C-194.3,122.4-194.6,122.7-194.7,123.1z" style="opacity: 0.47;"></path>
                  </g>
                </g>
                <desc>Created with Snap</desc><defs></defs></svg>
              </div>


            </div>
            <div class="info">
              <h3 class="text-center title-box">Medicina a Domicilio</h3>
              <p>Recibe la medicina de tu receta en la puerta de tu casa por nuestro reconocido servicio de delivery.</p>
            </div>
          </div>
      </div>-->
    </div>
  </div>
</div>


<div class="" style="padding-top: 50px;padding-bottom: 50px;width: 100%; background-color: #fafafa">
  <div class="boton max-ancho">

    <div class="row">
      <div class="col l8 m12 s12" style="border: 3px solid #fff;height:300px; padding-left:0px; padding-right:0px; background-image:url('assets/images/banner04.jpg');background-size: 950px 300px;-webkit-background-size: cover;" >
        <div class="center" style="position: abolute; padding-top:150px">
          <h2 style="text-shadow: 2px 2px 8px #989898; color: #fff">Telemedicina</h2>
          <a href="{{ URL::to('como-funciona') }}" class="btn" style="background-color: #868686">Como Funciona</a>
        </div>
      </div>
      <div class="col l4 m12 s12"style="border: 3px solid #fff;height:300px;padding-left:0px; padding-right:0px; background-image:url('assets/images/banner05.png');background-size: 470px 300px;-webkit-background-size: cover;">
        <div class="center" style="position: abolute; padding-top:150px">
          <h2 style="text-shadow: 2px 2px 8px #989898; color: #fff">Consulta precios</h2>
          <a href="{{ URL::to('precios') }}" class="btn" style="background-color: #868686">Precios</a>
        </div>
      </div>
      <div class="col l3 m12 s12" style="border: 3px solid #fff;height:300px;padding-left:0px; padding-right:0px; background-image:url('assets/images/banner06.jpg');background-size: 420px 300px;-webkit-background-size: cover;">
        <div class="center" style="position: abolute; padding-top:150px">
          <h2 style="text-shadow: 2px 2px 8px #989898; color: #fff">Atención al cliente</h2>
          <a href="{{ URL::to('contacto') }}" class="btn" style="background-color: #868686">Ayuda</a>
        </div>
      </div>
  
      <div *ngIf = "!user.name" class="col l6 m12 s12" style="border: 3px solid #fff;height:300px;padding-left:0px; padding-right:0px; background-image:url('assets/images/banner03.jpg');background-size: 700px 300px;-webkit-background-size: cover;">
        <div class="center" style="position: abolute; padding-top:150px">
          <h2 style="text-shadow: 2px 2px 8px #989898; color: #fff">Realiza tu consulta</h2>
          <a href="{{ URL::to('login') }}" class="btn" style="background-color: #868686">Consulta Medica</a>
        </div>
      </div>
      <div class="col l3 m12 s12" style="border: 3px solid #fff;height:300px;padding-left:0px; padding-right:0px; background-image:url('assets/images/banner07.jpg');background-size: 420px 300px;-webkit-background-size: cover;">
        <div class="center" style="position: abolute; padding-top:150px">
          <h2 style="text-shadow: 2px 2px 8px #989898; color: #fff">Contáctenos</h2>
          <a href="{{ URL::to('contacto') }}" class="btn" style="background-color: #868686">Contactos</a>
        </div>
      </div>
    </div>
    

  </div>
</div>

<div class="" style="padding-top: 50px;padding-bottom: 80px;width: 100%; background-color: #fff">
  <div class="boton max-ancho">
    <div class="row text-center">
      <h2 style="margin-top:0px;color: #000">Testimonios</h2>
      <div class="col-md-3">
      </div>
      <div class="col-md-6 text-center">
        <h5 style="color: #7b7b7b">
          Todas nuestras consultas son altamente experimentados en sus campos y producen excelentes resultados para los pacientes.
        </h5>
      </div>
      <div class="col-md-3">
      </div>
    </div>

    <div>
      <ul style="background-color: #fff">
        <!-- <li>
          <div class="caption center-align">
            <div class="row">
              <div class="col s6">
                <div style="background-color: #fafafa;padding: 30px">
                  <p style="color: #000">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec,
                  </p>
                </div>
              </div>
              <div class="col s6">
                <div style="background-color: #fafafa;padding: 30px">
                  <p style="color: #7b7b7b">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec,
                  </p>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col s6">
                <div class="center" style="padding-top: 10px">
                  <img src="assets/images/usuario_chat.jpg" alt=""style="border-radius: 50%; width: 80px">
                  <p style="padding-top: 10px; color: #7b7b7b">Felipe Santiago</p>
                  <p for="" style="color: #868686 !important">Paciente</p>
                </div>
              </div>
              <div class="col s6">
                <div class="center" style="padding-top: 10px">
                  <img src="assets/images/usuario_chat.jpg" alt="" width="80px" style="border-radius: 50%; width: 80px">
                  <p for="" style="padding-top: 10px;color: #7b7b7b">Felipe Santiago</p>
                  <p for="" style="color: #868686 !important">Paciente</p>
                </div>
              </div>
            </div>
          </div>
        </li> -->
        <!-- <li>
          <div class="caption center-align">
            <div class="row">
              <div class="col s6">
                <div style="background-color: #fafafa;padding: 30px">
                  <p style="color: #7b7b7b">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec,
                  </p>
                </div>
              </div>
              <div class="col s6">
                <div style="background-color: #fafafa;padding: 30px">
                  <p style="color: #7b7b7b">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec,
                  </p>
                </div>
              </div>

            </div>

            <div class="row">
              <div class="col s6">
                <div class="center" style="padding-top: 10px">
                  <img src="assets/images/usuario_chat.jpg" alt="" style="border-radius: 50%; width: 80px">
                  <p for="" style="padding-top: 10px;color: #7b7b7b">Felipe Santiago</p>
                  <p for="" style="color: #868686 !important">Paciente</p>
                </div>
              </div>
              <div class="col s6">
                <div class="center" style="padding-top: 10px">
                  <img src="assets/images/usuario_chat.jpg" alt="" width="80px" style="border-radius: 50%; width: 80px">
                  <p for="" style="padding-top: 10px;color: #7b7b7b">Felipe Santiago</p>
                  <p for="" style="color: #868686 !important">Paciente</p>
                </div>
              </div>
            </div>
          </div>
        </li> -->
        <li>
          <div class="caption center-align">
            <div class="row">
              <div class="col s6">
                <div style="background-color: #fafafa;padding: 30px">
                  <p style="color: #7b7b7b">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec,
                  </p>
                </div>
              </div>
              <div class="col s6">
                <div style="background-color: #fafafa;padding: 30px">
                  <p style="color: #7b7b7b">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec,
                  </p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col s6">
                <div class="center" style="padding-top: 10px">
                  <img src="assets/images/usuario_chat.jpg" alt="" width="80px" style="border-radius: 50%; width: 80px">
                  <p for="" style="padding-top: 10px;color: #7b7b7b">Felipe Santiago</p>
                  <p for="" style="color: #868686 !important">Paciente</p>
                </div>
              </div>
              <div class="col s6">
                <div class="center" style="padding-top: 10px">
                  <img src="assets/images/usuario_chat.jpg" alt="" width="80px" style="border-radius: 50%; width: 80px">
                  <p for="" style="padding-top: 10px;color: #7b7b7b">Felipe Santiago</p>
                  <p for="" style="color: #868686 !important">Paciente</p>
                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>


<!-- //Container End -->
<br>
<script type="text/javascript">
  localStorage.setItem('attemps', 0);
  localStorage.setItem('attempsF', 0);
  localStorage.setItem('attempsR', 0);

  if (localStorage.attemps != null) {
    localStorage.setItem('attemps', 0);
  }
</script>

@stop
{{-- footer scripts --}}
@section('footer_scripts')
    <!-- page level js starts-->
    <script type="text/javascript" src="{{ asset('assets/js/frontend/jquery.circliful.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/wow/js/wow.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/owl_carousel/js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/frontend/carousel.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/frontend/index.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/wizard.js') }}"></script>
    <!--page level js ends-->
@stop
