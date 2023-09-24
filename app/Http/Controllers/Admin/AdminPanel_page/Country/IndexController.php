<?php

namespace App\Http\Controllers\Admin\AdminPanel_page\Country;

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
      $countries = Country::orderBy('name', 'asc')->get();
      $ingredients = Ingredient::all();

      return view('admin.adminPanel_page.country.index', compact('countries', 'ingredients', 'dishes'));
   }
}
