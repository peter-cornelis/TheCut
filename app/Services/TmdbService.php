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

    public function getMovie(int $id): Movie
    {
        $data = $this->client()
            ->get("/movie/{$id}")
            ->throw()
            ->json();

        return Movie::fromTmdb($data);
    }

    public function searchMovies(string $query): array
    {
        return $this->client()
            ->get('/search/movie', ['query' => $query])
            ->throw()
            ->json();
    }
}
