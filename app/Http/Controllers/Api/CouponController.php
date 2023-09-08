<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;


class CouponController extends Controller
{
    public function CheckCoupon(Request $request){
        
        $coupon = Coupon::where('name',$request->name)->where('count','>',0)->first();
        if (!$coupon) {
            return \response()->json(['status'=>'failure']);
            
        }
        $expireDate = strtotime($coupon->expire_date);
        if (time() < $expireDate) {
            return \response()->json(['coupon'=>$coupon,'status'=>'success']);
        }else{ 
            return \response()->json(['status'=>'failure']);

        }

    }

    public function addCoupon(Request $request){
        $coupon = new Coupon();
        $coupon->fill($request->all());
        $coupon->save();
        return \success();
    }

    public function deleteCoupon(Request $request){
        return $request;
    }
    
}
