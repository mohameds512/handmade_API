<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;
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

        return \success(['data'=>$data]); 
        // return \response(['data'=>$data]);
    }

    
}
