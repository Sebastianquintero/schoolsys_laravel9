<!DOCTYPE html>
<html lang="en">

<head>
    <title>ScholSys</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="EEducation master is one of the best eEducational html template, it's suitable for all eEducation websites like university,college,school,online eEducation,tution center,distance eEducation,computer eEducation">
    <meta name="keyword"
        content="eEducation html template, university template, college template, school template, online eEducation template, tution center template">
    <link rel="shortcut icon" href="{{ asset('img/ScholSys_login.jpg') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CJosefin+Sans:600,700"
        rel="stylesheet">
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
    <!--== MAIN CONTRAINER ==-->
    <div class="container-fluid sb1">
        <div class="row">
            <div class="col-md-2 col-sm-3 col-xs-6 sb1-1">
                <a href="#" class="btn-close-menu"><i class="fa fa-times" aria-hidden="true"></i></a>
                <a href="#" class="atab-menu"><i class="fa fa-bars tab-menu" aria-hidden="true"></i></a>
                <a href="{{ route('admin') }}" class="a">
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
                    <a class='waves-effect btn-noti' href="#" title="principal"><i class="fa fa-commenting-o"
                            aria-hidden="true"></i><span></span></a>
                    <a class='waves-effect btn-noti' href="#" title="correo"><i class="fa fa-envelope-o"
                            aria-hidden="true"></i><span></span></a>
                    <a class='waves-effect btn-noti' href="#" title=""><i class="fa fa-tag"
                            aria-hidden="true"></i><span></span></a>
                </div>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6">
                <a class='waves-effect dropdown-button top-user-pro' href='#' data-activates='top-menu'><img
                        src="{{ asset('images/user/6.png') }}" alt="" />Administrador<i class="fa fa-angle-down"
                        aria-hidden="true"></i></a>
                <ul id='top-menu' class='dropdown-content top-menu-sty'>
                    <li><a href="####" class="waves-effect"><i class="fa fa-cogs" aria-hidden="true"></i>Config de
                            perfil</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ route('logout') }}" class="ho-dr-con-last waves-effect"><i class="fa fa-sign-in"
                                aria-hidden="true"></i>Cerrar sesión</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid sb2">
        <div class="row">
            <div class="sb2-1">
                <!--== USER INFO ==-->
                <div class="sb2-12">
                    <ul>
                        <li><img src="images/placeholder.jpg" alt="">
                        </li>
                        @php
                            $rol = Auth::user()->fk_rol;
                        @endphp
                        <li>
                            <h5>{{ Auth::user()->nombres }}<span> Bogotá D.C.</span></h5>
                        </li>
                        <li></li>
                    </ul>
                </div>
                <!--== LEFT MENU ==-->
                <div class="sb2-13">
                    <ul class="collapsible" data-collapsible="accordion">
                        <li><a href="admin.html" class="menu-active"><i class="fa fa-bar-chart" aria-hidden="true"></i>
                                Principal</a>
                        </li>
                        </li>
                        <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-book"
                                    aria-hidden="true"></i>Todos los cursos</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="crud-vercurso.html">Todos los Cursos</a>
                                    </li>
                                    <li><a href="admin-add-courses.html">Agregar Curso</a>
                                    </li>
                                    <li><a href="#">Cursos Pasados</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-user"
                                    aria-hidden="true"></i>Todos los Usuarios</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="#">Usuarios</a>
                                    </li>
                                    <li><a href="#">Agreagar Usuario</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-bars"
                                    aria-hidden="true"></i> Menu</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="admin.html">Menú Principal</a></li>
                                    <li><a href="#">Acerca del Menú</a></li>
                                    <li><a href="#">Menú Admisión</a></li>
                                    <li><a href="#">Todas las paginas Menú</a></li>
                                </ul>
                            </div>
                        </li>

                        <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-bullhorn"
                                    aria-hidden="true"></i> Crud profesores</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="admin-crud-profesor.html">Profesores</a>
                                    </li>
                                    <li><a href="admin-add-profesor.html">Profesores Crud</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-graduation-cap"
                                    aria-hidden="true"></i>Crud actividad</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="admin-ver-actividades.html">Ver actividades</a>
                                    </li>
                                    <li><a href="admin-add-actividades.html">Crear nuevas actividades</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-pencil"
                                    aria-hidden="true"></i>Examenes</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="#">Todos los Examenes</a></li>
                                    <li><a href="#">Agregar Nuevo Examen</a></li>
                                    <li><a href="#">Todos los Grupos</a></li>
                                    <li><a href="#">Crear Nuevos Grupos</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-users"
                                    aria-hidden="true"></i>Estudiantes</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="admin-user-all.html">Todos los Estudiantes</a>
                                    </li>
                                    <li><a href="admin-user-add.html">Agregar Nuevo Estudiante</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-commenting-o"
                                    aria-hidden="true"></i>Consultas</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="admin.html">Todas las Consultas</a></li>
                                    <li><a href="crud-vercurso.html">Consulta de Cursos</a></li>
                                    <li><a href="#">Consulta de Admisión</a></li>
                                    <li><a href="#">Consulta de Seminario</a></li>
                                    <li><a href="admin-event-add.html">Consulta de Eventos</a></li>
                                    <li><a href="#">Consulta Común</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-cloud-download"
                                    aria-hidden="true"></i> Importar y Exportar</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="{{ route('importar.estudiantes.form') }}">Exportar Archivos</a>
                                    </li>
                                    <li><a href="admin-import-data.html">Importar Archivos</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!--== BODY INNER CONTAINER ==-->
            <div class="sb2-2">
                <!--== breadcrumbs ==-->
                <div class="sb2-2-2">
                    <ul>
                        <li><a href="index-2.html"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                        </li>
                        <li class="active-bre"><a href="#"> Import Data</a>
                        </li>
                        <li class="page-back"><a href="index-2.html"><i class="fa fa-backward" aria-hidden="true"></i>
                                Back</a>
                        </li>
                    </ul>
                </div>

                <!--== User detalles ==-->
                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-inn-sp admin-form">
                                <div class="inn-title">
                                    <h4>Importar Data</h4>
                                    <p>Todo acerca de los estudiantes con la plantilla</p>
                                </div>
                                <div class="tab-inn">
                                    <form action="{{ route('importar.estudiantes') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="file-field input-field">
                                            <div class="btn admin-upload-btn">
                                                <span>Archivo</span>
                                                <input type="file" name="archivo" required>
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text"
                                                    placeholder="Formato: CSV o XLSX">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-field col s12">
                                                <button type="submit"
                                                    class="waves-effect waves-light btn-large">Subir</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>