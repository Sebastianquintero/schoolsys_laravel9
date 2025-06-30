<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin_crud.partials.head')
    
</head>

<body>
    <!--== MAIN CONTRAINER ==-->
    @include('admin_crud.partials.main_container')

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
                        <li><a href="admin.html"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                        </li>
                        <li class="active-bre"><a href="#"> Dashboard</a>

                    </ul>
                </div>
                <!--== DASHBOARD INFO ==-->
                <div class="sb2-2-1">
                    <h2>Administrativo</h2>
                    <p>Contenido total de la parte administrativa</p>

                </div>

                <!--== User Details ==-->
                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-inn-sp">
                                <div class="inn-title">
                                    <h4>Detalles de estudiantes</h4>
                                    <p>Detalles de todos los estudiantes de la institución</p>
                                </div>
                                <div class="tab-inn">
                                    <div class="table-responsive table-desi">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Usuario</th>
                                                    <th>Nombre</th>
                                                    <th>Tel</th>
                                                    <th>Email</th>
                                                    <th>Ciudad</th>
                                                    <th>Id</th>
                                                    <th>Fecha Nacimiento</th>
                                                    <th>Estado</th>
                                                    <th>Ver</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($estudiantes as $user)
                                                    <tr>
                                                        <td>
                                                            <span class="list-img">
                                                                <img src="{{ asset('images/user/placeholder.jpg') }}"
                                                                    alt="">
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <a href="#">
                                                                <span class="list-enq-name">{{ $user->nombres }}
                                                                    {{ $user->apellidos }}</span>
                                                                <span class="list-enq-city">{{ $user->curso }}</span>
                                                            </a>
                                                        </td>
                                                        <td>{{ $user->numero_telefono }}</td>
                                                        <td>{{ $user->correo }}</td>
                                                        <td>Bogotá D.C.</td> {{-- Puedes mejorar esto con otro campo si lo
                                                        tienes --}}
                                                        <td>{{ $user->numero_documento }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($user->fecha_nacimiento)->format('d M Y') }}
                                                        </td>
                                                        <td>
                                                            <span class="label label-success">Activo</span>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('actualizar_estudiante', $user->estudiante->id_estudiante) }}" class="ad-st-view">Ver</a>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>

                                            <div class="d-flex justify-content-center mt-3">
                                                {{ $estudiantes->links() }}
                                            </div>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--== User Details ==-->
                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-inn-sp">
                                <div class="inn-title">
                                    <h4>Detalles de los profesores</h4>
                                    <p>Los detalles de los instructores que estan en el sistema.</p>
                                </div>
                                <div class="tab-inn">
                                    <div class="table-responsive table-desi">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Usuario</th>
                                                    <th>Nombre</th>
                                                    <th>Puesto</th>
                                                    <th>Duracion</th>
                                                    <th>Fecha Inicio</th>
                                                    <th>Fecha Fin</th>
                                                    <th>Estado</th>
                                                    <th>Ver</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><span class="list-img"><img src="images/course/sm-1.jpg"
                                                                alt=""></span>
                                                    </td>
                                                    <td><a href="admin-student-details.html"><span
                                                                class="list-enq-name">Aerospace Engineering</span><span
                                                                class="list-enq-city">Illunois, United States</span></a>
                                                    </td>
                                                    <td>Ingeniero</td>
                                                    <td>60 Days(420hrs)</td>
                                                    <td>03 Ene 2025</td>
                                                    <td>12 Dic 2025</td>

                                                    <td>
                                                        <span class="label label-success">Activo</span>
                                                    </td>
                                                    <td><a href="admin-student-details.html" class="ad-st-view">Ver</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span class="list-img"><img src="images/course/sm-5.jpg"
                                                                alt=""></span>
                                                    </td>
                                                    <td><a href="admin-student-details.html"><span
                                                                class="list-enq-name">Fashion Technology</span><span
                                                                class="list-enq-city">Illunois, United States</span></a>
                                                    </td>
                                                    <td>Cultura fisica</td>
                                                    <td>30 Days(420hrs)</td>
                                                    <td>01 Ene 2025</td>
                                                    <td>01 Dic 2025</td>

                                                    <td>
                                                        <span class="label label-success">Activo</span>
                                                    </td>
                                                    <td><a href="admin-student-details.html" class="ad-st-view">Ver</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span class="list-img"><img src="images/course/sm-2.jpg"
                                                                alt=""></span>
                                                    </td>
                                                    <td><a href="admin-student-details.html"><span
                                                                class="list-enq-name">Agriculture Courses</span><span
                                                                class="list-enq-city">Illunois, United States</span></a>
                                                    </td>
                                                    <td>Deportes</td>
                                                    <td>25 dias(420hrs)</td>
                                                    <td>05 Ene 2025</td>
                                                    <td>25 Dic 2025</td>

                                                    <td>
                                                        <span class="label label-success">Activo</span>
                                                    </td>
                                                    <td><a href="admin-student-details.html" class="ad-st-view">Ver</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span class="list-img"><img src="images/course/sm-3.jpg"
                                                                alt=""></span>
                                                    </td>
                                                    <td><a href="admin-student-details.html"><span
                                                                class="list-enq-name">Marine Engineering</span><span
                                                                class="list-enq-city">Illunois, United States</span></a>
                                                    </td>
                                                    <td>Quimica</td>
                                                    <td>06 Months</td>
                                                    <td>12 Ene 2025</td>
                                                    <td>14 Dic 2025</td>

                                                    <td>
                                                        <span class="label label-success">Activo</span>
                                                    </td>
                                                    <td><a href="admin-student-details.html" class="ad-st-view">Ver</a>
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

                <div class="sb2-2-3">
                    <div class="row">
                        <!--== Cursos ==-->
                        <div class="col-md-6">
                            <div class="box-inn-sp">
                                <div class="inn-title">
                                    <h4>Cursos</h4>

                                </div>
                                <div class="tab-inn">
                                    <div class="table-responsive table-desi">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Curso</th>
                                                    <th>Estudiantes</th>
                                                    <th>Fecha</th>
                                                    <th>Locacion</th>
                                                    <th>Estado</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><span class="txt-dark weight-500">Quimica</span>
                                                    </td>
                                                    <td>50</td>
                                                    <td>15 Abril 2025</td>
                                                    <td>Salon 301</td>
                                                    <td>
                                                        <span class="label label-success">Activo</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span class="txt-dark weight-500">Cultura Fisica</span>
                                                    </td>
                                                    <td>75</td>
                                                    <td>21 Junio 2025</td>
                                                    <td>Salon 302</td>
                                                    <td>
                                                        <span class="label label-success">Activo</span>
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
                <!--== Latest Activity ==-->
                <div class="sb2-2-3">
                    <div class="row">
                        <!--== Latest Activity ==-->
                        <div class="col-md-6">
                            <div class="box-inn-sp">
                                <div class="inn-title">
                                    <h4>Ultimas actividades</h4>

                                </div>
                                <div class="tab-inn list-act-hom">
                                    <ul>
                                        <li class="list-act-hom-con">
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                            <h4><span>12 may, 2025</span> Bienvenido</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo corporis
                                                repellat atque beatae maiores incidunt, ad suscipit praesentium
                                                recusandae iure temporibus delectus dolorum maxime excepturi sapiente,
                                                quod architecto dolorem? Eos!</p>
                                        </li>
                                        <li class="list-act-hom-con">
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                            <h4><span>08 Jun, 2025</span> Tabla de discusiones</h4>
                                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Hic, fuga et.
                                                Error nobis dolorem quibusdam ex aliquam voluptate, possimus a similique
                                                aliquid deserunt? Delectus quaerat vitae accusantium enim totam iure!
                                            </p>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!--== Social Media ==-->
                        <div class="col-md-6">
                            <div class="box-inn-sp">
                                <div class="inn-title">
                                    <h4>Medios sociales</h4>

                                </div>
                                <div class="tab-inn">
                                    <div class="table-responsive table-desi">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Media</th>
                                                    <th>Nombre</th>
                                                    <th>compartido</th>
                                                    <th>Me gusta</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><span class="list-img"><img src="images/sm/1.png" alt=""></span>
                                                    </td>
                                                    <td><span class="list-enq-name">Linked In</span><span
                                                            class="list-enq-city">Bogotá D.C.</span>
                                                    </td>
                                                    <td>15K</td>
                                                    <td>18K</td>
                                                </tr>
                                                <tr>
                                                    <td><span class="list-img"><img src="images/sm/3.png" alt=""></span>
                                                    </td>
                                                    <td><span class="list-enq-name">Facebook</span><span
                                                            class="list-enq-city">Bogotá D.C.</span>
                                                    </td>
                                                    <td>15K</td>
                                                    <td>18K</td>
                                                </tr>
                                                <tr>
                                                    <td><span class="list-img"><img src="images/sm/5.png" alt=""></span>
                                                    </td>
                                                    <td><span class="list-enq-name">YouTube</span><span
                                                            class="list-enq-city">Bogotá D.C.</span>
                                                    </td>
                                                    <td>15K</td>
                                                    <td>18K</td>
                                                </tr>
                                                <tr>
                                                    <td><span class="list-img"><img src="images/sm/6.png" alt=""></span>
                                                    </td>
                                                    <td><span class="list-enq-name">WhatsApp</span><span
                                                            class="list-enq-city">Bogotá D.C.</span>
                                                    </td>
                                                    <td>15K</td>
                                                    <td>18K</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Fin del contenedor principal -->
        </div>
    </div>

    @include('admin_crud.partials.footer')
</body>

</html>