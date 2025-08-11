<!DOCTYPE html>
<html lang="en">

<head>
    @include('mensajes.partials.head')
    
</head>

<body>
    @include('mensajes.partials.menu')
    <div class="container-fluid sb1">
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
                                            <div class="container">
                                                <h3>{{ $mensaje->asunto }}</h3>
                                                <hr>
                                                <p><strong>De:</strong> {{ optional($mensaje->remitenteUsuario)->nombres }}
                                                {{ optional($mensaje->remitenteUsuario)->apellidos }}
                                                </p>
                                                <p><strong>Para:</strong> {{ optional($mensaje->destinatarioUsuario)->nombres }} 
                                                {{ optional($mensaje->destinatarioUsuario)->apellidos }}
                                                </p>
                                                <p><strong>Fecha:</strong>
                                                    {{ optional($mensaje->fecha_envio)->format('d M Y H:i') }}</p>
                                                <hr>
                                                <p>{!! nl2br(e($mensaje->contenido)) !!}</p>

                                                @if ($mensaje->archivo_adjunto)
                                                    <p><strong>Archivo:</strong> <a
                                                            href="{{ asset('storage/' . $mensaje->archivo_adjunto) }}"
                                                            target="_blank">Descargar</a></p>
                                                @endif

                                                <a href="{{ url()->previous() }}" class="btn btn-secondary">Volver</a>
                                            </div>
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