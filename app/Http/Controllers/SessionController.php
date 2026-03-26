<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginFormRequest $request)
    {
        $attributes = $request->validated();
        if (Auth::attempt($attributes)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors([
            'email' => __('auth.failed'),
        ]);
    }

    public function destroy()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
