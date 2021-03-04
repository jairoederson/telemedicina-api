function loadWizard01() {
  document.getElementById('wizardAloDoctor').innerHTML = `
  <div class="max-ancho pagination-centered" style="position:relative;display:block;height:430px; width: 1400px; padding:90px 0px 0px 0px; align:center">
    <div class="center" style="padding-left: 280px; padding-right: 300px">
      <div class="center panel-wizard" style="width:auto;height: 250px; background-color: rgba(255, 2555, 255, 0.7); padding:40px">
        <div class="container" style="width:auto;">
          <h5 class="banner" style="font-size: 40px;color:#e22715;"> <b>¿Hola, como puedo ayudarte?</b> </h5>
          <div class="row" style="padding-top: 40px">
            <div class="col-sm-9">
              <input id="query" onkeyup="typeQuery()" type="text" name="" value="" style="color: black !important; border-bottom: 1px solid #868686 !important" placeholder="Comienza escribiendo tu consulta o Síntoma">
            </div>
            <div class="col-sm-3">
              <button id="button01" class="btn disabled" type="button" name="button" onclick="loadWizard02()" style="background-color: #fff; color: #e22715 !important; border: 1px solid;">Enviar Consulta</button>
            </div>
          </div>
          <br>
        </div>
      </div>
    </div>
  </div>
  `
  $('#wizardAloDoctor').fadeIn('slow')
}

function loadWizard02() {
  localStorage.setItem('query', $('#query').val())
  let identity = localStorage.getItem('identity')
  let title = ''
  let goTo = ''
  let display = 'none'
  if (identity == null || identity == '' || identity == undefined) {
    title = 'Antes de que pueda ayudarte, necesito tomar algunos datos suyos.'
    goTo = 'loadWizard03()'
    display = 'block'
  } else {
    title = `Hola ${
      JSON.parse(identity).name
    }. A continuación registraremos sus principales Rasgos Vitales.`
    goTo = 'bot01()'
  }
  document.getElementById('wizardAloDoctor').innerHTML = `
  <div class="max-ancho pagination-centered" style="position:relative;display:block;height:430px; width: 1400px; padding:90px 0px 0px 0px; align:center">
    <div class="center" style="padding-left: 280px; padding-right: 320px">
      <div class="center panel-wizard" style="width:auto;height: 250px; background-color: rgba(255, 2555, 255, 0.7);margin-left:30px; padding-top:40px">
        <div class="container" style="width:680px; margin: 0px 40px 20px 40px;">
          <div class="row">
            <div class="col-md-6">
              <div class="left">
                <a style="color: #868686; cursor: pointer;" onclick="loadWizard01()">Volver</a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="right">
                <a style="color: #868686; cursor: pointer;" onclick="loadWizard01()">Salir</a>
              </div>
            </div>
          </div>
          <h5 class="banner" style="font-size: 20px;color:#e22715; padding-left: 2px; padding-top: 12px">
            <b>${title}</b>
          </h5>
          <div class="row" style="padding-top: 20px">
            <div class="col-sm-12">
              <div>
                <button class="btn btn-block" type="button" name="button" onclick="${goTo}" style="background-color: #fff; color: #e22715 !important; border: 1px solid;">Comenzar</button>
              </div>
            </div>
          </div>
          <div style="margin-top: 20px" class="left">
            <a onclick="wizardLogin()" style="color: #868686; font-size: 16px; padding-left: 25px; cursor: pointer; display: ${display};">
              Ya tengo una cuenta
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  `
}

function loadWizard03() {
  document.getElementById('wizardAloDoctor').innerHTML = `
  <div class="max-ancho pagination-centered" style="position:relative;display:block;height:430px; width: 1400px; padding:30px 0px 0px 0px; align:center">
    <div class="center" style="padding-left: 280px; padding-right: 320px">
      <div class="center panel-wizard" style="width:auto;height: 370px; background-color: rgba(255, 2555, 255, 0.7);margin-left:30px; padding-top:40px">
        <div class="container" style="width:680px; margin: 0px 40px 20px 40px;">
          <div class="row">
            <div class="col-md-6">
              <div class="left">
                <a style="color: #868686; cursor: pointer;" onclick="loadWizard02()">Volver</a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="right">
                <a style="color: #868686; cursor: pointer;" onclick="loadWizard01()">Salir</a>
              </div>
            </div>
          </div>
          <h5 class="banner" style="font-size: 20px;color:#e22715; padding-left: 2px; padding-top: 12px"> <b>Datos de identificación.</b> </h5>

          <div class="row" style="padding-left: 25px; padding-right: 25px">
            <div class="input-field col s12">
              <select id="type_document_id" onchange="selectTypeDocument()">
                <option value="0" disabled selected>Seleccione una opción</option>
                <option value="1">DNI</option>
                <option value="2">Carnet de extranjeria</option>
              </select>
              <label>Tipo de documento</label>
            </div>
          </div>

          <div class="row" style="padding-left: 25px; padding-right: 25px">
            <div class="input-field col s12">
              <input onkeyup="typeNumDoc()" id="numdoc" type="number" class="validate">
              <label for="numdoc"">Número de documento</label>
            </div>

            <div class="left" style="padding-left: 10px;margin-top: -15px">
              <span id="errorNumDoc" style="font-size: 12px; color: #e22715"></span>
            </div>
          </div>

          <div class="row" style="padding-top: 20px">
            <div class="col-sm-12">
              <div>
                <button id="button04" class="btn btn-block disabled" type="button" name="button" onclick="verifyReniec()" style="background-color: #fff; color: #e22715 !important; border: 1px solid;">Continuar</button>
              </div>
            </div>
          </div>

          <div style="margin-top: 20px" class="left">
            <a onclick="wizardLogin()" style="color: #868686; font-size: 16px; padding-left: 25px; cursor: pointer">
              Ya tengo una cuenta
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  `
  $(document).ready(function () {
    $('select').material_select()
  })
}

