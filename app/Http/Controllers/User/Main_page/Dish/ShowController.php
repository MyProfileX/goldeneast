<?php

namespace App\Http\Controllers\User\Main_page\Dish;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(){
      $dishes = Dish::all();
      // dd($dishes);

      return view('user.main_page.dish.show', compact('dishes'));
;    }
}
