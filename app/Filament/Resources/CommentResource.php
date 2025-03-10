<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommentResource\Pages;
use App\Models\Comment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class CommentResource extends Resource
{
    protected static ?string $model = Comment::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    
    protected static ?string $navigationGroup = 'Контент';
    
    protected static ?int $navigationSort = 3;

    public static function getNavigationLabel(): string
    {
        return 'Комментарии';
    }

    public static function getModelLabel(): string
    {
        return 'Комментарий';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Комментарии';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Информация о комментарии')
                            ->schema([
                                Forms\Components\Select::make('post_id')
                                    ->label('Статья')
                                    ->relationship('post', 'title')
                                    ->searchable()
                                    ->preload()
                                    ->required(),
                                
                                Forms\Components\Select::make('parent_id')
                                    ->label('Родительский комментарий')
                                    ->relationship('parent', 'content', function (Builder $query) {
                                        return $query->limit(100);
                                    })
                                    ->searchable()
                                    ->preload()
                                    ->placeholder('Нет родительского комментария'),
                                
                                Forms\Components\TextInput::make('author_name')
                                    ->label('Имя автора')
                                    ->required()
                                    ->maxLength(255),
                                
                                Forms\Components\TextInput::make('author_email')
                                    ->label('Email автора')
                                    ->email()
                                    ->required()
                                    ->maxLength(255),
                                
                                Forms\Components\Textarea::make('content')
                                    ->label('Содержание')
                                    ->required()
                                    ->rows(5),
                            ]),
                    ])
                    ->columnSpan(['lg' => 2]),
                
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Статус')
                            ->schema([
                                Forms\Components\Toggle::make('is_approved')
                                    ->label('Одобрен')
                                    ->default(false)
                                    ->helperText('Только одобренные комментарии отображаются на сайте'),
                                
                                Forms\Components\Placeholder::make('created_at')
                                    ->label('Создан')
                                    ->content(fn (Comment $record): ?string => $record->created_at?->diffForHumans()),
                                    
                                Forms\Components\Placeholder::make('updated_at')
                                    ->label('Обновлен')
                                    ->content(fn (Comment $record): ?string => $record->updated_at?->diffForHumans()),
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
                Tables\Columns\TextColumn::make('author_name')
                    ->label('Автор')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('content')
                    ->label('Содержание')
                    ->limit(50)
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('post.title')
                    ->label('Статья')
                    ->limit(30)
                    ->searchable(),
                
                Tables\Columns\IconColumn::make('is_approved')
                    ->label('Одобрен')
                    ->boolean()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Дата')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('is_approved')
                    ->label('Статус')
                    ->options([
                        true => 'Одобренные',
                        false => 'На модерации',
                    ]),
                
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')
                            ->label('От'),
                        Forms\Components\DatePicker::make('created_until')
                            ->label('До'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
            ])
            ->actions([
                Tables\Actions\Action::make('approve')
                    ->label('Одобрить')
                    ->icon('heroicon-o-check')
                    ->color('success')
                    ->visible(fn (Comment $record) => !$record->is_approved)
                    ->action(function (Comment $record) {
                        $record->is_approved = true;
                        $record->save();
                    }),
                
                Tables\Actions\Action::make('unapprove')
                    ->label('Отклонить')
                    ->icon('heroicon-o-x-mark')
                    ->color('danger')
                    ->visible(fn (Comment $record) => $record->is_approved)
                    ->action(function (Comment $record) {
                        $record->is_approved = false;
                        $record->save();
                    }),
                
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\BulkAction::make('approve')
                        ->label('Одобрить')
                        ->icon('heroicon-o-check')
                        ->action(function (Collection $records) {
                            $records->each(function (Comment $record) {
                                $record->is_approved = true;
                                $record->save();
                            });
                        }),
                    
                    Tables\Actions\BulkAction::make('unapprove')
                        ->label('Отклонить')
                        ->icon('heroicon-o-x-mark')
                        ->action(function (Collection $records) {
                            $records->each(function (Comment $record) {
                                $record->is_approved = false;
                                $record->save();
                            });
                        }),
                    
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListComments::route('/'),
            'create' => Pages\CreateComment::route('/create'),
            'edit' => Pages\EditComment::route('/{record}/edit'),
        ];
    }
}