<?php

use App\Http\Controllers\NotasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EstudianteImportController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\CursoController;
use App\Exports\EstudiantesExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\DocenteImportController;
use App\Exports\DocentesExport;
use App\Http\Controllers\MensajeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AnuncioController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\CalificacionController;
use App\Http\Controllers\CursoDocenteMateriaController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\ObservadorController;
use App\Http\Controllers\EstudianteNotasController;
use App\Http\Controllers\PromocionController;
use App\Http\Controllers\MatriculaController;


// Páginas públicas
Route::get('/index', fn() => view('inicio.index'))->name('index');
Route::get('/about', fn() => view('inicio.about'))->name('about');
Route::get('/contact', fn() => view('inicio.contact'))->name('contact');
Route::get('/feature', fn() => view('inicio.feature'))->name('feature');
Route::get('/feature2', fn() => view('inicio.feature2'))->name('feature2');
Route::get('/feature3', fn() => view('inicio.feature3'))->name('feature3');

// Ruta de contacto
Route::post('/contacto', [ContactController::class, 'send'])->name('contact.send');


// Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/recuperacion', fn() => view('login.recuperacion_password'))->name('recuperacion_password');

// recuperar contraseña
Route::get('/recuperar-contrasena', [PasswordResetController::class, 'showRecoveryForm'])->name('password.request');
Route::post('/recuperar-contrasena', [PasswordResetController::class, 'sendResetCode'])->name('password.send');
Route::get('/verificar-codigo', [PasswordResetController::class, 'showCodeForm'])->name('password.code.form');
Route::post('/restablecer-contrasena', [PasswordResetController::class, 'resetPassword'])->name('password.reset');


// Ruta protegida: página de bienvenida
Route::get('/welcome', fn() => view('login.welcome'))->name('welcome')->middleware('auth');

