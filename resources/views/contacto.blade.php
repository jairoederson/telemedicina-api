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
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/mdb.css') }}"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/login.css') }}">
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <!--end of page level css-->
@stop

{{-- breadcrumb --}}
@section('top')

@stop


{{-- Page content --}}
@section('content')
<!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/mdb.css') }}"> -->

    <div style="padding-top: 73px">
      <div class="img-thumbnail" style="background-size:100% auto;position:relative; height:190px; width:100%; background-image: url('/assets/images/banner.jpeg');">

      </div>
    </div>
    <div class="espacio-top" style="width: 100%">
      <div class="container max-ancho">
        <div class="row espacio-bottom" style="padding-left: 0px; padding-right: 0px;">
          <div class="col-md-12 col-sm-12 text-center" style="padding-left: 0px; padding-right: 0px;">
            <div class="row" style="padding-left: 0px; padding-right: 0px;">
              <div class="col m3">
              </div>
              <div class="col m6 s12">
                <h2 style="margin-top: -160px">Contáctenos</h2>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="box">
                  <div class="info text-center">
                    <div class="formulario">
                      <!-- Notifications -->
                        <div class="row" style="padding-left: 0px; padding-right: 0px;">

                         <form class="col s12" name="form_contact_public" ng-app="app_contact_public" ng-controller="validateCtrl">
                           <div class="row">
                             <div class="input-field col s12">

                                <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="email" name="email" ng-model="email" type="email" style="height:4rem" required>
                                <label for="email">Correo </label>

                                <!-- <span style="color:red" ng-show="form_contact_public.email.$dirty && form_contact_public.email.$invalid">
                                  <span ng-show="form_contact_public.email.$error.required">Correo requerido.</span>
                                  <span ng-show="form_contact_public.email.$error.email">Correo Inválido.</span>
                                </span> -->
                              </div>
                           </div>
                           <div class="row">
                             <div class="input-field col s12">
                               <select required>
                                 <option value="a">Seleccione un tema</option>
                                 <option value="1">Soporte</option>
                                 <option value="2">Pagos</option>
                                 <option value="3">Marketing</option>
                               </select>
                               <!-- <label>Materialize Select</label> -->
                             </div>
                           </div>
                           <div class="row">
                             <div class="input-field col s12">
                                <textarea onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="textarea1" name="consulta" maxlength="500" ng-model="consulta" ng-pattern="/^[^[\]|=*$<>\\,]+$/" class="materialize-textarea" required></textarea>
                                <label for="textarea1">Consulta o sugerencia</label>
                                <!-- <span style="color:red" ng-show="form_contact_public.consulta.$dirty && form_contact_public.consulta.$invalid">
                                  <span ng-show="form_contact_public.consulta.$error.required">Consulta requerida.</span>
                                  <span ng-show="form_contact_public.consulta.$error.pattern">Caracter en la consulta no permitido.</span>
                                </span> -->
                              </div>
                           </div>

                           <div class="row">
                            
                              <div class="form-group" style="text-align: -webkit-center;">
                                <div class="g-recaptcha" data-sitekey="6Lf5-tcZAAAAAAXUQuvG3a8dL93N3IUP87ZlMe31"></div>
                              </div>
                            
                           </div>
                           <div class="row">
                             <div class="col-md-2">
                             </div>
                             <div class="col-md-8">
                               <input type="submit" class="btn format" style="color: #e22715 !important; border: 1px solid; width: auto;background-color: #fff" value="Enviar Consulta">
                             </div>
                             <div class="col-md-2">
                             </div>
                           </div>
                         </form>
                       </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col m3">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="espacio-bottom  espacio-top" style="width: 100%; background-color: #e9e9e9">
      <div class="boton max-ancho">
        <div class="row text-center">
          <h2 style="margin-top:0px;">¿Necesitas Soporte?</h2>
          <br>
          <div class="col-md-4">
          </div>
          <div class="col-md-4 text-center">
            <div class="">
              <input type="submit" class="btn format" style="color: #e22715 !important; border: 1px solid; width: auto;background-color: #fff" value="Ver Centro de Ayuda">
            </div>
          </div>
          <div class="col-md-4">
          </div>
        </div>
      </div>
    </div>
    <div class="" style="width: 100%">
      <div class="max-ancho espacio-top espacio-bottom">
        <div class="text-center">
          <h2>Ubícanos</h2>
        </div>
        <div class="row">
            <div class="col m6 s12" style="margin-bottom: 25px;">
              <div style="padding-top: 40px" class="col s10 m12">
                <div id="map" style="width:250px; height:230px;float:right"></div>
              </div>
              <div class="col s2"></div>
            </div>
            <div class="col m6 s12">
              <div class="col s2"></div>
              <div class="col s10 m12">
                <div class="media media-right">
                    <div class="media-left media-top">
                        <a href="#">
                            <div class="box-icon">
                                <i class="livicon" data-name="home" data-size="22" data-loop="true" data-c="#fff" data-hc="#fff"></i>
                            </div>
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Direccion:</h4>
                        <div class="danger">Humanidad Sur</div>
                        <address>
                            Pediatric Surgeons of Alaska
                            <br> 3340 Providence Drive #565
                            <br> Anchorage, AK(Alaska)
                            <br> North Las Vegas, NV
                        </address>
                    </div>
                </div>
                <div class="media padleft10">
                    <div class="media-left media-top">
                        <a href="#">
                            <div class="box-icon">
                                <i class="livicon" data-name="phone" data-size="22" data-loop="true" data-c="#fff" data-hc="#fff"></i>
                            </div>
                        </a>
                    </div>
                    <div class="media-body padbtm2">
                        <h4 class="media-heading">Telefono:</h4> (703) 717-4200
                        <br /> Fax:400 423 1456
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
    <!-- page level js starts-->
    <!-- <script src="https://maps.google.com/maps/api/js?sensor=true"></script> -->
    <!-- <script type="text/javascript" src="{{ asset('assets/js/mdb.js') }}" ></script> -->
    <script type="text/javascript" src="{{ asset('assets/vendors/gmaps/js/gmaps.min.js') }}" ></script>
    <!--page level js ends-->
    <script>
      // Initialize and add the map
      function initMap() {
        // The location of Uluru
        var uluru = {lat: -12.0861816, lng: -76.897536};
        // The map, centered at Uluru
        var map = new google.maps.Map(
            document.getElementById('map'), {zoom: 4, center: uluru});
        // The marker, positioned at Uluru
        var marker = new google.maps.Marker({position: uluru, map: map});
      }
    </script>
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJk0AZkTmKn00WV2iqI5XFZ4GQdRyOADI&callback=initMap">
    </script>

@stop
