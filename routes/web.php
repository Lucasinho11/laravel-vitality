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

Route::get('/', 'App\Http\Controllers\IndexController@index');
Route::get('/reservation','App\Http\Controllers\ReservationController@show');
Route::post('/reservation','App\Http\Controllers\ReservationController@store');
Route::get('/reservation/annulation/{token}','App\Http\Controllers\AnnulationController@show' );
Route::post('/reservation/annulation/{token}','App\Http\Controllers\AnnulationController@deleteReservation');