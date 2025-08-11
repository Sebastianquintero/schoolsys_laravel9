@include('mensajes.partials.head')
@include('mensajes.partials.menu')

<div class="container-fluid sb2">
    <div class="row">
        @include('mensajes.partials.sidebar') {{-- si no la tienes, copia el bloque izq. de mail.blade --}}
        <div class="sb2-2">
            <div class="sb2-2-2">
                <ul>
                    <li><a href="{{ route('welcome') }}"><i class="fa fa-home"></i> Inicio</a></li>
                    <li><a href="{{ route('mensajes.bandeja') }}"><i class="fa fa-envelope"></i> Recibidos</a></li>
                    <li class="active-bre"><a href="#"><i class="fa fa-paper-plane"></i> Enviados</a></li>
                </ul>
            </div>

            <div class="box-inn-sp">
                <div class="inn-title">
                    <h4>Enviados</h4>
                    <p>Mensajes que has enviado.</p>
                </div>

                <div class="tab-inn">
                    <div class="table-responsive table-desi">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th><input type="checkbox"></th>
                                    <th>Destinatario</th>
                                    <th>Asunto</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($mensajes as $m)
                                    <tr>
                                        <td><input type="checkbox" value="{{ $m->id_mensaje }}"></td>
                                        <td>{{ optional($m->destinatarioUsuario)->nombres }}
                                            {{ optional($m->destinatarioUsuario)->apellidos }}
                                        </td>
                                        <td><a href="{{ route('mensajes.ver', $m->id_mensaje) }}">{{ $m->asunto }}</a></td>
                                        <td>{{ \Carbon\Carbon::parse($m->fecha_envio)->format('d M Y') }}</td>
                                        <td><span class="label label-default">Enviado</span></td>
                                        <td>
                                            <form action="{{ route('mensajes.destroy', $m->id_mensaje) }}"
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
                                        <td colspan="6" class="text-center">No tienes mensajes enviados.</td>
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

@include('mensajes.partials.footer')