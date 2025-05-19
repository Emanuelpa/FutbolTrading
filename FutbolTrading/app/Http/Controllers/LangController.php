<?php

// Emanuel Patiño

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LangController extends Controller
{
    public function switchLanguage(): RedirectResponse
    {
        $current = session('locale', config('app.locale'));

        if ($current === 'es') {
            session()->put('locale', 'en');
        } else {
            session()->put('locale', 'es');
        }

        return redirect()->back();
    }
}
