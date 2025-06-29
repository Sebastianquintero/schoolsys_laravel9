<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EstudianteImportController;

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
Route::get('/recuperacion', function () { return view('login.recuperacion_password');})->name('recuperacion_password');

// Ruta protegida: página de bienvenida
Route::get('/welcome', function () {
    return view('login.welcome');
})->name('welcome')->middleware('auth');



// ====================================================================================================
//Ruta Modulo de Comunicacion administrador
Route::middleware(['auth', 'rol:1'])->group(function () {
    Route::get('/admin',[AdminController::class, 'verEstudiantes'])->name('admin');

    // Comunicaciones del admin
    Route::get('/comunica_admin', fn() => view('modulo_comunicacion.comunica_admin.comunica_admin'))->name('comunica_admin');
    Route::get('/comunica_add_admin', fn() => view('modulo_comunicacion.comunica_admin.comunica_add_admin'))->name('comunica_add_admin');
    Route::get('/comunica_config_admin', fn() => view('modulo_comunicacion.comunica_admin.comunica_config_admin'))->name('comunica_config_admin');


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


