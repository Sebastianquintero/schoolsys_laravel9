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



