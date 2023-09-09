<?php

namespace App\Http\Controllers\Api;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Coupon;
use App\Http\Resources\flutter\orderResources;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function IndexOrders(Request $request) {
        $orders = Order::where('orders.user_id',$request->user_id)->get();
        $data = orderResources::collection($orders);
        return response(["orders"=>$data]);
    }
    
    public function AddOrder(Request $request){
        
        DB::beginTransaction();
        try {

            $carts = Cart::where('user_id',$request->user_id)
                    ->where('cart_order_id',0)->get();

            if (!empty($carts)) {
                $order = new Order();
                $order->fill($request->all());
                $order->save();
                
                $carts = Cart::where('user_id',$request->user_id)
                        ->where('cart_order_id',0)->get();
                foreach ($carts as $cart) {
                    $cart->cart_order_id = $order->id;
                    $cart->save();
                }
                if ($request->coupon_id != "0") {
                    $coupon = Coupon::find($request->coupon_id);
                    $coupon->remaining = $coupon->remaining - 1;
                    $coupon->save(); 
                }
            }
        
            DB::commit();
            return \success();
        } catch (\Exception $e) {
            DB::rollback();
            return $e;

        }
        
    }

}
