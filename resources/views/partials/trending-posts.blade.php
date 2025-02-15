<!-- Section start -->
<div id="trending-posts" class="trending-posts section panel overflow-hidden">
    <div class="section-outer panel py-4 sm:py-5">
        <div class="container max-w-xl">
            <div class="section-inner">
                <div class="row child-cols-12 lg:child-cols col-match g-3 xl:g-4" data-uc-grid>
                    <div class="lg:col-4">
                        <div class="block-layout grid-layout vstack gap-2 lg:gap-3 panel overflow-hidden p-3 bg-gray-25 dark:bg-gray-800">
                            <div class="block-header panel">
                                <h2 class="h6 lg:h5 m-0 text-inherit dark:text-white hstack gap-1">
                                    <span class="panel d-inline-block bg-primary w-8px h-8px translate-y-px"></span>
                                    <a class="text-none hover:text-primary duration-150" href="{{ route('category.show', ['id' => 1]) }}">Most watched</a>
                                </h2>
                            </div>
                            <div class="block-content">
                                <div class="row child-cols-12 g-3">
                                    @foreach ($mostWatchedPosts as $post)
                                    <div>
                                        <article class="post type-post panel">
                                            <div class="row child-cols g-2" data-uc-grid>
                                                <div>
                                                    <div class="post-header panel vstack justify-between gap-1">
                                                        <h3 class="post-title h6 m-0 text-truncate-2">
                                                            <a class="text-none hover:text-primary duration-150" href="{{ route('news.show', $post->id) }}">{{ $post->title }}</a>
                                                        </h3>
                                                        <div class="post-meta fs-7 fw-medium text-gray-900 dark:text-white text-opacity-60">
                                                            <div class="post-date hstack gap-narrow">
                                                                <span>{{ $post->created_at->format('M d, Y') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="post-media panel uc-transition-toggle overflow-hidden max-w-72px min-w-64px lg:min-w-72px">
                                                        <div class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-1x1">
                                                            <img class="uc-transition-scale-up uc-transition-opaque media-cover image" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" data-uc-img="loading: lazy">
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
                    <div>
                        <div class="block-layout grid-layout vstack gap-2 xl:gap-3 panel overflow-hidden">
                            <div class="block-header panel hstack justify-between px-2 py-1 bg-gray-800 text-white uc-dark">
                                <h2 class="h6 lg:h5 m-0 text-inherit dark:text-white hstack gap-1">
                                    <span class="panel d-inline-block bg-primary w-8px h-8px translate-y-px"></span>
                                    <a class="text-none hover:text-primary duration-150" href="{{ route('category.show', ['id' => 2]) }}">Politics</a>
                                </h2>
                                <ul class="nav-x gap-narrow">
                                    <li>
                                        <a href="#tw" class="w-24px h-24px cstack rounded-circle hover:bg-primary hover:text-dark transition-colors duration-200"><i class="icon icon-1 unicon-logo-x-filled"></i></a>
                                    </li>
                                    <li>
                                        <a href="#in" class="w-24px h-24px cstack rounded-circle hover:bg-primary hover:text-dark transition-colors duration-200"><i class="icon icon-1 unicon-logo-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="block-content">
                                <div class="row child-cols-6 g-2 gy-3 md:gx-3 md:gy-4">
                                    @foreach ($politicsPosts as $post)
                                    <div>
                                        <article class="post type-post panel vstack gap-1 lg:gap-2">
                                            <div class="post-media panel uc-transition-toggle overflow-hidden">
                                                <div class="featured-image uc-transition-scale-up uc-transition-opaque bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                    <img class="uc-transition-scale-up uc-transition-opaque media-cover image" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" data-uc-img="loading: lazy">
                                                </div>
                                                <a href="{{ route('news.show', $post->id) }}" class="position-cover"></a>
                                            </div>
                                            <div class="post-header panel vstack gap-1">
                                                <div class="post-meta panel hstack justify-start gap-1 fs-7 fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1">
                                                    <div>
                                                        <div class="post-category hstack gap-narrow fw-semibold">
                                                            <a class="text-none hover:text-primary dark:text-primary duration-150" href="{{ route('category.show', $post->category_id) }}">{{ $post->category->name }}</a>
                                                        </div>
                                                    </div>
                                                    <div class="sep d-none md:d-block">❘</div>
                                                    <div class="d-none md:d-block">
                                                        <div class="post-date hstack gap-narrow">
                                                            <span>{{ $post->created_at->format('M d, Y') }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="cstack w-16px h-16px ms-narrow d-none md:d-inline-flex position-absolute top-0 end-0">
                                                        <a href="#" class="uc-bookmark-toggle w-16px h-16px text-none" data-uc-tooltip="Add to bookmark"><i class="icon-narrow unicon-bookmark-add"></i></a>
                                                    </div>
                                                </div>
                                                <h3 class="post-title h6 lg:h5 fw-semibold m-0 text-truncate-2 mb-1">
                                                    <a class="text-none hover:text-primary duration-150" href="{{ route('news.show', $post->id) }}">{{ $post->title }}</a>
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
</div>
<!-- Section end -->