@php
    $enlace = $data['query_id'];
@endphp
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>

        body {
            font-family: "Arial", serif;
        }
        .header,
        .header {
            top: 0px;
            /*height: 100%;*/
        }
        h2{
            text-align: center;
            text-transform: uppercase;
            font-size: 24px;
        }
        .h2{
            font-weight: bold;
            margin-left: -5px;
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
        .titulo{
            font-size: 18px;
            font-weight: bold;
            margin-left: 3px;

        }
    </style>
</head>
<body>
<div class="header">
    <div style="font-size: 12px; display: inline-flex; width: 100%;height: 50px">
        <div align="left" style="width: 300px">
            <img src="https://www.alo.doctor/web/paciente/dist/assets/images/medicentros-peruanos.png" alt="" width="150">
        </div>
        <div align="right" style="display: inline;">
            <div style="margin-right: 60px">
                <strong>HC: </strong>{{ $data['patient']['hc'] }}
            </div>
            <div align="right" style="">
                <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(60)->margin(0)->generate($enlace)) !!} " style="margin-top: -10px">
            </div>
        </div>
    </div>
    <div>
        <h2>RECETA ÚNICA ESTANDARIZADA </h2>
    </div>
</div>

<div class="contenido">
    <table width="100%" class="tabla1">
        <tr>
            <td width="70%" align="left">
                <table width="100%">
                    <tr>
                        <td align="left" class="border"><span class="h2">Paciente: </span> {{ $data['patient']['name'] }}</td>
                    </tr>
                    <tr>
                        <td align="left" class="border fondo"><span class="h2">Médico: </span> {{ $data['doctor']['name'] }}</td>
                    </tr>

                </table>
            </td>
            <td width="30%">
                <table width="100%">
                    <tr>
                        <td align="left" class="border"><span class="h2">Edad: </span> {{ $data['patient']['years_old'] }}</td>
                    </tr>
                    <tr>
                        <td align="left" class="border"><span class="h2">Atención: </span> {{ $data['doctor']['cmp'] }} </td>
                    </tr>
                    <tr>
                        <td align="left" class="border"><span class="h2">Especialidad.</span> {{ $data['doctor']['specialty'] }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <div align="right"></div>
    <br>
    <br>
    <div class="titulo" style="font-family:Monaco,Georgia,Times,serif;">DIAGNOSTICO</div>

    <table width="100%" class="tabla3">
        <tr>
            <td align="left" class="fondo"><strong>DESCRIPCIÓN</strong></td>
            <td align="left" class="fondo"><strong>CIE</strong></td>
            <td align="left" class="fondo"><strong>TIPO</strong></td>
        </tr>
        @foreach ($data['diagnostics'] as $dato)
            <tr>
                <td width="30%" align="left"><span class="text">{{ $dato['description']}}</span></td>
                <td width="20%" align="left"><span class="text">{{ $dato['code'] }}</span></td>
                <td width="10%" align="left"><span class="text">{{ $dato['type_diagnostic_id'] }}</span></td>
            </tr>
        @endforeach
    </table>
    <br>
    <br>
    <div class="titulo">RP</div>

    <table width="100%" class="tabla3">
        <tr>
            <td align="left" class="fondo"><strong>Medicamento/Insumo</strong></td>
            <td align="left" class="fondo"><strong>Unidad</strong></td>
            <td align="left" class="fondo"><strong>Cantidad</strong></td>
        </tr>
        @foreach ($data['treatment'] as $dato)
            <tr>
                <td width="30%" align="left"><span class="text">{{ $dato['medicament']}}</span></td>
                <td width="20%" align="left"><span class="text">{{ $dato['um'] }}</span></td>
                <td width="10%" align="left"><span class="text">{{ $dato['quantity'] }}</span></td>
            </tr>
        @endforeach
    </table>
    <br>
    <br>
    <div class="titulo">INDICACIONES</div>

    <table width="100%" class="tabla3" style="border-collapse: collapse;">
        <tr>
            <td align="left" class="fondo"><strong>Medicamento/Insumo (Generico)</strong></td>
            <td align="left" class="fondo"><strong>Via Administracion</strong></td>
            <td align="left" class="fondo"><strong>Frec. (vez x dia)</strong></td>
            <td align="left" class="fondo"><strong>Durac. (dia)</strong></td>
        </tr>
        @foreach ($data['indications'] as $dato)
            <tr>
                <td width="30%" align="left"><span class="text">{{ $dato['medicament']}}</span></td>
                <td width="20%" align="left"><span class="text">{{ $dato['way_administration'] }}</span></td>
                <td width="10%" align="left"><span class="text">{{ $dato['frequency'] }}</span></td>
                <td width="10%" align="left"><span class="text">{{ $dato['duration'] }}</span></td>
            </tr>
        @endforeach
    </table>
    <br><br>
    <div class="titulo">INDICACIÓN GENERAL</div>
    <br>
    <p>
        {{ $data['indicacion_general'] }}
    </p>
</div>

@include('print.includes.footer2', ['data' => $data])
</body>
</html>
