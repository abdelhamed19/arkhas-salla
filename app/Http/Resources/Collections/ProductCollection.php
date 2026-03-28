<?php

namespace App\Http\Resources\Collections;

use App\Http\Resources\Resources\ProductResource;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    use ResponseTrait;
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => ProductResource::collection($this->collection),
            'pagination' => $this->paginatedData($this->resource)
        ];
    }
}
