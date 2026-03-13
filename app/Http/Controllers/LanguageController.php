<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function changeLanguage(Request $request)
    {
        $request->validate([
            'locale' => 'required|in:en,ar'
        ]);

        session(['locale' => $request->locale]);

        $previousUrl = url()->previous();
        $previousHost = parse_url($previousUrl, PHP_URL_HOST);
        $previousScheme = strtolower((string) parse_url($previousUrl, PHP_URL_SCHEME));

        if ($previousHost === $request->getHost() && in_array($previousScheme, ['http', 'https'], true)) {
            return redirect()->to($previousUrl);
        }

        return redirect()->route('home');
    }
}
