<?php

use App\Livewire\Plans\Plans;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

Route::livewire('plans',Plans::class)->name('plans');

require __DIR__.'/settings.php';
