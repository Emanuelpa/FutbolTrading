<?php

// Emanuel Patiño

namespace App\Http\Controllers;

class LangController extends Controller
{
    public function switchLanguage($locale)
    {
        logger("llego desde la ruta {$locale}");
        if (!in_array($locale, ['en', 'es'])) {
            abort(400);
        }

        session(['locale' => $locale]);

        return redirect()->back();
    }
}
