<!-- Most Watched Posts -->
<div class="lg:col-4">
    <div class="block-layout grid-layout vstack gap-2 lg:gap-3 panel overflow-hidden p-3 bg-gray-25 dark:bg-gray-800">
        <div class="block-header panel">
            <h2 class="h6 lg:h5 m-0 text-inherit dark:text-white hstack gap-1">
                <span class="panel d-inline-block bg-primary w-8px h-8px translate-y-px"></span>
                @if($mostWatchedCategory)
                    <a class="text-none hover:text-primary duration-150" href="{{ route('category.show', ['id' => $mostWatchedCategory->id]) }}">Most Watched</a>
                @else
                    <span>Most Watched</span>
                @endif
            </h2>
        </div>
        <div class="block-content">
            <div class="row child-cols-12 g-3">
                @forelse($mostWatchedPosts as $post)
                    <div>
                        <article class="post type-post panel">
                            <div class="row child-cols g-2" data-uc-grid>
                                <div>
                                    <div class="post-header panel vstack justify-between gap-1">
                                        <h3 class="post-title h6 m-0 text-truncate-2">
                                            <a class="text-none hover:text-primary duration-150" href="{{ route('news.show', $post->id) }}">{{ $post->title }}</a>
                                        </h3>
                                        <div class="post-meta fs-7 fw-medium text-gray-900 dark:text-white text-opacity-60">
                                            <span>{{ $post->created_at->format('M d, Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="post-media panel uc-transition-toggle overflow-hidden max-w-72px min-w-64px lg:min-w-72px">
                                        <div class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-1x1">
                                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="media-cover image">
                                        </div>
                                        <a href="{{ route('news.show', $post->id) }}" class="position-cover"></a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                @empty
                    <p>Нет популярных новостей.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

<!-- Trending Politics Posts -->
<div>
    <div class="block-layout grid-layout vstack gap-2 xl:gap-3 panel overflow-hidden">
        <div class="block-header panel hstack justify-between px-2 py-1 bg-gray-800 text-white uc-dark">
            <h2 class="h6 lg:h5 m-0 text-inherit dark:text-white hstack gap-1">
                <span class="panel d-inline-block bg-primary w-8px h-8px translate-y-px"></span>
                @if($politicsCategory)
                    <a class="text-none hover:text-primary duration-150" href="{{ route('category.show', ['id' => $politicsCategory->id]) }}">Politics</a>
                @else
                    <span>Politics</span>
                @endif
            </h2>
        </div>
        <div class="block-content">
            <div class="row child-cols-6 g-2 gy-3 md:gx-3 md:gy-4">
                @forelse($politicsPosts as $post)
                    <div>
                        <article class="post type-post panel vstack gap-1 lg:gap-2">
                            <div class="post-media panel uc-transition-toggle overflow-hidden">
                                <div class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="media-cover image">
                                </div>
                                <a href="{{ route('news.show', $post->id) }}" class="position-cover"></a>
                            </div>
                            <div class="post-header panel vstack gap-1">
                                <div class="post-meta panel hstack justify-start gap-1 fs-7 fw-medium text-gray-900 dark:text-white text-opacity-60">
                                    @if($post->category)
                                        <a class="text-none hover:text-primary" href="{{ route('category.show', $post->category_id) }}">{{ $post->category->name }}</a>
                                        <span>❘</span>
                                    @endif
                                    <span>{{ $post->created_at->format('M d, Y') }}</span>
                                </div>
                                <h3 class="post-title h6 lg:h5 fw-semibold m-0 text-truncate-2 mb-1">
                                    <a class="text-none hover:text-primary" href="{{ route('news.show', $post->id) }}">{{ $post->title }}</a>
                                </h3>
                            </div>
                        </article>
                    </div>
                @empty
                    <p>Нет политических новостей.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
