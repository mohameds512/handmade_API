<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Favorite;
use Illuminate\Support\Str;
use Auth;
class ItemController extends Controller
{
    public function index(){
        $items = Item::get()->transform(function($item){
            $item->img_route = route('item_image', ['img' => $item->image, 'no_cache' => Str::random(4)]);
            return $item;
        });
        return \success(['items'=>$items]);
    }
    
    public function cat_items(Request $request){
        $user_id = $request->user_id;
        // return $user_id;
        // where('category_id',$request->cat_id)->
        $items = Item::where('category_id',$request->cat_id)->get()->transform(function($item)  use ($user_id){
            $item->img_route = route('item_image', ['img' => $item->image, 'no_cache' => Str::random(4)]);
            $item->fav = $item->check_favorite($item->id,$user_id);
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
        
        // $item->fill($request->all());
        $item->name = ["ar"=>$request->name_ar,"en"=>$request->name_en,"du"=>$request->name_du];
        $item->desc = $request->desc;
        $item->count = $request->count;
        $item->price = $request->price;
        $item->discount = $request->discount;
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

    public function AddRemoveFavorite(Request $request){
        $fav = Favorite::where('users_id',$request->user_id)->where('items_id',$request->item_id)->first();
        if (empty($fav)) {
            $fav = new Favorite();
            $fav->users_id = $request->user_id;
            $fav->items_id = $request->item_id;
            $fav->save();
        }else {
            $fav->delete();
        }
        return success();
    }

    public function getFavoritesItems(Request $request) {
        $item_ids = Favorite::where('users_id',$request->user_id)->pluck('items_id');
        $items = Item::whereIn('id',$item_ids)->get()->transform(function($item){
            $item->img_route = route('item_image', ['img' => $item->image, 'no_cache' => Str::random(4)]);
            $item->fav = 1;
            return $item;
        });
        return \success(['items'=>$items]);
    }
}
