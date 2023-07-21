<?php

namespace App\Models\System;

use App\Models\Purchases\Bill;
use App\Models\Purchases\Vendor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Tag extends Model
{
    use HasFactory , LogsActivity , SoftDeletes;

    protected $fillable = ['name','type'];

    public function parent()
    {
        return $this->belongsTo(Tag::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Tag::class, 'parent_id');
    }
    public function bills(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphedByMany(Bill::class, 'taggable');
    }
    public function vendors(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphedByMany(Vendor::class, 'taggable');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn(string $eventName) => "This Tag has been {$eventName}")
            ->logOnly(['name','type'])
            ->logOnlyDirty()
            ->useLogName('system');
        // Chain fluent methods for configuration options
    }

}
