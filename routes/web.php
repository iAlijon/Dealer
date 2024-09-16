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


//Route::post('login', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login');
Auth::routes();
Route::middleware(['auth:web'])->group(function (){
Route::group(['prefix' => 'admin'], function (){
    Route::get('/home', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
    Route::resources([
        'cars-list' => \App\Http\Controllers\Admin\CarsController::class,
        'spare-parts' => \App\Http\Controllers\Admin\SparePartsConntroller::class
    ]);
    Route::get('/sub-category/{id}', [\App\Http\Controllers\Admin\SubCategoryController::class, 'subCategorySelect'])->name('sub-category');
//    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
//    Route::get('logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
});
});


