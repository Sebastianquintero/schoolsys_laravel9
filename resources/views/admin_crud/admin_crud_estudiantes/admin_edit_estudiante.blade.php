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
                                        <form action="{{ route('estudiante.update', $estudiante->id_estudiante) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')

                                            {{-- Nombres / Apellidos --}}
                                            <div class="row">
                                                <div class="input-field col s6">
                                                    <input type="text" name="nombres" class="validate"
                                                        value="{{ optional($estudiante->usuario)->nombres }}" required>
                                                    <label class="active">Nombres</label>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input type="text" name="apellidos" class="validate"
                                                        value="{{ optional($estudiante->usuario)->apellidos }}"
                                                        required>
                                                    <label class="active">Apellidos</label>
                                                </div>
                                            </div>

                                            {{-- Teléfono / Correo institucional / Correo personal --}}
                                            <div class="row">
                                                <div class="input-field col s4">
                                                    <input type="text" name="numero_telefono" class="validate"
                                                        value="{{ $estudiante->telefono }}" required>
                                                    <label class="active">Número de teléfono</label>
                                                </div>
                                                <div class="input-field col s4">
                                                    <input type="email" name="correo" class="validate"
                                                        value="{{ optional($estudiante->usuario)->correo }}" required>
                                                    <label class="active">Correo institucional</label>
                                                </div>
                                                <div class="input-field col s4">
                                                    <input type="email" name="correo_personal" class="validate"
                                                        value="{{ $estudiante->correo_personal }}" required>
                                                    <label class="active">Correo personal</label>
                                                </div>
                                            </div>

                                            {{-- Dirección / Edad / Grado --}}
                                            <div class="row">
                                                <div class="input-field col s6">
                                                    <input type="text" name="direccion" class="validate"
                                                        value="{{ $estudiante->direccion }}" required>
                                                    <label class="active">Dirección</label>
                                                </div>
                                                <div class="input-field col s3">
                                                    <input type="number" name="edad" class="validate"
                                                        value="{{ $estudiante->edad }}" required>
                                                    <label class="active">Edad</label>
                                                </div>
                                                <div class="input-field col s3">
                                                    <input type="text" name="grado" class="validate"
                                                        value="{{ $estudiante->grado }}" required>
                                                    <label class="active">Grado</label>
                                                </div>
                                            </div>

                                            {{-- Curso / Nivel educativo --}}
                                            <div class="row">
                                                <div class="input-field col s6">
                                                    <input type="text" name="curso" class="validate"
                                                        value="{{ $estudiante->curso }}" required>
                                                    <label class="active">Curso</label>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input type="text" name="nivel_educativo" class="validate"
                                                        value="{{ $estudiante->nivel_educativo }}" required>
                                                    <label class="active">Nivel educativo</label>
                                                </div>
                                            </div>

                                            {{-- Nacionalidad / Acudiente --}}
                                            <div class="row">
                                                <div class="input-field col s6">
                                                    <input type="text" name="nacionalidad" class="validate"
                                                        value="{{ $estudiante->nacionalidad }}" required>
                                                    <label class="active">Nacionalidad</label>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input type="text" name="acudiente" class="validate"
                                                        value="{{ $estudiante->acudiente }}" required>
                                                    <label class="active">Acudiente</label>
                                                </div>
                                            </div>

                                            {{-- EPS / Sisbén --}}
                                            <div class="row">
                                                <div class="input-field col s6">
                                                    <input type="text" name="eps" class="validate"
                                                        value="{{ $estudiante->eps }}" required>
                                                    <label class="active">EPS</label>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input type="text" name="sisben" class="validate"
                                                        value="{{ $estudiante->sisben }}" required>
                                                    <label class="active">Sisbén</label>
                                                </div>
                                            </div>

                                            {{-- Guardar --}}
                                            <div class="row mt-3">
                                                <div class="input-field col s12">
                                                    <button type="submit" class="waves-effect waves-light btn-large">
                                                        Guardar Cambios
                                                    </button>
                                                </div>
                                            </div>

                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
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