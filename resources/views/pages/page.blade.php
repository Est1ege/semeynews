@extends('layouts.app')

@section('title', $newsItem->title)

@section('content')
    <article class="post panel">
        <h1>{{ $newsItem->title }}</h1>
        @if($newsItem->image)
            <img src="{{ asset('storage/' . $newsItem->image) }}" alt="{{ $newsItem->title }}">
        @endif
        <p>{{ $newsItem->content }}</p>

        <!-- Комментарии -->
        <h3>Комментарии</h3>
        @foreach($newsItem->comments as $comment)
            <div>
                <strong>{{ $comment->author_name }}</strong>
                <p>{{ $comment->comment }}</p>
            </div>
        @endforeach

        <!-- Форма добавления комментария -->
        <form action="{{ route('comment.store', $newsItem->id) }}" method="POST">
            @csrf
            <input type="text" name="author_name" placeholder="Ваше имя" required>
            <textarea name="comment" placeholder="Ваш комментарий" required></textarea>
            <button type="submit">Отправить</button>
        </form>
    </article>
@endsection
