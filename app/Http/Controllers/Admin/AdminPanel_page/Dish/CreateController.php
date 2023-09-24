<?php

namespace App\Http\Controllers\Admin\AdminPanel_page\Dish;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Dish;
use App\Models\Ingredient;
use App\Models\Vegetarian;
use Illuminate\Http\Request;

class CreateController extends Controller
{
   public function __invoke()
   {
     $dishes = Dish::all();

     
     $countries = Country::all();
     $types = Vegetarian::all();
     $ingredients = Ingredient::all();


     return view('admin.adminPanel_page.dish.create', compact('countries', 'types', 'ingredients', 'dishes'));
   }
}

