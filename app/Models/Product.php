<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected  $fillable = [
        'store_id',
        'category_id',
        'name',
        'description',
        'image',
        'price',
        'compare_price',
        'options',
        'rating',
        'status',
        'favorite_product',
    ];

    public static function rules()
    {
        return [
            'name' => 'required',
            'store_id' => 'required|exists:stores,id',
            'category_name'=>'required',
            'status' => 'required|in:active,inactive',
            'description' => 'required',
            'price' => 'required',
            'compare_price' => 'nullable',
            'rating' => 'required',
            'options' => 'nullable',
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }

}
