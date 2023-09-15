<?php

namespace App\Http\Controllers\Api;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Coupon;
use App\Http\Resources\flutter\orderResources;
use Illuminate\Support\Str;
use App\Models\Item;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;

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
                
                $rand_1 = Str::random(2);
                $rand_2 = Str::random(4);
                $rand_4 = random_int(10 ,99);
                $order_code = $rand_1.$order->id.$rand_2.$rand_4;
                $order->order_code = $order_code;
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

    public function OrderDetails(Request $request) {
        $data = (object)[];
        $items = Cart::where('cart_order_id',$request->order_id)
                    ->join('items','items.id','cart.item_id')
                    ->select('items.*',DB::raw('SUM(items.price - (items.price*items.discount/100)) as all_price'),DB::raw('COUNT(cart.item_id) item_count'))
                    ->groupBy('cart.item_id')
                    ->get();
        $data->items = $items;    
        $order = Order::find($request->order_id);
        $address = Address::where('id',$order->address_id)->first();
        $data->address = $address;
        return response(['data'=>$data]);
        
    }

}
