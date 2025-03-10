<!-- resources/views/partials/comments.blade.php -->
<div id="post_comment" class="comments-section panel pt-4 mt-8 xl:mt-9">
    <h4 class="h5 xl:h4 mb-5 xl:mb-6">{{ __('comments.comments') }} ({{ $post->comments()->approved()->count() }})</h4>
    
    <!-- Отображение комментариев -->
    @if ($post->approvedComments->count() > 0)
        <div class="comments-list vstack gap-4">
            @foreach ($post->approvedComments as $comment)
                <div id="comment-{{ $comment->id }}" class="comment-item panel p-3 sm:p-4 border rounded-3 hover:shadow-sm transition-shadow duration-200">
                    <div class="comment-header hstack justify-between">
                        <div class="comment-author fw-medium hstack gap-2">
                            <div class="avatar">
                                <div class="avatar-circle">
                                    {{ mb_strtoupper(mb_substr($comment->author_name, 0, 1, 'UTF-8'), 'UTF-8') }}
                                </div>
                            </div>
                            <div>
                                <div class="name fw-semibold text-dark dark:text-white">{{ $comment->author_name }}</div>
                                <div class="date fs-7 text-muted dark:text-gray-400">{{ $comment->created_at->diffForHumans() }}</div>
                            </div>
                        </div>
                        <div>
                            <button type="button" class="reply-link btn btn-sm btn-outline-primary dark:btn-outline-light" data-comment-id="{{ $comment->id }}">
                                <i class="icon-narrow unicon-reply-all me-1"></i>
                                {{ __('comments.reply') }}
                            </button>
                        </div>
                    </div>
                    <div class="comment-content mt-3 text-gray-800 dark:text-gray-200">
                        {{ $comment->content }}
                    </div>
                    
                    <!-- Ответы -->
                    @if ($comment->replies()->approved()->count() > 0)
                        <div class="replies-list vstack gap-3 mt-4 ms-4 ps-2 border-start border-primary border-opacity-25">
                            @foreach ($comment->replies()->approved()->get() as $reply)
                                <div id="comment-{{ $reply->id }}" class="reply-item panel p-3 border rounded-3 bg-gray-50 dark:bg-gray-800">
                                    <div class="reply-header hstack justify-between">
                                        <div class="reply-author fw-medium hstack gap-2">
                                            <div class="avatar">
                                                <div class="avatar-circle">
                                                    {{ mb_strtoupper(mb_substr($reply->author_name, 0, 1, 'UTF-8'), 'UTF-8') }}
                                                </div>
                                            </div>
                                            <div>
                                                <div class="name fw-semibold text-dark dark:text-white">{{ $reply->author_name }}</div>
                                                <div class="date fs-7 text-muted dark:text-gray-400">{{ $reply->created_at->diffForHumans() }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="reply-content mt-2 text-gray-800 dark:text-gray-200">
                                        {{ $reply->content }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    @else
        <div class="no-comments panel text-center py-5 border rounded mb-6">
            <div class="py-3">
                <i class="icon icon-3 unicon-chat-bubble-empty text-muted mb-2"></i>
                <p class="m-0 text-muted">{{ __('comments.no_comments') }}</p>
            </div>
        </div>
    @endif
    
    <!-- Форма комментария -->
    <div id="comment-form-wrapper" class="panel pt-4 mt-6 xl:mt-8">
        <h4 class="h5 xl:h4 mb-4 xl:mb-5">{{ __('comments.leave_comment') }}</h4>
        
        <div id="reply-info" class="alert alert-info bg-primary bg-opacity-10 border-primary border-opacity-25 rounded p-3 mb-4 d-none">
            <div class="d-flex justify-content-between align-items-center">
                <span class="fw-medium"><i class="icon-narrow unicon-reply me-1"></i> {{ __('comments.replying_to') }}</span>
                <button type="button" id="cancel-reply" class="btn btn-sm btn-outline-secondary">
                    <i class="icon-narrow unicon-x me-1"></i>
                    {{ __('comments.cancel') }}
                </button>
            </div>
        </div>
        
        <form method="POST" action="{{ route('comments.store') }}" class="vstack gap-4">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <input type="hidden" name="parent_id" id="parent_id" value="">
            
            <div class="row g-3">
                <div class="col-md-6">
                    <input
                        class="form-control form-control-lg h-48px w-full fs-6 bg-white dark:bg-opacity-0 dark:text-white dark:border-gray-300 dark:border-opacity-30"
                        type="text"
                        name="author_name"
                        value="{{ old('author_name') }}"
                        placeholder="{{ __('comments.your_name') }}"
                        required>
                </div>
                <div class="col-md-6">
                    <input
                        class="form-control form-control-lg h-48px w-full fs-6 bg-white dark:bg-opacity-0 dark:text-white dark:border-gray-300 dark:border-opacity-30"
                        type="email"
                        name="author_email"
                        value="{{ old('author_email') }}"
                        placeholder="{{ __('comments.your_email') }}"
                        required>
                </div>
            </div>
            <textarea
                class="form-control h-150px w-full fs-6 bg-white dark:bg-opacity-0 dark:text-white dark:border-gray-300 dark:border-opacity-30"
                name="content"
                placeholder="{{ __('comments.your_comment') }}"
                required>{{ old('content') }}</textarea>
            
            <!-- Google reCAPTCHA -->
            <div class="mt-2 mb-3">
                {!! NoCaptcha::display() !!}
                @if ($errors->has('g-recaptcha-response'))
                    <div class="text-danger mt-1">
                        {{ $errors->first('g-recaptcha-response') }}
                    </div>
                @endif
            </div>
            
            <button class="btn btn-primary btn-lg mt-2" type="submit">
                <i class="icon-narrow unicon-send me-1"></i>
                {{ __('comments.post_comment') }}
            </button>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('Comments script loaded');
    
    // Обработка кликов по ссылкам "Ответить"
    document.querySelectorAll('.reply-link').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const parentId = this.getAttribute('data-comment-id');
            console.log('Reply clicked for comment ID:', parentId);
            
            // Заполняем поле parent_id
            document.getElementById('parent_id').value = parentId;
            
            // Показываем info блок
            const replyInfo = document.getElementById('reply-info');
            replyInfo.classList.remove('d-none');
            
            // Добавляем имя автора комментария, на который отвечаем
            const commentAuthor = document.querySelector(`#comment-${parentId} .name`);
            if (commentAuthor) {
                const replyingToSpan = document.querySelector('#reply-info span');
                const originalText = "{{ __('comments.replying_to') }}";
                replyingToSpan.innerHTML = `<i class="icon-narrow unicon-reply me-1"></i> ${originalText} <strong>${commentAuthor.textContent}</strong>`;
            }
            
            // Добавляем класс для выделения комментария, на который отвечаем
            const commentElement = document.getElementById(`comment-${parentId}`);
            if (commentElement) {
                // Удаляем класс с других комментариев
                document.querySelectorAll('.comment-item').forEach(item => {
                    item.classList.remove('active-comment');
                });
                
                // Добавляем класс к текущему комментарию
                commentElement.classList.add('active-comment');
            }
            
            // Скролл к форме комментария
            document.getElementById('comment-form-wrapper').scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });
            
            // Фокусируемся на текстовом поле
            setTimeout(() => {
                document.querySelector('textarea[name="content"]').focus();
            }, 500);
        });
    });
    
    // Кнопка отмены ответа
    document.getElementById('cancel-reply').addEventListener('click', function() {
        document.getElementById('parent_id').value = '';
        document.getElementById('reply-info').classList.add('d-none');
        
        // Удаляем класс выделения активного комментария
        document.querySelectorAll('.comment-item').forEach(item => {
            item.classList.remove('active-comment');
        });
        
        console.log('Reply cancelled');
    });
    
    // Проверяем, если в URL есть идентификатор комментария для выделения
    const urlParams = new URLSearchParams(window.location.search);
    const highlightCommentId = urlParams.get('highlight-comment');
    if (highlightCommentId) {
        const commentElement = document.getElementById(`comment-${highlightCommentId}`);
        if (commentElement) {
            commentElement.classList.add('highlighted-comment');
            commentElement.scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });
        }
    }
});
</script>

