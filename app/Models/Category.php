<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model {
    use HasTranslations;
    use HasFactory;

    protected $translatable = ['name'];

    /**
     * Поля, которые можно массово заполнять.
     */
    protected $fillable = ['name', 'description'];

    /**
     * Определение отношения "Одна категория имеет много новостей".
     */
    public function news()
    {
        return $this->hasMany(News::class);
    }
    public function posts()
{
    return $this->hasMany(News::class);
}

}
