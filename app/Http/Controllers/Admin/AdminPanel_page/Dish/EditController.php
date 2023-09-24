<?php

namespace App\Http\Controllers\Admin\AdminPanel_page\Dish;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Dish;
use App\Models\Ingredient;
use App\Models\Vegetarian;
use Illuminate\Http\Request;

class EditController extends Controller
{

   // public function __invoke(Dish $dish, Ingredient $ingredient){
   //    dd(2222);
   // }

   public function __invoke(Dish $dish, Ingredient $ingredient)
   {
     $dish = Dish::find($dish->id); // записываем id текущей записи в $dish, чтобы использовать её edit.blade
     $ingredient = Dish::find($ingredient->id); // записываем id текущей записи в $ingredient, чтобы использовать её edit.blade

     $ingredients = Ingredient::all();
     $countries = Country::all();
     $types = Vegetarian::all();
     
   //   dd(44444);
     return view('admin.adminPanel_page.dish.edit', compact( 'dish', 'ingredient', 'countries', 'types', 'ingredients' ));
   }
}


//   $ingredients = Ingredient::all();