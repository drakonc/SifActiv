<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;

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

Route::get('/roles',[RoleController::class,'ObtenerTodoActivo'])->name('roles.listar');
Route::get('/roles/GetCearRole',[RoleController::class,'GetCearRole'])->name('roles.crear');
Route::post('/roles/PostCearRole',[RoleController::class,'PostCearRole'])->name('roles.store');