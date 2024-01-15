<?php

namespace App\Http\Controllers\User\Catalog_page\Dish\Cart;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;

class AddController extends Controller
{
    public function index(Dish $dish)
    {

      $cart = session()->get('cart', []); // извлекаем значения с ключом ‘cart’ из сессии

      if(isset($cart[$dish->id])) {

         $cart[$dish->id]['quantity']++;

      }  else {

         $cart[$dish->id] = [
            'title' => $dish->title,
            'photo' => $dish->path, // cart_page\dish\index.blade.php
            'price' => $dish->price,
            'quantity' => 1,
            
         ];

      }

      
      session()->put('cart', $cart); // записываем обновлённые значения $cart 
      
      return redirect()->back()->with('success', 'The dish has been added to cart');
    }





    public function show(Dish $dish)
    {

      

      $cart = session()->get('cart', []); // извлекаем значения с ключом ‘cart’ из сессии

      if(isset($cart[$dish->id])) {

         $cart[$dish->id]['quantity']++;

      }  else {

         $cart[$dish->id] = [
            'title' => $dish->title,
            'photo' => $dish->path,
            'price' => $dish->price,
            'quantity' => 1,
            
         ];

      }

      
      session()->put('cart', $cart); // записываем обновлённые значения $cart 
      
      return redirect()->route('user.catalog_page.dish.index')->with('success', 'The dish has been added to cart');
    }
}
