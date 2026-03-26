@props(['title'])
<div
    {{ $attributes->merge(['class' => 'absolute flex items-center justify-center top-0 left-0 w-full h-full bg-black/90']) }}
    onclick="this.classList.add('hidden'); document.getElementById('trailer').src = ''"
>
    <iframe id="trailer" class="max-w-5xl w-full h-fit aspect-video shadow-lg shadow-black/50 rounded-lg" title="{{ $title }} trailer" allowfullscreen></iframe>
</div>
