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
                        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
                        <li class="active-bre"><a href="#"> Usuario (estudiante)</a></li>
                    </ul>
                </div>

                <!-- Mensajes -->
                <div class="message-block">
                    <div class="message-container">
                        <h3 class="message-title">¡Anuncio importante!</h3>
                        <img src="{{ asset('images/ev-bg1.jpg') }}" alt="">
                        <p class="message-text">No te pierdas nuestra nueva actualización del sistema ScholSys, que trae
                            mejoras en la gestión de estudiantes y comunicación. ¡Mantente al tanto de las novedades!
                        </p>
                    </div>
                </div>
                <div class="message-block">
                    <div class="message-container">
                        <h3 class="message-title">¡Anuncio importante!</h3>
                        <img src="{{ asset('images/ev-in-bg1.jpg') }}" alt="">
                        <p class="message-text">No te pierdas nuestra nueva actualización del sistema ScholSys, que trae
                            mejoras en la gestión de estudiantes y comunicación. ¡Mantente al tanto de las novedades!
                        </p>
                    </div>
                </div>
                <div class="message-block">
                    <div class="message-container">
                        <h3 class="message-title">¡Anuncio importante!</h3>
                        <img src="{{ asset('images/h-adm.jpg') }}" alt="">
                        <p class="message-text">No te pierdas nuestra nueva actualización ¡Mantente al tanto de las
                            novedades!</p>
                    </div>
                </div>

                <script src="{{ asset('lib/owlcarousel/slider.js') }}"></script>
            </div>
        </div>
    </div>

    @include('estudiante.partials.fotter')
</body>

</html>