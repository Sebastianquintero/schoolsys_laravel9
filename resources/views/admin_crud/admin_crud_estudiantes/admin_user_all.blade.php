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
                        <li class="active-bre"><a href="#"> Users(Students)</a>
                        </li>
                        <li class="page-back"><a href="index-2.html"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
                        </li>
                    </ul>
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
            </div>

        </div>
    </div>

    @include('admin_crud.partials.footer')
</body>


</html>