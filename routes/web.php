<?php

use App\Http\Controllers\AirlineController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;

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
    return view('index');
})->name('home');

Route::get('/cities', [CityController::class, 'index']);
Route::get('/fetch-cities', [CityController::class, 'fetchcities']);
Route::post('/cities', [CityController::class, 'store']);
Route::get('/edit-city/{id}', [CityController::class, 'edit']);
Route::put('/update-city/{id}', [CityController::class, 'update']);
Route::delete('/delete-city/{id}', [CityController::class, 'destroy']);

Route::get('/airlines', [AirlineController::class, 'index']);
Route::get('/fetch-airlines', [AirlineController::class, 'fetchairlines']);
Route::post('/airlines', [AirlineController::class, 'store']);
Route::get('/edit-airline/{id}', [AirlineController::class, 'edit']);
Route::put('/update-airline/{id}', [AirlineController::class, 'update']);
Route::delete('/delete-airline/{id}', [AirlineController::class, 'destroy']);







