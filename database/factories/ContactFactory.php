<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Customer;
use App\Models\Department;
use App\Models\Tax;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContactPerson>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => Customer::factory(),
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'department' => fake()->jobTitle(),
            'phone' => fake()->numberBetween(1000000000, 9999999999),
            'mobile' => fake()->numberBetween(1000000000, 9999999999),
        ];
    }
}
