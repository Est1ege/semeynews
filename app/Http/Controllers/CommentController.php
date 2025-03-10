<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewCommentNotification;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{

    /**
     * Сохранение нового комментария или ответа на комментарий
     */
    public function store(Request $request)
    {
        // Добавляем валидацию капчи к остальным правилам
        $validated = $request->validate([
            'post_id' => 'required|exists:news,id',
            'parent_id' => 'nullable|exists:comments,id',
            'author_name' => 'required|string|max:255',
            'author_email' => 'required|email|max:255',
            'content' => 'required|string',
            'g-recaptcha-response' => 'required|captcha' // Проверка капчи
        ], [
            'g-recaptcha-response.required' => 'Пожалуйста, подтвердите, что вы не робот.',
            'g-recaptcha-response.captcha' => 'Проверка капчи не пройдена. Пожалуйста, попробуйте еще раз.'
        ]);
        
        // Если пользователь авторизован, сохраняем его ID
        if (auth()->check()) {
            $validated['user_id'] = auth()->id();
        }
        
        // Проверяем parent_id для ответов
        if (!empty($request->parent_id)) {
            // Проверяем, существует ли родительский комментарий
            $parentComment = Comment::find($request->parent_id);
            if (!$parentComment) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', __('The comment you are replying to does not exist.'));
            }
            
            // Если родительский комментарий уже является ответом, то используем его родителя
            if ($parentComment->parent_id) {
                $validated['parent_id'] = $parentComment->parent_id;
            } else {
                $validated['parent_id'] = $request->parent_id;
            }
        }
        
        // Решаем, нужна ли модерация
        $autoApprove = auth()->check() || 
                      !$this->containsUrls($validated['content']);
        
        $validated['is_approved'] = $autoApprove;
        
        // Удаляем 'g-recaptcha-response' из массива перед созданием комментария
        unset($validated['g-recaptcha-response']);
        
        try {
            // Создаем комментарий
            $comment = Comment::create($validated);
            
            // Находим пост для редиректа
            $post = News::findOrFail($validated['post_id']);
            
            // Отображаем сообщение в зависимости от статуса модерации
            if ($autoApprove) {
                return redirect()->route('news.show', $post->id)
                                ->with('success', __('Your comment has been published.'));
            } else {
                return redirect()->route('news.show', $post->id)
                                ->with('info', __('Your comment has been submitted and is awaiting moderation.'));
            }
            
        } catch (\Exception $e) {
            Log::error('Error creating comment', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return redirect()->back()
                ->withInput()
                ->with('error', __('An error occurred while saving your comment. Please try again.'));
        }
    }
    
    /**
     * Проверка содержимого на наличие URL
     * (простая защита от спама)
     */
    private function containsUrls($content)
    {
        // Простая проверка на наличие ссылок
        return preg_match('/(http|https|www)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/', $content);
    }
    
    /**
     * Изменение статуса одобрения комментария
     * (для админов через AJAX)
     */
    public function toggleApproval(Request $request, Comment $comment)
    {
        // Проверяем права доступа
        // (должно быть настроено с политиками доступа)
        if (!auth()->check() || !auth()->user()->can('manage', Comment::class)) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }
        
        $comment->is_approved = !$comment->is_approved;
        $comment->save();
        
        return response()->json([
            'success' => true,
            'is_approved' => $comment->is_approved,
            'message' => $comment->is_approved ? 'Comment approved' : 'Comment unapproved'
        ]);
    }
    
    /**
     * Удаление комментария
     */
    public function destroy(Comment $comment)
    {
        // Проверяем права доступа
        if (!auth()->check() || !auth()->user()->can('delete', $comment)) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }
        
        // Запоминаем ID поста для редиректа
        $postId = $comment->post_id;
        
        // Удаляем комментарий
        $comment->delete();
        
        // Возвращаем результат в зависимости от типа запроса
        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Comment deleted successfully'
            ]);
        }
        
        return redirect()->route('news.show', $postId)
                        ->with('success', __('Comment deleted successfully.'));
    }
}