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
Route::middleware(['auth'])->get('/',[App\Http\Controllers\DashboardController::class, 'index']);
Route::middleware(['auth','admin'])->group(function(){
    Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');

    Route::get('/ocorrencias/porEstado', 'OcorrenciasController@porEstado');
    Route::resource('/ocorrencias', 'OcorrenciasController');
    Route::get('/search/ocorrencias/table_list','OcorrenciasController@searchTableList')->name('usuarios.search.tableList');

    Route::resource('/usuarios', 'UsersController');
    Route::get('/usuarios/{usuario}/perfil', 'UsersController@edit');
    Route::get('/search/usuarios/card_list','UsersController@searchCardList')->name('usuarios.search.cardList');
});
