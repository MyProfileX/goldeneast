<?php

namespace App\Http\Controllers\Admin\AdminPanel_page\Dish;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Dish;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class IndexController extends Controller
{
   // public function __invoke()
   // {
   //    $dishes = Dish::all();
   //    $countries = Country::all();
   //    $ingredients = Ingredient::all();

   //    return view('admin.adminPanel_page.dish.index', compact('countries', 'ingredients', 'dishes'));
   // }

   public function __invoke()
   {
      $dishes = Dish::orderBy('id', 'desc')->get();
      $countries = Country::all();
      $ingredients = Ingredient::all();

      return view('admin.adminPanel_page.dish.index', compact('countries', 'ingredients', 'dishes'));
   }
}
