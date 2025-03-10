<!-- Section start -->
<div id="national-posts" class="national-posts section panel overflow-hidden">
    <div class="section-outer panel pb-4 sm:pb-5">
        <div class="container max-w-xl">
            <div class="section-inner">
                <div class="row child-cols-12 lg:child-cols g-4" data-uc-grid>
                    <!-- Global Category -->
                    <div>
                        <div class="block-layout grid-layout vstack gap-2 xl:gap-3 panel overflow-hidden">
                            <div class="block-header panel border-bottom pb-1 min-h-40px">
                                <h2 class="h6 lg:h5 m-0 text-inherit dark:text-white hstack gap-1">
                                    <span class="panel d-inline-block bg-primary w-8px h-8px translate-y-px"></span>
                                    <a class="post-title text-none hover:text-primary duration-150" href="{{ route('blog.category', ['id' => 1]) }}">{{ __('sections.global') }}</a>
                                </h2>
                            </div>
                            <div class="block-content panel vstack lg:hstack items-start gap-3">
                                @if($globalPosts->isNotEmpty())
                                <div class="block-left w-100 lg:w-3/4">
                                    <div>
                                        <article class="post type-post panel vstack gap-1 lg:gap-2">
                                            <div class="post-media panel uc-transition-toggle overflow-hidden">
                                                <div class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                    <img src="{{ asset('storage/' . $globalPosts[0]->image) }}" alt="{{ $globalPosts[0]->title }}" class="media-cover image">
                                                </div>
                                                <a href="{{ route('news.show', $globalPosts[0]->id) }}" class="position-cover"></a>
                                            </div>
                                            <div class="post-header panel vstack gap-1">
                                                <div class="post-meta hstack gap-1 fs-7 fw-medium text-gray-900 dark:text-white text-opacity-60">
                                                    <a class="text-none hover:text-primary" href="{{ route('blog.category', $globalPosts[0]->category_id) }}">{{ $globalPosts[0]->category->name }}</a>
                                                    <span>❘</span>
                                                    <span>@formatDate($globalPosts[0]->created_at, 'full')
                                                    </span>
                                                </div>
                                                <h3 class="post-title h6 xl:h5 m-0 text-truncate-2 mb-1">
                                                    <a class="text-none hover:text-primary" href="{{ route('news.show', $globalPosts[0]->id) }}">{{ $globalPosts[0]->title }}</a>
                                                </h3>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                                @endif
                                <div class="block-right panel vstack gap-3">
                                    @foreach($globalPosts->skip(1) as $post)
                                    <div>
                                        <article class="post type-post panel">
                                            <div class="row child-cols g-2" data-uc-grid>
                                                <div>
                                                    <div class="post-header vstack gap-1">
                                                        <h3 class="post-title h6 m-0 text-truncate-2">
                                                            <a class="text-none hover:text-primary" href="{{ route('news.show', $post->id) }}">{{ $post->title }}</a>
                                                        </h3>
                                                        <div class="post-meta fs-7 fw-medium text-gray-900 dark:text-white text-opacity-60">
                                                            <span>@formatDate($post->created_at, 'full')</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="post-media panel uc-transition-toggle overflow-hidden max-w-72px min-w-64px">
                                                        <div class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-1x1">
                                                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="media-cover image">
                                                        </div>
                                                        <a href="{{ route('news.show', $post->id) }}" class="position-cover"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- National Category -->
                    <div class="lg:col-4">
                        <div class="block-layout grid-layout vstack gap-2 xl:gap-3 panel overflow-hidden">
                            <div class="block-header panel border-bottom pb-1 min-h-40px">
                                <h2 class="h6 lg:h5 m-0 text-inherit dark:text-white hstack gap-1">
                                    <span class="panel d-inline-block bg-primary w-8px h-8px translate-y-px"></span>
                                    <a class="post-title text-none hover:text-primary duration-150" href="{{ route('blog.category', ['id' => 2]) }}">{{ __('sections.national') }}</a>
                                </h2>
                            </div>
                            <div class="block-content panel vstack gap-3">
                                @foreach($nationalPosts as $post)
                                <div>
                                    <article class="post type-post panel vstack gap-1 lg:gap-2">
                                        <div class="post-media panel uc-transition-toggle overflow-hidden">
                                            <div class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="media-cover image">
                                            </div>
                                            <a href="{{ route('news.show', $post->id) }}" class="position-cover"></a>
                                        </div>
                                        <div class="post-header panel vstack gap-1">
                                            <div class="post-meta hstack gap-1 fs-7 fw-medium text-gray-900 dark:text-white text-opacity-60">
                                                <a class="text-none hover:text-primary" href="{{ route('blog.category', $post->category_id) }}">{{ $post->category->name }}</a>
                                                <span>❘</span>
                                                <span>@formatDate($post->created_at, 'full')</span>
                                            </div>
                                            <h3 class="post-title h6 xl:h5 m-0 text-truncate-2 mb-1">
                                                <a class="text-none hover:text-primary" href="{{ route('news.show', $post->id) }}">{{ $post->title }}</a>
                                            </h3>
                                        </div>
                                    </article>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Section end -->