<?php

use App\Http\Controllers\CreateAccountController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/recursos-b', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/iniciar-sesion', [LoginController::class, 'index'])->name('login');
Route::post('/iniciar-sesion', [LoginController::class, 'login']);
Route::get('/registrarte', [CreateAccountController::class, 'index'])->name('create-account');
Route::post('/registrarte', [CreateAccountController::class, 'store'])->name('create-account');


Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/create-rol', [RoleController::class, 'index']);
Route::get('/create-account', [UserController::class, 'index']);

Route::get('/dashboard', function () {
    return 'hola';// Crea esta vista si no la tienes
})->middleware('auth');
/**
 * Route::post('/create-account', [UserController::class, 'store'])->name('create-account');

 */
