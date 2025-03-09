@extends('layouts.app')

@section('title', $post->title)

@section('content')

<div id="wrapper" class="wrap overflow-hidden-x">
    <div class="breadcrumbs panel z-1 py-2 bg-gray-25 dark:bg-gray-100 dark:bg-opacity-5 dark:text-white">
        <div class="container max-w-xl">
            <ul class="breadcrumb nav-x justify-center gap-1 fs-7 sm:fs-6 m-0">
                <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                <li><i class="unicon-chevron-right opacity-50"></i></li>
                @if($post->category)
                    <li><a href="{{ route('blog.category', $post->category->id) }}">{{ $post->category->name }}</a></li>
                    <li><i class="unicon-chevron-right opacity-50"></i></li>
                @endif
                <li><span class="opacity-50">{{ $post->title }}</span></li>
            </ul>
        </div>
    </div>

    <article class="post type-post single-post py-4 lg:py-6 xl:py-9">
        <div class="container max-w-xl">
            <div class="post-header">
                <div class="panel vstack gap-4 md:gap-6 xl:gap-8 text-center">
                    <div class="panel vstack items-center max-w-400px sm:max-w-500px xl:max-w-md mx-auto gap-2 md:gap-3">
                        <h1 class="h4 sm:h2 lg:h1 xl:display-6">{{ $post->title }}</h1>
                        @include('partials.social-share')
                    </div>
                    
                    <figure class="featured-image m-0">
                        <figure class="ratio ratio-2x1 rounded uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                            <img class="media-cover image uc-transition-scale-up uc-transition-opaque" 
                                 src="{{ $post->image ? asset('storage/' . $post->image) : asset('assets/images/common/img-fallback.png') }}" 
                                 alt="{{ $post->title }}" 
                                 data-uc-img="loading: lazy">
                        </figure>
                    </figure>
                </div>
            </div>

            <div class="panel mt-4 lg:mt-6 xl:mt-9">
                <div class="container max-w-lg">
                    <div class="post-content panel fs-6 md:fs-5" data-uc-lightbox="animation: scale">
                        {!! $post->content !!}
                    </div>

                    @include('partials.post-navigation')
                    
                </div>
            </div>
        </div>
    </article>

</div>
@endsection