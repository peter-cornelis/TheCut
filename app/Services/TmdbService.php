<?php

declare(strict_types=1);

namespace App\Services;

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
            ->get("/movie/{$id}")
            ->throw()
            ->json();
    }

    public function searchMovies(string $query): array
    {
        return $this->client()
            ->get('/search/movie', ['query' => $query])
            ->throw()
            ->json();
    }
}
