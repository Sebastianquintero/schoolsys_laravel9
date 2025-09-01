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
                <li><a href="{{ route('dashboard_estudiante') }}"><i class="fa fa-home"></i> Inicio</a></li>
                <li class="active-bre"><a href="#"> Usuarios(Estudiantes)</a></li>
            </ul>
        </div>

        <div class="sb2-2-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-inn-sp">
                        <div class="inn-title">
                            <h4>Mis matrículas</h4>
                        </div>
                        <div class="tab-inn">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Año</th>
                                        <th>Curso</th>
                                        <th>Estado</th>
                                        <th>Resultado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($items as $m)
                                        <tr>
                                            <td>{{ $m->anio_escolar }}</td>
                                            <td>{{ $m->curso->numero_curso ?? '' }} {{ $m->curso->nombre_curso ?? '' }}</td>
                                            <td>{{ ucfirst($m->estado) }}</td>
                                            <td>{{ ucfirst($m->resultado) }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Sin registros.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>

    @include('estudiante.partials.fotter')
</body>

</html>