function loadWizard04() {
  let html = `
  <div class="max-ancho pagination-centered" style="position:relative;display:block;height:430px; width: 1400px; padding:40px 0px 0px 0px; align:center">
    <div class="center" style="padding-left: 280px; padding-right: 320px">
      <div class="center panel-wizard" style="width:auto;height: 350px; background-color: rgba(255, 2555, 255, 0.7);margin-left:30px; padding-top:40px">
        <div class="container" style="width:680px; margin: 0px 40px 20px 40px;">
          <div class="row">
            <div class="col-md-6">
              <div class="left">
                <a style="color: #868686; cursor: pointer;" onclick="loadWizard03()">Volver</a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="right">
                <a style="color: #868686; cursor: pointer;" onclick="loadWizard01()">Salir</a>
              </div>
            </div>
          </div>
          <h5 class="banner" style="font-size: 20px;color:#e22715; padding-left: 2px; padding-top: 12px"> <b>Vamos a configurar tu perfil, solo tomará unos segundos.</b> </h5>

          <div class="row" style="padding-left: 25px; padding-right: 25px">
            <div class="input-field col s12">
              <input onkeyup="typeName()" id="name" type="text" class="validate">
                <label for="name">Nombre</label>
              </div>
            </div>
            <div class="row" style="padding-left: 25px; padding-right: 25px">
              <div class="input-field col s12">
                <input onkeyup="typeLastName()" id="lastname" type="text" class="validate">
                  <label for="lastname">Apellidos</label>
                </div>
              </div>
              <div class="row" style="padding-top: 20px">
                <div class="col-sm-12">
                  <div>
                    <button id="button03" class="btn btn-block disabled" type="button" name="button" onclick="loadWizard05()" style="background-color: #fff; color: #e22715 !important; border: 1px solid;">Continuar</button>
                  </div>
                </div>
              </div>

              <div style="margin-top: 20px" class="left">
                <a onclick="wizardLogin()" style="color: #868686; font-size: 16px; padding-left: 25px; cursor: pointer">
                  Ya tengo una cuenta
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      `

  document.getElementById('wizardAloDoctor').innerHTML = html
}

function verifyReniec() {
  let json_register = {}

  json_register['type_document_id'] = $('#type_document_id').val()

  json_register['numdoc'] = $('#numdoc').val()

  let dataJson = { dni: json_register['numdoc'] }

  let data = JSON.stringify(dataJson)

  localStorage.setItem('json_register_str', JSON.stringify(json_register))
  $.ajax({
    type: 'POST',
    url: 'http://localhost:8000/api/person/data/reniec',
    // url: 'http://localhost:8000/api/person/data/reniec',
    data: data,
    dataType: 'json',
    contentType: 'application/json; charset=utf-8',
    success: function (response) {
      if (response.success == true) {
        console.log('PATIENT RENIEC', response.result)
        swal({
          title: 'Datos encontrados',
          text: `Bienvenido ${response.result.Nombres} ${response.result.apellidos}`,
          timer: 2000,
          showConfirmButton: false,
        })

        loadWizard04()
      } else {
        swal({
          title: 'Datos no encontrados',
          timer: 2000,
          showConfirmButton: false,
        })
        loadWizard04()
      }
    },
    error: function (error) {
      console.log(error)
    },
  })
}

function loadWizard05() {
  let json_register_str = localStorage.getItem('json_register_str')
  let json_register = JSON.parse(json_register_str)

  json_register['name'] = $('#name').val()
  json_register['last_name'] = $('#lastname').val()
  json_register['user_sinch'] = $('#name').val() + Date.now()
  json_register['password_sinch'] = $('#name').val() + Date.now()
  json_register['role_id'] = 3

  json_register_str = JSON.stringify(json_register)

  localStorage.setItem('json_register_str', json_register_str)

  document.getElementById('wizardAloDoctor').innerHTML = `
  <div class="max-ancho pagination-centered" style="position:relative;display:block;height:430px; width: 1400px; padding:40px 0px 0px 0px; align:center">
    <div class="center" style="padding-left: 280px; padding-right: 320px">
      <div class="center panel-wizard" style="width:auto;height: 350px; background-color: rgba(255, 2555, 255, 0.7);margin-left:30px; padding-top:40px">
        <div class="container" style="width:680px; margin: 0px 40px 20px 40px;">
          <div class="row">
            <div class="col-md-6">
              <div class="left">
                <a style="color: #868686; cursor: pointer;" onclick="loadWizard04()">Volver</a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="right">
                <a style="color: #868686; cursor: pointer;" onclick="loadWizard01()">Salir</a>
              </div>
            </div>
          </div>
          <h5 class="banner" style="font-size: 20px;color:#e22715; padding-left: 2px; padding-top: 12px"> <b>Datos de identificación.</b> </h5>

          <div class="row" style="padding-left: 25px; padding-right: 25px">
            <div class="input-field col s12">
              <input onkeyup="typeEmail()" id="email" type="email">
              <label for="email">Correo electrónico</label>
            </div>
            <div class="left" style="padding-left: 10px;margin-top: -20px">
              <span id="errorEmail" style="font-size: 12px; color: #e22715"></span>
            </div>
          </div>

          <div class="row" style="padding-left: 25px; padding-right: 25px">
            <div class="input-field col s12">
              <input onchange="typeBirthDate()" id="birth_date" type="date">
              <label style="margin-top: -24px; font-size: 12px" for="birth_date">Fecha de nacimiento</label>
            </div>
          </div>

          <div class="row" style="padding-top: 20px">
            <div class="col-sm-12">
              <div>
                <button id="button05" class="btn btn-block disabled" type="button" name="button" onclick="saveDataWizard05()" style="background-color: #fff; color: #e22715 !important; border: 1px solid;">Continuar</button>
              </div>
            </div>
          </div>

          <div style="margin-top: 20px" class="left">
            <a onclick="wizardLogin()" style="color: #868686; font-size: 16px; padding-left: 25px; cursor: pointer">
              Ya tengo una cuenta
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  `
}

