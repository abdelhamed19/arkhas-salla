<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriceHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // جلب كل أسعار المنتجات الموجودة
        $productPrices = DB::table('product_prices')
            ->select('id', 'price', 'product_id', 'store_id')
            ->get();

        if ($productPrices->isEmpty()) {
            $this->command->error('يجب إضافة بيانات في جدول product_prices أولاً!');
            return;
        }

        $histories = [];

        foreach ($productPrices as $priceRecord) {
            $currentPrice = $priceRecord->price;

            // نضيف 4–6 سجلات تاريخية لكل سعر
            $historyCount = rand(4, 6);

            for ($i = 0; $i < $historyCount; $i++) {
                // السعر القديم يكون قريب من السعر الحالي (±20%)
                $oldPrice = $currentPrice * (rand(80, 120) / 100);
                $oldPrice = round($oldPrice, 2);

                // تاريخ أقدم تدريجياً
                $daysAgo = ($i + 1) * rand(5, 15);

                $histories[] = [
                    'price_id'   => $priceRecord->id,
                    'price'      => $oldPrice,
                    'created_at' => now()->subDays($daysAgo),
                    'updated_at' => now()->subDays($daysAgo),
                ];
            }
        }

        // إدخال البيانات دفعة واحدة (أفضل للأداء)
        DB::table('price_histories')->insert($histories);

        $this->command->info('✅ تم إضافة ' . count($histories) . ' سجل تاريخي للأسعار بنجاح!');
        $this->command->info('   (تاريخ أسعار لكل سعر حالي في product_prices)');
    }
}
