<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationFormRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(RegistrationFormRequest $request)
    {
        $attributes = $request->validated();
        $user = User::create($attributes);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect('/');
    }
}
