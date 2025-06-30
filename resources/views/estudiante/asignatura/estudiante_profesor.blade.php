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
    
    <!--== BODY INNER CONTAINER ==-->
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

    @include('estudiante.partials.fotter')
</body>

</html>
