<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Manage users

Route::get('/user','App\Http\Controllers\UserController@index');
Route::get('/user/{id}','App\Http\Controllers\UserController@show');
Route::patch('/user/{id}', 'App\Http\Controllers\UserController@patch');

//Manage books and images

Route::get('/libros', 'App\Http\Controllers\LibroController@index');
Route::post('/libros', 'App\Http\Controllers\LibroController@store');
Route::get('/libros/{id}', 'App\Http\Controllers\LibroController@show');
Route::get('/image', 'App\Http\Controllers\LibroController@getImage');
Route::put('/libros/{id}', 'App\Http\Controllers\LibroController@update');
Route::delete('/libros/{id}', 'App\Http\Controllers\LibroController@destroy');

//Manage cart selection

Route::post('/selected/{id}', '\App\Http\Controllers\listadoController@show');
Route::post('/selection', '\App\Http\Controllers\LibroController@addSelection');
Route::get('/listado/{usuario}', '\App\Http\Controllers\listadoController@obtenerListado');
Route::delete('/listado/{id}', 'App\Http\Controllers\listadoController@deleteItemList');
Route::post('/compra/{id}', 'App\Http\Controllers\LibroController@buyAll');
Route::delete('/listadoBorrado/{id}', 'App\Http\Controllers\listadoController@deleteAllLists');

//Manage user libraries

Route::get('/library/{id}', 'App\Http\Controllers\LibroController@getLibrary');
Route::post('/libraryfind', 'App\Http\Controllers\LibroController@findLibrary');

//Manage admins

Route::post('/admin', 'App\Http\Controllers\AdminController@setAdmin');
Route::get('/admin/{id}', 'App\Http\Controllers\AdminController@getState');
Route::delete('/admin/{id}', 'App\Http\Controllers\AdminController@removeAdmin');
