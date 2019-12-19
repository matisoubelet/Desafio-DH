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

//LOGOUT
Route::get("/logout", "logoutController@logout");

// HOME
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@shuffleUltimas')->name('home');
//Route::get('/home', 'HomeController@ultimas')->name('home');

// ACTORES
Route::get('/actores', 'actoresController@listado')->name('actores');

//GENEROS
Route::get('/listadoGeneros', 'generosController@listado')->name('listadoGeneros');

// PELICULAS
Route::get('/titulos', 'peliculasController@listado')->name('titulos');
Route::get('/pelicula/{id}', 'peliculasController@detalle');
Route::get('/resultados', 'peliculasController@buscar')->name('resultados');
//Route::get('/api', 'peliculasController@listadoAPI');
//Route::get('/peliculas/top', 'peliculasController@top');

// AGREGAR PELICULA
Route::get('/agregarPelicula', function(){
  return view("agregarPelicula");
})->middleware("admin");
Route::post('/agregarPelicula', 'peliculasController@agregar');

// AGREGAR ACTOR
Route::get('/agregarActor', 'actoresController@datos')->middleware("admin");
Route::post('/agregarActor', 'actoresController@agregar')->middleware("admin");

// EDITAR PELICULA
Route::get('/editarPelicula/{id}', 'peliculasController@identificar')->middleware("admin");
Route::post('/editarPelicula', 'peliculasController@editar')->middleware("admin");

// AGREGAR ACTOR A PELICULA
Route::get('/actores/{id}', 'actoresController@actorMovie')->middleware("admin");
Route::post('/actores', 'actoresController@agregarActor')->middleware("admin");

// BORRAR PELICULA
Route::post('/borrarPelicula', 'peliculasController@borrar')->middleware("admin");
