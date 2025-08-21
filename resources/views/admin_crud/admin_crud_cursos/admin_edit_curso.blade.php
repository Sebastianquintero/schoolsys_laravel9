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
                        <li><a href="{{ route('crud_ver_curso') }}">Listado de Cursos</a></li>
                        <li class="active-bre"><a href="#">Editar Curso</a></li>
                    </ul>
                </div>

                <!--== User Details ==-->
                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-inn-sp admin-form">
                                <div class="sb2-2-add-blog sb2-2-1">
                                    <h2>Editar Curso</h2>
                                    <p>Modifique los campos que desee actualizar</p>

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form method="POST" action="{{ route('cursos_edit.update', $curso->id_curso) }}">
                                        @csrf
                                        @method('PUT')

                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input id="nombre_curso" name="nombre_curso" type="text" class="validate" 
                                                       value="{{ old('nombre_curso', $curso->nombre_curso) }}" required>
                                                <label for="nombre_curso">Nombre del curso</label>
                                            </div>
                                            <div class="input-field col s12">
                                                <input id="numero_curso" name="numero_curso" type="text" class="validate" 
                                                       value="{{ old('numero_curso', $curso->numero_curso) }}" required>
                                                <label for="numero_curso">Número del curso</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-field col s12">
                                                <textarea id="descripcion" name="descripcion" class="materialize-textarea">{{ old('descripcion', $curso->descripcion) }}</textarea>
                                                <label for="descripcion">Descripción del curso</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-field col s12">
<select id="estado" name="estado" required>
    <option value="Activo" {{ old('estado', $curso->estado) == 'Activo' ? 'selected' : '' }}>Activo</option>
    <option value="Inactivo" {{ old('estado', $curso->estado) == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
</select>
                                            </div>
                                        </div>

                                        <!-- === Materias asociadas al curso === -->
                                        <div class="row">
                                            <div class="col s12">
                                                <h5>Materias del curso</h5>
                                                @foreach($materias as $materia)
                                                    <p>
                                                <div class="form-check">
                                                    <input class="form-check-input" 
                                                        type="checkbox" 
                                                        name="materias[]" 
                                                        value="{{ $materia->id_materia }}"
                                                        id="materia{{ $materia->id_materia }}"
                                                        {{ $curso->materias->contains($materia->id_materia) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="materia{{ $materia->id_materia }}">
                                                        {{ $materia->nombre }}
                                                    </label>
                                                </div>
                                                    </p>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-field col s12">
                                                <button type="submit" class="waves-effect waves-light btn-large blue darken-4">
                                                    <i class="fa fa-save"></i> Guardar Cambios
                                                </button>
                                                <a href="{{ route('crud_ver_curso') }}" class="waves-effect waves-light btn-large grey">
                                                    <i class="fa fa-times"></i> Cancelar
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin_crud.partials.footer')

    <!-- Script para inicializar select de Materialize -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });
    </script>
</body>
</html>
