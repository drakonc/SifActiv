<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsuarioController;

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

//Roles
Route::get('/roles',[RoleController::class,'ObtenerTodoActivo'])->name('roles.listar');
Route::get('/roles/GetCearRole',[RoleController::class,'GetCearRole'])->name('roles.crear');
Route::post('/roles/PostCearRole',[RoleController::class,'PostCearRole'])->name('roles.store');
Route::get('/roles/{id}/GetEditRole',[RoleController::class,'GetEditRole'])->name('roles.editar');
Route::post('/roles/{id}/PostEditRole',[RoleController::class,'PostEditRole'])->name('roles.update');
Route::get('/roles/{id}/GetEliminarRole',[RoleController::class,'GetEliminarRole'])->name('roles.eliminar');

//Usuarios
Route::get('/usuarios',[UsuarioController::class,'ObtenerTodoActivo'])->name('usuarios.listar');
Route::get('/usuarios/GetCearUsuarios',[UsuarioController::class,'GetCearUsuarios'])->name('usuarios.crear');