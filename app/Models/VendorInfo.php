<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class VendorInfo extends Model
{
    use HasFactory;
    protected $table='vendorinfo';

    protected $guarded;
    // protected $casts = ['name' => 'json','desc' => 'json'];

    // public function check_favorite($item_id,$user_id){
    //     $fav = DB::table('favorites')->where('items_id',$item_id)->where('users_id',$user_id)->first();
    //     if (empty($fav)) {
    //         return 0;
    //     }
    //     return 1;
    // }

}
