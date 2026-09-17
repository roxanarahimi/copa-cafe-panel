<?php

namespace App\Filament\Resources\Products\Tables;

use App\Http\Controllers\DateController;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image1')
                    ->label('تصویر 1')
                    ->disk('public'),
                ImageColumn::make('image2')
                    ->label('تصویر 2')
                    ->disk('public'),
                TextColumn::make('title')
                    ->label('عنوان')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('title_en')
                    ->label('عنوان انگلیسی')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('category.title')
                    ->label('دسته بندی')
                    ->sortable(),


                IconColumn::make('visible')
                    ->label('نمایش')
                    ->boolean()
                    ->trueIcon('heroicon-o-check')->trueColor('success')
                    ->falseIcon('heroicon-o-x-mark')->falseColor('danger')
                ,
                TextColumn::make('created_at')
                    ->label('تاریخ ایجاد')
                    ->formatStateUsing(fn($state) => explode(' ', (new DateController())->toPersian($state))[0]),
            ])
            ->filters([
                //
            ])
            ->recordActions([
//                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
