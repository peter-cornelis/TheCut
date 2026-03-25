<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Number;

class Movie extends Model
{
    protected $fillable = [
        'tmdb_id',
        'title',
        'overview',
        'release_date',
        'poster_path',
        'backdrop_path',
        'original_language',
        'vote_average',
    ];

    public static function fromTmdb(array $data): self
    {
        return new self([
            'tmdb_id' => $data['id'],
            'title' => $data['original_title'],
            'release_date' => $data['release_date'],
            'poster_path' => $data['poster_path'],
            'backdrop_path' => $data['backdrop_path'],
            'overview' => $data['overview'],
            'original_language' => $data['original_language'],
            'vote_average' => $data['vote_average'],
        ]);
    }

    public function getPosterUrlAttribute(): string
    {
        return config('tmdb.poster_base_url').$this->poster_path;
    }

    public function getBackdropUrlAttribute(): string
    {
        return config('tmdb.backdrop_base_url').$this->backdrop_path;
    }

    public function getReleaseYearAttribute(): string
    {
        return substr($this->release_date, 0, 4);
    }

    public function getRatingAttribute(): string
    {
        return Number::percentage($this->vote_average * 10);
    }
}
