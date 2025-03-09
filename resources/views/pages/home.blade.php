@extends('layouts.app')

@section('title', 'Главная страница')

@section('content')
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
