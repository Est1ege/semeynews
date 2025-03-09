<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Actions\PreviewNewsAction;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        View::composer('*', function ($view) {
            // Get all categories and make sure they use translations properly
            $categories = Category::all();
            
            // Ensure no raw arrays are being passed to views
            $view->with('categories', $categories);
        });

        Blade::directive('translate', function ($expression) {
            return "<?php echo is_array({$expression}) ? 
                        ({$expression}[app()->getLocale()] ?? {$expression}['ru'] ?? '') : 
                        {$expression}; ?>";
        });
    }
}
