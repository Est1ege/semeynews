<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsTranslation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'news_id',
        'language',
        'title',
        'content',
        'meta_description',
        'meta_keywords',
        'views',
    ];

    /**
     * Получить новость, к которой относится этот перевод
     */
    public function news()
    {
        return $this->belongsTo(News::class);
    }

    /**
     * Получить язык перевода
     */
    public function language()
    {
        return $this->belongsTo(Language::class, 'language', 'code');
    }

    /**
     * Получить сниппет текста (для превью)
     */
    public function getSnippetAttribute($length = 200)
    {
        if (empty($this->content)) {
            return '';
        }
        
        $snippet = strip_tags($this->content);
        if (mb_strlen($snippet) <= $length) {
            return $snippet;
        }
        
        return mb_substr($snippet, 0, $length) . '...';
    }
}