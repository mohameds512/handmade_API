<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Favorite;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User;

use App\Http\Controllers\Api\FirebaseController;
class ItemController extends Controller
{
    public function index(){
        $items = Item::get()->transform(function($item){
            $item->img_route = route('item_image', ['img' => $item->image, 'no_cache' => Str::random(4)]);
            $item->discount_price = $item->price - ($item->price * $item->discount/100);
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
            $item->discount_price = $item->price - ($item->price * $item->discount/100);
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
        $item->desc =  ["ar"=>$request->desc_ar,"en"=>$request->desc_en,"du"=>$request->desc_du];
        $item->count = $request->count;
        $item->price = $request->price;
        $item->discount = $request->discount;
        $item->image = $image;
        $item->save();

        $all_users = User::get('id');
        foreach ($all_users as $user) {
            FirebaseController::sendNotification( $user->id,"New item added","new item has been added");
        }

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
            $item->discount_price = $item->price - ($item->price * $item->discount/100);
            $item->fav = 1;
            return $item;
        });
        return \success(['items'=>$items]);
    }

    public function search(Request $request) {
        $keyword = $request->keyword;
        $items = Item::search($keyword);
        return $items;
        // $items = DB::table('items')
        //     ->where(function ($query) use($keyword){
        //         $query->where('name->ar', 'LIKE', '%'.$keyword.'%')
        //             ->orWhere('name->en', 'LIKE', '%'.$keyword.'%') 
        //             ->orWhere('name->du', 'LIKE', '%'.$keyword.'%')
        //             ->orWhere('desc->ar', 'LIKE', '%'.$keyword.'%')
        //             ->orWhere('desc->en', 'LIKE', '%'.$keyword.'%')
        //             ->orWhere('desc->du', 'LIKE', '%'.$keyword.'%');
        //     })->get();
        // if (count($items) > 0) {
        //     return \success(['items'=>$items]);
        // }
        // return response(["status"=>"failure"]);
    }

}
