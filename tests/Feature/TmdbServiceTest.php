<?php

use App\Services\TmdbService;

test('returns movie by Id', function () {
    $tmdb = app(TmdbService::class);
    $result = $tmdb->getMovie(500);

    expect($result['id'])->toBe(500);
    expect($result['title'])->toBe('Reservoir Dogs');
});

test('throws exception if movie isn\'t found', function () {
    $tmdb = app(TmdbService::class);
    $tmdb->getMovie(0);
})->throws(Exception::class);

test('receives poster for movie', function () {
    $tmdb = app(TmdbService::class);
    $result = $tmdb->getMovie(500);

    expect($result['poster_path'])->toBeString();
});

test('searches movies by input', function () {
    $tmdb = app(TmdbService::class);
    $results = $tmdb->searchMovies('Inception');

    expect($results['results'][0]['title'])->toBe('Inception');
});
