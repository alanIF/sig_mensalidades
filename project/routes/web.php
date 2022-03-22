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


});