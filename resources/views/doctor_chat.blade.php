@extends('layouts.material-medico')
@section('content')
<div id="historial" class="section-content">
    <div class="row background-white">
        <div class="row" >
          <div id="cabecera" class="col s12 title-color align-center">
            <h6 class="title-content content-title">
              CHAT | MENSAJERIA
            </h6>
          </div>
        </div>
        <div class="row" style="padding-left:20px;padding-right:20px">
          <div class="col s4">
            <div class="align-center border-bottom margin-bottom-element margin-top-element">
              <h5>Contactos</h5>
            </div>
            <div class="row">
              <div class="input-field col s12" style="padding-top: 0px">
               <input id="last_name" type="text" class="validate">
               <label for="last_name">Bucar Contacto</label>
             </div>
             <div class="row col s12">
               @for ($i = 0; $i <= 3; $i++)
               <div class="row user-contact">
                 <div class="contact">
                   <div class="col s2">
                     <a href="#">
                       <img class="img-chat-user" src="{{ asset('assets/images/user_chat.jpg') }}" alt="" width="40px" style="border-radius: 50%">
                     </a>
                   </div>
                   <div class="col s10">
                     <div class="row">
                       <div class="col s7">
                         <a href="#">
                           <label for="">sebastian</label>
                         </a>
                       </div>
                       <div class="col s5">
                         <label for="">7:22 a.m.</label>
                       </div>
                     </div>
                     <div class="row">
                       <div class="col s12">
                         <label for="">hola doctor Ricardo, le escribia ...</label>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
               @endfor
             </div>
            </div>
          </div>
          <div class="col s8">
            <div class="center row border-bottom margin-bottom-element margin-top-element">
              <h5>Chat</h5>
            </div>

            <div class="row">
              <div class="col s1">

              </div>
              <div class="col s11">
                <div class="" style="background-color: #e9f1e8; padding: 25px; border-radius: 10px">
                  @for ($i=0; $i < 2; $i++)
                  <div class="row margin-bottom-element">
                    <div class="left col s12">
                      <div class="chip chip-color" >
                        <img src="{{ asset('assets/images/user_chat.jpg') }}" alt="Contact Person">
                        <a href="#" style="color:#000000">
                          Sebastian C.
                        </a>
                      </div>
                      <div class="message-chat">
                        Jane DoeJane DoeJane DoeJane DoeJane DoeJane Doe
                        Jane DoeJane DoeJane DoeJane DoeJane DoeJane DoeJane Doe
                        Jane
                      </div>
                    </div>
                  </div>
                  <div class="row padding-bottom-element">
                    <div class="left col s12">
                      <div class="chip chip-color right">
                        <img src="{{ asset('assets/images/usuario_chat.jpg') }}" alt="Contact Person">
                        <a href="#" style="color: #000000">
                          Antonio R.
                        </a>
                      </div>
                      <div class="message-chat-oher">
                        Jane DoeJane DoeJane DoeJane DoeJane DoeJane Doe
                        Jane DoeJane DoeJane DoeJane DoeJane DoeJane DoeJane Doe
                        Janeaaa
                      </div>
                    </div>

                  </div>
                  @endfor
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
      <!--
        <div class="card" style="padding-bottom: 20px;">
          <div class="card-form">
            <div class="row">
              <br>
              <div class="col s2 m2">
                <img src="https://www.1plusx.com/app/mu-plugins/all-in-one-seo-pack-pro/images/default-user-image.png" style="border-radius: 50%;" alt="" width="120px">
            </div>
              <div class="col s7 m7">
                <h6 for=""> <strong>Dr. Ricardo Smith</strong> </6>
                <h6>Hombre, 32 años</h6>
                <h6>04/10/17 - 15 minutos</h6>
                <h6>Ubicacion: Ayacucho</h6>
                <h6>Precio Cobrado: S/.5.00</h6>
              </div>
              <div class="col s3 m3">

              </div>
            </div>
          </div>
        </div>
      -->

   </div>
</div>
@endsection
<script type="text/javascript">
function preguntasCategoria(valor){
  if(valor == 'frecuentes'){
    document.getElementById('frecuentes').style.display = 'block';
    document.getElementById('categoria1').style.display = 'none';
    document.getElementById('categoria2').style.display = 'none';
    document.getElementById('categoria3').style.display = 'none';
  }else if (valor == 'categoria1') {
    document.getElementById('frecuentes').style.display = 'none';
    document.getElementById('categoria1').style.display = 'block';
    document.getElementById('categoria2').style.display = 'none';
    document.getElementById('categoria3').style.display = 'none';

  }else if (valor == 'categoria2'){
    document.getElementById('frecuentes').style.display = 'none';
    document.getElementById('categoria1').style.display = 'none';
    document.getElementById('categoria2').style.display = 'block';
    document.getElementById('categoria3').style.display = 'none';
  }else{
    document.getElementById('frecuentes').style.display = 'none';
    document.getElementById('categoria1').style.display = 'none';
    document.getElementById('categoria2').style.display = 'none';
    document.getElementById('categoria3').style.display = 'block';
  }
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
  document.getElementById("historial").style.paddingLeft = '4%';
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
  document.getElementById("historial").style.paddingLeft = '2%';
}
</script>
