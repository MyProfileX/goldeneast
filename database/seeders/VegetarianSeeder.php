<?php

namespace Database\Seeders;

use App\Models\Vegetarian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VegetarianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vegetarianVariants = [
         ['is_vegetarian' => 'no vegetarian'],
         ['is_vegetarian' => 'vegetarian'],
        ];

        foreach($vegetarianVariants as $vegetarianVariant)
        {
            Vegetarian::create($vegetarianVariant);
        }
    }
}
