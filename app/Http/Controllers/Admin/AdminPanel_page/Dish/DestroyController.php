<?php

namespace App\Http\Controllers\Admin\AdminPanel_page\Dish;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
   public function __invoke(Dish $dish)
   {
      $dish->delete();
      return redirect()->route('admin.adminPanel_page.dish.index');
   }
}
