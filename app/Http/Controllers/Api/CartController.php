<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function addToCart(Request $request) {
        $cart = new Cart();
        $cart->user_id = $request->user_id;
        $cart->item_id = $request->item_id;
        $cart->save();
        return success();
        
    }

    public function removeFromCart(Request $request) {
        $cart = Cart::where('user_id',$request->user_id)->where('item_id',$request->item_id)->first();
        if (!empty($cart)) {
            $cart->delete();
        }
        
        return success();
        
    }
}
