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
    <!-- Instagram -->
    <li>
    <a class="btn btn-md p-0 border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle"
   href="https://www.instagram.com/your_profile_name/" 
   target="_blank"
   rel="noopener">
    <i class="unicon-logo-instagram icon-1"></i>
</a>
    </li>
    <!-- Telegram -->
    <li>
        <a class="btn btn-md p-0 border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle d-flex align-items-center justify-content-center"
           href="https://t.me/share/url?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title) }}"
           rel="noopener">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z"/>
            </svg>
        </a>
    </li>
    <!-- WhatsApp -->
    <li>
        <a class="btn btn-md p-0 border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle d-flex align-items-center justify-content-center"
           href="https://wa.me/?text={{ urlencode($post->title . ' ' . url()->current()) }}"
           target="_blank"
           rel="noopener">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
            </svg>
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
            
            // Создаем скрытый input для копирования
            const tempInput = document.createElement('input');
            tempInput.value = url;
            document.body.appendChild(tempInput);
            tempInput.select();
            
            try {
                // Пробуем использовать современный API
                navigator.clipboard.writeText(url)
                    .then(showSuccess)
                    .catch(() => {
                        // Запасной вариант для HTTP
                        document.execCommand('copy');
                        showSuccess();
                    });
            } catch (err) {
                // Еще один запасной вариант
                document.execCommand('copy');
                showSuccess();
            }
            
            // Удаляем временный input
            document.body.removeChild(tempInput);
            
            // Функция для отображения успешного копирования
            function showSuccess() {
                const originalInnerHTML = button.innerHTML;
                button.innerHTML = '<i class="unicon-check-circle icon-1"></i>';
                
                // Показываем уведомление
                const notification = document.createElement('div');
                notification.textContent = 'Ссылка скопирована!';
                notification.style.cssText = 'position: fixed; bottom: 20px; left: 50%; transform: translateX(-50%); background: #4CAF50; color: white; padding: 10px 20px; border-radius: 5px; z-index: 9999; box-shadow: 0 2px 10px rgba(0,0,0,0.2);';
                document.body.appendChild(notification);
                
                setTimeout(() => {
                    button.innerHTML = originalInnerHTML;
                    document.body.removeChild(notification);
                }, 2000);
            }
        });
    });
});
</script>
@endpush