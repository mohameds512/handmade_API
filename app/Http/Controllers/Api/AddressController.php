<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;


class AddressController extends Controller
{
    public function IndexAddress(Request $request){

        $addresses = Address::where('user_id',$request->user_id)->get();

        return $addresses;
        
    }

    public function AddAddress(Request $request){
        
        if ($request->has('address_id') && $request->address_id != null) {
            $address = Address::find($request->address_id);
            if (empty($address)) {
                $address = new Address();
            }
        }else{
            $address = new Address();
        }
        $data = $request->except('address_id');
        $address->fill($data);
        $address->save();
        
        return \success();
        
    }
    public function deleteAddress(Request $request){
        $address = Address::where('id',$request->address_id)->first();
        $address->delete();
        return \success();
    }
    
}
