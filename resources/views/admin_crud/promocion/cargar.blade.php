<!DOCTYPE html>
<html lang="en">


<head>
    @include('admin_crud.partials.head')
    <style>
        
        .browser-default {
            display: inline-block;
            min-width: 220px;
            padding: .5rem .75rem;
            border: 1px solid #cfd8dc;
            border-radius: 4px;
            background: #fff;
        }

        .controls-row {
            display: flex;
            gap: 1rem;
            align-items: center;
            flex-wrap: wrap;
            margin: 1rem 0;
        }

        .controls-row label {
            font-weight: 600;
        }
    </style>
</head>

<body>
    @include('admin_crud.partials.main_container')

    <div class="container-fluid sb2">
        <div class="row">
            <div class="sb2-1">
                <div class="sb2-12">
                    <ul>
                        <li><img src="{{ auth()->user()->foto_url }}" class="img-thumbnail rounded-circle" width="120"
                                alt="Foto"></li>
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
                        <li><a href="{{ route('admin') }}"><i class="fa fa-home" aria-hidden="true"></i>Inicio</a></li>
                        <li class="active-bre"><a href="#">promoción</a></li>
                        <li class="page-back"><a href="{{ route('admin') }}"><i class="fa fa-backward"
                                    aria-hidden="true"></i>Atras</a></li>
                    </ul>
                </div>

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
                                        <h4>Promover — {{ $curso->numero_curso }} / {{ $anio }}</h4>
                                        <p class="text-muted">Estudiantes en este curso: <b>{{ $alumnos->count() }}</b>
                                        </p>

                                        @if($alumnos->isEmpty())
                                            <div class="alert alert-warning">No hay estudiantes asignados a este curso.
                                            </div>
                                        @else
                                            <form method="POST" action="{{ route('admin.promover.guardar') }}">
                                                @csrf
                                                <input type="hidden" name="curso_id" value="{{ $curso->id_curso }}">
                                                <input type="hidden" name="anio" value="{{ $anio }}">

                                                <div class="controls-row">
                                                    <label>Aplicar a todos:</label>
                                                    <select id="aplicar-todos" class="browser-default"
                                                        style="min-width:200px">
                                                        <option value="">-- seleccionar --</option>
                                                        <option value="aprobado">Aprobado</option>
                                                        <option value="reprobado">Reprobado</option>
                                                        <option value="retirado">Retirado</option>
                                                    </select>
                                                </div>

                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Estudiante</th>
                                                            <th>Decisión</th>
                                                            <th>Curso destino (si aprobado)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($alumnos as $al)
                                                            @php
                                                                $uid = $al->id_estudiante;
                                                                $sug = $cursoSiguiente?->id_curso;
                                                            @endphp
                                                            <tr>
                                                                <td>{{ $al->usuario->apellidos }} {{ $al->usuario->nombres }}
                                                                </td>
                                                                <td>
                                                                    <select name="decision[{{ $uid }}]"
                                                                        class="browser-default decision-select"
                                                                        data-uid="{{ $uid }}" style="min-width:180px">
                                                                        <option value="aprobado">Aprobado</option>
                                                                        <option value="reprobado">Reprobado</option>
                                                                        <option value="retirado">Retirado</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select name="destino[{{ $uid }}]"
                                                                        class="browser-default destino-select"
                                                                        id="destino-{{ $uid }}">
                                                                        <option value="">-- elige --</option>
                                                                        @foreach($cursos as $c)
                                                                            <option value="{{ $c->id_curso }}" {{ $sug === $c->id_curso ? 'selected' : '' }}>
                                                                                {{ $c->numero_curso }} - {{ $c->nombre_curso }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    <small class="text-muted">Solo se usa si “Aprobado”.</small>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                                <button class="btn green">Guardar promociones</button>
                                            </form>

                                            <script>
                                                // Aplicar a todos
                                                document.getElementById('aplicar-todos')?.addEventListener('change', function () {
                                                    const val = this.value;
                                                    if (!val) return;
                                                    document.querySelectorAll('.decision-select').forEach(s => {
                                                        s.value = val;
                                                        const uid = s.getAttribute('data-uid');
                                                        document.getElementById('destino-' + uid).disabled = (val !== 'aprobado');
                                                    });
                                                });

                                                // Habilitar/deshabilitar destino por fila
                                                document.querySelectorAll('.decision-select').forEach(s => {
                                                    s.addEventListener('change', () => {
                                                        const uid = s.getAttribute('data-uid');
                                                        document.getElementById('destino-' + uid).disabled = (s.value !== 'aprobado');
                                                    });
                                                    // estado inicial
                                                    s.dispatchEvent(new Event('change'));
                                                });
                                            </script>
                                        @endif
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