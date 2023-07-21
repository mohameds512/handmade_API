<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Str;

class ItemController extends Controller
{
    public function index(){
        $items = Item::get()->transform(function($item){
            $item->img_route = route('item_image', ['img' => $item->image, 'no_cache' => Str::random(4)]);
            return $item;
        });
        return \success(['items'=>$items]);
    }

    public function storeItem(Request $request,Item $item){
        if(!$item){
            $item = new Item();
        }
        if ($request->hasFile('image')) {
            $file_image = $request->file('image');
            $image =Str::random(6);
            saveRequestFile($file_image, "$image", "items");
        }
        
        $item->fill($request->all());
        $item->image = $image;
        $item->save();
        return response()->json(['message' => "success"], 201);
    }
    
    public function itemsImages(Request $request, $img, $no_cache)
    {

        $paths = findFiles("items", "$img");

        if (isset($paths[0]) && $paths[0]) {
            return responseFile($paths[0], "$img");
        }
        return response(['message' => 'not found'], 404);

    }
}
