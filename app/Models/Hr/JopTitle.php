<?php

namespace App\Models\Hr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class JopTitle extends Model
{
    use HasFactory , LogsActivity , SoftDeletes;

    protected $fillable = ['name','salary','overtime'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn(string $eventName) => "This Jop Title has been {$eventName}")
            ->logOnly(['name','salary','overtime'])
            ->logOnlyDirty()
            ->useLogName('system');;
        // Chain fluent methods for configuration options
    }

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('id', 'like', '%'.$search.'%')
                ->orWhere('name', 'like', '%'.$search.'%')
                ->orWhere('salary', 'like', '%'.$search.'%');
             //   ->orWhereHas('department', fn($q) => $q->where('name','like', '%'.$search.'%'));
    }
}
