<?php

namespace App\Http\Controllers\Admin\AdminPanel_page;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Dish;
use App\Models\Ingredient;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPanelController extends Controller
{
   public function __invoke()
   {
      
      // Добавлял для поздчёта в sidebar
      $countries = Country::all();
      $ingredients = Ingredient::all();
      $dishes = Dish::all();
      return view('admin.adminPanel_page.adminPanel', compact('countries', 'ingredients', 'dishes')); // главная страница админ-панели    
   } 
   
}
