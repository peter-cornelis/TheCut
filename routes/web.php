<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\MovieListController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/language/{locale}', [LanguageController::class, 'switch']);
Route::get('/', [MovieController::class, 'index']);
Route::get('/movies/search', [MovieController::class, 'search']);
Route::get('/movies/{id}', [MovieController::class, 'show']);
Route::get('/register', [RegistrationController::class, 'create']);
Route::post('/register', [RegistrationController::class, 'store']);
Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::get('/movie-list', [MovieListController::class, 'index']);

// Routes that require authentication
Route::middleware('auth')->group(function () {
    Route::get('/movie-list', [MovieListController::class, 'index']);
    Route::post('/movies/{id}/add', [MovieListController::class, 'add']);
    Route::post('/movies/{id}/remove', [MovieListController::class, 'remove']);
    Route::get('/movies/{id}/move', [MovieListController::class, 'move']);
    Route::post('/api-keys', [SessionController::class, 'generateApiKey']);
    Route::post('/logout', [SessionController::class, 'destroy']);
});
