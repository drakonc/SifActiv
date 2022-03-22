<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ConnectConrtoller;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Ruta Logeo
Route::get('/login',[ConnectConrtoller::class,'GetLogin'])->name('getlogin');
Route::post('/login',[ConnectConrtoller::class,'PostLogin'])->name('postlogin');
Route::get('/logout',[ConnectConrtoller::class,'GetLogout'])->name('getlogout');

Route::get('/',[DashboardController::class,'getHome'])->name('VerDashboard');

//Roles
Route::prefix('roles')->group(function(){
    Route::get('/',[RoleController::class,'ObtenerTodoActivo'])->name('rolesListar');
    Route::get('/GetCearRole',[RoleController::class,'GetCearRole'])->name('rolesCrear');
    Route::post('/PostCearRole',[RoleController::class,'PostCearRole'])->name('rolesCrear');
    Route::get('/{id}/GetEditRole',[RoleController::class,'GetEditRole'])->name('rolesEditar');
    Route::post('/{id}/PostEditRole',[RoleController::class,'PostEditRole'])->name('rolesEditar');
    Route::get('/{id}/GetEliminarRole',[RoleController::class,'GetEliminarRole'])->name('rolesEliminar');
});

//Usuarios
Route::prefix('usuarios')->group(function(){
    Route::get('/',[UsuarioController::class,'ObtenerTodoActivo'])->name('usuariosListar');
    Route::get('/GetCearUsuarios',[UsuarioController::class,'GetCearUsuarios'])->name('usuariosCrear');
    Route::post('/PostCearUsuarios',[UsuarioController::class,'PostCearUsuarios'])->name('usuariosCrear');
});