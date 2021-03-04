@extends('layouts.material')
@section('content')
<div id="historial-medico" class="content-historial">
  <div class="row background-white">
      <div class="row" >
        <div id="cabecera" class="col s12 title-color align-center">
          <h6 class="title-content content-title">
            <b>HISTORIAL MEDICO</b>
          </h6>
        </div>
      </div>
      <div class="cuerpo-historial" style="padding-left: 20px;padding-right: 20px; text-align: justify">
        <ul class="collapsible" data-collapsible="accordion">
          <li>

            <div onclick="changeIcon('df')" class="collapsible-header row" style="background-color: #f5f5f5 !important">
              <div class="col s6">
                <b>1. Datos Filiatorios</b>
              </div>
              <div id="df" class="col s6" style="padding-right: 0px;">
                <a href="#" class="right" style="color: #000000">
                  <i class="material-icons" style="font-size: 18px; color: #9f9f9f">add</i>
                </a>
              </div>
              <div id="dfN" class="col s6" style="padding-right: 0px; display: none">
                <a href="#" class="right" style="color: #000000">
                  <i class="material-icons" style="font-size: 18px; color: #9f9f9f">remove</i>
                </a>
              </div>
            </div>
            <div class="collapsible-body">
              <div class="row">
                <!-- <div class="border-bottom">
                  <p> <b>DATOS FILIATORIOS</b> </p>
                </div> -->
                <!-- PRIMERA FILA -->
                <div class="row ">
                  <div class="col s3">
                    <label>
                      <b>
                        Apellidos y Nombres
                      </b>
                    </label><br>
                    <label for="">
                      Alvaro Felipe A.
                    </label>
                  </div>
                  <div class="col s3">
                    <label>
                      <b>
                        Edad
                      </b>
                    </label><br>
                    <label for="">
                      25 años
                    </label>
                  </div>
                  <div class="col s3">
                    <label>
                      <b>
                        Sexo
                      </b>
                    </label><br>
                    <label for="">
                      Masculino
                    </label>
                  </div>
                  <div class="col s3">
                    <label>
                      <b>
                        Ocupacion
                      </b>
                    </label><br>
                    <label for="">
                      Profesor
                    </label>
                  </div>
                </div>
                <!-- PRIMERA FILA END -->

                <!-- SEGUNDA FILA -->
                <div class="row margin-top-element">
                  <div class="col s3">
                    <label>
                      <b>
                        Fecha de nacimiento
                      </b>
                    </label><br>
                    <label for="">
                      02/12/1992
                    </label>
                  </div>
                  <div class="col s3">
                    <label>
                      <b>
                        Numero de historial clinico
                      </b>
                    </label><br>
                    <label for="">
                      01010101
                    </label>
                  </div>
                  <div class="col s3">
                    <label>
                      <b>
                        Estado civil
                      </b>
                    </label><br>
                    <label for="">
                      casado
                    </label>
                  </div>
                  <div class="col s3">
                    <label>
                      <b>
                        DNI
                      </b>
                    </label><br>
                    <label for="">
                      45857485
                    </label>
                  </div>
                </div>
                <!-- SEGUNDA FILA END -->


                <!-- TERCERA FILA -->
                <div class="row margin-top-element margin-bottom-element">
                  <div class="col s3">
                    <label>
                      <b>
                        Nacionalidad
                      </b>
                    </label><br>
                    <label for="">
                      peruana
                    </label>
                  </div>
                  <div class="col s3">
                    <label>
                      <b>
                        Residencia Actual
                      </b>
                    </label><br>
                    <label for="">
                      av. alfredo benavides nro 4585
                    </label>
                  </div>
                  <div class="col s3">
                    <label>
                      <b>
                        Residencia Anterior
                      </b>
                    </label><br>
                    <label for="">
                      av. javier prado nro 1520
                    </label>
                  </div>
                  <div class="col s3">
                    <label>
                      <b>
                        Grado de instruccion
                      </b>
                    </label><br>
                    <label for="">
                      educacion superior
                    </label>
                  </div>
                </div>
                <!-- TERCERA FILA END -->

              </div>

              <div class="row border-top">
                <div class="row">
                  <div class="col s6">
                    <div class="border-bottom">
                      <label>
                        <b>
                          MOTIVO DE CONSULTA
                        </b>
                      </label>
                    </div>
                    <div class="">
                      <p>
                        pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis.
                      </p>
                    </div>
                  </div>
                  <div class="col s6">
                    <div class="border-bottom">
                      <label>
                        <b>
                          ANTECEDENTES DE ENFERMEDAD ACTUAL
                        </b>
                      </label>
                    </div>
                    <div class="">
                      <p>
                        pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis.
                      </p>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </li>
          <li>
            <div onclick="changeIcon('ah')" class="collapsible-header row" style="background-color: #f5f5f5 !important">
              <div class="col s6">
                <b>2. Antecedentes Heredofamiliares</b>

              </div>
              <div id="ah" class="col s6" style="padding-right: 0px;">
                <a href="#" class="right" style="color: #000000">
                  <i class="material-icons" style="font-size: 18px; color: #9f9f9f">add</i>
                </a>
              </div>
              <div id="ahN" class="col s6" style="padding-right: 0px; display: none">
                <a href="#" class="right" style="color: #000000">
                  <i class="material-icons" style="font-size: 18px; color: #9f9f9f">remove</i>
                </a>
              </div>
             </div>
            <div class="collapsible-body">
              <div class="row">
                <div class="col s2">
                  <label>
                    <b>
                      DBT
                    </b>
                  </label><br>
                  <label for="">
                    No
                  </label>
                </div>
                <div class="col s2">
                  <label>
                    <b>
                      DBT
                    </b>
                  </label><br>
                  <label for="">
                    Si
                  </label>
                </div>
                <div class="col s2">
                  <label>
                    <b>
                      HTA
                    </b>
                  </label><br>
                  <label for="">
                    No
                  </label>
                </div>
                <div class="col s2">
                  <label>
                    <b>
                      TBC
                    </b>
                  </label><br>
                  <label for="">
                    No
                  </label>
                </div>
                <div class="col s2">
                  <label>
                    <b>
                      General
                    </b>
                  </label><br>
                  <label for="">
                    No
                  </label>
                </div>
                <div class="col s2">
                  <label>
                    <b>
                      Otras
                    </b>
                  </label><br>
                  <label for="">
                    No
                  </label>
                </div>
              </div>
            </div>
          </li>
          <li>
            <div onclick="changeIcon('ap')" class="collapsible-header row" style="background-color: #f5f5f5 !important">
              <div class="col s6">
                <b>Antecedentes Personales</b>
              </div>
              <div id="ap" class="col s6" style="padding-right: 0px;">
                <a href="#" class="right" style="color: #000000">
                  <i class="material-icons" style="font-size: 18px; color: #9f9f9f">add</i>
                </a>
              </div>
              <div id="apN" class="col s6" style="padding-right: 0px; display: none">
                <a href="#" class="right" style="color: #000000">
                  <i class="material-icons" style="font-size: 18px; color: #9f9f9f">remove</i>
                </a>
              </div>
            </div>
            <div class="collapsible-body">
              <div class="border-bottom">
                <h6>1. Hibridos toxicos</h6>
              </div>
              <div class="row margin-top-element">
                <div class="col s3">
                  <label>
                    <b>
                      Alcohol
                    </b>
                  </label><br>
                  <label for="">
                    <p>
                      Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt.
                      Duis leo. Sed fringilla mauris
                    </p>
                  </label>
                </div>
                <div class="col s3">
                  <label>
                    <b>
                      Tabaco
                    </b>
                  </label><br>
                  <label for="">
                    <p>
                      Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt.
                      Duis leo. Sed fringilla mauris
                    </p>
                  </label>
                </div>
                <div class="col s3">
                  <label>
                    <b>
                      Droga
                    </b>
                  </label><br>
                  <label for="">
                    <p>
                      Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt.
                      Duis leo. Sed fringilla mauris
                    </p>
                  </label>
                </div>
                <div class="col s3">
                  <label>
                    <b>
                      Infusiones
                    </b>
                  </label><br>
                  <label for="">
                    <p>
                      Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt.
                      Duis leo. Sed fringilla mauris
                    </p>
                  </label>
                </div>
              </div>

              <div class="border-top border-bottom">
                <h6>2. Fisiologicos</h6>
              </div>
              <div class="row margin-top-element">
                <div class="col s3">
                  <label>
                    <b>
                      Alimentacion
                    </b>
                  </label><br>
                  <label for="">
                    <p>
                      Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt.
                      Duis leo. Sed fringilla mauris
                    </p>
                  </label>
                </div>
                <div class="col s3">
                  <label>
                    <b>
                      Dipsia
                    </b>
                  </label><br>
                  <label for="">
                    <p>
                      Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt.
                      Duis leo. Sed fringilla mauris
                    </p>
                  </label>
                </div>
                <div class="col s3">
                  <label>
                    <b>
                      Diuresis
                    </b>
                  </label><br>
                  <label for="">
                    <p>
                      Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt.
                      Duis leo. Sed fringilla mauris
                    </p>
                  </label>
                </div>
                <div class="col s3">
                  <label>
                    <b>
                      Catarsis
                    </b>
                  </label><br>
                  <label for="">
                    <p>
                      Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt.
                      Duis leo. Sed fringilla mauris
                    </p>
                  </label>
                </div>
              </div>

              <div class="row">
                <div class="col s3">
                  <label>
                    <b>
                      Somnia
                    </b>
                  </label><br>
                  <label for="">
                    <p>
                      Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt.
                      Duis leo. Sed fringilla mauris
                    </p>
                  </label>
                </div>
                <div class="col s9">
                  <label>
                    <b>
                      Otros
                    </b>
                  </label><br>
                  <label for="">
                    <p>
                      Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt.
                      Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna.
                      Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,
                    </p>
                  </label>
                </div>
              </div>


              <div class="border-top border-bottom">
                <h6>3. Patologicos</h6>
              </div>
              <div class="row margin-top-element">
                <div class="col s3">
                  <label>
                    <b>
                      Infancia
                    </b>
                  </label><br>
                  <label for="">
                    <p>
                      Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt.
                      Duis leo. Sed fringilla mauris
                    </p>
                  </label>
                </div>
                <div class="col s3">
                  <label>
                    <b>
                      Adulto
                    </b>
                  </label><br>
                  <label for="">
                    <p>
                      Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt.
                      Duis leo. Sed fringilla mauris
                    </p>
                  </label>
                </div>
                <div class="col s3">
                  <label>
                    <b>
                      DBT
                    </b>
                  </label><br>
                  <label for="">
                    <p>
                      Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt.
                      Duis leo. Sed fringilla mauris
                    </p>
                  </label>
                </div>
                <div class="col s3">
                  <label>
                    <b>
                      HTA
                    </b>
                  </label><br>
                  <label for="">
                    <p>
                      Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt.
                      Duis leo. Sed fringilla mauris
                    </p>
                  </label>
                </div>
              </div>


              <div class="row">
                <div class="col s3">
                  <label>
                    <b>
                      TBC
                    </b>
                  </label><br>
                  <label for="">
                    <p>
                      Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt.
                      Duis leo. Sed fringilla mauris
                    </p>
                  </label>
                </div>
                <div class="col s3">
                  <label>
                    <b>
                      General
                    </b>
                  </label><br>
                  <label for="">
                    <p>
                      Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt.
                      Duis leo. Sed fringilla mauris
                    </p>
                  </label>
                </div>
                <div class="col s3">
                  <label>
                    <b>
                      Otras (especificar)
                    </b>
                  </label><br>
                  <label for="">
                    <p>
                      Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt.
                      Duis leo. Sed fringilla mauris
                    </p>
                  </label>
                </div>
                <div class="col s3">
                  <label>
                    <b>
                      Quirurgicos
                    </b>
                  </label><br>
                  <label for="">
                    <p>
                      Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt.
                      Duis leo. Sed fringilla mauris
                    </p>
                  </label>
                </div>
              </div>

              <div class="row">
                <div class="col s3">
                  <label>
                    <b>
                      Traumatologicos
                    </b>
                  </label><br>
                  <label for="">
                    <p>
                      Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt.
                      Duis leo. Sed fringilla mauris
                    </p>
                  </label>
                </div>
                <div class="col s3">
                  <label>
                    <b>
                      Alergias
                    </b>
                  </label><br>
                  <label for="">
                    <p>
                      Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt.
                      Duis leo. Sed fringilla mauris
                    </p>
                  </label>
                </div>
                <div class="col s3">
                  <label>
                    <b>
                      Otros
                    </b>
                  </label><br>
                  <label for="">
                    <p>
                      Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt.
                      Duis leo. Sed fringilla mauris
                    </p>
                  </label>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
 </div>
</div>
<!-- Modal Trigger -->
<!-- <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a> -->

<!-- Modal Structure -->
<div id="modalAccesoHistorial" class="modal">
  <div class="modal-content">
    <h4>Modal Headerasdasdasd</h4>
    <p>A bunch of text</p>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
  </div>
</div>

@endsection
<script type="text/javascript">




</script>
