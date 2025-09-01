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
<!--== CONTENEDOR PRINCIPAL ==-->
            <div class="sb2-2">
                <!--== Breadcrumbs ==-->
                <div class="sb2-2-2">
                    <ul>
                        <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a></li>
                        <li class="active-bre"><a href="#"> Editar Profesor</a></li>
                        <li class="page-back"><a href="{{ route('admin_crud_profesor') }}"><i class="fa fa-backward"
                                    aria-hidden="true"></i>Atras</a>
                        </li>
                    </ul>
                </div>
            <!--== User Details ==-->
            <div class="sb2-2-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-inn-sp admin-form">
                            <div class="inn-title">
                                <h4>Editar Profesor</h4>
                                <p>Modifica la información del docente</p>
                            </div>

                            <div class="tab-inn">
                                <form action="{{ route('docente.update', $docente->id_docente) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="input-field col s6">
                                            <span class="helper-text">Nombres:</span>
                                            <input type="text" name="nombres" value="{{ $docente->usuario->nombres }}"
                                                class="validate" required>
                                            <label class="active">Nombres</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <span class="helper-text">Apellidos:</span>
                                            <input type="text" name="apellidos"
                                                value="{{ $docente->usuario->apellidos }}" class="validate" required>
                                            <label class="active">Apellidos</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s6">
                                            <span class="helper-text">Cargo:</span>
                                            <input type="text" name="cargo" value="{{ $docente->cargo }}"
                                                class="validate" required>
                                            <label class="active">Cargo</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <span class="helper-text">Tipo de contrato:</span>
                                            <input type="text" name="tipo_contrato"
                                                value="{{ $docente->tipo_contrato }}" class="validate" required>
                                            <label class="active">Tipo de contrato</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s4">
                                            <span class="helper-text">Fecha inicio:</span>
                                            <input type="date" name="fecha_inicio" value="{{ $docente->fecha_inicio }}"
                                                class="validate" required>
                                            <label class="active">Fecha de inicio</label>
                                        </div>
                                        <div class="input-field col s4">
                                            <span class="helper-text">Fecha fin:</span>
                                            <input type="date" name="fecha_fin" value="{{ $docente->fecha_fin }}"
                                                class="validate" required>
                                            <label class="active">Fecha de fin</label>
                                        </div>
                                        <div class="input-field col s4">
                                            <span class="helper-text">Duración:</span>
                                            <input type="text" name="duracion" value="{{ $docente->duracion }}"
                                                class="validate">
                                            <label class="active">Duración</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s6">
                                            <span class="helper-text">Telefono:</span>
                                            <input type="text" name="numero_telefono" value="{{ $docente->usuario->numero_telefono }}"
                                                class="validate">
                                            <label class="active">Telefono</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <span class="helper-text">Correo personal:</span>
                                            <input type="email" name="correo_personal"
                                                value="{{ $docente->correo_personal }}" class="validate">
                                            <label class="active">Correo Personal</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s6">
                                            <span class="helper-text">Correo institucional:</span>
                                            <input type="email" name="correo" value="{{ $docente->usuario->correo }}"
                                                class="validate" required>
                                            <label class="active">Correo Institucional</label>
                                        </div>
                                        <div class="file-field input-field col s6">
                                            
                                            <div class="btn admin-upload-btn">
                                                <span>Foto</span>
                                                <input type="file" name="foto">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text"
                                                    placeholder="Subir nueva foto">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="input-field col s12">
                                            <button type="submit" class="waves-effect waves-light btn-large">Guardar
                                                Cambios</button>
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