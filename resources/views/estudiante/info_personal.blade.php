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
            <form action="{{ route('estudiante.updateInfo') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Nombre y correo (solo lectura) --}}
                <div class="row">
                    <div class="col-md-6">
                        <label for="nombre">Nombre Completo:</label>
                        <input type="text" id="nombre" name="nombre" class="form-control"
                            value="{{ ($usuario->nombres ?? '') . ' ' . ($usuario->apellidos ?? '') }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="correo_personal">Correo Electrónico:</label>
                        <input type="email" id="correo_personal" name="correo_personal" class="form-control"
                            value="{{ $estudiante->correo_personal ?? '' }}">
                    </div>
                    <div class="col-md-6">
                        <label for="email">Correo de ingreso:</label>
                        <input type="email" id="email" name="email" class="form-control"
                            value="{{ $usuario->correo ?? '' }}" readonly>
                    </div>
                </div>

                {{-- Campos editables --}}
                <div class="row">
                    <div class="col-md-6">
                        <label for="telefono">Teléfono:</label>
                        <input type="text" id="telefono" name="telefono" class="form-control"
                            value="{{ old('telefono', $usuario->numero_telefono ?? ($estudiante->telefono ?? '')) }}">
                    </div>
                    <div class="col-md-6">
                        <label for="direccion">Dirección:</label>
                        <input type="text" id="direccion" name="direccion" class="form-control"
                            value="{{ old('direccion', $estudiante->direccion ?? '') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="edad">Edad:</label>
                        <input type="text" id="edad" name="edad" class="form-control"
                            value="{{ old('edad', $estudiante->edad ?? '') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="nacionalidad">Nacionalidad:</label>
                        <input type="text" id="nacionalidad" name="nacionalidad" class="form-control"
                            value="{{ old('nacionalidad', $estudiante->nacionalidad ?? '') }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control"
                            value="{{ old('fecha_nacimiento', $usuario->fecha_nacimiento ?? '') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="acudiente">acudiente:</label>
                        <input type="text" id="acudiente" name="acudiente" class="form-control"
                            value="{{ old('acudiente', $estudiante->acudiente ?? '') }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="eps">Eps:</label>
                        <input type="text" id="eps" name="eps" class="form-control"
                            value="{{ old('eps', $estudiante->eps ?? '') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="foto_path">Foto de Perfil:</label>
                        <input type="file" id="foto_path" name="foto_path" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="fecha_registro">Fecha de Registro:</label>
                        <input type="date" id="fecha_registro" class="form-control"
                            value="{{ $usuario->created_at ? $usuario->created_at->format('Y-m-d') : '' }}" readonly>
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