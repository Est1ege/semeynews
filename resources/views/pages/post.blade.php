@extends('layouts.app')

@section('title', "Post")

@section('content')
<!-- Wrapper start -->
<div id="wrapper" class="wrap overflow-hidden-x">
    <!-- Breadcrumbs -->
    <div class="breadcrumbs panel z-1 py-2 bg-gray-25 dark:bg-gray-100 dark:bg-opacity-5 dark:text-white">
        <div class="container max-w-xl">
            <ul class="breadcrumb nav-x justify-center gap-1 fs-7 sm:fs-6 m-0">
                <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                <li><i class="unicon-chevron-right opacity-50"></i></li>
                <li><a href="{{ route('blog.index') }}">{{ __('Blog') }}</a></li>
                <li><i class="unicon-chevron-right opacity-50"></i></li>
                @if($post->category)
                    <li><a href="{{ route('blog.category', $post->category->slug) }}">{{ $post->category->name }}</a></li>
                    <li><i class="unicon-chevron-right opacity-50"></i></li>
                @endif
                <li><span class="opacity-50">{{ $post->title }}</span></li>
            </ul>
        </div>
    </div>

    <article class="post type-post single-post py-4 lg:py-6 xl:py-9">
        <div class="container max-w-xl">
            <!-- Post Header -->
            <div class="post-header">
                <div class="panel vstack gap-4 md:gap-6 xl:gap-8 text-center">
                    <div class="panel vstack items-center max-w-400px sm:max-w-500px xl:max-w-md mx-auto gap-2 md:gap-3">
                        <h1 class="h4 sm:h2 lg:h1 xl:display-6">{{ $post->title }}</h1>
                        @include('partials.social-share')
                    </div>
                    
                    <!-- Featured Image -->
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

            <!-- Post Content -->
            <div class="panel mt-4 lg:mt-6 xl:mt-9">
                <div class="container max-w-lg">
                    <div class="post-content panel fs-6 md:fs-5" data-uc-lightbox="animation: scale">
                        {!! $post->content !!}
                    </div>

                    <!-- Post Footer -->
                    <div class="post-footer panel vstack sm:hstack gap-3 justify-between border-top py-4 mt-4 xl:py-9 xl:mt-9">
                        <ul class="nav-x gap-narrow text-primary">
                            <li><span class="text-black dark:text-white me-narrow">{{ __('Tags') }}:</span></li>
                            @foreach($post->tags as $tag)
                                <li>
                                    <a href="{{ route('blog.tag', $tag->slug) }}" 
                                       class="uc-link gap-0 dark:text-white">
                                        {{ $tag->name }}@if(!$loop->last)<span class="text-black dark:text-white">,</span>@endif
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Author Info -->
                    @include('partials.author', ['author' => $post->author])

                    <!-- Post Navigation -->
                    @include('partials.post-navigation')

                    <!-- Related Posts -->
                    @include('partials.related-posts', ['relatedPosts' => $relatedPosts])

                    <!-- Comments -->
                    @include('partials.comments', ['comments' => $post->comments])

                    <!-- Comment Form -->
                    @include('partials.comment-form', ['post' => $post])
                </div>
            </div>
        </div>
    </article>
</div>
<!-- Wrapper end -->
@endsection
