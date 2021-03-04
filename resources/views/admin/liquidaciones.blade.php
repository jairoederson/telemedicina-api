@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Form Elements
    @parent
    @stop

    {{-- page level styles --}}
    @section('header_styles')
    <link href="{{ asset('assets/css/pages/formelements.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}"/>
    <link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/pages/only_dashboard.css') }}"/>
    <link href="{{ asset('assets/vendors/sweetalert/css/sweetalert.css') }}" rel="stylesheet" type="text/css" />
@stop

{{-- Page content --}}
@section('content')

    <section class="content-header section-header">

        <div class="row">
          <div class="col-md-9">
            <h4 class="header-title">Liquidaciones</h4>
          </div>
          <div class="col-md-3">
            <div class="text-right" style="padding-top: 5px; padding-right: 5px">
              <a href="{{ route('admin.pagos.empresa.create') }}">
                <button type="button" class="format btn btn-format">Agregar Pago<div class="ripple-container"></div></button></a>
            </div>
          </div>
          <!--
          <div class="col-md-3"  style="display:none">
            <div class="form-group select-postulante" style="padding-right: 8px;">
              <select id="selPagos" name="pagos" onchange="this.form.action=this.value;" class="selector form-control">
                  <option>Pagos a personal</option>
                  <option>Pagos a empresas</option>
              </select>
            </div>
          </div>
          -->
        </div>

    </section>
    <!--section ends-->
    <section class="content">
      <!--main content-->
      <div class="row">
          <div class="panel panel-primary ">
              <!-- <div class="panel-heading">
                  <h4 class="panel-title"><i class="livicon" data-name="user" data-size="16" data-loop="true"
                                             data-c="#fff" data-hc="white"></i>
                      Pagos y liquidaciones
                  </h4>
              </div> -->
              <div class="panel-body">
                  <div id="pagos" class="table-responsive" style="display: none">
                      <table class="table table-bordered width100" id="tablePagos">
                          <thead>
                          <tr class="filters">
                            <th>Id</th>
                            <!-- <th>Usuario</th> -->
                            <th>Nombre Completo</th>
                            <th>Ranking</th>
                            <th>Monto</th>
                            <th>Concepto</th>
                            <th>Período</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                          </tr>
                          </thead>
                          <tbody>

                          </tbody>
                      </table>
                  </div>
                  <div class="table-responsive" >
                      <table class="table table-bordered width100" id="pagosEmpresas" >
                          <thead>
                          <tr class="filters">                            
                            <th>Empresa</th>
                            <th>Monto</th>
                            <th>Concepto</th>
                            <th>Año</th>
                            <th>Mes</th>
                            <th>Estado</th>
                            <th>Voucher</th>
                          </tr>
                          </thead>
                          <tbody>

                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>    <!-- row-->
      <!--main content ends-->
    </section>
    <!-- content -->
    <!-- MODAL SECTIONS -->

      <!-- MODAL VER PACIENTE -->
      <section id="verPagos" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="panel panel-primary" id="hidepanel1">
              <div class="panel-heading">
                <div class="modal-header">
                  <h3 class="panel-title">
                    <b>
                      Ver Pagos y Liquidaciones
                    </b>
                  </h3>
                </div>
                <div class="pull-right icon-close">
                  <a href="" data-dismiss="modal" style="font-family: 'Ubuntu', sans-serif !important;">
                    X
                  </a>
                </div>

              </div>
              <div class="panel-body">

                <div class="row border-bottom">

                  <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/images/medico.png') }}" class="img-form" alt="" width="80px">
                  </div>
                  <div class="col-md-10">
                    <h4><b>Responsable</b></h4>
                    <label>Juan Perez Olivarez</label><br>
                    <label>Médico Farmaceutico</label>
                  </div>
                </div>
                <div class="row">
                  <ul class="nav nav-tabs tabs-li" style="width: 100%">

                    <li class="col-md-6 active">
                      <a href="#pagGeneral" data-toggle="tab" aria-expanded="false">General<div class="ripple-container"></div></a>
                    </li>
                    <li class="col-md-6 active">
                      <a href="#historialPagos" data-toggle="tab" aria-expanded="false">General<div class="ripple-container"></div></a>
                    </li>

                    <li class="col-md-6">
                      <a href="#pagNota" data-toggle="tab" aria-expanded="false">Notas<div class="ripple-container"></div></a>
                    </li>

                  </ul>
                </div>
                <div class="tab-content">
                  <div id="pagGeneral" class="tab-pane fade active in">

                    <div class="items-cv">
                      <!-- formacion academica -->
                      <div class="row">
                        <h4><b>General</b></h4>
                        <ol>
                          <li><b>Monto: </b> S/. <label> 2000.00</label> </li>
                          <li><b>Concepto: </b> <label> Servicios en el Área de Medicina General</label> </li>
                          <li><b>Fecha de Pago: </b> <label> 30/10/2018</label> </li>
                        </ol>
                      </div>

                    </div>
                  </div>
                    <div id="historialPagos" class="tab-pane fade active in">
                        <div class="table-responsive">
                            <table class="table table-bordered width100" id="tablePaciente" >
                                <thead>
                                <tr class="filters">
                                  <th>Id</th>
                                  <th>Monto</th>
                                  <th>Concepto</th>
                                  <th>Usuario</th>
                                  <th>Fecha </th>

                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                  <div id="pagNota" class="tab-pane fade">
                    <div class="doc-postulantes">
                      <label class="nota-title"><b>Nueva Nota</b></label>
                      <div class="row">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label" for="notaContenido">Escriba una nota del pago</label>
                            <textarea  onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" class="form-control" id="notaContenido" maxlength="500" name="notaContenido" rows="3"></textarea>
                        </div>
                        <div class="text-right">
                          <button type="submit" onclick="guardarNota()" class="format btn btn-responsive btn-verde" style="margin:5px !important;vertical-align: middle;">Guardar Nota</button>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <label class="nota-title"><b>Mis Notas</b></label>
                        <ol id="misNotas" class="">
                        </ol>
                      </div>
                    </div>
                  </div>
                </div>
                <br>
              </div>
              <div class="panel-footer">
                <div class="modal-pie">
                  <div class=" text-right">
                    <div id="estadoPago" class="checkbox">
                        <label>
                            <input type="checkbox" value="">
                            <span class="check"></span>

                            &nbsp; Estado del Pago
                        </label>
                    </div>
                    <div id="estadoPagoN" class="checkbox">
                        <br><br><br>
                    </div>
                    <!-- <button type="submit" class="format btn btn-responsive btn-verde" style="margin:5px !important;vertical-align: middle;">Registrar</button> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- MODAL VER PACIENTE END -->

      <!-- MODAL EDITAR PACIENTE -->
      <section id="editarPagos" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="panel panel-primary" id="hidepanel1">
              <div class="panel-heading">
                <div class="modal-header">
                  <h3 class="panel-title">
                    <b>
                      Editar Pagos y Liquidaciones
                    </b>
                  </h3>
                </div>
                <div class="pull-right icon-close">
                  <a href="" data-dismiss="modal" style="font-family: 'Ubuntu', sans-serif !important;">
                    X
                  </a>
                </div>

              </div>
              <div class="panel-body">
                <form>
                  <fieldset>
                    <div class="col-md-12">
                      <!-- Name -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="nombres">Monto</label>
                        <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="nombres" name="nombres" type="text" class="format-input input-format form-control" value="2000.00">
                      </div>
                      <!-- Apellidos -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="apellidos">Concepto</label>
                        <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="apellidos" name="apellidos" type="text" class="format-input input-format form-control" value="Medicina General">
                      </div>
                      <!-- email -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="email">Fecha</label>
                        <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="email" name="email" type="text" class="format-input input-format form-control" value="02/05/2018">
                      </div>
                    </div>
                  </fieldset>
                </form>
              </div>
              <div class="panel-footer">
                <div class="modal-pie">
                  <div class=" text-right">
                    <button type="submit" class="format btn btn-responsive btn-verde" style="margin:5px !important;vertical-align: middle;">Guardar Cambios</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- MODAL EDITAR POSTULANTE -->

      <!-- MODAL ELIMINAR POSTULANTE -->
      <section id="eliminarPagos" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="panel panel-primary" id="hidepanel1">
              <div class="panel-heading">
                <div class="modal-header">
                  <h3 class="panel-title">
                    <b>Editar Finanzas
                      Eliminar Pago o Liquidación
                    </b>
                  </h3>
                </div>
                <div class="pull-right icon-close">
                  <a href="" data-dismiss="modal" style="font-family: 'Ubuntu', sans-serif !important;">
                    X
                  </a>
                </div>
              </div>
              <div class="panel-body">
                <!-- question -->
                <div class="row text-center">
                  <h4>¿Desea eliminar el pago?</h4>
                </div>
                <!-- options -->

              </div>
              <div class="panel-footer">
                <div class="modal-pie">
                  <div class=" text-right">
                    <button id="btnEliminarPagoSi" data-dismiss="modal" class='format btn-crud btn btn-verde'>
                      Si
                    </button>
                    &nbsp;
                    <button data-dismiss="modal" class='format btn-crud btn btn-naranja'>
                      No
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- MODAL EDITAR POSTULANTE -->


      <!-- MODAL VER PACIENTE EMPRESA -->
      <section id="verPagosEmpresa" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="panel panel-primary" id="hidepanel1">
              <div class="panel-heading">
                <div class="modal-header">
                  <h3 class="panel-title">
                    <b>
                      Ver Pagos y Liquidaciones
                    </b>
                  </h3>
                </div>
                <div class="pull-right icon-close">
                  <a href="" data-dismiss="modal" style="font-family: 'Ubuntu', sans-serif !important;">
                    X
                  </a>
                </div>

              </div>
              <div class="panel-body">

                <div class="row border-bottom">

                  <div class="col-md-2 text-center">
                    <img src="{{ asset('assets/images/asociado01.jpeg') }}" class="img-form" alt="" width="80px">
                  </div>
                  <div class="col-md-10">
                    <h4><b>Inmoviliaria Robles SAC.</b></h4>
                    <label><b>RUC: </b>258545252525</label><br>
                    <label><b>Contacto: </b>Juan Perez Olivarez</label><br>
                    <label><b>Telefono: </b>(01) 425541</label><br>
                    <label><b>Correo</b>robles@coorporacion.com</label>
                  </div>
                </div>
                <div class="row">
                  <ul class="nav nav-tabs tabs-li" style="width: 100%">

                    <li class="col-md-6 active">
                      <a href="#pagGeneralEmpresa" data-toggle="tab" aria-expanded="false">General<div class="ripple-container"></div></a>
                    </li>

                    <li class="col-md-6">
                      <a href="#pagNotaEmpresa" data-toggle="tab" aria-expanded="false">Notas<div class="ripple-container"></div></a>
                    </li>

                  </ul>
                </div>
                <div class="tab-content">
                  <div id="pagGeneralEmpresa" class="tab-pane fade active in">

                    <div class="items-cv">
                      <!-- formacion academica -->
                      <div class="row">
                        <h4><b>General</b></h4>
                        <ol>
                          <li><b>Monto: </b> S/. <label> 2000.00</label> </li>
                          <li><b>Concepto: </b> <label> Servicios en el Área de Medicina General</label> </li>
                          <li><b>Fecha de Pago: </b> <label> 30/10/2018</label> </li>
                        </ol>
                      </div>

                    </div>
                  </div>
                  <div id="pagNotaEmpresa" class="tab-pane fade">
                    <div class="doc-postulantes">
                      <label class="nota-title"><b>Nueva Nota</b></label>
                      <div class="row">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label" for="notaContenido">Escriba una nota del pago</label>
                            <textarea  onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" class="form-control" id="notaContenido" maxlength="500" name="notaContenido" rows="3"></textarea>
                        </div>
                        <div class="text-right">
                          <button type="submit" onclick="guardarNota()" class="format btn btn-responsive btn-verde" style="margin:5px !important;vertical-align: middle;">Guardar Nota</button>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <label class="nota-title"><b>Mis Notas</b></label>
                        <ol id="misNotas" class="">
                        </ol>
                      </div>
                    </div>
                  </div>
                </div>
                <br>
              </div>
              <div class="panel-footer">
                <div class="modal-pie">
                  <div class=" text-right">
                    <div id="estadoPago" class="checkbox">
                        <label>
                            <input type="checkbox" value="">
                            <span class="check"></span>

                            &nbsp; Estado del Pago
                        </label>
                    </div>
                    <div id="estadoPagoN" class="checkbox">
                    </div>
                    <!-- <button type="submit" class="format btn btn-responsive btn-verde" style="margin:5px !important;vertical-align: middle;">Registrar</button> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- MODAL VER PACIENTE END EMPRESA -->

      <!-- MODAL EDITAR PACIENTE EMPRESA -->
      <section id="editarPagosEmpresa" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="panel panel-primary" id="hidepanel1">
              <div class="panel-heading">
                <div class="modal-header">
                  <h3 class="panel-title">
                    <b>
                      Editar Pagos y Liquidaciones
                    </b>
                  </h3>
                </div>
                <div class="pull-right icon-close">
                  <a href="" data-dismiss="modal" style="font-family: 'Ubuntu', sans-serif !important;">
                    X
                  </a>
                </div>

              </div>
              <div class="panel-body">
                <form>
                  <fieldset>
                    <div class="col-md-12">
                      <!-- Name -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="nombres">Monto</label>
                        <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="nombres" name="nombres" type="text" class="format-input input-format form-control" value="2000.00">
                      </div>
                      <!-- Apellidos -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="apellidos">Concepto</label>
                        <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="apellidos" name="apellidos" type="text" class="format-input input-format form-control" value="Medicina General">
                      </div>
                      <!-- email -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="email">Fecha</label>
                        <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" id="email" name="email" type="text" class="format-input input-format form-control" value="02/05/2018">
                      </div>
                    </div>
                  </fieldset>
                </form>
              </div>
              <div class="panel-footer">
                <div class="modal-pie">
                  <div class=" text-right">
                    <button type="submit" class="format btn btn-responsive btn-verde" style="margin:5px !important;vertical-align: middle;">Guardar Cambios</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- MODAL EDITAR POSTULANTE EMPRESA -->

      <!-- MODAL ELIMINAR POSTULANTE EMPRESA-->
      <section id="eliminarPagosEmpresa" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="panel panel-primary" id="hidepanel1">
              <div class="panel-heading">
                <div class="modal-header">
                  <h3 class="panel-title">
                    <b>Editar Finanzas
                      Eliminar Pago o Liquidación
                    </b>
                  </h3>
                </div>
                <div class="pull-right icon-close">
                  <a href="" data-dismiss="modal" style="font-family: 'Ubuntu', sans-serif !important;">
                    X
                  </a>
                </div>
              </div>
              <div class="panel-body">
                <!-- question -->
                <div class="row text-center">
                  <h4>¿Desea eliminar el pago?</h4>
                </div>
                <!-- options -->

              </div>
              <div class="panel-footer">
                <div class="modal-pie">
                  <div class=" text-right">
                    <button id="btnEliminarPagoEmpresaSi" data-dismiss="modal" class='format btn-crud btn btn-verde'>
                      Si
                    </button>
                    &nbsp;
                    <button data-dismiss="modal" class='format btn-crud btn btn-naranja'>
                      No
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- MODAL EDITAR POSTULANTE EMPRESA -->

  <!-- MODAL SECTION END -->
    @stop

    {{-- page level scripts --}}
    @section('footer_scripts')

    <!-- InputMask -->
    <script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}" ></script>
    <!-- date-range-picker -->
    <script src="{{ asset('assets/js/pages/autogrow.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrap-maxlength/js/bootstrap-maxlength.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/card/lib/js/jquery.card.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/formelements.js') }}"  type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
