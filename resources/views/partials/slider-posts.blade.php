<div class="section panel overflow-hidden">
    <div class="section-outer panel pb-4 pt-3 sm:py-4 sm:py-5">
        <div class="container max-w-xl">
            <div class="section-inner panel vstack gap-4">
                
                <!-- Слайдер новостей -->
                <div class="section-content">
                    <div class="row child-cols-12 g-3 xl:g-4">
                        <div class="lg:col-6 lg:order-2">
                            <div class="panel swiper-parent">
                                <div class="swiper w-100 uc-visible-toggle" data-uc-swiper="items: 1; active: 1; gap: 32; speed: 500; dots: .dot-nav; next: .nav-next; prev: .nav-prev; disable-class: d-none;">
                                    <div class="swiper-wrapper">
                                        
                                        <!-- Динамическое отображение слайдов -->
                                        @foreach($sliderPosts as $post)
                                            <div class="swiper-slide">
                                                <article class="post type-post panel vstack gap-3">
                                                    
                                                    <!-- Заголовок и метаданные -->
                                                    <div class="post-header panel vstack justify-center text-center gap-1">
                                                        <div class="post-meta panel hstack justify-center gap-1 fs-7 fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1">
                                                            <div class="post-category hstack gap-narrow fw-semibold">
                                                                <a class="text-none hover:text-primary dark:text-primary duration-150" href="{{ route('category.show', $post->category_id) }}">{{ $post->category->name }}</a>
                                                            </div>
                                                            <div class="sep d-none md:d-block">❘</div>
                                                            <div class="d-none md:d-block">
                                                                <span>{{ $post->created_at->format('M d, Y') }}</span>
                                                            </div>
                                                        </div>
                                                        <h3 class="post-title h5 xl:h4 m-0 max-w-500px mx-auto">
                                                            <a class="text-none" href="{{ route('news.show', $post->id) }}">{{ $post->title }}</a>
                                                        </h3>
                                                    </div>

                                                    <!-- Изображение поста -->
                                                    <div class="post-media panel uc-transition-toggle overflow-hidden">
                                                        <div class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-4x3">
                                                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="uc-transition-scale-up uc-transition-opaque media-cover image">
                                                        </div>
                                                        <a href="{{ route('news.show', $post->id) }}" class="position-cover"></a>
                                                    </div>

                                                </article>
                                            </div>
                                        @endforeach

                                    </div>

                                    <!-- Навигация слайдера -->
                                    <div class="swiper-nav nav-next btn btn-gray-900 p-0 border-0 w-40px h-40px rounded-circle shadow-sm position-absolute top-50 end-0 me-2 z-1 uc-hidden-hover">
                                        <i class="icon-1 unicon-chevron-right"></i>
                                    </div>
                                    <div class="swiper-nav nav-prev btn btn-gray-900 p-0 border-0 w-40px h-40px rounded-circle shadow-sm position-absolute top-50 start-0 ms-2 z-1 uc-hidden-hover">
                                        <i class="icon-1 unicon-chevron-left"></i>
                                    </div>

                                    <!-- Индикаторы -->
                                    <div class="swiper-pagination dot-nav gap-2 mt-3 position-relative text-primary"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Дополнительный контент можно добавить сюда -->
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
