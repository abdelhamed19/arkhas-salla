<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function created(Product $product)
    {
        $this->clearProductCache();
    }

    /**
     * Handle the Product "updated" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {
        $this->clearProductCache();
    }

    /**
     * Handle the Product "deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {
        $this->clearProductCache();
    }

    /**
     * Clear all product-related caches.
     *
     * @return void
     */
    protected function clearProductCache()
    {
        // Invalidate all cache keys tagged with 'products'
        // This is the most efficient way to invalidate multiple related cache entries in Laravel,
        // especially when using Redis as the cache driver.
        Cache::tags('products')->flush();
    }
}
