<?php

namespace App\Models\Purchases;

use App\Models\System\Country;
use App\Models\System\State;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Znck\Eloquent\Traits\BelongsToThrough;
use App\Traits\Taggable;
use App\Traits\HasContacts;
use App\Traits\HasLocation;

class Vendor extends Model
{
    use HasFactory, softDeletes ,BelongsToThrough ,Taggable ,HasContacts ,HasLocation ;

    protected $fillable = ['business_name', 'first_name', 'last_name', 'code', 'telephone', 'phone', 'address', 'email', 'cr', 'tax_number', 'city','state_id','active'];

    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function country()
    {
        return $this->belongsToThrough(Country::class,State::class);
    }
    public function bills()
    {
        return $this->hasMany(Bill::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }



    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('business_name', 'like', '%' . $search . '%')
                ->orWhere('first_name', 'like', '%' . $search . '%')
                ->orWhere('last_name', 'like', '%' . $search . '%')
                ->orWhere('phone', 'like', '%' . $search . '%')
                ->orWhere('code', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('address', 'like', '%' . $search . '%');
    }
}
