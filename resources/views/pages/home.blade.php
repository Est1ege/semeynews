@extends('layouts.app')

@section('title', 'Главная страница')

@section('content')
    <!-- Динамический вывод новостей
    <div class="section panel overflow-hidden">
        <div class="container max-w-xl">
            <div class="section-inner panel vstack gap-4">
                @foreach($newsList as $news)
                    <article class="post panel vstack gap-3">
                        <h3 class="post-title h5 m-0">
                            <a href="{{ route('news.show', $news->id) }}">{{ $news->title }}</a>
                        </h3>
                        @if($news->image)
                            <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="img-fluid">
                        @endif
                        <p>{{ Str::limit($news->content, 150) }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </div> -->

    <!-- Включение дополнительных блоков -->
    <div id="wrapper" class="wrap overflow-hidden-x">
        @include('partials.slider-posts')
        @include('partials.tv-posts')
        @include('partials.trending-posts')
        @include('partials.category-posts')
        @include('partials.national-posts')
        @include('partials.opinions')
    </div>
@endsection

@push('scripts')
    <!-- jQuery & Bootstrap -->
    <script src="{{ asset('assets/js/libs/jquery.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/libs/bootstrap.min.js') }}" defer></script>

    <!-- Библиотеки -->
    <script src="{{ asset('assets/js/libs/anime.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/libs/swiper-bundle.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/libs/scrollmagic.min.js') }}" defer></script>

    <!-- Вспомогательные скрипты -->
    <script src="{{ asset('assets/js/helpers/data-attr-helper.js') }}" defer></script>
    <script src="{{ asset('assets/js/helpers/swiper-helper.js') }}" defer></script>
    <script src="{{ asset('assets/js/helpers/anime-helper.js') }}" defer></script>
    <script src="{{ asset('assets/js/helpers/anime-helper-defined-timelines.js') }}" defer></script>
    <script src="{{ asset('assets/js/uikit-components-bs.js') }}" defer></script>

    <!-- Основной скрипт приложения -->
    <script src="{{ asset('assets/js/app.js') }}" defer></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const getSchema = urlParams.get("schema");
            
            if (getSchema === "dark") {
                setDarkMode(1);
            } else if (getSchema === "light") {
                setDarkMode(0);
            }
        });
    </script>
@endpush
