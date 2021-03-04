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
    <!--end of page level css-->
@stop

{{-- breadcrumb --}}
@section('top')

@stop


{{-- Page content --}}
@section('content')
<div style="margin-top: 55px;">
    <div style="background-color: #f2f2f2;">
        <br><br>
    </div>
    <div class="collection" style="margin-top: 0px; margin-bottom: 0px;">
        <a href="#!" class="collection-item" style="padding: 20px">Valoraciones</a>
        <a href="/politicas" class="collection-item" style="padding: 20px">Términos y condiciones</a>
        <a href="/politicas" class="collection-item" style="padding: 20px">Política de privacidad</a>
        <a href="/quienes-somos" class="collection-item" style="padding: 20px">Quiénes Somos</a>
    </div>

    <div style="background-color: #f2f2f2; height: 2px;">
        
    </div>

    <div style="padding: 15px;">

        <a href="https://www.alo.doctor/logout" class="btn btn-block" style="background-color: #e22715">Cerrar Sesión</a>

    </div>

    <div style="background-color: #f2f2f2; padding-top: 25px;" >

        <div style="text-align: center">
    
            <img src="assets/images/medicentros-peruanos.png" alt="" width="200px">
        
        </div>
    
        <div style="padding-top: 15px;padding-bottom: 45px;">
            <p style="color: black; font-size: 12px;">© Humanidad Sur</p>
            <p style="color: black; font-size: 12px;">Todos los derechos reservados.</p>
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
