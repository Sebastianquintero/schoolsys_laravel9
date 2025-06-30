<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin_crud.partials.head')
</head>

<body>
    <!--== MAIN CONTRAINER ==-->
    @include('admin_crud.partials.main_container')

    <!--== BODY CONTNAINER ==-->
    <div class="container-fluid sb2">
        <div class="row">
            <div class="sb2-1">
                <!--== USER INFO ==-->
                <div class="sb2-12">
                    <ul>
                        <li><img src="{{ asset('images/placeholder.jpg') }}" alt="">
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
                @include('admin_crud.partials.menu')
            </div>

            <!--== BODY INNER CONTAINER ==-->
            <div class="sb2-2">
                <!--== breadcrumbs ==-->
                <div class="sb2-2-2">
                    <ul>
                        <li><a href="index-2.html"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                        </li>
                        <li class="active-bre"><a href="#"> Usuarios(Estudiantes)</a>

                    </ul>
                </div>

                <!--== User Details ==-->

                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-inn-sp">
                                <div class="inn-title">
                                    <h4>Estudiantes del (curso)</h4>
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
                                                    <th>Foto </th>
                                                    <th>Nombre</th>
                                                    <th>Apellido</th>
                                                    <th>Telefono</th>
                                                    <th>Correo</th>
                                                    <th>Acudiente</th>
                                                    <th>Tel/acudiente</th>
                                                    <th>Direccion</th>
                                                    <th>editar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><span class="list-img"><img src="images/user/1.png"
                                                                alt=""></span>
                                                    </td>
                                                    <td><a href="#"><span class="list-enq-name">Nombre</span></a>
                                                    </td>
                                                    <td>Apellido</td>
                                                    <td>Telefono</td>
                                                    <td>Correo</td>
                                                    <td>Acudiente</td>
                                                    <td>Tel/acudiente</td>
                                                    <td>Direccion</td>
                                                    <td><a href="admin-stuedit.html" class="ad-st-view">Editar</a></td>
                                                </tr>
                                                <tr>
                                                    <td><span class="list-img"><img src="images/user/2.png"
                                                                alt=""></span>
                                                    </td>
                                                    <td><a href="#"><span class="list-enq-name">Nombre</span></a>
                                                    </td>
                                                    <td>Apellido</td>
                                                    <td>Telefono</td>
                                                    <td>Correo</td>
                                                    <td>Acudiente</td>
                                                    <td>Tel/acudiente</td>
                                                    <td>Direccion</td>
                                                    <td><a href="admin-stuedit.html" class="ad-st-view">Editar</a></td>
                                                </tr>
                                                <tr>
                                                    <td><span class="list-img"><img src="images/user/4.png"
                                                                alt=""></span>
                                                    </td>
                                                    <td><a href="#"><span class="list-enq-name">Nombre</span></a>
                                                    </td>
                                                    <td>Apellido</td>
                                                    <td>Telefono</td>
                                                    <td>Correo</td>
                                                    <td>Acudiente</td>
                                                    <td>Tel/acudiente</td>
                                                    <td>Direccion</td>
                                                    <td><a href="admin-stuedit.html" class="ad-st-view">Editar</a></td>
                                                </tr>

                                                <tr>
                                                    <td><span class="list-img"><img src="images/user/5.png"
                                                                alt=""></span>
                                                    </td>
                                                    <td><a href="#"><span class="list-enq-name">Nombre</span></a>
                                                    </td>
                                                    <td>Apellido</td>
                                                    <td>Telefono</td>
                                                    <td>Correo</td>
                                                    <td>Acudiente</td>
                                                    <td>Tel/acudiente</td>
                                                    <td>Direccion</td>
                                                    <td><a href="admin-stuedit.html" class="ad-st-view">Editar</a></td>
                                                </tr>

                                                <tr>
                                                    <td><span class="list-img"><img src="images/user/1.png"
                                                                alt=""></span>
                                                    </td>
                                                    <td><a href="#"><span class="list-enq-name">Nombre</span></a>
                                                    </td>
                                                    <td>Apellido</td>
                                                    <td>Telefono</td>
                                                    <td>Correo</td>
                                                    <td>Acudiente</td>
                                                    <td>Tel/acudiente</td>
                                                    <td>Direccion</td>
                                                    <td><a href="admin-stuedit.html" class="ad-st-view">Editar</a></td>
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

    <!--Import jQuery before materialize.js-->
    <script src="js/main.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>