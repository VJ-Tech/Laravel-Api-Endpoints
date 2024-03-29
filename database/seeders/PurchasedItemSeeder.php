<?php

namespace Database\Seeders;


use App\Models\PurchasedItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchasedItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PurchasedItem::factory(200)->create();
    }
}
