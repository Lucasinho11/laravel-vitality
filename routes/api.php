<?php

use App\Http\Controllers\Controller;
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



Route::get('/infos','App\Http\Controllers\InfoController@show');
Route::post('/reservation','App\Http\Controllers\ApiReservationController@create');
// Route::get('/infos', function(){
//     return "ok";
// });
Route::get('annulation/{token}','App\Http\Controllers\ApiAnnulationController@show');
// Route::get('annulation/{token}', function(){
//     return "annuler";
// });