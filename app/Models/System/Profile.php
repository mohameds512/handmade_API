<?php

namespace App\Models\System;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'bio',
        'address',
        'photo',
        'url',
        'location',
        'gender',
        'lang',
    ];


    public function user()
    {
        return  $this->belongsTo(User::class);
    }
}
