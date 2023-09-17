<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Str;

class OffersController extends Controller
{
    
    public function offersData(){
        $data = (object)[];
    
        $items = Item::where('discount','!=','0')->get()->transform(function($item){
            $item->img_route = route('item_image', ['img' => $item->image, 'no_cache' => Str::random(4)]);
            $item->discount_price = $item->price - ($item->price * $item->discount/100);
            return $item;
        });
        $data->items = $items;

        return \success(['data'=>$data]); 
        // return \response(['data'=>$data]);
    }
}
