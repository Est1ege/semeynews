<div id="comment-form-wrapper" class="panel pt-2 mt-8 xl:mt-9">
    <h4 class="h5 xl:h4 mb-5 xl:mb-6">@lang('Leave a Comment')</h4>
    
    <form method="POST" 
          action="{{ route('comments.store') }}" 
          class="vstack gap-4">
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <input type="hidden" name="parent_id" id="parent_id" value="">

        <div class="row g-3">
            <div class="col-md-6">
                <input
                    class="form-control form-control-lg h-48px w-full fs-6 bg-white dark:bg-opacity-0 dark:text-white dark:border-gray-300 dark:border-opacity-30"
                    type="text" 
                    name="author_name"
                    placeholder="@lang('Your Name')"
                    required>
            </div>
            <div class="col-md-6">
                <input
                    class="form-control form-control-lg h-48px w-full fs-6 bg-white dark:bg-opacity-0 dark:text-white dark:border-gray-300 dark:border-opacity-30"
                    type="email" 
                    name="author_email"
                    placeholder="@lang('Your Email')"
                    required>
            </div>
        </div>

        <textarea
            class="form-control h-150px w-full fs-6 bg-white dark:bg-opacity-0 dark:text-white dark:border-gray-300 dark:border-opacity-30"
            name="content"
            placeholder="@lang('Your Comment')"
            required></textarea>

        <button class="btn btn-primary btn-lg mt-2" type="submit">
            @lang('Post Comment')
        </button>
    </form>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.reply-link').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const parentId = this.dataset.commentId;
            document.getElementById('parent_id').value = parentId;
            document.getElementById('comment-form-wrapper').scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
});
</script>
@endpush