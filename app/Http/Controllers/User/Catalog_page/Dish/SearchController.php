<?php

namespace App\Http\Controllers\User\Catalog_page\Dish;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
      $query = $request->query->get('query');

      $dishesFiltered = Dish::where('title', 'like', '%'.$query.'%')
               ->orderBy('id', 'desc')
               ->get();   

      if ($request->ajax()){ 
         // То, ЧТО мы рендерим
         return view('user.catalog_page.dish.indexFiltered', compact('dishesFiltered'))->render();
      };
    }
}
