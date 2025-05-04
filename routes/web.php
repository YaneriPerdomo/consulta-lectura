<?php

use App\Http\Controllers\CreateAccountController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Http\Middleware\CheckEmployeeRole;
use App\Models\Role;
use Illuminate\Support\Facades\Route;


Route::get('/recursos-b', [WelcomeController::class, 'index'])
->middleware(['auth', CheckEmployeeRole::class]);


Route::get('/recursos-b', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/iniciar-sesion', [LoginController::class, 'index'])->name('login');
Route::post('/iniciar-sesion', [LoginController::class, 'login']);
Route::get('/registrarte', [CreateAccountController::class, 'index'])->name('create-account');
Route::post('/registrarte', [CreateAccountController::class, 'store'])->name('create-account');


Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/create-rol', [RoleController::class, 'index']);
Route::get('/create-account', [UserController::class, 'index']);


Route::get('/tambien', function () {
    $roles = Role::find(2);
    return $roles->users()->get();
});

Route::get('/dashboard', function () {
    return view('probando'); // Crea esta vista si no la tienes
})->middleware('auth');

