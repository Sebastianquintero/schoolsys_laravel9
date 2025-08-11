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
                        <li><a href="{{ route('dashboard_estudiante') }}"><i class="fa fa-home"></i> Inicio</a></li>
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
                                                <h3>Redactar mensaje</h3>

                                                <form action="{{ route('mensajes.enviar') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf

                                                    <div class="form-group">
                                                        <label>Destinatario:</label>
                                                        <select name="destinatario" class="form-control" required>
                                                            @foreach ($usuarios as $usuario)
                                                                <option value="{{ $usuario->id_usuario }}">
                                                                    {{ $usuario->nombres }} {{ $usuario->apellidos }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Asunto: </label>
                                                        <input type="text" name="asunto" class="form-control" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Mensaje </label>
                                                        <textarea name="contenido" class="form-control" rows="5"
                                                            required></textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Archivo adjunto: </label>
                                                        <input type="file" name="archivo_adjunto" class="form-control">
                                                    </div>

                                                    <button type="submit" class="btn btn-success">Enviar</button>
                                                    <a href="{{ route('mensajes.bandeja') }}" class="btn btn-primary">Volver</a>
                                                </form>
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