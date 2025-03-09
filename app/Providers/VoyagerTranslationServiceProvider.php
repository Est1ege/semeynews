<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\DataType;

class VoyagerTranslationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Заставить Voyager распознавать поля как переводимые
        $this->makeFieldsTranslatable();
    }

    private function makeFieldsTranslatable()
    {
        // После загрузки хлеба (BREAD)
        Voyager::onLoadingDataType(function ($dataType) {
            // Для модели News
            if ($dataType->slug === 'news') {
                // Поля, которые нужно сделать переводимыми
                $fields = ['title', 'content'];
                
                foreach ($fields as $field) {
                    if ($row = $dataType->rows->where('field', $field)->first()) {
                        $row->translatable = 1;
                    }
                }
            }
        });
    }
}