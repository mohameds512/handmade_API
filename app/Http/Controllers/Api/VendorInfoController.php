<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VendorInfo;
use Auth;
use Illuminate\Support\Str;

class VendorInfoController extends Controller
{
    public function storeData(Request $request,VendorInfo $vendor){
        $user_id = Auth::user()->id;
        if (!$vendor) {
            $vendor = new VendorInfo();
        }
        if ($request->hasFile('vendor_image')) {
            
            $file_image = $request->file('vendor_image');
            $image =Str::random(6);
            saveRequestFile($file_image, "$image", "vendor");
            $vendor->image = $image;
        }
        $vendor->user_id = $user_id;
        $vendor->vendor_name = $request->vendor_name;
        $vendor->vendor_desc = $request->vendor_desc;
        $vendor->save();
        return $vendor;
    }

    public function getData(){
        $user_id = Auth::user()->id;
        $vendor = VendorInfo::where('user_id',$user_id)->get()->transform(function($item){
            if ($item->image) {
                $item->img_route = route('item_image', ['folder'=>'vendor','img' => $item->image, 'no_cache' => Str::random(4)]);
            }
            
            return $item;
        });
        return $vendor[0];
    }
}

