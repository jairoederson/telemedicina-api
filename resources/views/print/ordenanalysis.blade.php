@php
//dd($data);
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
            bottom: 120px;
            position: fixed
        }
        .pagenum:before {
            content: counter(page);
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
        <h2>ORDEN DE ANÁLISIS CLÍNICO </h2>
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
    <div class="titulo" style="font-family:Monaco,Georgia,Times,serif;">DETALLE DE ANALISIS</div>

    <table width="100%" class="tabla3">
        <tr>
            <td align="left" class="fondo"><strong>Código</strong></td>
            <td align="left" class="fondo"><strong>Análisis</strong></td>
            <td align="left" class="fondo"><strong>Precio</strong></td>
        </tr>
        @foreach ($data['analysis']['data'] as $dato)
            <tr>
                <td width="30%" align="left"><span class="text">{{ $dato['code']}}</span></td>
                <td width="20%" align="left"><span class="text">{{ $dato['analysis'] }}</span></td>
                <td width="10%" align="left"><span class="text">S/ {{ $dato['price'] }}</span></td>
            </tr>
        @endforeach
    </table>
    <br>
</div>
@include('print.includes.footer', ['data' => $data])
</body>
</html>