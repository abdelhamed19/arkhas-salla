<?php

namespace App\Http\Resources\Resources;

use App\Http\Resources\Collections\PriceHistoryCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PriceResource extends JsonResource
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
            'store' => StoreResource::make($this->store),
            'price' => $this->price,
            'in_stock' => $this->in_stock,
            'price_history' => PriceHistoryCollection::make($this->history),
            'scraped_at' => $this->scraped_at,
        ];
    }
}
