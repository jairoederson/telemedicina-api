<div class="footer">
  <table width="100%">
    <tr>
      <td style="text-align: center">
        <img src="{{$data['doctor']['firma_digital']}}" alt="" width="130" height="65" style="margin-left: -25px;padding: 10px; margin-top: -68px">

        <div style="border-top: 1px #858585 solid; width: 200px;padding: 5px">
          Sello/Firma/Colegio Profesional
        </div>
      </td>
      <td style="text-align: center; margin-top: 0px !important;">
        <div style="text-align: center; margin-left: -25px;">
          <label>{{ $data['patient']['date'] }}</label>
        </div>
        <div style="border-top: 1px #858585 solid; width: 200px;padding: 5px">
          Fecha de Atención
        </div>
      </td>
      <td style="text-align: center; margin-top: 0px !important;">
        <div style="text-align: center;margin-left: -25px">
          <label>{{ $data['patient']['validity'] }}</label>
        </div>
        <div style="border-top: 1px #858585 solid; width: 200px;padding: 5px">
          Válido hasta
        </div>
      </td>
    </tr>
  </table>
  <br>
  <p class="direccion">
    <br> Urb. a. residencial monterrico, av. la molina 836-828 of. 202 2do. piso - la molina
  </p>
</div>


<style>
  .direccion{
    font-size: 15px;
    border-top: 1px #858585 solid;
  }
  .footer {
    width: 100%;
    text-align: center;
    bottom: 140px;
    position: fixed
  }
  .pagenum:before {
    content: counter(page);
  }
</style>
