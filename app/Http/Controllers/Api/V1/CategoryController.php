<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\GetAllCategoriesRequest;
use App\Services\CategoryService;
use App\Traits\ResponseTrait;

class CategoryController extends Controller
{
    use ResponseTrait;

    public function __construct(private CategoryService $categoryService)
    {
    }

    public function index()
    {
        $data = $this->categoryService->getHomePageCategories();

        return $this->successResponse($data);
    }

    public function getAll(GetAllCategoriesRequest $request)
    {
        $data = $this->categoryService->getAllCategories($request->validated());

        return $this->successResponse($data);
    }
}
