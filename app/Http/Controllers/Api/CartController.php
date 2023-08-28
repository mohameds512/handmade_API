<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function indexCart(Request $request) {
        $carts = Cart::join('items','items.id','cart.item_id')
                    ->where('user_id',$request->user_id)
                    ->select('items.*',DB::raw('SUM(items.price) as all_price'),DB::raw('COUNT(cart.item_id) item_count'))
                    ->groupBy('cart.item_id')
                    ->get();
        
        return response(['carts'=>$carts]);
    }

    public function countItemCart(Request $request) {
        $carts = Cart::where('user_id',$request->user_id)->where('item_id',$request->item_id)->get();
        if (!empty($carts)) {
            $count = count($carts);
        }else{
            $count =0 ;
        }
        return response(['carts'=>$count]);
    } 
    
    
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
