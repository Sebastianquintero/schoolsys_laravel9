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

            <!--== BODY INNER CONTAINER ==-->
            <div class="sb2-2">
                <!--== breadcrumbs ==-->
                <div class="sb2-2-2">
                    <ul>
                        <li><a href="{{route('welcome')}}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                        </li>
                        <li class="active-bre"><a href="#"> Dashboard</a>

                    </ul>
                </div>
                <!--== DASHBOARD INFO ==-->
                <div class="sb2-2-1">
                    <h2>Administrativo</h2>
                    <p>Contenido total de la parte administrativa</p>

                </div>

                <!--== User Details ==-->
                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-inn-sp">
                                <div class="inn-title">
                                    <h4>Detalles de estudiantes</h4>
                                    <p>Detalles de todos los estudiantes de la institución</p>
                                </div>
                                <div class="tab-inn">
                                    <div class="table-responsive table-desi">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Usuario</th>
                                                    <th>Nombre</th>
                                                    <th>Tel</th>
                                                    <th>Email</th>
                                                    <th>Ciudad</th>
                                                    <th>Documento</th>
                                                    <th>Fecha Nacimiento</th>
                                                    <th>Estado</th>
                                                    <th>Ver</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($estudiantes->isEmpty())
                                                    <tr>
                                                        <td colspan="8">No hay estudiantes registrados.</td>
                                                    </tr>
                                                @endif
                                                @foreach ($estudiantes as $user)
                                                    <tr>
                                                        <td>
                                                            <span class="list-img">
                                                                <img src="{{ auth()->user()->foto_url }}"
                                                                    class="img-thumbnail rounded-circle" width="120"
                                                                    alt="Foto">
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <a href="#">
                                                                <span class="list-enq-name">{{ $user->nombres }}
                                                                    {{ $user->apellidos }}</span>
                                                                <span class="list-enq-city">{{ $user->curso }}</span>
                                                            </a>
                                                        </td>
                                                        <td>{{ $user->numero_telefono }}</td>
                                                        <td>{{ $user->correo }}</td>
                                                        <td>Bogotá D.C.</td>
                                                        <td>{{ $user->numero_documento }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($user->fecha_nacimiento)->format('d M Y') }}
                                                        </td>
                                                        <td>
                                                            <span class="label label-success">Activo</span>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('estudiante.edit', $user->estudiante->id_estudiante) }}"
                                                                class="ad-st-view">Editar</a>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>


                                        </table>
                                        <div class="text-center my-3">
                                            <div class="pagination-custom">
                                                {{ $estudiantes->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--== User Details ==-->
                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-inn-sp">
                                <div class="inn-title">
                                    <h4>Detalles de los profesores</h4>
                                    <p>Los detalles de los instructores que estan en el sistema.</p>
                                </div>
                                <div class="tab-inn">
                                    <div class="table-responsive table-desi">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Usuario</th>
                                                    <th>Nombre</th>
                                                    <th>Puesto</th>
                                                    <th>Duracion</th>
                                                    <th>Fecha Inicio</th>
                                                    <th>Fecha Fin</th>
                                                    <th>Estado</th>
                                                    <th>Ver</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($docentes->isEmpty())
                                                    <tr>
                                                        <td colspan="8">No hay profesores registrados.</td>
                                                    </tr>
                                                @endif
                                                @foreach ($docentes as $docente)
                                                    <tr>
                                                        <td>
                                                            <span class="list-img">
                                                                <img src="{{ auth()->user()->foto_url }}"
                                                                    class="img-thumbnail rounded-circle" width="120"
                                                                    alt="Foto">
                                                            </span>
                                                        </td>

                                                        <td>
                                                            <a href="#">
                                                                <span class="list-enq-name">{{ $docente->usuario->nombres }}
                                                                    {{ $docente->usuario->apellidos }}</span>
                                                                <span
                                                                    class="list-enq-city">{{ $docente->usuario->correo }}</span>
                                                            </a>
                                                        </td>

                                                        <td>{{ $docente->cargo }}</td>
                                                        <td>{{ $docente->duracion }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($docente->fecha_inicio)->format('d M Y') }}
                                                        </td>
                                                        <td>{{ \Carbon\Carbon::parse($docente->fecha_fin)->format('d M Y') }}
                                                        </td>

                                                        <td>
                                                            <span class="label label-success">Activo</span>
                                                        </td>

                                                        <td>
                                                            <a href="{{ route('docente.edit', $docente->id_docente) }}"
                                                                class="ad-st-view">Editar</a>

                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                    </div>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="sb2-2-3">
                <div class="row">
                    <!--== Cursos ==-->
                    <div class="col-md-12">
                        <div class="box-inn-sp">
                            <div class="inn-title">
                                <h4>Cursos</h4>

                            </div>
                            <div class="tab-inn">
                                <div class="table-responsive table-desi">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Curso</th>
                                                <th>Nombre</th>
                                                <th>Numero</th>
                                                <th>Estado</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @forelse($cursos as $curso)
                                                <tr>
                                                    <td>{{ $curso->id_curso }}</td>
                                                    <td>{{ $curso->nombre_curso }}</td>
                                                    <td>{{ $curso->numero_curso }}</td>
                                                    <td>
                                                        <span
                                                            class="badge {{ $curso->estado == 'Activo' ? 'badge-success' : 'badge-danger' }}">
                                                            {{ $curso->estado }}
                                                        </span>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center">No hay cursos registrados</td>
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
            <!--== Latest Activity ==-->
            <div class="sb2-2-3">
                <div class="row">
                    <!--== Latest Activity ==-->
                    <div class="col-md-12">
                        <div class="box-inn-sp">
                            <div class="inn-title">
                                <h4>Ultimas actividades</h4>

                            </div>
                            {{-- Crear --}}
                            <form action="{{ route('admin.anuncios.store') }}" method="POST"
                                enctype="multipart/form-data" class="mb-3">
                                @csrf
                                <div class="row">
                                    <div class="col-md-8">
                                        <label>Título</label>
                                        <input name="titulo" class="form-control" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Fecha</label>
                                        <input type="date" name="fecha" class="form-control" required
                                            value="{{ now()->format('Y-m-d') }}">
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <label>Descripción</label>
                                        <textarea name="descripcion" rows="3" class="form-control" required></textarea>
                                    </div>

                                    <div class="col-md-12 mt-2">
                                        <small class="text-muted d-block">Sube <b>una</b> opción:</small>
                                        <label>Imagen (500x300)</label>
                                        <input type="file" name="imagen" class="form-control" accept="image/*">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label>Video (URL YouTube/Vimeo)</label>
                                        <input type="url" name="video_url" class="form-control"
                                            placeholder="https://...">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label>Video (archivo MP4/WebM)</label>
                                        <input type="file" name="video_file" class="form-control"
                                            accept="video/mp4,video/webm">
                                    </div>

                                    <div class="col-md-12 mt-3">
                                        <button class="btn btn-success">Publicar</button>
                                    </div>
                                </div>
                            </form>

                            {{-- Listado --}}
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Título</th>
                                            <th>Media</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($anuncios as $a)
                                            <tr>
                                                <td>{{ $a->fecha->format('d M Y') }}</td>
                                                <td>{{ $a->titulo }}</td>
                                                <td>
                                                    @if($a->isImage())
                                                        <img src="{{ $a->imagen_url }}"
                                                            style="width:120px;height:72px;object-fit:cover;border-radius:4px">
                                                    @elseif($a->isVideoUrl())
                                                        <span class="label label-info">Video URL</span>
                                                    @elseif($a->isVideoFile())
                                                        <span class="label label-info">Video Archivo</span>
                                                    @else
                                                        —
                                                    @endif
                                                </td>
                                                <td>
                                                    <span
                                                        class="label {{ $a->publicado ? 'label-success' : 'label-warning' }}">
                                                        {{ $a->publicado ? 'Publicado' : 'Oculto' }}
                                                    </span>
                                                </td>
                                                <td>
                                                    {{-- Toggle --}}
                                                    <form action="{{ route('admin.anuncios.toggle', $a->id_anuncio) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        <button
                                                            class="btn btn-xs {{ $a->publicado ? 'btn-warning' : 'btn-primary' }}">
                                                            {{ $a->publicado ? 'Ocultar' : 'Publicar' }}
                                                        </button>
                                                    </form>

                                                    {{-- Editar (modal simple via POST) --}}
                                                    <button class="btn btn-xs btn-info" data-toggle="collapse"
                                                        data-target="#edit-{{ $a->id_anuncio }}">Editar</button>

                                                    {{-- Eliminar (soft delete) --}}
                                                    <form action="{{ route('admin.anuncios.destroy', $a->id_anuncio) }}"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('¿Enviar a papelera?');">
                                                        @csrf @method('DELETE')
                                                        <button class="btn btn-xs btn-danger">Eliminar</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <tr id="edit-{{ $a->id_anuncio }}" class="collapse">
                                                <td colspan="5">
                                                    <form action="{{ route('admin.anuncios.update', $a->id_anuncio) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-8"><input name="titulo"
                                                                    value="{{ $a->titulo }}" class="form-control" required>
                                                            </div>
                                                            <div class="col-md-4"><input type="date" name="fecha"
                                                                    value="{{ $a->fecha->format('Y-m-d') }}"
                                                                    class="form-control" required></div>
                                                            <div class="col-md-12 mt-2">
                                                                <textarea name="descripcion" rows="3" class="form-control"
                                                                    required>{{ $a->descripcion }}</textarea>
                                                            </div>
                                                            <div class="col-md-12 mt-2">
                                                                <label><input type="checkbox" name="clear_media" value="1">
                                                                    Limpiar media actual</label>
                                                            </div>
                                                            <div class="col-md-12 mt-2">
                                                                <label>Imagen (500x300)</label>
                                                                <input type="file" name="imagen" class="form-control"
                                                                    accept="image/*">
                                                            </div>
                                                            <div class="col-md-6 mt-2">
                                                                <label>Video (URL)</label>
                                                                <input type="url" name="video_url"
                                                                    value="{{ $a->isVideoUrl() ? $a->video_url : '' }}"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="col-md-6 mt-2">
                                                                <label>Video (archivo)</label>
                                                                <input type="file" name="video_file" class="form-control"
                                                                    accept="video/mp4,video/webm">
                                                            </div>
                                                            <div class="col-md-12 mt-3"><button
                                                                    class="btn btn-primary">Guardar</button></div>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Sin anuncios</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            {{-- Paginación --}}
                            @if(isset($anuncios) && method_exists($anuncios, 'links'))
                                <div class="mt-3">{{ $anuncios->links() }}</div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>


            <!--== Social Media ==-->
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <h4>Medios sociales</h4>

                    </div>
                    <div class="tab-inn">
                        <div class="table-responsive table-desi">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Media</th>
                                        <th>Nombre</th>
                                        <th>compartido</th>
                                        <th>Me gusta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><span class="list-img"><img src="images/sm/1.png" alt=""></span>
                                        </td>
                                        <td><span class="list-enq-name">Linked In</span><span
                                                class="list-enq-city">Bogotá
                                                D.C.</span>
                                        </td>
                                        <td>15K</td>
                                        <td>18K</td>
                                    </tr>
                                    <tr>
                                        <td><span class="list-img"><img src="images/sm/3.png" alt=""></span>
                                        </td>
                                        <td><span class="list-enq-name">Facebook</span><span
                                                class="list-enq-city">Bogotá
                                                D.C.</span>
                                        </td>
                                        <td>15K</td>
                                        <td>18K</td>
                                    </tr>
                                    <tr>
                                        <td><span class="list-img"><img src="images/sm/5.png" alt=""></span>
                                        </td>
                                        <td><span class="list-enq-name">YouTube</span><span class="list-enq-city">Bogotá
                                                D.C.</span>
                                        </td>
                                        <td>15K</td>
                                        <td>18K</td>
                                    </tr>
                                    <tr>
                                        <td><span class="list-img"><img src="images/sm/6.png" alt=""></span>
                                        </td>
                                        <td><span class="list-enq-name">WhatsApp</span><span
                                                class="list-enq-city">Bogotá
                                                D.C.</span>
                                        </td>
                                        <td>15K</td>
                                        <td>18K</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div> <!-- Fin del contenedor principal -->
    </div>
    </div>

    @include('admin_crud.partials.footer')
</body>

</html>