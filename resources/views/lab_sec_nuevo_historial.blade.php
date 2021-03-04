@extends('layouts.material-lab-sec')
@section('content')
<div id="sec_nuevo_historial" class="section-content">
  <ul id="tabs-swipe-demo" class="tabs account-header">
    <li class="tab col s4" onclick="datosPer()"><a class="active" href="#datosPersonalesHM"><b>Datos Personales</b></a></li>
    <li class="tab col s4" onclick="datosMed()"><a class="" href="#datosMedicosHM"><b>Datos Medicos</b></a></li>
    <li class="tab col s4" onclick="antecedentes()"><a class="" href="#antecedentesHM"><b>Antecedentes</b></a></li>
  </ul>
  <div id="datosPersonalesHM">
    <div class="row background-white" style="padding-top: 20px;">
      <div class="row" style="padding-left:25px;padding-right:25px">
        <div class="row" style=" background-color: #f5f5f5 !important">
          <ul class="collapsible" data-collapsible="accordion" style="margin-top: 0px; background-color: #f5f5f5 !important">
            <li style="background-color: #f5f5f5 !important">
              <div onclick="changeIcon('dp')" class="collapsible-header row" style="background-color: #f5f5f5 !important">
                  <div class="col s6" style="padding-left: 0px;">
                    <div class="left">
                      1. Datos Personales
                    </div>
                  </div>
                  <div id="dp" class="col s6" style="padding-right: 0px;">
                    <a href="#" class="right" style="color: #000000">
                      <i class="material-icons" style="font-size: 18px; color: #9f9f9f">add</i>
                    </a>
                  </div>
                  <div id="dpN" class="col s6" style="padding-right: 0px; display: none">
                    <a href="#" class="right" style="color: #000000">
                      <i class="material-icons" style="font-size: 18px; color: #9f9f9f">remove</i>
                    </a>
                  </div>
              </div>
              <div class="collapsible-body" style="background-color: white">
                <div class="row">
                  <!-- tipo de documento -->
                  <div class="col s6 input-field">
                    <select name="tipoDocumento" id="tipoDocumento">
                      <option value="" disabled selected>Seleccione una Opción</option>
                      <option value="1">DNI</option>
                      <option value="2">Partida de nacimiento</option>
                    </select>
                    <label>Tipo de documento</label>
                  </div>
                  <!-- Nro de documento -->

                  <div class="input-field col s6">
                    <input id="nroDocumento" name="nroDocumento" type="text" class="validate">
                    <label for="nroDocumento" data-error="wrong" data-success="right">Nro de documento</label>
                  </div>
                </div>
                <div class="row">
                  <!-- Apellido paterno -->
                  <div class="input-field col s4">
                    <input id="apePaterno" name="apePaterno" type="text" class="validate">
                    <label for="apePaterno" data-error="wrong" data-success="right">Apellido Paterno</label>
                  </div>

                  <!-- Apellido materno -->
                  <div class="input-field col s4">
                    <input id="apeMaterno" name="apeMaterno" type="text" class="validate">
                    <label for="apeMaterno" data-error="wrong" data-success="right">Apellido Materno</label>
                  </div>
                  <!-- Nombres -->
                  <div class="input-field col s4">
                    <input id="nombres" name="nombres" type="text" class="validate">
                    <label for="nombres" data-error="wrong" data-success="right">Nombres</label>
                  </div>
                </div>

                <div class="row">
                  <!-- Sexo -->
                  <div class="col s4 input-field">
                    <select id="genero" name="genero">
                      <option value="" disabled selected>Seleccione una Opción</option>
                      <option value="1">Masculino</option>
                      <option value="2">Femenino</option>
                    </select>
                    <label>Sexo</label>
                  </div>
                  <!-- Fecha de nacimiento -->
                  <div class="col s4 input-field">
                    <input type="text" name="fNacimiento" id="fNacimiento" class="datepicker">
                    <label for="email" data-error="wrong" data-success="right">Fecha de nacimiento</label>
                  </div>
                  <!-- Estado civil -->
                  <div class="col s4 input-field">
                    <select id="estadoCivil" name="estadoCivil">
                      <option value="" disabled selected>Seleccione una Opción</option>
                      <option value="1">Soltero</option>
                      <option value="2">Casado</option>
                      <option value="2">Viudo</option>
                    </select>
                    <label>Estado Civl</label>
                  </div>
                </div>

              </div>
            </li>
            <li>
              <div  onclick="changeIcon('da')" class="collapsible-header"  style="background-color: #f5f5f5 !important">
                <div class="col s6" style="padding-left: 0px;">
                  <div class="left">
                    2. Direccion Actual
                  </div>
                </div>
                <div id="da" class="col s6" style="padding-right: 0px;">
                  <a href="#" class="right" style="color: #000000">
                    <i class="material-icons" style="font-size: 18px; color: #9f9f9f">add</i>
                  </a>
                </div>
                <div id="daN" class="col s6" style="padding-right: 0px; display:none">
                  <a href="#" class="right" style="color: #000000">
                    <i class="material-icons" style="font-size: 18px; color: #9f9f9f">remove</i>
                  </a>
                </div>
              </div>
              <div class="collapsible-body" style="background-color: white">
                <div class="row">
                  <!-- Departamento -->
                  <div class="col s4 input-field">
                    <select id="dADepartamento" name="dADepartamento">
                      <option value="" disabled selected>Seleccione una Opción</option>
                      <option value="1">Lima</option>
                    </select>
                    <label>Departamento</label>
                  </div>
                  <!-- Provincia -->
                  <div class="col s4 input-field">
                    <select id="dAProvincia" name="dAProvincia">
                      <option value="" disabled selected>Seleccione una Opción</option>
                      <option value="1">Lima</option>
                    </select>
                    <label>Provincia</label>
                  </div>
                  <!-- Distrito -->
                  <div class="col s4 input-field">
                    <select id="dADistrito" name="dADistrito">
                      <option value="" disabled selected>Seleccione una Opción</option>
                      <option value="1">Lima</option>
                    </select>
                    <label>Distrito</label>
                  </div>
                </div>



                <div class="row">
                  <!-- Direccion -->
                  <div class="input-field col s12">
                    <input id="dADireccion" name="dADireccion" type="text" class="validate">
                    <label for="dADireccion" data-error="wrong" data-success="right">Dirección</label>
                  </div>
                </div>

              </div>
            </li>
            <li>
              <div  onclick="changeIcon('ln')" class="collapsible-header"  style="background-color: #f5f5f5 !important">
                <div class="col s6" style="padding-left: 0px;">
                  <div class="left">
                    3. Lugar de Nacimiento
                  </div>
                </div>
                <div id="ln" class="col s6" style="padding-right: 0px;">
                  <a href="#" class="right" style="color: #000000">
                    <i class="material-icons" style="font-size: 18px; color: #9f9f9f">add</i>
                  </a>
                </div>
                <div id="lnN" class="col s6" style="padding-right: 0px; display:none">
                  <a href="#" class="right" style="color: #000000">
                    <i class="material-icons" style="font-size: 18px; color: #9f9f9f">remove</i>
                  </a>
                </div>
              </div>
              <div class="collapsible-body" style="background-color: white">
                <div class="row">
                  <!-- Departamento -->
                  <div class="col s4 input-field">
                    <select id="lNDepartamento" name="lNDepartamento">
                      <option value="" disabled selected>Seleccione una Opción</option>
                      <option value="1">Lima</option>
                    </select>
                    <label>Departamento</label>
                  </div>
                  <!-- Provincia -->
                  <div class="col s4 input-field">
                    <select id="lNProvincia" name="lNProvincia">
                      <option value="" disabled selected>Seleccione una Opción</option>
                      <option value="1">Lima</option>
                    </select>
                    <label>Provincia</label>
                  </div>
                  <!-- Distrito -->
                  <div class="col s4 input-field">
                    <select id="lNDistrito" name="lNDistrito">
                      <option value="" disabled selected>Seleccione una Opción</option>
                      <option value="1">Lima</option>
                    </select>
                    <label>Distrito</label>
                  </div>

                </div>
              </div>
            </li>
            <li>
              <div  onclick="changeIcon('lp')" class="collapsible-header"  style="background-color: #f5f5f5 !important">
                <div class="col s6" style="padding-left: 0px;">
                  <div class="left">
                    4. Lugar de procedencia
                  </div>
                </div>
                <div id="lp" class="col s6" style="padding-right: 0px;">
                  <a href="#" class="right" style="color: #000000">
                    <i class="material-icons" style="font-size: 18px; color: #9f9f9f">add</i>
                  </a>
                </div>
                <div id="lpN" class="col s6" style="padding-right: 0px; display:none">
                  <a href="#" class="right" style="color: #000000">
                    <i class="material-icons" style="font-size: 18px; color: #9f9f9f">remove</i>
                  </a>
                </div>
              </div>
              <div class="collapsible-body" style="background-color: white">
                <div class="row">
                  <!-- Departamento -->
                  <div class="col s4 input-field">
                    <select id="lPDepartamento" name="lPDepartamento">
                      <option value="" disabled selected>Seleccione una Opción</option>
                      <option value="1">Lima</option>
                    </select>
                    <label>Departamento</label>
                  </div>
                  <!-- Provincia -->
                  <div class="col s4 input-field">
                    <select id="lPProvincia" name="lPProvincia">
                      <option value="" disabled selected>Seleccione una Opción</option>
                      <option value="1">Lima</option>
                    </select>
                    <label>Provincia</label>
                  </div>
                  <!-- Distrito -->
                  <div class="col s4 input-field">
                    <select id="lPDistrito" name="lPDistrito">
                      <option value="" disabled selected>Seleccione una Opción</option>
                      <option value="1">Lima</option>
                    </select>
                    <label>Distrito</label>
                  </div>

                </div>
              </div>
            </li>
            <li>
              <div  onclick="changeIcon('dad')" class="collapsible-header"  style="background-color: #f5f5f5 !important">
                <div class="col s6" style="padding-left: 0px;">
                  <div class="left">
                    5. Datos de Adicionales
                  </div>
                </div>
                <div id="dad" class="col s6" style="padding-right: 0px;">
                  <a href="#" class="right" style="color: #000000">
                    <i class="material-icons" style="font-size: 18px; color: #9f9f9f">add</i>
                  </a>
                </div>
                <div id="dadN" class="col s6" style="padding-right: 0px; display:none">
                  <a href="#" class="right" style="color: #000000">
                    <i class="material-icons" style="font-size: 18px; color: #9f9f9f">remove</i>
                  </a>
                </div>
              </div>
              <div class="collapsible-body" style="background-color: white">
                <div class="row">
                  <!-- Grado de instruccion -->
                  <div class="col s4 input-field">
                    <select id="gradoInstruccion" name="gradoInstruccion">
                      <option value="" disabled selected>Seleccione una Opción</option>
                      <option value="1">Primaria</option>
                      <option value="1">Secundaria</option>
                      <option value="1">Superior</option>
                    </select>
                    <label>Grado de instrucción</label>
                  </div>
                  <!-- ocupacion -->
                  <div class="input-field col s4">
                    <input id="ocupacion" name="ocupacion" type="text" class="validate">
                    <label for="ocupacion" data-error="wrong" data-success="right">Ocupación</label>
                  </div>
                  <!-- Centro educativo laboral -->
                  <div class="input-field col s4">
                    <input id="cEducativoLaboral" name="cEducativoLaboral" type="text" class="validate">
                    <label for="cEducativoLaboral" data-error="wrong" data-success="right">Centro educativo laboral</label>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div onclick="changeIcon('dac')" class="collapsible-header"  style="background-color: #f5f5f5 !important">
                <div class="col s6" style="padding-left: 0px;">
                  <div class="left">
                    6. Datos de Acompañante
                  </div>
                </div>
                <div id="dac" class="col s6" style="padding-right: 0px;">
                  <a href="#" class="right" style="color: #000000">
                    <i class="material-icons" style="font-size: 18px; color: #9f9f9f">add</i>
                  </a>
                </div>
                <div id="dacN" class="col s6" style="padding-right: 0px; display:none">
                  <a href="#" class="right" style="color: #000000">
                    <i class="material-icons" style="font-size: 18px; color: #9f9f9f">remove</i>
                  </a>
                </div>
              </div>
              <div class="collapsible-body" style="background-color: white">
                <div class="row">
                  <!-- Acompañante -->
                  <div class="col s3 input-field">
                    <select id="vinculo" name="vinculo">
                      <option value="" disabled selected>Seleccione una Opción</option>
                      <option value="1">NA</option>
                      <option value="1">Tutor</option>
                      <option value="1">Familiar</option>
                    </select>
                    <label>Vínculo</label>
                  </div>
                  <!--Nombre-->
                  <div class="input-field col s3">
                    <input id="ocupacionA" name="ocupacionA" type="text" class="validate">
                    <label for="ocupacionA" data-error="wrong" data-success="right">Ocupacion</label>
                  </div>
                  <!-- Tipo de documento -->
                  <div class="col s3 input-field">
                    <select id="tDocumentoA" name="tDocumentoA">
                      <option value="" disabled selected>Seleccione una Opción</option>
                      <option value="1">DNI</option>
                    </select>
                    <label>Tipo de documento</label>
                  </div>
                  <!-- Numero de documento -->
                  <div class="input-field col s3">
                    <input id="nroDocumentoA" name="nroDocumentoA" type="text" class="validate">
                    <label for="nroDocumentoA" data-error="wrong" data-success="right">Nro de documento</label>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div onclick="changeIcon('ot')" class="collapsible-header"  style="background-color: #f5f5f5 !important">
                <div class="col s6" style="padding-left: 0px;">
                  <div class="left">
                    7. Historia clínica
                  </div>
                </div>
                <div id="ot" class="col s6" style="padding-right: 0px;">
                  <a href="#" class="right" style="color: #000000">
                    <i class="material-icons" style="font-size: 18px; color: #9f9f9f">add</i>
                  </a>
                </div>
                <div id="otN" class="col s6" style="padding-right: 0px; display:none">
                  <a href="#" class="right" style="color: #000000">
                    <i class="material-icons" style="font-size: 18px; color: #9f9f9f">remove</i>
                  </a>
                </div>
              </div>
              <div class="collapsible-body" style="background-color: white">
                <div class="row">
                  <!-- Acompañante -->
                  <div class="col s4">
                    <h6>HISTORIAL CLINICO ANTERIOR</h6>
                    <div class="input-field col s12">
                      <input id="email" type="email" class="validate">
                      <label for="email" data-error="wrong" data-success="right">HC anterior</label>
                    </div>
                    <div class="input-field col s12">
                      <input id="email" type="email" class="validate">
                      <label for="email" data-error="wrong" data-success="right">Fecha de registro HC</label>
                    </div>
                  </div>
                  <!--Nombre-->
                  <div class="col s4">
                    <h6>DATOS MEDICOS</h6>
                    <div class="input-field col s12">
                      <select>
                        <option value="" disabled selected>Seleccione una Opción</option>
                        <option value="2">O+</option>
                        <option value="3">O-</option>
                      </select>
                      <label>Grupo Sanguíneo</label>
                    </div>
                    <div class="input-field col s12">
                      <select>
                        <option value="" disabled selected>Seleccione una Opción</option>
                        <option value="1">O+</option>
                        <option value="2">O-</option>
                      </select>
                      <label>Factor RH</label>
                    </div>
                  </div>
                  <!-- Tipo de documento -->
                  <div class="col s4">
                    <div class="row">
                      <h6>DATOS DE CONTACTO</h6>
                    </div>
                    <div class="input-field col s12">
                      <input id="email" type="email" class="validate">
                      <label for="email" data-error="wrong" data-success="right">Celular</label>
                    </div>
                    <div class="input-field col s12">
                      <input id="email" type="email" class="validate">
                      <label for="email" data-error="wrong" data-success="right">Teléfono Fijo</label>
                    </div>
                    <div class="input-field col s12">
                      <input id="email" type="email" class="validate">
                      <label for="email" data-error="wrong" data-success="right">Correo</label>
                    </div>
                  </div>

                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="row padding-element right">
        <a id="guardar" onclick="guardar()" href="/lab-sec-historial" style="width:auto;" class="waves-effect btn button-cuenta format">Guardar Historial Médico</a>
      </div>
    </div>
  </div>
  <div id="datosMedicosHM" style="padding-bottom: 50px; background-color: white">
    <div class="row" style="padding-top:20px; padding-left: 25px; padding-right: 25px">
      <ul id="tabs-swipe-demo" class="tabs account-header">
        <li class="tab col s2" onclick="dmEnfermedad()"><a title="Enfermedad Actual" class="active" href="#nhEnfermedadActual"><b>Enfermedad Actual</b></a></li>
        <li class="tab col s2" onclick="dmExamen()"><a title="Examen Fisico" class="" href="#nhExamenFisico"><b>Examen Fisico</b></a></li>
        <li class="tab col s2" onclick="dmDiagnostico()"><a title="Diagnostico" class="" href="#nhDiagnostico"><b>Diagnostico</b></a></li>
        <li class="tab col s2" onclick="dmTratamiento()"><a title="Tratamiento" class="" href="#nhTratamiento"><b>Tratamiento</b></a></li>
        <li class="tab col s2" onclick="dmAuxiliar()"><a title="Examenes Auxiliares" class="" href="#nhExamenAuxiliar"><b>Examenes Auxiliares</b></a></li>
        <li class="tab col s2" onclick="dmProcedimiento()"><a title="Procedimientos, Interconsultas y Otros" class="" href="#nhProcInterOtros"><b>Procedimientos, Interconsultas y Otros</b></a></li>
      </ul>
    </div>
    <div id="nhEnfermedadActual">
      <div class="row background-white padding-left-element padding-right-element padding-top-element">
        <div class="row">
          <!-- Motivo consulta -->
          <div class="input-field col s6">
            <textarea id="sigSintomas" name="sigSintomas" class="materialize-textarea"></textarea>
            <label for="motivoConsulta" data-error="wrong" data-success="right">Motivo consulta</label>
          </div>
          <!-- Signos y sintomas -->
          <div class="input-field col s6">
            <textarea id="sigSintomas" name="sigSintomas" class="materialize-textarea"></textarea>
            <label for="sigSintomas">Signos y sintomas</label>
          </div>
        </div>

        <div class="row">
        </div>

        <div class="row">
          <!-- forma de inicio -->
          <div class="input-field col s12">
            <input id="fInicio" name="fInicio" type="text" class="validate">
            <label for="fInicio" data-error="wrong" data-success="right">Forma de inicio</label>
          </div>
        </div>
        <div class="row">
          <!-- Tiempo enfermedad -->
          <div class="input-field col s6">
            <input id="tEnfermedad" name="tEnfermedad" type="text" class="validate">
            <label for="tEnfermedad" data-error="wrong" data-success="right">Tiempo enfermedad</label>
          </div>
          <!-- Tipo informante -->
          <div class="input-field col s6">
            <select id="tipoInf" name="tipoInf">
              <option value="" disabled selected>Seleccione una Opción</option>
              <option value="1">Normal</option>
              <option value="2">Normal</option>
              <option value="3">Normal</option>
            </select>
            <label>Tipo informante</label>
          </div>
        </div>

        <div class="row">
          <!-- relato cronologico -->
          <div class="input-field col s12">
            <textarea id="rCronologico" name="rCronologico" class="materialize-textarea"></textarea>
            <label for="rCronologico">Relato Cronológico</label>
          </div>
        </div>

        <div class="row" style="padding-left: 10px;">
          <h6><b>FUNCIONES BIOLÓGICAS</b></h6>
        </div>

        <div class="row padding-top-element">
          <!-- apetito -->
          <div class="input-field col s4">
            <select id="apetito" name="apetito">
              <option value="" disabled selected>Normal</option>
              <option value="1">Normal</option>
              <option value="2">Normal</option>
              <option value="3">Normal</option>
            </select>
            <label>Apetito</label>
          </div>
          <!-- sueño -->
          <div class="input-field col s4">
            <select id="suenio" name="suenio">
              <option value="" disabled selected>Normal</option>
              <option value="1">Normal</option>
              <option value="2">Normal</option>
              <option value="3">Normal</option>
            </select>
            <label>Sueño</label>
          </div>
          <!-- deposiciones -->
          <div class="input-field col s4">
            <select id="deposiciones" name="deposiciones">
              <option value="" disabled selected>Normal</option>
              <option value="1">Normal</option>
              <option value="2">Normal</option>
              <option value="3">Normal</option>
            </select>
            <label>Deposiciones</label>
          </div>
        </div>

        <div class="row">
          <!-- sed -->
          <div class="input-field col s4">
            <select id="sed" name="sed">
              <option value="" disabled selected>Normal</option>
              <option value="1">Normal</option>
              <option value="2">Normal</option>
              <option value="3">Normal</option>
            </select>
            <label>Sed</label>
          </div>
          <!-- orina -->
          <div class="input-field col s4">
            <select id="orina" name="orina">
              <option value="" disabled selected>Normal</option>
              <option value="1">Normal</option>
              <option value="2">Normal</option>
              <option value="3">Normal</option>
            </select>
            <label>Orina</label>
          </div>
        </div>
      </div>
    </div>
    <div id="nhExamenFisico">
      <div class="row background-white padding-left-element padding-right-element padding-top-element">
        <div class="row" style="padding-left:10px">
          <h6><b>FUNCIONES VITALES</b></h6>
        </div>
        <div class="row">
          <!-- PA -->
          <div class="input-field col s1">
            <input id="pa" name="pa" type="text" class="validate">
            <label for="pa" data-error="wrong" data-success="right">P.A.</label>
          </div>
          <div class="col s1 input-field">
            <p>MMHG</p>
          </div>

          <!-- FR -->
          <div class="input-field col s1">
            <input id="fr" name="fr" type="text" class="validate">
            <label for="fr" data-error="wrong" data-success="right">F.R.</label>
          </div>
          <div class="col s1 input-field">
            <p>X'</p>
          </div>

          <!-- FC -->
          <div class="input-field col s1">
            <input id="fc" name="fc" type="text" class="validate">
            <label for="fc" data-error="wrong" data-success="right">F.C.</label>
          </div>
          <div class="col s1 input-field">
            <p>X'</p>
          </div>
          <!-- Temp -->
          <div class="input-field col s1">
            <input id="temperatura" name="temperatura" type="text" class="validate">
            <label for="temperatura" data-error="wrong" data-success="right">Temp.</label>
          </div>
          <div class="col s1 input-field">
            <p>°C</p>
          </div>
          <!-- Peso -->
          <div class="input-field col s1">
            <input id="peso" name="peso" type="text" class="validate">
            <label for="peso" data-error="wrong" data-success="right">Peso</label>
          </div>
          <div class="col s1 input-field">
            <p>Kg.</p>
          </div>
          <!-- Talla -->
          <div class="input-field col s1">
            <input id="talla" name="talla" type="email" class="validate">
            <label for="talla" data-error="wrong" data-success="right">Talla</label>
          </div>
          <div class="col s1 input-field">
            <p>cm.</p>
          </div>
        </div>
        <div class="row padding-bottom-element" style="padding-left: 10px">
          <h6><b> EXÁMEN FÍSICO </b></h6>
        </div>
        <div class="row">
          <!-- Estado General -->
          <div class="input-field col s6">
            <select id="estadoGeneral" name="estadoGeneral">
              <option value="" disabled selected>Estado general</option>
              <option value="1">Normal</option>
              <option value="2">Normal</option>
              <option value="3">Normal</option>
            </select>
            <label>Estado General</label>
          </div>
          <!-- Estado de conciencia -->
          <div class="input-field col s6">
            <input id="estadoConciencia" name="estadoConciencia" type="text" class="validate">
            <label for="estadoConciencia" data-error="wrong" data-success="right">Estado de Conciencia</label>
          </div>

        </div>
        <div class="row">
          <!-- Examen fisico Dirigido -->
          <div class="input-field col s12">
            <textarea id="eFDirigido" name="eFDirigido" class="materialize-textarea"></textarea>
            <label for="eFDirigido">Examen Fisico Dirigido</label>
          </div>
        </div>
      </div>
    </div>
    <div id="nhDiagnostico">
      <div class="row background-white padding-left-element padding-right-element padding-top-element">
        <div class="row">
          <!-- Diagnostico -->
          <div class="input-field col s2">
            <input id="diagnostico" name="diagnostico" type="text" class="validate">
            <label for="diagnostico" data-error="wrong" data-success="right">Diagnostico</label>
          </div>
          <!-- campo -->
          <div class="input-field col s6">
            <input id="detalle" name="detalle" type="text" class="validate">
            <label for="detalle" data-error="wrong" data-success="right">Detalle</label>
          </div>
          <!-- tipo -->
          <div class="input-field col s4">
            <select id="tipo" name="tipo">
              <option value="" disabled selected>Seleccione una opcion</option>
              <option value="1">Normal</option>
              <option value="2">Normal</option>
              <option value="3">Normal</option>
            </select>
            <label>Tipo</label>
          </div>
        </div>
        <div class="row">
          <!-- table lista de diagnosticos -->
          <div class="col s12 m12 " style="margin-top: 70px">
              <div class="dataTables_wrapper form-inline dt-material">
                <!-- <div style="position:absolute; margin-top: -30px; margin-left: 1030px;">
                  <i class="material-icons" style="color:#adadad">search</i>
                </div> -->
                  <table id="tableDiagnosticoHistorial" class="bordered" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Descripción</th>
                            <th>Tipo</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
              </div>
          </div>
        </div>
      </div>
    </div>
    <div id="nhTratamiento">
      <div class="row background-white padding-left-element padding-right-element padding-top-element">
          <div class="row">
            <!-- Producto -->
            <div class="input-field col s12">
              <input id="producto" name="producto" type="text" class="validate">
              <label for="producto" data-error="wrong" data-success="right">Producto</label>
            </div>
          </div>
          <div class="row">
            <!-- frecuencia -->
            <div class="input-field col s2">
              <input id="frecuencia" name="frecuencia" type="text" class="validate">
              <label for="frecuencia" data-error="wrong" data-success="right">Frecuencia (x día)</label>
            </div>
            <!-- duracion -->
            <div class="input-field col s2">
              <input id="duracion" name="duracion" type="text" class="validate">
              <label for="duracion" data-error="wrong" data-success="right">Duracion (dias)</label>
            </div>
            <!-- via de admnistracion -->
            <div class="input-field col s3">
              <select id="viaAdministracion" name="viaAdministracion">
                <option value="" disabled selected>Seleccione una opción</option>
                <option value="1">Normal</option>
                <option value="2">Normal</option>
                <option value="3">Normal</option>
              </select>
              <label>Via Admnistración</label>
            </div>
            <!-- dosis -->
            <div class="input-field col s3">
              <input id="dosis" name="dosis" type="text" class="validate">
              <label for="dosis" data-error="wrong" data-success="right">Dosis</label>
            </div>
            <!-- cantidad -->
            <div class="input-field col s2">
              <input id="cantidad" name="cantidad" type="text" class="validate">
              <label for="cantidad" data-error="wrong" data-success="right">Cantidad</label>
            </div>
          </div>
          <div class="row">
            <!-- table -->
            <!-- table lista de diagnosticos -->
            <div class="col s12 m12" style="margin-top: 70px">
                <div class="dataTables_wrapper form-inline dt-material">
                  <!-- <div style="position:absolute; margin-top: -30px; margin-left: 1030px;">
                    <i class="material-icons" style="color:#adadad">search</i>
                  </div> -->
                    <table id="tableResumenRecetaHistorial" class="bordered" style="width: 100%">
                      <thead>
                          <tr>
                              <th>Codigo</th>
                              <th>Producto</th>
                              <th>Tratamiento</th>
                              <th>Via. Admin.</th>
                              <th>Dosis</th>
                          </tr>
                      </thead>
                      <tbody>
                      </tbody>
                  </table>
                </div>
            </div>
          </div>
          <div class="row">
            <!-- valide< de receta -->
            <div class="input-field col s6">
              <input id="validezReceta" name="validezReceta" type="text" class="validate">
              <label for="validezReceta" data-error="wrong" data-success="right">Validez de receta (dias)</label>
            </div>
            <!-- fecha -->
            <div class="input-field col s6">
              <input id="fechaReceta" name="fechaReceta" type="text" class="datepicker">
              <label for="fechaReceta" data-error="wrong" data-success="right">Fecha</label>
            </div>
          </div>
          <div class="row">
            <!-- Recomendaciones Generales -->
            <div class="input-field col s12">
              <textarea id="recGenerales" name="recGenerales" class="materialize-textarea"></textarea>
              <label for="recGenerales">Recomendaciones Generales</label>
            </div>
          </div>
      </div>
    </div>
    <div id="nhExamenAuxiliar">
      <div class="row background-white padding-left-element padding-right-element padding-top-element">
        <div class="row">
          <!-- laboratorios -->
          <div class="input-field col s12">
            <textarea id="laboratorios" name="laboratorios" class="materialize-textarea"></textarea>
            <label for="laboratorios">Laboratorios</label>
          </div>
        </div>
        <div class="">
          <!-- imagenologicos -->
          <div class="input-field col s12">
            <textarea id="imagenologico" name="imagenologico" class="materialize-textarea"></textarea>
            <label for="imagenologico">imagenologicos</label>
          </div>
        </div>
      </div>
    </div>
    <div id="nhProcInterOtros">
      <div class="row background-white padding-left-element padding-right-element padding-top-element">
        <div class="row">
          <!-- procedimientos -->
          <div class="input-field col s12">
            <textarea id="procedimiento" name="procedimiento" class="materialize-textarea"></textarea>
            <label for="procedimiento">Procedimientos</label>
          </div>
          <!-- interconsulta -->
          <div class="input-field col s12">
            <textarea id="interconsulta" name="interconsulta" class="materialize-textarea"></textarea>
            <label for="interconsulta">Interconsultas</label>
          </div>
          <!-- Transferencia -->
          <div class="input-field col s12">
            <textarea id="transferencia" name="transferencia" class="materialize-textarea"></textarea>
            <label for="transferencia">Transferencia</label>
          </div>
        </div>
        <div class="row">
          <!-- descanso medico -->
          <div class="input-field col s6">
            <input id="descMedico" name="descMedico" type="text" class="validate">
            <label for="descMedico" data-error="wrong" data-success="right">Descanso médico</label>
          </div>
          <!-- fecha proxima de cita -->
          <div class="input-field col s6">
            <input id="fechaCita" name="fechaCita" type="text" class="datepicker">
            <label for="fechaCita" data-error="wrong" data-success="right">Fecha Procimo Cita</label>
          </div>
        </div>
      </div>
    </div>
    <div class="right padding-element background-white" style="width: 100%">
      <div class="right">
        <a id="guardar" href="/lab-sec-historial" onclick="guardar()" style="width:auto;" class="waves-effect btn button-cuenta format">Guardar Historial Médico</a>
      </div>
    </div>
  </div>
  <div id="antecedentesHM">
    <div class="row background-white">
      <div class="row" style="padding-top:20px">
        <div style="padding-left: 25px; padding-right: 25px">
          <ul id="tabs-swipe-demo" class="tabs">
            <li class="tab col s4" onclick="navGenerales()"><a class="active" href="#aGenerales"><b>GENERALES</b></a></li>
            <li class="tab col s4" onclick="navGinecologico()"><a class="" href="#aGinecologicos"> <b>GINECOLOGICOS</b> </a></li>
            <li class="tab col s4" onclick="navPatologicos()"><a class="" href="#aPatologicos"> <b>PATOLOGICOS</b> </a></li>
          </ul>
        </div>
        <div id="aGenerales" style="padding: 20px 25px 25px 25px;">
          <div class="row">
            <h6>FISIOLÓGICOS</h6>
          </div>
          <br>
          <div class="row">
            <!-- PRENATALES 4-->
            <div class="input-field col s4">
              <select id="prenatales" name="prenatales">
                <option value="" disabled selected>Seleccione una opción</option>
                <option value="1">Placenta Previa</option>

              </select>
              <label>Prenatales</label>
            </div>
            <!-- PARTO 4-->
            <div class="input-field col s4">
              <select id="parto" name="parto">
                <option value="" disabled selected>Seleccione una opción</option>
                <option value="1">No Recuerda</option>
              </select>
              <label>Parto</label>
            </div>
            <!-- INMUNIZACIONES 4-->
            <div class="input-field col s4">
              <select id="inmunizacion" name="inmunizacion">
                <option value="" disabled selected>Seleccione una opción</option>
                <option value="1">Incompleto</option>
              </select>
              <label>Inmunizaciones</label>
            </div>
          </div>

          <div class="row">
            <h6>GENERALES/OCUPACIONALES</h6>
          </div>

          <div class="row">
            <!-- medicamentos 12-->
            <div class="input-field col s6">
              <textarea id="medicamento" name="medicamento" class="materialize-textarea" style="min-height: 1rem !important"></textarea>
              <label for="medicamento">Medicamentos</label>
            </div>
            <!-- Habiros Nocivos 12-->
            <div class="input-field col s6">
              <div style="padding-top: 34px">
                <select id="habitosNocivos" name="habitosNocivos">
                  <option value="" disabled selected>Seleccione una opción</option>
                  <option value="1">TABACO</option>
                </select>
                <label>Hábitos Nocivos</label>
              </div>
            </div>

          </div>

          <div class="row">
            <!-- RAM -->
            <div class="input-field col s6">
              <textarea id="ram" name="ram" class="materialize-textarea" style="min-height: 1rem !important"></textarea>
              <label for="ram">RAM</label>
            </div>
            <!-- Ocupacionales -->
            <div class="input-field col s6">
              <div style="padding-top: 34px">
                <input id="ocupacionales" name="ocupacionales" type="text" class="validate">
                <label for="ocupacionales">Ocupacionales</label>
              </div>
            </div>

          </div>
        </div>
        <div id="aGinecologicos" style="padding: 20px 25px 25px 25px; display: inline-block">
          <div class="" style="position-absolute">
            <div class="row">
              <div class="input-field col s3">
                <div style="padding-top: 7px">
                  <input id="email" type="email" class="validate">
                  <label for="email" data-error="wrong" data-success="right">Menarquia</label>
                </div>
              </div>
              <div class="col s3">
                <div style="padding-top: 25px;">
                  <input type="checkbox" id="regla" />
                  <label for="regla">¿Regla Regular?</label>
                </div>
              </div>
              <div class="input-field col s3" style="margin-top: 0px">
                <label for="">R.Caternial(+-3/28)</label>
                <br>
                <div class="row">
                  <div class="col s6">
                    <input id="email" type="email" class="validate">
                    <label for="email" data-error="wrong" data-success="right"></label>
                  </div>
                  <div class="col s6">
                    <input id="email" type="email" class="validate">
                    <label for="email" data-error="wrong" data-success="right"></label>
                  </div>
                </div>
              </div>
              <div class="input-field col s3">
                <div style="padding-top: 7px">
                  <input id="email" type="email" class="validate">
                  <label for="email" data-error="wrong" data-success="right">RS</label>
                </div>
              </div>

            </div>
            <div class="row">
              <div class="input-field col s3">
                <input id="email" type="email" class="validate">
                <label for="email" data-error="wrong" data-success="right">FUR</label>
              </div>
              <div class="input-field col s3">
                <input id="email" type="email" class="validate">
                <label for="email" data-error="wrong" data-success="right">FPP</label>
              </div>
              <div class="col s3">
                <div style="padding-top: 25px;">
                  <input type="checkbox" id="disminorrea" />
                  <label for="disminorrea">Disminorrea</label>
                </div>
              </div>
              <div class="input-field col s3">
                <input id="email" type="email" class="validate">
                <label for="email" data-error="wrong" data-success="right">#Gestaciones</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s4">
                <div class="row" style="padding-top: 20px">
                  <input id="email" type="email" class="validate">
                  <label for="email" data-error="wrong" data-success="right">FUP</label>
                </div>
              </div>
              <div class="input-field col s4" style="margin-top: 0px">
                <label for="">pariedad</label>
                <br>
                <div class="">
                  <div class="input-field col s3">
                    <input id="email" type="email" class="validate">
                    <label for="email" data-error="wrong" data-success="right"></label>
                  </div>
                  <div class="input-field col s3">
                    <input id="email" type="email" class="validate">
                    <label for="email" data-error="wrong" data-success="right"></label>
                  </div>
                  <div class="input-field col s3">
                    <input id="email" type="email" class="validate">
                    <label for="email" data-error="wrong" data-success="right"></label>
                  </div>
                  <div class="input-field col s3">
                    <input id="email" type="email" class="validate">
                    <label for="email" data-error="wrong" data-success="right"></label>
                  </div>
                </div>
              </div>
              <div class="input-field col s4">
                <div class="row" style="padding-top: 20px">
                  <input id="email" type="email" class="validate">
                  <label for="email" data-error="wrong" data-success="right">#Cesárea</label>
                </div>
              </div>
            </div>
            <div class="row">
              <!-- PAP -->
              <div class="input-field col s12">
                <textarea id="pap" name="pap" class="materialize-textarea" style="min-height: 1rem !important"></textarea>
                <label for="pap">PAP</label>
              </div>
            </div>
            <div class="row">
              <!-- Mamografia -->
              <div class="input-field col s12">
                <textarea id="menarquia" name="menarquia" class="materialize-textarea" style="min-height: 1rem !important"></textarea>
                <label for="menarquia">Menarquía</label>
              </div>
            </div>
            <div class="row">
              <!-- MAC -->
              <div class="input-field col s6">
                <input id="mac" name="mac" type="text" class="validate">
                <label for="mac">MAC</label>
              </div>
              <!-- Otros -->
              <div class="input-field col s6">
                <input id="otros" name="otros" type="email" class="validate">
                <label for="otros">Otros</label>
              </div>
            </div>
          </div>

        </div>
        <div id="aPatologicos" style="padding: 20px 25px 25px 25px;">
          <div class="row">
            <h6> <b>Antecedentes Patológicos</b> </h6>
          </div>
          <div class="row" style="position: relative">
              <!-- table Antecedentes Patologicos -->
              <div class="col s12 m12 " style="margin-top: 20px">
                  <div class="dataTables_wrapper fo|rm-inline dt-material">
                    <!-- <div style="position:absolute; margin-top: -30px; margin-left: 1030px;">
                      <i class="material-icons" style="color:#adadad">search</i>
                    </div> -->
                      <table id="tableAntecedentesPatologicos" class="bordered" style="width: 100%">
                        <thead>
                            <tr>
                                <th>CIE</th>
                                <th>Descripción</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                  </div>
              </div>
          </div>
          <br><br>
          <div class="row">
            <h6> <b>Patológicos Familiares</b> </h6>
          </div>
          <div class="row">
            <div class="col s12 m12 " style="margin-top: 20px">
                <div class="dataTables_wrapper form-inline dt-material">

                    <table id="tablePatologicosFamiliares" class="bordered" style="width: 100%">
                      <thead>
                          <tr>
                              <th>CIE</th>
                              <th>Descripción</th>
                              <th>Familiar</th>
                          </tr>
                      </thead>
                      <tbody>
                      </tbody>
                  </table>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row right" style="padding-right: 25px; padding-bottom: 25px">
        <a href="/lab-sec-historial" class="btn format" style="background-color: #868686">Guardar Historial Médico</a>
      </div>
    </div>
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
  document.getElementById("sec_nuevo_historial").style.paddingLeft = '4%';
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
  document.getElementById("sec_nuevo_historial").style.paddingLeft = '2%';
}
function changeIcon(valor){

  var dp = document.getElementById('dp');
  var dpN = document.getElementById('dpN');
  var da = document.getElementById('da');
  var daN = document.getElementById('daN');
  var ln = document.getElementById('ln');
  var lnN = document.getElementById('lnN');
  var lp = document.getElementById('lp');
  var lpN = document.getElementById('lpN');
  var dad = document.getElementById('dad');
  var dpN = document.getElementById('dpN');
  var dac = document.getElementById('dac');
  var dacN = document.getElementById('dacN');
  var ot = document.getElementById('ot');
  var otN = document.getElementById('otN');

  if(valor == 'dp' ){

    if( dp.style.display == '' || dp.style.display == 'block'){
      dp.style.display = 'none'
      dpN.style.display = 'block'
      da.style.display = 'block'
      daN.style.display = 'none'
      ln.style.display = 'block'
      lnN.style.display = 'none'
      lp.style.display = 'block'
      lpN.style.display = 'none'
      dad.style.display = 'block'
      dadN.style.display = 'none'
      dac.style.display = 'block'
      dacN.style.display = 'none'
      ot.style.display = 'block'
      otN.style.display = 'none'
      document.getElementById('nav0').style.height = '900px'

    }else{
      dp.style.display = 'block'
      dpN.style.display = 'none'
      document.getElementById('nav0').style.height = '500px'
    }
  }else if (valor == 'da') {

    if( da.style.display == '' || da.style.display == 'block'){
      dp.style.display = 'block'
      dpN.style.display = 'none'
      da.style.display = 'none'
      daN.style.display = 'block'
      ln.style.display = 'block'
      lnN.style.display = 'none'
      lp.style.display = 'block'
      lpN.style.display = 'none'
      dad.style.display = 'block'
      dadN.style.display = 'none'
      dac.style.display = 'block'
      dacN.style.display = 'none'
      ot.style.display = 'block'
      otN.style.display = 'none'
      document.getElementById('nav0').style.height = '800px'

    }else{
      da.style.display = 'block'
      daN.style.display = 'none'
      document.getElementById('nav0').style.height = '500px'
    }
  }else if (valor == 'ln') {

    if( ln.style.display == '' || ln.style.display == 'block'){
      dp.style.display = 'block'
      dpN.style.display = 'none'
      da.style.display = 'block'
      daN.style.display = 'none'
      ln.style.display = 'none'
      lnN.style.display = 'block'
      lp.style.display = 'block'
      lpN.style.display = 'none'
      dad.style.display = 'block'
      dadN.style.display = 'none'
      dac.style.display = 'block'
      dacN.style.display = 'none'
      ot.style.display = 'block'
      otN.style.display = 'none'
      document.getElementById('nav0').style.height = '750px'

    }else{
      ln.style.display = 'block'
      lnN.style.display = 'none'
      document.getElementById('nav0').style.height = '500px'
    }
  }else if (valor == 'lp') {

    if( lp.style.display == '' || lp.style.display == 'block'){
      dp.style.display = 'block'
      dpN.style.display = 'none'
      da.style.display = 'block'
      daN.style.display = 'none'
      ln.style.display = 'block'
      lnN.style.display = 'none'
      lp.style.display = 'none'
      lpN.style.display = 'block'
      dad.style.display = 'block'
      dadN.style.display = 'none'
      dac.style.display = 'block'
      dacN.style.display = 'none'
      ot.style.display = 'block'
      otN.style.display = 'none'
      document.getElementById('nav0').style.height = '750px'
    }else{
      lp.style.display = 'block'
      lpN.style.display = 'none'
      document.getElementById('nav0').style.height = '500px'
    }
  }else if (valor == 'dad') {

    if( dad.style.display == '' || dad.style.display == 'block'){
      dp.style.display = 'block'
      dpN.style.display = 'none'
      da.style.display = 'block'
      daN.style.display = 'none'
      ln.style.display = 'block'
      lnN.style.display = 'none'
      lp.style.display = 'block'
      lpN.style.display = 'none'
      dad.style.display = 'none'
      dadN.style.display = 'block'
      dac.style.display = 'block'
      dacN.style.display = 'none'
      ot.style.display = 'block'
      otN.style.display = 'none'
      document.getElementById('nav0').style.height = '750px'

    }else{
      dad.style.display = 'block'
      dadN.style.display = 'none'
      document.getElementById('nav0').style.height = '500px'
    }
  }else if (valor == 'ot') {

    if( ot.style.display == '' || ot.style.display == 'block'){
      dp.style.display = 'block'
      dpN.style.display = 'none'
      da.style.display = 'block'
      daN.style.display = 'none'
      ln.style.display = 'block'
      lnN.style.display = 'none'
      lp.style.display = 'block'
      lpN.style.display = 'none'
      dad.style.display = 'block'
      dadN.style.display = 'none'
      dac.style.display = 'block'
      dacN.style.display = 'none'
      ot.style.display = 'none'
      otN.style.display = 'block'
      document.getElementById('nav0').style.height = '900px'
    }else{
      ot.style.display = 'block'
      otN.style.display = 'none'
      document.getElementById('nav0').style.height = '500px'
    }
  }else{

    if( dac.style.display == '' || dac.style.display == 'block'){
      dp.style.display = 'block'
      dpN.style.display = 'none'
      da.style.display = 'block'
      daN.style.display = 'none'
      ln.style.display = 'block'
      lnN.style.display = 'none'
      lp.style.display = 'block'
      lpN.style.display = 'none'
      dad.style.display = 'block'
      dadN.style.display = 'none'
      dac.style.display = 'none'
      dacN.style.display = 'block'
      ot.style.display = 'block'
      otN.style.display = 'none'
      document.getElementById('nav0').style.height = '750px'

    }else{
      dac.style.display = 'block'
      dacN.style.display = 'none'
      document.getElementById('nav0').style.height = '500px'
    }
  }
}
</script>
