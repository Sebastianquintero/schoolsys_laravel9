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
                        <li class="active-bre"><a href="#"> Listado de estudiantes</a></li>
                        <li class="page-back"><a href="{{ route('crud_ver_curso') }}"><i class="fa fa-backward"
                                    aria-hidden="true"></i>Atras</a>
                        </li>
                    </ul>
                </div>

                <!--== User Details ==-->
                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="container">
                                <h3>Estudiantes del curso: {{ $curso->nombre_curso }} ({{ $curso->numero_curso }})</h3>

                                <table class="table table-hover mt-3">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre completo</th>
                                            <th>Correo</th>
                                            <th>Edad</th>
                                            <th>Grado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($curso->estudiantes as $estudiante)
                                            <tr>
                                                <td>{{ $estudiante->id_estudiante }}</td>
                                                <td>{{ $estudiante->usuario->nombres }}
                                                    {{ $estudiante->usuario->apellidos }}</td>
                                                <td>{{ $estudiante->usuario->correo }}</td>
                                                <td>{{ $estudiante->edad }}</td>
                                                <td>{{ $estudiante->grado }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">No hay estudiantes en este curso</td>
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

    @include('admin_crud.partials.footer')
</body>

</html>