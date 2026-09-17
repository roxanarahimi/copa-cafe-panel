<?php

namespace App\Filament\Resources\Products\Tables;

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
                    ->label('تصویر1')
                    ->disk('public')
                    ->getStateUsing(function ($record): string {
                        return $record->image1;
                    }), ImageColumn::make('image2')
                    ->label('تصویر2')
                    ->disk('public')
                    ->getStateUsing(function ($record): string {
                        return $record->image2;
                    }),
                TextColumn::make('title')
                    ->label('عنوان'),
                TextColumn::make('title_en')
                    ->label('عنوان انگلیسی'),


                IconColumn::make('visible')
                    ->label('نمایش')
                    ->boolean()
                    ->trueIcon('heroicon-o-check')->trueColor('success')
                    ->falseIcon('heroicon-o-x-mark')->falseColor('danger')
                ,

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
