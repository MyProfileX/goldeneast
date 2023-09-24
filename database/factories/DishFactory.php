<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use app\Models\Country;
use App\Models\Vegetarian;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dish>
 */
class DishFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    
    public function definition(): array
    {
        return [
           'title' => $this->faker->word(),
           'price' => random_int(500, 3000),
           'description' => $this->faker->sentence(), // Обновил
           'image' => $this->faker->imageUrl(),

           'country_id' => Country::get()->random()->id,

           'vegetarian_id' => Vegetarian::get()->random()->id,
        ];
    }
}

