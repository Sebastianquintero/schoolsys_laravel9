<table>
    <thead>
        <tr>
            <th>Tipo Documento</th>
            <th>Número Documento</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Correo</th>
            <th>Correo Personal</th>
            <th>Teléfono</th>
            <th>Fecha Nacimiento</th>
            <th>Edad</th>
            <th>Tipo Vía</th>
            <th>Dirección</th>
            <th>Grado</th>
            <th>Curso</th>
            <th>Nivel Educativo</th>
            <th>Nacionalidad</th>
            <th>Acudiente</th>
            <th>EPS</th>
            <th>Sisben</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($estudiantes as $e)
            <tr>
                <td>{{ $e->usuario->tipo_documento ?? '' }}</td>
                <td>{{ $e->usuario->numero_documento ?? '' }}</td>
                <td>{{ $e->usuario->nombres ?? '' }}</td>
                <td>{{ $e->usuario->apellidos ?? '' }}</td>
                <td>{{ $e->usuario->correo ?? '' }}</td>
                <td>{{ $e->correo_personal }}</td>
                <td>{{ $e->telefono }}</td>
                <td>{{ $e->fecha_nacimiento }}</td>
                <td>{{ $e->edad }}</td>
                <td>{{ $e->tipo_via }}</td>
                <td>{{ $e->direccion }}</td>
                <td>{{ $e->grado }}</td>
                <td>{{ $e->curso }}</td>
                <td>{{ $e->nivel_educativo }}</td>
                <td>{{ $e->nacionalidad }}</td>
                <td>{{ $e->acudiente }}</td>
                <td>{{ $e->eps }}</td>
                <td>{{ $e->sisben }}</td>
            </tr>
        @endforeach
    </tbody>
</table>