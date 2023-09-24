<?php

namespace App\Http\Controllers\User\Cart_page\Dish;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;

class IndexController extends Controller
{
   //  public function __invoke(Dish $dish)
   //  {


   //    $dish = Dish::find($dish->id);
      


   //    return view('user.cart_page.dish.index', compact('dish'));
   //  }

    public function __invoke()
    {
      $dishes = Dish::all();
      // dd($dishes->id);

      // foreach($dishes as $dish){
      //    dump($dish);
      // }

      // dump($dishes);

      // dd(1);

      

      // $dish = Dish::find($dish->id);
      // dd($dish);

      return view('user.cart_page.dish.index', compact('dishes'));

      // return redirect()->route('user.cart_page.dish.index', $dish->id);
      // dd(1111);


      

    }
}
