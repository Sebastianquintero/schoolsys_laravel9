<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EstudianteImportController;
use App\Http\Controllers\PasswordResetController;
use App\Exports\EstudiantesExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\DocenteImportController;
use App\Exports\DocentesExport;
use App\Http\Controllers\MensajeController;


Route::get('/index', function () {
    return view('inicio.index');
})->name('index');
Route::get('/about', function () {
    return view('inicio.about');
})->name('about');
Route::get('/contact', function () {
    return view('inicio.contact');
})->name('contact');
Route::get('/feature', function () {
    return view('inicio.feature');
})->name('feature');
Route::get('/feature2', function () {
    return view('inicio.feature2');
})->name('feature2');
Route::get('/feature3', function () {
    return view('inicio.feature3');
})->name('feature3');

// Login

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/recuperacion', function () {
    return view('login.recuperacion_password');
})->name('recuperacion_password');

// recuperar contraseña
Route::get('/recuperar-contrasena', [PasswordResetController::class, 'showRecoveryForm'])->name('password.request');
Route::post('/recuperar-contrasena', [PasswordResetController::class, 'sendResetCode'])->name('password.send');

Route::get('/verificar-codigo', [PasswordResetController::class, 'showCodeForm'])->name('password.code.form');
Route::post('/restablecer-contrasena', [PasswordResetController::class, 'resetPassword'])->name('password.reset');


// Ruta protegida: página de bienvenida
Route::get('/welcome', function () {
    return view('login.welcome');
})->name('welcome')->middleware('auth');



// ====================================================================================================
//Ruta Modulo de administrador
Route::middleware(['auth', 'rol:1'])->prefix('admin')->group(function () {
    // Ruta: Dashboard de admin ver estudiantes
    Route::get('/admin', [AdminController::class, 'verEstudiantes'])->name('admin');

    // Comunicaciones del admin
    //Route::get('/comunica_admin', fn() => view('modulo_comunicacion.comunica_admin.comunica_admin'))->name('comunica_admin');
    //Route::get('/comunica_add_admin', fn() => view('modulo_comunicacion.comunica_admin.comunica_add_admin'))->name('comunica_add_admin');
    //Route::get('/comunica_config_admin', fn() => view('modulo_comunicacion.comunica_admin.comunica_config_admin'))->name('comunica_config_admin');

    // Rutas para el módulo de cursos
    Route::get('/crud_ver_curso', fn() => view('admin_crud.admin_crud_cursos.crud_ver_curso'))->name('crud_ver_curso');
    Route::get('/admin_add_curso', fn() => view('admin_crud.admin_crud_cursos.admin_add_curso'))->name('admin_add_curso');

    // Ruta: Dashboard de admin ver estudiantes
    Route::get('/admin_user_all', fn() => view('admin_crud.admin_crud_estudiantes.admin_user_all'))->name('admin_user_all');
    Route::get('/admin_crud_estudiante', fn() => view('admin_crud.admin_crud_estudiantes.admin_crud_estudiante'))->name('admin_crud_estudiante');

    // Ruta: Mostrar formulario para crear un nuevo estudiante
    Route::get('/admin_add_estudiante', [EstudianteController::class, 'create'])->name('admin_add_estudiante');
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
    // Rutas para el módulo de gestión de actividades
    Route::get('/admin_ver_actividades', fn() => view('admin_crud.admin_crud_actividades.admin_ver_actividades'))->name('admin_ver_actividades');
    Route::get('/admin_add_actividades', fn() => view('admin_crud.admin_crud_actividades.admin_add_actividades'))->name('admin_add_actividades');
    Route::get('/admin_editar_actividades', fn() => view('admin_crud.admin_crud_actividades.admin_editar_actividades'))->name('admin_editar_actividades');
    //Route::get('/gestion_actividades/agregar', [AdminController::class, '   agregarActividad'])->name('agregar_actividad');
    //Route::post('/gestion_actividades/guardar', [AdminController::class, '  guardarActividad'])->name('guardar_actividad');
    //Route::get('/gestion_actividades/editar/{id}', [AdminController::class, 'editarActividad'])->name('editar_actividad');
    //Route::get('/gestion_actividades/eliminar/{id}', [AdminController::class, 'eliminarActividad'])->name('eliminar_actividad');


});

// =====================================================================================================



// Ruta Estudiante
Route::middleware(['auth', 'rol:1,3'])->prefix('estudiante')->group(function () {
    Route::get('/dashboard_estudiante', fn() => view('estudiante.dashboard_estudiante'))->name('dashboard_estudiante');
    Route::get('/perfil', fn() => view('estudiante.perfil'))->name('perfil');
    Route::get('/info_personal', fn() => view('estudiante.info_personal'))->name('info_personal');

    Route::get('/actividades', fn() => view('estudiante.actividades.actividades'))->name('actividades');
    Route::get('/cursos', fn() => view('estudiante.cursos.cursos'))->name('cursos');
    Route::get('/estudiante_profesor', fn() => view('estudiante.asignatura.estudiante_profesor'))->name('estudiante_profesor');
    Route::get('/encuesta', fn() => view('estudiante.encuestas.encuesta'))->name('encuesta');
    Route::get('/calificaciones', fn() => view('estudiante.calificaciones.calificaciones'))->name('calificaciones');


});

// =====================================================================================================
// Ruta de email mensajeria
Route::middleware(['auth', 'rol:1,2,3'])->prefix('mensajes')->group(function () {
    Route::get('/correo', [MensajeController::class, 'bandejaEntrada'])->name('mensajes.bandeja');
    Route::get('/mensajes/redactar', [MensajeController::class, 'redactar'])->name('mensajes.redactar');
    Route::post('/mensajes/enviar', [MensajeController::class, 'enviar'])->name('mensajes.enviar');
    Route::get('/mensaje/{id}', [MensajeController::class, 'ver'])->name('mensajes.ver');

});






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

Route::get('/importar-docentes', [DocenteImportController::class, 'show'])->name('importar.docentes.form');
Route::post('/importar-docentes', [DocenteImportController::class, 'import'])->name('importar.docentes');

Route::get('/exportar-docentes', function () {
    return Excel::download(new DocentesExport, 'docentes.xlsx');
})->middleware('auth')->name('exportar.docentes');