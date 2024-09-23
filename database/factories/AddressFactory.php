<?php

namespace Database\Factories;

use App\Models\Country;
use App\Models\Customer;
use App\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'address1' => fake()->streetAddress(),
            'address2' => fake()->streetName(),
            'city' => fake()->city(),
            'pincode' => fake()->numberBetween(100000, 999999),
            'state_id' => State::all()->random()->id,
            'country_id' => Country::all()->random()->id
        ];
    }
}
