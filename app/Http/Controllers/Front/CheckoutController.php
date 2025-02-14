<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Repositories\Cart\CartModelRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class CheckoutController extends Controller
{
    //
    public function index()
    {
        $repository = new CartModelRepository();
        $items = $repository->get();
        $total = $repository->total();
        return view('front.checkout', [
            'items' => $items,
            'total' => $total,
        ]);
    }


    public function store(Request $request)
    {
        DB::beginTransaction();
        $repository = new CartModelRepository();
        $items = $repository->get()->groupBy('product.store_id');
        try {
            foreach ($items as $store_id => $cart_items) {
                $order = Order::create([
                    'store_id' => $store_id,
                    'user_id' => Auth::id(),
                    'payment_method' => 'cash',
                ]);
                foreach ($cart_items as $item) {

                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $item->product_id, //7
                        'product_name' => $item->product->name,
                        'price' => $item->product->price,
                        'quantity' => $item->quantity
                    ]);
                    // name email address omer
                    // name email address mustafa
                    foreach ($request->post('address') as $type => $address) {
                        $address['type'] = $type;
                        $order->addresses()->create($address);
                    }
                }
                DB::commit();
                $repository->empty();
            }
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('info', 'The request has been sent Error');
        }
        return redirect()->back()->with('success', 'The request has been sent successfully');
    }
}
