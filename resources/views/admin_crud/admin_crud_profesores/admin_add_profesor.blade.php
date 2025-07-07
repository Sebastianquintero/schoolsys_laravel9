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

            <!--== CONTENEDOR PRINCIPAL ==-->
            <div class="sb2-2">
                <!--== Breadcrumbs ==-->
                <div class="sb2-2-2">
                    <ul>
                        <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a></li>
                        <li class="active-bre"><a href="#"> Agregar Profesor</a></li>
                    </ul>
                </div>

                <!--== Formulario Agregar Profesor ==-->
                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-inn-sp admin-form">
                                <div class="inn-title">
                                    <h4>Agregar Profesor</h4>
                                    <p>Formulario para crear un nuevo profesor vinculado al colegio</p>
                                </div>

                                <div class="tab-inn">
                                    <form action="{{ route('guardar_docente') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input type="text" name="nombres" placeholder="Nombres" required>
                                                <label>Nombre</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input type="text" name="apellidos" placeholder="Apellidos" required>
                                                <label>Apellido</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input type="text" name="tipo_documento" placeholder="Tipo documento"
                                                    required>
                                                <label>tipo de documento</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input type="text" name="numero_documento"
                                                    placeholder="Numero documento" required>
                                                <label>numero de documento</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input type="text" name="cargo" placeholder="Cargo / Puesto" required>
                                                <label>Cargo / Puesto</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input type="text" name="tipo_contrato" placeholder="Tipo de contrato"
                                                    required>
                                                <label>Tipo de Contrato</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-field col s6">
                                                <span class="helper-text">Fecha inicio contrato</span>
                                                <input type="date" name="fecha_inicio" required>
                                            </div>
                                            <div class="input-field col s6">
                                                <span class="helper-text">Fecha fin contrato</span>
                                                <input type="date" name="fecha_fin" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input type="text" name="duracion" placeholder="Duración del contrato"
                                                    required>
                                                <label>Duración</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input type="text" name="numero_telefono" placeholder="Teléfono">
                                                <label>Teléfono</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input type="email" name="correo" placeholder="Correo institucional"
                                                    required>
                                                <label>Correo Institucional</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input type="email" name="correo_personal"
                                                    placeholder="Correo personal">
                                                <label>Correo Personal</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <span class="helper-text">Ingrese la fecha de nacimiento</span>
                                                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" required>
                                                
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="file-field input-field col s12">
                                                <div class="btn admin-upload-btn">
                                                    <span>Foto</span>
                                                    <input type="file" name="foto" accept="image/*">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text"
                                                        placeholder="Foto del Profesor">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-field col s12">
                                                <button type="submit" class="waves-effect waves-light btn-large">Guardar
                                                    Profesor</button>
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
                                </div> <!-- tab-inn -->
                            </div> <!-- box-inn-sp -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('admin_crud.partials.footer')
</body>


</html>