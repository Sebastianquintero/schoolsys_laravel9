<!-- Cuerpo -->
    <div class="container-fluid sb2">
        <div class="row">
            <!-- Menú lateral -->
            <div class="sb2-1">
                <div class="sb2-12">
                    <ul>
                        <li><img src="{{ asset('images/placeholder.jpg') }}" alt=""></li>
                        @php
                            $rol = Auth::user()->fk_rol;
                        @endphp
                        <li>
                            <h5>{{ Auth::user()->nombres }} {{ Auth::user()->apellidos }}

                                @if($rol == 3 && Auth::user()->estudiante)
                                    <span>{{ Auth::user()->estudiante->grado }}</span>
                                @elseif($rol == 1)
                                    <span>Administrador</span>
                                @endif
                            </h5>
                        </li>
                    </ul>
                </div>
                <div class="sb2-13">
                    <ul class="collapsible" data-collapsible="accordion">
                        <li>
                            <a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-info-circle"></i>
                                Informativo</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="{{ route('dashboard_estudiante') }}">Noticias</a></li>
                                    <li><a href="{{ route('perfil') }}">Perfil</a></li>
                                    <li><a href="{{ route('info_personal') }}">Información Personal</a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-graduation-cap"></i>
                                Académico</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="{{ route('actividades') }}">Actividades</a></li>
                                    <li><a href="{{ route('cursos') }}">Cursos</a></li>
                                    <li><a href="{{ route('estudiante_profesor') }}">Profesores</a></li>
                                    <li><a href="{{ route('encuesta') }}">Encuestas</a></li>
                                    <li><a href="{{ route('estudiante.calificaciones') }}">Calificaciones</a></li>
                                    <li><a href="{{ route('est.asistencias') }}">Asistencias</a></li>
                                    
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="{{ route('mensajes.bandeja') }}" class="collapsible-header"><i class="fa fa-users"></i>
                                Correo</a>
                        </li>
                    </ul>
                </div>
            </div>