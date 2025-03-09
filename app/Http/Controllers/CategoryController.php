<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /** 
     * Отобразить список всех категорий.
     */
    public function index()
    {
        $categories = Category::withCount('posts')->get(); // Загружаем категории и считаем количество постов
        return view('categories.index', compact('categories'));
    }

    /**
     * Отобразить посты по категории.
     * Метод изменен для работы с ID категории вместо slug
     */
    public function show($id)
    {
        // Находим категорию по ID вместо slug
        $category = Category::findOrFail($id);
        
        // Получаем посты для этой категории, используя модель News вместо Post
        $posts = News::where('category_id', $category->id)
                     ->latest()
                     ->paginate(15);
        
        // Передаем данные в шаблон
        return view('pages.category', compact('category', 'posts'));
    }
}