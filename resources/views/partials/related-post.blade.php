<div class="col">
    <article class="post type-post panel vstack gap-2">
        <figure class="featured-image m-0 ratio ratio-4x3 rounded uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
            <img class="media-cover image uc-transition-scale-up uc-transition-opaque" 
                 src="{{ asset('assets/images/common/img-fallback.png') }}" 
                 data-src="{{ asset($post->image) }}" 
                 alt="{{ $post->title }}" 
                 data-uc-img="loading: lazy">
            <a href="{{ route('blog.show', $post->slug) }}" 
               class="position-cover" 
               data-caption="{{ $post->title }}"></a>
        </figure>
        <div class="post-header panel vstack gap-1">
            <h5 class="h6 md:h5 m-0">
                <a class="text-none" href="{{ route('blog.show', $post->slug) }}">
                {{ $post->title }}
                </a>
            </h5>
            <div class="post-date hstack gap-narrow fs-7 opacity-60">
                <span>{{ $post->created_at->translatedFormat('M j, Y') }}</span>
            </div>
        </div>
    </article>
</div>