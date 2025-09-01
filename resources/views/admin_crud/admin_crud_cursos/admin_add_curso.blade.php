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

                                                        <div>
                                                            <label>Nombre del curso</label><br>
                                                            <input type="text" name="nombre_curso" value="{{ old('nombre_curso') }}" placeholder="un nombre como 5° 3° o parecido" required>
                                                        </div>

                                                        <div>
                                                            <label>Número del curso</label><br>
                                                            <input type="text" name="numero_curso" value="{{ old('numero_curso') }}" placeholder="Ejemplo: 302, 1102, 504" required>
                                                        </div>

                                                        <div>
                                                            <label>Descripción</label><br>
                                                            <textarea name="descripcion" placeholder="Descripción del curso">{{ old('descripcion') }}</textarea>
                                                        </div>

                                                        <div>
                                                            <label>Estado</label><br>
                                                            <select name="estado" required>
                                                                <option value="Activo" {{ old('estado')=='Activo' ? 'selected' : '' }}>Activo</option>
                                                                <option value="Inactivo" {{ old('estado')=='Inactivo' ? 'selected' : '' }}>Inactivo</option>
                                                            </select>
                                                        </div>

                                                        <hr>

                                                        <h4>Materias</h4>
                                                            <button type="button" id="toggle-all">Seleccionar todas</button>

                                                            <div id="materias-wrapper" style="margin-top:10px;">
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

                                                            <div style="margin-top: 15px;">
                                                                <button type="submit">Guardar</button>
                                                            </div>
                                                    </form>

                                                    <script>
                                                        (function () {
                                                            const wrapper = document.getElementById('materias-wrapper');
                                                            const btn = document.getElementById('toggle-all');
                                                            const boxes = () => wrapper.querySelectorAll('input[name="materias[]"]');

                                                            function allChecked() {
                                                                const list = boxes();
                                                                return list.length > 0 && Array.from(list).every(cb => cb.checked);
                                                            }

                                                            function setAll(val) {
                                                                boxes().forEach(cb => cb.checked = val);
                                                                btn.textContent = val ? 'Quitar todas' : 'Seleccionar todas';
                                                            }

                                                            // estado inicial del botón (por si vienen old() marcadas)
                                                            btn.textContent = allChecked() ? 'Quitar todas' : 'Seleccionar todas';

                                                            // toggle al hacer clic
                                                            btn.addEventListener('click', function () {
                                                                setAll(!allChecked());
                                                            });

                                                            // si el usuario marca/desmarca manualmente, actualizar texto del botón
                                                            wrapper.addEventListener('change', function (e) {
                                                                if (e.target.matches('input[name="materias[]"]')) {
                                                                    btn.textContent = allChecked() ? 'Quitar todas' : 'Seleccionar todas';
                                                                }
                                                            });
                                                        })();
                                                        </script>


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