// ====================================================================================================
//Ruta Modulo de administrador
Route::middleware(['auth', 'rol:1'])->prefix('admin')->group(function () {
    // Ruta: Dashboard de admin ver estudiantes
    Route::get('/admin', [AdminController::class, 'verEstudiantes'])->name('admin');

    // Rutas para el módulo de cursos
    Route::get('/crud_ver_curso', fn() => view('admin_crud.admin_crud_cursos.crud_ver_curso'))->name('crud_ver_curso');
    Route::get('/admin_add_curso', fn() => view('admin_crud.admin_crud_cursos.admin_add_curso'))->name('admin_add_curso');

    // Ruta: Dashboard de admin ver estudiantes
    Route::get('/admin_user_all', fn() => view('admin_crud.admin_crud_estudiantes.admin_user_all'))->name('admin_user_all');
    Route::get('/admin_crud_estudiante', fn() => view('admin_crud.admin_crud_estudiantes.admin_crud_estudiante'))->name('admin_crud_estudiante');

    // Ruta: Mostrar formulario para crear un nuevo estudiante
    Route::get('/admin/estudiantes/crear', [EstudianteController::class, 'create'])->name('estudiantes.create');
    //Route::get('/admin_add_estudiante', [EstudianteController::class, 'create'])->name('admin_add_estudiante');
    Route::post('/guardar_estudiante', [EstudianteController::class, 'store'])->name('guardar_estudiante');

    // Ruta: Mostrar todos estudiantes existentes
    Route::get('/admin_user_all', [EstudianteController::class, 'verCrudEstudiante'])->name('admin_user_all');
    Route::get('/admin/lista-estudiantes', [EstudianteController::class, 'verCrudEstudiante'])->name('lista_estudiantes_admin');
    Route::get('/ver-estudiantes', [EstudianteController::class, 'verEstudiantes'])->name('ver_estudiantes');

    // Ruta: Mostrar formulario para editar un estudiante existente

    Route::get('/admin_crud_estudiantess', fn() => view('admin_crud.admin_crud_estudiantes.admin_edit_estudiante'))->name('admin_crud_estudiantess');
    Route::get('/admin/admin_edit_estudiante/{id}', [EstudianteController::class, 'edit'])->name('estudiante.edit');
    Route::put('/admin/estudiante/{id}', [EstudianteController::class, 'update'])->name('estudiante.update');

    // Ruta: Eliminar un estudiante-------
    // Eliminar estudiante individual
    Route::delete('/admin/estudiante/{id}', [EstudianteController::class, 'destroy'])->name('estudiante.destroy');

    //Eliminar todos los estudiantes
    Route::delete('/admin/estudiantes/eliminar-todos', [EstudianteController::class, 'destroyAll'])->name('estudiante.destroyAll');




    // Ruta: Dashboard de admin ver docentes
    Route::get('/admin_dashboard', [DocenteController::class, 'index'])->name('admin_all_profesor');
    // Ruta: Lista de docentes
    Route::get('/admin_crud_profesor', [DocenteController::class, 'verCrudDocente'])->name('admin_crud_profesor');
    // Ruta: Mostrar formulario para crear un nuevo docente
    Route::get('/admin_add_profesor', [DocenteController::class, 'create'])->name('admin_add_profesor');
    Route::post('/guardar-docente', [DocenteController::class, 'store'])->name('guardar_docente');
    // Ruta: Mostrar formulario para editar un docente existente
    Route::get('/admin/admin_edit_profesor/{id}', [DocenteController::class, 'edit'])->name('docente.edit');
    Route::put('/admin/docente/{id}', [DocenteController::class, 'update'])->name('docente.update');
    // Ruta: Eliminar un docente
    Route::delete('/admin/docente/{id}', [DocenteController::class, 'destroy'])->name('docente.destroy');
    // Ruta: Eliminar todos los docentes
    Route::delete('/admin/docentes/eliminar-todos', [DocenteController::class, 'destroyAll'])->name('docente.destroyAll');

    /*
    // Rutas para el módulo de gestión de cursos
    Route::get('/gestion_cursos', [AdminController::class, 'gestionCursos'])->name('gestion_cursos');
    Route::get('/gestion_cursos/agregar', [AdminController::class, 'agregarCurso'])->name('agregar_curso');
    Route::post('/gestion_cursos/guardar', [AdminController::class, 'guardarCurso'])->name('guardar_curso');
    Route::get('/gestion_cursos/editar/{id}', [AdminController::class, 'editarCurso'])->name('editar_curso');
    Route::get('/gestion_cursos/eliminar/{id}', [AdminController::class, 'eliminarCurso'])->name('eliminar_curso');
*/

    // Rutas para el módulo de gestión de anuncios
    Route::get('/anuncios', [AnuncioController::class, 'index'])->name('admin.anuncios');
    Route::post('/anuncios', [AnuncioController::class, 'store'])->name('admin.anuncios.store');
    Route::post('/anuncios/{id}', [AnuncioController::class, 'update'])->name('admin.anuncios.update');
    Route::delete('/anuncios/{id}', [AnuncioController::class, 'destroy'])->name('admin.anuncios.destroy');
    Route::post('/anuncios/{id}/toggle', [AnuncioController::class, 'toggle'])->name('admin.anuncios.toggle');


    // Rutas para el módulo de gestión de asistencias
    Route::get('/tomar', [AsistenciaController::class, 'tomar'])->name('admin.asistencias.tomar');
    Route::get('/cargar', [AsistenciaController::class, 'cargar'])->name('admin.asistencias.cargar');
    Route::post('/guardar', [AsistenciaController::class, 'guardar'])->name('admin.asistencias.guardar');

    // Ruta de observador estudiantil 
    Route::get('/observador', [ObservadorController::class, 'index'])->name('admin.observador.index');
    Route::get('/observador/crear', [ObservadorController::class, 'create'])->name('admin.observador.create');
    Route::post('/observador/guardar', [ObservadorController::class, 'store'])->name('admin.observador.store');
    Route::get('/observador/{id}', [ObservadorController::class, 'show'])->name('admin.observador.show');
    Route::get('/observador/{id}/pdf', [ObservadorController::class, 'pdf'])->name('admin.observador.pdf');
    Route::delete('/observador/{id}', [ObservadorController::class, 'destroy'])->name('admin.observador.destroy');

    // Rutas para el módulo de matriculas
    Route::get ('/matriculas',          [MatriculaController::class,'index'])->name('admin.matriculas.index');
    Route::patch('/matriculas/{id}',     [MatriculaController::class,'update'])->name('admin.matriculas.update');
    Route::post('/matriculas/rebuild',   [MatriculaController::class,'rebuild'])->name('admin.matriculas.rebuild');

    // Rutas para el módulo de promoción de estudiantes
    Route::get('/promover', [PromocionController::class, 'index'])->name('admin.promover.index');               // seleccionar curso / año
    Route::get('/promover/cargar', [PromocionController::class, 'cargar'])->name('admin.promover.cargar');     // lista de alumnos
    Route::post('/promover/guardar', [PromocionController::class, 'guardar'])->name('admin.promover.guardar'); // aplicar resultados

});

