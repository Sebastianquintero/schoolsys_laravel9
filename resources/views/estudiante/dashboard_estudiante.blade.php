<!DOCTYPE html>
<html lang="en">

<head>
    <title>ScholSys</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistema escolar ScholSys">
    <meta name="keyword" content="educación, colegio, universidad, cursos">
    <link rel="shortcut icon" href="{{ asset('img/ScholSys_login.jpg') }}" type="image/x-icon">

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CJosefin+Sans:600,700"
        rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link href="{{ asset('css/materialize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-mob.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Contenedor principal -->
    <div class="container-fluid sb1">
        <div class="row">
            <div class="col-md-2 col-sm-3 col-xs-6 sb1-1">
                <a href="#" class="btn-close-menu"><i class="fa fa-times"></i></a>
                <a href="#" class="atab-menu"><i class="fa fa-bars tab-menu"></i></a>
                <a href="{{ url('/welcome') }}">
                    <h1 class="m0">ScholSys</h1>
                </a>
            </div>
            <div class="col-md-6 col-sm-6 mob-hide">
                <form class="app-search">
                    <input type="text" placeholder="Buscar..." class="form-control">
                    <a href="#"><i class="fa fa-search"></i></a>
                </form>
            </div>
            <div class="col-md-2 tab-hide">
                <div class="top-not-cen">
                    <a class='waves-effect btn-noti' href="{{ url('dashboard_estudiante') }}"><i
                            class="fa fa-commenting-o"></i><span>1</span></a>
                    <a class='waves-effect btn-noti' href="{{ url('mail') }}"><i
                            class="fa fa-envelope-o"></i><span>1</span></a>
                    <a class='waves-effect btn-noti' href="#"><i class="fa fa-tag"></i></a>
                </div>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6">
                <a class='waves-effect dropdown-button top-user-pro' href='#' data-activates='top-menu'>
                    <img src="{{ asset('images/placeholder.jpg') }}" alt=""> Mi cuenta <i class="fa fa-angle-down"></i>
                </a>
                <ul id='top-menu' class='dropdown-content top-menu-sty'>
                    <li><a href="{{ url('profile') }}"><i class="fa fa-cogs"></i>Configuración de perfil</a></li>
                    <li class="divider"></li>
                    <li>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-in"></i>Cerrar sesión
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Cuerpo -->
    <div class="container-fluid sb2">
        <div class="row">
            <!-- Menú lateral -->
            <div class="sb2-1">
                <div class="sb2-12">
                    <ul>
                        <li><img src="{{ asset('images/placeholder.jpg') }}" alt=""></li>
                        @php
                            $rol = Auth::user()->fk_rol;
                        @endphp
                        <li>
                            <h5>{{ Auth::user()->nombres }} {{ Auth::user()->apellidos }}

                                @if($rol == 3 && Auth::user()->estudiante)
                                    <span>{{ Auth::user()->estudiante->grado }}</span>
                                @elseif($rol == 1)
                                    <span>Administrador</span>
                                @endif
                            </h5>
                        </li>
                    </ul>
                </div>
                <div class="sb2-13">
                    <ul class="collapsible" data-collapsible="accordion">
                        <li>
                            <a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-info-circle"></i>
                                Informativo</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="{{ route('dashboard_estudiante') }}">Noticias</a></li>
                                    <li><a href="{{ route('perfil') }}">Perfil</a></li>
                                    <li><a href="{{ route('info_personal') }}">Información Personal</a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-graduation-cap"></i>
                                Académico</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="{{ route('actividades') }}">Actividades</a></li>
                                    <li><a href="{{ route('cursos') }}">Cursos</a></li>
                                    <li><a href="{{ route('estudiante_profesor') }}">Profesores</a></li>
                                    <li><a href="{{ route('encuesta') }}">Encuestas</a></li>
                                    <li><a href="{{ route('calificaciones') }}">Calificaciones</a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="{{ url('mail') }}" class="collapsible-header"><i class="fa fa-users"></i>
                                Correo</a>
                        </li>
                    </ul>
                </div>
            </div>

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

    <!-- JS -->
    <script src="{{ asset('js/main.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

    <!-- Logout Form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>

</html>