<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ScholSys</title>
    <link rel="shortcut icon" href="{{ asset('img/ScholSys_login.jpg') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CJosefin+Sans:600,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link href="{{ asset('css/materialize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style2.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style-mob.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="container-fluid sb1">
        <div class="row">
            <div class="col-md-2 col-sm-3 col-xs-6 sb1-1">
                <a href="#" class="btn-close-menu"><i class="fa fa-times" aria-hidden="true"></i></a>
                <a href="#" class="atab-menu"><i class="fa fa-bars tab-menu" aria-hidden="true"></i></a>
                <a href="{{ url('/') }}" class="a">
                    <h1 class="m0">ScholSys</h1>
                </a>
            </div>
            <div class="col-md-6 col-sm-6 mob-hide">
                <form class="app-search">
                    <input type="text" placeholder="Search..." class="form-control">
                    <a href="#"><i class="fa fa-search"></i></a>
                </form>
            </div>
            <div class="col-md-2 tab-hide">
                <div class="top-not-cen">
                    <a class='waves-effect btn-noti' href="#"><i class="fa fa-commenting-o" aria-hidden="true"></i><span>5</span></a>
                    <a class='waves-effect btn-noti' href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i><span>5</span></a>
                    <a class='waves-effect btn-noti' href="#"><i class="fa fa-tag" aria-hidden="true"></i><span>5</span></a>
                </div>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6">
                <a class='waves-effect dropdown-button top-user-pro' href='#' data-activates='top-menu'>
                    <img src="{{ asset('images/user/6.png') }}" alt="" />Administrador <i class="fa fa-angle-down" aria-hidden="true"></i>
                </a>
                <ul id='top-menu' class='dropdown-content top-menu-sty'>
                    <li><a href="#" class="waves-effect"><i class="fa fa-cogs" aria-hidden="true"></i>Config de perfil</a></li>
                    <li class="divider"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="ho-dr-con-last waves-effect"><i class="fa fa-sign-in" aria-hidden="true"></i> Cerrar sesión</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid sb2">
        <div class="row">
            <div class="sb2-2-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-inn-sp admin-form">
                            <div class="inn-title">
                                <h4>Configurar Slider</h4>
                                <p>Agrega y configura los elementos del slider que se mostrarán en la página principal.</p>
                            </div>
                            <div class="bor ad-cou-deta-h4">
                                <form action="#" method="POST" enctype="multipart/form-data"> <!-- Cambia la acción al endpoint correcto (# -- ruta correcta)-->
                                    @csrf
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input type="text" name="slide_title" class="validate" required>
                                            <label>Título del Slide:</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <textarea name="slide_description" class="materialize-textarea" required></textarea>
                                            <label>Descripción del Slide:</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="file-field input-field col s12">
                                            <div class="btn admin-upload-btn">
                                                <span>Subir Imagen</span>
                                                <input type="file" name="slide_image" accept="image/*" required>
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text" placeholder="Cargar imagen para el slide">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input type="url" name="slide_link" class="validate">
                                            <label>Enlace relacionado (opcional):</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <button type="submit" class="waves-effect waves-light btn-large">Guardar Slide</button>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <a href="{{ route('comunica_admin') }}" class="waves-effect waves-light btn-large">Volver al Dashboard</a>
                                            </div>
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

    <script src="{{ asset('js/main.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
