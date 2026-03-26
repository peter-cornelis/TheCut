@props(['title'])
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background text-foreground">
    <header class="sticky top-0 z-100 bg-card border-b border-border shadow-md shadow-black/50">
        <x-layout.nav />
    </header>
    <main class="max-w-7xl mx-auto px-6 py-10">
        {{ $slot }}
    </main>
</body>
</html>
