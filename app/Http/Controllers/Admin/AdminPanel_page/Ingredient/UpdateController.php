<?php

namespace App\Http\Controllers\Admin\AdminPanel_page\Ingredient;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminPanel_page\Ingredient\UpdateRequest;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
   public function __invoke( UpdateRequest $request, Ingredient $ingredient)
   {
     $data = $request->validated();

     $ingredient->update($data);

     return redirect()->route('admin.adminPanel_page.ingredient.index');
   }
}
