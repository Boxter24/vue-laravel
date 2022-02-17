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
    return view('welcome');
});

Auth::routes();

Route::resource('/estado', 'EstadoController')->middleware('auth');
Route::resource('/pais', 'PaisController')->middleware('auth');
Route::resource('/usuario', 'UsuarioController')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');


//Route::get("/usuarios","UsuariosController@index") -> name("usuarios");
