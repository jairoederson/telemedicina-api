@extends('layouts.material-lab-sec')
@section('content')
<div id="historial" class="section-content">
  <ul id="tabs-swipe-demo" class="tabs account-header">
    <li class="tab col s6"><a class="active" href="#test-swipe-2"><b>MI CUENTA</b></a></li>
    <li class="tab col s6"><a class="" href="#test-swipe-3"><b>CAMBIAR CONTRASEÑA</b></a></li>
  </ul>
  <div id="test-swipe-2">
      <div class="row background-white">
        <div class="col s12 ">
          <form class="col s12 account-content" name="form_doctor_account" ng-app="app_doctor_account" ng-controller="validateCtrl">
          <br>
          <br>
          <div class="row padding-left-element padding-right-element">
            <div class="input-field col s6">
              <i class="material-icons prefix icon-color">account_circle</i>
              <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="name" ng-pattern="/^[a-zA-Z\s]*$/" name="name" ng-model="name" type="text" class="validate" required disabled>
              <label class="label-input" for="name">Nombre</label>
              <!-- <span style="color:red" ng-show="form_doctor_account.name.$dirty && form_doctor_account.name.$invalid">
                <span ng-show="form_doctor_account.name.$error.required">Nombre Completo requerido.</span>
                <span ng-show="form_doctor_account.name.$error.pattern">Solo caracteres y espacios.</span>
                <span ng-show="form_doctor_account.name.$error.text">Nombre Inválido.</span>
              </span> -->
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix icon-color icon-color" width="10px" height="10px">email</i>
              <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="email" type="email" name="email" ng-model="email" class="validate" required disabled>
              <label for="email" class="label-input">Email</label>
              <!-- <span style="color:red" ng-show="form_doctor_account.email.$dirty && form_doctor_account.email.$invalid">
                <span ng-show="form_doctor_account.email.$error.required">Correo requerido.</span>
                <span ng-show="form_doctor_account.email.$error.email">Correo Inválido.</span>
              </span> -->
            </div>
          </div>

          <div class="row padding-left-element padding-right-element">
            <div class="input-field col s6">
              <i class="material-icons prefix icon-color">phone</i>
              <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="tel" name="tel" ng-model="tel" ng-maxlength="13" ng-pattern="/^[#0-9]*$/" type="text" class="validate" required disabled>
              <label class="label-input" for="tel">Telefono</label>
              <!-- <span style="color:red" ng-show="form_doctor_account.tel.$dirty && form_doctor_account.tel.$invalid">
                <span ng-show="form_doctor_account.tel.$error.required">Teléfono requerido.</span>
                <span ng-show="form_doctor_account.tel.$error.pattern">Número Inválido.</span>
                <span ng-show="form_doctor_account.tel.$error.maxlength">Número de dígitos excedito.</span>
              </span> -->
            </div>

            <div class="input-field col s6">
              <i class="material-icons prefix icon-color">person</i>
              <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="dni" name="dni" ng-model="cmp" ng-maxlength="8" type="number" class="validate" value="4585858454" disabled required>
              <label class="label-input" for="cmp">DNI</label>
              <!-- <span style="color:red" ng-show="form_doctor_account.cmp.$dirty && form_doctor_account.cmp.$invalid">
                <span ng-show="form_doctor_account.cmp.$error.required">CMP requerido.</span>
                <span ng-show="form_doctor_account.cmp.$error.pattern">CMP Inválido.</span>
                <span ng-show="form_doctor_account.cmp.$error.maxlength">Número de dígitos excedito.</span>
              </span> -->
            </div>
          </div>

          <div class="row padding-left-element padding-right-element" style="margin-top: 10px;">
            <div id="activate-genero" class="col s6 input-field" style="display:none">
              <i class="material-icons prefix icon-color">group</i>
              <select id="genero" name="genero">
                <option id="m" value="1">Masculino</option>
                <option id="f" value="2">Femenino</option>
              </select>
              <label for="genero">Género</label>
            </div>
            <div id="desactivate-genero" class="col s6 input-field">
              <i class="material-icons prefix icon-color">group</i>
              <select id="genero" name="genero" disabled>
                <option id="m" value="1">Masculino</option>
                <option id="f" value="2">Femenino</option>
              </select>
              <label for="genero">Género</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix icon-color">today</i>
              <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="date" name="date" ng-model="date" type="date" class="datepicker" required disabled>
              <label class="label-input" for="date">Fecha de Nacimiento</label>
              <!-- <span style="color:red" ng-show="form_doctor_account.date.$dirty && form_doctor_account.date.$invalid">
                <span ng-show="form_doctor_account.date.$error.required">Fecha de nacimiento requerido.</span>
              </span> -->
            </div>
          </div>

          <div class="row center padding-top-element">
            <div class="col s5">

            </div>
            <div class="col s3 center">
              <a id="editar"  onclick="editar()" style="display:block; width:140;" class="waves-effect btn button-green format">Editar Cambios</a>
              <a id="guardar" href="#updateAccount" onclick="updateAccount(); guardar()" class="modal-trigger waves-effect btn button-green format" style="display: none; width: 150px">Guardar Cambios</a>
              <!-- <a id="editar" onclick="editar()" style="display:block; width:200px;" class="waves-effect btn button-cuenta format">Editar Cambios</a> -->
              <!-- <a id="guardar" href="#updateAccount" onclick="updateAccount(); guardar()" style="display: none; width:200px;" class="modal-trigger waves-effect btn button-cuenta format">Guardar Cambios</a> -->
            </div>
            <div class="col s4">

            </div>
          </div>
        </form>
        </div>
      </div>
  </div>
  <div id="test-swipe-3" class="" >
    <div class="row background-white">
      <div class="">
        <form class="col s12" name="form_doctor_pass" ng-app="app_doctor_pass" ng-controller="validateCtrl">
              <div>
                <!-- <h5>
                  CAMBIAR CONTRASEÑA
                </h5> -->
              </div>
              <div class="row input-control margin-top-element">
                 <div class="input-field col s11">
                   <i class="material-icons prefix icon-color">vpn_key</i>
                   <input id="password" name="oldPass" ng-minlength="8" ng-model="oldPass" ng-pattern="/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/" type="password" class="validate">
                   <label for="password">Contraseña Actual</label>
                   <span style="color:red" ng-show="form_doctor_pass.oldPass.$dirty && form_doctor_pass.oldPass.$invalid">
                     <!-- <span ng-show="form_doctor_pass.oldPass.$error.required">Antigua contraseña requerida.</span>
                     <span ng-show="form_doctor_pass.oldPass.$error.pattern">Use los caracteres mencionados.</span>
                     <span ng-show="form_doctor_pass.oldPass.$error.minlength">Minimo 8 caracteres.</span>
                     <span ng-show="form_doctor_pass.oldPass.$error.password">Contraseña inválida.</span> -->
                   </span>
                 </div>
                 <div class="col s1">
                   <a href="#">
                     <i onclick="showPassword()" id="pwd" class="icon-visibility icon-color material-icons prefix">visibility</i>
                     <i onclick="showPassword()" id="pwd2" style="display: none"class="icon-visibility icon-color material-icons prefix">visibility_off</i>
                   </a>
                 </div>
               </div>

              <div class="row input-control">
               <div class="input-field col s11">
                 <i class="icon-color material-icons prefix icon-color">lock</i>
                 <input id="passwordnew" type="password" ng-minlength="8" name="newPass" ng-model="newPass" ng-pattern="/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/" class="validate">
                 <label for="passwordnew">Nueva Contraseña</label>
                 <!-- <span style="color:red" ng-show="form_doctor_pass.newPass.$dirty && form_doctor_pass.newPass.$invalid">
                   <span ng-show="form_doctor_pass.newPass.$error.required">Nueva contraseña requerida.</span>
                   <span ng-show="form_doctor_pass.oldPass.$error.minlength">Minimo 8 caracteres.</span>
                   <span ng-show="form_doctor_pass.newPass.$error.pattern">Use los caracteres mencionados:</span>
                   <span ng-show="form_doctor_pass.newPass.$error.password">Contraseña inválida.</span>
                 </span> -->
                 <span class="restrictions" style="color: #9f9f9f">8 caracteres, 1 mayúscula, 1 carácter no alfanumérico</span>
               </div>
               <div class="col s1">
                 <a href="#">
                   <i onclick="showNewPassword()" id="conf_pwd"  class="icon-visibility icon-color material-icons prefix">visibility</i>
                   <i onclick="showNewPassword()" id="conf_pwd2" style="display: none"class="icon-visibility icon-color material-icons prefix">visibility_off</i>
                 </a>
               </div>
             </div>
              <div class="row input-control">
                 <div class="input-field col s11">
                   <i class="material-icons prefix icon-color">lock</i>
                   <input id="passwordnewrep" type="password" ng-minlength="8" name="newPassRep" ng-pattern="/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/" ng-model="newPassRep" class="validate">
                   <label for="passwordnewrep">Confirmar Contraseña</label>
                   <!-- <span style="color:red" ng-show="form_doctor_pass.newPassRep.$dirty && form_doctor_pass.newPassRep.$invalid">
                     <span ng-show="form_doctor_pass.newPassRep.$error.required">Nueva contraseña requerida.</span>
                     <span ng-show="form_doctor_pass.oldPass.$error.minlength">Minimo 8 caracteres.</span>
                     <span ng-show="form_doctor_pass.newPassRep.$error.pattern">Solo caracteres y espacios.</span>
                     <span ng-show="form_doctor_pass.newPassRep.$error.password">Contraseña inválida.</span>
                   </span> -->
                   <span class="restrictions" style="color: #9f9f9f">8 caracteres, 1 mayúscula, 1 carácter no alfanumérico</span>
                 </div>
                 <div class="col s1">
                   <a href="#">
                     <i id="conf_rep_pwd" onclick="showNewPasswordRep()" class="icon-visibility icon-color material-icons prefix">visibility</i>
                     <i id="conf_rep_pwd2" onclick="showNewPasswordRep()" style="display: none"class="icon-visibility icon-color material-icons prefix">visibility_off</i>
                   </a>
                 </div>
               </div>
              <div class="row padding-top-element center">
                <br>
                <a onclick="updatePassword()" href="#updatePassword" class="modal-trigger waves-effect btn button-green format">Guardar Cambios</a>
              </div>
            </form>
      </div>
   </div>
  </div>
