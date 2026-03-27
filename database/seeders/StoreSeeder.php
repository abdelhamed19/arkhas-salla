<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stores = [
            [
                'name' => 'Amazon',
                'logo_url' => 'https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_logo.svg',
                'scrape_url' => 'https://www.amazon.eg/',
                'is_active' => true,
            ],
            [
                'name' => 'Jumia',
                'logo_url' => 'https://upload.wikimedia.org/wikipedia/commons/8/8a/Jumia_Logo.svg',
                'scrape_url' => 'https://www.jumia.com.eg/',
                'is_active' => true,
            ],
            [
                'name' => 'Noon',
                'logo_url' => 'https://upload.wikimedia.org/wikipedia/commons/9/9f/Noon_Logo.svg',
                'scrape_url' => 'https://www.noon.com/egypt-ar/',
                'is_active' => true,
            ],
            [
                'name' => 'Souq',
                'logo_url' => 'https://www.souq.com/favicon.ico', // Souq أصبح جزء من Amazon
                'scrape_url' => 'https://egypt.souq.com/',
                'is_active' => false,
            ],
            [
                'name' => 'Btech',
                'logo_url' => 'https://btech.com/favicon.ico',
                'scrape_url' => 'https://btech.com/',
                'is_active' => true,
            ],
            [
                'name' => '2B',
                'logo_url' => 'https://2b.com.eg/favicon.ico',
                'scrape_url' => 'https://2b.com.eg/',
                'is_active' => true,
            ],
            [
                'name' => 'Carrefour',
                'logo_url' => 'https://upload.wikimedia.org/wikipedia/commons/5/5b/Carrefour_logo.svg',
                'scrape_url' => 'https://www.carrefour.eg/',
                'is_active' => true,
            ],
            [
                'name' => 'IKEA',
                'logo_url' => 'https://upload.wikimedia.org/wikipedia/commons/9/9f/Ikea_logo.svg',
                'scrape_url' => 'https://www.ikea.com/eg/ar/',
                'is_active' => true,
            ],
        ];

        foreach ($stores as $store) {
            // توليد slug من الاسم (مثال: Amazon → amazon)
            $slug = Str::slug($store['name'], '-');

            DB::table('stores')->insert([
                'name' => $store['name'],
                'slug' => $slug,
                'logo_url' => $store['logo_url'],
                'scrape_url' => $store['scrape_url'],
                'is_active' => $store['is_active'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $this->command->info('✅ تم إضافة ' . count($stores) . ' متجر بنجاح!');
    }
}
