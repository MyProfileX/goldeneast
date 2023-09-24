<?php

namespace App\Http\Controllers\Admin\AdminPanel_page\Ingredient;

use App\Http\Controllers\Controller;
use App\Models\Gluten;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
      $types = Gluten::all();

      return view('admin.adminPanel_page.ingredient.create', compact('types'));
    }
}
