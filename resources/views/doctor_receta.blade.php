@extends('layouts.material-medico')
@section('content')
<div id="receta" class="section-receta">
  <div class="row">
    <div class="col s8" style="padding-right: 3px;padding-left: 0px">

      <ul id="tabs-swipe-demo" class="tabs" style="width: 100% ">
        <li class="tab col s6"><a onclick="limpiarRecetaLS()" class="active" href="#recetas"><b>RECETAS DEL PACIENTE</b></a></li>
        <li class="tab col s6"><a class="" href="#emitir-receta"><b>EMITIR RECETA</b></a></li>
      </ul>
    </div>
    <div class="col s4" style="background-color: #f5f5f5; height: 50px;">
      &nbsp;
    </div>
  </div>
  <div id="emitir-receta">
    <div class="row background-white">
      <div class="col s12">
        <div class="row align-center margin-top-element">
          <h6>RECETA DEL PACIENTE</h6>
        </div>
        <div class="row margin-top-element margin-bottom-element">
          <div class="col s12">
            <div class="row">

              <div class="col s6">
                <div class="left chip chip-color"  style="margin-left: 20px;">
                  <img src="{{ asset('assets/images/usuario_chat.jpg') }}" alt="Contact Person">
                  <!-- <img src="{{ asset('assets/images/user_chat.jpg') }}" alt="Contact Person"> -->
                  John Doe
                </div>
              </div>

              <div class="col s6 right" style="padding-left: 390px;">
                <!-- <a href="doctor-historial-medico" class="waves-effect btn btn-color" style="background-color: #868686">Ver Historial</a> -->
                <!-- &nbsp; -->
                <!-- <a onclick="agregarMedicamento()" class="modal-trigger waves-effect btn btn-color" style="background-color: #868686">Agregar</a> -->
              </div>
            </div>
           <div class="row lista-medicamentos" style="padding-left: 30px;padding-right: 60px">
             <ol id="lista-medicamentos" class="collapsible" data-collapsible="accordion">

             </ol>
           </div>
           <div class="col s12">
             <div class="row">

               <div class="col s12">
                 <div class="row" style="margin-top: 20px">
                   <div class="input-field col s8">
                     <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="medicamento" name="medicamento" class="autocomplete" type="text" class="validate">
                     <label for="autocomplete-input">Medicamento</label>
                   </div>
                   <div class="col s2" style="padding-top: 13px;">
                     <div class="col s3">
                       <p>cada</p>
                     </div>
                     <div class="col s4">
                       <input id="horaMedicamento" type="number" name="horaMedicamento">
                     </div>
                     <div class="col s3" style="padding-left: 0px;">
                       <p>horas</p>
                     </div>
                   </div>
                   <div class="col s2" style="padding-top: 13px;">
                     <div class="col s3">
                       <p>por</p>
                     </div>
                     <div class="col s4">
                       <input id="diasMedicamento" type="number" name="diasMedicamento">
                     </div>
                     <div class="col s3" style="padding-left: 0px;">
                       <p>
                         días
                       </p>
                     </div>

                   </div>
                 </div>

                 <div class="input-field col s12">
                   <textarea onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="especificacion" name="especificacion" class="materialize-textarea" style="min-height: 3rem"></textarea>
                   <label for="especificacion">Especificaciones</label>
                 </div>
                 <div class="margin-top-element center row">
                   <div class="col s2 left">
                     <a onclick="agregarMedicamento()" class="format modal-trigger waves-effect btn btn-color" style="background-color: #868686">Agregar</a>
                   </div>
                   <div class="col s7">

                   </div>
                   <div class="col s3">
                     <div class="col s12" id="btnGenerar" style="display: none">
                       <a onclick="modReceta();" href="#modalReceta" class="format modal-trigger waves-effect btn btn-color" style="background-color: #868686">Generar Receta</a>
                     </div>
                   </div>
                 </div>
                 <!-- BTN AGREGGAR MEDICAMENTO -->
                 <!-- <div class="row center margin-top-element">
                   <div class="col s2">
                   </div>
                   <div class="col s8" id="btnGenerar" style="display: none">
                     <a onclick="modReceta()" href="#modalReceta" class="modal-trigger waves-effect btn btn-color" style="background-color: #868686">Generar Receta</a>
                   </div>
                   <div class="col s4 right">
                   </div>
                   <div class="col s2">
                   </div>
                 </div> -->
                 <!-- BTN AGREGGAR MEDICAMENTO END-->

                 <ul class="collapsible" data-collapsible="accordion">
                   <li>
                     <div class="collapsible-header row margin-top-element center">  <h5>Resumen análisis clínico</h5> &nbsp;<p><i class="material-icons">arrow_drop_down</i></p> </div>
                     <div class="collapsible-body">
                       <div class="row">
                         <div class="col s4">
                           <h6>EXAMEN FISICO</h6>
                           <label>Color: </label><label>Ambarino</label><br>
                           <label>aspecto: </label><label>Limpido</label><br>
                           <label>Sedimento: </label><label>Regular Cantidad</label><br>
                           <label>Densidad: </label><label>1</label><br>
                         </div>
                         <div class="col s4">
                           <h6>EXAMEN QUIMICO</h6>
                           <label>PH: </label><label>Ambarino</label><br>
                           <label>Proteinas: </label><label>Limpido</label><br>
                           <label>Cetona: </label><label>Regular Cantidad</label><br>
                           <label>Uronilinogeno: </label><label>1</label><br>
                           <label>Bilirubina: </label><label>Ambarino</label><br>
                           <label>Mitritos: </label><label>Limpido</label><br>
                           <label>Hemoglobina: </label><label>Regular Cantidad</label><br>
                         </div>
                         <div class="col s4">
                           <h6>SEDIMENTO MICROSCÓPICO</h6>
                           <label>Leucocitos: </label><label>Ambarino</label><br>
                           <label>Piuria: </label><label>Limpido</label><br>
                           <label>Celulas epiteliales: </label><label>Regular Cantidad</label><br>
                           <label>Hematies: </label><label>1</label><br>
                           <label>Cilindros: </label><label>Ambarino</label><br>
                           <label>Cristales: </label><label>Limpido</label><br>
                           <label>Mucus: </label><label>Regular Cantidad</label><br>
                           <label>Gérmenes: </label><label>1</label><br>
                         </div>
                       </div>
                     </div>
                   </li>
                 </ul>
               </div>
             </div>
             <div class="row">
               <div class="col s2">
               </div>
               <div class="col s8 left">
                 <!-- <a onclick="agregarMedicamento()" class="modal-trigger waves-effect btn btn-color" style="background-color: #868686">Agregar</a> -->
               </div>
               <div class="col s2">
               </div>
             </div>
           </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="recetas">
    <div class="row background-white">
      <div class="col s12 m12" style="padding-left: 0px; padding-right: 0px">
        <div class="row content-inside">

          <div class="row padding-element">
            <div class="col s12 m12">
                <div class="dataTables_wrapper form-inline dt-material">
                  <!-- <div style="position:absolute; margin-top: -60px; margin-left: 1005px;">
                    <i class="material-icons" style="color:#adadad">search</i>
                  </div> -->
                    <table id="tableReceta" class="bordered" style="width: 100% !important">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Resumen Receta</th>
                              <th>Sintoma</th>
                              <th>Paciente</th>
                              <th>Fecha</th>
                              <th>Acción</th>
                          </tr>
                      </thead>
                      <tbody>

                      </tbody>
                  </table>
                </div>
                  <!-- <div class="row" style="text-align: right">
                    <a class="waves-effect btn" style=" background-color: #868686; width: 100%">AGREGAR METODO DE PAGO</a>
                  </div> -->
            </div>
         </div>

         </div>
      </div>
      </div>
   </div>
  </div>

