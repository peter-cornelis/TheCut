<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Movie;
use Illuminate\Support\Facades\Http;

class TmdbService
{
    public function __construct(
        protected string $baseUrl,
        protected string $apiKey
    ) {}

    protected function client()
    {
        return Http::baseUrl($this->baseUrl)
            ->withToken($this->apiKey)
            ->acceptJson();
    }

    public function getMovie(int $id): array
    {
        return $this->client()
            ->get("/movie/{$id}", [
                'append_to_response' => 'videos,credits',
                'language' => app()->getLocale(),
            ])
            ->throw()
            ->json();
    }

    public function searchMovies(string $query): array
    {
        return $this->client()
            ->get('/search/movie', [
                'query' => $query,
                'language' => app()->getLocale(),
            ])
            ->throw()
            ->json();
    }

    public function getUpcomingMovies(): array
    {
        $data = $this->client()
            ->get('/movie/upcoming', ['language' => app()->getLocale()])
            ->throw()
            ->json();

        return array_map(Movie::fromTmdb(...), $data['results']);
    }
}
