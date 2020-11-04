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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/jugadores','GameController@players');
Route::post('/jugadores','GameController@storeplay');
Route::get('/partidas','GameController@savegames');
Route::get('/juego',["as" => "gameplay", "uses" => "GameController@tablero"]);
Route::post('/juego','GameController@playing');

Route::get('/conexion','ConexionController@conexionTabla');
Route::post('/conexion','ConexionController@buscarCaminos');

Route::get('/conexionall',["as" => "conexionall", "uses" => "ConexionController@todosLosCaminos"]);

