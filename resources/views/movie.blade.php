<x-layout title="{{ $movie->title }}">
    <section class="max-w-5xl mx-auto px-6 py-8">
        <header class="bg-cover bg-center rounded-md mb-6 h-64 shadow-lg shadow-black/50"
            style="background-image: url('{{ $movie->backdrop_url }}');">
            <div class="grid grid-cols-[auto_1fr] w-full h-full bg-black/70 rounded-md">
                <div class="relative">
                    <img class="h-64 object-cover rounded-l-md shadow-lg shadow-black/50" src="{{ $movie->poster_url }}" alt="{{ $movie->title }} poster">
                    <div id="movie-action">
                        @auth
                            <form id="remove-movie-form" class="action-form absolute bottom-2 left-1/2 -translate-x-1/2" action="/movies/{{ $movie->id }}/remove" method="post">
                                @csrf
                                <button type="submit" onclick="toggleMovie(event, {{ $movie->id }}, 'remove')" class="btn-circle h-9 bg-rose-400">
                                    <x-svg.remove class="w-6 h-6" />
                                </button>
                            </form>
                            <form id="add-movie-form" class="action-form absolute bottom-2 left-1/2 -translate-x-1/2" action="/movies/{{ $movie->id }}/add" method="post">
                                @csrf
                                <button type="submit" onclick="toggleMovie(event, {{ $movie->id }}, 'add')" class="btn-circle h-9 bg-emerald-400">
                                    <x-svg.add class="w-6 h-6" />
                                </button>
                            </form>
                        @endauth
                    </div>
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
    <script>
        if (@json(auth()->check())) {
            let isInList = @json(auth()->user()?->movies->contains($movie->id));

            _inMovieList(isInList);
        }

        async function toggleMovie(event, id, action) {
            event.preventDefault();
            const response = await fetch(`/movies/${id}/${action}`, {
                method: 'POST',
                headers: { 'Accept': 'application/json' },
                body: new FormData(document.getElementById(`${action}-movie-form`)),
            });
            const result = await response.json();
            if (!response.ok) {
                console.log('An error occurred while adding the movie!');
                return;
            }
            if (!result.success) {
                console.log(result.error);
                isInList = action === 'add';
            } else {
                console.log(result.message);
                isInList = action === 'add';
            }
            _inMovieList(isInList);
        }

        function _inMovieList(isInList) {
            if( isInList ) {
                document.getElementById('add-movie-form').classList.add('hidden');
                document.getElementById('remove-movie-form').classList.remove('hidden');
            } else {
                document.getElementById('add-movie-form').classList.remove('hidden');
                document.getElementById('remove-movie-form').classList.add('hidden');
            }
        }
    </script>
</x-layout>
