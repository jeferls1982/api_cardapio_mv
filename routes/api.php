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




//-----------------------------------------api cardápio
Route::get('/items', "App\Http\Controllers\api\ItemController@index");
Route::get('/items/{id}', "App\Http\Controllers\api\ItemController@show");
Route::post('/items', "App\Http\Controllers\api\ItemController@store");
Route::put('/items/{id}', "App\Http\Controllers\api\ItemController@update");
Route::delete('/items/{id}', "App\Http\Controllers\api\ItemController@destroy");

Route::get('/categorias', "App\Http\Controllers\api\CategoriasController@index");
Route::get('/categorias/{id}', "App\Http\Controllers\api\CategoriasController@show");
Route::post('/categorias', "App\Http\Controllers\api\CategoriasController@store");
Route::put('/categorias/{id}', "App\Http\Controllers\api\CategoriasController@update");
Route::delete('/categorias/{id}', "App\Http\Controllers\api\CategoriasController@destroy");


Route::get('/reservas', "App\Http\Controllers\api\ReservaController@index");
Route::get('/reservas/{id}', "App\Http\Controllers\api\ReservaController@show");
Route::post('/reservas', "App\Http\Controllers\api\ReservaController@store");
Route::put('/reservas/{id}', "App\Http\Controllers\api\ReservaController@update");
Route::delete('/reservas/{id}', "App\Http\Controllers\api\ReservaController@destroy");


Route::get('/cardapio-items', "App\Http\Controllers\api\CardapioItemsController@index");
Route::get('/cardapio-items/{id}', "App\Http\Controllers\api\CardapioItemsController@show");
Route::post('/cardapio-items', "App\Http\Controllers\api\CardapioItemsController@store");
Route::put('/cardapio-items/{id}', "App\Http\Controllers\api\CardapioItemsController@update");
Route::delete('/cardapio-items/{id}', "App\Http\Controllers\api\CardapioItemsController@destroy");


Route::get('/cardapios', "App\Http\Controllers\api\CardapioController@index");
Route::get('/cardapios/{id}', "App\Http\Controllers\api\CardapioController@show");
Route::post('/cardapios', "App\Http\Controllers\api\CardapioController@store");
Route::put('/cardapios/{id}', "App\Http\Controllers\api\CardapioController@update");
Route::delete('/cardapios/{id}', "App\Http\Controllers\api\CardapioController@destroy");




Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
