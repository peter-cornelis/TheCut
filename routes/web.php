<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MovieController::class, 'index']);
Route::get('/language/{locale}', [LanguageController::class, 'switch']);
