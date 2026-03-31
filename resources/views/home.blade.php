<x-layout title="Home">
    <form action="/movies/search" method="post" class="flex rounded-full p-0 w-fit mx-auto mb-6 border-0">
        @csrf
        <input type="text" id="search" name="search" placeholder="{{ __('pages.search_placeholder') }}" value="{{ $search ?? '' }}" class="input rounded-l-full border-r-0 px-5">
        <button type="submit" class="input font-bold bg-indigo-400 hover:bg-indigo-500 rounded-r-full mt-0 transition-colors duration-300">
            <x-svg.search class="w-6 h-6"/>
        </button>
    </form>
    <section>
        <h1 class="text-3xl font-bold mb-6">{{ isset($search) ? __('pages.search_title') : __('pages.upcoming_title') }}</h1>
        <div class="grid grid-flow-row auto-rows-auto
            sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5
            gap-6 w-fit py-4 px-2 mx-auto">
            @foreach ($movies as $movie)
                <x-card :movie="$movie" />
            @endforeach
        </div>
    </section>
</x-layout>
