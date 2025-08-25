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
                        <li class="active-bre"><a href="#">Cursos asignados</a></li>
                        <li class="page-back"><a href="{{ route('admin') }}"><i class="fa fa-backward"
                                    aria-hidden="true"></i>Atrás</a></li>
                    </ul>
                </div>

                <!--== Cursos asignados ==-->
                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-inn-sp">
                                <div class="inn-title">
                                    <h4>Cursos asignados a {{ Auth::user()->nombres }}</h4>
                                    <p>Selecciona un curso para calificar a los estudiantes.</p>
                                </div>
                                <div class="tab-inn">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombre del curso</th>
                                                    <th>Número</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($cursos as $index => $curso)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $curso->nombre_curso }}</td>
                                                        <td>{{ $curso->numero_curso }}</td>
                                                        <td>
                                                            <a href="{{ route('calificaciones.estudiantes', $curso->id_curso) }}"
                                                                class="btn btn-primary btn-sm">
                                                                <i class="fa fa-pencil"></i> Calificar
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4" class="text-center">
                                                            No tienes cursos asignados.
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
                <!--== /Cursos asignados ==-->
            </div>
        </div>
    </div>

    @include('admin_crud.partials.footer')
</body>

</html>
