<div id="blog-comment" class="panel border-top pt-2 mt-8 xl:mt-9">
    <h4 class="h5 xl:h4 mb-5 xl:mb-6">@lang('Comments') ({{ $post->comments->count() }})</h4>

    @if($post->comments->isEmpty())
        <p class="text-gray-500">@lang('No comments yet')</p>
    @else
        <ol class="comment-list">
            @foreach($post->comments->whereNull('parent_id') as $comment)
                @include('blog.partials.comment', ['comment' => $comment])
            @endforeach
        </ol>
    @endif
</div>