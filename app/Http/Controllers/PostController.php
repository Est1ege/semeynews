<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // Общий список постов с пагинацией
        $posts = Post::latest()->paginate(10);

        // Категории с постами
        $categories = Category::with('posts')->get();

        // Самые просматриваемые посты
        $mostWatchedPosts = Post::orderBy('views', 'desc')->take(3)->get();

        // Передача всех данных в представление
        return view('posts.index', compact('posts', 'categories', 'mostWatchedPosts'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        // Увеличить количество просмотров
        $post->increment('views');

        return view('posts.show', compact('post'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
            'category_id' => 'required|exists:categories,id'
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('post_images', 'public') : null;

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
            'category_id' => $request->category_id
        ]);

        return redirect()->route('blog.index')->with('success', 'Пост добавлен!');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
            'category_id' => 'required|exists:categories,id'
        ]);

        $post = Post::findOrFail($id);

        if ($request->file('image')) {
            $imagePath = $request->file('image')->store('post_images', 'public');
            $post->image = $imagePath;
        }

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id
        ]);

        return redirect()->route('blog.index')->with('success', 'Пост обновлен!');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('blog.index')->with('success', 'Пост удален!');
    }

    public function addComment(Request $request, $postId)
    {
        $request->validate([
            'author_name' => 'required|string|max:255',
            'comment' => 'required|string'
        ]);

        Comment::create([
            'post_id' => $postId,
            'author_name' => $request->author_name,
            'comment' => $request->comment
        ]);

        return redirect()->route('blog.show', $postId)->with('success', 'Комментарий добавлен!');
    }
}