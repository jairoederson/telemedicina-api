@extends('layouts.material')
@section('content')
<div id="pago-add" class="content-add-pago">
      <div class="row content-inside">
        <div class="row">
          <div class="col s12 title-color center">
            <h6 class="title-conten content-title">
              <b>TARJETA DE CREDITO</b>
            </h5>
          </div>
        </div>
        <br>
        <div class="col s12 m12">
          <form class="col s12" name="form_paciente_add_card" ng-app="app_paciente_add_card" ng-controller="validateCtrl">
                <div class="row">
                   <div class="input-field col s6">
                     <i class="material-icons prefix icon-color">credit_card</i>
                     <!-- <img src="{{ asset('assets/images/credit_card.png') }}" width="30px" height="30px"> -->

                     <input id="credit_card" onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" name="credit_card" maxlength="20" ng-maxlength="20" ng-model="credit_card" type="text" class="validate" required>
                     <label style="font-size: 14px; font-family: 'Ubuntu', sans-serif;position: absolute;" for="credit_card">Numero de tarjeta *</label>
                     <span style="color:red" ng-show="form_paciente_add_card.credit_card.$dirty && form_paciente_add_card.credit_card.$invalid">
                       <span ng-show="form_paciente_add_card.credit_card.$error.required">Tarjeta de Crédito o Débito requerida.</span>
                       <span ng-show="form_paciente_add_card.credit_card.$error.pattern">Solo números.</span>
                       <span ng-show="form_paciente_add_card.credit_card.$error.maxlength">Máximo 16 caracteres.</span>
                       <span ng-show="form_paciente_add_card.credit_card.$error.password">Número de tarjeta inválida.</span>
                     </span>
                   </div>
                   <div class="input-field col s6">
                     <i class="material-icons prefix icon-color">date_range</i>
                     <!-- <img src="{{ asset('assets/images/calendar.png') }}" width="30px" height="30px"> -->
                     <input id="exp" name="exp" ng-model="exp" maxlength="7" type="text" class="validate" value="" required>
                     <label style="font-size: 14px; font-family: 'Ubuntu', sans-serif;position: absolute;" for="exp">Expiración * (MM/YY)</label>
                     <span style="color:red" ng-show="form_paciente_add_card.exp.$dirty && form_paciente_add_card.exp.$invalid">
                       <span ng-show="form_paciente_add_card.exp.$error.required">Fecha de expiración requerida.</span>
                       <span ng-show="form_paciente_add_card.exp.$error.pattern">Solo números.</span>
                       <span ng-show="form_paciente_add_card.exp.$error.maxlength">Máximo 16 caracteres.</span>
                       <span ng-show="form_paciente_add_card.exp.$error.password">Número de tarjeta inválida.</span>
                     </span>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s6">
                    <i class="material-icons prefix icon-color">lock</i>
                    <!-- <img src="{{ asset('assets/images/cvv.png') }}" width="30px" height="30px"> -->
                    <input id="cvv" onkeypress="return isNumberKeyAdd(event)" name="cvv" ng-maxlength="3" maxlength="3" ng-model="cvv" type="text" class="validate" value="" required>
                    <label style="font-size: 14px; font-family: 'Ubuntu', sans-serif;position: absolute;" for="cvv">CVV * (Código de verificación)</label>
                    <span style="color:red" ng-show="form_paciente_add_card.cvv.$dirty && form_paciente_add_card.cvv.$invalid">
                      <span ng-show="form_paciente_add_card.cvv.$error.required">CVV requerido.</span>
                      <span ng-show="form_paciente_add_card.cvv.$error.pattern">Solo números.</span>
                      <span ng-show="form_paciente_add_card.cvv.$error.maxlength">Máximo 3 caracteres.</span>
                      <span ng-show="form_paciente_add_card.cvv.$error.password">Número de tarjeta inválida.</span>
                    </span>
                  </div>
                  <div class="input-field col s6">
                    <i class="material-icons prefix icon-color">location_on</i>
                    <!-- <img src="{{ asset('assets/images/country.png') }}" width="30px" height="30px"> -->
                    <select name="pais" id="pais">
                      <option value="" disabled selected>Peru</option>
                      <option value="1">Peru</option>
                      <option value="2">Ecuador</option>
                      <option value="3">Argentina</option>
                      <option value="4">Chile</option>
                      <option value="5">Otro</option>
                    </select>
                    <label>Pais</label>
                  </div>
                </div>

                <div class="row margin-top-element center margin-bottom-element">
                  <div class="col s4">
                  </div>
                  <div class="col s4">
                    <a onclick="volverListCC()" id="editar" href="user-pagos" class="waves-effect btn modal-trigger button-green format">Agregar método de pago</a>
                  </div>
                  <div class="col s4">
                  </div>
                </div>
              </form>
        </div>
     </div>
    </div>


@endsection
<script type="text/javascript">
function isNumberKeyAdd(evt){
   var charCode = (evt.which) ? evt.which : event.keyCode
   if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
   return true;
}
function mod(){
  $('#modal1').modal();
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
