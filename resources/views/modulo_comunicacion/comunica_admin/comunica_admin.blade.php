<!DOCTYPE html>
<html lang="es">

<head>
    <title>ScholSys</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="description" content="ScholSys plataforma educativa">
    <meta name="keyword" content="educación, colegio, universidad, plataforma">

    <link rel="shortcut icon" href="{{ asset('img/ScholSys_login.jpg') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Josefin+Sans:600,700" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    
    <!-- Estilos -->
    <link rel="stylesheet" href="{{ asset('css/materialize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-mob.css') }}">
</head>

<body>

    <!-- Header -->
    <div class="container-fluid sb1">
        <div class="row">
            <div class="col-md-2 col-sm-3 col-xs-6 sb1-1">
                <a href="#" class="btn-close-menu"><i class="fa fa-times"></i></a>
                <a href="#" class="atab-menu"><i class="fa fa-bars tab-menu"></i></a>
                <a href="{{ route('welcome') }}" class="a"><h1 class="m0">ScholSys</h1></a>
            </div>

            <div class="col-md-6 col-sm-6 mob-hide">
                <form class="app-search">
                    <input type="text" placeholder="Buscar..." class="form-control">
                    <a href="#"><i class="fa fa-search"></i></a>
                </form>
            </div>

            <div class="col-md-2 tab-hide">
                <div class="top-not-cen">
                    <a class='waves-effect btn-noti' href="#"><i class="fa fa-commenting-o"></i><span>5</span></a>
                    <a class='waves-effect btn-noti' href="#"><i class="fa fa-envelope-o"></i><span>5</span></a>
                    <a class='waves-effect btn-noti' href="#"><i class="fa fa-tag"></i><span>5</span></a>
                </div>
            </div>

            <div class="col-md-2 col-sm-3 col-xs-6">
                <a class='waves-effect dropdown-button top-user-pro' href='#' data-activates='top-menu'>
                    <img src="{{ asset('images/user/6.png') }}" alt="Usuario" />Administrador <i class="fa fa-angle-down"></i>
                </a>
                <ul id='top-menu' class='dropdown-content top-menu-sty'>
                    <li><a href="#" class="waves-effect"><i class="fa fa-cogs"></i>Config de perfil</a></li>
                    <li class="divider"></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="ho-dr-con-last waves-effect btn btn-link" type="submit">
                                <i class="fa fa-sign-in"></i> Cerrar sesión
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Botones -->
    <div class="button-container text-center my-4">
        <a href="{{ route('comunica_add_admin') }}" class="btn btn-primary">Añadir Anuncio</a>
        <a href="{{ route('comunica_config_admin') }}" class="btn btn-secondary">Configurar Slider</a>
    </div>

    <!-- Slider -->
    <div class="slider_inicio_comunicacion">
        <div id="customSlider" class="new-slider-container">
            <div class="new-slider-wrapper">

                <div class="new-slide active">
                    <img class="new-slide-image" src="{{ asset('img/automatizacion.jpg') }}" alt="Primera Diapositiva">
                    <div class="new-slide-caption">
                        <h2 class="new-slide-title">Bienvenido a ScholSys</h2>
                        <p class="new-slide-description">Administra colegios en Colombia de forma eficiente.</p>
                        <a href="#learnMore" class="new-slide-button">Ver</a>
                    </div>
                </div>

                <div class="new-slide">
                    <img class="new-slide-image" src="{{ asset('img/funcionalidad.jpg') }}" alt="Segunda Diapositiva">
                    <div class="new-slide-caption">
                        <h2 class="new-slide-title">Innovación Educativa</h2>
                        <p class="new-slide-description">Gestiona estudiantes, notas y comunicación fácilmente.</p>
                        <a href="#features" class="new-slide-button">Ver</a>
                    </div>
                </div>

                <div class="new-slide">
                    <img class="new-slide-image" src="{{ asset('img/fuond.jpg') }}" alt="Tercera Diapositiva">
                    <div class="new-slide-caption">
                        <h2 class="new-slide-title">Soporte 24/7</h2>
                        <p class="new-slide-description">Estamos contigo en cada paso del camino.</p>
                        <a href="#support" class="new-slide-button">Ver</a>
                    </div>
                </div>
            </div>

            <button class="new-slider-control prev">&#10094;</button>
            <button class="new-slider-control next">&#10095;</button>

            <div class="new-slider-indicators">
                <span class="new-indicator active" data-slide-to="0"></span>
                <span class="new-indicator" data-slide-to="1"></span>
                <span class="new-indicator" data-slide-to="2"></span>
            </div>
        </div>
    </div>

    <!-- Mensajes -->
    @for ($i = 0; $i < 3; $i++)
        <div class="message-block">
            <div class="message-container">
                <h3 class="message-title">¡Anuncio importante!</h3>
                <img src="{{ asset('img/icon/mail-icon.png') }}" alt="">
                <p class="message-text">
                    No te pierdas nuestra nueva actualización del sistema ScholSys, que trae mejoras en la gestión de estudiantes y comunicación.
                    ¡Mantente al tanto de las novedades!
                </p>
            </div>
        </div>
    @endfor

    <!-- Calendario -->
    <div class="sb2-r">
        <div class="calendar">
            <iframe 
                src="https://calendar.google.com/calendar/embed?src=tucorreo@gmail.com&ctz=America%2FNew_York" 
                style="border:0" 
                width="800" 
                height="600" 
                frameborder="0" 
                scrolling="no">
            </iframe>
        </div>
    </div>

    <!-- JS -->
    <script src="{{ asset('lib/owlcarousel/slider.js') }}"></script>

</body>
</html>