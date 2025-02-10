<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PollController;
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
Route::get('/category/{id}', [NewsController::class, 'category'])->name('category.show');

// Комментарии (доступны для всех пользователей)
Route::post('/post/{id}/comment', [CommentController::class, 'store'])->name('comment.store');

// Голосование в опросах
Route::post('/poll/vote', [PollController::class, 'vote'])->name('poll.vote');
Route::get('/poll/archive', [PollController::class, 'archive'])->name('poll.archive');

// Панель администратора Voyager
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

