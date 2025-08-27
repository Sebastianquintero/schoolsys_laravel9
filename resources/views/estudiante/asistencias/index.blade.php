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

            <!-- Contenido principal -->
            <div class="sb2-2">
                <div class="sb2-2-2">
                    <ul>
                        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
                        <li class="active-bre"><a href="#">Mis asistencias</a></li>
                    </ul>
                </div>

                @php
            $items = $asistencias ?? collect();  // evita "Undefined variable"
        @endphp

            <div class="inn-title">
                <h4>Mi asistencia</h4>
                <p>Presentes: <b>{{ $stats['presentes'] ?? 0 }}</b> – Faltas: <b>{{ $stats['faltas'] ?? 0 }}</b></p>
            </div>

            <div class="tab-inn">
                <div class="table-responsive table-desi">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($items as $a)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($a->fecha_asistencia)->format('d M Y') }}</td>
                                <td>
                                    @switch($a->estado)
                                        @case('asistio')      <span class="badge badge-success">Asistió</span> @break
                                        @case('falto')        <span class="badge badge-danger">Faltó</span> @break
                                        @case('tarde')        <span class="badge badge-warning">Tarde</span> @break
                                        @case('justificado')  <span class="badge badge-info">Justificado</span> @break
                                        @default              <span class="badge">-</span>
                                    @endswitch
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="text-center">No tienes asistencias registradas.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    @if(method_exists($items, 'links'))
                        <div class="mt-3">
                            {{ $items->links() }}
                        </div>
                    @endif
                </div>
            </div>
    
    @include('estudiante.partials.fotter')
</body>

</html>