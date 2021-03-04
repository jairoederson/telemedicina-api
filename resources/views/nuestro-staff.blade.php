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
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/nuestro-staff.css') }}">
    <!--end of page level css-->
@stop

{{-- breadcrumb --}}
@section('top')

@stop


{{-- Page content --}}
@section('content')

    <div class="section-nuestro-staff">
      <div class="max-ancho">
        <div class="row">
          <div class="col s2"></div>
          <div class="col s8">
            <h6 class="title-section-nuestro-staff"><b>Nuestro Staff</b></h6>
            <h1><b>Contratamos médicos de clase mundial.</b></h1>
          </div>
          <div class="col s2"></div>
        </div>
      </div>
    </div>

    <div class="section-image">
      <div class="row">
        <div class="col m6 s12 section-image-1"></div>
        <div class="col m6 s12 section-image-2"></div>
      </div>
    </div>

    <div class="section-technology">
      <div class="max-ancho">
        <div class="row">
          <div class="col s2"></div>
          <div class="col s8">
            <h6 class="title-section-nuestro-staff"><b>Nuestra tecnología</b></h6>
            <h2><b>La inteligencia artificial es solo tan inteligente como las personas que la construyen y la enseñan, por lo que solo los mejores médicos y científicos están invitados a trabajar en la tecnología de Babilonia.</b></h2>
            <p class="p-technology">Nuestros médicos de clase mundial, registrados en GMC, tienen una amplia experiencia en la práctica de la medicina. Pero la inteligencia no lo es todo; si no son amables, no son adecuados para Babilonia.</p>
            <a href="" style="color: #e22715 !important;" class="btn btn-technology">APRENDE MÁS</a>
          </div>
          <div class="col s2"></div>
        </div>
      </div>
    </div>

    <div class="section-advice">
      <div class="row">
        <div class="col m6 s12 image-advice-1"></div>
        <div class="col m6 s12">
          <div class="content-advice">
            <h2><b>El poder de prescribir.</b></h2>
            <p class="p-content-advice">Además de diagnosticar y asesorar, nuestros profesionales médicos registrados también pueden escribirle sus recetas. El medicamento se puede recolectar en una farmacia local o se puede enviar a usted el siguiente día hábil.</p>
            <a href="" class="btn btn-advice" style="color: #e22715 !important">COMO FUNCIONAN LAS RECETAS</a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col m6 s12 image-advice-2"></div>
        <div class="col m6 s12">
          <div class="content-advice">
            <h2><b>Su privacidad es nuestra responsabilidad.</b></h2>
            <p class="p-content-advice">Estamos totalmente registrados con CQC y operamos con los más altos estándares clínicos. Sus consultas son siempre completamente privadas y confidenciales y todos los datos médicos están encriptados y almacenados. Solo compartimos sus consultas cuando ha dado su consentimiento explícito para que lo hagamos.</p>
            <a href="" class="btn btn-advice" style="color: #e22715 !important">NUESTRA POLITICA DE PRIVACIDAD</a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col m6 s12 image-advice-3"></div>
        <div class="col m6 s12">
          <div class="content-advice">
            <h2><b>Video examenes</b></h2>
            <p class="p-content-advice">Los exámenes de video de Babylon hacen que sea rápido y fácil para nuestros médicos diagnosticar una condición. Nuestros datos muestran que más del 80% de las citas se pueden gestionar de forma totalmente digital, por lo que estamos seguros de que están funcionando. Uno de nuestros médicos en línea, el Dr. Mobasher Butt, nos dijo: "Es posible examinar una amplia gama de afecciones a través de un video y, a menudo, simplemente poder ver el área del problema me permite diagnosticar con precisión".</p>
            <a href="" class="btn btn-advice" style="color: #e22715 !important">EXPLORA NUESTROS SERVICIOS MÉDICOS</a>
          </div>
        </div>
      </div>
    </div>



@stop

{{-- page level scripts --}}
@section('footer_scripts')

@stop
