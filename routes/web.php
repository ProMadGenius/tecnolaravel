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
//ENCUESTA REGISTRAR EMAIL
Route::post('/admin/gestionar/encuesta/registrarencuesta','EncuestaController@registrarEncuesta');

Route::resource('/admin/gestionarindicador','IndicadorController');

Route::resource('/admin/gestionarresultado','ResultadoController');

Route::get('/admin/gestionarresultado/{idencuesta}','ResultadoController@show');
Route::get('/admin/gestionarresultado/{idencuesta}/{idusuario}','ResultadoController@detalle');

//Privilegios Route
Route::get('/admin/gestionarprivilegio','PrivilegioController@index')->name('gestionarprivilegio.index');;
Route::get('/admin/gestionarprivilegio/{idtipousuario}','PrivilegioController@show')->name('gestionarprivilegio.show');;
Route::post('/admin/gestionarprivilegio','PrivilegioController@update')->name('gestionarprivilegio.update');



Route::resource('/admin/gestionarmiencuesta','MiEncuestaController');
