<?php

namespace Database\Seeders;

use App\Models\Gluten;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GlutenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $glutenVariants = [
         ['is_gluten' => 'gluten'],
         ['is_gluten' => 'no gluten'],
      ];

      foreach($glutenVariants as $glutenVariant)
      {
         Gluten::create($glutenVariant);
      }
    }
}
