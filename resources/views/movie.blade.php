<x-layout title="{{ $movie->title }}">
    <section class="max-w-5xl mx-auto px-6 py-8">
        <header class="bg-cover bg-center rounded-md mb-6 h-64 shadow-lg shadow-black/50"
            style="background-image: url('{{ $movie->backdrop_url }}');">
            <div class="grid grid-cols-[auto_1fr] w-full h-full bg-black/70 rounded-md">
                <img class="h-64 object-cover rounded-l-md shadow-lg shadow-black/50" src="{{ $movie->poster_url }}" alt="{{ $movie->title }} poster">
                <div class="grid grid-rows-[auto_1fr_auto] py-4 px-6 h-full">
                    <h1 class="text-left font-bold mb-4">{{ $movie->title }}</h1>
                    <p class="text-sm">{{$movie->status === 'Released' ? __('pages.released') : __('pages.expected') }} {{ $movie->release_date }}</p>
                    <div class="flex justify-between">
                        @if($movie->trailer)
                            <button class="btn-inline ring-rose-500 w-fit my-auto"
                                onclick="document.getElementById('trailer-container').classList.remove('hidden'); document.getElementById('trailer').src = '{{ $movie->trailer }}'">
                                Trailer
                            </button>
                            <x-trailer id="trailer-container" :title="$movie->title" aspect-ratio="4:3" class="hidden"/>
                        @endif
                        <x-rating :movie="$movie" class="static" />
                    </div>
                </div>
            </div>
        </header>
        <p>{{ $movie->overview }}</p>
    </section>
</x-layout>
