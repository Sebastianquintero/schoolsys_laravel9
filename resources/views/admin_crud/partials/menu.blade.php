<!--== LEFT MENU ==-->
<div class="sb2-13">
    <ul class="collapsible" data-collapsible="accordion">
        <li><a href="{{ route('admin') }}" class="menu-active"><i class="fa fa-bar-chart"></i> Principal</a></li>

        <li>
            <a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-book"></i>Todos los cursos</a>
            <div class="collapsible-body left-sub-menu">
                <ul>
                    <li><a href="{{ url('admin/cursos') }}">Todos los Cursos</a></li>
                    <li><a href="{{ url('admin/cursos/agregar') }}">Agregar Curso</a></li>
                    <li><a href="#">Cursos Pasados</a></li>
                </ul>
            </div>
        </li>

        <li>
            <a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-user"></i>Todos los Usuarios</a>
            <div class="collapsible-body left-sub-menu">
                <ul>
                    <li><a href="{{ route('admin_usuarios') }}">Usuarios</a></li>
                    <li><a href="{{ route('admin_usuarios') }}">Agregar Usuario</a></li>
                </ul>
            </div>
        </li>

        <li>
            <a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-bars"></i> Menu</a>
            <div class="collapsible-body left-sub-menu">
                <ul>
                    <li><a href="{{ route('admin') }}">Menú Principal</a></li>
                    <li><a href="#">Acerca del Menú</a></li>
                    <li><a href="#">Menú Admisión</a></li>
                    <li><a href="#">Todas las páginas del Menú</a></li>
                </ul>
            </div>
        </li>

        <li>
            <a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-bullhorn"></i>Crud profesores</a>
            <div class="collapsible-body left-sub-menu">
                <ul>
                    <li><a href="{{ url('admin/profesores') }}">Profesores</a></li>
                    <li><a href="{{ url('admin/profesores/agregar') }}">Agregar Profesor</a></li>
                </ul>
            </div>
        </li>

        <li>
            <a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-graduation-cap"></i>Crud actividad</a>
            <div class="collapsible-body left-sub-menu">
                <ul>
                    <li><a href="{{ url('admin/actividades') }}">Ver actividades</a></li>
                    <li><a href="{{ url('admin/actividades/agregar') }}">Crear nuevas actividades</a></li>
                </ul>
            </div>
        </li>

        <li>
            <a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-pencil"></i>Examenes</a>
            <div class="collapsible-body left-sub-menu">
                <ul>
                    <li><a href="#">Todos los Examenes</a></li>
                    <li><a href="#">Agregar Nuevo Examen</a></li>
                    <li><a href="#">Todos los Grupos</a></li>
                    <li><a href="#">Crear Nuevos Grupos</a></li>
                </ul>
            </div>
        </li>

        <li>
            <a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-users"></i>Estudiantes</a>
            <div class="collapsible-body left-sub-menu">
                <ul>
                    <li><a href="{{ url('admin/estudiantes') }}">Todos los Estudiantes</a></li>
                    <li><a href="{{ url('admin/estudiantes/agregar') }}">Agregar Nuevo Estudiante</a></li>
                </ul>
            </div>
        </li>

        <li>
            <a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-commenting-o"></i>Consultas</a>
            <div class="collapsible-body left-sub-menu">
                <ul>
                    <li><a href="#">Todas las Consultas</a></li>
                    <li><a href="#">Consulta de Cursos</a></li>
                    <li><a href="#">Consulta de Admisión</a></li>
                    <li><a href="#">Consulta de Observaciones</a></li>
                    <li><a href="#">Consulta de Eventos</a></li>
                    <li><a href="#">Consulta Común</a></li>
                </ul>
            </div>
        </li>

        <li>
            <a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-cloud-download"></i>Importar y Exportar</a>
            <div class="collapsible-body left-sub-menu">
                <ul>
                    <li><a href="{{ route('importar.estudiantes.form') }}">Importar Estudiantes</a></li>
                    <li><a href="#">Exportar Archivos</a></li>
                </ul>
            </div>
        </li>
    </ul>
</div>
