<!DOCTYPE html>
<html lang="es">

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
                        <li class="active-bre"><a href="#">Asignación de Cursos</a></li>
                        <li class="page-back"><a href="{{ route('admin') }}"><i class="fa fa-backward"
                                    aria-hidden="true"></i>Atrás</a></li>
                    </ul>
                </div>

                <!--== FORMULARIO DE ASIGNACIÓN ==-->
                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-inn-sp">
                                <div class="inn-title">
                                    <h4>Asignar Curso y Materia a un Profesor</h4>
                                    <p>Seleccione un profesor, curso y materia para realizar la asignación.</p>
                                </div>

                                <div class="tab-inn">
                                    <form method="GET" action="{{ route('curso_docente_materia.create') }}">
                                        <div class="form-group">
                                            <label for="fk_docente">Selecciona un profesor:</label>
                                            <select name="fk_docente" id="fk_docente" class="form-control" onchange="this.form.submit()">
                                                <option value="">-- Elige un docente --</option>
                                                @foreach($docentes as $docente)
                                                    <option value="{{ $docente->id_usuario }}"
                                                        {{ request('fk_docente') == $docente->id_usuario ? 'selected' : '' }}>
                                                        {{ $docente->nombres }} {{ $docente->apellidos }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </form>
                                    @if(request('fk_docente'))
                                            @if(session('success'))
                                                <div class="alert alert-success">
                                                    {{ session('success') }}
                                                </div>
                                            @endif

                                            @if(session('error'))
                                                <div class="alert alert-danger">
                                                    {{ session('error') }}
                                                </div>
                                            @endif
                                            <form action="{{ route('curso_docente_materia.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="fk_docente" value="{{ request('fk_docente') }}">

                                                <div class="form-row d-flex">
                                                    <div class="form-group col-md-4">
                                                        <label for="fk_curso">Curso:</label>
                                                        <select name="fk_curso" class="form-control" required>
                                                            <option value="">-- Seleccione un curso --</option>
                                                            @foreach($cursos as $curso)
                                                                <option value="{{ $curso->id_curso }}">
                                                                    {{ $curso->nombre_curso }} - {{ $curso->numero_curso }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="fk_materia">Materia:</label>
                                                        <select name="fk_materia" class="form-control" required>
                                                            <option value="">-- Seleccione una materia --</option>
                                                            @foreach($materias as $materia)
                                                                <option value="{{ $materia->id_materia }}">{{ $materia->nombre }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4 align-self-end">
                                                        <button type="submit" class="btn btn-success btn-block">+ ASIGNAR</button>
                                                    </div>
                                                </div>
                                            </form>
                                        @endif

                                    @if(count($asignaciones))
                                        <h5 class="mt-4">Asignaciones actuales</h5>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Curso</th>
                                                    <th>Materia</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($asignaciones as $asignacion)
                                                    <tr>
                                                        <td>{{ $asignacion->nombre_curso }} - {{ $asignacion->numero_curso }}</td>
                                                        <td>{{ $asignacion->nombre_materia }}</td>
                                                        <td>
                                                            <form action="{{ route('curso_docente_materia.destroy', $asignacion->id_asignacion) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta asignación?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--== /FORMULARIO DE ASIGNACIÓN ==-->
            </div>
        </div>
    </div>

    @include('admin_crud.partials.footer')
</body>

</html>