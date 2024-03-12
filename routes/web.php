<?php

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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');



Route::get('/configuracion', 'UserController@index')->name('config');

Route::post('/atualizar', 'UserController@update')->name('actua');

Route::get('/imagen/{fo}', 'UserController@enviar')->name('imagen');

//subir imagen

Route::get('/image/index', 'ImageController@index')->name('index');

Route::post('image/subir', 'ImageController@subir')->name('subir');

Route::get('/perfiles', 'ImageController@dada')->name('imagen.subida');


Route::get('/image/{fo}', 'ImageController@enviar')->name('image');

Route::get('/imagenes/{fo}', 'ImageController@dess')->name('Devolver.Imagen');

Route::get('/perfil/{fo}', 'ImageController@perfil')->name('dar.per');

Route::post('/comentario', 'CommentsController@insertar')->name('insertar.comentario');

Route::get('/borrar/{id}', 'CommentsController@delete')->name('delete.comment');
//mostrar el perfil del usuario
Route::get('/miperfil/{id}', 'UserController@miperfil')->name('mi.perfil');
//eliminar imagen
Route::get('/delete/{borrar}', 'ImageController@borrarimagen')->name('borrar.imagen');

Route::get('/actualizar2/{id}', 'ImageController@actualizarimagen')->name('gen');

Route::get('/mostrarimagen/{id}', 'ImageController@mostrarimagen')->name('mostrar.imagen');

Route::post('/actuali', 'ImageController@actualizado')->name('act.post');


Route::get('/actuali/post', 'ImageController@post')->name('act.post');

//busqueda de gente

Route::get('/gentes/{name?}', 'UserController@mostrargente')->name('gentes.de');

Route::get('/like/{name}', 'LikeController@megusta')->name('megusta');

Route::get('/dislike/{name}', 'LikeController@nomegusta')->name('nomegusta');







