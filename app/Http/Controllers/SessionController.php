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

        return back();
    }

    public function destroy()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }

    public function generateApiKey()
    {
        $user = Auth::user();
        $token = $user->createToken('my-list')->plainTextToken;


        return response()->json(['message' => __('flash.api_key_generated'), 'token' => $token]);
    }
}
