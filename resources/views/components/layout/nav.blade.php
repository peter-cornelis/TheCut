<nav class="flex items-center justify-between max-w-7xl mx-auto px-6 py-4">
    <ul class="flex items-center gap-4">
        <li>
            <a href="/" class="text-3xl font-bold flex items-center" aria-label="{{ __('nav.home') }}">🎬 The Cut</a>
        </li>
    </ul>
    <ul class="relative flex items-center gap-4">
    @auth
        <li>
            <a href="/logout" class="btn-inline">{{ __('nav.logout') }}</a>
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
