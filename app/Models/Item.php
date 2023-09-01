<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Item extends Model
{
    use HasFactory;
    protected $table='items';

    protected $guarded;
    protected $casts = ['name' => 'json','desc' => 'json'];

    public function check_favorite($item_id,$user_id){
        $fav = DB::table('favorites')->where('items_id',$item_id)->where('users_id',$user_id)->first();
        if (empty($fav)) {
            return 0;
        }
        return 1;
    }


    
    public static function search($keyword){
        if ($keyword == null) {
            return response(["status"=>"failure"]);
        }
        $items = self::where(function ($query) use($keyword){
                $query->where('name->ar', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('name->en', 'LIKE', '%'.$keyword.'%') 
                    ->orWhere('name->du', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('desc->ar', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('desc->en', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('desc->du', 'LIKE', '%'.$keyword.'%');
            })->get()->transform(function($item){
                $item->img_route = route('item_image', ['img' => $item->image, 'no_cache' => Str::random(4)]);
                $item->discount_price = $item->price - ($item->price * $item->discount/100);
                return $item;
            });;
        if (count($items) > 0) {
            return response()->json(['status' => 'success', 'data' => ['items' => $items]]);
        }
        return response(["status"=>"failure"]);
    }

}
