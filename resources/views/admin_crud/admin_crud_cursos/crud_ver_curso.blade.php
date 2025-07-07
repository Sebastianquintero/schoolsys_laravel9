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
                                    <h4>Detalles de (curso)</h4>

                                </div>
                                <div class="tab-inn">
                                    <div class="table-responsive table-desi">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>(curso perteneciente)</th>
                                                    <th>Ver/editar Estudiantes</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>

                                                    <td><a href="#"><span class="list-enq-name">001</span></a>
                                                    </td>

                                                    <td><a href="admin-crud-estudiante.html"
                                                            class="ad-st-view">Ver/editar</a></td>
                                                </tr>
                                                <tr>
                                                    <td><a href="#"><span class="list-enq-name">002</span></a>
                                                    </td>
                                                    <td><a href="admin-crud-estudiante.html"
                                                            class="ad-st-view">Ver/editar</a></td>
                                                </tr>
                                                <tr>
                                                    <td><a href="#"><span class="list-enq-name">003</span></a>
                                                    </td>
                                                    <td><a href="admin-crud-estudiante.html"
                                                            class="ad-st-view">Ver/editar</a></td>
                                                </tr>
                                                <tr>
                                                    <td><a href="#"><span class="list-enq-name">004</span></a>
                                                    </td>
                                                    <td><a href="admin-crud-estudiante.html"
                                                            class="ad-st-view">Ver/editar</a></td>
                                                </tr>
                                                <tr>
                                                    <td><a href="#"><span class="list-enq-name">005</span></a>
                                                    </td>
                                                    <td><a href="admin-crud-estudiante.html"
                                                            class="ad-st-view">Ver/editar</a></td>
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