<?php

namespace App\Http\Controllers\User\Cart_page\Dish;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Request $request)
    {
      
      if($request->id && $request->quantity){
         $cart = session()->get('cart');
         $cart[$request->id]["quantity"] = $request->quantity;
         session()->put('cart', $cart);
         // session()->flash('success', 'quantity successfully updated');
      }
    }
}
