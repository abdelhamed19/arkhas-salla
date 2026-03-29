<?php
namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class ProductService
{
    public function findAllProducts(array $filters)
    {
        $page = $filters['page'] ?? request()->get('page', 1);
        $cacheKey = $this->generateCacheKey($filters, $page);

        return Cache::tags('products')->remember($cacheKey, now()->addMinutes(30), function () use ($filters) {

            $query = Product::with(['category']);

            if (!empty($filters['name'])) {
                $search = trim($filters['name']);

                $query->where(function ($q) use ($search) {
                    $q->whereRaw(
                        "MATCH(name_ar, name_en) AGAINST(? IN NATURAL LANGUAGE MODE)",
                        [$search]
                    )
                        ->orWhere('name_ar', 'like', "%{$search}%")
                        ->orWhere('name_en', 'like', "%{$search}%");
                });
            }

            if (!empty($filters['category'])) {
                $query->where('category_id', $filters['category']);
            }

            if (!empty($filters['price_order'])) {
                $query->orderBy('avg_price', $filters['price_order']);
            } else {
                $query->orderBy('created_at', 'DESC');
            }

            return $query->paginate(10);
        });
    }

    protected function generateCacheKey(array $filters, $page)
    {
        ksort($filters);

        return 'products_listing_' . md5(json_encode($filters)) . '_page_' . $page;
    }

    public function getProduct($id)
    {
        $product = Product::with(['category', 'prices', 'aliases'])
            ->where('id', $id)
            ->first();
        return $product ?? null;
    }

}
