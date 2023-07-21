<?php

namespace App\Models\Hr;

use App\Models\System\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Department extends Model
{
    use HasFactory , LogsActivity , SoftDeletes;

    protected $fillable = ['name','description','active','manager_id'];

    public function manager()
    {
        return $this->belongsTo(User::class,'manager_id');
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn(string $eventName) => "This Department has been {$eventName}")
            ->logOnly(['name','description','manager','status_id'])
            ->logOnlyDirty()
            ->useLogName('system');
        // Chain fluent methods for configuration options
    }
}
