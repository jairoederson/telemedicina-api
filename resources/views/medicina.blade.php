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
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/medicina.css') }}">
    <!--end of page level css-->
@stop

{{-- breadcrumb --}}
@section('top')

@stop


{{-- Page content --}}
@section('content')

  <div class="section-mobile" style="margin-top: -10px;">
    <div class="medicina-banner content-banner">
      <div class="center" style>
          <h1 class="title-banner"> <b>Cuida de la salud que has estado soñando</b> </h1>
          <a class="button-banner btn" style="color: #e22715 !important;">RESERVAR UNA CITA</a>
        </div>
      </div>

      <div class="section-especialists">
        <div class="row">
          <h2 class="center section-doctors-title"><b>Acceso rápido a médicos y terapeutas calificados</b></h2>
          <div class="row">
            <div class="col s2"></div>
            <div class="col s8">
              <p>Nuestro equipo es un grupo amistoso de médicos que quieren ayudarlo a sentirse mejor. (También tienen algunos requisitos muy serios detrás de ellos: nuestros médicos tienen un promedio de 10 años de experiencia clínica).</p>  

            </div>
            <div class="col s2"></div>
          </div>
        </div>

        <div class="row">
          <div class="col s2"></div>
          <div class="col s8">
            <div class="row">
              <div class="col m12 l4" style="padding: 15px">
                <div class="center">
                  <img src="https://assets.babylonhealth.com/what-we-treat/Dr-Jayne-Bowser.png" alt="" width="150px">
                </div>
                <h4 class="center"><b>GPS</b></h4>
                <p class="p-content">Nos encargamos de seleccionar a nuestros médicos de cabecera. Tienen experiencia, están registrados en GMC y siempre están aquí cuando los necesita.</p>
              </div>
              <div class="col m12 l4" style="padding: 15px">
                <div class="center">
                  <img src="https://assets.babylonhealth.com/what-we-treat/Dr2.png" alt="" width="150px">
                </div>
                <h4 class="center"><b>Medicos especialistas</b></h4>
                <p class="p-content">Nuestros especialistas saben lo que hacen. Dan atención médica experta para condiciones complejas o continuas.</p>
              
              </div>
              <div class="col m12 l4" style="padding: 15px">
                <div class="center">
                  <img src="https://assets.babylonhealth.com/what-we-treat/Akbar-Jamil.png" alt="" width="150px">
                </div>
                <h4 class="center"><b>Terapeutas</b></h4>
                <p class="p-content">Nuestros amables terapeutas son muy amables. Están completamente calificados y tienen un montón de experiencia trabajando con personas.</p>
              
              </div>
            </div>
          </div>
          <div class="col s2"></div>
        </div>

        <div class="row btn-book-appointment">
          <div class="center">
            <a class="button-banner btn btn-green" style="color: #e22715 !important;">RESERVAR UNA CITA</a>
          </div>
        </div>
      </div>

      <div class="testimony">
        <div class="max-ancho">
          <div class="center">
            <img src="https://assets.babylonhealth.com/what-we-treat/5-stars-babylon-white.svg" alt="">
          </div>
          <div class="row">
            <div class="col m3"></div>
            <div class="col m6 s12">
              <div class="center">
                <h3>"En 10 minutos, mi hija estaba en un video frente a un médico amigable, en 30 minutos recogí los medicamentos en una farmacia".</h3>
              </div>
            </div>
            <div class="col m3"></div>
          </div>

        </div>
      </div>

      <div class="section-when-to-use">
        <div class="max-ancho">
          <div class="row">
            <div class="col m2"></div>
            <div class="col m8 s12">
              <h2 class="title-when-to-use center"><b>Cuando usar Alo Doctor</b></h2>
              <div class="row">
                <div class="col m4 s12">
                  <div class="center">
                    <img src="https://assets.babylonhealth.com/icons/pills-icon.svg" alt="">
                  </div>
                  <h4 class="center"><b>Salud en general</b></h4>
                  <p>¡Dispara! Pregunte a la aplicación de Babylon lo que normalmente le preguntaría a su médico de familia. Luego puede chatear con uno de nuestros médicos de cabecera desde cualquier lugar, en cualquier momento del día.</p>
                </div>
                <div class="col m4 s12">
                  <div class="center">
                    <img src="https://assets.babylonhealth.com/icons/suitcase-icon.svg" alt="">
                  </div>
                  <h4 class="center"><b>Salud en general</b></h4>
                  <p>¡Dispara! Pregunte a la aplicación de Babylon lo que normalmente le preguntaría a su médico de familia. Luego puede chatear con uno de nuestros médicos de cabecera desde cualquier lugar, en cualquier momento del día.</p>
                
                </div>
                <div class="col m4 s12">
                  <div class="center">
                    <img src="https://assets.babylonhealth.com/icons/mental-health-icon.svg" alt="">
                  </div>
                  <h4 class="center"><b>Salud en general</b></h4>
                  <p>¡Dispara! Pregunte a la aplicación de Babylon lo que normalmente le preguntaría a su médico de familia. Luego puede chatear con uno de nuestros médicos de cabecera desde cualquier lugar, en cualquier momento del día.</p>
                
                </div>
              </div>
            </div>
            <div class="col m2"></div>
          </div>
        </div>
      </div>

      <div class="section-privacity">
        <div class="max-ancho">
          <div class="row">
            <div class="col m2"></div>
            <div class="col m4 s12">
              <h3 class="title-section-privacity"><b>Discreto, privado y seguro.</b></h3>
              <ul>
                <li><p class="text-section-privacity">Totalmente registrado en CQC y cumple con todas las regulaciones de atención médica.</p></li>
                <li><p class="text-section-privacity">Las consultas son siempre totalmente privadas y confidenciales.</p></li>
                <li><p class="text-section-privacity">Todos los datos médicos están encriptados, almacenados de forma segura y accesibles solo por usted.</p></li>
              </ul>
              <div>
                <a href="https://www.cqc.org.uk/location/1-2827110122?referer=widget3#accordion-1" class="btn btn-section-privacy" style="color: #e22715 !important;">VER INFORME CQC</a>
              </div>
            </div>
            <div class="col m4 s12">
              <div class="left img-section-privacity">
                <img src="https://assets.babylonhealth.com/home/CQC-babylonhealth.svg" alt="">
              </div>
            </div>
            <div class="col m2"></div>
          </div>
        </div>
      </div> 

      <div class="section-condition">
        <div class="max-ancho">
          <h2 class="title-section-condition center"><b>Condiciones médicas comunes</b></h2>
          <p>Para obtener más información sobre las condiciones que tratamos, consulte nuestras  <a href="">Preguntas frecuentes.</a></p>

          <div class="row">
            <div class="col m2"></div>
            <div class="col m8 s12">
              <div class="row item-section-condition">
                <div class="col m3 s6">
                  <a href="">Acne</a>
                </div>
                <div class="col m3 s6">
                  <a href="">Pérdida del cabello</a>
                </div>
                <div class="col m3 s6">
                  <a href="">Tiña</a>
                </div>
                <div class="col m3 s6">
                  <a href="">Conjuntivitis</a>
                </div>
              </div>
              <div class="row item-section-condition">
                <div class="col m3 s6">
                  <a href="">Alergias</a>
                </div>
                <div class="col m3 s6">
                  <a href="">Estreñimiento</a>
                </div>
                <div class="col m3 s6">
                  <a href="">Fiebre de heno</a>
                </div>
                <div class="col m3 s6">
                  <a href="">Rosacea</a>
                </div>
              </div>
              <div class="row item-section-condition">
                <div class="col m3 s6">
                  <a href="">Comezon anal</a>
                </div>
                <div class="col m3 s6">
                  <a href="">Diarrea</a>
                </div>
                <div class="col m3 s6">
                  <a href="">Dolores de cabeza y migraña</a>
                </div>
                <div class="col m3 s6">
                  <a href="">Sarna</a>
                </div>
              </div>
            </div>
            <div class="col m2"></div>
          </div>
        </div>

      </div> 
      
      <div class="section-app">
      
      <div class="max-ancho">
        <div class="row title-section-app">
          <h2 class="text-center"> <b>EMPEZAR</b> </h2>
          <p>Descarga Alo Doctor a tu teléfono o comienza en línea</p>
        </div>

        <div class="row img-section-app">
          <div class="col m2">

          </div>
          <div class="col m8 s12">
            <div class="col s6" style="padding-left:0px">
              <div class="text-right">
                <a target="_blank" href="https://play.google.com/store/apps/details?id=com.vexsoluciones.alodoctorpaciente">
                  <img src="assets/images/google_play.png" width="150px" alt="">
                </a>
              </div>
            </div>
            <div class="col s6" style="padding-left: 0px; padding-top: 10px">
              <div class="">
                <a target="_blank" href="https://play.google.com/store/apps/details?id=com.vexsoluciones.alodoctorpaciente">
                  <img src="assets/images/appstore.png" width="120px" height="40px" alt="">
                </a>
              </div>
            </div>

          </div>
          <div class="col m2">

          </div>
        </div>
      </div>
    </div>


    </div>



@stop

{{-- page level scripts --}}
@section('footer_scripts')

@stop
