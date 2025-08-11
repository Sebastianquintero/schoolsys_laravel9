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

    <!--== BODY INNER CONTAINER ==-->
    <div class="sb2-2">
        <div class="sb2-2-2">
            <ul>
                <li><a href="{{ url('dashboard_estudiante') }}"><i class="fa fa-home"></i> Inicio</a></li>
                <li class="active-bre"><a href="#"> Usuario (estudiante)</a></li>
            </ul>
        </div>

        <!--== PROFILE FORM ==-->
        <div class="profile-form">
            <h4>Perfil de Estudiante</h4>

            @if(!$data)
                <div class="alert alert-warning">No se encontró información del perfil.</div>
            @else
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="nombre" class="form-control"
                                value="{{ $data->nombres }} {{ $data->apellidos }}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="email">Correo Electrónico:</label>
                            <input type="email" id="email" class="form-control" value="{{ $data->correo }}" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="telefono">Teléfono:</label>
                            <input type="text" id="telefono" class="form-control" value="{{ $data->telefono }}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="direccion">Dirección:</label>
                            <input type="text" id="direccion" class="form-control" value="{{ $data->direccion }}" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="fecha-nacimiento">Fecha de Nacimiento:</label>
                            <input type="date" id="fecha-nacimiento" class="form-control"
                                value="{{ $data->fecha_nacimiento ?? '' }}" readonly>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>
    </div>
    </div>

    @include('estudiante.partials.fotter')
</body>

</html>