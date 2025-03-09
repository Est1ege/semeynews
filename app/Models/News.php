<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class News extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $table = 'news';
    
    // Переводимые поля
    public $translatable = [
        'title',
        'content',
        'excerpt'
    ];
    
    protected $fillable = [
        'title',
        'content',
        'excerpt',
        'image',
        'category_id',
        'author_id',
        'views',
        'is_featured',
        'is_trending'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}