<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            StoreSeeder::class,
            ProductSeeder::class,
            ProductAliasSeeder::class,
            ProductPriceSeeder::class,
            PriceHistorySeeder::class,
        ]);

    }
}
