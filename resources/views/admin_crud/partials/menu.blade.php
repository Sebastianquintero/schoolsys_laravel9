<!--== LEFT MENU ==-->
<div class="sb2-13">
    <ul class="collapsible" data-collapsible="accordion">
        <li><a href="{{ route('admin') }}" class="menu-active"><i class="fa fa-bar-chart"></i> Principal</a></li>

        <li>
            <a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-book"></i>Todos los cursos</a>
            <div class="collapsible-body left-sub-menu">
                <ul>
                    <li><a href="{{ route('crud_ver_curso') }}">Todos los Cursos</a></li>
                    <li><a href="{{ route('admin_add_curso') }}">Agregar Curso</a></li>
                    <li><a href="#">Cursos Pasados</a></li>
                </ul>
            </div>
        </li>

        <li>
            <a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-user"></i>Crud Estudiantes</a>
            <div class="collapsible-body left-sub-menu">
                <ul>
                    <li><a href="{{ route('admin_user_all') }}">Estudiantes</a></li>
                    <li><a href="{{ route('admin_crud_estudiante') }}">Agregar Estudiantes</a></li>
                </ul>
            </div>
        </li>
        <li>
            <a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-bullhorn"></i>Todos los profesores</a>
            <div class="collapsible-body left-sub-menu">
                <ul>
                    <li><a href="{{ route('admin_crud_profesor') }}">Profesores</a></li>
                    <li><a href="{{ route('admin_add_profesor') }}">Agregar Profesor</a></li>
                </ul>
            </div>
        </li>

        <li>
            <a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-users"></i>Todos los usuarios</a>
            <div class="collapsible-body left-sub-menu">
                <ul>
                    <!-- <li><a href="{{ url('admin/estudiantes') }}">Todos los Usuarios</a></li> -->
                    
                </ul>
            </div>
        </li>
        
        <li>
            <a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-bars"></i> Menu </a>
            <div class="collapsible-body left-sub-menu">
                <ul>
                    <li><a href="{{ route('admin') }}">Menú Principal</a></li>
                    <li><a href="#">Boletin de estudiante</a></li>
                    <li><a href="#">Observador estudiantil</a></li>
                    
                </ul>
            </div>
        </li>

        

        <li>
            <a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-graduation-cap"></i>Actividades</a>
            <div class="collapsible-body left-sub-menu">
                <ul>
                    <li><a href="{{ route('admin_ver_actividades') }}">Ver actividades</a></li>
                    <li><a href="{{ route('admin_add_actividades') }}">Crear nuevas actividades</a></li>
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
            <a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-users"></i>Todos los Estudiantes</a>
            <div class="collapsible-body left-sub-menu">
                <ul>
                    <!-- <li><a href="{{ url('admin/estudiantes') }}">Todos los Estudiantes</a></li> -->
                    <!-- <li><a href="{{ url('admin/estudiantes/agregar') }}">Agregar Nuevo Estudiante</a></li> -->
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
                    <li><a href="{{ route('exportar.estudiantes') }}">Exportar Estudiantes</a></li>
                    <li><a href="{{ route('importar.docentes.form') }}">Importar Docentes</a></li>
                    <li><a href="{{ route('exportar.docentes') }}">Exportar Docentes</a></li>
                </ul>
            </div>
        </li>
    </ul>
</div>
