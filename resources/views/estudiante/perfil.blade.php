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
                    <form action="#" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="nombre">Nombre:</label>
                                <input type="text" id="nombre" name="nombre" class="form-control" value="Victoria Baker"
                                    readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="email">Correo Electrónico:</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    value="victoria@example.com" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="telefono">Teléfono:</label>
                                <input type="text" id="telefono" name="telefono" class="form-control"
                                    value="123-456-7890" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="direccion">Dirección:</label>
                                <input type="text" id="direccion" name="direccion" class="form-control"
                                    value="Bogotá D.C." readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="fecha-nacimiento">Fecha de Nacimiento:</label>
                                <input type="date" id="fecha-nacimiento" name="fecha-nacimiento" class="form-control"
                                    value="1998-04-25" readonly>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('estudiante.partials.fotter')  
</body>

</html>