// =====================================================================================================



// Ruta Estudiante
Route::middleware(['auth', 'rol:1,3'])->prefix('estudiante')->group(function () {
    Route::get('/dashboard_estudiante', fn() => view('estudiante.dashboard_estudiante'))->name('dashboard_estudiante');
    Route::get('/perfil', [EstudianteController::class, 'perfil'])->name('perfil');
    Route::get('/info', [EstudianteController::class, 'info'])->name('info_personal');
    Route::post('/info', [EstudianteController::class, 'updateInfo'])->name('estudiante.updateInfo');
    // Rutas para las vistas de estudiante
    Route::get('/actividades', fn() => view('estudiante.actividades.actividades'))->name('actividades');
    Route::get('/cursos', fn() => view('estudiante.cursos.cursos'))->name('cursos');
    Route::get('/estudiante_profesor', [EstudianteController::class, 'profesores'])->name('estudiante_profesor');
    Route::get('/encuesta', fn() => view('estudiante.encuestas.encuesta'))->name('encuesta');
    //Route::get('/calificaciones', fn() => view('estudiante.calificaciones.calificaciones'))->name('calificaciones');
    // Ruta para ver sus calificaciones
    Route::get('/calificaciones', [EstudianteNotasController::class, 'misCalificaciones'])->name('estudiante.calificaciones');
    // Ruta asistencia estudiante
    Route::get('/asistencias', [AsistenciaController::class, 'misAsistencias'])->name('est.asistencias');

    // Ruta observador estudiantil - ver sus observadores
    Route::get('/', [ObservadorController::class, 'misRegistros'])->name('index');
    Route::get('/{id}/pdf', [ObservadorController::class, 'pdf'])->name('pdf');

    // Ruta para ver sus matriculas
    Route::get('/estudiante/matriculas', [MatriculaController::class,'misMatriculas'])->name('estudiante.matriculas');


});

// =====================================================================================================
// Ruta de email mensajeria
Route::middleware(['auth', 'rol:1,2,3'])
    ->prefix('mensajes')
    ->name('mensajes.')
    ->group(function () {
        Route::get('/correo', [MensajeController::class, 'bandejaEntrada'])->name('bandeja');
        Route::get('/enviados', [MensajeController::class, 'enviados'])->name('sent');
        Route::get('/borradores', [MensajeController::class, 'borradores'])->name('drafts');
        Route::get('/papelera', [MensajeController::class, 'papelera'])->name('trash');

        Route::get('/redactar', [MensajeController::class, 'redactar'])->name('redactar');
        Route::post('/enviar', [MensajeController::class, 'enviar'])->name('enviar');

        // Acciones de papelera
        Route::delete('/{id}', [MensajeController::class, 'destroy'])->whereNumber('id')->name('destroy'); // mover a papelera
        Route::post('/{id}/restore', [MensajeController::class, 'restore'])->whereNumber('id')->name('restore'); // restaurar
        Route::delete('/{id}/force', [MensajeController::class, 'forceDelete'])->whereNumber('id')->name('force'); // eliminar definitivo
    
        Route::get('/{id}', [MensajeController::class, 'ver'])
            ->whereNumber('id')->name('ver');
    });

// =====================================================================================================
// COLOCAR FOTOS DE USUARIOS
// Para que cada usuario actualice su propia foto
Route::post('/perfil/avatar', [UsuarioController::class, 'updateOwnAvatar'])
    ->middleware('auth')->name('usuario.avatar.own');

// (Opcional) Para que un admin actualice la foto de otro usuario
Route::post('/usuarios/{usuario}/avatar', [UsuarioController::class, 'updateAvatar'])
    ->middleware(['auth', 'rol:1'])->name('usuario.avatar.update');




// =====================================================================================================

// Ruta para el ingreso de estudiantes o administradores para cierta vista
Route::middleware(['auth', 'rol:1,3'])->group(function () {
    Route::get('/estudiante', [EstudianteController::class, 'dashboard'])->name('estudiante.dashboard');
});

// importar estudiantes desde CSV
Route::get('/importar-estudiantes', [EstudianteImportController::class, 'show'])->name('importar.estudiantes.form');
Route::post('/importar-estudiantes', [EstudianteImportController::class, 'import'])->name('importar.estudiantes');

