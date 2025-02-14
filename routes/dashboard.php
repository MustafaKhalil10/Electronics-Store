<?php

use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProductsController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' =>['auth']], function () {
    /////////// Dashboard ///////////
Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    /////////// Categories ///////////
Route::resource('dashboard/categories',CategoriesController::class);

    /////////// Products ///////////
Route::resource('dashboard/products', ProductsController::class);
});


