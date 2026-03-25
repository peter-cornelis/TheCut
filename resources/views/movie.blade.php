<x-layout title="{{ $movie->title }}">
    <section class="max-w-5xl mx-auto px-6 py-8">
        <header class="relative bg-cover bg-center rounded-md mb-6 h-64 shadow-lg shadow-black/50"
            style="background-image: url('{{ $movie->backdrop_url }}');">
            <div class="absolute inset-0 bg-black/70 rounded-md" />
            <div class="relative z-10 py-4 px-6 h-full">
                <h1 class="text-3xl font-bold mb-4">{{ $movie->title }}</h1>
                <p class="text-center text-lg">{{ __('pages.releaseDate') }} {{ $movie->release_date }}</p>
                <x-rating :movie="$movie" class="top-4 right-4" />
                <img class="absolute top-4 left-4 h-56 object-cover rounded-md shadow-lg shadow-black/50 ring ring-border" src="{{ $movie->poster_url }}" alt="{{ $movie->title }} poster">
                @if($movie->trailer)
                    <a href="{{ $movie->trailer }}" target="_blank" class="absolute bottom-4 left-1/2 transform -translate-x-1/2 ">
                        Trailer
                    </a>
                @endif
            </div>
        </header>
        <p>{{ $movie->overview }}</p>
    </section>
</x-layout>
