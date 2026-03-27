<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\JsonResponse;

class MovieListController extends Controller
{
    public function add(int $movie_id): JsonResponse
    {
        if (Auth::user()->movies->contains($movie_id)) {
            return response()->json([
                'success' => false,
                'error' => __('flash.movie_already_in_list'),
            ]);
        }

        Auth::user()->movies()->attach($movie_id);

        return response()->json([
            'success' => true,
            'message' => __('flash.movie_added_to_list'),
        ]);
    }

    public function remove(int $movie_id): JsonResponse
    {
        if (!Auth::user()->movies->contains($movie_id)) {
            return response()->json([
                'success' => false,
                'error' => __('flash.movie_not_in_list'),
            ]);
        }

        Auth::user()->movies()->detach($movie_id);

        return response()->json([
            'success' => true,
            'message' => __('flash.movie_removed_from_list'),
        ]);
    }
}
