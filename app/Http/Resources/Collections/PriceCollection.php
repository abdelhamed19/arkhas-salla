<?php

namespace App\Http\Resources\Collections;

use App\Http\Resources\Resources\PriceResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PriceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => PriceResource::collection($this->collection)
        ];
    }
}
