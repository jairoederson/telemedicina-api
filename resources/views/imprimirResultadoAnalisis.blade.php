@php
    $enlace = $data['id_solicitud'];
@endphp
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        .header,
        .footer {
            width: 100%;
            text-align: center;
            /*position: fixed;*/
        }
        .header {
            top: 0px;
            /*height: 100%;*/
        }
        .footer {
            bottom: 40px;
            position: fixed
        }
        h2{
            text-align: center;
            text-transform: uppercase;
            font-size: 24px;
        }
        .h2{
            font-weight: bold;
        }
        .contenido{
            font-size: 14px;
        }
        .paciente1{
            width: 70%;
        }
        .paciente2{
            width: 30%;
        }
        .row{
           display: inline;
            width: 100%;
        }
    </style>
</head>
<body>
<div class="header">
    <div style="font-size: 12px; display: inline-flex; width: 100%">
        <div align="left" style="width: 50%">
            <img src="https://www.alo.doctor/web/paciente/dist/assets/images/medicentros-peruanos.png" alt="" width="150">
        </div>
        <div align="right">
            <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate($enlace)) !!} ">
            <!--
            <div align="right"><strong>Informe: </strong>{{ $data['id_informe'] }}</div>
            <div align="right"><strong>Solicitud: </strong> {{ $data['id_solicitud'] }}</div>
            <div align="right"><strong>Hora aprobación: </strong> {{ $today }}</div>
            -->
        </div>
    </div>
</div>

<div style="margin-top: -30px">
    <h2>RESULTADO DE ANALISIS CLINICO </h2>
</div>

<div class="contenido">
    <table width="100%" class="tabla1">
        <tr>
            <td width="50%" align="left">
                <table width="100%">
                    <tr>
                        <td align="left" class="border"><span class="h2">Paciente: </span> {{ $data['paciente'] }}</td>
                    </tr>
                    <tr>
                        <td align="left" class="border fondo"><span class="h2">Medico: </span> {{ $data['doctor'] }}</td>
                    </tr>
                    <tr>
                        <td align="left" class="border"><span class="h2">EESS: </span> MCA HUANCAYO 3</td>
                    </tr>
                    <tr>
                        <td align="left" class="border"><span class="h2">M CL: </span> PARTICULAR</td>
                    </tr>
                </table>
            </td>
            <td width="50%">
                <table width="100%">
                    <tr>
                        <td align="left" class="border"><span class="h2">Edad: </span> {{ $data['edad'] }}</td>
                    </tr>
                    <tr>
                        <td align="left" class="border"><span class="h2">Sexo: </span> {{ $data['sexo'] }}</td>
                    </tr>
                    <tr>
                        <td align="left" class="border"><span class="h2">Fecha Ing.</span> {{ $data['fecha_solicitud'] }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <br>
    <table width="100%" class="tabla1">
        <tr>
            <td width="50%" align="left">
                <table width="100%">
                    <tr>
                        <td align="left" class="border"><span class="h2">Localidad: </span> Clinica San gabriel</td>
                    </tr>
                    <tr>
                        <td align="left" class="border fondo"><span class="h2">Servicio: </span> Ambulatorio</td>
                    </tr>
                    <tr>
                        <td align="left" class="border"><span class="h2">Registro: </span> 2021212122</td>
                    </tr>
                </table>
            </td>
            <td width="50%">
                <table width="100%">
                    <tr>
                        <td align="left" class="border"><span class="h2">Plan: </span> {{ $data['edad'] }}</td>
                    </tr>
                    <tr>
                        <td align="left" class="border"><span class="h2">Nº Guia: </span> {{ $data['id_solicitud'] }}</td>
                    </tr>
                    <tr>
                        <td align="left" class="border"><span class="h2">Fecha Toma muestra.</span> {{ $data['fecha_solicitud'] }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <br>
    <table width="100%" class="tabla3">
        <tr>
            <td align="left" class="fondo"><strong>Examen Realizados</strong></td>
            <td align="left" class="fondo"><strong>Resultado</strong></td>
            <td align="left" class="fondo"><strong>Unidad</strong></td>
            <td align="left" class="fondo"><strong>Valor Referencial</strong></td>
        </tr>
        @foreach ($datos as $dato)
                <tr>
                    <td align="left"><span class="text">{{ $dato->descripcion }}</span></td>
                    <td align="left"><span class="text">{{ $dato->valor }}</span></td>
                    <td align="left"><span class="text">{{ $dato->unidad }}</span></td>

                    <td align="left"><span class="text">{{ $dato->metodo }}</span></td>
                </tr>
        @endforeach
    </table>
</div>

<div class="footer">
    <table width="100%">
        <tr>
            <td style="text-align: center" width="50%">

            </td>
            <td style="text-align: center">
                <div style="border-top: 1px #0E2231 solid; width: 200px;">
                    Doctor <br>
                    CMP: 1557 <br>
                    RNE: 1565
                </div>
            </td>
            <td style="text-align: center">
                <div style="border-top: 1px #0E2231 solid; width: 200px;">
                    Doctor <br>
                    CMP: 1557 <br>
                    RNE: 1565
                </div>
            </td>
        </tr>
    </table>
    <br>

</div>
</body>
</html>