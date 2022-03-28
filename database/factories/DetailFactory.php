<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Detail>
 */
class DetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'order_id' => rand(1, 10),
            'product_id' => rand(1, 50),
            'price' => rand(1, 100),
            'quantity' => rand(1, 20),
            'total' => rand(10, 500),
        ];
    }
}
