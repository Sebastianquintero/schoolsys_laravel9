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
                        <li class="active-bre"><a href="#">Observador</a></li>
                    </ul>
                </div>

                <div class="box-inn-sp admin-form">
                    <div class="inn-title">
                        <h4>Nueva observación</h4>
                    </div>

                    <div class="tab-inn">
                        <form action="{{ route('admin.observador.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="input-field col s8">
                                    <label class="active">Estudiante (agrupado por curso)</label>
                                    <select name="fk_estudiante" class="form-control" required>
                                        <option value="">-- Selecciona --</option>
                                        @foreach($cursos as $curso)
                                            <optgroup label="{{ $curso->nombre_curso }} ({{ $curso->numero_curso }})">
                                                @forelse($curso->estudiantes as $e)
                                                    <option value="{{ $e->id_estudiante }}">
                                                        {{ $e->usuario->nombres }} {{ $e->usuario->apellidos }}
                                                    </option>
                                                @empty
                                                    <option disabled>— Sin estudiantes —</option>
                                                @endforelse
                                            </optgroup>
                                        @endforeach
                                    </select>
                                    @error('fk_estudiante') <small class="red-text">{{ $message }}</small> @enderror
                                </div>

                                <div class="input-field col s4">
                                    <label class="active">Fecha</label>
                                    <input type="date" name="fecha" value="{{ now()->toDateString() }}" required>
                                    @error('fecha') <small class="red-text">{{ $message }}</small> @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s6">
                                    <label class="active">Docente</label>
                                    <select name="fk_docente" class="form-control">
                                        <option value="">-- Selecciona (opcional) --</option>
                                        @foreach($docentes as $d)
                                            <option value="{{ $d->id_docente }}" {{ (string) old('fk_docente', $docentePorDefectoId) === (string) $d->id_docente ? 'selected' : '' }}>
                                                {{ $d->usuario->nombres }} {{ $d->usuario->apellidos }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <small class="text-muted">Si no seleccionas y el usuario es docente, se usará el
                                        docente actual.</small>
                                    @error('fk_docente') <small class="red-text">{{ $message }}</small> @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s4">
                                    <label class="active">Nombre del padre</label>
                                    <input type="text" name="nombre_padre" placeholder="Nombre padre">
                                </div>
                                <div class="input-field col s4">
                                    <label class="active">Nombre de la madre</label>
                                    <input type="text" name="nombre_madre" placeholder="Nombre madre">
                                </div>
                                <div class="input-field col s4">
                                    <label class="active">Nombre del acudiente</label>
                                    <input type="text" name="nombre_acudiente" placeholder="Nombre acudiente">
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <label class="active">Observaciones</label>
                                    <textarea name="observaciones" class="materialize-textarea" rows="6" required
                                        placeholder="Describe la situación, acuerdos, compromisos, etc."></textarea>
                                    @error('observaciones') <small class="red-text">{{ $message }}</small> @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s6">
                                    <label class="active">Firma (opcional)</label>
                                    <input type="file" name="firma" accept="image/*">
                                    <small class="text-muted">Firma del estudiante (opcional).</small>
                                    @error('firma') <small class="red-text">{{ $message }}</small> @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <button type="submit" class="btn green">Guardar</button>
                                    <a href="{{ route('admin.observador.index') }}" class="btn grey">Cancelar</a>
                                </div>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger" style="margin-top: 1rem;">
                                    <ul style="margin:0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/main.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>

    <!-- Logout Form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>

</html>