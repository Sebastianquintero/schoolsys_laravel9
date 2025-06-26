<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/index', function () {
    return view('inicio.index'); })->name('index');
Route::get('/about', function () {
    return view('inicio.about'); })->name('about');

Route::get('/contact', function () {
    return view('inicio.contact'); })->name('contact');

Route::get('/feature', function () {
    return view('inicio.feature');})->name('feature');

Route::get('/feature2', function () {
    return view('inicio.feature2');})->name('feature2');

Route::get('/feature3', function () {
    return view('inicio.feature3');})->name('feature3');

// Login
Route::get('/login', function () {
    return view('login.iniciar_sesion');})->name('login');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Ruta protegida: página de bienvenida
Route::get('/welcome', function () {
    return view('login.welcome'); })->name('welcome')->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Ruta Modulo de Comunicacion 
Route::get('/comunica_admin', function () {
    return view('modulo_comunicacion.comunica_admin.comunica_admin');})->name('comunica_admin');

Route::get('/comunica_add_admin', function () {
    return view('modulo_comunicacion.comunica_admin.comunica_add_admin');})->name('comunica_add_admin');

Route::get('/comunica_config_admin', function () {
    return view('modulo_comunicacion.comunica_admin.comunica_config_admin');})->name('comunica_config_admin');

Route::get('/dashboard_estudiante', function () {
    return view('estudiante.dashboard_estudiante');})->name('dashboard_estudiante');

Route::get('/perfil', function () {
    return view('estudiante.perfil');})->name('perfil');

Route::get('/info_personal', function () {
    return view('estudiante.info_personal');})->name('info_personal');

Route::get('/actividades', function () {
    return view('estudiante.actividades.actividades');})->name('actividades');

Route::get('/cursos', function () {
    return view('estudiante.cursos.cursos');})->name('cursos');

Route::get('/estudiante_profesor', function () {
    return view('estudiante.asignatura.estudiante_profesor');})->name('estudiante_profesor');

Route::get('/encuesta', function () {
    return view('estudiante.encuestas.encuesta');})->name('encuesta');

Route::get('/calificaciones', function () {
    return view('estudiante.calificaciones.calificaciones');})->name('calificaciones');

Route::get('/mail', function () {
    return view('modulo_comunicacion.mail');})->name('mail');

Route::get('/admin', function () {
    return view('admin_crud.admin');})->name('admin');