<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = 'order_items';
    public $incrementing = true;
    protected $fillable = [
        'order_id',
        'product_id',
        'product_name',
        'quantity',
        'price',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);

    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
