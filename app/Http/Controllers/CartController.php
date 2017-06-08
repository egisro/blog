<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shopping\Cart;
use App\Product;

class CartController extends Controller
{
   public function index()
   {
       $cart = Cart::createFromSession();

       return view('cart.index', [
           'cart' => $cart
       ]);
   }

    public function add($id)
   {


       $cart = Cart::createFromSession();
       $product = Product::findOrFail($id);

       $cart->add($product);
       session()->put('cart', $cart);
       return redirect()->back();
   }

   public function remove($id)
   {
       if (session() -> has('cart')) {
           $cart = session()->get('cart');
           $product = Product::findOrFail($id);
           $cart->remove($product);
           session()->put('cart', $cart);
           return redirect()->back();
       }
   }

    public function flush()
    {
            session()-> forget('cart');

            return redirect()->back();
        }
}
