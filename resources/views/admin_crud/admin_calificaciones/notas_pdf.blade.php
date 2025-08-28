<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Notas del estudiante</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        .periodo {
            background: #cce5ff;
            padding: 5px;
            font-weight: bold;
            margin-top: 15px;
        }

        .materia {
            margin-top: 10px;
        }

        .nota {
            margin-left: 15px;
        }

        .promedio-periodo,
        .promedio-general {
            background: #d4edda;
            padding: 5px;
            margin-top: 10px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h2>Notas del estudiante: {{ $estudiante->nombres }} {{ $estudiante->apellidos }}</h2>
    <p>Curso: {{ $curso->nombre_curso }}</p>

    @foreach($calificacionesPorPeriodo as $periodo => $periodoData)
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
        Promedio general del estudiante: {{ number_format($promedioGeneral, 2) }}
    </div>
</body>

</html>