<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $primaryKey = 'user_id';
    protected $connictions = 'mysql2';
    public $timestamps = false;


    public function categories()
    {
        return $this->hasMany(Category::class, 'store_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'store_id', 'id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class ,'store_id', 'id');
    }

}