</div>

<div id="updatePassword" class="modal">

  <div class="modal-cabecera">
    <div class="row">
      <div class="col s6">
        <div class="left title-modal" style="padding-left: 10px;">
          <h5 class="color-white" style="font-size: 20px;"> <b>Actualización de password</b> </h5>
        </div>
      </div>
      <div class="col s6">
        <div class="right title-modal" style="padding-right: 10px;">
          <a class="modal-close" style="color:#383737de">
            <h5>x</h5>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="modal-content">
    <div class="row modal-cabecera">

    </div>
    <div class="row center">
      El password se ha actualizado correctamente
    </div>
    <div class="row margin-top-element">

    </div>

  </div>

  <div class="modal-pie right">
    <div class="right">

      <button type="button" name="button" class="modal-action modal-close btn button-green format">Ok</button>
    </div>
  </div>
</div>

<div id="updateAccount" class="modal">

  <div class="modal-cabecera">
    <div class="row">
      <div class="col s6">
        <div class="left title-modal" style="padding-left: 10px;">
          <h5 class="color-white" style="font-size: 20px;"> <b>Actualización de Cuenta</b> </h5>
        </div>
      </div>
      <div class="col s6">
        <div class="right title-modal" style="padding-right: 10px;">
          <a class="modal-close" style="color:#383737de">
            <h5>x</h5>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="modal-content">
    <div class="row modal-cabecera">

    </div>
    <div class="row center">
      Su cuenta se actualizo correctamente
    </div>
    <div class="row margin-top-element">

    </div>

  </div>

  <div class="modal-pie right">
    <div class="right">

      <button type="button" name="button" class="modal-action modal-close btn button-green format">Ok</button>
    </div>
  </div>
