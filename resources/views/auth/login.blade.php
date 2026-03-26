<x-layout title="{{ __('auth.login') }}">
    <div class="flex min-h-[calc(100dvh-16rem)] items-center justify-center">
        <form action="/login" method="post">
            <h1>{{ __('auth.login') }}</h1>
            @csrf
            <x-form.field id="email" label="{{ __('auth.email') }}" type="email" />
            <x-form.field id="password" label="{{ __('auth.password') }}" type="password" />
            <button type="submit" class="btn w-full">{{ __('auth.login') }}</button>
        </form>
    </div>
</x-layout>
