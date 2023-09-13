<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Order;
use App\Http\Controllers\Api\FirebaseController;


class AdminController extends Controller
{
    function approveOrder(Request $request) {
        $order = Order::where('id',$request->order_id)->first();
        $order->status = 1;
        $order->save();
        $user_id = $order->user_id;
        FirebaseController::sendNotification("user_$user_id" ,"Order","Your order has been approved","","");
        return \success();
    }
}
