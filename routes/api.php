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


Route::get('infos', function(){
    return "ok";
});

Route::post('/reservation','App\Http\Controllers\ApiReservationController@create');
// Route::post('reservation', function(){
//     return ;
// });
Route::get('reservation/annulation/{token}', function(){
    return "annuler";
});