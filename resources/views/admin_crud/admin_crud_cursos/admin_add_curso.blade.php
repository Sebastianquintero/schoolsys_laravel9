<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin_crud.partials.head')
</head>

<body>
    @include('admin_crud.partials.main_container')

    <div class="container-fluid sb2">
        <div class="row">
            <div class="sb2-1">
                <div class="sb2-12">
                    <ul>
                        <li><img src="{{ asset('images/placeholder.jpg') }}" alt=""></li>
                        @php
                            $rol = Auth::user()->fk_rol;
                        @endphp
                        <li>
                            <h5>{{ Auth::user()->nombres }}<span> Bogotá D.C.</span></h5>
                        </li>
                    </ul>
                </div>
                @include('admin_crud.partials.menu')
            </div>

            <div class="sb2-2">
                <div class="sb2-2-2">
                    <ul>
                        <li><a href="{{ route('welcome') }}"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active-bre"><a href="#">Agregar nuevo curso</a></li>
                        <li class="page-back"><a href="{{ route('admin') }}"><i class="fa fa-backward"></i> Atras</a></li>
                    </ul>
                </div>

                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-inn-sp admin-form">
                                <div class="sb2-2-add-blog sb2-2-1">
                                    <h2>Agregar curso</h2>
                                    <p>Agregar curso correspondiente</p>

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <ul class="nav nav-tabs tab-list">
                                        <li class="active">
                                            <a data-toggle="tab" href="#home">
                                                <i class="fa fa-info"></i> <span>Detalles</span>
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div id="home" class="tab-pane fade active in">
                                            <div class="box-inn-sp">
                                                <div class="inn-title">
                                                    <h4>Información del curso</h4>
                                                </div>
                                                <div class="bor">
                                                    <form method="POST" action="{{ route('cursos.store') }}">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="input-field col s12">
                                                                <input id="nombre_curso" name="nombre_curso" type="text" class="validate" value="{{ old('nombre_curso') }}" required>
                                                                <label for="nombre_curso">Nombre del curso</label>
                                                            </div>
                                                            <div class="input-field col s12">
                                                                <input id="numero_curso" name="numero_curso" type="text" class="validate" value="{{ old('numero_curso') }}" required>
                                                                <label for="numero_curso">Número de curso</label>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="input-field col s12">
                                                                <textarea id="descripcion" name="descripcion" class="materialize-textarea">{{ old('descripcion') }}</textarea>
                                                                <label for="descripcion">Descripción del curso:</label>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="input-field col s12">
                                                                <select id="estado" name="estado" required>
                                                                    <option value="" disabled selected>Seleccionar estado</option>
                                                                    <option value="Activo" {{ old('estado') == 'Activo' ? 'selected' : '' }}>Activo</option>
                                                                    <option value="Desactivado" {{ old('estado') == 'Desactivado' ? 'selected' : '' }}>Desactivado</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        {{-- 🔹 Nueva sección para asignar materias --}}
                                                        <div class="row">
                                                            <div class="input-field col s12">
                                                                <br><br>
                                                            @foreach ($materias as $materia)
                                                                <div>
                                                                    <input type="checkbox" 
                                                                        name="materias[]" 
                                                                        id="materia_{{ $materia->id_materia }}" 
                                                                        value="{{ $materia->id_materia }}"
                                                                        {{ in_array($materia->id_materia, old('materias', [])) ? 'checked' : '' }}>
                                                                    <label for="materia_{{ $materia->id_materia }}">{{ $materia->nombre }}</label>
                                                                </div>
                                                            @endforeach
                                                            </div>
                                                        </div>
                                                        {{-- 🔹 Fin sección materias --}}

                                                        <div class="row">
                                                            <div class="input-field col s12">
                                                                <button type="submit" class="waves-effect waves-light btn-large">
                                                                    Enviar
                                                                </button>
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
                </div>
            </div>
        </div>
    </div>

    @include('admin_crud.partials.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });
    </script>
</body>
</html>
