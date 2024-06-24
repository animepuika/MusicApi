<?php

use App\Http\Controllers\MusixmatchController;
use Illuminate\Support\Facades\Route;

// Home route to display the search form
Route::get('/', function () {
    return view('welcome');
})->name('home');

// API route to handle Musixmatch search requests
Route::post('/api/musixmatch/search', [MusixmatchController::class, 'search']);




