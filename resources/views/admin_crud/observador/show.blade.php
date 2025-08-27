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


            <div class="sb2-2">
                <div class="sb2-2-2">
                    <ul>
                        <li><a href="{{ route('welcome') }}"><i class="fa fa-home"></i> Inicio</a></li>
                        <li class="active-bre"><a href="#">Observador</a></li>
                    </ul>
                </div>

                <!--== BODY INNER CONTAINER ==-->
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <h4>Observador — {{ $obs->estudiante->usuario->nombres }}
                            {{ $obs->estudiante->usuario->apellidos }}
                        </h4>
                        <a href="{{ route('admin.observador.pdf', $obs->id_observador) }}"
                            class="btn btn-info btn-sm">Exportar PDF</a>
                    </div>
                    <div class="tab-inn">
                        <p><b>Colegio:</b> {{ $obs->colegio->nombre ?? '' }}</p>
                        <p><b>Año escolar:</b> {{ $obs->anio_escolar }}</p>
                        <p><b>Curso:</b> {{ $obs->curso->numero_curso ?? '-' }}</p>
                        <p><b>Fecha:</b> {{ $obs->fecha->format('d/m/Y') }}</p>
                        <hr>
                        <p><b>Padre:</b> {{ $obs->nombre_padre ?: '—' }}</p>
                        <p><b>Madre:</b> {{ $obs->nombre_madre ?: '—' }}</p>
                        <p><b>Acudiente:</b> {{ $obs->nombre_acudiente ?: '—' }}</p>
                        <p><b>Docente:</b>
                            {{ optional($obs->docente->usuario)->nombres }} {{ optional($obs->docente->usuario)->apellidos }}
                            @if(!empty($obs->docente->usuario->correo)) @endif
                        <hr>
                        <p><b>Observaciones:</b></p>
                        <p>{!! nl2br(e($obs->observaciones)) !!}</p>
                        <hr>
                        @if($obs->firma_nombre)
                        <p><b>Firma:</b> {{ $obs->firma_nombre }}</p>@endif
                        @if($obs->firma_path)<img src="{{ asset('storage/' . $obs->firma_path) }}" alt="Firma"
                        style="max-height:90px">@endif
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