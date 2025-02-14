<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'store_id',
        'user_id',
        'number',
        'payment_method',
        'status',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'customer'
        ]);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_items', 'order_id', 'product_id', 'id', 'id');
    }
    public function orderitems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function addresses()
    {
        return $this->hasMany(OrderAddres::class);
    }

    public function billingAddress()
    {
        return $this->hasOne(OrderAddres::class, 'order_id', 'id')->where('type', '=', 'billing');
    }

    public function shippingAddress()
    {
        return $this->hasOne(OrderAddres::class, 'order_id', 'id')->where('type', '=', 'shipping');
    }

    protected static function booted()
    {
        static::creating(function (Order $order) {
            $order->number = Order::OrderNumber();
        });
    }

    public static function OrderNumber()
    {
        $year = Carbon::now()->year;
        $dayOfYear = Carbon::now()->dayOfYear;
        $lastOrder = Order::whereYear('created_at', $year)->max('number');

        if ($lastOrder) {
            return  $lastOrder + 1;
        }
        return $year . str_pad($dayOfYear, 3, '0', STR_PAD_LEFT) . '001';  // -> 2025044001
    }
}
