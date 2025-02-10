<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $news_id)
    {
        $request->validate([
            'author_name' => 'required|max:255',
            'comment' => 'required',
        ]);

        Comment::create([
            'news_id' => $news_id,
            'author_name' => $request->author_name,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Комментарий добавлен!');
    }
}
