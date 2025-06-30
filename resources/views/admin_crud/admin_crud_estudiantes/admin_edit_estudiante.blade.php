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


            <!--== BODY INNER CONTAINER ==-->
            <div class="sb2-2">
                <!--== breadcrumbs ==-->
                <div class="sb2-2-2">
                    <ul>
                        <li><a href="index-2.html"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                        </li>
                        <li class="active-bre"><a href="#"> Usuarios(estudiantes)</a>

                    </ul>
                </div>

                <!--== User Details ==-->
                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-inn-sp admin-form">
                                <div class="inn-title">
                                    <h4>Editar información</h4>
                                    <p>Here you can edit</p>
                                </div>
                                <div class="tab-inn">
                                    <form action="{{ route('actualizar_estudiante', $estudiante->id_estudiante) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input type="text" name="nombres"
                                                    value="{{ old('nombres', $estudiante->usuario->nombres) }}"
                                                    class="validate" required>
                                                <label class="active">Nombre</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input type="text" name="apellidos"
                                                    value="{{ old('apellidos', $estudiante->usuario->apellidos) }}"
                                                    class="validate" required>
                                                <label class="active">Apellido</label>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="input-field col s6">
                                                <input type="email" name="correo"
                                                    value="{{ old('correo', $estudiante->usuario->correo) }}"
                                                    class="validate" required>
                                                <label class="active">Correo</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input type="text" name="telefono"
                                                    value="{{ old('telefono', $estudiante->telefono) }}"
                                                    class="validate" required>
                                                <label class="active">Teléfono</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input type="text" name="acudiente"
                                                    value="{{ old('acudiente', $estudiante->acudiente) }}"
                                                    class="validate">
                                                <label class="active">Acudiente</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input type="text" name="correo_personal"
                                                    value="{{ old('correo_personal', $estudiante->correo_personal) }}"
                                                    class="validate">
                                                <label class="active">Tel/Acudiente</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input type="text" name="direccion"
                                                    value="{{ old('direccion', $estudiante->direccion) }}"
                                                    class="validate">
                                                <label class="active">Dirección</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="file-field input-field col s12">
                                                <div class="btn admin-upload-btn">
                                                    <span>Foto</span>
                                                    <input type="file" name="foto">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text"
                                                        placeholder="Imagen estudiante">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-field col s6">
                                                <button type="submit"
                                                    class="btn-large waves-effect waves-light">Actualizar</button>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-field col s6">
                                                <form
                                                    action="{{ route('eliminar_estudiante', $estudiante->id_estudiante) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('¿Estás seguro de eliminar este estudiante?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn-large red darken-2 waves-effect waves-light">Eliminar</button>
                                                </form>
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
</body>


</html>