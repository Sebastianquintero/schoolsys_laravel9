<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Observador estudiantil</title>
    <style>
        body{ font-family: DejaVu Sans, sans-serif; font-size:12px; }
        .title{ font-size:16px; font-weight:700; margin-bottom:10px; }
        .box{ border:1px solid #ccc; padding:10px; margin-bottom:10px; }
        table{ width:100%; border-collapse:collapse; }
        th,td{ border:1px solid #ccc; padding:6px; }
    </style>
</head>
<body>
    <div class="title">Observador Estudiantil</div>
    <div class="box">
        <strong>Colegio:</strong> {{ $obs->colegio->nombre ?? '-' }}<br>
        <strong>Fecha:</strong> {{ \Carbon\Carbon::parse($obs->fecha)->format('d/m/Y') }}<br>
        <strong>Curso:</strong> {{ $obs->curso->nombre_curso ?? '' }} ({{ $obs->curso->numero_curso ?? '' }})<br>
        <strong>Estudiante:</strong> {{ $obs->estudiante->usuario->nombres ?? '' }} {{ $obs->estudiante->usuario->apellidos ?? '' }}<br>
        <strong>Docente:</strong> {{ optional($obs->docente->usuario)->nombres }} {{ optional($obs->docente->usuario)->apellidos }}
        <br>
    </div>

    <div class="box">
        <strong>Observaciones</strong>
        <p>{!! nl2br(e($obs->observaciones)) !!}</p>
    </div>

    <table>
        <tr>
            <td style="height:60px; vertical-align:bottom; text-align:center;">_________________________<br>Firma Docente</td>
            <td style="height:60px; vertical-align:bottom; text-align:center;">_________________________<br>Firma Acudiente</td>
        </tr>
    </table>
</body>
</html>
