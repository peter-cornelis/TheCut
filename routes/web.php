<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/language/{locale}', [LanguageController::class, 'switch']);
Route::get('/', [MovieController::class, 'index']);
Route::get('/movies/{tmdb_id}', [MovieController::class, 'show']);
Route::get('/login', [SessionController::class, 'create']);
