<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductCart>
 */
class ProductCartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_id' => $this->faker->word(),
            'color_id' => $this->faker->word(),
            'user_id' => $this->faker->word(),
            'total_count' => $this->faker->word(),
            'count' => $this->faker->randomFloat(2, 10, 1000),
        ];
    }
}
