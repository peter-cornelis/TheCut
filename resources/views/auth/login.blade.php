<x-layout title="Login">
    <div class="flex min-h-[calc(100dvh-16rem)] items-center">
        <form action="" method="post">
            <h1>Login</h1>
            @csrf
            <x-form.field id="email" label="Email" type="email" />
            <x-form.field id="password" label="Password" type="password" />
            <button type="submit" class="btn w-full">Login</button>
        </form>
    </div>
</x-layout>
