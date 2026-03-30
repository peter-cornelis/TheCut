<nav class="flex items-center justify-between max-w-7xl mx-auto px-6 py-4">
    <ul class="flex items-center gap-4">
        <li>
            <a href="/" class="text-3xl font-bold flex items-center" aria-label="{{ __('nav.home') }}">🎬 The Cut</a>
        </li>
        @auth
            <li>
                <a href="/movie-list" class="text-sm font-medium text-foreground/50 hover:text-foreground transition-colors duration-300">{{ __('nav.list') }}</a>
            </li>
        @endauth
    </ul>
    <ul class="flex items-center gap-4">
    @auth
        <li class="relative flex items-center justify-center">
            <button type="button" id="user-menu-button" onclick="UserMenuHandler.toggleMenu()" class="btn-circle bg-border hover:bg-indigo-400 text-foreground transition-discrete duration-300">
                <x-svg.user class="w-6 h-6" />
            </button>
            <ul id="user-settings" class="hidden absolute top-10 -left-30 gap-2 min-w-40 bg-background text-foreground rounded-md shadow-lg shadow-black/50 p-2 border border-border">
                <h2 class="opacity-60 text-center border-b border-border pb-1">{{ __('nav.api_management') }}</h2>
                <li>
                    <button type="submit" onclick="UserMenuHandler.generateApiKey(event)" class="btn w-full bg-emerald-400 hover:bg-emerald-500" form="generate-token-form">
                        <x-svg.token class="w-4 h-4 mr-1" />
                        New
                    </button>
                    <form id="generate-token-form" action="/api-keys" method="post" class="hidden">
                        @csrf
                    </form>
                </li>
                <li class="border-t border-border pt-2">
                    <button type="submit" class="btn-inline w-full" form="logout-form">{{ __('nav.logout') }}</button>
                    <form id="logout-form" action="/logout" method="post" class="hidden">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    @else
        <li>
            <a href="/register" class="btn-inline">{{ __('nav.register') }}</a>
        </li>
        <li>
            <a href="/login" class="btn-inline">{{ __('nav.login') }}</a>
        </li>
    @endauth
        <li class="relative w-12 h-6 flex gap-1 items-center cursor-pointer">
            <ul id="language-dropdown" class="dropdown">
                <li class="flex items-center gap-1 pl-2 pr-1 py-1 hover:bg-card text-transparent hover:text-foreground/50 rounded-t">
                    @if (app()->getLocale() === 'en')
                        <x-svg.en class="w-4 bg-card rounded-xs shadow ring ring-border"/>
                    @else
                        <x-svg.nl class="w-4 bg-card rounded-xs shadow ring ring-border"/>
                    @endif
                    <x-svg.down class="w-4 h-4 transition-colors duration-500"/>
                </li>
                <li class="hidden dropdown-item">
                    @if (app()->getLocale() !== 'en')
                        <a href="/language/en" class="w-full h-full" aria-label="{{ __('nav.switch_language') }} {{ __('nav.english') }}">
                            <x-svg.en class="w-4 bg-card rounded-xs shadow ring ring-border"/>
                        </a>
                    @else
                        <a href="/language/nl" class="w-full h-full" aria-label="{{ __('nav.switch_language') }} {{ __('nav.dutch') }}">
                            <x-svg.nl class="w-4 bg-card rounded-xs shadow ring ring-border"/>
                        </a>
                    @endif
                </li>
            </ul>
        </li>
    </ul>
</nav>
