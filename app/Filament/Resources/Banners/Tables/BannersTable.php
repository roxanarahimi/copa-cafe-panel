<?php

namespace App\Filament\Resources\Banners\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;

class BannersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('تصویر')

                    ->disk('public')
                    ->getStateUsing(function ($record): string {
                        return $record->image;
                    }),
                IconColumn::make('visible')
                    ->label('نمایش')
                    ->boolean()
                    ->trueIcon('heroicon-o-check')->trueColor('success')
                    ->falseIcon('heroicon-o-x-mark')->falseColor('danger')

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
