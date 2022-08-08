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


Route::prefix("auth")->group(function (){
    Route::post('login', [\App\Http\Controllers\Auth\Api\LoginController::class, 'login']);
    Route::post('logout', [\App\Http\Controllers\Auth\Api\LoginController::class, 'logout'])
        ->middleware("auth:sanctum");
    Route::post('register', [\App\Http\Controllers\Auth\Api\RegisterController::class, 'register']);

});



Route::get('/user', "App\Http\Controllers\UserController@getUserLogged")->middleware("auth:sanctum");



//-----------------------------------------api cardápio
Route::get('/users', "App\Http\Controllers\UserController@index");
Route::get('/users/{id}', "App\Http\Controllers\UserController@show");
Route::post('/users', "App\Http\Controllers\UserController@store")->middleware("auth:sanctum");
Route::put('/users/{id}', "App\Http\Controllers\UserController@update")->middleware("auth:sanctum");
Route::delete('/users/{id}', "App\Http\Controllers\UserController@destroy")->middleware("auth:sanctum");





Route::get('/items', "App\Http\Controllers\api\ItemController@index");
Route::get('/items/{id}', "App\Http\Controllers\api\ItemController@show");
Route::post('/items', "App\Http\Controllers\api\ItemController@store")->middleware("auth:sanctum");
Route::put('/items/{id}', "App\Http\Controllers\api\ItemController@update")->middleware("auth:sanctum");
Route::delete('/items/{id}', "App\Http\Controllers\api\ItemController@destroy")->middleware("auth:sanctum");

Route::get('/categorias', "App\Http\Controllers\api\CategoriasController@index");
Route::get('/categorias/{id}', "App\Http\Controllers\api\CategoriasController@show");
Route::post('/categorias', "App\Http\Controllers\api\CategoriasController@store")->middleware("auth:sanctum");
Route::put('/categorias/{id}', "App\Http\Controllers\api\CategoriasController@update")->middleware("auth:sanctum");
Route::delete('/categorias/{id}', "App\Http\Controllers\api\CategoriasController@destroy")->middleware("auth:sanctum");


Route::get('/reservas', "App\Http\Controllers\api\ReservaController@index");
Route::get('/reservas/{id}', "App\Http\Controllers\api\ReservaController@show");
Route::post('/reservas', "App\Http\Controllers\api\ReservaController@store")->middleware("auth:sanctum");
Route::put('/reservas/{id}', "App\Http\Controllers\api\ReservaController@update")->middleware("auth:sanctum");
Route::delete('/reservas/{id}', "App\Http\Controllers\api\ReservaController@destroy")->middleware("auth:sanctum");


Route::get('/cardapio-items', "App\Http\Controllers\api\CardapioItemsController@index");
Route::get('/cardapio-items/{id}', "App\Http\Controllers\api\CardapioItemsController@show");
Route::post('/cardapio-items', "App\Http\Controllers\api\CardapioItemsController@store")->middleware("auth:sanctum");
Route::put('/cardapio-items/{id}', "App\Http\Controllers\api\CardapioItemsController@update")->middleware("auth:sanctum");
Route::delete('/cardapio-items/{id}', "App\Http\Controllers\api\CardapioItemsController@destroy")->middleware("auth:sanctum");


Route::get('/cardapios', "App\Http\Controllers\api\CardapioController@index");
Route::get('/cardapios/{id}', "App\Http\Controllers\api\CardapioController@show");
Route::post('/cardapios', "App\Http\Controllers\api\CardapioController@store")->middleware("auth:sanctum");
Route::put('/cardapios/{id}', "App\Http\Controllers\api\CardapioController@update")->middleware("auth:sanctum");
Route::delete('/cardapios/{id}', "App\Http\Controllers\api\CardapioController@destroy")->middleware("auth:sanctum");





