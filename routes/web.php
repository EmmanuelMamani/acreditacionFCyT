<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\carreraController;
use App\Http\Controllers\areaController;
use App\Http\Controllers\indicadorController;
use App\Http\Controllers\variableController;
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

Route::get('/menu_admin', function () {
    return view('menu_admin');
});
Route::get('/reporte_usuarios', function () {
    return view('reporte_usuarios');
});
Route::get('/detalle_area', function () {
    return view('detalle_area');
});
Route::get('/detalle_variable', function () {
    return view('detalle_variable');
});
Route::get('/detalle_indicador', function () {
    return view('detalle_indicador');
});
Route::get('/reporte_roles', function () {
    return view('reporte_roles');
});
Route::get('/permisos', function () {
    return view('permisos');
});
Route::get('/reporte_gestiones', function () {
    return view('reporte_gestiones');
});
/*Route::get('/reporte_areas', function () {
    return view('reporte_areas');
});*/
Route::get('/calificar', function () {
    return view('calificar');
});
Route::get('/calificar_area', function () {
    return view('calificar_area');
});

Route::get('/reporte_carreras', function () {
    return view('reporte_carreras');
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

/*--------------------------------Areas----------------------------------- */

Route::get('/reporte_areas',[areaController::class,'reporte_areas'])->name("reporte_areas");
Route::post('/registro_area',[areaController::class,'registro'])->name('registro_area');
Route::post('/eliminar_area/{id}',[areaController::class,'eliminar_area'])->name('eliminar_area');
/*-------------------------------------------------------------------------*/

/*--------------------------------Variables----------------------------------- */
Route::get('/reporte_variables',[variableController::class,'reporte_variables'])->name("reporte_variables");
Route::post('/registro_variable',[variableController::class,'registro'])->name('registro_variable');
Route::post('/eliminar_variable/{id}',[variableController::class,'eliminar_variable'])->name('eliminar_variable');
/*-------------------------------------------------------------------------*/


/*--------------------------------Indicadores----------------------------------- */
Route::get('/reporte_indicadores',[indicadorController::class,'reporte_indicadores'])->name("reporte_indicadores");
Route::post('/registro_indicador',[indicadorController::class,'registro'])->name('registro_indicador');
Route::post('/eliminar_indicador/{id}',[indicadorController::class,'eliminar_indicador'])->name('eliminar_indicador');




/*-------------------------------------------------------------------------*/