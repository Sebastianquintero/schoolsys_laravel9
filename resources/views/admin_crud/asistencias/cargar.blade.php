<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin_crud.partials.head')

</head>

<body>
    <!--== MAIN CONTRAINER ==-->
    @include('admin_crud.partials.main_container')

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
                <div class="sb2-2-2">
                    <ul>
                        <li><a href="{{ route('welcome') }}"><i class="fa fa-home"></i> Inicio</a></li>
                        <li class="active-bre"><a href="#">Asistencias</a></li>
                    </ul>
                </div>

                <div class="box-inn-sp">
                    <div class="inn-title">
                        <h4>Tomar asistencia</h4>
                        <a href="{{ route('admin.asistencias.tomar', ['curso' => $cursoId, 'fecha' => $fecha]) }}"
                            class="btn btn-small teal lighten-1" style="margin-top:.5rem">
                            ← Volver
                        </a>
                    </div>

                    <div class="tab-inn">

                        {{-- Aplicar a todos --}}
                        <div class="row">
                            <div class="input-field col s12">
                                <label class="active">Aplicar a todos:</label>
                                <select id="aplicar-todos" class="browser-default" style="max-width:320px">
                                    <option value="">-- seleccionar --</option>
                                    <option value="asistio">Asistió</option>
                                    <option value="falto">Faltó</option>
                                    <option value="tarde">Tarde</option>
                                    <option value="justificado">Justificado</option>
                                </select>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('admin.asistencias.guardar') }}">
                            @csrf
                            <input type="hidden" name="curso_id" value="{{ $cursoId }}">
                            <input type="hidden" name="fecha" value="{{ $fecha }}">

                            <div class="table-responsive table-desi">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ESTUDIANTE</th>
                                            <th class="text-center">ESTADO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($alumnos as $al)
                                            @php
                                                $uid = $al->usuario->id_usuario;
                                                $valor = $asistencias[$uid] ?? ''; // 'asistio'|'falto'|'tarde'|'justificado' o ''
                                            @endphp
                                            <tr>
                                                <td>{{ $al->usuario->nombres }} {{ $al->usuario->apellidos }}</td>
                                                <td class="text-center">
                                                    {{-- valor a enviar --}}
                                                    <input type="hidden" name="estado[{{ $uid }}]" id="estado-{{ $uid }}"
                                                        value="{{ $valor }}">

                                                    {{-- botones en un contenedor único por alumno --}}
                                                    <div class="btn-group" data-uid="{{ $uid }}"
                                                        data-initial="{{ $valor }}">
                                                        <button type="button" class="btn btn-success btn-xs estado-btn"
                                                            data-value="asistio">ASISTIÓ</button>
                                                        <button type="button" class="btn btn-danger  btn-xs estado-btn"
                                                            data-value="falto">FALTÓ</button>
                                                        <button type="button" class="btn btn-warning btn-xs estado-btn"
                                                            data-value="tarde">TARDE</button>
                                                        <button type="button" class="btn btn-info    btn-xs estado-btn"
                                                            data-value="justificado">JUSTIFICADO</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <button class="btn green">GUARDAR ASISTENCIA</button>
                        </form>

                        {{-- Script --}}
                        <script>
                            /**
                             * Pinta un grupo de botones según el valor seleccionado
                             */
                            function paintGroup(group, value) {
                                const uid = group.dataset.uid;
                                const input = document.getElementById('estado-' + uid);
                                input.value = value || ''; // guarda el valor (permite vacío)

                                group.querySelectorAll('.estado-btn').forEach(btn => {
                                    btn.classList.remove('active');
                                    const v = btn.dataset.value;

                                    // reset de colores
                                    btn.classList.remove('green', 'red', 'amber', 'cyan', 'lighten-4', 'grey-text', 'text-darken-3');

                                    if (v === value) {
                                        // botón activo: color vivo
                                        if (v === 'asistio') btn.classList.add('green');
                                        else if (v === 'falto') btn.classList.add('red');
                                        else if (v === 'tarde') btn.classList.add('amber');
                                        else if (v === 'justificado') btn.classList.add('cyan');

                                        btn.classList.add('active');
                                    } else if (value) {
                                        // “apaga” no seleccionados cuando hay uno activo
                                        if (v === 'asistio') btn.classList.add('green', 'lighten-4', 'grey-text', 'text-darken-3');
                                        else if (v === 'falto') btn.classList.add('red', 'lighten-4', 'grey-text', 'text-darken-3');
                                        else if (v === 'tarde') btn.classList.add('amber', 'lighten-4', 'grey-text', 'text-darken-3');
                                        else if (v === 'justificado') btn.classList.add('cyan', 'lighten-4', 'grey-text', 'text-darken-3');
                                    }
                                });
                            }

                            // 1) Inicializa cada fila con el valor existente
                            document.querySelectorAll('.btn-group').forEach(group => {
                                const initial = group.dataset.initial || '';
                                paintGroup(group, initial);
                            });

                            // 2) Click en botones de estado (delegación)
                            document.addEventListener('click', (e) => {
                                const btn = e.target.closest('.estado-btn');
                                if (!btn) return;
                                const group = btn.closest('.btn-group');
                                if (!group) return;

                                const value = btn.dataset.value;
                                paintGroup(group, value);
                            });

                            // 3) Aplicar a todos (select superior)
                            const aplicarTodos = document.getElementById('aplicar-todos');
                            if (aplicarTodos) {
                                aplicarTodos.addEventListener('change', function () {
                                    const val = this.value;
                                    if (!val) return;

                                    document.querySelectorAll('.btn-group').forEach(group => {
                                        paintGroup(group, val);
                                    });
                                });
                            }
                        </script>

                    </div>
                </div>
            </div>
            @include('admin_crud.partials.footer')
</body>

</html>