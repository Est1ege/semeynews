<div id="category-posts" class="category-posts section panel overflow-hidden">
    <div class="section-outer panel pb-4 sm:pb-5">
        <div class="container max-w-xl">
            <div class="section-inner">
                <div class="row child-cols-12 lg:child-cols-4 gx-3 xl:gx-4 gy-6" data-uc-grid>
                    
                    @foreach($categories as $category)
                        <div>
                            <div class="block-layout grid-layout vstack gap-2 xl:gap-3 panel overflow-hidden">
                                <div class="block-header panel border-bottom pb-1 min-h-40px">
                                    <h2 class="h6 lg:h5 m-0 text-inherit dark:text-white hstack gap-1">
                                        <span class="panel d-inline-block bg-primary w-8px h-8px translate-y-px"></span>
                                        <a class="post-title text-none hover:text-primary duration-150" href="{{ route('category.show', $category->id) }}">{{ $category->name }}</a>
                                    </h2>
                                </div>

                                <div class="block-content panel vstack gap-3">
                                    @foreach($category->posts->take(4) as $post)
                                        <article class="post type-post panel vstack gap-1 lg:gap-2">
                                            <div class="post-media panel uc-transition-toggle overflow-hidden">
                                                <div class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="media-cover image">
                                                </div>
                                                <a href="{{ route('news.show', $post->id) }}" class="position-cover"></a>
                                            </div>

                                            <div class="post-header panel vstack gap-1">
                                                <div class="post-meta panel hstack justify-start gap-1 fs-7 fw-medium text-gray-900 dark:text-white text-opacity-60">
                                                    <a class="text-none hover:text-primary dark:text-primary duration-150" href="{{ route('category.show', $post->category_id) }}">{{ $post->category->name }}</a>
                                                    <span>❘</span>
                                                    <span>{{ $post->created_at->format('M d, Y') }}</span>
                                                </div>

                                                <h3 class="post-title h6 xl:h5 m-0 text-truncate-2 mb-1">
                                                    <a class="text-none hover:text-primary duration-150" href="{{ route('news.show', $post->id) }}">{{ $post->title }}</a>
                                                </h3>
                                            </div>
                                        </article>
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
