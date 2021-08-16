<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function change(Request $request, $language)
    {
        
        App::setLocale($language);
        session()->put('language', $language);

        return redirect()->back();
    }
}
