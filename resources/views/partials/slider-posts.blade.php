<div class="section panel overflow-hidden">
    <div class="section-outer panel pb-4 pt-3 sm:py-4 sm:py-5">
        <div class="container max-w-xl">
            <div class="section-inner panel vstack gap-4">
                <div class="section-content">
                    <div class="row child-cols-12 g-3 xl:g-4">
                        <div class="lg:col-6 lg:order-2">
                            <div class="panel swiper-parent">
                                <div class="swiper w-100 uc-visible-toggle" data-uc-swiper="items: 1; active: 1; gap: 32; speed: 500; dots: .dot-nav; next: .nav-next; prev: .nav-prev; disable-class: d-none;">
                                    <div class="swiper-wrapper">
                                        @foreach($sliderPosts as $post)
                                            <div class="swiper-slide">
                                                <article class="post type-post panel vstack gap-3">
                                                    <div class="post-header panel vstack justify-center text-center gap-1">
                                                        <div class="post-meta panel hstack justify-center gap-1 fs-7 fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1">
                                                            <div>
                                                                <div class="post-category hstack gap-narrow fw-semibold">
                                                                    <a class="text-none hover:text-primary dark:text-primary duration-150" href="{{ route('blog.category', $post->category->id) }}">{{ $post->category->name }}</a>
                                                                </div>
                                                            </div>
                                                            <div class="sep d-none md:d-block">❘</div>
                                                            <div class="d-none md:d-block">
                                                                <div class="post-date hstack gap-narrow">
                                                                    <span>@formatDate($post->created_at, 'full')</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h3 class="post-title h5 xl:h4 m-0 max-w-500px mx-auto">
                                                            <a class="text-none" href="{{ route('news.show', $post->id) }}">{{ $post->title }}</a>
                                                        </h3>
                                                    </div>
                                                    <div class="post-media panel uc-transition-toggle overflow-hidden">
                                                        <div class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-4x3">
                                                            <img class="uc-transition-scale-up uc-transition-opaque media-cover image" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" loading="lazy">
                                                        </div>
                                                        <a href="{{ route('news.show', $post->id) }}" class="position-cover"></a>
                                                    </div>
                                                </article>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-nav nav-next btn btn-gray-900 p-0 border-0 w-40px h-40px rounded-circle shadow-sm position-absolute top-50 end-0 me-2 z-1 uc-hidden-hover">
                                        <i class="icon-1 unicon-chevron-right"></i>
                                    </div>
                                    <div class="swiper-nav nav-prev btn btn-gray-900 p-0 border-0 w-40px h-40px rounded-circle shadow-sm position-absolute top-50 start-0 ms-2 z-1 uc-hidden-hover">
                                        <i class="icon-1 unicon-chevron-left"></i>
                                    </div>
                                    <div class="swiper-pagination dot-nav gap-2 mt-3 position-relative text-primary"></div>
                                </div>
                            </div>
                        </div>

                        <div class="lg:col-3 lg:order-1">
                            <div class="block-layout panel">
                                <div class="block-header panel vstack items-center justify-center text-center gap-1 mb-3">
                                    <h2 class="block-title h5 m-0 hstack gap-1 border-bottom pb-1 dark:text-white">
                                        <span class="panel d-inline-block bg-primary w-8px h-8px translate-y-px"></span>
                                        <span>{{ __('sections.hot_now') }}</span>
                                    </h2>
                                </div>
                                <div class="block-content panel row sep-x gx-4 gy-3 lg:gy-2">
                                    @foreach($trendingPosts as $post)
                                        <div>
                                            <article class="post type-post panel d-flex gap-2">
                                                <div>
                                                    <div class="fs-7 fw-bold text-center translate-y-narrow bg-gray-50 dark:bg-white dark:text-black min-w-48px">{{ $post->created_at->format(__('dates.time_format')) }}</div>
                                                </div>
                                                <h6 class="fs-6 lg:fs-7 xl:fs-6 fw-medium text-truncate-2">
                                                    <a class="text-none hover:text-primary duration-150" href="{{ route('news.show', $post->id) }}">{{ $post->title }}</a>
                                                </h6>
                                            </article>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="col-3 order-3 d-none lg:d-block">
                            <div class="block-layout panel">
                                <div class="block-header panel vstack items-center justify-center mb-2 px-2 py-1 bg-gray-800 text-white uc-dark">
                                    <h2 class="block-title h6 lg:h5 m-0 cstack gap-1">
                                        <i class="icon icon-narrow unicon-dot-mark text-red" data-uc-animate="flash"></i>
                                        <span>{{ __('sections.live_now') }}</span>
                                    </h2>
                                </div>
                                <div class="block-content panel vstack gap-3">
                                    @foreach($tvPosts as $post)
                                        <article class="post type-post panel vstack gap-1 lg:gap-2">
                                            <div class="post-media panel overflow-hidden">
                                                <div class="featured-video bg-gray-700 ratio ratio-16x9">
                                                    <video class="video-cover video-lazyload min-h-100px" preload="none" loop playsinline>
                                                        <source src="{{ asset('storage/' . $post->video) }}" type="video/webm">
                                                        {{ __('sections.video_not_supported') }}
                                                    </video>
                                                </div>
                                                <a href="{{ route('news.show', $post->id) }}" class="position-cover"></a>
                                            </div>
                                            <div class="post-header panel vstack gap-1">
                                                <h3 class="post-title h6 xl:h5 m-0 text-truncate-2 mb-1">
                                                    <a class="text-none hover:text-primary duration-150" href="{{ route('news.show', $post->id) }}">{{ $post->title }}</a>
                                                </h3>
                                            </div>
                                        </article>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div> <!-- row end -->
                </div>
            </div>
        </div>
    </div>
</div>