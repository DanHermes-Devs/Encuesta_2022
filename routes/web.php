<?php

use App\Registro;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/resultados/{token}', 'RegistroController@resultados')->name('resultados');
Route::get('/graficas', 'CalificacionesController@index')->name('Calificaciones');



Route::post('/registroDatos', 'RegistroController@registroDatos')->name('registro.datos');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    // Rutas para el dashboard
    Route::get('/admin', 'HomeController@index')->name('admin');

    // Rutas para empresas
    Route::get('/empresas', 'EmpresasController@index')->name('empresas');
    Route::post('/empresas/store', 'EmpresasController@store')->name('empresas.store');

    // Rutas para reportes
    Route::get('/reportes', 'ReportesController@index')->name('reportes');
    
    // Rutas para graficas
    Route::get('/graficas', 'GraficasController@index')->name('graficas');
});
