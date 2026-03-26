<x-layout title="{{ __('auth.register') }}">
    <div class="flex min-h-[calc(100dvh-16rem)] items-center">
        <form action="/register" method="post">
            <h1>{{ __('auth.register') }}</h1>
            @csrf
            <x-form.field id="name" label="{{ __('auth.name') }}" type="text" />
            <x-form.field id="email" label="{{ __('auth.email') }}" type="email" />
            <x-form.field id="password" label="{{ __('auth.password') }}" type="password" autocomplete="new-password" />
            <x-form.field id="password_confirmation" label="{{ __('auth.confirm_password') }}" type="password" autocomplete="new-password" />
            <button type="submit" class="btn w-full">{{ __('auth.register') }}</button>
        </form>
    </div>
</x-layout>
