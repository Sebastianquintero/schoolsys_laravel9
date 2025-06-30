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
                        <li><a href="admin.html"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a>
                        </li>
                        <li class="active-bre"><a href="#"> Ver activiades</a>
                        
                    </ul>
                </div>

                <!--== User Details ==-->
                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-inn-sp">
                                <div class="inn-title">
									<h4>Todas las actividades</h4>
                                    <p>Todas las actividades</p>
                                </div>
                                <div class="tab-inn">
                                    <div class="table-responsive table-desi">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombre</th>
													<th>Puestos</th>
													<th>Num. Vacantes</th>
                                                    <th>Fecha inicio</th>
													<th>Locación</th>
													<th>Estado</th>
													<th>Editar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
													<td>Certificado en Desarrollo de aplicaciones web</td>
                                                    <td>50</td>
													<td>100</td>
													<td>05 Abril 2025</td>
													<td>Bogotá D.C.</td>
                                                    <td>
                                                        <span class="label label-success">Activo</span>
                                                    </td>
													<td><a href="admin-job-edit.html" class="ad-st-view">Editar</a></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
													<td>Certificado en Desarrollo de aplicaciones (Android)</td>
                                                    <td>60</td>
													<td>200</td>
													<td>16 Marzo 2025</td>
													<td>Bogotá D.C.</td>
                                                    <td>
                                                        <span class="label label-success">Activo</span>
                                                    </td>
													<td><a href="admin-job-edit.html" class="ad-st-view">Editar</a></td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
													<td>Curso basico de Unity</td>
                                                    <td>80</td>
													<td>180</td>
													<td>28 Mayo 2025</td>
													<td>Bogotá D.C.</td>
                                                    <td>
                                                        <span class="label label-success">Activo</span>
                                                    </td>
													<td><a href="admin-job-edit.html" class="ad-st-view">Editar</a></td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
													<td>Curso basico de Html, Css, Bootstrap</td>
                                                    <td>268</td>
													<td>400</td>
													<td>18 Septiembre 2025</td>
													<td>Bogotá D.C.</td>
                                                    <td>
                                                        <span class="label label-success">Activo</span>
                                                    </td>
													<td><a href="admin-job-edit.html" class="ad-st-view">Editar</a></td>
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