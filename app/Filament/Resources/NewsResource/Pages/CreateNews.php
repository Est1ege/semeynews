<?php

namespace App\Filament\Resources\NewsResource\Pages;

use App\Filament\Resources\NewsResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions;

class CreateNews extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    
    protected static string $resource = NewsResource::class;
    
    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}