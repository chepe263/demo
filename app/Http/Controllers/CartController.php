<?php

namespace App\Http\Controllers;

use Vanilo\Cart\Contracts\CartItem;
use Vanilo\Cart\Facades\Cart;
use Vanilo\Product\Contracts\Product;

class CartController extends Controller
{
    public function add(Product $product)
    {
        $how_many = 1;
        if(abs(request()->input('quantity') ) > 1){
            $how_many = request()->input('quantity');
        }
        //return Cart::model()->items;
        //$how_many = -50;
        Cart::addItem($product,$how_many);

        return redirect()->route('cart.show', ["data" => Cart::model()->items]);
    }

    public function remove(CartItem $cart_item)
    {
        Cart::removeItem($cart_item);

        return redirect()->route('cart.show');
    }

    public function show()
    {
        return view('cart.show');
    }
}
