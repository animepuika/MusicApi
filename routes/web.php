<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MusixmatchController;

Route::middleware(['web'])->group(function () {
    Route::get('/', [MusixmatchController::class, 'index'])->name('home');
    Route::match(['get', 'post'], '/search', [MusixmatchController::class, 'search'])->name('search');
});



