<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;

    /**
     * Атрибуты, доступные для массового заполнения
     */
    protected $fillable = [
        'post_id',
        'parent_id',
        'author_name',
        'author_email',
        'content',
        'is_approved',
        'user_id',
    ];

    /**
     * Атрибуты, которые должны быть приведены к определённым типам
     */
    protected $casts = [
        'is_approved' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Значения по умолчанию для атрибутов
     */
    protected $attributes = [
        'is_approved' => false,
    ];

    /**
     * Связь с новостью/постом
     * Обратите внимание, что мы явно указываем имя внешнего ключа и таблицы
     */
    public function post(): BelongsTo
    {
        return $this->belongsTo(News::class, 'post_id');
    }

    /**
     * Связь с родительским комментарием
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    /**
     * Связь с дочерними комментариями
     */
    public function replies(): HasMany
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
    
    /**
     * Связь с пользователем (если комментарий оставлен авторизованным)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * Получение только одобренных комментариев
     */
    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }
    
    /**
     * Получение только комментариев верхнего уровня (не ответы)
     */
    public function scopeTopLevel($query)
    {
        return $query->whereNull('parent_id');
    }
}