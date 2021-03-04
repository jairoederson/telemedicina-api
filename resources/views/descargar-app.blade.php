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

<div class="row" style="padding: 80px 90px 50px 50px;">
  <div class="container" style="padding-top: 100px;padding-bottom: 100px;background-color: white; min-height: 80vh; max-width: 100%">
    <div class="container max-ancho">
      <div class="row">
        <div class="col m12 l6 div-app-img">
          <div class="row">
            <div class="col s12 center">
              <img width="500px" src="https://assets.babylonhealth.com/redesign/Babylon-Download-App.png" alt="">
            </div>
            
          </div>
        </div>
        <div class="col m12 l6 div-app-detail">
          <div class="row center" style="padding-top: 150px">
            <h2>Descarga la Aplicación Ahora</h2>
            <div class="row">
              <div class="col s2"></div>
              <div class="col s8 center" style="padding-left: 0px">
                <p style="text-align: center">
                  Descargue la aplicación ahora desde Google Play o App Store para acceder desde su dispositivo móvil.
                </p>
              </div>
              <div class="col s2"></div>

            </div>
            <div class="row">
              <div class="col m3 l2"></div>
              <div class="col m3 l4" style="padding-left:0px">
                <div class="center">
                  <a href="https://play.google.com/store/apps/details?id=com.vexsoluciones.alodoctorpaciente">
                    <img src="assets/images/google_play.png" width="150px" alt="">
                  </a>
                </div>
              </div>
              <div class="col m3 l4" style="padding-left: 0px; padding-top: 10px">
                <div class="center">
                  <a href="https://play.google.com/store/apps/details?id=com.vexsoluciones.alodoctorpaciente">
                    <img src="assets/images/appstore.png" width="120px" height="40px" alt="">
                  </a>
                </div>
              </div>
              <div class="col m3 l2"></div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>


</div>

@stop

{{-- page level scripts --}}
@section('footer_scripts')

@stop
