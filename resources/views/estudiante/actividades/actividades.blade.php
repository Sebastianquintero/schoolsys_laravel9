<!DOCTYPE html>
<html lang="en">

<head>
    <title>ScholSys</title>
    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Información personal de los estudiantes">
    <meta name="keyword" content="información personal, estudiante, contacto, perfil">
    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CJosefin+Sans:600,700" rel="stylesheet">
    <!-- FONTAWESOME ICONS -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <!-- ALL CSS FILES -->
    <link href="{{ asset('css/materialize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style2.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/actividades.css') }}" rel="stylesheet" />
    <!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
    <link href="{{ asset('css/style-mob.css') }}" rel="stylesheet" />
    <link href="{{ asset('img/ScholSys_login.jpg') }}" rel="icon">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{ asset('js/html5shiv.js') }}"></script>
    <script src="{{ asset('js/respond.min.js') }}"></script>
    <![endif]-->
</head>

<body>
    <!--== MAIN CONTRAINER ==-->
    <div class="container-fluid sb1">
        <div class="row">
            <!--== LOGO ==-->
            <div class="col-md-2 col-sm-3 col-xs-6 sb1-1">
                <a href="#" class="btn-close-menu"><i class="fa fa-times"></i></a>
                <a href="#" class="atab-menu"><i class="fa fa-bars tab-menu"></i></a>
                <a href="{{ route('welcome') }}" class="a"><h1 class="m0">ScholSys</h1></a>
            </div>
            <!--== SEARCH ==-->
            <div class="col-md-6 col-sm-6 mob-hide">
                <form class="app-search">
                    <input type="text" placeholder="Search..." class="form-control">
                    <a href="#"><i class="fa fa-search"></i></a>
                </form>
            </div>
            <!--== NOTIFICATION ==-->
            <div class="col-md-2 tab-hide">
                <div class="top-not-cen">
                    <a class='waves-effect btn-noti' href="#"><i class="fa fa-commenting-o" aria-hidden="true"></i><span>5</span></a>
                    <a class='waves-effect btn-noti' href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i><span>5</span></a>
                    <a class='waves-effect btn-noti' href="#"><i class="fa fa-tag" aria-hidden="true"></i><span>5</span></a>
                </div>
            </div>
            <!--== MY ACCCOUNT ==-->
            <div class="col-md-2 col-sm-3 col-xs-6">
                <!-- Dropdown Trigger -->
                <a class='waves-effect dropdown-button top-user-pro' href='#' data-activates='top-menu'>
                    <img src="{{ asset('images/placeholder.jpg') }}" alt="" />Mi cuenta <i class="fa fa-angle-down" aria-hidden="true"></i>
                </a>

                <!-- Dropdown Structure -->
                <ul id='top-menu' class='dropdown-content top-menu-sty'>
                    <li><a href="{{ route('perfil') }}" class="waves-effect"><i class="fa fa-cogs" aria-hidden="true"></i>Configuracion de perfil</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ route('logout') }}" class="ho-dr-con-last waves-effect"><i class="fa fa-sign-in" aria-hidden="true"></i>Cerrar sesión</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!--== BODY CONTNAINER ==-->
    <div class="container-fluid sb2">
        <div class="row">
            <div class="sb2-1">
                <!--== USER INFO ==-->
                <div class="sb2-12">
                    <ul>
                        <li><img src="{{ asset('images/placeholder.jpg') }}" alt=""></li>
                        <li><h5>{{ Auth::user()->name }} <span> Bogotá D.C.</span></h5></li>
                        <li></li>
                    </ul>
                </div>
                <!--== LEFT MENU ==-->
                <div class="sb2-13">
                    <ul class="collapsible" data-collapsible="accordion">
                        <li>
                            <a href="javascript:void(0)" class="collapsible-header">
                                <i class="fa fa-info-circle" aria-hidden="true"></i> Informativo
                            </a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="{{ route('dashboard_estudiante') }}">Noticias</a></li>
                                    <li><a href="{{ route('perfil') }}">Perfil</a></li>
                                    <li><a href="{{ route('info_personal') }}">Información Personal</a></li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a href="javascript:void(0)" class="collapsible-header">
                                <i class="fa fa-graduation-cap" aria-hidden="true"></i> Académico
                            </a>
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
                            <a href="{{ route('mail') }}" class="collapsible-header">
                                <i class="fa fa-users" aria-hidden="true"></i> Correo
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!--== BODY INNER CONTAINER ==-->
            <div class="sb2-2">
                <!--== breadcrumbs ==-->
                <div class="sb2-2-2">
                    <ul>
                        <li><a href="{{ route('dashboard_estudiante') }}"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a></li>
                        <li class="active-bre"><a href="#"> Actividades Pendientes o Cerradas</a></li>
                    </ul>
                </div>

                <!--== Formulario Actividades Pendientes ==-->
                <div class="activities-list">
                    <h4>Lista de Actividades</h4>

                    <!-- Filtros -->
                    <div class="row">
                        <div class="col-md-6">
                            <label for="estado-actividad">Filtrar por Estado:</label>
                            <select id="estado-actividad" class="form-control">
                                <option value="pendiente">Pendiente por Evaluar</option>
                                <option value="cerrada">Cerrada</option>
                                <option value="todas">Todas</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="fecha-actividad">Filtrar por Fecha:</label>
                            <input type="date" id="fecha-actividad" class="form-control">
                        </div>
                    </div>

                    <!-- Tabla de Actividades -->
                    <table class="table table-striped mt-3">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Actividad</th>
                                <th>Fecha de Creación</th>
                                <th>Fecha de Cierre</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
        <tbody>
            <tr>
                <td data-label="ID">1</td>
                <td data-label="Actividad">Evaluación de Proyecto</td>
                <td data-label="Fecha de Creación">2024-12-01</td>
                <td data-label="Fecha de Cierre">2024-12-10</td>
                <td data-label="Estado"><span class="badge badge-warning">Pendiente</span></td>
                <td data-label="Acciones">
                    <button class="btn btn-primary btn-sm">Ver Detalles</button>
                    <button class="btn btn-success btn-sm">Cerrar</button>
                </td>
            </tr>
            <tr>
                <td data-label="ID">2</td>
                <td data-label="Actividad">Revisión de Tarea</td>
                <td data-label="Fecha de Creación">2024-11-25</td>
                <td data-label="Fecha de Cierre">2024-12-05</td>
                <td data-label="Estado"><span class="badge badge-success">Cerrada</span></td>
                <td data-label="Acciones">
                    <button class="btn btn-primary btn-sm">Ver Detalles</button>
                </td>
            </tr>
            <tr>
                <td data-label="ID">3</td>
                <td data-label="Actividad">Prueba Final de Curso</td>
                <td data-label="Fecha de Creación">2024-11-28</td>
                <td data-label="Fecha de Cierre">2024-12-06</td>
                <td data-label="Estado"><span class="badge badge-warning">Pendiente</span></td>
                <td data-label="Acciones">
                    <button class="btn btn-primary btn-sm">Ver Detalles</button>
                    <button class="btn btn-success btn-sm">Cerrar</button>
                </td>
            </tr>
        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--Import jQuery before materialize.js-->
    <script src="{{ asset('js/main.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
