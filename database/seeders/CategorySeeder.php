<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name_ar' => 'إلكترونيات',
                'name_en' => 'Electronics',
                'image_url' => 'https://picsum.photos/id/1015/800/600',
            ],
            [
                'name_ar' => 'ملابس',
                'name_en' => 'Clothing',
                'image_url' => 'https://picsum.photos/id/201/800/600',
            ],
            [
                'name_ar' => 'كتب',
                'name_en' => 'Books',
                'image_url' => 'https://picsum.photos/id/201/800/600',
            ],
            [
                'name_ar' => 'أثاث',
                'name_en' => 'Furniture',
                'image_url' => 'https://picsum.photos/id/316/800/600',
            ],
            [
                'name_ar' => 'أدوات منزلية',
                'name_en' => 'Home Appliances',
                'image_url' => 'https://picsum.photos/id/367/800/600',
            ],
            [
                'name_ar' => 'رياضة',
                'name_en' => 'Sports',
                'image_url' => 'https://picsum.photos/id/251/800/600',
            ],
            [
                'name_ar' => 'جمال وصحة',
                'name_en' => 'Beauty & Health',
                'image_url' => 'https://picsum.photos/id/431/800/600',
            ],
            [
                'name_ar' => 'ألعاب',
                'name_en' => 'Toys & Games',
                'image_url' => 'https://picsum.photos/id/133/800/600',
            ],
            [
                'name_ar' => 'سيارات وقطع غيار',
                'name_en' => 'Cars & Auto Parts',
                'image_url' => 'https://picsum.photos/id/1074/800/600',
            ],
            [
                'name_ar' => 'طعام وشراب',
                'name_en' => 'Food & Beverages',
                'image_url' => 'https://picsum.photos/id/292/800/600',
            ],
        ];

        foreach ($categories as $category) {
            $slug = Str::slug($category['name_en'], '-');

            DB::table('categories')->insert([
                'name_ar' => $category['name_ar'],
                'name_en' => $category['name_en'],
                'slug' => $slug,
                'image_url' => $category['image_url'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
