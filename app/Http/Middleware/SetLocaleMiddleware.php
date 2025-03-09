<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocaleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Получаем локаль из сессии
        if (Session::has('locale')) {
            $locale = Session::get('locale');
        } else {
            // Или устанавливаем дефолтную локаль
            $locale = config('app.locale', 'ru');
        }
        
        // Проверяем, что локаль поддерживается
        if (!in_array($locale, config('app.available_locales', ['ru', 'kk']))) {
            $locale = config('app.locale', 'ru');
        }
        
        // Устанавливаем локаль приложения
        App::setLocale($locale);
        
        return $next($request);
    }
}