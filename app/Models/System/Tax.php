<?php

namespace App\Models\System;

use App\Models\Purchases\Bill;
use App\Models\Sales\Invoice;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    use HasFactory;

    protected $fillable = ['name','rate','active'];
    protected $casts = ['active'=>'boolean'];

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('name', 'like', '%' . $search . '%')
                ->orWhere('rate', 'like', '%' . $search . '%');
    }
}
