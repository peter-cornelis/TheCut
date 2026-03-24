<nav class="flex items-center justify-between max-w-7xl mx-auto px-6 py-4">
    <ul class="flex items-center gap-4">
        <li>
            <a href="/" class="text-3xl font-bold flex items-center">
                🎬 The Cut
            </a>
        </li>
    </ul>
    <ul class="flex items-center gap-4">
    @auth
        <li><a href="/logout" class="btn-inline">Logout</a></li>
    @else
        <li><a href="/login" class="btn">Login</a></li>
    @endauth
        <li><a href="/toggle-locale" class="btn-circle text-xs">EN</a></li>
    </ul>
</nav>
