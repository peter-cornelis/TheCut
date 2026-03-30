@props(['movie', 'place'])
<li class="relative grid grid-cols-[4.2rem_auto_1fr_auto] bg-card rounded-md shadow-md shadow-black/50 border-2 border-border hover:ring ring-foreground/20 transition-discrete duration-300">
    <div class="flex items-center justify-center text-4xl font-bold bg-border rounded-l">{{ $place }}</div>
    <img class="h-24 object-cover" src="{{ $movie->poster_url }}" alt="{{ $movie->title }} poster">
    <div class="flex flex-col justify-center gap-2 px-4">
        <h3 class="text-xl font-semibold">{{ $movie->title }}</h3>
        <p class="">{{$movie->status === 'Released' ? __('pages.released') : __('pages.expected') }} {{ $movie->release_year }}</p>
    </div>
    <menu  class="grid grid-cols-2 bg-border rounded-r z-10">
        <button class="flex items-center justify-center col-start-2 hover:bg-indigo-400 rounded-tr-md transition-colors duration-300">
            <x-svg.up class='w-6 h-6' />
        </button>
        <button class="flex items-center justify-center col-start-2 hover:bg-indigo-400 rounded-br-md border-t border-background transition-colors duration-300">
            <x-svg.down class='w-6 h-6' />
        </button>
        <button form="remove-movie-form-{{ $movie->id }}" type="submit" onclick="MovieListHandler.remove(event, {{ $movie->id }})" class="movie-action h-full row-span-2 col-start-1 row-start-1 px-2 hover:bg-rose-400 border-r border-background transition-colors duration-300">
            <x-svg.remove class="w-6 h-6" />
        </button>
    </menu>
    <form id="remove-movie-form-{{ $movie->id }}" action="/movies/{{ $movie->id }}/remove" method="post" class="hidden">
        @csrf
    </form>
    <a href="/movies/{{ $movie->id }}" class="absolute top-0 left-0 w-full h-full"></a>
</li>
