<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Models\Category;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('images')
                    ->label('تصاویر(2 عدد)')
                    ->required()
                    ->multiple()
//                    ->reorderable()
                    ->minFiles(2)
                    ->maxFiles(2)
                    ->imageEditor()
                    ->imageCropAspectRatio('1:1')
                    ->disk('public') // or your disk
                    ->directory('img/product')
                    ->visibility('public')
                    ->imageEditorEmptyFillColor('#000000')
                    ->getUploadedFileNameForStorageUsing(function ($file): string {
                        return 'copa-cafe-product-' . time() . '.' . $file->getClientOriginalExtension();
                    }),
                Select::make('product_category_id')
                    ->label('دسته‌بندی')
                    ->options(
                        Category::pluck('title', 'id')->toArray()
                    )
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('title')
                    ->label('عنوان')->columnStart(1),
                TextInput::make('title_en')
                    ->label('عنوان انگلیسی'),
                TextInput::make('subTitle')
                    ->label('زیرنویس'),
                TextInput::make('subTitle_en')
                    ->label('زیرنویس انگلیسی'),
                TextInput::make('text')
                    ->label('توضیح'),
                TextInput::make('text_en')
                    ->label('توضیح انگلیسی'),

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
