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

// INICIO
Route::get('/', function () {
    return view('welcome');
});

//Route::get('/inicio');

// HOME
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@shuffle')->name('home');

// ACTORES
Route::get('/actores', 'actoresController@listado')->name('actores');

//GENEROS
Route::get('/listadoGeneros', 'generosController@listado')->name('listadoGeneros');

// PELICULAS
Route::get('/titulos', 'peliculasController@listado')->name('titulos');
Route::get('/pelicula/{id}', 'peliculasController@detalle');
Route::get('/resultados', 'peliculasController@buscar')->name('resultados'); //-------------> NO FUNCIONA
Route::get('/editar', 'peliculasController@editar')->middleware('admin:admin');
//Route::get('/peliculas/top', 'peliculasController@top');

// AGREGAR PELICULA
Route::get('/agregarPelicula', function(){
  return view("agregarPelicula");
});
Route::post('/agregarPelicula', 'peliculasController@agregar');

// BORRAR PELICULA
Route::post('/borrarPelicula', 'peliculasController@borrar');
