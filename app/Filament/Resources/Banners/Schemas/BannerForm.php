<?php

namespace App\Filament\Resources\Banners\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Symfony\Component\Console\Input\Input;

class BannerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('image')
                    ->label('تصویر')
                    ->required()
//                    ->multiple()
//                    ->reorderable()
//                    ->maxFiles(10)
                    ->imageEditor()
                    ->imageCropAspectRatio('17:7')
                    ->disk('public') // or your disk
                    ->directory('images/banners')
                    ->visibility('public')
                    ->imageEditorEmptyFillColor('#000000')
//                    ->circleCropper()
                    ->getUploadedFileNameForStorageUsing(function ($file): string {
                        return 'copa-cafe-banner-' . time() . '.' . $file->getClientOriginalExtension();
                    }),
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
                    ])
            ]);
    }
}