// Exportar estudiantes a Excel
Route::get('/exportar-estudiantes', function () {
    return Excel::download(new EstudiantesExport, 'estudiantes.xlsx');
})->middleware('auth')->name('exportar.estudiantes');
// importar docentes desde CSV
Route::get('/importar-docentes', [DocenteImportController::class, 'show'])->name('importar.docentes.form');
Route::post('/importar-docentes', [DocenteImportController::class, 'import'])->name('importar.docentes');

Route::get('/exportar-docentes', function () {
    return Excel::download(new DocentesExport, 'docentes.xlsx');
})->middleware('auth')->name('exportar.docentes');




/*--------------------- Rutas de Cursos -------------------------- */

Route::middleware(['auth'])->group(function () {
    Route::get('/admin_add_curso', [CursoController::class, 'create'])->name('admin_add_curso');
    Route::post('/cursos', [CursoController::class, 'store'])->name('cursos.store');
    Route::get('/crud_ver_curso', [CursoController::class, 'index'])->name('crud_ver_curso');


    /*Route::get('/admin_edit_curso/{id_curso}', [CursoController::class, 'edit'])->name('admin_edit_curso');
    Route::put('/cursos/{id_curso}', [CursoController::class, 'update'])->name('cursos.update');*/

    Route::resource('cursos_edit', CursoController::class);

    Route::delete('/cursos/{id_curso}', [CursoController::class, 'destroy'])->name('cursos.destroy');

    Route::get('/cursos/{id}/estudiantes', [CursoController::class, 'verEstudiantes'])->name('cursos.estudiantes');
});

/*--------------------- Rutas de Materias -------------------------- */


Route::middleware(['auth'])->group(function () {
    Route::get('/admin_add_materia', [MateriaController::class, 'create'])->name('admin_add_materia');
    Route::post('/materias', [MateriaController::class, 'store'])->name('materias.store');
    Route::get('/admin_ver_materia', [MateriaController::class, 'index'])->name('admin_ver_materia');


    Route::get('/admin_edit_materia/{id_materia}', [MateriaController::class, 'edit'])->name('admin_edit_materia');
    Route::put('/materias/{id_materia}', [MateriaController::class, 'update'])->name('materias.update');
    Route::delete('/materias/{id_materia}', [MateriaController::class, 'destroy'])->name('materias.destroy');


    /* ------------------ Ruat Boton de Listado de Materias -------------------- */

    Route::get('/cursos/{id}/materias', [CursoController::class, 'verMaterias'])->name('cursos.materias');


});


/* ----------------- Ruta Boton de Calificaciones -------------  */
Route::middleware(['auth'])->group(function () {

    Route::get('/admin_calificaciones', [CalificacionController::class, 'cursosAsignados'])->name('lista_cursos');
    Route::get('/calificaciones/cursos', [CalificacionController::class, 'cursosAsignados'])->name('calificaciones.cursos');
    Route::get('/obtener-docente', [CalificacionController::class, 'obtenerDocenteAsignado'])->name('obtener.docente');
    Route::get('/notas/{id}', [NotasController::class, 'verNotas'])->name('notas.ver');
    Route::get('/notas/{estudiante}/pdf', [NotasController::class, 'verNotasPDF'])->name('notas.pdf');

});


/* ----------------- Rutas Asignar Curso Materia Docente -------------  */

Route::middleware(['auth'])->group(function () {

    Route::get('/curso-docente-materia/create', [CursoDocenteMateriaController::class, 'create'])->name('curso_docente_materia.create');
    Route::post('/curso-docente-materia/store', [CursoDocenteMateriaController::class, 'store'])->name('curso_docente_materia.store');
    Route::delete('/curso-docente-materia/{id_asignacion}', [CursoDocenteMateriaController::class, 'destroy'])->name('curso_docente_materia.destroy');

});

/* ----------------- Ruta Para Mostrar los estudiantes del curso en CALIFICACIONES -------------  */

Route::middleware(['auth'])->group(function () {
    Route::get('/calificaciones/cursos/{curso}', [CalificacionController::class, 'mostrarEstudiantes'])->name('calificaciones.estudiantes');

    Route::get('/calificaciones/crear/{curso}/{estudiante}', [CalificacionController::class, 'crearCalificacion'])
        ->name('calificaciones.crear');

    Route::post('/calificaciones/guardar', [CalificacionController::class, 'guardarCalificacion'])
        ->name('calificaciones.guardar');
});

// PDF de todas las notas del curso (controlador)
Route::get('/notas/curso/{curso}/pdf', [NotasController::class, 'pdfNotasCurso'])->name('notas.curso.pdf');