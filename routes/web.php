<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\carreraController;

use App\Http\Controllers\areaController;
use App\Http\Controllers\indicadorController;
use App\Http\Controllers\variableController;
use App\Http\Controllers\rolController;
use App\Http\Controllers\gestionController;
use App\Http\Controllers\calificarController;
use App\Http\Controllers\permisoController;

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
Route::get('/menu_admin',[userController::class,'menu_admin'])->name('menu_admin');
Route::get('/detalle_area', function () {
    return view('detalle_area');
});
Route::get('/detalle_variable', function () {
    return view('detalle_variable');
});
Route::get('/detalle_indicador', function () {
    return view('detalle_indicador');
});


/********************************Permisos ***********************/
Route::get('/reporte_permisos',[permisoController::class,'reporte'] )->name('reporte_permisos');
Route::post('/registrar_permiso',[permisoController::class,'registrar'])->name('registrar_permiso');
Route::get('/reporte_permiso_rol',[permisoController::class,'reporte_permiso_rol'])->name('reporte_permiso_rol');
Route::post('asignar_permiso',[permisoController::class,'asignar_permiso'])->name('asignar_permiso');
Route::post('/eliminar_asignacion/{id}',[permisoController::class,'eliminar_asignacion'])->name('eliminar_asignacion');
Route::post('/eliminar_permiso/{id}',[permisoController::class,'eliminar_permiso'])->name('eliminar_permiso');
/*-------------------------------Calificacion------------------ */
Route::get('/calificacion',[calificarController::class,'reporte'])->name('calificacion');
Route::get('/ver_calificar_area/{id}',[calificarController::class,'ver_calificar_area'])->name('ver_calificar_area');
Route::post('/calificar/{id}/{id_area}',[calificarController::class,'calificar'])->name('calificar');
/*-------------------------------------------------------------------*/
/**--------------------------------login ----------------------**/
Route::post('/',[userController::class,'autentificacion'])->name('login');
Route::get('/logout',[userController::class,'logout'])->name('logout');
Route::get('/', function () {return view('login');})->name('login');
/*----------------------------------------------------------------- */

/*-----------------------------menu-superadmin---------------------*/
Route::get('/menu_superadmin', [userController::class,'menu_superadmin'])->name("menu_superadmin");
/*------------------------------------------------------------------*/
/*---------------------------------carreras-------------------------- */
Route::get('/reporte_carreras',[carreraController::class,'reporte_carreras'])->name("reporte_carreras");
Route::post('/registro_carrera',[carreraController::class,'registro'])->name('registro_carrera');
Route::post('/eliminar_carrera/{id}',[carreraController::class,'eliminar_carrera'])->name('eliminar_carrera');
Route::post('/editar_carrera/{id}',[carreraController::class,'editar_carrera'])->name('editar_carrera');
/*-------------------------------------------------------------------------*/


/*--------------------------------Areas----------------------------------- */

Route::get('/reporte_areas',[areaController::class,'reporte_areas'])->name("reporte_areas");
Route::post('/registro_area',[areaController::class,'registro'])->name('registro_area');
Route::post('/editar_area/{id}',[areaController::class,'editar_area'])->name('editar_area');
Route::post('/eliminar_area/{id}',[areaController::class,'eliminar_area'])->name('eliminar_area');
/*-------------------------------------------------------------------------*/

/*--------------------------------Variables----------------------------------- */
Route::get('/reporte_variables/{id}',[variableController::class,'reporte_variables'])->name("reporte_variables");
Route::post('/registro_variable/{id}',[variableController::class,'registro'])->name('registro_variable');
Route::post('/editar_variable/{id}',[variableController::class,'editar_variable'])->name('editar_variable');
Route::post('/eliminar_variable/{id}',[variableController::class,'eliminar_variable'])->name('eliminar_variable');
/*-----------------------------------------------------------------------------*/


/*--------------------------------Indicadores----------------------------------- */
Route::get('/reporte_indicadores/{id}',[indicadorController::class,'reporte_indicadores'])->name("reporte_indicadores");
Route::post('/registro_indicador/{id}',[indicadorController::class,'registro'])->name('registro_indicador');
Route::post('/editar_indicador/{id}',[indicadorController::class,'editar_indicador'])->name('editar_indicador');
Route::post('/eliminar_indicador/{id}',[indicadorController::class,'eliminar_indicador'])->name('eliminar_indicador');

/*-------------------------------------------------------------------------*/

/*--------------------------------Archivos----------------------------------- */
Route::get('/reporte_archivos/{id}',[archivoController::class,'reporte_archivos'])->name("reporte_archivos");
Route::post('/registro_indicador/{id}',[indicadorController::class,'registro'])->name('registro_indicador');
Route::post('/editar_indicador/{id}',[indicadorController::class,'editar_indicador'])->name('editar_indicador');
Route::post('/eliminar_indicador/{id}',[indicadorController::class,'eliminar_indicador'])->name('eliminar_indicador');

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

