<x-layout title="{{ $movie->title }}">
    <section class="max-w-5xl mx-auto px-6 py-8">
        <header class="bg-cover bg-center rounded-md mb-6 h-64 shadow-lg shadow-black/50"
            style="background-image: url('{{ $movie->backdrop_url }}');">
            <div class="grid grid-cols-[auto_1fr] w-full h-full bg-black/70 rounded-md">
                <div class="relative">
                    <img class="h-64 object-cover rounded-l-md shadow-lg shadow-black/50" src="{{ $movie->poster_url }}" alt="{{ $movie->title }} poster">
                    @if(auth()->user()->movies->contains($movie->id))
                        <button class="btn-circle h-9 bg-rose-400 absolute bottom-2 left-1/2 -translate-x-1/2">
                            <x-svg.remove class="w-6 h-6" />
                        </button>
                    @else
                        <button class="btn-circle h-9 bg-emerald-400 absolute bottom-2 left-1/2 -translate-x-1/2">
                            <x-svg.add class="w-6 h-6" />
                        </button>
                    @endif
                </div>
                <div class="grid grid-rows-[auto_1fr_auto] py-4 px-6 h-full">
                    <h1 class="text-left font-bold mb-4">{{ $movie->title }}</h1>
                    <p class="text-sm">{{$movie->status === 'Released' ? __('pages.released') : __('pages.expected') }} {{ $movie->release_date }}</p>
                    <div class="flex justify-between h-fit mt-auto">
                        @if($movie->trailer)
                            <button class="btn-inline ring-rose-500 w-fit my-auto"
                                onclick="document.getElementById('trailer-container').classList.remove('hidden'); document.getElementById('trailer').src = '{{ $movie->trailer }}'">
                                {{ __('pages.trailer') }}
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
