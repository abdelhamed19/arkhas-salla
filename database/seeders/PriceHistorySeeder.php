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
        $productPrices = DB::table('product_prices')
            ->select('id', 'price')
            ->get();

        if ($productPrices->isEmpty()) {
            return;
        }

        $histories = [];

        foreach ($productPrices as $priceRecord) {
            $currentPrice = $priceRecord->price;
            $historyCount = rand(4, 6);

            for ($i = 0; $i < $historyCount; $i++) {
                $oldPrice = $currentPrice * (rand(80, 120) / 100);
                $oldPrice = round($oldPrice, 2);

                $daysAgo = ($i + 1) * rand(5, 15);

                $histories[] = [
                    'price_id' => $priceRecord->id,
                    'price' => $oldPrice,
                    'created_at' => now()->subDays($daysAgo),
                    'updated_at' => now()->subDays($daysAgo),
                ];
            }
        }

        if (!empty($histories)) {
            DB::table('price_histories')->insert($histories);
        }
    }
}
