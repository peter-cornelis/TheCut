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
        if (! $movie || now()->diffInDays($movie->updated_at) > 7 || $movie->title === null) {
            $data = $tmdb->getMovie($id);
            $movie = Movie::updateOrCreate(
                ['id' => $data['id']],
                Movie::fromTmdb($data)->getAttributes()
            );
        }

        return view('movie', ['movie' => $movie]);
    }
}
