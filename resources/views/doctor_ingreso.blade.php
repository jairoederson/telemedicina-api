@extends('layouts.material-medico')
@section('content')
<div id="ingreso" class="section-ingresos">
    <div class="row background-white">
      <div class="row">
        <div id="cabecera" class="col s12 title-color">
          <h6 class="title-content content-title align-center">
            <b>INGRESOS</b>
          </h6>
        </div>
      </div>
      <div class="row  padding-bottom-element padding-top-element">
        <div class="col s6">
          <div class="center">
            <div id="cuerpo" class="row">
              <div class="row">
                <div class="col s3">
                </div>
                <div class="input-field col s6">
                  <select>
                    <option value="1">Enero 2018</option>
                    <option value="2">Febrero 2018</option>
                    <option value="2">Marzo 2018</option>
                    <option value="2">Todos</option>
                  </select>
                </div>
                <div class="col s3">
                </div>
              </div>
              <div class="row border-bottom padding-bottom-element">
                <label class="label-price"><b>S/. 55.00</b></label>
              </div>

              <div class="row padding-top-element">
                <div class="col s6">
                  <label>4Hrs 10min</label> <br>
                  <label>Tiempo</label>
                </div>
                <div class="col s6">
                  <label>13</label> <br>
                  <label>Consultas</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col s6">
          <div>
            <div class="border-bottom padding-bottom-element">
              <div class="row align-left">
                <p>
                  <b>
                    Ingresos
                  </b>
                </p>
              </div>
              <div class="row" >
                <div class="col s6">
                  <label>Atenciones</label>
                </div>
                <div class="col s5 align-right">
                  <label>5</label>
                </div>
                <div class="col s1">
                </div>
              </div>

              <div class="row" >
                <div class="col s6">
                  <label>Costo por Consulta</label>
                </div>
                <div class="col s5 align-right">
                  <label>S/. 20.00</label>
                </div>
                <div class="col s1">
                </div>
              </div>
            </div>
            <div class="border-bottom padding-bottom-element">
              <div class="row">
                <p>
                  <b>Ingresos Extras</b>
                </p>
              </div>
              <div class="row">
                <div class="col s6">
                  <label>Otros</label>
                </div>
                <div class="col s5 align-right">
                  <label>S/. 4.99</label>
                </div>
                <div class="col s1">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col s6">
                <p><b>Total</b></p>
              </div>
              <div class="col s5 align-right">
                <p>S/. 104.99</p>
              </div>
              <div class="col s1">
              </div>
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
      document.getElementById("ingreso").style.paddingLeft = '4%';
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
      document.getElementById("ingreso").style.paddingLeft = '2%';
    }
  </script>
