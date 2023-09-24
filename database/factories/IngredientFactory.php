<?php

namespace Database\Factories;

use App\Models\Gluten;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ingredient>
 */
class IngredientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word(), // обновил
            'price_for_gram' => random_int(20, 500),
            'gluten_id' => Gluten::get()->random()->id,
        ];
    }
}
