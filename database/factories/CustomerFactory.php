<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Country;
use App\Models\Tax;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'nickname' => fake()->regexify('[A-Z]{4}'),
            'address_id' => Address::factory(),
            'tax_id' => Tax::all()->random()->id,
            'gstn' => fake()->regexify('[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}[Z]{1}[0-9A-Z]{1}'),
            'pan' => fake()->regexify('[A-Z]{5}[0-9]{4}[A-Z]{1}'),
            'state_code' => fake()->regexify('[0-9]{2}'),
        ];
    }
}
