<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory;
    use HasTranslations;

    // Переводимые поля
    public $translatable = [
        'name',
        'description',
        'slug'
    ];
    
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public function news(): HasMany
    {
        return $this->hasMany(News::class);
    }
    
    // Альтернативный метод для доступа к новостям
    public function posts(): HasMany
    {
        return $this->hasMany(News::class, 'category_id');
    }
}