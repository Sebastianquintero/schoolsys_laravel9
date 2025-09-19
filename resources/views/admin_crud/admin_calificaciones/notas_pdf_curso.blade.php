<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Notas de todos los estudiantes del curso</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }
        .estudiante {
            margin-top: 25px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
        }
        .nombre-estudiante {
            font-size: 15px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .periodo {
            background: #cce5ff;
            padding: 4px 8px;
            font-weight: bold;
            margin-top: 10px;
            display: inline-block;
        }
        .materia {
            margin-top: 7px;
            margin-left: 10px;
        }
        .nota {
            margin-left: 25px;
        }
        .promedio-periodo {
            background: #d4edda;
            padding: 4px 8px;
            margin-top: 7px;
            font-weight: bold;
            display: inline-block;
        }
        .promedio-general {
            background: #ffeeba;
            padding: 4px 8px;
            margin-top: 7px;
            font-weight: bold;
            display: inline-block;
        }
    </style>
</head>
<body>
    <h2>Notas de todos los estudiantes del curso: {{ $curso->nombre_curso }}</h2>
    @foreach($notasCurso as $item)
        <div class="estudiante">
            <div class="nombre-estudiante">
                {{ $item['estudiante']->usuario->nombres ?? '' }} {{ $item['estudiante']->usuario->apellidos ?? '' }}
            </div>
            @foreach($item['calificacionesPorPeriodo'] as $periodo => $periodoData)
                <div class="periodo">Periodo {{ $periodo }}</div>
                @foreach($periodoData['materias'] as $materiaData)
                    <div class="materia">
                        <strong>{{ $materiaData['materia']->nombre }}</strong>
                        <div class="nota"><em>Docente: {{ $materiaData['docente'] }}</em></div>
                        @foreach($materiaData['notas'] as $nota)
                            <div class="nota">
                                Nota: <strong>{{ $nota->nota }}</strong> — {{ $nota->descripcion_nota }}
                                @if($nota->observacion)
                                    <br><small>Obs: {{ $nota->observacion }}</small>
                                @endif
                            </div>
                        @endforeach
                        <div class="nota"><strong>Promedio: {{ number_format($materiaData['promedio'], 2) }}</strong></div>
                    </div>
                @endforeach
                <div class="promedio-periodo">
                    Promedio del período: {{ number_format($periodoData['promedio_periodo'], 2) }}
                </div>
            @endforeach
            <div class="promedio-general">
                Promedio general: {{ number_format($item['promedioGeneral'], 2) }}
            </div>
        </div>
    @endforeach
</body>
</html>
