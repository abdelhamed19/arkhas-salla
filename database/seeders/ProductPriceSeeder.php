<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = DB::table('products')->pluck('id');
        $stores = DB::table('stores')->pluck('id');

        if ($products->isEmpty() || $stores->isEmpty()) {
            return;
        }

        $prices = [];

        foreach ($products as $product_id) {
            foreach ($stores as $store_id) {

                $prices[] = [
                    'product_id' => $product_id,
                    'store_id' => $store_id,
                    'price' => rand(100, 50000) / 100,
                    'in_stock' => (bool) rand(0, 1),
                    'scraped_at' => now()->subHours(rand(0, 24)),
                ];


                $prices[] = [
                    'product_id' => $product_id,
                    'store_id' => $store_id,
                    'price' => rand(100, 50000) / 100,
                    'in_stock' => (bool) rand(0, 1),
                    'scraped_at' => now()->subDays(1)->subHours(rand(0, 12)),
                ];
            }
        }

        foreach ($prices as $price) {
            DB::table('product_prices')->insert([
                'product_id' => $price['product_id'],
                'store_id' => $price['store_id'],
                'price' => $price['price'],
                'in_stock' => $price['in_stock'],
                'scraped_at' => $price['scraped_at'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