</div>
<!-- MODAL -->

<!-- MODAL END -->

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
function editar(){
  document.getElementById("name").disabled = false;
  document.getElementById("dni").disabled = false;
  document.getElementById("email").disabled = false;
  document.getElementById("tel").disabled = false;
  document.getElementById("date").disabled = false;
  document.getElementById("genero").disabled = false;

  document.getElementById("activate-genero").style.display = 'block';
  document.getElementById("desactivate-genero").style.display = 'none';
  document.getElementById("editar").style.display = 'none';
  document.getElementById("guardar").style.display = 'block';

}
function guardar(){
  document.getElementById("name").disabled = true;
  document.getElementById("dni").disabled = true;
  document.getElementById("email").disabled = true;
  document.getElementById("tel").disabled = true;
  document.getElementById("date").disabled = true;
  document.getElementById("genero").disabled = true;
  // document.getElementById("genero").disabled = true;
  document.getElementById("activate-genero").style.display = 'none';
  document.getElementById("desactivate-genero").style.display = 'block';
  document.getElementById("editar").style.display = 'block';
  document.getElementById("guardar").style.display = 'none';
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
function showNewPassword() {
  var x = document.getElementById("passwordnew");
  if (x.type === "password") {
    document.getElementById('conf_pwd').style.display = "none";
    document.getElementById('conf_pwd2').style.display = "block";;
      x.type = "text";
  } else {
    document.getElementById('conf_pwd').style.display = "block";
    document.getElementById('conf_pwd2').style.display = "none";;
      x.type = "password";
  }
}
function showNewPasswordRep() {
  var x = document.getElementById("passwordnewrep");
  if (x.type === "password") {
     document.getElementById('conf_rep_pwd').style.display = "none";
     document.getElementById('conf_rep_pwd2').style.display = "block";;
      x.type = "text";
  } else {
    document.getElementById('conf_rep_pwd').style.display = "block";
    document.getElementById('conf_rep_pwd2').style.display = "none";;
      x.type = "password";
  }
}
</script>
