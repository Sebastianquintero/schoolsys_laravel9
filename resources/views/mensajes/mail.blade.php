<!DOCTYPE html>
<html lang="en">

<head>
    @include('mensajes.partials.head')

</head>

<body>
    <div class="container-fluid sb1">
        <div class="row">
            <div class="col-md-2 col-sm-3 col-xs-6 sb1-1">
                <a href="#" class="btn-close-menu"><i class="fa fa-times"></i></a>
                <a href="#" class="atab-menu"><i class="fa fa-bars tab-menu"></i></a>
                <a href="{{ route('dashboard_estudiante') }}" class="a">
                    <h1 class="m0">ScholSys</h1>
                </a>
            </div>
            <div class="col-md-6 col-sm-6 mob-hide">
                <form class="app-search">
                    <input type="text" placeholder="Search..." class="form-control">
                    <a href="#"><i class="fa fa-search"></i></a>
                </form>
            </div>
            <div class="col-md-2 tab-hide">
                <div class="top-not-cen">
                    <a class='waves-effect btn-noti' href="{{ route('dashboard_estudiante') }}" title="dashboard"><i
                            class="fa fa-commenting-o"></i><span>1</span></a>
                    <a class='waves-effect btn-noti' href="{{ route('mensajes.bandeja') }}" title="correo"><i
                            class="fa fa-envelope-o"></i><span>1</span></a>
                    <a class='waves-effect btn-noti' href="#" title="etiquetas"><i class="fa fa-tag"></i></a>
                </div>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6">
                <a class='waves-effect dropdown-button top-user-pro' href='#' data-activates='top-menu'>
                    <img src="{{ asset('images/placeholder.jpg') }}" alt="" />Mi cuenta <i class="fa fa-angle-down"></i>
                </a>
                <ul id='top-menu' class='dropdown-content top-menu-sty'>
                    <li><a href="{{ route('perfil') }}" class="waves-effect"><i class="fa fa-cogs"></i> Configuración de
                            perfil</a></li>
                    <li class="divider"></li>
                    <li><a href="#" class="ho-dr-con-last waves-effect"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-in" aria-hidden="true"></i> Cerrar sesión
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid sb2">
        <div class="row">
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
                        <li><a href="#" class="menu-active"><i class="fa fa-inbox"></i> Recibidos</a></li>
                        <li><a href="#"><i class="fa fa-paper-plane"></i> Enviados</a></li>
                        <li><a href="#"><i class="fa fa-pencil"></i> Borradores</a></li>
                        <li><a href="#"><i class="fa fa-trash"></i> Papelera</a></li>
                        <li>
                            <a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-tags"></i>
                                Categorías</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="#">Trabajo</a></li>
                                    <li><a href="#">Personal</a></li>
                                    <li><a href="#">Otros</a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-cloud-download"></i>
                                Importar & Exportar</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="#">Exportar datos</a></li>
                                    <li><a href="#">Importar datos</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="#"><i class="fa fa-cogs"></i> Configuración</a></li>
                    </ul>
                </div>
            </div>

            <div class="sb2-2">
                <div class="sb2-2-2">
                    <ul>
                        <li><a href="{{ route('dashboard_estudiante') }}"><i class="fa fa-home"></i> Inicio</a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i> Bandeja de Entrada</a></li>
                        <li><a href="#"><i class="fa fa-paper-plane"></i> Enviados</a></li>
                        <li><a href="#"><i class="fa fa-file-text"></i> Borradores</a></li>
                        <li><a href="#"><i class="fa fa-trash"></i> Eliminados</a></li>
                    </ul>
                </div>

                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-inn-sp">
                                <div class="inn-title">
                                    <h4>Bandeja de Entrada</h4>
                                    <p>Gestiona tus correos, incluyendo remitente, asunto, fecha y estado.</p>
                                </div>
                                <div class="tab-inn">
                                    <div class="table-responsive table-desi">
                                        <table class="table table-hover">
                                            <a href="{{ route('mensajes.redactar') }}" class="btn btn-warning">Redactar
                                                mensaje</a>

                                            <thead>
                                                <tr>
                                                    <th><input type="checkbox"></th>
                                                    <th>Remitente</th>
                                                    <th>Asunto</th>
                                                    <th>Fecha</th>
                                                    <th>Estado</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @forelse ($mensajes as $mensaje)
                                                    <tr>
                                                        <td><input type="checkbox" value="{{ $mensaje->id_mensaje }}"></td>
                                                        <td>{{ $mensaje->usuarioRemitente->nombres }}
                                                            {{ $mensaje->usuarioRemitente->apellidos }}
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('mensajes.ver', $mensaje->id_mensaje) }}">
                                                                {{ $mensaje->asunto }}
                                                            </a>
                                                        </td>
                                                        <td>{{ \Carbon\Carbon::parse($mensaje->fecha_envio)->format('d M Y') }}
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="label {{ $mensaje->leido ? 'label-success' : 'label-warning' }}">
                                                                {{ $mensaje->leido ? 'Leído' : 'No leído' }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <a href="#" title="Archivar"><i class="fa fa-archive"></i></a>
                                                            <a href="#" title="Eliminar"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6" class="text-center">No hay mensajes en tu bandeja de
                                                            entrada.</td>
                                                    </tr>
                                                @endforelse
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
    @include('mensajes.partials.footer')

</body>

</html>