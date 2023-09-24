<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\Ingredient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DishIngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      foreach(Dish::all() as $dish){
         $ingredients = Ingredient::inRandomOrder()->take(rand(1, 4))->pluck('id');
         
         // + добавление атрибута в pivot-table
         foreach ($ingredients as $ingredient){
            $dish->ingredients()->attach($ingredient, ['gram_amount' => rand(5, 300)]);
         }
      }  
    }
}
