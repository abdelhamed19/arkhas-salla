<?php
namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function findAllProducts($filters)
    {
        $query = Product::with(['category']);

        if (!empty($filters['name'])) {

            $search = trim($filters['name']);

            $query->where(function ($q) use ($search) {

                $q->whereRaw(
                    "MATCH(name_ar, name_en) AGAINST(? IN NATURAL LANGUAGE MODE)",
                    [$search]
                )
                    ->orWhere('name_ar', 'like', "%$search%")
                    ->orWhere('name_en', 'like', "%$search%");
            });
        }

        if (!empty($filters['category'])) {
            $category = $filters['category'];
            $query->where('category_id', $category);
        }

        if (!empty($filters['price_order'])) {
            $priceOrder = $filters['price_order'];
            $query->orderBy('avg_price', $priceOrder);
        }

        $query->orderBy('created_at', 'DESC');

        return $query->paginate(10);
    }

    public function getProduct($id)
    {
        $product = Product::with(['category', 'prices', 'aliases'])
            ->where('id', $id)
            ->first();
        return $product ?? null;
    }
}
