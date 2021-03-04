@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Form Layouts
@parent
@stop

{{-- page level styles --}}
@section('header_styles')

<link href="{{ asset('assets/vendors/iCheck/css/all.css') }}"  rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/pages/form_layouts.css') }}" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}"/>
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="{{ asset('assets/css/pages/only_dashboard.css') }}"/>

@stop

{{-- Page content --}}
@section('content')

<section class="content-header section-header">
    <!--section starts-->
    <div class="row">
        <div class="col-md-12">
            <h4 class="header-title">Receta</h4>
        </div>
    </div>

</section>
<!--section ends-->
<section class="content">
    <!--main content-->
    <div class="row">
        <div class="panel panel-primary ">

            <div class="panel-body" >
                <div class="col-md-12" id="elemento">
                    
                </div>
            </div>
        </div>
    </div>    <!-- row-->
    <!--main content ends-->
</section>
<!-- content -->


@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
<script src="{{ asset('assets/js/pages/form_layouts.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
<script type="text/javascript" >
var urllistarRecetas = "{{ URL::to('admin/listarrecetas') }}";
var token = '{{ csrf_token() }}';
function listarRecetas() {
    $.ajax({
        type: 'post',
        url: urllistarRecetas,
        dataType: "json",
        data: {idconsulta: '{!! $idconsultas!!}', '_token': token},
        beforeSend: function (xhr) {
            //progreso();
        }
    }).done(function (dataRpta) {
        //alert(JSON.stringify(dataRpta));
        var html = '';
        jQuery.each(dataRpta, function (i, val) {
            html += "<label class='nota-title'><b>"  + val.general_recomendation 
                    + ' - '+ val.validity + "</b></label>";
            
            jQuery.each(val.medicaments, function (i, value) {
                html += "<li> <label>" + value.medicine + " - " + 
                        value.treatment + " - " + value.way_administration + " - " +
                        value.dose + " - " + value.quantity +
                "</label> </li>";
            });
            
            
        });
        $('#elemento').html(html);
        

    }).fail(function (jqXHR, textStatus) {
        alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
    }).always(function () {
        //cerrarProgreso();
    });
}
listarRecetas();

</script>

@stop
