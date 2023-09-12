<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Devices extends Model
{
    use HasFactory;
    protected $table='devices';

    protected $guarded;
    // protected $casts = ['name' => 'json','desc' => 'json'];


}
