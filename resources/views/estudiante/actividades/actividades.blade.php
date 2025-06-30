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
                <li class="active-bre"><a href="#"> Actividades Pendientes o Cerradas</a></li>
            </ul>
        </div>

        <!--== Formulario Actividades Pendientes ==-->
        <div class="activities-list">
            <h4>Lista de Actividades</h4>

            <!-- Filtros -->
            <div class="row">
                <div class="col-md-6">
                    <label for="estado-actividad">Filtrar por Estado:</label>
                    <select id="estado-actividad" class="form-control">
                        <option value="pendiente">Pendiente por Evaluar</option>
                        <option value="cerrada">Cerrada</option>
                        <option value="todas">Todas</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="fecha-actividad">Filtrar por Fecha:</label>
                    <input type="date" id="fecha-actividad" class="form-control">
                </div>
            </div>

            <!-- Tabla de Actividades -->
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Actividad</th>
                        <th>Fecha de Creación</th>
                        <th>Fecha de Cierre</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="ID">1</td>
                        <td data-label="Actividad">Evaluación de Proyecto</td>
                        <td data-label="Fecha de Creación">2024-12-01</td>
                        <td data-label="Fecha de Cierre">2024-12-10</td>
                        <td data-label="Estado"><span class="badge badge-warning">Pendiente</span></td>
                        <td data-label="Acciones">
                            <button class="btn btn-primary btn-sm">Ver Detalles</button>
                            <button class="btn btn-success btn-sm">Cerrar</button>
                        </td>
                    </tr>
                    <tr>
                        <td data-label="ID">2</td>
                        <td data-label="Actividad">Revisión de Tarea</td>
                        <td data-label="Fecha de Creación">2024-11-25</td>
                        <td data-label="Fecha de Cierre">2024-12-05</td>
                        <td data-label="Estado"><span class="badge badge-success">Cerrada</span></td>
                        <td data-label="Acciones">
                            <button class="btn btn-primary btn-sm">Ver Detalles</button>
                        </td>
                    </tr>
                    <tr>
                        <td data-label="ID">3</td>
                        <td data-label="Actividad">Prueba Final de Curso</td>
                        <td data-label="Fecha de Creación">2024-11-28</td>
                        <td data-label="Fecha de Cierre">2024-12-06</td>
                        <td data-label="Estado"><span class="badge badge-warning">Pendiente</span></td>
                        <td data-label="Acciones">
                            <button class="btn btn-primary btn-sm">Ver Detalles</button>
                            <button class="btn btn-success btn-sm">Cerrar</button>
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