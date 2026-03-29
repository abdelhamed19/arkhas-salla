<?php
namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Facades\Cache;


class CategoryService
{
    public function getHomePageCategories()
    {
        // return Cache::remember('cached_categories', now()->addDays(10), function () {
            return Category::orderBy('created_at', 'DESC')
                ->take(4)
                ->get();
        // });
    }

    public function getAllCategories(array $filters)
    {
        $query = Category::orderBy('created_at', 'DESC');

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

        return $query->get();
    }
}
