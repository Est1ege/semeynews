<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Получаем текущую локаль
        $locale = app()->getLocale();
        
        // Общий список новостей с пагинацией
        $newsList = News::latest()->paginate(5);

        // Категория "Opinions" (используем ID)
        $opinions = News::where('category_id', 7)->latest()->take(8)->get();

        // Категории Global и National (используем ID)
        $globalPosts = News::where('category_id', 1)->latest()->take(5)->get();
        $nationalPosts = News::where('category_id', 2)->latest()->take(5)->get();

        // Категории с постами
        $categories = Category::with('posts')->get();

        // Самые просматриваемые посты
        $mostWatchedPosts = News::orderBy('views', 'desc')->take(3)->get();

        // Для категорий используем ID вместо поиска по имени
        $politicsCategory = Category::find(3); // Предполагаем, что ID равен 3
        
        if ($politicsCategory) {
            $politicsPosts = News::where('category_id', $politicsCategory->id)->latest()->take(2)->get();
        } else {
            $politicsPosts = collect();
        }

        // TV посты
        $tvCategory = Category::find(4); // Предполагаем, что ID равен 4
        $featuredPost = News::where('is_featured', true)->first();
        $tvPosts = News::where('category_id', $tvCategory?->id)->latest()->take(4)->get();

        // Посты для слайдера
        $sliderPosts = News::latest()->take(5)->get();

        // Most Watched категория
        $mostWatchedCategory = Category::find(5); // Предполагаем, что ID равен 5

        $trendingPosts = News::where('is_trending', true)->latest()->take(5)->get();

        if ($trendingPosts->isEmpty()) {
            $trendingPosts = collect();
        }

        // Передача всех данных в представление
        return view('pages.home', compact(
            'newsList', 
            'opinions', 
            'globalPosts',
            'trendingPosts', 
            'nationalPosts', 
            'categories',
            'mostWatchedCategory',
            'mostWatchedPosts',
            'politicsCategory',
            'politicsPosts', 
            'featuredPost',
            'tvCategory', 
            'tvPosts', 
            'sliderPosts'
        ));
    }
    
    /**
     * Display the specified resource.
     */
    public function show($id) {
        try {
            $post = News::findOrFail($id);
            
            // Временное решение для корректного отображения изображений с длинными именами
            if ($post->image) {
                $imageExists = file_exists(storage_path('app/public/' . $post->image));
                
                // Если имя файла слишком длинное или содержит специальные символы
                if (strlen($post->image) > 100 || strpos($post->image, 'meta') !== false) {
                    // Создаем временное изображение с коротким именем
                    $originalPath = storage_path('app/public/' . $post->image);
                    $newFileName = 'news_images/' . Str::uuid() . '.jpg';
                    $newPath = storage_path('app/public/' . $newFileName);
                    
                    // Копируем файл, если он существует
                    if ($imageExists && !file_exists($newPath)) {
                        \File::copy($originalPath, $newPath);
                        
                        // Временно подменяем путь для отображения
                        $post->tempImageUrl = asset('storage/' . $newFileName);
                    }
                }
            }
            
            $relatedPosts = News::where('category_id', $post->category_id ?? 0)
                             ->where('id', '!=', $post->id)
                             ->take(1)
                             ->get();
            
            return view('pages.post', compact('post', 'relatedPosts'));
        } catch (\Exception $e) {
            return response()->view('errors.custom', ['error' => $e->getMessage()], 500);
        }
    }

    public function category($id) {
        $category = Category::findOrFail($id);
        $posts = News::where('category_id', $category->id)
                    ->latest()
                    ->paginate(15);
        
        return view('pages.category', compact('category', 'posts'));
    }

    public function vote(Request $request)
    {
        return redirect()->back()->with('success', 'Ваш голос принят!');
    }

    public function archive()
    {
        return view('pages.archive');
    } 
}