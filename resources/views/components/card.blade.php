@props(['movie'])
<div class="grid w-48 bg-card border border-border rounded-md shadow-md shadow-black/50">
    <img class="w-48 h-auto rounded-t-md" src="{{ $movie->poster_url }}" alt="{{ $movie->title }} poster">
    <div class="relative text-center p-4">
        <h3 class="text-xl font-semibold">{{ $movie->title }}</h3>
        <p class="text-sm text-foreground/50">Released: {{ $movie->release_year }}</p>
        <div class="absolute flex items-center justify-center text-sm font-bold -top-8 right-1/2 translate-x-1/2 bg-card p-2 aspect-square rounded-full shadow-md shadow-black/50 border-2 ring ring-card {{ $movie->vote_average >= 7 ? 'border-green-600' : ($movie->vote_average >= 4 ? 'border-yellow-600' : 'border-red-600') }}">{{ $movie->rating }}</div>
    </div>
</div>
