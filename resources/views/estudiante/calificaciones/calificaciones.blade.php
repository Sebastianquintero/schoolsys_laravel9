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
                <li><a href="{{ route('dashboard_estudiante') }}"><i class="fa fa-home"></i>Inicio</a></li>
                <li class="active-bre"><a href="#">Mis Calificaciones</a></li>
            </ul>
        </div>

        <div class="calificaciones-list">
            <h4>Mis Calificaciones</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Curso</th>
                        <th>Fecha del Examen</th>
                        <th>Créditos</th>
                        <th>Calificación</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Matemáticas Avanzadas</td>
                        <td>2024-06-15</td>
                        <td>4</td>
                        <td>8.5</td>
                        <td><span class="badge badge-success">Aprobado</span></td>
                        <td>
                            <button class="btn btn-primary btn-sm">Ver Detalles</button>
                            <button class="btn btn-secondary btn-sm" disabled>Revisar Resultados</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Historia Contemporánea</td>
                        <td>2024-06-18</td>
                        <td>3</td>
                        <td>7.2</td>
                        <td><span class="badge badge-warning">Condicional</span></td>
                        <td>
                            <button class="btn btn-primary btn-sm">Ver Detalles</button>
                            <button class="btn btn-success btn-sm">Revisar Resultados</button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Biología Molecular</td>
                        <td>2024-07-05</td>
                        <td>5</td>
                        <td>9.0</td>
                        <td><span class="badge badge-success">Aprobado</span></td>
                        <td>
                            <button class="btn btn-primary btn-sm">Ver Detalles</button>
                            <button class="btn btn-secondary btn-sm" disabled>Revisar Resultados</button>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Programación Avanzada</td>
                        <td>2024-07-20</td>
                        <td>6</td>
                        <td>5.6</td>
                        <td><span class="badge badge-danger">Reprobado</span></td>
                        <td>
                            <button class="btn btn-primary btn-sm">Ver Detalles</button>
                            <button class="btn btn-warning btn-sm">Revisar Resultados</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>

    @include('estudiante.partials.fotter')
</body>

</html>