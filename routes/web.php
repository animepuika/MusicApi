<?php

use App\Http\Controllers\MusixmatchController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/results', [MusixmatchController::class, 'search'])->name('results');




