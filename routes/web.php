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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{domain}', \App\Http\Livewire\LandingPage::class)->name('landing_page');


Route::middleware(['auth:sanctum', 'verified'])->prefix('panel')->group(function(){
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    //Link
    Route::get('/link', \App\Http\Livewire\Link::class)->name("link");
    
    //Category
    Route::get('/category', \App\Http\Livewire\Category::class)->name("category");
    
    //Product
    Route::get('/product', \App\Http\Livewire\Product::class)->name("product");
    Route::get('/product/form', \App\Http\Livewire\ProductForm::class)->name("product.create");
    Route::get('/product/edit/{product}', \App\Http\Livewire\ProductForm::class)->name("product.edit");

    //Social Media
    Route::get('/social-media', \App\Http\Livewire\SocialMedia::class)->name("socialMedia");
    
    //Banner
    Route::get('/banner', \App\Http\Livewire\Banner::class)->name("banner");

    //gallery
    Route::get('/gallery', \App\Http\Livewire\Gallery::class)->name("gallery");
});
