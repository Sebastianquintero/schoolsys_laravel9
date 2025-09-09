<!DOCTYPE html>
<html lang="es">
<head>
    @include('admin_crud.partials.head')
    <style>
        /* Para labels estáticos arriba del select nativo */
        .static-label{
            display:block;
            position:static;
            transform:none;
            font-size:.9rem;
            color:#555;
            margin:0 0 .25rem;
        }
        /* Ajuste visual básico para selects nativos */
        select.browser-default{
            display:block;
            width:100%;
            padding:.6rem .8rem;
            border:1px solid #ccc;
            border-radius:4px;
            background:#fff;
        }
        .helper-text{display:block;color:#777;margin-bottom:.25rem;}
    </style>
</head>

<body>
    @include('admin_crud.partials.main_container')

    <div class="container-fluid sb2">
        <div class="row">
            <div class="sb2-1">
                <div class="sb2-12">
                    <ul>
                        <li><img src="{{ asset('images/placeholder.jpg') }}" alt=""></li>
                        <li><h5>{{ Auth::user()->nombres }}<span> Bogotá D.C.</span></h5></li>
                    </ul>
                </div>
                @include('admin_crud.partials.menu')
            </div>

            <div class="sb2-2">
                <div class="sb2-2-2">
                    <ul>
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active-bre"><a href="#">Agregar Profesor</a></li>
                        <li class="page-back"><a href="{{ route('admin_crud_profesor') }}"><i class="fa fa-backward"></i> Atras</a></li>
                    </ul>
                </div>

                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-inn-sp admin-form">
                                <div class="inn-title">
                                    <h4>Agregar Profesor</h4>
                                    <p>Formulario para crear un nuevo profesor vinculado al colegio</p>
                                </div>

                                <div class="tab-inn">
                                    <form action="{{ route('guardar_docente') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        {{-- Nombres / Apellidos --}}
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <span class="helper-text">Nombres</span>
                                                <input type="text" name="nombres" id="nombres" placeholder="Nombres" required>
                                            </div>
                                            <div class="input-field col s6">
                                                <span class="helper-text">Apellidos</span>
                                                <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos" required>
                                            </div>
                                        </div>

                                        {{-- Tipo y número de documento --}}
                                        <div class="row">
                                            <div class="col s6">
                                                <label for="tipo_documento" class="static-label">Tipo de documento</label>
                                                <select name="tipo_documento" id="tipo_documento" class="browser-default" required>
                                                    <option value="" disabled selected>Selecciona…</option>
                                                    <option value="CC">CC</option>
                                                    <option value="Pasaporte">Pasaporte</option>
                                                    <option value="PPT">PPT</option>
                                                    <option value="PEP">PEP</option>
                                                </select>
                                            </div>
                                            <div class="input-field col s6">
                                                <span class="helper-text">Número de documento</span>
                                                <input type="text" name="numero_documento" placeholder="Número de documento" required>
                                            </div>
                                        </div>

                                        {{-- Cargo y tipo de contrato --}}
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <span class="helper-text">Cargo / Puesto</span>
                                                <input type="text" name="cargo" placeholder="Cargo / Puesto" required>
                                            </div>
                                            <div class="col s6">
                                                <label for="tipo_contrato" class="static-label">Tipo de contrato</label>
                                                <select name="tipo_contrato" id="tipo_contrato" class="browser-default" required>
                                                    <option value="" disabled selected>Selecciona…</option>
                                                    <option value="Contrato indefinido">Contrato indefinido</option>
                                                    <option value="Contrato definido">Contrato definido</option>
                                                    <option value="Contrato prestación de servicios">Contrato prestación de servicios</option>
                                                    <option value="Contrato obra y labor">Contrato obra y labor</option>
                                                    <option value="Contrato por horas">Contrato por horas</option>
                                                </select>
                                            </div>
                                        </div>

                                        {{-- Fechas contrato --}}
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <span class="helper-text">Fecha inicio contrato</span>
                                                <input type="date" name="fecha_inicio" id="fecha_inicio" required>
                                            </div>
                                            <div class="input-field col s6">
                                                <span class="helper-text">Fecha fin contrato</span>
                                                <input type="date" name="fecha_fin" id="fecha_fin" required>
                                            </div>
                                        </div>

                                        {{-- Duración y teléfono --}}
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <span class="helper-text">Duración del contrato</span>
                                                <input type="text" name="duracion" id="duracion" placeholder="Se calcula automáticamente" readonly>
                                            </div>
                                            <div class="input-field col s6">
                                                <span class="helper-text">Teléfono</span>
                                                <input type="text" name="numero_telefono" placeholder="Teléfono" required>
                                            </div>
                                        </div>

                                        {{-- Correos --}}
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <span class="helper-text">Correo institucional (auto)</span>
                                                <input type="email" name="correo" id="correo" placeholder="Correo institucional">
                                                <input type="hidden" id="dominio_mail" value="{{ config('app.domain_mail', env('APP_DOMAIN_MAIL', 'school.edu.co')) }}">
                                            </div>
                                            <div class="input-field col s6">
                                                <span class="helper-text">Correo personal</span>
                                                <input type="email" name="correo_personal" placeholder="Correo personal" required>
                                            </div>
                                        </div>

                                        {{-- Fecha nacimiento --}}
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <span class="helper-text">Fecha de nacimiento</span>
                                                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" required>
                                            </div>
                                        </div>

                                        {{-- Foto --}}
                                        <div class="row">
                                            <div class="file-field input-field col s12">
                                                <div class="btn admin-upload-btn">
                                                    <span>Foto</span>
                                                    <input type="file" name="foto" accept="image/*">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text" placeholder="Foto del Profesor">
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Botón --}}
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <button type="submit" class="waves-effect waves-light btn-large">
                                                    Guardar Profesor
                                                </button>
                                            </div>
                                        </div>

                                        {{-- Errores --}}
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul style="margin:0">
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </form>
                                </div><!-- tab-inn -->
                            </div><!-- box-inn-sp -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin_crud.partials.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // === Autogenerar correo institucional (2 letras nombre + 2 letras apellido) ===
            const $n = document.getElementById('nombres');
            const $a = document.getElementById('apellidos');
            const $correo = document.getElementById('correo');
            const dominio = document.getElementById('dominio_mail').value || 'school.edu.co';

            function limpiar(s) {
                return (s || '')
                    .normalize('NFD').replace(/[\u0300-\u036f]/g, '') // quitar acentos
                    .toLowerCase()
                    .replace(/[^a-z0-9 ]/g, '') // dejar solo letras/números/espacio
                    .trim();
            }
            function first2(s) {
                const t = limpiar(s).split(' ')[0] || '';
                return t.substring(0, 2) || 'us';
            }
            function generarCorreo() {
                const pre = first2($n.value) + first2($a.value);
                $correo.value = pre + '@' + dominio;
            }
            $n.addEventListener('input', generarCorreo);
            $a.addEventListener('input', generarCorreo);

            // === Calcular duración entre inicio y fin ===
            const $ini = document.getElementById('fecha_inicio');
            const $fin = document.getElementById('fecha_fin');
            const $dur = document.getElementById('duracion');

            function calcDuracion() {
                if (!$ini.value || !$fin.value) { $dur.value = ''; return; }
                const di = new Date($ini.value), df = new Date($fin.value);
                if (df < di) { $dur.value = 'Fin < Inicio (inválido)'; return; }

                let y = df.getFullYear() - di.getFullYear();
                let m = df.getMonth() - di.getMonth();
                let d = df.getDate() - di.getDate();

                if (d < 0) { m--; d += 30; }   // aproximación días
                if (m < 0) { y--; m += 12; }

                // Evitar negativos
                if (y < 0 || (y===0 && m<0) || (y===0 && m===0 && d<0)) {
                    $dur.value = 'Fin < Inicio (inválido)'; return;
                }
                $dur.value = `${y} años, ${m} meses, ${d} días`;
            }
            $ini.addEventListener('change', calcDuracion);
            $fin.addEventListener('change', calcDuracion);
        });
    </script>
</body>
</html>
