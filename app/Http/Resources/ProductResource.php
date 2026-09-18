<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "image1" => $this->image1,
            "thumb1" => str_replace('.png', '_thumb.png', $this->image1),
            "image2" => $this->image2,
            "thumb2" => str_replace('.png', '_thumb.png', $this->image2),
            "category" => ["id" => $this->category->id,
                "title" => $this->category->title,
                "title_en" => $this->category->title_en
            ],

            "title" => $this->title,
            "title_en" => $this->title_en,
            "subTitle" => $this->subTitle,
            "subTitle_en" => $this->subTitle_en,
            "text" => $this->text,
            "text_en" => $this->text_en,


        ];
    }
}
