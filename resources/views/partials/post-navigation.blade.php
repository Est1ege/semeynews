<div class="post-navigation panel vstack sm:hstack justify-between gap-2 mt-8 xl:mt-9">
    @isset($previousPost)
    <div class="new-post panel hstack w-100 sm:w-1/2 position-relative">
        <div class="panel hstack justify-center w-100px h-100px">
            <figure class="featured-image m-0 ratio ratio-1x1 rounded uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                <img class="media-cover image uc-transition-scale-up uc-transition-opaque" 
                     src="{{ asset('assets/images/common/img-fallback.png') }}" 
                     data-src="{{ asset($previousPost->image) }}" 
                     alt="{{ $previousPost->title }}" 
                     data-uc-img="loading: lazy">
            </figure>
        </div>
        <div class="panel vstack justify-center px-2 gap-1 w-1/3">
            <span class="fs-7 opacity-60">@lang('Previous Article')</span>
            <h6 class="h6 lg:h5 m-0">{{ $previousPost->title }}</h6>
        </div>
        <a href="{{ route('news3.show', $previousPost->slug) }}" class="position-cover"></a>
    </div>
    @endisset

    @isset($nextPost)
    <div class="new-post panel hstack w-100 sm:w-1/2 position-relative">
        <div class="panel vstack justify-center px-2 gap-1 w-1/3 text-end">
            <span class="fs-7 opacity-60">@lang('Next Article')</span>
            <h6 class="h6 lg:h5 m-0">{{ $nextPost->title }}</h6>
        </div>
        <div class="panel hstack justify-center w-100px h-100px">
            <figure class="featured-image m-0 ratio ratio-1x1 rounded uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                <img class="media-cover image uc-transition-scale-up uc-transition-opaque" 
                     src="{{ asset('assets/images/common/img-fallback.png') }}" 
                     data-src="{{ asset($nextPost->image) }}" 
                     alt="{{ $nextPost->title }}" 
                     data-uc-img="loading: lazy">
            </figure>
        </div>
        <a href="{{ route('blog.show', $nextPost->slug) }}" class="position-cover"></a>
    </div>
    @endisset
</div>