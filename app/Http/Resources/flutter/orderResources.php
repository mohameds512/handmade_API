<?php

namespace App\Http\Resources\flutter;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Address;
use App\Models\Coupon;


class orderResources extends JsonResource
{
    public function toArray(Request $request): array
    {
        $address = Address::where('id',$this->address_id)->first();
        $address_name = "--";
        if ($address) {
            $address_name = $address->name;
        }
        $coupon = Coupon::where('id',$this->coupon_id)->first();
        $coupon_code = "--";
        if($coupon){
            $coupon_code = $coupon->name;
        }
        return [
            'id'=>$this->id,
            'order_code'=>$this->order_code,
            'shipping_type'=>$this->shipping_type == 1 ? "Receive" : "Delivery",
            'payment_method'=>$this->payment_method == 1 ? "Card" : "Cash",
            'shipping_price'=>$this->shipping_price,
            'orders_price'=>$this->orders_price,
            'order_total_price'=>$this->order_total_price,
            'discount'=>$this->discount,
            'created_at'=>$this->created_at,
            'address_name'=>$address_name,
            'coupon_code' => $coupon_code,
            'added_ago' =>$this->created_at->diffForHumans(),
        ];

    }
}
