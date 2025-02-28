<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend;


Route::get('/', [Frontend::class, 'shop'])->name('Frontend.shop');
Route::get('/Product_list', [Frontend::class, 'product_list'])->name('Frontend.product_list');
Route::get('/Product_list/sub_cat/{id}', [Frontend::class, 'subcategory'])->name('Frontend.subcategory');
