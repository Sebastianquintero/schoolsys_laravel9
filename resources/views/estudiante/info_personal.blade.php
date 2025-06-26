<!DOCTYPE html>
<html lang="en">

<head>
    <title>ScholSys</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Información personal de los estudiantes">
    <meta name="keyword" content="información personal, estudiante, contacto, perfil">
    <link rel="shortcut icon" href="{{ asset('img/ScholSys_login.jpg') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CJosefin+Sans:600,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link href="{{ asset('css/materialize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style2.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/info_personal.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-mob.css') }}" rel="stylesheet" />
    <!--[if lt IE 9]>
    <script src="{{ asset('js/html5shiv.js') }}"></script>
    <script src="{{ asset('js/respond.min.js') }}"></script>
    <![endif]-->
</head>

<body>
    <div class="container-fluid sb1">
        <div class="row">
            <div class="col-md-2 col-sm-3 col-xs-6 sb1-1">
                <a href="#" class="btn-close-menu"><i class="fa fa-times" aria-hidden="true"></i></a>
                <a href="#" class="atab-menu"><i class="fa fa-bars tab-menu" aria-hidden="true"></i></a>
                <a href="{{ route('welcome') }}" class="a">
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
                    <a class='waves-effect btn-noti' href="{{ route('dashboard_estudiante') }}"><i class="fa fa-commenting-o"></i><span>1</span></a>
                    <a class='waves-effect btn-noti' href="#"><i class="fa fa-envelope-o"></i><span>1</span></a>   <!-- Asignar la ruta correspondiente -->
                    <a class='waves-effect btn-noti' href="#"><i class="fa fa-tag"></i><span></span></a>
                </div>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6">
                <a class='waves-effect dropdown-button top-user-pro' href='#' data-activates='top-menu'><img src="{{ asset('images/placeholder.jpg') }}" alt="" />Mi cuenta <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                <ul id='top-menu' class='dropdown-content top-menu-sty'>
                    <li><a href="{{ route('perfil') }}" class="waves-effect"><i class="fa fa-cogs"></i>Configuración de perfil</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ route('logout') }}" class="ho-dr-con-last waves-effect"><i class="fa fa-sign-in"></i>Cerrar sesión</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid sb2">
        <div class="row">
            <div class="sb2-1">
                <div class="sb2-12">
                    <ul>
                        <li><img src="{{ asset('images/placeholder.jpg') }}" alt=""></li>
                        <li><h5>Estudiante prueba<span> Bogotá D.C.</span></h5></li>
                    </ul>
                </div>
                <div class="sb2-13">
                    <ul class="collapsible" data-collapsible="accordion">
                        <li>
                            <a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-info-circle"></i> Informativo</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="{{ route('dashboard_estudiante') }}">Noticias</a></li>
                                    <li><a href="{{ route('perfil') }}">Perfil</a></li>
                                    <li><a href="{{ route('info_personal') }}">Información Personal</a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-graduation-cap"></i> Académico</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>                    
                                      <!-- Asignar las rutas correspondientes -->
                                    <li><a href="#">Actividades</a></li>
                                    <li><a href="#">Cursos</a></li>
                                    <li><a href="#">Profesores</a></li>
                                    <li><a href="#">Encuestas</a></li>
                                    <li><a href="#">Calificaciones</a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="#" class="collapsible-header"><i class="fa fa-users"></i> Correo</a>
                        </li>
                    </ul>
                </div>
            </div>
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
                                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" value="#">
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

    <script src="{{ asset('js/main.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
