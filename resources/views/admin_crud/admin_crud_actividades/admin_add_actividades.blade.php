<!DOCTYPE html>
<html lang="en">


<head>
    <!--Admin Agregar actividades-->
    <title>ScholSys</title>
    <!-- META TAGS -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="eEducation html template">
    <meta name="keyword" content="eEducation, universidad, colegio, etc.">

    <!-- FAV ICON -->
    <link rel="shortcut icon" href="{{ asset('img/ScholSys_login.jpg') }}" type="image/x-icon">

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Josefin+Sans:600,700" rel="stylesheet">

    <!-- FONTAWESOME ICONS -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <!-- ALL CSS FILES -->
    <link rel="stylesheet" href="{{ asset('css/materialize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    
    <!-- RESPONSIVE.CSS -->
    <link rel="stylesheet" href="{{ asset('css/style-mob.css') }}">
    
</head>

<body>
    <!--== MAIN CONTRAINER ==-->
    <div class="container-fluid sb1">
        <div class="row">
            <!--== LOGO ==-->
            <div class="col-md-2 col-sm-3 col-xs-6 sb1-1">
                <a href="#" class="btn-close-menu"><i class="fa fa-times" aria-hidden="true"></i></a>
                <a href="#" class="atab-menu"><i class="fa fa-bars tab-menu" aria-hidden="true"></i></a>
                <a href="{{ route('index') }}" class="a">
                    <h1 class="m0">ScholSys</h1>
                </a>
            </div>
            <!--== cambio de menus para admin nav ==-->
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
                    <a class='waves-effect btn-noti' href="#" title="principal"><i class="fa fa-commenting-o" aria-hidden="true"></i><span></span></a>
                    <a class='waves-effect btn-noti' href="#" title="correo"><i class="fa fa-envelope-o" aria-hidden="true"></i><span></span></a>
                    <a class='waves-effect btn-noti' href="#" title=""><i class="fa fa-tag" aria-hidden="true"></i><span></span></a>
                </div>
            </div>
            <!--== MY ACCCOUNT ==-->
            <div class="col-md-2 col-sm-3 col-xs-6">
                <!-- Dropdown Trigger -->
                <a class='waves-effect dropdown-button top-user-pro' href='#' data-activates='top-menu'><img src="images/user/6.png" alt="" />Administrador<i class="fa fa-angle-down" aria-hidden="true"></i>
                </a>

                <!-- Dropdown Structure -->
                <ul id='top-menu' class='dropdown-content top-menu-sty'>
                    <li><a href="admin-info-cuenta.html" class="waves-effect"><i class="fa fa-cogs" aria-hidden="true"></i>Config de perfil</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{{ route('index') }}" class="ho-dr-con-last waves-effect"><i class="fa fa-sign-in" aria-hidden="true"></i>Cerrar sesion</a>
                    </li>
                </ul>
            </div><!--== hasta aca admin menu nav ==-->
        </div>
    </div>

    <!--== BODY CONTNAINER ==-->
    <div class="container-fluid sb2">
        <div class="row">
            <div class="sb2-1">
                <!--== USER INFO ==-->
                <div class="sb2-12">
                    <ul>
                        <li><img src="images/placeholder.jpg" alt="">
                        </li>
                        <li>
                            <h5>Administador(principal) <span> Bogotá D.C.</span></h5>
                        </li>
                        <li></li>
                    </ul>
                </div>
                <!--== LEFT MENU ==-->
                <div class="sb2-13">
                    <ul class="collapsible" data-collapsible="accordion">
                        <li><a href="admin.html" class="menu-active"><i class="fa fa-bar-chart" aria-hidden="true"></i> Principal</a>
                        </li>
                        </li>
                        <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-book" aria-hidden="true"></i>Todos los cursos</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="{{ route('ver_curso_admin') }}">Todos los Cursos</a>
                                    </li>
                                    <li><a href="{{ route('add_cursos_admin') }}">Agregar Curso</a>
                                    </li>
                                    <li><a href="#">Cursos Pasados</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-user" aria-hidden="true"></i>Todos los Usuarios</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="#">Usuarios</a>
                                    </li>
                                    <li><a href="#">Agreagar Usuario</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        
                        <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-bars" aria-hidden="true"></i> Menu</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="{{ route('dashboard_admin') }}">Menú Principal</a></li>
									<li><a href="#">Acerca del Menú</a></li>
									<li><a href="#">Menú Admisión</a></li>
									<li><a href="#">Todas las paginas Menú</a></li>
                                </ul>
                            </div>
                        </li>
						
                        <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-bullhorn" aria-hidden="true"></i> Crud profesores</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="{{ route('crud_profesor_admin') }}">Profesores</a>
                                    </li>
                                    <li><a href="{{ route('add_profesor_admin') }}">Profesores Crud</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-graduation-cap" aria-hidden="true"></i>Crud actividad</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="{{ route('ver_actividades_admin') }}">Ver actividades</a>
                                    </li>
                                    <li><a href="{{ route('add_actividades_admin') }}">Crear nuevas actividades</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-pencil" aria-hidden="true"></i>Examenes</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="#">Todos los Examenes</a></li>
                                    <li><a href="#">Agregar Nuevo Examen</a></li>
                                    <li><a href="#">Todos los Grupos</a></li>
                                    <li><a href="#">Crear Nuevos Grupos</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-users" aria-hidden="true"></i>Estudiantes</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="{{ route('admin_user_all') }}">Todos los Estudiantes</a>
                                    </li>
                                    <li><a href="{{ route('admin_crud_estudiante') }}">Agregar Nuevo Estudiante</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-commenting-o" aria-hidden="true"></i>Consultas</a>
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
                        <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-cloud-download" aria-hidden="true"></i> Importar y Exportar</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="admin-export-data.html">Exportar Archivos</a>
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
                        <li><a href="admin.html"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a>
                        </li>
                        <li class="active-bre"><a href="#"> Agregar nuevas actividades</a>
                        
                    </ul>
                </div>

                <!--== User Details ==-->
                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
						<div class="box-inn-sp admin-form">
                                <div class="inn-title">
                                    <h4>Agregar nuevas actividades</h4>
                                    <p>Agregar nuevas actividades</p>
                                </div>
                                <div class="tab-inn">
                                    <form>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input type="text" value="" class="validate" required>
                                                <label class="">Nombre actividad</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <textarea></textarea>
                                                <label class="">Descripcion de la actividad</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input type="number" value="" class="validate" required>
                                                <label class="">numero</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input type="text" value="" class="validate" required>
                                                <label class="">Fecha inicio</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input type="text" class="validate" value="" required>
                                                <label class="">Tiempo</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input type="text" value="" class="validate">
                                                <label class="">Ciudad</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input type="text" value="" class="validate">
                                                <label class="">Pais</label>
                                            </div>
                                        </div>
                                        <div class="row">
											<div class="file-field input-field col s12">
												<div class="btn admin-upload-btn">
													<span>Archivo</span>
													<input type="file">
												</div>
												<div class="file-path-wrapper">
													<input class="file-path validate" type="text" placeholder="Archivo a subir">
												</div>
											</div>
                                        </div>
										<div class="row">
                                            <div class="input-field col s12">
                                                <i class="waves-effect waves-light btn-large waves-input-wrapper"><input type="submit" class="waves-button-input"></i>
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
    </div>

    <!--Import jQuery before materialize.js-->
    <script src="js/main.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/custom.js"></script>
</body>


</html>