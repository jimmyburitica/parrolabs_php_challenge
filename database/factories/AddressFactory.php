<?php

namespace Database\Factories;

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
    public function definition()
    {
        return [
            'address' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'state' => 'FL',
            'zip' => rand(33010, 33545),
            'country' => $this->faker->country(),
            'customer_id' => rand(1, 5),
        ];
    }
}
