<?php

use App\Livewire\Welcome;
use Illuminate\Support\Facades\Route;

// Route::get('/', Welcome::class);



// Route::get('/products', \App\Livewire\ProductResources\ProductList::class)->name('products.list');
// Route::get('/products/create', \App\Livewire\ProductResources\ProductCrud::class)->name('products.create');
// Route::get('/products/edit/{id}', \App\Livewire\ProductResources\ProductCrud::class)->name('products.edit');
// Route::get('/products/show/{id}/{readonly}', \App\Livewire\ProductResources\ProductCrud::class)->where('readonly', 'readonly')->name('products.show');


Route::get('/', \App\Livewire\Prices::class)->name('prices.list');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Hooks - Do not delete//
// Route::view('prices', 'livewire.prices.index')->middleware('auth');
	Route::view('courses', 'livewire.courses.index');
	Route::view('prices', 'livewire.prices.index');