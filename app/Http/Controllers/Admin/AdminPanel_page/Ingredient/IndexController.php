<?php

namespace App\Http\Controllers\Admin\AdminPanel_page\Ingredient;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Dish;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class IndexController extends Controller
{
   public function __invoke()
   {
      $dishes = Dish::all();
      $countries = Country::all();
      $ingredients = Ingredient::orderBy('name', 'asc')->get();

     return view('admin.adminPanel_page.ingredient.index', compact('ingredients', 'countries', 'dishes'));
   }
}
