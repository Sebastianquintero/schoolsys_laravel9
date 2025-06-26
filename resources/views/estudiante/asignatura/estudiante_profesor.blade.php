<!DOCTYPE html>
<html lang="en">

<head>
    <title>ScholSys</title>
    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="EEducation master is one of the best eEducational html template, it's suitable for all eEducation websites like university,college,school,online eEducation,tution center,distance eEducation,computer eEducation">
    <meta name="keyword" content="eEducation html template, university template, college template, school template, online eEducation template, tution center template">
    <!-- FAV ICON(BROWSER TAB ICON) -->
    <link rel="shortcut icon" href="{{ asset('img/ScholSys_login.jpg') }}" type="image/x-icon">
    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CJosefin+Sans:600,700" rel="stylesheet">
    <!-- FONTAWESOME ICONS -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <!-- ALL CSS FILES -->
    <link href="{{ asset('css/materialize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style2.css') }}" rel="stylesheet" />
    <!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
    <link href="{{ asset('css/style-mob.css') }}" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
	<script src="{{ asset('js/html5shiv.js') }}"></script>
	<script src="{{ asset('js/respond.min.js') }}"></script>
	<![endif]-->
</head>

<body>
    <div class="container-fluid sb1">
        <div class="row">
            <div class="col-md-2 col-sm-3 col-xs-6 sb1-1">
                <a href="#" class="btn-close-menu"><i class="fa fa-times"></i></a>
                <a href="#" class="atab-menu"><i class="fa fa-bars tab-menu"></i></a>
                <a href="{{ route('dashboard_estudiante') }}" class="a"><h1 class="m0">ScholSys</h1></a>
            </div>
            <div class="col-md-6 col-sm-6 mob-hide">
                <form class="app-search">
                    <input type="text" placeholder="Search..." class="form-control">
                    <a href="#"><i class="fa fa-search"></i></a>
                </form>
            </div>
            <div class="col-md-2 tab-hide">
                <div class="top-not-cen">
                    <a class='waves-effect btn-noti' href="{{ route('dashboard_estudiante') }}" title="dashboard"><i class="fa fa-commenting-o"></i><span>1</span></a>
                    <a class='waves-effect btn-noti' href="#" title="correo"><i class="fa fa-envelope-o"></i><span>1</span></a>
                    <a class='waves-effect btn-noti' href="#" title="etiquetas"><i class="fa fa-tag"></i></a>
                </div>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6">
                <a class='waves-effect dropdown-button top-user-pro' href='#' data-activates='top-menu'>
                    <img src="{{ asset('images/user/6.png') }}" alt="" />Mi Cuenta <i class="fa fa-angle-down"></i>
                </a>
                <ul id='top-menu' class='dropdown-content top-menu-sty'>
                    <li><a href="{{ route('perfil') }}" class="waves-effect"><i class="fa fa-cogs"></i>Configuracion de Perfil</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ route('logout') }}" class="ho-dr-con-last waves-effect"><i class="fa fa-sign-in"></i> Cerrar sesión</a></li>
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
                        <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-info-circle"></i> Informativo</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="{{ route('dashboard_estudiante') }}">Noticias</a></li>
                                    <li><a href="{{ route('perfil') }}">Perfil</a></li>
                                    <li><a href="{{ route('info_personal') }}">Información Personal</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-graduation-cap"></i> Académico</a>
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
                        <li><a href="{{ route('mail') }}" class="collapsible-header"><i class="fa fa-users"></i> Correo</a></li>
                    </ul>
                </div>
            </div>

            <div class="sb2-2">
                <div class="sb2-2-2">
                    <ul>
                        <li><a href="{{ route('dashboard_estudiante') }}"><i class="fa fa-home"></i> Inicio</a></li>
                        <li class="active-bre"><a href="#"> Usuarios(Estudiantes)</a></li>
                    </ul>
                </div>

                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-inn-sp">
                                <div class="inn-title">
                                    <h4>Profesores</h4>
                                    <form class="app-search">
                                        <input type="text" placeholder="Search..." class="form-control">
                                        <a href="#"><i class="fa fa-search"></i></a>
                                    </form>
                                </div>
                                <div class="tab-inn">
                                    <div class="table-responsive table-desi">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Foto</th>
                                                    <th>Nombre</th>
                                                    <th>Apellido</th>
                                                    <th>Teléfono</th>
                                                    <th>Correo</th>
                                                    <th>Dirección</th>
                                                    <th>Cursos Asignados</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><span class="list-img"><img src="images/user/1.png" alt=""></span>
                                                    </td>
                                                    <td><a href="#"><span class="list-enq-name">Nombre</span></a>
                                                    </td>
                                                    <td>Apellido</td>
                                                    <td>Telefono</td>
                                                    <td>Tel/acudiente</td>
                                                    <td>Correo</td>
                                                    <td>Acudiente</td>
                                                    <td>Direccion</td>
                                                    <td><a href="admin-proditc.html" class="ad-st-view">Cursos asignados</a></td>
													
                                                </tr>
                                                <tr>
                                                    <td><span class="list-img"><img src="images/user/2.png" alt=""></span>
                                                    </td>
                                                    <td><a href="#"><span class="list-enq-name">Nombre</span></a>
                                                    </td>
                                                    <td>Apellido</td>
                                                    <td>Telefono</td>
                                                    <td>Tel/acudiente</td>
                                                    <td>Correo</td>
                                                    <td>Acudiente</td>
                                                    <td>Direccion</td>
                                                    <td><a href="admin-proditc.html" class="ad-st-view">Cursos asignados</a></td>
													
                                                </tr>
                                                <tr>
                                                    <td><span class="list-img"><img src="images/user/4.png" alt=""></span>
                                                    </td>
                                                    <td><a href="#"><span class="list-enq-name">Nombre</span></a>
                                                    </td>
                                                    <td>Apellido</td>
                                                    <td>Telefono</td>
                                                    <td>Tel/acudiente</td>
                                                    <td>Correo</td>
                                                    <td>Acudiente</td>
                                                    <td>Direccion</td>
                                                    <td><a href="admin-proditc.html" class="ad-st-view">Cursos asignados</a></td>
													
                                                </tr>
                                                </tr>
                                                <tr>
                                                    <td><span class="list-img"><img src="images/user/5.png" alt=""></span>
                                                    </td>
                                                    <td><a href="#"><span class="list-enq-name">Nombre</span></a>
                                                    </td>
                                                    <td>Apellido</td>
                                                    <td>Telefono</td>
                                                    <td>Tel/acudiente</td>
                                                    <td>Correo</td>
                                                    <td>Acudiente</td>
                                                    <td>Direccion</td>
                                                    <td><a href="admin-proditc.html" class="ad-st-view">Cursos asignados</a></td>
													
                                                </tr>
                                                </tr>
                                                <tr>
                                                    <td><span class="list-img"><img src="images/user/1.png" alt=""></span>
                                                    </td>
                                                    <td><a href="#"><span class="list-enq-name">Nombre</span></a>
                                                    </td>
                                                    <td>Apellido</td>
                                                    <td>Telefono</td>
                                                    <td>Tel/acudiente</td>
                                                    <td>Correo</td>
                                                    <td>Acudiente</td>
                                                    <td>Direccion</td>
                                                    <td><a href="admin-proditc.html" class="ad-st-view">Cursos asignados</a></td>
													
                                                </tr>
                                                </tr>
                                                <tr>
                                                    <td><span class="list-img"><img src="images/user/2.png" alt=""></span>
                                                    </td>
                                                    <td><a href="#"><span class="list-enq-name">Nombre</span></a>
                                                    </td>
                                                    <td>Apellido</td>
                                                    <td>Telefono</td>
                                                    <td>Tel/acudiente</td>
                                                    <td>Correo</td>
                                                    <td>Acudiente</td>
                                                    <td>Direccion</td>
                                                    <td><a href="admin-proditc.html" class="ad-st-view">Cursos asignados</a></td>
													
                                                </tr>
                                                </tr>
                                                <tr>
                                                    <td><span class="list-img"><img src="images/user/4.png" alt=""></span>
                                                    </td>
                                                    <td><a href="#"><span class="list-enq-name">Nombre</span></a>
                                                    </td>
                                                    <td>Apellido</td>
                                                    <td>Telefono</td>
                                                    <td>Tel/acudiente</td>
                                                    <td>Correo</td>
                                                    <td>Acudiente</td>
                                                    <td>Direccion</td>
                                                    <td><a href="admin-proditc.html" class="ad-st-view">Cursos asignados</a></td>
													
                                                </tr>
                                                </tr>
                                                <tr>
                                                    <td><span class="list-img"><img src="images/user/5.png" alt=""></span>
                                                    </td>
                                                    <td><a href="#"><span class="list-enq-name">Nombre</span></a>
                                                    </td>
                                                    <td>Apellido</td>
                                                    <td>Telefono</td>
                                                    <td>Tel/acudiente</td>
                                                    <td>Correo</td>
                                                    <td>Acudiente</td>
                                                    <td>Direccion</td>
                                                    <td><a href="admin-proditc.html" class="ad-st-view">Cursos asignados</a></td>
													
                                                </tr>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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