function saveDataWizard05() {
  let json_register_str = localStorage.getItem('json_register_str')
  let json_register = JSON.parse(json_register_str)

  json_register['birth_date'] = $('#birth_date')
    .val()
    .replace('-', '/')
    .replace('-', '/')
  json_register['email'] = $('#email').val()
  console.log('BIRTH DATE', json_register['birth_date'])
  localStorage.setItem('json_register_str', JSON.stringify(json_register))
  loadWizard06()
}

function loadWizard06() {
  document.getElementById('wizardAloDoctor').innerHTML = `
  <div class="max-ancho pagination-centered" style="position:relative;display:block;height:430px; width: 1400px; padding:40px 0px 0px 0px; align:center">
    <div class="center" style="padding-left: 280px; padding-right: 320px">
      <div class="center panel-wizard" style="width:auto;height: 350px; background-color: rgba(255, 2555, 255, 0.7);margin-left:30px; padding-top:40px">
        <div class="container" style="width:680px; margin: 0px 40px 20px 40px;">
          <div class="row">
            <div class="col-md-6">
              <div class="left">
                <a style="color: #868686; cursor: pointer;" onclick="loadWizard05()">Volver</a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="right">
                <a style="color: #868686; cursor: pointer;" onclick="loadWizard01()">Salir</a>
              </div>
            </div>
          </div>
          <h5 class="banner" style="font-size: 20px;color:#e22715; padding-left: 2px; padding-top: 12px"> <b>Necesitamos una contraseña para mantener tus datos seguros.</b> </h5>

          <div class="row" style="padding-left: 25px; padding-right: 25px">
            <div class="input-field col s12">
              <input onkeyup="typeTel()" id="tel" type="tel">
              <label for="tel">Celular</label>
            </div>
            <div class="left" style="padding-left: 10px;margin-top: -20px">
              <span id="errorTel" style="font-size: 12px; color: #e22715"></span>
            </div>
          </div>

          <div class="row" style="padding-left: 25px; padding-right: 25px">
            <div class="row">
              <div class="left">
                <p style="color: #252323;">Género</p> <br/>
              </div>
            </div>
            <div class="row">
              <div class="left">
                <p style="display: inline">
                  <input class="with-gap" name="group1" type="radio" value="1" id="gender" checked />
                  <label for="masculino">Masculino</label>
                </p>
                <p style="display: inline">
                  <input class="with-gap" name="group1" type="radio" id="gender" value="2" />
                  <label for="femenino">Femenino</label>
                </p>            
              </div>
            </div>
            
          </div>

          <div class="row" style="padding-top: 20px">
            <div class="col-sm-12">
              <div>
                <button id="button06" class="btn btn-block disabled" type="button" name="button" onclick="saveWizard06()" style="background-color: #fff; color: #e22715 !important; border: 1px solid;">Continuar</button>
              </div>
            </div>
          </div>

          <div style="margin-top: 20px" class="left">
            <a onclick="wizardLogin()" style="color: #868686; font-size: 16px; padding-left: 25px; cursor: pointer">
              Ya tengo una cuenta
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  `
}

function saveWizard06() {
  let json_register_str = localStorage.getItem('json_register_str')
  let json_register = JSON.parse(json_register_str)

  json_register['tel'] = $('#tel').val()
  json_register['gender'] = $('#gender').val()

  localStorage.setItem('json_register_str', JSON.stringify(json_register))
  loadWizard07()
}
function loadWizard07() {
  document.getElementById('wizardAloDoctor').innerHTML = `
  <div class="max-ancho pagination-centered" style="position:relative;display:block;height:430px; width: 1400px; padding:40px 0px 0px 0px; align:center">
    <div class="center" style="padding-left: 280px; padding-right: 320px">
      <div class="center panel-wizard" style="width:auto;height: 350px; background-color: rgba(255, 2555, 255, 0.7);margin-left:30px; padding-top:40px">
        <div class="container" style="width:680px; margin: 0px 40px 20px 40px;">
          <div class="row">
            <div class="col-md-6">
              <div class="left">
                <a style="color: #868686; cursor: pointer;" onclick="loadWizard06()">Volver</a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="right">
                <a style="color: #868686; cursor: pointer;" onclick="loadWizard01()">Salir</a>
              </div>
            </div>
          </div>
          <h5 class="banner" style="font-size: 20px;color:#e22715; padding-left: 2px; padding-top: 12px"> <b>Necesitamos una contraseña para mantener tus datos seguros.</b> </h5>

          <div class="row" style="padding-left: 25px; padding-right: 25px">
            <div class="input-field col s12">
              <input onkeyup="typePassword()" id="password" type="password" class="validate">
              <label for="password"">Contraseña</label>
              <span id="iconPassNoVisible" onclick="showPassword()" class="glyphicon icon-visibility glyphicon-eye-close" style="display: block; position: absolute;margin-top: 12px;margin-left:610px; cursor: pointer;"><i class=""></i></span>
              <span id="iconPassVisible" onclick="showPassword()" class="glyphicon glyphicon-eye-open icon-visibility" style="display: none; position: absolute;margin-top: 12px;margin-left:610px; cursor: pointer;"><i class=""></i></span>

            </div>
            <div class="left" style="padding-left: 10px;margin-top: -20px">
              <span id="errorPass" style="font-size: 12px; color: #e22715"></span>
            </div>
          </div>
          <div class="row" style="padding-left: 25px; padding-right: 25px">
            <div class="input-field col s12">
              <input onkeyup="typePasswordRep()" id="password-rep" type="password" class="validate">
              <label for="password-rep">Repetir Contraseña</label>
              <span id="iconPassRepNoVisible" onclick="showPasswordRep()" class="glyphicon icon-visibility glyphicon-eye-close"  style="display: block;position: absolute;margin-top: 12px;margin-left:610px; cursor: pointer;"><i class=""></i></span>
              <span id="iconPassRepVisible" onclick="showPasswordRep()" class="glyphicon glyphicon-eye-open icon-visibility"  style="display: none;position: absolute;margin-top: 12px;margin-left:610px; cursor: pointer;"><i class=""></i></span>

            </div>
            <div class="left" style="padding-left: 10px;margin-top: -20px">
              <span id="errorPassRep" style="font-size: 12px; color: #e22715"></span>
            </div>
          </div>
          <div class="row" style="padding-top: 20px">
            <div class="col-sm-12">
              <div>
                <button id="button07" class="btn btn-block disabled" type="button" name="button" onclick="loadWizard08()" style="background-color: #fff; color: #e22715 !important; border: 1px solid;">Continuar</button>
              </div>
            </div>
          </div>

          <div style="margin-top: 20px" class="left">
            <a onclick="wizardLogin()" style="color: #868686; font-size: 16px; padding-left: 25px; cursor: pointer">
              Ya tengo una cuenta
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  `
}

