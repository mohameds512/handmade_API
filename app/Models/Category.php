<?php

namespace App\Models;

// use App\Models\Inventory\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;
// use Staudenmeir\LaravelAdjacencyList\Eloquent\Traits\HasAdjacencyList;


class Category extends Model
{
    // use HasFactory  , HasRecursiveRelationships;
    protected $table = 'categories';
    // public static $types = ['account','product'];

    protected $guarded;
    // protected $casts = ['name' => 'json'];

    // public function accounts()
    // {
    //     return $this->hasMany(Account::class);
    // }


    // public function products()
    // {
    //     return $this->hasMany(Product::class);
    // }

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('id', 'like', '%'.$search.'%')
                ->orWhere('name', 'like', '%'.$search.'%')
                ->orWhere('type', 'like', '%'.$search.'%')
                ->orWhereHas('parent', fn($q) => $q->where('name','like', '%'.$search.'%'))
                ->orWhereHas('elements', fn($q) => $q->where('name','like', '%'.$search.'%'));
    }

}
