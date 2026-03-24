<?php

/*
 * Configuration file for The Movie Database (TMDB) API
 */

return [
    'base_url' => env('TMDB_BASE_URL'),
    'poster_base_url' => 'https://image.tmdb.org/t/p/w342',
    'backdrop_base_url' => 'https://image.tmdb.org/t/p/w780',
    'key' => env('TMDB_API_KEY'),
];
