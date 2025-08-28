<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin_crud.partials.head')
</head>

<body>
    <!--== MAIN CONTAINER ==-->
    @include('admin_crud.partials.main_container')

    <div class="container-fluid sb2">
        <div class="row">
            <div class="sb2-1">
                <!--== USER INFO ==-->
                <div class="sb2-12">
                    <ul>
                        <li>
                            <img src="{{ auth()->user()->foto_url }}" class="img-thumbnail rounded-circle" width="120"
                                alt="Foto">
                        </li>
                        <li>
                            <h5>{{ Auth::user()->nombres }} {{ Auth::user()->apellidos }} <span>Bogotá D.C.</span></h5>
                        </li>
                    </ul>
                </div>

                <!--== LEFT MENU ==-->
                @include('admin_crud.partials.menu')
            </div>

            <!--== BODY INNER CONTAINER ==-->
            <div class="sb2-2">
                <!--== breadcrumbs ==-->
                <div class="sb2-2-2">
                    <ul>
                        <li><a href="{{ route('admin') }}"><i class="fa fa-home" aria-hidden="true"></i>Inicio</a></li>
                        <li><a href="{{ route('calificaciones.cursos') }}">Cursos asignados</a></li>
                        <li class="active-bre"><a href="#">Estudiantes -
                                {{ $curso->nombre ?? $curso->nombre_curso }}</a></li>
                        <li class="page-back"><a href="{{ route('calificaciones.cursos') }}"><i class="fa fa-backward"
                                    aria-hidden="true"></i>Atrás</a></li>
                    </ul>
                </div>

                <!--== Ver notas del estudiante ==-->
                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-inn-sp">
                                <div class="inn-title">
                                    <h4>Notas del estudiante:
                                        {{ $estudiante->usuario->nombres ?? '' }}
                                        {{ $estudiante->usuario->apellidos ?? '' }}
                                    </h4>
                                    <p>Detalle por materia y período.</p>
                                </div>

                                <div class="tab-inn">
                                    @if(isset($promedios))
                                        <div class="alert alert-info text-center" style="font-size: 18px;">
                                            <strong>Promedio general del estudiante:</strong>
                                            <span class="badge bg-primary"
                                                style="background-color: #219230ff; color: #fff; font-size: 14px; border-radius: 8px;">
                                                {{ number_format($promedios ?? 0, 2) }}
                                            </span>
                                        </div>
                                    @endif

                                    @foreach($calificacionesPorPeriodo as $periodo => $datos)
                                        <div class="card mb-4">
                                            <div class="card-header bg-light">
                                                <h5 class="mb-0">📘 Periodo {{ $periodo }}</h5>
                                            </div>
                                            <div class="card-body">
                                                @foreach($datos['materias'] as $materiaData)
                                                    <div class="mb-3">
                                                        <strong>{{ $materiaData['materia']->nombre }}</strong>
                                                        <span class="badge bg-primary float-end"
                                                            style="background-color: #219230ff; color: #fff; font-size: 18px; border-radius: 8px;">
                                                            Promedio: {{ number_format($materiaData['promedio'], 2) }}
                                                        </span>

                                                        <ul class="list-group mt-2">
                                                            @foreach($materiaData['notas'] as $nota)
                                                                <li class="list-group-item">
                                                                    Nota: <strong>{{ $nota->nota }}</strong> —
                                                                    {{ $nota->descripcion_nota }}
                                                                    <br><small><em>
                                                                            Docente: {{ $materiaData['docente'] }}
                                                                        </em></small>
                                                                    @if($nota->observacion)
                                                                        <br><small><em>Obs: {{ $nota->observacion }}</em></small>
                                                                    @endif
                                                                </li>

                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endforeach

                                                <div class="alert alert-info text-end mt-3">
                                                    <strong>Promedio del período:</strong>
                                                    <span class="badge bg-success fs-5"
                                                        style="background-color: #219230ff; color: #fff; font-size: 18px; border-radius: 8px;">
                                                        {{ number_format($datos['promedio_periodo'], 2) }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach

                                    @if(isset($promedioGeneral))
                                        <div class="alert alert-primary text-center fs-5">
                                            <strong>🎓 Promedio general del estudiante:</strong>
                                            <span class="badge bg-dark fs-5"
                                                style="background-color: #219230ff; color: #fff; font-size: 18px; border-radius: 8px;">{{ number_format($promedioGeneral, 2) }}</span>
                                        </div>

                                    @endif
                                    <a href="{{ route('notas.pdf', $estudiante->id_estudiante) }}"
                                        class="btn btn-danger mb-3">
                                        <i class="fa fa-file-pdf-o"></i> Descargar PDF
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--== /Ver notas del estudiante ==-->
            </div>
        </div>
    </div>

    @include('admin_crud.partials.footer')
</body>

</html>