function loadWizard08() {
  let json_register_str = localStorage.getItem('json_register_str')
  let json_register = JSON.parse(json_register_str)

  json_register['password'] = $('#password').val()

  localStorage.setItem('json_register_str', JSON.stringify(json_register))
  document.getElementById('wizardAloDoctor').innerHTML = `
  <div class="max-ancho pagination-centered" style="position:relative;display:block;height:430px; width: 1400px; padding:40px 0px 0px 0px; align:center">
    <div class="center" style="padding-left: 280px; padding-right: 320px">
      <div class="center panel-wizard" style="width:auto;height: 350px; background-color: rgba(255, 2555, 255, 0.7);margin-left:30px; padding-top:40px">
        <div class="container" style="width:680px; margin: 0px 40px 20px 40px;">
          <div class="row">
            <div class="col-md-6">
              <div class="left">
                <a style="color: #868686; cursor: pointer;" onclick="loadWizard07()">Volver</a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="right">
                <a style="color: #868686; cursor: pointer;" onclick="loadWizard01()">Salir</a>
              </div>
            </div>
          </div>
          <h5 class="banner" style="font-size: 20px;color:#e22715; padding-left: 2px; padding-top: 12px"> <b>Solo un paso más.</b> </h5>
          <div class="row">
            <div class="col-md-12">
              <p class="left">
                <input id="checkTerms" onchange="checkTerms()" type="checkbox" class="filled-in" value="0"/>
                <label for="checkTerms" style="font-size: 14px">Acepto los términos y condiciones</label>
              </p>
              <br>
              <p class="left">
                Al continuar, usted reconoce que ha leído y acepta los <a href="https://www.alo.doctor/web/home/dist/terminos-condiciones" target="_blank" style="color: #868686; font-size: 14px;">Términos y condiciones.</a>
              </p>
              <br>
              <p class="left">
                El uso del servicio de Babylon está sujeto a la <a href="https://www.alo.doctor/web/home/dist/terminos-condiciones" target="_blank" style="color: #868686; font-size: 14px;">Política de Privacidad.</a>
              </p>
            </div>
          </div>
          <div class="row" style="padding-top: 20px">
            <div class="col-sm-12">
              <div>
                <button id="button08" class="btn btn-block disabled" type="button" name="button" onclick="FinalizarRegistro()" style="background-color: #fff; color: #e22715 !important; border: 1px solid;">Finalizar</button>
              </div>
            </div>
          </div>

          <div style="margin-top: 20px" class="left">
            <a onclick="wizardLogin()" style="color: #868686; font-size: 16px; padding-left: 25px; cursor: pointer">
              Ya tengo una cuenta
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  `
}

function FinalizarRegistro() {
  json_register_str = localStorage.getItem('json_register_str')
  json_register = JSON.parse(json_register_str)

  $.ajax({
    type: 'POST',
    url: 'http://localhost:8000/api/register',
    // url: 'http://localhost:8000/api/register',
    data: json_register_str,
    dataType: 'json',
    contentType: 'application/json; charset=utf-8',
    success: function (response) {
      if (response.estado == true) {
        let json_to_login = {
          email: json_register.email,
          password: json_register.password,
        }
        swal({
          title: 'Registro exitoso',
          text: 'Bienvenido al asistente de Alo Doctor.',
          timer: 2000,
          showConfirmButton: false,
        })
        let data = JSON.stringify(json_to_login)
        $.ajax({
          type: 'POST',
          url: 'http://localhost:8000/api/login',
          // url: 'http://localhost:8000/api/login',
          data: data,
          dataType: 'json',
          contentType: 'application/json; charset=utf-8',
          success: function (response) {
            if (response.estado == true) {
              localStorage.setItem(
                'identity',
                JSON.stringify(response.data.original[0]),
              )
              loadWizard02()
            } else {
              swal({
                title: 'Registro incorrecto',
                timer: 2000,
                showConfirmButton: false,
              })
            }
          },
          error: function (error) {
            console.log(error)
          },
        })
      } else {
        alert('Error en el registro')
      }
    },
    error: function (error) {
      alert('Error en el registro')
    },
  })
}

function bot01() {
  let json_register_str = localStorage.getItem('json_register_str')
  let json_register = JSON.parse(json_register_str)
  let jsonStr = localStorage.getItem('identity')
  let json = JSON.parse(jsonStr)

  document.getElementById('wizardAloDoctor').innerHTML = `
  <div class="max-ancho pagination-centered" style="position:relative;display:block;height:430px; width: 1400px; padding:40px 0px 0px 0px; align:center">
    <div class="center" style="padding-left: 280px; padding-right: 280px">
      <div class="center panel-wizard" style="width:auto;height: 350px; background-color: rgba(255, 2555, 255, 0.7);margin-left:30px; padding:50px">
        <div class="container" style="width:auto;">
          <div class="row">
            <div class="col-md-6">
              <div class="left">
                <a style="color: #868686; cursor: pointer;" onclick="loadWizard02()">Volver</a>
              </div>
            
            </div>
            <div class="col-md-6">
              <div class="right">
                <a style="color: #868686; cursor: pointer;" onclick="loadWizard01()">Salir</a>
              </div>
            </div>
          </div>
          <h5 class="center" style="font-size: 20px;color:#e22715; padding-left: 2px; padding-top: 12px;">
            <b>
              Funciones Vitales Principales.
            </b>
          </h5>
          <div class="row">
            
            <div class="input-field col s12">
              <input id="peso" type="number">
              <label for="peso">PESO</label>
            </div>
            
            <div class="input-field col s12">
              <input id="talla" type="number">
              <label for="talla">TALLA</label>
            </div>

          </div>
          <div class="row" style="padding-top: 20px">
            <div class="col-sm-12">
              <div>
                <button id="button07" class="btn btn-block" type="button" name="button" onclick="saveTriaje01()" style="background-color: #fff; color: #e22715 !important; border: 1px solid;">CONTINUAR</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  `
}

