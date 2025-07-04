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
                        <li class="active-bre"><a href="#">Profesores</a>
                        </li>
                    </ul>
                </div>

                <!--== User Details ==-->
                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-inn-sp">
                                <div class="inn-title">
									<h4>Todos los Profesores</h4>
                                    <p>All about students like name, student id, phone, email, country, city and more</p>
                                </div>
                                <div class="tab-inn">
                                    <div class="table-responsive table-desi">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
													<th>Foto</th>
                                                    <th>Nombre</th>
                                                    <th>Fecha Inicio</th>
													<th>Ciudad</th>
													<th>Estado</th>
													<th>Editar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td><span class="list-img"><img src="images/course/sm-1.jpg" alt=""></span></td>
													<td>Profesor Prueba</td>
                                                    <td>21 June 2018</td>
													<td>Bogotá</td>
                                                    <td>
                                                        <span class="label label-success">Activo</span>
                                                    </td>
													<td><a href="{{ route('admin_edit_profesor') }}" class="ad-st-view">Editar</a></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td><span class="list-img"><img src="images/course/sm-2.jpg" alt=""></span></td>
													<td>CUNY Assessment Test Workshop</td>
                                                    <td>05 April 2018</td>
													<td>Bogotá</td>
                                                    <td>
                                                        <span class="label label-success">Activo</span>
                                                    </td>
													<td><a href="{{ route('admin_edit_profesor') }}" class="ad-st-view">Editar</a></td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td><span class="list-img"><img src="images/course/sm-3.jpg" alt=""></span></td>
													<td>Fire & ice launch party</td>
                                                    <td>12 December 2018</td>
													<td>Bogotá</td>
                                                    <td>
                                                        <span class="label label-success">Activo</span>
                                                    </td>
													<td><a href="{{ route('admin_edit_profesor') }}" class="ad-st-view">Editar</a></td>
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

    @include('admin_crud.partials.footer')
</body>


</html>