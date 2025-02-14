<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = ['store_id','name', 'description', 'icon', 'status',];

    public static function rules()
    {
        return [
            'name' => 'required|min:3|max:18',
            'description' => ['required', 'min:20', 'max:200',],
            'status' => 'in:active,inactive',
        ];
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
