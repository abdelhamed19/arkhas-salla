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
            ],
            [
                'name_ar' => 'ملابس',
                'name_en' => 'Clothing',
            ],
            [
                'name_ar' => 'كتب',
                'name_en' => 'Books',
            ],
            [
                'name_ar' => 'أثاث',
                'name_en' => 'Furniture',
            ],
            [
                'name_ar' => 'أدوات منزلية',
                'name_en' => 'Home Appliances',
            ],
            [
                'name_ar' => 'رياضة',
                'name_en' => 'Sports',
            ],
            [
                'name_ar' => 'جمال وصحة',
                'name_en' => 'Beauty & Health',
            ],
            [
                'name_ar' => 'ألعاب',
                'name_en' => 'Toys & Games',
            ],
            [
                'name_ar' => 'سيارات وقطع غيار',
                'name_en' => 'Cars & Auto Parts',
            ],
            [
                'name_ar' => 'طعام وشراب',
                'name_en' => 'Food & Beverages',
            ],
        ];

        foreach ($categories as $category) {
            // توليد slug من الاسم الإنجليزي (مفضل للـ URLs)
            $slug = Str::slug($category['name_en'], '-');

            // لو عايز slug عربي (مش مستحب للـ SEO والـ URLs)
            // $slug = Str::slug($category['name_ar'], '-', null); // null عشان يسمح بالعربي

            DB::table('categories')->insert([
                'name_ar' => $category['name_ar'],
                'name_en' => $category['name_en'],
                'slug' => $slug,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $this->command->info('✅ تم إضافة ' . count($categories) . ' تصنيفات بنجاح!');
    }
}
