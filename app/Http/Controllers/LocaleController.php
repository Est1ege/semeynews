<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    /**
     * Switch the application locale
     */
    public function switchLocale(string $locale): \Illuminate\Http\RedirectResponse
    {
        $availableLocales = config('app.available_locales', ['ru', 'kk']);
        
        // Проверяем, что запрошенная локаль поддерживается
        if (!in_array($locale, $availableLocales)) {
            $locale = config('app.locale', 'ru');
        }

        // Сохраняем локаль в сессии
        Session::put('locale', $locale);
        
        // Возвращаемся на предыдущую страницу
        return redirect()->back();
    }
}