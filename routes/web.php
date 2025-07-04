<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EstudianteImportController;
use App\Http\Controllers\PasswordResetController;
use App\Exports\EstudiantesExport;
use Maatwebsite\Excel\Facades\Excel;



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
    return view('login.recuperacion_password'); })->name('recuperacion_password');

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
//Ruta Modulo de Comunicacion administrador
Route::middleware(['auth', 'rol:1'])->prefix('admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'verEstudiantes'])->name('admin');

    // Comunicaciones del admin
    Route::get('/comunica_admin', fn() => view('modulo_comunicacion.comunica_admin.comunica_admin'))->name('comunica_admin');
    Route::get('/comunica_add_admin', fn() => view('modulo_comunicacion.comunica_admin.comunica_add_admin'))->name('comunica_add_admin');
    Route::get('/comunica_config_admin', fn() => view('modulo_comunicacion.comunica_admin.comunica_config_admin'))->name('comunica_config_admin');

    // Rutas para el módulo de gestión de estudiantes
    Route::get('/crud_ver_curso', fn() => view('admin_crud.admin_crud_cursos.crud_ver_curso'))->name('crud_ver_curso');
    Route::get('/admin_add_curso', fn() => view('admin_crud.admin_crud_cursos.admin_add_curso'))->name('admin_add_curso');

    // Rutas para el módulo de gestión de profesores

    Route::get('/admin_crud_profesor', fn() => view('admin_crud.admin_crud_profesores.admin_crud_profesor'))->name('admin_crud_profesor');
    Route::get('/admin_add_profesor', fn() => view('admin_crud.admin_crud_profesores.admin_add_profesor'))->name('admin_add_profesor');
    Route::get('/admin_edit_profesor', fn() => view('admin_crud.admin_crud_profesores.admin_edit_profesor'))->name('admin_edit_profesor');
    // Rutas para el módulo de gestión de profesores
    /*Route::get('/gestion_profesores', [AdminController::class, 'gestionProfesores'])->name('gestion_profesores');
    Route::get('/gestion_profesores/agregar', [AdminController::class, 'agregarProfesor'])->name('agregar_profesor');
    Route::post('/gestion_profesores/guardar', [AdminController::class, 'guardarProfesor'])->name('guardar_profesor');
    Route::get('/gestion_profesores/editar/{id}', [AdminController::class   , 'editarProfesor'])->name('editar_profesor');

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

    Route::get('/mail', fn() => view('modulo_comunicacion.mail'))->name('mail');
});


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
