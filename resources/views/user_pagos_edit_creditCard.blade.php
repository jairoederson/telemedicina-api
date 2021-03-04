@extends('layouts.material')
@section('content')
<div id="pago-editar" class="content-add-pago">
      <div class="row content-inside">
        <div class="row">
          <div class="col s12 title-color center">
            <h6 class="title-content content-title">
              <b>EDITAR TARJETA DE CRÉDITO</b>
            </h6>
          </div>
        </div>
        <div class="col s12 m12">
            <form class="col s12" name="form_paciente_edit_card" ng-app="app_paciente_edit_card" ng-controller="validateCtrl">
                <div class="row">
                    <br>
                   <div class="input-field col s6">
                     <i class="material-icons prefix icon-color">credit_card</i>
                     <!-- <img src="{{ asset('assets/images/credit_card.png') }}" width="30px" height="30px"> -->
                     <input id="credit_card" type="text" name="credit_card" maxlength="20" ng-maxlength="20" ng-model="credit_card" class="validate" required>
                     <label style="font-size: 14px; font-family: 'Ubuntu', sans-serif;position: absolute;" for="credit_card">Numero de tarjeta *</label>
                     <span style="color:red" ng-show="form_paciente_edit_card.credit_card.$dirty && form_paciente_edit_card.credit_card.$invalid">
                       <span ng-show="form_paciente_edit_card.credit_card.$error.required">Tarjeta de Crédito o Débito requerida.</span>
                       <span ng-show="form_paciente_edit_card.credit_card.$error.pattern">Solo números.</span>
                       <span ng-show="form_paciente_edit_card.credit_card.$error.maxlength">Máximo 16 caracteres.</span>
                       <span ng-show="form_paciente_edit_card.credit_card.$error.password">Número de tarjeta inválida.</span>
                     </span>
                   </div>
                   <div class="input-field col s6">
                     <i class="material-icons prefix icon-color"lock>date_range</i>
                     <!-- <img src="{{ asset('assets/images/calendar.png') }}" width="30px" height="30px"> -->
                     <input id="exp" name="exp" maxlength="7" ng-model="exp" type="text" class="validate" required>
                     <label style="font-size: 14px; font-family: 'Ubuntu', sans-serif;position: absolute;" for="exp">Expiración * (MM/YY)</label>
                     <span style="color:red" ng-show="form_paciente_edit_card.exp.$dirty && form_paciente_edit_card.exp.$invalid">
                       <span ng-show="form_paciente_edit_card.exp.$error.required">Fecha de Expiración requerida.</span>
                       <span ng-show="form_paciente_edit_card.exp.$error.pattern">Use los caracteres mencionados.</span>
                       <span ng-show="form_paciente_edit_card.exp.$error.password">Fecha de expiracióm inválida.</span>
                     </span>
                   </div>
                </div>
                <div class="row">
                  <div class="input-field col s6">
                    <i class="material-icons prefix icon-color">lock</i>
                    <!-- <img src="{{ asset('assets/images/cvv.png') }}" width="30px" height="30px"> -->
                    <input id="cvv" onkeypress="return isNumberKey(event)" name="cvv" max="999" ng-model="cvv" maxlength="3" type="text" ng-maxlength="3" class="validate" required>
                    <label style="font-size: 14px; font-family: 'Ubuntu', sans-serif;position: absolute;" for="cvv">CVV * (Código de verificación)</label>
                    <span style="color:red" ng-show="form_paciente_edit_card.cvv.$dirty && form_paciente_edit_card.cvv.$invalid">
                      <span ng-show="form_paciente_edit_card.cvv.$error.required">CVV requerido.</span>
                      <span ng-show="form_paciente_edit_card.cvv.$error.pattern">use caracteres numericos.</span>
                      <span ng-show="form_paciente_edit_card.cvv.$error.maxlength">Máximo 3 caracteres.</span>
                      <span ng-show="form_paciente_edit_card.cvv.$error.password">Contraseña inválida.</span>
                    </span>
                  </div>
                  <div class="input-field col s6">
                    <i class="material-icons prefix icon-color">location_on</i>

                    <!-- <img src="{{ asset('assets/images/country.png') }}" width="30px" height="30px"> -->
                    <select id="pais" name="pais">
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
                <div class="row margin-top-element margin-bottom-element center">
                  <div class="col s4">
                  </div>
                  <div class="col s4">
                    <a onclick="volverListCC()" id="editar" href="/user-pagos" class="waves-effect btn button-green format">Guardar cambios</a>
                  </div>
                  <div class="col s4">
                  </div>
                </div>
              </form>
            </div>
          </div>
    </div>

@endsection

<script type="text/javascript" src="{{ asset('assets/js/card.js') }}"></script>
<script type="text/javascript">




function isNumberKey(evt){
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
