<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Передаем категории с загруженными подкатегориями во все шаблоны
        View::composer(['layouts.*', 'components.*', 'pages.*'], function ($view) {
            // Кэшируем категории на 1 час для улучшения производительности
            $categories = Cache::remember('categories_with_children', 3600, function () {
                return Category::with('children')
                    ->whereNull('parent_id') // Только корневые категории
                    ->orderBy('order')
                    ->get();
            });
            
            $view->with('categories', $categories);
        });
    }
}