<!--    <script type="text/javascript" src="{{ asset('assets/js/frontend/admin/pago.js')}}">

    </script>-->
    <script type="text/javascript">
     $(function() {
            $('#menuPagosLiquidaciones').addClass("active");
             var tablePagosEmpresa = $('#pagosEmpresas').DataTable({
            "language": {
                "sProcessing":    "Procesando...",
                "sLengthMenu":    "Mostrar _MENU_ registros",
                "sZeroRecords":   "No se encontraron resultados",
                "sEmptyTable":    "Ningún dato disponible en esta tabla",
                "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":   "",
                "sSearch":        "Buscar:",
                "sUrl":           "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":    "Último",
                    "sNext":    "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            },
            "columns": [
                        {"data": "name" },
                        {"data": "amount"},
                        {"data": "payment_description"},
                        {"data": "year"},
                        {"data": "monthName"},
                        {"data": "estado"},
                        {"data": "voucher"}
                    ]
            
          });

     });
      listarPago();
      function listarPago() {
        $.ajax({
            type: 'post',
            url: "{{ URL::to('admin/listarpagosasociadoshistorial') }}",
            dataType: "json",
            data: {'_token': '{{ csrf_token() }}'},
            beforeSend: function (xhr) {
                //progreso();
            }
        }).done(function (dataRpta) {
            //alert(JSON.stringify(dataRpta));
            $('#pagosEmpresas').DataTable().clear().draw();
            jQuery.each(dataRpta, function (i, val) {              
                $('#pagosEmpresas').DataTable().row.add(val).draw();
            });


        }).fail(function (jqXHR, textStatus) {
            alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
        }).always(function () {
            //cerrarProgreso();
        });
    }

     var urleliminarasociado = "{{ route('admin.pagos.empresa.cancelar') }}";
     var token = '{{ csrf_token() }}';

    </script>
    <script type="text/javascript" src="{{ asset('assets/js/frontend/admin/liquidacion.js')}}"></script>
    <script src="{{ asset('assets/vendors/sweetalert/js/sweetalert-dev.js') }}" type="text/javascript"></script>
    @stop
