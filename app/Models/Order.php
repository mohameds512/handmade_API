<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;
    protected $table='orders';

    protected $guarded;
    // protected $casts = ['name' => 'json','desc' => 'json'];


}
