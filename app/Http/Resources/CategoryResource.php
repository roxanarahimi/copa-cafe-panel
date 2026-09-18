<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            "id"=>$this->id,
            "title"=>$this->title,
            "title_en"=>$this->title_en,
            "products"=>ProductResource::collection($this->products),
            "created_at"=>$this->created_at,
        ];
    }
}
