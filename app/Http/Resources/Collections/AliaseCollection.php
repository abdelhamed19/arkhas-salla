<?php

namespace App\Http\Resources\Collections;

use App\Http\Resources\Resources\AliaseResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AliaseCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => AliaseResource::collection($this->collection)
        ];
    }
}
