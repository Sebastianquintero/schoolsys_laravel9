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

                <!--== Estudiantes del Curso ==-->
                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-inn-sp">
                                <div class="inn-title">
                                    <h4>Estudiantes del curso: {{ $curso->numero_curso }}</h4>
                                    <p>Selecciona un estudiante para asignar calificaciones.</p>
                                </div>
                                <div class="tab-inn">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombre del Estudiante</th>
                                                    <th>Apellidos</th>
                                                    <th>Documento</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($estudiantes as $index => $estudiante)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $estudiante->usuario?->nombres ?? 'Sin nombre' }}</td>
                                                        <td>{{ $estudiante->usuario?->apellidos ?? 'Sin apellidos' }}</td>
                                                        <td>{{ $estudiante->usuario?->numero_documento ?? 'Sin documento' }}
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('calificaciones.crear', [$curso->id_curso, $estudiante->id_estudiante]) }}"
                                                                class="btn btn-success btn-sm">
                                                                <i class="fa fa-plus"></i> Calificar
                                                            </a>
                                                            <a href="{{ route('notas.ver', $estudiante->id_estudiante) }}"
                                                                class="btn btn-info btn-sm">
                                                                <i class="fa fa-eye"></i> Ver Notas
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="5" class="text-center">
                                                            <div class="alert alert-warning">
                                                                <strong>No hay estudiantes registrados en este
                                                                    curso.</strong>
                                                                <br>
                                                                <small>Contacta al administrador para agregar
                                                                    estudiantes.</small>
                                                            </div>
                                                        </td>
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
                <!--== /Estudiantes del Curso ==-->
            </div>
        </div>
    </div>

    @include('admin_crud.partials.footer')
</body>

</html>