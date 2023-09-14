<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Order;
use App\Models\Notifications;
use App\Http\Controllers\Api\FirebaseController;


class AdminController extends Controller
{
    function approveOrder(Request $request) {
        $order = Order::where('id',$request->order_id)->first();
        $order->status = 1;
        $order->save();
        $user_id = $order->user_id;

        $title = "Order";
        $body = "Your order has been approved";
        
        FirebaseController::sendNotification("user_$user_id" ,$title,$body,"2","order");
        
        Notifications::add($user_id,$title,$body);
        
        return \success();
    }
}
