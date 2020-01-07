<?php

use App\Http\Controllers\Product\Front\FilterController;
use App\Http\Controllers\Product\Front\ProductController;

//Route::group(['prefix' => 'products', 'as' => 'product.'], static function () {
Route::get('/', [ProductController::class, 'index'])->name('product.index');
Route::get('/', [FilterController::class, 'index'])->name('product.search.index');
//});
