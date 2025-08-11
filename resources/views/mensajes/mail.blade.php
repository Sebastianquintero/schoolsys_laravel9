<!DOCTYPE html>
<html lang="en">

<head>
    @include('mensajes.partials.head')

</head>

<body>
    @include('mensajes.partials.menu')

    <div class="container-fluid sb2">
        <div class="row">
            @include('mensajes.partials.sidebar')
            <div class="sb2-2">
                <div class="sb2-2-2">
                    <ul>
                        <li><a href="{{ route('welcome') }}"><i class="fa fa-home"></i> Inicio</a></li>
                        <li><a href="{{ route('mensajes.bandeja') }}"><i class="fa fa-envelope"></i> Recibidos</a></li>
                        <li><a href="{{ route('mensajes.sent') }}"><i class="fa fa-paper-plane"></i> Enviados</a></li>
                        <li><a href="{{ route('mensajes.drafts') }}"><i class="fa fa-pencil"></i> Borradores</a></li>
                        <li><a href="{{ route('mensajes.trash') }}"><i class="fa fa-trash"></i> Papelera</a></li>
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
                                                        <td>{{ optional($mensaje->remitenteUsuario)->nombres }}
                                                            {{ optional($mensaje->remitenteUsuario)->apellidos }}
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
                                                            <form
                                                                action="{{ route('mensajes.destroy', $mensaje->id_mensaje) }}"
                                                                method="POST" class="d-inline"
                                                                onsubmit="return confirm('¿Mover a la papelera?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-link p-0" title="Eliminar">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </form>
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
                                    <div class="mt-3">
                                        {{ $mensajes->links() }}
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