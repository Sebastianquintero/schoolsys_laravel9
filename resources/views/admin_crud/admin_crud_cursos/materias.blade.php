<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin_crud.partials.head')
</head>

<body>
    <!--== MAIN CONTRAINER ==-->
    @include('admin_crud.partials.main_container')

    <!--== BODY CONTNAINER ==-->
    <div class="container-fluid sb2">
        <div class="row">
            <div class="sb2-1">
                <!--== USER INFO ==-->
                <div class="sb2-12">
                    <ul>
                        <li><img src="{{ asset('images/placeholder.jpg') }}" alt=""></li>
                        @php
                            $rol = Auth::user()->fk_rol;
                        @endphp
                        <li>
                            <h5>{{ Auth::user()->nombres }}<span> Bogotá D.C.</span></h5>
                        </li>
                        <li></li>
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
                        <li><a href="{{ route('welcome') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                        <li><a href="{{ route('crud_ver_curso') }}"><i class="fa fa-book"></i> Cursos</a></li>
                        <li class="active-bre"><a href="#">Materias del Curso</a></li>
                    </ul>
                </div>

                <!--== Materias del Curso ==-->
                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            
                            <div class="box-inn-sp">
                                <div class="inn-title">
                                    <h4>Materias del Curso: {{ $curso->nombre_curso }} ({{ $curso->numero_curso }})</h4>
                                    <a href="{{ route('crud_ver_curso') }}" class="btn btn-secondary pull-right">
                                        <i class="fa fa-arrow-left"></i> Volver a Cursos
                                    </a>
                                </div>
                                <div class="tab-inn">
                                    <div class="table-responsive table-desi">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nombre</th>
                                                    <th>Descripción</th>
                                                    <th>Estado</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($curso->materias as $materia)
                                                    <tr>
                                                        <td>{{ $materia->id_materia }}</td>
                                                        <td>{{ $materia->nombre }}</td>
                                                        <td>{{ $materia->descripcion }}</td>
                                                        <td>
                                                            <span class="badge {{ $materia->estado == 'Activo' ? 'badge-success' : 'badge-danger' }}">
                                                                {{ $materia->estado }}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4" class="text-center">No hay materias registradas para este curso</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                        <div class="text-center">
                                            <!-- Paginación si la necesitas -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin_crud.partials.footer')
</body>
</html>
