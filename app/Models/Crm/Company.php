<?php

namespace App\Models\Crm;

use App\Models\Sales\Client;
use App\Models\System\Country;
use App\Models\System\State;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Znck\Eloquent\Traits\BelongsToThrough;

class Company extends Model
{
    use HasFactory,softDeletes ,BelongsToThrough;

    protected $fillable = ['name','state','address','active'];

    protected $casts = ['last_action_at'=>'date','active'=>'boolean'];

    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function country()
    {
        return $this->belongsToThrough(Country::class,State::class);
    }
    public function clients()
    {
        return $this->hasMany(Client::class);
    }
    public function getLastActionAttribute()
    {
        return $this->last_action_at?->format('d M Y');
    }
}
