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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
	
    
	
	Route::get('/clientes',  [App\Http\Controllers\ClienteController::class, 'index']);
	Route::get('/clientes/new',  [App\Http\Controllers\ClienteController::class, 'new']);
	Route::post('/clientes/add',  [App\Http\Controllers\ClienteController::class, 'add']);
	Route::post('/clientes/update/{id}',  [App\Http\Controllers\ClienteController::class, 'update']);
    Route::get('/clientes/{id}/edit',  [App\Http\Controllers\ClienteController::class, 'edit']);
    Route::delete('/clientes/delete/{id}',  [App\Http\Controllers\ClienteController::class, 'delete']);
    Route::get('/clientes/{id}/eye',  [App\Http\Controllers\ClienteController::class, 'eye']);

	Route::get('/mensalidades',  [App\Http\Controllers\MensalidadeController::class, 'index']);
	Route::get('/mensalidades/new',  [App\Http\Controllers\MensalidadeController::class, 'new']);
	Route::post('/mensalidades/add',  [App\Http\Controllers\MensalidadeController::class, 'add']);
	Route::post('/mensalidades/update/{id}',  [App\Http\Controllers\MensalidadeController::class, 'update']);
	Route::post('/mensalidades/pagar/{id}',  [App\Http\Controllers\MensalidadeController::class, 'pagar']);

    Route::get('/mensalidades/{id}/edit',  [App\Http\Controllers\MensalidadeController::class, 'edit']);
    Route::delete('/mensalidades/delete/{id}',  [App\Http\Controllers\MensalidadeController::class, 'delete']);
	Route::get('/mensalidades/gerar',  [App\Http\Controllers\MensalidadeController::class, 'gerar']);
	
    Route::get('/relatorios',  [App\Http\Controllers\RelatorioController::class, 'index']);

});