<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cookie;

class LanguageController extends Controller
{
    public function switch($locale)
    {
        if (! in_array($locale, config('app.locales'))) {
            abort(400);
        }

        Cookie::queue('language', $locale, 525600);

        return redirect()->back();
    }
}
