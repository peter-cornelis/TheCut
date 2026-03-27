<x-layout title="Home">
    <section>
        <h1 class="text-3xl font-bold mb-6">{{ __('pages.upcoming_title') }}</h1>
        <div class="grid grid-flow-row auto-rows-auto
            sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5
            gap-6 w-fit py-4 px-2 mx-auto">
            @foreach ($movies as $movie)
                <x-card :movie="$movie" />
            @endforeach
        </div>
    </section>
</x-layout>