function saveTriaje01() {
  let peso = $('#peso').val()
  let talla = $('#talla').val()

  let triaje = {
    peso: peso,
    talla: talla,
  }

  let triaje_str = JSON.stringify(triaje)

  localStorage.setItem('triaje_wizard', triaje_str)
  bot02()
}

function bot02() {
  let query = localStorage.getItem('query')
  document.getElementById('wizardAloDoctor').innerHTML = `
  <div class="max-ancho pagination-centered" style="position:relative;display:block;height:430px; width: 1400px; padding:40px 0px 0px 0px; align:center">
    <div class="center" style="padding-left: 280px; padding-right: 280px">
      <div class="center panel-wizard" style="width:auto;height: 350px; background-color: rgba(255, 2555, 255, 0.7);margin-left:30px; padding:50px">
        <div class="container" style="width:auto;">
          <div class="row">
            <div class="col-md-6">
              <div class="left">
                <a style="color: #868686; cursor: pointer;" onclick="bot01()">Volver</a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="right">
                <a style="color: #868686; cursor: pointer;" onclick="loadWizard01()">Salir</a>
              </div>
            </div>
          </div>
          <h5 class="banner" style="font-size: 20px;color:#e22715; padding-left: 2px; padding-top: 12px">
            <b>
              Funciones Vitales Opcionales I.
            </b>
          </h5>
          <div class="row">
              
            <div class="input-field col s12">
              <input id="temperatura" type="number">
              <label for="temperatura">TEMPERATURA</label>
            </div>
          
            <div class="input-field col s12">
              <input id="presion_arterial" type="number">
              <label for="presion_arterial">PRESION ARTERIAL</label>
            </div>
              
          </div>
          <div class="row" style="padding-top: 20px">
            <div class="col-sm-12">
              <div>
                <button id="button07" class="btn btn-block" type="button" name="button" onclick="saveTriaje02()" style="background-color: #fff; color: #e22715 !important; border: 1px solid;">CONTINUAR</button>
              </div>
            </div>

          </div>


        </div>
      </div>
    </div>
  </div>
  `
}

function saveTriaje02() {
  let local_triaje = localStorage.getItem('triaje_wizard')
  let local_triaje_json = JSON.parse(local_triaje)

  let temperatura = $('#temperatura').val()
  let presion_arterial = $('#presion_arterial').val()

  local_triaje_json['termperatura'] = temperatura
  local_triaje_json['presion_arterial'] = presion_arterial

  let triaje_str = JSON.stringify(local_triaje_json)

  localStorage.setItem('triaje_wizard', triaje_str)
  bot03()
}

function bot03() {
  document.getElementById('wizardAloDoctor').innerHTML = `
  <div class="max-ancho pagination-centered" style="position:relative;display:block;height:430px; width: 1400px; padding:40px 0px 0px 0px; align:center">
    <div class="center" style="padding-left: 280px; padding-right: 280px">
      <div class="center panel-wizard" style="width:auto;height: 350px; background-color: rgba(255, 2555, 255, 0.7);margin-left:30px; padding:50px">
        <div class="container" style="width:auto;">
          <div class="row">
            <div class="col-md-6">
              <div class="left">
                <a style="color: #868686; cursor: pointer;" onclick="bot02()">Volver</a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="right">
                <a style="color: #868686; cursor: pointer;" onclick="loadWizard01()">Salir</a>
              </div>
            </div>
          </div>
          <h5 class="banner" style="font-size: 20px;color:#e22715; padding-left: 2px; padding-top: 12px">
            <b>
            Funciones Vitales Opcionales II.
            </b>
          </h5>
          <div class="row">
            <div class="input-field col s12">
              <input id="frecuencia_cardiaca" type="number">
              <label for="frecuencia_cardiaca">FRECUENCIA CARDIACA</label>
            </div>
          
            <div class="input-field col s12">
              <input id="frecuencia_respiratoria" type="number">
              <label for="frecuencia_respiratoria">FRECUENCIA RESPIRATORIA</label>
            </div>
          </div>
          <div class="row" style="padding-top: 20px">
            <div class="col-sm-12">
              <div>
                <button id="buttonBot03" class="btn btn-block" type="button" name="button" onclick="saveTriaje03()" style="background-color: #fff; color: #e22715 !important; border: 1px solid;">Continuar</button>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  `
}

function saveTriaje03() {
  let local_triaje = localStorage.getItem('triaje_wizard')
  let local_triaje_json = JSON.parse(local_triaje)

  let frecuencia_cardiaca = $('#frecuencia_cardiaca').val()
  let frecuencia_respiratoria = $('#frecuencia_respiratoria').val()

  local_triaje_json['frecuencia_cardiaca'] = frecuencia_cardiaca
  local_triaje_json['frecuencia_respiratoria'] = frecuencia_respiratoria

  let triaje_str = JSON.stringify(local_triaje_json)

  localStorage.setItem('triaje_wizard', triaje_str)
  bot04()
}

