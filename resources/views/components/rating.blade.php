<div {{ $attributes->merge(['class' => 'absolute flex w-12 items-center justify-center text-sm font-bold bg-card p-2 aspect-square rounded-full shadow-md shadow-black/50 border-2 ring-2 ring-card ' . ($movie->vote_average >= 7 ? 'text-emerald-400 border-emerald-400' : ($movie->vote_average >= 4 ? 'text-yellow-400 border-yellow-400' : 'text-red-400 border-red-400'))]) }}>
    {{ $movie->rating }}
</div>
