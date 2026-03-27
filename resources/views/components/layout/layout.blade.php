@props(['title'])
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ $title }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="h-screen grid grid-rows-[auto_1fr_auto] bg-background text-foreground">
        <header class="sticky top-0 z-100 bg-card border-b border-border shadow-md shadow-black/50">
            <x-layout.nav />
            <span id="flash-message" class="absolute top-20 left-1/2 -translate-x-1/2 text-sm px-4 py-1 rounded shadow"></span>
        </header>
        <main class="w-full max-w-7xl mx-auto px-6 py-10">
            {{ $slot }}
        </main>
        <footer class="px-4 py-2 text-center text-sm text-muted-foreground font-medium">
            &copy; {{ date('Y') }} | Peter Cornelis | {{ __('pages.meta_provided') }}
            <a href="https://www.themoviedb.org/" target="_blank" rel="noopener noreferrer">
                <img src="/images/tmdb_logo.svg" alt="TMDB Logo" class="ml-1 inline h-4">
            </a>
        </footer>
    </body>
</html>
