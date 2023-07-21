<?php

namespace App\Models\System;

use App\Models\Crm\Company;
use App\Models\Purchases\Vendor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = ['name', 'phones', 'website', 'contactable_id','contactable_type','status_id'];

    public function contactable()
    {
        return $this->morphTo();
    }
    public function vendor()
    {
       return $this->belongsTo(Vendor::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
