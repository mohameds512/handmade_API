<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;
use App\Models\Cart;
use App\Models\System\Setting;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function allData(){
        $data = (object)[];
        $categories = Category::get()->transform(function($item){
            $item->img_route = route('category_image', ['img' => $item->image, 'no_cache' => Str::random(4)]);
            return $item;
        });
        $data->categories = $categories;

        $items = Item::get()->transform(function($item){
            $item->img_route = route('item_image', ['img' => $item->image, 'no_cache' => Str::random(4)]);
            return $item;
        });
        $data->items = $items;
        $items_id = Cart::where('cart_order_id','!=','0')
        ->select('cart.*',DB::raw('COUNT(cart.id)'))
        ->groupBy('cart.item_id')
        ->pluck('cart.item_id');

        $top_sealing = Item::whereIn('id',$items_id)->get()->transform(function($item){
            $item->img_route = route('item_image', ['img' => $item->image, 'no_cache' => Str::random(4)]);
            return $item;
        });
        $data->top_sealing = $top_sealing;

        $setting = Setting::first();
        $data->setting = $setting;
        return \success(['data'=>$data]); 
        // return \response(['data'=>$data]);
    }

    
}
