<?php

namespace App\Http\Controllers\User\Main_page\Dish;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(){

      // $dishes = Dish::all();
      $dishes = Dish::orderBy('id', 'desc')->get();
      // dd($dishes);

      // // чтобы очищать сессию
      // session()->flush(); 

      return view('user.main_page.dish.index', compact('dishes'));
    }
}
