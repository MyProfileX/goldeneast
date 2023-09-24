<?php

namespace App\Http\Controllers\Admin\AdminPanel_page\Ingredient;

use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
   public function __invoke(Ingredient $ingredient)
   {
     $ingredient->delete();
     return redirect()->route('admin.adminPanel_page.ingredient.index');
   }
}
