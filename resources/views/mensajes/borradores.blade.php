@include('mensajes.partials.head')
@include('mensajes.partials.menu')

<div class="container-fluid sb2">
    <div class="row">
        @include('mensajes.partials.sidebar')
        <div class="sb2-2">
            <div class="sb2-2-2">
                <ul>
                    <li><a href="{{ route('welcome') }}"><i class="fa fa-home"></i> Inicio</a></li>
                    <li class="active-bre"><a href="#"><i class="fa fa-pencil"></i> Borradores</a></li>
                </ul>
            </div>

            <div class="box-inn-sp">
                <div class="inn-title">
                    <h4>Borradores</h4>
                    <p>Mensajes guardados sin enviar.</p>
                </div>

                <div class="tab-inn">
                    <div class="table-responsive table-desi">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th><input type="checkbox"></th>
                                    <th>Para</th>
                                    <th>Asunto</th>
                                    <th>Creado</th>
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
                                        <td><a href="{{ route('mensajes.redactar', ['draft' => $m->id_mensaje]) }}">[Borrador]
                                                {{ $m->asunto }}</a></td>
                                        <td>{{ \Carbon\Carbon::parse($m->fecha_creacion)->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{ route('mensajes.redactar', ['draft' => $m->id_mensaje]) }}"
                                                title="Editar"><i class="fa fa-edit"></i></a>
                                            <form action="{{ route('mensajes.destroy', $mensaje->id_mensaje) }}"
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
                                        <td colspan="5" class="text-center">No tienes borradores.</td>
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