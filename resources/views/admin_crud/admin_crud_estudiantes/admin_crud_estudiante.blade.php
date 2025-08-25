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
                        <li><img src="{{ auth()->user()->foto_url }}" class="img-thumbnail rounded-circle" width="120"
                                alt="Foto">
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
                <!--== breadcrumbs ==-->
                <div class="sb2-2-2">
                    <ul>
                        <li><a href="index-2.html"><i class="fa fa-home" aria-hidden="true"></i>Inicio</a>
                        </li>
                        <li class="active-bre"><a href="#">Agregar estudiante</a>
                        </li>
                        <li class="page-back"><a href="{{ route('admin') }}"><i class="fa fa-backward"
                                    aria-hidden="true"></i>Atras</a>
                        </li>
                    </ul>
                </div>

                <!--== User Details ==-->
                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-inn-sp admin-form">
                                <div class="inn-title">
                                    <h4>Agregar un nuevo estudiante</h4>
                                    <p>Here you can edit your website basic details URL, Phone, Email, Address, User and
                                        password and more</p>
                                </div>
                                <div class="tab-inn">
                                    <form action="{{ route('guardar_estudiante') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input type="text" id="nombres" name="nombres" placeholder="Nombres"
                                                    required>
                                            </div>
                                            <div class="input-field col s6">
                                                <input type="text" id="apellidos" name="apellidos"
                                                    placeholder="Apellidos" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input type="email" id="correo" name="correo"
                                                    placeholder="Correo institucional" readonly required>
                                            </div>
                                        </div>

                                        <script>
                                            document.addEventListener("DOMContentLoaded", () => {
                                                const nombres = document.getElementById("nombres");
                                                const apellidos = document.getElementById("apellidos");
                                                const correo = document.getElementById("correo");

                                                function generarCorreo() {
                                                    if (nombres.value && apellidos.value) {
                                                        let parteNombre = nombres.value.substring(0, 2).toLowerCase();
                                                        let parteApellido = apellidos.value.substring(0, 2).toLowerCase();
                                                        correo.value = parteNombre + parteApellido + "@school.edu.co";
                                                    }
                                                }

                                                nombres.addEventListener("input", generarCorreo);
                                                apellidos.addEventListener("input", generarCorreo);
                                            });
                                        </script>

                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input type="email" id="correo" name="correo_personal"
                                                    placeholder="Correo personal" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-field col s6">
                                                <label class="active">Tipo de documento</label>
                                                <select name="tipo_documento" class="form-control" required>
                                                    <option value="">-- Selecciona --</option>
                                                    <option value="TI" {{ old('tipo_documento') == 'TI' ? 'selected' : '' }}>TI</option>
                                                    <option value="CC" {{ old('tipo_documento') == 'CC' ? 'selected' : '' }}>CC</option>
                                                    <option value="PPT" {{ old('tipo_documento') == 'PPT' ? 'selected' : '' }}>PPT</option>
                                                    <option value="PEP" {{ old('tipo_documento') == 'PEP' ? 'selected' : '' }}>PEP</option>
                                                </select>
                                            </div>
                                            <div class="input-field col s6">
                                                <input type="text" name="numero_documento"
                                                    placeholder="Número de documento" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-field col s6">
                                                <span class="helper-text">Fecha de nacimiento</span>
                                                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento"
                                                    required>
                                            </div>
                                            <div class="input-field col s6">
                                                <input type="text" id="edad" name="edad" placeholder="Edad" readonly
                                                    required>
                                            </div>
                                        </div>

                                        <script>
                                            document.getElementById("fecha_nacimiento").addEventListener("change", function () {
                                                let nacimiento = new Date(this.value);
                                                let hoy = new Date();
                                                let edad = hoy.getFullYear() - nacimiento.getFullYear();
                                                let m = hoy.getMonth() - nacimiento.getMonth();
                                                if (m < 0 || (m === 0 && hoy.getDate() < nacimiento.getDate())) {
                                                    edad--;
                                                }

                                                if (edad < 5) {
                                                    alert("El estudiante debe tener al menos 5 años.");
                                                    this.value = "";
                                                    document.getElementById("edad").value = "";
                                                } else {
                                                    document.getElementById("edad").value = edad;
                                                }
                                            });
                                        </script>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input type="text" name="numero_telefono"
                                                    placeholder="Número de teléfono" required>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="input-field col s6">
                                                <span class="helper-text">Tipo de vía</span>
                                                <label class="active">Tipo de vía</label>
                                                <select name="tipo_via" required class="form-control">
                                                    <option value="">-- Selecciona --</option>
                                                    <option value="Calle">Calle</option>
                                                    <option value="Carrera">Carrera</option>
                                                    <option value="Transversal">Transversal</option>
                                                    <option value="Diagonal">Diagonal</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input type="text" name="direccion" placeholder="Dirección" required>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input type="text" name="grado" placeholder="Grado" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-field col s6">
                                                <label class="active">Curso (seleccionar)</label>
                                                <select name="fk_curso" class="form-control">
                                                    <option value="">-- Selecciona curso --</option>
                                                    @foreach ($cursos as $c)
                                                        <option value="{{ $c->id_curso }}" {{ old('fk_curso') == $c->id_curso ? 'selected' : '' }}>
                                                            {{ $c->nombre_curso }} ({{ $c->numero_curso }})
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <small class="helper-text">Recomendado</small>
                                            </div>

                                            <div class="input-field col s6">
                                                <label class="active">o Número de curso</label>
                                                <input type="text" name="numero_curso" placeholder="Ej. 402"
                                                    value="{{ old('numero_curso') }}">
                                                <small class="helper-text">Opcional, solo si no seleccionas
                                                    arriba</small>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-field col s6">
                                                <span class="helper-text">Nivel educativo</span>
                                                <label class="active">Nivel educativo</label>
                                                <select name="nivel_educativo" required class="form-control">
                                                    <option value="">-- Selecciona --</option>
                                                    <option value="Preescolar">Preescolar</option>
                                                    <option value="Primaria">Primaria</option>
                                                    <option value="Bachillerato">Bachillerato</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-field col s6">
                                                <span class="helper-text">Nacionalidad</span>
                                                <label class="active">Nacionalidad</label>
                                                <select id="nacionalidad" name="nacionalidad" required
                                                    class="form-control">
                                                    <option value="">-- Selecciona --</option>
                                                    <option value="Colombiana">Colombiana</option>
                                                    <option value="Venezolana">Venezolana</option>
                                                    <option value="Otro">Otro</option>
                                                </select>
                                                <input type="text" id="otra_nacionalidad" name="otra_nacionalidad"
                                                    placeholder="¿Cuál?" style="display:none; margin-top:10px;">
                                            </div>

                                            <script>
                                                document.getElementById("nacionalidad").addEventListener("change", function () {
                                                    let otra = document.getElementById("otra_nacionalidad");
                                                    if (this.value === "Otro") {
                                                        otra.style.display = "block";
                                                        otra.required = true;
                                                    } else {
                                                        otra.style.display = "none";
                                                        otra.required = false;
                                                    }
                                                });
                                            </script>
                                        </div>

                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input type="text" name="acudiente" placeholder="Acudiente" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input type="text" name="eps" placeholder="EPS" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input type="text" name="sisben" placeholder="SISBEN" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-field col s12">
                                                <button type="submit" class="waves-effect waves-light btn-large">Guardar
                                                    Estudiante</button>
                                            </div>
                                        </div>

                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
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
            </div>

        </div>
    </div>

@include('admin_crud.partials.footer')
</body>

</html>