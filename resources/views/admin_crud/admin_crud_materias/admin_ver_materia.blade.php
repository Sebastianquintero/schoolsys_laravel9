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
                        <li class="active-bre"><a href="#"> Usuarios(Estudiantes)</a></li>
                        <li class="page-back"><a href="{{ route('admin') }}"><i class="fa fa-backward"
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
                            
                            <div class="box-inn-sp">
                                <div class="inn-title">
                                    <h4>Detalles de Materias</h4>
                                    <a href="{{ route('admin_add_materia') }}" class="btn btn-success pull-right" style="color: black;">
                                        <i class="fa fa-plus"></i>Agregar Nueva Materia
                                    </a>
                                </div>
                                <div class="tab-inn">
                                    <div class="table-responsive table-desi">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nombre de la Materia</th>
                                                    <th>Descripcion</th>
                                                    <th>Estado</th>       
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($materias as $materia)
                                                <tr>
                                                    <td>{{ $materia->id_materia }}</td>
                                                    <td>{{ $materia->nombre }}</td>
                                                    <td>{{ $materia->descripcion }}</td>
                                                    <td>
                                                        <span class="badge {{ $materia->estado == 'Activo' ? 'badge-success' : 'badge-danger' }}"
                                                        style="background-color: #219230ff; color: #fff; font-size: 14px;">
                                                            {{ $materia->estado }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin_edit_materia', $materia ->id_materia) }}" class="btn btn-sm btn-primary" style="color: black;">
                                                            <i class="fa fa-edit"></i> Editar
                                                        </a>
                                                        <form action="{{ route('materias.destroy', $materia->id_materia) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger" style="color: black;" onclick="return confirm('¿Estás seguro de eliminar esta materia?')">
                                                                <i class="fa fa-trash"></i> Eliminar
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="5" class="text-center">No hay materias registrados</td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                        <div class="text-center">
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