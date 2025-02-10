<h1>{{ $news->translate(app()->getLocale())->title }}</h1>
<div>{!! $news->translate(app()->getLocale())->content !!}</div>

<!-- Форма комментария -->
<form action="{{ route('comments.store') }}" method="POST">
    @csrf
    <input type="text" name="author_name" placeholder="Ваше имя (необязательно)">
    <textarea name="text" required></textarea>
    <input type="hidden" name="news_id" value="{{ $news->id }}">
    <button type="submit">Отправить</button>
</form>

<!-- Список комментариев -->
@foreach ($news->comments as $comment)
    <div class="comment">
        <strong>{{ $comment->author_name ?? 'Гость' }}</strong>
        <p>{{ $comment->text }}</p>
    </div>
@endforeach