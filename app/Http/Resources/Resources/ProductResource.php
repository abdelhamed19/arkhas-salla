<?php

namespace App\Http\Resources\Resources;

use App\Http\Resources\Collections\AliaseCollection;
use App\Http\Resources\Collections\PriceCollection;
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
            'id' => $this->id,
            'name_ar' => $this->name_ar,
            'name_en' => $this->name_en,
            'barcode' => $this->barcode,
            'image_url' => $this->image_url,
            'avg_price' => $this->avg_price,
            'category' => $this->category,
            'prices' => PriceCollection::make($this->whenLoaded('prices')),
            'aliases' => AliaseCollection::make($this->whenLoaded('aliases'))
        ];
    }
}
