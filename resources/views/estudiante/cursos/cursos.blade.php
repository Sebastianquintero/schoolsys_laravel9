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
                <li class="active-bre"><a href="#"> Mis Cursos</a></li>
            </ul>
        </div>

        <!--== Cursos Asociados ==-->
        <div class="courses-list">
            <h4>Cursos Asociados</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Curso</th>
                        <th>Instructor</th>
                        <th>Fecha de Inicio</th>
                        <th>Fecha de Finalización</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Introducción a la Programación</td>
                        <td>Juan Pérez</td>
                        <td>2024-09-01</td>
                        <td>2024-12-01</td>
                        <td><span class="badge badge-warning">En Curso</span></td>
                        <td>
                            <button class="btn btn-primary btn-sm">Ver Detalles</button>
                            <button class="btn btn-success btn-sm">Acceder al Curso</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Matemáticas Discretas</td>
                        <td>María López</td>
                        <td>2024-08-20</td>
                        <td>2024-11-20</td>
                        <td><span class="badge badge-success">Finalizado</span></td>
                        <td>
                            <button class="btn btn-primary btn-sm">Ver Detalles</button>
                            <button class="btn btn-secondary btn-sm" disabled>Acceder al Curso</button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Redes y Comunicaciones</td>
                        <td>Roberto González</td>
                        <td>2024-09-15</td>
                        <td>2024-12-15</td>
                        <td><span class="badge badge-warning">En Curso</span></td>
                        <td>
                            <button class="btn btn-primary btn-sm">Ver Detalles</button>
                            <button class="btn btn-success btn-sm">Acceder al Curso</button>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Gestión de Proyectos</td>
                        <td>Ana Martínez</td>
                        <td>2024-10-01</td>
                        <td>2025-01-01</td>
                        <td><span class="badge badge-warning">En Curso</span></td>
                        <td>
                            <button class="btn btn-primary btn-sm">Ver Detalles</button>
                            <button class="btn btn-success btn-sm">Acceder al Curso</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    @include('estudiante.partials.fotter')
</body>

</html>