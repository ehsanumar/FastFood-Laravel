<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'price' => fake()->numberBetween(10,50),
            'description' => fake()->text(40),
            'quantity' => fake()->numberBetween(10, 40),
            'image' => fake()->imageUrl(),
            'category_id' =>1,
        ];
    }
}
