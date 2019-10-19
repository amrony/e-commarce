<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request){
       // dd($request->all());
        $product = Product::find($request->id);



        Cart::add([
            'id' => $product->id,
            'name' => $product->product_name,
            'price' => $product->product_price,
            'qty' => $request->qty,
            'weight' => 0,
            'options' => [
                'image' => $product->product_image
            ]
        ]);

        return redirect('/cart/show');

    }

    public function showCart(){

        $cartProducts = Cart::content();
      // dd($cartProducts);
        return view('front-end.cart.show-cart', compact('cartProducts'));
    }

    public function deleteCart($rowId){
        Cart::remove($rowId);
        return redirect('/cart/show');
    }

    public function updateCart(Request $request){
        //dd($request->all());
        Cart::update($request->rowId, $request->qty);
        return redirect('/cart/show');
    }
}
