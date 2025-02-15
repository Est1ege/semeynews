<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
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
     */
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts = Post::where('category_id', $category->id)
                     ->where('status', 'PUBLISHED')
                     ->latest()
                     ->paginate(10);

        return view('categories.show', compact('category', 'posts'));
    }
}
