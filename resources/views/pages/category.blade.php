@extends('layouts.app')

@section('content')
<div id="wrapper" class="wrap overflow-hidden-x">
    <div class="breadcrumbs panel z-1 py-2 bg-gray-25 dark:bg-gray-100 dark:bg-opacity-5 dark:text-white">
        <div class="container max-w-xl">
            <ul class="breadcrumb nav-x justify-center gap-1 fs-7 sm:fs-6 m-0">
                <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                <li><i class="unicon-chevron-right opacity-50"></i></li>
                <li><span class="opacity-50">{{ $category->name ?? $category->name }}</span></li>
            </ul>
        </div>
    </div>

    <div class="section py-3 sm:py-6 lg:py-9">
        <div class="container max-w-xl">
            <div class="panel vstack gap-3 sm:gap-6 lg:gap-9">
                <header class="page-header panel vstack text-center">
                    <h1 class="h3 lg:h1">{{ __('Category') }}: {{ $category->name }}</h1>
                    <span class="m-0 opacity-60">
                        {{ __('Showed') }} {{ $posts->count() }} {{ __('posts out of') }} {{ $posts->total() }} {{ __('total under') }} <br class="d-block lg:d-none">
                        "{{ $category->name }}" {{ __('category') }}.
                    </span>
                </header>
                <div class="row g-4 xl:g-8">
                    <div class="col">
                        <div class="panel text-center">
                            <div class="row child-cols-12 sm:child-cols-6 lg:child-cols-4 col-match gy-4 xl:gy-6 gx-2 sm:gx-4">
                                @foreach($posts as $post)
                                <div>
                                    <article class="post type-post panel vstack gap-2">
                                        <div class="post-image panel overflow-hidden">
                                            <figure class="featured-image m-0 ratio ratio-16x9 rounded uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                                                <img class="media-cover image uc-transition-scale-up uc-transition-opaque" 
                                                    src="{{ asset('assets/images/common/img-fallback.png') }}" 
                                                    data-src="{{ asset($post->image ? 'storage/' . $post->image : 'assets/images/demo-two/posts/img-01.jpg') }}" 
                                                    alt="{{ $post->title }}" 
                                                    data-uc-img="loading: lazy">
                                                <a href="{{ route('news.show', $post->id) }}" class="position-cover" data-caption="{{ $post->title }}"></a>
                                            </figure>
                                            <div class="post-category hstack gap-narrow position-absolute top-0 start-0 m-1 fs-7 fw-bold h-24px px-1 rounded-1 shadow-xs bg-white text-primary">
                                                <a class="text-none" href="{{ route('blog.category', $category->id) }}">{{ $category->name }}</a>
                                            </div>
                                            @if($post->video_url)
                                            <div class="position-absolute top-0 end-0 w-150px h-150px rounded-top-end bg-gradient-45 from-transparent via-transparent to-black opacity-50"></div>
                                            <span class="cstack position-absolute top-0 end-0 fs-6 w-40px h-40px text-white">
                                                <i class="icon-narrow unicon-play-filled-alt"></i>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="post-header panel vstack gap-1 lg:gap-2">
                                            <h3 class="post-title h6 sm:h5 xl:h4 m-0 text-truncate-2 m-0">
                                                <a class="text-none" href="{{ route('news.show', $post->id) }}">{{ $post->title }}</a>
                                            </h3>
                                            <div>
                                                <div class="post-meta panel hstack justify-center fs-7 fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex">
                                                    <div class="meta">
                                                        <div class="hstack gap-2">
                                                            <div>
                                                                <div class="post-date hstack gap-narrow">
                                                                    <span>{{ \Carbon\Carbon::parse($post->created_at)->format('M j, Y') }}</span>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <a href="{{ route('news.show', $post->id) }}#post_comment" class="post-comments text-none hstack gap-narrow">
                                                                    <i class="icon-narrow unicon-chat"></i>
                                                                    <span>{{ $post->comments_count ?? 0 }}</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="actions">
                                                        <div class="hstack gap-1"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                @endforeach
                            </div>
                            <div class="nav-pagination pt-3 mt-6 lg:mt-9 border-top border-gray-100 dark:border-gray-800">
                                {{ $posts->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Можно подключить блок рассылки если он есть -->
    @if(View::exists('partials.newsletter'))
        @include('partials.newsletter')
    @endif
</div>
@endsection