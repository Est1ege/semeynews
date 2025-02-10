<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PollController extends Controller
{
    public function vote(Request $request)
    {
        $selectedOptions = $request->input('options', []);

        // Логика для сохранения голосов (например, в базе данных)
        // ...

        return back()->with('success', 'Thank you for voting!');
    }

    public function archive()
    {
        // Логика для отображения архива опросов
        return view('poll.archive');
    }
}
