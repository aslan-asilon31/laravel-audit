<?php

use App\Livewire\Welcome;
use Illuminate\Support\Facades\Route;

Route::get('/', Welcome::class);


Route::get('/tiket', \App\Livewire\TiketResources\TiketList::class)->name('tiket.list');
Route::get('/tiket/buat', \App\Livewire\TiketResources\TiketPerbaharui::class)->name('tiket.perbaharui');
