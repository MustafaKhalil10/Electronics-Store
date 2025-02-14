<?php

use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\FavoritesController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\OrderController;
use App\Http\Controllers\Front\ProductsController as FrontProductsController;
use Illuminate\Support\Facades\Route;


    /////////// front ///////////
Route::get('/f', [HomeController::class, 'index'])->name('front.home');

    /////////// prorduct show ///////////
Route::get('/product/show/{id}', [FrontProductsController::class, 'show'])->name('product.show');

    /////////// cart ///////////
Route::resource('/front/cart', CartController::class);

    /////////// checkout ///////////
Route::resource('/front/checkout', CheckoutController::class);

    /////////// orders ///////////
Route::resource('/front/orders', OrderController::class);

    /////////// favorites ///////////
Route::resource('/front/favorites', FavoritesController::class);

