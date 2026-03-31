<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\TmdbService;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\JsonResponse;

class MovieListController extends Controller
{
    public function index()
    {
        $movies = Auth::user()->movies()->orderByPivot('place')->get();

        return view('movie-list', ['movies' => $movies]);
    }

    public function add(int $movie_id): JsonResponse
    {
        if (Auth::user()->movies->contains($movie_id)) {
            return response()->json([
                'success' => false,
                'error' => __('flash.movie_already_in_list'),
            ]);
        }

        if (Auth::user()->movies->count() >= 5) {
            return response()->json([
                'success' => false,
                'error' => __('flash.movie_list_full'),
            ]);
        }
        $place = Auth::user()->movies()->count() + 1;
        Auth::user()->movies()->attach($movie_id, ['place' => $place]);

        return response()->json([
            'success' => true,
            'message' => __('flash.movie_added_to_list'),
        ]);
    }

    public function remove(int $movie_id, TmdbService $tmdb): JsonResponse
    {
        if (! Auth::user()->movies->contains($movie_id)) {
            return response()->json([
                'success' => false,
                'error' => __('flash.movie_not_in_list'),
            ]);
        }

        $movies = Auth::user()->movies();
        $movies->detach($movie_id);
        $tmdb->reorderMovies($movies->get());

        return response()->json([
            'success' => true,
            'message' => __('flash.movie_removed_from_list'),
        ]);
    }

    public function move(int $movie_id): JsonResponse
    {
        $direction = request()->query('direction');
        $movie = Auth::user()->movies()->where('movie_id', $movie_id)->first();
        $place = $movie->pivot->place;

        $swapMovie = match ($direction) {
            'up' => Auth::user()->movies()->where('place', $place - 1)->first(),
            'down' => Auth::user()->movies()->where('place', $place + 1)->first(),
            default => null,
        };

        if (! $swapMovie) {
            return response()->json([
                'success' => false,
                'error' => __('flash.cannot_move_movie'),
            ]);
        }

        $movie->pivot->place = $swapMovie->pivot->place;
        $movie->pivot->save();
        $swapMovie->pivot->place = $place;
        $swapMovie->pivot->save();

        return response()->json(['success' => true]);
    }
}
