@extends('layouts.material')
@section('content')
<style media="screen">
  .bottom-row{
    margin-left: -120px !important;
    width: 760px !important;
  }
  .chev{
    margin-top: -10px !important;
    margin-left: 590px !important;
  }
</style>

<div id="pago" class="content-add-pago">
    <ul id="tabs-swipe-demo" class="tabs">
      <li class="tab col s4"><a onclick="limpiarSwipe()" class="active" href="#test-swipe-2"><b>CUPONES - PROMOCIONES</b></a></li>
      <li class="tab col s4"><a onclick="limpiarSwipe()" class="" href="#test-swipe-4"><b>MIS MONEDAS</b></a></li>
      <li class="tab col s4"><a class="" href="#test-swipe-3"><b>MIS TARJETAS DE CRÉDITO / DEBITO</b></a></li>
    </ul>
    <div id="test-swipe-2" class="col s12 background-white">
      <div class="row padding-element">
        <div class="col s6">
          <div class="row">
            <div class="border-bottom center">
              <h6>CUPONES ACTIVOS</h6>
            </div>

            <div class="row cupon-activo">
              <div class="col s5">
                <img src="http://vexservers.com/MFE/dist/assets/images/icons/cupon_promo.png" alt=""> <br>
                <span>Cupon general E30201S</span>
              </div>
              <div class="col s4">

              </div>
              <div class="col s3">
                <p>2d:20min</p>
              </div>
            </div>
            <div class="row cupon-activo">
              <div class="col s5">
                <img src="http://vexservers.com/MFE/dist/assets/images/icons/cupon_promo.png" alt=""> <br>
                <span>Cupon general E30201S</span>
              </div>
              <div class="col s4">
              </div>
              <div class="col s3">
                <p>2d:20min</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col s6">
          <div class="row">
            <div class="border-bottom center">
              <h6>CUPONES VENCIDOS</h6>
            </div>

            <div class="row cupon-vencido">
              <div class="col s5">
                <span>
                  <img src="https://cdn3.iconfinder.com/data/icons/discount-and-promotion/500/Promotion_Blood_Vessel-512.png" alt="" width="64px">
                  <!-- <i style="font-size: 50px !important" class="material-icons icon-color">receipt</i> -->
                </span><br>
                <!-- <img src="http://vexservers.com/MFE/dist/assets/images/icons/cupon_promo.png" alt=""> <br> -->
                <span>Cupon general E30201S</span>
              </div>
              <div class="col s4">
              </div>
              <div class="col s3">
                <p>14 Feb 2018</p>
              </div>
            </div>
            <div class="row cupon-vencido">
              <div class="col s5">
                <span>
                  <img src="https://cdn3.iconfinder.com/data/icons/discount-and-promotion/500/Promotion_Blood_Vessel-512.png" alt="" width="64px">
                  <!-- <i style="font-size: 50px !important"  class="material-icons icon-color">receipt</i> -->
                </span><br>
                <!-- <img src="http://vexservers.com/MFE/dist/assets/images/icons/cupon_promo.png" alt=""> <br> -->
                <span>Cupon general E30201S</span>
              </div>
              <div class="col s4">
              </div>
              <div class="col s3">
                <p>14 Feb 2018</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="test-swipe-3" class="col s12 background-white">
      <div class="row" style="row padding-element">
              <ul class="collapsible without-margin-top" data-collapsible="accordion">
                <li id="creditcard1">
                  <div class="collapsible-header">
                    <div class="col s1">
                      <img src="http://vexservers.com/MFE/dist/assets/images/icons/visa.png" width="50px" height="50px">
                    </div>
                    <div class="col s3">
                      <p class="label-credit-card">
                        **** **** **** 5485
                      </p>
                    </div>
                    <div class="col s4">
                    </div>
                    <div class="col s2">
                      <!-- <a id="creditcard1" href="/user-edit-creditCard"  class="waves-effect btn btn-color" style=" background-color: #868686">EDITAR</a> -->
                    </div>
                    <div class="col s2">
                      <a id="eliminarTarjeta" onclick="mod()" href="#modal1" class="modal-trigger">
                        <i class="material-icons icon-delete" style="font-size:24px !important">delete</i>
                      </a>
                    </div>
                    <div id="modal1" class="modal">

                      <div class="modal-cabecera">
                        <div class="row">
                          <div class="col s6">
                            <div class="left title-modal" style="padding-left: 10px;">
                              <h5 class="color-white" style="font-size: 20px;"> <b>Eliminar Tarjeta de Crédito / Débito</b> </h5>
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
                        <p style="font-size: 18px;">¿Desea Eliminar la Tarjeta de Crédito / Débito?</p>
                      </div>

                      <div class="modal-pie right">
                        <div class="right">
                          <a href="" onclick="eliminarTarjeta(this)" class="modal-action modal-close btn button-green">Si</a>
                          <a class="modal-action modal-close btn" style="background-color: #e22715">No</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="collapsible-body">
                    <div class="row">
                      <div class="col s4" style="text-align: left">
                        <div class="row padding-bottom-element">
                          <div class="col s2">
                            <span>
                              <i class="material-icons icon-color">payment</i>
                            </span>
                          </div>
                          <div class="col s10">
                            <span>**** **** **** 5485</span><br>
                            <label for="">Número de tarjeta</label><br>
                          </div>
                        </div>

                        <div class="row padding-bottom-element">
                          <div class="col s2">
                            <span>
                              <i class="material-icons icon-color">date_range</i>
                            </span>
                          </div>
                          <div class="col s10">
                            <span>10/2022</span><br>
                            <label for="">Fecha de expiración</label>
                          </div>
                        </div>

                        <div class="row padding-bottom-element">
                          <div class="col s2">
                            <span>
                              <i class="material-icons icon-color">vpn_key</i>
                            </span>
                          </div>
                          <div class="col s10">
                            <span>***</span> <br>
                            <label>CVV (Código de verificación)</label>
                          </div>
                        </div>
                        <div class="row left">
                          <div class="col s12">
                            <a href="/user-edit-creditCard" class="modal-trigger waves-effect btn button-green format">Editar</a>
                          </div>
                        </div>
                      </div>
                      <!-- <div class="col s8">
                        <form class="col s12" name="form_paciente_edit_card" ng-app="app_paciente_edit_card" ng-controller="validateCtrl">
                            <div class="row">
                               <div class="input-field col s6">
                                 <i class="material-icons prefix icon-color">credit_card</i>
                                 <input id="credit_card" type="text" name="credit_card" maxlength="20" ng-maxlength="20" ng-model="credit_card"  class="validate" required>
                                 <label style="font-size: 14px; font-family: 'Ubuntu', sans-serif;position: absolute;" for="password">Numero de tarjeta *</label>

                               </div>
                               <div class="input-field col s6">
                                 <i class="material-icons prefix icon-color"lock>date_range</i>
                                 <input id="exp" name="exp" maxlength="7" ng-model="exp" type="text" class="validate" required>
                                 <label style="font-size: 14px; font-family: 'Ubuntu', sans-serif;position: absolute;" for="password">Expiración *</label>

                               </div>
                            </div>
                            <div class="row">
                              <div class="input-field col s6">
                                <i class="material-icons prefix icon-color">lock</i>
                                <input id="cvv" onkeypress="return isNumberKey(event)" name="cvv" max="999" ng-model="cvv" maxlength="3" type="text" ng-maxlength="3" class="validate" required>
                                <label style="font-size: 14px; font-family: 'Ubuntu', sans-serif;position: absolute;" for="password">CVV *</label>

                              </div>
                              <div class="input-field col s6">
                                  <i class="material-icons prefix icon-color" >location_on</i>
                                  <select class="validate">
                                    <option value="1">Peru</option>
                                    <option value="2">Ecuador</option>
                                    <option value="3">Argentina</option>
                                    <option value="4">Chile</option>
                                    <option value="5">Otro</option>
                                  </select>
                              </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="col s4">

                              </div>
                              <div class="col s4">
                                <a id="editar" onclick="mod()" href="/user-pagos" class="waves-effect btn modal-trigger" style="display:block; background-color: #868686; width: 100%">GUARDAR CAMBIOS</a>
                              </div>
                              <div class="col s4">

                              </div>
                            </div>
                          </form>
                      </div> -->
                    </div>
                  </div>
                </li>
                <li id="creditcard2">
                  <div class="collapsible-header">
                    <!-- <i class="material-icons">payment</i> -->
                    <div class="col s1">
                      <img src="http://vexservers.com/MFE/dist/assets/images/icons/mastercard.png" width="50px" height="50px">
                    </div>
                    <div class="col s3">
                      <p class="label-credit-card">
                        **** **** **** 5485
                      </p>
                    </div>
                    <div class="col s4">
                    </div>
                    <div class="col s2">
                      <!-- <a id="creditcard1" href="/user-edit-creditCard"  class="waves-effect btn btn-color" style=" background-color: #868686">EDITAR</a> -->
                    </div>
                    <div class="col s2">
                      <a id="eliminarTarjeta" onclick="modEliminar()" href="#modalEliminar" class="modal-trigger">
                        <i class="material-icons icon-delete" style="font-size:24px !important">delete</i>
                      </a>
                    </div>
                    <div id="modalEliminar" class="modal">
                      <div class="modal-content">
                        <h4>Desea eliminar tarjeta de crédito</h4>
                      </div>
                      <div class="modal-footer">
                        <a href="#!" onclick="eliminarTarjeta(this)" class="modal-action modal-close waves-effect waves-green btn-flat">Si</a>
                      </div>
                    </div>
                  </div>
                  <div class="collapsible-body">
                    <div class="row">
                      <div class="col s4" style="text-align: left">
                        <div class="row padding-bottom-element">
                          <div class="col s2">
                            <span>
                              <i class="material-icons icon-color">payment</i>
                            </span>
                          </div>
                          <div class="col s10">
                            <span>**** **** **** 5485</span><br>
                            <label for="">Número de tarjeta</label><br>
                          </div>
                        </div>

                        <div class="row padding-bottom-element">
                          <div class="col s2">
                            <span>
                              <i class="material-icons icon-color">date_range</i>
                            </span>
                          </div>
                          <div class="col s10">
                            <span>10/2022</span><br>
                            <label for="">Fecha de expiración</label>
                          </div>
                        </div>

                        <div class="row padding-bottom-element">
                          <div class="col s2">
                            <span>
                              <i class="material-icons icon-color">vpn_key</i>
                            </span>
                          </div>
                          <div class="col s10">
                            <span>***</span> <br>
                            <label>CVV (Código de verificación)</label>
                          </div>
                        </div>
                        <div class="row left">
                          <div class="col s12">
                            <a href="/user-edit-creditCard" class="modal-trigger waves-effect btn button-green format">Editar</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li id="creditcard3">
                  <div class="collapsible-header">
                    <!-- <i class="material-icons">payment</i> -->
                    <div class="col s1">
                      <img src="{{ asset('assets/images/americans.png') }}" width="50px" height="50px">
                    </div>
                    <div class="col s3">
                      <p class="label-credit-card">
                        **** **** **** 5485
                      </p>
                    </div>
                    <div class="col s4">
                    </div>
                    <div class="col s2">
                      <!-- <a id="creditcard1" href="/user-edit-creditCard"  class="waves-effect btn btn-color" style=" background-color: #868686">EDITAR</a> -->
                    </div>
                    <div class="col s2">
                      <a id="eliminarTarjeta" onclick="modEliminar()" href="#modalEliminar" class="modal-trigger">
                        <i class="material-icons icon-delete" style="font-size:24px !important">delete</i>
                      </a>
                    </div>
                    <div id="modalEliminar" class="modal">
                      <div class="modal-content">
                        <h4>Desea eliminar tarjeta de crédito</h4>
                      </div>
                      <div class="modal-footer">
                        <a href="#!" onclick="eliminarTarjeta(this)" class="modal-action modal-close waves-effect waves-green btn-flat">Si</a>
                      </div>
                    </div>
                  </div>
                  <div class="collapsible-body">
                    <div class="row">
                      <div class="col s4" style="text-align: left">
                        <div class="row padding-bottom-element">
                          <div class="col s2">
                            <span>
                              <i class="material-icons icon-color">payment</i>
                            </span>
                          </div>
                          <div class="col s10">
                            <span>**** **** **** 5485</span><br>
                            <label for="">Número de tarjeta</label><br>
                          </div>
                        </div>

                        <div class="row padding-bottom-element">
                          <div class="col s2">
                            <span>
                              <i class="material-icons icon-color">date_range</i>
                            </span>
                          </div>
                          <div class="col s10">
                            <span>10/2022</span><br>
                            <label for="">Fecha de expiración</label>
                          </div>
                        </div>

                        <div class="row padding-bottom-element">
                          <div class="col s2">
                            <span>
                              <i class="material-icons icon-color">vpn_key</i>
                            </span>
                          </div>
                          <div class="col s10">
                            <span>***</span> <br>
                            <label>CVV (Código de verificación)</label>
                          </div>
                        </div>
                        <div class="row left">
                          <div class="col s12">
                            <a href="/user-edit-creditCard" class="modal-trigger waves-effect btn button-green format">Editar</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>

                <li id="creditcard4">
                  <div class="collapsible-header">
                    <!-- <i class="material-icons">payment</i> -->
                    <div class="col s1">
                      <img src="{{ asset('assets/images/dinners.png') }}" width="50px" height="50px">
                    </div>
                    <div class="col s3">
                      <p class="label-credit-card">
                        **** **** **** 5485
                      </p>
                    </div>
                    <div class="col s4">
                    </div>
                    <div class="col s2">
                      <!-- <a id="creditcard1" href="/user-edit-creditCard"  class="waves-effect btn btn-color" style=" background-color: #868686">EDITAR</a> -->
                    </div>
                    <div class="col s2">
                      <a id="eliminarTarjeta" onclick="modEliminar()" href="#modalEliminar" class="modal-trigger">
                        <i class="material-icons icon-delete" style="font-size:24px !important">delete</i>
                      </a>
                    </div>
                    <div id="modalEliminar" class="modal">
                      <div class="modal-content">
                        <h4>Desea eliminar tarjeta de crédito</h4>
                      </div>
                      <div class="modal-footer">
                        <a href="#!" onclick="eliminarTarjeta(this)" class="modal-action modal-close waves-effect waves-green btn-flat">Si</a>
                      </div>
                    </div>
                  </div>
                  <div class="collapsible-body">
                    <div class="row">
                      <div class="col s4" style="text-align: left">
                        <div class="row padding-bottom-element">
                          <div class="col s2">
                            <span>
                              <i class="material-icons icon-color">payment</i>
                            </span>
                          </div>
                          <div class="col s10">
                            <span>**** **** **** 5485</span><br>
                            <label for="">Número de tarjeta</label><br>
                          </div>
                        </div>

                        <div class="row padding-bottom-element">
                          <div class="col s2">
                            <span>
                              <i class="material-icons icon-color">date_range</i>
                            </span>
                          </div>
                          <div class="col s10">
                            <span>10/2022</span><br>
                            <label for="">Fecha de expiración</label>
                          </div>
                        </div>

                        <div class="row padding-bottom-element">
                          <div class="col s2">
                            <span>
                              <i class="material-icons icon-color">vpn_key</i>
                            </span>
                          </div>
                          <div class="col s10">
                            <span>***</span> <br>
                            <label>CVV (Código de verificación)</label>
                          </div>
                        </div>
                        <div class="row left">
                          <div class="col s12">
                            <a href="/user-edit-creditCard" class="modal-trigger waves-effect btn button-green format">Editar</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
              <br>
              <div class="row" style="text-align: center">
                <div class="col s4">
                </div>
                <div class="col s4">
                  <a id="editar" onclick="mod2()" href="#modal2" class="waves-effect btn modal-trigger format" style="background-color: #868686; width: auto">Agregar método de pago</a>
                </div>
                <div class="col s4">
                </div>
              </div>
          <div id="modal2" class="modal">

            <div class="modal-cabecera">
              <div class="row">
                <div class="col s6">
                  <div class="left title-modal" style="padding-left: 10px;">
                    <h5 class="color-white" style="font-size: 20px;"> <b>Seleccione un método de pago</b> </h5>
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

              <div class="modal-content ">

                <div class="row">

                  <div class="col s12" style="text-align: left">
                    <div class="row tarjeta-credito">
                      <div class="col s1">
                        <img src="{{ asset('assets/images/credit_card.png') }}" width="30px" height="30px">
                      </div>
                      <div class="col s10">
                        <a class="linK-color-balck" href="/user-pagos-credit-card" style="margin-top: 10px">
                          Tarjeta de Crédito / Débito
                        </a>
                      </div>
                    </div>
                    <div class="row tarjeta-credito">
                      <div class="col s1">
                        <img src="{{ asset('assets/images/mastercard.png') }}" width="30px" height="20px">
                      </div>
                      <div class="col s10">
                        <a class="linK-color-balck" href="/user-pagos-credit-card" style="margin-top: 10px">
                          Tarjeta de Crédito / Débito
                        </a>
                      </div>
                    </div>
                    <div class="row tarjeta-credito">
                      <div class="col s1">
                        <img src="{{ asset('assets/images/americans.png') }}" width="30px" height="25px">
                      </div>
                      <div class="col s10">
                        <a class="linK-color-balck" href="/user-pagos-credit-card" style="margin-top: 10px">
                          Tarjeta de Crédito / Débito
                        </a>
                      </div>
                    </div>
                    <div class="row tarjeta-credito">
                      <div class="col s1">
                        <img src="{{ asset('assets/images/dinners.png') }}" width="30px" height="30px">
                      </div>
                      <div class="col s10">
                        <a class="linK-color-balck" href="/user-pagos-credit-card" style="margin-top: 10px">
                          Tarjeta de Crédito / Débito
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal-pie right">
                <div class="right">
                  <br><br>
                  <!-- <button type="button" name="button" class="modal-action modal-close btn button-orange format">Cancelar</button> -->
                </div>
              </div>
            </div>
          </div>
    </div>
    <div id="test-swipe-4" class="col s12 background-white">
      <div class="row padding-element">
        <div class="col s12 center">
          <div class="row">
            <i class="material-icons icon-monedas">monetization_on</i><br>
            <label class="cont-monedas">400</label><br>
            <span class="label-monedas">Monedas Disponibles</span>
            <!-- <span class="label-monedas"></span> -->
          </div>
          <div class="row">

              <div class="dataTables_wrapper form-inline dt-material center" style="padding-left:30%;">
                <table id="tableMonedas" class="bordered">
                  <thead>
                    <tr>
                      <th>Monto</th>
                      <th>Fecha</th>
                      <th>Concepto</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>

          </div>
        </div>

        <!-- <div class="col s6 center">
          <div class="row">
            <i class="material-icons icon-monedas">money_off</i><br>
            <span class="label-monedas">Monedas gastadas: </span>
            <span class="label-monedas">400</span>
          </div>
          <div class="row">

          </div>
        </div> -->

      </div>
    </div>
</div>


@endsection
<script type="text/javascript">

function mod(){
  $('#modal1').modal();
}

function modEliminar(){
  $('#modalEliminar').modal();
}

function modEliminarPaypal(){
  $('#modalEliminarPaypal').modal();
}

function mod2(){
  $('#modal2').modal();
}
function eliminarTarjeta(element){
  element.parentElement.parentElement.parentElement.style.display = 'none';
}
function eliminarTarjetaPaypal(element){
  element.parentElement.parentElement.parentElement.parentElement.parentElement.style.display = 'none';
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
