<!-- Section start -->
<div id="category-posts" class="category-posts section panel overflow-hidden">
    <div class="section-outer panel pb-4 sm:pb-5">
        <div class="container max-w-xl">
            <div class="section-inner">
                <div class="row child-cols-12 lg:child-cols-4 gx-3 xl:gx-4 gy-6" data-uc-grid>
                    @foreach ($categories as $category)
                    <div>
                        <div class="block-layout grid-layout vstack gap-2 xl:gap-3 panel overflow-hidden">
                            <div class="block-header panel border-bottom pb-1 min-h-40px">
                                <h2 class="h6 lg:h5 m-0 text-inherit dark:text-white hstack gap-1">
                                    <span class="panel d-inline-block bg-primary w-8px h-8px translate-y-px"></span>
                                    <a class="post-title text-none hover:text-primary duration-150" href="{{ route('blog.category', $category->id) }}">{{ $category->name }}</a>
                                </h2>
                            </div>
                            <div class="block-content panel vstack gap-3">
                                @foreach ($category->posts->take(4) as $post)
                                <div>
                                    <article class="post type-post panel vstack gap-1 lg:gap-2">
                                        <div class="post-media panel uc-transition-toggle overflow-hidden">
                                            <div class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                <img class="uc-transition-scale-up uc-transition-opaque media-cover uc-transition-scale-up uc-transition-opaque image" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" data-uc-img="loading: lazy">
                                            </div>
                                            <a href="{{ route('news.show', $post->id) }}" class="position-cover"></a>
                                        </div>
                                        <div class="post-header panel vstack gap-1">
                                            <div class="post-meta panel hstack justify-start gap-1 fs-7 fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1">
                                                <div>
                                                    <div class="post-category hstack gap-narrow fw-semibold">
                                                        <a class="text-none hover:text-primary dark:text-primary duration-150" href="{{ route('blog.category', $post->category_id) }}">{{ $post->category->name }}</a>
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
                                            <h3 class="post-title h6 xl:h5 m-0 text-truncate-2 mb-1">
                                                <a class="text-none hover:text-primary duration-150" href="{{ route('news.show', $post->id) }}">{{ $post->title }}</a>
                                            </h3>
                                        </div>
                                    </article>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Section end -->