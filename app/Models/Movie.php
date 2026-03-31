<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Number;

class Movie extends Model
{
    protected $fillable = [
        'id',
        'title_nl',
        'title_en',
        'overview_nl',
        'overview_en',
        'release_date',
        'status',
        'poster_path',
        'backdrop_path',
        'original_language',
        'vote_average',
        'trailer',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'movielists')->withPivot('place');
    }

    public static function fromTmdb(array $data): self
    {
        $locale = app()->getLocale();

        return new self([
            'id' => $data['id'],
            "title_{$locale}" => $data['title'],
            "overview_{$locale}" => $data['overview'],
            'release_date' => $data['release_date'],
            'status' => $data['status'] ?? null,
            'poster_path' => $data['poster_path'],
            'backdrop_path' => $data['backdrop_path'],
            'original_language' => $data['original_language'],
            'vote_average' => $data['vote_average'],
            'trailer' => self::selectTrailerUrl($data['videos']['results'] ?? []),
        ]);
    }

    protected static function selectTrailerUrl(array $videos): ?string
    {
        foreach ($videos as $video) {
            if ($video['type'] === 'Trailer' && $video['site'] === 'YouTube') {
                return "https://www.youtube-nocookie.com/embed/{$video['key']}";
            }
        }

        return null;
    }

    public function getPosterUrlAttribute(): string
    {
        return config('tmdb.poster_base_url') . $this->poster_path;
    }

    public function getBackdropUrlAttribute(): string
    {
        return config('tmdb.backdrop_base_url') . $this->backdrop_path;
    }

    public function getReleaseYearAttribute(): string
    {
        return substr($this->release_date, 0, 4);
    }

    public function getRatingAttribute(): string
    {
        return Number::percentage($this->vote_average * 10);
    }

    public function getTitleAttribute(): ?string
    {
        $locale = app()->getLocale();

        return $this->{"title_{$locale}"};
    }

    public function getOverviewAttribute(): ?string
    {
        $locale = app()->getLocale();

        return $this->{"overview_{$locale}"};
    }

    public function getPlaceAttribute(): ?int
    {
        $pivot = $this->pivot;

        return $pivot ? $pivot->place : null;
    }
}
