@extends('layouts.app')

@section('title', $category->name)

@section('content')
    <h1>Категория: {{ $category->name }}</h1>
    <div class="posts">
        @foreach($category->news as $news)
            <div>
                <h2><a href="{{ route('news.show', $news->id) }}">{{ $news->title }}</a></h2>
                <p>{{ Str::limit($news->content, 100) }}</p>
            </div>
        @endforeach
    </div>
@endsection
