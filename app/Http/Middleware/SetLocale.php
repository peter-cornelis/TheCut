<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    private array $supportedLocales = ['en', 'nl'];

    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->cookie('language');

        if ($this->isValidLocale($locale)) {
            app()->setLocale($locale);
        }

        return $next($request);
    }

    protected function isValidLocale(?string $locale): bool
    {
        return in_array($locale, $this->supportedLocales);
    }
}
