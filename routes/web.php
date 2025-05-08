<?php

use App\Http\Controllers\AdminEmployeeController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CreateAccountController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeleteAccountController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Http\Middleware\CheckAdminRole;
use App\Http\Middleware\CheckEmployeeRole;
use App\Http\Middleware\CheckUserRole;
use App\Models\Role;
use Illuminate\Support\Facades\Route;


// Página principal
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// Página principal (requiere autenticación)
Route::get('/recursos-b', [WelcomeController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard'); // Cambié el nombre a algo más descriptivo

// Rutas para la creación de cuenta
Route::controller(CreateAccountController::class)->group(function () {
    Route::get('/registrarte', 'index')->name('register');  
    Route::post('/registrarte', 'store')->name('register.store');  
});

// Rutas para la autenticación (login y logout)
Route::controller(LoginController::class)->group(function () {
    Route::get('/iniciar-sesion', 'index')->name('login');
    Route::post('/iniciar-sesion', 'attempt')->name('login.attempt');  
    Route::post('/logout', 'logout')->name('logout');
});

// Rutas para la configuración del usuario autenticado
Route::controller(ConfigurationController::class)->middleware(['auth'])->group(function () {
    Route::get('/configuracion', 'index')->name('configuration.index');
    Route::put('/configuracion/actualizar-datos', 'update')->name('configuration.update');  
    Route::put('/configuracion/cambiar-clave', 'updatePassword')->name('configuration.password');  
});

// Rutas para la configuración del usuario autenticado
Route::controller(ConfigurationController::class)->middleware(['auth'])->group(function () {
    Route::get('/configuracion', 'index')->name('configuration');
    Route::put('/configuracion/actualizar-datos', 'update')->name('configuration.update');  
    Route::put('/configuracion/cambiar-clave', 'updatePassword')->name('configuration.password');  
});

Route::controller(DeleteAccountController::class)->middleware(['auth', CheckUserRole::class, CheckEmployeeRole::class])->group(function () {
    Route::get('/eliminar-cuenta', 'index')->name('delete-account');;  
});


Route::get('panel-control', [DashboardController::class, 'index'])
->middleware(['auth', CheckAdminRole::class])
->name('dashboard');
 


Route::controller(AdminEmployeeController::class)->middleware(['auth', CheckAdminRole::class])->group(function(){
    Route::post('usuarios/create', 'store')->middleware(['auth', CheckAdminRole::class])->name('employee.store');
    Route::get('usuarios/create',  'create')->middleware(['auth', CheckAdminRole::class])->name('employee.create-account');
    Route::get('usuarios/{usuario}/editar', 'edit')->middleware(['auth', CheckAdminRole::class])->name('');
    Route::put('usuarios/{usuario}/editar', 'update')->middleware(['auth', CheckAdminRole::class])->name('')->name('employee.update');
});


 
