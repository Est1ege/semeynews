<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'SemeyNews')</title>
        <meta name="description" content="SemeyNews">
        <meta name="theme-color" content="#2757fd">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="@yield('title', 'SemeyNews')">
    <meta property="og:description" content="@yield('meta_description', 'Новостной портал города Семей')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="@yield('og_image', asset('assets/images/logo/logo.jpg'))">
    <meta property="og:site_name" content="SemeyNews">

    <!-- Twitter Meta -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'SemeyNews')">
    <meta name="twitter:description" content="@yield('meta_description', 'Новостной портал города Семей')">
    <meta name="twitter:image" content="@yield('og_image', asset('assets/images/logo/logo.jpg'))">
    
        <!-- Preload styles -->
        <link rel="preload" href="{{ asset('assets/css/unicons.min.css') }}" as="style">
        <link rel="preload" href="{{ asset('assets/css/swiper-bundle.min.css') }}" as="style">
        

        <!-- Apply styles -->
        <link rel="stylesheet" href="{{ asset('assets/css/unicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
        <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css') }}">

        <!-- Preload scripts -->
        <link rel="preload" href="{{ asset('assets/js/libs/jquery.min.js') }}" as="script">
        <link rel="preload" href="{{ asset('assets/js/libs/scrollmagic.min.js') }}" as="script">
        <link rel="preload" href="{{ asset('assets/js/libs/swiper-bundle.min.js') }}" as="script">
        <link rel="preload" href="{{ asset('assets/js/libs/anime.min.js') }}" as="script">
        <link rel="preload" href="{{ asset('assets/js/helpers/data-attr-helper.js') }}" as="script">
        <link rel="preload" href="{{ asset('assets/js/helpers/swiper-helper.js') }}" as="script">
        <link rel="preload" href="{{ asset('assets/js/helpers/anime-helper.js') }}" as="script">
        <link rel="preload" href="{{ asset('assets/js/helpers/anime-helper-defined-timelines.js') }}" as="script">
        <link rel="preload" href="{{ asset('assets/js/uikit-components-bs.js') }}" as="script">
        <link rel="preload" href="{{ asset('assets/js/app.js') }}" as="script">

        <!-- Apply scripts -->
        <script src="{{ asset('assets/js/libs/jquery.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/libs/scrollmagic.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/libs/swiper-bundle.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/libs/anime.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/helpers/data-attr-helper.js') }}" defer></script>
        <script src="{{ asset('assets/js/helpers/swiper-helper.js') }}" defer></script>
        <script src="{{ asset('assets/js/helpers/anime-helper.js') }}" defer></script>
        <script src="{{ asset('assets/js/helpers/anime-helper-defined-timelines.js') }}" defer></script>
        <script src="{{ asset('assets/js/uikit-components-bs.js') }}" defer></script>
        <script src="{{ asset('assets/js/app.js') }}" defer></script>

        <script src="{{ asset('assets/js/app-head-bs.js') }}" defer></script>

        <link rel="stylesheet" href="{{ asset('assets/js/uni-core/css/uni-core.min.css') }}">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('assets/css/unicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/prettify.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/theme/demo-two.min.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('assets/js/libs/jquery.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/libs/swiper-bundle.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/app.js') }}" defer></script>
        <script src="{{ asset('assets/js/uni-core/js/uni-core-bundle.min.js') }}" defer></script>
    </head>
    <body class="uni-body panel bg-white text-gray-900 dark:bg-black dark:text-gray-200 overflow-x-hidden">
        
        @include('partials.header')

        <!-- Header end -->

        <!-- Main Content -->
            @yield('content')

        <!-- Footer -->
        @include('partials.footer')

        <script src="{{ asset('assets/js/uni-core/js/uni-core-bundle.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/uikit-components-bs.js') }}" defer></script>
        <script src="{{ asset('assets/js/app.js') }}" defer></script>

    </body>
</html>
