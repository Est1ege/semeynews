<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class News extends Model {
    use HasTranslations;

    protected $fillable = [
        'title',
        'content',
        'image',
        'category_id',
        'is_featured',  // Добавляем это поле
    ];
    
    protected $translatable = ['title', 'content'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function views() {
        return $this->hasMany(View::class);
    }

    public function newsable()
    {
        return $this->morphTo();
    }
    
}