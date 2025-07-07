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
                        <li class="active-bre"><a href="#"> Usuarios(estudiantes)</a>

                    </ul>
                </div>

                <!--== User Details ==-->
                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-inn-sp admin-form">
                                <div class="inn-title">
                                    <h4>Editar información</h4>
                                    <p>Here you can edit</p>
                                </div>
                                <div class="tab-inn">
                                    <form action="{{ route('estudiante.update', $estudiante->id_estudiante) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" name="nombres" value="{{ $estudiante->usuario->nombres }}" required>
                                        <input type="text" name="apellidos"value="{{ $estudiante->usuario->apellidos }}" required>
                                        <input type="text" name="numero_telefono" value="{{ $estudiante->telefono }}"required>
                                        <input type="email" name="correo" value="{{ $estudiante->usuario->correo }}"required>
                                        <input type="email" name="correo_personal" value="{{ $estudiante->correo_personal }}" required>
                                        <input type="text" name="direccion" value="{{ $estudiante->direccion }}"required>
                                        <input type="number" name="edad" value="{{ $estudiante->edad }}" required>
                                        <input type="text" name="grado" value="{{ $estudiante->grado }}" required>
                                        <input type="text" name="curso" value="{{ $estudiante->curso }}" required>
                                        <input type="text" name="nivel_educativo" value="{{ $estudiante->nivel_educativo }}" required>
                                        <input type="text" name="nacionalidad" value="{{ $estudiante->nacionalidad }}" required>
                                        <input type="text" name="acudiente" value="{{ $estudiante->acudiente }}" required>
                                        <input type="text" name="eps" value="{{ $estudiante->eps }}" required>
                                        <input type="text" name="sisben" value="{{ $estudiante->sisben }}" required>

                                        <button type="submit">Actualizar</button>
                                    </form>
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