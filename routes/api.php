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


//Route::group(['prefix' => 'v1', 'middleware' => 'api', 'namespace' => 'Api'], function (){
//    Route::post('login', [\App\Http\Controllers\Api\AuthController::class, 'login'])->name('login');
//    Route::get('logout', [\App\Http\Controllers\Api\AuthController::class, 'logout'])->name('logout');
//    Route::post('refresh', [\App\Http\Controllers\Api\AuthController::class, 'refresh']);
//
//    Route::group(['prefix' => 'admin', 'middleware' => 'api'], function (){
//         Route::get('dashboard', []);
//    });
//});
