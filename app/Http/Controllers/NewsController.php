<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use App\Models\Category;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Общий список новостей с пагинацией
        $newsList = News::latest()->paginate(5);

        // Категория "Opinions"
        $opinions = News::where('category_id', 7)->latest()->take(8)->get();

        // Категории Global и National
        $globalPosts = News::where('category_id', 1)->latest()->take(5)->get();
        $nationalPosts = News::where('category_id', 2)->latest()->take(5)->get();

        // Категории с постами
        $categories = Category::with('posts')->get();

        // Самые просматриваемые посты
        $mostWatchedPosts = News::orderBy('views', 'desc')->take(3)->get();

        // Посты по категории Politics
        $politicsCategory = Category::where('name', 'Politics')->first();

        if ($politicsCategory) {
            $politicsPosts = News::where('category_id', $politicsCategory->id)->latest()->take(2)->get();
        } else {
            $politicsPosts = collect(); // Возвращаем пустую коллекцию, если категория не найдена
        }

        // TV посты
        $tvCategory = Category::where('name', 'TV')->first();
        $featuredPost = News::where('is_featured', true)->first();
        $tvPosts = News::where('category_id', optional($tvCategory)->id)->latest()->take(4)->get();

        // Посты для слайдера
        $sliderPosts = News::latest()->take(5)->get();

        // Категория "Most Watched"
        $mostWatchedCategory = Category::where('name', 'Most Watched')->first();

        $trendingPosts = News::where('is_trending', true)->latest()->take(5)->get();

        if ($trendingPosts->isEmpty()) {
            $trendingPosts = collect(); // Создание пустой коллекции для предотвращения ошибок
        }

        // Передача всех данных в представление
        return view('pages.home', compact(
            'newsList', 
            'opinions', 
            'globalPosts',
            'trendingPosts', 
            'nationalPosts', 
            'categories',
            'mostWatchedCategory',  // Добавляем эту переменную 
            'mostWatchedPosts',
            'politicsCategory',   // Добавляем переменную 
            'politicsPosts', 
            'featuredPost',
            'tvCategory', 
            'tvPosts', 
            'sliderPosts'
        ));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('news_images', 'public') : null;

        News::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath
        ]);

        return redirect()->route('news.index')->with('success', 'Новость добавлена!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        $newsItem = News::findOrFail($id);
        return view('pages.post', compact('newsItem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $newsItem = News::findOrFail($id);
        return view('news.edit', compact('newsItem'));
    }

    public function category($id) {
        $category = Category::with('news')->findOrFail($id);
        return view('pages.category', compact('category'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        $newsItem = News::findOrFail($id);

        if ($request->file('image')) {
            $imagePath = $request->file('image')->store('news_images', 'public');
            $newsItem->image = $imagePath;
        }

        $newsItem->update([
            'title' => $request->title,
            'content' => $request->content
        ]);

        return redirect()->route('news.index')->with('success', 'Новость обновлена!');
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $newsItem = News::findOrFail($id);
        $newsItem->delete();

        return redirect()->route('news.index')->with('success', 'Новость удалена!');
    }
}
