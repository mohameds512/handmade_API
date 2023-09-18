<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $guarded;
    // protected $fillable = ['name','value'];
    protected $casts = ['name' => 'json','body' => 'json'];


}
