@if ($errors->any())
<div class="alert alert-danger alert-dismissable margin5" style="background-color: #fff; border: 1px solid red;color: red;">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Error:</strong> Por favor revise el siguiente formulario para ver si hay errores
</div>
@endif

@if ($message = Session::get('success'))
<div class="alert alert-dismissable margin5" style="background-color: #fff; border: 1px solid #5fb302;color: #5fb302;">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Exito:</strong> {{ $message }}
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-dismissable margin5" style="background-color: #fff; border: 1px solid red;color: red;">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Error:</strong> {{ $message }}
</div>
@endif

@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-dismissable margin5" style="background-color: #fff; border: 1px solid #fe8400;color: #fe8400;">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Cuidado:</strong> {{ $message }}
</div>
@endif

@if ($message = Session::get('info'))
<div class="alert alert-dismissable margin5" style="background-color: #fff; border: 1px solid #fe8400;color: #fe8400;">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Info:</strong> {{ $message }}
</div>
@endif

@if ($message = Session::get('success2'))
    <div class="alert alert-dismissable margin5" style="background-color: #fff; border: 1px solid #5fb302;color: #5fb302;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
         {{ $message }}
    </div>
@endif