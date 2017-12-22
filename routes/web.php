<?php

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
    /*$users= \App\User::inRandomOrder()
        ->where('idfacultad',1)
        ->get();
    return $users;*/
    return view('welcome');
});

//Route::get()



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/admin/gestionarmodelo','ModeloController');
Route::resource('/admin/gestionarfacultad','FacultadController');
Route::resource('/admin/gestionartipousuario','TipoUsuarioController');
Route::resource('/admin/gestionarusuario','UsuarioController');
Route::resource('/admin/gestionarencuesta','EncuestaController');
Route::resource('/admin/gestionarindicador','IndicadorController');

Route::resource('/admin/gestionarresultado','ResultadoController');

Route::get('/admin/gestionarresultado/{idencuesta}','ResultadoController@show');
Route::get('/admin/gestionarresultado/niveles/{idencuesta}','ResultadoController@niveles');
Route::get('/admin/gestionarresultado/{idencuesta}/{idusuario}','ResultadoController@detalle');

//Privilegios Route
Route::get('/admin/gestionarprivilegio','PrivilegioController@index')->name('gestionarprivilegio.index');;
Route::get('/admin/gestionarprivilegio/{idtipousuario}','PrivilegioController@show')->name('gestionarprivilegio.show');;
Route::post('/admin/gestionarprivilegio','PrivilegioController@update')->name('gestionarprivilegio.update');



Route::resource('/admin/gestionarmiencuesta','MiEncuestaController');

Route::resource('/admin/gestionarestadistica','ChartController');


Route::get('/admin/gestionargrafico/si/{idencuesta}','ResultadoController@showgrafico');
Route::get('/admin/gestionargrafico/no/{idencuesta}','ResultadoController@showgraficoN');


Route::get('/admin/gestionargrafico/yes/{idencuesta}/{idusuario}','ResultadoController@detallegrafico');
Route::get('/admin/gestionargrafico/no/{idencuesta}/{idusuario}','ResultadoController@detallegraficoN');


Route::get('/admin/gestionarreporte',function (){

    global $users;
    $users= App\User::all();
    $pdf = PDF::loadView('vista', compact('users'))->setPaper('a4','landscape');
    return $pdf->download('ReporteUsuarios.pdf');
});

Route::get('/home/reporteencuesta',function (){

    global $users;
    $users= App\Encuesta::all();
    $pdf = PDF::loadView('reporteencuesta', compact('users'))->setPaper('a4','landscape');

    return $pdf->download('ReporteEncuestas.pdf');
});