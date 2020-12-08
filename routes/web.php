<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalutacionsController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AlumneController;
use App\Http\Controllers\CentreController;
use App\Http\Controllers\EnsenyamentController;

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

Route::get('hola', function() { return "Hola món!"; });

Route::get('nom/{nom}', function($nom) { return "Hola ".$nom; });

Route::get('edat/{edat?}', function($edat = 34) { 
	return "La teva edat Ã©s ".$edat; 
});

//Route::get('salutacio', 'App\Http\Controllers\SalutacionsController@index');

Route::get('salutacio', [SalutacionsController::class, 'index']);

Route::resource('alumne', AlumneController::class);
Route::resource('centre', CentreController::class);
Route::resource('ensenyament', EnsenyamentController::class);

//Route::get('/', [FrontController::class, 'index']);Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');