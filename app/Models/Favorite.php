<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Favorite extends Model
{
    use HasFactory;
    protected $table='favorites';

    protected $guarded;
    // protected $casts = ['name' => 'json','desc' => 'json'];

    
}
