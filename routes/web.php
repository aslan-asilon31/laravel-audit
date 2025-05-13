<?php

use App\Livewire\Welcome;
use Illuminate\Support\Facades\Route;

Route::get('/', Welcome::class);

Route::get('/customers', \App\Livewire\CustomerResources\CustomerList::class)->name('customer.list');
Route::get('/customers/create', \App\Livewire\CustomerResources\CustomerCreate::class)->name('customer.create');
Route::get('/customers/edit/{id}', \App\Livewire\CustomerResources\CustomerEdit::class)->name('customer.edit');
Route::get('/customers/show/{id}', \App\Livewire\CustomerResources\CustomerShow::class)->name('customer.show');

Route::get('/sales-orders', \App\Livewire\SalesOrderResources\SalesOrderList::class)->name('sales-orders.list');
Route::get('/sales-orders/create', \App\Livewire\SalesOrderResources\SalesOrderCreate::class)->name('sales-orders.create');
Route::get('/sales-orders/edit/{id}', \App\Livewire\SalesOrderResources\SalesOrderEdit::class)->name('sales-orders.edit');
Route::get('/sales-orders/show/{id}', \App\Livewire\SalesOrderResources\SalesOrderShow::class)->name('sales-orders.show');

Route::get('/products', \App\Livewire\ProductResources\ProductList::class)->name('products.list');
Route::get('/products/create', \App\Livewire\ProductResources\ProductCrud::class)->name('products.create');
Route::get('/products/edit/{id}', \App\Livewire\ProductResources\ProductCrud::class)->name('products.edit');
Route::get('/products/show/{id}/{readonly}', \App\Livewire\ProductResources\ProductCrud::class)->where('readonly', 'readonly')->name('products.show');
