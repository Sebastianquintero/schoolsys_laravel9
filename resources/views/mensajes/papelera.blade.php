@include('mensajes.partials.head')
@include('mensajes.partials.menu')

<div class="container-fluid sb2">
    <div class="row">
        @include('mensajes.partials.sidebar')
        <div class="sb2-2">
            <div class="sb2-2-2">
                <ul>
                    <li><a href="{{ route('welcome') }}"><i class="fa fa-home"></i> Inicio</a></li>
                    <li class="active-bre"><a href="#"><i class="fa fa-trash"></i> Papelera</a></li>
                </ul>
            </div>

            <div class="box-inn-sp">
                <div class="inn-title">
                    <h4>Papelera</h4>
                    <p>Mensajes eliminados (puedes restaurarlos).</p>
                </div>

                <div class="tab-inn">
                    <div class="table-responsive table-desi">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th><input type="checkbox"></th>
                                    <th>De/Para</th>
                                    <th>Asunto</th>
                                    <th>Eliminado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($mensajes as $m)
                                    <tr>
                                        <td><input type="checkbox" value="{{ $m->id_mensaje }}"></td>
                                        <td>
                                            {{-- muestra ambos por si acaso --}}
                                            <strong>De:</strong> {{ optional($m->remitenteUsuario)->nombres }} |
                                            <strong>Para:</strong> {{ optional($m->destinatarioUsuario)->nombres }}
                                        </td>
                                        <td>{{ $m->asunto }}</td>
                                        <td>{{ optional($m->deleted_at)->format('d M Y H:i') }}</td>
                                        <td>
                                            {{-- Restaurar --}}
                                            <form action="{{ route('mensajes.restore', $m->id_mensaje) }}" method="POST"
                                                class="d-inline" onsubmit="return confirm('¿Restaurar este mensaje?');">
                                                @csrf
                                                <button class="btn btn-link p-0" title="Restaurar">
                                                    <i class="fa fa-undo"></i>
                                                </button>
                                            </form>

                                            {{-- Eliminar definitivo --}}
                                            <form action="{{ route('mensajes.force', $m->id_mensaje) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Esta acción no se puede deshacer. ¿Eliminar definitivamente?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-link p-0 text-danger"
                                                    title="Eliminar definitivamente">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No hay mensajes en la papelera.</td>
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