function bot04() {
  document.getElementById('wizardAloDoctor').innerHTML = `
  <div class="max-ancho pagination-centered" style="position:relative;display:block;height:430px; width: 1400px; padding:40px 0px 0px 0px; align:center">
    <div class="center" style="padding-left: 280px; padding-right: 280px">
      <div class="center panel-wizard" style="width:auto;height: 350px; background-color: rgba(255, 2555, 255, 0.7);margin-left:30px; padding:50px">
        <div class="container" style="width:auto;">
          <div class="row">
            <div class="col-md-6">
              <div class="left">
                <a style="color: #868686; cursor: pointer;" onclick="bot03()">Volver</a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="right">
                <a style="color: #868686; cursor: pointer;" onclick="loadWizard01()">Salir</a>
              </div>
            </div>
          </div>
          <h5 class="banner" style="font-size: 20px;color:#e22715; padding-left: 2px; padding-top: 12px">
            <b>
              El dolor que siente. ¿Es soportable?.
            </b>
          </h5>
          <br>
          <br>
          <div class="row">
            <div class="col-sm-12">
              <div>
                <button class="btn btn-block" type="button" name="button" onclick="botGoToPanel()" style="background-color: #fff; color: #e22715 !important; border: 1px solid;">si</button>
              </div>
            </div>
            <div class="col-sm-12" style="padding-top: 10px">
              <div>
                <button class="btn btn-block" type="button" name="button" onclick="botInfoEmergency()" style="background-color: #e22715">No</button>
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>
  </div>
  `
}

function botGoToPanel() {
  let query = localStorage.getItem('query')
  document.getElementById('wizardAloDoctor').innerHTML = `
  <div class="max-ancho pagination-centered" style="position:relative;display:block;height:430px; width: 1400px; padding:60px 0px 0px 0px; align:center">
    <div class="center" style="padding-left: 280px; padding-right: 320px">
      <div class="center panel-wizard" style="width:auto;height: 300px; background-color: rgba(255, 2555, 255, 0.7);margin-left:30px; padding-top:30px">
        <div class="container" style="width:680px; margin: 0px 40px 20px 40px;">
          <div class="row">
            <div class="col-md-6">
              <div class="left">
                <a style="color: #868686; cursor: pointer;" onclick="bot04()">Volver</a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="right">
                <a style="color: #868686; cursor: pointer;" onclick="loadWizard01()">Salir</a>
              </div>
            </div>
          </div>
          <h5 class="banner" style="font-size: 20px;color:#e22715; padding-left: 2px; padding-top: 12px">
            <b>
              Ingresa a su panel del paciente.
            </b>
          </h5>
          <div class="row">
            <div class="col-md-12">
              <div class="row" style="padding-left: 10px;">
                <p class="left">
                  Ingrese a su panel de paciente en donde podra realizar una videollamada con un doctor especialista en resolver su malestar.
                </p>
              </div>
            </div>
          </div>
          <div class="row" style="padding-top: 20px">
            <div class="col-sm-12">
              <div>
                <a class="btn btn-block" style="background-color: #fff; color: #e22715 !important; border: 1px solid;; cursor: pointer" onclick="goToPanelPaciente()">
                  Ingresar al panel
                </a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  `
}

function botInfoEmergency() {
  let query = localStorage.getItem('query')
  document.getElementById('wizardAloDoctor').innerHTML = `
  <div class="max-ancho pagination-centered" style="position:relative;display:block;height:430px; width: 1400px; padding:115px 0px 0px 0px; align:center">
    <div class="center" style="padding-left: 280px; padding-right: 320px">
      <div class="center panel-wizard" style="width:auto;height: 200px; background-color: rgba(255, 2555, 255, 0.7);margin-left:30px; padding-top:30px">
        <div class="container" style="width:680px; margin: 0px 40px 20px 40px;">
          <div class="row">
            <div class="col-md-6">
              <div class="left">
                <a style="color: #868686; cursor: pointer;" onclick="bot04()">Volver</a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="right">
                <a style="color: #868686; cursor: pointer;" onclick="loadWizard01()">Salir</a>
              </div>
            </div>
          </div>
          <h5 class="banner" style="font-size: 20px;color:#e22715; padding-left: 2px; padding-top: 12px">
            <b>
              El síntoma que usted posee es crítico, acuda a un establecimiento de salud cercano.
            </b>
          </h5>
          <div class="row">
            <div class="col-md-12" style="padding-left: 0px">
              <div class="row" style="padding-left: 10px;">
                <p class="left">
                  Acuda a un centro de salud cercano para atender su malestar.
                </p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  `
}

function wizardLogin() {
  document.getElementById('wizardAloDoctor').innerHTML = `
  <div class="max-ancho pagination-centered" style="position:relative;display:block;height:430px; width: 1400px; padding:40px 0px 0px 0px; align:center">
    <div class="center" style="padding-left: 280px; padding-right: 320px">
      <div class="center panel-wizard" style="width:auto;height: 350px; background-color: rgba(255, 2555, 255, 0.7);margin-left:30px; padding-top:40px">
        <div class="container" style="width:680px; margin: 0px 40px 20px 40px;">
          <div class="row">
            <div class="col-md-6">
              <div class="left">
                <a style="color: #868686; cursor: pointer;" onclick="loadWizard02()">Volver</a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="right">
                <a style="color: #868686; cursor: pointer;" onclick="loadWizard01()">Salir</a>
              </div>
            </div>
          </div>
          <h5 class="banner" style="font-size: 20px;color:#e22715; padding-left: 2px; padding-top: 12px"> <b>Iniciar Sesión.</b> </h5>

            <div class="row" style="padding-left: 25px; padding-right: 25px">
              <div class="input-field col s12">
                <input onkeyup="typeEmailLogin()" name="email" id="emailLogin" type="text">
                  <label for="emailLogin">Correo electrónico</label>
                </div>
                <div class="left" style="padding-left: 10px;margin-top: -20px">
                  <span id="errorEmailLogin" style="font-size: 12px; color: #e22715"></span>
                </div>
              </div>
              <div class="row" style="padding-left: 25px; padding-right: 25px">
                <div class="input-field col s12">
                  <input onkeyup="typePassLogin()" name="password" id="passLogin" type="password">
                    <label for="passLogin">Contraseña</label>
                    <span id="iconPassNoVisibleLogin" onclick="showPasswordLogin()" class="glyphicon icon-visibility glyphicon-eye-close" style="display: block; position: absolute;margin-top: 12px;margin-left:610px; cursor: pointer;"><i class=""></i></span>
                    <span id="iconPassVisibleLogin" onclick="showPasswordLogin()" class="glyphicon glyphicon-eye-open icon-visibility" style="display: none; position: absolute;margin-top: 12px;margin-left:610px; cursor: pointer;"><i class=""></i></span>
                  </div>
                </div>
                <div class="row" style="padding-top: 20px">
                  <div class="col-sm-12">
                    <div>
                      <button id="buttonLogin" class="btn btn-block disabled" type="button" name="button" onclick="login()" style="background-color: #fff; color: #e22715 !important; border: 1px solid;">Iniciar sesión</button>
                    </div>
                  </div>
                </div>

          <div style="margin-top: 20px" class="left">
          </div>
        </div>
      </div>
    </div>
  </div>
  `
}

