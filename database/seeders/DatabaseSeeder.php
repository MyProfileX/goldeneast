<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Country;
use App\Models\Dish;
use App\Models\Gluten;
use App\Models\Ingredient;
use App\Models\Order;
use App\Models\Role;
use App\Models\User;
use App\Models\Vegetarian;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            OrderSeeder::class,
            // Подлез к dish_order

            glutenSeeder::class,
            IngredientSeeder::class,
            // Подлез к dish_ingredient

            CountrySeeder::class,
            VegetarianSeeder::class,
            DishSeeder::class,
            // Подлез к dish_order и dish_ingredient

            // сидим pivot-таблицы
            DishOrderSeeder::class,
            DishIngredientSeeder::class,
         ]);
    }
}
