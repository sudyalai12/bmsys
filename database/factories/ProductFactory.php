<?php

namespace Database\Factories;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'supplier_id' => Supplier::all()->random()->id,
            'part_number' => fake()->ean8(),
            'description' => fake()->sentence(),
            'unit_price' => fake()->numberBetween(100, 1000),
            'purchase_price' => fake()->numberBetween(100, 1000),
            'sale_price' => fake()->numberBetween(100, 1000),
            'hsn_code' => fake()->ean8(),
        ];
    }
}
