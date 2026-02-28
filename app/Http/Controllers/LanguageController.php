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

        return redirect()->back();
    }
}
