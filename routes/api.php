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

Route::group(['middleware' => 'api'], function ($router) {
    Route::group(['prefix'=>'auth'],function(){
        Route::post('login', 'Auth\AuthController@login');
        Route::post('login', 'Auth\AuthController@login');
        Route::post('refresh', 'Auth\AuthController@refresh');
        Route::post('me', 'Auth\AuthController@me');
        Route::post('register', 'Auth\AuthController@register');
    });
});

Route::name('api.')->middleware('auth:api')->group(function ($router) {
    Route::resource('ocorrencias','OcorrenciaController');
    Route::resource('estados','EstadoController');
    Route::resource('cidades','CidadeController');
    Route::resource('cavalo_racas','CavaloRacaController');
    Route::resource('users','UserController');
});