</div>
<div id="modalReceta" class="modal" style="background-color: #FFFFFF">

  <!-- <div class="modal-head align-right border-bottom">
    <a class="waves-effect modal-action modal-close"><i class="material-icons right icon-color button-cancel" style="">cancel</i></a>
  </div> -->

  <div class="modal-cabecera">
    <div class="row">
      <div class="col s6">
        <div class="left title-modal" style="padding-left: 10px;">
          <h5 class="color-white" style="font-size: 20px;"> <b>Receta Médica</b> </h5>
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

  <div class="modal-content padding">
    <div class="row cabecera-detalle">
      <div class="col s4 align-center">
        <img src="{{ asset('assets/images/logo_mifarma.jpg') }}" width="150px" alt="">
        <p><b>CENTRO DE ATENCION AL PACIENTE - MIFARMA</b></p>
      </div>
      <div class="col s4">
      </div>
      <div class="col s4 cabecera-datos">
        <span class="receta-name-doctor">Alejandro T.</span><br>
        <span>Medico Gastroenterólogo</span><br>
        <!-- <span>CODIGO: 458 254</span><br> -->
        <span><b>FECHA:</b></span><br>
        <span>12/05/2017</span><br>
        <span><b>NOMBRE DEL PACIENTE</b></span><br>
        <span>Juan Rodriguez valenzuela</span><br>
        <!-- <span><b>EDAD</b></span><br> -->
        <!-- <span>30</span><br> -->
        <!-- <span><b>SEXO</b></span><br> -->
        <!-- <span>Masculino</span><br> -->
      </div>
    </div>

    <div class="row contenido-detalle">
      <div class="col s12">
        <span><b>Gastroenteritis Aguda</b></span>
      </div>
      <div class="row">
        <div class="col s8">
          <ol>
            <li>
              <p>Medicamento 1</p>
              <span>Tomar 1 cápsula cada 24 horas por 7 días</span>
            </li>
            <li>
              <p>Medicamento 2</p>
              <span>Tomar una cápsula cada 8 horas por 5 días</span>
            </li>
            <li>
              <p>
                Guardar reposo total por 4 días
              </p>
            </li>
          </ol>
        </div>
        <div class="col s4" style="text-align: center">

          <!-- <img src="http://4.bp.blogspot.com/_iFFqUBkgqDU/SyUjOU8_VSI/AAAAAAAAAlM/MwIs1UhwL7s/s400/sello+col+medi+fam+ourense.jpg" alt="" width="150px"> -->
          <!-- <hr> -->

          <!-- <span>Alejandro T.</span><br>
          <span>Medico Gastroenterólogo</span> -->
        </div>
      </div>
    </div>

    <!-- <div class="row footer-detalle">
      <div class="col s12">
        <span>CENTRO DE ESPECIALIDADES MEDICAS - MIFARMA</span>
      </div>
    </div> -->

    <!-- <div class="row buttons-detalle">

      <div class="col s4">
        <a class="waves-effect waves-light btn button-green"><i class="material-icons left">local_printshop</i>Imprimir</a>
      </div>
      <div class="col s4">
        <a onclick="limpiarRecetaLS()" href="doctor-receta" class="waves-effect waves-light btn button-green"><i class="material-icons left">send</i>Guardar y enviar</a>
      </div>
      <div class="col s4" style="text-align: right">
        <a class="waves-effect waves-light btn button-orange"><i class="material-icons left">file_download</i>Descargar</a>
      </div>

    </div> -->
  </div>
  <div class="modal-pie right">
    <div class="right">
      <a class="waves-effect waves-light btn button-green"><i class="material-icons left">local_printshop</i>Imprimir</a>

      <a onclick="limpiarRecetaLS()" href="doctor-receta" class="waves-effect waves-light btn button-green"><i class="material-icons left">send</i>Guardar y enviar</a>

      <a class="waves-effect waves-light btn button-orange"><i class="material-icons left">file_download</i>Descargar</a>

      <!-- <button type="button" name="button" class="btn button-green format">Ver receta</button> -->
    </div>
  </div>
