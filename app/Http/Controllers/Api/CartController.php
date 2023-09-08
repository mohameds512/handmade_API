<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class CartController extends Controller 
{
    
    public function indexCart(Request $request) {
        $carts = Cart::join('items','items.id','cart.item_id')
                    ->where('user_id',$request->user_id)
                    ->where('cart_order_id',0)
                    ->select('items.*',DB::raw('SUM(items.price - (items.price*items.discount/100)) as all_price'),DB::raw('COUNT(cart.item_id) item_count'))
                    ->groupBy('cart.item_id')
                    ->get()->transform(function($item) {
                        $item->img_route = route('item_image', ['img' => $item->image, 'no_cache' => Str::random(4)]);
                        return $item;
                    });
        
        $totalPrice = Cart::join('items','items.id','cart.item_id')->
        where('user_id',$request->user_id)->where('cart_order_id',0)->select(DB::raw('SUM(items.price - (items.price*items.discount/100)) as total_price'),DB::raw('COUNT(cart.item_id) item_count'))->first();
            

        return response(['carts'=>$carts,"totalPrice"=>$totalPrice['total_price'],"total_count"=>$totalPrice['item_count']]);
    }
    
    public function countItemCart(Request $request) {
        $carts = Cart::where('user_id',$request->user_id)->where('item_id',$request->item_id)->where('cart_order_id',0)->get();
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
