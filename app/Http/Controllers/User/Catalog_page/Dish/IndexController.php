<?php

namespace App\Http\Controllers\User\Catalog_page\Dish;
use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class IndexController extends Controller
{
   public function __invoke()
   {
      // $dishes = Dish::all();
      $dishes = Dish::orderBy('id', 'desc')->get();
      // session()->forget('cart');
      return view('user.catalog_page.dish.index', compact('dishes'));
      
   }
   
}