</div>
<div id="modalEnvioReceta" class="modal">

  <div class="modal-cabecera">
    <div class="row">
      <div class="col s6">
        <div class="left title-modal" style="padding-left: 10px;">
          <h5 class="color-white" style="font-size: 20px;"> <b>Enviar Receta</b> </h5>
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

  <div class="modal-content padding">
    <div class="row">
      <div class="col s12 center">
        <h5>¿Desea Enviar la receta?</h5>
      </div>
    </div>
    <div class="row">
      <div class="col s4">
      </div>
      <div class="col s4 center">
        <label for=""><b>Paciente: </b>Pedro Urbina</label>
      </div>
      <div class="col s4">
      </div>
    </div>
    <div class="row margin-top-element">

    </div>
  </div>
  <div class="modal-pie right">
    <div class="right">
      <a href='' class='waves-effect btn btn-color' style='background-color: #868686; width: auto'>SI</a>
      &nbsp;
      <a onclick='modReceta()' href='#modalReceta' class='modal-trigger waves-effect btn btn-color' style='background-color: #e22715; width: auto'>NO</a>
    </div>
  </div>
</div>
@endsection

<script type="text/javascript">

  var contMedicamento = 1;
  function agregarMedicamento(){
    // console.log(document.getElementById("lista-medicamentos"));
    var medicamento = document.getElementById("medicamento").value;
    var especificacion = document.getElementById("especificacion").value;
    var divReceta = document.getElementById("lista-medicamentos");
    var diasMedicamento = document.getElementById("diasMedicamento").value;
    var horaMedicamento = document.getElementById("horaMedicamento").value;
    var tiempoMedicamento = diasMedicamento +horaMedicamento;
    if (diasMedicamento != '' && horaMedicamento != '') {
      console.log('afsfsa')
      tiempoMedicamento = '. Cada ' +horaMedicamento+ ' horas ' + 'por ' + diasMedicamento +' dias';
    }
    if (medicamento!='' && especificacion!='') {
      var btnGenerar = document.getElementById("btnGenerar")
      btnGenerar.style.display = 'block'
        divReceta.innerHTML += ''

        +'<li>'

            +'<div class="collapsible-header">'
              + medicamento
            +'</div>'


          +'<div class="collapsible-body"><span>'+especificacion+tiempoMedicamento+'</span></div>'
        +'</li>'

        // +'<div id="itemReceta" class="row" style="padding-left:20px;padding-right:20px;padding-top:10px;">'
        // +'<div class="">'
        // +'</div>'
        // +'<div class="col s12">'
        // +'<div class="row" style=" text-align: left; margin-bottom: 8px;">'
        // +'<div class="col s3" style="background-color:#f5f4f3;  padding: 8px; border-radius:10px; width:auto">'
        // + contMedicamento+'. '+ medicamento
        // +'</div>'
        // +'</div>'
        // +'<div class="row" style="text-align: justify;">'
        // +'<div class="col s12" style="background-color:#f5f4f3; margin-top: 2px;  padding: 8px; border-radius:10px;">'
        // +'<p style="text-justify">'
        // +especificacion+tiempoMedicamento
        // +'</p>'
        // +'</div>'
        // +'</div>'
        // +'</div>'
        // +'<div class="">'
        // +'</div>'
        // +'</div>';
    }
    contMedicamento++;
  }

  // MODAL

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
    document.getElementById("receta").style.paddingLeft = '4%';
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
    document.getElementById("receta").style.paddingLeft = '2%';
  }
</script>
