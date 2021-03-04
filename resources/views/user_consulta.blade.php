@extends('layouts.material')
@section('content')
<div id="consulta" class="content-consulta">
      <div class="row content-inside center">
        <div class="row">
          <div class="col s12 title-color">
            <h6 class="title-content content-title">
              <b>NUEVA CONSULTA</b>
            </h6>
          </div>
        </div>
        <div class="col s12 m12">
          <div class="row">
            <div class="row margin-left-element margin-right-element">
                <div class="row">
                  <div id="consulta" class="input-field col s12">
                    <div class="chips chips-placeholder chips-autocomplete align-left" >
                    </div>
                  </div>
                 </div>
                <div class="row">
                  <div class="input-field col s11" style="">
                    <textarea onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" name="consultaPaciente" id="consultaPaciente" class="materialize-textarea" maxlength="500" data-length="500"></textarea>
                    <label id="lblConsulta" for="consultaPaciente">Escriba o mencione su consulta</label>
                    <p class="validation-consulta">Máximo 500 caracteres</p>
                  </div>
                  <div class="col s1">
                    <a onclick="hablar()" style="margin-top: 60px;" class="right">
                      <img src="{{asset('assets/images/voice-icon.png')}}" alt="" width="20px">
                    </a>
                  </div>
                </div>
                <div class="row align-center">
                  <a href="/user-consulta-doctor" class="waves-effect btn button-green format">Enviar</a>
                </div>
            </div>
          </div>
        </div>
     </div>
    </div>
@endsection
<script type="text/javascript">
    // var ta = document.getElementById("consultaPaciente");
    // ta.addEventListener(
    //   'keydown',
    //   function (e) {
    //       if (e.keyCode == 60) {
    //           alert('No "<"!');
    //           e.preventDefault();
    //       }
    //   }
    // );

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
    document.getElementById("consulta").style.paddingLeft = '4%';
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
    document.getElementById("consulta").style.paddingLeft = '2%';
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
        document.getElementById('consultaPaciente').click();
        document.getElementById('lblConsulta').classList.add("active")
        document.getElementById('consultaPaciente').value = e.results[0][0].transcript;
        recognition.stop();
        //document.getElementById('labnol').submit();
      };

      recognition.onerror = function(e) {
        recognition.stop();
      }
    }
  }

  var consulta = document.getElementsByTagName('input')
  console.log(consulta)
  consulta.onkeyup = "this.value = this.value.replace(/[&$*<>]/g, '')"

</script>
