<?php

use App\Http\Controllers\CreateAccountController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Http\Middleware\CheckEmployeeRole;
use App\Http\Middleware\CheckUserRole;
use App\Models\Role;
use Illuminate\Support\Facades\Route;

/*Pagina principal */
Route::get('/recursos-b', [WelcomeController::class, 'index'])->name('welcome');

/*Pagina principal pero tomando en cuenta la autenticacion */
Route::get('/recursos-b', [WelcomeController::class, 'index'])
    ->middleware(['auth']);

/*Todos los metodos necesarios para la creacion de cuenta del usuario*/
Route::controller(CreateAccountController::class)->group(function () {
    Route::get('/registrarte', 'index')->name('create-account');
    Route::post('/registrarte', 'store')->name('create-account');
});

/*Todos los metodos necesarios para el login para cualquier rol (Admin, empleado y usuario) */
Route::controller(LoginController::class)->group(function () {
    Route::get('/iniciar-sesion', 'index')->name('login');
    Route::post('/iniciar-sesion', 'login');
    Route::post('/logout', 'logout');
});

/* Todos los metodos necesarios para la configuracion del autenticado */
Route::controller(ConfigurationController::class)->group((function () {
    Route::get('/configuracion',  'index')->middleware(['auth', CheckUserRole::class])->name('configuration');
    Route::put('/configuracion-actualizar-datos',  'update');
    Route::put('/configuracion-cambiar-clave',  'updatePassword')->name('config-changes-password');
}));



Route::get('/tambien', function () {
    $roles = Role::find(2);
    return $roles->users()->get();
});

