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
        <!--== breadcrumbs ==-->
        <div class="sb2-2-2">
            <ul>
                <li><a href="{{ route('dashboard_estudiante') }}"><i class="fa fa-home" aria-hidden="true"></i>
                        Inicio</a></li>
                <li class="active-bre"><a href="#"> Mis Encuestas</a></li>
            </ul>
        </div>

        <!--== Encuestas Pendientes ==-->
        <div class="encuestas-list">
            <h4>Encuestas Pendientes</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Encuesta</th>
                        <th>Fecha de Inicio</th>
                        <th>Fecha de Finalización</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Encuesta de Satisfacción</td>
                        <td>2024-09-01</td>
                        <td>2024-09-15</td>
                        <td><span class="badge badge-warning">Pendiente</span></td>
                        <td>
                            <button class="btn btn-primary btn-sm">Ver Detalles</button>
                            <button class="btn btn-success btn-sm">Responder Encuesta</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Encuesta de Opinión</td>
                        <td>2024-09-05</td>
                        <td>2024-09-20</td>
                        <td><span class="badge badge-warning">Pendiente</span></td>
                        <td>
                            <button class="btn btn-primary btn-sm">Ver Detalles</button>
                            <button class="btn btn-success btn-sm">Responder Encuesta</button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Encuesta de Evaluación de Cursos</td>
                        <td>2024-09-10</td>
                        <td>2024-09-30</td>
                        <td><span class="badge badge-warning">Pendiente</span></td>
                        <td>
                            <button class="btn btn-primary btn-sm">Ver Detalles</button>
                            <button class="btn btn-success btn-sm">Responder Encuesta</button>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Encuesta de Servicios Estudiantiles</td>
                        <td>2024-09-15</td>
                        <td>2024-09-25</td>
                        <td><span class="badge badge-success">Respondida</span></td>
                        <td>
                            <button class="btn btn-primary btn-sm">Ver Detalles</button>
                            <button class="btn btn-secondary btn-sm" disabled>Encuesta Respondida</button>
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