<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DishOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      foreach(Order::all() as $order)
      {
         $dishes = Dish::inRandomOrder()->take(rand(1, 4))->pluck('id');
         $order->dishes()->attach($dishes);
      }
    }
}
