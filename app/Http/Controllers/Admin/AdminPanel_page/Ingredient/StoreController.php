<?php

namespace App\Http\Controllers\Admin\AdminPanel_page\Ingredient;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminPanel_page\Ingredient\StoreRequest;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class StoreController extends Controller
{
   public function __invoke(StoreRequest $request)
   {
      $data = $request->validated();
      Ingredient::create($data);

      return redirect()->route('admin.adminPanel_page.ingredient.index');
   }
}
