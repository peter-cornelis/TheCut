<?php

declare(strict_types=1);

namespace App\Providers;

use App\Services\TmdbService;
use Illuminate\Support\ServiceProvider;
use Override;

class TmdbServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    #[Override]
    public function register(): void
    {
        $this->app->singleton(TmdbService::class, fn () => new TmdbService(
            baseUrl: config('tmdb.base_url'),
            apiKey: config('tmdb.key')
        ));
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
