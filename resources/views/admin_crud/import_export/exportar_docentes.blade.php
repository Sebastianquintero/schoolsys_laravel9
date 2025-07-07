<table>
    <thead>
        <tr>
            <th>Tipo Documento</th>
            <th>Número Documento</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Correo Institucional</th>
            <th>Correo Personal</th>
            <th>Teléfono</th>
            <th>Fecha Nacimiento</th>
            <th>Edad</th>
            <th>Cargo</th>
            <th>Tipo Contrato</th>
            <th>Duración</th>
            <th>Fecha Inicio</th>
            <th>Fecha Fin</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($docentes as $d)
            <tr>
                <td>{{ $d->usuario->tipo_documento ?? '' }}</td>
                <td>{{ $d->usuario->numero_documento ?? '' }}</td>
                <td>{{ $d->usuario->nombres ?? '' }}</td>
                <td>{{ $d->usuario->apellidos ?? '' }}</td>
                <td>{{ $d->usuario->correo ?? '' }}</td>
                <td>{{ $d->correo_personal }}</td>
                <td>{{ $d->telefono }}</td>
                <td>{{ $d->usuario->fecha_nacimiento }}</td>
                <td>{{ \Carbon\Carbon::parse($d->usuario->fecha_nacimiento)->age }}</td>
                <td>{{ $d->cargo }}</td>
                <td>{{ $d->tipo_contrato }}</td>
                <td>{{ $d->duracion }}</td>
                <td>{{ $d->fecha_inicio }}</td>
                <td>{{ $d->fecha_fin }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
