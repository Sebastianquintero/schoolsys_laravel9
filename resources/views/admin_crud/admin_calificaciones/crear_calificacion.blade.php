<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin_crud.partials.head')

    <!-- CSS mínimo para mejorar el formulario -->
    <style>
        /* Solo estilos esenciales */
        .box-inn-sp {
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            border: 1px solid #e0e0e0;
        }

        .inn-title {
            background: linear-gradient(45deg, #28a745, #20c997);
            color: white;
            border-radius: 8px 8px 0 0;
            margin: -20px -20px 20px -20px;
            padding: 20px;
            text-align: center;
        }

        .inn-title h4 {
            color: white;
            margin: 0;
        }

        .inn-title p {
            color: rgba(255, 255, 255, 0.9);
            margin: 5px 0 0 0;
        }

        .col-form-label {
            font-weight: 600;
            color: #333;
        }

        .form-control {
            border: 1px solid #28a745;
            border-radius: 6px;
        }

        .form-control:focus {
            border-color: #20c997;
            box-shadow: 0 0 0 2px rgba(40, 167, 69, 0.2);
        }

        .form-control[readonly] {
            background-color: #f8f9fa;
            border-color: #dee2e6;
        }

        .btn-success {
            border-radius: 20px;
            padding: 10px 25px;
        }

        .btn-secondary {
            border-radius: 20px;
            padding: 10px 25px;
        }
    </style>
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
                        <li class="active-bre"><a href="{{ route('calificaciones.cursos') }}">Cursos asignados</a></li>
                        <li class="active-bre"><a href="#">Estudiantes</a></li>
                        <li class="active-bre"><a href="#">Calificar Estudiante</a></li>
                        <li class="page-back"><a href="#"><i class="fa fa-backward" aria-hidden="true"></i>Atrás</a>
                        </li>
                    </ul>
                </div>

                <!--== Formulario de Calificación ==-->
                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-inn-sp">
                                <div class="inn-title">
                                    <h4><i class="fa fa-graduation-cap"></i> Calificar Estudiante</h4>
                                    <p>Complete todos los campos para asignar una calificación</p>
                                </div>
                                <div class="tab-inn">

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form action="{{ route('calificaciones.guardar') }}" method="POST"
                                        class="form-horizontal">
                                        @csrf

                                        <!-- Campos ocultos -->
                                        <input type="hidden" name="fk_estudiante"
                                            value="{{ $estudiante->id_estudiante }}">
                                        <input type="hidden" name="fk_curso" value="{{ $curso->id_curso }}">
                                        <input type="hidden" name="fk_usuario" value="{{ auth()->id() }}">
                                        <input type="hidden" name="fk_colegio" value="{{ auth()->user()->fk_colegio }}">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Información del Estudiante (Solo lectura) -->
                                                <div class="form-group">
                                                    <label class="col-form-label">
                                                        <i class="fa fa-user text-success"></i> Nombre del Estudiante
                                                    </label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $estudiante->usuario?->nombres ?? 'Sin nombre' }} {{ $estudiante->usuario?->apellidos ?? 'Sin apellidos' }}"
                                                        readonly>
                                                </div>

                                                <!-- Curso (Solo lectura) -->
                                                <div class="form-group">
                                                    <label class="col-form-label">
                                                        <i class="fa fa-users text-info"></i> Curso
                                                    </label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $curso->numero_curso ?? $curso->numero_curso }}"
                                                        readonly>
                                                </div>

                                                <!-- Selección de Materia -->
                                                <div class="form-group">
                                                    <label class="col-form-label">
                                                        <i class="fa fa-book text-primary"></i> Asignatura/Materia *
                                                    </label>
                                                    <select name="fk_materia" class="form-control" required>
                                                        <option value="">Seleccione una materia</option>
                                                        @foreach($materias as $materia)
                                                            <option value="{{ $materia->id_materia }}" {{ old('fk_materia') == $materia->id_materia ? 'selected' : '' }}>
                                                                {{ $materia->nombre }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- Campo para mostrar docente asignado -->
                                                <div class="form-group">
                                                    <label><i class="fa fa-user"></i> Docente asignado</label>
                                                    <input type="text" id="docenteAsignado" class="form-control"
                                                        readonly>
                                                </div>



                                                <!-- Período -->
                                                <div class="form-group">
                                                    <label class="col-form-label">
                                                        <i class="fa fa-calendar text-warning"></i> Período *
                                                    </label>
                                                    <select name="periodo" class="form-control" required>
                                                        <option value="">Seleccione el período</option>
                                                        <option value="1" {{ old('periodo') == '1' ? 'selected' : '' }}>
                                                            Primer Período</option>
                                                        <option value="2" {{ old('periodo') == '2' ? 'selected' : '' }}>
                                                            Segundo Período</option>
                                                        <option value="3" {{ old('periodo') == '3' ? 'selected' : '' }}>
                                                            Tercer Período</option>
                                                        <option value="4" {{ old('periodo') == '4' ? 'selected' : '' }}>
                                                            Cuarto Período</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <!-- Colegio -->
                                                <div class="form-group">
                                                    <label class="col-form-label">
                                                        <i class="fa fa-university text-success"></i> Colegio *
                                                    </label>
                                                    <input type="text" name="colegio" class="form-control"
                                                        value="{{ old('colegio', auth()->user()->colegio->nombre ?? 'Colegio no asignado') }}"
                                                        readonly required>
                                                </div>

                                                <!-- Jornada -->
                                                <div class="form-group">
                                                    <label class="col-form-label">
                                                        <i class="fa fa-clock text-dark"></i> Jornada *
                                                    </label>
                                                    <select name="jornada" class="form-control" required>
                                                        <option value="">Seleccione la jornada</option>
                                                        <option value="Diurna" {{ old('jornada') == 'Diurna' ? 'selected' : '' }}>Diurna</option>
                                                        <option value="Tarde" {{ old('jornada') == 'Tarde' ? 'selected' : '' }}>Tarde</option>
                                                    </select>
                                                </div>

                                                <!-- Descripción de la Nota -->
                                                <div class="form-group">
                                                    <label class="col-form-label">
                                                        <i class="fa fa-edit text-secondary"></i> Descripción de la Nota
                                                        *
                                                    </label>
                                                    <input type="text" name="descripcion_nota" class="form-control"
                                                        placeholder="Ej: Examen parcial, Quiz, Tarea, etc."
                                                        value="{{ old('descripcion_nota') }}" required>
                                                </div>

                                                <!-- Nota -->
                                                <div class="form-group">
                                                    <label class="col-form-label">
                                                        <i class="fa fa-star text-warning"></i> Nota (0.0 - 5.0) *
                                                    </label>
                                                    <input type="number" name="nota" class="form-control" min="0"
                                                        max="5" step="0.1" placeholder="Ej: 4.5"
                                                        value="{{ old('nota') }}" required>
                                                    <small class="form-text text-muted">Ingrese la nota en escala de 0.0
                                                        a 5.0</small>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Observación -->
                                        <div class="form-group">
                                            <label class="col-form-label">
                                                <i class="fa fa-comment text-info"></i> Observación (Opcional)
                                            </label>
                                            <textarea name="observacion" class="form-control" rows="3"
                                                placeholder="Comentarios adicionales sobre la calificación...">{{ old('observacion') }}</textarea>
                                        </div>

                                        <!-- Botones -->
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-success btn-lg">
                                                <i class="fa fa-save"></i> Guardar Calificación
                                            </button>
                                            <a href="{{ route('calificaciones.estudiantes', $curso->id_curso) }}"
                                                class="btn btn-secondary btn-lg ml-2">
                                                <i class="fa fa-times"></i> Cancelar
                                            </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--== /Formulario de Calificación ==-->
            </div>
        </div>
    </div>
    <!-- Script para manejar el cambio de materia -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const materiaSelect = document.querySelector('select[name="fk_materia"]');
            const docenteInput = document.getElementById('docenteAsignado');
            const cursoId = "{{ $curso->id_curso }}"; // viene del controlador

            materiaSelect.addEventListener('change', function () {
                const materiaId = this.value;

                if (materiaId) {
                    fetch(`/obtener-docente?fk_curso=${cursoId}&fk_materia=${materiaId}`)
                        .then(res => res.json())
                        .then(data => {
                            docenteInput.value = data.nombre || 'No asignado';
                        })
                        .catch(() => {
                            docenteInput.value = 'Error al buscar';
                        });
                } else {
                    docenteInput.value = '';
                }
            });
        });
    </script>
    @include('admin_crud.partials.footer')
</body>

</html>