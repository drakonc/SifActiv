<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ConnectConrtoller;

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

//Roles
Route::prefix('roles')->group(function(){
    Route::get('/',[RoleController::class,'ObtenerTodoActivo'])->name('roles.listar');
    Route::get('/GetCearRole',[RoleController::class,'GetCearRole'])->name('roles.crear');
    Route::post('/PostCearRole',[RoleController::class,'PostCearRole'])->name('roles.store');
    Route::get('/{id}/GetEditRole',[RoleController::class,'GetEditRole'])->name('roles.editar');
    Route::post('/{id}/PostEditRole',[RoleController::class,'PostEditRole'])->name('roles.update');
    Route::get('/{id}/GetEliminarRole',[RoleController::class,'GetEliminarRole'])->name('roles.eliminar');
});

//Usuarios
Route::prefix('usuarios')->group(function(){
    Route::get('/',[UsuarioController::class,'ObtenerTodoActivo'])->name('usuarios.listar');
    Route::get('/GetCearUsuarios',[UsuarioController::class,'GetCearUsuarios'])->name('usuarios.crear');
    Route::post('/PostCearUsuarios',[UsuarioController::class,'PostCearUsuarios'])->name('usuarios.store');
});