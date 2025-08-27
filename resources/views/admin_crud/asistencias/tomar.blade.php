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
                <div class="sb2-2-2">
                    <ul>
                        <li><a href="{{ route('welcome') }}"><i class="fa fa-home"></i> Inicio</a></li>
                        <li class="active-bre"><a href="#">Asistencias</a></li>
                    </ul>
                </div>

                <div class="box-inn-sp">
                        <div class="inn-title"><h4>Tomar asistencia</h4></div>
                        <div class="tab-inn">
                            <form method="GET" action="{{ route('admin.asistencias.cargar') }}" class="row">
                            <div class="input-field col s6">
                                <label class="active">Curso</label>
                                <select name="curso" class="form-control" required>
                                @foreach($cursos as $c)
                                    <option value="{{ $c->id_curso }}" {{ $cursoId==$c->id_curso?'selected':'' }}>
                                    {{ $c->nombre_curso }} ({{ $c->numero_curso }})
                                    </option>
                                @endforeach
                                </select>
                            </div>
                            <div class="input-field col s4">
                                <label class="active">Fecha</label>
                                <input type="date" name="fecha" value="{{ $fecha }}" required>
                            </div>
                            <div class="input-field col s2" style="margin-top:1.8rem">
                                <button class="btn btn-primary">CARGAR</button>
                            </div>
                            </form>
                        </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/main.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    
    <!-- Logout Form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>

</html>