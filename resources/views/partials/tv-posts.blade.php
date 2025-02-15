<!-- Section start -->
<div id="tv-posts" class="tv-posts section panel overflow-hidden bg-gray-800 text-white uc-dark">
    <div class="section-outer panel py-4 sm:py-5">
        <div class="container max-w-xl">
            <div class="section-inner panel vstack gap-3 xl:gap-4">
                
                <!-- Заголовок блока -->
                <div class="section-header panel vstack items-center justify-center text-center gap-1">
                    <h2 class="h6 lg:h5 m-0 text-white hstack gap-1">
                        <span class="panel d-inline-block bg-primary w-8px h-8px translate-y-px"></span>
                        <span>Hand-picked News</span>
                    </h2>
                </div>

                <!-- Контент блока -->
                <div class="section-content">
                    <div class="block-layout grid-overlay-layout">
                        <div class="block-content">
                            <div class="row child-cols-12 md:child-cols-6 g-1 col-match">

                                <!-- Основная новость -->
                                @if($featuredPost)
                                <div>
                                    <article class="post type-post panel vstack gap-2 lg:gap-3 h-100">
                                        <div class="post-media panel uc-transition-toggle overflow-hidden h-100">
                                            <div class="featured-image bg-gray-25 dark:bg-gray-800 h-100 d-none md:d-block">
                                                <canvas class="h-100 w-100"></canvas>
                                                <img class="uc-transition-scale-up uc-transition-opaque media-cover image uc-transition-scale-up uc-transition-opaque" src="{{ asset('storage/' . $featuredPost->image) }}" alt="{{ $featuredPost->title }}" data-uc-img="loading: lazy">
                                            </div>
                                            <div class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9 d-block md:d-none">
                                                <img class="uc-transition-scale-up uc-transition-opaque media-cover image uc-transition-scale-up uc-transition-opaque" src="{{ asset('storage/' . $featuredPost->image) }}" alt="{{ $featuredPost->title }}" data-uc-img="loading: lazy">
                                            </div>
                                        </div>
                                        <div class="position-cover bg-gradient-to-t from-black to-transparent opacity-90"></div>
                                        <div class="post-header panel vstack justify-end items-start gap-1 sm:gap-2 p-2 sm:p-4 position-cover text-white">
                                            <h3 class="post-title h5 sm:h4 xl:h3 m-0 max-w-600px text-white text-truncate-2">
                                                <a class="text-none text-white" href="{{ route('news.show', $featuredPost->id) }}">{{ $featuredPost->title }}</a>
                                            </h3>
                                            <div class="post-meta panel hstack justify-start gap-1 fs-7 fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1">
                                                <div>
                                                    <div class="post-category hstack gap-narrow fw-semibold">
                                                        <a class="text-none hover:text-primary dark:text-primary duration-150" href="{{ route('category.show', $featuredPost->category_id) }}">{{ $featuredPost->category->name }}</a>
                                                    </div>
                                                </div>
                                                <div class="sep d-none md:d-block">❘</div>
                                                <div class="d-none md:d-block">
                                                    <div class="post-date hstack gap-narrow">
                                                        <span>{{ $featuredPost->created_at->format('M j, Y') }}</span>
                                                    </div>
                                                </div>
                                                <div class="cstack w-16px h-16px ms-narrow d-none md:d-inline-flex position-absolute top-0 end-0">
                                                    <a href="#" class="uc-bookmark-toggle w-16px h-16px text-none" data-uc-tooltip="Add to bookmark"><i class="icon-narrow unicon-bookmark-add"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ route('news.show', $featuredPost->id) }}" class="position-cover"></a>
                                    </article>
                                </div>
                                @endif

                                <!-- Остальные новости -->
                                <div>
                                    <div class="panel">
                                        <div class="row child-cols-6 g-1">
                                            @foreach($tvPosts as $post)
                                            <div>
                                                <article class="post type-post panel vstack gap-2 lg:gap-3">
                                                    <div class="post-media panel uc-transition-toggle overflow-hidden">
                                                        <div class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-1x1 sm:ratio-4x3">
                                                            <img class="uc-transition-scale-up uc-transition-opaque media-cover image uc-transition-scale-up uc-transition-opaque" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" data-uc-img="loading: lazy">
                                                        </div>
                                                    </div>
                                                    <div class="position-cover bg-gradient-to-t from-black to-transparent opacity-90"></div>
                                                    <div class="post-header panel vstack justify-end items-start gap-1 p-2 position-cover text-white">
                                                        <h3 class="post-title h6 sm:h5 lg:h6 xl:h5 m-0 max-w-600px text-white text-truncate-2">
                                                            <a class="text-none text-white" href="{{ route('news.show', $post->id) }}">{{ $post->title }}</a>
                                                        </h3>
                                                        <div class="post-meta panel hstack justify-start gap-1 fs-7 fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1">
                                                            <div>
                                                                <div class="post-category hstack gap-narrow fw-semibold">
                                                                    <a class="text-none hover:text-primary dark:text-primary duration-150" href="{{ route('category.show', $post->category_id) }}">{{ $post->category->name }}</a>
                                                                </div>
                                                            </div>
                                                            <div class="sep d-none md:d-block">❘</div>
                                                            <div class="d-none md:d-block">
                                                                <div class="post-date hstack gap-narrow">
                                                                    <span>{{ $post->created_at->format('M j, Y') }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="cstack w-16px h-16px ms-narrow d-none md:d-inline-flex position-absolute top-0 end-0">
                                                                <a href="#" class="uc-bookmark-toggle w-16px h-16px text-none" data-uc-tooltip="Add to bookmark"><i class="icon-narrow unicon-bookmark-add"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="{{ route('news.show', $post->id) }}" class="position-cover"></a>
                                                </article>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div> <!-- Конец section-content -->

            </div>
        </div>
    </div>
</div>
<!-- Section end -->