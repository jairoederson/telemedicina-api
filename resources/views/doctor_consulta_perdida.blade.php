@extends('layouts.material-medico')
@section('content')
<div id="historial" class="" style="height: 100%; width:100%; padding: 3% 4% 5% 4%; background-color: #fafafa">
    <div class="row card" style="">
      <div class="col s12 m12">
        <div class=""style="text-align:center;font-size: 14px; font-family: 'Ubuntu', sans-serif;" >
          <h5>
            <b>CONSULTAS PERDIDAS</b>
          </h5>
        </div>
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
                <h6>04/10/17</h6>
                <h6>Ubicacion: Ayacucho</h6>
                <h6>Llamada Perdida</h6>
              </div>
              <div class="col s3 m3"></div>
            </div>
          </div>
        </div>
      </div>
   </div>
  </div>
    @endsection
    <script type="text/javascript">
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
