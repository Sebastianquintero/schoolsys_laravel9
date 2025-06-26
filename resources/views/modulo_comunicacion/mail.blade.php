<!DOCTYPE html>
<html lang="en">

<head>
    <title>ScholSys</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Correo de estudiante">
    <meta name="keyword" content="correo, inbox, estudiante, mensajes">
    <link rel="shortcut icon" href="{{ asset('img/ScholSys_login.jpg') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Josefin+Sans:600,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link href="{{ asset('css/materialize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style2.css') }}" rel="stylesheet" />
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
                    <a class='waves-effect btn-noti' href="{{ route('mail') }}" title="correo"><i class="fa fa-envelope-o"></i><span>1</span></a>
                    <a class='waves-effect btn-noti' href="#" title="etiquetas"><i class="fa fa-tag"></i></a>
                </div>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6">
                <a class='waves-effect dropdown-button top-user-pro' href='#' data-activates='top-menu'>
                    <img src="{{ asset('images/placeholder.jpg') }}" alt="" />Mi cuenta <i class="fa fa-angle-down"></i>
                </a>
                <ul id='top-menu' class='dropdown-content top-menu-sty'>
                    <li><a href="{{ route('perfil') }}" class="waves-effect"><i class="fa fa-cogs"></i> Configuración de perfil</a></li>
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
                        <li><h5>Estudiante (Correo)<span> Bogotá D.C.</span></h5></li>
                    </ul>
                </div>
                <div class="sb2-13">
                    <ul class="collapsible" data-collapsible="accordion">
                        <li><a href="#" class="menu-active"><i class="fa fa-inbox"></i> Recibidos</a></li>
                        <li><a href="#"><i class="fa fa-paper-plane"></i> Enviados</a></li>
                        <li><a href="#"><i class="fa fa-pencil"></i> Borradores</a></li>
                        <li><a href="#"><i class="fa fa-trash"></i> Papelera</a></li>
                        <li>
                            <a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-tags"></i> Categorías</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="#">Trabajo</a></li>
                                    <li><a href="#">Personal</a></li>
                                    <li><a href="#">Otros</a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-cloud-download"></i> Importar & Exportar</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="#">Exportar datos</a></li>
                                    <li><a href="#">Importar datos</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="#"><i class="fa fa-cogs"></i> Configuración</a></li>
                    </ul>
                </div>
            </div>

            <div class="sb2-2">
                <div class="sb2-2-2">
                    <ul>
                        <li><a href="{{ route('dashboard_estudiante') }}"><i class="fa fa-home"></i> Inicio</a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i> Bandeja de Entrada</a></li>
                        <li><a href="#"><i class="fa fa-paper-plane"></i> Enviados</a></li>
                        <li><a href="#"><i class="fa fa-file-text"></i> Borradores</a></li>
                        <li><a href="#"><i class="fa fa-trash"></i> Eliminados</a></li>
                    </ul>
                </div>

                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-inn-sp">
                                <div class="inn-title">
                                    <h4>Bandeja de Entrada</h4>
                                    <p>Gestiona tus correos, incluyendo remitente, asunto, fecha y estado.</p>
                                </div>
                                <div class="tab-inn">
                                    <div class="table-responsive table-desi">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th><input type="checkbox"></th>
                                                    <th>Remitente</th>
                                                    <th>Asunto</th>
                                                    <th>Fecha</th>
                                                    <th>Estado</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="checkbox"></td>
                                                    <td>Juan Pérez</td>
                                                    <td><a href="#">Recordatorio de reunión: Actualización del proyecto</a></td>
                                                    <td>05 Dic 2024</td>
                                                    <td><span class="label label-success">Leído</span></td>
                                                    <td>
                                                        <a href="#" title="Archivar"><i class="fa fa-archive"></i></a>
                                                        <a href="#" title="Eliminar"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox"></td>
                                                    <td>Equipo de Marketing</td>
                                                    <td><a href="#">Lanzamiento de nueva campaña</a></td>
                                                    <td>04 Dic 2024</td>
                                                    <td><span class="label label-warning">No leído</span></td>
                                                    <td>
                                                        <a href="#" title="Archivar"><i class="fa fa-archive"></i></a>
                                                        <a href="#" title="Eliminar"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox"></td>
                                                    <td>Soporte Técnico</td>
                                                    <td><a href="#">Tu ticket ha sido resuelto</a></td>
                                                    <td>03 Dic 2024</td>
                                                    <td><span class="label label-success">Leído</span></td>
                                                    <td>
                                                        <a href="#" title="Archivar"><i class="fa fa-archive"></i></a>
                                                        <a href="#" title="Eliminar"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox"></td>
                                                    <td>Recursos Humanos</td>
                                                    <td><a href="#">Actualización de la política de vacaciones</a></td>
                                                    <td>01 Dic 2024</td>
                                                    <td><span class="label label-warning">No leído</span></td>
                                                    <td>
                                                        <a href="#" title="Archivar"><i class="fa fa-archive"></i></a>
                                                        <a href="#" title="Eliminar"><i class="fa fa-trash"></i></a>
                                                    </td>
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
