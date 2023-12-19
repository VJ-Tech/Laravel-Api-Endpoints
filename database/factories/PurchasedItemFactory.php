<?php

namespace Database\Factories;

use App\Models\Merchandise;
use App\Models\Purchase;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PurchasedItem>
 */
class PurchasedItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'whole_sale_qty' =>fake()->numberBetween(1,1000),
            'purchase_price' => fake()->numberBetween(100,1000000),
            'purchase_id' => fake()->randomElement(Purchase::pluck('id')),
            'merchandise_id' => fake()->randomElement(Merchandise::pluck('id')),
        ];
    }
}
