<x-layout title="Home">
    <section>
        <h1 class="text-3xl font-bold mb-6">{{ __('nav.list') }}</h1>
        <ul id="movie-list" class="grid gap-4 max-w-3xl mx-auto">
            @foreach ($movies as $key => $movie)
                <x-list-item :movie="$movie" :movieTotal="$movies->count()"/>
            @endforeach
        </ul>
    </section>
</x-layout>
