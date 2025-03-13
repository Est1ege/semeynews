<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Models\News;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\Concerns\Translatable;

class NewsResource extends Resource
{
    use Translatable;

    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationGroup = 'Контент';

    protected static ?int $navigationSort = 1;

    public static function getNavigationLabel(): string
    {
        return 'Новости';
    }

    public static function getModelLabel(): string
    {
        return 'Новость';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Новости';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->label('Заголовок')
                                    ->required()
                                    ->maxLength(255),
                                    
                                Forms\Components\RichEditor::make('content')
                                    ->label('Содержание')
                                    ->required()
                                    ->fileAttachmentsDisk('public')
                                    ->fileAttachmentsDirectory('uploads')
                                    ->columnSpan('full'),
                                    
                                Forms\Components\Textarea::make('excerpt')
                                    ->label('Краткое описание')
                                    ->columnSpan('full'),
                                
                                Forms\Components\TextInput::make('views')
                                    ->label('Количество просмотров')
                                    ->numeric()
                                    ->minValue(0)
                                    ->default(0)
                                    ->helperText('Установите начальное количество просмотров')
                                    ->required(),
                            ]),
                    ])
                    ->columnSpan(['lg' => 2]),
                    
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Свойства')
                            ->schema([
                                Forms\Components\FileUpload::make('image')
                                    ->label('Изображение')
                                    ->image()
                                    ->disk('public')
                                    ->directory('news_images')
                                    ->visibility('public')
                                    ->imageResizeMode('cover')
                                    ->imageCropAspectRatio('16:9')
                                    ->imageResizeTargetWidth('1200')
                                    ->imageResizeTargetHeight('675')
                                    ->getUploadedFileNameForStorageUsing(function (\Livewire\Features\SupportFileUploads\TemporaryUploadedFile $file): string {
                                        return \Illuminate\Support\Str::uuid() . '.' . $file->getClientOriginalExtension(); }),
                                    
                                Forms\Components\Select::make('category_id')
                                    ->label('Категория')
                                    ->relationship('category', 'name')
                                    ->preload()
                                    ->searchable(),
                                    
                                Forms\Components\Select::make('author_id')
                                    ->label('Автор')
                                    ->relationship('author', 'name')
                                    ->preload()
                                    ->searchable(),
                                    
                                Forms\Components\Toggle::make('is_featured')
                                    ->label('Избранная новость')
                                    ->default(false),
                                    
                                Forms\Components\Toggle::make('is_trending')
                                    ->label('Тренд')
                                    ->default(false),
                            ]),
                    ])
                    ->columnSpan(['lg' => 1]),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Изображение')
                    ->disk('public')
                    ->circular(),
                    
                Tables\Columns\TextColumn::make('title')
                    ->label('Заголовок')
                    ->searchable()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Категория')
                    ->searchable()
                    ->sortable(),
                    
                Tables\Columns\ToggleColumn::make('is_featured')
                    ->label('Избранная')
                    ->sortable(),
                    
                Tables\Columns\ToggleColumn::make('is_trending')
                    ->label('Тренд')
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('views')
                    ->label('Просмотры')
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Создано')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('views')
                    ->label('Просмотры')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('category_id')
                    ->label('Категория')
                    ->relationship('category', 'name')
                    ->preload()
                    ->searchable(),
                    
                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('Избранная'),
                    
                Tables\Filters\TernaryFilter::make('is_trending')
                    ->label('Тренд'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),

                Tables\Actions\Action::make('updateViews')
                    ->label('Изменить просмотры')
                    ->icon('heroicon-o-eye')
                    ->form([
                        Forms\Components\TextInput::make('views')
                            ->label('Количество просмотров')
                            ->numeric()
                            ->required()
                            ->minValue(0)
                            ->default(function (News $record): int {
                                return $record->views;
                            }),
                    ])
                    ->action(function (News $record, array $data): void {
                        $record->update([
                            'views' => $data['views'],
                        ]);
                    }),

                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}

