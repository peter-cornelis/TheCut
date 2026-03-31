<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Services\TmdbService;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TmdbService $tmdb)
    {
        return view('home', ['movies' => $tmdb->getUpcomingMovies()]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id, TmdbService $tmdb)
    {
        $movie = Movie::find($id);
        if (! $movie || now()->diffInDays($movie->updated_at) > 7) {
            $movie = $tmdb->getMovie($id);
        }

        return view('movie', ['movie' => $movie]);
    }

    public function search(TmdbService $tmdb)
    {
        $search = request()->input('search');
        $movies = $tmdb->searchMovies($search);

        return view('home', ['movies' => $movies, 'search' => $search]);
    }
}
