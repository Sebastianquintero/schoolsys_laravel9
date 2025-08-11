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
                        <li><img src="{{ auth()->user()->foto_url }}" class="img-thumbnail rounded-circle" width="120" alt="Foto">
                        </li>
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
                        <li><a href="index-2.html"><i class="fa fa-home" aria-hidden="true"></i>Inicio</a>
                        </li>
                        <li class="active-bre"><a href="#"> Usuarios(Estudiantes)</a>
                        </li>
                        <li class="page-back"><a href="{{ route('admin') }}"><i class="fa fa-backward"
                                    aria-hidden="true"></i>Atras</a>
                        </li>
                    </ul>
                </div>

                <!--== User Details ==-->
                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-inn-sp">
                                <div class="inn-title">
                                    <h4>Detalles de estudiantes</h4>
                                    <p>Detalles de todos los estudiantes de la institución</p>
                                </div>
                                <div class="tab-inn">
                                    <div class="table-responsive table-desi">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Usuario</th>
                                                    <th>Nombre</th>
                                                    <th>Tel</th>
                                                    <th>Email</th>
                                                    <th>Ciudad</th>
                                                    <th>Id</th>
                                                    <th>Estado</th>
                                                    <th>Ver</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($estudiantes->isEmpty())
                                                    <tr>
                                                        <td colspan="8">No hay estudiantes registrados.</td>
                                                    </tr>
                                                @endif
                                                @foreach ($estudiantes as $estudiante)
                                                    <tr>
                                                        <td>
                                                            <span class="list-img">
                                                                <img src="{{ auth()->user()->foto_url }}" class="img-thumbnail rounded-circle" width="120" alt="Foto">
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <a href="#">
                                                                <span
                                                                    class="list-enq-name">{{ $estudiante->usuario->nombres }}
                                                                    {{ $estudiante->usuario->apellidos }}</span>
                                                                <span class="list-enq-city">{{ $estudiante->curso }}</span>
                                                            </a>
                                                        </td>
                                                        <td>{{ $estudiante->telefono }}</td>
                                                        <td>{{ $estudiante->usuario->correo }}</td>
                                                        <td>{{ $estudiante->direccion ?? 'N/A' }}</td>
                                                        <td>{{ $estudiante->usuario->numero_documento }}</td>
                                                        <td>
                                                            <span class="label label-success">Activo</span>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('estudiante.edit', $estudiante->id_estudiante) }}"
                                                                class="ad-st-view">Editar</a>

                                                            <!-- Boton de eliminar -->
                                                            <form
                                                                action="{{ route('estudiante.destroy', $estudiante->id_estudiante) }}"
                                                                method="POST" style="display:inline;"
                                                                onsubmit="return confirm('¿Seguro que deseas eliminar este estudiante?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="ad-st-view">Eliminar</button>
                                                            </form>
                                                            
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>


                                            <!-- Boton para eliminar todos los estudiantes  -->

                                            <form action="{{ route('estudiante.destroyAll') }}" method="POST"
                                                onsubmit="return confirm('¿Eliminar todos los estudiantes? Esta acción no se puede deshacer.');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Eliminar Todos</button>
                                            </form>

                                            <!-- Fin de boton -->
                                        </table>
                                        <div class="text-center my-3">
                                            <div class="pagination-custom">
                                                {{ $estudiantes->links() }}
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
    </div>

    @include('admin_crud.partials.footer')
</body>


</html>