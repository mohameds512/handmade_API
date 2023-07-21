<?php

namespace App\Models\Hr;

use App\Models\Crm\Action;
use App\Models\System\Country;
use App\Models\System\State;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Znck\Eloquent\Traits\BelongsToThrough;

class Employee extends Model
{
    use HasFactory , LogsActivity , SoftDeletes ,BelongsToThrough;

    protected $fillable = ['name','phone','address','salary','overtime','joined_at','terminated_at','joptitle_id','department_id','status_id','active'];

    protected $casts = ['joined_at'=>'date','active'=>'boolean'];

    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function country()
    {
        return $this->belongsToThrough(Country::class,State::class);
    }
    public function actions()
    {
        return $this->hasMany(Action::class);
    }

    public function joptitle()
    {
        return $this->belongsTo(JopTitle::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function getJoinedAttribute()
    {
        return $this->joined_at?->format('d M Y');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn(string $eventName) => "This Employee has been {$eventName}")
            ->logOnly(['name','phone','joptitle_id','salary','department_id','active','joined_at','status_id','terminated_at'])
            ->logOnlyDirty()
            ->useLogName('system');;
        // Chain fluent methods for configuration options
    }

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('id', 'like', '%'.$search.'%')
                ->orWhere('name', 'like', '%'.$search.'%')
                ->orWhere('salary', 'like', '%'.$search.'%')
                ->orWhere('phone', 'like', '%'.$search.'%')
                ->orWhere('position', 'like', '%'.$search.'%')
                ->orWhereHas('department', fn($q) => $q->where('name','like', '%'.$search.'%'))
                ->orWhereHas('status', fn($q) => $q->where('name','like', '%'.$search.'%'));
    }
}
