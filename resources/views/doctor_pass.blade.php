@extends('layouts.material-medico')
@section('content')
<div id="pass" class="" style="height: 100%; width:100%; padding: 3% 4% 5% 4%; background-color: #fafafa">
    <div class="row" style="background-color: #ffffff">
      <div class="col s12 m12">
        <div class="card">
          <div class="card-form">
            <form class="col s12" name="form_doctor_pass" ng-app="app_doctor_pass" ng-controller="validateCtrl">
              <div class=""style="text-align:center;font-size: 14px; font-family: 'Ubuntu', sans-serif;" >
                <h5>
                  <b>CAMBIAR CONTRASEÑA</b>
                </h5>
              </div>
              <div class="row">
                 <div class="input-field col s11">
                   <i class="material-icons prefix">vpn_key</i>
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
                   <i onclick="showPassword()" id="pwd" style="padding-top: 50%; display: block"class="material-icons prefix">visibility</i>
                   <i onclick="showPassword()" id="pwd2" style="padding-top: 50%; display: none"class="material-icons prefix">visibility_off</i>
                 </div>
               </div>
              <div class="row">
               <div class="input-field col s11">
                 <i class="material-icons prefix">lock</i>
                 <input id="passwordnew" type="password" ng-minlength="8" name="newPass" ng-model="newPass" ng-pattern="/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/" class="validate">
                 <label for="email">Nueva Contraseña</label>
                 <span style="color:red" ng-show="form_doctor_pass.newPass.$dirty && form_doctor_pass.newPass.$invalid">
                   <span ng-show="form_doctor_pass.newPass.$error.required">Nueva contraseña requerida.</span>
                   <span ng-show="form_doctor_pass.oldPass.$error.minlength">Minimo 8 caracteres.</span>
                   <span ng-show="form_doctor_pass.newPass.$error.pattern">Use los caracteres mencionados:</span>
                   <span ng-show="form_doctor_pass.newPass.$error.password">Contraseña inválida.</span>
                 </span>
                 <span class="span-medidor">8 caracteres, 1 mayúscula, 1 carácter no alfanumérico</span>
               </div>
               <div class="col s1">
                 <i onclick="showNewPassword()" id="conf_pwd" style="padding-top: 50%; display: block"class="material-icons prefix">visibility</i>
                 <i onclick="showNewPassword()" id="conf_pwd2" style="padding-top: 50%; display: none"class="material-icons prefix">visibility_off</i>
               </div>
             </div>
              <div class="row">
                 <div class="input-field col s11">
                   <i class="material-icons prefix">lock</i>
                   <input id="passwordnewrep" type="password" ng-minlength="8" name="newPassRep" ng-pattern="/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/" ng-model="newPassRep" class="validate">
                   <label for="password">Confirmar Contraseña</label>
                   <span style="color:red" ng-show="form_doctor_pass.newPassRep.$dirty && form_doctor_pass.newPassRep.$invalid">
                     <span ng-show="form_doctor_pass.newPassRep.$error.required">Nueva contraseña requerida.</span>
                     <span ng-show="form_doctor_pass.oldPass.$error.minlength">Minimo 8 caracteres.</span>
                     <span ng-show="form_doctor_pass.newPassRep.$error.pattern">Solo caracteres y espacios.</span>
                     <span ng-show="form_doctor_pass.newPassRep.$error.password">Contraseña inválida.</span>
                   </span>
                   <span class="span-medidor">8 caracteres, 1 mayúscula, 1 carácter no alfanumérico</span>
                 </div>
                 <div class="col s1">
                   <i id="conf_rep_pwd" onclick="showNewPasswordRep()" style="padding-top: 50%; display: block"class="material-icons prefix">visibility</i>
                   <i id="conf_rep_pwd2" onclick="showNewPasswordRep()" style="padding-top: 50%; display: none"class="material-icons prefix">visibility_off</i>
                 </div>
               </div>
              <div class="row" style="text-align: center">
                <br>
                <a class="waves-effect btn" style=" background-color: #868686; width: 300px">GUARDAR CAMBIOS</a>
              </div>
            </form>
          </div>
        </div>
      </div>
   </div>
</div>
@endsection
<script type="text/javascript">
  function mostrar(){
    document.getElementById("nav0").style.display = 'block';
    document.getElementById("nav1").style.display = 'none';
    document.getElementById("content").classList.remove('s11');
    document.getElementById("content").classList.remove('m11');
    document.getElementById("content").classList.add('s10');
    document.getElementById("content").classList.add('m10');
    // document.getElementById("content2").style.display = 'none';
    document.getElementById("logofarma1").style.display = 'none';
    document.getElementById("logofarma").style.display = 'block';
    document.getElementById("hamb").style.display = 'none';
    document.getElementById("hamb1").style.display = 'block';
    document.getElementById("pass").style.paddingLeft = '4%';

  }
  function ocultar(){
    document.getElementById("nav0").style.display = 'none';
    document.getElementById("nav1").style.display = 'block';
    document.getElementById("content").classList.remove('s10');
    document.getElementById("content").classList.remove('m10');
    document.getElementById("content").classList.add('s11');
    document.getElementById("content").classList.add('m11');
    // document.getElementById("content2").style.display = 'block';
    document.getElementById("logofarma").style.display = 'none';
    document.getElementById("logofarma1").style.display = 'block';
    document.getElementById("hamb1").style.display = 'none';
    document.getElementById("hamb").style.display = 'block';
    document.getElementById("pass").style.paddingLeft = '2%';
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
