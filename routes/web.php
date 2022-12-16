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
// Route::get('/{domain}', \App\Http\Livewire\LandingPage::class)->name('landing_page');
// Route::get('/{domain}/{product}', \App\Http\Livewire\LandingPageProduct::class)->name('landing_page_product');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->prefix('panel')->group(function(){
    // Route::view('/dashboard', 'dashboard')->name('dashboard');
    
    //Dashboard
    Route::get('dashboard', \App\Http\Livewire\Dashboard::class)->name("dashboard");
    
    Route::prefix('page')->group(function(){
        
        Route::get('/statistik/dashboard', \App\Http\Livewire\Analytics::class)->name("statistik");
        //Link
        Route::get('/link', \App\Http\Livewire\Link::class)->name("link");
        
        //Category
        Route::get('/category', \App\Http\Livewire\Category::class)->name("category");
        
        //Product
        Route::get('/product', \App\Http\Livewire\Product::class)->name("product");
        Route::get('/product/form/{product?}', \App\Http\Livewire\ProductForm::class)->name("product.create");
        Route::get('/product/edit/{product}', \App\Http\Livewire\ProductForm::class)->name("product.edit");
        Route::get('/product/link/{productId}', \App\Http\Livewire\ProductLink::class)->name("product.link");
        
        //Social Media
        Route::get('/social-media', \App\Http\Livewire\SocialMedia::class)->name("socialMedia");
        
        //Banner
        Route::get('/banner', \App\Http\Livewire\Banner::class)->name("banner");

        //gallery
        Route::get('/gallery', \App\Http\Livewire\Gallery::class)->name("gallery");
        
        //setting
        Route::get('/setting', \App\Http\Livewire\Setting::class)->name("setting");
    });

});