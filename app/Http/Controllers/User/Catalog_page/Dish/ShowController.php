<?php

namespace App\Http\Controllers\User\Catalog_page\Dish;
use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;

class ShowController extends Controller
{
   public function __invoke(Dish $dish)
   {

      return view('user.catalog_page.dish.show', compact('dish'));
   }
}
