{{-- Social Share Buttons --}}
<ul class="post-share-icons nav-x gap-1 dark:text-white">
    <li>
        <a class="btn btn-md p-0 border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle"
           href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
           target="_blank"
           rel="noopener">
            <i class="unicon-logo-facebook icon-1"></i>
        </a>
    </li>
    <li>
        <a class="btn btn-md p-0 border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle"
           href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}"
           target="_blank"
           rel="noopener">
            <i class="unicon-logo-x-filled icon-1"></i>
        </a>
    </li>
    <li>
        <a class="btn btn-md p-0 border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle"
           href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&title={{ urlencode($post->title) }}"
           target="_blank"
           rel="noopener">
            <i class="unicon-logo-linkedin icon-1"></i>
        </a>
    </li>
    <li>
        <a class="btn btn-md p-0 border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle"
           href="https://pinterest.com/pin/create/button/?url={{ urlencode(url()->current()) }}&media={{ !empty($post->image) ? urlencode(asset('storage/' . $post->image)) : '' }}&description={{ urlencode($post->title) }}"
           target="_blank"
           rel="noopener">
            <i class="unicon-logo-pinterest icon-1"></i>
        </a>
    </li>
    <li>
        <a class="btn btn-md p-0 border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle"
           href="mailto:?subject={{ rawurlencode($post->title) }}&body={{ rawurlencode(url()->current()) }}">
            <i class="unicon-email icon-1"></i>
        </a>
    </li>
    <li>
        <button class="btn btn-md p-0 border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle copy-link"
                data-url="{{ url()->current() }}"
                title="Copy link">
            <i class="unicon-link icon-1"></i>
        </button>
    </li>
</ul>
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.copy-link').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const url = this.dataset.url;
           
            navigator.clipboard.writeText(url).then(() => {
                const originalInnerHTML = this.innerHTML;
                this.innerHTML = '<i class="unicon-check-circle icon-1"></i>';
                setTimeout(() => {
                    this.innerHTML = originalInnerHTML;
                }, 2000);
            }).catch(err => {
                console.error('Failed to copy URL: ', err);
            });
        });
    });
});
</script>
@endpush