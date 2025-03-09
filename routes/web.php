<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use TCG\Voyager\Facades\Voyager;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Здесь регистрируются веб-маршруты для приложения. Эти маршруты загружаются
| с помощью RouteServiceProvider и все они будут назначены на группу "web".
|
*/

// Главная страница
Route::get('/', [NewsController::class, 'index'])->name('home');

// Новости
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

// Категории
Route::get('/blog/category/{id}', [CategoryController::class, 'show'])->name('blog.category');

// Комментарии (доступны для всех пользователей)
Route::post('/news/{id}/comment', [CommentController::class, 'store'])->name('comment.store');

// Голосование в опросах
Route::post('/poll/vote', [NewsController::class, 'vote'])->name('poll.vote');
Route::get('/poll/archive', [NewsController::class, 'archive'])->name('poll.archive');

// Добавьте прямо над блоком Voyager::routes()
Route::get('/admin-test', function () {
    return redirect()->route('voyager.dashboard');
});


// Панель администратора Voyager



Route::get('/locale/{locale}', [App\Http\Controllers\LocaleController::class, 'switchLocale'])->name('locale.switch');
