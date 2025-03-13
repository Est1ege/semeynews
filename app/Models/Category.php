<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory, HasTranslations;
    
    public $translatable = [
        'name',
        'description',
        'slug'
    ];
    
    protected $fillable = [
        'name',        // Переводимое поле
        'slug',        // Переводимое поле
        'description', // Переводимое поле
        'parent_id',   // Обычное поле - просто ID родителя
        'order',       // Обычное поле - число для сортировки
        'is_active',   // Обычное поле - булево значение
        'icon',        // Обычное поле - строка
    ];
    
    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Получить родительскую категорию
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * Получить дочерние категории (подкатегории)
     */
    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    /**
     * Получить все новости в этой категории
     */
    public function news(): HasMany
    {
        return $this->hasMany(News::class);
    }
    
    /**
     * Альтернативный метод для доступа к новостям
     */
    public function posts(): HasMany
    {
        return $this->hasMany(News::class, 'category_id');
    }
}