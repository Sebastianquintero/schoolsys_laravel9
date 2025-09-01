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
                        <li><img src="{{ asset('images/placeholder.jpg') }}" alt="">
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
                        <li><a href="index-2.html"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                        </li>
                        <li class="active-bre"><a href="#">Profesores</a>
                        </li>
                        <li class="page-back"><a href="{{ route('admin') }}"><i class="fa fa-backward"
                                    aria-hidden="true"></i>Atrás</a></li>
                    </ul>
                </div>

                <!--== User Details ==-->
                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-inn-sp">
                                <div class="inn-title">
                                    <h4>Todos los Profesores</h4>
                                    <p>Lista completa de profesores activos en la institución</p>
                                </div>
                                <div class="tab-inn">
                                    <div class="table-responsive table-desi">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Foto</th>
                                                    <th>Nombre</th>
                                                    <th>Puesto</th>
                                                    <th>Inicio</th>
                                                    <th>Fin</th>
                                                    <th>Estado</th>
                                                    <th>Editar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($docentes as $index => $docente)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>
                                                            <span class="list-img">
                                                                <img src="{{ auth()->user()->foto_url }}" class="img-thumbnail rounded-circle" width="120" alt="Foto">
                                                            </span>
                                                        </td>
                                                        <td>
                                                            {{ $docente->usuario->nombres }}
                                                            {{ $docente->usuario->apellidos }}
                                                        </td>
                                                        <td>{{ $docente->cargo }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($docente->fecha_inicio)->format('d M Y') }}
                                                        </td>
                                                        <td>{{ \Carbon\Carbon::parse($docente->fecha_fin)->format('d M Y') }}
                                                        </td>
                                                        <td>
                                                            <span class="label label-success">Activo</span>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('docente.edit', $docente->id_docente) }}"
                                                                class="ad-st-view">Editar</a>
                                                            <form
                                                                action="{{ route('docente.destroy', $docente->id_docente) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('¿Estás seguro de eliminar este docente?');"
                                                                style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="ad-st-view">Eliminar</button>
                                                            </form>
                                                        </td>
                                                        


                                                    </tr>
                                                @endforeach
                                                <form action="{{ route('docente.destroyAll') }}" method="POST"
                                                            onsubmit="return confirm('¿Estás seguro de eliminar todos los docentes? Esta acción no se puede deshacer.');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Eliminar
                                                                Todos</button>
                                                        </form>
                                                @if ($docentes->isEmpty())
                                                    <tr>
                                                        <td colspan="8" class="text-center">No hay profesores registrados.
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>

                                        <div class="text-center my-3">
                                            <div class="pagination-custom">
                                            {{ $docentes->links() }} <!-- Paginación -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end sb2-2-3 -->
            </div>

        </div>
    </div>

    @include('admin_crud.partials.footer')
</body>


</html>