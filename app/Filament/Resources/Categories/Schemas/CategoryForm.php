<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('عنوان'),
                TextInput::make('title_en')
                    ->label('عنوان انگلیسی'),
                TextInput::make('link')
                    ->label('لینک')
                    ->columnSpanFull(),
                TextInput::make('link_en')
                    ->label('لینک انگلیسی')
                    ->columnSpanFull(),
                Select::make('visible')
                    ->label('نمایش')
                    ->options([
                        '1' => 'بله',
                        '0' => 'خیر',
                    ]),





            ]);
    }
}
