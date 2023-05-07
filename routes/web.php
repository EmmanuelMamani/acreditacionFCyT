<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\carreraController;
use App\Http\Controllers\rolController;
use App\Http\Controllers\gestionController;
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
Route::get('/menu_admin',function(){return view('menu_admin');});
Route::get('/detalle_area', function () {
    return view('detalle_area');
});
Route::get('/detalle_variable', function () {
    return view('detalle_variable');
});
Route::get('/detalle_indicador', function () {
    return view('detalle_indicador');
});
Route::get('/permisos', function () {
    return view('permisos');
});
Route::get('/reporte_areas', function () {
    return view('reporte_areas');
});
Route::get('/calificar', function () {
    return view('calificar');
});
Route::get('/calificar_area', function () {
    return view('calificar_area');
});
/**--------------------------------login ----------------------**/
Route::post('/',[userController::class,'autentificacion'])->name('login');
Route::get('/logout',[userController::class,'logout'])->name('logout');
Route::get('/', function () {return view('login');})->name('login');
/*----------------------------------------------------------------- */

/*-----------------------------menu-superadmin---------------------*/
Route::get('/menu_superadmin', function () {return view('menu_superadmin');})->name("menu_superadmin");
/*------------------------------------------------------------------*/
/*---------------------------------carreras-------------------------- */
Route::get('/reporte_carreras',[carreraController::class,'reporte_carreras'])->name("reporte_carreras");
Route::post('/registro_carrera',[carreraController::class,'registro'])->name('registro_carrera');
Route::post('/eliminar_carrera/{id}',[carreraController::class,'eliminar_carrera'])->name('eliminar_carrera');
Route::post('/editar_carrera/{id}',[carreraController::class,'editar_carrera'])->name('editar_carrera');
/*-------------------------------------------------------------------------*/
/*********************************Usuarios************************************/
Route::get('/reporte_usuarios',[userController::class,'reporte_usuarios'])->name("reporte_usuarios");
Route::get('/reporte_usuarios_carrera',[userController::class,'reporte_usuarios_carrera'])->name("reporte_usuarios_carrera");
Route::post('/registro_usuario',[userController::class,'registrar'])->name("registro_usuario");
Route::post('/eliminar_usuario/{id}',[userController::class,'eliminar'])->name("eliminar_usuario");
Route::post('/editar_usuario/{id}',[userController::class,'editar'])->name("editar_usuario");

/*********************************roles*****************************************/
Route::get('/reporte_roles',[rolController::class,'reporte'])->name("reporte_roles");
Route::post('/registro_rol',[rolController::class,'registrar'])->name("registro_rol");
Route::post('/eliminar_rol/{id}',[rolController::class,'eliminar'])->name("eliminar_rol");
/******************************gestiones****************************************/
Route::get('/reporte_gestiones',[gestionController::class,'reporte'])->name("reporte_gestiones");
Route::post('/registro_gestion',[gestionController::class,'registrar'])->name("registro_gestion");
Route::post('/activar_gestion/{id}',[gestionController::class,'activar'])->name("activar_gestion");
