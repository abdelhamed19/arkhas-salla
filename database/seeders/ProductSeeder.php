<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = DB::table('categories')->pluck('id');

        if ($categories->isEmpty()) {
            return;
        }

        $products = [
            [
                'name_ar' => 'آيفون 15 برو',
                'name_en' => 'iPhone 15 Pro',
                'barcode' => '1234567890123',
                'image_url' => 'https://picsum.photos/id/1015/800/600',
                'avg_price' => 45999.99,
                'category_id' => $categories->random(),
            ],
            [
                'name_ar' => 'سامسونج جالاكسي S24 ألترا',
                'name_en' => 'Samsung Galaxy S24 Ultra',
                'barcode' => '9876543210987',
                'image_url' => 'https://picsum.photos/id/106/800/600',
                'avg_price' => 52999.99,
                'category_id' => $categories->random(),
            ],
            [
                'name_ar' => 'تيشيرت قطن أبيض',
                'name_en' => 'White Cotton T-Shirt',
                'barcode' => null,
                'image_url' => 'https://picsum.photos/id/201/800/600',
                'avg_price' => 299.99,
                'category_id' => $categories->random(),
            ],
            [
                'name_ar' => 'جينز أزرق رجالي',
                'name_en' => 'Blue Men Jeans',
                'barcode' => '5555555555555',
                'image_url' => 'https://picsum.photos/id/251/800/600',
                'avg_price' => 899.99,
                'category_id' => $categories->random(),
            ],
            [
                'name_ar' => 'كنبة جلد 3 مقاعد',
                'name_en' => '3 Seater Leather Sofa',
                'barcode' => null,
                'image_url' => 'https://picsum.photos/id/316/800/600',
                'avg_price' => 12500.00,
                'category_id' => $categories->random(),
            ],
            [
                'name_ar' => 'ثلاجة سامسونج 500 لتر',
                'name_en' => 'Samsung Refrigerator 500L',
                'barcode' => '1122334455667',
                'image_url' => 'https://picsum.photos/id/367/800/600',
                'avg_price' => 18999.99,
                'category_id' => $categories->random(),
            ],
            [
                'name_ar' => 'ماكينة قهوة ديلونجي',
                'name_en' => 'DeLonghi Coffee Machine',
                'barcode' => null,
                'image_url' => 'https://picsum.photos/id/431/800/600',
                'avg_price' => 4599.99,
                'category_id' => $categories->random(),
            ],
        ];

        foreach ($products as $product) {
            DB::table('products')->insert([
                'category_id' => $product['category_id'],
                'name_ar' => $product['name_ar'],
                'name_en' => $product['name_en'],
                'barcode' => $product['barcode'],
                'image_url' => $product['image_url'],
                'avg_price' => $product['avg_price'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
