<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Notifications extends Model
{
    use HasFactory;
    protected $table='notifications';

    protected $guarded;
    // protected $casts = ['name' => 'json','desc' => 'json'];

    public static function Add($user_id,$title,$body) {
        $notf = new Notifications();
        $notf->user_id = $user_id;
        $notf->title = $title;
        $notf->body = $body;
        $notf->save();
    }

}
