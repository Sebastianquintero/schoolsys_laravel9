<!DOCTYPE html>
<html lang="en">

<head>
    @include('mensajes.partials.head')

</head>

<body>
    @include('mensajes.partials.menu')

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
                        <li><a href="{{ route('welcome') }}"><i class="fa fa-home"></i> Inicio</a></li>
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