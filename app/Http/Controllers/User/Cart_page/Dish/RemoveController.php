<?php

namespace App\Http\Controllers\User\Cart_page\Dish;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RemoveController extends Controller
{
    public function __invoke(Request $request)
    {
      if($request->id){
         $cart = session()->get('cart');
         if(isset($cart[$request->id])){
            unset($cart[$request->id]);
            session()->put('cart', $cart);
         }
         session()->flash('success', 'successfully removed');
      }
    }
      
}
