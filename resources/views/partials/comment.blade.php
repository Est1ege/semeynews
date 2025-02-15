<li class="comment panel mb-4">
    <div class="comment-body panel">
        <div class="comment-meta panel hstack gap-3 mb-2">
            <div class="comment-author-avatar">
                <img src="{{ $comment->user->avatar ?? asset('assets/images/avatars/default.png') }}" 
                     alt="{{ $comment->author_name }}" 
                     class="rounded-circle w-48px h-48px">
            </div>
            <div class="comment-content">
                <div class="comment-author panel hstack gap-2">
                    <span class="font-semibold">{{ $comment->author_name }}</span>
                    <span class="text-gray-500 text-sm">
                        {{ $comment->created_at->diffForHumans() }}
                    </span>
                </div>
                <div class="comment-text">
                    {{ $comment->content }}
                </div>
                <a href="#reply-form" 
                   class="reply-link text-sm text-primary" 
                   data-comment-id="{{ $comment->id }}">
                    @lang('Reply')
                </a>
            </div>
        </div>
    </div>

    @if($comment->children->isNotEmpty())
        <ol class="children panel ms-8">
            @foreach($comment->children as $child)
                @include('blog.partials.comment', ['comment' => $child])
            @endforeach
        </ol>
    @endif
</li>