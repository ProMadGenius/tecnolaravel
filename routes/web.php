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
Route::resource('/admin/gestionarencuesta','EncuestaController');

Route::get('/admin/gestionarresultado','ResultadoController@index');
Route::get('/admin/gestionarresultado/{idencuesta}','ResultadoController@show');
Route::get('/admin/gestionarresultado/{idencuesta}/{idusuario}','ResultadoController@detalle');

Route::get('/admin/gestionarmiencuesta','MiEncuestaController@index');
