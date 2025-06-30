<!DOCTYPE html>
<html lang="en">

<head>
    @include('estudiante.partials.head')
</head>

<body>
    <!-- Contenedor principal -->
    @include('estudiante.partials.contenedorPrincipalEst')

    <!-- Cuerpo -->
    @include('estudiante.partials.menu')

    <!-- Contenido principal -->
            <div class="sb2-2">
                <div class="sb2-2-2">
                    <ul>
                        <li><a href="{{ route('dashboard_estudiante') }}"><i class="fa fa-home"></i>Inicio</a></li>
                        <li class="active-bre"><a href="#"> Información Personal</a></li>
                    </ul>
                </div>
                <div class="profile-form">
                    <h4>Información Personal</h4>
                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label for="nombre">Nombre Completo:</label>
                                <input type="text" id="nombre" name="nombre" class="form-control" value="#">
                            </div>
                            <div class="col-md-6">
                                <label for="email">Correo Electrónico:</label>
                                <input type="email" id="email" name="email" class="form-control" value="#">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="telefono">Teléfono:</label>
                                <input type="text" id="telefono" name="telefono" class="form-control" value="#">
                            </div>
                            <div class="col-md-6">
                                <label for="direccion">Dirección:</label>
                                <input type="text" id="direccion" name="direccion" class="form-control" value="#">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control"
                                    value="#">
                            </div>
                            <div class="col-md-6">
                                <label for="sexo">Sexo:</label>
                                <select id="sexo" name="sexo" class="form-control">
                                    <option value="Femenino">Femenino</option>
                                    <option value="Masculino">Masculino</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="estado_civil">Estado Civil:</label>
                                <select id="estado_civil" name="estado_civil" class="form-control">
                                    <option value="Soltero">Soltero</option>
                                    <option value="Casado">Casado</option>
                                    <option value="Divorciado">Divorciado</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="foto_perfil">Foto de Perfil:</label>
                                <input type="file" id="foto_perfil" name="foto_perfil" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="fecha_registro">Fecha de Registro:</label>
                                <input type="date" id="fecha_registro" class="form-control" value="#" readonly>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Actualizar Información</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('estudiante.partials.fotter')
</body>

</html>