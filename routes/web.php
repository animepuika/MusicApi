<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MusixmatchController;

Route::post('/api/musixmatch/search', [MusixmatchController::class, 'search']);




