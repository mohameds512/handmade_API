<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['address', 'area','contactable_id','contactable_type','state_id'];

    public function locationable()
    {
        return $this->morphTo();
    }
}
