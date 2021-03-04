@extends('layouts.material')
@section('content')
<div id="calificacion" class="content-consulta">
      <div class="row content-inside">
        <div class="row">
          <div class="col s12 title-color center">
            <h6 class="title-content content-title">
              <b>CALIFICA AL MÉDICO</b>
            </h6>
          </div>
        </div>
        <br>
        <div class="col s12 m12">
          <form class="col s12" id="doctor1">
              <div class="row">
                <div class="col s4 m4">
                </div>
                <div class="col s4 m4 center margin-top-element">
                  <img class="doctor-image" src="http://www.kauveryhospital.com/doctorimage/Dr.%20Balamurali-Dec-11-2015-02-21-05-Dr_Bala-Murali.jpg" alt="" width="40%">
                </div>
                <div class="col s4 m4">
                </div>
              </div>
              <div class="row text-center">
                <div class="col s12 md12">
                  <h5 class="without-margin-bottom">Richar P.</h5>
                </div>
              </div>
                <div class="row text-center">
                  <div class="col s4 md4">
                  </div>
                  <div class="col s4 m4">
                    <div class="row">
                      <div class="col s2">

                      </div>
                      <div class="col s7 without-padding-right">
                        <i class="material-icons star text-darken-4 icon-star">star</i>
                        <i class="material-icons star text-darken-4 icon-star">star</i>
                        <i class="material-icons star text-darken-4 icon-star">star</i>
                        <i class="material-icons star text-darken-4 icon-star">star</i>
                        <i class="material-icons star-desactivate text-darken-4 icon-star">star</i>
                      </div>
                      <div class="col s3" style="text-align: left;padding-left: 0px">
                        <span class="count-star" style="">(14)</span>
                      </div>
                      <div class="col s1">

                      </div>
                    </div>
                  </div>
                  <div class="col s4"></div>
                </div>
                <div class="row">
                  <div class="col s4">
                  </div>
                  <div class="col s4 text-center">
                    <label>Hombre, 26 años de Lima</label><br>
                    <b>Especialidad: </b><label> Cardiologia</label><br>
                    <!-- <b>Precio: </b> <label> S/. 5.00 por consulta</label><br> -->
                  </div>
                  <div class="col s4">
                  </div>
                </div>
                <div class="row">
                  <div class="col s12">
                    <p class="text-center">
                      <b>
                        ¿Cómo calificaria la atención recibida de parte del doctor?
                      </b>
                    </p>
                  </div>

                  <br>
                  <div class="row center margin-top-element">
                    <a class="tooltipped star" data-position="bottom" data-delay="50" data-tooltip="Pésimo">
                      <i id="star1" onmouseout="starNoFocus()" onmouseover="starFocus('star1')" class="material-icons" style="color: #d6d6cd">star</i>
                    </a>
                    <a class="tooltipped star" data-position="bottom" data-delay="50" data-tooltip="Malo">
                      <i id="star2" onmouseout="starNoFocus()" onmouseover="starFocus('star2')" class="material-icons" style="color: #d6d6cd">star</i>
                    </a>
                    <a class="tooltipped star" data-position="bottom" data-delay="50" data-tooltip="Regular">
                      <i id="star3" onmouseout="starNoFocus()" onmouseover="starFocus('star3')" class="material-icons" style="color: #d6d6cd">star</i>
                    </a>
                    <a class="tooltipped star" data-position="bottom" data-delay="50" data-tooltip="Bueno">
                      <i id="star4" onmouseout="starNoFocus()" onmouseover="starFocus('star4')" class="material-icons" style="color: #d6d6cd">star</i>
                    </a>
                    <a class="tooltipped star" data-position="bottom" data-delay="50" data-tooltip="Muy Bueno">
                      <i id="star5" onmouseout="starNoFocus()" onmouseover="starFocus('star5')" class="material-icons" style="color: #d6d6cd">star</i>
                    </a>

                  </div>


                </div>


                <div class="row">
                  <div class="col s2">

                  </div>
                  <div class="input-field col s8 left">
                    <textarea onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="textarea1" class="materialize-textarea" data-length="500"></textarea>
                    <label for="textarea1">Comentarios:</label>
                    <p class="validation-consulta">Máximo 500 caracteres</p>
                  </div>
                  <div class="col s2">

                  </div>
                </div>
                <div class="row center margin-top-element">
                  <a href="/user-historial" class="format waves-effect btn button-green">Enviar Calificación</a>
                </div>

              </form>
        </div>
      </div>
    </div>
  </div>
@endsection
<script type="text/javascript">
  function starFocus(val){
    if(val == 'star1'){
      document.getElementById("star1").style.color = "#f1c420";
    }else if (val == 'star2') {
      document.getElementById("star1").style.color = "#f1c420";
      document.getElementById("star2").style.color = "#f1c420";

    }else if (val == 'star3') {
      document.getElementById("star1").style.color = "#f1c420";
      document.getElementById("star2").style.color = "#f1c420";
      document.getElementById("star3").style.color = "#f1c420";

    }else if (val == 'star4') {
      document.getElementById("star1").style.color = "#f1c420";
      document.getElementById("star2").style.color = "#f1c420";
      document.getElementById("star3").style.color = "#f1c420";
      document.getElementById("star4").style.color = "#f1c420";
    }else{
      document.getElementById("star1").style.color = "#f1c420";
      document.getElementById("star2").style.color = "#f1c420";
      document.getElementById("star3").style.color = "#f1c420";
      document.getElementById("star4").style.color = "#f1c420";
      document.getElementById("star5").style.color = "#f1c420";
    }

  }
  function starNoFocus(){
    // alert(document.getElementById("star1"))
    document.getElementById('star1').style.color = "#d6d6cd";
    document.getElementById('star2').style.color = "#d6d6cd";
    document.getElementById('star3').style.color = "#d6d6cd";
    document.getElementById('star4').style.color = "#d6d6cd";
    document.getElementById('star5').style.color = "#d6d6cd";

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
    document.getElementById("calificacion").style.paddingLeft = '4%';
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
    document.getElementById("calificacion").style.paddingLeft = '2%';
  }
  function hablar() {

    if (window.hasOwnProperty('webkitSpeechRecognition')) {

      var recognition = new webkitSpeechRecognition();

      recognition.continuous = false;
      recognition.interimResults = false;

      recognition.lang = "es-PE";
      recognition.start();

      recognition.onresult = function(e) {
        console.log(e.results[0][0].transcript);
        console.log(document.getElementById('consulta'));
        document.getElementById('textarea1').value = e.results[0][0].transcript;
        recognition.stop();
        //document.getElementById('labnol').submit();
      };

      recognition.onerror = function(e) {
        recognition.stop();
      }

    }
  }
  function ocultarVerOtroMedico(){
    document.getElementById("otroMedico").style.display = 'none'
  }

  function recomendarOtro(){
    document.getElementById("doctor1").style.display = 'none';
    document.getElementById("doctor2").style.display = 'block';
  }
</script>
