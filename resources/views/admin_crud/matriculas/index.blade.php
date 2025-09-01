<!DOCTYPE html>
<html lang="en">


<head>
    @include('admin_crud.partials.head')
</head>

<body>
    <!--== MAIN CONTRAINER ==-->
    @include('admin_crud.partials.main_container')

    <!--== BODY CONTNAINER ==-->
    <div class="container-fluid sb2">
        <div class="row">
            <div class="sb2-1">
                <!--== USER INFO ==-->
                <div class="sb2-12">
                    <ul>
                        <li><img src="{{ auth()->user()->foto_url }}" class="img-thumbnail rounded-circle" width="120"
                                alt="Foto">
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
                        <li><a href="index-2.html"><i class="fa fa-home" aria-hidden="true"></i>Inicio</a>
                        </li>
                        <li class="active-bre"><a href="#">promoción</a>
                        </li>
                        <li class="page-back"><a href="{{ route('admin') }}"><i class="fa fa-backward"
                                    aria-hidden="true"></i>Atras</a>
                        </li>
                    </ul>
                </div>

                <!--== User Details ==-->
                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-inn-sp">
                                <div class="inn-title">
                                    <h4>Matrículas</h4>
                                </div>
                                <div class="tab-inn">
                                    <form class="row" method="GET">
                                        <div class="col s2">
                                            <label class="active">Año escolar</label>
                                            <input type="text" name="anio" value="{{ $anio }}">
                                        </div>
                                        <div class="col s3">
                                            <label class="active">Curso</label>
                                            <select name="curso" class="browser-default">
                                                <option value="">-- Todos --</option>
                                                @foreach($cursos as $c)
                                                    <option value="{{ $c->id_curso }}" {{ request('curso') == $c->id_curso ? 'selected' : '' }}>
                                                        {{ $c->numero_curso }} - {{ $c->nombre_curso }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col s2">
                                            <label class="active">Estado</label>
                                            <select name="estado" class="browser-default">
                                                <option value="">--</option>
                                                @foreach(['regular', 'retirado', 'graduado'] as $opt)
                                                    <option value="{{ $opt }}" {{ request('estado') == $opt ? 'selected' : '' }}>
                                                        {{ ucfirst($opt) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col s2">
                                            <label class="active">Resultado</label>
                                            <select name="resultado" class="browser-default">
                                                <option value="">--</option>
                                                @foreach(['pendiente', 'aprobado', 'reprobado'] as $opt)
                                                    <option value="{{ $opt }}" {{ request('resultado') == $opt ? 'selected' : '' }}>{{ ucfirst($opt) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col s2">
                                            <label class="active">Buscar</label>
                                            <input type="text" name="q" value="{{ $q }}"
                                                placeholder="Nombre o apellido">
                                        </div>
                                        <div class="col s1" style="margin-top:1.7rem">
                                            <button class="btn green">Filtrar</button>
                                        </div>
                                    </form>

                                    <form method="POST" action="{{ route('admin.matriculas.rebuild') }}" class="right">
                                        @csrf
                                        <input type="hidden" name="anio" value="{{ $anio }}">
                                        <button class="btn teal">Reconstruir año {{ $anio }}</button>
                                    </form>

                                    <div class="table-responsive table-desi">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Año</th>
                                                    <th>Estudiante</th>
                                                    <th>Curso</th>
                                                    <th>Estado</th>
                                                    <th>Resultado</th>
                                                    <th>Editar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($items as $m)
                                                    <tr>
                                                        <td>{{ $m->anio_escolar }}</td>
                                                        <td>{{ $m->estudiante->usuario->apellidos ?? '' }}
                                                            {{ $m->estudiante->usuario->nombres ?? '' }}</td>
                                                        <td>{{ $m->curso->numero_curso ?? '' }}</td>
                                                        <td>{{ ucfirst($m->estado) }}</td>
                                                        <td>{{ ucfirst($m->resultado) }}</td>
                                                        <td>
                                                            <form method="POST"
                                                                action="{{ route('admin.matriculas.update', $m->id_matricula) }}"
                                                                class="form-inline">
                                                                @csrf @method('PATCH')
                                                                <select name="estado" class="browser-default">
                                                                    @foreach(['regular', 'retirado', 'graduado'] as $opt)
                                                                        <option value="{{ $opt }}" {{ $m->estado == $opt ? 'selected' : '' }}>
                                                                            {{ ucfirst($opt) }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <select name="resultado" class="browser-default">
                                                                    @foreach(['pendiente', 'aprobado', 'reprobado'] as $opt)
                                                                        <option value="{{ $opt }}" {{ $m->resultado == $opt ? 'selected' : '' }}>
                                                                            {{ ucfirst($opt) }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <select name="fk_curso" class="browser-default">
                                                                    @foreach($cursos as $c)
                                                                        <option value="{{ $c->id_curso }}" {{ $m->fk_curso == $c->id_curso ? 'selected' : '' }}>
                                                                            {{ $c->numero_curso }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                <button class="btn blue btn-sm">Guardar</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6" class="text-center">No hay matrículas.</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                        {{ $items->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('admin_crud.partials.footer')
</body>


</html>