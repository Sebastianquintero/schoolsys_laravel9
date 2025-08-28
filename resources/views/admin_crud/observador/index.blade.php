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
                <div class="sb2-2-2">
                    <ul>
                        <li><a href="{{ route('welcome') }}"><i class="fa fa-home"></i> Inicio</a></li>
                        <li class="active-bre"><a href="#">Observador</a></li>
                    </ul>
                </div>
                <!--== BODY INNER CONTAINER ==-->
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <h4>Observador estudiantil</h4>
                        <a href="{{ route('admin.observador.create') }}" class="btn btn-success btn-sm">+ Nuevo</a>
                    </div>
                    
                    <div class="tab-inn">
                        <div class="row" style="margin-bottom:1rem">
                        <div class="col s12">
                            <form method="GET" action="{{ route('admin.observador.index') }}" class="form-inline">
                                <input type="text" name="q" value="{{ $q ?? '' }}" placeholder="Buscar estudiante..."
                                    style="max-width:320px">
                                <button class="btn blue" style="margin-left:.5rem">Buscar</button>
                                @if(!empty($q))
                                    <a href="{{ route('admin.observador.index') }}" class="btn grey"
                                        style="margin-left:.5rem">Limpiar</a>
                                @endif
                            </form>
                        </div>
                    </div>
                        <div class="table-responsive">
                            
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Estudiante</th>
                                        <th>Curso</th>
                                        <th>Docente</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($items as $it)
                                        <tr>
                                            <td>{{ $it->fecha->format('d M Y') }}</td>
                                            <td>{{ $it->estudiante->usuario->nombres }}
                                                {{ $it->estudiante->usuario->apellidos }}
                                            </td>
                                            <td>{{ $it->curso->numero_curso ?? '-' }}</td>
                                            <td>
                                                {{ optional($it->docente->usuario)->nombres }}
                                                {{ optional($it->docente->usuario)->apellidos }}
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.observador.show', $it->id_observador) }}"
                                                    class="btn btn-primary btn-xs">Ver</a>
                                                <a href="{{ route('admin.observador.pdf', $it->id_observador) }}"
                                                    class="btn btn-info btn-xs">PDF</a>
                                                <form action="{{ route('admin.observador.destroy', $it->id_observador) }}"
                                                    method="POST" style="display:inline-block"
                                                    onsubmit="return confirm('¿Está seguro que desea eliminar esta observación?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn red btn-sm">ELIMINAR</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Sin registros</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center">{{ $items->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/main.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>

    <!-- Logout Form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>

</html>