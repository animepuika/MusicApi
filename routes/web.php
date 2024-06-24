<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MusixmatchController;



Route::get('/', [MusixmatchController::class, 'index'])->name('home');
Route::post('/search', [MusixmatchController::class, 'search'])->name('search');




