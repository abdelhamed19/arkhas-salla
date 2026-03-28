<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\GetAllProductsRequest;
use App\Http\Resources\Collections\ProductCollection;
use App\Http\Resources\Resources\ProductResource;
use App\Services\ProductService;
use App\Traits\ResponseTrait;

class ProductController extends Controller
{
    use ResponseTrait;
    public function __construct(private ProductService $productService)
    {
    }

    public function index(GetAllProductsRequest $request)
    {
        $filters = $request->validated();

        $data = $this->productService->findAllProducts($filters);

        return $this->successResponse(ProductCollection::make($data));
    }

    public function show($id)
    {
        $result = $this->productService->getProduct($id);
        if ($result) {
            return $this->successResponse(ProductResource::make($result));
        }
        return $this->notFoundResponse();
    }

}
