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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


//rotas para lista, inserir, atualizar e deletetar registro de usuário
Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
    Route::get('/list', 'Api\\UsersController@index')->name('list');
    Route::post('/store', 'Api\\UsersController@store')->name('store');
    Route::get('/show/id/{id}', 'Api\\UsersController@show')->name('show.id')->where('id', '[0-9]+');
    Route::get('/show/nome/{nome}', 'Api\\UsersController@showNome')->name('show.nome');
    Route::get('/destroy/{id}', 'Api\\UsersController@destroy')->name('destroy');
    Route::put('/update/{id}', 'Api\\UsersController@update')->name('update');
});


Route::group(['prefix' => 'filmes', 'as' => 'filmes.'], function () {
    Route::get('/list', 'Api\\FilmesController@index')->name('list');
    Route::post('/store', 'Api\\FilmesController@store')->name('store');
    Route::get('/show/id/{id}', 'Api\\FilmesController@show')->name('show.id')->where('id', '[0-9]+');
    Route::get('/show/titulo/{titulo}', 'Api\\FilmesController@showTitulo')->name('show.titulo');
    Route::get('/destroy/{id}', 'Api\\FilmesController@destroy')->name('destroy');
    Route::put('/update/{id}', 'Api\\FilmesController@update')->name('update');
});

Route::group(['prefix' => 'classificacoes', 'as' => 'classificacao.'], function () {
    Route::get('/list', 'Api\\ClassificacoesController@index')->name('list');
    Route::post('/store', 'Api\\ClassificacoesController@store')->name('store');
    Route::get('/show/id/{id}', 'Api\\ClassificacoesController@show')->name('show.id')->where('id', '[0-9]+');
    Route::get('/show/titulo/{titulo}', 'Api\\ClassificacoesController@showTitulo')->name('show.titulo');
    Route::get('/destroy/{id}', 'Api\\ClassificacoesController@destroy')->name('destroy');
    Route::put('/update/{id}', 'Api\\ClassificacoesController@update')->name('update');
});



