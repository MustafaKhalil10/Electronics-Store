<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
       $orders = Order::get();
        return view('front.orders.index', compact('orders'));
    }

    public function show($orderId)
    {
        $order = Order::with(['orderitems', 'addresses'])->findOrFail($orderId);
        return view('front.orders.show', compact('order'));
    }
}
