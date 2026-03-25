@props(['movie'])
<div class="relative grid w-48 bg-card border border-border rounded-md shadow-md shadow-black/50 hover:scale-105 transition-transform duration-300">
    <img class="w-48 h-72 rounded-t-md object-cover" src="{{ $movie->poster_url }}" alt="{{ $movie->title }} poster">
    <div class="relative grid grid-rows-[5rem_1fr] text-center">
        <h3 class="flex justify-center h-fit max-h-18 text-lg font-semibold line-clamp-2 px-2 pt-4 my-auto">{{ $movie->title }}</h3>
        <p class="text-sm text-foreground/50 bg-background rounded-b-md py-2 border-t border-border">{{ $movie->release_year }}</p>
        <x-rating :movie="$movie" class="-top-8 right-1/2 translate-x-1/2" />
    </div>
    <a href="/movies/{{ $movie->tmdb_id }}" class="absolute w-full h-full top-0 left-0"></a>
</div>
