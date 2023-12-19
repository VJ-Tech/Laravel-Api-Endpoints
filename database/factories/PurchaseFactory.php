<?php

namespace Database\Factories;

use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Purchase>
 */
class PurchaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => fake()->date(),
            'total' => fake()->numberBetween(1000,10000000),
            'user_id' => fake()->randomElement(User::pluck('id')),
            'invoice_no' => fake()->phoneNumber(),
            'supplier_id' => fake()->randomElement(Supplier::pluck('id')),
        ];
    }
}
