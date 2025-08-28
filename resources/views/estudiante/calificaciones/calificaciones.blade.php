<!DOCTYPE html>
<html lang="en">

<head>
    @include('estudiante.partials.head')
</head>

<body>
    <!-- Contenedor principal -->
    @include('estudiante.partials.contenedorPrincipalEst')

    <!-- Cuerpo -->
    @include('estudiante.partials.menu')

    <!--== BODY INNER CONTAINER ==-->
    <div class="sb2-2">
        <div class="sb2-2-2">
            <ul>
                <li><a href="{{ route('dashboard_estudiante') }}"><i class="fa fa-home"></i>Inicio</a></li>
                <li class="active-bre"><a href="#">Mis Calificaciones</a></li>
            </ul>
        </div>

        <div class="calificaciones-list">
            <h4>Mis Calificaciones</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Curso</th>
                        <th>Fecha del Examen</th>
                        <th>Calificación</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($calificaciones as $key => $calificacion)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $calificacion->nombre_materia }}</td>
                            <td>{{ \Carbon\Carbon::parse($calificacion->created_at)->format('Y-m-d') }}</td>
                            <td>--</td> <!-- Créditos si los tienes en la tabla de materias -->
                            <td>{{ number_format($calificacion->nota, 2) }}</td>
                            <td>
                                @if($calificacion->nota >= 3.0)
                                    <span class="badge badge-success">Aprobado</span>
                                @elseif($calificacion->nota >= 2.0)
                                    <span class="badge badge-warning">Condicional</span>
                                @else
                                    <span class="badge badge-danger">Reprobado</span>
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-primary btn-sm" disabled>Ver Detalles</button>
                                <button class="btn btn-secondary btn-sm" disabled>Revisar Resultados</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No hay calificaciones registradas aún.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>

    @include('estudiante.partials.fotter')
</body>

</html>