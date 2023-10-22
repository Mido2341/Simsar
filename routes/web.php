<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\LandController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LiveController;
use App\Http\Controllers\LovesRentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('/',DashboardController::class);


Route::middleware(['auth', 'verified']);

Route::middleware('auth')->group(function ()
{
    Route::resource('sales', SaleController::class);
    Route::resource('rents',RentController::class);
    Route::resource('lands',LandController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/sale/like/{sale}',[LikeController::class,'like'])->name('like');
    Route::get('/rent/like/{rent}',[LovesRentController::class,'love'])->name('love');
    Route::get('/land/like/{land}',[LiveController::class,'live'])->name('live');
    Route::get('/myfavorite',[LikeController::class,'favorite'])->name('myfavorite');



    // Route::post('sales', [SaleController::class])->name('sales.store');
    // Route::put('sales/{sale}', [SaleController::class])->name('sales.update');
    // Route::post('rents', [RentController::class])->name('rents.store');
    // Route::put('rents/{rent}', [RentController::class])->name('rents.update');
    // Route::post('lands', [LandController::class])->name('lands.store');
    // Route::put('lands/{land}', [LandController::class])->name('lands.update');
});




require __DIR__.'/auth.php';
