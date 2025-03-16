<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    
    /**
     * Change the language of the application
     * @param mixed $locale
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function change($locale)
    {
        if (!in_array($locale, ['en', 'vi'])) {
            $locale = 'vi';
        }

        Session::put('locale', $locale);
        return redirect()->back();
    }
}
