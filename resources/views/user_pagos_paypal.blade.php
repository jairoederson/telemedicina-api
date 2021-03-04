@extends('layouts.material')
@section('content')

<div id="pago-paypal" class="content-add-pago">
  <div class="row content-inside">
    <div class="row">
      <div class="col s12 title-color center">
        <h6 class="title-content content-title">
          <b>PAYPAL</b>
        </h6>
      </div>
    </div>
    <br>
    <div class="col s12 m12">
      <form name="form_paciente_add_paypal" ng-app="app_paciente_add_paypal" ng-controller="validateCtrl">
        <div class="row">
          <div class="col s1">

          </div>
          <div class="input-field col s4">
            <i class="material-icons prefix icon-color">email</i>
            <!-- <img src="{{ asset('assets/images/paypal.png') }}" style="position: absolute;" width="30px" height="30px"> -->
            <input id="paypal" name="paypal" ng-model="email" type="email" class="validate" value="" required>
            <label style="font-size: 14px; font-family: 'Ubuntu', sans-serif;position: absolute;" for="password">Correo Paypal</label>
            <span style="color:red" ng-show="form_paciente_add_paypal.paypal.$dirty && form_paciente_add_paypal.paypal.$invalid">
              <span ng-show="form_paciente_add_paypal.paypal.$error.required">Correo requerida.</span>
              <span ng-show="form_paciente_add_paypal.paypal.$error.email">Correo no válido.</span>
            </span>
          </div>
          <div class="col s1">

          </div>
          <div class="input-field col s4">
            <i class="material-icons prefix icon-color">lock</i>
            <!-- <img src="{{ asset('assets/images/cvv.png') }}" style="position: absolute" width="30px" height="30px"> -->
            <input id="password" name="password" ng-model="password" type="password" class="validate" value="" required>
            <label style="font-size: 14px; font-family: 'Ubuntu', sans-serif;position: absolute;" for="password">Contraseña</label>
            <span style="color:red" ng-show="form_paciente_add_paypal.password.$dirty && form_paciente_add_paypal.password.$invalid">
              <span ng-show="form_paciente_add_paypal.password.$error.required">Contraseña requerida requerida.</span>
              <span ng-show="form_paciente_add_paypal.password.$error.password">Número de tarjeta inválida.</span>
            </span>
          </div>

          <div class="col s1">
            <i onclick="showPassword()" id="pwd" class="icon-visibility material-icons prefix">visibility</i>
            <i onclick="showPassword()" id="pwd2" class="icon-visibility material-icons prefix" style="display: none">visibility_off</i>
          </div>

        </div>
        <div class="row margin-top-element">
          <div class="col s4"></div>
          <div class="col s4 center">
            <a id="sesionPaypal" href="#" class="waves-effect btn modal-trigger button-green format">Iniciar Sesión</a>
          </div>
          <div class="col s4"></div>
        </div>
      </form>
    </div>
 </div>
</div>


@endsection
<script type="text/javascript">
function mod(){
  $('#modal1').modal();
}
function showPassword() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    document.getElementById('pwd').style.display = "none";
    document.getElementById('pwd2').style.display = "block";;
      x.type = "text";
  } else {
    document.getElementById('pwd').style.display = "block";
    document.getElementById('pwd2').style.display = "none";;
      x.type = "password";
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
  document.getElementById("pago").style.paddingLeft = '4%';

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
  document.getElementById("pago").style.paddingLeft = '2%';

}
</script>
