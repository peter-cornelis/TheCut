@props(['movie'])
<div class="grid w-48 bg-card border border-border rounded-md shadow-md shadow-black/50 hover:scale-105 transition-transform duration-300">
    <img class="w-48 h-72 rounded-t-md" src="{{ $movie->poster_url }}" alt="{{ $movie->title }} poster">
    <div class="relative grid grid-rows-[5rem_1fr] text-center">
        <h3 class="flex justify-center h-fit max-h-18 text-lg font-semibold line-clamp-2 px-2 pt-4 my-auto">{{ $movie->title }}</h3>
        <p class="text-sm text-foreground/50 bg-background rounded-b-md py-2 border-t border-border">{{ $movie->release_year }}</p>
        <div class="absolute flex w-12 items-center justify-center text-sm font-bold -top-8 right-1/2 translate-x-1/2 bg-card p-2 aspect-square rounded-full shadow-md shadow-black/50 border-2 ring-2 ring-card {{ $movie->vote_average >= 7 ? 'text-emerald-400 border-emerald-400' : ($movie->vote_average >= 4 ? 'text-yellow-400 border-yellow-400' : 'text-red-400 border-red-400') }}">{{ $movie->rating }}</div>
    </div>
</div>
