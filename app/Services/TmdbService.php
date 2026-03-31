<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Movie;
use Illuminate\Support\Collection;
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
        foreach (config('app.locales') as $lang) {
            $data = $this->client()
                ->get("/movie/{$id}", [
                    'append_to_response' => 'videos,credits',
                    'language' => $lang,
                    'include_video_language' => 'en,null',
                ])
                ->throw()
                ->json();
            $movie = Movie::updateOrCreate(
                ['id' => $data['id']],
                Movie::fromTmdb($data, $lang)->getAttributes()
            );
        }

        return $movie;
    }

    public function searchMovies(string $query): Collection
    {
        $data = $this->client()
            ->get('/search/movie', [
                'query' => $query,
                'language' => app()->getLocale(),
            ])
            ->throw()
            ->json();

        return collect($data['results'])
            ->map(fn(array $result) => Movie::fromTmdb($result));
    }

    public function getUpcomingMovies(): Collection
    {
        $data = $this->client()
            ->get('/movie/upcoming', ['language' => app()->getLocale()])
            ->throw()
            ->json();

        return collect($data['results'])
            ->map(fn(array $result) => Movie::fromTmdb($result));
    }

    public function reorderMovies(Collection $movies): void
    {
        foreach ($movies as $index => $movie) {
            $movie->pivot->place = $index + 1;
            $movie->pivot->save();
        }
    }
}
