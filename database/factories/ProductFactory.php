<?php

namespace Database\Factories;

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
    public function definition()
    {
        return [
            'brand' => $this->faker->word(),
            'model' => $this->faker->word(),
            'size' => $this->faker->word(),
            'color_id' => $this->faker->word(),
            'price' => $this->faker->randomFloat(2, 10, 1000),
        ];
    }
}
