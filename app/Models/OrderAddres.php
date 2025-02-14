<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderAddres extends Model
{
    use HasFactory;
    protected $table = 'order_addresses';
        protected $fillable = [
        'order_id',
        'type',
        'first_name',
        'last_name',
        'email',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
