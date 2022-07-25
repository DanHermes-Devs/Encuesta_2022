<?php



// define('STDIN',fopen("php://stdin","r"));

use App\Registro;

use App\Exports\RegistroExport;

use Maatwebsite\Excel\Facades\Excel;

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

// Hacer publica la ruta de almacenamiento
Route::get('/storage_link', function() {

    Artisan::call('storage:link');

});

// Iseed para las tablas que ya tienen datos
Route::get('/table_iseed', function() { 
    Artisan::call('iseed empresas'); 
    Artisan::call('iseed registros'); 
    Artisan::call('iseed calificaciones'); 
});

// Fresh y almcaenamiento de la base de datos
Route::get('/fresh_db', function() {

    Artisan::call('migrate:fresh --seed');

});

Route::get('/agradecimientos', function() {

    return view('agradecimientos');

});


// Vaciar cache
Route::get('cache_clear', function() {

    Artisan::call('cache:clear');

    Artisan::call('config:cache');

    Artisan::call('config:clear');

});


Route::get('/', function () {

    return view('auth.login');

});

Route::get('/empresa/{token}', 'RegistroController@index')->name('inicio');


Route::post('/registroDatos', 'RegistroController@registroDatos')->name('registro.datos');



// Ruta para guardar datos de la empresa

Route::get('/graficas_grafica', 'CalificacionesController@index')->name('Calificaciones');



Auth::routes();


Route::get('/resultados/{token}', 'RegistroController@resultados')->name('resultados');

Route::group(['middleware' => 'auth'], function () {

    // Rutas para el dashboard

    Route::get('/admin', 'HomeController@index')->name('admin');

    // Configuraciones
    Route::get('/configuraciones', 'ConfiguracionController@index')->name('configuraciones.index');
    Route::put('/configuraciones/{id}', 'ConfiguracionController@update')->name('configuraciones.update');



    // Rutas para registros

    Route::get('/registros', 'RegistroController@registroAdmin')->name('registro.index');

    Route::get('/registros/export/{id}', 'RegistroController@export')->name('registro.export');

    Route::get('/registro/delete/{id}', 'RegistroController@delete')->name('registro.delete');



    // Rutas para empresas

    Route::get('/empresas', 'EmpresasController@index')->name('empresas');

    Route::post('/empresas/store', 'EmpresasController@store')->name('empresas.store');

    Route::get('/empresas/delete/{id}', 'EmpresasController@destroy')->name('empresas.destroy');

    Route::get('/edit-company/{id}/edit', 'EmpresasController@edit')->name('empresas.edit');

    Route::put('/edit-company/{id}', 'EmpresasController@update')->name('empresas.update');

    Route::get('/empresas/{id}/graficas', 'EmpresasController@getGraficas')->name('empresas.getGraficas');



    // Rutas para reportes

    Route::get('/reportes', 'ReportesController@index')->name('reportes');

    

    // Rutas para graficas

    Route::get('/graficas', 'GraficasController@index')->name('graficas');
    Route::get('/graficas/empresa/{id}', 'GraficasController@filtrarEmpresa')->name('graficas.empresa');
    Route::get('/graficas/empresas', 'GraficasController@empresas')->name('graficas.empresa');



    // Rutas para aviso de privacidad

    Route::get('/aviso-privacidad', 'AvisoPrivacidadController@index')->name('aviso-privacidad');

    Route::get('/aviso-privacidad/mostrar', 'AvisoPrivacidadController@mostrarAviso')->name('aviso-privacidad.mostrarAviso');

    Route::put('update-aviso/{id}', 'AvisoPrivacidadController@update')->name('aviso-privacidad.update');


});

