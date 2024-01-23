<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function LanguageSwitch(Request $request, $language): \Illuminate\Http\RedirectResponse
    {
        $request->session()->put('language', $language);
        return redirect()->back();
    }
}