<style>
/* Стили для комментариев */
.avatar-circle {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: #e9e9e9;
    display: flex;
    justify-content: center;
    align-items: center;
    font-weight: 600;
    color: #333;
    font-size: 16px;
    text-transform: uppercase;
    /* Добавляем шрифты с хорошей поддержкой кириллицы */
    font-family: 'Arial', 'Roboto', 'Noto Sans', sans-serif;
}

/* Меньший размер для аватаров в ответах */
.reply-item .avatar-circle {
    width: 32px;
    height: 32px;
    font-size: 14px;
}

.active-comment {
    border-color: var(--bs-primary) !important;
    background-color: rgba(var(--bs-primary-rgb), 0.05) !important;
}

.highlighted-comment {
    animation: highlight-fade 3s;
}

@keyframes highlight-fade {
    from { background-color: rgba(var(--bs-primary-rgb), 0.2); }
    to { background-color: transparent; }
}

/* Темная тема */
@media (prefers-color-scheme: dark) {
    .active-comment {
        border-color: var(--bs-primary) !important;
        background-color: rgba(var(--bs-primary-rgb), 0.1) !important;
    }
    
    .avatar-circle {
        background-color: #444;
        color: #fff;
    }
}
</style>

<!-- Обязательно добавьте этот скрипт в конце шаблона для работы reCAPTCHA -->
{!! NoCaptcha::renderJs() !!}