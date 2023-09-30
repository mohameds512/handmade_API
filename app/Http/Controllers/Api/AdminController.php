<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Order;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Notifications;
use App\Http\Controllers\Api\FirebaseController;
use Illuminate\Support\Str;


class AdminController extends Controller
{
    function approveOrderedItem(Request $request) {
        
        $ordered_items = Cart::where('item_id',$request->item_id)->where('cart_order_id',$request->cart_order_id)->get();
        foreach ($ordered_items as $item ) {
            $item->status = 1;
            $item->save();
        }
        
        $title = "Order";
        $body = "Your $request->item_code order has been approved and waiting shipping";
        
        FirebaseController::sendNotification("user_$request->user_id" ,$title,$body,"2","order");
        
        Notifications::add($request->user_id,$title,$body);
        
        return \success();
    }

    function adminOrderedItems() { 
        $user_id = Auth::user()->id;
        // $items = Cart::where('cart.user_id',$user_id)->where('cart_order_id','!=',0)
        //         ->get();
        $items = Cart::where('cart.user_id',$user_id)->where('cart_order_id','!=',0)
                ->join('items','items.id','cart.item_id')
                ->join('categories','categories.id','items.category_id')
                ->join('orders','orders.id','cart.cart_order_id')
                ->select('categories.name as cat_name','orders.order_code','cart.cart_order_id','cart.status as item_order_status','cart.user_id as cart_user_id','items.*',DB::raw('COUNT(items.id) as item_count'))
                ->groupBy('items.id')
                ->get()->transform(function($item){
                        $item->img_route = route('item_image', ['folder'=>'items','img' => $item->image, 'no_cache' => Str::random(4)]);
                        $item->item_code = $item->order_code .'_'. $item->id.'_'.$item->item_count;
                    return $item;
                });
        return response(["items"=>$items]);
    }
}
