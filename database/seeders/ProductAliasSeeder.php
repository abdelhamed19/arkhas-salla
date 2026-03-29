<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductAliasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = DB::table('products')->pluck('id');
        $stores   = DB::table('stores')->pluck('id');

        if ($products->isEmpty() || $stores->isEmpty()) {
            return;
        }

        $aliases = [
            [
                'product_id' => $products[0] ?? $products->random(),
                'store_id'   => $stores->random(),
                'store_sku'  => 'B0C7P8Z8Z8',
                'store_name' => 'iPhone 15 Pro 256GB Titanium Blue',
            ],
            [
                'product_id' => $products[0] ?? $products->random(),
                'store_id'   => $stores->random(),
                'store_sku'  => 'APP-IP15P-256',
                'store_name' => 'Apple iPhone 15 Pro',
            ],
            [
                'product_id' => $products[1] ?? $products->random(),
                'store_id'   => $stores->random(),
                'store_sku'  => 'SM-S928UZBAXAA',
                'store_name' => 'Samsung Galaxy S24 Ultra 512GB',
            ],
            [
                'product_id' => $products[2] ?? $products->random(),
                'store_id'   => $stores->random(),
                'store_sku'  => 'TS-WHT-M',
                'store_name' => 'White Cotton T-Shirt - Medium',
            ],
            [
                'product_id' => $products[3] ?? $products->random(),
                'store_id'   => $stores->random(),
                'store_sku'  => 'JEANS-BLU-32',
                'store_name' => 'Blue Denim Jeans 32 Waist',
            ],
            [
                'product_id' => $products[4] ?? $products->random(),
                'store_id'   => $stores->random(),
                'store_sku'  => 'SOFA-3L-BLK',
                'store_name' => '3 Seater Leather Sofa - Black',
            ],
            [
                'product_id' => $products[5] ?? $products->random(),
                'store_id'   => $stores->random(),
                'store_sku'  => 'RF500N-REF',
                'store_name' => 'Samsung Refrigerator 500 Liter',
            ],
        ];

        foreach ($aliases as $alias) {
            DB::table('product_aliases')->insert([
                'product_id' => $alias['product_id'],
                'store_id'   => $alias['store_id'],
                'store_sku'  => $alias['store_sku'],
                'store_name' => $alias['store_name'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
