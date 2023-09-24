<?php

namespace App\Http\Controllers\User\Cart_page\Stripe;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\CssSelector\Node\FunctionNode;

class StripeController extends Controller
{
    public function session(Request $request)
    {

      \Stripe\Stripe::setApiKey(config('stripe.sk'));
         
         if(empty(session('cart'))){
            return redirect()->route('user.cart_page.dish.index')->with('success', 'Cart is empty. Please, choose dishes.');

            // return redirect()->route('user.catalog_page.dish.index', compact('dishes'))->with('success', 'Order has been processed. Delivery is on its way.');
            // dd(111111);
         }else{
            // dd(222222);

            foreach (session('cart') as $details){
            $title = $details['title'];
            $total = $details['price'];
            $quantity = $details['quantity'];
   
            $priceNulls = "00";
            $totalPrice = "$total$priceNulls";
   
            $productItems[] = [
   
               'price_data' => [
   
                  'product_data' => [
                   'name' => $title, // зарезерв. stripe key
                  ],
   
                  'currency' => 'RUB',
                  'unit_amount' => $totalPrice,
                
               ],
   
               'quantity' => $quantity,
   
            ];
   
         }  
   
         // return "success";
   
         $checkoutSession = \Stripe\Checkout\Session::create([
   
            'line_items'               => [$productItems],
            'mode'                     => 'payment',
            'allow_promotion_codes'    => true,
            'metadata'                 => [
               'user_id' => auth()->user()->id, 
            ], 
   
            'customer_email' => auth()->user()->email,
            'success_url' => route('paySuccess'), 
            'cancel_url' => route('payCancel'), 
         ]);
   
         return redirect()->away($checkoutSession->url);
   
       }

   }



    

    public function success(){
      $dishes = Dish::all();
      // return view('user.catalog_page.dish.index', compact('dishes') );  // вернуть на страницу index с withSuccess 
      Session::forget('cart');
      // session()->flush(); 
      return redirect()->route('user.catalog_page.dish.index', compact('dishes'))->with('success', 'Order has been processed. Delivery is on its way.');
      // return redirect()->route('user.catalog_page.dish.index', compact('dishes'));
    }

    public function cancel(){
      $dishes = Dish::all();
      return redirect()->route('user.cart_page.dish.index', compact('dishes'));
      // return view('user.cart_page.dish.index'); // вернуть на страницу index с with Cancel 
    }

}
