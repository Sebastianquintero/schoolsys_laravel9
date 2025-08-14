<!DOCTYPE html>
<html lang="en">

<head>
    @include('estudiante.partials.head')
</head>

<body>
    <!-- Contenedor principal -->
    @include('estudiante.partials.contenedorPrincipalEst')

    <!-- Cuerpo -->
    @include('estudiante.partials.menu')
    
    <!--== BODY INNER CONTAINER ==-->
            <div class="sb2-2">
                <div class="sb2-2-2">
                    <ul>
                        <li><a href="{{ route('dashboard_estudiante') }}"><i class="fa fa-home"></i> Inicio</a></li>
                        <li class="active-bre"><a href="#"> Usuarios(Estudiantes)</a></li>
                    </ul>
                </div>

                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-inn-sp">
                                <div class="inn-title">
                                    <h4>Profesores</h4>
                                    <form class="app-search">
                                        <input type="text" placeholder="Search..." class="form-control">
                                        <a href="#"><i class="fa fa-search"></i></a>
                                    </form>
                                </div>
                                <div class="tab-inn">
                                    <div class="table-responsive table-desi">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Foto</th>
                                                    <th>Nombre</th>
                                                    <th>Apellido</th>
                                                    <th>Teléfono</th>
                                                    <th>Correo</th>
                                                    <th>Cursos Asignados</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($docentes as $d)
                                                    @php $u = $d->usuario; @endphp
                                                    <tr>
                                                        <td>
                                                            <span class="list-img">
                                                            <img src="{{ $u?->foto_url ?? asset('images/placeholder.jpg') }}" alt="" style="width:40px;height:40px;border-radius:50%;object-fit:cover">
                                                            </span>
                                                        </td>
                                                        <td>{{ $u->nombres ?? '—' }}</td>
                                                        <td>{{ $u->apellidos ?? '—' }}</td>
                                                        <td>{{ $u->numero_telefono ?? '—' }}</td>
                                                        <td>{{ $u->correo ?? '—' }}</td>
                                                        <td>
                                                        @if (isset($d->cursos))
                                                        {{ $d->cursos->pluck('nombre_curso')->join(', ') ?: '—' }}
                                                        @else
                                                        — {{-- si aún no tienes relación --}}
                                                        @endif
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr><td colspan="6" class="text-center">No hay profesores.</td></tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mt-3">
                                        {{ $docentes->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('estudiante.partials.fotter')
</body>

</html>
