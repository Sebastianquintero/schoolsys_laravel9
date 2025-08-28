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
                                    <form action="{{ route('curso_docente_materia.store') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <!-- PROFESOR -->
                                            <div class="col-md-4">
                                                <label for="fk_docente">Profesor</label>
                                                <select name="fk_docente" id="fk_docente" class="form-control" required>
                                                    <option value="">Seleccione un profesor</option>
@foreach($docentes as $docente)
    <option value="{{ $docente->id_docente }}">
        {{ $docente->usuario?->nombres }} {{ $docente->usuario?->apellidos }}
    </option>
@endforeach

                                                </select>
                                            </div>

                                            <!-- CURSO -->
                                            <div class="col-md-4">
                                                <label for="fk_curso">Curso</label>
                                                <select name="fk_curso" id="fk_curso" class="form-control" required>
                                                    <option value="">Seleccione un curso</option>
                                                    @foreach($cursos as $curso)
                                                        <option value="{{ $curso->id_curso }}">
                                                            {{ $curso->nombre_curso }} - {{ $curso->numero_curso }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <!-- MATERIA -->
                                            <div class="col-md-4">
                                                <label for="fk_materia">Materia</label>
                                                <select name="fk_materia" id="fk_materia" class="form-control" required>
                                                    <option value="">Seleccione una materia</option>
                                                    @foreach($materias as $materia)
                                                        <option value="{{ $materia->id_materia }}">
                                                            {{ $materia->nombre }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <br>

                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fa fa-plus"></i> Asignar
                                                </button>
                                            </div>
                                        </div>
                                    </form>
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