function typeQuery() {
  if ($('#query').val() == '') {
    $('#button01').addClass('disabled')
  } else {
    $('#button01').removeClass('disabled')
  }
}

function typeQueryIntermediate() {
  if ($('#queryIntermediate').val() == '') {
    $('#buttonIntermediate01').addClass('disabled')
  } else {
    $('#buttonIntermediate01').removeClass('disabled')
  }
}

function typeName() {
  if ($('#name').val() == '' || $('#lastname').val() == '') {
    $('#button03').addClass('disabled')
  } else {
    $('#button03').removeClass('disabled')
  }
}

function typeLastName() {
  if ($('#name').val() == '' || $('#lastname').val() == '') {
    $('#button03').addClass('disabled')
  } else {
    $('#button03').removeClass('disabled')
  }
}

function selectTypeDocument() {
  if ($('#type_document_id').val() == null || $('#numdoc').val() == '') {
    $('#button04').addClass('disabled')
  } else {
    if ($('#type_document_id').val() == 1) {
      if ($('#numdoc').val().length != 8) {
        $('#errorNumDoc').text('DNI 8 digitos')
      } else {
        $('#errorNumDoc').text('')
        $('#button04').removeClass('disabled')
      }
    } else {
      if ($('#numdoc').val().length != 12) {
        $('#errorNumDoc').text('Carnet 12 digitos')
      } else {
        $('#errorNumDoc').text('')
        $('#button04').removeClass('disabled')
      }
    }
  }
}

function typeNumDoc() {
  if ($('#type_document_id').val() == null || $('#numdoc').val() == '') {
    $('#button04').addClass('disabled')
  } else {
    if ($('#type_document_id').val() == 1) {
      if ($('#numdoc').val().length != 8) {
        $('#errorNumDoc').text('DNI 8 digitos')
      } else {
        $('#errorNumDoc').text('')
        $('#button04').removeClass('disabled')
      }
    } else {
      if ($('#numdoc').val().length != 12) {
        $('#errorNumDoc').text('Carnet 12 digitos')
      } else {
        $('#errorNumDoc').text('')
        $('#button04').removeClass('disabled')
      }
    }
  }
}

function typeEmail() {
  if ($('#email').val() == null || $('#birth_date').val() == '') {
    $('#button05').addClass('disabled')
  } else {
    let expreg = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/

    if (expreg.test($('#email').val())) {
      console.log('valido')
      $('#button05').removeClass('disabled')
      $('#errorEmail').text('')
    } else {
      console.log('no valido')

      $('#errorEmail').text('Email incorrecto')
      $('#button05').addClass('disabled')
    }
  }
}

function typeTel() {
  let tel = $('#tel').val()
  if (tel == '' || tel == null || tel == undefined) {
    $('#button05').addClass('disabled')
  } else {
    $('#button06').removeClass('disabled')
  }
}

function typeBirthDate() {
  if ($('#email').val() == null || $('#birth_date').val() == '') {
    $('#button05').addClass('disabled')
  } else {
    let expreg = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/
    console.log(expreg.test($('#email').val()))

    if (expreg.test($('#email').val())) {
      console.log('valido')
      $('#button05').removeClass('disabled')
      $('#errorEmail').text('')
    } else {
      console.log('no valido')

      $('#errorEmail').text('Email incorrecto')
      $('#button05').addClass('disabled')
    }
  }
}

function typePassword() {
  let expreg = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[.$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}/

  if ($('#password').val() == '' || $('#password-rep').val() == '') {
    $('#button07').addClass('disabled')
  } else {
    if ($('#password').val() != $('#password-rep').val()) {
      $('#errorPassRep').text('No coinciden')
      $('#button07').addClass('disabled')
    } else {
      $('#errorPassRep').text('')
      if (expreg.test($('#password').val())) {
        $('#errorPass').text('')
        $('#button07').removeClass('disabled')
      } else {
        $('#errorPass').text(
          '8 caracteres, 1 mayúscula, 1 carácter no alfanumérico',
        )
        $('#button07').addClass('disabled')
      }
    }
  }
}

function typePasswordRep() {
  let expreg = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[.$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}/

  if ($('#password').val() == '' || $('#password-rep').val() == '') {
    $('#button07').addClass('disabled')
  } else {
    if ($('#password').val() != $('#password-rep').val()) {
      $('#errorPassRep').text('No coinciden')
      $('#button07').addClass('disabled')
    } else {
      $('#errorPassRep').text('')
      if (expreg.test($('#password').val())) {
        $('#errorPass').text('')
        $('#button07').removeClass('disabled')
      } else {
        $('#errorPass').text(
          '8 caracteres, 1 mayúscula, 1 carácter no alfanumérico',
        )
        $('#button07').addClass('disabled')
      }
    }
  }
}

function showPassword() {
  let x = document.getElementById('password')
  if (x.type === 'password') {
    x.type = 'text'
    document.getElementById('iconPassNoVisible').style.display = 'none'
    document.getElementById('iconPassVisible').style.display = 'block'
  } else {
    x.type = 'password'
    document.getElementById('iconPassNoVisible').style.display = 'block'
    document.getElementById('iconPassVisible').style.display = 'none'
  }
}

