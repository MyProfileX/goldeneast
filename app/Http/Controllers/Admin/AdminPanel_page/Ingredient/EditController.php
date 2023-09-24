<?php

namespace App\Http\Controllers\Admin\AdminPanel_page\Ingredient;

use App\Http\Controllers\Controller;
use App\Models\Gluten;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class EditController extends Controller
{
   public function __invoke(Ingredient $ingredient)
   {
      $ingredient = Ingredient::find($ingredient->id); // uses in edit.blade
      
      $types = Gluten::all();
   

     return view('admin.adminPanel_page.ingredient.edit', compact('ingredient', 'types'));
   }
}