function showPasswordRep() {
  let x = document.getElementById('password-rep')
  if (x.type === 'password') {
    x.type = 'text'
    document.getElementById('iconPassRepNoVisible').style.display = 'none'
    document.getElementById('iconPassRepVisible').style.display = 'block'
  } else {
    x.type = 'password'
    document.getElementById('iconPassRepNoVisible').style.display = 'block'
    document.getElementById('iconPassRepVisible').style.display = 'none'
  }
}

function checkTerms() {
  if ($('#checkTerms').val() == 0) {
    $('#checkTerms').val(1)
    $('#button08').removeClass('disabled')
  } else {
    $('#checkTerms').val(0)
    $('#button08').addClass('disabled')
  }
}

function option01Bot03() {
  if ($('#bot03Option01').val() == 0) {
    $('#bot03Option01').val(1)
  } else {
    $('#bot03Option01').val(0)
  }
  if (
    $('#bot03Option01').val() != 0 ||
    $('#bot03Option02').val() != 0 ||
    $('#bot03Option03').val() != 0 ||
    $('#bot03Option04').val() != 0
  ) {
    $('#buttonBot03').removeClass('disabled')
  } else {
    $('#buttonBot03').addClass('disabled')
  }
}

function option02Bot03() {
  if ($('#bot03Option02').val() == 0) {
    $('#bot03Option02').val(1)
  } else {
    $('#bot03Option02').val(0)
  }
  if (
    $('#bot03Option01').val() != 0 ||
    $('#bot03Option02').val() != 0 ||
    $('#bot03Option03').val() != 0 ||
    $('#bot03Option04').val() != 0
  ) {
    $('#buttonBot03').removeClass('disabled')
  } else {
    $('#buttonBot03').addClass('disabled')
  }
}

function option03Bot03() {
  if ($('#bot03Option03').val() == 0) {
    $('#bot03Option03').val(1)
  } else {
    $('#bot03Option03').val(0)
  }
  if (
    $('#bot03Option01').val() != 0 ||
    $('#bot03Option02').val() != 0 ||
    $('#bot03Option03').val() != 0 ||
    $('#bot03Option04').val() != 0
  ) {
    $('#buttonBot03').removeClass('disabled')
  } else {
    $('#buttonBot03').addClass('disabled')
  }
}

function option04Bot03() {
  if ($('#bot03Option04').val() == 0) {
    $('#bot03Option04').val(1)
  } else {
    $('#bot03Option04').val(0)
  }
  if (
    $('#bot03Option01').val() != 0 ||
    $('#bot03Option02').val() != 0 ||
    $('#bot03Option03').val() != 0 ||
    $('#bot03Option04').val() != 0
  ) {
    $('#buttonBot03').removeClass('disabled')
  } else {
    $('#buttonBot03').addClass('disabled')
  }
}

function typeEmailLogin() {
  if ($('#emailLogin').val() == '' || $('#passLogin').val() == '') {
    $('#buttonLogin').addClass('disabled')
  } else {
    let expreg = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/

    if (expreg.test($('#emailLogin').val())) {
      console.log('valido')
      $('#buttonLogin').removeClass('disabled')
      $('#errorEmailLogin').text('')
    } else {
      console.log('no valido')
      $('#errorEmailLogin').text('Email incorrecto')
      $('#buttonLogin').addClass('disabled')
    }
  }
}

function typePassLogin() {
  if ($('#emailLogin').val() == '' || $('#passLogin').val() == '') {
    $('#buttonLogin').addClass('disabled')
  } else {
    let expreg = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/

    if (expreg.test($('#emailLogin').val())) {
      console.log('valido')
      $('#buttonLogin').removeClass('disabled')
      $('#errorEmailLogin').text('')
    } else {
      console.log('no valido')
      $('#errorEmailLogin').text('Email incorrecto')
      $('#buttonLogin').addClass('disabled')
    }
  }
}

function showPasswordLogin() {
  let x = document.getElementById('passLogin')
  if (x.type === 'password') {
    x.type = 'text'
    document.getElementById('iconPassNoVisibleLogin').style.display = 'none'
    document.getElementById('iconPassVisibleLogin').style.display = 'block'
  } else {
    x.type = 'password'
    document.getElementById('iconPassNoVisibleLogin').style.display = 'block'
    document.getElementById('iconPassVisibleLogin').style.display = 'none'
  }
}

function login() {
  let json_to_login = {
    email: $('#emailLogin').val(),
    password: $('#passLogin').val(),
  }

  let data = JSON.stringify(json_to_login)

  $.ajax({
    type: 'POST',
    url: 'https://localhost:8000/api/login',
    // url: 'http://localhost:8000/api/login',
    data: data,
    dataType: 'json',
    contentType: 'application/json; charset=utf-8',
    success: function (response) {
      if (response.estado == true) {
        bot01()
        swal({
          title: 'Login exitoso',
          text: 'Bienvenido al aistente de Alo Doctor.',
          timer: 2000,
          showConfirmButton: false,
        })
        localStorage.setItem(
          'identity',
          JSON.stringify(response.data.original[0]),
        )
        loadWizard02()
      } else {
        swal({
          title: 'correo o contraseña incorrecta',
          timer: 2000,
          showConfirmButton: false,
        })
      }
    },
    error: function (error) {
      swal({
        title: 'correo o contraseña incorrect',
        // text: "Gracias Por suscribirte.",
        timer: 2000,
        showConfirmButton: false,
      })
    },
  })
}

function goToPanelPaciente() {
  let identity = localStorage.getItem('identity')
  if (identity == null || identity == '') {
    swal({
      title: 'Por favor inicie sesion',
      // text: "Gracias Por suscribirte.",
      timer: 2000,
      showConfirmButton: false,
    })
  } else {
    location.href = 'https://www.alo.doctor/web/paciente/dist/triaje-paso-1'
  }
}
